<?php
	
	function gm_remove_from_admin_bar( $wp_admin_bar ) {

	    $wp_admin_bar->remove_node('bapf_debug_bar');
	}

	add_action('admin_bar_menu', 'gm_remove_from_admin_bar', 1001);
	
?>