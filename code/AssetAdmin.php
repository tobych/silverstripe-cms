<?php
/**
 * AssetAdmin is the 'file store' section of the CMS.
 * It provides an interface for maniupating the File and Folder objects in the system.
 * 
 * @package cms
 * @subpackage assets
 */
class AssetAdmin extends LeftAndMain {

	static $url_segment = 'assets';
	
	static $url_rule = '/$Action/$ID';
	
	static $menu_title = 'Files & Images';

	public static $tree_class = 'File';
	
	/**
	 * @see Upload->allowedMaxFileSize
	 * @var int
	 */
	public static $allowed_max_file_size;
	
	/**
	 * @see Upload->allowedExtensions
	 * @var array
	 */
	public static $allowed_extensions = array();
	
	/**
	 * If this is true, then restrictions set in $allowed_max_file_size and
	 * $allowed_extensions will be applied to users with admin privileges as
	 * well.
	 */
	public static $apply_restrictions_to_admin = false;
	
	static $allowed_actions = array(
		'doAdd',
		'AddForm',
		'deletemarked',
		'DeleteItemsForm',
		'deleteUnusedThumbnails',
		'doUpload',
		'getfile',
		'getsubtree',
		'movemarked',
		'save',
		'savefile',
		'uploadiframe',
		'UploadForm',
		'deleteUnusedThumbnails' => 'ADMIN',
		'batchactions',
		'BatchActionsForm'
	);
	
	/**
	 * Return fake-ID "root" if no ID is found (needed to upload files into the root-folder)
	 */
	public function currentPageID() {
		if(isset($_REQUEST['ID']) && is_numeric($_REQUEST['ID']))	{
			return $_REQUEST['ID'];
		} elseif (is_numeric($this->urlParams['ID'])) {
			return $this->urlParams['ID'];
		} elseif(is_numeric(Session::get("{$this->class}.currentPage"))) {
			return Session::get("{$this->class}.currentPage");
		} else {
			return "root";
		}
	}

	/**
	 * Set up the controller, in particular, re-sync the File database with the assets folder./
	 */
	function init() {
		parent::init();
		
		if(!file_exists(ASSETS_PATH)) {
			mkdir(ASSETS_PATH);
		}

		// needed for MemberTableField (Requirements not determined before Ajax-Call)
		Requirements::css(SAPPHIRE_DIR . "/css/ComplexTableField.css");

		Requirements::javascript(CMS_DIR . '/javascript/LeftAndMain.BatchActions.js');

		Requirements::javascript(CMS_DIR . "/javascript/AssetAdmin.DragDrop.js");
		Requirements::javascript(CMS_DIR . "/javascript/AssetAdmin.js");

		Requirements::javascript(CMS_DIR . "/javascript/CMSMain_upload.js");
		Requirements::javascript(CMS_DIR . "/javascript/Upload.js");
		Requirements::javascript(CMS_DIR . "/thirdparty/swfupload/swfupload.js");
		
		Requirements::javascript(THIRDPARTY_DIR . "/greybox/AmiJS.js");
		Requirements::javascript(THIRDPARTY_DIR . "/greybox/greybox.js");
		Requirements::css(THIRDPARTY_DIR . "/greybox/greybox.css");
		
		Requirements::css(CMS_DIR . "/css/AssetAdmin.css");

		Requirements::customScript(<<<JS
			_TREE_ICONS = {};
			_TREE_ICONS['Folder'] = {
					fileIcon: 'sapphire/javascript/tree/images/page-closedfolder.gif',
					openFolderIcon: 'sapphire/javascript/tree/images/page-openfolder.gif',
					closedFolderIcon: 'sapphire/javascript/tree/images/page-closedfolder.gif'
			};
JS
		);
		
		CMSBatchActionHandler::register('delete', 'AssetAdmin_DeleteBatchAction', 'Folder');
	}
		
