<?php
/**
 * Generates a three-pane UI for editing model classes,
 * with an automatically generated search panel, tabular results
 * and edit forms.
 * Relies on data such as {@link DataObject::$db} and {@DataObject::getCMSFields()}
 * to scaffold interfaces "out of the box", while at the same time providing
 * flexibility to customize the default output.
 * 
 * Add a route (note - this doc is not currently in sync with the code, need to update)
 * <code>
 * Director::addRules(50, array('admin/mymodel/$Class/$Action/$ID' => 'MyModelAdmin'));
 * </code>
 *
 * @todo saving logic (should mostly use Form->saveInto() and iterate over relations)
 * @todo ajax form loading and saving
 * @todo ajax result display
 * @todo relation formfield scaffolding (one tab per relation) - relations don't have DBField sublclasses, we do
 * 	we define the scaffold defaults. can be ComplexTableField instances for a start. 
 * @todo has_many/many_many relation autocomplete field (HasManyComplexTableField doesn't work well with larger datasets)
 * 
 * Long term TODOs:
 * @todo Hook into RESTful interface on DataObjects (yet to be developed)
 * @todo Permission control via datamodel and Form class
 * 
 * @uses {@link SearchContext}
 * 
 * @package cms
 */
abstract class ModelAdmin extends LeftAndMain {
	
	/**
	 * List of all managed {@link DataObject}s in this interface.
	 *
	 * @var array
	 */
	protected static $managed_models = null;
	
	public static $allowed_actions = array(
		'add',
		'edit',
		'delete',
		'handleList',
		'handleItem'
	);
	
	/**
	 * Forward control to the default action handler
	 */
	public static $url_handlers = array(
		'$Action' => 'handleAction'
	);
	
	/**
	 * Model object currently in manipulation queue. Used for updating Link to point
	 * to the correct generic data object in generated URLs.
	 *
	 * @var string
	 */
	private $currentModel = false;
		
	/**
	 * Initialize the model admin interface. Sets up embedded jquery libraries and requisite plugins.
	 * 
	 * @todo remove reliance on urlParams
	 */
	public function init() {
		parent::init();
		
		// security check for valid models
		if(isset($this->urlParams['Action']) && !in_array($this->urlParams['Action'], $this->getManagedModels())) {
			user_error('ModelAdmin::init(): Invalid Model class', E_USER_ERROR);
		}
		
		Requirements::css('cms/css/ModelAdmin.css'); // standard layout formatting for management UI
		Requirements::css('cms/css/silverstripe.tabs.css'); // follows the jQuery UI theme conventions
		
		Requirements::javascript('jsparty/jquery/jquery.js');
		Requirements::javascript('jsparty/jquery/livequery/jquery.livequery.js');
		Requirements::javascript('jsparty/jquery/ui/ui/ui.base.js');
		Requirements::javascript('jsparty/jquery/ui/ui/ui.tabs.js');
		Requirements::javascript('jsparty/jquery/ui/plugins/form/jquery.form.js');
		Requirements::javascript('cms/javascript/ModelAdmin.js');
	}
	
	/**
	 * Add mappings for generic form constructors to automatically delegate to a scaffolded form object.
	 */
	function defineMethods() {
		parent::defineMethods();
		foreach($this->getManagedModels() as $ClassName) {
			$this->addWrapperMethod($ClassName, 'bindModelController');
		}
	}
	
	/**
	 * Return default link to this controller. This assfaced method is abstract, so we can't
	 * get rid of it.
	 *
	 * @todo extract full URL binding from Director::addRules so that it's not tied to 'admin/crm'
	 * @todo is there a way of removing the dependency on this method from the Form?
	 * 
	 * @return string
	 */
	public function Link() {
		return Controller::join_links(Director::absoluteBaseURL(), 'admin/crm/');
	}
	
	/**
	 * Base scaffolding method for returning a generic model instance.
	 */
	public function bindModelController($model, $request = null) {
		return new ModelAdmin_CollectionController($this, $model);
	}
	
