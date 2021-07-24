<?php
/**
* @package   Avanti
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

namespace Foo\Bar;

$config  = $this['config'];
$classes = array();

/*
 * Layouts
 */
$width = 60;
foreach ($sidebars = $config->get('sidebars', array()) as $name => $sidebar) {
    if (!$this['widgets']->count($name)) {
        unset($sidebars[$name]);
        continue;
    }
    $width -= @$sidebar['width'];
}
foreach (($sidebars + array('main'=> array('width' => $width))) as $name => $column) {
	if(isset($column['first'])){
		$classes["layout.$name"][] = sprintf('gm_%s uk-width-medium-%s%s', $name, GridHelper::getFraction(@$column['width']), @$column['first'] ? ' uk-flex-order-first-medium' : '');
    }
    
    else{
	    $classes["layout.$name"][] = sprintf('gm_%s uk-width-medium-%s%s', $name, GridHelper::getFraction(@$column['width']), '');
    }
}
if ($count = count($sidebars)) {
    $classes['body'][] = 'gm_sidebars-'.$count;
}

/*
 * Grid
 */
$displays  = array('small', 'medium', 'large');
foreach (array_keys($config->get('grid', array())) as $name) {
    $grid = array("gm_{$name} uk-grid");
    if ($this['config']->get("grid.{$name}.divider", false)) {
        $grid[] = 'uk-grid-divider';
    }
    $widgets = $this['widgets']->load($name);
    foreach($displays as $display) {
        if (!array_filter($widgets, function($widget) use ($config, $display) { return (bool) $config->get("widgets.{$widget->id}.display.{$display}", true); })) {
            $grid[] = "uk-hidden-{$display}";
        }
    }
    $classes["grid.$name"] = $grid;
}

/*
 * Blocks
 */
$styles = array();
foreach (array_keys($config->get('blocks', array())) as $name) {
    $block = array();
    if ($this['config']->get("blocks.{$name}.background", false)) {
        $block[] = 'uk-block-' . $this['config']->get("blocks.{$name}.background");
    }
    if ($this['config']->get("blocks.{$name}.contrast", false)) {
        $block[] = 'uk-contrast';
    }
    if ($this['config']->get("blocks.{$name}.height", false)) {
        $block[] = 'uk-block-fullheight';
    }
    if ($this['config']->get("blocks.{$name}.width", false)) {
        $block[] = 'uk-block-fullwidth';
    }
    if ($this['config']->get("blocks.{$name}.collapse", false)) {
        $block[] = 'uk-grid-collapse';
    }
    if ($this['config']->get("blocks.{$name}.padding", false)) {
        $block[] = ($this['config']->get("blocks.{$name}.padding") == 'mini') ? 'uk-block-mini' : '';
	    $block[] = ($this['config']->get("blocks.{$name}.padding") == 'small') ? 'uk-block-small' : '';
	    $block[] = ($this['config']->get("blocks.{$name}.padding") == 'medium') ? 'uk-block-medium' : '';
        $block[] = ($this['config']->get("blocks.{$name}.padding") == 'large') ? 'uk-block-large' : '';
        $block[] = ($this['config']->get("blocks.{$name}.padding") == 'xlarge') ? 'uk-block-xlarge' : '';
        $block[] = ($this['config']->get("blocks.{$name}.padding") == 'none') ? 'uk-block-collapse' : '';
    }
    $styles["block.$name"] = '';
    if ($this['config']->get("blocks.{$name}.image", false)) {
        $styles["block.$name"] = 'style="background-image: url(\'' . $this['config']->get("blocks.{$name}.image") . '\');"';
        $block[] = 'uk-cover-background';
    }
    if ($this['config']->get("blocks.{$name}.image_blend", false) && $this['config']->get("blocks.{$name}.image", false)) {
        $block[] = 'gm_block-image-blend-' . $this['config']->get("blocks.{$name}.image_blend");
    }
    if ($this['config']->get("blocks.{$name}.image_opacity", false) && $this['config']->get("blocks.{$name}.image", false)) {
        $block[] = 'gm_block-image-opacity-' . $this['config']->get("blocks.{$name}.image_opacity");
    }
    if ($this['config']->get("blocks.{$name}.class", false)) {
        $block[] = ($this['config']->get("blocks.{$name}.class"));
    }
    $classes["block.$name"] = $block;

}

/*
 * Add body classes
 */
$classes['body'][] = $this['system']->isBlog() ? 'gm_isblog' : 'gm_noblog';
$classes['body'][] = $config->get('page_class');
$classes['body'][] = ' '.$config->get('article');

if($this['config']->get('dropdown_center')){
	$classes['body'][] = 'gm_dropdown-center';
}

if($this['config']->get('one_page')){
	$classes['body'][] = 'gm_one-page';
}

if($this['config']->get('title_section_kernburns')){
	$classes['body'][] = 'gm_title-section-kernburns';
}




/*
 * Sticky Navbar
 */
$sticky = array("media: ".$this['config']->get('navbar_mode_break'));
switch ($this['config']->get('navbar_mode', false)) {
    // Always sticky
    case '1':
    	$sticky[] = "top: -1";
        $sticky   = 'data-uk-sticky="{'.implode(',', array_filter($sticky)).'}"';
        $classes['body'][] = 'gm_with-sticky-menu';
        break;

    case '2':
    // Sticky and Fade animate
        $sticky[] = "top: -250";
        $sticky[] = "animation: 'uk-animation-fade'";
        $sticky   = 'data-uk-sticky="{'.implode(',', array_filter($sticky)).'}"';
        $classes['body'][] = 'gm_with-sticky-menu';
        break;
    
    case '3':
    // Sticky and Fade slide
        $sticky[] = "top: -250";
        $sticky[] = "animation: 'uk-animation-slide-top'";
        $sticky   = 'data-uk-sticky="{'.implode(',', array_filter($sticky)).'}"';
        $classes['body'][] = 'gm_with-sticky-menu';
        break;

    default:
    // Not Sticky
        $sticky   = '';
        break;
}

