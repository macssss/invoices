<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		
		<div class="gm_invoices-page">
		
		<?php if ( !$this['config']->get('title_section') ) : ?>
		
			<h1 class="gm_invoices-page__title uk-h3"><span><?php the_title(); ?></span></h1>
		
		<?php endif; ?>
		
		<div class="gm_invoices-page__content uk-margin-top">
			<?php echo gm_get_invoices(); ?>
		</div>
		
		<?php the_content(''); ?>
	
	<?php endwhile; ?>
	
<?php endif; ?>