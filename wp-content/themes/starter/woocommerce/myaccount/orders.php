<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_account_orders', $has_orders ); ?>

<div class="gm_woo-myaccount-orders">
	
	<?php if ( $has_orders ): ?>
	
		<div class="gm_woo-myaccount-orders__table-list gm_table-list gm_table-list--middle woocommerce-orders-table woocommerce-MyAccount-orders my_account_orders account-orders-table">
			<div class="gm_table-list__items">
				
				<div class="gm_table-list__head">
					<div class="gm_table-list__row">
						
						<?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
							
							<?php if ( $column_id == 'order-status' ): ?>
								<div class="gm_table-list__cell-group gm_table-list__cell-group--data">
							<?php endif; ?>
								
								<div class="gm_table-list__cell gm_table-list__cell--<?php echo esc_attr( $column_id ); ?>">
									<?php echo esc_html( $column_name ); ?>
								</div>
							
							<?php if ( $column_id == 'order-total' ): ?>
								</div>
							<?php endif; ?>
							
						<?php endforeach; ?>
						
					</div>
				</div>
				
				<div class="gm_table-list__body">
					<?php foreach ( $customer_orders->orders as $customer_order ): ?>
					
						<?php
							$order      = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
							$item_count = $order->get_item_count() - $order->get_item_count_refunded();
						?>
						
						<div class="gm_table-list__row gm_table-list__row--status-<?php echo esc_attr( $order->get_status() ); ?>">
							
							<?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ): ?>
								
								<?php if ( $column_id == 'order-status' ): ?>
									<div class="gm_table-list__cell-group gm_table-list__cell-group--data">
								<?php endif; ?>
								
								<?php $gm_data_title = $column_id != 'order-actions' ? ' data-title="' . esc_attr( $column_name ) . '"' : ''; ?>
								
								<div class="gm_table-list__cell gm_table-list__cell--<?php echo esc_attr( $column_id ); ?>"<?php echo $gm_data_title; ?>>
								
									<?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
									
										<?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>
		
									<?php elseif ( 'order-number' === $column_id ) : ?>
										
										<div class="gm_woo-myaccount-orders__number">
											<a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
												<?php echo esc_html( _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number() ); ?>
											</a>
										</div>
		
									<?php elseif ( 'order-date' === $column_id ) : ?>
										
										<div class="gm_woo-myaccount-orders__date">
											<time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>
										</div>
		
									<?php elseif ( 'order-status' === $column_id ) : ?>
										
										<div class="gm_woo-myaccount-orders__status">
											<?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>
										</div>
		
									<?php elseif ( 'order-total' === $column_id ) : ?>
										
										<div class="gm_woo-myaccount-orders__total">
											<?php echo $order->get_formatted_order_total() . ' &times ' . $item_count; ?>
										</div>
		
									<?php elseif ( 'order-actions' === $column_id ) : ?>
										
										<div class="gm_woo-myaccount-orders__actions">
											
											<?php $actions = wc_get_account_orders_actions( $order ); ?>
			
											<?php if ( ! empty( $actions ) ): ?>
												
												<ul class="gm_controls-list">
												<?php foreach ( $actions as $key => $action ): // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
													<li>
														<a href="<?php echo esc_url( $action['url'] ); ?>" class="gm_controls-list__link gm_controls-list__link--<?php echo sanitize_html_class( $key ); ?> uk-button uk-button-icon uk-button-icon-small <?php echo sanitize_html_class( $key ); ?>" title="<?php echo esc_html( $action['name'] ); ?>" data-uk-tooltip="{pos:'top-right'}"></a>
													</li>
													
												<?php endforeach; ?>
												</ul>
												
											<?php endif; ?>	
										</div>
										
									<?php endif; ?>
								</div>
								
								<?php if ( $column_id == 'order-total' ): ?>
									</div>
								<?php endif; ?>
								
							<?php endforeach; ?>
						</div>
						
					<?php endforeach; ?>
				</div>
				
				<?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>
			
				<?php if ( 1 < $customer_orders->max_num_pages ) : ?>
					<div class="gm_table-list__pagination">
						
						<div class="gm_pagination-without-numbers">
							<ul>
								
								<?php if ( 1 !== $current_page ) : ?>
								
									<li class="gm_pagination-without-numbers__previous">
										<a class="gm_pagination-without-numbers__button gm_pagination-without-numbers__button--previous" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>">
											<i class="fas fa-arrow-left"></i><span><?php esc_html_e( 'Previous', 'woocommerce' ); ?></span>
										</a>
									</li>
									
								<?php endif; ?>
					
					
								<?php if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>
								
									<li class="gm_pagination-without-numbers__next">
										<a class="gm_pagination-without-numbers__button gm_pagination-without-numbers__button--next" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>">
											<span><?php esc_html_e( 'Next', 'woocommerce' ); ?></span><i class="fas fa-arrow-right"></i>
										</a>
									</li>
									
								<?php endif; ?>
								
							</ul>
						</div>
				
					</div>
				<?php endif; ?>
				
			</div>
		</div>
		
	<?php else: ?>
	
		<div class="gm_woo-myaccount-orders__empty uk-alert woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
			<?php esc_html_e( 'No order has been made yet.', 'woocommerce' ); ?>
		</div>
		
	<?php endif; ?>
	
</div>

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
