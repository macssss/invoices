<?php
	
	function gm_woo_get_formatted_address( $address ) {
		
		ob_start();
		get_template_part( 'woocommerce/global/formatted-address', '', array( 'address' => $address ) );
		$formatted_address = ob_get_contents();
		ob_end_clean();
		
		return $formatted_address;
		
	}
	
	
	function gm_woo_get_account_formatted_address( $address_type = 'billing', $customer_id = 0 ) {
		
		$getter  = "get_{$address_type}";
		$address = array();
	
		if ( 0 === $customer_id ) {
			
			$customer_id = get_current_user_id();
		}
	
		$customer = new WC_Customer( $customer_id );
	
		if ( is_callable( array( $customer, $getter ) ) ) {
			
			$address = $customer->$getter();
			unset( $address['email'], $address['tel'] );
		}
		
		ob_start();
		get_template_part( 'woocommerce/global/formatted-address', '', array( 'address' => apply_filters( 'woocommerce_my_account_my_address_formatted_address', $address, $customer->get_id(), $address_type ) ) );
		$formatted_address = ob_get_contents();
		ob_end_clean();
		
		return $formatted_address;
	}
	
?>