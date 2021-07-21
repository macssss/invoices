<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

$gm_form_size = ' uk-form-small';

do_action( 'woocommerce_before_edit_account_form' ); ?>

<form class="gm_woo-edit-account uk-form uk-form-stacked" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>
	
	<div class="gm_woo-edit-account__fields-wrap">
		<div class="gm_woo-edit-account__fields uk-grid uk-grid-medium uk-grid-vertical-small uk-grid-width-small-1-2" data-uk-grid-margin>
			
			<div>
				<div class="uk-form-row">
					
					<label class="uk-form-label" for="account_first_name"><?php esc_html_e( 'First name', 'woocommerce' ); ?> <span class="uk-form-required">*</span></label>
					
					<div class="uk-form-controls">
						
						<input type="text" class="uk-form-field uk-width-1-1<?php echo $gm_form_size; ?>" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
						
					</div>
					
				</div>
			</div>
			
			<div>
				<div class="uk-form-row">
					
					<label class="uk-form-label" for="account_last_name"><?php esc_html_e( 'Last name', 'woocommerce' ); ?> <span class="uk-form-required">*</span></label>
					
					<div class="uk-form-controls">
							
						<input type="text" class="uk-form-field uk-width-1-1<?php echo $gm_form_size; ?>" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
						
					</div>
					
				</div>
			</div>
		
			<div>
				<div class="uk-form-row">
					
					<label class="uk-form-label" for="account_display_name"><?php esc_html_e( 'Display name', 'woocommerce' ); ?> <span class="uk-form-required">*</span></label>
					
					<div class="uk-form-controls">
						
						<input type="text" class="uk-form-field uk-width-1-1<?php echo $gm_form_size; ?>" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" />
						
						<p class="uk-form-help-block"><?php esc_html_e( 'This will be how your name will be displayed in the account section and in reviews', 'woocommerce' ); ?></p>
						
					</div>
					
				</div>
			</div>
		
			<div>
				<div class="uk-form-row">
					
					<label class="uk-form-label" for="account_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?> <span class="uk-form-required">*</span></label>
					
					<div class="uk-form-controls">
						
						<input type="email" class="uk-form-field uk-width-1-1<?php echo $gm_form_size; ?>" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
						
					</div>
					
				</div>
			</div>
			
		</div>
	</div>
	
	
	
	<div class="gm_woo-edit-account__password-change gm_woo-edit-account-password-change">
		
		<div class="gm_woo-edit-account-password-change__toggler">
			
			<div class="uk-form-toggler">
				<label>
					<input type="checkbox" class="gm_woo-edit-account-password-change-toggler" />
					<span><?php esc_html_e( 'Password change', 'woocommerce' ); ?></span>
				</label>
			</div>
			
		</div>
		
		
		<div class="gm_woo-edit-account-password-change__fields-wrap">
			
			<div class="gm_woo-edit-account-password-change__fields uk-grid uk-grid-medium uk-grid-vertical-small uk-grid-width-1-1" data-uk-grid-margin>
				
				<div>
					<div class="uk-form-row">
						
						<label class="uk-form-label" for="password_current"><?php esc_html_e( 'Current password', 'woocommerce' ); ?></label>
						
						<div class="uk-form-controls">
							
							<input type="password" class="uk-form-field uk-width-1-1<?php echo $gm_form_size; ?>" name="password_current" id="password_current" autocomplete="off" />
						
						</div>
						
					</div>
				</div>
				
				<div>
					<div class="uk-form-row">
						
						<label class="uk-form-label" for="password_1"><?php esc_html_e( 'New password', 'woocommerce' ); ?></label>
						
						<div class="uk-form-controls">
							<input type="password" class="uk-form-field uk-width-1-1<?php echo $gm_form_size; ?>" name="password_1" id="password_1" autocomplete="off" />
						</div>
						
					</div>
				</div>
				
				<div>
					<div class="uk-form-row">
						
						<label class="uk-form-label" for="password_2"><?php esc_html_e( 'Confirm new password', 'woocommerce' ); ?></label>
						
						<div class="uk-form-controls">
							<input type="password" class="uk-form-field uk-width-1-1<?php echo $gm_form_size; ?>" name="password_2" id="password_2" autocomplete="off" />
						</div>
						
					</div>
				</div>
				
			</div>
		</div>
		
	</div>



	<?php do_action( 'woocommerce_edit_account_form' ); ?>



	<div class="gm_woo-edit-account__save-button-wrap">
		
		<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
		
		<button type="submit" class="gm_woo-edit-account__save-button uk-button uk-button-primary" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>">
			<span><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></span>
		</button>
		
		<input type="hidden" name="action" value="save_account_details" />
		
	</div>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
	
</form>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
