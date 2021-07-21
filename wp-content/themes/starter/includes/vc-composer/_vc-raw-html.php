<?php

	$vc_raw_html_attributes = array(
		
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Contrast reset', 'js_composer' ),
			'param_name' => 'contrast_reset',
			'value' => array( esc_html__( 'Yes', 'js_composer' ) => 'yes' ),
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
		array( 'type' => 'textfield', 'param_name' => 'sep-3', )
	);

	vc_add_params( 'vc_raw_html', $vc_raw_html_attributes );
	
?>