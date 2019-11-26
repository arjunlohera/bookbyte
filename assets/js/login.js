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

var ForgetPassword = (function () {
    return {
        init: function () {
            $('#forget_password_form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block text-danger', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    email: {
                        required: true,
                        email: true
                    }
                },
    
                messages: {
                    email: {
                        required: "Email is required."
                    }
                },
                submitHandler: function(form) {
                    var $form = $(form);
                    var $submit = $('[type=submit]', $form);
                    $submit.button('loading');
                    $.ajax({
                        url: Application.site_url + '/login/submit_forget_password',
                        data: $form.serialize(),
                        type: 'POST',
                        dataType: 'JSON'
                    }).then(function(data){
                        $submit.button('reset');
                        if(data.status == true) {
                            toastr.success(data.msg, "Success");
                        } else if(data.status == false) {
                            $.each(data.errors, function(i, e){
                                toastr.error(e, "Error");
                            });
                        }
                    }, function(err) {
                        console.log(err);
                        $submit.button('reset');
                        toastr.error("Something Went Wrong !", "Error");
                    });
    
                }
            });
        }
    };
})();

$(document).ready(function(){
    HandleLogin.init();
    ForgetPassword.init();
});