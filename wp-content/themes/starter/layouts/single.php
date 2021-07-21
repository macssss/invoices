 <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    
    <?php
	    
	    global $post;
		
		$image_alignment = $this['config']->get('post_image_align_posts', 'top');
	    $image = wp_get_attachment_url( get_post_thumbnail_id() );
	    
		
		$authors = get_the_author();
		
	    if ( function_exists( 'get_coauthors' ) ) {
	        $coauthors = get_coauthors();
	        $coauthors_list = [];
			
			foreach( $coauthors as $key => $coauthor ){
				$coauthors_list[$key] = $coauthor->display_name;
			}
			
			$authors = implode(", ", $coauthors_list);
		}
		
		
		
	    $categories = [];
	    $categories_default = get_the_category();
	    
	    foreach( $categories_default as $category ) {
		    
		    $category_name = esc_html ( $category->name );
		    $category_slug = $category->slug;
		    $category_link = esc_url ( get_category_link ( $category ) );
		    
	        $categories[] = '<li><a class="gm_item gm_item--' . $category_slug. '" href="' . $category_link. '" >' . $category_name . '</a></li>';
	    }
		
		$categories_list = '<ul class="gm_blog-meta__categories-list">' . implode( $categories ) . '</ul>';
	?>

    <article class="gm_blog-single">

        <?php if (has_post_thumbnail()) : ?>
        	<div class="gm_blog-single__image">
            	<?php the_post_thumbnail('thumbnail', array('alt' => get_the_title()) ); ?>
        	</div>
        <?php endif; ?>
        
        
        
        <h1 class="gm_blog-single__title uk-h3"><span><?php the_title(); ?></span></h1>
		
		
		<?php if ( !$post->post_password && !post_password_required () ): ?>
		<div class="gm_blog-single__meta gm_blog-meta">
	        
	        <div class="gm_blog-meta__date gm_blog-meta__icon">
		        <time class="gm_blog-meta__date-inner" datetime="<?php echo get_the_date('Y-m-d'); ?>">
		        	<?php echo get_the_date(); ?>
		        </time>
	        </div>
	        
	        <div class="gm_blog-meta__author gm_blog-meta__icon">
		        <?php echo $authors; ?>
	        </div>
	        
	        <div class="gm_blog-meta__categories gm_blog-meta__icon">
		        <?php echo $categories_list; ?>
	        </div>
	        
	        <?php if(comments_open() || get_comments_number()) : ?>
	        <div class="gm_blog-meta__comments">
            	<?php comments_popup_link('<i class="far fa-comment"></i> 0', '<i class="fas fa-comment"></i> 1', '<i class="fas fa-comments"></i> %'); ?>
	        </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        
        
        
		<div class="gm_blog-single__content<?php if ( $post->post_password && post_password_required () ): ?> gm_blog-single__content--locked<?php endif; ?>">
        	<?php the_content(''); ?>
		</div>
		
		<?php if ( !$post->post_password && !post_password_required () ): ?>
		
			<?php if(function_exists( 'get_coauthors' )): ?>
			<div class="gm_blog-single__authors-info">
		        <?php foreach( $coauthors as $coauthor ): ?>
					<div class="gm_item">
			            <div class="gm_item__image">
							<?php echo coauthors_get_avatar($coauthor, 150); ?>
			            </div>
						
						<div class="gm_item__content">
				            <h3 class="gm_item__title uk-h5"><span><?php echo $coauthor->display_name; ?></span></h3>
				            
				            <?php if($coauthor->description): ?>
				            <div class="gm_item__biography"><?php echo $coauthor->description; ?></div>
				            <?php endif; ?>
						</div>
			        </div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
			
			
			
			<div class="gm_blog-single__tags-share">
				
				<div class="gm_blog-single__tags-share-inner">
					
					<?php if ( has_tag() ): ?>
					<div class="gm_blog-single__tags">
				        <?php the_tags('<p>'.__('Tags: ', 'warp'), ', ', '</p>'); ?>
			        </div>
			        <?php endif; ?>
			        
			        
			        <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ): ?>
					<div class="gm_blog-single__share">
						<?php echo ADDTOANY_SHARE_SAVE_KIT(); ?>
					</div>
					<?php endif; ?>
				
				</div>
				
			</div>
	        
			<?php
	            $prev_post = get_previous_post ( true );
	            $prev_post_title = $prev_post ? esc_attr ( $prev_post->post_title ) : '';
	            $prev_post_link = $prev_post ? get_permalink ( $prev_post->ID ) : '';
	            
	            $next_post = get_next_post(true);
	            $next_post_title = $next_post ? esc_attr ( $next_post->post_title ) : '';
	            $next_post_link = $next_post ? get_permalink( $next_post->ID ) : '';
	        ?>
	        
	        <?php if ( $prev_post || $next_post ) : ?>
	        	<div class="gm_blog-single__post-nav<?php if ( !$prev_post ): ?> gm_blog-single__post-nav--first-post<?php endif; ?>">
		        	
		        	<ul>
			        	<?php if ( $prev_post ) : ?>
			        	<li>
			                <a href="<?php echo $prev_post_link; ?>" title="<?php echo $prev_post_title; ?>" data-uk-tooltip title="<?php echo $prev_post_title; ?>">
				                <i class="fas fa-arrow-left"></i>
				                <?php echo _e("Previous Post", "warp"); ?>
			                </a>
			        	</li>
		                <?php endif; ?>
			        	
			        	
			        	<?php if ( $next_post ) : ?>
			        	<li>
			                <a href="<?php echo $next_post_link; ?>" title="<?php echo $next_post_title; ?>" data-uk-tooltip title="<?php echo $next_post_title; ?>">
				                
				                <?php echo _e("Next Post", "warp"); ?>
				                <i class="fas fa-arrow-right"></i>
			                </a>
			        	</li>
		                <?php endif; ?>
		        	</ul>
		        	
	        	</div>
	        <?php endif; ?>
	        
	        
	        <?php if ( function_exists( 'echo_crp' ) ): ?>
	        <div class="gm_blog-single__related">
				<?php echo_crp(); ?>
			</div>
			<?php endif; ?>
	       
			<?php if ( comments_open() || have_comments() ) : ?>
			<div class="gm_blog-single__comments">
	        	<?php comments_template(); ?>
	        </div>	
	        <?php endif; ?>

		<?php endif; ?>

    </article>

    <?php endwhile; ?>
 <?php endif; ?>
