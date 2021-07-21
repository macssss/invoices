<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

$gm_product_id = get_the_ID();
$gm_price      = $product->get_price_html();
$gm_price_msrp = gm_woo_get_msrp_price( $gm_product_id );

?>

<div class="gm_woo-single-product__price">
    
    <div class="gm_woo-single-product-price">
        
        <div class="gm_woo-single-product-price__regular"><?php echo $gm_price; ?></div>
        
        <?php if ( $gm_price_msrp ): ?>
        
            <div class="gm_woo-single-product-price__msrp">
                <span class="gm_woo-single-product-price__label"><?php _e('Recommended retail price', 'warp'); ?>:</span>
                <?php echo $gm_price_msrp; ?>
            </div>
        
        <?php endif; ?>
    
    </div>
    
</div>


