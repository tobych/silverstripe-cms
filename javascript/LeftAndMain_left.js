/**
 * LeftAndMain_left.js
 * Code for supporting the left-hand panel of all the 2-pane admin windows
 * This includes code for the action panel at the top, and the draggable, ajax-linked tree.
 */
 
if(typeof SiteTreeHandlers == 'undefined') SiteTreeHandlers = {};
SiteTreeHandlers.parentChanged_url = 'admin/ajaxupdateparent';
SiteTreeHandlers.orderChanged_url = 'admin/ajaxupdatesort';
SiteTreeHandlers.showRecord_url = 'admin/show/';
SiteTreeHandlers.controller_url = 'admin';

var _HANDLER_FORMS = {
	addpage : 'Form_AddPageOptionsForm',
	batchactions : 'batchactionsforms',
	search : 'search_options'
};


/**
 * Overload this with a real context menu if necessary
 */
var TreeContextMenu = null;

/**
 * Extra methods for the tree when used in the LHS of the CMS
 */
TreeAPI = Class.create();
TreeAPI.prototype = {

	setCustomURL: function(url, arguments) {
		this.customURL = url;
		this.customArguments = $H(arguments);
	},
	
	clearCustomURL: function() {
		this.customURL = this.customArguments = null;
	},
	
	url: function(args) {
		var args = $H(args).merge(this.customArguments);

		var url = this.customURL ? this.customURL : SiteTreeHandlers.loadTree_url; 
		url = url + (url.match(/\?/) ? '&' : '?') + args.toQueryString();

		return url;
	},
	
	reload: function(options) {
		this.innerHTML = 'Loading...';

		var args = {ajax:1, ID:0};
		if ($('LangSelector')) args.locale = $('LangSelector').value;
		
		url = this.url(args); 
		
		var self = this;
		jQuery.get(
			url, 
			function(data, status){
				self.innerHTML = data;
				self.castAsTreeNode(self.firstChild);
				if (options.onSuccess) options.onSuccess(data);
			},
			'html'
		);
	},
	
	/**
	 * Perform the given code on the each tree node with the given index.
	 * There could be more than one :-)
	 * @param idx The index of the tree node
	 * @param code A method to be executed, that will be passed the tree node
	 */
	performOnTreeNode: function(idx, code) {
		var treeNode = this.getTreeNodeByIdx(idx);
		if(!treeNode) return;
		
		if(treeNode.className.indexOf('manyparents') == -1) {
			code(treeNode);
		
		} else {
			var i,item,allNodes = this.getElementsByTagName('li');
			for(i=0;item=allNodes[i];i++) {
				if(treeNode.id == item.id) code(item);
			}
		}
	},
	
	getTreeNodeByIdx : function(idx) {
		if(!idx) idx = "0";
		var node = document.getElementById('record-' + idx);
		if(idx == "0" && !node) node = document.getElementById('record-root');
		return node;
	},
	getIdxOf : function(treeNode) {
		if(treeNode && treeNode.id && treeNode.id.match(/record-([0-9a-zA-Z\-]+)$/))
			return RegExp.$1;
	},
	createTreeNode : function(idx, title, pageType) {
		var i;
		var node = document.createElement('li');
		node.id = 'record-' + idx;
		node.className = pageType;

		var aTag = document.createElement('a');
		aTag.href = SiteTreeHandlers.showRecord_url + idx;
		aTag.title = 'Page type: ' + pageType;
		aTag.innerHTML = title;
		node.appendChild(aTag);

		SiteTreeNode.create(node, this.options);
		
		return node;
	},
	
	setNodeIdx : function(idx, newIdx) {
		this.performOnTreeNode(idx, function(treeNode) {
			treeNode.id = 'record-' + newIdx;
			var aTag = treeNode.getElementsByTagName('a')[0];
			aTag.href = aTag.href.replace(idx, newIdx);
		});
	
		var treeNode = this.getTreeNodeByIdx(idx);
	},
	
	setNodeTitle : function(idx, title) {
		this.performOnTreeNode(idx, function(treeNode) {
			var aTag = treeNode.getElementsByTagName('a')[0];
			aTag.innerHTML = title;
		});
	},
	
	setNodeIcon: function(idx, newClassName) {
		this.performOnTreeNode(idx, function(treeNode) {
			treeNode.className = treeNode.className.replace(/(class-)[^\s]*/,'$1' + newClassName);
			treeNode.aSpan.className = 'a ' + treeNode.className.replace('closed','spanClosed');
			var aTag = treeNode.getElementsByTagName('a')[0];
			aTag.title = 'Page type: ' + newClassName;
			treeNode.setIconByClass();
		});
	},
	
	/**
	 * Set the parent ID of a tree node
	 */
	setNodeParentID: function (idx, parentID) {
		var treeNode = this.getTreeNodeByIdx(idx);
		var parentNode = this.getTreeNodeByIdx(parentID);
		var currentParentNode = jQuery(treeNode).parents('li')[0];
		// Only change parent node if its different than the current,
		// otherwise we affect the sort order unnecessarily due to
		// appendTreeNode() not looking at existing sorts
		if(!currentParentNode || parentNode != currentParentNode) parentNode.appendTreeNode(treeNode);
	},
	
	setCurrentByIdx : function(idx) {
		if(this.selected) {
			var i,item;
			for(i=0;item=this.selected[i];i++) {
				item.removeNodeClass('current');
			}
		}

		__tree = this;
		__tree.selected = [];

		this.performOnTreeNode(idx, function(treeNode) {
			__tree.selected.push(treeNode);
			treeNode.expose();
			treeNode.addNodeClass('current');
		});
	},
	
	changeCurrentTo : function(newNode) {
		if(this.selected) {
			var i,item;
			for(i=0;item=this.selected[i];i++) {
				item.removeNodeClass('current');
			}
		}
		
		newNode.addNodeClass('current');

		this.selected = [newNode];
		newNode.expose();
	},
	
	firstSelected : function() {
		if(this.selected) return this.selected[0];
	}
};

