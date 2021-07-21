<?php

// JS Options

$options = array();
$options[] = ($settings['orientation'] !== '') ? '\'orientation\':\'' . $settings['orientation'] . '\'' : '';
$options[] = ($settings['scale'] !== '') ? '\'scale\': \'' . $settings['scale'] . '\'' : '';

$options = '{'.implode(', ', array_filter($options)).'}';



// Container

$container  = '{wk}-block {wk}-flex {wk}-flex-center {wk}-flex-middle {wk}-overflow-hidden';
$container .= ' {wk}-text-'.$settings['text_align'];
$container .= $settings['vertical_offset'] ? ' {wk}-block-' . $settings['vertical_offset'] : '';
$container .= $settings['contrast'] ? ' {wk}-contrast' : '';
$container .= $settings['fullscreen'] ? ' {wk}-height-full' : '';

$container_min_height = $settings['min_height'] ? ' style="min-height: ' . intval( $settings['min_height'] ) . 'px;"' : '';

// Width

if ( $settings['inner_container'] ) {
	$width = '{wk}-container {wk}-container-center';
	
	if ( $settings['inner_container_large'] ) {
		$width .= ' {wk}-container-large';
	}
}

else {

	$width = '{wk}-panel {wk}-panel-space {wk}-padding-top-remove {wk}-padding-bottom-remove {wk}-width-'.$settings['width'];
	$width .= $settings['width_small'] ? ' {wk}-width-small-'.$settings['width_small'] : '';
	$width .= $settings['width_medium'] ? ' {wk}-width-medium-'.$settings['width_medium'] : '';
	$width .= $settings['width_large'] ? ' {wk}-width-large-'.$settings['width_large'] : '';

}



// Title Size
switch ($settings['title_size']) {
    case 'panel':
        $title_size = '{wk}-h3';
        break;
    case 'large':
        $title_size = '{wk}-heading-large';
        break;
    default:
        $title_size = '{wk}-' . $settings['title_size'];
}

if ( $settings['title_class'] ) { $title_size .= ' ' . $settings['title_class']; }


// Subtitle Size
switch ($settings['subtitle_size']) {
    case 'panel':
        $subtitle_size = '{wk}-h4';
        break;
    case 'large':
        $subtitle_size = '{wk}-heading-large';
        break;
    default:
        $subtitle_size = '{wk}-' . $settings['subtitle_size'];
}

if ( $settings['subtitle_class'] ) { $subtitle_size .= ' ' . $settings['subtitle_class']; }


// Titles
if ( $settings['titles_reverse'] ) {
	
	$title_size .= ' {wk}-margin-remove';
	$subtitle_size .= ' {wk}-margin-remove';
}



// Content Size
switch ($settings['content_size']) {
    case 'small':
        $content_size = 'uk-text-small';
        break;
    case 'large':
        $content_size = 'uk-text-large';
        break;
    default:
        $content_size = '';
}



// Link Style
switch ($settings['link_style']) {
    case 'button':
        $link_style = '{wk}-button';
        break;
    case 'secondary':
        $link_style = '{wk}-button {wk}-button-secondary';
        break;
    case 'dark':
        $link_style = '{wk}-button {wk}-button-dark';
        break;
    case 'primary':
        $link_style = '{wk}-button {wk}-button-primary';
        break;
    case 'secondary-invert':
        $link_style = '{wk}-button {wk}-button-secondary-invert';
        break;
    case 'dark-invert':
        $link_style = '{wk}-button {wk}-button-dark-invert';
        break;
    case 'primary-invert':
        $link_style = '{wk}-button {wk}-button-primary-invert';
        break;
    case 'button-link':
        $link_style = '{wk}-button {wk}-button-link';
        break;
    default:
        $link_style = '';
}

// Link Size
switch ($settings['link_size']) {
    case 'mini':
        $link_size = '{wk}-button-mini';
        break;
    case 'small':
        $link_size = '{wk}-button-small';
        break;
    case 'large':
        $link_size = '{wk}-button-large';
        break;
    default:
        $link_size = '';
}

if ( $link_style == '' ) { $link_size = ''; }


// Item

