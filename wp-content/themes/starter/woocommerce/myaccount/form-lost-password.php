<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.2
 */

defined( 'ABSPATH' ) || exit;

$gm_form_size = '';

do_action( 'woocommerce_before_lost_password_form' );
?>

<div class="gm_woo-myaccount-reset-password gm_woo-myaccount-reset-password--lost uk-panel uk-panel-box uk-panel-box-white">
    
    <h3 class="gm_woo-myaccount-reset-password__heading"><?php esc_html_e( 'Lost password', 'woocommerce' ); ?></h3>
    
    <div class="gm_woo-myaccount-reset-password__info">
        <p><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>
    </div>
    
    <form method="post" class="gm_woo-myaccount-reset-password__form uk-form uk-form-stacked">
            
    	<div class="uk-form-row">
    		
            <label class="uk-form-label" for="user_login"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?> <span class="uk-form-required">*</span></label>
            
            <div class="uk-form-controls">
                
    		    <input class="uk-form-field uk-width-1-1<?php echo $gm_form_size; ?>" type="text" name="user_login" id="user_login" autocomplete="username" />
                
            </div>
            
    	</div>
    
    
    	<?php do_action( 'woocommerce_lostpassword_form' ); ?>
    
    
    	<div class="gm_woo-myaccount-reset-password__save-button-wrap uk-form-row">
            
    		<input type="hidden" name="wc_reset_password" value="true" />
    		
            <button type="submit" class="gm_woo-myaccount-reset-password__save-button uk-button uk-button-primary" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>">
                <span><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></span>
            </button>
            
    	</div>
    
    	<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>
    
    </form>
</div>

<?php

do_action( 'woocommerce_after_lost_password_form' );
