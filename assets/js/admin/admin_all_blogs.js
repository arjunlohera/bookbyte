$(document).ready( function () {
    $('#myTable').DataTable();
    $('.delete_button').click(function(){
		var element = this;
		var del_id = this.id;
		$.ajax({
			url: $(this).data('url'),
			type: 'POST',
			data: { id:del_id },
			success: function(response) {
				if(response){
					// Remove row from HTML Table
	 				$(element).closest('tr').css('background','tomato');
	 				$(element).closest('tr').fadeOut(500,function(){
	    			$(this).remove();
	 				});
				} else {
                    toastr.error("Failed to delete this row", "Error");
				}
			 }
		});
    });
    
    
} );