	/**
	 * Show the content of the upload iframe.  The form is specified by a template.
	 */
	function uploadiframe() {
		Requirements::clear();
		
		Requirements::javascript(SAPPHIRE_DIR . "/thirdparty/prototype/prototype.js");
		Requirements::javascript(SAPPHIRE_DIR . "/thirdparty/behaviour/behaviour.js");
		Requirements::javascript(SAPPHIRE_DIR . "/javascript/prototype_improvements.js");
		//Requirements::javascript(CMS_DIR . "/javascript/LeftAndMain.js");
		Requirements::javascript(CMS_DIR . "/thirdparty/multifile/multifile.js");
		Requirements::css(CMS_DIR . "/thirdparty/multifile/multifile.css");
		Requirements::css(CMS_DIR . "/css/typography.css");
		Requirements::css(CMS_DIR . "/css/layout.css");
		Requirements::css(CMS_DIR . "/css/cms_left.css");
		Requirements::css(CMS_DIR . "/css/cms_right.css");
		
		if(isset($data['ID']) && $data['ID'] != 'root') $folder = DataObject::get_by_id("Folder", $data['ID']);
		else $folder = singleton('Folder');
		
		// Don't modify the output of the template, or it will become invalid
		ContentNegotiator::disable();
		
		return array( 'CanUpload' => $folder->canEdit());
	}
	
