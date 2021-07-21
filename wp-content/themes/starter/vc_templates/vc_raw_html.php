<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $el_id
 * @var $content - shortcode content
 * @var $css
 * Shortcode class
 * @var WPBakeryShortCode_Vc_Raw_html $this
 */
$el_class = $el_id = $css = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$content = rawurldecode( base64_decode( wp_strip_all_tags( $content ) ) );
$content = wpb_js_remove_wpautop( apply_filters( 'vc_raw_html_module_content', $content ) );

$el_class = $this->getExtraClass( $el_class );

$css_classes = array(
	'gm_raw-code',
	'gm_content-element',
	( ( 'vc_raw_html' === $this->settings['base'] ) ? 'gm_raw-html' : 'gm_raw-js' ),
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);

if ( ! empty( $contrast_reset ) ) {
	$css_classes[] = 'uk-contrast-reset';
}

if ( ! empty( $content_margin_top ) ) {
	$css_classes[] = 'gm_content-element--margin-top-' . $content_margin_top;
}

if ( ! empty( $atts['content_margin_bottom'] ) ) {
	$css_classes[] = 'gm_content-element--margin-bottom-' . $content_margin_bottom;
}


$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );


$wrapper_attributes = array();
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
$output = '
	<div class="' . esc_attr( $css_class ) . '" ' . implode( ' ', $wrapper_attributes ) . '>
		' . $content . '
	</div>
';

return $output;