foreach ($items as $i => $item) {

    $media = '';
    
    if ( $item['media'] ) {
	    
	    // Link Target
        
        $link_target = '';
        
        if ( $settings['link_target'] ) {
	        $link_target = ' target="_blank" rel="noopener noreferrer"';
	        
	        if ( $settings['link_nofollow'] || $item['link_nofollow'] ) {
		        $link_target = ' target="_blank" rel="nofollow noopener noreferrer"';
	        }
        }
        
        else if ( $item['link_target'] ) {
	        
	        $link_target = ' target="_blank" rel="noopener noreferrer"';
	        
	        if ( $settings['link_nofollow'] || $item['link_nofollow'] ) {
		        $link_target = ' target="_blank" rel="nofollow noopener noreferrer"';
	        }
        }
        
        else if ( $settings['link_nofollow'] || $item['link_nofollow'] ) {
	        
	        $link_target = ' rel="nofollow"';
        }
	    
		$attrs = array('class' => 'gm_media');
		
		if ( $item['media-mobile'] ) {
			$attrs = array('class' => 'gm_media gm_nolazy uk-hidden-small');
		}
		
	    if ( $item->type('media') == 'image' || $item['its_content'] ) {
		 
		    
		    if ( $item['image-alt'] ) {
		        $attrs['alt'] = strip_tags($item['image-alt']);
		    }
		    
		    else {
		    	$attrs['alt'] = strip_tags($item['title']);
		    }
		    
	    }
	    
	    $media_id = $item['its_content'] ? $item['media'] : attachment_url_to_postid( get_home_url() . '/' . $item['media'] );
		$media    = wp_get_attachment_image( $media_id, '', false, $attrs );
	    
	    if ( $item['media-mobile'] ) {
		    
		    $attrs = array('class' => 'gm_media-mobile uk-visible-small');
		    
		    $media_mobile_id = $item['its_content'] ? $item['media-mobile'] : attachment_url_to_postid( get_home_url() . '/' . $item['media-mobile'] );
			$media_mobile    = wp_get_attachment_image( $media_mobile_id, '', false, $attrs );
		    
		    $media .= $media_mobile;
		}
	}
	
}
?>

<?php if ( $media ): ?>
    <div class="gm_parallax <?php echo $container; ?> <?php echo $settings['class']; ?>"<?php echo $container_min_height; ?> data-gm-parallax="<?php echo $options; ?>">
	    
	    <?php if ( $settings['overlay_background'] ): ?>
	    	<div class="gm_overlay-background" style="background: <?php echo $settings['overlay_background']; ?>;"></div>
	    <?php endif; ?>
	    
	    <div class="gm_media-cont">
	    	<?php echo $media; ?>
	    </div>
	    
        <div class="gm_data-panel <?php echo $width; ?>">

            <?php if ( ( $item['title'] && $settings['title'] ) || ( $item['subtitle'] && $settings['subtitle'] ) ) : ?>
            <div class="gm_title-block">
	            
	            <?php if ($item['subtitle'] && $settings['subtitle'] && $settings['titles_reverse']) : ?>
	            <h4 class="gm_subtitle <?php echo $subtitle_size; ?>">
	
	                <?php if ($item['link']) : ?>
	                    <a class="{wk}-link-reset" href="<?php echo $item->escape('link'); ?>"<?php echo $link_target; ?>><span><?php echo $item['subtitle']; ?></span></a>
	                <?php else : ?>
	                    <span><?php echo $item['subtitle']; ?></span>
	                <?php endif; ?>
	
	            </h4>
	            <?php endif; ?>
	            
	            <?php if ($item['title'] && $settings['title']) : ?>
	            <h3 class="gm_title <?php echo $title_size; ?>">
	
	                <?php if ($item['link']) : ?>
	                    <a class="{wk}-link-reset" href="<?php echo $item->escape('link'); ?>"<?php echo $link_target; ?>><span><?php echo $item['title']; ?></span></a>
	                <?php else : ?>
	                    <span><?php echo $item['title']; ?></span>
	                <?php endif; ?>
	
	                <?php if ($item['badge'] && $settings['badge'] && $settings['badge_position'] == 'title') : ?>
	                <span class="{wk}-margin-small-left <?php echo $badge_style; ?>"><?php echo $item['badge']; ?></span>
	                <?php endif; ?>
	
	            </h3>
	            <?php endif; ?>
	            
	            <?php if ($item['subtitle'] && $settings['subtitle'] && !$settings['titles_reverse']) : ?>
	            <h4 class="gm_subtitle <?php echo $subtitle_size; ?>">
	
	                <?php if ($item['link']) : ?>
	                    <a class="{wk}-link-reset" href="<?php echo $item->escape('link'); ?>"<?php echo $link_target; ?>><span><?php echo $item['subtitle']; ?></span></a>
	                <?php else : ?>
	                    <span><?php echo $item['subtitle']; ?></span>
	                <?php endif; ?>
	
	            </h4>
	            <?php endif; ?>
	            
            </div>
            <?php endif; ?>

            <?php if (($item['content'] && $settings['content']) || ($item['link'] && $settings['link'])) : ?>
            <div class="gm_data {wk}-margin-small">

                <?php if ($item['content'] && $settings['content']) : ?>
                <div class="gm_content <?php echo $content_size; ?>"><?php echo $item['content']; ?></div>
                <?php endif; ?>

                <?php if ($item['link'] && $settings['link']) : ?>
                <div class="gm_link {wk}-margin-top-medium">
	                <a<?php if($link_style) echo ' class="' . $link_style .' '. $link_size. '"'; ?> href="<?php echo $item->escape('link'); ?>"<?php echo $link_target; ?>>
		                <?php echo $app['translator']->trans($settings['link_text']); ?>
		            </a>
		        </div>
                <?php endif; ?>

            </div>
            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>

