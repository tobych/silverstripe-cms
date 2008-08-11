<?php
/**
 * LeftAndMain is the parent class of all the two-pane views in the CMS.
 * If you are wanting to add more areas to the CMS, you can do it by subclassing LeftAndMain.
 * 
 * This is essentially an abstract class which should be subclassed.
 * See {@link CMSMain} for a good example.
 * 
 * @package cms
 * @subpackage core
 */
class LeftAndMain extends Controller {
	
	static $tree_class = null;
	
	/**
	 * Default menu items for the core cms functionality,
	 * set in cms/_config.php.
	 *
	 * @usedby {@link add_menu_item()}
	 * @var array
	 */
	protected static $menu_items = array();
	
	static $ForceReload;

	static $allowed_actions = array(
		'ajaxupdateparent',
		'ajaxupdatesort',
		'callPageMethod',
		'deleteitems',
		'getitem',
		'getsubtree',
		'myprofile',
		'printable',
		'save',
		'show',
		'Member_ProfileForm',
		'EditorToolbar',
		'EditForm',
		
	);
	
	/**
	 * Register additional requirements through the {@link Requirements class}.
	 * Used mainly to work around the missing "lazy loading" functionality
	 * for getting css/javascript required after an ajax-call (e.g. loading the editform).
	 *
	 * @var array $extra_requirements
	 */
	protected static $extra_requirements = array(
		'javascript' => array(),
		'css' => array(),
		'themedcss' => array(),
	);
	
