<?php

	add_filter( 'yith_wcwl_is_wishlist_responsive', '__return_false' );
	
	add_filter( 'yith_wcwl_template_part_hierarchy', function($data) {
		
		foreach($data as $k => $v) $data[$k] = str_replace('-mobile.php', '.php', $v);
		return $data;
	});
	
?>