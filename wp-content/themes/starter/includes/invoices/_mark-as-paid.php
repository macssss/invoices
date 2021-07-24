<?php

	add_action( 'wp_ajax_mark_as_paid_invoices', 'gm_mark_as_paid_invoices' );
	add_action( 'wp_ajax_nopriv_mark_as_paid_invoices', 'gm_mark_as_paid_invoices' );
	
	function gm_mark_as_paid_invoices() {
		
		$ids = isset( $_POST['ids'] ) ? $_POST['ids'] : '';
		
		foreach ( $ids as $id ) {
			
			update_field('status', 'paid', $id);
			
		}
		
		die;
		
	}

?>