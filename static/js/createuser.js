
	jQuery(document).ready(function($){
		$("#register").validate({
			rules:{
				name: {
					required: true,
					letterswithbasicpunc: true,
					minlength: 4
				},
				lastname: {
					required: true,
					letterswithbasicpunc: true,
					minlength: 4
				},
				login: {
					required: true,
					lettersonly: true,
					minlength: 4
				},				
				email: {
					required: true,
					email: true,
					minlength: 4
				},	
				email2: {
					required: true,
					email: 4,
					equalTo: "#email"
				},
				password1: {
					required: true,
					alphanumeric: true,
					minlength: 4
				},
				password2: {
					required: true,
					minlength: 4,
					equalTo: "#password1"
				},					
				birthdate: {
					required: true,
					maxlength: 10,
					date: true
				},
				checkbox: {
					required: true,
				}					
			},
			messages: {
				name: {
					required: "* Please enter your name.",
					letterswithbasicpunc:  "* Invalid character(s) typed.",
					minlength: "* Your name is too short."
				},
				lastname: {
					required: "* Please enter your last name.",
					letterswithbasicpunc:  "* Invalid character(s) typed.",
					minlength: "* Your last name is too short."
				},
				login: {
					required: "* Please enter your Username.",
					lettersonly:  "* Invalid character(s) typed",
					minlength: "* Your user name is too short"
				},				
	            email: {
					required: "* Please enter your email.",
					email: "* Email format not valid.",
					minlength: "* Your emails too short."
				},	
				email2: {
					required: "* Please re-enter your email.",
					email: "* Email format not valid.",
					equalTo: "* Emails don't match"
				},
				password1: {
					required: "* Please enter your new password.",
					alphanumeric:  "* Invalid character(s) typed.",
					minlength: "* Your new password is too short."
				},
				password2: {
					required: "* Please re-enter your new password.",
					minlength: "* Your new password is too short.",
					equalTo: "* Password don't match."
				},	
				birthdate: {
					required: "* Please enter your birth date.",
					maxlength: "Wrong date typed.",
					date: "* Invalid date typed."

				},
				checkbox: {
					required: "In order to use our service, you must state: ",
				}				
			}
		});
	});