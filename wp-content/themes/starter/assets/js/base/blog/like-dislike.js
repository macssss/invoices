jQuery( function($) {    
	$(document).ready( function() {
		
		$('.pld-like-dislike-wrap').each( function() {
			
			if ( !$(this).parent().hasClass('gm_blog-single__content') ) {
				$(this).remove();
			}
		});
		
	});
});