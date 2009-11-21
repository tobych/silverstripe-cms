(function($) {
	
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
	 * @name ss.reports_holder
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
	
	/**
	 * @class Simple form showing versions of a specific page.
	 * @name ss.Form_VersionsForm
	 * @requires ss.i18n
	 */
	$('#Form_VersionsForm').concrete(function($) {
	  return/** @lends ss.Form_VersionsForm */{
			onmatch: function() {
				var self = this;
				
				this.bind('submit', function(e) {
					return self._submit(e);
				});
				
				// set button to be available in form submit event later on
				this.find(':submit').bind('click', function(e) {
					self.data('_clickedButton', this);
				});
				
				// integrate with sitetree selection changes
				jQuery('#sitetree').bind('selectionchanged', function(e, data) {
					self.find(':input[name=ID]').val(data.node.getIdx());
					if(self.is(':visible')) self.trigger('submit');
				});
				
				// refresh when field is selected
				// TODO coupling
				$('#treepanes').bind('accordionchange', function(e, ui) {
					if($(ui.newContent).attr('id') == 'Form_VersionsForm') self.trigger('submit');
				});
				
				// submit when 'show unpublished versions' checkbox is changed
				this.find(':input[name=ShowUnpublished]').bind('change', function(e) {
					// force the refresh button, not 'compare versions'
					self.data('_clickedButton', self.find(':submit[name=action_versions]'));
					self.trigger('submit');
				});
				
				// move submit button to the top
				this.find('#ReportClass').after(this.find('.Actions'));
				
				// links in results
				this.find('td').bind('click', function(e) {
					var td = $(this);
					
					// exclude checkboxes
					if($(e.target).is(':input')) return true;
					
					var link = $(this).siblings('.versionlink').find('a').attr('href');
					td.addClass('loading');
					jQuery('#Form_EditForm').concrete('ss').loadForm(
						link,
						function(e) {
							td.removeClass('loading');
						}
					);
					return false;
				});
				
				// compare versions action
				this.find(':submit[name=action_compareversions]').bind('click', function(e) {
					// validation: only allow selection of exactly two versions
					var versions = self.find(':input[name=Versions[]]:checked');
					if(versions.length != 2) {
						alert(ss.i18n._t(
							'CMSMain.VALIDATIONTWOVERSION',
							'Please select two versions'
						));
						return false;
					}
					
					// overloaded submission: refresh the right form instead
					self.data('_clickedButton', this);
					self._submit(e, true);
					
					return false;
				})
			},
			
			/**
			 * @param {boolean} loadEditForm Determines if responses should show in current panel,
			 *  or in the edit form (in the case of 'compare versions').
			 */
			_submit: function(e, loadEditForm) {
				var self = this;
				
				// Don't submit with empty ID
				if(!this.find(':input[name=ID]').val()) return false;
				
				var $button = (self.data('_clickedButton')) ? $(self.data('_clickedButton')) : this.find(':submit:first');
				$button.addClass('loading');
				
				var data = this.serializeArray();
				data.push({name:$button.attr('name'), value: $button.val()});
				
				if(loadEditForm) {
					jQuery('#Form_EditForm').concrete('ss').loadForm(
						this.attr('action'),
						function(e) {
							$button.removeClass('loading');
						},
						{data: data, type: 'POST'}
					);
				} else {
					jQuery.ajax({
						url: this.attr('action'),
						data: data,
						dataType: 'html',
						success: function(data, status) {
							self.replaceWith(data);
						},
						complete: function(xmlhttp, status) {
							$button.removeClass('loading');
						}
					});
				}
				
				
				return false;
			}
		};
	});
})(jQuery);