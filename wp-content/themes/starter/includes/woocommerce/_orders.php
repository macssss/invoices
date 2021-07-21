<?php

	add_filter( 'woocommerce_my_account_my_orders_actions', 'gm_woo_my_account_my_orders_actions', 10, 2 );
	
	function gm_woo_my_account_my_orders_actions( $actions, $order ){
		
		if ( in_array( $order->get_status(), apply_filters( 'woocommerce_valid_order_statuses_for_cancel', array( 'pending', 'failed' ), $order ), true ) ) {
			$actions['cancel']['url'] = $order->get_cancel_order_url( wc_get_endpoint_url( 'orders' ) );
		}
	
		return $actions;
	}
	
?>