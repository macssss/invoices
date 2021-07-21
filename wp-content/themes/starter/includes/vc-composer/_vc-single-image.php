<?php
	
	vc_remove_param( 'vc_single_image', 'title' );
	vc_remove_param( 'vc_single_image', 'add_caption' );
	
	
	$border_color_value = array_merge(
		array(
			esc_html__( 'Primary', 'js_composer' ) => 'primary',
			esc_html__( 'Secondary', 'js_composer' ) => 'secondary',
			esc_html__( 'Dark', 'js_composer' ) => 'dark'
		),
		
		vc_get_shared( 'colors' )
	);
	
	$vc_single_image_attributes = array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Image alignment', 'js_composer' ),
			'param_name' => 'alignment',
			'value' => array(
				esc_html__( 'Inherit', 'js_composer' ) => '',
				esc_html__( 'Left', 'js_composer' ) => 'left',
				esc_html__( 'Right', 'js_composer' ) => 'right',
				esc_html__( 'Center', 'js_composer' ) => 'center',
			),
			'description' => esc_html__( 'Select image alignment.', 'js_composer' ),
		),
		
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Image size', 'js_composer' ),
			'param_name' => 'img_size',
			'value' => '',
			'description' => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'js_composer' ),
			'dependency' => array(
				'element' => 'source',
				'value' => array(
					'media_library',
					'featured_image',
				),
			),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Image ratio', 'js_composer' ),
			'param_name' => 'img_ratio',
			'value' => array(
				esc_html__( 'Default', 'js_composer' ) => '',
				esc_html__( 'Rectangle Ratio', 'js_composer' ) => 'rectangle',
				esc_html__( 'Sqaure Ratio', 'js_composer' ) => 'square',
			)
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Ratio break', 'js_composer' ),
			'param_name' => 'ratio_break',
			'value' => array(
				esc_html__( 'No Break', 'js_composer' ) => '',
				esc_html__( 'Small', 'js_composer' ) => 'small',
				esc_html__( 'Medium', 'js_composer' ) => 'medium',
				esc_html__( 'Large', 'js_composer' ) => 'large',
				esc_html__( 'Xlarge', 'js_composer' ) => 'xlarge',
			),
			
			'dependency' => array(
				'element' => 'img_ratio',
				'value' => array(
					'rectangle',
					'square'
				)
			),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Border color', 'js_composer' ),
			'param_name' => 'border_color',
			'value' => $border_color_value,
			'std' => 'grey',
			'dependency' => array(
				'element' => 'style',
				'value' => array(
					'vc_box_border',
					'vc_box_border_circle',
					'vc_box_outline',
					'vc_box_outline_circle',
					'vc_box_border_circle_2',
					'vc_box_outline_circle_2',
				),
			),
			'description' => esc_html__( 'Border color.', 'js_composer' ),
			'param_holder_class' => 'vc_colored-dropdown',
		),
		
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Image wrapper width', 'js_composer' ),
			'param_name' => 'image_wrapper_width'
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Border color', 'js_composer' ),
			'param_name' => 'external_border_color',
			'value' => $border_color_value,
			'std' => 'grey',
			'dependency' => array(
				'element' => 'external_style',
				'value' => array(
					'vc_box_border',
					'vc_box_border_circle',
					'vc_box_outline',
					'vc_box_outline_circle',
				),
			),
			'description' => esc_html__( 'Border color.', 'js_composer' ),
			'param_holder_class' => 'vc_colored-dropdown',
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'On click action', 'js_composer' ),
			'param_name' => 'onclick',
			'value' => array(
				esc_html__( 'None', 'js_composer' ) => '',
				esc_html__( 'Link to large image', 'js_composer' ) => 'img_link_large',
				esc_html__( 'Open lightbox', 'js_composer' ) => 'link_image',
				esc_html__( 'Open custom link', 'js_composer' ) => 'custom_link',
				esc_html__( 'Zoom', 'js_composer' ) => 'zoom',
			),
			'description' => esc_html__( 'Select action for click action.', 'js_composer' ),
			'std' => '',
		),
		
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Image title', 'js_composer' ),
			'param_name' => 'image_title',
			'dependency' => array(
				'element' => 'onclick',
				'value' => 'link_image',
			),
		),
		
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Open lightbox', 'js_composer' ),
			'param_name' => 'open_ligthbox',
			'value' => array( esc_html__( 'Yes', 'js_composer' ) => 'yes' ),
			'dependency' => array(
				'element' => 'onclick',
				'value' => 'custom_link'
			),
		),
		
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Video', 'js_composer' ),
			'param_name' => 'video_link',
			'value' => array( esc_html__( 'Yes', 'js_composer' ) => 'yes' ),
			'dependency' => array(
				'element' => 'onclick',
				'value' => 'custom_link'
			),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Video button position', 'js_composer' ),
			'param_name' => 'video_button_position',
			'value' => array(
				esc_html__( 'Default', 'js_composer' ) => '',
				esc_html__( 'Top Left', 'js_composer' ) => 'top-left',
				esc_html__( 'Top Right', 'js_composer' ) => 'top-right',
				esc_html__( 'Bottom Left', 'js_composer' ) => 'bottom-left',
				esc_html__( 'Bottom Right', 'js_composer' ) => 'bottom-right'
			),
			'dependency' => array(
				'element' => 'video_link',
				'value' => 'yes'
			),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Video button size', 'js_composer' ),
			'param_name' => 'video_button_size',
			'value' => array(
				esc_html__( 'Default', 'js_composer' ) => '',
				esc_html__( 'Small', 'js_composer' ) => 'small'
			),
			'dependency' => array(
				'element' => 'video_link',
				'value' => 'yes'
			),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Margin top', 'js_composer' ),
			'param_name' => 'content_margin_top',
			'value' => array(
				esc_html__( 'Small', 'js_composer' ) => '',
				esc_html__( 'Mini', 'js_composer' ) => 'mini',
				esc_html__( 'Medium', 'js_composer' ) => 'medium',
				esc_html__( 'Default', 'js_composer' ) => 'default',
				esc_html__( 'Large', 'js_composer' ) => 'large',
				esc_html__( 'Xlarge', 'js_composer' ) => 'xlarge',
				esc_html__( 'None', 'js_composer' ) => 'remove'
			)
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Margin bottom', 'js_composer' ),
			'param_name' => 'content_margin_bottom',
			'value' => array(
				esc_html__( 'Small', 'js_composer' ) => '',
				esc_html__( 'Mini', 'js_composer' ) => 'mini',
				esc_html__( 'Medium', 'js_composer' ) => 'medium',
				esc_html__( 'Default', 'js_composer' ) => 'default',
				esc_html__( 'Large', 'js_composer' ) => 'large',
				esc_html__( 'Xlarge', 'js_composer' ) => 'xlarge',
				esc_html__( 'None', 'js_composer' ) => 'remove'
			)
		),
		
		array( 'type' => 'textfield', 'param_name' => 'sep-1', ),
		array( 'type' => 'textfield', 'param_name' => 'sep-2', ),
		array( 'type' => 'textfield', 'param_name' => 'sep-3', 'dependency' => array( 'element' => 'onclick', 'value' => 'custom_link' ) ),
		array( 'type' => 'textfield', 'param_name' => 'sep-4', ),
		array( 'type' => 'textfield', 'param_name' => 'sep-5', ),
		array( 'type' => 'textfield', 'param_name' => 'sep-6', ),
		
	);

	vc_add_params( 'vc_single_image', $vc_single_image_attributes );
	
?>