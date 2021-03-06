<?php
/**
 * Security section of the CMS
 * @package cms
 * @subpackage security
 */
class SecurityAdmin extends LeftAndMain implements PermissionProvider {

	static $url_segment = 'security';
	
	static $url_rule = '/$Action/$ID/$OtherID';
	
	static $menu_title = 'Security';
	
	static $tree_class = 'Group';
	
	static $subitem_class = 'Member';
	
	static $allowed_actions = array(
		'addmember',
		'autocomplete',
		'removememberfromgroup',
		'savemember',
		'AddRecordForm',
		'MemberForm',
		'EditForm',
	);

	/**
	 * @var Array
	 */
	static $hidden_permissions = array();

	public function init() {
		parent::init();

		Requirements::javascript(CMS_DIR . '/javascript/SecurityAdmin.js');
		Requirements::javascript(CMS_DIR . '/javascript/SecurityAdmin.Tree.js');
				
		CMSBatchActionHandler::register('delete', 'SecurityAdmin_DeleteBatchAction', 'Group');
	}
	
	function getEditForm($id = null) {
		$form = parent::getEditForm($id);
		$form->Actions()->insertBefore(
			new FormAction('addmember',_t('SecurityAdmin.ADDMEMBER','Add Member')),
			'action_save'
		);
		
		// Filter permissions
		$permissionField = $form->Fields()->dataFieldByName('Permissions');
		if($permissionField) $permissionField->setHiddenPermissions(self::$hidden_permissions);
		
		return $form;
	}

	public function AddRecordForm() {
		$m = Object::create('MemberTableField',
			$this,
			"Members",
			$this->currentPageID()
		);
		return $m->AddRecordForm();
	}

	/**
	 * Ajax autocompletion
	 */
	public function autocomplete() {
		$fieldName = $this->urlParams['ID'];
		$fieldVal = $_REQUEST[$fieldName];
		$result = '';

		// Make sure we only autocomplete on keys that actually exist, and that we don't autocomplete on password
		if(!singleton($this->stat('subitem_class'))->hasDatabaseField($fieldName)  || $fieldName == 'Password') return;

		$matches = DataObject::get($this->stat('subitem_class'),"\"$fieldName\" LIKE '" . Convert::raw2sql($fieldVal) . "%'");
		if($matches) {
			$result .= "<ul>";
			foreach($matches as $match) {
				if(!$match->canView()) continue;

				$data = $match->FirstName;
				$data .= ",$match->Surname";
				$data .= ",$match->Email";
				$result .= "<li>" . $match->$fieldName . "<span class=\"informal\">($match->FirstName $match->Surname, $match->Email)</span><span class=\"informal data\">$data</span></li>";
			}
			$result .= "</ul>";
			return $result;
		}
	}

	public function MemberForm() {
		$id = $_REQUEST['ID'] ? $_REQUEST['ID'] : Session::get('currentMember');
		if($id) return $this->getMemberForm($id);
	}

	public function getMemberForm($id) {
		if($id && $id != 'new') $record = DataObject::get_by_id('Member', (int) $id);
		if($record || $id == 'new') {
			$fields = new FieldSet(
				new HiddenField('MemberListBaseGroup', '', $this->currentPageID() )
			);

			if($extraFields = $record->getCMSFields()) {
				foreach($extraFields as $extra) {
					$fields->push( $extra );
				}
			}

			$fields->push($idField = new HiddenField('ID'));
			$fields->push($groupIDField = new HiddenField('GroupID'));

			$actions = new FieldSet();
			$actions->push(new FormAction('savemember', _t('SecurityAdmin.SAVE')));

			$form = new Form($this, 'MemberForm', $fields, $actions);
			if($record) $form->loadDataFrom($record);

			$idField->setValue($id);
			$groupIDField->setValue($this->currentPageID());
			
			if($record && !$record->canEdit()) {
				$readonlyFields = $form->Fields()->makeReadonly();
				$form->setFields($readonlyFields);
			}

			return $form;
		}
	}

	function savemember() {
		$data = $_REQUEST;
		$className = $this->stat('subitem_class');

		$id = $_REQUEST['ID'];
		if($id == 'new') $id = null;

		if($id) {
			$record = DataObject::get_by_id($className, $id);
			if($record && !$record->canEdit()) return Security::permissionFailure($this);
		} else {
			if(!singleton($this->stat('subitem_class'))->canCreate()) return Security::permissionFailure($this);
			$record = new $className();
		}

		$record->update($data);
		$record->ID = $id;
		$record->write();

		$record->Groups()->add($data['GroupID']);

		FormResponse::add("reloadMemberTableField();");

		return FormResponse::respond();
	}

