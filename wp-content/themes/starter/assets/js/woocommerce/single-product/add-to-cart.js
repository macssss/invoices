jQuery( function($) {       
	$(document).ready( function() {
		
		var $warp_fragment_refresh = {
			
			url: wc_cart_fragments_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'get_refreshed_fragments' ),
			type: 'POST',
			success: function( data ) {
				
				if ( data && data.fragments ) {
		
					$.each( data.fragments, function( key, value ) {
						$( key ).replaceWith( value );
					});
		
					$( document.body ).trigger( 'wc_fragments_refreshed' );
				}
			}
		};
		
		$('[data-single-product-add-to-cart]').on('submit', function (e) {
			
			e.preventDefault();
		
			$('[data-single-product-add-to-cart]').block( { message: null } );
		
			var product_url = window.location;
			var form        = $(this);
		
			$.post( product_url, form.serialize() + '&_wp_http_referer=' + product_url, function ( result ) {
				
				console.log(result);
				
				var cart_dropdown       = $('.widget_shopping_cart', result);
				var woocommerce_message = $('.gm_woo-notices-wrapper', result);
		
				// update dropdown cart
				$('.widget_shopping_cart').replaceWith( cart_dropdown );
				
				// Show message
				$('.gm_woo-notices-wrapper').html( woocommerce_message );
				
				if ( $('.gm_woo-notices-wrapper').not(':empty') ) {
					UIkit.Utils.scrollToElement( UIkit.$('.gm_woo-notices-wrapper'), { 'offset' : header_offset + 16 + $('#wpadminbar').height() } );
				}
				
				// update fragments
				$.ajax( $warp_fragment_refresh );
		
				$('[data-single-product-add-to-cart]').unblock();
				
		
			});
		});
		
	});
});