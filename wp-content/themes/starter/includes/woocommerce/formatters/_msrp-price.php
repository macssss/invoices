<?php
	
	function gm_woo_get_msrp_price( $product_id ) {
		
		$output = get_post_meta( $product_id, 'msrp_price', true ) ? wc_price( get_post_meta( $product_id, 'msrp_price', true ) ) : '';
		
		return $output;
	}

?>