<?php
	
	remove_action ( 'wp_head', 'feed_links', 2 ); 
	remove_action ( 'wp_head', 'feed_links_extra', 3 ); 
	remove_action ( 'wp_head', 'rsd_link' ); 
	remove_action ( 'wp_head', 'wlwmanifest_link' ); 
	remove_action ( 'wp_head', 'wp_shortlink_wp_head', 10, 0); 
	remove_action ( 'wp_head', 'wp_generator' );
	remove_action ( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	
	
	
	add_action ( 'wp_footer', 'gm_deregister_wp_embed' );
	
	function gm_deregister_wp_embed () {
		
		wp_dequeue_script ( 'wp-embed' );
	}

?>