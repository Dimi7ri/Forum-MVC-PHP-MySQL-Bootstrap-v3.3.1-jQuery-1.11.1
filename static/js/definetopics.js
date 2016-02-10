
	jQuery(document).ready(function($){
		$("#DefineTopics").validate({
			rules:{
				topic: {
					required: true,
					minlength: 4
					
				}
			},
			messages: {
				topic: {
					required: "Please enter a name for you topic.",
					minlength: "Your topic is too short"
				}
			}
		});
	});