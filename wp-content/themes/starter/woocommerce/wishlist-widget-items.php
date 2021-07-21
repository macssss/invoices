<?php
/**
 * Wishlist items widget
 *
 * @author  Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 3.0.0
 */

/**
 * Template variables:
 *
 * @var $before_widget          string HTML to print before widget
 * @var $after_widget           string HTML to print after widget
 * @var $instance               array Array of widget options
 * @var $products               array Array of items that were added to lists; each item refers to a product, and contains product object, wishlist items, and quantity count
 * @var $items                  array Array of raw items
 * @var $wishlist_url           string Url to wishlist page
 * @var $multi_wishlist_enabled bool Whether MultiWishlist is enabled or not
 * @var $default_wishlist       YITH_WCWL_Wishlist Default list
 * @var $add_all_to_cart_url    string Url to add all items to cart
 * @var $fragments_options      array Array of options to be used for fragments generation
 * @var $heading_icon           string Heading icon HTML tag
 */

if ( ! defined( 'YITH_WCWL' ) ) {
	exit;
} // Exit if accessed directly
?>

<?php echo apply_filters( 'yith_wcwl_before_wishlist_widget', $before_widget ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>

	<div class="gm_woo-products-control-widget gm_woo-products-control-widget--wishlist yith-wcwl-items-<?php echo esc_html( $instance['unique_id'] ); ?> wishlist-fragment on-first-load" data-fragment-options="<?php echo esc_attr( json_encode( $fragments_options ) ); ?>">
		<div class="gm_woo-products-control-widget__inner" data-uk-dropdown="{pos: 'bottom-right'}">
		
			<a href="<?php echo esc_url( $wishlist_url ); ?>" class="gm_woo-products-control-widget__link uk-button uk-button-secondary-invert uk-button-icon uk-button-icon-small">
				<i class="fas fa-star"></i>
				
				<?php if ( count( $products ) > 0 ): ?>
					<span class="gm_woo-products-control-widget__link-count"><?php echo esc_html( count( $products ) ); ?></span>
				<?php endif; ?>
			</a>
			
			<div class="gm_woo-products-control-widget__dropdown uk-dropdown">
				<?php if ( ! $instance['ajax_loading'] && ! empty( $products ) ) : ?>
					
					<div class="gm_woo-products-control-widget__list-cont" data-simplebar>
						<ul class="gm_woo-products-control-widget__list">
							
							<?php foreach ( $products as $product_id => $info ) : ?>
							
								<?php
									/**
									 * @var $product \WC_Product
									 */
									$product         = $info['product'];
									
									$gm_product_name = esc_html( $product->get_title() );
									$gm_thumbnail_id = get_post_meta( $product_id, '_thumbnail_id', true );
									$gm_thumbnail    = wp_get_attachment_image( $gm_thumbnail_id, 'woocommerce_gallery_thumb', false, array( 'alt' => $gm_product_name ) );
								?>
								
								<li class="gm_woo-products-control-widget__item-cont">
									<div class="gm_woo-products-control-widget__item">
										
										<a href="<?php echo esc_url( add_query_arg( 'remove_from_wishlist', $product_id ) ); ?>" class="gm_woo-products-control-widget__item-remove  uk-close uk-close-small uk-close-alt uk-close-alt-remove remove_from_all_wishlists" data-product-id="<?php echo esc_attr( $product_id ); ?>" data-wishlist-id="<?php echo 'yes' === $instance['show_default_only'] ? esc_attr( $default_wishlist->get_id() ) : '' ?>"></a>
										
										<div class="gm_woo-products-control-widget__item-image">
											<?php echo $gm_thumbnail; ?>
										</div>
										
										<div class="gm_woo-products-control-widget__item-data">
											
											<h3 class="gm_woo-products-control-widget__item-title"><span><?php echo $gm_product_name; ?></span></h3>
											
											<div class="gm_woo-products-control-widget__item-content">
												<?php printf( '%d &times %s', $info['quantity'], $product->get_price_html() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
											</div>
										</div>
										
										<a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="gm_woo-products-control-widget__item-link"></a>
										
									</div>
								</li>
								
							<?php endforeach; ?>
						</ul>
					</div>
					
					<?php if ( 'yes' === $instance['show_view_link'] || 'yes' === $instance['show_add_all_to_cart'] ) : ?>
						<div class="gm_woo-products-control-widget__buttons">
							<ul class="gm_woo-products-control-widget__buttons-list">
						
								<?php if ( 'yes' === $instance['show_view_link'] ) : ?>
									<li>
										<a class="gm_woo-products-control-widget__button gm_woo-products-control-widget__button--show-wishlist uk-button uk-button-small" href="<?php echo esc_url( $wishlist_url ); ?> ">
											<?php esc_html_e( 'View your wishlist', 'yith-woocommerce-wishlist' ); ?>
										</a>
									</li>
								<?php endif; ?>
					
								<?php if ( 'yes' === $instance['show_add_all_to_cart'] ) : ?>
									<li>
										<a class="gm_woo-products-control-widget__button gm_woo-products-control-widget__button--wishlist-add-all-to-cart uk-button uk-button-small uk-button-primary" href="<?php echo esc_url( $add_all_to_cart_url ); ?>">
											<?php esc_html_e( 'Add all to cart', 'yith-woocommerce-wishlist' ); ?>
										</a>
									</li>
								<?php endif; ?>
								
							</ul>
						</div>
					<?php endif; ?>
						
					
				<?php else: ?>
					<div class="gm_woo-products-control-widget__empty-message uk-text-center">
						<?php echo esc_html( apply_filters( 'yith_wcwl_widget_items_empty_list', __( 'Please, add your first item to the wishlist', 'yith-woocommerce-wishlist' ) ) ); ?>
					</div>
				<?php endif; ?>
			
				
			</div>
		
		</div>
		

	</div>

<?php echo apply_filters( 'yith_wcwl_after_wishlist_widget', $after_widget ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>