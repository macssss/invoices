<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>

<?php
	
	$gm_brand = wp_get_post_terms( $product->get_id(), 'brand' );
	
	if ( $gm_brand ) {
		
		$gm_brand         = $gm_brand[0];
		$gm_brand_name    = $gm_brand->name;
		$gm_brand_link    = get_term_link( $gm_brand, 'brand' );
		
		$gm_brand_logo_id = get_field( 'original_logo', $gm_brand ) ? get_field( 'original_logo', $gm_brand )['ID'] : '';
		$gm_brand_logo    = $gm_brand_logo_id ? wp_get_attachment_image( $gm_brand_logo_id, '', false, array( 'alt' => $gm_brand_name ) ) : '';
	}
	
?>

<div class="gm_woo-single-product__meta">
	
	<?php if ( $gm_brand && $gm_brand_logo ): ?>
	
		<div class="gm_woo-single-product__brand">
			
			<div class="gm_woo-single-product-brand">
				<a href="<?php echo $gm_brand_link; ?>">
					<?php echo $gm_brand_logo; ?>
				</a>
			</div>
			
		</div>
		
	<?php endif; ?>


	<?php do_action( 'woocommerce_product_additional_information', $product ); ?>

	<?php do_action( 'woocommerce_product_meta_start' ); ?>
	
	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
