<?php
	
	vc_remove_param( 'vc_section', 'video_bg' );
	vc_remove_param( 'vc_section', 'video_bg' );
	vc_remove_param( 'vc_section', 'video_bg_url' );
	vc_remove_param( 'vc_section', 'video_bg_parallax' );

	vc_remove_param( 'vc_section', 'parallax' );
	vc_remove_param( 'vc_section', 'parallax_image' );
	vc_remove_param( 'vc_section', 'parallax_speed_video' );
	vc_remove_param( 'vc_section', 'parallax_speed_bg' );

	$vc_section_attributes = array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Section container', 'js_composer' ),
			'param_name' => 'full_width',
			'value' => array(
				esc_html__( 'Default', 'js_composer' ) => '',
				esc_html__( 'Small', 'js_composer' ) => 'small',
				esc_html__( 'Large', 'js_composer' ) => 'large',
				esc_html__( 'Full', 'js_composer' ) => 'full'
			)
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Section vertical offset', 'js_composer' ),
			'param_name' => 'section_vertial_offset',
			'value' => array(
				esc_html__( 'Default', 'js_composer' ) => '',
				esc_html__( 'Mini', 'js_composer' ) => 'mini',
				esc_html__( 'Small', 'js_composer' ) => 'small',
				esc_html__( 'Medium', 'js_composer' ) => 'medium',
				esc_html__( 'Large', 'js_composer' ) => 'large',
				esc_html__( 'X-Large', 'js_composer' ) => 'xlarge',
				esc_html__( 'Collapse', 'js_composer' ) => 'collapse'
			)
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Section style', 'js_composer' ),
			'param_name' => 'section_style',
			'value' => array(
				esc_html__( 'Default', 'js_composer' ) => '',
				esc_html__( 'Muted', 'js_composer' ) => 'muted',
				esc_html__( 'Secondary', 'js_composer' ) => 'secondary',
				esc_html__( 'Primary', 'js_composer' ) => 'primary',
				esc_html__( 'Dark', 'js_composer' ) => 'dark'
			)
		),

		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Section contrast', 'js_composer' ),
			'param_name' => 'section_contrast',
			'value' => array( esc_html__( 'Yes', 'js_composer' ) => 'yes' ),
		),
		
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Background kernburns', 'js_composer' ),
			'param_name' => 'section_bg_kernburns',
			'value' => array( esc_html__( 'Yes', 'js_composer' ) => 'yes' ),
		),
		
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Title section', 'js_composer' ),
			'param_name' => 'title_section',
			'value' => array( esc_html__( 'Yes', 'js_composer' ) => 'yes' ),
		),
		
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Clear header section', 'js_composer' ),
			'param_name' => 'clear_header_section',
			'value' => array( esc_html__( 'Yes', 'js_composer' ) => 'yes' ),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Text align', 'js_composer' ),
			'param_name' => 'text_align',
			'value' => array(
				esc_html__( 'Inherit', 'js_composer' ) => '',
				esc_html__( 'Left', 'js_composer' ) => 'left',
				esc_html__( 'Right', 'js_composer' ) => 'right',
				esc_html__( 'Center', 'js_composer' ) => 'center'
			)
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Text Size', 'js_composer' ),
			'param_name' => 'text_size',
			'value' => array(
				esc_html__( 'Default', 'js_composer' ) => '',
				esc_html__( 'Small', 'js_composer' ) => 'small',
				esc_html__( 'Large', 'js_composer' ) => 'large'
			)
		),
		
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Padding top remove', 'js_composer' ),
			'param_name' => 'padding_top_remove',
			'value' => array( esc_html__( 'Yes', 'js_composer' ) => 'yes' ),
		),
		
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Padding bottom remove', 'js_composer' ),
			'param_name' => 'padding_bottom_remove',
			'value' => array( esc_html__( 'Yes', 'js_composer' ) => 'yes' ),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Margin top', 'js_composer' ),
			'param_name' => 'elem_margin_top',
			'value' => array(
				esc_html__( 'None', 'js_composer' ) => '',
				esc_html__( 'Small', 'js_composer' ) => 'small',
				esc_html__( 'Medium', 'js_composer' ) => 'medium',
				esc_html__( 'Default', 'js_composer' ) => 'default',
				esc_html__( 'Large', 'js_composer' ) => 'large',
				esc_html__( 'Xlarge', 'js_composer' ) => 'xlarge'
			)
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Margin bottom', 'js_composer' ),
			'param_name' => 'elem_margin_bottom',
			'value' => array(
				esc_html__( 'None', 'js_composer' ) => '',
				esc_html__( 'Small', 'js_composer' ) => 'small',
				esc_html__( 'Medium', 'js_composer' ) => 'medium',
				esc_html__( 'Default', 'js_composer' ) => 'default',
				esc_html__( 'Large', 'js_composer' ) => 'large',
				esc_html__( 'Xlarge', 'js_composer' ) => 'xlarge'
			)
		),
		
		array( 'type' => 'textfield', 'param_name' => 'sep-1', ),
		array( 'type' => 'textfield', 'param_name' => 'sep-2', ),
		array( 'type' => 'textfield', 'param_name' => 'sep-3', ),
		array( 'type' => 'textfield', 'param_name' => 'sep-4', ),
		array( 'type' => 'textfield', 'param_name' => 'sep-5', ),
		array( 'type' => 'textfield', 'param_name' => 'sep-6', )
		
	);

	vc_add_params( 'vc_section', $vc_section_attributes );
	
?>