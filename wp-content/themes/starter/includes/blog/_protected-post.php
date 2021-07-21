<?php
	
	add_filter ( 'protected_title_format', 'gm_remove_protected_text' );
	
	function gm_remove_protected_text() {
		return __('%s');
	}
	
	
	
	add_filter ( 'the_password_form', 'gm_password_form' );
	
	function gm_password_form() {
		
	    global $post;
	    
	    $label = 'pwbox-' . ( empty( $post->ID ) ? rand() : $post->ID );
	    $form = '
	    	<div class="gm_single-password-form">
	    	<form class="gm_form uk-form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
				<div class="gm_description">' . __( "This content is password protected. To view it please enter your password below:" ) . '</div>
				<div class="gm_inputs"><label class="gm_label" for="' . $label . '">' . __( "Password:" ) . ' </label><input class="gm_field uk-form-small" name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" /><button class="gm_button uk-button uk-button-secondary uk-button-small" type="submit" name="Submit">' . esc_attr__( "Submit" ) . '</button></div>
			</form></div>';
	    
	    return $form;
	}
	
?>