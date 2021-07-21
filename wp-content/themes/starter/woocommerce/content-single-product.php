<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

$gm_woo_ask_form_shortcode  = get_option( 'gm_woo_ask_form_shortcode' );

?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'gm_woo-single-product', $product ); ?>>
	
	<h1 class="gm_woo-single-product__title uk-h2" data-product-title><?php the_title(); ?></h1>
	
	<div class="gm_woo-single-product__data uk-grid" data-uk-grid-margin>
		
		<div class="gm_woo-single-product__media uk-width-1-1">
			<?php
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
			?>
		</div>
		
		<div class="gm_woo-single-product__details uk-width-1-1">
			<div class="gm_woo-single-product__details-inner">
				<?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				do_action( 'woocommerce_single_product_summary' );
				?>
			</div>
		</div>
	</div>
	
	<div class="gm_woo-single-product__tabs gm_woo-single-product-tabs">
		
		<ul class="gm_woo-single-product-tabs__nav uk-tab" data-uk-tab="{connect:'#gm_single-product-tabs'}">
			
			<?php if ( get_the_content() ): ?>
		    
				<li><a href=""><?php esc_html_e( 'Description', 'woocommerce' ); ?></a></li>
			
			<?php endif; ?>
		    
			
		    <?php if ( $product->get_upsell_ids() ): ?>
		    	
				<li><a href=""><?php esc_html_e( 'Equipment', 'warp' ); ?></a></li>
		    
			<?php endif; ?>
		    
			
		    <?php if ( get_field('woocr_ids') ): ?>
		    	
				<li><a href=""><?php esc_html_e( 'Related products', 'warp' ); ?></a></li>
		    
			<?php endif; ?>
		    
			
			<?php if ( $gm_woo_ask_form_shortcode ): ?>
		    
				<li><a href=""><?php esc_html_e( 'Ask Us', 'warp' ); ?></a></li>
		    
			<?php endif; ?>
			
		</ul>
		
		
		
		<ul id="gm_single-product-tabs" class="gm_woo-single-product-tabs__switcher uk-switcher">
			
			<?php if ( get_the_content() ): ?>
			
			    <li>
			    	<div class="gm_woo-single-product-tabs__content gm_woo-single-product__description"><?php the_content(); ?></div>
			    </li>
				
			<?php endif; ?>
		
		
		
			<?php
				/**
				 * Hook: woocommerce_after_single_product_summary.
				 *
				 * @hooked woocommerce_output_product_data_tabs - 10
				 * @hooked woocommerce_upsell_display - 15
				 * @hooked woocommerce_output_related_products - 20
				 */
				do_action( 'woocommerce_after_single_product_summary' );
			?>
			
			
			
			<?php if ( $gm_woo_ask_form_shortcode ): ?>
				<li>
					<div class="gm_woo-single-product-tabs__content gm_woo-single-product__ask-us">
						
						<div class="gm_woo-single-product-ask-us">
							
							<?php echo do_shortcode( $gm_woo_ask_form_shortcode ); ?>
							
						</div>
						
					</div>
				</li>
			<?php endif; ?>
			
		</ul>
	</div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
