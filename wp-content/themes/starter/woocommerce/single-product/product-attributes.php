<?php
/**
 * Product attributes
 *
 * Used by list_attributes() in the products class.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-attributes.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;
?>

<?php
	
	global $product;
	
	$gm_ean   = get_field( 'ean' );
	
	$gm_brand = wp_get_post_terms( $product->get_id(), 'brand' );
	
	if ( $gm_brand ) {
		
		$gm_brand       = $gm_brand[0];
		$gm_brand_name  = $gm_brand->name;
		$gm_brand_link  = get_term_link( $gm_brand, 'brand' );
	}
?>
	
<div class="gm_woo-single-product__attributes">
	
	<div class="gm_woo-single-product-attributes">
	
		<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
		
			<div class="gm_woo-single-product-attributes__item gm_woo-single-product-attributes__item--sku">
			
				<div class="gm_woo-single-product-attributes__item-label">
					<?php esc_html_e( 'SKU', 'warp' ); ?>
				</div>
				
				<div class="gm_woo-single-product-attributes__item-value" data-product-sku>
					<?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?>
				</div>
			
			</div>
			
		<?php endif; ?>
	
	
		
		<?php if ( $gm_brand ) : ?>
		
			<div class="gm_woo-single-product-attributes__item gm_woo-single-product-attributes__item--brand">
				
				<div class="gm_woo-single-product-attributes__item-label"><?php esc_html_e( 'Brand', 'warp' ); ?></div>
				<div class="gm_woo-single-product-attributes__item-value"><a href="<?php echo $gm_brand_link; ?>"><?php echo $gm_brand_name; ?></a></div>
				
			</div>
		
		<?php endif; ?>
		
		
		
		<?php if ( $product_attributes ): ?>
		
			<?php foreach ( $product_attributes as $product_attribute_key => $product_attribute ) : ?>
				
				<div class="gm_woo-single-product-attributes__item gm_woo-single-product-attributes__item--<?php echo esc_attr( $product_attribute_key ); ?>">
					
					<div class="gm_woo-single-product-attributes__item-label"><?php echo wp_kses_post( $product_attribute['label'] ); ?></div>
					<div class="gm_woo-single-product-attributes__item-value"><?php echo wp_strip_all_tags( $product_attribute['value'] ); ?></div>
					
				</div>
				
			<?php endforeach; ?>
			
		<?php endif; ?>
	
	
	
		<?php if ( $gm_ean ): ?>
		
			<div class="gm_woo-single-product-attributes__item gm_woo-single-product-attributes__item--ean">
				
				<div class="gm_woo-single-product-attributes__item-label"><?php esc_html_e( 'EAN', 'warp' ); ?></div>
				<div class="gm_woo-single-product-attributes__item-value" data-product-ean><?php echo $gm_ean; ?></div>
				
			</div>
		
		<?php endif; ?>
	
	</div>
	
</div>