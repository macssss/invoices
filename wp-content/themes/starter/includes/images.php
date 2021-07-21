<?php
	
	add_filter( 'big_image_size_threshold', '__return_false' );
	
	
	
	add_action('init', 'gm_image_sizes');
	
	function gm_image_sizes() {
		
		remove_image_size('1536x1536');
		remove_image_size('2048x2048');
		remove_image_size('crp_thumbnail');
		
		add_image_size( 'small', 300, 200, true );
	}
	
	
	
	add_filter('intermediate_image_sizes', 'gm_remove_default_image_sizes');
	
	function gm_remove_default_image_sizes( $sizes ) {
		
		return array_diff( $sizes, array(
			'medium_large',
		));
	}
	

	
	update_option( 'medium_crop', 1 );
	update_option( 'large_crop', 1 );
	
?>