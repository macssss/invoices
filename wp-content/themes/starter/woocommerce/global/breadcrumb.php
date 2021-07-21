<?php
/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! empty( $breadcrumb ) ) {
	
	$output = '';
	
	$output .= $wrap_before;

	foreach ( $breadcrumb as $key => $crumb ) {

		if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
			
			$output .= $before;
			$output .= '<a href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a>';
		}
		
		else {
			
			$output .= '<li class="uk-active">';
			$output .= '<span>' . esc_html( $crumb[0] ) . '</span>';
		}

		$output .= $after;
	}
	
	$output .= $wrap_after;
	
	$output .= '<div class="gm_breadcrumb-mobile uk-hidden" data-uk-dropdown="{mode:\'click\', pos:\'bottom-left\'}">';
		$output .= '<a class="gm_breadcrumb-mobile__toggler">' . $breadcrumb[count($breadcrumb)-1][0] . '</a>';
		
		$output .= '<div class="gm_breadcrumb-mobile__dropdown uk-dropdown">';
			$output .= '<ul class="gm_breadcrumb-mobile__nav uk-nav uk-nav-dropdown">';
			
				foreach ( $breadcrumb as $key => $crumb ) {

					if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
						
						$output .= '<li><a href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a></li>';
					}
					
				}
				
			$output .= '</ul>';
		$output .= '</div>';
	$output .= '</div>';
	
	echo $output;

}
