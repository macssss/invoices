<?php
/**
 * Checkout coupon form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.4
 */

defined( 'ABSPATH' ) || exit;

if ( ! wc_coupons_enabled() ) { // @codingStandardsIgnoreLine.
	return;
}

?>

<div class="gm_woo-checkout-coupon uk-panel uk-panel-box">
    
    <h3 class="gm_woo-checkout-coupon__toggle woocommerce-form-coupon-toggle">
        
        <a href="#" class="showcoupon"><i class="fas fa-gift"></i> <?php esc_html_e( 'Have a coupon?', 'woocommerce' ); ?> <?php esc_html_e( 'Click here to enter your code', 'woocommerce' ); ?></a>
        
    </h3>
    
    
    <form class="gm_woo-checkout-coupon__form checkout_coupon woocommerce-form-coupon" method="post" style="display:none">
    
        <div class="gm_woo-checkout-coupon__description">
            
    	    <p><?php esc_html_e( 'If you have a coupon code, please apply it below.', 'woocommerce' ); ?></p>
            
        </div>
        
        
        <div class="gm_woo-checkout-coupon__fields uk-form">
            <div class="gm_woo-checkout-coupon__fields-inner">
                
                <input type="text" name="coupon_code" class="gm_woo-checkout-coupon__field uk-form-small" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" id="coupon_code" value="" />
        
                <button type="submit" class="gm_woo-checkout-coupon__button uk-button uk-button-small uk-button-secondary" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>">
                    <span><?php esc_html_e( 'Apply coupon', 'woocommerce' ); ?></span>
                </button>
                
            </div>
        </div>
        
    </form>
    
</div>
