(function($) {
	$.concrete('ss', function($){
		
		$('.AssetTableField.dragdrop').concrete({
			onmatch: function() {
				var self = this;
				$('#sitetree li').each(function() {
						$(this).droppable({
							greedy: true,
							hoverClass: 'over', // same hover effect as normal tree
							drop: function(e, ui) {self.drop(e, ui);}
						});
				});
				
				this._super();
			},
			/**
			 * Take selected files and move them to a folder target in the tree.
			 */
			drop: function(e, ui) {
				var self = this;
				if(e.target.id.match(/-([^-]+)$/)) {
					var folderId = RegExp.$1;
					$.post(
						this.attr('href') + '/movemarked',
						this.parents('form').serialize() + '&DestFolderID=' + folderId,
						function(data, status) {
							self.refresh();
						}
					)
				}
			},
			/**
			 * Get the IDs of all selected files in the table.
			 * Used for drag'n'drop.
			 * 
			 * @return Array
			 */
			getSelected: function() {
				return this.find(':input[name=Files\[\]]:checked').map(function() {
					return $(this).val();
				});
			}
		});
		
		$('.AssetTableField .dragfile').concrete({
			onmatch: function() {
				var self = this;
				var container = this.parents('.AssetTableField');
				
				this.draggable({
					zIndex: 4000,
					//stack: {group: '.ui-layout-west'},
					appendTo: 'body',
					helper: function() {
						return $(
							'<div class="NumFilesIndicator">' +
							ss.i18n.sprintf(ss.i18n._t('AssetTableField.MOVING'),container.getSelected().length) +
							'</div>'
						);
					}
				});
				
				this._super();
			},
			/**
			 * Automatically select the checkbox in the same table row
			 * to signify that this element is moved, and hint that
			 * all checkboxed elements will be moved along with it.
			 */
			onmousedown: function(e) {
				this.siblings('.markingcheckbox').find(':input').attr('checked', 'checked');
			}
		});
	});
}(jQuery));