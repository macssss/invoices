jQuery( function($) {
	$(document).ready( function() {
		
		
		$("[data-gm-swiper]").each(function(){
			
			var current_elem = $(this);
			
			var swiper_params = $(this).attr("data-gm-swiper");
			
			if ( swiper_params != "{}" && swiper_params != "" && swiper_params != undefined ) {
				swiper_params = JSON.parse( swiper_params.replace(/'/g, "\"") );
			}
			
			var swiper_cont = $(this).find(".swiper-container");
			
			
			var autoplay_data = false;
			
			if ( swiper_params.autoplay == true ) {
				autoplay_data = { delay: 7000 };
				
				if ( swiper_params.autoplayDelay != undefined ) {
					autoplay_data.delay = swiper_params.autoplayDelay;
				}
				
				if ( swiper_params.disableOnInteraction != undefined ) {
					autoplay_data.disableOnInteraction = swiper_params.disableOnInteraction;
				}
			}
			
			var swiper = new Swiper(swiper_cont, {
				
				slidesPerView : 'auto',
				grabCursor : true,
				loop : ( swiper_params.loop ? true : false ),
				centeredSlides : ( swiper_params.centeredSlides ? true : false ),
				autoplay: autoplay_data
				
			});
			
			
			$(this).find(".uk-slidenav").click(function(e){
				e.preventDefault();
				
				if ( $(this).hasClass("uk-slidenav-previous") ) {
					swiper.slidePrev();
				}
				
				else if ( $(this).hasClass("uk-slidenav-next") ) {
					swiper.slideNext();
				}
			});
		
		});
		

	});
});
