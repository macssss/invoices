<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $el_id
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 * Shortcode class
 * @var WPBakeryShortCode_Vc_Column_Inner $this
 */
$el_class = $width = $el_id = $css = $offset = '';
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

$css_classes = array(
	'gm_column',
	$this->getExtraClass( $el_class ),
	$width,
);

if ( vc_shortcode_custom_css_has_property( $css, array(
	'background',
) ) ) {
	$css_classes[] = 'gm_filled';
}

if ( ! empty( $column_order ) ) {
	
	if ( empty( $column_order_media_min ) ) {
		$css_classes[] = 'uk-flex-order-' . $column_order;
	}
	
	else {
		$css_classes[] = 'uk-flex-order-' . $column_order . '-' . $column_order_media_min;
	}
}

if ( ! empty( $text_align ) ) {
	$css_classes[] = 'uk-text-'.$text_align;
}

if ( ! empty( $text_size ) ) {
	$css_classes[] = 'uk-text-' . $text_size;
}

$wrapper_attributes = array();

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
$innerColumnClass = 'gm_column-inner ' . esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) );
$output .= '<div class="' . trim( $innerColumnClass ) . '">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</div>';

echo $output;
