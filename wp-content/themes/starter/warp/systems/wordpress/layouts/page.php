<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

	<?php
		$visual_composer_detect = "";
		
		if(isset(get_post_custom()['_wpb_vc_js_status'])){
			$visual_composer_detect = get_post_custom()['_wpb_vc_js_status'][0];
		}
	?>

    <article>
		
        <?php if (has_post_thumbnail() && !$this['config']->get('title_section') && $visual_composer_detect != 'true') : ?>
            <?php
            $width = get_option('thumbnail_size_w'); //get the width of the thumbnail setting
            $height = get_option('thumbnail_size_h'); //get the height of the thumbnail setting
            ?>
            <?php the_post_thumbnail(array($width, $height), array('class' => '')); ?>
        <?php endif; ?>

        <?php if (!$this['config']->get('title_section') && $visual_composer_detect != 'true') : ?>
        <h1 class="gm_page-title"><span><?php the_title(); ?></span></h1>
        <?php endif; ?>

        <?php the_content(''); ?>


    </article>

    <?php endwhile; ?>
<?php endif; ?>