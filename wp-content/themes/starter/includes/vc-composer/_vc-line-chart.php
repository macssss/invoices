<?php
	
	vc_remove_param( 'vc_line_chart', 'title' );
	vc_remove_param( 'vc_line_chart', 'style' );
	
	$vc_line_chart_attributes = array(
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
		array( 'type' => 'textfield', 'param_name' => 'sep-3', ),
		array( 'type' => 'textfield', 'param_name' => 'sep-4', )
		
	);

	vc_add_params( 'vc_line_chart', $vc_line_chart_attributes );
	
?>