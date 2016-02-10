
	jQuery(document).ready(function($){
		$("#submitcomment").validate({
			rules:{
				CommentData: {
					required: true,
					minlength: 4
					
				}
			},
			messages: {
				CommentData: {
					required: "Please enter a comment.",
					minlength: "Your comment is too short"
				}
			}
		});
	});