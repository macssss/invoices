<?php
	
	add_filter( 'wpes_meta_keys', 'gm_wpes_meta_keys' );
	
	function gm_wpes_meta_keys( $meta_keys ) {
		
		$meta_keys[] = '_sku';
		
		return $meta_keys;
	}
	
?>