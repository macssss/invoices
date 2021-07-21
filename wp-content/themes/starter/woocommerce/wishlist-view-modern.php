<?php
/**
 * Wishlist page template - Modern layout
 *
 * @author  Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 3.0.0
 */

/**
 * Template variables:
 *
 * @var $wishlist                      \YITH_WCWL_Wishlist Current wishlist
 * @var $wishlist_items                array Array of items to show for current page
 * @var $is_default                    bool Whether current wishlist is default
 * @var $wishlist_token                string Current wishlist token
 * @var $wishlist_id                   int Current wishlist id
 * @var $users_wishlists               array Array of current user wishlists
 * @var $page_title                    string Page title
 * @var $current_page                  int Current page
 * @var $page_links                    array Array of page links
 * @var $is_user_owner                 bool Whether current user is wishlist owner
 * @var $show_price                    bool Whether to show price column
 * @var $show_dateadded                bool Whether to show item date of addition
 * @var $show_stock_status             bool Whether to show product stock status
 * @var $show_add_to_cart              bool Whether to show Add to Cart button
 * @var $show_remove_product           bool Whether to show Remove button
 * @var $show_price_variations         bool Whether to show price variation over time
 * @var $show_variation                bool Whether to show variation attributes when possible
 * @var $show_cb                       bool Whether to show checkbox column
 * @var $show_quantity                 bool Whether to show input quantity or not
 * @var $show_ask_estimate_button      bool Whether to show Ask an Estimate form
 * @var $show_last_column              bool Whether to show last column (calculated basing on previous flags)
 * @var $move_to_another_wishlist      bool Whether to show Move to another wishlist select
 * @var $move_to_another_wishlist_type string Whether to show a select or a popup for wishlist change
 * @var $additional_info               bool Whether to show Additional info textarea in Ask an estimate form
 * @var $price_excl_tax                bool Whether to show price excluding taxes
 * @var $enable_drag_n_drop            bool Whether to enable drag n drop feature
 * @var $repeat_remove_button          bool Whether to repeat remove button in last column
 * @var $available_multi_wishlist      bool Whether multi wishlist is enabled and available
 * @var $form_action                   string Action for the wishlist form
 * @var $no_interactions               bool
 */

if ( ! defined( 'YITH_WCWL' ) ) {
	exit;
} // Exit if accessed directly
?>

<!-- WISHLIST GRID -->

