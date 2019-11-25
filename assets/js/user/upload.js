var UploadBook = (function () {
    return {
        init: function () {
            $('#user_upload_book_form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'form-text text-danger', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    book_title: {
                        required: true
                    },
                    author: {
                        required: false
                    },
                    publisher: {
                        required: false
                    },
                   
                    original_price: {
                        required: true
                    },
                    selling_price: {
                        required: true
                    }
                },
    
                // messages: {
                //     username: {
                //         required: "Username is required."
                //     },
                //     password: {
                //         required: "Password is required."
                //     },
                //     email : {
                //         required: "Email is required."
                //     }
                // },
                submitHandler: function(form) {
                    var $form = $(form);
                    var $response_container = $('.response-container', $form);
                    var $submit = $('[type=submit]', $form);
                    $response_container.empty();
                    $submit.button('loading');
                    $.ajax({
                        url: $form.attr('action'),
                        data: $form.serialize(),
                        type: 'POST',
                        dataType: 'JSON'
                    }).then(function(data){
                        $submit.button('reset');
                        var alertSuccess = 
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                            '<strong>Great!</strong> Book is Uploaded successfully.' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                '<span aria-hidden="true">&times;</span>' +
                            '</button>' +
                        '</div>';
                        if(data.status == true) {
                            $(alertSuccess).appendTo($response_container);
                            // window.location.replace(data.url);
                            $('#user_upload_book_form').each(function(){
								this.reset();
							});
                        } else if(data.status == false) {
                            $.each(data.errors, function(i, e){
                                $('<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                                    e +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                    '<span aria-hidden="true">&times;</span>' +
                                '</button>' +
                            '</div>').appendTo($response_container)
                            });
                        }
                        $( '#user_upload_book_form' ).each(function(){
                            this.reset();
                        });
                    }, function(err) {
                        console.log(err);
                        $submit.button('reset');
                        $('<div class="alert alert-danger"><span class="close">&times;</span>Something went wrong, please retry again.</div>').appendTo($response_container);
                    });
    
                }
            });
        }
    };
})();

var UploadPdf = (function () {
    return {
        init: function () {
            $( "#user_upload_pdf_form" ).submit(function( event ) {
                event.preventDefault();
                var form_data = new FormData();
                var $form     = $(this);
                $.each($form.serializeArray(),function(key,input){
                    form_data.append(input.name,input.value);
                });
                // form_data.append('pdf_title',$('#pdf_title').val());
                form_data.append('pdf_file',$('#pdf_file').get(0).files[0]);
                $.ajax({
                    url: Application.site_url + "/user/upload/handle_pdf_upload",
                    data: form_data,
                    type: 'POST',
                    dataType: 'JSON',
                    processData: false,
                    contentType: false
                }).then(function(data){
                    if(data.status == true) {
                        // console.log(data.msg);
                        $form[0].reset();
                        toastr.success("Successful!", data.msg);
                    } else {
                        // console.error(data.error);
                        toastr.error("Error!", data.error);
                    }
                }, function(err) {
                    console.error(err);
                });
                
              });
        }
    };
})();

var UploadPpt = (function () {
    return {
        init: function () {
            $( "#user_upload_ppt_form" ).submit(function( event ) {
                event.preventDefault();
                var form_data = new FormData();
                var $form     = $(this);
                $.each($form.serializeArray(),function(key,input){
                    form_data.append(input.name,input.value);
                });
                // form_data.append('ppt_title',$('#ppt_title').val());
                form_data.append('ppt_file',$('#ppt_file').get(0).files[0]);
                $.ajax({
                    url: Application.site_url + "/user/upload/handle_ppt_upload",
                    data: form_data,
                    type: 'POST',
                    dataType: 'JSON',
                    processData: false,
                    contentType: false
                }).then(function(data){
                    if(data.status == true) {
                        // console.log(data.msg);
                        $form[0].reset();
                        toastr.success("Successful!", data.msg);
                    } else {
                        console.error("Upload error : " + data.error);
                        toastr.error("Error!", data.error);
                    }
                }, function(err) {
                    console.error('Operation failed ' +err);
                });
                
              });
        }
    };
})();



$(document).ready(function(){
    // $("#user_upload_ppt_form").fileinput({
    //     theme: "explorer",
    //     browseOnZoneClick: true,
    //     allowedFileExtensions: ['ppt']
    // });
    // $("#user_upload_pdf_form").fileinput({
    //     theme: "explorer",
    //     browseOnZoneClick: true,
    //     allowedFileExtensions: ['pdf']
    // });
    UploadBook.init();
    UploadPdf.init();
    UploadPpt.init();
});