$navbar_config = array('sticky' => $sticky);

/*
 * Flatten classes
 */
$classes = array_map(function($array) { return implode(' ', $array); }, $classes);

/*
 * Add body classes to config
 */
$config->set('body_classes', $classes['body']);

/*
 * Add assets
 */

// add css
$this['asset']->addFile('css', 'css:style.css');

// add scripts

if ( function_exists( 'is_plugin_active' ) && !is_plugin_active ( 'widgetkit/widgetkit.php' ) ) {

    $this['asset']->addFile('js', 'warp:vendor/uikit/js/uikit.js');
}

/*$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/accordion.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/autocomplete.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/datepicker.js');*/
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/grid.js');
/*$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/grid-parallax.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/lightbox.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/notify.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/pagination.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/search.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/slideset.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/slideshow.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/slideshow-fx.js');*/
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/sticky.js');
/*$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/timepicker.js');
$this['asset']->addFile('js', 'warp:vendor/uikit/js/components/tooltip.js');*/

/*$this['asset']->addFile('js', 'js:libraries/jquery.nice-select.min.js');
$this['asset']->addFile('js', 'js:libraries/jquery.cookie.min.js');
$this['asset']->addFile('js', 'js:libraries/jquery.animateNumber.min.js');
$this['asset']->addFile('js', 'js:libraries/simplebar.min.js');
$this['asset']->addFile('js', 'js:libraries/swiper.min.js');
$this['asset']->addFile('js', 'js:libraries/swiper-widgets.js');
$this['asset']->addFile('js', 'js:libraries/simpleParallax.min.js');
$this['asset']->addFile('js', 'js:libraries/simpleParallax-widgets.js');*/
$this['asset']->addFile('js', 'js:libraries/datepicker-full.min.js');

$this['asset']->addFile('js', 'js:base/functions/website-url.js');
/*$this['asset']->addFile('js', 'js:base/functions/window-size.js');
$this['asset']->addFile('js', 'js:base/functions/header-offset.js');
$this['asset']->addFile('js', 'js:base/functions/window-onload-resize.js');*/

//$this['asset']->addFile('js', 'js:base/global/translations.js');

/*$this['asset']->addFile('js', 'js:base/global/links.js');
$this['asset']->addFile('js', 'js:base/global/nav.js');
$this['asset']->addFile('js', 'js:base/global/smooth-onepage.js');
$this['asset']->addFile('js', 'js:base/global/table-list.js');
$this['asset']->addFile('js', 'js:base/global/tables.js');
$this['asset']->addFile('js', 'js:base/global/video.js');*/

/*$this['asset']->addFile('js', 'js:base/blocks/block-kernburns.js');
$this['asset']->addFile('js', 'js:base/blocks/breadcrumb.js');
$this['asset']->addFile('js', 'js:base/blocks/copyright.js');
$this['asset']->addFile('js', 'js:base/blocks/counters.js');
$this['asset']->addFile('js', 'js:base/blocks/networks.js');
$this['asset']->addFile('js', 'js:base/blocks/show-more-section.js');*/

/*$this['asset']->addFile('js', 'js:base/blog/like-dislike.js');
$this['asset']->addFile('js', 'js:base/blog/related-posts.js');*/

$this['asset']->addFile('js', 'js:base/pages/login.js');

/*$this['asset']->addFile('js', 'js:base/forms/contact-form-7.js');
$this['asset']->addFile('js', 'js:base/forms/datepicker.js');
$this['asset']->addFile('js', 'js:base/forms/files.js');
$this['asset']->addFile('js', 'js:base/forms/select.js');*/

$this['asset']->addFile('js', 'js:invoices/date-filter.js');
$this['asset']->addFile('js', 'js:invoices/filters-and-pagination.js');
$this['asset']->addFile('js', 'js:invoices/mark-as-paid.js');
$this['asset']->addFile('js', 'js:invoices/toggle-all.js');

if ( is_plugin_active ( 'woocommerce/woocommerce.php' ) ) {

    $this['asset']->addFile('js', 'js:woocommerce/cart.js');
    $this['asset']->addFile('js', 'js:woocommerce/checkout.js');
    $this['asset']->addFile('js', 'js:woocommerce/quantity.js');
    
    $this['asset']->addFile('js', 'js:woocommerce/myaccount/edit-account.js');
    $this['asset']->addFile('js', 'js:woocommerce/myaccount/navigation.js');
    
    $this['asset']->addFile('js', 'js:woocommerce/single-product/add-to-cart.js');
    $this['asset']->addFile('js', 'js:woocommerce/single-product/ask-form.js');
    $this['asset']->addFile('js', 'js:woocommerce/single-product/gallery.js');
    
    $this['asset']->addFile('js', 'js:woocommerce/widgets/filter.js');
    $this['asset']->addFile('js', 'js:woocommerce/widgets/search.js');
    $this['asset']->addFile('js', 'js:woocommerce/widgets/user-menu.js');

}

$this['asset']->addFile('js', 'js:custom/custom.js');

if (isset($head)) {
    $this['template']->set('head', implode("\n", $head));
}

class GridHelper
{
    public static function gcf($a, $b = 60) {
        return (int) ($b > 0 ? self::gcf($b, $a % $b) : $a);
    }
    public static function getFraction($nominator, $divider = 60)  {
        $factor = self::gcf($nominator, $divider);
        return $nominator / $factor .'-'. $divider / $factor;
    }
}
