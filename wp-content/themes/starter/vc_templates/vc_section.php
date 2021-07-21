<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $columns_placement
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $parallax_speed_bg
 * @var $parallax_speed_video
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var WPBakeryShortCode_Vc_Row $this
 */
$el_class = $full_height = $parallax_speed_bg = $parallax_speed_video = $full_width = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $css_animation = '';
$disable_element = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
	'gm_section uk-block',
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);

if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

if ( vc_shortcode_custom_css_has_property( $css, array( 'background' ) ) ) {
	$css_classes[] = 'gm_filled';
}


$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

if ( ! empty( $full_height ) ) {
	$css_classes[] = 'uk-height-full';
}

if ( ! empty( $section_vertial_offset ) ) {
	$css_classes[] = 'uk-block-' . $section_vertial_offset;
}

if ( ! empty( $section_style ) ) {
	$css_classes[] = 'uk-block-' . $section_style;
}

if ( ! empty( $section_contrast ) ) {
	$css_classes[] = 'uk-contrast';
}

if ( ! empty( $section_bg_kernburns ) ) {
	$css_classes[] = 'gm_block-kernburns';
}

if ( ! empty( $title_section ) ) {
	$css_classes[] = 'gm_block-title-section';
}

if ( ! empty( $clear_header_section ) ) {
	$css_classes[] = 'gm_clear-header-section';
}


$full_width_classes = '';

if ( ! empty( $full_width ) ) {
	$full_width_classes = ' uk-container-' . $full_width;
}


if ( ! empty( $content_placement ) ) {
	$css_classes[] = 'uk-flex-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'uk-flex uk-flex-center';
}

if ( ! empty( $text_align ) ) {
	$css_classes[] = 'uk-text-'.$text_align;
}

if ( ! empty( $text_size ) ) {
	$css_classes[] = 'uk-text-' . $text_size;
}

if ( ! empty( $padding_top_remove ) ) {
	$css_classes[] = 'uk-padding-top-remove';
}

if ( ! empty( $padding_bottom_remove ) ) {
	$css_classes[] = 'uk-padding-bottom-remove';
}

if ( ! empty( $elem_margin_top ) ) {
	
	if ( $elem_margin_top == 'default' ){
		$css_classes[] = 'uk-margin-top';
	}
	
	else{
		$css_classes[] = 'uk-margin-top-' . $elem_margin_top;
	}
}

if ( ! empty( $elem_margin_bottom ) ) {
	
	if ( $elem_margin_bottom == 'default' ){
		$css_classes[] = 'uk-margin-bottom';
	}
	
	else{
		$css_classes[] = 'uk-margin-bottom-' . $elem_margin_bottom;
	}
}


$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<section ' . implode( ' ', $wrapper_attributes ) . '>';
$output .= '<div class="uk-container uk-container-center'.$full_width_classes.'">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</section>';

return $output;
