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
	
	/**
	 * The 'base' url for CMS administration areas.
	 * Note that if this is changed, many javascript
	 * behaviours need to be updated with the correct url
	 *
	 * @var string $url_base
	 */
	static $url_base = "admin";
	
	static $url_segment;
	
	static $url_rule = '/$Action/$ID/$OtherID';
	
	static $menu_title;
	
	static $menu_priority = 0;
	
	static $url_priority = 50;

	/**
	 * @var string A subclass of {@link DataObject}. 
	 * Determines what is managed in this interface,
	 * through {@link getEditForm()} and other logic.
	 */
	static $tree_class = null;

	static $allowed_actions = array(
		'index',
		'ajaxupdateparent',
		'ajaxupdatesort',
		'getitem',
		'getsubtree',
		'myprofile',
		'printable',
		'save',
		'show',
		'Member_ProfileForm',
		'EditorToolbar',
		'EditForm',
		'BatchActionsForm',
		'batchactions',
		'AddForm',
		'doAdd'
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
	
	/**
	 * @param Member $member
	 * @return boolean
	 */
	function canView($member = null) {
		if(!$member && $member !== FALSE) {
			$member = Member::currentUser();
		}
		
		// cms menus only for logged-in members
		if(!$member) return false;
		
		// alternative decorated checks
		if($this->hasMethod('alternateAccessCheck')) {
			$alternateAllowed = $this->alternateAccessCheck();
			if($alternateAllowed === FALSE) return false;
		}
			
		// Default security check for LeftAndMain sub-class permissions
		if(!Permission::checkMember($member, "CMS_ACCESS_$this->class")) {
			return false;
		}
		
		return true;
	}
	
	/**
	 * @uses LeftAndMainDecorator->init()
	 * @uses LeftAndMainDecorator->accessedCMS()
	 * @uses CMSMenu
	 */
	function init() {
		parent::init();
		
		SSViewer::setOption('rewriteHashlinks', false);
		
		// set language
		$member = Member::currentUser();
		if(!empty($member->Locale)) {
			i18n::set_locale($member->Locale);
		}
		
		// can't be done in cms/_config.php as locale is not set yet
		CMSMenu::add_link(
			'Help', 
			_t('LeftAndMain.HELP', 'Help', PR_HIGH, 'Menu title'), 
			'http://userhelp.silverstripe.org'
		);
		
		// set reading lang
		if(Translatable::is_enabled() && !Director::is_ajax()) {
			Translatable::choose_site_locale(array_keys(Translatable::get_existing_content_languages('SiteTree')));
		}

		// Allow customisation of the access check by a decorator
		if(!$this->canView()) {
			// When access /admin/, we should try a redirect to another part of the admin rather than be locked out
			$menu = $this->MainMenu();
			foreach($menu as $candidate) {
				if(
					$candidate->Link && 
					$candidate->Link != $this->Link() 
					&& $candidate->MenuItem->controller 
					&& singleton($candidate->MenuItem->controller)->canView()
				) {
					return Director::redirect($candidate->Link);
				}
			}
			
			if(Member::currentUser()) {
				Session::set("BackURL", null);
			}
			
			// if no alternate menu items have matched, return a permission error
			$messageSet = array(
				'default' => _t('LeftAndMain.PERMDEFAULT',"Please choose an authentication method and enter your credentials to access the CMS."),
				'alreadyLoggedIn' => _t('LeftAndMain.PERMALREADY',"I'm sorry, but you can't access that part of the CMS.  If you want to log in as someone else, do so below"),
				'logInAgain' => _t('LeftAndMain.PERMAGAIN',"You have been logged out of the CMS.  If you would like to log in again, enter a username and password below."),
			);

			return Security::permissionFailure($this, $messageSet);
		}

		// Don't continue if there's already been a redirection request.
		if(Director::redirected_to()) return;

		// Audit logging hook
		if(empty($_REQUEST['executeForm']) && !Director::is_ajax()) $this->extend('accessedCMS');

		// Set the members html editor config
		HtmlEditorConfig::set_active(Member::currentUser()->getHtmlEditorConfigForCMS());

		Requirements::css(CMS_DIR . '/css/typography.css');
		Requirements::css(CMS_DIR . '/css/layout.css');
		Requirements::css(CMS_DIR . '/css/cms_left.css');
		Requirements::css(CMS_DIR . '/css/cms_right.css');
		Requirements::css(SAPPHIRE_DIR . '/css/Form.css');
		
		if(isset($_REQUEST['debug_firebug'])) {
			// Firebug is a useful console for debugging javascript
			// Its available as a Firefox extension or a javascript library
			// for easy inclusion in other browsers (just append ?debug_firebug=1 to the URL)
			Requirements::javascript(SAPPHIRE_DIR . '/thirdparty/firebug-lite/firebug.js');
		} else {
			// By default, we include fake-objects for all firebug calls
			// to avoid javascript errors when referencing console.log() etc in javascript code
			Requirements::javascript(SAPPHIRE_DIR . '/thirdparty/firebug-lite/firebugx.js');
		}
		
		Requirements::javascript(SAPPHIRE_DIR . '/javascript/prototypefix/intro.js');
		Requirements::javascript(SAPPHIRE_DIR . '/thirdparty/prototype/prototype.js');
		Requirements::javascript(SAPPHIRE_DIR . '/javascript/prototypefix/outro.js');
		
		Requirements::javascript(SAPPHIRE_DIR . '/thirdparty/jquery/jquery.js');
		Requirements::javascript(SAPPHIRE_DIR . '/javascript/jquery_improvements.js');
		Requirements::javascript(SAPPHIRE_DIR . '/thirdparty/jquery-ui/ui.core.js');
		Requirements::javascript(SAPPHIRE_DIR . '/thirdparty/jquery-ui/ui.datepicker.js');
		Requirements::javascript(SAPPHIRE_DIR . '/thirdparty/jquery-ui/ui.dialog.js');
		Requirements::javascript(SAPPHIRE_DIR . '/thirdparty/jquery-ui/ui.tabs.js');
		Requirements::javascript(SAPPHIRE_DIR . '/thirdparty/jquery-ui/ui.draggable.js');
		Requirements::javascript(SAPPHIRE_DIR . '/thirdparty/jquery-ui/ui.droppable.js');
		Requirements::javascript(SAPPHIRE_DIR . '/thirdparty/jquery-ui/ui.accordion.js');
		Requirements::javascript(SAPPHIRE_DIR . '/thirdparty/jquery-ui/effects.core.js');
		Requirements::javascript(SAPPHIRE_DIR . '/thirdparty/jquery-ui/effects.slide.js');
		Requirements::javascript(SAPPHIRE_DIR . '/thirdparty/jquery-ui/effects.drop.js');
		Requirements::javascript(SAPPHIRE_DIR . '/thirdparty/jquery-ui/effects.scale.js');
		
		
		Requirements::javascript(CMS_DIR . '/thirdparty/jquery-layout/jquery.layout.js');
		Requirements::javascript(CMS_DIR . '/thirdparty/jquery-layout/jquery.layout.state.js');
		Requirements::javascript(SAPPHIRE_DIR . '/thirdparty/json-js/json2.js');
		Requirements::javascript(CMS_DIR . '/javascript/jquery-fitheighttoparent/jquery.fitheighttoparent.js');
		
		Requirements::javascript(CMS_DIR . '/javascript/ssui.core.js');
		// @todo Load separately so the CSS files can be inlined
		Requirements::css(SAPPHIRE_DIR . '/thirdparty/jquery-ui-themes/smoothness/ui.all.css');
		
		// concrete
		Requirements::javascript(SAPPHIRE_DIR . '/thirdparty/jquery-concrete/dist/jquery.concrete-dist.js');
		
		// Required for TreeTools panel above tree
		Requirements::javascript(SAPPHIRE_DIR . '/javascript/TabSet.js');
		
		Requirements::javascript(SAPPHIRE_DIR . '/thirdparty/behaviour/behaviour.js');
		Requirements::javascript(SAPPHIRE_DIR . '/thirdparty/jquery-cookie/jquery.cookie.js');
		Requirements::javascript(CMS_DIR . '/thirdparty/jquery-notice/jquery.notice.js');
		Requirements::javascript(SAPPHIRE_DIR . '/javascript/jquery-ondemand/jquery.ondemand.js');
		Requirements::javascript(CMS_DIR . '/javascript/jquery-changetracker/lib/jquery.changetracker.js');
		Requirements::javascript(SAPPHIRE_DIR . '/javascript/prototype_improvements.js');
		Requirements::add_i18n_javascript(SAPPHIRE_DIR . '/javascript/lang');
		Requirements::add_i18n_javascript(CMS_DIR . '/javascript/lang');
		
		Requirements::javascript(SAPPHIRE_DIR . '/thirdparty/scriptaculous/effects.js');
		Requirements::javascript(SAPPHIRE_DIR . '/thirdparty/scriptaculous/dragdrop.js');
		Requirements::javascript(SAPPHIRE_DIR . '/thirdparty/scriptaculous/controls.js');
		
		Requirements::javascript(THIRDPARTY_DIR . '/tree/tree.js');
		Requirements::css(THIRDPARTY_DIR . '/tree/tree.css');
		
		Requirements::javascript(CMS_DIR . '/javascript/LeftAndMain.js');
		Requirements::javascript(CMS_DIR . '/javascript/LeftAndMain.Tree.js');
		Requirements::javascript(CMS_DIR . '/javascript/LeftAndMain.EditForm.js');
		Requirements::javascript(CMS_DIR . '/javascript/LeftAndMain.AddForm.js');
		Requirements::javascript(CMS_DIR . '/javascript/LeftAndMain.BatchActions.js');
		
		Requirements::themedCSS('typography');

		foreach (self::$extra_requirements['javascript'] as $file) {
			Requirements::javascript($file[0]);
		}
		
		foreach (self::$extra_requirements['css'] as $file) {
			Requirements::css($file[0], $file[1]);
		}
		
		foreach (self::$extra_requirements['themedcss'] as $file) {
			Requirements::css($file[0], $file[1]);
		}
		
		Requirements::css(CMS_DIR . '/css/unjquery.css');
		
		// Javascript combined files
		Requirements::combine_files(
			'assets/base.js',
			array(
				'sapphire/thirdparty/prototype/prototype.js',
				'sapphire/thirdparty/behaviour/behaviour.js',
				'sapphire/javascript/prototype_improvements.js',
				'sapphire/thirdparty/jquery/jquery.js',
				'sapphire/thirdparty/jquery-livequery/jquery.livequery.js',
				'sapphire/javascript/jquery-ondemand/jquery.ondemand.js',
				'sapphire/javascript/jquery_improvements.js',
				'sapphire/thirdparty/firebug-lite/firebug.js',
				'sapphire/thirdparty/firebug-lite/firebugx.js',
				'sapphire/javascript/i18n.js',
			)
		);

		Requirements::combine_files(
			'assets/leftandmain.js',
			array(
				'sapphire/thirdparty/scriptaculous/effects.js',
				'sapphire/thirdparty/scriptaculous/dragdrop.js',
				'sapphire/thirdparty/scriptaculous/controls.js',
				'cms/javascript/LeftAndMain.js',
				'sapphire/javascript/tree/tree.js',
				'cms/javascript/TinyMCEImageEnhancement.js',
				'sapphire/thirdparty/swfupload/swfupload/swfupload.js',
				'cms/javascript/Upload.js',
				'cms/javascript/TinyMCEImageEnhancement.js',
				'sapphire/javascript/TreeSelectorField.js',
		 		'cms/javascript/ThumbnailStripField.js',
			)
		);

		Requirements::combine_files(
			'assets/cmsmain.js',
			array(
				'cms/javascript/CMSMain_left.js',
				'cms/javascript/CMSMain_right.js',
			)
		);

		// DEPRECATED 2.3: Use init()
		$dummy = null;
		$this->extend('augmentInit', $dummy);
		
		$dummy = null;
		$this->extend('init', $dummy);
	}

	//------------------------------------------------------------------------------------------//
	// Main controllers

	/**
	 * You should implement a Link() function in your subclass of LeftAndMain,
	 * to point to the URL of that particular controller.
	 * 
	 * @return string
	 */
	public function Link($action = null) {
		// Handle missing url_segments
		if(!$this->stat('url_segment', true))
			self::$url_segment = $this->class;
		return Controller::join_links(
			$this->stat('url_base', true),
			$this->stat('url_segment', true),
			'/', // trailing slash needed if $action is null!
			"$action"
		);
	}
	
	/**
	 * Returns the menu title for the given LeftAndMain subclass.
	 * Implemented static so that we can get this value without instantiating an object.
	 * Menu title is *not* internationalised.
	 */
	static function menu_title_for_class($class) {
		$title = eval("return $class::\$menu_title;");
		if(!$title) $title = preg_replace('/Admin$/', '', $class);
		return $title;
	}

	public function show($request) {
		// TODO Necessary for TableListField URLs to work properly
		if($request->param('ID')) $this->setCurrentPageID($request->param('ID'));
		
		if(Director::is_ajax()) {
			SSViewer::setOption('rewriteHashlinks', false);
			$form = $this->getEditForm($request->param('ID'));
			return $form->formHtmlContent();
		} else {
			// Rendering is handled by template, which will call EditForm() eventually
			return $this->renderWith($this->getViewer('show'));
		}
	}

	/**
	 * @deprecated 2.4 Please use show()
	 */
	public function getitem($request) {
		$form = $this->getEditForm($request->getVar('ID'));
		if($form) return $form->formHtmlContent();
		else return "";
	}

	//------------------------------------------------------------------------------------------//
	// Main UI components

	/**
	 * Returns the main menu of the CMS.  This is also used by init() 
	 * to work out which sections the user has access to.
	 * 
	 * @return DataObjectSet
	 */
	public function MainMenu() {
		// Don't accidentally return a menu if you're not logged in - it's used to determine access.
		if(!Member::currentUser()) return new DataObjectSet();

		// Encode into DO set
		$menu = new DataObjectSet();
		$menuItems = CMSMenu::get_viewable_menu_items();
		if($menuItems) foreach($menuItems as $code => $menuItem) {
			// alternate permission checks (in addition to LeftAndMain->canView())
			if(
				isset($menuItem->controller) 
				&& $this->hasMethod('alternateMenuDisplayCheck')
				&& !$this->alternateMenuDisplayCheck($menuItem->controller)
			) {
				continue;
			}

			$linkingmode = "";
			
			if(strpos($this->Link(), $menuItem->url) !== false) {
				if($this->Link() == $menuItem->url) {
					$linkingmode = "current";
				
				// default menu is the one with a blank {@link url_segment}
				} else if(singleton($menuItem->controller)->stat('url_segment') == '') {
					if($this->Link() == $this->stat('url_base').'/') $linkingmode = "current";

				} else {
					$linkingmode = "current";
				}
			}
		
			// already set in CMSMenu::populate_menu(), but from a static pre-controller
			// context, so doesn't respect the current user locale in _t() calls - as a workaround,
			// we simply call LeftAndMain::menu_title_for_class() again 
			// if we're dealing with a controller
			if($menuItem->controller) {
				$defaultTitle = LeftAndMain::menu_title_for_class($menuItem->controller);
				$title = _t("{$menuItem->controller}.MENUTITLE", $defaultTitle);
			} else {
				$title = $menuItem->title;
			}
			
			$menu->push(new ArrayData(array(
				"MenuItem" => $menuItem,
				"Title" => Convert::raw2xml($title),
				"Code" => $code,
				"Link" => $menuItem->url,
				"LinkingMode" => $linkingmode
			)));
		}
		
		// if no current item is found, assume that first item is shown
		//if(!isset($foundCurrent)) 
		return $menu;
	}

	public function CMSTopMenu() {
		return $this->renderWith(array('CMSTopMenu_alternative','CMSTopMenu'));
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

	public function getRecord($id, $className = null) {
		if($id && is_numeric($id)) {
			if(!$className) $className = $this->stat('tree_class');
			return DataObject::get_by_id($className, $id);
		}
	}
	
	public function SiteTreeAsUL() {
		return $this->getSiteTreeFor($this->stat('tree_class'));
	}

	/**
	 * Get a site tree displaying the nodes under the given objects.
	 * 
	 * @param $className The class of the root object
	 * @param $rootID The ID of the root object.  If this is null then a complete tree will be
	 *  shown
	 * @param $childrenMethod The method to call to get the children of the tree. For example,
	 *  Children, AllChildrenIncludingDeleted, or AllHistoricalChildren
	 */
	function getSiteTreeFor($className, $rootID = null, $childrenMethod = null, $filterFunction = null, $minNodeCount = 30) {
		// Default childrenMethod
		if (!$childrenMethod) $childrenMethod = 'AllChildrenIncludingDeleted';
		
		// Get the tree root
		$obj = $rootID ? $this->getRecord($rootID) : singleton($className);
		
		// Mark the nodes of the tree to return
		if ($filterFunction) $obj->setMarkingFilterFunction($filterFunction);

		$obj->markPartialTree($minNodeCount, $this, $childrenMethod);
		
		// Ensure current page is exposed
		if($p = $this->currentPage()) $obj->markToExpose($p);
		
		// NOTE: SiteTree/CMSMain coupling :-(
		SiteTree::prepopuplate_permission_cache('edit', $obj->markedNodeIDs());
		SiteTree::prepopuplate_permission_cache('delete', $obj->markedNodeIDs());

		// getChildrenAsUL is a flexible and complex way of traversing the tree
		$titleEval = '
			"<li id=\"record-$child->ID\" class=\"" . $child->CMSTreeClasses($extraArg) . "\">" .
			"<a href=\"" . Director::link(substr($extraArg->Link(),0,-1), "show", $child->ID) . "\" class=\"" . $child->CMSTreeClasses($extraArg) . "\" title=\"' 
			. _t('LeftAndMain.PAGETYPE','Page type: ') 
			. '".$child->class."\" >" . ($child->TreeTitle) . 
			"</a>"
		';

		$siteTree = $obj->getChildrenAsUL(
			"", 
			$titleEval,
			$this, 
			true, 
			$childrenMethod,
			$minNodeCount
		);

		// Wrap the root if needs be.
		if(!$rootID) {
			$rootLink = '#';
			
			// This lets us override the tree title with an extension
			if($this->hasMethod('getCMSTreeTitle')) $treeTitle = $this->getCMSTreeTitle();
			else $treeTitle =  _t('LeftAndMain.SITECONTENTLEFT',"Site Content",PR_HIGH,'Root node on left');
			
			$siteTree = "<ul id=\"sitetree\" class=\"tree unformatted\"><li id=\"record-0\" class=\"Root nodelete\"><a href=\"$rootLink\"><strong>$treeTitle</strong></a>"
				. $siteTree . "</li></ul>";
		}

		return $siteTree;
	}

	/**
	 * Get a subtree underneath the request param 'ID'.
	 * If ID = 0, then get the whole tree.
	 */
	public function getsubtree($request) {
		$tree = $this->getSiteTreeFor(
			$this->stat('tree_class'), 
			$request->getVar('ID'), 
			null, 
			null, 
			$request->getVar('minNodeCount')
		);

		// Trim off the outer tag
		$tree = ereg_replace('^[ \t\r\n]*<ul[^>]*>','', $tree);
		$tree = ereg_replace('</ul[^>]*>[ \t\r\n]*$','', $tree);
		
		return $tree;
	}

	/**
	 * @param array $params
	 * @return LeftAndMainMarkingFilter
	 */
	protected function getMarkingFilter($params) {
		return new LeftAndMainMarkingFilter($params);
	}
	
	/**
	 * Save  handler
	 */
	public function save($data, $form) {
		$className = $this->stat('tree_class');

		// Existing or new record?
		$SQL_id = Convert::raw2sql($data['ID']);
		if(substr($SQL_id,0,3) != 'new') {
			$record = DataObject::get_by_id($className, $SQL_id);
			if($record && !$record->canEdit()) return Security::permissionFailure($this);
		} else {
			if(!singleton($this->stat('tree_class'))->canCreate()) return Security::permissionFailure($this);
			$record = $this->getNewItem($SQL_id, false);
		}
		
		// save form data into record
		$form->saveInto($record, true);
		$record->write();
		$this->extend('onAfterSave', $record);

		$this->response->addHeader('X-Status', _t('LeftAndMain.SAVEDUP'));
		
		// write process might've changed the record, so we reload before returning
		$form->loadDataFrom($record);
		
		return $form->formHtmlContent();
	}
	
	/** 
	 * Return a javascript snippet that hides a page type from Create dropdownfield 
	 * if it's a single_instance_only page type and has been created in the site tree
	 */
	protected function hideSingleInstanceOnlyFromCreateFieldJS($createdPage) {
		// Prepare variable to single_instance_only checking in javascript
		$pageClassName = $createdPage->class;
		$singleInstanceCSSClass = "";
		$singleInstanceClassSelector = "." . $createdPage->stat('single_instance_only_css_class');
		if ($createdPage->stat('single_instance_only')) {
			$singleInstanceCSSClass = $createdPage->stat('single_instance_only_css_class');
		}
		
		return <<<JS
			// if the current page type that was created is single_instance_only, 
			// hide it from the create dropdownlist afterward
			singleSingleOnlyOfThisPageType = jQuery("#sitetree li.{$pageClassName}{$singleInstanceClassSelector}");
			
			if (singleSingleOnlyOfThisPageType.length > 0) {
				jQuery("#" + _HANDLER_FORMS.addpage + " option[@value={$pageClassName}]").remove();
			}
JS;
	}
	
	/** 
	 * Return a javascript snippet that that shows a single_instance_only page type 
	 * in Create dropdownfield if there isn't any of its instance in the site tree
	 */
	protected function showSingleInstanceOnlyInCreateFieldJS($deletedPage) {
		$className = $deletedPage->class;
		$singularName = $deletedPage->singular_name();
		$singleInstanceClassSelector = "." . $deletedPage->stat('single_instance_only_css_class');
		return <<<JS
// show the hidden single_instance_only page type in the create dropdown field
singleSingleOnlyOfThisPageType = jQuery("#sitetree li.{$className}{$singleInstanceClassSelector}");

if (singleSingleOnlyOfThisPageType.length == 0) {	
	if(jQuery("#" + _HANDLER_FORMS.addpage + " option[@value={$className}]").length == 0) {
		jQuery("#" + _HANDLER_FORMS.addpage + " select option").each(function(){
			if ("{$singularName}".toLowerCase() >= jQuery(this).val().toLowerCase()) {
				jQuery("<option value=\"{$className}\">{$singularName}</option>").insertAfter(this);
			}
		});
	}
}
JS;
	}

	/**
	 * Ajax handler for updating the parent of a tree node
	 */
	public function ajaxupdateparent($request) {
		if (!Permission::check('SITETREE_REORGANISE') && !Permission::check('ADMIN')) {
			$this->response->setStatusCode(
				403,
				_t('LeftAndMain.CANT_REORGANISE',"You do not have permission to rearange the site tree. Your change was not saved.")
			);
			return;
		}

		$id = $request->requestVar('ID');
		$parentID = $request->requestVar('ParentID');
		$statusUpdates = array('modified'=>array());

		if(is_numeric($id) && is_numeric($parentID) && $id != $parentID) {
			$node = DataObject::get_by_id($this->stat('tree_class'), $id);
			if($node){
				if($node && !$node->canEdit()) return Security::permissionFailure($this);
			
				$node->ParentID = $parentID;
				$node->write();
			
				$statusUpdates['modified'][$node->ID] = array(
					'TreeTitle'=>$node->TreeTitle
				);

				$this->response->addHeader(
					'X-Status',
					_t('LeftAndMain.SAVED','saved')
				);
			}else{
				$this->response->setStatusCode(
					500,
					_t(
						'LeftAndMain.PLEASESAVE',
						"Please Save Page: This page could not be upated because it hasn't been saved yet."
					)
				);
			}
		}
		
		return Convert::raw2json($statusUpdates);
	}

	/**
	 * Ajax handler for updating the order of a number of tree nodes
	 * $_GET[ID]: An array of node ids in the correct order
	 * $_GET[MovedNodeID]: The node that actually got moved
	 */
	public function ajaxupdatesort($request) {
		if (!Permission::check('SITETREE_REORGANISE') && !Permission::check('ADMIN')) {
			$this->response->setStatusCode(
				403,
				_t('LeftAndMain.CANT_REORGANISE',"You do not have permission to rearange the site tree. Your change was not saved.")
			);
			return;
		}

		$className = $this->stat('tree_class');
		$counter = 0;
		$statusUpdates = array('modified'=>array());

		if(!is_array($request->requestVar('ID'))) return false;
		
		//Sorting root
		if($request->requestVar('MovedNodeID')==0){ 
			$movedNode = DataObject::get($className, "\"ParentID\"=0");				
		}else{
			$movedNode = DataObject::get_by_id($className, $request->requestVar('MovedNodeID'));
		}
		foreach($request->requestVar('ID') as $id) {
			if($id == $movedNode->ID) {
				$movedNode->Sort = ++$counter;
				$movedNode->write();
				$statusUpdates['modified'][$movedNode->ID] = array(
					'TreeTitle'=>$movedNode->TreeTitle
				);
			} else if(is_numeric($id)) {
				// Nodes that weren't "actually moved" shouldn't be registered as 
				// having been edited; do a direct SQL update instead
				++$counter;
				DB::query("UPDATE \"$className\" SET \"Sort\" = $counter WHERE \"ID\" = '$id'");
			}
		}

		return Convert::raw2json($statusUpdates);
	}

	public function CanOrganiseSitetree() {
		return !Permission::check('SITETREE_REORGANISE') && !Permission::check('ADMIN') ? false : true;
	}
	
	/**
	 * Retrieves an edit form, either for display, or to process submitted data.
	 * Also used in the template rendered through {@link Right()} in the $EditForm placeholder.
	 * 
	 * This is a "pseudo-abstract" methoed, usually connected to a {@link getEditForm()}
	 * method in a concrete subclass. This method can accept a record identifier,
	 * selected either in custom logic, or through {@link currentPageID()}. 
	 * The form usually construct itself from {@link DataObject->getCMSFields()} 
	 * for the specific managed subclass defined in {@link LeftAndMain::$tree_class}.
	 * 
	 * @param HTTPRequest $request Optionally contains an identifier for the
	 *  record to load into the form.
	 * @return Form Should return a form regardless wether a record has been found.
	 *  Form might be readonly if the current user doesn't have the permission to edit
	 *  the record.
	 */
	/**
	 * @return Form
	 */
	function EditForm($request = null) {
		return $this->getEditForm();
	}

	public function getEditForm($id = null) {
		if(!$id) $id = $this->currentPageID();

		$record = ($id && $id != "root") ? $this->getRecord($id) : null;
		if($record && !$record->canView()) return Security::permissionFailure($this);

		if($record) {
			$fields = $record->getCMSFields();
			if ($fields == null) {
				user_error(
					"getCMSFields() returned null  - it should return a FieldSet object. 
					Perhaps you forgot to put a return statement at the end of your method?", 
					E_USER_ERROR
				);
			}
			
			// Add hidden fields which are required for saving the record
			// and loading the UI state
			if(!$fields->dataFieldByName('ClassName')) {
				$fields->push(new HiddenField('ClassName'));
			}
			if(
				Object::has_extension($this->stat('tree_class'), 'Hierarchy') 
				&& !$fields->dataFieldByName('ParentID')
			) {
				$fields->push(new HiddenField('ParentID'));
			}
			
			if($record->hasMethod('getAllCMSActions')) {
				$actions = $record->getAllCMSActions();
			} else {
				$actions = $record->getCMSActions();
				// add default actions if none are defined
				if(!$actions || !$actions->Count()) {
					if($record->canEdit()) {
						$actions->push(new FormAction('save',_t('CMSMain.SAVE','Save')));
					}
				}
			}
			
			$form = new Form($this, "EditForm", $fields, $actions);
			$form->loadDataFrom($record);
			
			// Add a default or custom validator.
			// @todo Currently the default Validator.js implementation
			//  adds javascript to the document body, meaning it won't
			//  be included properly if the associated fields are loaded
			//  through ajax. This means only serverside validation
			//  will kick in for pages+validation loaded through ajax.
			//  This will be solved by using less obtrusive javascript validation
			//  in the future, see http://open.silverstripe.com/ticket/2915 and
			//  http://open.silverstripe.com/ticket/3386
			if($record->hasMethod('getCMSValidator')) {
				$validator = $record->getCMSValidator();
				// The clientside (mainly LeftAndMain*.js) rely on ajax responses
				// which can be evaluated as javascript, hence we need
				// to override any global changes to the validation handler.
				$validator->setJavascriptValidationHandler('prototype');
				$form->setValidator($validator);
			} else {
				$form->unsetValidator();
			}
		
			if(!$record->canEdit()) {
				$readonlyFields = $form->Fields()->makeReadonly();
				$form->setFields($readonlyFields);
			}
		} else {
			$form = $this->EmptyForm();
		}
		
		return $form;
	}	
	
	/**
	 * Returns a placeholder form, used by {@link getEditForm()} if no record is selected.
	 * Our javascript logic always requires a form to be present in the CMS interface.
	 * 
	 * @return Form
	 */
	function EmptyForm() {
		$form = new Form(
			$this, 
			"EditForm", 
			new FieldSet(
				new HeaderField(
					'WelcomeHeader',
					$this->getApplicationName()
				),
				new LiteralField(
					'WelcomeText',
					sprintf('<p id="WelcomeMessage">%s %s. %s</p>',
						_t('LeftAndMain_right.ss.WELCOMETO','Welcome to'),
						$this->getApplicationName(),
						_t('CHOOSEPAGE','Please choose an item from the left.')
					)
				)
			), 
			new FieldSet()
		);
		$form->unsetValidator();
		
		return $form;
	}
	
	/**
	 * @return Form
	 */
	function AddForm() {
		$class = $this->stat('tree_class');
		
		$typeMap = array($class => singleton($class)->i18n_singular_name());
		$typeField = new DropdownField('Type', false, $typeMap, $class);
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
		$form->addExtraClass('actionparams');
		
		return $form;
	}
	
	/**
	 * Add a new group and return its details suitable for ajax.
	 */
	public function doAdd($data, $form) {
		$class = $this->stat('tree_class');
		
		// check create permissions
		if(!singleton($class)->canCreate()) return Security::permissionFailure($this);
		
		// check addchildren permissions
		if(
			singleton($class)->hasDatabaseField('Hierarchy') 
			&& isset($data['ParentID'])
			&& is_numeric($data['ParentID'])
		) {
			$parentRecord = DataObject::get_by_id($class, $data['ParentID']);
			if(
				$parentRecord->hasMethod('canAddChildren') 
				&& !$parentRecord->canAddChildren()
			) return Security::permissionFailure($this);
		}
		
		$record = Object::create($class);
		$form->saveInto($record);
		$record->write();

		// Used in TinyMCE inline folder creation
		if(isset($data['returnID'])) {
			return $record->ID;
		} else {
			$form = $this->getEditForm($record->ID);
			return $form->formHtmlContent();
		}
	}
	
	/**
	 * Batch Actions Handler
	 */
	function batchactions() {
		return new CMSBatchActionHandler($this, 'batchactions', $this->stat('tree_class'));
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
		$form = $this->getEditForm($this->currentPageID());
		if(!$form) return false;
		
		$form->transform(new PrintableTransformation());
		$form->actions = null;

		Requirements::clear();
		Requirements::css(CMS_DIR . '/css/LeftAndMain_printable.css');
		return array(
			"PrintForm" => $form
		);
	}

	/**
	 * Identifier for the currently shown record,
	 * in most cases a database ID. Inspects the following
	 * sources (in this order):
	 * - GET/POST parameter named 'ID'
	 * - URL parameter named 'ID'
	 * - Session value namespaced by classname, e.g. "CMSMain.currentPage"
	 * 
	 * @return int 
	 */
	public function currentPageID() {
		if($this->request->getVar('ID'))	{
			return $this->request->getVar('ID');
		} elseif ($this->request->param('ID') && is_numeric($this->request->param('ID'))) {
			return $this->request->param('ID');
		} elseif(Session::get("{$this->class}.currentPage")) {
			return Session::get("{$this->class}.currentPage");
		} else {
			return null;
		}
	}

	/**
	 * Forces the current page to be set in session,
	 * which can be retrieved later through {@link currentPageID()}.
	 * Keep in mind that setting an ID through GET/POST or
	 * as a URL parameter will overrule this value.
	 * 
	 * @param int $id
	 */
	public function setCurrentPageID($id) {
		Session::set("{$this->class}.currentPage", $id);
	}

	/**
	 * Uses {@link getRecord()} and {@link currentPageID()}
	 * to get the currently selected record.
	 * 
	 * @return DataObject
	 */
	public function currentPage() {
		return $this->getRecord($this->currentPageID());
	}

	/**
	 * Compares a given record to the currently selected one (if any).
	 * Used for marking the current tree node.
	 * 
	 * @return boolean
	 */
	public function isCurrentPage(DataObject $record) {
		return ($record->ID == $this->currentPageID());
	}
	
	/**
	 * Get the staus of a certain page and version.
	 *
	 * This function is used for concurrent editing, and providing alerts
	 * when multiple users are editing a single page. It echoes a json
	 * encoded string to the UA.
	 */

	/**
	 * Return the CMS's HTML-editor toolbar
	 */
	public function EditorToolbar() {
		return Object::create('HtmlEditorField_Toolbar', $this, "EditorToolbar");
	}

	/**
	 * Return the version number of this application.
	 * Uses the subversion path information in <mymodule>/silverstripe_version
	 * (automacially replaced $URL$ placeholder).
	 * 
	 * @return string
	 */
	public function CMSVersion() {
		$sapphireVersionFile = file_get_contents('../sapphire/silverstripe_version');
		$cmsVersionFile = file_get_contents('../cms/silverstripe_version');

		if(strstr($sapphireVersionFile, "/sapphire/trunk")) {
			$sapphireVersion = "trunk";
		} else {
			preg_match("/sapphire\/(?:(?:branches)|(?:tags))(?:\/rc)?\/([A-Za-z0-9._-]+)\/silverstripe_version/", $sapphireVersionFile, $matches);
			$sapphireVersion = ($matches) ? $matches[1] : null;
		}

		if(strstr($cmsVersionFile, "/cms/trunk")) {
			$cmsVersion = "trunk";
		} else {
			preg_match("/cms\/(?:(?:branches)|(?:tags))(?:\/rc)?\/([A-Za-z0-9._-]+)\/silverstripe_version/", $cmsVersionFile, $matches);
			$cmsVersion = ($matches) ? $matches[1] : null;
		}

		return "cms: $cmsVersion, sapphire: $sapphireVersion";
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
	static $application_link = "http://www.silverstripe.org/";
	
	/**
	 * @param String $name
	 * @param String $logoText
	 * @param String $link (Optional)
	 */
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
	
	/**
	 * @return String
	 */
	function ApplicationLink() {
		return self::$application_link;
	}

	/**
	 * Return the title of the current section, as shown on the main menu
	 */
	function SectionTitle() {
		// Get menu - use obj() to cache it in the same place as the template engine
		$menu = $this->obj('MainMenu');
		
		foreach($menu as $menuItem) {
			if($menuItem->LinkingMode == 'current') return $menuItem->Title;
		}
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
	 * Register the given javascript file as required in the CMS.
	 * Filenames should be relative to the base, eg, SAPPHIRE_DIR . '/javascript/loader.js'
	 */
	public static function require_javascript($file) {
		self::$extra_requirements['javascript'][] = array($file);
	}
	
	/**
	 * Register the given stylesheet file as required.
	 * 
	 * @param $file String Filenames should be relative to the base, eg, THIRDPARTY_DIR . '/tree/tree.css'
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

class LeftAndMainMarkingFilter {
	
	/**
	 * @var array Request params (unsanitized)
	 */
	protected $params = array();
	
	/**
	 * @param array $params Request params (unsanitized)
	 */
	function __construct($params = null) {
		$this->ids = array();
		$this->expanded = array();
		$parents = array();
		
		$q = $this->getQuery($params);
		$res = $q->execute();
		if (!$res) return;
		
		// And keep a record of parents we don't need to get parents 
		// of themselves, as well as IDs to mark
		foreach($res as $row) {
			if ($row['ParentID']) $parents[$row['ParentID']] = true;
			$this->ids[$row['ID']] = true;
		}
		
		// We need to recurse up the tree, 
		// finding ParentIDs for each ID until we run out of parents
		while (!empty($parents)) {
			$res = DB::query('SELECT "ParentID", "ID" FROM "SiteTree" WHERE "ID" in ('.implode(',',array_keys($parents)).')');
			$parents = array();

			foreach($res as $row) {
				if ($row['ParentID']) $parents[$row['ParentID']] = true;
				$this->ids[$row['ID']] = true;
				$this->expanded[$row['ID']] = true;
			}
		}
	}
	
	protected function getQuery($params) {
		$where = array();
		
		$SQL_params = Convert::raw2sql($params);
		if(isset($SQL_params['ID'])) unset($SQL_params['ID']);
		foreach($SQL_params as $name => $val) {
			switch($name) {
				default:
					// Partial string match against a variety of fields 
					if(!empty($val) && singleton("SiteTree")->hasDatabaseField($name)) {
						$where[] = "\"$name\" LIKE '%$val%'";
					}
			}
		}
		
		return new SQLQuery(
			array("ParentID", "ID"),
			'SiteTree',
			$where
		);
	}
	
	function mark($node) {
		$id = $node->ID;
		if(array_key_exists((int) $id, $this->expanded)) $node->markOpened();
		return array_key_exists((int) $id, $this->ids) ? $this->ids[$id] : false;
	}
}
?>