	function init() {
		Director::set_site_mode('cms');
		
		// set language
		$member = Member::currentUser();
		if(!empty($member->Locale)) {
			i18n::set_locale($member->Locale);
		}
		
		// set reading lang
		if(Translatable::is_enabled() && !Director::is_ajax()) {
			Translatable::choose_site_lang(array_keys(i18n::get_existing_content_languages('SiteTree')));
		}

		parent::init();
		
		// Allow customisation of the access check by a decorator
		if($this->hasMethod('alternateAccessCheck')) {
			$isAllowed = $this->alternateAccessCheck();
			
		// Default security check for LeftAndMain sub-class permissions
		} else {
			$isAllowed = Permission::check("CMS_ACCESS_$this->class");
			if(!$isAllowed && $this->class == 'CMSMain') {
				// When access /admin/, we should try a redirect to another part of the admin rather than be locked out
				$menu = $this->MainMenu();
				if(($first = $menu->First()) && $first->Link) {
					Director::redirect($first->Link);
				}
			}
		}

		// Don't continue if there's already been a redirection request.
		if(Director::redirected_to()) return;

		// Access failure!		
		if(!$isAllowed) {
			$messageSet = array(
				'default' => _t('LeftAndMain.PERMDEFAULT',"Please choose an authentication method and enter your credentials to access the CMS."),
				'alreadyLoggedIn' => _t('LeftAndMain.PERMALREADY',"I'm sorry, but you can't access that part of the CMS.  If you want to log in as someone else, do so below"),
				'logInAgain' => _t('LeftAndMain.PERMAGAIN',"You have been logged out of the CMS.  If you would like to log in again, enter a username and password below."),
			);

			Security::permissionFailure($this, $messageSet);
			return;
		}
		
		Requirements::css('cms/css/typography.css');
		Requirements::css('cms/css/layout.css');
		Requirements::css('cms/css/cms_left.css');
		Requirements::css('cms/css/cms_right.css');
		
		Requirements::javascript('jsparty/prototype.js');
		Requirements::javascript('jsparty/behaviour.js');
		Requirements::javascript('jsparty/prototype_improvements.js');
		Requirements::javascript('jsparty/loader.js');
		Requirements::javascript('jsparty/hover.js');
		Requirements::javascript('jsparty/layout_helpers.js');

		Requirements::javascript(MCE_ROOT . 'tiny_mce_src.js');
		Requirements::javascript('cms/javascript/ImageEditor/Activator.js');
		Requirements::javascript('jsparty/tiny_mce_improvements.js');

		Requirements::javascript('jsparty/scriptaculous/effects.js');
		Requirements::javascript('jsparty/scriptaculous/dragdrop.js');
		Requirements::javascript('jsparty/scriptaculous/controls.js');

		Requirements::css('jsparty/greybox/greybox.css');
		Requirements::javascript('jsparty/greybox/AmiJS.js');
		Requirements::javascript('jsparty/greybox/greybox.js');
		
		Requirements::javascript('jsparty/tree/tree.js');
		Requirements::css('jsparty/tree/tree.css');

		/*
		Requirements::javascript('jsparty/tabstrip/tabstrip.js');
	*/
		Requirements::css('jsparty/tabstrip/tabstrip.css');
		
		Requirements::css('cms/css/TinyMCEImageEnhancement.css');
		Requirements::javascript('cms/javascript/TinyMCEImageEnhancement.js');
		
		Requirements::javascript('cms/javascript/LeftAndMain.js');
		Requirements::javascript('cms/javascript/LeftAndMain_left.js');
		Requirements::javascript('cms/javascript/LeftAndMain_right.js');
	
		Requirements::css('sapphire/css/Form.css');

		Requirements::javascript('cms/javascript/ForumAdmin.js');
		Requirements::javascript('cms/javascript/SideTabs.js');
		Requirements::javascript('cms/javascript/TaskList.js');
		Requirements::javascript('cms/javascript/CommentList.js');
		Requirements::javascript('cms/javascript/SideReports.js');
		Requirements::javascript('cms/javascript/LangSelector.js');
		Requirements::javascript('cms/javascript/TranslationTab.js');
		Requirements::javascript('sapphire/javascript/Validator.js');
		Requirements::javascript('sapphire/javascript/UniqueFields.js');
		Requirements::javascript('sapphire/javascript/RedirectorPage.js');
		Requirements::javascript('sapphire/javascript/DataReport.js' );
		Requirements::javascript('sapphire/javascript/ToggleCompositeField.js');
		Requirements::css('sapphire/css/SubmittedFormReportField.css');

		Requirements::javascript('sapphire/javascript/FieldEditor.js');
		Requirements::css('sapphire/css/FieldEditor.css');

		Requirements::css('sapphire/css/TableListField.css');
		Requirements::css('sapphire/css/ComplexTableField.css');
		Requirements::javascript('sapphire/javascript/TableListField.js');
		Requirements::javascript('sapphire/javascript/TableField.js');
		Requirements::javascript('sapphire/javascript/ComplexTableField.js');
		Requirements::javascript('sapphire/javascript/RelationComplexTableField.js');
		
		Requirements::css('sapphire/css/TreeDropdownField.css');
		Requirements::css('sapphire/css/CheckboxSetField.css');
		
		Requirements::javascript('jsparty/calendar/calendar.js');
		Requirements::javascript('jsparty/calendar/lang/calendar-en.js');
		Requirements::javascript('jsparty/calendar/calendar-setup.js');
		Requirements::css('sapphire/css/CalendarDateField.css');
		Requirements::css('jsparty/calendar/calendar-win2k-1.css');
		
		Requirements::javascript('sapphire/javascript/DropdownTimeField.js');
		Requirements::css('sapphire/css/DropdownTimeField.css');
		Requirements::css('sapphire/css/PopupDateTimeField.css');
		
		Requirements::javascript('sapphire/javascript/SelectionGroup.js');
		Requirements::css('sapphire/css/SelectionGroup.css');
		
		Requirements::javascript('jsparty/SWFUpload/SWFUpload.js');
		Requirements::javascript('cms/javascript/Upload.js');
		
		Requirements::javascript('sapphire/javascript/HasManyFileField.js');
		Requirements::css('sapphire/css/HasManyFileField.css');
		
		Requirements::themedCSS('typography');
		
		// For Widgets
		Requirements::css('cms/css/WidgetAreaEditor.css');
		Requirements::javascript('cms/javascript/WidgetAreaEditor.js');
		
		Requirements::javascript("sapphire/javascript/Security_login.js");
		
		foreach (self::$extra_requirements['javascript'] as $file) {
			Requirements::javascript($file[0]);
		}
		
		foreach (self::$extra_requirements['css'] as $file) {
			Requirements::css($file[0], $file[1]);
		}
		
		foreach (self::$extra_requirements['themedcss'] as $file) {
			Requirements::css($file[0], $file[1]);
		}
		
		Requirements::customScript('Behaviour.addLoader(hideLoading);');

		$dummy = null;
		$this->extend('augmentInit', $dummy);
	}

	/**
	 * Returns true if the current user can access the CMS
	 */
	function canAccessCMS() {

		$member = Member::currentUser();

		if($member) {
			if($groups = $member->Groups()) {
				foreach($groups as $group) if($group->CanCMS) return true;
			}
		}

		return false;
	}

	/**
	 * Returns true if the current user has administrative rights in the CMS
	 */
	function canAdminCMS() {
		if($member = Member::currentUser()) return $member->isAdmin();
	}

	//------------------------------------------------------------------------------------------//
	// Main controllers

	/**
	 * You should implement a Link() function in your subclass of LeftAndMain,
	 * to point to the URL of that particular controller.
	 * 
	 * @return string
	 */
	public function Link() {
		user_error('LeftAndMain::Link(): Please implement in your subclass', E_USER_ERROR);
	}

	public function show($params) {
		if($params['ID']) $this->setCurrentPageID($params['ID']);
		if(isset($params['OtherID']))
			Session::set('currentMember', $params['OtherID']);

		if(Director::is_ajax()) {
			SSViewer::setOption('rewriteHashlinks', false);
			return $this->EditForm()->formHtmlContent();

		} else {
			return array();
		}
	}


