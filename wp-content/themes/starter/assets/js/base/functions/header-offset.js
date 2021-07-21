jQuery( function($) {
	
	window.header_offset = 0;
	
	function header_offset_function() {
		if ( $("body").data("sticky-active-height") && $(".gm_navbar-wrapper[data-uk-sticky]").length ) { 
		
			window.navbar_media_break = $("body").data("navbar-media-break");
			
			if ( window_size > navbar_media_break || !navbar_media_break ) {
				window.header_offset = $("body").data("sticky-active-height");
			}
			
			else {
				window.header_offset = 0;
			}
			
			if ( $("#wpadminbar").length ) {
				
				window.header_offset += $("#wpadminbar").height();
			}
		}
	}
	
	header_offset_function();
	
	$(window).resize(function(){
		header_offset_function();
	})
	
});