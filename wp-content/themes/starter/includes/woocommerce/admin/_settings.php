<?php
	
	add_filter( 'woocommerce_get_settings_products', 'gm_woo_ask_form', 10, 2 );
	
	function gm_woo_ask_form( $settings, $current_section ) {
		
		if ( $current_section == '' ) {
			
			$settings[] = array( 'name' => 'Ask Form', 'type' => 'title', 'id' => 'gm_woo_ask_form' );
			
			
			
			$settings[] = array(
				'name'     => 'Form Shortcode',
				'id'       => 'gm_woo_ask_form_shortcode',
				'type'     => 'text'
			);
			
			$settings[] = array( 'type' => 'sectionend', 'id' => 'gm_woo_ask_form' );

			return $settings;

		}
		
		else {
			return $settings;
		}
	}	
?>