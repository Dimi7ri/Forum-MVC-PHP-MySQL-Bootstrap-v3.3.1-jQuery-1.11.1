
	jQuery(document).ready(function($){
		$("#Login").validate({
			rules:{
				username: {
					required: true,
					lettersonly: true,
					minlength: 4
					
				},
				password: {
					required: true,
					alphanumeric: true,
					minlength: 4
				}
			},
			messages: {
				username: {
					required: "* Please enter your Username.",
					lettersonly:  "* Invalid character(s) typed",
					minlength: "* Your user name is too short"
				},
				password: {
					required: "* Please enter your password.",
					alphanumeric:  "* Invalid character(s) typed",
					minlength: "* Your password is too short."
				}
			}
		});
	});