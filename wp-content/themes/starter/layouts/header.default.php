<div class="gm_navbar-wrapper gm_navbar-default" <?php echo $args['sticky']; ?>>
    <div class="gm_navbar uk-navbar">

        <div class="uk-container uk-container-center">
			<div class="gm_navbar-inner">
	            
	            <?php if ($this['widgets']->count('logo')) : ?>
	            <div class="gm_navbar-left uk-flex uk-flex-middle uk-flex-center">
	
	                <?php if ($this['widgets']->count('logo')) : ?>
	                <a class="uk-navbar-brand uk-flex uk-flex-middle" href="<?php echo get_home_url(); ?>">
		                <?php echo $this['widgets']->render('logo'); ?>
		            </a>
	                <?php endif; ?>
	
	            </div>
	            <?php endif; ?>
	            
	            
	
	            <?php if ($this['widgets']->count('menu')) : ?>
	            <div class="gm_navbar-center uk-flex uk-flex-center uk-flex-middle">
		            <div class="gm_main-menu">
	                	<?php echo $this['widgets']->render('menu'); ?>
		            </div>
	            </div>
	            <?php endif; ?>
	
	
	
	            <?php if ($this['widgets']->count('search + more + offcanvas')) : ?>
	            <div class="gm_navbar-right uk-flex uk-flex-middle<?php if (!$this['widgets']->count('search + more')) : ?> gm_navbar-right--empty<?php endif; ?>">
	
	                <?php if ($this['widgets']->count('search')) : ?>
	                <div class="gm_search">
	                    <a href="#gm_search" class="gm_search-icon" data-uk-modal><i class="fas fa-search"></i></a>
	                </div>
	                <?php endif; ?>
	
	                <?php if ($this['widgets']->count('more')) : ?>
	                <div class="gm_more uk-hidden-small">
	                    <?php echo $this['widgets']->render('more'); ?>
	                </div>
	                <?php endif; ?>
	
	                <?php if ($this['widgets']->count('offcanvas')) : ?>
	                <div class="gm_navbar-toggle">
	                	<a href="#gm_offcanvas" class="uk-navbar-toggle" data-uk-offcanvas></a>
	                </div>
	                <?php endif; ?>
	
	            </div>
	            <?php endif; ?>

			</div>
        </div>

    </div>
</div>
