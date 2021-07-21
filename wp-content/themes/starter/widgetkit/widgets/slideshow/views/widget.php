<?php

// JS Options
$options = array();
$options[] = ($settings['animation'] != 'fade') ? 'animation: \'' . $settings['animation'] . '\'' : '';
$options[] = ($settings['duration'] != '500') ? 'duration: ' . $settings['duration'] : '';
$options[] = ($settings['slices'] != '15') ? 'slices: ' . $settings['slices'] : '';
$options[] = ($settings['autoplay']) ? 'autoplay: true ' : '';
$options[] = ($settings['interval'] != '7000') ? 'autoplayInterval: ' . $settings['interval'] : '';
$options[] = ($settings['autoplay_pause']) ? '' : 'pauseOnHover: false';
if ($settings['kenburns'] && $settings['kenburns_duration']) {
    $kenburns_animation = ($settings['kenburns_animation']) ? ', kenburnsanimations: \'' . $settings['kenburns_animation'] . '\'' : '';
    $options[] = 'kenburns: \'' . $settings['kenburns_duration'] . 's\'' . $kenburns_animation;
}

$options = '{'.implode(',', array_filter($options)).'}';



// Content Width

$content_width = ' {wk}-width-'.$settings['content_width'];
$content_width .= $settings['content_width_small'] ? ' {wk}-width-small-'.$settings['content_width_small'] : '';
$content_width .= $settings['content_width_medium'] ? ' {wk}-width-medium-'.$settings['content_width_medium'] : '';
$content_width .= $settings['content_width_large'] ? ' {wk}-width-large-'.$settings['content_width_large'] : '';
$content_width .= $settings['content_width_xlarge'] ? ' {wk}-width-large-'.$settings['content_width_xlarge'] : '';



// Overlay Position

$overlay_position = ' {wk}-flex';

switch ( $settings['overlay_position'] ) {
    case 'top':
        $overlay_position .= ' {wk}-flex-top {wk}-flex-center';
        break;
    case 'top-left':
        $overlay_position .= ' {wk}-flex-top {wk}-flex-left';
        break;
    case 'top-right':
        $overlay_position .= ' {wk}-flex-top {wk}-flex-right';
        break;
    case 'center':
        $overlay_position .= ' {wk}-flex-middle {wk}-flex-center';
        break;
    case 'center-left':
        $overlay_position .= ' {wk}-flex-middle {wk}-flex-left';
        break;
    case 'center-right':
        $overlay_position .= ' {wk}-flex-middle {wk}-flex-right';
        break;
    case 'bottom':
        $overlay_position .= ' {wk}-flex-bottom {wk}-flex-center';
        break;
    case 'bottom-left':
        $overlay_position .= ' {wk}-flex-bottom {wk}-flex-left';
        break;
    case 'bottom-right':
        $overlay_position .= ' {wk}-flex-bottom {wk}-flex-right';
        break;
}



// Overlay

$overlay = '{wk}-overlay-panel';

if ( $settings['fullwidth'] ) {
	
	$overlay .= $settings['overlay_out_offset'] ? ' gm_overlay-inner-vetical-offset' : ' {wk}-padding-remove';
}


else {
	
	$overlay .= $settings['overlay_out_offset'] ? ' gm_overlay-inner-offset' : ' {wk}-padding-remove';
	$overlay .= !$settings['overlay_full'] ? $overlay_position : '';
}


if ( $settings['overlay_animation'] == 'slide' && !$settings['overlay_full'] ) { $overlay .= ' {wk}-overlay-slide-' . $settings['overlay_position']; }
else { $overlay .= ' {wk}-overlay-fade'; }

if ( $settings['overlay_full'] && $settings['overlay_background'] ) { $overlay .= ' {wk}-overlay-background'; }



// Overlay Container

