
	jQuery(document).ready(function($){
		$("#editpost").validate({
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
				title: {
					required: "Please enter a title for your post.",
					minlength: "Your title is too short"
				},
				PostData: {
					required: "Please complete your post.",
					minlength: "Your post is too short."
				}
			}
		});
	});