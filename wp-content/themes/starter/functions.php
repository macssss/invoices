<?php

	// check compatibility
	if ( version_compare ( PHP_VERSION, '5.3', '>=' ) ) {
	
	    // bootstrap warp
	    require ( __DIR__.'/warp.php' );
	}
	
	// Includes
	
	require get_template_directory () . '/includes/admin-bar.php';
	require get_template_directory () . '/includes/head.php';
	require get_template_directory () . '/includes/images.php';
	require get_template_directory () . '/includes/login.php';
	require get_template_directory () . '/includes/system.php';
	require get_template_directory () . '/includes/user-avatar.php';
	require get_template_directory () . '/includes/user-capabilities.php';
	
	//require get_template_directory () . '/includes/blog/blog.php';
	require get_template_directory () . '/includes/invoices/invoices.php';
	
	if ( function_exists( 'is_plugin_active' ) ) {
		
		if ( is_plugin_active ( 'js_composer/js_composer.php' ) ) {
			require get_template_directory () . '/includes/vc-composer/vc-composer.php';
		}
		
		if ( is_plugin_active ( 'woocommerce/woocommerce.php' ) ) {
			require get_template_directory () . '/includes/woocommerce/woocommerce.php';
		}
	}
	
	// END Includes
