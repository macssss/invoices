<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/view-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

defined( 'ABSPATH' ) || exit;

$notes = $order->get_customer_order_notes();
?>

<div class="gm_woo-myaccount-view-order">

	<div class="gm_woo-myaccount-view-order__info gm_woo-myaccount-view-order-info gm_woo-myaccount-info">
		<p>
			<?php
				printf(
					/* translators: 1: order number 2: order date 3: order status */
					esc_html__( 'Order %1$s was placed on %2$s and is currently %3$s.', 'woocommerce' ),
					'<span class="gm_woo-myaccount-view-order-info__number">#' . $order->get_order_number() . '</span>', // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span class="gm_woo-myaccount-view-order-info__date">' . wc_format_datetime( $order->get_date_created() ) . '</span>', // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span class="gm_woo-myaccount-view-order-info__status gm_woo-myaccount-view-order-info__status--' . esc_attr( $order->get_status() ) . '">' . wc_get_order_status_name( $order->get_status() ) . '</span>' // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				);
			?>
		</p>
	</div>
	
	<?php if ( $notes ) : ?>
		
		<div class="gm_woo-myaccount-view-order__updates gm_woo-myaccount-view-order-updates">
			
			<h3 class="gm_woo-myaccount-view-order-updates__title"><span><?php esc_html_e( 'Order updates', 'woocommerce' ); ?></span></h3>
			
			<div class="gm_woo-myaccount-view-order-updates__content">
				<ul class="gm_woo-myaccount-view-order-updates__notes">
					<?php foreach ( $notes as $note ) : ?>
						<li>
							
							<div class="gm_woo-myaccount-view-order-updates__note uk-panel uk-panel-box">
								
								<div class="gm_woo-myaccount-view-order-updates__note-meta">
									<?php echo date_i18n( esc_html__( 'l jS \o\f F Y, h:ia', 'woocommerce' ), strtotime( $note->comment_date ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								</div>
								
								<div class="gm_woo-myaccount-view-order-updates__note-content">
									<?php echo wpautop( wptexturize( $note->comment_content ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								</div>
								
							</div>
							
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
			
		</div>
		
	<?php endif; ?>
	
	<?php do_action( 'woocommerce_view_order', $order_id ); ?>
</div>
