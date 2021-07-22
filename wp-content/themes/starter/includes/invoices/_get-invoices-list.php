<?php

	function gm_get_invoices_list() {
		
		$invoices_list_output = '';
		
		$args = array(
			
			'post_type'      => 'invoice',
			'posts_per_page' => 6,
			'paged'          => 1
		);
		
		$invoices_list = get_posts( $args );
		
		
		foreach ( $invoices_list as $item ) {
			
			ob_start();
			
			get_template_part( 'invoices/item', '', array( 'item' => $item ) );
			$invoices_list_output .= ob_get_contents();
			
			ob_end_clean();
			
		}
		
		
		return $invoices_list_output;	
	}

?>