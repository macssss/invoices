<?php
/**
 * My Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

defined( 'ABSPATH' ) || exit;

$customer_id = get_current_user_id();

if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) {
	
	$get_addresses = apply_filters(
	
		'woocommerce_my_account_get_addresses',
	
		array(
		
			'billing'  => __( 'Billing address', 'woocommerce' ),
			'shipping' => __( 'Shipping address', 'woocommerce' ),
		),
	
		$customer_id
	);
}


else {

	$get_addresses = apply_filters(

		'woocommerce_my_account_get_addresses',

		array(
		
			'billing' => __( 'Billing address', 'woocommerce' ),
		),

		$customer_id
	);
}

$oldcol = 1;
$col    = 1;

?>

<div class="gm_woo-myaccount-address">
	
	<div class="gm_woo-myaccount-info">
		<p>
			<?php echo apply_filters( 'woocommerce_my_account_my_address_description', esc_html__( 'The following addresses will be used on the checkout page by default.', 'woocommerce' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</p>
	</div>
	
	
	<?php if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ): ?>
	
		<div class="gm_woo-myaccount-address__columns uk-grid uk-grid-large uk-grid-width-medium-1-2" data-uk-grid-margin>
	
	<?php endif; ?>
	
	
	
	<?php foreach ( $get_addresses as $name => $address_title ) : ?>
		
		<?php $address = gm_woo_get_account_formatted_address( $name ); ?>
	
		<div>
			<div class="gm_woo-myaccount-address__item gm_woo-myaccount-address-item">
				
				<div class="gm_woo-myaccount-address-item__heading-block">
					
					<h3 class="gm_woo-myaccount-address-item__heading"><span><?php echo esc_html( $address_title ); ?></span></h3>
				
					<div class="gm_woo-myaccount-address-item__link">
						
						<a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address', $name ) ); ?>" class="uk-button uk-button-icon uk-button-icon-mini uk-button-secondary" title="<?php echo $address ? esc_html__( 'Edit', 'woocommerce' ) : esc_html__( 'Add', 'woocommerce' ); ?>" data-uk-tooltip>
							<i class="fas <?php echo $address ? 'fa-pen' : 'fa-plus'; ?>"></i>
						</a>
						
					</div>
					
				</div>
				
				
				
				<div class="gm_woo-myaccount-address-item__info">
					<?php echo $address ?: esc_html_e( 'You have not set up this type of address yet.', 'woocommerce' ); ?>
				</div>
				
			</div>
		</div>
	
	<?php endforeach; ?>
	
	
	
	<?php if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ): ?>
	
		</div>
	
	<?php endif; ?>

</div>

<?php //