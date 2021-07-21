<?php
	
	// Deregister Unused
	
	function gm_woo_deregister_unused () {
		
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wc-block-vendors-style' );
		wp_dequeue_style( 'wc-block-style' );
		wp_dequeue_style( 'select2' );
		
		wp_deregister_script( 'wc-address-i18n' );
		wp_deregister_script( 'wc-country-select' );
		
		global $woocommerce;
		
		wp_register_script( 'wc-address-i18n', get_template_directory_uri () . '/assets/js/woocommerce/core/address-i18n.js', array( 'jquery', 'wc-country-select' ), $woocommerce->version );
		wp_register_script( 'wc-country-select', get_template_directory_uri () . '/assets/js/woocommerce/core/country-select.js', array( 'jquery' ), $woocommerce->version );
		
		wp_dequeue_style( 'woocommerce-layout' );
		wp_dequeue_style( 'woocommerce-smallscreen' );
		wp_dequeue_style( 'woocommerce-inline' );
		wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
		
		wp_dequeue_style( 'jquery-selectBox' );
		wp_dequeue_style( 'yith-wcwl-font-awesome' );
		wp_dequeue_style( 'yith-wcwl-main' );
		
		wp_dequeue_style( 'dgwt-wcas-style' );
		
		wp_dequeue_style( 'yith_wcbsl_frontend_style' );
	}

	add_action( 'wp_enqueue_scripts', 'gm_woo_deregister_unused', 99 );
	
	// END Deregister Unused
	
	
	
	// JS Override
	
	add_action( 'wp_enqueue_scripts', 'gm_woo_override_frontend_scripts' );
	
	function gm_woo_override_frontend_scripts() {
		
		wp_deregister_script( 'jquery-blockui' );
		wp_enqueue_script( 'jquery-blockui', get_template_directory_uri() . '/assets/js/woocommerce/jquery-blockui/jquery.blockUI.js', array( 'jquery' ), '2.70' );
		
		wp_deregister_script( 'wc-add-to-cart' );
		wp_enqueue_script( 'wc-add-to-cart', get_template_directory_uri() . '/assets/js/woocommerce/frontend/add-to-cart.js', array( 'jquery', 'jquery-blockui' ), '1.0' );
	}
	
	// END JS Override
	
?>