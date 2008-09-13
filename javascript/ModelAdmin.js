/**
 * Javascript handlers for generic model admin.
 * 
 * Most of the work being done here is intercepting clicks on form submits,
 * and managing the loading and sequencing of data between the different panels of
 * the CMS interface.
 * 
 * @todo add live query to manage application of events to DOM refreshes
 * @todo alias the $ function instead of literal jQuery
 */
(function($) {
$(document).ready(function() {
	/**
	 * Attach tabs plugin to the set of search filter and edit forms
	 */
	$('ul.tabstrip').tabs();

    /*
     * Highlight buttons on click
     */
	$('input[type=submit]').click(function() {
	    $(this).addClass('loading');
	});

	////////////////////////////////////////////////////////////////// 
	// Search form 
	////////////////////////////////////////////////////////////////// 
	
	/**
	 * If a dropdown is used to choose between the classes, it is handled by this code
	 */
    $('#ModelClassSelector select')
        // Set up an onchange function to show the applicable form and hide all others
        .change(function() {
            var $selector = $(this);
            $('option', this).each(function() {
                var $form = $('#'+$(this).val());
                if($selector.val() == $(this).val()) $form.show();
                else $form.hide();
            });
        })
        // Initialise the form by calling this onchange event straight away
        .change();

	/**
	 * Stores a jQuery reference to the last submitted search form.
	 */
	__lastSearch = null;

	/**
	 * Submits a search filter query and attaches event handlers
	 * to the response table
	 * 
	 * @todo use livequery to manage ResultTable click handlers
	 */
	$('#SearchForm_holder .tab form').submit(function () {
	    var $form = $(this);
	    $('#ModelAdminPanel').load($(this).attr('action'), $(this).formToArray(), standardStatusHandler(function(result) {
    		__lastSearch = $form;
    		$('#form_actions_right').remove();
    		Behaviour.apply();
    		// Remove the loading indicators from the buttons
    		$('input[type=submit]', $form).removeClass('loading');
	    }, 
	    // Failure handler - we should still remove loading indicator
	    function () {
    		$('input[type=submit]', $form).removeClass('loading');
	    }));
	    return false;
	});

	/**
	 * Clear search button
	 */
	$('#SearchForm_holder button[name=action_clearsearch]').click(function(e) {
		$(this.form).clearForm();
		return false;
	});

	/**
	 * Column selection in search form
	  */
	$('a.form_frontend_function.toggle_result_assembly').click(function(){
		var toggleElement = $(this).next();
		toggleElement.toggle();
		return false;
	});
	
	$('a.form_frontend_function.tick_all_result_assembly').click(function(){
		var resultAssembly = $('div#ResultAssembly ul li input');
		resultAssembly.attr('checked', 'checked');
		return false;
	});
	
	$('a.form_frontend_function.untick_all_result_assembly').click(function(){
		var resultAssembly = $('div#ResultAssembly ul li input');
		resultAssembly.removeAttr('checked');
		return false;
	});

	////////////////////////////////////////////////////////////////// 
	// Results list 
	////////////////////////////////////////////////////////////////// 
	
	/**
	 * Table record handler for search result record
	 */
	$('#right #Form_ResultsForm tbody td a')
	    .livequery('click', function(){
	        $(this).parent().parent().addClass('loading');
    		var el = $(this);
    		showRecord(el.attr('href'));
    		return false;
    	})
    	.hover(
    	    function(){
        		$(this).addClass('over').siblings().addClass('over')
        	}, 
        	function(){
        		$(this).removeClass('over').siblings().removeClass('over')
        	}
        );

	////////////////////////////////////////////////////////////////// 
	// RHS detail form
	////////////////////////////////////////////////////////////////// 

    /**
     * RHS panel Back button
     */
	$('#Form_EditForm_action_goBack').livequery('click', function() {
	    $(this).addClass('loading');

		if(__lastSearch) __lastSearch.trigger('submit');
		return false;
	});
	
	/**
	 * RHS panel Save button 
	 */
	$('#right #form_actions_right input[name=action_doSave]').livequery('click', function(){
	    $(this).addClass('loading');

		var form = $('#right form');
		var formAction = form.attr('action') + '?' + $(this).fieldSerialize();
		
		// Post the data to save
		$.post(formAction, formData(form), function(result){
			$('#right #ModelAdminPanel').html(result);
			
			statusMessage("Saved");

			// TODO/SAM: It seems a bit of a hack to have to list all the little updaters here. 
			// Is livequery a solution?
			Behaviour.apply(); // refreshes ComplexTableField
			$('#right ul.tabstrip').tabs();
		});

		return false;
	});
	
	/**
	 * RHS panel Delete button
	 */
	$('#right #form_actions_right input[name=action_doDelete]').livequery('click', function(){
		var confirmed = confirm("Do you really want to delete?");
		if(!confirmed) return false;
		
	    $(this).addClass('loading');
		var form = $('#right form');
		var formAction = form.attr('action') + '?' + $(this).fieldSerialize();

        // The POST actually handles the delete
		$.post(formAction, formData(form), function(result){
		    // On success, the panel is refreshed and a status message shown.
			$('#right #ModelAdminPanel').html(result);
			
			statusMessage("Deleted");
    		$('#form_actions_right').remove();

			// TODO/SAM: It seems a bit of a hack to have to list all the little updaters here. 
			// Is livequery a solution?
			Behaviour.apply(); // refreshes ComplexTableField
			$('#right ul.tabstrip').tabs();
		});
		
		return false;
	});

		
	////////////////////////////////////////////////////////////////// 
	// Import/Add form 
	////////////////////////////////////////////////////////////////// 

	/**
	 * Add object button
	 */
	$('#Form_ManagedModelsSelect').submit(function(){
		className = $('select option:selected', this).val();
		requestPath = $(this).attr('action').replace('ManagedModelsSelect', className + '/add');
		showRecord(requestPath);
		return false;
	});
	
	/**
	 * Toggle import specifications
	 */
	$('#Form_ImportForm_holder .spec .details').hide();
	$('#Form_ImportForm_holder .spec a.detailsLink').click(function() {
		$('#' + $(this).attr('href').replace(/.*#/,'')).toggle();
		return false;
	});

	////////////////////////////////////////////////////////////////// 
	// Helper functions
	////////////////////////////////////////////////////////////////// 

	/**
	 * GET a fragment of HTML to display in the right panel
 	 * @todo Should this be turned into a method on the #Form_EditForm using effen or something?
	 */
	function showRecord(uri) {
	    $('#right #ModelAdminPanel').load(uri, standardStatusHandler(function(result) {
			$('#SearchForm_holder').tabs();
			Behaviour.apply(); // refreshes ComplexTableField
			$('#right ul.tabstrip').tabs();
		}));
	}
	
	/**
	 * Returns a flattened array of data from each field of the given form.
	 * @todo Surely jQuery has a built-in version of this?
	 */
	function formData(scope) {
		var data = {};
		$('*[name]', scope).each(function(){
			var t = $(this);
			if(t.attr('type') != 'checkbox' || t.attr('checked') == true) {
				data[t.attr('name')] = t.val();
			}
		});
		return data;
	}
	
	/**
	 * Standard SilverStripe status handler for ajax responses
	 * It will generate a status message out of the response, and only call the callback for successful responses
	 *
	 * To use:
	 *    Instead of passing your callback function as:
	 *       function(response) { ... }
	 * 
	 *    Pass it as this:
	 *       standardStatusHandler(function(response) { ... })
	 */
	function standardStatusHandler(callback, failureCallback) {
	    return function(response, status, xhr) {
	        // If the response is takne from $.ajax's complete handler, then swap the variables around
	        if(response.status) {
	            xhr = response;
	            response = xhr.responseText;
	        }

	        if(status == 'success') {
	            statusMessage(xhr.statusText, "good");
	            $(this).each(callback, [response, status, xhr]);
			} else {
	            statusMessage(xhr.statusText, "bad");
	            if(failureCallback) $(this).each(failureCallback, [response, status, xhr]);
			}
	    }
	}
	
})
})(jQuery);

/**
 * @todo Terrible HACK, but thats the cms UI...
 */
function fixHeight_left() {
	fitToParent('LeftPane');
	fitToParent('Search_holder',12);
	fitToParent('ResultTable_holder',12);
}

function prepareAjaxActions(actions, formName, tabName) {
	// @todo HACK Overwrites LeftAndMain.js version of this method to avoid double form actions
	// (by new jQuery and legacy prototype) 
	return false;
}