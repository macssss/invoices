<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 * @global WC_Checkout $checkout
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="gm_woo-checkout-customer-details__billing woocommerce-billing-fields">
	<?php if ( wc_ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>

		<h3 class="gm_woo-checkout-customer-details__title"><span><?php esc_html_e( 'Billing &amp; Shipping', 'woocommerce' ); ?></span></h3>

	<?php else : ?>

		<h3 class="gm_woo-checkout-customer-details__title"><span><?php esc_html_e( 'Billing details', 'woocommerce' ); ?></span></h3>

	<?php endif; ?>

	<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

	<div class="gm_woo-checkout-customer-details__fields uk-grid uk-grid-medium uk-grid-vertical-small uk-grid-width-small-1-2 woocommerce-billing-fields__field-wrapper" data-uk-grid-margin>
		<?
			$fields = $checkout->get_checkout_fields( 'billing' );	
			
			foreach ( $fields as $key => $field ) {
				
				$gm_value = $checkout->get_value( $key ) ? $checkout->get_value( $key ) : get_user_meta( get_current_user_id(), $key, true );
				woocommerce_form_field( $key, $field, $gm_value );
			}
		?>
	</div>

	<?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>
</div>

<?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
	<div class="gm_woo-checkout-customer-details__account uk-margin-top-small gm_woo-checkout-customer-details-account woocommerce-account-fields">
		<?php if ( ! $checkout->is_registration_required() ) : ?>

			<div class="gm_woo-checkout-customer-details-account__create-account uk-form-toggler form-row form-row-wide">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ); ?> type="checkbox" name="createaccount" value="1" /> <span><?php esc_html_e( 'Create an account?', 'woocommerce' ); ?></span>
				</label>
			</div>

		<?php endif; ?>

		<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

		<?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>

			<div class="gm_woo-checkout-customer-details-account__create-account uk-margin-top-small create-account">
				<?php foreach ( $checkout->get_checkout_fields( 'account' ) as $key => $field ) : ?>
					<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
				<?php endforeach; ?>
			</div>

		<?php endif; ?>

		<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
	</div>
<?php endif; ?>
