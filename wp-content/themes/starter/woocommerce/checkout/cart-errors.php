<?php
/**
 * Cart errors page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/cart-errors.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="gm_woo-checkout-cart-errors">
    
    <div class="gm_woo-checkout-cart-errors__info uk-alert uk-alert-danger">
        <?php esc_html_e( 'There are some issues with the items in your cart. Please go back to the cart page and resolve these issues before checking out.', 'woocommerce' ); ?>
    </div>
    
    <?php do_action( 'woocommerce_cart_has_errors' ); ?>
    
    <div class="gm_woo-checkout-cart-errors__content">
        <a class="gm_woo-checkout-cart-errors__button uk-button uk-button-primary wc-backward" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
            <i class="fas fa-arrow-left"></i>
            <span><?php esc_html_e( 'Return to cart', 'woocommerce' ); ?></span>
        </a>
    </div>
    
</div>
