<?php
	
	function gm_system_search_form( $form ) {
		
	    $form = '<form role="search" method="get" id="searchform" class="gm_blog-search-form uk-form searchform" action="' . home_url( '/' ) . '" >
	    <input class="gm_field" type="text" value="' . get_search_query() . '" name="s" id="s" />
	    <button type="submit" id="searchsubmit" class="gm_button uk-button">'. esc_attr__( 'Search' ) .'</button>
	    </form>';
	 
	    return $form;
	}
	
	add_filter ( 'get_search_form', 'gm_system_search_form' );
	
?>