jQuery( function($) {
	
	window.window_size = $(window).width();
	
	$(window).resize( function() {
		window.window_size = $(window).width();
	})
	
});