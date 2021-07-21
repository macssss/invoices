<?php
	
	
	// Price
	
	add_action( 'woocommerce_product_options_pricing', 'gm_woo_pricing_option_group' );
 
	function gm_woo_pricing_option_group () {
		
		woocommerce_wp_text_input(
			array(
				'id'          => 'msrp_price',
				'value'       => get_post_meta( get_the_ID(), 'msrp_price', true ),
				'data_type'   => 'price',
				'label'       => __( 'MSRP price', 'woocommerce' ) . ' (' . get_woocommerce_currency_symbol() . ')',
			)
		);
	}
	
	// END Price
	
	
	
	// General
	
	add_action( 'woocommerce_product_options_general_product_data', 'gm_woo_general_option_group' );
 
	function gm_woo_general_option_group () {
		
		echo '<div class="gm_woo-general-option-group option_group">';
		
		woocommerce_wp_checkbox( array(
			'id'      => 'recommended',
			'value'   => get_post_meta( get_the_ID(), 'recommended', true ),
			'label'   => 'Recommended',
		) );
		
		woocommerce_wp_checkbox( array(
			'id'      => 'on_sale',
			'value'   => get_post_meta( get_the_ID(), 'on_sale', true ),
			'label'   => 'Sale',
		) );
		
		echo '</div>';
	}
	
	// END General
	
	
	
	// Inventory
	
	add_action( 'woocommerce_product_options_stock_status', 'gm_woo_inventory_option_group' );
 
	function gm_woo_inventory_option_group () {
		
		echo '<div class="gm_woo-inventory-option-group option_group">';
		
		woocommerce_wp_text_input( array(
			'id'      => 'ean',
			'value'   => get_post_meta( get_the_ID(), 'ean', true ),
			'label'   => 'EAN',
		) );
		
		echo '</div>';
	}
	
	// END Inventory
	
	
	
	// Fields Save
	
	add_action( 'woocommerce_process_product_meta', 'gm_woo_option_group_save', 10, 2 );
	
	function gm_woo_option_group_save( $id, $post ){
		
		update_post_meta( $id, 'msrp_price', $_POST[ 'msrp_price' ] );
		update_post_meta( $id, 'recommended', isset( $_POST[ 'recommended' ] ) ? 'yes' : 'no' );
		update_post_meta( $id, 'on_sale', isset( $_POST[ 'on_sale' ] ) ? 'yes' : 'no' );
		update_post_meta( $id, 'ean', $_POST['ean'] );
	 
	}
	
	// END Fields Save

?>