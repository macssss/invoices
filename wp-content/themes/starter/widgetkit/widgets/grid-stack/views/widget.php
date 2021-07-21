<?php

// Width
$media_width = '{wk}-width-' . $settings['breakpoint'] . '-' . $settings['width'];

switch ($settings['width']) {
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
    case '3-5':
        $content_width = '2-5';
        break;
    case '2-3':
        $content_width = '1-3';
        break;
    case '7-10':
        $content_width = '3-10';
        break;
    case '3-4':
        $content_width = '1-4';
        break;
    case '4-5':
        $content_width = '1-5';
        break;
    case '1-1':
        $content_width = '1-1';
        break;
}

$content_width = '{wk}-width-' . $settings['breakpoint'] . '-' . $content_width;

// Grid Gutter
if ($settings['gutter']) {
    $grid = '{wk}-grid';
} else {
    $grid = '{wk}-grid {wk}-grid-collapse';
}

switch ($settings['gutter_vertical']) {
    case 'collapse':
        $gutter = ' {wk}-margin-top-remove';
        break;
    case 'large':
        $gutter = ' {wk}-margin-large';
        break;
    default:
        $gutter = '';
}

$grid .= $gutter;

// Grid Divider
if ($settings['gutter_vertical'] == 'collapse') {
    $gutter = ' {wk}-margin-remove';
}
$divider = $settings['divider'] ? '<hr class="{wk}-grid-divider ' . $gutter . '">' : '';

// Panel
$panel = $settings['panel'] ? '{wk}-panel {wk}-panel-space' : '{wk}-panel';

// Content Align
$content_align  = $settings['content_align'] ? '{wk}-flex-middle' : '';

// Text Align
$text_align = $settings['text_align'];

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

// Badge Style
switch ($settings['badge_style']) {
    case 'badge':
        $badge_style = '{wk}-badge';
        break;
    case 'success':
        $badge_style = '{wk}-badge {wk}-badge-success';
        break;
    case 'warning':
        $badge_style = '{wk}-badge {wk}-badge-warning';
        break;
    case 'danger':
        $badge_style = '{wk}-badge {wk}-badge-danger';
        break;
    case 'text-muted':
        $badge_style  = '{wk}-text-muted';
        $badge_style .= ($settings['badge_position'] == 'panel') ? ' {wk}-panel-badge' : '';
        break;
    case 'text-primary':
        $badge_style  = '{wk}-text-primary';
        $badge_style .= ($settings['badge_position'] == 'panel') ? ' {wk}-panel-badge' : '';
        break;
}

// Media Border
$border = ($settings['media_border'] != 'none') ? '{wk}-border-' . $settings['media_border'] : '';

// Animation
$animation = ($settings['animation_media'] != 'none' || $settings['animation_content'] != 'none') ? ' data-{wk}-scrollspy="{target:\'> div > [data-{wk}-scrollspy-cls]\', delay:' . $settings['animation_delay'] . '}"' : '';

?>

<div class="gm_grid-stack" <?php echo $animation; ?>>

