<?php

// Id
$settings['id'] = substr(uniqid(), -3);

// Width
$nav_width = '{wk}-width-medium-' . $settings['width'];

switch ($settings['width']) {
    case '1-5':
        $content_width = '4-5';
        break;
    case '1-4':
        $content_width = '3-4';
        break;
    case '3-10':
        $content_width = '7-10';
        break;
    case '1-3':
        $content_width = '2-3';
        break;
    case '2-5':
        $content_width = '3-5';
        break;
    case '1-2':
        $content_width = '1-2';
        break;
}

$content_width = '{wk}-width-medium-' . $content_width;

?>

<?php if ($settings['position'] == 'top' || $settings['position'] == 'bottom') : ?>

<div class="gm_switcher <?php echo $settings['class']; ?>">

    <?php if ($settings['position'] == 'top') : ?>
    <div class="gm_switcher-nav">
	    <?php echo $this->render('plugins/widgets/' . $widget->getConfig('name') . '/views/_nav.php', compact('items', 'settings')); ?>
    </div>
    <?php endif ?>

    <div class="gm_switcher-content">
	    <?php echo $this->render('plugins/widgets/' . $widget->getConfig('name')  . '/views/_content.php', compact('items', 'settings')); ?>
    </div>

    <?php if ($settings['position'] == 'bottom') : ?>
    <div class="gm_switcher-nav">
	    <?php echo $this->render('plugins/widgets/' . $widget->getConfig('name')  . '/views/_nav.php', compact('items', 'settings')); ?>
	</div>
    <?php endif ?>

</div>

<?php else : ?>

<div class="gm_switcher {wk}-grid {wk}-grid-match <?php echo $settings['class']; ?>" data-{wk}-grid-match="{target:'> div > ul'}" data-{wk}-grid-margin>
    <div class="gm_switcher-nav <?php echo $nav_width ?><?php if ($settings['position'] == 'right') echo ' {wk}-float-right {wk}-flex-order-last-medium' ?>">
        <?php echo $this->render('plugins/widgets/' . $widget->getConfig('name')  . '/views/_nav.php', compact('items', 'settings')); ?>
    </div>
    <div class="gm_switcher-content <?php echo $content_width ?>">
        <?php echo $this->render('plugins/widgets/' . $widget->getConfig('name')  . '/views/_content.php', compact('items', 'settings')); ?>
    </div>
</div>

<?php endif ?>
