<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.4
 */

defined( 'ABSPATH' ) || exit;

$show_shipping = ! wc_ship_to_billing_address_only() && $order->needs_shipping_address();
?>
<div class="gm_woo-customer-details">

	<?php if ( $show_shipping ) : ?>

	<div class="gm_woo-customer-details__columns uk-grid uk-grid-width-medium-1-2" data-uk-grid-margin>
		
		<div>

	<?php endif; ?>
	
	<div class="gm_woo-customer-details__address gm_woo-customer-details__address--billing">
		
		<h3 class="gm_woo-customer-details__address-heading"><span><?php esc_html_e( 'Billing address', 'woocommerce' ); ?></span></h3>
	
		<div class="gm_woo-customer-details__address-info">
			<?php echo gm_woo_get_formatted_address( $order->get_address( 'billing' ) ) ; ?>
		</div>
		
	</div>

	<?php if ( $show_shipping ) : ?>

		</div><!-- /.col-1 -->

		<div>
			
			<div class="gm_woo-customer-details__address gm_woo-customer-details__address--shipping-address">
				
				<h3 class="gm_woo-customer-details__address-heading"><span><?php esc_html_e( 'Shipping address', 'woocommerce' ); ?></span></h3>
				
				<div class="gm_woo-customer-details__address-info">
					<?php echo gm_woo_get_formatted_address( $order->get_address( 'shipping' ) ) ; ?>
				</div>
				
			</div>
			
		</div><!-- /.col-2 -->

	</div><!-- /.col2-set -->

	<?php endif; ?>

	<?php do_action( 'woocommerce_order_details_after_customer_details', $order ); ?>

</div>
