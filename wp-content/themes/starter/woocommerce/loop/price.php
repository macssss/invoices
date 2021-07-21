<?php
/**
 * Loop Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

$gm_price_unit = get_post_meta( get_the_ID(), 'area_quanity', true ) == 'yes' ? 'm<sup>2</sup>' : __('Pieces', 'warp');

?>

<?php if ( $price_html = $product->get_price_html() ) : ?>
	<div class="gm_woo-product-item__price"><span class="price"><?php echo $price_html; ?></span> / <span class="price-unit"><?php echo $gm_price_unit; ?></span></div>
<?php endif; ?>
