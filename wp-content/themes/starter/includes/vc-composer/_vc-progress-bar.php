<?php
	
	vc_remove_param( 'vc_progress_bar', 'title' );
	
	$color_value = array_merge(
		array(
			esc_html__( 'Default', 'js_composer' ) => '',
		),
		
		array(
			esc_html__( 'Primary', 'js_composer' ) => 'primary',
			esc_html__( 'Secondary', 'js_composer' ) => 'secondary',
			esc_html__( 'Dark', 'js_composer' ) => 'dark',
			esc_html__( 'Classic Grey', 'js_composer' ) => 'bar_grey',
			esc_html__( 'Classic Blue', 'js_composer' ) => 'bar_blue',
			esc_html__( 'Classic Turquoise', 'js_composer' ) => 'bar_turquoise',
			esc_html__( 'Classic Green', 'js_composer' ) => 'bar_green',
			esc_html__( 'Classic Orange', 'js_composer' ) => 'bar_orange',
			esc_html__( 'Classic Red', 'js_composer' ) => 'bar_red',
			esc_html__( 'Classic Black', 'js_composer' ) => 'bar_black',
		),
		
		vc_get_shared( 'colors-dashed' ),
		
		array(
			esc_html__( 'Custom Color', 'js_composer' ) => 'custom',
		)
	);
	
	$bg_color_value = array_merge(
		array(
			esc_html__( 'Primary', 'js_composer' ) => 'primary',
			esc_html__( 'Secondary', 'js_composer' ) => 'secondary',
			esc_html__( 'Classic Grey', 'js_composer' ) => 'bar_grey',
			esc_html__( 'Classic Blue', 'js_composer' ) => 'bar_blue',
			esc_html__( 'Classic Turquoise', 'js_composer' ) => 'bar_turquoise',
			esc_html__( 'Classic Green', 'js_composer' ) => 'bar_green',
			esc_html__( 'Classic Orange', 'js_composer' ) => 'bar_orange',
			esc_html__( 'Classic Red', 'js_composer' ) => 'bar_red',
			esc_html__( 'Classic Black', 'js_composer' ) => 'bar_black',
		),
		
		vc_get_shared( 'colors-dashed' ),
		
		array(
			esc_html__( 'Custom Color', 'js_composer' ) => 'custom',
		)
	);
	
	$vc_progress_bar_attributes = array(
		array(
			'type' => 'param_group',
			'heading' => esc_html__( 'Values', 'js_composer' ),
			'param_name' => 'values',
			'description' => esc_html__( 'Enter values for graph - value, title and color.', 'js_composer' ),
			'value' => rawurlencode( wp_json_encode( array(
				array(
					'label' => esc_html__( 'Development', 'js_composer' ),
					'value' => '90',
				),
				array(
					'label' => esc_html__( 'Design', 'js_composer' ),
					'value' => '80',
				),
				array(
					'label' => esc_html__( 'Marketing', 'js_composer' ),
					'value' => '70',
				),
			) ) ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Label', 'js_composer' ),
					'param_name' => 'label',
					'description' => esc_html__( 'Enter text used as title of bar.', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Value', 'js_composer' ),
					'param_name' => 'value',
					'description' => esc_html__( 'Enter value of bar.', 'js_composer' ),
					'admin_label' => true,
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Color', 'js_composer' ),
					'param_name' => 'color',
					'value' => $color_value,
					'description' => esc_html__( 'Select single bar background color.', 'js_composer' ),
					'admin_label' => true,
					'param_holder_class' => 'vc_colored-dropdown',
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Custom color', 'js_composer' ),
					'param_name' => 'customcolor',
					'description' => esc_html__( 'Select custom single bar background color.', 'js_composer' ),
					'dependency' => array(
						'element' => 'color',
						'value' => array( 'custom' ),
					),
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Custom text color', 'js_composer' ),
					'param_name' => 'customtxtcolor',
					'description' => esc_html__( 'Select custom single bar text color.', 'js_composer' ),
					'dependency' => array(
						'element' => 'color',
						'value' => array( 'custom' ),
					),
				),
			),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Color', 'js_composer' ),
			'param_name' => 'bgcolor',
			'value' => $bg_color_value,
			'description' => esc_html__( 'Select bar background color.', 'js_composer' ),
			'admin_label' => true,
			'param_holder_class' => 'vc_colored-dropdown',
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
		array( 'type' => 'textfield', 'param_name' => 'sep-3', ),
		array( 'type' => 'textfield', 'param_name' => 'sep-4', )
		
	);

	vc_add_params( 'vc_progress_bar', $vc_progress_bar_attributes );
	
?>