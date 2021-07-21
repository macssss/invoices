<?php

	add_filter( 'woocommerce_product_search_field_more_title', 'gm_woo_product_search_field_more_title' );
	
	function gm_woo_product_search_field_more_title() {
		
		return __( 'More results', 'warp' );
	}

?>