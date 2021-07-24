<?php
	
	function gm_get_invoices() {
		
		$page      = isset( $_GET['in_page'] )      ? $_GET['in_page'] : 1;
		$status    = isset( $_GET['in_status'] )    ? $_GET['in_status'] : '';
		$from_date = isset( $_GET['in_from_date'] ) ? $_GET['in_from_date'] : '';
		$to_date   = isset( $_GET['in_to_date'] )   ? $_GET['in_to_date'] : '';
		$search    = isset( $_GET['in_search'] )    ? $_GET['in_search'] : '';
		$statuses  = gm_get_statuses();
		
		$invoices_data       = gm_get_invoices_list( $page, $status, $from_date, $to_date, $search );
		
		$invoices_list       = $invoices_data['list'];
		$invoices_pagination = $invoices_data['pagination'];
		
		
		ob_start();
		
		$args = array(
			
			'invoices_list'       => $invoices_list,
			'invoices_pagination' => $invoices_pagination,
			'status'              => $status,
			'from_date'           => $from_date,
			'to_date'             => $to_date,
			'search'              => $search,
			'statuses'            => $statuses
		);
		
		get_template_part( 'invoices/container', '', $args );
		$invoices = ob_get_contents();
		
		ob_end_clean();
		
		
		return $invoices;
		
	}
	
	
	function gm_get_statuses() {
		
		$statuses = array(
			
			array(
				
				'label' => __( 'All', 'warp' ),
				'value' => 'all'
			),
			
			array(
				
				'label' => __( 'Ongoing', 'warp' ),
				'value' => 'ongoing'
			),
			
			array(
				
				'label' => __( 'Verified', 'warp' ),
				'value' => 'verified'
			),
			
			array(
				
				'label' => __( 'Pending', 'warp' ),
				'value' => 'pending'
			),
			
			array(
				
				'label' => __( 'Paid', 'warp' ),
				'value' => 'paid'
			),
		);
		
		return $statuses;
	}

?>