	public function getitem() {
		$this->setCurrentPageID($_REQUEST['ID']);
		SSViewer::setOption('rewriteHashlinks', false);
		// Changed 3/11/2006 to not use getLastFormIn because that didn't have _form_action, _form_name, etc.

		$form = $this->EditForm();
		if($form) return $form->formHtmlContent();
		else return "";
	}
	public function getLastFormIn($html) {
		$parts = split('</?form[^>]*>', $html);
		return $parts[sizeof($parts)-2];
	}

	//------------------------------------------------------------------------------------------//
	// Main UI components

	/**
	 * Returns the main menu of the CMS.  This is also used by init() to work out which sections the user
	 * has access to.
	 * 
	 * @return DataObjectSet
	 */
	public function MainMenu() {
		// Don't accidentally return a menu if you're not logged in - it's used to determine access.
		if(!Member::currentUserID()) return new DataObjectSet();

		// Encode into DO set
		$menu = new DataObjectSet();
		foreach($this->stat('menu_items') as $code => $menuItem) {
			if(isset($menuItem['controllerClass']) && $this->hasMethod('alternateMenuDisplayCheck')) {
				$isAllowed = $this->alternateMenuDisplayCheck($menuItem['controllerClass']);
			} elseif(isset($menuItem['controllerClass'])) {
				$isAllowed = Permission::check("CMS_ACCESS_" . $menuItem['controllerClass']);
			} else {
				$isAllowed = true;
			}

			if(!$isAllowed) continue;

			$linkingmode = "";
			if(!(strpos($this->Link(), $menuItem['url']) === false)) {
				// HACK Hardcoding assumptions about the first default menu item
				if($code == "content") {
					if($this->Link() == "admin/")
						$linkingmode = "current";
				} else {
					$linkingmode = "current";
				}
			}
		
			$menu->push(new ArrayData(array(
				"Title" => Convert::raw2xml($menuItem['title']),
				"Code" => $code,
				"Link" => $menuItem['url'],
				"LinkingMode" => $linkingmode
			)));
		}
		
		// if no current item is found, assume that first item is shown
		//if(!isset($foundCurrent)) 

		return $menu;
	}

  /**
   * Return a list of appropriate templates for this class, with the given suffix
   */
  protected function getTemplatesWithSuffix($suffix) {
    $classes = array_reverse(ClassInfo::ancestry($this->class));
    foreach($classes as $class) {
      $templates[] = $class . $suffix;
      if($class == 'LeftAndMain') break;
    }
    return $templates;
  }

	public function Left() {
		return $this->renderWith($this->getTemplatesWithSuffix('_left'));
	}
	public function Right() {
		return $this->renderWith($this->getTemplatesWithSuffix('_right'));
	}
	public function RightBottom() {
		if(SSViewer::hasTemplate($this->getTemplatesWithSuffix('_rightbottom'))) {
			return $this->renderWith($this->getTemplatesWithSuffix('_rightbottom'));
		}
	}


	public function getRecord($id, $className = null) {
		if(!$className) $className = $this->stat('tree_class');
		return DataObject::get_by_id($className, $rootID);
	}

	function getSiteTreeFor($className, $rootID = null) {
		$obj = $rootID ? $this->getRecord($rootID) : singleton($className);
		$obj->markPartialTree();
		if($p = $this->currentPage()) $obj->markToExpose($p);

		// getChildrenAsUL is a flexible and complex way of traversing the tree
		$siteTree = $obj->getChildrenAsUL("", '
					"<li id=\"record-$child->ID\" class=\"" . $child->CMSTreeClasses($extraArg) . "\">" .
					"<a href=\"" . Director::link(substr($extraArg->Link(),0,-1), "show", $child->ID) . "\" class=\"" . $child->CMSTreeClasses($extraArg) . "\" title=\"' . _t('LeftAndMain.PAGETYPE','Page type: ') . '".$child->class."\" >" . 
					($child->TreeTitle()) . 
					"</a>"
'
					,$this, true);

		// Wrap the root if needs be.

		if(!$rootID) {
			$rootLink = $this->Link() . '0';
			
			// This lets us override the tree title with an extension
			if($this->hasMethod('getCMSTreeTitle')) $treeTitle = $this->getCMSTreeTitle();
			else $treeTitle =  _t('LeftAndMain.SITECONTENTLEFT',"Site Content",PR_HIGH,'Root node on left');
			
			$siteTree = "<ul id=\"sitetree\" class=\"tree unformatted\"><li id=\"record-0\" class=\"Root nodelete\"><a href=\"$rootLink\"><strong>$treeTitle</strong></a>"
				. $siteTree . "</li></ul>";
		}

		return $siteTree;
	}

	public function getsubtree() {
		$results = $this->getSiteTreeFor($this->stat('tree_class'), $_REQUEST['ID']);
		return substr(trim($results), 4,-5);
	}

