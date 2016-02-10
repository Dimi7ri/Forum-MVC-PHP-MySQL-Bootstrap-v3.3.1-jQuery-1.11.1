
	jQuery(document).ready(function($){
		$("#CreatePost").validate({
			rules:{		
				title: {
					required: true,
					minlength: 4
					
				},
				PostData: {
					required: true,
					minlength: 4
				}
			},
			messages: {
				username: {
					required: "Please enter a title for your post.",
					minlength: "Your title is too short"
				},
				password: {
					required: "Please complete your post.",
					minlength: "Your post is too short."
				},			
			}
		});
	});