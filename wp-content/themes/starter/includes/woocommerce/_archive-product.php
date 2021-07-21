<?php
	
	remove_action( 'woocommerce_cart_is_empty', 'woocommerce_output_all_notices', 5 );
	remove_action( 'woocommerce_shortcode_before_product_cat_loop', 'woocommerce_output_all_notices', 10 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );
	remove_action( 'woocommerce_before_single_product', 'woocommerce_output_all_notices', 10 );
	remove_action( 'woocommerce_before_cart', 'woocommerce_output_all_notices', 10 );
	remove_action( 'woocommerce_before_checkout_form_cart_notices', 'woocommerce_output_all_notices', 10 );
	remove_action( 'woocommerce_before_checkout_form', 'woocommerce_output_all_notices', 10 );
	remove_action( 'woocommerce_account_content', 'woocommerce_output_all_notices', 5 );
	remove_action( 'woocommerce_before_customer_login_form', 'woocommerce_output_all_notices', 10 );
	remove_action( 'woocommerce_before_lost_password_form', 'woocommerce_output_all_notices', 10 );
	remove_action( 'before_woocommerce_pay', 'woocommerce_output_all_notices', 10 );
	remove_action( 'woocommerce_before_reset_password_form', 'woocommerce_output_all_notices', 10 );
	
	function gm_woo_output_all_notices() {
		
		echo '<div class="gm_woo-notices-wrapper">';
		wc_print_notices();
		echo '</div>';
	}
	
	add_action( 'woocommerce_cart_is_empty', 'gm_woo_output_all_notices', 5 );
	add_action( 'woocommerce_shortcode_before_product_cat_loop', 'gm_woo_output_all_notices', 10 );
	add_action( 'woocommerce_before_shop_loop', 'gm_woo_output_all_notices', 10 );
	add_action( 'woocommerce_before_single_product', 'gm_woo_output_all_notices', 10 );
	add_action( 'woocommerce_before_cart', 'gm_woo_output_all_notices', 10 );
	add_action( 'woocommerce_before_checkout_form_cart_notices', 'gm_woo_output_all_notices', 10 );
	add_action( 'woocommerce_before_checkout_form', 'gm_woo_output_all_notices', 10 );
	add_action( 'woocommerce_account_content', 'gm_woo_output_all_notices', 5 );
	add_action( 'woocommerce_before_customer_login_form', 'gm_woo_output_all_notices', 10 );
	add_action( 'woocommerce_before_lost_password_form', 'gm_woo_output_all_notices', 10 );
	add_action( 'before_woocommerce_pay', 'gm_woo_output_all_notices', 10 );
	add_action( 'woocommerce_before_reset_password_form', 'gm_woo_output_all_notices', 10 );
	
?>