$overlay_container = '';
$overlay_container .= $settings['fullwidth'] ? 'uk-height-1-1 uk-container uk-container-center' . $overlay_position : $content_width;
$overlay_container .= $settings['overlay_full'] || $settings['overlay_stretch'] ? ' uk-height-1-1' : '';


// Overlay Inner

$overlay_inner = '{wk}-flex {wk}-flex-middle';
$overlay_inner .= $settings['fullwidth'] ? $content_width : '';
$overlay_inner .= $settings['overlay_full'] || $settings['overlay_stretch'] ? ' uk-height-1-1' : '';
$overlay_inner .= !$settings['overlay_full'] && $settings['overlay_background'] ? ' {wk}-overlay-background' : '';
$overlay_inner .= $settings['overlay_inn_offset'] ? ' gm_overlay-inner-offset' : '';



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

// Content Align
switch ($settings['text_align']) {
    case 'left':
        $text_align = ' uk-text-left';
        break;
    case 'center':
        $text_align = ' uk-text-center';
        break;
    case 'right':
        $text_align = ' uk-text-right';
        break;
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
        break;
    case 'text-primary':
        $badge_style  = '{wk}-text-primary';
        break;
}

// Position Relative
if ($settings['slidenav'] == 'default') {
    $position_relative = '{wk}-slidenav-position';
} else {
    $position_relative = '{wk}-position-relative';
}


?>

