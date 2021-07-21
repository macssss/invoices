<?php
	
	// Admin Style
	
	add_action ( 'admin_enqueue_scripts', 'gm_add_admin_style' );
	
	function gm_add_admin_style () {
		
		wp_enqueue_style ( 'admin-css', get_template_directory_uri() . '/assets/admin/css/admin.css');
	}

	
	
	// Favicon on Admin Panel & Login Page

	function gm_add_favicon() {
		
	  	$favicon_url = get_stylesheet_directory_uri() . '/favicon.ico';
		echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
	}
	  
	add_action('login_head', 'gm_add_favicon');
	add_action('admin_head', 'gm_add_favicon');
	
	
	
	// Remove Yoast Schema

	function gm_remove_yoast_json( $data ) {
		
		$data = array();
		return $data;
	}
	
	add_filter('wpseo_json_ld_output', 'gm_remove_yoast_json', 10, 1);
	
	
	
	// Unlimate Dashboard Login Clear
	
	remove_action( 'customize_register', 'udb_login_customizer_panel' );
	remove_action( 'customize_register', 'udb_login_customizer_sections' );
	remove_action( 'customize_register', 'udb_login_customizer_controls' );
	remove_filter( 'login_headertext', 'udb_login_headertext', 20 );
	remove_filter( 'login_headerurl', 'udb_login_logo_url', 20 );
	remove_filter( 'login_headerurl', 'udb_login_logo_url', 20 );
	remove_action( 'login_head', 'udb_print_login_styles', 20 );
	remove_action( 'login_head', 'udb_print_login_live_styles', 20 );
		
		
	
	// Deregister Unused
	
	function gm_deregister_unused () {
		
		wp_dequeue_style( 'cld-font-awesome' );
		wp_dequeue_style( 'cld-frontend' );
		
		wp_dequeue_style( 'pld-font-awesome' );
		wp_dequeue_style( 'pld-frontend' );
		
		wp_dequeue_style( 'contact-form-7' );
		wp_dequeue_style( 'addtoany' );
	}

	add_action( 'wp_enqueue_scripts', 'gm_deregister_unused', 99 );
	
	add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );
	
	
	
	// Fonts Preload
	
	add_action('wp_head', 'gm_fonts_preload');
	
	function gm_fonts_preload() {
		
		echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/fonts/fa-brands-400.woff2" as="font" type="font/woff2" crossorigin="anonymous">';
		echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/fonts/fa-regular-400.woff2" as="font" type="font/woff2" crossorigin="anonymous">';
		echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/fonts/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin="anonymous">';
		echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/fonts/fontawesome-webfont.woff2" as="font" type="font/woff2" crossorigin="anonymous">';
		
	}
	
?>