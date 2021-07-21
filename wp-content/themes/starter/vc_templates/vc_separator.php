<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var string $el_width
 * @var string $style
 * @var string $color
 * @var string $border_width
 * @var string $accent_color
 * @var string $el_class
 * @var string $el_id
 * @var string $align
 * @var string $css
 * @var string $css_animation
 * Shortcode class
 * @var WPBakeryShortCode_Vc_Separator $this
 */
$el_width = $style = $color = $border_width = $accent_color = $el_class = $el_id = $align = $css = $css_animation = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array();


if ( ! empty( $content_margin_top ) ) {
	$css_classes[] = 'gm_content-element--margin-top-' . $content_margin_top;
}

if ( ! empty( $atts['content_margin_bottom'] ) ) {
	$css_classes[] = 'gm_content-element--margin-bottom-' . $content_margin_bottom;
}

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );

$vc_text_separator = visual_composer()->getShortCode( 'vc_text_separator' );
$atts['el_class'] = $css_class;
if ( is_object( $vc_text_separator ) ) {
	$output = '<hr class="gm_separator gm_content-element '.$css_class.'" />';
	return $output;
}
