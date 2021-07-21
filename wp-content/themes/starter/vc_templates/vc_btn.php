<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/**
 * Shortcode attributes
 * @var $atts
 * @var $style
 * @var $shape
 * @var $color
 * @var $custom_background
 * @var $custom_text
 * @var $size
 * @var $align
 * @var $link
 * @var $title
 * @var $button_block
 * @var $el_id
 * @var $el_class
 * @var $outline_custom_color
 * @var $outline_custom_hover_background
 * @var $outline_custom_hover_text
 * @var $add_icon
 * @var $i_align
 * @var $i_type
 * @var $i_icon_fontawesome
 * @var $i_icon_openiconic
 * @var $i_icon_typicons
 * @var $i_icon_entypo
 * @var $i_icon_linecons
 * @var $i_icon_pixelicons
 * @var $css_animation
 * @var $css
 * @var $gradient_color_1
 * @var $gradient_color_2
 * @var $gradient_custom_color_1 ;
 * @var $gradient_custom_color_2 ;
 * @var $gradient_text_color ;
 * Shortcode class
 * @var WPBakeryShortCode_Vc_Btn $this
 */
$style = $shape = $color = $size = $custom_background = $custom_text = $align = $link = $title = $button_block = $el_class = $outline_custom_color = $outline_custom_hover_background = $outline_custom_hover_text = $add_icon = $i_align = $i_type = $i_icon_entypo = $i_icon_fontawesome = $i_icon_linecons = $i_icon_pixelicons = $i_icon_typicons = $css = $css_animation = '';
$gradient_color_1 = $gradient_color_2 = $gradient_custom_color_1 = $gradient_custom_color_2 = $gradient_text_color = '';
$custom_onclick = $custom_onclick_code = '';
$a_href = $a_title = $a_target = $a_rel = '';
$styles = array();
$icon_wrapper = false;
$icon_html = false;
$attributes = array();

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
// parse link
$link = trim( $link );
$link = ( '||' === $link ) ? '' : $link;
$link = vc_build_link( $link );
$use_link = false;
if ( strlen( $link['url'] ) > 0 ) {
	$use_link = true;
	$a_href = $link['url'];
	$a_href = apply_filters( 'vc_btn_a_href', $a_href );
	$a_title = $link['title'];
	$a_title = apply_filters( 'vc_btn_a_title', $a_title );
	$a_target = $link['target'];
	$a_rel = $link['rel'];
}

$wrapper_classes = array(
	'gm_btn-container',
	'gm_content-element',
	$this->getExtraClass( $el_class ),
	$this->getCSSAnimation( $css_animation )
);

if ( ! empty( $align ) ) {
	$wrapper_classes[] = 'uk-text-' . $align;
}


if ( ! empty( $content_margin_top ) ) {
	$wrapper_classes[] = 'gm_content-element--margin-top-' . $content_margin_top;
}

if ( ! empty( $atts['content_margin_bottom'] ) ) {
	$wrapper_classes[] = 'gm_content-element--margin-bottom-' . $content_margin_bottom;
}


$button_classes = array(
	'uk-button'
);

if ( ! empty( $size ) ) {
	$button_classes[] = 'uk-button-' . $size;
}

if ( ! empty( $style ) ) {
	$button_classes[] = 'uk-button-' . $style;
}

$button_html = '<span>' . $title . '</span>';

if ( '' === trim( $title ) ) {
	$button_html = '';
}

if ( ! empty( $width ) ) {
	
	if ( $width == 'fixed' ) {
		
		$button_classes[] = 'uk-form-width-medium';
	}
	
	else if ( $width == 'full' ) {
		
		$button_classes[] = 'uk-width-1-1';
	}
}


if ( $text_uppercase ) {
	$button_classes[] = 'uk-text-uppercase';
}

if ( 'true' === $add_icon ) {
	$button_classes[] = 'gm_btn-icon-' . $i_align;
	vc_icon_element_fonts_enqueue( $i_type );

	if ( isset( ${'i_icon_' . $i_type} ) ) {
		if ( 'pixelicons' === $i_type ) {
			$icon_wrapper = true;
		}
		$icon_class = ${'i_icon_' . $i_type};
	} else {
		$icon_class = 'fa fa-adjust';
	}

	if ( $icon_wrapper ) {
		$icon_html = '<i class="vc_btn3-icon"><span class="vc_btn3-icon-inner ' . esc_attr( $icon_class ) . '"></span></i>';
	} else {
		$icon_html = '<i class="vc_btn3-icon ' . esc_attr( $icon_class ) . '"></i>';
	}

	if ( 'left' === $i_align ) {
		$button_html = $icon_html . $button_html;
	} else {
		$button_html .= $icon_html;
	}
}
$output = '';

$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );


if ( $use_link ) {
	$attributes[] = 'href="' . esc_url( trim( $a_href ) ) . '"';
	$attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
	if ( ! empty( $a_target ) ) {
		$attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
	}
	if ( ! empty( $a_rel ) ) {
		$attributes[] = 'rel="' . esc_attr( trim( $a_rel ) ) . '"';
	}
}

if ( $open_modal ) {
	$attributes[] = 'data-uk-modal';
}

if ( $smooth_scroll ) {
	$button_classes[] = 'gm_smooth-scroll';
}

if ( ! empty( $custom_onclick ) && $custom_onclick_code ) {
	$attributes[] = 'onclick="' . esc_attr( $custom_onclick_code ) . '"';
}

if ( $button_classes ) {
	$button_classes = esc_attr( apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $button_classes ) ), $this->settings['base'], $atts ) );
	$attributes[] = 'class="' . trim( $button_classes ) . '"';
}


$attributes = implode( ' ', $attributes );

$output .= '<div class="' . esc_attr( trim( $css_class ) ) . '"' . ( ! empty( $el_id ) ? ' id="' . esc_attr( $el_id ) . '"' : '' ) . ' >';

if ( $use_link ) {
	$output .= '<a ' . $attributes . '>' . $button_html . '</a>';
} else {
	$output .= '<button ' . $attributes . '>' . $button_html . '</button>';
}

$output .= '</div>';

return $output;
