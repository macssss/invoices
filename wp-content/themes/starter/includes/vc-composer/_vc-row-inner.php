<?php
	
	vc_remove_param( 'vc_row_inner', 'equal_height' );
	vc_remove_param( 'vc_row_inner', 'rtl_reverse' );

	$vc_row_inner_attributes = array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Columns gap', 'js_composer' ),
			'param_name' => 'gap',
			'value' => array(
				'Default' => '',
				'Small' => 'small',
				'Medium' => 'medium',
				'Large' => 'large',
				'Collapse' => 'collapse'
			)
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Content position', 'js_composer' ),
			'param_name' => 'content_placement',
			'value' => array(
				esc_html__( 'Default', 'js_composer' ) => '',
				esc_html__( 'Top', 'js_composer' ) => 'top',
				esc_html__( 'Bottom', 'js_composer' ) => 'bottom',
				esc_html__( 'Middle', 'js_composer' ) => 'middle'
			)
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Middle media min', 'js_composer' ),
			'param_name' => 'middle_media_min',
			'value' => array(
				esc_html__( 'All', 'js_composer' ) => '',
				esc_html__( 'Min Small', 'js_composer' ) => 'middle-min-small',
				esc_html__( 'Min Medium', 'js_composer' ) => 'middle-min-medium',
				esc_html__( 'Min Large', 'js_composer' ) => 'middle-min-large',
				esc_html__( 'Min Xlarge', 'js_composer' ) => 'middle-min-xlarge',
			),
			'dependency' => array(
				'element' => 'content_placement',
				'value' => 'middle'
			),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Columns animation', 'js_composer' ),
			'param_name' => 'columns_animation',
			'value' => array(
				esc_html__( 'None' ) => '',
				esc_html__( 'Fade' ) => 'fade',
				esc_html__( 'Scale Up' ) => 'scale-up',
				esc_html__( 'Scale Down' ) => 'scale-down',
				esc_html__( 'Slide Top' ) => 'slide-top',
				esc_html__( 'Slide Bottom' ) => 'slide-bottom',
				esc_html__( 'Slide Left' ) => 'slide-left',
				esc_html__( 'Slide Right' ) => 'slide-right'
			)
		),
		
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Columns animation delay', 'js_composer' ),
			'param_name' => 'columns_animation_delay',
			'value' => '300',
			'dependency' => array(
				'element' => 'columns_animation',
				'value' => array(
					'fade',
					'scale-up',
					'scale-down',
					'slide-top',
					'slide-bottom',
					'slide-left',
					'slide-right'
				)
			),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Columns vertical gap', 'js_composer' ),
			'param_name' => 'vertical_gap',
			'value' => array(
				esc_html__( 'Inherit' ) => '',
				esc_html__( 'Small' ) => 'small',
				esc_html__( 'Medium' ) => 'medium',
				esc_html__( 'Default' ) => 'default',
				esc_html__( 'Large' ) => 'large',
				esc_html__( 'Collapse' ) => 'collapse'
			)
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
			'heading' => esc_html__( 'Panel box', 'js_composer' ),
			'param_name' => 'panel_box',
			'value' => array( esc_html__( 'Yes', 'js_composer' ) => 'yes' ),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Panel box style', 'js_composer' ),
			'param_name' => 'panel_box_style',
			'value' => array(
				esc_html__( 'Box', 'js_composer' ) => '',
				esc_html__( 'Box White', 'js_composer' ) => 'box-white',
				esc_html__( 'Box Secondary', 'js_composer' ) => 'box-secondary',
				esc_html__( 'Box Dark', 'js_composer' ) => 'box-dark',
				esc_html__( 'Box Primary', 'js_composer' ) => 'box-primary',
			),
			'dependency' => array(
				'element' => 'panel_box',
				'value' => 'yes'
			)
		),
		
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Panel box contrast', 'js_composer' ),
			'param_name' => 'panel_box_contrast',
			'value' => array( esc_html__( 'Yes', 'js_composer' ) => 'yes' ),
			'dependency' => array(
				'element' => 'panel_box',
				'value' => 'yes'
			)
		),
		
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Panel box contrast reset', 'js_composer' ),
			'param_name' => 'panel_box_contrast_reset',
			'value' => array( esc_html__( 'Yes', 'js_composer' ) => 'yes' ),
			'dependency' => array(
				'element' => 'panel_box',
				'value' => 'yes'
			)
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Margin top', 'js_composer' ),
			'param_name' => 'elem_margin_top',
			'value' => array(
				esc_html__( 'Inherit', 'js_composer' ) => '',
				esc_html__( 'None', 'js_composer' ) => 'none',
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
				esc_html__( 'Inherit', 'js_composer' ) => '',
				esc_html__( 'None', 'js_composer' ) => 'none',
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
		array( 'type' => 'textfield', 'param_name' => 'sep-5', )
		
	);

	vc_add_params( 'vc_row_inner', $vc_row_inner_attributes );
	
?>