
	jQuery(document).ready(function($){
		$("#UpdateTopic").validate({
			rules:{
				name: {
					required: true,
					minlength: 4
					
				}
			},
			messages: {
				name: {
					required: "* Please enter a name for you topic.",
					minlength: "* Your topic is too short."
				}
			}
		});
	});