/**
 * @type jquery.layout Global variable so layout state management
 * can pick it up.
 */
var ss_MainLayout;

(function($) {
	
	/**
	 * @class CMS-specific form behaviour
	 * @name ss.EditForm
	 */
	$('.CMSMain #Form_EditForm').concrete('ss', function($){
		return/** @lends ss.EditForm */{
			onmatch: function() {
				// Alert the user on change of page-type - this might have implications
				// on the available form fields etc.
				this.find(':input[name=ClassName]').bind('change',
					function() {
						alert('The page type will be updated after the page is saved');
					}
				);

				this._super();
			}
		};
	});
	
	/**
	 * @class Input validation on the URLSegment field
	 * @name ss.EditForm.URLSegment
	 */
	$('#Form_EditForm input[name=URLSegment]').concrete('ss', function($){
		return/** @lends ss.EditForm.URLSegment */{

			FilterRegex: /[^A-Za-z0-9-]+/,

			ValidationMessage: 'URLs can only be made up of letters, digits and hyphens.',

			MaxLength: 50,
			
			onmatch : function() {
				var self = this;
				
				// intercept change event, do our own writing
				this.bind('change', function(e) {
					if(!self.validate()) {
						jQuery.noticeAdd(self.ValidationMessage());
					}
					self.val(self.suggestValue(e.target.value));
					return false;
				});
			},
			
			/**
			 * Return a value matching the criteria.
			 * 
			 * @param {String} val
			 * @return val
			 */
			suggestValue: function(val) {
				// TODO Do we want to enforce lowercasing in URLs?
				return val.substr(0, this.MaxLength()).replace(this.FilterRegex(), '').toLowerCase();
			},
			
			validate: function() {
				return (
					this.val().length > this.MaxLength()
					|| this.val().match(this.FilterRegex())
				);
			}
		};
	});
	
	/**
	 * @class Input validation on the Title field
	 * @name ss.EditForm.Title
	 */
	$('#Form_EditForm input[name=Title]').concrete('ss', function($){
		return/** @lends ss.EditForm.Title */{

			onmatch : function() {
				var self = this;
				
				this.bind('change', function(e) {
					self.updateURLSegment(jQuery('#Form_EditForm input[name=URLSegment]'));
					// TODO We should really user-confirm these changes
					self.parents('form').find('input[name=MetaTitle], input[name=MenuTitle]').val(self.val());
				});
			},
			
			updateURLSegment: function(field) {
				if(!field || !field.length) return;
				
				// TODO language/logic coupling
				var isNew = this.val().indexOf("new") == 0;
				var suggestion = field.concrete('ss').suggestValue(this.val());
				var confirmMessage = ss.i18n.sprintf(
					ss.i18n._t(
						'UPDATEURL.CONFIRM', 
						'Would you like me to change the URL to:\n\n' 
						+ '%s/\n\nClick Ok to change the URL, '
						+ 'click Cancel to leave it as:\n\n%s'
					),
					suggestion,
					field.val()
				);

				// don't ask for replacement if record is considered 'new' as defined by its title
				if(isNew || (suggestion != field.val() && confirm(confirmMessage))) {
					field.val(suggestion);
				}
			}
		};
	});
		
	/**
	 * @class ParentID field combination - mostly toggling between
	 * the two radiobuttons and setting the hidden "ParentID" field
	 * @name ss.EditForm.parentTypeSelector
	 */
	$('#Form_EditForm .parentTypeSelector').concrete('ss', function($){
		return/** @lends ss.EditForm.parentTypeSelector */{
			onmatch : function() {
				var self = this;
				
				this.find(':input[name=ParentType]').bind('click', function(e) {self._toggleSelection(e);});
				
				this._toggleSelection();
			},
			
			_toggleSelection: function(e) {
				var selected = this.find(':input[name=ParentType]:checked').val();
				// reset parent id if 'root' radiobutton is selected
				if(selected == 'root') this.find(':input[name=ParentID]').val(0);
				// toggle tree dropdown based on selection
				this.find('#ParentID').toggle(selected != 'root');
			}
		};
	});
	
	/**
	 * @class Toggle display of group dropdown in "access" tab,
	 * based on selection of radiobuttons.
	 * @name ss.Form_EditForm.Access
	 */
	$('#Form_EditForm #CanViewType, #Form_EditForm #CanEditType').concrete('ss', function($){
		return/** @lends ss.Form_EditForm.Access */{
			onmatch: function() {
				// TODO Decouple
				var dropdown;
				if(this.attr('id') == 'CanViewType') dropdown = $('#ViewerGroups');
				else if(this.attr('id') == 'CanEditType') dropdown = $('#EditorGroups');
				
				this.find('.optionset :input').bind('change', function(e) {
					dropdown.toggle(e.target.value == 'OnlyTheseUsers');
				});
				
				// initial state
				var currentVal = this.find('input[name=' + this.attr('id') + ']:checked').val();
				dropdown.toggle(currentVal == 'OnlyTheseUsers');
			}
		};
	});	
	
	/**
	 * @class Email containing the link to the archived version of the page.
	 * Visible on readonly older versions of a specific page at the moment.
	 * @name ss.Form_EditForm_action_email
	 */
	$('#Form_EditForm .Actions #Form_EditForm_action_email').concrete('ss', function($){
		return/** @lends ss.Form_EditForm_action_email */{
			onclick: function(e) {
				window.open(
					'mailto:?subject=' 
						+ $('input[name=ArchiveEmailSubject]', this[0].form).val() 
						+ '&body=' 
						+ $(':input[name=ArchiveEmailMessage]', this[0].form).val(), 
					'archiveemail' 
				);
			
				return false;
			}
		};
	});

	/**
	 * @class Open a printable representation of the form in a new window.
	 * Used for readonly older versions of a specific page.
	 * @name ss.Form_EditForm_action_print
	 */
	$('#Form_EditForm .Actions #Form_EditForm_action_print').concrete('ss', function($){
		return/** @lends ss.Form_EditForm_action_print */{
			onclick: function(e) {
				var printURL = $(this[0].form).attr('action').replace(/\?.*$/,'') 
					+ '/printable/' 
					+ $(':input[name=ID]',this[0].form).val();
				if(printURL.substr(0,7) != 'http://') printURL = $('base').attr('href') + printURL;

				window.open(printURL, 'printable');
			
				return false;
			}
		};
	});
	
	/**
	 * @class A "rollback" to a specific version needs user confirmation.
	 * @name ss.Form_EditForm_action_rollback
	 */
	$('#Form_EditForm .Actions #Form_EditForm_action_rollback').concrete('ss', function($){
		return/** @lends ss.Form_EditForm_action_rollback */{
			onclick: function(e) {
				// @todo i18n
				return confirm("Do you really want to copy the published content to the stage site?");
			}
		};
	});
	
	/**
	 * @class All forms in the right content panel should have closeable jQuery UI style titles.
	 * @name ss.contentPanel.form
	 */
	$('#contentPanel form').concrete('ss', function($){
		return/** @lends ss.contentPanel.form */{
			onmatch: function() {
			  // Style as title bar
				this.find(':header:first').titlebar({
					closeButton:true
				});
				// The close button should close the east panel of the layout
				this.find(':header:first .ui-dialog-titlebar-close').bind('click', function(e) {
					$('body.CMSMain').concrete('ss').MainLayout().close('east');
				
					return false;
				});
			}
		};
	});
	
	/**
	 * @class Control the site tree filter.
	 * Toggles search form fields based on a dropdown selection,
	 * similar to "Smart Search" criteria in iTunes.
	 * @name ss.Form_SeachTreeForm
	 */
	$('#Form_SearchTreeForm').concrete('ss', function($) {
		return/** @lends ss.Form_SeachTreeForm */{
		
			/**
			 * @type DOMElement
			 */
			SelectEl: null,
		
			onmatch: function() {
				var self = this;
			
				// TODO Cant bind to onsubmit/onreset directly because of IE6
				this.bind('submit', function(e) {return self._submitForm(e);});
				this.bind('reset', function(e) {return self._resetForm(e);});

				// only the first field should be visible by default
				this.find('.field').not(':first').hide();

				// generate the field dropdown
				this.setSelectEl($('<select name="options" class="options"></select>')
					.appendTo(this.find('fieldset:first'))
					.bind('change', function(e) {self._addField(e);})
				);

				this._setOptions();
			
			},
		
			_setOptions: function() {
				var self = this;
			
				// reset existing elements
				self.SelectEl().find('option').remove();
			
				// add default option
				// TODO i18n
				jQuery('<option value="0">Add Criteria</option>').appendTo(self.SelectEl());
			
				// populate dropdown values from existing fields
				this.find('.field').each(function() {
					$('<option />').appendTo(self.SelectEl())
						.val(this.id)
						.text($(this).find('label').text());
				});
			},
		
			/**
			 * Filter tree based on selected criteria.
			 */
			_submitForm: function(e) {
				var self = this;
				var data = [];
			
				// convert from jQuery object literals to hash map
				$(this.serializeArray()).each(function(i, el) {
					data[el.name] = el.value;
				});
			
				// Set new URL
				$('#sitetree')[0].setCustomURL(this.attr('action') + '&action_getfilteredsubtree=1', data);

				// Disable checkbox tree controls that currently don't work with search.
				// @todo: Make them work together
				if ($('#sitetree')[0].isDraggable) $('#sitetree')[0].stopBeingDraggable();
				this.find('.checkboxAboveTree :checkbox').val(false).attr('disabled', true);
			
				// disable buttons to avoid multiple submission
				//this.find(':submit').attr('disabled', true);
			
				this.find(':submit[name=action_getfilteredsubtree]').addClass('loading');
			
				this._reloadSitetree();
			
				return false;
			},
		
			_resetForm: function(e) {
				this.find('.field').clearFields().not(':first').hide();
			
				// Reset URL to default
				$('#sitetree')[0].clearCustomURL();

				// Enable checkbox tree controls
				this.find('.checkboxAboveTree :checkbox').attr('disabled', 'false');

				// reset all options, some of the might be removed
				this._setOptions();
			
				this._reloadSitetree();
			
				return false;
			},
		
			_addField: function(e) {
				var $select = $(e.target);
				// show formfield matching the option
				this.find('#' + $select.val()).show();
			
				// remove option from dropdown, each field should just exist once
				this.find('option[value=' + $select.val() + ']').remove();
			
				// jump back to default entry
				$select.val(0);
			
				return false;
			},
		
			_reloadSitetree: function() {
				var self = this;
			
				$('#sitetree')[0].reload({
					onSuccess :  function(response) {
						self.find(':submit').attr('disabled', false).removeClass('loading');
						self.find('.checkboxAboveTree :checkbox').attr('disabled', 'true');
						statusMessage('Filtered tree','good');
					},
					onFailure : function(response) {
						self.find(':submit').attr('disabled', false).removeClass('loading');
						self.find('.checkboxAboveTree :checkbox').attr('disabled', 'true');
						errorMessage('Could not filter site tree<br />' + response.responseText);
					}
				});
			}
		};
	});
	
	/**
	 * @class Simple form with a page type dropdown
	 * which creates a new page through #Form_EditForm and adds a new tree node.
	 * @name ss.Form_AddPageOptionsForm
	 * @requires ss.i18n
	 * @requires ss.Form_EditForm
	 */
	$('#Form_AddPageOptionsForm').concrete(function($) {
	  return/** @lends ss.Form_AddPageOptionsForm */{
			/**
			 * @type DOMElement
			 */
			Tree: null,
			
			/**
			 * @type Array Internal counter to create unique page identifiers prior to ajax saving
			 */
			_NewPages: [],
			
			onmatch: function() {
				var self = this;
				
				this.bind('submit', function(e) {
				  return self._submit(e);
				});
				
				Observable.applyTo(this[0]);
				
				var tree = jQuery('#sitetree')[0];
				this.setTree(tree);
				jQuery(tree).bind('selectionchanged', function(e, data) {self.treeSelectionChanged(e, data);});
				
				this.find(':input[name=PageType]').bind('change', this.typeDropdownChanged);
			},
			
			_submit: function(e) {
				var newPages = this._NewPages();
				var tree = this.Tree();
				var parentID = (tree.firstSelected()) ? tree.getIdxOf(tree.firstSelected()) : 0;

				// TODO: Remove 'new-' code http://open.silverstripe.com/ticket/875
				if(parentID && parentID.substr(0,3) == 'new') {
					alert(ss.i18n._t('CMSMAIN.WARNINGSAVEPAGESBEFOREADDING'));
				}
				
				if(tree.firstSelected() && jQuery(tree.firstSelected()).hasClass("nochildren")) {
					alert(ss.i18n._t('CMSMAIN.CANTADDCHILDREN') );
				} 
				
				// Optionally initalize the new pages tracker
				if(!newPages[parentID] ) newPages[parentID] = 1;

				// default to first button
				var button = jQuery(this).find(':submit:first');
				button.addClass('loading');
				
				// collect data and submit the form
				var data = jQuery(this).serializeArray();
				data.push({name:'Suffix',value:newPages[parentID]++});
				data.push({name:button.attr('name'),value:button.val()});
				jQuery('#Form_EditForm').concrete('ss').loadForm(
					jQuery(this).attr('action'),
					function() {
						button.removeClass('loading');
					},
					{type: 'POST', data: data}
				);
				
				this.set_NewPages(newPages);

				return false;
			},

			treeSelectionChanged : function(e, data) {
			  var selectedNode = data.node;
			  
				if(selectedNode.hints && selectedNode.hints.defaultChild) {
					this.find(':input[name=PageType]').val(selectedNode.hints.defaultChild);
				}
				
				var parentID = this.Tree().getIdxOf(selectedNode);
				this.find(':input[name=ParentID]').val(parentID ? parentID : 0);
			},

			typeDropdownChanged : function() {
			  var tree = this.Tree();
			  
				// Don't do anything if we're already on an appropriate node
				var sel = tree.firstSelected();
				if(sel && sel.hints && sel.hints.allowedChildren) {
					var allowed = sel.hints.allowedChildren;
					for(i=0;i<allowed.length;i++) {
						if(allowed[i] == this.value) return;
					}
				}

				// Otherwise move to the default parent for that.
				if(siteTreeHints && siteTreeHints[this.value] ) {
					var newNode = tree.getTreeNodeByIdx(siteTreeHints[this.value].defaultParent);
					if(newNode) tree.changeCurrentTo(newNode);
				}
			}
		};
	});
	
	/**
	 * @class Simple form with a page type dropdown
	 * which creates a new page through #Form_EditForm and adds a new tree node.
	 * @name ss.Form_AddPageOptionsForm
	 * @requires ss.i18n
	 * @requires ss.reports_holder
	 */
	$('#Form_ReportForm').concrete(function($) {
	  return/** @lends ss.reports_holder */{
			onmatch: function() {
				var self = this;
				
				this.bind('submit', function(e) {
					return self._submit(e);
				});
				
				// integrate with sitetree selection changes
				jQuery('#sitetree').bind('selectionchanged', function(e, data) {
					self.find(':input[name=ID]').val(data.node.getIdx());
					self.trigger('submit');
				});
				
				// move submit button to the top
				this.find('#ReportClass').after(this.find('.Actions'));
				
				// links in results
				this.find('ul a').bind('click', function(e) {
					var $link = $(this);
					$link.addClass('loading');
					jQuery('#Form_EditForm').concrete('ss').loadForm(
						$(this).attr('href'),
						function(e) {
							$link.removeClass('loading');
						}
					);
					return false;
				});
			},
			
			_submit: function(e) {
				var self = this;
				
				// dont process if no report is selected
				var reportClass = this.find(':input[name=ReportClass]').val();
				if(!reportClass) return false;
				
				var button = this.find(':submit:first');
				button.addClass('loading');
				
				jQuery.ajax({
					url: this.attr('action'),
					data: this.serializeArray(),
					dataType: 'html',
					success: function(data, status) {
						// replace current form
						self.replaceWith(data);
					},
					complete: function(xmlhttp, status) {
						button.removeClass('loading');
					}
				});
				
				return false;
			}
		};
	});
})(jQuery);