<?php if ( $wishlist && $wishlist->has_items() ): ?>

	<div class="gm_woo-wishlist-form__table-list gm_table-list gm_table-list--middle">
		
		<div class="gm_table-list__items">
			
			<div class="gm_table-list__head">
				<div class="gm_table-list__row">
					
					<?php if ( $show_cb ) : ?>
					
						<div class="gm_table-list__cell gm_table-list__cell--check">
							
							<div class="gm_table-list__check-all uk-form-toggler uk-form-toggler-clear">
								<label>
									<input type="checkbox" name="gm_items-check-all" data-check-all />
									<span></span>
								</label>
							</div>
							
						</div>
					
					<?php endif; ?>
					
					
					<div class="gm_table-list__cell gm_table-list__cell--product-thumbnail"><?php esc_html_e( 'Product', 'woocommerce' ); ?></div>
					<div class="gm_table-list__cell gm_table-list__cell--product-name"></div>
					
					
					<div class="gm_table-list__cell-group gm_table-list__cell-group--data">
						
						<div class="gm_table-list__cell gm_table-list__cell--product-price"><?php esc_html_e( 'Price', 'woocommerce' ); ?></div>
						<div class="gm_table-list__cell gm_table-list__cell--product-quantity"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></div>
						<div class="gm_table-list__cell gm_table-list__cell--product-stock"><?php esc_html_e( 'Stock', 'woocommerce' ); ?></div>
						<div class="gm_table-list__cell gm_table-list__cell--product-controls"></div>
						
					</div>
					
				</div>
			</div>
			
			<div class="gm_table-list__body wishlist_table wishlist_view shop_table cart modern_grid responsive <?php echo $no_interactions ? 'no-interactions' : '' ?> <?php echo $enable_drag_n_drop ? 'sortable' : '' ?>" data-pagination="<?php echo esc_attr( $pagination ); ?>" data-per-page="<?php echo esc_attr( $per_page ); ?>" data-page="<?php echo esc_attr( $current_page ); ?>" data-id="<?php echo esc_attr( $wishlist_id ); ?>" data-token="<?php echo esc_attr( $wishlist_token ); ?>">
				
				<?php foreach ( $wishlist_items as $item ): ?>
					
					<?php
					
						global $product;
			
						$product      = $item->get_product();
						$availability = $product->get_availability();
						$stock_status = isset( $availability['class'] ) ? $availability['class'] : false;
					?>
					
					<?php if ( $product && $product->exists() ): ?>
				
						<div class="gm_table-list__row gm_woo-wishlist-form-product" id="yith-wcwl-row-<?php echo esc_attr( $item->get_product_id() ); ?>" data-row-id="<?php echo esc_attr( $item->get_product_id() ); ?>">
							
							
							<?php if ( $show_cb ) : ?>
							
								<div class="gm_table-list__cell gm_table-list__cell--product-check">
									
									<div class="gm_table-list__check uk-form-toggler uk-form-toggler-clear">
										<label>
											<input type="checkbox" value="yes" name="items[<?php echo esc_attr( $item->get_product_id() ); ?>][cb]"  data-check />
											<span></span>
										</label>
									</div>
									
								</div>
								
							<?php endif; ?>
							
							
							<div class="gm_table-list__cell gm_table-list__cell--product-thumbnail">
								
								<div class="gm_woo-wishlist-form-product__media gm_media">
								
									<?php woocommerce_template_loop_product_thumbnail(); ?>
									<a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $item->get_product_id() ) ) ); ?>"></a>
								
								</div>
								
							</div>
							
							
							<div class="gm_table-list__cell gm_table-list__cell--product-name">
								
								<div class="gm_woo-wishlist-form-product__name">
									
									<h3 class="gm_title product-name">
										<a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $item->get_product_id() ) ) ); ?>">
											<?php echo esc_attr( apply_filters( 'woocommerce_in_cartproduct_obj_title', $product->get_title(), $product ) ); ?>
										</a>
									</h3>
	
									<?php do_action( 'yith_wcwl_table_after_product_name', $item ); ?>
									
									<div class="gm_content">
										<?php esc_html_e( 'Added on:', 'yith-woocommerce-wishlist' ); ?> <?php echo esc_html( $item->get_date_added_formatted() ); ?>
									</div>
									
								</div>
								
							</div>
							
							
							<div class="gm_table-list__cell-group gm_table-list__cell-group--data">
								
								
								<div class="gm_table-list__cell gm_table-list__cell--product-price" data-title="<?php esc_html_e( 'Price', 'woocommerce' ); ?>">
									
									<ul class="gm_woo-wishlist-form-product__prices gm_woo-wishlist-form-product-prices">
										
										<?php if ( $show_variation && $product->is_type( 'variation' ) ): ?>
											
											<?php $attributes = $product->get_attributes(); ?>
		
											<?php if ( ! empty( $attributes ) ): ?>
												
												<?php foreach ( $attributes as $name => $value ): ?>
													
													<?php
													
														if ( ! taxonomy_exists( $name ) ) {
															
															continue;
														}
			
														$term = get_term_by( 'slug', $value, $name );
			
														if ( ! is_wp_error( $term ) && ! empty( $term->name ) ) {
															
															$value = $term->name;
														}
													?>
													
													<li>
														
														<div class="gm_woo-wishlist-form-product-prices__label">
															
															<?php echo esc_html( wc_attribute_label( $name, $product ) ); ?>:
															
														</div>
														
														
														<div class="gm_woo-wishlist-form-product-prices__value">
															
															<?php echo esc_html( rawurldecode( $value ) ); ?>
															
														</div>
														
													</li>
													
												<?php endforeach; ?>
												
											<?php endif; ?>
											
										<?php endif; ?>
										
										
										
										<?php if ( $show_price || $show_price_variations ): ?>
											
											<li class="gm_woo-wishlist-form-product-prices__product-price">
												
												<div class="gm_woo-wishlist-form-product-prices__label">
													<?php esc_html_e( 'Unit Price:', 'yith-woocommerce-wishlist' ); ?>
												</div>
												
												<div class="gm_woo-wishlist-form-product-prices__value">
													<?php
														if ( $show_price ) {
															
															echo $item->get_formatted_product_price(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
														}
			
														if ( $show_price_variations ) {
															
															echo $item->get_price_variation(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
														}
													?>
												</div>
												
											</li>
											
										<?php endif; ?>
									</ul>
									
								</div>
								
								
								<div class="gm_table-list__cell gm_table-list__cell--product-quantity" data-title="<?php esc_html_e( 'Quantity', 'woocommerce' ); ?>">
									
									<div class="gm_woo-wishlist-form-product__quanity">
										<div class="gm_woo-quantity">
											
											<?php if ( ! $no_interactions && $wishlist->current_user_can( 'update_quantity' ) ): ?>
												
												<input type="number" min="1" step="1" name="items[<?php echo esc_attr( $item->get_product_id() ); ?>][quantity]" value="<?php echo esc_attr( $item->get_quantity() ); ?>" class="gm_woo-quantity__input gm_js_woo-quantity-input uk-form-small" />
												
											<?php else: ?>
											
												<?php echo esc_html( $item->get_quantity() ); ?>
											
											<?php endif; ?>
										</div>
									</div>
									
								</div>
								
								
								<div class="gm_table-list__cell gm_table-list__cell--product-stock" data-title="<?php esc_html_e( 'Stock', 'woocommerce' ); ?>">
									
									<div class="gm_woo-wishlist-form-product__statis">
									<?php echo $stock_status === 'out-of-stock' ? '<span class="gm_woo-product-stock gm_woo-product-stock--out-of-stock wishlist-out-of-stock">' . esc_html__( 'Out of stock', 'yith-woocommerce-wishlist' ) . '</span>' : '<span class="gm_woo-product-stock gm_woo-product-stock--instock wishlist-in-stock">' . esc_html__( 'In Stock', 'yith-woocommerce-wishlist' ) . '</span>'; ?>
									</div>
									
								</div>
								
							
								<div class="gm_table-list__cell gm_table-list__cell--product-controls">
									
									<?php if ( $show_add_to_cart && isset( $stock_status ) && $stock_status != 'out-of-stock' ): ?>
										
										<div class="gm_woo-wishlist-form-product__add-to-cart product-add-to-cart">
											<?php woocommerce_template_loop_add_to_cart( array( 'quantity' => $show_quantity ? $item->get_quantity() : 1, 'class' => 'gm_woo-wishlist-form__add-to-cart-button uk-button uk-button-small uk-button-secondary' ) ); ?>
										</div>
										
									<?php endif ?>
									
								</div>
							
							</div>
							
							<div class="gm_woo-wishlist-form__product-remove product-remove">
								
								<a href="<?php echo esc_url( add_query_arg( 'remove_from_wishlist', $item->get_product_id() ) ) ?>" class="gm_woo-wishlist-form__product-remove-link uk-close uk-close-alt remove_from_wishlist"  data-uk-tooltip="{pos:'top-right'}" title="<?php echo esc_attr( apply_filters( 'yith_wcwl_remove_product_wishlist_message_title', __( 'Remove this product', 'yith-woocommerce-wishlist' ) ) ); ?>"></a>
								
							</div>
							
						</div>
		
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

<?php else: ?>
	
	<div class="gm_woo-wishlist-form__empty uk-alert wishlist-empty">
		<?php echo esc_html( apply_filters( 'yith_wcwl_no_product_to_remove_message', __( 'No products added to the wishlist', 'yith-woocommerce-wishlist' ) ) ); ?>
	</div>

<?php endif; ?>



