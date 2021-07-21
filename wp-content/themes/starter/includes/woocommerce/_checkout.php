<?php

	remove_action( 'woocommerce_checkout_terms_and_conditions', 'wc_checkout_privacy_policy_text', 20 );
	
	add_action( 'woocommerce_checkout_terms_and_conditions', 'gm_woo_checkout_privacy_policy_text', 20 );
	
	function gm_woo_checkout_privacy_policy_text() {
		
		echo '<div class="gm_woo-terms-and-conditions__privacy-policy-text uk-panel uk-panel-box woocommerce-privacy-policy-text">';
		wc_privacy_policy_text( 'checkout' );
		echo '</div>';
	}
	
	
	
	remove_action( 'woocommerce_checkout_terms_and_conditions', 'wc_terms_and_conditions_page_content', 30 );
	
	add_action( 'woocommerce_checkout_terms_and_conditions', 'gm_woo_terms_and_conditions_page_content', 30 );
	
	function gm_woo_terms_and_conditions_page_content() {
		
		$terms_page_id = wc_terms_and_conditions_page_id();
	
		if ( ! $terms_page_id ) {
			return;
		}
	
		$page = get_post( $terms_page_id );
	
		if ( $page && 'publish' === $page->post_status && $page->post_content && ! has_shortcode( $page->post_content, 'woocommerce_checkout' ) ) {
			echo '<div class="gm_woo-terms-and-conditions__terms-and-conditions woocommerce-terms-and-conditions" style="display: none;" data-simplebar><div class="gm_woo-terms-and-conditions__terms-and-conditions-inner">' . wp_kses_post( wc_format_content( $page->post_content ) ) . '</div></div>';
		}
	}
	
	
	
?>