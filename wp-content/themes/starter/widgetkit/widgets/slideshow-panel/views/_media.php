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

// Slidenav Position Relative
if ($settings['slidenav'] == 'default') {
    $position_relative = '{wk}-slidenav-position';
} else {
    $position_relative = '{wk}-position-relative';
}

// Nav
$nav = '{wk}-position-bottom {wk}-margin-bottom-small';

switch ($settings['nav_align']) {
    case 'left':
        $nav .= ' {wk}-margin-left-small';
        break;
    case 'right':
        $nav .= ' {wk}-margin-right-small';
        break;
    case 'center':
    case 'justify':
        $nav .= ' {wk}-margin-left-small {wk}-margin-right-small';
        break;
}

?>

<div class="<?php echo $position_relative; ?>" data-{wk}-slideshow="<?php echo $options; ?>">

    <ul class="{wk}-slideshow<?php if ($settings['fullscreen']) echo ' {wk}-slideshow-fullscreen'; ?>" style="min-height: <?php echo $settings['min_height']; ?>px;">
        <?php foreach ($items as $item) :

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

        ?>

            <li style="min-height: <?php echo $settings['min_height']; ?>px;">
            	<?php if ($item['link']) : ?>
	            <a class="gm_link-full {wk}-position-cover {wk}-position-z-index" href="<?php echo $item->escape('link'); ?>"<?php echo $link_target; ?>></a>
	            <?php endif; ?>
                <?php echo $media; ?>
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
    <div class="gm_sldieshow-nav <?php echo $nav; ?>">
        <?php echo $this->render('plugins/widgets/' . $widget->getConfig('name')  . '/views/_nav.php', compact('items', 'settings')); ?>
    </div>
    <?php endif ?>

</div>
