<div id="$id" class="$Classes">
	<div class="CommentFilter">
		$SearchForm
	</div>
	<% include TableListField_PageControls %>
	<table class="data">
		<thead>
			<tr>
				<% if Markable %><th width="18">&nbsp;</th><% end_if %>
				<% control Headings %>
				<th class="$Name">
					$Title
				</th>
				<% end_control %>
				<% if Can(edit) %><th width="18">&nbsp;</th><% end_if %>
				<% if HasApproveButton %><th width="18">&nbsp;</th><% end_if %>
				<% if HasSpamButton %><th width="18">&nbsp;</th><% end_if %>
				<% if HasHamButton %><th width="18">&nbsp;</th><% end_if %>
				<% if Can(delete) %><th width="18">&nbsp;</th><% end_if %>
			</tr>
		</thead>
		<tfoot>
			<% if HasSummary %>
			<tr class="summary">
				<% if Markable %><th width="18">&nbsp;</th><% end_if %>
				<td><i>$SummaryTitle</i></td>
				<% control SummaryFields %>
					<td<% if Function %> class="$Function"<% end_if %>>&nbsp;</td>
				<% end_control %>
				<% if Can(edit) %><th width="18">&nbsp;</th><% end_if %>
				<% if HasApproveButton %><th width="18">&nbsp;</th><% end_if %>
				<% if HasSpamButton %><th width="18">&nbsp;</th><% end_if %>
				<% if HasHamButtom %><th width="18">&nbsp;</th><% end_if %>
				<% if Can(delete) %><th width="18">&nbsp;</th><% end_if %>
			</tr>
			<% end_if %>
		</tfoot>
		<tbody>
			<% if Items %>
			<% control Items %>
				<tr id="record-$Parent.id-$ID"<% if HighlightClasses %> class="$HighlightClasses"<% end_if %>>
					<% if Markable %><td width="18" class="markingcheckbox">$MarkingCheckbox</td><% end_if %>
					<% control Fields %>
					<td>$Value</td>
					<% end_control %>
					<% if Can(edit) %>
						<td width="18"><a class="popuplink editlink" href="$EditLink" target="_blank"><img src="cms/images/edit.gif" alt="edit" /></a></td>
					<% end_if %>
					<% if HasApproveButton %>
						<td width="18"><a class="approvelink" href="$ApproveLink" title="Approve this comment"><img src="cms/images/approvecomment.png" alt="approve" /></a></td>
					<% end_if %>
					<% if HasSpamButton %>
						<td width="18"><a class="spamlink" href="$SpamLink" title="Mark this comment as spam"><img src="cms/images/declinecomment.png" alt="spam" /></a></td>
					<% end_if %>
					<% if HasHamButton %>
						<td width="18"><a class="hamlink" href="$HamLink" title="Mark this comment as not spam"><img src="cms/images/approvecomment.png" alt="ham" /></a></td>
					<% end_if %>
					<% if Can(delete) %>
						<td width="18"><a class="deletelink" href="$DeleteLink" title="Delete this row"><img src="cms/images/delete.gif" alt="delete" /></a></td>
					<% end_if %>
				</tr>
			<% end_control %>
			<% else %>
				<tr class="notfound">
					<% if Markable %><th width="18">&nbsp;</th><% end_if %>
					<td colspan="$Headings.Count"><i>No items found</i></td>
					<% if Can(edit) %><th width="18">&nbsp;</th><% end_if %>
					<% if HasApproveButton %><th width="18">&nbsp;</th><% end_if %>
					<% if HasSpamButton %><th width="18">&nbsp;</th><% end_if %>
					<% if HasHamButtom %><th width="18">&nbsp;</th><% end_if %>
					<% if Can(delete) %><th width="18">&nbsp;</th><% end_if %>
				</tr>
			<% end_if %>
		</tbody>
	</table>
</div>