<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}



$gm_product_stock       = get_post_meta( get_the_ID(), '_stock_status', true );

$gm_product_stock_label = '';

switch ( $gm_product_stock ) {
	
	case 'instock':
	
		$gm_product_stock_label = esc_html__( 'In stock', 'woocommerce' );
		break;
		
	case 'outofstock':
	
		$gm_product_stock_label = esc_html__( 'Out of stock', 'woocommerce' );
		break;
} 

?>

<li>
	<div <?php wc_product_class( 'gm_woo-product-item uk-panel uk-panel-box uk-panel-box-white uk-panel-box-white-hover', $product ); ?>>
		<?php
		/**
		 * Hook: woocommerce_before_shop_loop_item.
		 *
		 * @hooked woocommerce_template_loop_product_link_open - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item' ); ?>
		
		<div class="gm_woo-product-item__top">
			
			<div class="gm_woo-product-item__badges gm_woo-badges">
				
				<?php do_action( 'gm_woo-bestseller-badge' ); ?>
				
				<?php if ( get_field('recommended') == 'yes' ): ?>
					<div class="gm_woo-badge gm_woo-badge--recommended"></div>
				<?php endif; ?>
				
				<?php if ( $product->is_on_sale() || get_field('on_sale') == 'yes' ) : ?>
					<?php echo apply_filters( 'woocommerce_sale_flash', '<div class="gm_woo-badge gm_woo-badge--sale">' . esc_html__( 'Sale!', 'woocommerce' ) . '</div>', $post, $product ); ?>
				<?php endif; ?>
				
			</div>
			
			<div class="gm_woo-product-item__add-to-wishlist">
				<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
			</div>
			
			<?php
			/**
			 * Hook: woocommerce_before_shop_loop_item_title.
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */ 
			do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
			
			<?php
			/**
			 * Hook: woocommerce_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			do_action( 'woocommerce_shop_loop_item_title' ); ?>
		</div>
		
		<div class="gm_woo-product-item__bottom">
			<?php
			/**
			 * Hook: woocommerce_after_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
		
			/**
			 * Hook: woocommerce_after_shop_loop_item.
			 *
			 * @hooked woocommerce_template_loop_product_link_close - 5
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item' );
			?>
			
			<div class="gm_woo-product-item__stock gm_woo-product-stock gm_woo-product-stock--<?php echo $gm_product_stock; ?>">
				<?php echo $gm_product_stock_label; ?>
			</div>
			
		</div>
		
	</div>
</li>
