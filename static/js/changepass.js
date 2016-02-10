
	jQuery(document).ready(function($){
		$("#ChangePass").validate({
			rules:{
				curpass: {
					required: true,
					alphanumeric: true,					
					minlength: 4
					
				},
				newpass: {
					required: true,
					alphanumeric: true,
					minlength: 4
				},
				newpass2: {
					required: true,
					minlength: 4,
					equalTo: "#newpass"
				}				
			},
			messages: {
				curpass: {
					required: "* Please enter your current password.",
					alphanumeric:  "* Invalid character(s) typed",					
					minlength: "* Your current password is too short"
				},
				newpass: {
					required: "* Please enter your new password.",
					alphanumeric:  "* Invalid character(s) typed",
					minlength: "* Your new password is too short."
				},
				newpass2: {
					required: "* Please re-enter your new password .",
					minlength: "* Your new password is too short.",
					equalTo: "* Passwords do not match."
				}				
			}
		});
	});