<?php

// Nav
$nav = '';
$nav_item = '';

switch ($settings['nav']) {
    case 'dotnav':
        $nav  = '{wk}-dotnav';
        $nav .= ($settings['nav_overlay'] && $settings['nav_contrast']) ? ' {wk}-dotnav-contrast' : '';
        break;
    case 'thumbnails':
        $nav = '{wk}-thumbnav';
        $nav_item = ($settings['nav_align'] == 'justify') ? ' class="{wk}-width-1-' . count($items) . '"' : '';
        break;
}

// Alignment
$nav .= ($settings['nav_align'] != 'justify') ? ' {wk}-flex-' . $settings['nav_align'] : '';

?>

<ul class="<?php echo $nav; ?> {wk}-margin-bottom-remove">
<?php foreach ($items as $i => $item) :

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
    <li<?php echo $nav_item; ?> data-{wk}-slideshow-item="<?php echo $i; ?>"><a href="#" style="width: <?php echo $width; ?>px; height: <?php echo $height; ?>px;"><?php echo ($thumbnail) ? $thumbnail : $item['title']; ?></a></li>
<?php endforeach; ?>
</ul>