	/**
	 * Allows you to returns a new data object to the tree (subclass of sitetree)
	 * and updates the tree via javascript.
	 */
	public function returnItemToUser($p) {
		if(Director::is_ajax()) {
			// Prepare the object for insertion.
			$parentID = (int)$p->ParentID;
			$id = $p->ID ? $p->ID : "new-$p->class-$p->ParentID";
			$treeTitle = Convert::raw2js($p->TreeTitle());
			$hasChildren = is_numeric( $id ) && $p->AllChildren() ? ' unexpanded' : '';

			// Ensure there is definitly a node avaliable. if not, append to the home tree.
			$response = <<<JS
				var tree = $('sitetree');
				var newNode = tree.createTreeNode("$id", "$treeTitle", "{$p->class}{$hasChildren}");
				node = tree.getTreeNodeByIdx($parentID);
				if(!node){	node = tree.getTreeNodeByIdx(0); }
				node.open();
				node.appendTreeNode(newNode);
				newNode.selectTreeNode();
JS;
			FormResponse::add($response);
		}

		return FormResponse::respond();
	}


	/**
	 * Save and Publish page handler
	 */
	public function save($urlParams, $form) {
		$className = $this->stat('tree_class');
		$result = '';

		$SQL_id = Convert::raw2sql($_REQUEST['ID']);
		if(substr($SQL_id,0,3) != 'new') {
			$record = DataObject::get_one($className, "`$className`.ID = {$SQL_id}");
		} else {
			$record = $this->getNewItem($SQL_id, false);
		}

		// We don't want to save a new version if there are no changes
		$dataFields_new = $form->Fields()->dataFields();
		$dataFields_old = $record->getAllFields();
		$changed = false;
		$hasNonRecordFields = false;
		foreach($dataFields_new as $datafield) {
			// if the form has fields not belonging to the record
			if(!isset($dataFields_old[$datafield->Name()])) {
				$hasNonRecordFields = true;
			}
			// if field-values have changed
			if(!isset($dataFields_old[$datafield->Name()]) || $dataFields_old[$datafield->Name()] != $datafield->dataValue()) {
				$changed = true;
			}
		}

		if(!$changed && !$hasNonRecordFields) {
			// Tell the user we have saved even though we haven't, as not to confuse them
			if(is_a($record, "Page")) {
				$record->Status = "Saved (update)";
			}
			FormResponse::status_message(_t('LeftAndMain.SAVEDUP',"Saved"), "good");
			FormResponse::update_status($record->Status);
			return FormResponse::respond();
		}

		$form->dataFieldByName('ID')->Value = 0;

		if(isset($urlParams['Sort']) && is_numeric($urlParams['Sort'])) {
			$record->Sort = $urlParams['Sort'];
		}

		// HACK: This should be turned into something more general
		$originalClass = $record->ClassName;
		$originalStatus = $record->Status;

		$record->HasBrokenLink = 0;
		$record->HasBrokenFile = 0;

		$record->writeWithoutVersion();

		// HACK: This should be turned into something more general
		$originalURLSegment = $record->URLSegment;

		$form->saveInto($record, true);

		if(is_a($record, "Page")) {
			$record->Status = ($record->Status == "New page" || $record->Status == "Saved (new)") ? "Saved (new)" : "Saved (update)";
		}



		// $record->write();

		if(Director::is_ajax()) {
			if($SQL_id != $record->ID) {
				FormResponse::add("$('sitetree').setNodeIdx(\"{$SQL_id}\", \"$record->ID\");");
				FormResponse::add("$('Form_EditForm').elements.ID.value = \"$record->ID\";");
			}

			if($added = DataObjectLog::getAdded('SiteTree')) {
				foreach($added as $page) {
					if($page->ID != $record->ID) $result .= $this->addTreeNodeJS($page);
				}
			}
			if($deleted = DataObjectLog::getDeleted('SiteTree')) {
				foreach($deleted as $page) {
					if($page->ID != $record->ID) $result .= $this->deleteTreeNodeJS($page);
				}
			}
			if($changed = DataObjectLog::getChanged('SiteTree')) {
				foreach($changed as $page) {
					if($page->ID != $record->ID) {
						$title = Convert::raw2js($page->TreeTitle());
						FormResponse::add("$('sitetree').setNodeTitle($page->ID, \"$title\");");
					}
				}
			}

			$message = _t('LeftAndMain.SAVEDUP');


			// Update the icon if the class has changed
			if($originalClass != $record->ClassName) {
				$record->setClassName( $record->ClassName );
				$newClass = $record->ClassName;
				$record = $record->newClassInstance( $newClass );

				FormResponse::add("if(\$('sitetree').setNodeIcon) \$('sitetree').setNodeIcon($record->ID, '$originalClass', '$record->ClassName');");
			}

			// HACK: This should be turned into somethign more general
			if( ($record->class == 'VirtualPage' && $originalURLSegment != $record->URLSegment) ||
				($originalClass != $record->ClassName) || self::$ForceReload == true) {
				FormResponse::add("$('Form_EditForm').getPageFromServer($record->ID);");
			}

			// After reloading action
			if($originalStatus != $record->Status) {
				$message .= sprintf(_t('LeftAndMain.STATUSTO',"  Status changed to '%s'"),$record->Status);
			}

			$record->write();

			if( ($record->class != 'VirtualPage') && $originalURLSegment != $record->URLSegment) {
				$message .= sprintf(_t('LeftAndMain.CHANGEDURL',"  Changed URL to '%s'"),$record->URLSegment);
				FormResponse::add("\$('Form_EditForm').elements.URLSegment.value = \"$record->URLSegment\";");
				FormResponse::add("\$('Form_EditForm_StageURLSegment').value = \"{$record->URLSegment}\";");
			}

			// If the 'Save & Publish' button was clicked, also publish the page
			if (isset($urlParams['publish']) && $urlParams['publish'] == 1) {
				$this->performPublish($record);
				
				$record->setClassName($record->ClassName);
				$newClass = $record->ClassName;
				$publishedRecord = $record->newClassInstance($newClass);

				return $this->tellBrowserAboutPublicationChange($publishedRecord, "Published '$record->Title' successfully");
			} else {
				// BUGFIX: Changed icon only shows after Save button is clicked twice http://support.silverstripe.com/gsoc/ticket/76
				$title = Convert::raw2js($record->TreeTitle());
				FormResponse::add("$('sitetree').setNodeTitle(\"$record->ID\", \"$title\");");
				$result .= $this->getActionUpdateJS($record);
				FormResponse::status_message($message, "good");
				FormResponse::update_status($record->Status);
				return FormResponse::respond();
			}
		}
	}