/**
 * Extra methods for the tree node when used in the LHS of the CMS
 */
TreeNodeAPI = Class.create();
TreeNodeAPI.prototype = {
	selectTreeNode : function() {
		var url = jQuery(this).find('a').attr('href');
		if(url && url != '#') {
		  jQuery('#sitetree').trigger('selectionchanged', {node: this});
			// don't get page if either event was cancelled,
			// or the tree is currently in a selectable state.
			if($('sitetree').notify('SelectionChanged', this) && !jQuery(this.tree).hasClass('multiselect')) {
		    this.getPageFromServer();
			}
		} else {
			jQuery('#Form_EditForm').concrete('ss').removeForm();
		}
	},
		
	getPageFromServer : function() {
		var self = this;
		var xmlhttp = jQuery('#Form_EditForm').concrete('ss').loadForm(
			jQuery(this).find('a').attr('href'),
			function(response) {
				self.removeNodeClass('loading');
				
				var pageID = jQuery(this).find(':input[name=ID]').val();
				if(pageID) {
					jQuery('#sitetree')[0].setCurrentByIdx(pageID);
				}
			}
		);
		
		if(xmlhttp) this.addNodeClass('loading');
	},
	ajaxExpansion : function() {
		this.addNodeClass('loading');
		var ul = this.treeNodeHolder(false);
		ul.innerHTML = 'loading...';
		
		// Any attempts to add children to this page should, in fact, cue them up for insertion later
		ul.cuedNewNodes = [];
		ul.appendTreeNode = function(node) {
			this.cuedNewNodes[this.cuedNewNodes.length] = node;
		}
		
		var args = {ajax:1, ID:this.getIdx()};
		
		// Add current locale for any subtree selection
		if ($('LangSelector')) args.locale = $('LangSelector').value;
		
		// If the tree is selectable, we have to show all available children without
		// artificial limitations from the serverside (minNodeCount). This is a measure
		// to ensure no unexpanded nodes are missed in batch selection
		if(Element.hasClassName('sitetree', 'multiselect')) args.minNodeCount = 0;
		
		url = this.tree.url(args); 
		
		new Ajax.Request(url, {
			onSuccess : this.installSubtree.bind(this),
			onFailure : this.showSubtreeLoadingError
		});
	},
	showSubtreeLoadingError: function(response) { 
		errorMessage('error loading subtree', response);
	},
	
	/**
	 * Context menu
	 */
	oncontextmenu: function(event) {
		if(TreeContextMenu) {
			if(!event) event = window.event;
			createContextMenu(event, this, TreeContextMenu);
			Event.stop(event);
			return false;
		}
	},
	duplicatePage: function() {  
		// Pass the parent ID to the duplicator, which helps ensure that multi-parent pages are duplicated into the node that the user clicked
		var parentClause = "";
		if(this.parentTreeNode && this.parentTreeNode.getIdx) {
			parentClause = "&parentID=" + this.parentTreeNode.getIdx();
		}

		new Ajax.Request(jQuery('base').attr('href') + 'admin/duplicate/' + this.getIdx() + '?ajax=1' + parentClause, {
			method : 'get',
			onSuccess : Ajax.Evaluator,
			onFailure : function(response) {
				errorMessage('Error: ', response);
			}
		}); 
	},
	duplicatePageWithChildren: function() {  
		new Ajax.Request(jQuery('base').attr('href') + 'admin/duplicatewithchildren/' + this.getIdx() + '?ajax=1', {
			method : 'get',
			onSuccess : Ajax.Evaluator,
			onFailure : function(response) {
				errorMessage('Error: ', response);
			}
		}); 
	}
}




