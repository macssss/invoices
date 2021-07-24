<?php
	
	add_action( 'login_enqueue_scripts', 'gm_login_assets' );
	
	function gm_login_assets() {
		
		wp_enqueue_style( 'custom-login-css', get_stylesheet_directory_uri() . '/assets/css/style.css' );
	    wp_enqueue_script( 'custom-login-jquery', get_site_url() . '/wp-includes/js/jquery/jquery.js' );
	    wp_enqueue_script( 'custom-login-js', get_stylesheet_directory_uri() . '/assets/js/base/pages/login.js' );
	}
	
	
	
	add_filter( 'login_headerurl', 'gm_login_logo_url' );
	
	function gm_login_logo_url() {
	    
	    return home_url();
	}
	
	
	
	add_filter( 'login_headertitle', 'gm_login_logo_title' );
	
	function gm_login_logo_title() {
	
	    return get_bloginfo('name');
	}
	
?>