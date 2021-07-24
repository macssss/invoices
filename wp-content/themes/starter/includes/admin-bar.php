<?php
	
	add_action( 'admin_bar_menu', 'gm_admin_bar_menu', 999 );
	
	function gm_admin_bar_menu( $wp_admin_bar) {
		
		$wp_admin_bar->remove_node('litespeed-single-action');
		$wp_admin_bar->remove_node('litespeed-purge-all-lscache');
		$wp_admin_bar->remove_node('litespeed-purge-cssjs');
		$wp_admin_bar->remove_node('litespeed-purge-opcache');
		$wp_admin_bar->remove_node('litespeed-purge-ccss');
		
		$wp_admin_bar->remove_node('comments');
		$wp_admin_bar->remove_node('new-udb_widgets');
		
	}
	
?>