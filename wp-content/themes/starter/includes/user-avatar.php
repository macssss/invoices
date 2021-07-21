<?php
	
	function gm_new_gravatar ( $avatar_defaults ) {
		
		$myavatar = get_template_directory_uri() . '/user-pic.jpg';
		
		$avatar_defaults[$myavatar] = "Starter";
		
		return $avatar_defaults;
	}
	
	//add_filter( 'avatar_defaults', 'gm_new_gravatar' ); 
	
?>