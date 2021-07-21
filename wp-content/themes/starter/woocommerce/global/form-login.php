<?php
/**
 * Login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( is_user_logged_in() ) {
	return;
}

?>

<form class="gm_woo-form-login uk-form uk-form-stacked woocommerce-form woocommerce-form-login login" method="post" <?php echo ( $hidden ) ? 'style="display:none;"' : ''; ?>>

	<?php do_action( 'woocommerce_login_form_start' ); ?>
	
	<?php if ( $message ): ?>
		
		<div class="gm_woo-form-login__message">
		
			<?php echo wpautop( wptexturize( $message ) ); // @codingStandardsIgnoreLine ?>
		
		</div>
		
	<?php endif; ?>
	
	<div class="gm_woo-form-login__inner uk-grid uk-grid-small uk-grid-width-1-1 uk-flex-middle" data-uk-grid-margin>
		
		<div>
			
			<div class="uk-form-row form-row form-row-first">
				
				<label class="uk-form-label" for="username"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?> <span class="uk-form-required">*</span></label>
				
				<div class="uk-form-controls">
					
					<input type="text" class="uk-form-field uk-width-1-1 input-text" name="username" id="username" autocomplete="username" required />
					
				</div>
				
			</div>
			
		</div>
		
		<div class="gm_woo-form-login__password">
			
			<div class="uk-form-row form-row form-row-last">
				
				<label class="uk-form-label" for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?> <span class="uk-form-required">*</span></label>
				
				<div class="uk-form-controls">
					
					<input class="uk-form-field uk-width-1-1 input-text" type="password" name="password" id="password" autocomplete="current-password" required />
					
				</div>
				
			</div>
			
		</div>
	
	
		<?php do_action( 'woocommerce_login_form' ); ?>
	
		
		<div class="gm_woo-form-login__remember-me">
			
			<div class="uk-form-row uk-form-togglers uk-form-togglers-column form-row">
				
				<div class="uk-form-toggler">
					
					<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
					
						<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" />
						<span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
					
					</label>
					
				</div>
				
			</div>
			
		</div>
		
		
		<div class="gm_woo-form-login__login-button">
			
			<div class="uk-form-row form-row">
				
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				
				<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ); ?>" />
				
				<button type="submit" class="uk-button uk-button-primary uk-width-1-1 woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>">
					<?php esc_html_e( 'Login', 'woocommerce' ); ?>
				</button>
				
			</div>
		</div>
		
		
		<div class="gm_woo-form-login__lost-password">
			
			<div class="uk-form-row lost_password">
			
				<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
			
			</div>
			
		</div>
		
		
	</div>

	<?php do_action( 'woocommerce_login_form_end' ); ?>

</form>
