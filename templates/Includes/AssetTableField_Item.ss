<tr id="record-$Parent.id-$ID"<% if HighlightClasses %> class="$HighlightClasses"<% end_if %>>
	<td class="dragfile" id="drag-$Parent.Name-$ID">
		<img id="drag-img-$Parent.Name-$ID" alt="Drag" title="<% _t('DRAGTOFOLDER','Drag to folder on left to move file') %>" src="sapphire/images/drag.gif" />
	</div>
	<% if Markable %><td class="markingcheckbox">$MarkingCheckbox</td><% end_if %>
	<% control Fields %>
	<td class="field-$Title.HTMLATT $FirstLast $Name">$Value</td>
	<% end_control %>
	<% control Actions %>
		<td width="16">
			<% if IsAllowed %>
			<a class="$Class" href="$Link">
				<% if Icon %><img src="$Icon" alt="$Label" /><% else %>$Label<% end_if %>
			</a>
			<% else %>
				<span class="disabled">
					<% if IconDisabled %><img src="$IconDisabled" alt="$Label" /><% else %>$Label<% end_if %>
				</span>
			<% end_if %>
		</td>
	<% end_control %>
</tr>