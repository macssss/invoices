<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="gm_woo-checkout-thankyou woocommerce-order">

	<?php
	if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<div class="gm_woo-message uk-alert uk-alert-danger woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></div>

			<div class="gm_woo-message uk-alert uk-alert-danger woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
				
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</div>

		<?php else : ?>

			<div class="gm_woo-message uk-alert uk-alert-success woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
			
			
			<div class="gm_woo-checkout-thankyou__order-overview gm_woo-checkout-thankyou-order-overview">
				
				<h3 class="gm_woo-checkout-thankyou-order-overview__heading"><?php esc_html_e( 'Order', 'woocommerce' ); ?></h3>
				
				<div class="gm_table-list gm_table-list--condensed woocommerce-order-overview woocommerce-thankyou-order-details order_details">
					<div class="gm_table-list__items">
						<div class="gm_table-list__body">
	
							<div class="gm_table-list__row woocommerce-order-overview__order order">
								<div class="gm_table-list__cell gm_table-list__cell--label"><?php esc_html_e( 'Order number:', 'woocommerce' ); ?></div>
								<div class="gm_table-list__cell"><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
							</div>
			
							<div class="gm_table-list__row woocommerce-order-overview__date date">
								<div class="gm_table-list__cell gm_table-list__cell--label"><?php esc_html_e( 'Date:', 'woocommerce' ); ?></div>
								<div class="gm_table-list__cell">
									<?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								</div>
							</div>
			
							<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
								<div class="gm_table-list__row woocommerce-order-overview__email email">
									<div class="gm_table-list__cell gm_table-list__cell--label"><?php esc_html_e( 'Email:', 'woocommerce' ); ?></div>
									<div class="gm_table-list__cell"><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
								</div>
							<?php endif; ?>
			
							<div class="gm_table-list__row woocommerce-order-overview__total total">
								<div class="gm_table-list__cell gm_table-list__cell--label"><?php esc_html_e( 'Total:', 'woocommerce' ); ?></div>
								<div class="gm_table-list__cell"><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
							</div>
			
							<?php if ( $order->get_payment_method_title() ) : ?>
								<div class="gm_table-list__row woocommerce-order-overview__payment-method method">
									<div class="gm_table-list__cell gm_table-list__cell--label"><?php esc_html_e( 'Payment method:', 'woocommerce' ); ?></div>
									<div class="gm_table-list__cell"><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></div>
								</div>
							<?php endif; ?>
							
						</div>
					</div>
				</div>
			</div>

		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<div class="gm_woo-message uk-alert uk-alert-success woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>

	<?php endif; ?>

</div>
