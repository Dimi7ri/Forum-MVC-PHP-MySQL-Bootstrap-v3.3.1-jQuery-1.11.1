
	jQuery(document).ready(function($){
		$("#EditAcc").validate({
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
				birthdate: {
					required: true,
					date: true
				}				
			},
			messages: {
				name: {
					required: "* Please enter your name.",
					letterswithbasicpunc:  "* Invalid character(s) typed",
					minlength: "* Your name is too short"
				},
				lastname: {
					required: "* Please enter your last name.",
					letterswithbasicpunc:  "* Invalid character(s) typed",
					minlength: "* Your last name is too short."
				},
				birthdate: {
					required: "* Please enter your birth date.",
					date: "* Invalid date typed."
				}				
			}
		});
	});