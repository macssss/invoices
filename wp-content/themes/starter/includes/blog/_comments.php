<?php
	
	add_filter ( 'preprocess_comment', 'gm_verify_comment_gdpr_accept' );
	
	function gm_verify_comment_gdpr_accept( $commentdata ) {
	    
	    $comment_gdpr_accept = wp_slash((isset($_POST['comment-gdpr-accept'])) ? trim($_POST['comment-gdpr-accept']) : null);
	    
	    if ( '' == $comment_gdpr_accept && !is_user_logged_in() ) {
	    	
	    	$args = array(
	    		'back_link' => true
	    	);
	    
	        wp_die(__( 'ERROR: Consent to the processing of personal data is required.', 'warp'), '', $args);
	    }
	    
	    return $commentdata;
	}
	
	
	
	add_filter ( 'gglcptch_add_custom_form', 'gm_add_custom_recaptcha_forms' );
	
	function gm_add_custom_recaptcha_forms ( $forms ) {
		
		$forms['commentform'] = array( "form_name" => "Comment Form" );
		return $forms;
	}
	
	
	
	add_filter ( 'comments_open', 'gm_remove_attachment_comments', 10 , 2 );
	
	function gm_remove_attachment_comments( $open, $post_id ) {
	    
	    $post = get_post ( $post_id );
	    
	    if( $post->post_type == 'attachment' ) {
	        return false;
	    }
	    
	    return $open;
	}
	
	
?>