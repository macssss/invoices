<?php
	
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
	
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
	
?>