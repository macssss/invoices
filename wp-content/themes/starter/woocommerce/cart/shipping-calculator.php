<?php
/**
 * Shipping Calculator
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/shipping-calculator.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;

//style="display:none;"

$gm_form_size = ' uk-form-small';

do_action( 'woocommerce_before_shipping_calculator' ); ?>

<form class="gm_woo-shipping-calculator woocommerce-shipping-calculator" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	
	<div class="gm_woo-shipping-calculator__button-cont">
		
		<a href="#" class="gm_woo-shipping-calculator__button shipping-calculator-button">
			<i class="fas fa-map-marker-alt"></i>
			<span><?php esc_html_e( ! empty( $button_text ) ? $button_text : __( 'Calculate shipping', 'woocommerce' ) ); ?></span>
		</a>
	</div>
	
	<section class="gm_woo-shipping-calculator__form shipping-calculator-form">
		<div class="gm_woo-shipping-calculator__form-fields uk-grid uk-grid-small" data-uk-grid-margin>
			
			<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_country', true ) ) : ?>
				
				<div class="uk-width-4-10 form-row form-row-wide" id="calc_shipping_country_field">
					<select name="calc_shipping_country" id="calc_shipping_country" class="gm_no-niceselect gm_select2 uk-form-field uk-width-1-1<?php echo $gm_form_size; ?> country_to_state country_select" rel="calc_shipping_state">
						
						<option value=""><?php esc_html_e( 'Select a country / region&hellip;', 'woocommerce' ); ?></option>
						
						<?php
							foreach ( WC()->countries->get_shipping_countries() as $key => $value ) {
								echo '<option value="' . esc_attr( $key ) . '"' . selected( WC()->customer->get_shipping_country(), esc_attr( $key ), false ) . '>' . esc_html( $value ) . '</option>';
							}
						?>
					</select>
				</div>
				
			<?php endif; ?>
	
	
			<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_state', true ) ) : ?>
				
				<div class="uk-width-4-10 form-row form-row-wide" id="calc_shipping_state_field">
					
					<?php
						$current_cc = WC()->customer->get_shipping_country();
						$current_r  = WC()->customer->get_shipping_state();
						$states     = WC()->countries->get_states( $current_cc );
					?>
					
					<?php if ( is_array( $states ) && empty( $states ) ): ?>
					
						<input type="hidden" name="calc_shipping_state" id="calc_shipping_state" data-input-classes="uk-form-field uk-width-1-1<?php echo $gm_form_size; ?> input-text" placeholder="<?php esc_attr_e( 'State / County', 'woocommerce' ); ?>" data-placeholder="<?php esc_attr_e( 'State / County', 'woocommerce' ); ?>" />
					
					<?php elseif ( is_array( $states ) ): ?>
						
						<span>
							<select name="calc_shipping_state" class="gm_no-niceselect gm_select2 uk-form-field uk-width-1-1<?php echo $gm_form_size; ?> state_select" id="calc_shipping_state" data-placeholder="<?php esc_attr_e( 'State / County', 'woocommerce' ); ?>">
								<option value=""><?php esc_html_e( 'Select an option&hellip;', 'woocommerce' ); ?></option>
								<?php
								foreach ( $states as $ckey => $cvalue ) {
									echo '<option value="' . esc_attr( $ckey ) . '" ' . selected( $current_r, $ckey, false ) . '>' . esc_html( $cvalue ) . '</option>';
								}
								?>
							</select>
						</span>
					
					<?php else: ?>
					
						<input type="text" data-input-classes="uk-form-field uk-width-1-1<?php echo $gm_form_size; ?> input-text" class="uk-form-field uk-width-1-1<?php echo $gm_form_size; ?> input-text" value="<?php echo esc_attr( $current_r ); ?>" placeholder="<?php esc_attr_e( 'State / County', 'woocommerce' ); ?>" data-placeholder="<?php esc_attr_e( 'State / County', 'woocommerce' ); ?>" name="calc_shipping_state" id="calc_shipping_state" />
					
					<?php endif; ?>
					
				</div>
				
			<?php endif; ?>
	
	
			<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_city', true ) ) : ?>
				
				<div class="uk-width-small-3-10 form-row form-row-wide" id="calc_shipping_city_field">
				
					<input type="text" class="uk-form-field uk-width-1-1<?php echo $gm_form_size; ?> input-text" value="<?php echo esc_attr( WC()->customer->get_shipping_city() ); ?>" placeholder="<?php esc_attr_e( 'City', 'woocommerce' ); ?>" name="calc_shipping_city" id="calc_shipping_city" />
				
				</div>
			
			<?php endif; ?>
	
	
			<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_postcode', true ) ) : ?>
	
				<div class="uk-width-small-3-10 form-row form-row-wide" id="calc_shipping_postcode_field">
	
					<input type="text" class="uk-form-field uk-width-1-1<?php echo $gm_form_size; ?> input-text" value="<?php echo esc_attr( WC()->customer->get_shipping_postcode() ); ?>" placeholder="<?php esc_attr_e( 'Postcode / ZIP', 'woocommerce' ); ?>" name="calc_shipping_postcode" id="calc_shipping_postcode" />

				</div>

			<?php endif; ?>
		
			
			<div class="uk-width-1-1">
				<button type="submit" name="calc_shipping" value="1" class="uk-button uk-button-small uk-button-secondary button">
					<span><?php esc_html_e( 'Update', 'woocommerce' ); ?></span>
				</button>
			</div>
		
		</div>
		
		<?php wp_nonce_field( 'woocommerce-shipping-calculator', 'woocommerce-shipping-calculator-nonce' ); ?>
		
	</section>
</form>

<?php do_action( 'woocommerce_after_shipping_calculator' ); ?>
