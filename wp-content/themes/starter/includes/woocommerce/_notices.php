<?php

	add_filter( 'wc_add_to_cart_message_html', 'gm_woo_wc_add_to_cart_message_html', '', 3 );
	
	function gm_woo_wc_add_to_cart_message_html( $message, $products, $show_qty ) {
		
		$titles = array();
		$count  = 0;
	
		if ( ! is_array( $products ) ) {
			
			$products = array( $products => 1 );
			$show_qty = false;
		}
	
		if ( ! $show_qty ) {
			
			$products = array_fill_keys( array_keys( $products ), 1 );
		}
	
	
		foreach ( $products as $product_id => $qty ) {
			
			/* translators: %s: product name */
			$titles[] = apply_filters( 'woocommerce_add_to_cart_qty_html', ( $qty > 1 ? absint( $qty ) . ' &times; ' : '' ), $product_id ) . apply_filters( 'woocommerce_add_to_cart_item_name_in_quotes', sprintf( _x( '&ldquo;%s&rdquo;', 'Item name in quotes', 'woocommerce' ), strip_tags( get_the_title( $product_id ) ) ), $product_id );
			$count   += $qty;
		}
	
		$titles = array_filter( $titles );
	
		
		/* translators: %s: product name */
		$added_text = sprintf( _n( '%s has been added to your cart.', '%s have been added to your cart.', $count, 'woocommerce' ), wc_format_list_of_items( $titles ) );
	
	
	
		// Output success messages.
		if ( 'yes' === get_option( 'woocommerce_cart_redirect_after_add' ) ) {
			
			$return_to = apply_filters( 'woocommerce_continue_shopping_redirect', wc_get_raw_referer() ? wp_validate_redirect( wc_get_raw_referer(), false ) : wc_get_page_permalink( 'shop' ) );
			
			$message   = sprintf( '%s <a href="%s" tabindex="1">%s</a>', esc_html( $added_text ), esc_url( $return_to ), esc_html__( 'Continue shopping', 'woocommerce' ) );
		}
		
		else {
			
			$message = sprintf( '%s <a href="%s" tabindex="1">%s</a>', esc_html( $added_text ), esc_url( wc_get_cart_url() ), esc_html__( 'View cart', 'woocommerce' ) );
		}
		
		return $message;
	}
	
	
	
	add_filter( 'woocommerce_cart_product_not_enough_stock_already_in_cart_message', 'gm_woo_cart_product_not_enough_stock_already_in_cart_message', '', 4 );
	
	function gm_woo_cart_product_not_enough_stock_already_in_cart_message( $message, $product_data, $stock_quantity, $stock_quantity_in_cart ) {
		
		$message = sprintf(
			'%s <a href="%s">%s</a>',
			/* translators: 1: quantity in stock 2: current quantity */
			sprintf( __( 'You cannot add that amount to the cart &mdash; we have %1$s in stock and you already have %2$s in your cart.', 'woocommerce' ), wc_format_stock_quantity_for_display( $stock_quantity, $product_data ), wc_format_stock_quantity_for_display( $stock_quantity_in_cart, $product_data ) ),
			wc_get_cart_url(),
			__( 'View cart', 'woocommerce' )
		);
		
		return $message;
		
	}

?>