	/**
	 * Allows to choose which record needs to be created.
	 * 
	 * @return Form
	 */
	protected function ManagedModelsSelect() {
		$models = $this->getManagedModels();
		$modelMap = array();
		foreach($models as $modelName) $modelMap[$modelName] = singleton($modelName)->singular_name();
		
		$form = new Form(
			$this,
			"ManagedModelsSelect",
			new FieldSet(
				new DropdownField('ClassName', 'Type', $modelMap)
			),
			new FieldSet(
				new FormAction('add', _t('GenericDataAdmin.CREATE'))
			)
		);
		$form->setFormMethod('get');
		return $form;
	}
	
	function add($data, $form, $request) {
		$className = $request->requestVar("ClassName");
		return $this->$className()->add($request);
	}
	
	/**
	 * 
	 * @uses {@link SearchContext}
	 * @uses {@link SearchFilter}
	 * @return Form
	 */
	protected function getSearchForms() {
		$modelClasses = $this->getManagedModels();
		
		$forms = new DataObjectSet();
		foreach($modelClasses as $modelClass) {
			$this->$modelClass()->SearchForm();

			$forms->push(new ArrayData(array(
				'Form' => $this->$modelClass()->SearchForm(),
				'Title' => singleton($modelClass)->singular_name(),
				'ClassName' => $modelClass,
			)));
		}
		
		return $forms;
	}
	
	/**
	 * @return array
	 */
	protected function getManagedModels() {
		$models = $this->stat('managed_models');
		if(!count($models)) user_error('ModelAdmin::getManagedModels(): 
			You need to specify at least one DataObject subclass in $managed_models', E_USER_ERROR);
		
		return $models;
	}
}

/**
 * Handles a managed model class and provides default collection filtering behavior.
 *
 */
class ModelAdmin_CollectionController extends Controller {
	protected $parentController;
	protected $modelClass;
	
	static $url_handlers = array(
		'$Action' => 'handleActionOrID'
	);

	function __construct($parent, $model) {
		$this->parentController = $parent;
		$this->modelClass = $model;
	}
	
	/**
	 * Appends the model class to the URL.
	 *
	 * @return unknown
	 */
	function Link() {
		return Controller::join_links($this->parentController->Link(), "$this->modelClass");
	}
	
	/**
	 * Return the class name of the model being managed.
	 *
	 * @return unknown
	 */
	function getModelClass() {
		return $this->modelClass;
	}
		
	/**
	 * Delegate to different control flow, depending on whether the
	 * URL parameter is a numeric type (record id) or string (action).
	 * 
	 * @param unknown_type $request
	 * @return unknown
	 */
	function handleActionOrID($request) {
		if (is_numeric($request->param('Action'))) {
			return $this->handleID($request);
		} else {
			return $this->handleAction($request);
		}
	}
	
