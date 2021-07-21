<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<form class="gm_woo-cart-form woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	
	<?php do_action( 'woocommerce_before_cart_table' ); ?>
	
	<div class="gm_table-list gm_table-list--middle woocommerce-cart-form__contents">
		<div class="gm_table-list__items">
			
			<div class="gm_table-list__head">
				<div class="gm_table-list__row">
					
					<div class="gm_table-list__cell gm_table-list__cell--product-thumbnail product-thumbnail"><?php esc_html_e( 'Product', 'woocommerce' ); ?></div>
					<div class="gm_table-list__cell gm_table-list__cell--product-name product-name"></div>
					
					<div class="gm_table-list__cell-group gm_table-list__cell-group--data">
						
						<div class="gm_table-list__cell gm_table-list__cell--product-price product-price"><?php esc_html_e( 'Price', 'woocommerce' ); ?></div>
						<div class="gm_table-list__cell gm_table-list__cell--product-quantity product-quantity"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></div>
						<div class="gm_table-list__cell gm_table-list__cell--product-subtotal product-subtotal"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></div>
						
					</div>
					
				</div>
			</div>
			
			<div class="gm_table-list__body">
				
				<?php do_action( 'woocommerce_before_cart_contents' ); ?>
				
				<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ): ?>
					
					<?php 
						$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
					?>
					
					<?php if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ): ?>
						
						<?php
							$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
						?>
						
						<div class="gm_table-list__row gm_woo-cart-form-product woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
	
							<div class="gm_table-list__cell gm_table-list__cell--product-thumbnail product-thumbnail">
								<div class="gm_woo-cart-form-product__media gm_media">
								<?php
									
									echo apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
			
									if ( $product_permalink ) {
										
										printf( '<a href="%s" class="gm_media-link"></a>', esc_url( $product_permalink ) ); // PHPCS: XSS ok.
									}
								?>
								</div>
							</div>
							
							<div class="gm_table-list__cell gm_table-list__cell--product-name product-name">
								<div class="gm_woo-cart-form-product__name">
									<?php
										
										echo '<h3 class="gm_title">';
										
											if ( ! $product_permalink ) {
												echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
											}
											
											else {
												echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
											}
										echo '</h3>';
				
										do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );
				
										// Meta data.
										echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.
				
										// Backorder notification.
										if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
										}
									?>
								</div>
							</div>
							
							<div class="gm_table-list__cell-group gm_table-list__cell-group--data">
								
								<div class="gm_table-list__cell gm_table-list__cell--product-price product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
									<div class="gm_woo-cart-form-product__price">
										<?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok. ?>
									</div>
								</div>
								
								<div class="gm_table-list__cell gm_table-list__cell--product-quantity product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
									<div class="gm_woo-cart-form-product__quanity">
										<?php
											if ( $_product->is_sold_individually() ) {
												$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
											}
											
											else {
												$product_quantity = woocommerce_quantity_input(
													array(
														'input_name'   => "cart[{$cart_item_key}][qty]",
														'input_value'  => $cart_item['quantity'],
														'max_value'    => $_product->get_max_purchase_quantity(),
														'min_value'    => '0',
														'product_name' => $_product->get_name(),
													),
													$_product,
													false
												);
											}
					
											echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
										?>
									</div>
								</div>
								
								<div class="gm_table-list__cell gm_table-list__cell--product-subtotal product-subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
									<div class="gm_woo-cart-form-product__subtotal">
										<?php
											echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
										?>
									</div>
								</div>
								
								
							</div>
							
							<div class="gm_woo-cart-form__product-remove product-remove">
								<?php
									echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
										'woocommerce_cart_item_remove_link',
										sprintf(
											'<a href="%s" class="gm_woo-cart-form__product-remove-link uk-close uk-close-alt remove" title="%s" data-uk-tooltip="{pos:\'top-right\'}" data-product_id="%s" data-product_sku="%s"></a>',
											esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
											esc_html__( 'Remove this item', 'woocommerce' ),
											esc_attr( $product_id ),
											esc_attr( $_product->get_sku() )
										),
										$cart_item_key
									);
								?>
							</div>
							
						</div>
						
					<?php endif; ?>
				<?php endforeach; ?>
				
				<?php do_action( 'woocommerce_cart_contents' ); ?>
				
				
			</div>
			
		</div>
		
		<div class="gm_table-list__actions">
			
			<div class="gm_woo-cart-form__actions<?php echo wc_coupons_enabled() ? ' gm_woo-cart-form__actions--with-coupons' : ''; ?>">
				
				<?php if ( wc_coupons_enabled() ): ?>
					<div class="gm_woo-cart-form__coupon uk-form coupon">
						
						<label class="uk-form-label" for="coupon_code"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label>
						
						<input type="text" name="coupon_code" class="gm_woo-cart-form__coupon-input uk-form-small input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" />
						
						<button type="submit" class="gm_woo-cart-form__coupon-button uk-button uk-button-small uk-button-secondary button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>">
							<i class="fas fa-gift"></i>
							<span><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></span>
						</button>
						
						<?php do_action( 'woocommerce_cart_coupon' ); ?>
					</div>
				<?php endif; ?>
				
				
				<div class="gm_woo-cart-form__update-cart">
					
					<button type="submit" class="gm_woo-cart-form__update-cart-button uk-button uk-button-small uk-button-secondary-invert" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>">
						<i class="fas fa-sync"></i>
						<span><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></span>
					</button>
					
					<?php do_action( 'woocommerce_cart_actions' ); ?>
		
					<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
				</div>
			
			</div>
		</div>
		
		<?php do_action( 'woocommerce_after_cart_contents' ); ?>
	</div>
	
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>

<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

<div class="gm_woo-cart-collaterals">
	<?php
		/**
		 * Cart collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
		do_action( 'woocommerce_cart_collaterals' );
	?>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