	function addmember($className=null) {
		$data = $_REQUEST;
		unset($data['ID']);
		if($className == null) $className = $this->stat('subitem_class');

		if(!singleton($this->stat('subitem_class'))->canCreate()) return Security::permissionFailure($this);

		$record = new $className();

		$record->update($data);
		$record->write();
		
		if($data['GroupID']) $record->Groups()->add((int)$data['GroupID']);

		FormResponse::add("reloadMemberTableField();");

		return FormResponse::respond();
	}

	public function removememberfromgroup() {
		$groupID = $this->urlParams['ID'];
		$memberID = $this->urlParams['OtherID'];
		if(is_numeric($groupID) && is_numeric($memberID)) {
			$member = DataObject::get_by_id('Member', (int) $memberID);

			if(!$member->canDelete()) return Security::permissionFailure($this);

			$member->Groups()->remove((int)$groupID);

			FormResponse::add("reloadMemberTableField();");
		} else {
			user_error("SecurityAdmin::removememberfromgroup: Bad parameters: Group=$groupID, Member=$memberID", E_USER_ERROR);
		}

		return FormResponse::respond();
	}
	
	function getSiteTreeFor($className, $rootID = null, $childrenMethod = null, $filterFunction = null, $minNodeCount = 30) {
		if (!$childrenMethod) $childrenMethod = 'stageChildren';
		return parent::getSiteTreeFor($className, $rootID, $childrenMethod, $filterFunction, $minNodeCount);
	}
	
	function getCMSTreeTitle() {
		return _t('SecurityAdmin.SGROUPS', 'Security Groups');
	}

	public function EditedMember() {
		if(Session::get('currentMember')) return DataObject::get_by_id('Member', (int) Session::get('currentMember'));
	}

	function providePermissions() {
		return array(
			'EDIT_PERMISSIONS' => array(
				'name' => _t('SecurityAdmin.EDITPERMISSIONS', 'Manage permissions for groups'),
				'category' => _t('Permissions.PERMISSIONS_CATEGORY', 'Roles and access permissions'),
				'help' => _t('SecurityAdmin.EDITPERMISSIONS_HELP', 'Ability to edit Permissions and IP Addresses for a group. Requires "Access to Security".'),
				'sort' => 0
			),
			'APPLY_ROLES' => array(
				'name' => _t('SecurityAdmin.APPLY_ROLES', 'Apply roles to groups'),
				'category' => _t('Permissions.PERMISSIONS_CATEGORY', 'Roles and access permissions'),
				'help' => _t('SecurityAdmin.APPLY_ROLES_HELP', 'Ability to edit the roles assigned to a group. Requires "Access to Security.".'),
				'sort' => 0
			)
		);
	}
	
	/**
	 * The permissions represented in the $codes will not appearing in the form
	 * containing {@link PermissionCheckboxSetField} so as not to be checked / unchecked.
	 * 
	 * @param $codes String|Array
	 */
	static function add_hidden_permission($codes){
		if(is_string($codes)) $codes = array($codes);
		self::$hidden_permissions = array_merge(self::$hidden_permissions, $codes);
	}
	
	/**
	 * @param $codes String|Array
	 */
	static function remove_hidden_permission($codes){
		if(is_string($codes)) $codes = array($codes);
		self::$hidden_permissions = array_diff(self::$hidden_permissions, $codes);
	}
	
	/**
	 * @return Array
	 */
	static function get_hidden_permissions(){
		return self::$hidden_permissions;
	}
	
	/**
	 * Clear all permissions previously hidden with {@link add_hidden_permission}
	 */
	static function clear_hidden_permissions(){
		self::$hidden_permissions = array();
	}
}

/**
 * Delete multiple {@link Group} records. Usually used through the {@link SecurityAdmin} interface.
 * 
 * @package cms
 * @subpackage batchactions
 */
class SecurityAdmin_DeleteBatchAction extends CMSBatchAction {
	function getActionTitle() {
		return _t('AssetAdmin_DeleteBatchAction.TITLE', 'Delete groups');
	}

	function run(DataObjectSet $records) {
		$status = array(
			'modified'=>array(),
			'deleted'=>array()
		);
		
		foreach($records as $record) {
			// TODO Provide better feedback if permission was denied
			if(!$record->canDelete()) continue;
			
			$id = $record->ID;
			$record->delete();
			$status['deleted'][$id] = array();
			$record->destroy();
			unset($record);
		}

		return Convert::raw2json($status);
	}
}
?>
