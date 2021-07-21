<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
	
	<article>
	
		<?php if ( !$this['config']->get('title_section') ) : ?>
		
			<h1 class="gm_page-title uk-h3"><span><?php the_title(); ?></span></h1>
		
		<?php endif; ?>
	
		<?php the_content(''); ?>
	
	</article>
	
	<?php endwhile; ?>
	
<?php endif; ?>