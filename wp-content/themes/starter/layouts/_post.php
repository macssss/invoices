<?php
	
	global $post;
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
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

<div>
	<article class="gm_blog-list-item">
		
		<?php if (is_sticky() && $paged == 1) : ?>
		<div class="gm_blog-list-item__sticky uk-panel uk-panel-box uk-panel-box-white">
		<?php endif; ?>
		
	    
	
	    <?php if (has_post_thumbnail() && $image_alignment != 'top') : ?>
	    <div class="uk-grid uk-grid-medium uk-grid-width-medium-1-2" data-uk-grid-margin data-uk-grid-match="{target:'.uk-panel'}">
	    <?php endif; ?>
	
	    <?php if (has_post_thumbnail() && $image_alignment == 'left') : ?>
	        <div>
	            <a class="gm_blog-list-item__image" href="<?php the_permalink() ?>">
		            <?php the_post_thumbnail('thumbnail', array('alt' => get_the_title())); ?>
	            </a>
	        </div>
	    <?php endif; ?>
	
	    <?php if (has_post_thumbnail() && $image_alignment != 'top') : ?>
	    <div class="uk-flex uk-flex-center uk-flex-middle">
	        <div class="uk-panel">
	    <?php endif; ?>
	    
	    	<?php if (has_post_thumbnail() && $image_alignment == 'top') : ?>
	            <a class="gm_blog-list-item__image" href="<?php the_permalink() ?>">
	                <?php the_post_thumbnail('thumbnail', array('alt' => get_the_title()) ); ?>
	            </a>
	        <?php endif; ?>
			
		    	<h1 class="gm_blog-list-item__title uk-h4">
			        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><span><?php the_title(); ?></span></a>
			    </h1>
				
				<?php if ( !$post->post_password && !post_password_required () ): ?>
		        <div class="gm_blog-list-item__meta gm_blog-meta">
			        
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
		        
		
		        <div class="gm_blog-list-item__content">
		            <?php the_excerpt(''); ?>
		            
		            <p class="gm_blog-list-item__read-more uk-text-right">
			            <a href="<?php the_permalink() ?>" class="uk-button uk-button-link"><?php _e("Continue Reading", "warp") ?></a>
			        </p>
		        </div>
	
	
	        <?php if (has_post_thumbnail() && $image_alignment != 'top') : ?>
	            </div>
	        </div>
	        <?php endif; ?>
	
	        <?php if (has_post_thumbnail() && $image_alignment == 'right') : ?>
	            <div>
	                <a class="gm_blog-list-item__image" href="<?php the_permalink() ?>">
			            <?php the_post_thumbnail('thumbnail', array('alt' => get_the_title())); ?>
		            </a>
	            </div>
	        <?php endif; ?>
	
	    <?php if (has_post_thumbnail() && $image_alignment != 'top') : ?>
	    </div>
	    <?php endif; ?>
		
		
		<?php if (is_sticky() && $paged == 1) : ?>
		</div>
		<?php endif; ?>
		
	</article>
</div>