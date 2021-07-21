<?php
	
	// Remove Container Link
	
	remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
	
	// END Remove Container Link
	
	
	
	// Thumbnail
	
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
	
	function gm_woo_template_loop_product_thumbnail() {
		
		global $product;

		$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
		
		$thumbnail = '';
		$thumbnail .= '<div class="gm_woo-product-item__media">';
			$thumbnail .= get_the_post_thumbnail( $product->get_id(), 'woocommerce_thumbnail', array( 'alt' => get_the_title(), 'class' => 'uk-overlay-scale' ) );
			$thumbnail .= '<a href="' . esc_url( $link ) . '" class="gm_media-link uk-position-cover"></a>';
		$thumbnail .= '</div>';
		
		echo $thumbnail;
	}
	
	add_action( 'woocommerce_before_shop_loop_item_title', 'gm_woo_template_loop_product_thumbnail', 10 );
	
	// END Thumbnail
	
	
	
	// Title
	
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
	
	function gm_woo_template_loop_product_title() {
		
		global $product;

		$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
		
		echo '<h3 class="gm_woo-product-item__title uk-h6"><a href="' . esc_url( $link ) . '">' . get_the_title() . '</a></h3>';
	}
	
	add_action( 'woocommerce_shop_loop_item_title', 'gm_woo_template_loop_product_title', 10);
	
	// END Title
	
	
	
	// Remove Add to Cart
	
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	
	// Remove Add to Cart
	
?>