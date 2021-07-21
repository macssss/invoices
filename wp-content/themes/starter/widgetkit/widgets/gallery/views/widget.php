<?php

// Id
$settings['id'] = substr(uniqid(), -3);

// Grid
$grid  = '{wk}-grid-width-1-'.$settings['columns'];
$grid .= $settings['columns_small'] ? ' {wk}-grid-width-small-1-'.$settings['columns_small'] : '';
$grid .= $settings['columns_medium'] ? ' {wk}-grid-width-medium-1-'.$settings['columns_medium'] : '';
$grid .= $settings['columns_large'] ? ' {wk}-grid-width-large-1-'.$settings['columns_large'] : '';
$grid .= $settings['columns_xlarge'] ? ' {wk}-grid-width-xlarge-1-'.$settings['columns_xlarge'] : '';

if ($settings['grid'] == 'dynamic') {

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

    // Filter Nav
    $tabs_center = '';
    if ($settings['filter'] == 'tabs') {

        $filter  = '{wk}-tab';
        $filter .= ($settings['filter_align'] == 'right') ? ' {wk}-tab-flip' : '';
        $filter .= ($settings['filter_align'] != 'center') ? ' {wk}-margin' : '';
        $tabs_center  = ($settings['filter_align'] == 'center') ? '{wk}-tab-center {wk}-margin' : '';

    } elseif ($settings['filter'] != 'none') {

        switch ($settings['filter']) {
            case 'text':
                $filter = '{wk}-subnav';
                break;
            case 'lines':
                $filter = '{wk}-subnav {wk}-subnav-line';
                break;
            case 'nav':
                $filter = '{wk}-subnav {wk}-subnav-pill';
                break;
        }

        $filter .= ' {wk}-flex-' . $settings['filter_align'];
    }

    // JS Options
    $options   = array();
    $options[] = ($settings['gutter_dynamic']) ? 'gutter: \'' . $settings['gutter_v_dynamic'] . ' ' . $settings['gutter_dynamic'] . '\'' : '';
    $options[] = ($settings['filter'] != 'none') ? 'controls: \'#wk-' . $settings['id'] . '\'' : '';
    $options[] = (count($tags) && $settings['filter'] != 'none' && !$settings['filter_all']) ? 'filter: \'' . $tags[0] . '\'': '';
    $options   = implode(',', array_filter($options));

    $grid_js   = $options ? 'data-{wk}-grid="{' . $options . '}"' : 'data-{wk}-grid';

} else {
    $grid .= ' {wk}-grid {wk}-grid-match';
    $grid .= in_array($settings['gutter'], array('collapse','large','medium','small')) ? ' {wk}-grid-'.$settings['gutter'] : '' ;
    $grid .= in_array($settings['gutter_v'], array('collapse','large','medium','default','small')) ? ' {wk}-grid-vertical-'.$settings['gutter_v'] : '' ;
    $grid_js = 'data-{wk}-grid-match="{target:\'> div > .{wk}-panel\', row:true}" data-{wk}-grid-margin';

    if ($settings['parallax']) {
        $grid_js .= ' data-{wk}-grid-parallax' . ($settings['parallax_translate'] ? '="translate: ' . intval($settings['parallax_translate']) . '"' : '');
    }
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

// Content Align
switch ($settings['text_align']) {
    case 'left':
        $text_align = 'uk-text-left';
        $text_align_flex = '';
        break;
    case 'center':
        $text_align = 'uk-text-center';
        $text_align_flex = 'uk-flex-center';
        break;
    case 'right':
        $text_align = 'uk-text-right';
        $text_align_flex = 'uk-flex-right';
        break;
    default:
        $text_align = '';
        $text_align_flex = '';
}


// Lightbox Title Size
switch ($settings['lightbox_title_size']) {
    case 'panel':
        $lightbox_title_size = '{wk}-h3';
        break;
    case 'large':
        $lightbox_title_size = '{wk}-heading-large';
        break;
    default:
        $lightbox_title_size = '{wk}-' . $settings['lightbox_title_size'];
}

if ( $settings['lightbox_title_class'] ) { $lightbox_title_size .= ' ' . $settings['lightbox_title_class']; }


// Lightbox Subtitle Size
switch ($settings['lightbox_subtitle_size']) {
    case 'panel':
        $lightbox_subtitle_size = '{wk}-h4';
        break;
    case 'large':
        $lightbox_subtitle_size = '{wk}-heading-large';
        break;
    default:
        $lightbox_subtitle_size = '{wk}-' . $settings['lightbox_subtitle_size'];
}

if ( $settings['lightbox_subtitle_class'] ) { $lightbox_subtitle_size .= ' ' . $settings['lightbox_subtitle_class']; }


// Lightbox Titles
if ( $settings['lightbox_titles_reverse'] ) {
	
	$lightbox_title_size .= ' {wk}-margin-remove';
	$lightbox_subtitle_size .= ' {wk}-margin-remove';
}


// Lightbox Content Size
switch ($settings['lightbox_content_size']) {
	case 'small':
        $lightbox_content_size = 'uk-text-small';
        break;
    case 'large':
        $lightbox_content_size = 'uk-text-large';
        break;
    default:
        $lightbox_content_size = '';
}

// Lightbox Content Align
switch ($settings['lightbox_text_align']) {
    case 'left':
        $lightbox_text_align = 'uk-text-left';
        $lightbox_text_align_flex = '';
        break;
    case 'center':
        $lightbox_text_align = 'uk-text-center';
        $lightbox_text_align_flex = 'uk-flex-center';
        break;
    case 'right':
        $lightbox_text_align = 'uk-text-right';
        $lightbox_text_align_flex = 'uk-flex-right';
        break;
    default:
        $lightbox_text_align = '';
        $lightbox_text_align_flex = '';
}

// Button: Link
switch ($settings['link_style']) {
    case 'icon-small':
        $button_link = '{wk}-icon-small';
        break;
    case 'icon-medium':
        $button_link = '{wk}-icon-medium';
        break;
    case 'icon-large':
        $button_link = '{wk}-icon-large';
        break;
    case 'icon-button':
        $button_link = '{wk}-icon-button';
        break;
    case 'button':
        $button_link = '{wk}-button';
        break;
    case 'secondary':
        $button_link = '{wk}-button {wk}-button-secondary';
        break;
    case 'dark':
        $button_link = '{wk}-button {wk}-button-dark';
        break;
    case 'primary':
        $button_link = '{wk}-button {wk}-button-primary';
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
        $button_link = '{wk}-button {wk}-button-link';
        break;
    default:
        $button_link = '';
}

// Button: Link Size

switch ($settings['link_size']) {
    case 'mini':
        $button_link_size = '{wk}-button-mini';
        break;
    case 'small':
        $button_link_size = '{wk}-button-small';
        break;
    case 'large':
        $button_link_size = '{wk}-button-large';
        break;
    default:
        $button_link_size = '';
}

if ( $button_link == '' ) { $button_link_size = ''; }

switch ($settings['link_style']) {
    case 'icon':
    case 'icon-small':
    case 'icon-medium':
    case 'icon-large':
    case 'icon-button':
        $button_link .= ' {wk}-icon-' . $settings['link_icon'];
        $settings['link_text'] = '';
        $button_link_size = '';
        break;
}

// Button: Lightbox
switch ($settings['lightbox_style']) {
    case 'icon-small':
        $button_lightbox = '{wk}-icon-small';
        break;
    case 'icon-medium':
        $button_lightbox = '{wk}-icon-medium';
        break;
    case 'icon-large':
        $button_lightbox = '{wk}-icon-large';
        break;
    case 'icon-button':
        $button_lightbox = '{wk}-icon-button';
        break;
    case 'button':
        $button_lightbox = '{wk}-button';
        break;
    case 'secondary':
        $button_lightbox = '{wk}-button {wk}-button-secondary';
        break;
    case 'dark':
        $button_lightbox = '{wk}-button {wk}-button-dark';
        break;
    case 'primary':
        $button_lightbox = '{wk}-button {wk}-button-primary';
        break;
    case 'button-link':
        $button_lightbox = '{wk}-button {wk}-button-link';
        break;
    default:
        $button_lightbox = '';
}


// Button: Link Size

switch ($settings['lightbox_size']) {
    case 'mini':
        $button_lightbox_size = '{wk}-button-mini';
        break;
    case 'small':
        $button_lightbox_size = '{wk}-button-small';
        break;
    case 'large':
        $button_lightbox_size = '{wk}-button-large';
        break;
    default:
        $button_lightbox_size = '';
}

if ( $button_lightbox == '' ) { $button_lightbox_size = ''; }

switch ($settings['lightbox_style']) {
    case 'icon':
    case 'icon-small':
    case 'icon-medium':
    case 'icon-large':
    case 'icon-button':
        $button_lightbox .= ' {wk}-icon-' . $settings['lightbox_icon'];
        $settings['lightbox_text'] = '';
        $button_lightbox_size = '';
        break;
}



// Media Border
$border = ($settings['media_border'] != 'none') ? '{wk}-border-' . $settings['media_border'] : '';

// Animation
$animation = ($settings['animation'] != 'none') ? ' data-{wk}-scrollspy="{cls:\'{wk}-animation-' . $settings['animation'] . ' {wk}-invisible\', target:\'> div > .{wk}-panel\', delay:' . $settings['animation_delay'] . '}"' : '';


// Force overlay style
if (!in_array($settings['overlay'], array('default', 'center', 'bottom'))) {
    $settings['overlay'] = 'default';
}

?>

<?php if (isset($tags) && $tags && $settings['filter'] != 'none') : ?>

    <?php if ($tabs_center) : ?>
    <div class="<?php echo $tabs_center; ?>">
    <?php endif ?>

    <ul id="wk-<?php echo $settings['id']; ?>" class="<?php echo $filter; ?>"<?php if ($settings['filter'] == 'tabs') echo ' data-{wk}-tab'?>>

        <?php if ($settings['filter_all']) : ?>
        <li class="{wk}-active" data-{wk}-filter=""><a href="#"><?php echo $app['translator']->trans('All'); ?></a></li>
        <?php endif ?>

        <?php foreach ($tags as $i => $tag) : ?>
        <li data-{wk}-filter="<?php echo $tag; ?>"><a href="#"><?php echo ucwords($tag); ?></a></li>
        <?php endforeach; ?>

    </ul>

    <?php if ($tabs_center) : ?>
    </div>
    <?php endif ?>

<?php endif; ?>

<div id="wk-grid<?php echo $settings['id']; ?>" class="gm_gallery <?php echo $grid; ?> <?php echo $text_align; ?> <?php echo $settings['class']; ?>" <?php echo $grid_js; ?> <?php echo $animation; ?>>

<?php foreach ($items as $index => $item) : ?>
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
	    
	    if ($item['media']) :

	        // Second Image as Thumbnail Overlay
	        $thumbnail_overlay = '';
	        foreach ($item as $field) {
	            if ($field != 'media' && $item->type($field) == 'image') {
	                $thumbnail_overlay = ($settings['overlay'] == 'default' && $settings['overlay_image']) ? $field : '';
	                break;
	            }
	        }
	
	        // Thumbnails
	        $thumbnail = '';
	
	        if (($item->type('media') == 'image' || $item['its_content'] || $item['media.poster'])) {
	
	            $attrs = array('class' => '');
	            
	            if( $item['image_alt'] ) {
			        $attrs['alt'] = strip_tags($item['image_alt']);
		        }
		        
		        else {
	            	$attrs['alt'] = strip_tags($item['title']);
	            }
	
	            $attrs['class'] .= ($settings['image_animation'] != 'none' && !$thumbnail_overlay) ? '{wk}-overlay-' . $settings['image_animation'] : '';

                if(($item->type('media') == 'image' || $item['its_content']) && $settings['gutter_dynamic']){
                    // adding the size of the original image to the attributes, so that on load the canvas can be created ( see script at the end of the file ).
                    if ($img  = $app['image']->create($item->get('media'))) {
                        $size = getimagesize($img->getPathName());
                        $width  = $size[0];
                        $height = $size[1];
                        $attrs['width'] = $width;
                        $attrs['height'] = $height;
                    }
                }
				
				
				if ( $item->type('media') == 'image' || $item['its_content'] ) {
				
					$media_id = $item['its_content'] ? $item['media'] : attachment_url_to_postid( get_home_url() . '/' . $item['media'] );
				}
				
				else {
					
					$media_id = $item['its_content'] ? $item['media.poster'] : attachment_url_to_postid( get_home_url() . '/' . $item['media.poster'] );
				}
				
				$thumbnail = wp_get_attachment_image( $media_id, $settings['image_size'], false, $attrs );
	        }
	
	        // Lightbox
	        $lightbox = '';
	        
	        if ($settings['lightbox']) {
	            if ($item->type($field) == 'image') {
		            
		            $lightbox_id = $item['its_content'] ? $item['media'] : attachment_url_to_postid( get_home_url() . '/' . $item['media'] );
		            $lightbox = 'href="' . wp_get_attachment_image_src( $lightbox_id, $settings['lightbox_image_size'] )[0] . '" data-lightbox-type="image"';
		            
	            } else {
	                $lightbox = 'href="' . $item['media'] . '"';
	            }
	        }
	
	        // Second Image as Overlay
	        if ($thumbnail_overlay) {
	
	            $attrs['class'] .= ' {wk}-overlay-panel {wk}-overlay-image';
	            $attrs['class'] .= ($settings['image_animation'] != 'none') ? ' {wk}-overlay-' . $settings['image_animation'] : '';
				
				$media2_id = attachment_url_to_postid( get_home_url() . '/' . $item['media2'] );
				$thumbnail_overlay = wp_get_attachment_image( $media2_id, $settings['image_size'], false, $attrs );
	        }
	
	        // Lightbox Caption
	        $lightbox_caption = '';
	        switch ($settings['lightbox_caption']) {
	            case 'title':
	                $lightbox_caption = $item['title'];
	                break;
	            case 'content':
	                $lightbox_caption = $item['lightbox_content'] ? $item['lightbox_content'] : $item['content'];
	                break;
	        }
	        $lightbox_caption = $lightbox_caption ? 'title="' . strip_tags($lightbox_caption) .'"' : '';
	
	        // Filter
	        $filter = '';
	        if ($item['tags'] && $settings['grid'] == 'dynamic' && $settings['filter'] != 'none') {
	            $filter = ' data-{wk}-filter="' . implode(',', $item['tags']) . '"';
	        }
        

    ?>

    <div class="gm_item-wrap<?php echo $item['class'] ? ' gm_item-wrap--' . $item['class'] : ''; ?>"<?php echo $filter; ?>>
    <?php echo $this->render('plugins/widgets/' . $widget->getConfig('name')  . '/views/_' . $settings['overlay'] . '.php', compact('item', 'settings', 'title_size', 'subtitle_size', 'content_size', 'text_align_flex', 'border', 'thumbnail', 'thumbnail_overlay', 'lightbox', 'lightbox_caption', 'button_link', 'button_link_size', 'button_lightbox', 'button_lightbox_size', 'link_target', 'index', 'width', 'height')); ?>
    </div>

    <?php endif; ?>
<?php endforeach; ?>

</div>

<?php if ($settings['lightbox'] === 'slideshow') : ?>
<div id="wk-3<?php echo $settings['id']; ?>" class="gm_gallery-modal {wk}-modal <?php echo $settings['class']; ?>">
    <div class="{wk}-modal-dialog {wk}-modal-dialog-blank">

        <button class="{wk}-modal-close {wk}-close" type="button"></button>

        <div class="{wk}-grid {wk}-grid-collapse">
            <div class="{wk}-width-medium-1-2 {wk}-text-center">

                <div class="gm_media {wk}-slidenav-position" data-{wk}-slideshow data-{wk}-check-display>
                    <ul class="{wk}-slideshow">
                        <?php foreach ($items as $item) :

                            // Media Type
                            $attrs  = array('class' => '');

                            if ($item->type($field) == 'image') {
                                $attrs['alt'] = strip_tags($item['title']);
                            }

                            if ($item->type($field) == 'video') {
                                $attrs['class'] = '{wk}-responsive-width';
                                $attrs['controls'] = true;
                            }

                            if ($item->type($field) == 'iframe') {
                                $attrs['class'] = '{wk}-responsive-width';
                            }
                            

                            if ( $item->type($field) == 'image' ) {
	                            
	                            $media_id = $item['its_content'] ? $item['media'] : attachment_url_to_postid( get_home_url() . '/' . $item['media'] );
								$media = wp_get_attachment_image( $media_id, $settings['lightbox_image_size'], false, $attrs );
								
                            } else {
	                            
                                $media = $item->media('media', $attrs);
                            }

                        ?>

                            <li>
                                <?php echo $media; ?>
                            </li>

                        <?php endforeach; ?>
                    </ul>

                    <a href="#" class="{wk}-slidenav <?php if ($settings['lightbox_nav_contrast']) echo '{wk}-slidenav-contrast'; ?> {wk}-slidenav-previous {wk}-hidden-touch" data-{wk}-slideshow-item="previous"></a>
                    <a href="#" class="{wk}-slidenav <?php if ($settings['lightbox_nav_contrast']) echo '{wk}-slidenav-contrast'; ?> {wk}-slidenav-next {wk}-hidden-touch" data-{wk}-slideshow-item="next"></a>

                </div>
            </div>
            <div class="{wk}-width-medium-1-2 {wk}-flex {wk}-flex-middle {wk}-flex-center">

                <div class="gm_modal-content {wk}-width-1-1 <?php echo $settings['lightbox_content_width'] ? '{wk}-width-xlarge-' . $settings['lightbox_content_width'] : ''; ?>" data-{wk}-slideshow data-{wk}-check-display>
                    <ul class="gm_data {wk}-slideshow <?php echo $lightbox_text_align; ?>">
                        <?php foreach ($items as $item) : ?>
                        <li>
                            
                            <?php if ( ( $item['title'] && $settings['lightbox_title'] ) || ( $item['subtitle'] && $settings['lightbox_subtitle'] ) ) : ?>
				            <div class="gm_title-block">
					            
					            <?php if ($item['subtitle'] && $settings['lightbox_subtitle'] && $settings['lightbox_titles_reverse']) : ?>
					            <h4 class="gm_subtitle <?php echo $lightbox_subtitle_size; ?>">
					                <span><?php echo $item['subtitle']; ?></span>
					            </h4>
					            <?php endif; ?>
					            
					            <?php if ($item['title'] && $settings['lightbox_title']) : ?>
					            <h3 class="gm_title <?php echo $lightbox_title_size; ?>">
					                <span><?php echo $item['title']; ?></span>
					            </h3>
					            <?php endif; ?>
					            
					            <?php if ($item['subtitle'] && $settings['lightbox_subtitle'] && !$settings['lightbox_titles_reverse']) : ?>
					            <h4 class="gm_subtitle <?php echo $lightbox_subtitle_size; ?>">
					                <span><?php echo $item['subtitle']; ?></span>
					            </h4>
					            <?php endif; ?>
					            
				            </div>
				            <?php endif; ?>

                            <?php if ($item['lightbox_content']) : ?>
                            <div class="gm_content <?php echo $lightbox_content_size; ?> {wk}-margin-top-small"><?php echo $item['lightbox_content']; ?></div>
                            <?php elseif ($item['content']) : ?>
                            <div class="gm_content <?php echo $lightbox_content_size; ?> {wk}-margin-top-small"><?php echo $item['content']; ?></div>
                            <?php endif; ?>

                            <?php if ($item['link'] && $settings['link']) : ?>
                            <div class="gm_link {wk}-margin-top-small"><a href="<?php echo $item->escape('link'); ?>" class="<?php echo $button_lightbox; ?> <?php echo $button_lightbox_size; ?>" <?php echo $link_target; ?>><?php echo $app['translator']->trans($settings['link_text']); ?></a></div>
                            <?php endif; ?>

                        </li>
                    <?php endforeach; ?>
                    </ul>

                    <div class="gm_nav {wk}-margin-top">
                        <ul class="{wk}-thumbnav {wk}-margin-bottom-remove <?php echo $lightbox_text_align_flex; ?>">
                        <?php foreach ($items as $i => $item) :

                                // Thumbnails
                                $thumbnail = '';
                                if (($item->type('media') == 'image' || $item['its_content'] || $item['media.poster'])) {
                                    
                                    if ( $item->type('media') == 'image' || $item['its_content'] ) {
									
										$media_id = $item['its_content'] ? $item['media'] : attachment_url_to_postid( get_home_url() . '/' . $item['media'] );
									}
									
									else {
										
										$media_id = $item['its_content'] ? $item['media.poster'] : attachment_url_to_postid( get_home_url() . '/' . $item['media.poster'] );
									}
                                    
                                    $width           = wp_get_attachment_image_src( $media_id, $settings['lightbox_nav_image_size'] )[1] / 2;
                                    $height          = wp_get_attachment_image_src( $media_id, $settings['lightbox_nav_image_size'] )[2] / 2;
									
									$attrs           = array();
                                    $attrs['alt']    = strip_tags($item['title']);
                                    
                                    $thumbnail = wp_get_attachment_image( $media_id, $settings['lightbox_nav_image_size'], false, $attrs );
                                }

                            ?>
                            <li data-{wk}-slideshow-item="<?php echo $i; ?>"><a href="#" style="width: <?php echo $width; ?>px; height: <?php echo $height; ?>px;"><?php echo ($thumbnail) ? $thumbnail : $item['title']; ?></a></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<script>
    (function($){

        var modal      = $('#wk-3<?php echo $settings['id']; ?>'),
            container  = modal.prev(),
            slideshows = modal.find('[data-{wk}-slideshow]'),
            slideshow;

        container.on('click', '[href^="#wk-"][data-{wk}-modal]', function(e) {
            slideshows.each(function(){

                slideshow = $(this).data('slideshow');
                slideshow.show(parseInt(e.target.getAttribute('data-index'), 10));
            });
        });

        modal.on('beforeshow.uk.slideshow', function(e, next) {
            slideshows.not(next.closest('[data-{wk}-slideshow]')[0]).data('slideshow').show(next.index());
        });

    })(jQuery);
</script>
<?php endif; ?>

<script>
(function($){

    // get the images of the gallery and replace it by a canvas of the same size to fix the problem with overlapping images on load.
    $('img[width][height]:not(.{wk}-overlay-panel)', $('#wk-grid<?php echo $settings['id']; ?>')).each(function() {

        var $img = $(this);

        if (this.width == 'auto' || this.height == 'auto' || !$img.is(':visible')) {
            return;
        }

        var $canvas = $('<canvas class="{wk}-responsive-width"></canvas>').attr({width:$img.attr('width'), height:$img.attr('height')}),
            img = new Image,
            release = function() {
                $canvas.remove();
                $img.css('display', '');
                release = function(){};
            };

        $img.css('display', 'none').after($canvas);

        $(img).on('load', function(){ release(); });
        setTimeout(function(){ release(); }, 1000);

        img.src = this.src;

    });

})(jQuery);
</script>
