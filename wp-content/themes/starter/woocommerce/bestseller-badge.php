<?php
/**
 * Template of Best Seller Badge
 *
 * @author  Yithemes
 * @package YITH WooCommerce Best Sellers
 * @version 1.0.0
 */

$badge_text = get_option('yith-wcbsl-badge-text', _x('Best Seller','Text of "Bestseller" Badge' ,'yith-woocommerce-best-sellers') );

?>

<div class="gm_woo-badge gm_woo-badge--bestseller"><?php echo $badge_text; ?></div>
