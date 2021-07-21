<?php
	
	// Breadcrumb
	
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	
	add_action( 'woocommerce_before_main_content', 'gm_woo_breadcrumb', 20, 0 );
	
	function gm_woo_breadcrumb( $args = array() ) {
		
		$args = wp_parse_args(
			$args,
			apply_filters(
				'woocommerce_breadcrumb_defaults',
				array(
					'delimiter'   => '',
					'wrap_before' => '<div class="gm_woo-breadcrumb"><ul class="uk-breadcrumb">',
					'wrap_after'  => '</ul></div>',
					'before'      => '<li>',
					'after'       => '</li>',
					'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
				)
			)
		);

		$breadcrumbs = new WC_Breadcrumb();

		if ( ! empty( $args['home'] ) ) {
			$breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
		}

		$args['breadcrumb'] = $breadcrumbs->generate();

		/**
		 * WooCommerce Breadcrumb hook
		 *
		 * @hooked WC_Structured_Data::generate_breadcrumblist_data() - 10
		 */
		do_action( 'woocommerce_breadcrumb', $breadcrumbs, $args );

		wc_get_template( 'global/breadcrumb.php', $args );
		
	}
	
	// END Breadcrumb
	
?>