<?php

// JS Options
$options = array();
$options[] = ($settings['animation'] != 'fade') ? 'animation: \'' . $settings['animation'] . '\'' : '';
$options[] = ($settings['duration'] != '200') ? 'duration: ' . $settings['duration']: '';
$options[] = ($settings['autoplay']) ? 'autoplay: true ' : '';
$options[] = ($settings['interval'] != '7000') ? 'autoplayInterval: ' . $settings['interval'] : '';
$options[] = ($settings['autoplay_pause']) ? '' : 'pauseOnHover: false';
$options[] = ($settings['columns']) ? 'default: ' . $settings['columns']: '';
$options[] = ($settings['columns_small']) ? 'small: ' . $settings['columns_small']: '';
$options[] = ($settings['columns_medium']) ? 'medium: ' . $settings['columns_medium']: '';
$options[] = ($settings['columns_large']) ? 'large: ' . $settings['columns_large']: '';
$options[] = ($settings['columns_xlarge']) ? 'xlarge: ' . $settings['columns_xlarge']: '';

// Grid
$grid  = '{wk}-grid {wk}-grid-match {wk}-flex-center {wk}-grid-width-1-'.$settings['columns'];
$grid .= $settings['columns_small'] ? ' {wk}-grid-width-small-1-'.$settings['columns_small'] : '';
$grid .= $settings['columns_medium'] ? ' {wk}-grid-width-medium-1-'.$settings['columns_medium'] : '';
$grid .= $settings['columns_large'] ? ' {wk}-grid-width-large-1-'.$settings['columns_large'] : '';
$grid .= $settings['columns_xlarge'] ? ' {wk}-grid-width-xlarge-1-'.$settings['columns_xlarge'] : '';

$grid .= in_array($settings['gutter'], array('collapse','large','medium','small')) ? ' {wk}-grid-'.$settings['gutter'] : '' ;

