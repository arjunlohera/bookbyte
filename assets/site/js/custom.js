var ContactUs = (function () {
	return {
		init: function () {
			$('#contact_form').validate({
				errorElement: 'span', //default input error message container
				errorClass: 'form-text text-danger', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				rules: {
					name: {
						required: true
					},
					email: {
						required: true
					},
					message: {
						required: true
					}
				},
				messages: {
					name: {
						required: "Name is required."
					},
					message: {
						required: "Message is required."
					},
					email: {
						required: "Email is required."
					}
				},
				submitHandler: function (form) {
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
					}).then(function (data) {
						$submit.button('reset');
						if (data.status == true) {
              toastr.success(data.msg, "Success");
						} else {
							$.each(data.errors, function (i, e) {
								toastr.error(e, "Error");
							});
						}
					}, function (err) {
						console.log(err);
						$submit.button('reset');
            toastr.error("Something Went Wrong !", "Error");
          });

				}
			});
		}
	}
})();

$(document).ready(function() {
  ContactUs.init();

  $(".get_seller_contact_btn").click(function(element){
    var login_url = Application.base_url + '/Login';
    $.ajax({
      url : Application.site_url + '/Site/is_authorized', 
      dataType: 'JSON'
    }).then(function(data){
      if(data.status == true) {
        //SHOW MODEL
        $('#seller_contact_info').modal('show');
      } else {
        // toastr.warning("Need to register yourself!"); //toastr.warning('My name is Inigo Montoya. You killed my father, prepare to die!')
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Need to Register/Login yourself!',
          footer: '<a class="text-muted" target="_blank" role="button" href="'+login_url+'" > Register/Login</a>'
        });
      }
    }, function(err){
      console.error(err);
      toastr.error("Something went wrong!", "error");
    });
  });


  $("#owl-demo").owlCarousel({
 	  navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true,
      items : 1,
      autoPlay: 3000,
       loop: true,
  		
 
  });

  $("#testimonal").owlCarousel({ 
  		 navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true,
      items : 1,
      autoPlay: 3000,
       loop: true,

  });
 

});



