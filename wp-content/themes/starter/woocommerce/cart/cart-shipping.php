<?php
/**
 * Shipping Methods Display
 *
 * In 2.1 we show methods per package. This allows for multiple methods per order if so desired.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-shipping.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

$formatted_destination    = isset( $formatted_destination ) ? $formatted_destination : WC()->countries->get_formatted_address( $package['destination'], ', ' );
$has_calculated_shipping  = ! empty( $has_calculated_shipping );
$show_shipping_calculator = ! empty( $show_shipping_calculator );
$calculator_text          = '';

?>

<div class="gm_table-list__row gm_table-list__row--shipping uk-form gm_woo-cart-shipping shipping woocommerce-shipping-totals shipping">
	
	<div class="gm_table-list__cell gm_table-list__cell--label"><?php echo wp_kses_post( $package_name ); ?></div>
	
	<div class="gm_table-list__cell" data-title="<?php echo esc_attr( $package_name ); ?>">
		
		<?php if ( $available_methods ) : ?>
			
			<ul id="shipping_method" class="gm_woo-cart-shipping__methods uk-form-togglers uk-form-togglers-column woocommerce-shipping-methods">
				<?php foreach ( $available_methods as $method ) : ?>
					<li class="uk-form-toggler">
						<?php
							
							echo '<label>';
							
								if ( 1 < count( $available_methods ) ) {
									
									printf( '<input type="radio" name="shipping_method[%1$d]" data-index="%1$d" id="shipping_method_%1$d_%2$s" value="%3$s" class="shipping_method" %4$s />', $index, esc_attr( sanitize_title( $method->id ) ), esc_attr( $method->id ), checked( $method->id, $chosen_method, false ) ); // WPCS: XSS ok.
								}
								
								else {
									
									printf( '<input type="hidden" name="shipping_method[%1$d]" data-index="%1$d" id="shipping_method_%1$d_%2$s" value="%3$s" class="shipping_method" />', $index, esc_attr( sanitize_title( $method->id ) ), esc_attr( $method->id ) ); // WPCS: XSS ok.
								}
								
								printf( '<span>%1$s</span>', wc_cart_totals_shipping_method_label( $method ) ); // WPCS: XSS ok.
							
							echo '</label>';
							
							do_action( 'woocommerce_after_shipping_rate', $method, $index );
						?>
					</li>
				<?php endforeach; ?>
			</ul>
			
		<?php endif; ?>
		
		
		<?php if ( $available_methods && is_cart() || ! $available_methods ): ?>
		<div class="gm_woo-cart-shipping__details uk-panel uk-panel-box">
		<?php endif; ?>
			
			<?php if ( $available_methods && is_cart() ) : ?>
				<div class="gm_woo-cart-shipping__destination woocommerce-shipping-destination">
					<?php
						if ( $formatted_destination ) {
						
							// Translators: $s shipping destination.
							printf( esc_html__( 'Shipping to %s.', 'woocommerce' ) . ' ', '<strong>' . esc_html( $formatted_destination ) . '</strong>' );
							$calculator_text = esc_html__( 'Change address', 'woocommerce' );
						}
						
						else {
						
							echo wp_kses_post( apply_filters( 'woocommerce_shipping_estimate_html', __( 'Shipping options will be updated during checkout.', 'woocommerce' ) ) );
						}
					?>
				</div>
			<?php endif; ?>
			
			
			<?php if ( ! $available_methods ): ?>
				<div class="gm_woo-cart-shipping__messages">
					
					<?php if ( ! $has_calculated_shipping || ! $formatted_destination ) : ?>
						
						<div class="gm_woo-cart-shipping__message">
							<?php
								if ( is_cart() && 'no' === get_option( 'woocommerce_enable_shipping_calc' ) ) {
								
									echo wp_kses_post( apply_filters( 'woocommerce_shipping_not_enabled_on_cart_html', __( 'Shipping costs are calculated during checkout.', 'woocommerce' ) ) );
								}
								
								else {
									echo wp_kses_post( apply_filters( 'woocommerce_shipping_may_be_available_html', __( 'Enter your address to view shipping options.', 'woocommerce' ) ) );
								}
							?>
						</div>
					
					<?php elseif ( ! is_cart() ) : ?>
						
						<div class="gm_woo-cart-shipping__message">
							<?php
								echo wp_kses_post( apply_filters( 'woocommerce_no_shipping_available_html', __( 'There are no shipping options available. Please ensure that your address has been entered correctly, or contact us if you need any help.', 'woocommerce' ) ) );
							?>
						</div>
					
					<?php else : ?>
						
						<div class="gm_woo-cart-shipping__message">
							<?php
								
								// Translators: $s shipping destination.
								echo wp_kses_post( apply_filters( 'woocommerce_cart_no_shipping_available_html', sprintf( esc_html__( 'No shipping options were found for %s.', 'woocommerce' ) . ' ', '<strong>' . esc_html( $formatted_destination ) . '</strong>' ) ) );
								
								$calculator_text = esc_html__( 'Enter a different address', 'woocommerce' );
							?>
						</div>
						
					<?php endif; ?>
				
				</div>
				
			<?php endif; ?>
	
	
			<?php if ( $show_package_details ) : ?>
			
				<?php echo '<div class="gm_woo-cart-shipping__contents woocommerce-shipping-contents"><small>' . esc_html( $package_details ) . '</small></div>'; ?>
			
			<?php endif; ?>
	
	
			<?php if ( $show_shipping_calculator ) : ?>
				<div class="gm_woo-cart-shipping__calculator">
					<?php woocommerce_shipping_calculator( $calculator_text ); ?>
				</div>
			<?php endif; ?>
		
		<?php if ( $available_methods && is_cart() || ! $available_methods ): ?>	
		</div>
		<?php endif; ?>
		
	</div>
</div>
