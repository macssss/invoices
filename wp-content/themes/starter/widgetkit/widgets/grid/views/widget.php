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

// Panel
$panel     = '{wk}-panel';
$panel_alt = '';
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
    case 'sequence1' :
        $panel .= ' {wk}-panel-box';
        $panel_alt = '{wk}-panel {wk}-panel-box {wk}-panel-box-primary';
        break;
    case 'sequence2' :
        $panel .= ' {wk}-panel-box';
        $panel_alt = '{wk}-panel {wk}-panel-box {wk}-panel-box-secondary';
        break;
    case 'sequence3' :
        $panel .= ' {wk}-panel-box {wk}-panel-box-primary';
        $panel_alt = '{wk}-panel {wk}-panel-box {wk}-panel-box-secondary';
        break;
    case 'sequence4' :
        $panel .= ' {wk}-panel-box {wk}-panel-box-secondary';
        $panel_alt = '{wk}-panel {wk}-panel-box {wk}-panel-box-primary';
        break;
}

// Panel Sequence
$panel = array(
    $panel,
    $panel_alt ? $panel_alt : $panel
);

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
$animation = ($settings['animation'] != 'none') ? ' data-{wk}-scrollspy="{cls:\'{wk}-animation-' . $settings['animation'] . ' {wk}-invisible\', target:\'> div > .{wk}-panel\', delay:' . $settings['animation_delay'] . '}"' : '';



?>

<?php if (isset($tags) && $tags && $settings['filter'] != 'none') : ?>
<div class="gm_grid-filter <?php echo $settings['class']; ?>">
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
</div>
<?php endif; ?>

<div id="wk-grid<?php echo $settings['id']; ?>" class="gm_grid <?php echo $grid; ?> {wk}-text-<?php echo $settings['text_align']; ?> <?php echo $settings['class']; ?>" <?php echo $grid_js ?> <?php echo $animation; ?>>

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

        if ($item->type('media') == 'image' || $item['its_content'] ) {
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

                if ($settings['panel'] == 'sequence1') {
                    $panel_hover .= !($i % 2)  ? ' {wk}-panel-box-hover' : ' {wk}-panel-box-primary-hover';
                }
                if ($settings['panel'] == 'sequence2') {
                    $panel_hover .= !($i % 2)  ? ' {wk}-panel-box-hover' : ' {wk}-panel-box-secondary-hover';
                }
                if ($settings['panel'] == 'sequence3') {
                    $panel_hover .= !($i % 2)  ? ' {wk}-panel-box-primary-hover' : ' {wk}-panel-box-secondary-hover';
                }

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
        if ($item['tags'] && $settings['grid'] == 'dynamic' && $settings['filter'] != 'none') {
            $filter = ' data-{wk}-filter="' . implode(',', $item['tags']) . '"';
        }

        // Meta
        $meta = '';
        if ($item['date']) {
            $date = '<time datetime="'.$item['date'].'">'.$app['date']->format($item['date'], $settings['date_format']).'</time>';
            if ($item['author']) {
                $meta = $app['translator']->trans('Written by %author% on %date%',  array('%author%' => $item['author'], '%date%' => $date));
            } else {
                $meta = $app['translator']->trans('Written on %date%',  array('%date%' => $date));
            }
        } elseif ($item['author']) {
            $meta = $app['translator']->trans('Written by %author%',  array('%author%' => $item['author']));
        }

        if ($item['categories']) {

            $categories = array();
            foreach ($item['categories'] as $category => $url) {
                $categories[] = '<a href="'.$url.'">'.$category.'</a>';
            }
            $categories = implode(', ', array_filter($categories));

            $meta .= ($meta) ? '. ' : '';
            $meta .= $app['translator']->trans('Posted in %categories%',  array('%categories%' => $categories));

        }
        
        

    ?>

    <div class="gm_item-wrap<?php echo $item['class'] ? ' gm_item-wrap--' . $item['class'] : ''; ?>"<?php echo $filter; ?>>
        <div class="gm_item <?php echo $panel[$i % 2]; ?><?php echo $panel_hover; ?><?php if ($settings['animation'] != 'none') echo ' {wk}-invisible'; ?> <?php echo $item['class']; ?>">
			
            <?php if ($item['link'] && $settings['panel_link']) : ?>
            <a class="gm_link-full {wk}-position-cover {wk}-position-z-index" href="<?php echo $item->escape('link'); ?>"<?php echo $link_target; ?>></a>
            <?php endif; ?>

            <?php if ($item['badge'] && $settings['badge'] && $settings['badge_position'] == 'panel') : ?>
            <div class="{wk}-panel-badge <?php echo $badge_style; ?>"><?php echo $item['badge']; ?></div>
            <?php endif; ?>

            <?php if ($item['media'] && $settings['media'] && in_array($settings['media_align'], array('teaser', 'top'))) : ?>
            <div class="gm_media {wk}-text-center <?php echo (($settings['media_align'] == 'teaser') ? '{wk}-panel-teaser' : '{wk}-margin {wk}-margin-top-remove'); ?>"><?php echo $media; ?></div>
            <?php endif; ?>

            <?php if ($item['media'] && $settings['media'] && in_array($settings['media_align'], array('left', 'right'))) : ?>
            <div class="gm_grid {wk}-grid <?php echo $content_align; ?>" data-{wk}-grid-margin>
                <div class="gm_media <?php echo $media_width ?><?php if ($settings['media_align'] == 'right') echo ' {wk}-float-right {wk}-flex-order-last-' . $settings['media_breakpoint'] ?>">
                    <?php echo $media; ?>
                </div>
                <div class="gm_data <?php echo $content_width ?>">
                    <div class="gm_data-panel {wk}-panel">
            <?php endif; ?>
            
            <?php if ($item['icon']) : ?>
            <div class="gm_icon">
	            <?php echo $item['icon']; ?>
            </div>
            <?php endif; ?>
            
            <?php if ($item['count-value']) : ?>
				<h5 class="gm_counter uk-<?php echo $settings['count_size']; ?> uk-flex uk-flex-wrap uk-flex-middle {wk}-flex-<?php echo $settings['text_align']?> <?php echo $settings['count_class']; ?>" data-counter-speed="<?php echo $settings['count_speed']; ?>">
					
					<span class="gm_count-before">
						<?php if ($item['count-before']) : ?>
							<?php echo $item['count-before']; ?>
						
						<?php elseif ($settings['count_before']) : ?>
							<?php echo $settings['count_before']; ?>
							
						<?php endif; ?>
					</span>
					
					<span class="gm_count"><?php echo $item['count-value']; ?></span>
					
					<span class="gm_count-after">
						<?php if ($item['count-after']) : ?>
							<?php echo $item['count-after']; ?>
						
						<?php elseif ($settings['count_after']) : ?>
							<?php echo $settings['count_after']; ?>
							
						<?php endif; ?>
					</span>
				</h5>
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

            <?php if ($meta) : ?>
            <div class="gm_meta {wk}-article-meta"><?php echo $meta; ?></div>
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

            <?php if ($item['media'] && $settings['media'] && in_array($settings['media_align'], array('left', 'right'))) : ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

        </div>
    </div>

<?php endforeach; ?>

</div>

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
