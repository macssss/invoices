jQuery( function($) {       
	$(document).ready( function() {
		
		if ( $('.gm_woo-single-product-ask-us').length ) {
			
			$('.gm_js_woo-single-product-ask-us-product-title').val( $('[data-product-title]').text() );
			$('.gm_js_woo-single-product-ask-us-sku').val( $('[data-product-sku]').text() );
			$('.gm_js_woo-single-product-ask-us-ean').val( $('[data-product-ean]').text() );
			$('.gm_js_woo-single-product-ask-us-link').val( window.location.href );
		}
		
	});
});