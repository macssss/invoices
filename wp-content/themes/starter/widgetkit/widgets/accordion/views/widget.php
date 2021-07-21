<?php

// JS Options
$options = array();
$options[] = ($settings['collapse']) ? '' : 'collapse: false';
$options[] = ($settings['first_item']) ? '' : 'showfirst: false';

$options = '{'.implode(',', array_filter($options)).'}';

// Media Width
$media_width = '{wk}-width-' . $settings['media_breakpoint'] . '-' . $settings['media_width'];

switch ($settings['media_width']) {
    case '1-5':
        $content_width = '4-5';
        break;
    case '1-4':
        $content_width = '3-4';
        break;
    case '3-10':
        $content_width = '7-10';
        break;
    case '1-3':
        $content_width = '2-3';
        break;
    case '2-5':
        $content_width = '3-5';
        break;
    case '1-2':
        $content_width = '1-2';
        break;
}

$content_width = '{wk}-width-' . $settings['media_breakpoint'] . '-' . $content_width;

// Content Align
$content_align  = $settings['content_align'] ? '{wk}-flex-middle' : '';

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

// Media Border
$border = ($settings['media_border'] != 'none') ? '{wk}-border-' . $settings['media_border'] : '';

?>

<div class="gm_accordion {wk}-accordion {wk}-text-<?php echo $settings['text_align']; ?><?php echo $settings['numbered'] ? ' uk-accordion-numbered' : ''; ?> <?php echo $settings['class']; ?>" data-{wk}-accordion="<?php echo $options; ?>">

    <?php foreach ($items as $i => $item) :
		
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

        // Social Buttons
        $socials = '';
        if ($settings['social_buttons']) {
            $socials .= $item['twitter'] ? '<div><a class="{wk}-icon-button {wk}-icon-twitter" href="'. $item->escape('twitter') .'"></a></div>': '';
            $socials .= $item['facebook'] ? '<div><a class="{wk}-icon-button {wk}-icon-facebook" href="'. $item->escape('facebook') .'"></a></div>': '';
            $socials .= $item['email'] ? '<div><a class="{wk}-icon-button {wk}-icon-envelope-o" href="mailto:'. $item->escape('email') .'"></a></div>': '';
        }

        // Second Image as Overlay
        $media2 = '';
        if ($settings['media_overlay'] == 'image') {
            foreach ($item as $field) {
                if ($field != 'media' && $item->type($field) == 'image') {
                    $media2 = $field;
                    break;
                }
            }
        }

        // Media Type
        $attrs  = array('class' => '');
        $width  = $item['media.width'];
        $height = $item['media.height'];

        if ($item->type('media') == 'image' || $item['its_content']) {
            if( $item['image_alt'] ) {
		        $attrs['alt'] = strip_tags($item['image_alt']);
	        }
	        
	        else {
            	$attrs['alt'] = strip_tags($item['title']);
            }

            $attrs['class'] .= ($border) ? $border : '';
            $attrs['class'] .= ($settings['media_animation'] != 'none' && !$media2) ? ' {wk}-overlay-' . $settings['media_animation'] : '';
        }

        if ($item->type('media') == 'video') {
            $attrs['class'] = '{wk}-responsive-width';
            $attrs['controls'] = true;
        }

        if ($item->type('media') == 'iframe') {
            $attrs['class'] = '{wk}-responsive-width';
        }
		
		if ( $item->type('media') == 'image' || $item['its_content'] ) {
	        
            $media_id = $item['its_content'] ? $item['media'] : attachment_url_to_postid( get_home_url() . '/' . $item['media'] );
			$media    = wp_get_attachment_image( $media_id, $settings['image_size'], false, $attrs );
			
        }
        
        else { $media = $item->media('media', $attrs);  }
		
        // Second Image as Overlay
        if ($media2) {

            $attrs['class'] .= ' {wk}-overlay-panel {wk}-overlay-image';
            $attrs['class'] .= ($settings['media_animation'] != 'none') ? ' {wk}-overlay-' . $settings['media_animation'] : '';
			
			$media2_id = attachment_url_to_postid( get_home_url() . '/' . $item['media2'] );
			$media2    = wp_get_attachment_image( $media2_id, $settings['image_size'], false, $attrs );
        }

        // Link and Overlay
        if ($item['link'] && ($settings['media_overlay'] == 'link' || $settings['media_overlay'] == 'icon' || $settings['media_overlay'] == 'image')) {

            $media = '<div class="{wk}-overlay {wk}-overlay-hover ' . $border . '">' . $media;

            if ($media2) {
                $media .= $media2;
            }

            if ($settings['media_overlay'] == 'icon') {
                $media .= '<div class="{wk}-overlay-panel {wk}-overlay-background {wk}-overlay-icon {wk}-overlay-' . $settings['overlay_animation'] . '"></div>';
            }

            $media .= '<a class="{wk}-position-cover" href="' . $item->escape('link') . '"' . $link_target . '></a>';
            $media .= '</div>';
        }

        if ($socials && $settings['media_overlay'] == 'social-buttons') {
            $media  = '<div class="{wk}-overlay {wk}-overlay-hover ' . $border . '">' . $media;
            $media .= '<div class="{wk}-overlay-panel {wk}-overlay-background {wk}-overlay-' . $settings['overlay_animation'] . ' {wk}-flex {wk}-flex-center {wk}-flex-middle {wk}-text-center"><div>';
            $media .= '<div class="{wk}-grid {wk}-grid-small" data-{wk}-grid-margin>' . $socials . '</div>';
            $media .= '</div></div>';
            $media .= '</div>';
        }

    ?>
	
    	<div class="gm_item <?php echo $item['class']; ?>">
    	    <h3 class="gm_accordion-title {wk}-accordion-title"><?php echo $item['title']; ?></h3>
    	
    	    <div class="gm_accordion-content {wk}-accordion-content">
    	
    	        <?php if ($item['media'] && $settings['media'] && $settings['media_align'] == 'top') : ?>
    	        <div class="gm_media {wk}-margin-small {wk}-text-center"><?php echo $media; ?></div>
    	        <?php endif; ?>
    	
    	        <?php if ($item['media'] && $settings['media'] && in_array($settings['media_align'], array('left', 'right'))) : ?>
    	        <div class="gm_grid {wk}-grid <?php echo $content_align; ?>" data-{wk}-grid-margin>
    	            <div class="gm_media <?php echo $media_width ?><?php if ($settings['media_align'] == 'right') echo ' {wk}-float-right {wk}-flex-order-last-' . $settings['media_breakpoint'] ?>">
    	                <?php echo $media; ?>
    	            </div>
    	            <div class="gm_data <?php echo $content_width ?>">
    	                <div class="{wk}-panel">
    	        <?php endif; ?>
    	
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
    	
    	        <?php if ($item['content'] && $settings['content']) : ?>
    	        <div class="gm_content {wk}-margin-small"><?php echo $item['content']; ?></div>
    	        <?php endif; ?>
    	
    	        <?php if ($socials && ($settings['media_overlay'] != 'social-buttons')) : ?>
    	        <div class="gm_socials {wk}-grid {wk}-grid-small {wk}-flex-<?php echo $settings['text_align']; ?>" data-{wk}-grid-margin><?php echo $socials; ?></div>
    	        <?php endif; ?>
    	
    	        <?php if ($item['link'] && $settings['link']) : ?>
    	        <div class="gm_link {wk}-margin-top-medium">
    	            <a<?php if($link_style) echo ' class="' . $link_style .' '. $link_size. '"'; ?> href="<?php echo $item->escape('link'); ?>"<?php echo $link_target; ?>>
    		            <?php echo $app['translator']->trans($settings['link_text']); ?>
    		        </a>
    	        </div>
    	        <?php endif; ?>
    	
    	        <?php if ($item['media'] && $settings['media'] && in_array($settings['media_align'], array('left', 'right'))) : ?>
    	                </div>
    	            </div>
    	        </div>
    	        <?php endif; ?>
    	
    	    </div>
    	</div>

    <?php endforeach; ?>

</div>