<?php foreach ($items as $i => $item) :  ?>

    <?php
		
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

        if ( $item->type('media') == 'image' || $item['its_content'] ) {
            if( $item['image-alt'] ) {
		        $attrs['alt'] = strip_tags($item['image-alt']);
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
        if ($settings['media_overlay'] == 'link' || $settings['media_overlay'] == 'icon' || $settings['media_overlay'] == 'image') {

            $media = '<div class="{wk}-overlay {wk}-overlay-hover ' . $border . '">' . $media;

            if ($media2) {
                $media .= $media2;
            }

            if ($settings['media_overlay'] == 'icon') {
                $media .= '<div class="{wk}-overlay-panel {wk}-overlay-background {wk}-overlay-icon {wk}-overlay-' . $settings['overlay_animation'] . '"></div>';
            }

            if ($item['link']) {
                $media .= '<a class="{wk}-position-cover" href="' . $item->escape('link') . '"' . $link_target . '></a>';
            }

            $media .= '</div>';
        }

        if ($socials && $settings['media_overlay'] == 'social-buttons') {
            $media  = '<div class="{wk}-overlay {wk}-overlay-hover ' . $border . '">' . $media;
            $media .= '<div class="{wk}-overlay-panel {wk}-overlay-background {wk}-overlay-' . $settings['overlay_animation'] . ' {wk}-flex {wk}-flex-center {wk}-flex-middle {wk}-text-center"><div>';
            $media .= '<div class="{wk}-grid {wk}-grid-small" data-{wk}-grid-margin>' . $socials . '</div>';
            $media .= '</div></div>';
            $media .= '</div>';
        }

        // Align
        if ($settings['alternate']) {
            $align_flip = $i % 2 == ($settings['align'] == 'left');
        } else {
            $align_flip = ($settings['align'] == 'right');
        }

        // Text Align
        if ($settings['text_align'] == 'media') {
            $text_align = $align_flip ? 'right' : 'left';
        }

        $text_align .= ($text_align == 'right') ? ' {wk}-text-left-small' : '';

        // Width
        if (!($item['media'] && $settings['media'])) {
            $item_content_width = '{wk}-width-1-1';
        } else {
			$item_content_width = $content_width;
		}

        if (!($item['title'] && $settings['title']) && !($item['content'] && $settings['content'])) {
            $item_media_width = '{wk}-width-1-1';
        } else {
            $item_media_width = $media_width;
        }

        // Animation Media
        $slide = '';
        if ($settings['animation_media'] == 'slide') {
            $slide = $align_flip ? '-right' : '-left';
        }
        $animation_media = ($settings['animation_media'] != 'none') ? ' data-{wk}-scrollspy-cls="{wk}-animation-' . $settings['animation_media'] . $slide . ' {wk}-invisible"' : '';

        // Animation Content
        $slide = '';
        if ($settings['animation_content'] == 'slide') {
            $slide = $align_flip ? '-left' : '-right';
        }
        $animation_content = ($settings['animation_content'] != 'none') ? ' data-{wk}-scrollspy-cls="{wk}-animation-' . $settings['animation_content'] . $slide . ' {wk}-invisible"' : '';

    ?>

    <div class="gm_item <?php echo $grid; ?> {wk}-text-<?php echo $text_align; ?> <?php echo $content_align; ?>" data-{wk}-grid-match data-{wk}-margin="{cls:'{wk}-margin-top'}">

        <?php if ($item['media'] && $settings['media']) : ?>
        <div class="gm_media <?php echo $item_media_width; ?> {wk}-text-center<?php if ($align_flip) echo ' {wk}-float-right {wk}-flex-order-last-' . $settings['breakpoint']; ?><?php if ($settings['animation_media'] != 'none') echo ' {wk}-invisible'; ?>" <?php echo $animation_media; ?>>
            <?php echo $media; ?>
        </div>
        <?php endif; ?>

        <?php if (($item['title'] && $settings['title']) || ( $item['subtitle'] && $settings['subtitle'] ) || ($item['content'] && $settings['content'])) : ?>
        <div class="gm_data <?php echo $item_content_width; ?><?php if ($settings['animation_content'] != 'none') echo ' {wk}-invisible'; ?>" <?php echo $animation_content; ?>>
            <div class="gm_data-panel <?php echo $panel; ?> {wk}-width-1-1">

                <?php if ($item['badge'] && $settings['badge'] && $settings['badge_position'] == 'panel') : ?>
                <div class="{wk}-panel-badge <?php echo $badge_style; ?>"><?php echo $item['badge']; ?></div>
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
                <div class="gm_content {wk}-margin-small <?php echo $content_size; ?>"><?php echo $item['content']; ?></div>
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

            </div>
        </div>
        <?php endif; ?>

    </div>

    <?php if ($i+1 != count($items)) echo $divider; ?>

<?php endforeach; ?>

</div>
