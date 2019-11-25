var BookDelete = (function () {
    return {
        init: function () {
            $('.book_delete_btn').click(function(){
              var btn = $(this);
              $.ajax({
                url: Application.site_url + '/user/content/delete_book',
                data: {'book_id':$(this).data("id")},
                type: 'POST',
                dataType: 'JSON'
              }).then(function(data){
                if(data.status == true) {
                  btn.prop('disabled', true);
                  toastr.success(data.msg, "Success");
                } else {
                  toastr.error(data.error, "Error");
                }
                
              }, function(err){
                console.log(err);
                toastr.error("Something Went Wrong !", "Error");
              });
            });
        }
    };
  })();

  var BookPurchased = (function () {
    return {
        init: function () {
            $('.book_purchase_btn').click(function(){
              var btn = $(this);
              $.ajax({
                url: Application.site_url + '/user/content/mark_as_purchased',
                data: {'book_id':$(this).data("id")},
                type: 'POST',
                dataType: 'JSON'
              }).then(function(data){
                if(data.status == true) {
                  btn.prop('disabled', true);
                  toastr.success(data.msg, "Success");
                } else {
                  toastr.error(data.error, "Error");
                }
                
              }, function(err){
                console.log(err);
                toastr.error("Something Went Wrong !", "Error");
              });
            });
        }
    };
  })();

  var PdfHide = (function () {
    return {
        init: function () {
            $('.pdf_hide_btn').click(function(){
              var btn = $(this);
              $.ajax({
                url: Application.site_url + '/user/Content/hide_pdf',
                data: {'pdf_id':$(this).data("id")},
                type: 'POST',
                dataType: 'JSON'
              }).then(function(data){
                if(data.status == true) {
                  btn.prop('disabled', true);
                  toastr.success(data.msg, "Success");
                } else {
                  toastr.error(data.error, "Error");
                }
                
              }, function(err){
                console.log(err);
                toastr.error("Something Went Wrong !", "Error");
              });
            });
        }
    };
  })();

  var PdfUnhide = (function () {
    return {
        init: function () {
            $('.pdf_unhide_btn').click(function(){
              var btn = $(this);
              $.ajax({
                url: Application.site_url + '/user/content/unhide_pdf',
                data: {'pdf_id':$(this).data("id")},
                type: 'POST',
                dataType: 'JSON'
              }).then(function(data){
                if(data.status == true) {
                  btn.prop('disabled', true);
                  toastr.success(data.msg, "Success");
                } else {
                  toastr.error(data.error, "Error");
                }
                
              }, function(err){
                console.log(err);
                toastr.error("Something Went Wrong !", "Error");
              });
            });
        }
    };
  })();

  var PptHide = (function () {
    return {
        init: function () {
            $('.ppt_hide_btn').click(function(){
              var btn = $(this);
              $.ajax({
                url: Application.site_url + '/user/Content/hide_ppt',
                data: {'ppt_id':$(this).data("id")},
                type: 'POST',
                dataType: 'JSON'
              }).then(function(data){
                if(data.status == true) {
                  btn.prop('disabled', true);
                  toastr.success(data.msg, "Success");
                } else {
                  toastr.error(data.error, "Error");
                }
                
              }, function(err){
                console.log(err);
                toastr.error("Something Went Wrong !", "Error");
              });
            });
        }
    };
  })();

  var PptUnhide = (function () {
    return {
        init: function () {
            $('.ppt_unhide_btn').click(function(){
              var btn = $(this);
              $.ajax({
                url: Application.site_url + '/user/content/unhide_ppt',
                data: {'ppt_id':$(this).data("id")},
                type: 'POST',
                dataType: 'JSON'
              }).then(function(data){
                if(data.status == true) {
                  btn.prop('disabled', true);
                  toastr.success(data.msg, "Success");
                } else {
                  toastr.error(data.error, "Error");
                }
                
              }, function(err){
                console.log(err);
                toastr.error("Something Went Wrong !", "Error");
              });
            });
        }
    };
  })();

$(document).ready(function() {
	$("#books_table").DataTable({
		fnRowCallback: function(nRow, aData, iDisplayIndex) {
			$("td:first", nRow).html(iDisplayIndex + 1);
			return nRow;
		}
  });
  
  $("#pdfs_table").DataTable({
		fnRowCallback: function(nRow, aData, iDisplayIndex) {
			$("td:first", nRow).html(iDisplayIndex + 1);
			return nRow;
		}
  });
  
  $("#ppts_table").DataTable({
		fnRowCallback: function(nRow, aData, iDisplayIndex) {
			$("td:first", nRow).html(iDisplayIndex + 1);
			return nRow;
		}
	});
    BookDelete.init();
    BookPurchased.init();
    PdfHide.init();
    PdfUnhide.init();
    PptHide.init();
    PptUnhide.init();
});