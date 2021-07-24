<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		
		<div class="gm_invoices-page">
		
		<?php if ( !$this['config']->get('title_section') ) : ?>
		
			<h1 class="gm_invoices-page__title uk-h3<?php if ( !is_user_logged_in() ): ?> uk-text-center<?php endif; ?>"><span><?php the_title(); ?></span></h1>
		
		<?php endif; ?>
		
		<div class="gm_invoices-page__content uk-margin-top-small">
			
			<?php if ( is_user_logged_in() ): ?>
			
				<?php echo gm_get_invoices(); ?>
			
			<?php else: ?>
				
				<div class="uk-alert"><?php _e( 'You need to be logged in to see this page', 'warp' ); ?></div>
				
				<p class="uk-text-center">
					
					<a href="<?php echo wp_login_url('/'); ?>" class="uk-button uk-button-secondary"><?php _e( 'Login', 'warp' ); ?></a>
					
				</p>
				
			<?php endif; ?>
			
		</div>
		
		<?php the_content(''); ?>
	
	<?php endwhile; ?>
	
<?php endif; ?>