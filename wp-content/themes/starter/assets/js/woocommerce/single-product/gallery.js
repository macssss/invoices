jQuery( function($) {       
	$(document).ready( function() {
		
		if ( $(".gm_js_woo-product-gallery-slides .swiper-slide").length > 1 ) {
			
			var gallery_thumbs = new Swiper('.gm_js_woo-product-gallery-thumbs', {
				
				slidesPerView: 3,
				spaceBetween: 16,
				watchSlidesVisibility: true,
				watchSlidesProgress: true,
				
				navigation: {
					prevEl: '.uk-slidenav-previous',
					nextEl: '.uk-slidenav-next',
				},
				
				breakpoints: {
					500: {
						slidesPerView: 5,
					}
				}
			});
			
			var gallery_slides = new Swiper('.gm_js_woo-product-gallery-slides', {
				
				thumbs: {
					swiper: gallery_thumbs,
				},
				
				navigation: {
					prevEl: '.uk-slidenav-previous',
					nextEl: '.uk-slidenav-next',
				},
			});
		}
		
	});
});