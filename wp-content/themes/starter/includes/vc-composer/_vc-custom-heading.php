<?php
	
	vc_remove_param( 'vc_custom_heading', 'font_container' );
	vc_remove_param( 'vc_custom_heading', 'use_theme_fonts' );
	vc_remove_param( 'vc_custom_heading', 'google_fonts' );

	$vc_heading_attributes = array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Heading tag', 'js_composer' ),
			'param_name' => 'heading_tag',
			'value' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6')
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Heading align', 'js_composer' ),
			'param_name' => 'heading_align',
			'value' => array(
				esc_html__( 'Inherit', 'js_composer' ) => '',
				esc_html__( 'Left', 'js_composer' ) => 'left',
				esc_html__( 'Right', 'js_composer' ) => 'right',
				esc_html__( 'Center', 'js_composer' ) => 'center',
			)
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Heading style', 'js_composer' ),
			'param_name' => 'heading_style',
			'value' => array(
				esc_html__( 'Default', 'js_composer' ) => '',
				esc_html__( 'h1', 'js_composer' ) => 'h1',
				esc_html__( 'h2', 'js_composer' ) => 'h2',
				esc_html__( 'h3', 'js_composer' ) => 'h3',
				esc_html__( 'h4', 'js_composer' ) => 'h4',
				esc_html__( 'h5', 'js_composer' ) => 'h5',
				esc_html__( 'h6', 'js_composer' ) => 'h6',
				esc_html__( 'Heading large', 'js_composer' ) => 'heading-large',
				esc_html__( 'Article title', 'js_composer' ) => 'article-title'
			)
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Heading color', 'js_composer' ),
			'param_name' => 'heading_color',
			'value' => array(
				esc_html__( 'Default', 'js_composer' ) => '',
				esc_html__( 'Primary', 'js_composer' ) => 'primary',
				esc_html__( 'Secondary', 'js_composer' ) => 'secondary',
				esc_html__( 'Dark', 'js_composer' ) => 'dark',
				esc_html__( 'White', 'js_composer' ) => 'white'
			)
		),
		
		
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Heading uppercase', 'js_composer' ),
			'param_name' => 'heading_uppercase',
			'value' => array( esc_html__( 'Yes', 'js_composer' ) => 'yes' )
		),
		
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Margin top', 'js_composer' ),
			'param_name' => 'content_margin_top',
			'value' => array(
				esc_html__( 'Medium', 'js_composer' ) => '',
				esc_html__( 'Mini', 'js_composer' ) => 'mini',
				esc_html__( 'Small', 'js_composer' ) => 'small',
				esc_html__( 'Default', 'js_composer' ) => 'default',
				esc_html__( 'Large', 'js_composer' ) => 'large',
				esc_html__( 'Xlarge', 'js_composer' ) => 'xlarge',
				esc_html__( 'None', 'js_composer' ) => 'remove',
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
				esc_html__( 'None', 'js_composer' ) => 'remove',
			)
		),
		
		array( 'type' => 'textfield', 'param_name' => 'sep-1', ),
		array( 'type' => 'textfield', 'param_name' => 'sep-2', ),
		array( 'type' => 'textfield', 'param_name' => 'sep-3', ),
		
	);

	vc_add_params( 'vc_custom_heading', $vc_heading_attributes );
	
?>