<?php
/**
* @package   Warp Theme Framework
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/



$posts_fp = $this['config']->get('posts_on_frontpage');

if (is_front_page() && ($posts_fp && $posts_fp !== 'default')) {
    query_posts( 'posts_per_page='.$posts_fp );
}

?>


<div class="gm_blog-list">

	<?php if ( !$this['config']->get('title_section') ): ?>
		
	    <h1 class="gm_blog-list__title"><?php echo single_cat_title( '', false ); ?></h1>
	    
	    <?php if ( category_description() ): ?>
	    	<div class="gm_blog-list__description uk-margin-bottom"><?php echo category_description(); ?></div>
	    <?php endif; ?>
	    
	<?php endif; ?>
	
	<div class="gm_blog-list__items">
		
		<?php
			while ( have_posts() ) {
			    the_post();
			    echo $this->render('_post');    
			}
		?>
	
	</div>
	
</div>