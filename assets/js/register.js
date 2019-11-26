var HandleRegistration = (function () {
    return {
        init: function () {

            /****Creating check for valid Unique field****/
            $.validator.addMethod("is_unique", function(value,element,params)
            {   
                var isSuccess = $(element).data('valid');
 
                $(element).unbind('blur').blur(function(argument) {
                    var $element    = $(element);
                        $element.prop('disabled',true);
                    var scope       =  $element.parents('.form-group');
                    var error       = '';
                    var loader      = '<i class="fa fa-spinner fa-spin tooltips font-red"></i> Checking';

                    if ($('.form-text',scope).length === 0){
                        error = $('<span id="' + $element.prop('name') + '-error" class="form-text">' + loader + '</span>');
                        error.insertAfter($element);
                    } else{
                        $('.form-text',scope).html(loader);
                    }
                    var error_place =  $('.form-text',scope);

                    $.ajax({
                        url : Application.base_url + '/login/check_is_unique?field=' + params[0] + '&field_value=' + element.value + '&table_name=' + params[1], 
                        dataType: 'JSON'
                        // data: {
                        //     'field': params[0],
                        //     'field_value': element.value,
                        //     'table_name': params[1]
                        // }
                    }).then(function(data) {   
                        $element.prop('disabled',false);
                        if(data.status) {
                            scope.addClass('is-valid').removeClass('is-invalid');
                            $("#" + $element.prop('name') + "-error").addClass('text-muted').removeClass('text-danger');
                            error_place.html(data.msg);
                            $element.data('valid', true);
                            // setTimeout(function(argument) {
                            //     error_place.fadeOut(400);
                            // }, 1000);
                        } else {
                            scope.addClass('is-invalid').removeClass('is-valid');
                            error_place.html(data.msg);
                            $element.data('valid', false);
                        }
                    });  
                });   
                return isSuccess;                           
            },'<i class="fa fa-spinner fa-spin tooltips font-red"></i> Checking');

            $.validator.addMethod("password_check", function(value) {
                return /[A-Z]+/.test(value) && 
                /[\d\W]+/.test(value);
            },'Password must contain at least one uppercase and One number');

            $('#registration_form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'form-text text-danger', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    fname: {
                        required: true
                    },
                    lname: {
                        required: true
                    },
                    email: {
                        required: true,
                        email:true,
                        is_unique: ['email','users']
                    },
                    dob: {
                        required: true
                    },
                    username: {
                        required: true,
                        is_unique: ['username','users']
                    },
                    gender: {
                        required: true
                    },
                    phone: {
                        required: true
                    },
                    password: {
                        required: true,
                        minlength:6,
                        maxlength:20,
                        password_check:true
                    },
                    repeat_password: {
                        required: true,
                        equalTo: "#password"
                    }
                },
    
                messages: {
                    username: {
                        required: "Username is required."
                    },
                    password: {
                        required: "Password is required."
                    },
                    email : {
                        required: "Email is required."
                    }
                },
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
                        if(data.status === true) {
                            $('<div class="alert alert-success"><span class="close">&times;</span>Registration successful, redirecting...</div>').appendTo($response_container);
                            // window.location.replace(Application.base_url+"/Login");
                        } else if(data.status === false) {
                            $.each(data.errors, function(i, e){
                                $('<div class="alert alert-danger"><span class="close">&times;</span>' + e + '</div>').appendTo($response_container);
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
    HandleRegistration.init();
});