jQuery( function($) {       
	$(document).ready( function() {
		
		$(document).on( 'updated_cart_totals', function() {
			
			$('#billing_country, #shipping_country, #calc_shipping_country').trigger( 'refresh' );
		});
		
		
		$('.gm_woo-cart-collaterals').on( 'change', '#calc_shipping_country', function() {
			
			$(window).resize();
		});
		
		
		$('.gm_woo-cart-collaterals').on( 'click', '.gm_woo-shipping-calculator__button', function() {
			
			$(window).resize();
		});
		
	});
});