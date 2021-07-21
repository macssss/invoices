<?php
	
	require get_template_directory () . '/includes/vc-composer/_vc-btn.php';
	require get_template_directory () . '/includes/vc-composer/_vc-column-inner.php';
	require get_template_directory () . '/includes/vc-composer/_vc-column-text.php';
	require get_template_directory () . '/includes/vc-composer/_vc-column.php';
	require get_template_directory () . '/includes/vc-composer/_vc-custom-heading.php';
	require get_template_directory () . '/includes/vc-composer/_vc-line-chart.php';
	require get_template_directory () . '/includes/vc-composer/_vc-progress-bar.php';
	require get_template_directory () . '/includes/vc-composer/_vc-raw-html.php';
	require get_template_directory () . '/includes/vc-composer/_vc-raw-js.php';
	require get_template_directory () . '/includes/vc-composer/_vc-round-chart.php';
	require get_template_directory () . '/includes/vc-composer/_vc-row-inner.php';
	require get_template_directory () . '/includes/vc-composer/_vc-row.php';
	require get_template_directory () . '/includes/vc-composer/_vc-section.php';
	require get_template_directory () . '/includes/vc-composer/_vc-separator.php';
	require get_template_directory () . '/includes/vc-composer/_vc-single-image.php';
	require get_template_directory () . '/includes/vc-composer/_vc-video.php';
	

	add_action ( 'init', 'visualmeta', 100 );
	
	function visualmeta () {
	    remove_action ( 'wp_head', array ( visual_composer(), 'addMetaData') );
	}


	remove_action ( 'wp_enqueue_scripts', 'bodhi_svgs_frontend_css' );
	remove_action ( 'wp_enqueue_scripts', 'vc_base_register_front_css' );


	function wp_deregister_unused () {
		
		wp_dequeue_style ( 'wordpress-popular-posts-css' );
		wp_dequeue_style ( 'js_composer_front' );
		wp_dequeue_style ( 'vc_lte_ie9' );
		wp_dequeue_script ( 'wpb_composer_front_js' );
		wp_deregister_style ( 'js_composer_front' );
	}

	add_action ( 'wp_enqueue_scripts', 'wp_deregister_unused', 99 );

	setcookie ('vchideactivationmsg', '1', strtotime ( '+99 years' ), '/');
	setcookie ('vchideactivationmsg_vc11', ( defined ( 'WPB_VC_VERSION' ) ? WPB_VC_VERSION : '1' ), strtotime ( '+99 years' ), '/');
	
	
	vc_remove_element( "vc_icon" );
	vc_remove_element( "vc_zigzag" );
	vc_remove_element( "vc_text_separator" );
	vc_remove_element( "vc_message" );
	vc_remove_element( "vc_hoverbox" );
	vc_remove_element( "vc_facebook" );
	vc_remove_element( "vc_tweetmeme" );
	vc_remove_element( "vc_googleplus" );
	vc_remove_element( "vc_pinterest" );
	vc_remove_element( "vc_toggle" );
	vc_remove_element( "vc_gallery" );
	vc_remove_element( "vc_images_carousel" );
	vc_remove_element( "vc_tta_tabs" );
	vc_remove_element( "vc_tta_tour" );
	vc_remove_element( "vc_tta_accordion" );
	vc_remove_element( "vc_tta_pageable" );
	vc_remove_element( "vc_tta_section" );
	vc_remove_element( "vc_cta" );
	vc_remove_element( "vc_widget_sidebar" );
	vc_remove_element( "vc_posts_slider" );
	vc_remove_element( "vc_gmaps" );
	vc_remove_element( "vc_flickr" );
	vc_remove_element( "vc_pie" );
	vc_remove_element( "vc_empty_space" );
	vc_remove_element( "vc_basic_grid" );
	vc_remove_element( "vc_media_grid" );
	vc_remove_element( "vc_masonry_grid" );
	vc_remove_element( "vc_masonry_media_grid" );
	vc_remove_element( "vc_tabs" );
	vc_remove_element( "vc_tour" );
	vc_remove_element( "vc_tab" );
	vc_remove_element( "vc_accordion" );
	vc_remove_element( "vc_accordion_tab" );
	vc_remove_element( "vc_acf" );
	vc_remove_element( "vc_gutenberg" );
	vc_remove_element( "vc_wp_search" );
	vc_remove_element( "vc_wp_meta" );
	vc_remove_element( "vc_wp_recentcomments" );
	vc_remove_element( "vc_wp_calendar" );
	vc_remove_element( "vc_wp_pages" );
	vc_remove_element( "vc_wp_tagcloud" );
	vc_remove_element( "vc_wp_custommenu" );
	vc_remove_element( "vc_wp_text" );
	vc_remove_element( "vc_wp_posts" );
	vc_remove_element( "vc_wp_links" );
	vc_remove_element( "vc_wp_categories" );
	vc_remove_element( "vc_wp_archives" );
	vc_remove_element( "vc_wp_rss" );

?>
