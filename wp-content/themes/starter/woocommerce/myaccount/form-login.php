<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$gm_form_size = '';

do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<div id="customer_login" class="gm_woo-customer-login uk-grid uk-grid-width-medium-1-2" data-uk-grid-margin>

	<div>

<?php endif; ?>
		
		<div class="gm_woo-customer-login-box gm_woo-customer-login-box--login gm_woo-customer-login-box-login uk-panel uk-panel-box uk-panel-box-white">
		
			<h3 class="gm_woo-customer-login-box__heading"><?php esc_html_e( 'Login', 'woocommerce' ); ?></h3>
	
			<form class="gm_woo-customer-login-box__form uk-form uk-form-stacked" method="post">
				
				<div class="gm_woo-customer-login-box__form-inner uk-grid uk-grid-small uk-grid-width-1-1 uk-flex-middle" data-uk-grid-margin>
					
					<?php do_action( 'woocommerce_login_form_start' ); ?>
					
					<div>
						
						<div class="uk-form-row">
							
							<label class="uk-form-label" for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?> <span class="uk-form-required">*</span></label>
							
							<div class="uk-form-controls">
								
								<input type="text" class="uk-form-field uk-width-1-1<?php echo $gm_form_size; ?>" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" />
								<?php // @codingStandardsIgnoreLine ?>
								
							</div>
							
						</div>
						
					</div>
					
					
					<div class="gm_woo-customer-login-box-login__password">
						
						<div class="uk-form-row">
							
							<label class="uk-form-label" for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?> <span class="uk-form-required">*</span></label>
							
							<div class="uk-form-controls">
								
								<input class="uk-form-field uk-width-1-1<?php echo $gm_form_size; ?>" type="password" name="password" id="password" autocomplete="current-password" />
								
							</div>
						</div>
						
					</div>
		
		
					<?php do_action( 'woocommerce_login_form' ); ?>
		
					
					<div class="gm_woo-customer-login-box-login__remember-me">
						
						<div class="uk-form-row uk-form-toggler form-row">
							
							<label class="woocommerce-form__label">
							
								<input name="rememberme" type="checkbox" id="rememberme" value="forever" />
								<span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
							
							</label>
							
						</div>
						
					</div>
					
					
					<div class="gm_woo-customer-login-box-login__login-button">
						
						<div class="uk-form-row">
							
							<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
							
							<button type="submit" class="uk-button uk-button-primary uk-width-1-1" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>">
								<?php esc_html_e( 'Log in', 'woocommerce' ); ?>
							</button>
							
						</div>
						
					</div>
					
					
					<div class="gm_woo-customer-login-box-login__lost-password">
						
						<div class="uk-form-row">
						
							<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
						
						</div>
						
					</div>
		
		
					<?php do_action( 'woocommerce_login_form_end' ); ?>
					
				</div>
	
			</form>
		
		</div>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

	</div>

	<div>

		<div class="gm_woo-customer-login-box gm_woo-customer-login-box--register gm_woo-customer-login-box-register uk-panel uk-panel-box">
		
			<h3 class="gm_woo-customer-login-box__heading"><?php esc_html_e( 'Register', 'woocommerce' ); ?></h3>
	
			<form method="post" class="gm_woo-customer-login-box__form uk-form uk-form-stacked woocommerce-form" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
	
				<?php do_action( 'woocommerce_register_form_start' ); ?>
	
	
				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
	
					<div class="uk-form-row">
						
						<label class="uk-form-label" for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?> <span class="uk-form-required">*</span></label>
						
						<div class="uk-form-controls">
							
							<input type="text" class="uk-form-field uk-width-1-1<?php echo $gm_form_size; ?>" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" />
							<?php // @codingStandardsIgnoreLine ?>
							
						</div>
						
					</div>
	
				<?php endif; ?>
	
	
				<div class="uk-form-row">
					
					<label class="uk-form-label" for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?> <span class="uk-form-required">*</span></label>
					
					<div class="uk-form-controls">
						
						<input type="email" class="uk-form-field uk-width-1-1<?php echo $gm_form_size; ?>" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" />
						<?php // @codingStandardsIgnoreLine ?>
						
					</div>
					
				</div>
	
	
				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
	
					<div class="uk-form-row">
						
						<label class="uk-form-label" for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?> <span class="uk-form-required">*</span></label>
						
						<div class="uk-form-controls">
							
							<input type="password" class="uk-form-field uk-width-1-1<?php echo $gm_form_size; ?>" name="password" id="reg_password" autocomplete="new-password" />
							
						</div>
						
					</div>
	
				<?php else : ?>
					
					<div class="uk-form-row">
						<p><b><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></b></p>
					</div>
	
				<?php endif; ?>
				
				
				<div class="uk-form-row">
					
					<?php do_action( 'woocommerce_register_form' ); ?>
					
				</div>
	
	
				<div class="gm_woo-customer-login-box-register__register-button-wrap uk-form-row">
					
					<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
					
					<button type="submit" class="uk-button uk-button-secondary gm_woo-customer-login-box-register__register-button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>">
						<?php esc_html_e( 'Register', 'woocommerce' ); ?>
					</button>
					
				</div>
	
				<?php do_action( 'woocommerce_register_form_end' ); ?>
	
			</form>
		</div>
	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
