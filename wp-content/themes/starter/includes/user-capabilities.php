<?php
	
	add_filter( 'user_has_cap', 'gm_user_has_cap', 10, 4 );
	
	function gm_user_has_cap( array $user_caps, array $required_caps, array $args, WP_User $user ) {
		
		if ( !in_array( 'administrator', (array) $user->roles ) ) {
			$user_caps['view_query_monitor'] = false;
		}
		
		return $user_caps;
	}

?>