	/**
	 * Return a piece of javascript that will update the actions of the main form
	 */
	public function getActionUpdateJS($record) {
		// Get the new action buttons
		
		$tempForm = $this->getEditForm($record->ID);
		$actionList = '';
		foreach($tempForm->Actions() as $action) {
			$actionList .= $action->Field() . ' ';
		}

		FormResponse::add("$('Form_EditForm').loadActionsFromString('" . Convert::raw2js($actionList) . "');");

		return FormResponse::respond();
	}

	/**
	 * Return JavaScript code to generate a tree node for the given page, if visible
	 */
	public function addTreeNodeJS($page, $select = false) {
		$parentID = (int)$page->ParentID;
		$title = Convert::raw2js($page->TreeTitle());
		$response = <<<JS
var newNode = $('sitetree').createTreeNode($page->ID, "$title", "$page->class");
var parentNode = $('sitetree').getTreeNodeByIdx($parentID); 
if(parentNode) parentNode.appendTreeNode(newNode);
JS;
		$response .= ($select ? "newNode.selectTreeNode();\n" : "") ;
		FormResponse::add($response);
		return FormResponse::respond();
	}
	/**
	 * Return JavaScript code to remove a tree node for the given page, if it exists.
	 */
	public function deleteTreeNodeJS($page) {
		$id = $page->ID ? $page->ID : $page->OldID;
		$response = <<<JS
var node = $('sitetree').getTreeNodeByIdx($id);
if(node && node.parentTreeNode) node.parentTreeNode.removeTreeNode(node);
$('Form_EditForm').closeIfSetTo($id);
JS;
		FormResponse::add($response);
		return FormResponse::respond();
	}

	/**
	 * Sets a static variable on this class which means the panel will be reloaded.
	 */
	static function ForceReload(){
		self::$ForceReload = true;
	}

	/**
	 * Ajax handler for updating the parent of a tree node
	 */
	public function ajaxupdateparent() {
		$id = $_REQUEST['ID'];
		$parentID = $_REQUEST['ParentID'];
		if($parentID == 'root'){
			$parentID = 0;
		}
		$_REQUEST['ajax'] = 1;

		if(is_numeric($id) && is_numeric($parentID) && $id != $parentID) {
			$node = DataObject::get_by_id($this->stat('tree_class'), $id);
			if($node){
				$node->ParentID = $parentID;
				$node->Status = "Saved (update)";
				$node->write();

				if(is_numeric($_REQUEST['CurrentlyOpenPageID'])) {
					$currentPage = DataObject::get_by_id($this->stat('tree_class'), $_REQUEST['CurrentlyOpenPageID']);
					if($currentPage) {
						$cleanupJS = $currentPage->cmsCleanup_parentChanged();
					}
				}

				FormResponse::status_message(_t('LeftAndMain.SAVED','saved'), 'good');
				FormResponse::add($cleanupJS);

			}else{
				FormResponse::status_message(_t('LeftAndMain.PLEASESAVE',"Please Save Page: This page could not be upated because it hasn't been saved yet."),"good");
			}


			return FormResponse::respond();
		} else {
			user_error("Error in ajaxupdateparent request; id=$id, parentID=$parentID", E_USER_ERROR);
		}
	}

