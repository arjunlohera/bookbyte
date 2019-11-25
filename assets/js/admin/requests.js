var AccountApprove = (function () {
  return {
      init: function () {
          $('.account_approve_btn').click(function(){
            var btn = $(this);
            $.ajax({
              url: Application.site_url + '/admin/requests/approve_account',
              data: {'user_id':$(this).data("id")},
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

var AccountDisable = (function () {
  return {
      init: function () {
          $('.account_disable_btn').click(function(){
            var btn = $(this);
            $.ajax({
              url: Application.site_url + '/admin/requests/disable_account',
              data: {'user_id':$(this).data("id")},
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

var BookApprove = (function () {
  return {
      init: function () {
          $('.book_approve_btn').click(function(){
            var btn = $(this);
            $.ajax({
              url: Application.site_url + '/admin/requests/approve_book',
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

var BookDisable = (function () {
  return {
      init: function () {
          $('.book_disable_btn').click(function(){
            var btn = $(this);
            $.ajax({
              url: Application.site_url + '/admin/requests/disable_book',
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

var BookDelete = (function () {
  return {
      init: function () {
          $('.book_delete_btn').click(function(){
            var btn = $(this);
            $.ajax({
              url: Application.site_url + '/admin/requests/delete_book',
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

var BookRecover = (function () {
  return {
      init: function () {
          $('.book_recover_btn').click(function(){
            var btn = $(this);
            $.ajax({
              url: Application.site_url + '/admin/requests/recover_book',
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

var PdfApprove = (function () {
  return {
      init: function () {
          $('.pdf_approve_btn').click(function(){
            var btn = $(this);
            $.ajax({
              url: Application.site_url + '/admin/requests/approve_pdf',
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

var PdfDisable = (function () {
  return {
      init: function () {
          $('.pdf_disable_btn').click(function(){
            var btn = $(this);
            $.ajax({
              url: Application.site_url + '/admin/requests/disable_pdf',
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

var PdfDelete = (function () {
  return {
      init: function () {
          $('.pdf_delete_btn').click(function(){
            var btn = $(this);
            $.ajax({
              url: Application.site_url + '/admin/requests/delete_pdf',
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

var PdfRecover = (function () {
  return {
      init: function () {
          $('.pdf_recover_btn').click(function(){
            var btn = $(this);
            $.ajax({
              url: Application.site_url + '/admin/requests/recover_pdf',
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

var PptApprove = (function () {
  return {
      init: function () {
          $('.ppt_approve_btn').click(function(){
            var btn = $(this);
            $.ajax({
              url: Application.site_url + '/admin/requests/approve_ppt',
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

var PptDisable = (function () {
  return {
      init: function () {
          $('.ppt_disable_btn').click(function(){
            var btn = $(this);
            $.ajax({
              url: Application.site_url + '/admin/requests/disable_ppt',
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

var PptDelete = (function () {
  return {
      init: function () {
          $('.ppt_delete_btn').click(function(){
            var btn = $(this);
            $.ajax({
              url: Application.site_url + '/admin/requests/delete_ppt',
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

var PptRecover = (function () {
  return {
      init: function () {
          $('.ppt_recover_btn').click(function(){
            var btn = $(this);
            $.ajax({
              url: Application.site_url + '/admin/requests/recover_ppt',
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
  $('#users_table').DataTable({
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
      $("td:first", nRow).html(iDisplayIndex +1);
     return nRow;
  },
  });
  $('#books_table').DataTable({
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
      $("td:first", nRow).html(iDisplayIndex +1);
     return nRow;
  },
  });
  $('#pdfs_table').DataTable({
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
      $("td:first", nRow).html(iDisplayIndex +1);
     return nRow;
  },
  });
  $('#ppts_table').DataTable({
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
      $("td:first", nRow).html(iDisplayIndex +1);
     return nRow;
  },
  });
  AccountApprove.init();
  AccountDisable.init();
  BookApprove.init();
  BookDisable.init();
  BookDelete.init();
  BookRecover.init();
  PdfApprove.init();
  PdfDisable.init();
  PdfDelete.init();
  PdfRecover.init();
  PptApprove.init();
  PptDisable.init();
  PptDelete.init();
  PptRecover.init();
});
