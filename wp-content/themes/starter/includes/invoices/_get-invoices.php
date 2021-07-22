<?php
	
	function gm_get_invoices() {
		
		$invoices_data       = gm_get_invoices_list();
		$invoices_list       = $invoices_data['list'];
		$invoices_pagination = $invoices_data['pagination'];
		
		
		ob_start();
		
		get_template_part( 'invoices/container', '', array( 'invoices_list' => $invoices_list, 'invoices_pagination' => $invoices_pagination ) );
		$invoices = ob_get_contents();
		
		ob_end_clean();
		
		
		return $invoices;
		
	}

?>