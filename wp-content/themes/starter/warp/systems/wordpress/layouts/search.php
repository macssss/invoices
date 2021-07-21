<?php if (have_posts()) : ?>

<div class="gm_blog-search-list">

    <h1 class="gm_blog-search-list__title uk-h3"><?php _e('Search Results for', 'warp'); ?> &#8216;<?php echo stripslashes(strip_tags(get_search_query()));?>&#8217;</h1>
    
    <div class="gm_blog-search-list__items uk-margin-top-medium">

    <?php
        // loop result
        while (have_posts()) {
            the_post();
			
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
                <article class="gm_blog-search-list-item">
	                
	                <?php if (has_post_thumbnail()) : ?>
	                <div class="gm_blog-search-list-item__image-cont">
			            <a class="gm_blog-search-list-item__image" href="<?php the_permalink() ?>">
			                <?php the_post_thumbnail('thumbnail', array('alt' => get_the_title()) ); ?>
			            </a>
	                </div>
			        <?php endif; ?>
	                
	                <div class="gm_blog-search-list-item__data">
		                
				    	<h1 class="gm_blog-search-list-item__title uk-h5">
					        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					    </h1>
				
				        <div class="gm_blog-search-list-item__meta gm_blog-meta">
				        
					        <div class="gm_blog-meta__date gm_blog-meta__icon">
						        <time class="gm_blog-list-item__date__inner" datetime="<?php echo get_the_date('Y-m-d'); ?>">
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
				        
				
				        <div class="gm_blog-search-list-item__content">
				            <?php the_excerpt(''); ?>
				        </div>
			        
	                </div>
				</article>
            </div>
            
            <?php
        }
    ?>
    
    </div>

<?php echo $this->render("_pagination", array("type"=>"posts")); ?></p>

<?php else : ?>

<div class="gm_blog-search-list">
    <h1 class="gm_blog-search-list__title uk-h3"><?php _e('No posts found. Try a different search?', 'warp'); ?></h1>
    <?php get_search_form(); ?>
</div>

<?php endif; ?>