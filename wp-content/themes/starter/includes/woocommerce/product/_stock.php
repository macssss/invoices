<?php
	
	add_filter( 'woocommerce_get_availability_class', 'gm_woo_get_availability_class', '', 2 );
	
	function gm_woo_get_availability_class( $class, $product ) {
		
		$class = 'gm_woo-product-stock';
		
		if ( ! $product->is_in_stock() ) {
			
			$class .= ' gm_woo-product-stock--out-of-stock';
		}
		
		elseif ( ( $product->managing_stock() && $product->is_on_backorder( 1 ) ) || ( ! $product->managing_stock() && $product->is_on_backorder( 1 ) ) ) {
			
			$class .= ' gm_woo-product-stock--available-on-backorder';
		}
		
		elseif ( $product->managing_stock() && get_option( 'woocommerce_stock_format' ) == 'low_amount' && $product->get_stock_quantity() <= wc_get_low_stock_amount( $product ) ) {
			
			$class .= ' gm_woo-product-stock--only-left';
		}
		
		else {
			
			$class .= ' gm_woo-product-stock--in-stock';
		}
		
		return $class;
		
	}

?>