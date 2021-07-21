<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;
?>


<div class="gm_woo-review-order__details gm_woo-order-details gm_woo-order-details--centered woocommerce-checkout-review-order-table">
	<div class="gm_table-list gm_table-list--condensed">
		<div class="gm_table-list__items">
			
			<div class="gm_table-list__head">
				
				<div class="gm_table-list__row">
					<div class="gm_table-list__cell gm_table-list__cell--product"><?php esc_html_e( 'Product', 'woocommerce' ); ?></div>
					<div class="gm_table-list__cell gm_table-list__cell--total"><?php esc_html_e( 'Total', 'woocommerce' ); ?></div>
				</div>
				
			</div>
		
			<div class="gm_table-list__body">
				
				<?php do_action( 'woocommerce_review_order_before_cart_contents' ); ?>
		
				<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ): ?>
					
					<?php $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key ); ?>
		
					<?php if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ): ?>
						
						<div class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'gm_table-list__row', $cart_item, $cart_item_key ) ); ?>">
						
							<div class="gm_table-list__cell gm_table-list__cell--product product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
								
								<?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times;&nbsp;%s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								
							</div>
						
							<div class="gm_table-list__cell gm_table-list__cell--total product-total" data-title="<?php esc_html_e( 'Total', 'woocommerce' ); ?>">
								<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</div>
							
						</div>
						
					<?php endif; ?>
					
				<?php endforeach; ?>
		
				<?php do_action( 'woocommerce_review_order_after_cart_contents' ); ?>
			</div>
			
			
			
			<div class="gm_table-list__footer">
				
				<div class="gm_table-list__row gm_table-list__row--cart-subtotal cart-subtotal">
					
					<div class="gm_table-list__cell gm_table-list__cell--label"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></div>
					<div class="gm_table-list__cell"><?php wc_cart_totals_subtotal_html(); ?></div>
					
				</div>
				
				
				
				<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
				
					<div class="gm_table-list__row gm_table-list__row--cart-discount gm_table-list__row--coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?> cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
					
						<div class="gm_table-list__cell gm_table-list__cell--label"><?php wc_cart_totals_coupon_label( $coupon ); ?></div>
						<div class="gm_table-list__cell"><?php wc_cart_totals_coupon_html( $coupon ); ?></div>
						
					</div>
					
				<?php endforeach; ?>
		
		
		
				<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
		
					<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>
		
					<?php wc_cart_totals_shipping_html(); ?>
		
					<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>
		
				<?php endif; ?>
		
		
		
				<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
				
					<div class="gm_table-list__row gm_table-list__row--fee fee">
						
						<div class="gm_table-list__cell gm_table-list__cell--label"><?php echo esc_html( $fee->name ); ?></div>
						<div class="gm_table-list__cell"><?php wc_cart_totals_fee_html( $fee ); ?></div>
						
					</div>
					
				<?php endforeach; ?>
				
				
				
				<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
				
					<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
					
						<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited ?>
						
							<div class="gm_table-list__row gm_table-list__row--tax-rate gm_table-list__row--tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?> tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
							
								<div class="gm_table-list__cell gm_table-list__cell--label"><?php echo esc_html( $tax->label ); ?></div>
								<div class="gm_table-list__cell"><?php echo wp_kses_post( $tax->formatted_amount ); ?></div>
								
							</div>
							
						<?php endforeach; ?>
						
					<?php else : ?>
					
						<div class="gm_table-list__row gm_table-list__row--tax-total tax-total">
							
							<div class="gm_table-list__cell gm_table-list__cell--label"><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></div>
							<div class="gm_table-list__cell"><?php wc_cart_totals_taxes_total_html(); ?></div>
							
						</div>
					
					<?php endif; ?>
					
				<?php endif; ?>
		
		
		
				<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>
		
		
				
				<div class="gm_table-list__row gm_table-list__row--order-total order-total">
					
					<div class="gm_table-list__cell gm_table-list__cell--label"><?php esc_html_e( 'Total', 'woocommerce' ); ?></div>
					<div class="gm_table-list__cell"><?php wc_cart_totals_order_total_html(); ?></div>
					
				</div>
		
				<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
			</div>
			
		</div>
	</div>
</div>
