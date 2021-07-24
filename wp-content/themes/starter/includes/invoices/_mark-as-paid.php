<?php

	add_action( 'wp_ajax_mark_as_paid_invoices', 'gm_mark_as_paid_invoices' );
	add_action( 'wp_ajax_nopriv_mark_as_paid_invoices', 'gm_mark_as_paid_invoices' );
	
	function gm_mark_as_paid_invoices() {
		
		$nonce = isset( $_POST['nonce'] ) ? $_POST['nonce'] : '';
		
		if ( is_user_logged_in() && wp_verify_nonce( $nonce, 'gm_invoices_nonce' ) ) {
			
			$ids = isset( $_POST['ids'] ) ? $_POST['ids'] : '';
			
			foreach ( $ids as $id ) {
				
				update_field('status', 'paid', $id);
				
			}
			
		}
		
		die;
		
	}

?>