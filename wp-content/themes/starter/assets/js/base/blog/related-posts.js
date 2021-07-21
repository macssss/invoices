jQuery( function($) {
	$(document).ready( function() {
			
		$('.gm_related-posts').each(function () {
			
			if ( $('.gm_related-posts .swiper-slide').length < 12 ) {
				
				$(this).addClass('gm_related-posts--little-slides');
			}
		});
		
	});
});