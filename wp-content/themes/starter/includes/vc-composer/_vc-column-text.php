<?php
	
	$vc_column_text_attributes = array(
		
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
			'type' => 'dropdown',
			'heading' => esc_html__( 'Text color', 'js_composer' ),
			'param_name' => 'text_color',
			'value' => array(
				esc_html__( 'Default', 'js_composer' ) => '',
				esc_html__( 'Primary', 'js_composer' ) => 'primary',
				esc_html__( 'Secondary', 'js_composer' ) => 'secondary',
				esc_html__( 'Dark', 'js_composer' ) => 'dark',
				esc_html__( 'White', 'js_composer' ) => 'white'
			)
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
		
	);

	vc_add_params( 'vc_column_text', $vc_column_text_attributes );
	
?>