	/**
	 * Return the form object shown in the uploadiframe.
	 */
	function UploadForm() {
		// disabled flash upload javascript (CMSMain_upload()) below,
		// see r54952 (originally committed in r42014)
		$form = new Form($this,'UploadForm', new FieldSet(
			new HiddenField("ID", "", $this->currentPageID()),
			new HiddenField("FolderID", "", $this->currentPageID()),
			// needed because the button-action is triggered outside the iframe
			new HiddenField("action_doUpload", "", "1"), 
			new FileField("Files[0]" , _t('AssetAdmin.CHOOSEFILE','Choose file: ')),
			new LiteralField('UploadButton',"
				<input type=\"submit\" value=\"". _t('AssetAdmin.UPLOAD', 'Upload Files Listed Below'). "\" name=\"action_upload\" id=\"Form_UploadForm_action_upload\" class=\"action\" />
			"),
			new LiteralField('MultifileCode',"
				<p>" . _t('AssetAdmin.FILESREADY','Files ready to upload:') ."</p>
				<div id=\"Form_UploadForm_FilesList\"></div>
			")
		), new FieldSet(
		));
		
		// Makes ajax easier
		$form->disableSecurityToken();
		
		return $form;
	}
	
	/**
	 * This method processes the results of the UploadForm.
	 * It will save the uploaded files to /assets/ and create new File objects as required.
	 */
	function doUpload($data, $form) {
		$processedFiles = array();
		
		if(!isset($data['Files'])) return Director::set_status_code("404");
		
		if(is_array($data['Files'])) {
			foreach($data['Files'] as $param => $files) {
				if(!is_array($files)) $files = array($files);
				foreach($files as $key => $value) {
					$processedFiles[$key][$param] = $value;
				}
			}
		}
		else {
			$proccessedFiles[] = $data['Files'];
		}
		
		// get the folder to upload to.
		if(isset($data['FolderID']) && $data['FolderID'] != "root") {
			$folder = DataObject::get_by_id('Folder', $data['FolderID']);
		}
		else {
			$folder = DataObject::get_one('Folder');
		}
		
		$newFiles = array();
		$fileSizeWarnings = '';
		$errorsArr = '';
		$status = '';
		$statusMessage = '';

		foreach($processedFiles as $tmpFile) {
			if($tmpFile['error'] == UPLOAD_ERR_NO_TMP_DIR) {
				$errorsArr[] = _t('AssetAdmin.NOTEMP', 'There is no temporary folder for uploads. Please set upload_tmp_dir in php.ini.');
				break;
			}
		
			if($tmpFile['tmp_name']) {
				// Workaround open_basedir problems
				if(ini_get("open_basedir")) {
					$newtmp = TEMP_FOLDER . '/' . $tmpFile['name'];
					move_uploaded_file($tmpFile['tmp_name'], $newtmp);
					$tmpFile['tmp_name'] = $newtmp;
				}
				
				// validate files (only if not logged in as admin)
				if(!self::$apply_restrictions_to_admin && Permission::check('ADMIN')) {
					$valid = true;
				} else {
					$upload = new Upload();
					$upload->setAllowedExtensions(array('gif'));
					$upload->setAllowedMaxFileSize(self::$allowed_max_file_size);
					$valid = $upload->validate($tmpFile);
					if(!$valid) {
						$errorsArr = $upload->getErrors();
					}
				}
				
				// move file to given folder
				if($valid) $newFiles[] = $folder->addUploadToFolder($tmpFile);
			}
		}

		if($newFiles) {
			$numFiles = sizeof($newFiles);
			$statusMessage = sprintf(_t('AssetAdmin.UPLOADEDX',"Uploaded %s files"),$numFiles) ;
			$status = "good";
		} else if($errorsArr) {
			$statusMessage = implode('\n', $errorsArr);
			$status = 'bad';
		} else {
			$statusMessage = _t('AssetAdmin.NOTHINGTOUPLOAD','There was nothing to upload');
			$status = "";
		}

		$fileIDs = array();
		$fileNames = array();
		foreach($newFiles as $newFile) {
			$fileIDs[] = $newFile;
			$fileObj = DataObject::get_one('File', "\"File\".\"ID\"=$newFile");
			// notify file object after uploading
			if (method_exists($fileObj, 'onAfterUpload')) $fileObj->onAfterUpload();
			$fileNames[] = $fileObj->Name;
		}
		
		// TODO Replace with clientside logic which doesn't have assumptions in the response
		echo <<<HTML
			<script type="text/javascript">
			var url = parent.document.getElementById('sitetree').getTreeNodeByIdx( "{$folder->ID}" ).getElementsByTagName('a')[0].href;
			parent.jQuery('#Form_EditForm').concrete('ss').loadForm(url);
			parent.statusMessage("{$statusMessage}","{$status}");
			</script>
HTML;
	}

	/**
	 * Custom currentPage() method to handle opening the 'root' folder
	 */
	public function currentPage() {
		$id = $this->currentPageID();
		if($id && is_numeric($id)) {
			return DataObject::get_by_id($this->stat('tree_class'), $id);
		} else if($id == 'root') {
			return singleton($this->stat('tree_class'));
		}
	}
	
	/**
	 * @return Form
	 */
	function EditForm($request = null) {
		return $this->getEditForm();
	}
	
	/**
	 * Return the form that displays the details of a folder, including a file list and fields for editing the folder name.
	 */
	function getEditForm($id = null) {
		if(!$id) $id = $this->currentPageID();
		
		$record = ($id && $id != "root") ? DataObject::get_by_id("File", $id) : null;		
		if($record && !$record->canView()) return Security::permissionFailure($this);

		if($record) {
			$fields = $record->getCMSFields();
			// Required for file tree setup
			if(!$fields->dataFieldByName('ParentID')) $fields->push(new HiddenField('ParentID'));
			
			$actions = new FieldSet();
			
			// Only show save button if not 'assets' folder
			if($record->canEdit() && $id != 'root') {
				$actions = new FieldSet(
					new FormAction('save',_t('AssetAdmin.SAVEFOLDERNAME','Save folder name'))
				);
			}
			
			$form = new Form($this, "EditForm", $fields, $actions);
			if($record->ID) {
				$form->loadDataFrom($record);
			} else {
				$form->loadDataFrom(array(
					"ID" => "root",
					"URL" => Director::absoluteBaseURL() . 'assets/',
				));
			}
			
			if(!$record->canEdit()) {
				$form->makeReadonly();
			}
		} else {
			$form = $this->EmptyForm();
		}
		
		return $form;
	}
	
	/**
	 * Perform the "move marked" action.
	 * Called and returns in same way as 'save' function
	 */
	public function movemarked($urlParams, $form) {
		if($_REQUEST['DestFolderID'] && (is_numeric($_REQUEST['DestFolderID']) || ($_REQUEST['DestFolderID']) == 'root')) {
			$destFolderID = ($_REQUEST['DestFolderID'] == 'root') ? 0 : $_REQUEST['DestFolderID'];
			$fileList = "'" . ereg_replace(' *, *',"','",trim(addslashes($_REQUEST['FileIDs']))) . "'";
			$numFiles = 0;
	
			if($fileList != "''") {
				$files = DataObject::get("File", "\"File\".\"ID\" IN ($fileList)");
				if($files) {
					foreach($files as $file) {
						if($file instanceof Image) {
							$file->deleteFormattedImages();
						}
						$file->ParentID = $destFolderID;
						$file->write();
						$numFiles++;
					}
				} else {
					user_error("No files in $fileList could be found!", E_USER_ERROR);
				}
			}

			$message = sprintf(_t('AssetAdmin.MOVEDX','Moved %s files'),$numFiles);
			
			FormResponse::status_message($message, "good");
			FormResponse::add("$('Form_EditForm_Files').refresh();");

			return FormResponse::respond();
		}
	}
		
	/**
	 * Returns the content to be placed in Form_SubForm when editing a file.
	 * Called using ajax.
	 */
	public function getfile() {
		SSViewer::setOption('rewriteHashlinks', false);

		// bdc: only try to return something if user clicked on an object
		if (is_object($this->getSubForm($this->urlParams['ID']))) {
			return $this->getSubForm($this->urlParams['ID'])->formHtmlContent();
		}
		else return null;
	}
	
	/**
	 * Action handler for the save button on the file subform.
	 * Saves the file
	 */
	public function savefile($data, $form) {
		$record = DataObject::get_by_id("File", $data['ID']);
		$form->saveInto($record);
		$record->write();
		$title = Convert::raw2js($record->Title);
		$name = Convert::raw2js($record->Name);
		$saved = sprintf(_t('AssetAdmin.SAVEDFILE','Saved file %s'),"#$data[ID]");
		echo <<<JS
			statusMessage('$saved');
			$('record-$data[ID]').getElementsByTagName('td')[1].innerHTML = "$title";
			$('record-$data[ID]').getElementsByTagName('td')[2].innerHTML = "$name";
JS;
	}
	
	/**
	 * Return the entire site tree as a nested UL.
	 * @return string HTML for site tree
	 */
	public function SiteTreeAsUL() {
		$obj = singleton('Folder');
		$obj->setMarkingFilter('ClassName', ClassInfo::subclassesFor('Folder'));
		$obj->markPartialTree(30, null, "ChildFolders");

		if($p = $this->currentPage()) $obj->markToExpose($p);

		// getChildrenAsUL is a flexible and complex way of traversing the tree
		$siteTreeList = $obj->getChildrenAsUL(
			'',
			'"<li id=\"record-$child->ID\" class=\"$child->class" . $child->markingClasses() .  ($extraArg->isCurrentPage($child) ? " current" : "") . "\">" . ' .
			'"<a href=\"" . Director::link(substr($extraArg->Link(),0,-1), "show", $child->ID) . "\" class=\"" . ($child->hasChildFolders() ? " contents" : "") . "\" >" . $child->TreeTitle . "</a>" ',
			$this,
			true,
			"ChildFolders"
		);	

		// Wrap the root if needs be
		$rootLink = $this->Link() . 'show/root';
		$baseUrl = Director::absoluteBaseURL() . "assets";
		if(!isset($rootID)) {
			$siteTree = "<ul id=\"sitetree\" class=\"tree unformatted\"><li id=\"record-root\" class=\"Root\"><a href=\"$rootLink\"><strong>{$baseUrl}</strong></a>"
			. $siteTreeList . "</li></ul>";
		}

		return $siteTree;
	}

	/**
	 * Returns a subtree of items underneat the given folder.
	 */
	public function getsubtree() {
		$obj = DataObject::get_by_id('Folder', $_REQUEST['ID']);
		$obj->setMarkingFilter('ClassName', ClassInfo::subclassesFor('Folder'));
		$obj->markPartialTree();

		$results = $obj->getChildrenAsUL(
			'',
			'"<li id=\"record-$child->ID\" class=\"$child->class" . $child->markingClasses() .  ($extraArg->isCurrentPage($child) ? " current" : "") . "\">" . ' .
			'"<a href=\"" . Director::link(substr($extraArg->Link(),0,-1), "show", $child->ID) . "\" >" . $child->TreeTitle . "</a>" ',
			$this,
			true
		);

		return substr(trim($results), 4, -5);
	}
	

	//------------------------------------------------------------------------------------------//

	// Data saving handlers

	/**
	 * @return Form
	 */
	function AddForm() {
		$typeMap = array('Folder' => singleton('Folder')->i18n_singular_name());
		$typeField = new DropdownField('Type', false, $typeMap, 'Folder');
		$form = new Form(
			$this,
			'AddForm',
			new FieldSet(
				new HiddenField('ParentID'),
				$typeField->performReadonlyTransformation()
			),
			new FieldSet(
				new FormAction('doAdd', _t('AssetAdmin_left.ss.GO','Go'))
			)
		);
		$form->setValidator(null);
		$form->addExtraClass('actionparams');
		
		return $form;
	}

	/**
	 * Add a new folder and return its details suitable for ajax.
	 */
	public function doAdd($data, $form) {
		$parentID = (isset($data['ParentID']) && is_numeric($data['ParentID'])) ? (int)$data['ParentID'] : 0;
		$name = (isset($data['Name'])) ? basename($data['Name']) : _t('AssetAdmin.NEWFOLDER',"NewFolder");
		
		if($parentID) {
			$parentObj = DataObject::get_by_id('File', $parentID);
			if(!$parentObj || !$parentObj->ID) $parentID = 0;
		}
		
		// Get the folder to be created		
		if(isset($parentObj->ID)) $filename = $parentObj->FullPath . $name;
		else $filename = ASSETS_PATH . '/' . $name;

		// Actually create
		if(!file_exists(ASSETS_PATH)) {
			mkdir(ASSETS_PATH);
		}
		
		$p = new Folder();
		$p->ParentID = $parentID;
		$p->Name = $p->Title = basename($filename);		
		$p->write();

		// Used in TinyMCE inline folder creation
		if(isset($data['returnID'])) {
			return $p->ID;
		} else {
			$form = $this->getEditForm($p->ID);
			return $form->formHtmlContent();
		}
		
	}
	
	/**
	 * Batch Actions Handler
	 */
	function batchactions() {
		return new CMSBatchActionHandler($this, 'batchactions', 'Folder');
	}
	
	/**
	 * @return Form
	 */
	function BatchActionsForm() {
		$actions = $this->batchactions()->batchActionList();
		$actionsMap = array();
		foreach($actions as $action) $actionsMap[$action->Link] = $action->Title;
		
		$form = new Form(
			$this,
			'BatchActionsForm',
			new FieldSet(
				new LiteralField(
					'Intro',
					sprintf('<p><small>%s</small></p>',
						_t(
							'CMSMain_left.ss.SELECTPAGESACTIONS',
							'Select the pages that you want to change &amp; then click an action:'
						)
					)
				),
				new HiddenField('csvIDs'),
				new DropdownField(
					'Action',
					false,
					$actionsMap
				)
			),
			new FieldSet(
				// TODO i18n
				new FormAction('submit', "Go")
			)
		);
		$form->addExtraClass('actionparams');
		$form->unsetValidator();
		
		return $form;
	}
		
	/**
	 * @return Form
	 */
	function SyncForm() {
		$form = new Form(
			$this,
			'SyncForm',
			new FieldSet(),
			new FieldSet(
				$btn = new FormAction('doSync', _t('FILESYSTEMSYNC','Look for new files'))
			)
		);
		$form->addExtraClass('actionparams');
		$form->setFormMethod('GET');
		$form->setFormAction('dev/tasks/FilesystemSyncTask');
		$btn->describe(_t('AssetAdmin_left.ss.FILESYSTEMSYNC_DESC', 'SilverStripe maintains its own database of the files &amp; images stored in your assets/ folder.  Click this button to update that database, if files are added to the assets/ folder from outside SilverStripe, for example, if you have uploaded files via FTP.'));
		
		return $form;
	}
	
	public function save($urlParams, $form) {
		// Don't save the root folder - there's no database record
		if($_REQUEST['ID'] == 'root') {
			FormResponse::status_message('Saved', 'good');
			return FormResponse::respond();
		}
		
		$form->dataFieldByName('Title')->value = $form->dataFieldByName('Name')->value;
		
		return parent::save($urlParams, $form);
	}
	
	/**
     * #################################
     *        Garbage collection.
     * #################################
    */
	
	/**
	 * Removes all unused thumbnails from the file store
	 * and returns the status of the process to the user.
	 */
	public function deleteunusedthumbnails() {
		$count = 0;
		$thumbnails = $this->getUnusedThumbnails();
		
		if($thumbnails) {
			foreach($thumbnails as $thumbnail) {
				unlink(ASSETS_PATH . "/" . $thumbnail);
				$count++;
			}
		}
		
		$message = sprintf(_t('AssetAdmin.THUMBSDELETED', '%s unused thumbnails have been deleted'), $count);
		FormResponse::status_message($message, 'good');
		echo FormResponse::respond();
	}
	
	/**
	 * Creates array containg all unused thumbnails.
	 * 
	 * Array is created in three steps:
	 *     1. Scan assets folder and retrieve all thumbnails
	 *     2. Scan all HTMLField in system and retrieve thumbnails from them.
	 *     3. Count difference between two sets (array_diff)
	 *
	 * @return array 
	 */
	private function getUnusedThumbnails() {
		$allThumbnails = array();
		$usedThumbnails = array();
		$dirIterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(ASSETS_PATH));
		$classes = ClassInfo::subclassesFor('SiteTree');
		
		if($dirIterator) {
			foreach($dirIterator as $file) {
				if($file->isFile()) {
					if(strpos($file->getPathname(), '_resampled') !== false) {
						$pathInfo = pathinfo($file->getPathname());
						if(in_array(strtolower($pathInfo['extension']), array('jpeg', 'jpg', 'jpe', 'png', 'gif'))) {
							$path = str_replace('\\','/', $file->getPathname());
							$allThumbnails[] = substr($path, strpos($path, '/assets/') + 8);
						}
					}
				}
			}
		}
		
		if($classes) {
			foreach($classes as $className) {
				$SNG_class = singleton($className);
				$objects = DataObject::get($className);
				
				if($objects !== NULL) {
					foreach($objects as $object) {
						foreach($SNG_class->db() as $fieldName => $fieldType) {
							if($fieldType == 'HTMLText') {
								$url1 = HTTP::findByTagAndAttribute($object->$fieldName,array('img' => 'src'));
								
								if($url1 != NULL) {
									$usedThumbnails[] = substr($url1[0], strpos($url1[0], '/assets/') + 8);
								}
								
								if($object->latestPublished > 0) {
									$object = Versioned::get_latest_version($className, $object->ID);
									$url2 = HTTP::findByTagAndAttribute($object->$fieldName, array('img' => 'src'));
									
									if($url2 != NULL) {
										$usedThumbnails[] = substr($url2[0], strpos($url2[0], '/assets/') + 8);
									}
								}
							}
						}
					}
				}
			}
		}
		
		return array_diff($allThumbnails, $usedThumbnails);
	}
	
}
/**
 * Delete multiple {@link Folder} records (and the associated filesystem nodes).
 * Usually used through the {@link AssetAdmin} interface.
 * 
 * @package cms
 * @subpackage batchactions
 */
class AssetAdmin_DeleteBatchAction extends CMSBatchAction {
	function getActionTitle() {
		// _t('AssetAdmin_left.ss.SELECTTODEL','Select the folders that you want to delete and then click the button below')
		return _t('AssetAdmin_DeleteBatchAction.TITLE', 'Delete folders');
	}

	function run(DataObjectSet $records) {
		$status = array(
			'modified'=>array(),
			'deleted'=>array()
		);
		
		foreach($records as $record) {
			$id = $record->ID;
			
			// Perform the action
			if($record->canDelete()) $record->delete();

			$status['deleted'][$id] = array();

			$record->destroy();
			unset($record);
		}

		return Convert::raw2json($status);
	}
}
?>
