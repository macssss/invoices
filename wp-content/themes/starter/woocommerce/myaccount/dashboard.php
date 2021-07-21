<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>

<div class="gm_woo-myaccount-dashboard">
	
	<div class="gm_woo-myaccount-info">
		<p>
			<?php esc_html_e( 'Hello', 'warp' ); ?> <strong><?php esc_html_e( $current_user->display_name ); ?></strong>
		</p>
	</div>
	
	<div class="gm_woo-myaccount-dashboard__blocks uk-grid uk-grid-width-1-1" data-uk-grid-margin>
		
		<div>
			<div class="gm_woo-myaccount-dashboard__block uk-panel uk-panel-box uk-panel-box-hover">
			
				<div class="gm_woo-myaccount-dashboard__block-icon"><i class="fas fa-shopping-cart"></i></div>
				<h3 class="gm_woo-myaccount-dashboard__block-title"><?php esc_html_e( 'Orders', 'woocommerce' ); ?></h3>
				<a class="gm_woo-myaccount-dashboard__block-link uk-position-cover" href="<?php echo esc_url( wc_get_endpoint_url( 'orders' ) ); ?>"></a>
				
			</div>
		</div>
		
		<div>
			<div class="gm_woo-myaccount-dashboard__block uk-panel uk-panel-box uk-panel-box-hover">
				
				<div class="gm_woo-myaccount-dashboard__block-icon"><i class="fas fa-map-marker-alt"></i></div>
				<h3 class="gm_woo-myaccount-dashboard__block-title"><?php esc_html_e( 'Addresses', 'woocommerce' ); ?></h3>
				<a class="gm_woo-myaccount-dashboard__block-link uk-position-cover" href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address' ) ); ?>"></a>
				
			</div>
		</div>
		
		<div>
			<div class="gm_woo-myaccount-dashboard__block uk-panel uk-panel-box uk-panel-box-hover">
				
				<div class="gm_woo-myaccount-dashboard__block-icon"><i class="fas fa-user"></i></div>
				<h3 class="gm_woo-myaccount-dashboard__block-title"><?php esc_html_e( 'Account details', 'woocommerce' ); ?></h3>
				<a class="gm_woo-myaccount-dashboard__block-link uk-position-cover" href="<?php echo esc_url( wc_get_endpoint_url( 'edit-account' ) ); ?>"></a>
				
			</div>
		</div>
		
	</div>
	
	
	<?php
	
		/**
		 * My Account dashboard.
		 *
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_account_dashboard' );
		
	?>
	
</div>

<?php
	
	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
