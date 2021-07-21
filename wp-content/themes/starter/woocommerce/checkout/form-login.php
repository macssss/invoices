<?php
/**
 * Checkout login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
	return;
}

?>

<div class="gm_woo-checkout-login">
    
    <div class="gm_woo-checkout-login__toggle woocommerce-form-login-toggle">
    	<?php wc_print_notice( apply_filters( 'woocommerce_checkout_login_message', esc_html__( 'Returning customer?', 'woocommerce' ) ) . ' <a href="#gm-login-form-modal" data-uk-modal>' . esc_html__( 'Click here to login', 'woocommerce' ) . '</a>', 'notice' ); ?>
    </div>
    
    <div id="gm-login-form-modal" class="gm-login-form-modal uk-modal">
        
        <div class="uk-modal-dialog">
           
            <a class="uk-modal-close uk-close uk-close-alt"></a>
           
            <h3 class="gm-login-form-modal__heading"><?php esc_html_e( 'Login', 'woocommerce' ); ?></h3>
        
            <?php
                woocommerce_login_form(
                	array(
                		'message'  => esc_html__( 'If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing section.', 'woocommerce' ),
                		'redirect' => wc_get_checkout_url(),
                	)
                );
            ?>
        
        </div>
        
    </div>
    
</div>

