<?php
	
	use Automattic\Jetpack\Constants;
	
	add_filter( 'woocommerce_cart_totals_coupon_html', 'gm_woo_woocommerce_cart_totals_coupon_html', 1, 3  );
	
	function gm_woo_woocommerce_cart_totals_coupon_html( $coupon_html, $coupon, $discount_amount_html ) {
		
		$coupon_html          = $discount_amount_html . ' <a href="' . esc_url( add_query_arg( 'remove_coupon', rawurlencode( $coupon->get_code() ), Constants::is_defined( 'WOOCOMMERCE_CHECKOUT' ) ? wc_get_checkout_url() : wc_get_cart_url() ) ) . '" class="gm_woo-remove-coupon uk-close uk-close-small uk-close-alt uk-close-alt-remove woocommerce-remove-coupon" data-coupon="' . esc_attr( $coupon->get_code() ) . '"></a>';
		
		return $coupon_html;
	}
	
?>