	/**
	 * Ajax handler for updating the order of a number of tree nodes
	 * $_GET[ID]: An array of node ids in the correct order
	 * $_GET[MovedNodeID]: The node that actually got moved
	 */
	public function ajaxupdatesort() {
		$className = $this->stat('tree_class');
		$counter = 0;
		$js = '';
		$_REQUEST['ajax'] = 1;

		if(is_array($_REQUEST['ID'])) {
			if($_REQUEST['MovedNodeID']==0){ //Sorting root
				$movedNode = DataObject::get($className, "`ParentID`=0");				
			}else{
				$movedNode = DataObject::get_by_id($className, $_REQUEST['MovedNodeID']);
			}
			foreach($_REQUEST['ID'] as $id) {
				if($id == $movedNode->ID) {
					$movedNode->Sort = ++$counter;
					$movedNode->Status = "Saved (update)";
					$movedNode->write();

					$title = Convert::raw2js($movedNode->TreeTitle());
					$js .="$('sitetree').setNodeTitle($movedNode->ID, \"$title\");\n";

				// Nodes that weren't "actually moved" shouldn't be registered as having been edited; do a direct SQL update instead
				} else if(is_numeric($id)) {
					++$counter;
					DB::query("UPDATE `$className` SET `Sort` = $counter WHERE `ID` = '$id'");
				}
			}
			// Virtual pages require selected to be null if the page is the same.
			FormResponse::add(
				"if( $('sitetree').selected && $('sitetree').selected[0]){
					var idx =  $('sitetree').selected[0].getIdx();
					if(idx){
						$('Form_EditForm').getPageFromServer(idx);
					}
				}\n" . $js
			);
			FormResponse::status_message(_t('LeftAndMain.SAVED'), 'good');
		} else {
			FormResponse::error(_t('LeftAndMain.REQUESTERROR',"Error in request"));
		}

