<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $post, $product;

$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'gm_woo-product-gallery',
	'gm_woo-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' )
) );



$product_title = get_the_title();
		
if ( $product->get_image_id() ) {
	
	$product_image = wp_get_attachment_image_src( get_post_thumbnail_id() )[0];
	$product_image_preview = wp_get_attachment_image( get_post_thumbnail_id(), 'woocommerce_single_image', false, array( 'alt' => $product_title ) );
	$product_image_thumb = wp_get_attachment_image( get_post_thumbnail_id(), 'woocommerce_gallery_thumb', false, array( 'alt' => $product_title ) );
}

else {
	
	$product_not_image = wc_placeholder_img( 'woocommerce_single_image', array( 'alt' => esc_html__( 'Awaiting product image', 'woocommerce' ) ) );
}

$product_gallery_ids = $product->get_gallery_image_ids();

?>

<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>">
	
	<div class="gm_woo-product-gallery__badges">
		
		<div class="gm_woo-badges">
			
			<?php if ( get_field('recommended') == 'yes' ): ?>
			
				<div class="gm_woo-badge gm_woo-badge--recommended"></div>
			
			<?php endif; ?>
			
			
			<?php if ( $product->is_on_sale() || get_field('on_sale') == 'yes' ) : ?>
				
				<?php echo apply_filters( 'woocommerce_sale_flash', '<div class="gm_woo-badge gm_woo-badge--sale">' . esc_html__( 'Sale!', 'woocommerce' ) . '</div>', $post, $product ); ?>
			
			<?php endif; ?>
			
			
			<?php do_action( 'gm_woo-bestseller-badge' ); ?>
			
		</div>
		
	</div>
	
	
	<div class="gm_woo-product-gallery__add-to-wishlist">
	
		<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
	
	</div>
	
	
	
	<div class="gm_woo-product-gallery__slides gm_js_woo-product-gallery-slides swiper-container uk-slidenav-position">
		<div class="swiper-wrapper">
			
			<div class="swiper-slide">
				
				<?php if ( !$product->get_image_id() ): ?>
				
					<?php echo $product_not_image; ?>
				
				<?php else: ?>
				
					<a href="<?php echo $product_image; ?>" title="<?php echo $product_title; ?>" data-uk-lightbox="{group:'gm_product-gallery'}">
						<?php echo $product_image_preview; ?>
					</a>
				<?php endif; ?>
				
			</div>
			
			
			<?php if ( $product_gallery_ids ): ?>
			
				<?php foreach( $product_gallery_ids as $product_gallery_id ) :
					
				    $product_gallery_image = wp_get_attachment_image_src( $product_gallery_id )[0];
			        $product_gallery_image_preview = wp_get_attachment_image( $product_gallery_id, 'woocommerce_single_image', false, array( 'alt' => $product_title ) );
				?>
				
				<div class="swiper-slide">
					<a href="<?php echo $product_gallery_image; ?>" title="<?php echo $product_title; ?>" data-uk-lightbox="{group:'gm_product-gallery'}">
						<?php echo $product_gallery_image_preview; ?>
					</a>
				</div>
				
				<?php endforeach; ?>
			
			<?php endif; ?>
		
		</div>
		
		<?php if ( $product_gallery_ids ): ?>
			<a href="#" class="uk-slidenav uk-slidenav-previous uk-hidden-touch"></a>
			<a href="#" class="uk-slidenav uk-slidenav-next uk-hidden-touch"></a>
		<?php endif; ?>
		
	</div>
	
	
	
	<?php if ( $product_gallery_ids ): ?>
	<div class="gm_woo-product-gallery__thumbs-cont uk-slidenav-position">
		<div class="gm_woo-product-gallery__thumbs gm_js_woo-product-gallery-thumbs swiper-container">
			<div class="swiper-wrapper">
				
				<div class="swiper-slide">
					<div class="gm_woo-product-gallery__thumb"><?php echo $product_image_thumb; ?></div>
				</div>
				
				<?php foreach( $product_gallery_ids as $product_gallery_id ) :
					
			        $product_gallery_image_thumb = wp_get_attachment_image( $product_gallery_id, 'woocommerce_gallery_thumb', false, array( 'alt' => $product_title ) );
				?>
				
				<div class="swiper-slide">
					<div class="gm_woo-product-gallery__thumb"><?php echo $product_gallery_image_thumb; ?></div>
				</div>
				
				<?php endforeach; ?>
			
			</div>
		</div>
		
		<a href="#" class="uk-slidenav uk-slidenav-previous uk-hidden-touch"></a>
		<a href="#" class="uk-slidenav uk-slidenav-next uk-hidden-touch"></a>
	</div>
	<?php endif; ?>
	
</div>
