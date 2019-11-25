var Edit_blog = function(){
    return {
        init: function(){
            $("#edit_blog_form").validate({
                errorElement: "div",
                errorClass: 'is-invalid',
                validClass: 'is-valid',
                ignore: ':hidden:not(.summernote),.note-editable.card-block',
                errorPlacement: function (error, element) {
                    // Add the `help-block` class to the error element
                    error.addClass("invalid-feedback");
                    console.log(element);
                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.siblings("label"));
                    } else if (element.hasClass("summernote")) {
                        error.insertAfter(element.siblings(".note-editor"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function(form) {
                    console.log($(form).attr('action'));
                    $.ajax({
                        url : $(form).attr('action'),
                        type : 'POST',
                        data : $(form).serialize(),
                        // dataType : 'json'
                    }).then(function(data){
                        if(data) {
                            console.log(data);
                            toastr.success("Updated", "Your blog is successfully updated");
                        } else {
                            toastr.error("Blog not Updated", "Error");
                        }
                        
                    }, function(err){
                        console.log(err);
                        toastr.error("Request failed", "Error");
                    });
                }
            });
        }
    };
}();

$(document).ready(function() {
    $('#edit_blog_data').summernote({
        placeholder: 'Write your Blog content here...',
        tabsize: 5,
        height: 300,
    });
    Edit_blog.init();
});