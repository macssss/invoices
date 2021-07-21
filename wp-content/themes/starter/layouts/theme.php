<?php
/**
* @package   Avanti
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// get theme configuration
include($this['path']->path('layouts:theme.config.php'));

$visual_composer_detect = "";

if( isset(get_post_custom()['_wpb_vc_js_status']) ) {

	$visual_composer_detect = get_post_custom()['_wpb_vc_js_status'][0];
}

$body_attrs = '';

if ( $this['config']->get('navbar_mode') ) {
	
	if ( $this['config']->get('navbar_sticky_active_height') ) {
		$body_attrs .= ' data-sticky-active-height = '.$this['config']->get('navbar_sticky_active_height');
	}
	
	if ( $this['config']->get('navbar_mode_break') ) {
		$body_attrs .= ' data-navbar-media-break = '.$this['config']->get('navbar_mode_break');
	}
}

$body_classes = '';

if ( $visual_composer_detect == 'true' ) { $body_classes .= ' gm_visual-composer'; }
if ( get_field('transparent_header') ) { $body_classes .= ' gm_transparent-header'; }

?>
<!DOCTYPE HTML>
<html lang="<?php echo $this['config']->get('language'); ?>" dir="<?php echo $this['config']->get('direction'); ?>"  data-config='<?php echo $this['config']->get('body_config','{}'); ?>'>

    <head>
    	<?php echo $this['template']->render('head'); ?>
    	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    </head>

    <body class="<?php echo $this['config']->get('body_classes'); ?><?php echo $body_classes; ?>"<?php echo $body_attrs; ?>>
	    
	    <div class="gm_wrapper">

	        <?php if ($this['widgets']->count('toolbar-c + toolbar-l + toolbar-r')) : ?>
	        <div id="gm_toolbar" class="gm_block-toolbar uk-block uk-block-mini uk-block-dark uk-contrast">
				
				<div class="uk-container uk-container-center">
					<div class="gm_toolbar-inner">
	
						<?php if ($this['widgets']->count('toolbar-c')) : ?>
						<div class="gm_toolbar-center uk-text-center">
							<?php echo $this['widgets']->render('toolbar-c'); ?>
						</div>
						<?php endif; ?>
	
						<?php if ($this['widgets']->count('toolbar-l')) : ?>
						<div class="gm_toolbar-left">
							<?php echo $this['widgets']->render('toolbar-l'); ?>
						</div>
						<?php endif; ?>
	
						<?php if ($this['widgets']->count('toolbar-r')) : ?>
						<div class="gm_toolbar-right">
							<?php echo $this['widgets']->render('toolbar-r'); ?>
						</div>
						<?php endif; ?>
	
					</div>
				</div>
				
	        </div>
	        <?php endif; ?>
	
	
	
	        <?php if ($this['widgets']->count('logo + search + menu + offcanvas')) : ?>
	        <header id="gm_header" class="gm_block-header">
	            
	            <?php echo $this['template']->render('header.'.$this['config']->get('navbar_template'), $navbar_config); ?>
	        
	        </header>
	        <?php endif; ?>
	
	
	
	        <?php if($this['config']->get('title_section') && $visual_composer_detect != 'true'): ?>
	        	<?php
	
			        $page_image = '';
	
			        if( is_page() && has_post_thumbnail() ){
				        $page_image = get_the_post_thumbnail_url();
			        }
	
			        else if( is_single() ){
				        $primary_cat = new WPSEO_Primary_Term('category', get_the_ID());
						$primary_cat = $primary_cat->get_primary_term();
	
					    if(!$primary_cat){
						    $primary_cat = get_the_category()[0]->cat_ID;
					    }
	
						$page_image = z_taxonomy_image_url($primary_cat);
			        }
	
			        else if ( is_category() && function_exists('z_taxonomy_image_url') ){
				        $page_image = z_taxonomy_image_url();
				    }
				    
				    $title_section_classes = '';

					if ( get_field("transparent_header") ) { $title_section_classes .= ' gm_clear-header-section'; }
					if ( $this['config']->get('title_section_kernburns') ) { $title_section_classes .= ' gm_block-kernburns'; }
					if ( $page_image != "" ) { $title_section_classes .= ' gm_filled'; }
	
		        ?>
	
		        <div id="gm_title-section" class="gm_block-title-section uk-block<?php echo $title_section_classes; ?>"<?php if ($page_image != "") : ?> style="background-image: url(<?php echo $page_image; ?>);"<?php endif; ?>>
			        <div class="uk-container uk-container-center">
	
				        <?php if( is_page() ) :?>
				        	<h1><span><?php the_title();  ?></span></h1>
	
				        <?php elseif( is_single() ) :?>
				        	<h2 class="uk-h1">
					        	<a href="<?php echo get_category_link( $primary_cat ); ?>">
					        		<?php echo get_cat_name($primary_cat);  ?>
					        	</a>
					        </h2>
	
				        <?php elseif ( is_category() ): ?>
				        	<h1><span><?php single_cat_title();  ?></span></h1>
	
				        <?php elseif (is_tag()) : ?>
							<h1><span><?php printf(__('Posts Tagged %s', 'warp'), '&#8216;'.single_tag_title('', false).'&#8217;'); ?></span></h1>
	
				        <?php elseif ( function_exists( 'is_product_category' ) && is_product_category() ): ?>
				        	<h1><span><?php woocommerce_page_title();  ?></span></h1>
	
				        <?php elseif ( is_search() ): ?>
				        	<h1><span><?php echo __("Search", "warp"); ?></span></h1>
	
				        <?php endif; ?>
	
	
	
					    <?php if ($this['widgets']->count('breadcrumbs') && $this['config']->get('title_section')) : ?>
					    <div class="gm_breadcrumbs">
	                    	<?php echo $this['widgets']->render('breadcrumbs'); ?>
					    </div>
	                    <?php endif; ?>
	
			        </div>
		        </div>
	        <?php endif; ?>
	
	
	
	        <?php if ($this['widgets']->count('top-a')) : ?>
	        <div id="gm_top-a" class="gm_block-top-a uk-block <?php echo $classes['block.top-a']; ?>" <?php echo $styles['block.top-a']; ?>>
	
	            <div class="uk-container uk-container-center">
	
	                <section class="<?php echo $classes['grid.top-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
	                    <?php echo $this['widgets']->render('top-a', array('layout'=>$this['config']->get('grid.top-a.layout'))); ?>
	                </section>
	
	            </div>
	
	        </div>
	        <?php endif; ?>
	
	
	
	        <?php if ($this['widgets']->count('top-b')) : ?>
	        <div id="gm_top-b" class="gm_block-top-b uk-block <?php echo $classes['block.top-b']; ?>" <?php echo $styles['block.top-b']; ?>>
	
	            <div class="uk-container uk-container-center">
	
	                <section class="<?php echo $classes['grid.top-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
	                    <?php echo $this['widgets']->render('top-b', array('layout'=>$this['config']->get('grid.top-b.layout'))); ?>
	                </section>
	
	            </div>
	
	        </div>
	        <?php endif; ?>
	
	
	
	        <?php if ($this['widgets']->count('top-c')) : ?>
	        <div id="gm_top-c" class="gm_block-top-c uk-block <?php echo $classes['block.top-c']; ?>" <?php echo $styles['block.top-c']; ?>>
	
	            <div class="uk-container uk-container-center">
	
	                <section class="<?php echo $classes['grid.top-c']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
	                    <?php echo $this['widgets']->render('top-c', array('layout'=>$this['config']->get('grid.top-c.layout'))); ?>
	                </section>
	
	            </div>
	
	        </div>
	        <?php endif; ?>
	
	
	
	        <?php if ($this['widgets']->count('top-d')) : ?>
	        <div id="gm_top-d" class="gm_block-top-d uk-block <?php echo $classes['block.top-d']; ?>" <?php echo $styles['block.top-d']; ?>>
	
	            <div class="uk-container uk-container-center">
	
	                <section class="<?php echo $classes['grid.top-d']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
	                    <?php echo $this['widgets']->render('top-d', array('layout'=>$this['config']->get('grid.top-d.layout'))); ?>
	                </section>
	
	            </div>
	
	        </div>
	        <?php endif; ?>
	
	
	
	        <?php if ($this['widgets']->count('main-top + main-bottom + sidebar-a + sidebar-b') || $this['config']->get('system_output', true)) : ?>
	        <div id="gm_main" class="gm_block-main <?php if($visual_composer_detect != 'true'){echo 'uk-block '.$classes['block.main'];} ?>" <?php echo $styles['block.main']; ?>>
		        
		        
			    <?php if ($this['widgets']->count('breadcrumbs') && !$this['config']->get('title_section')) : ?>
			    <div class="gm_breadcrumbs uk-block uk-block-small">
				    <div class="uk-container uk-container-center">
	                <?php echo $this['widgets']->render('breadcrumbs'); ?>
				    </div>
			    </div>
	            <?php endif; ?>
		        
	
				<?php if($visual_composer_detect != 'true'): ?>
	            <div class="uk-container uk-container-center">
	                <div class="gm_middle uk-grid" data-uk-grid-match data-uk-grid-margin>
		        <?php endif; ?>
	
	                    <?php if ($this['widgets']->count('main-top + main-bottom') || $this['config']->get('system_output', true)) : ?>
	                    <div class="<?php if($visual_composer_detect == 'true'): ?>gm_main<?php else: ?><?php echo $classes['layout.main'] ?><?php endif; ?>">
	
	                        <?php if ($this['widgets']->count('main-top')) : ?>
	                        <section id="gm_main-top" class="gm_main-top <?php echo $classes['grid.main-top']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
	                            <?php echo $this['widgets']->render('main-top', array('layout'=>$this['config']->get('grid.main-top.layout'))); ?>
	                        </section>
	                        <?php endif; ?>
	
	                        <?php if ($this['config']->get('system_output', true)) : ?>
	                        <main id="gm_page-content" class="gm_page-content">
	                            <?php echo $this['template']->render('content'); ?>
	
	                        </main>
	                        <?php endif; ?>
	
	                        <?php if ($this['widgets']->count('main-bottom')) : ?>
	                        <section id="gm_main-bottom" class="gm_main-bottom <?php echo $classes['grid.main-bottom']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
	                            <?php echo $this['widgets']->render('main-bottom', array('layout'=>$this['config']->get('grid.main-bottom.layout'))); ?>
	                        </section>
	                        <?php endif; ?>
	
	                    </div>
	                    <?php endif; ?>
	
				<?php if($visual_composer_detect != 'true'): ?>
	                    <?php foreach($sidebars as $name => $sidebar) : ?>
	                    <aside class="<?php echo $classes["layout.$name"] ?>"><?php echo $this['widgets']->render($name) ?></aside>
	                    <?php endforeach ?>
				    </div>
	            </div>
	            <?php endif; ?>
	
	        </div>
	        <?php endif; ?>
	
	        <?php if ($this['widgets']->count('bottom-a')) : ?>
	        <div id="gm_bottom-a" class="gm_block-bottom-a uk-block <?php echo $classes['block.bottom-a']; ?>" <?php echo $styles['block.bottom-a']; ?>>
	
	            <div class="uk-container uk-container-center">
	
	                <section class="<?php echo $classes['grid.bottom-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
	                    <?php echo $this['widgets']->render('bottom-a', array('layout'=>$this['config']->get('grid.bottom-a.layout'))); ?>
	                </section>
	
	            </div>
	
	        </div>
	        <?php endif; ?>
	
	        <?php if ($this['widgets']->count('bottom-b')) : ?>
	        <div id="gm_bottom-b" class="gm_block-bottom-b uk-block <?php echo $classes['block.bottom-b']; ?>" <?php echo $styles['block.bottom-b']; ?>>
	
	            <div class="uk-container uk-container-center">
	
	                <section class="<?php echo $classes['grid.bottom-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
	                    <?php echo $this['widgets']->render('bottom-b', array('layout'=>$this['config']->get('grid.bottom-b.layout'))); ?>
	                </section>
	
	            </div>
	
	        </div>
	        <?php endif; ?>
	
	        <?php if ($this['widgets']->count('bottom-c')) : ?>
	        <div id="gm_bottom-c" class="gm_block-bottom-c uk-block <?php echo $classes['block.bottom-c']; ?>" <?php echo $styles['block.bottom-c']; ?>>
	
	            <div class="uk-container uk-container-center">
	
	                <section class="<?php echo $classes['grid.bottom-c']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
	                    <?php echo $this['widgets']->render('bottom-c', array('layout'=>$this['config']->get('grid.bottom-c.layout'))); ?>
	                </section>
	
	            </div>
	
	        </div>
	        <?php endif; ?>
	
	        <?php if ($this['widgets']->count('bottom-d')) : ?>
	        <div id="gm_bottom-d" class="gm_block-bottom-d uk-block <?php echo $classes['block.bottom-d']; ?>" <?php echo $styles['block.bottom-d']; ?>>
	
	            <div class="uk-container uk-container-center">
	
	                <section class="<?php echo $classes['grid.bottom-d']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
	                    <?php echo $this['widgets']->render('bottom-d', array('layout'=>$this['config']->get('grid.bottom-d.layout'))); ?>
	                </section>
	
	            </div>
	
	        </div>
	        <?php endif; ?>
	
	
	
			<?php if ($this['widgets']->count('footer + footer-menu')) : ?>
			<footer id="gm_footer" class="gm_block-footer uk-block uk-block-medium uk-block-dark uk-contrast">
				
				<div class="uk-container uk-container-center">
	        		<?php echo $this['template']->render('footer.'.$this['config']->get('footer_template', 'default')); ?>
				</div>
				
			</footer>
	        <?php endif; ?>
	
	
	
	        <?php if ($this['widgets']->count('offcanvas')) : ?>
	        <div id="gm_offcanvas" class="gm_block-offcanvas uk-offcanvas">
		        
	            <div class="uk-offcanvas-bar uk-offcanvas-bar-flip" >
					
					<div class="uk-offcanvas-bar-inner" data-simplebar>
						
			            <?php echo $this['widgets']->render('offcanvas'); ?>
		
			            <?php if ( $this['widgets']->count('more') && $this['config']->get('navbar_template') == 'default' ) : ?>
		                <div class="gm_more uk-visible-small uk-panel">
		                    <?php echo $this['widgets']->render('more'); ?>
		                </div>
		                <?php endif; ?>
					
					</div>
					
		        </div>
		        
	        </div>
	        <?php endif; ?>
	
	
	        
	        <?php if ($this['widgets']->count('search')) : ?>
	        <div id="gm_search" class="gm-search-modal uk-modal">
		        
			    <div class="uk-modal-dialog uk-modal-dialog-lightbox">
			        <a class="uk-modal-close uk-close"></a>
			        <?php echo $this['widgets']->render('search'); ?>
			    </div>
			    
			</div>
	        <?php endif; ?>
			
			
			
			<?php if ($this['widgets']->count('modal')) : ?>
	        <div id="gm_modal" class="gm_block-modal">
	            <?php echo $this['widgets']->render('modal'); ?>
	        </div>
	        <?php endif; ?>
	
	
	
	        <?php if ($this['widgets']->count('debug')) : ?>
	        <div id="gm_debug" class="gm_debug">
	            <?php echo $this['widgets']->render('debug'); ?>
	        </div>
	        <?php endif; ?>
	
	
	
			<?php echo $this->render('footer'); ?>
		
	    </div>
		
    </body>
</html>
