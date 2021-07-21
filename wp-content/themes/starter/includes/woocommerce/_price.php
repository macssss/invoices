<?php
	
	add_filter( 'wc_price', 'gm_woo_wc_price', '', 5 );
	
	function gm_woo_wc_price( $return, $price, $args, $unformatted_price, $original_price ) {
		
		$negative        = $price < 0;
		
		$return  = '<span class="gm_price">';
		
		$formatted_price = ( $negative ? '-' : '' ) . sprintf( $args['price_format'], '<span class="gm_price__currency">' . get_woocommerce_currency_symbol( $args['currency'] ) . '</span>', '<span class="gm_price__value">' . $price . '</span>' );
		
		$return          .= '<span class="gm_price__amount"><bdi>' . $formatted_price . '</bdi></span>';
	
		if ( $args['ex_tax_label'] && wc_tax_enabled() ) {
		
			$return .= ' <small class="gm_price__tax-label">' . WC()->countries->ex_tax_or_vat() . '</small>';
		}
		
		$return .= '</span>';
		
		return $return;
		
	}
	
	
	
	add_filter( 'woocommerce_get_price_html', 'gm_woo_get_price_html' );
	
	function gm_woo_get_price_html( $price ) {
		
		return '<span class="gm_price-block">' . $price . '</span>';
		
	}

?>