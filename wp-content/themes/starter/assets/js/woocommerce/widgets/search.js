jQuery( function($) {       
	$(document).ready( function() {
		
		$("<span class='gm_loader product-search-loader'></span>").insertAfter('.product-search-field');
		
		$(document).on( 'product-search-fill', function() {
			
			$('.product-search .search-results tbody').each( function() {
				
				new SimpleBar( $(this)[0] );
			});
			
		});
		
	});
});