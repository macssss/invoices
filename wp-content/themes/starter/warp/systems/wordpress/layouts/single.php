 <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

    <article class="uk-article blog-post blog-post--single" data-permalink="<?php the_permalink(); ?>">

        <?php if (has_post_thumbnail()) : ?>
        	<div class="blog-post__image">
            	<?php the_post_thumbnail('', array('alt' => get_the_title()) ); ?>
        	</div>
        <?php endif; ?>
        
        
        
        <h1 class="uk-h3 blog-post__title"><?php the_title(); ?></h1>
		
		
		
		<div class="blog-post__meta uk-article-meta uk-flex uk-flex-wrap">
	        
	        <div class="blog-post__date">
		        <i class="uk-icon-calendar"></i>
		        
		        <time class="blog-post__date-inner" datetime="<?php echo get_the_date('Y-m-d'); ?>">
		        	<?php echo get_the_date(); ?>
		        </time>
	        </div>
	        
	        <div class="blog-post__author">
		        <i class="uk-icon-user"></i>
		        
		         <?php echo get_the_author(); ?>
	        </div>
	        
	        <div class="blog-post__categories">
		        <i class="uk-icon-folder-open"></i>
		        
		        <ul>
		        <?php
				    $output = [];
				    $post_categories = get_the_category();
				    
				    if ( $post_categories ) {
				        foreach( $post_categories as $post_category ) {
				            $output[] = '<li>
				                             <a class="category-'.$post_category->slug.'" href="'.esc_url( get_category_link($post_category)).'" title="'. esc_attr( sprintf( __( 'Zobacz wszystko w %s', 'mytheme' ), $post_category->name ) ).'"> 
				                                 ' .esc_html( $post_category->name ).'
				                             </a>
				                        </li>';
				        }
				
				        if ($output ){
				            echo implode($output);
				        }
				    }	
					
				?>
		        </ul>
	        </div>
        </div>
        
        
        
		<div class="blog-post__content">
        	<?php the_content(''); ?>
		</div>
		
		
		<div class="blog-post__tags-share<?php if(has_tag()): ?> uk-flex-space-between<?php else: ?> uk-flex-center<?php endif; ?> uk-flex uk-flex-wrap uk-flex-middle ">
			<?php if(has_tag()): ?>
			<div class="blog-post__tags">
		        <?php the_tags('<p>'.__('Tags: ', 'warp'), ', ', '</p>'); ?>
	        </div>
	        <?php endif; ?>
	        
	        <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ): ?>
			<div class="blog-post__share">
				<?php echo ADDTOANY_SHARE_SAVE_KIT(); ?>
			</div>
			<?php endif; ?>
		</div>
        
        
        <div class="blog-post__related">
			<?php if ( function_exists( 'echo_ald_crp' ) ) echo_ald_crp(); ?>
		</div>

        

		<?php
            $prev = get_previous_post(true);
            $next = get_next_post(true);
        ?>
        
        <?php if ($prev || $next) : ?>
        	<div class="blog-post__nav">
	        	<ul class="blog-post__nav--list">
		        	<?php if ($prev) : ?>
		        	<li>
		                <a href="<?php echo get_permalink($prev->ID) ?>" title="<?php echo esc_attr($prev->post_title ); ?>">
			                <i class="uk-icon-arrow-left"></i>
			                <?php echo esc_attr($prev->post_title ); ?>
		                </a>
		        	</li>
	                <?php endif; ?>
		        	
		        	
		        	<?php if ($next) : ?>
		        	<li>
		                <a href="<?php echo get_permalink($next->ID) ?>" title="<?php echo esc_attr($next->post_title ); ?>">
			                <?php echo esc_attr($next->post_title ); ?>
			                <i class="uk-icon-arrow-right"></i>
		                </a>
		        	</li>
	                <?php endif; ?>
	        	</ul>
        	</div>
        <?php endif; ?>
        
        
        
        <?php if (function_exists('the_ratings')) : ?>
		<div class="blog-post__rating item-rating">
			<?php the_ratings(); ?>
		</div>
		<?php endif; ?>
		
		

        <?php comments_template(); ?>



    </article>

    <?php endwhile; ?>
 <?php endif; ?>
