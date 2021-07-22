<?php

	function gm_get_invoices_list() {
		
		$invoices_return = array();
		
		
		// Get Posts
		
		$args = array(
			
			'post_type'      => 'invoice',
			'posts_per_page' => 6,
			'paged'          => 1
		);
		
		$invoices_data = get_posts( $args );
		
		// END Get Posts
		
		
		// Get All Posts
		
		$args['posts_per_page'] = -1;
		
		$all_posts_count = count( get_posts( $args ) );
		
		// END Get Posts
		
		
		
		// Items
		
		$invoices_list = '';
		
		foreach ( $invoices_data as $item ) {
			
			ob_start();
			
			get_template_part( 'invoices/item', '', array( 'item' => $item ) );
			$invoices_list .= ob_get_contents();
			
			ob_end_clean();
			
		}
		
		$invoices_return['list'] = $invoices_list;
		
		// END Items
		
		
		
		// Pagination
		
		ob_start();
		
		get_template_part( 'invoices/pagination', '', array( 'count' => $all_posts_count, 'per_page' => 6, 'current' => 1 ) );
		$invoices_return['pagination'] = ob_get_contents();
		
		ob_end_clean();
		
		// END Pagination
		
		
		return $invoices_return;	
	}

?>