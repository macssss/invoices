<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_mini_cart' ); ?>

<?php

	$gm_cart_quantity = 0;
	
	if ( ! WC()->cart->is_empty() ) {
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			
			$gm_cart_quantity += $cart_item['quantity'];
		}
	}
	
?>

<div class="gm_woo-products-control-widget gm_woo-products-control-widget--cart" data-uk-dropdown="{pos: 'bottom-right'}">
	
	<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="gm_woo-products-control-widget__link uk-button uk-button-secondary-invert uk-button-icon uk-button-icon-small">
		<i class="fas fa-shopping-cart"></i>
		
		<?php if ( $gm_cart_quantity > 0 ): ?>
			<span class="gm_woo-products-control-widget__link-count"><?php echo $gm_cart_quantity; ?></span>
		<?php endif; ?>
	</a>
	
	<div class="gm_woo-products-control-widget__dropdown uk-dropdown">
		<?php if ( ! WC()->cart->is_empty() ) : ?>
			
			<div class="gm_woo-products-control-widget__list-cont" data-simplebar>
				<ul class="woocommerce-mini-cart cart_list product_list_widget gm_woo-products-control-widget__list <?php echo esc_attr( $args['list_class'] ); ?>">
					
					<?php do_action( 'woocommerce_before_mini_cart_contents' ); ?>
			
					<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ): ?>
						
						<?php
							$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
						?>
			
						<?php if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ): ?>
						
							<?php
								$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
								$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
								$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
								
								$gm_thumbnail      = wp_get_attachment_image( $cart_item['data']->image_id, 'woocommerce_gallery_thumb', false, array( 'alt' => $product_name ) );
							?>
							
							<li class="gm_woo-products-control-widget__item-cont woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
								<div class="gm_woo-products-control-widget__item">
									
									<?php
									echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
										'woocommerce_cart_item_remove_link',
										sprintf(
											'<a href="%s" class="gm_woo-products-control-widget__item-remove uk-close uk-close-small uk-close-alt uk-close-alt-remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"></a>',
											esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
											esc_attr__( 'Remove this item', 'woocommerce' ),
											esc_attr( $product_id ),
											esc_attr( $cart_item_key ),
											esc_attr( $_product->get_sku() )
										),
										$cart_item_key
									);
									?>
									
									<div class="gm_woo-products-control-widget__item-image">
										<?php echo $gm_thumbnail; ?>
									</div>
									
									<div class="gm_woo-products-control-widget__item-data">
										
										<h3 class="gm_woo-products-control-widget__item-title"><span><?php echo $product_name; ?></span></h3>
										
										<div class="gm_woo-products-control-widget__item-content">
											<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
											
											<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
										</div>
									</div>
									
									<?php if ( !empty( $product_permalink ) ) : ?>
										<a href="<?php echo esc_url( $product_permalink ); ?>" class="gm_woo-products-control-widget__item-link"></a>
									<?php endif; ?>
									
								</div>
							</li>
							
						<?php endif; ?>
					<?php endforeach; ?>
			
					<?php do_action( 'woocommerce_mini_cart_contents' ); ?>
				</ul>
			</div>
		
			<div class="gm_woo-products-control-widget__total">
				<?php
				/**
				 * Hook: woocommerce_widget_shopping_cart_total.
				 *
				 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
				 */
				do_action( 'woocommerce_widget_shopping_cart_total' );
				?>
			</div>
		
			<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
		
			<div class="gm_woo-products-control-widget__buttons">
				<ul class="gm_woo-products-control-widget__buttons-list">
					<li>
						<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="gm_woo-products-control-widget__button gm_woo-products-control-widget__button--view-cart uk-button uk-button-small">
							<?php esc_html_e( 'View cart', 'woocommerce' ); ?>
						</a>
					</li>
					
					<li>
						<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="gm_woo-products-control-widget__button gm_woo-products-control-widget__button--checkout uk-button uk-button-small uk-button-primary">
							<?php esc_html_e( 'Checkout', 'woocommerce' ); ?>
						</a>
					</li>
				</ul>
				
				<?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?>
			</div>
		
			<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>
		
		<?php else : ?>
		
			<div class="gm_woo-products-control-widget__empty-message uk-text-center"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></div>
		
		<?php endif; ?>
	</div>
	
	<script>
		jQuery( function($) { 
			
			$('.widget_shopping_cart_content').addClass('loaded');
		});
	</script>
</div>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