/**
 * In the case of Tree & DraggableTree, the root tree and the sub-trees all use the same class.
 * In this case, however, SiteTree has a much bigger API and so SiteSubTree is smaller.
 */
SiteSubTree = Class.extend('Tree').extend('TreeAPI');
SiteSubTree.prototype = {
	castAsTreeNode: function(li) {
		behaveAs(li, SiteTreeNode, this.options);
	}
}

 
/**
 * Our SiteTree class extends the tree object with a richer manipulation API.
 * The server will send a piece javascript that uses these functions.  In this way, the server
 * has flexibility over its operation, but the Script->HTML interface is kept client-side.
 */
SiteTree = Class.extend('SiteSubTree');
SiteTree.prototype = {
	initialize : function() {
		this.Tree.initialize();
		
		/*
		if(!this.tree.selected) this.tree.selected = [];
		var els = this.getElementsByTagName('li');
		for(var i=0;i<els.length;i++) if(els[i].className.indexOf('current') > -1) {
			this.tree.selected.push(els[i]);
			break;
		}
		*/
		
		this.observeMethod('SelectionChanged', this.interruptLoading.bind(this) );
		
		jQuery('#Form_EditForm').bind('loadnewpage', this.onLoadNewPage.bind(this));
	},
	destroy: function () {
		if(this.Tree) this.Tree.destroy();
		this.Tree = null;
		this.SiteSubTree = null;
		this.TreeAPI = null;
		this.selected = null;
	},
	
	/**
	 * Stop the currently loading node from loading.
	 */
	interruptLoading: function( newLoadingNode ) {
		if( this.loadingNode ) this.loadingNode.removeNodeClass('loading');
		this.loadingNode = newLoadingNode;
	},
	
	/**
	 * Assumes to be triggered by a form element with the following input fields:
	 * ID, ParentID, TreeTitle (or Title), ClassName
	 */
	onLoadNewPage: function(e, eventData) {
		// finds a certain value in an array generated by jQuery.serializeArray()
		var findInSerializedArray = function(arr, name) {
			for(var i=0; i<arr.length; i++) {
				if(arr[i].name == name) return arr[i].value;
			};
			return false;
		};
		
		var id = jQuery(e.target.ID).val();

		// check if a form with a valid ID exists
		if(id) {
			var parentID = jQuery(e.target.ParentID).val();

			// set title (either from TreeTitle or from Title fields)
			// Treetitle has special HTML formatting to denote the status changes.
			var title = jQuery((e.target.TreeTitle) ? e.target.TreeTitle : e.target.Title).val();
			if(title) this.setNodeTitle(id, title);

			// update icon (only if it has changed)
			var className = jQuery(e.target.ClassName).val();
			if(className) this.setNodeIcon(id, className);
			
			// check if node exists, might have been created instead
			if(!this.getTreeNodeByIdx(id)) {
				var newNode = $('sitetree').createTreeNode(id, title, className);
				var parentNode = $('sitetree').getTreeNodeByIdx(parentID); 
				if(parentNode) parentNode.appendTreeNode(newNode);
				//newNode.selectTreeNode();
			}
			
			// set correct parent (only if it has changed)
			if(parentID) this.setNodeParentID(id, jQuery(e.target.ParentID).val());
			
			// set current tree element
			this.setCurrentByIdx(id);
		} else {
			if(typeof eventData.origData != 'undefined') {
				var node = this.getTreeNodeByIdx(eventData.origData.ID);
				if(node && node.parentTreeNode) node.parentTreeNode.removeTreeNode(node);
			}
		}
		
	}
}

