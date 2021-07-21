jQuery( function($) {       
	$(document).ready( function() {
		
		$('.product-categories-widget > h3').click( function() {
			
			if ( window_size <= 850 ) {
			
				if ( $(this).hasClass('active') ) { 
					
					$(this).siblings('ul').slideUp(150);
					$(this).removeClass('active');
				}
				
				else {
					
					$(this).siblings('ul').slideDown(150);
					$(this).addClass('active');
				}
				
			}
			
		});
		
		
		
		$('.product-filter-widget .berocket_single_filter_widget .bapf_head > h3').click( function() {
			
			if ( window_size <= 850 ) {
			
				if ( $(this).hasClass('active') ) { 
					
					$(this).parent().siblings('.bapf_body').slideUp(150);
					$(this).removeClass('active');
				}
				
				else {
					
					$(this).parent().siblings('.bapf_body').slideDown(150);
					$(this).addClass('active');
				}
				
			}
			
		});
		
		
		$('.product-filter-widget-mobile-collapse').wrapInner( "<div class='product-filter-widget-mobile-collapse__content'></div>");
		$('.product-filter-widget-mobile-collapse').prepend('<h3 class="product-filter-widget-mobile-collapse__header uk-h5">' + labels['filter'] + '</h3>');
		
		$('.product-filter-widget-mobile-collapse__header').click( function() {
			
			if ( window_size <= 850 ) {
			
				if ( $(this).hasClass('active') ) { 
					
					$(this).siblings('.product-filter-widget-mobile-collapse__content').slideUp(150);
					$(this).removeClass('active');
				}
				
				else {
					
					$(this).siblings('.product-filter-widget-mobile-collapse__content').slideDown(150);
					$(this).addClass('active');
				}
				
			}
			
		});
		
		
		
		$(document).on( 'berocket_ajax_products_loaded', function() {
			
			$('.gm_woo-ordering__field').niceSelect();
		});
		
		
	});
});