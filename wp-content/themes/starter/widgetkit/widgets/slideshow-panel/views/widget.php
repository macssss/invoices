<?php

// Id
$settings['id'] = substr(uniqid(), -3);

// JS Options
$options = array();
$options[] = ($settings['duration'] != '500') ? 'duration: ' . $settings['duration'] : '';
$options[] = ($settings['autoplay']) ? 'autoplay: true ' : '';
$options[] = ($settings['interval'] != '7000') ? 'autoplayInterval: ' . $settings['interval'] : '';
$options[] = ($settings['autoplay_pause']) ? '' : 'pauseOnHover: false';

$options = '{'.implode(',', array_filter($options)).'}';

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
}

// Media Width
if ($settings['media_align'] == 'top') {

    $media_width = '{wk}-width-1-1';
    $content_width = '{wk}-width-1-1';

} else {

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
        case '3-5':
            $content_width = '2-5';
            break;
        case '2-3':
            $content_width = '1-3';
            break;
    }

    $content_width = '{wk}-width-' . $settings['media_breakpoint'] . '-' . $content_width;

    // Align Right
    $media_width .= ($settings['media_align'] == 'right') ? ' {wk}-float-right {wk}-flex-order-last-' . $settings['media_breakpoint'] : '';

}

// Content Align
$content_align  = ($settings['content_align'] && $settings['media_align'] != 'top') ? '{wk}-flex-middle' : '';

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
    case 'large':
        $content_size = '{wk}-text-large';
        break;
    case 'h1':
    case 'h2':
    case 'h3':
    case 'h4':
    case 'h5':
    case 'h6':
        $content_size = '{wk}-' . $settings['content_size'];
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
        break;
    case 'text-primary':
        $badge_style  = '{wk}-text-primary';
        break;
}

?>

<div id="wk-<?php echo $settings['id']; ?>" class="gm_slideshow gm_slideshow--panel <?php echo $settings['class']; ?>">
    <div class="gm_panel {wk}-panel <?php echo $panel; ?> {wk}-padding-remove <?php echo $settings['fullwidth'] ? ' uk-border-square' : ''; ?>">

        <?php if ($settings['media']) : ?>
        <div class="gm_grid {wk}-grid <?php echo $content_align; ?>">
            <div class="gm_media <?php echo $media_width ?> {wk}-text-center">
                <?php echo $this->render('plugins/widgets/' . $widget->getConfig('name')  . '/views/_media.php', compact('items', 'settings', 'widget')); ?>
            </div>
            <div class="gm_data <?php echo $content_width ?> uk-margin-top-max-<?php echo $settings['media_breakpoint']; ?>">
        <?php endif; ?>

        <div class="gm_data-panel {wk}-text-<?php echo $settings['text_align']; ?><?php echo !$settings['fullwidth'] ? ' uk-panel-space' : '' ?>" data-{wk}-slideshow="<?php echo $options; ?>">
	        
	        <?php if ($settings['fullwidth'] && $settings['media_align'] == 'top'): ?>
			<div class="uk-container uk-container-center">
			<?php endif; ?>
	        
	            <ul class="{wk}-slideshow">
	                <?php foreach ($items as $item) :
		                
		                
		                // Meta
				        $meta = '';
				        if ($item['date']) {
				            $date = '<time datetime="'.$item['date'].'">'.$app['date']->format($item['date'], $settings['date_format']).'</time>';
				            if ($item['author']) {
				                $meta = $app['translator']->trans('Written by %author% on %date%',  array('%author%' => $item['author'], '%date%' => $date));
				            } else {
				                $meta = '<div class="gm_blog-meta__date gm_blog-meta__icon">' . $date . '</div>';
				            }
				        } elseif ($item['author']) {
				            $meta = $app['translator']->trans('Written by %author%',  array('%author%' => $item['author']));
				        }
		                
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
	
	                <li class="gm_item">
		
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
			            <div class="gm_meta gm_blog-single__meta gm_blog-meta">
				        	<?php echo $meta; ?>
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
		                    
	                </li>
	
	            <?php endforeach; ?>
	            </ul>
	
	            <?php if (!$settings['nav_overlay'] && ($settings['nav'] != 'none')) : ?>
	            <div class="gm_sldieshow-nav {wk}-margin-top">
	                <?php echo $this->render('plugins/widgets/' . $widget->getConfig('name')  . '/views/_nav.php', compact('items', 'settings')); ?>
	            </div>
	            <?php endif ?>
            
            <?php if ($settings['fullwidth'] && $settings['media_align'] == 'top'): ?>
			</div>
			<?php endif; ?>

        </div>

        <?php if ($settings['media']) : ?>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>

<script>

    (function($){

        var settings   = <?php echo json_encode($settings); ?>,
            container  = $('#wk-<?php echo $settings["id"]; ?>'),
            slideshows = container.find('[data-{wk}-slideshow]');
			
        if (slideshows.length > 1) {
            container.on('beforeshow.uk.slideshow', function(e, next) {
                slideshows.not(next.closest('[data-{wk}-slideshow]')[0]).data('slideshow').show(next.index());
            });
        }

        if (settings.autoplay && settings.autoplay_pause) {

            container.on({
                mouseenter: function() {
                    slideshows.each(function(){
                        $(this).data('slideshow').stop();
                    });
                },
                mouseleave: function() {
                    slideshows.each(function(){
                        $(this).data('slideshow').start();
                    });
                }
            });
        }

    })(jQuery);

</script>
