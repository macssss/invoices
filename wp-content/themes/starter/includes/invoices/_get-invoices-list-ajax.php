<?php
	
	add_action( 'wp_ajax_get_invoices_list', 'gm_get_invoices_list_ajax' );
	add_action( 'wp_ajax_nopriv_get_invoices_list', 'gm_get_invoices_list_ajax' );
	
	function gm_get_invoices_list_ajax() {
		
		$params = isset( $_POST['params'] ) ? $_POST['params'] : '';
		
		$nonce     = '';
		$page      = 1;
		$status    = '';
		$from_date = '';
		$to_date   = '';
		$search    = '';
		
		if ( $params ) {
			
			$nonce     = isset( $params['nonce'] )        ? $params['nonce']      : $page;
			$page      = isset( $params['in_page'] )      ? $params['in_page']      : $page;
			$status    = isset( $params['in_status'] )    ? $params['in_status']    : $status;
			$from_date = isset( $params['in_from_date'] ) ? $params['in_from_date'] : $from_date;
			$to_date   = isset( $params['in_to_date'] )   ? $params['in_to_date']   : $to_date;
			$search    = isset( $params['in_search'] )    ? $params['in_search']    : $search;
		}
		
		if ( is_user_logged_in() && wp_verify_nonce( $nonce, 'gm_invoices_nonce' ) ) {
		
			$invoices_list = gm_get_invoices_list( $page, $status, $from_date, $to_date, $search );
			
			echo json_encode( $invoices_list );
			
		}
		
		die;
		
	}

?>