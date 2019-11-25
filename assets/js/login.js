var HandleLogin = (function () {
    return {
        init: function () {
            $('#login_form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block text-danger', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    username: {
                        required: true
                    },
                    password: {
                        required: true
                    },
                    remember: {
                        required: false
                    }
                },
    
                messages: {
                    username: {
                        required: "Username is required."
                    },
                    password: {
                        required: "Password is required."
                    }
                },
    
                // invalidHandler: function(event, validator) { //display error alert on form submit   
                //     $('.alert-danger', $('.login-form')).show();
                // },
    
                // highlight: function(element) { // hightlight error inputs
                //     $(element)
                //         .closest('.form-group').addClass('has-error'); // set error class to the control group
                // },
    
                // success: function(label) {
                //     label.closest('.form-group').removeClass('has-error');
                //     label.remove();
                // },
    
                // errorPlacement: function(error, element) {
                //     error.insertAfter(element.closest('.input-icon'));
                // },
    
                submitHandler: function(form) {
                    var $form = $(form);
                    var $response_container = $('.response-container', $form);
                    var $submit = $('[type=submit]', $form);
                    $response_container.empty();
                    $submit.button('loading');
                    $.ajax({
                        url: Application.site_url + '/login/login_action',
                        data: $form.serialize(),
                        type: 'POST',
                        dataType: 'JSON'
                    }).then(function(data){
                        $submit.button('reset');
                        if(data.status == true) {
                            $('<div class="alert alert-success"><span class="close">&times;</span>Login successful, redirecting...</div>').appendTo($response_container);
                            window.location.replace(data.url);
                        } else if(data.status == false) {
                            $.each(data.errors, function(i, e){
                                $('<div class="alert alert-danger"><span class="close">&times;</span>' + e + '</div>').appendTo($response_container)
                            });
                        }
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

$(document).ready(function(){
    HandleLogin.init();
});