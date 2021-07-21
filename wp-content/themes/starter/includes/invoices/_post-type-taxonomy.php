<?php

	add_action( 'init', 'gm_register_invoice_post_type' );
	
	function gm_register_invoice_post_type() {
		
		// Register Restaurant taxonomy for Invoice
		
		register_taxonomy( 'restaurant', [ 'invoices' ], [
			
			'labels'                => [
				'name'              => __( 'Restaurants', 'warp' ),
				'singular_name'     => __( 'Restaurant', 'warp' ),
				'search_items'      => __( 'Search Restaurants', 'warp' ),
				'all_items'         => __( 'All Restaurants', 'warp' ),
				'view_item '        => __( 'View Restaurant', 'warp' ),
				'parent_item'       => __( 'Parent Restaurant', 'warp' ),
				'parent_item_colon' => __( 'Parent Restaurant:', 'warp' ),
				'edit_item'         => __( 'Edit Restaurant', 'warp' ),
				'update_item'       => __( 'Update Restaurant', 'warp' ),
				'add_new_item'      => __( 'Add New Restaurant', 'warp' ),
				'new_item_name'     => __( 'New Restaurant Name', 'warp' ),
				'menu_name'         => __( 'Restaurants', 'warp' ),
			],
			
			'public'       => true,
			'hierarchical' => false,
		] );
		
		
		
		// Set labels for Invoice Post Type
		
		$labels = array(
			
			'name'                => __( 'Invoices', 'warp' ),
			'singular_name'       => __( 'Invoice', 'warp' ),
			'menu_name'           => __( 'Invoices', 'warp' ),
			'parent_item_colon'   => __( 'Parent Invoice', 'warp' ),
			'all_items'           => __( 'All Invoices', 'warp' ),
			'view_item'           => __( 'View Invoice', 'warp' ),
			'add_new_item'        => __( 'Add New Invoice', 'warp' ),
			'edit_item'           => __( 'Edit Invoice', 'warp' ),
			'update_item'         => __( 'Update Invoice', 'warp' ),
			'search_items'        => __( 'Search Invoice', 'warp' ),
		);
		
		
		// Set other options for Invoice Post Type
		
		$args = array(
			
			'labels'              => $labels,
			'public'              => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-calculator',
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
			'taxonomies'          => array( 'restaurant' ),
			'has_archive'         => true,
		);
		
		
		// Registering Invoice Post Type
		
		register_post_type( 'invoice', $args );
		
	}

?>