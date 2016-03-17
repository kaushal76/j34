
function deleteItem(item_id){
	bootbox.confirm("Do you really want to delete this paper? Once deleted it is irrecoverable", "Cancel", "Delete", function(result) {
	    if (result) {
	    	document.getElementById('form-paper-delete-' + item_id).submit();
	    } 
	});
}
