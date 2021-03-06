(function($) {
	$.concrete('ss', function($){
	
		/**
		 * @class Dropdown with languages above CMS tree, causing a redirect upon translation
		 * @name ss.CMSMain.LangSelector
		 */
		$('.CMSMain #Form_LangForm').concrete(/** @lends ss.CMSMain.LangSelector */{
			onmatch: function() {
				var self = this;
			
				// monitor form loading for any locale changes
				$('#Form_EditForm').bind('loadnewpage', function(e) {
					var newLocale = $(this).find(':input[name=Locale]').val();
					if(newLocale) self.val(newLocale);
				});
			
				// whenever a new value is selected, reload the whole CMS in the new locale
				this.find(':input[name=Locale]').bind('change', function(e) {
					var url = document.location.href;
					url += (url.indexOf('?') != -1) ? '&' : '?';
					// TODO Replace existing locale GET params
					url += 'locale=' + $(e.target).val();
					document.location = url;
					return false;
				});
			
				this._super();
			}
		});
	
		/**
		 * Loads /admin/createtranslation, which will create the new record,
		 * and redirect to an edit form.
		 * 
		 * @class Dropdown in "Translation" tab in CMS forms, with button to 
		 * trigger translating the currently loaded record.
		 * @name ss.CMSMain.createtranslation
		 * @requires jquery.metadata
		 */
		$('.CMSMain .createTranslation').concrete(/** @lends ss.CMSMain.createtranslation */{
			onmatch: function() {
				var self = this;
			
				this.find(':input[name=action_createtranslation]').bind('click', function(e) {
					var form = self.parents('form');
					// redirect to new URL
					// TODO This should really be a POST request
				
					document.location.href = $('base').attr('href') + 
						jQuery(self).metadata().url + 
						'?ID=' + form.find(':input[name=ID]').val() + 
						'&newlang=' + self.find(':input[name=NewTransLang]').val() +
						'&locale=' + form.find(':input[name=Locale]').val(); 

					return false;
				});
			
				this._super();
			}
		});
	});
}(jQuery));