<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $source
 * @var $image
 * @var $custom_src
 * @var $onclick
 * @var $img_size
 * @var $external_img_size
 * @var $caption
 * @var $img_link_large
 * @var $link
 * @var $img_link_target
 * @var $alignment
 * @var $el_class
 * @var $el_id
 * @var $css_animation
 * @var $style
 * @var $external_style
 * @var $border_color
 * @var $css
 * Shortcode class
 * @var WPBakeryShortCode_Vc_Single_image $this
 */
$title = $source = $image = $custom_src = $onclick = $img_size = $external_img_size = $caption = $img_link_large = $link = $img_link_target = $alignment = $el_class = $el_id = $css_animation = $style = $external_style = $border_color = $css = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$default_src = vc_asset_url( 'vc/no_image.png' );

// backward compatibility. since 4.6
if ( empty( $onclick ) && isset( $img_link_large ) && 'yes' === $img_link_large ) {
	$onclick = 'img_link_large';
} elseif ( empty( $atts['onclick'] ) && ( ! isset( $atts['img_link_large'] ) || 'yes' !== $atts['img_link_large'] ) ) {
	$onclick = 'custom_link';
}

if ( 'external_link' === $source ) {
	$style = $external_style;
	$border_color = $external_border_color;
}

$border_color = ( '' !== $border_color ) ? ' vc_box_border_' . $border_color : '';

$img = false;

switch ( $source ) {
	case 'media_library':
	case 'featured_image':
		if ( 'featured_image' === $source ) {
			$post_id = get_the_ID();
			if ( $post_id && has_post_thumbnail( $post_id ) ) {
				$img_id = get_post_thumbnail_id( $post_id );
			} else {
				$img_id = 0;
			}
		} else {
			$img_id = preg_replace( '/[^\d]/', '', $image );
		}

		// set rectangular
		if ( preg_match( '/_circle_2$/', $style ) ) {
			$img_size = $this->getImageSquareSize( $img_id, $img_size );
		}

		if ( ! $img_size ) {
			$img_size = 'medium';
		}

		$img = wpb_getImageBySize( array(
			'attach_id' => $img_id,
			'thumb_size' => $img_size,
			'class' => 'gm_single-image-img',
		) );

		// don't show placeholder in public version if post doesn't have featured image
		if ( 'featured_image' === $source ) {
			if ( ! $img && 'page' === vc_manager()->mode() ) {
				return;
			}
		}

		break;

	case 'external_link':
		$dimensions = vc_extract_dimensions( $external_img_size );
		$hwstring = $dimensions ? image_hwstring( $dimensions[0], $dimensions[1] ) : '';

		$custom_src = $custom_src ? $custom_src : $default_src;

		$img = array(
			'thumbnail' => '<img class="gm_single-image-img" ' . $hwstring . ' src="' . esc_url( $custom_src ) . '" />',
		);
		break;

	default:
		$img = false;
}

if ( ! $img ) {
	$img['thumbnail'] = '<img class="gm_img-placeholder gm_single-image-img" src="' . esc_url( $default_src ) . '" />';
}

$el_class = $this->getExtraClass( $el_class );


// backward compatibility. will be removed in 4.7+
if ( ! empty( $atts['img_link'] ) ) {
	$link = $atts['img_link'];
	if ( ! preg_match( '/^(https?\:\/\/|\/\/)/', $link ) ) {
		$link = 'http://' . $link;
	}
}

// backward compatibility
if ( in_array( $link, array(
	'none',
	'link_no',
), true ) ) {
	$link = '';
}

$a_attrs = array();

switch ( $onclick ) {
	case 'img_link_large':
		if ( 'external_link' === $source ) {
			$link = $custom_src;
		} else {
			$link = wp_get_attachment_image_src( $img_id, 'large' );
			$link = $link[0];
		}

		break;

	case 'link_image':

		$a_attrs['data-uk-lightbox'] = '';
		
		if ( $image_title ) {
			$a_attrs['title'] = $image_title;
		}

		// backward compatibility
		if ( 'external_link' === $source ) {
			$link = $custom_src;
		} else {
			$link = wp_get_attachment_image_src( $img_id, 'large' );
			$link = $link[0];
		}

		break;

	case 'custom_link':
		// $link is already defined
		
		if ( 'yes' === $open_ligthbox ) {
			$a_attrs['data-uk-lightbox'] = '';
		}
		
		break;

	case 'zoom':
		wp_enqueue_script( 'vc_image_zoom' );

		if ( 'external_link' === $source ) {
			$large_img_src = $custom_src;
		} else {
			$large_img_src = wp_get_attachment_image_src( $img_id, 'large' );
			if ( $large_img_src ) {
				$large_img_src = $large_img_src[0];
			}
		}

		$img['thumbnail'] = str_replace( '<img ', '<img data-vc-zoom="' . $large_img_src . '" ', $img['thumbnail'] );

		break;
}



$wrapperClass = 'vc_single_image-wrapper ' . $style . ' ' . $border_color;
$wrapperStyle = '';

if ( ! empty( $image_wrapper_width ) ) {
	$wrapperStyle = ' style="width: ' . $image_wrapper_width . ';"';
}

$html = $img['thumbnail'];

if ( $link ) {
	$a_attrs['href'] = $link;
	$a_attrs['target'] = $img_link_target;
	$html .= '<a ' . vc_stringify_attributes( $a_attrs ) . ' class="uk-position-cover"></a>';
}


$wrapper_classes = array(
	'gm_single-image',
	'gm_content-element',
	'wpb_single_image',
	$this->getExtraClass( $el_class ),
	$this->getCSSAnimation( $css_animation )
);


if ( ! empty( $img_ratio ) ) {
	$wrapper_classes[] = 'gm_single-image--ratio';
	$wrapper_classes[] = 'gm_single-image--ratio--' . $img_ratio;
	
	if ( ! empty( $ratio_break ) ) {
		$wrapper_classes[] = 'gm_single-image--ratio--break-' . $ratio_break;
	}
}


if ( ! empty( $video_link && $onclick === 'custom_link' ) ) {
	$wrapper_classes[] = ' gm_video-link';
	
	if ( $video_button_position ) {
		$wrapper_classes[] = 'gm_video-link--pos-' . $video_button_position;
	}
	
	if ( $video_button_size ) {
		$wrapper_classes[] = 'gm_video-link--size-' . $video_button_size;
	}
}


if ( ! empty( $alignment ) ) {
	$wrapper_classes[] = 'uk-flex uk-flex-' . $alignment;
}


if ( ! empty( $content_margin_top ) ) {
	$wrapper_classes[] = 'gm_content-element--margin-top-' . $content_margin_top;
}


if ( ! empty( $content_margin_bottom ) ) {
	$wrapper_classes[] = 'gm_content-element--margin-bottom-' . $content_margin_bottom;
}


$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );



$wrapper_attributes = array();
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
$output = '
	<div ' . implode( ' ', $wrapper_attributes ) . ' class="' . esc_attr( trim( $css_class ) ) . '">
		<figure class="gm_overlay uk-overlay ' . $wrapperClass . '" '. $wrapperStyle .'>
			' . $html . '
		</figure>
	</div>
';

return $output;
