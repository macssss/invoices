<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $el_id
 * @var $css_animation
 * @var $css
 * @var $content - shortcode content
 * Shortcode class
 * @var WPBakeryShortCode_Vc_Column_text $this
 */
$el_class = $el_id = $css = $css_animation = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
	'gm_column-text',
	'gm_content-element',
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);

if ( ! empty( $text_size ) ) {
	$css_classes[] = 'uk-text-' . $text_size;
}

if ( ! empty( $text_color ) ) {
	$css_classes[] = 'uk-text-' . $text_color;
}

if ( ! empty( $content_margin_top ) ) {
	$css_classes[] = 'gm_content-element--margin-top-' . $content_margin_top;
}

if ( ! empty( $atts['content_margin_bottom'] ) ) {
	$css_classes[] = 'gm_content-element--margin-bottom-' . $content_margin_bottom;
}


$wrapper_attributes = array();
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}



$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );

$output = '
	<div class="' . esc_attr( $css_class ) . '" ' . implode( ' ', $wrapper_attributes ) . '>
		' . wpb_js_remove_wpautop( $content, true ) . '
	</div>
';

echo $output;
