<?php

// Buttons
$button_link = ($button_link) ? 'class="' . $button_link . '"' : '';
$button_lightbox = ($button_lightbox) ? 'class="' . $button_lightbox . '"' : '';

$buttons = array();
if ($item['link'] && $settings['link']) {
    $buttons['link'] = '<a ' . $button_link . ' href="' . $item->escape('link') . '"' . $link_target . '>' . $app['translator']->trans($settings['link_text']) . '</a>';
}
if ($settings['lightbox'] && $settings['lightbox_link']) {
    if ($settings['lightbox'] === 'slideshow') {
        $buttons['lightbox'] = '<a ' . $button_lightbox . ' href="#wk-3' . $settings['id'] . '" data-index="'.$index.'" data-{wk}-modal>' . $app['translator']->trans($settings['lightbox_text']) . '</a>';
    } else {
        $buttons['lightbox'] = '<a ' . $button_lightbox . ' ' . $lightbox . ' data-{wk}-lightbox="{group:\'.wk-2' . $settings['id'] . '\'}" ' . $lightbox_caption . '>' . $app['translator']->trans($settings['lightbox_text']) . '</a>';
    }
}

?>

<div class="gm_item {wk}-panel<?php if ($settings['animation'] != 'none') echo ' {wk}-invisible'; ?> <?php echo $item['class']; ?>">

    <figure class="gm_media {wk}-overlay {wk}-overlay-hover <?php echo $border; ?>">

        <?php echo $thumbnail; ?>

        <div class="gm_overlay {wk}-overlay-panel {wk}-overlay-bottom {wk}-overlay-background {wk}-overlay-<?php echo $settings['overlay_animation']; ?>">

            <?php if ($buttons) : ?>
            <div class="gm_overlay-data" data-{wk}-margin>

                <?php if (($item['title'] && $settings['title']) || ($item['content'] && $settings['content'])) : ?>
                <div class="gm_data">

                    <?php if ( ( $item['title'] && $settings['title'] ) || ( $item['subtitle'] && $settings['subtitle'] ) ) : ?>
			        <div class="gm_title-block">
			            
			            <?php if ($item['subtitle'] && $settings['subtitle'] && $settings['titles_reverse']) : ?>
			            <h4 class="gm_subtitle <?php echo $subtitle_size; ?>"><span><?php echo $item['subtitle']; ?></span></h4>
			            <?php endif; ?>
			            
			            <?php if ($item['title'] && $settings['title']) : ?>
			            <h3 class="gm_title <?php echo $title_size; ?>"><span><?php echo $item['title']; ?></span></h3>
			            <?php endif; ?>
			            
			            <?php if ($item['subtitle'] && $settings['subtitle'] && !$settings['titles_reverse']) : ?>
			            <h4 class="gm_subtitle <?php echo $subtitle_size; ?>"><span><?php echo $item['subtitle']; ?></span></h4>
			            <?php endif; ?>
			            
			        </div>
			        <?php endif; ?>

                    <?php if ($item['content'] && $settings['content']) : ?>
                    <div class="gm_content <?php echo $content_size; ?>"><?php echo $item['content']; ?></div>
                    <?php endif; ?>

                </div>
                <?php endif; ?>

                <div class="gm_links {wk}-grid {wk}-grid-small {wk}-margin-top-medium <?php echo $text_align_flex; ?>" data-{wk}-grid-margin>

                    <?php if (isset($buttons['link'])) : ?>
                    <div class="gm_link gm_link--default"><?php echo $buttons['link']; ?></div>
                    <?php endif; ?>

                    <?php if (isset($buttons['lightbox'])) : ?>
                    <div class="gm_link gm_link--lightbox"><?php echo $buttons['lightbox']; ?></div>
                    <?php endif; ?>

                </div>

            </div>
            <?php else : ?>

                <?php if ( ( $item['title'] && $settings['title'] ) || ( $item['subtitle'] && $settings['subtitle'] ) ) : ?>
		        <div class="gm_title-block">
		            
		            <?php if ($item['subtitle'] && $settings['subtitle'] && $settings['titles_reverse']) : ?>
		            <h4 class="gm_subtitle <?php echo $subtitle_size; ?>"><span><?php echo $item['subtitle']; ?></span></h4>
		            <?php endif; ?>
		            
		            <?php if ($item['title'] && $settings['title']) : ?>
		            <h3 class="gm_title <?php echo $title_size; ?>"><span><?php echo $item['title']; ?></span></h3>
		            <?php endif; ?>
		            
		            <?php if ($item['subtitle'] && $settings['subtitle'] && !$settings['titles_reverse']) : ?>
		            <h4 class="gm_subtitle <?php echo $subtitle_size; ?>"><span><?php echo $item['subtitle']; ?></span></h4>
		            <?php endif; ?>
		            
		        </div>
		        <?php endif; ?>

                <?php if ($item['content'] && $settings['content']) : ?>
                <div class="gm_content <?php echo $content_size; ?>"><?php echo $item['content']; ?></div>
                <?php endif; ?>

            <?php endif; ?>

        </div>

        <?php if (!$buttons) : ?>
            <?php if ($settings['lightbox']) : ?>
                <?php if ($settings['lightbox'] === 'slideshow') : ?>
                    <a class="gm_link-full {wk}-position-cover" href="#wk-3<?php echo $settings['id']; ?>" data-index="<?php echo $index; ?>" data-{wk}-modal <?php echo $lightbox_caption; ?>></a>
                <?php else : ?>
                    <a class="gm_link-full {wk}-position-cover" <?php echo $lightbox; ?> data-{wk}-lightbox="{group:'.wk-1<?php echo $settings['id']; ?>'}" <?php echo $lightbox_caption; ?>></a>
                <?php endif; ?>
            <?php elseif ($item['link']) : ?>
                <a class="gm_link-full {wk}-position-cover" href="<?php echo $item->escape('link'); ?>"<?php echo $link_target; ?>></a>
            <?php endif; ?>
        <?php endif; ?>

    </figure>

</div>