<div class="gm_slideshow <?php echo $settings['class']; ?>" data-{wk}-slideshow="<?php echo $options; ?>">

    <div class="gm_slideshow-slides <?php echo $position_relative; ?>">

        <ul class="{wk}-slideshow<?php if ($settings['fullscreen']) echo ' {wk}-slideshow-fullscreen'; ?><?php if ($settings['overlay']) echo ' {wk}-overlay-active'; ?><?php echo $text_align; ?>" style="min-height: <?php echo $settings['min_height']; ?>px;">
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

                // Media Type
                $attrs  = array('class' => '');

                if ($item->type('media') == 'image' || $item['its_content']) {
                    if( $item['image-alt'] ) {
				        $attrs['alt'] = strip_tags($item['image-alt']);
			        }
			        
			        else {
		            	$attrs['alt'] = strip_tags($item['title']);
		            }
                }

                if ($item->type('media') == 'video') {
                    $attrs['autoplay'] = true;
                    $attrs['loop']     = true;
                    $attrs['muted']    = true;
                    $attrs['class']   .= '{wk}-cover-object {wk}-position-absolute';
                    $attrs['class']   .= ($item['media.poster']) ? ' {wk}-hidden-touch' : '';
                }

                if ( $item->type('media') == 'image' || $item['its_content'] ) {
	        
		            $media_id = $item['its_content'] ? $item['media'] : attachment_url_to_postid( get_home_url() . '/' . $item['media'] );
					$media    = wp_get_attachment_image( $media_id, $settings['image_size'], false, $attrs );
					
		        }
		        
		        else { $media = $item->media('media', $attrs);  }

            ?>

            <li class="gm_item <?php echo $item['class']; ?>" style="min-height: <?php echo $settings['min_height']; ?>px;">
				
                <?php if ($item['media'] && $settings['media']) : ?>

                    <?php echo $media; ?>

                    <?php if ($item['media.poster']) : ?>
                    <div class="gm_media {wk}-cover-background {wk}-position-cover {wk}-hidden-notouch" style="background-image: url(<?php echo $item['media.poster'] ?>);"></div>
                    <?php endif ?>

                    <?php if ($settings['overlay'] && (($item['title'] && $settings['title']) || ($item['content'] && $settings['content']) || ($item['link'] && $settings['link']))) : ?>
                    <div class="gm_overlay <?php echo $overlay; ?>">
                        <div class="gm_overlay-container <?php echo $overlay_container; ?>">
	                        <div class="gm_overlay-inner <?php echo $overlay_inner; ?>">
								<div class="gm_overlay-inner-2 uk-width-1-1">
			                        
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
			
			                        <?php if ($item['link'] && $settings['link']) : ?>
				                    <div class="gm_link {wk}-margin-top-medium">
					                    <a<?php if($link_style) echo ' class="' . $link_style .' '. $link_size. '"'; ?> href="<?php echo $item->escape('link'); ?>"<?php echo $link_target; ?>>
						                    <?php echo $app['translator']->trans($settings['link_text']); ?>
						                </a>
				                    </div>
				                    <?php endif; ?>
								</div>
	                        </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if ($item['link'] && $settings['link_media']) : ?>
                    <a href="<?php echo $item->escape('link'); ?>" class="{wk}-position-cover" <?php echo $link_target; ?>></a>
                    <?php endif; ?>

                <?php elseif(($item['title'] && $settings['title']) || ($item['content'] && $settings['content'])) : ?>
					
					<?php if ( $settings['fullwidth'] ): ?>
					<div class="uk-container uk-container-center">
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
	
	                    <?php if ($item['link'] && $settings['link']) : ?>
	                    <div class="gm_link {wk}-margin-top-medium">
		                    <a<?php if($link_style) echo ' class="' . $link_style .' '. $link_size. '"'; ?> href="<?php echo $item->escape('link'); ?>"<?php echo $link_target; ?>>
			                    <?php echo $app['translator']->trans($settings['link_text']); ?>
			                </a>
	                    </div>
	                    <?php endif; ?>
                    
                    <?php if ( $settings['fullwidth'] ): ?>
					</div>
					<?php endif; ?>

                <?php endif; ?>
            </li>

        <?php endforeach; ?>
        </ul>

        <?php if (in_array($settings['slidenav'], array('top-left', 'top-right', 'bottom-left', 'bottom-right'))) : ?>
        <div class="gm_slideshow-arrows {wk}-position-<?php echo $settings['slidenav']; ?> {wk}-margin-small {wk}-margin-left-small {wk}-margin-right-small">
            <div class="{wk}-grid {wk}-grid-collapse">
                <div><a href="#" class="{wk}-slidenav <?php if ($settings['nav_contrast']) echo '{wk}-slidenav-contrast'; ?> {wk}-slidenav-previous" data-{wk}-slideshow-item="previous"></a></div>
                <div><a href="#" class="{wk}-slidenav <?php if ($settings['nav_contrast']) echo '{wk}-slidenav-contrast'; ?> {wk}-slidenav-next" data-{wk}-slideshow-item="next"></a></div>
            </div>
        </div>
        <?php elseif ($settings['slidenav'] == 'default') : ?>
        <a href="#" class="{wk}-slidenav <?php if ($settings['nav_contrast']) echo '{wk}-slidenav-contrast'; ?> {wk}-slidenav-previous {wk}-hidden-touch" data-{wk}-slideshow-item="previous"></a>
        <a href="#" class="{wk}-slidenav <?php if ($settings['nav_contrast']) echo '{wk}-slidenav-contrast'; ?> {wk}-slidenav-next {wk}-hidden-touch" data-{wk}-slideshow-item="next"></a>
        <?php endif ?>

        <?php if ($settings['nav_overlay'] && ($settings['nav'] != 'none')) : ?>
        <div class="gm_sldieshow-nav {wk}-overlay-panel {wk}-overlay-bottom">
            <?php echo $this->render('plugins/widgets/' . $widget->getConfig('name')  . '/views/_nav.php', compact('items', 'settings')); ?>
        </div>
        <?php endif ?>

    </div>

    <?php if (!$settings['nav_overlay'] && ($settings['nav'] != 'none')) : ?>
    <div class="gm_sldieshow-nav {wk}-margin">
        <?php echo $this->render('plugins/widgets/' . $widget->getConfig('name')  . '/views/_nav.php', compact('items', 'settings')); ?>
    </div>
    <?php endif ?>

</div>