SiteTreeNode = Class.extend('TreeNode').extend('TreeNodeAPI');
SiteTreeNode.prototype = {
	initialize: function(options) {
		this.TreeNode.initialize(options);

		if(this.className && this.className.match(/ *([^ ]+)( +|$)/)) {
			if((typeof siteTreeHints != 'undefined') && siteTreeHints[ RegExp.$1 ]) {
				this.hints = siteTreeHints[ RegExp.$1 ];
				this.dropperOptions = { 
					accept : (this.hints.allowedChildren && (this.className.indexOf('nochildren') == -1))
						 ? this.hints.allowedChildren : 'none' 
				};
			}
		}
		
		if(this.className.indexOf('current') > -1) {
			if(!this.tree.selected) this.tree.selected = [];
			this.tree.selected.push(this);
		}

		if(!this.hints) this.hints = {}
	},
	
	destroy: function () {
		if(this.TreeNode) this.TreeNode.destroy();
		this.TreeNode = null;
		this.TreeNodeAPI = null;
	},
	
	castAsTree: function(childUL) {
		behaveAs(childUL, SiteSubTree, this.options);
		if(this.draggableObj) childUL.makeDraggable();
	},
		
	onselect: function() {
		this.selectTreeNode();
		return false;
	},

	

	/**
	 * Drag'n'drop handlers - Ajax saving
	 */
	onParentChanged : function(node, oldParent, newParent) {
		if(newParent.id.match(/^record-new/)) {
			alert("You must save the page before dragging children into it");
			return false;
		}
		
		if( node == newParent || node.getIdx() == newParent.getIdx() ) {
			alert("You cannot add a page to itself");
			return false;
		}
		
		if(node.innerHTML.toLowerCase().indexOf('<del') > -1) {
			alert("You can't moved deleted pages");
			return false;
		}
		
		if( Element.hasClassName( newParent, 'nochildren' ) ) {
			alert("You can't add children to that node");
			return false;
		}
		
		var currentlyOpenPageID = 0;
		if($('Form_EditForm').elements.ID) currentlyOpenPageID = $('Form_EditForm').elements.ID.value;

		statusMessage(ss.i18n._t('CMSMAIN.SAVING'), '', true);
		new Ajax.Request(SiteTreeHandlers.parentChanged_url, {
			method : 'post', 
			postBody : 'ID=' + node.getIdx() + '&ParentID=' + newParent.getIdx() + '&CurrentlyOpenPageID=' + currentlyOpenPageID,
			onSuccess : Ajax.Evaluator,
			onFailure : function(response) {
				errorMessage('error saving parent', response);
			}
		});
		
		return true;
	},

	/**
	 * Called when the tree has been resorted
	 * nodeList is a list of all the nodes in the correct rder
	 * movedNode is the node that actually got moved to trigger this resorting
	 */
	onOrderChanged : function(nodeList, movedNode) {
		statusMessage(ss.i18n._t('CMSMAIN.SAVING'), '', true);

		var i, parts = Array();
		sort = 0;
		
		for(i=0;i<nodeList.length;i++) {
			if(nodeList[i].getIdx && nodeList[i].getIdx()) {
				parts[parts.length] = 'ID[]=' + nodeList[i].getIdx();
			
				// Ensure that the order of new records is preserved when they are moved THEN saved
				if( nodeList[i].id.indexOf("record-new") == 0 )
					if( $('Form_EditForm_ID') && ( 'record-' + $('Form_EditForm_ID').value == nodeList[i].id ) )
						if( $('Form_EditForm_Sort') )
							$('Form_EditForm_Sort').value = ++sort;
			}
		}
		
		if(movedNode.getIdx && movedNode.getIdx()) {
			parts[parts.length] = 'MovedNodeID=' + movedNode.getIdx();
		}

		var currentlyOpenPageID = 0;
		if($('Form_EditForm').elements.ID) currentlyOpenPageID = $('Form_EditForm').elements.ID.value;

		if(parts) {
			new Ajax.Request(SiteTreeHandlers.orderChanged_url, {
				method : 'post', 
				postBody : parts.join('&') + '&CurrentlyOpenPageID=' + currentlyOpenPageID,
				/*onSuccess : function(response) {
					// statusMessage(response.responseText, 'good');
				},*/
				onSuccess: Ajax.Evaluator,
				onFailure : function(response) {
					errorMessage('error saving order', response);
				}
			});
		}
		
		return true;
	}	
}

