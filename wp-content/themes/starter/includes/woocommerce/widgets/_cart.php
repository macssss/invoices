<?php

	remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10 );
	remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20 );
	
	add_filter( 'woocommerce_widget_cart_is_hidden', 'gm_woo_widget_cart_is_hidden', 40, 0 );
	
	function gm_woo_widget_cart_is_hidden() {
		
		return false;
	}
	
?>