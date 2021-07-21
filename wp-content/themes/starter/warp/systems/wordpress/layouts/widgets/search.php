<?php
/**
* @package   Warp Theme Framework
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

    $id = implode('-', array('search', $widget->id, uniqid()));

?>

<form class="uk-form uk-search" id="<?php echo $id; ?>" action="<?php echo home_url( '/' ); ?>" method="get" <?php if($widget->position !== 'offcanvas'):?>data-uk-search="{'source': '<?php echo site_url('wp-admin'); ?>/admin-ajax.php?action=warp_search', 'param': 's', 'msgResultsHeader': '<?php _e("Search Results", "warp"); ?>', 'msgMoreResults': '<?php _e("More Results", "warp"); ?>', 'msgNoResults': '<?php _e("No results found", "warp"); ?>', flipDropdown: 0}"<?php endif;?>>
    
    <div class="uk-search-inner">
	    
	    <input type="text" value="" name="s" class="gm_field uk-form-large uk-width-1-1" placeholder="<?php _e('Enter a question or keyword', 'warp'); ?>">
	    
	    <button type="submit" class="gm_button uk-button uk-button-large uk-button-icon"><i class="fas fa-search"></i></button>
	    
	    <span class="gm_loader uk-button uk-button-large uk-button-icon"><i class="fas fa-circle-notch fa-spin"></i></span>
    </div>
</form>