// Build the site tree
SiteTree.applyTo('#sitetree');

/**
 * Reorganise action checkbox 
 */
ReorganiseAction = Class.create();
ReorganiseAction.applyTo('#sortitems');
ReorganiseAction.prototype = {
	initialize: function () {
	},
	
	onclick : function() {
		if ($('sitetree').isDraggable == false) {
			$('sitetree').makeDraggable();
		} else {
			$('sitetree').stopBeingDraggable();
		}
	}
}

var _CURRENT_CONTEXT_MENU = null;

/**
 * Create a new context menu
 * @param event The event object
 * @param owner The DOM element that this context-menu was requested from
 * @param menuItems A map of title -> method; context-menu operations to get called
 */
function createContextMenu(event, owner, menuItems) {
	if(_CURRENT_CONTEXT_MENU) {
		document.body.removeChild(_CURRENT_CONTEXT_MENU);
		_CURRENT_CONTEXT_MENU = null;
	}

	var menu = document.createElement("ul");
	menu.className = 'contextMenu';
	menu.style.position = 'absolute';
	menu.style.left = event.clientX + 'px';
	menu.style.top = event.clientY + 'px';

	var menuItemName, menuItemTag, menuATag;
	for(menuItemName in menuItems) {
		menuItemTag = document.createElement("li");

		menuATag = document.createElement("a");
		menuATag.href = "#";
		menuATag.onclick = menuATag.oncontextmenu = contextmenu_onclick;
		menuATag.innerHTML = menuItemName;
		menuATag.handler = menuItems[menuItemName];
		menuATag.owner = owner;

		menuItemTag.appendChild(menuATag);
		menu.appendChild(menuItemTag);
	}

	document.body.appendChild(menu);

	document.body.onclick = contextmenu_close;

	_CURRENT_CONTEXT_MENU = menu;

	return menu;
}

function contextmenu_close() {
	if(_CURRENT_CONTEXT_MENU) {
		document.body.removeChild(_CURRENT_CONTEXT_MENU);
		_CURRENT_CONTEXT_MENU = null;
	}
}

function contextmenu_onclick() {
	this.handler(this.owner);
	contextmenu_close();
	return false;
}