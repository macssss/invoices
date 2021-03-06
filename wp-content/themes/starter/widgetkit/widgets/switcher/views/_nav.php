<?php

// Nav
$tabs_center = '';
$nav_item = '';

if ($settings['nav'] == 'tabs') {

    // Positon
    $nav = ($settings['position'] != 'top') ? '{wk}-tab {wk}-tab-'. $settings['position'] : '{wk}-tab';

    // Alignment
    if ($settings['position'] == 'top' || $settings['position'] == 'bottom') {

        // Right
        $nav .= ($settings['alignment'] == 'right') ? ' {wk}-tab-flip' : '';

        // Justify
        $nav .= ($settings['alignment'] == 'justify') ? ' {wk}-tab-grid' : '';
        $nav_item = ($settings['alignment'] == 'justify') ? ' class="{wk}-width-1-' . count($items) . '"' : '';

        // Center
        if ($settings['alignment'] == 'center') {
            $tabs_center = '{wk}-tab-center';
            if ($settings['position'] == 'bottom') {
                $tabs_center .= ' {wk}-tab-center-bottom';
            }
        }

    }

    $javascript = 'tab';

} else {

    if ($settings['position'] == 'top' || $settings['position'] == 'bottom') {

        switch ($settings['nav']) {
            case 'text':
                $nav = '{wk}-subnav';
                break;
            case 'lines':
                $nav = '{wk}-subnav {wk}-subnav-line';
                break;
            case 'nav':
                $nav = '{wk}-subnav {wk}-subnav-pill';
                break;
            case 'thumbnails':
                $nav = '{wk}-thumbnav';
                $nav_item = ($settings['alignment'] == 'justify') ? ' class="{wk}-width-1-' . count($items) . '"' : '';
                break;
            case 'dotnav':
                $nav = '{wk}-dotnav';
                break;
        }

        // Alignment
        $nav .= ($settings['alignment'] != 'justify') ? ' {wk}-flex-' . $settings['alignment'] : '';

    } else {

        switch ($settings['nav']) {
            case 'text':
                $nav = '{wk}-list {wk}-list-space';
                break;
            case 'lines':
                $nav = '{wk}-list {wk}-list-line';
                break;
            case 'nav':
                $nav = '{wk}-nav {wk}-nav-side';
                break;
            case 'thumbnails':
                $nav = '{wk}-thumbnav {wk}-flex-column';
                break;
            case 'dotnav':
                $nav = '{wk}-dotnav {wk}-flex-column';
                break;
        }

    }

    $javascript = 'switcher';

}

// Animation
$animation = ($settings['animation'] != 'none') ? ',animation:\'' . $settings['animation'] . '\'' : '';

// Disable swiping
$swiping = ($settings['disable_swiping']) ? ',swiping:false' : '';

?>

<?php if ($tabs_center) : ?>
<div class="<?php echo $tabs_center; ?>">
<?php endif ?>

<ul class="<?php echo $nav; ?> uk-margin-bottom-remove" data-{wk}-<?php echo $javascript; ?>="{connect:'#wk-<?php echo $settings['id']; ?>'<?php echo $animation; ?><?php echo $swiping; ?>}">
<?php foreach ($items as $item) : ?>
    <?php

        // Alternative Media Field
        $field = 'media';
        if ($settings['thumbnail_alt']) {
            foreach ($item as $media_field) {
                if (($item[$media_field] != $item['media']) && ($item->type($media_field) == 'image')) {
                    $field = $media_field;
                    break;
                }
            }
        }

        // Thumbnails
        $thumbnail = '';
        if ($settings['nav'] == 'thumbnails' &&  ($item->type($field) == 'image' || $item[$field . '.poster'])) {
            
            if ( $item->type('media') == 'image' || $item['its_content'] ) {
			
				$media_id = $item['its_content'] ? $item[$field] : attachment_url_to_postid( get_home_url() . '/' . $item[$field] );
			}
			
			else {
				
				$media_id = $item['its_content'] ? $item[$field . '.poster'] : attachment_url_to_postid( get_home_url() . '/' . $item[$field . '.poster'] );
			}
            
            $width           = wp_get_attachment_image_src( $media_id, $settings['thumbnail_size'] )[1] / 2;
            $height          = wp_get_attachment_image_src( $media_id, $settings['thumbnail_size'] )[2] / 2;
			
			$attrs           = array();
            $attrs['alt']    = strip_tags($item['title']);
            
            $thumbnail = wp_get_attachment_image( $media_id, $settings['thumbnail_size'], false, $attrs );
        }

    ?>
    <li<?php echo $nav_item; ?>><a href=""<?php echo ($thumbnail) ? ' style="width: ' . $width . 'px; height: ' . $height . 'px;"' : $item['title']; ?>><?php echo ($thumbnail) ? $thumbnail : $item['title']; ?></a></li>
<?php endforeach; ?>
</ul>

<?php if ($tabs_center) : ?>
</div>
<?php endif ?>
