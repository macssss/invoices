<?php
	
	vc_remove_param( 'vc_column', 'video_bg' );
	vc_remove_param( 'vc_column', 'video_bg' );
	vc_remove_param( 'vc_column', 'video_bg_url' );
	vc_remove_param( 'vc_column', 'video_bg_parallax' );

	vc_remove_param( 'vc_column', 'parallax' );
	vc_remove_param( 'vc_column', 'parallax_image' );
	vc_remove_param( 'vc_column', 'parallax_speed_video' );
	vc_remove_param( 'vc_column', 'parallax_speed_bg' );
	
	$vc_column_attributes = array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Column order', 'js_composer' ),
			'param_name' => 'column_order',
			'value' => array(
				esc_html__( 'Default' ) => '',
				esc_html__( 'Last' ) => 'last',
				esc_html__( 'First' ) => 'first'
			)
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Column order media min', 'js_composer' ),
			'param_name' => 'column_order_media_min',
			'value' => array(
				esc_html__( 'All', 'js_composer' ) => '',
				esc_html__( 'Min Small', 'js_composer' ) => 'small',
				esc_html__( 'Min Medium', 'js_composer' ) => 'medium',
				esc_html__( 'Min Large', 'js_composer' ) => 'large',
				esc_html__( 'Min Xlarge', 'js_composer' ) => 'xlarge',
			),
			'dependency' => array(
				'element' => 'column_order',
				'value' => array(
					'last',
					'first'
				)
			),
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
		
		array( 'type' => 'textfield', 'param_name' => 'sep-1', ),
		array( 'type' => 'textfield', 'param_name' => 'sep-2', ),
		array( 'type' => 'textfield', 'param_name' => 'sep-3', )
		
	);

	vc_add_params( 'vc_column', $vc_column_attributes );
	
?>