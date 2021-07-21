<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $source
 * @var $text
 * @var $link
 * @var $google_fonts
 * @var $font_container
 * @var $el_class
 * @var $el_id
 * @var $css
 * @var $css_animation
 * @var $font_container_data - returned from $this->getAttributes
 * @var $google_fonts_data - returned from $this->getAttributes
 * Shortcode class
 * @var WPBakeryShortCode_Vc_Custom_heading $this
 */
$source = $text = $link = $google_fonts = $font_container = $el_id = $el_class = $css = $css_animation = $font_container_data = $google_fonts_data = array();

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

/**
 * @var $css_class
 */
$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
	$el_class,
	'gm_heading'
);

if ( ! empty( $heading_align ) ) {
	$css_classes[] = 'uk-text-' . $heading_align;
}

if ( ! empty( $heading_style ) ) {
	$css_classes[] = 'uk-' . $heading_style;
}

if ( ! empty( $heading_color ) ) {
	$css_classes[] = 'uk-text-' . $heading_color;
}

if ( $heading_uppercase ) {
    $css_classes[] = 'uk-text-uppercase';
}

if ( ! empty( $content_margin_top ) ) {
	
	if ( $content_margin_top == 'default' ) { $css_classes[] = 'uk-margin-top'; }
	else { $css_classes[] = 'uk-margin-top-' . $content_margin_top; }
}

if ( ! empty( $content_margin_bottom ) ) {
	
	if ( $content_margin_bottom == 'default' ) { $css_classes[] = 'uk-margin-bottom'; }
	else { $css_classes[] = 'uk-margin-bottom-' . $content_margin_bottom; }
}


if ( 'post_title' === $source ) {
	$text = get_the_title( get_the_ID() );
}

$text = '<span>' . $text . '</span>';

if ( ! empty( $link ) ) {
	$link = vc_build_link( $link );
	$text = '<a href="' . esc_url( $link['url'] ) . '"' . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' ) . ( $link['rel'] ? ' rel="' . esc_attr( $link['rel'] ) . '"' : '' ) . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' ) . '>' . $text . '</a>';
}

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );

$output = '';
$output .= '<' . $heading_tag . ' class="' . esc_attr( $css_class ) . '">';
$output .= $text;
$output .= '</' . $heading_tag . '>';

return $output;
