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
 * @var $equal_height
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
$el_class = $full_height = $parallax_speed_bg = $parallax_speed_video = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $css_animation = '';
$disable_element = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
	'gm_row',
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

if ( vc_shortcode_custom_css_has_property( $css, array(
	'background',
) ) 
) {
	$css_classes[] = 'gm_filled';
}


if ( ! empty( $panel_box ) ) {
	$css_classes[] = 'uk-panel uk-panel-box';
	
	if ( ! empty($panel_box_style) ) {
		$css_classes[] = 'uk-panel-'.$panel_box_style;
	}
	
	if ( ! empty($panel_box_contrast) ) {
		$css_classes[] = 'uk-contrast';
	}
	
	if ( ! empty($panel_box_contrast_reset) ) {
		$css_classes[] = 'uk-contrast-reset';
	}
}

else {
	$css_classes[] = 'uk-grid';
}


if ( ! empty( $gap ) && empty( $panel_box ) ) {
	$css_classes[] = 'uk-grid-' . $atts['gap'];
}

if ( ! empty( $vertical_gap ) && empty( $panel_box ) ) {
	$css_classes[] = 'uk-grid-vertical-' . $atts['vertical_gap'];
}

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

if ( ! empty( $columns_placement ) ) {
	$css_classes[] = 'uk-flex-' . $columns_placement;
}


if ( ! empty( $content_placement ) ) {
	$content_place = $content_placement;
	
	if ( $content_place == 'middle' && $middle_media_min ){
		$content_place = $middle_media_min;
	}
	
	$css_classes[] = 'uk-flex-' . $content_place;
}

if ( ! empty( $text_align ) ) {
	$css_classes[] = 'uk-text-'.$text_align;
}

if ( ! empty( $text_size ) ) {
	$css_classes[] = 'uk-text-' . $text_size;
}

if ( ! empty( $elem_margin_top ) ) {
	
	if ( $elem_margin_top == 'none' ){
		$css_classes[] = 'uk-margin-top-remove';
	}
	
	elseif ( $elem_margin_top == 'default' ){
		$css_classes[] = 'uk-margin-top';
	}
	
	else{
		$css_classes[] = 'uk-margin-top-' . $elem_margin_top;
	}
}

if ( ! empty( $elem_margin_bottom ) ) {
	
	if ( $elem_margin_bottom == 'none' ){
		$css_classes[] = 'uk-margin-bottom-remove';
	}
	
	elseif ( $elem_margin_bottom == 'default' ){
		$css_classes[] = 'uk-margin-bottom';
	}
	
	else{
		$css_classes[] = 'uk-margin-bottom-' . $elem_margin_bottom;
	}
}

if ( empty( $panel_box ) ) {
	$wrapper_attributes[] = 'data-uk-grid-margin';
}

if ( ! empty( $columns_animation ) ) {
	$wrapper_attributes[] = 'data-uk-scrollspy="{cls:\'uk-animation-' . $columns_animation . '\', target:\'> .gm_column > .gm_column-inner\', delay: ' . $columns_animation_delay . '}"';
}


$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= $after_output;

echo $output;
