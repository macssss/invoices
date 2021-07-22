<?php
	
	function gm_get_invoices() {
		
		
		$invoices_list = gm_get_invoices_list();
		
		
		ob_start();
		
		get_template_part( 'invoices/container', '', array( 'invoices_list' => $invoices_list ) );
		$invoices = ob_get_contents();
		
		ob_end_clean();
		
		
		return $invoices;
		
	}

?>