// Panel
$panel = '{wk}-panel';
switch ($settings['panel']) {
    case 'box' :
        $panel .= ' {wk}-panel-box';
        break;
    case 'white' :
        $panel .= ' {wk}-panel-box {wk}-panel-box-white';
        break;
    case 'secondary' :
        $panel .= ' {wk}-panel-box {wk}-panel-box-secondary';
        break;
    case 'dark' :
        $panel .= ' {wk}-panel-box {wk}-panel-box-dark';
        break;
    case 'primary' :
        $panel .= ' {wk}-panel-box {wk}-panel-box-primary';
        break;
    case 'hover' :
        $panel .= ' {wk}-panel-hover';
        break;
    case 'header' :
        $panel .= ' {wk}-panel-header';
        break;
    case 'space' :
        $panel .= ' {wk}-panel-space';
        break;
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


// Filter Tags
$tags = array();
if (isset($settings['filter_tags']) && is_array($settings['filter_tags'])) {
    $tags = $settings['filter_tags'];
}

if(!count($tags)){
    foreach ($items as $i => $item) {
        if ($item['tags']) {
            $tags = array_merge($tags, $item['tags']);
        }
    }
    $tags = array_unique($tags);

    natsort($tags);
    $tags = array_values($tags);
}

// JS Options
$options[] = (count($tags) && $settings['filter'] != 'none' && !$settings['filter_all']) ? 'filter: \'' . $tags[0] . '\'': '';
$options   = '{'.implode(',', array_filter($options)).'}';


?>

<div class="gm_slideset <?php echo $settings['class']; ?>" data-{wk}-slideset="<?php echo $options; ?>">

    <?php if ($tags && $settings['filter'] != 'none' && $settings['filter_position'] == 'top') : ?>
    <?php echo $this->render('plugins/widgets/' . $widget->getConfig('name')  . '/views/_filter.php', compact('items', 'settings', 'tags')); ?>
    <?php endif; ?>

    <div class="{wk}-slidenav-position">

        <ul class="{wk}-slideset <?php echo $grid; ?>">
        <?php foreach ($items as $item) :
	        
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

                if ($item->type('media') == 'image' || $item['its_content']) {
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
                $overlay       = '';
                $overlay_hover = '';
                $panel_hover   = '';

                if ($item['link']) {

                    if ($settings['panel_link']) {

                        $panel_hover .= ($settings['panel'] == 'box') ? ' {wk}-panel-box-hover' : '';
		                $panel_hover .= ($settings['panel'] == 'white') ? ' {wk}-panel-box-white-hover' : '';
		                $panel_hover .= ($settings['panel'] == 'secondary') ? ' {wk}-panel-box-secondary-hover' : '';
		                $panel_hover .= ($settings['panel'] == 'dark') ? ' {wk}-panel-box-dark-hover' : '';
		                $panel_hover .= ($settings['panel'] == 'primary') ? ' {wk}-panel-box-primary-hover' : '';

                        if (($settings['media_overlay'] == 'icon') ||
                            ($media2) ||
                            ($socials && $settings['media_overlay'] == 'social-buttons') ||
                            ($item['media'] && $settings['media'] && $settings['media_animation'] != 'none')) {
                            $panel_hover .= ' {wk}-overlay-hover';
                        }

                    } elseif ($settings['media_overlay'] == 'link' || $settings['media_overlay'] == 'icon' || $settings['media_overlay'] == 'image') {
                        $overlay = '<a class="{wk}-position-cover" href="' . $item->escape('link') . '"' . $link_target . '></a>';
                        $overlay_hover = ' {wk}-overlay-hover';
                    }

                    if ($settings['media_overlay'] == 'icon') {
                        $overlay = '<div class="{wk}-overlay-panel {wk}-overlay-background {wk}-overlay-icon {wk}-overlay-' . $settings['overlay_animation'] . '"></div>' . $overlay;
                    }

                    if ($media2) {
                        $overlay = $media2 . $overlay;
                    }

                }

                if ($socials && $settings['media_overlay'] == 'social-buttons') {

                    $overlay  = '<div class="{wk}-overlay-panel {wk}-overlay-background {wk}-overlay-' . $settings['overlay_animation'] . ' {wk}-flex {wk}-flex-center {wk}-flex-middle {wk}-text-center"><div>';
                    $overlay .= '<div class="{wk}-grid {wk}-grid-small" data-{wk}-grid-margin>' . $socials . '</div>';
                    $overlay .= '</div></div>';

                    $overlay_hover = !$settings['panel_link'] ? ' {wk}-overlay-hover' : '';
                }

                if ($overlay || ($settings['panel_link'] && $settings['media_animation'] != 'none')) {
                    $media  = '<div class="{wk}-overlay' . $overlay_hover . ' ' . $border . '">' . $media . $overlay . '</div>';
                }

                // Filter
                $filter = '';
                if ($item['tags'] && $settings['filter'] != 'none') {
                    $filter = ' data-{wk}-filter="' . implode(',', $item['tags']) . '"';
                }

            ?>

            <li<?php echo $filter; ?>>

                <div class="gm_item <?php echo $panel; ?><?php echo $panel_hover; ?> {wk}-text-<?php echo $settings['text_align']; ?>">

                    <?php if ($item['link'] && $settings['panel_link']) : ?>
                    <a class="gm_link-full {wk}-position-cover {wk}-position-z-index" href="<?php echo $item->escape('link'); ?>"<?php echo $link_target; ?>></a>
                    <?php endif; ?>

                    <?php if ($item['badge'] && $settings['badge'] && $settings['badge_position'] == 'panel') : ?>
                    <div class="{wk}-panel-badge <?php echo $badge_style; ?>"><?php echo $item['badge']; ?></div>
                    <?php endif; ?>

                    <?php if ($item['media'] && $settings['media'] && in_array($settings['media_align'], array('teaser', 'top'))) : ?>
                    <div class="gm_media {wk}-text-center <?php echo (($settings['media_align'] == 'teaser') ? '{wk}-panel-teaser' : '{wk}-margin {wk}-margin-top-remove'); ?>"><?php echo $media; ?></div>
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

                    <?php if ($item['media'] && $settings['media'] && $settings['media_align'] == 'bottom') : ?>
                    <div class="gm_media {wk}-text-center"><?php echo $media; ?></div>
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

            </li>

        <?php endforeach; ?>
        </ul>

        <?php if ($settings['slidenav'] == 'above') : ?>
        <a href="#" class="{wk}-slidenav <?php if ($settings['slidenav_contrast']) echo '{wk}-slidenav-contrast'; ?> {wk}-slidenav-previous {wk}-hidden-touch" data-{wk}-slideset-item="previous"></a>
        <a href="#" class="{wk}-slidenav <?php if ($settings['slidenav_contrast']) echo '{wk}-slidenav-contrast'; ?> {wk}-slidenav-next {wk}-hidden-touch" data-{wk}-slideset-item="next"></a>
        <?php endif ?>

    </div>

    <?php if ($settings['slidenav'] == 'bottom') : ?>
    <div class="{wk}-flex {wk}-flex-<?php echo $settings['slidenav_align']; ?> {wk}-margin-top">
        <div class="{wk}-grid {wk}-grid-small">
            <div><a href="#" class="{wk}-slidenav {wk}-slidenav-previous" data-{wk}-slideset-item="previous"></a></div>
            <div><a href="#" class="{wk}-slidenav {wk}-slidenav-next" data-{wk}-slideset-item="next"></a></div>
        </div>
    </div>
    <?php endif ?>

    <?php if ($settings['nav']) : ?>
    <ul class="{wk}-slideset-nav {wk}-dotnav {wk}-flex-center {wk}-margin-top-remove {wk}-margin-bottom-remove"></ul>
    <?php endif ?>

    <?php if ($tags && $settings['filter'] != 'none' && $settings['filter_position'] == 'bottom') : ?>
    <?php echo $this->render('plugins/widgets/' . $widget->getConfig('name')  . '/views/_filter.php', compact('items', 'settings', 'tags')); ?>
    <?php endif; ?>

</div>
