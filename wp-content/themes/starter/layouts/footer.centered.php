
<div class="gm_footer-wrapper gm_footer-centered uk-flex uk-flex-middle uk-flex-column uk-text-center">
	
	<?php if ($this['widgets']->count('footer-menu')) : ?>
    <div class="gm_footer-menu">
        <?php echo $this['widgets']->render('footer-menu'); ?>
    </div>
    <?php endif; ?>
	
	
    <?php if ($this['widgets']->count('footer')) : ?>
    <div class="gm_footer-content uk-flex uk-flex-wrap uk-flex-middle uk-flex-center">
        <?php echo $this['widgets']->render('footer'); ?>
    </div>
    <?php endif; ?>

</div>