	/**
	 * Delegate to the RecordController if a valid numeric ID appears in the URL
	 * segment.
	 *
	 * @param HTTPRequest $request
	 * @return RecordController
	 */
	function handleID($request) {
		return new ModelAdmin_RecordController($this, $request);
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * Get a search form for a single {@link DataObject} subclass.
	 * 
	 * @return Form
	 */
	public function SearchForm() {
		$context = singleton($this->modelClass)->getDefaultSearchContext();
		
		$form = new Form($this, "SearchForm",
			$context->getSearchFields(),
			new FieldSet(
				new FormAction('search', _t('MemberTableField.SEARCH'))
			)
		);
		$form->setFormAction(Controller::join_links($this->Link(), "search"));
		$form->setFormMethod('get');
		$form->setHTMLID("Form_SearchForm_" . $this->modelClass);
		return $form;
	}

	/**
	 * Action to render a data object collection, using the model context to provide filters
	 * and paging.
	 * 
	 * @todo push this HTML structure out into separate template
	 */
	function search($request) {
		$model = singleton($this->modelClass);
		$searchKeys = array_intersect_key($request->getVars(), $model->searchable_fields());
		$context = $model->getDefaultSearchContext();
		$results = $context->getResultSet($searchKeys);
		$output = "";
		if ($results) {
			$output .= "<table>";
			foreach($results as $row) {
				$uri = Director::absoluteBaseUrl();
				$output .= "<tr title=\"{$uri}admin/crm/{$this->modelClass}/{$row->ID}/edit\">";
				foreach($model->searchable_fields() as $key=>$val) {
					$output .=  "<td>";
					$output .=  $row->getField($key);
					$output .=  "</td>";
				}
				$output .=  "</tr>";
			}
			$output .=  "</table>";
		} else {
			$output .=  "<p>No results found</p>";
		}
		return $output;
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	/**
	 * Create a new model record.
	 *
	 * @param unknown_type $request
	 * @return unknown
	 */
	function add($request) {
		return $this->AddForm()->forTemplate();
	}

	/**
	 * Returns a form for editing the attached model
	 */
	public function AddForm() {
		$newRecord = new $this->modelClass();
		$fields = $newRecord->getCMSFields();
		
		$validator = ($newRecord->hasMethod('getCMSValidator')) ? $newRecord->getCMSValidator() : null;
		
		$actions = new FieldSet(new FormAction("doCreate", "Add"));
		
		$form = new Form($this, "AddForm", $fields, $actions, $validator);

		return $form;
	}	
	
	function doCreate($data, $form, $request) {
		$className = $this->getModelClass();
		$model = new $className();
		$form->saveInto($model);
		$model->write();
		
		Director::redirect(Controller::join_links($this->Link(), $model->ID , 'edit'));
	}
}

/**
 * Handles operations on a single record from a managed model.
 * 
 * @todo change the parent controller varname to indicate the model scaffolding functionality in ModelAdmin
 */
class ModelAdmin_RecordController extends Controller {
	protected $parentController;
	protected $currentRecord;
	
	static $allowed_actions = array('edit', 'view', 'EditForm', 'ViewForm');
	
	function __construct($parentController, $request) {
		$this->parentController = $parentController;
		$modelName = $parentController->getModelClass();
		$recordID = $request->param('Action');
		$this->currentRecord = DataObject::get_by_id($modelName, $recordID);
	}
	
	/**
	 * Link fragment - appends the current record ID to the URL.
	 *
	 */
	function Link() {
		return Controller::join_links($this->parentController->Link(), "/{$this->currentRecord->ID}");
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	/**
	 * Edit action - shows a form for editing this record
	 */
	function edit($request) {
		if ($this->currentRecord) {
			return $this->EditForm()->forTemplate();
		} else {
			return "I can't find that item";
		}
	}

	/**
	 * Returns a form for editing the attached model
	 */
	public function EditForm() {
		$fields = $this->currentRecord->getCMSFields();
		$fields->push(new HiddenField("ID"));
		
		$validator = ($this->currentRecord->hasMethod('getCMSValidator')) ? $this->currentRecord->getCMSValidator() : null;
		
		$actions = new FieldSet(new FormAction("doSave", "Save"));
		
		$form = new Form($this, "EditForm", $fields, $actions, $validator);
		$form->loadDataFrom($this->currentRecord);

		return $form;
	}

	function doSave($data, $form, $request) {
		$this->currentRecord->update($request->postVars());
		$this->currentRecord->write();
		
		// Behaviour switched on ajax.
		if(Director::is_ajax()) {
			return $this->edit($request);
		} else {
			Director::redirectBack();
		}
	}	

	/////////////////////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * @todo remove base controller hack and refactor scaffolding methods to be better distributed in class heirachy
	 */
	function view($request) {
		if ($this->currentRecord) {
			$form = $this->ViewForm();
			return $form->forTemplate();
		} else {
			return "I can't find that item";
		}
	}

	/**
	 * Returns a form for viewing the attached model
	 */
	public function ViewForm() {
		$fields = $this->currentRecord->getCMSFields();
		$form = new Form($this, "EditForm", $fields, new FieldSet());
		$form->loadDataFrom($this->currentRecord);
		$form->makeReadonly();

		return $form;
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////

	function index() {
		Director::redirect(Controller::join_links($this->Link(), 'edit'));
	}
	
}

?>