		return FormResponse::respond();
	}

	/**
	 * Delete a number of items
	 */
	public function deleteitems() {
		$ids = split(' *, *', $_REQUEST['csvIDs']);

		$script = "st = \$('sitetree'); \n";
		foreach($ids as $id) {
			if(is_numeric($id)) {
				DataObject::delete_by_id($this->stat('tree_class'), $id);
				$script .= "node = st.getTreeNodeByIdx($id); if(node) node.parentTreeNode.removeTreeNode(node); $('Form_EditForm').closeIfSetTo($id); \n";
			}
		}
		FormResponse::add($script);

		return FormResponse::respond();
	}

	public function EditForm() {
		$id = isset($_REQUEST['ID']) ? $_REQUEST['ID'] : $this->currentPageID();
		if($id) return $this->getEditForm($id);
	}
	
	public function myprofile() {
		$form = $this->Member_ProfileForm();
		return $this->customise(array(
			'Form' => $form
		))->renderWith('BlankPage');
	}
	
	public function Member_ProfileForm() {
		return new Member_ProfileForm($this, 'Member_ProfileForm', Member::currentUser());
	}

	public function printable() {
		$id = $_REQUEST['ID'] ? $_REQUEST['ID'] : $this->currentPageID();

		if($id) $form = $this->getEditForm($id);
		$form->transform(new PrintableTransformation());
		$form->actions = null;

		Requirements::clear();
		Requirements::css('cms/css/LeftAndMain_printable.css');
		return array(
			"PrintForm" => $form
		);
	}

	public function currentPageID() {
		if(isset($_REQUEST['ID']) && is_numeric($_REQUEST['ID']))	{
			return $_REQUEST['ID'];
		} elseif (isset($this->urlParams['ID']) && is_numeric($this->urlParams['ID'])) {
			return $this->urlParams['ID'];
		} elseif(Session::get("{$this->class}.currentPage")) {
			return Session::get("{$this->class}.currentPage");
		} else {
			return null;
		}
	}

	public function setCurrentPageID($id) {
		Session::set("{$this->class}.currentPage", $id);
	}

	public function currentPage() {
		$id = $this->currentPageID();
		if($id && is_numeric($id)) {
			return DataObject::get_by_id($this->stat('tree_class'), $id);
		}
	}

	public function isCurrentPage(DataObject $page) {
		return $page->ID == Session::get("{$this->class}.currentPage");
	}

	/**
	 * Return the CMS's HTML-editor toolbar
	 */
	public function EditorToolbar() {
		return Object::create('HtmlEditorField_Toolbar', $this, "EditorToolbar");
	}

	/**
	 * Return the version number of this application
	 */
	public function CMSVersion() {
		$sapphireVersionFile = file_get_contents('../sapphire/silverstripe_version');
		$jspartyVersionFile = file_get_contents('../jsparty/silverstripe_version');
		$cmsVersionFile = file_get_contents('../cms/silverstripe_version');

		if(strstr($sapphireVersionFile, "/sapphire/trunk")) {
			$sapphireVersion = "trunk";
		} else {
			preg_match("/sapphire\/(?:(?:branches)|(?:tags))(?:\/rc)?\/([A-Za-z0-9._-]+)\/silverstripe_version/", $sapphireVersionFile, $matches);
			$sapphireVersion = $matches[1];
		}

		if(strstr($jspartyVersionFile, "/jsparty/trunk")) {
			$jspartyVersion = "trunk";
		} else {
			preg_match("/jsparty\/(?:(?:branches)|(?:tags))(?:\/rc)?\/([A-Za-z0-9._-]+)\/silverstripe_version/", $jspartyVersionFile, $matches);
			$jspartyVersion = $matches[1];
		}

		if(strstr($cmsVersionFile, "/cms/trunk")) {
			$cmsVersion = "trunk";
		} else {
			preg_match("/cms\/(?:(?:branches)|(?:tags))(?:\/rc)?\/([A-Za-z0-9._-]+)\/silverstripe_version/", $cmsVersionFile, $matches);
			$cmsVersion = $matches[1];
		}

		if($sapphireVersion == $jspartyVersion && $jspartyVersion == $cmsVersion) {
			return $sapphireVersion;
		}	else {
			return "cms: $cmsVersion, sapphire: $sapphireVersion, jsparty: $jspartyVersion";
		}
	}

	/**
	 * The application name. Customisable by calling
	 * LeftAndMain::setApplicationName() - the first parameter.
	 * 
	 * @var String
	 */
	static $application_name = 'SilverStripe CMS';
	
	/**
	 * The application logo text. Customisable by calling
	 * LeftAndMain::setApplicationName() - the second parameter.
	 *
	 * @var String
	 */
	static $application_logo_text = 'SilverStripe';

	/**
	 * Set the application name, and the logo text.
	 *
	 * @param String $name The application name
	 * @param String $logoText The logo text
	 */
	static $application_link = "http://www.silverstripe.com/";
	static function setApplicationName($name, $logoText = null, $link = null) {
		self::$application_name = $name;
		self::$application_logo_text = $logoText ? $logoText : $name;
		if($link) self::$application_link = $link;
	}

	/**
	 * Get the application name.
	 * @return String
	 */
	function getApplicationName() {
		return self::$application_name;
	}
	
	/**
	 * Get the application logo text.
	 * @return String
	 */
	function getApplicationLogoText() {
		return self::$application_logo_text;
	}
	function ApplicationLink() {
		return self::$application_link;
	}

	/**
	 * The application logo path. Customisable by calling
	 * LeftAndMain::setLogo() - the first parameter.
	 *
	 * @var unknown_type
	 */
	static $application_logo = 'cms/images/mainmenu/logo.gif';

	/**
	 * The application logo style. Customisable by calling
	 * LeftAndMain::setLogo() - the second parameter.
	 *
	 * @var String
	 */
	static $application_logo_style = '';
	
	/**
	 * Set the CMS application logo.
	 *
	 * @param String $logo Relative path to the logo
	 * @param String $logoStyle Custom CSS styles for the logo
	 * 							e.g. "border: 1px solid red; padding: 5px;"
	 */
	static function setLogo($logo, $logoStyle) {
		self::$application_logo = $logo;
		self::$application_logo_style = $logoStyle;
		self::$application_logo_text = '';
	}
	
	protected static $loading_image = 'cms/images/loading.gif';
	
	/**
	 * Set the image shown when the CMS is loading.
	 */
	static function set_loading_image($loadingImage) {
		self::$loading_image = $loadingImage;
	}
	
	function LoadingImage() {
		return self::$loading_image;
	}
	
	function LogoStyle() {
		return "background: url(" . self::$application_logo . ") no-repeat; " . self::$application_logo_style;
	}

	/**
	 * Return the base directory of the tiny_mce codebase
	 */
	function MceRoot() {
		return MCE_ROOT;
	}

	/**
	 * Use this as an action handler for custom CMS buttons.
	 */
	function callPageMethod($data, $form) {
		$methodName = $form->buttonClicked()->extraData();
		$record = $this->CurrentPage();
		return $record->$methodName($data, $form);		
	}
	
	/**
	 * Generate the default entries for the CMS main menu.
	 */
	public static function populate_default_menu() {
		self::add_menu_item(
			"content",
			_t('LeftAndMain.SITECONTENT',"Site Content",PR_HIGH,"Menu title"),
			"admin/",
			"CMSMain"
		);
		self::add_menu_item(
			"files",
			_t('LeftAndMain.FILESIMAGES',"Files & Images",PR_HIGH,"Menu title"),
			"admin/assets/", 
			"AssetAdmin"
		);
		if(ReportAdmin::has_reports()) {
			self::add_menu_item(
				"report", 
				_t('LeftAndMain.REPORTS',"Reports",PR_HIGH,'Menu title'),
				"admin/reports/", 
				"ReportAdmin"
			);
		}
		self::add_menu_item(
			"security", 
			_t('LeftAndMain.SECURITY',"Security",PR_HIGH,'Menu title'),
			"admin/security/", 
			"SecurityAdmin"
		);
		self::add_menu_item(
			"comments", 
			_t('LeftAndMain.COMMENTS',"Comments",PR_HIGH,'Menu title'),
			"admin/comments/", 
			"CommentAdmin"
		);
		self::add_menu_item(
			"help",	
			_t('LeftAndMain.HELP',"Help",PR_HIGH,'Menu title'), 
			"http://userhelp.silverstripe.com"
		);
	}
	
	/**
	 * Add a navigation item to the main administration menu showing in the top bar.
	 *
	 * @param string $code Unique identifier for this menu item (e.g. used by {@link replace_menu_item()} and
	 * 					{@link remove_menu_item}. Also used as a CSS-class for icon customization.
	 * @param string $menuTitle Localized title showing in the menu bar 
	 * @param string $url A relative URL that will be linked in the menu bar.
	 * 					Make sure to add a matching route via {@link Director::addRules()} to this url.
	 * @param string $controllerClass The controller class for this menu, used to check permisssions.  
	 * 					If blank, it's assumed that this is public, and always shown to users who 
	 * 					have the rights to access some other part of the admin area.
	 * @return boolean Success
	 */
	public static function add_menu_item($code, $menuTitle, $url, $controllerClass = null) {
		$menuItems = singleton('LeftAndMain')->stat('menu_items', true);
		
		if(isset($menuItems[$code])) return false;
		/*
		if(isset($menuItems[$code])) {
			user_error("LeftAndMain::add_menu_item(): A menu item with code '{$menuItems}' 
				already exists, can't add it. Please use replace_menu_item() to explicitly replace it", 
				E_USER_ERROR
			);
		}
		*/
		
		return self::replace_menu_item($code, $menuTitle, $url, $controllerClass);
	}
	
	/**
	 * Get a single menu item by its code value.
	 *
	 * @param string $code
	 * @return array
	 */
	public static function get_menu_item($code) {
		$menuItems = singleton('LeftAndMain')->stat('menu_items', true);
		return (isset($menuItems[$code])) ? $menuItems[$code] : false; 
	}
	
	/**
	 * Get all menu entries.
	 *
	 * @return array
	 */
	public static function get_menu_items() {
		return singleton('LeftAndMain')->stat('menu_items', true);
	}
	
	/**
	 * Removes an existing item from the menu.
	 *
	 * @param string $code Unique identifier for this menu item
	 */
	public static function remove_menu_item($code) {
		$menuItems = singleton('LeftAndMain')->stat('menu_items', true);
		if(isset($menuItems[$code])) unset($menuItems[$code]);
		// replace the whole array
		Object::addStaticVars(
			'LeftAndMain', 
			array('menu_items' => $menuItems),
			true
		);
	}
	
	/**
	 * Clears the entire menu
	 *
	 */
	public static function clear_menu() {
		Object::addStaticVars(
			'LeftAndMain', 
			array('menu_items' => array()),
			true
		);
	}

	/**
	 * Replace a navigation item to the main administration menu showing in the top bar.
	 *
	 * @param string $code Unique identifier for this menu item (e.g. used by {@link replace_menu_item()} and
	 * 					{@link remove_menu_item}. Also used as a CSS-class for icon customization.
	 * @param string $menuTitle Localized title showing in the menu bar 
	 * @param string $url A relative URL that will be linked in the menu bar.
	 * 					Make sure to add a matching route via {@link Director::addRules()} to this url.
	 * @param string $controllerClass The controller class for this menu, used to check permisssions.  
	 * 					If blank, it's assumed that this is public, and always shown to users who 
	 * 					have the rights to access some other part of the admin area.
	 * @return boolean Success
	 */
	public static function replace_menu_item($code, $menuTitle, $url, $controllerClass = null) {
		$menuItems = singleton('LeftAndMain')->stat('menu_items', true);
		$menuItems[$code] = array(
			'title' => $menuTitle, 
			'url' => $url, 
			'controllerClass' => $controllerClass
		);
		Object::addStaticVars(
			'LeftAndMain', 
			array('menu_items' => $menuItems),
			true
		);
		
		return true;
	}
	
	/**
	 * Register the given javascript file as required in the CMS.
	 * Filenames should be relative to the base, eg, 'sapphire/javascript/loader.js'
	 */
	public static function require_javascript($file) {
		self::$extra_requirements['javascript'][] = array($file);
	}
	
	/**
	 * Register the given stylesheet file as required.
	 * 
	 * @param $file String Filenames should be relative to the base, eg, 'jsparty/tree/tree.css'
	 * @param $media String Comma-separated list of media-types (e.g. "screen,projector") 
	 * @see http://www.w3.org/TR/REC-CSS2/media.html
	 */
	public static function require_css($file, $media = null) {
		self::$extra_requirements['css'][] = array($file, $media);
	}
	
	/**
	 * Register the given "themeable stylesheet" as required.
	 * Themeable stylesheets have globally unique names, just like templates and PHP files.
	 * Because of this, they can be replaced by similarly named CSS files in the theme directory.
	 * 
	 * @param $name String The identifier of the file.  For example, css/MyFile.css would have the identifier "MyFile"
	 * @param $media String Comma-separated list of media-types (e.g. "screen,projector") 
	 */
	static function require_themed_css($name, $media = null) {
		self::$extra_requirements['themedcss'][] = array($name, $media);
	}
	
}

?>