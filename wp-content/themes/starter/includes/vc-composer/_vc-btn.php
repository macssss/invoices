<?php

	vc_remove_param( 'vc_btn', 'shape' );
	vc_remove_param( 'vc_btn', 'color' );
	vc_remove_param( 'vc_btn', 'button_block' );
	vc_remove_param( 'vc_btn', 'gradient_color_1' );
	vc_remove_param( 'vc_btn', 'gradient_color_2' );
	vc_remove_param( 'vc_btn', 'gradient_custom_color_1' );
	vc_remove_param( 'vc_btn', 'gradient_custom_color_2' );
	vc_remove_param( 'vc_btn', 'gradient_text_color' );
	vc_remove_param( 'vc_btn', 'custom_background' );
	vc_remove_param( 'vc_btn', 'custom_text' );
	vc_remove_param( 'vc_btn', 'outline_custom_color' );
	vc_remove_param( 'vc_btn', 'outline_custom_hover_background' );
	vc_remove_param( 'vc_btn', 'outline_custom_hover_text' );
	vc_remove_param( 'vc_btn', 'outline_custom_hover_text' );
	
	
	$vc_btn_attributes = array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Style', 'js_composer' ),
			'description' => esc_html__( 'Select button display style.', 'js_composer' ),
			'param_name' => 'style',
			'value' => array(
				esc_html__( 'Default', 'js_composer' ) => '',
				esc_html__( 'Secondary', 'js_composer' ) => 'secondary',
				esc_html__( 'Dark', 'js_composer' ) => 'dark',
				esc_html__( 'Primary', 'js_composer' ) => 'primary',
				esc_html__( 'Secondary Invert', 'js_composer' ) => 'secondary-invert',
				esc_html__( 'Dark Invert', 'js_composer' ) => 'dark-invert',
				esc_html__( 'Primary Invert', 'js_composer' ) => 'primary-invert',
				esc_html__( 'Success', 'js_composer' ) => 'success',
				esc_html__( 'Danger', 'js_composer' ) => 'danger',
				esc_html__( 'Link', 'js_composer' ) => 'link'
			),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Size', 'js_composer' ),
			'param_name' => 'size',
			'description' => esc_html__( 'Select button display size.', 'js_composer' ),
			'value' => array(
				esc_html__( 'Default', 'js_composer' ) => '',
				esc_html__( 'Mini', 'js_composer' ) => 'mini',
				esc_html__( 'Small', 'js_composer' ) => 'small',
				esc_html__( 'Large', 'js_composer' ) => 'large'
			),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Alignment', 'js_composer' ),
			'param_name' => 'align',
			'description' => esc_html__( 'Select button alignment.', 'js_composer' ),
			'value' => array(
				esc_html__( 'Inherit', 'js_composer' ) => '',
				esc_html__( 'Left', 'js_composer' ) => 'left',
				esc_html__( 'Right', 'js_composer' ) => 'right',
				esc_html__( 'Center', 'js_composer' ) => 'center',
			),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Button width', 'js_composer' ),
			'param_name' => 'width',
			'description' => esc_html__( 'Select button width.', 'js_composer' ),
			'value' => array(
				esc_html__( 'Auto', 'js_composer' ) => '',
				esc_html__( 'Fixed', 'js_composer' ) => 'fixed',
				esc_html__( 'Full', 'js_composer' ) => 'full',
			),
		),
		
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Open modal', 'js_composer' ),
			'param_name' => 'open_modal',
			'value' => array( esc_html__( 'Yes', 'js_composer' ) => 'yes' )
		),
		
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Smooth scroll', 'js_composer' ),
			'param_name' => 'smooth_scroll',
			'value' => array( esc_html__( 'Yes', 'js_composer' ) => 'yes' )
		),
		
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Text uppercase', 'js_composer' ),
			'param_name' => 'text_uppercase',
			'value' => array( esc_html__( 'Yes', 'js_composer' ) => 'yes' )
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
		array( 'type' => 'textfield', 'param_name' => 'sep-4', ),
		
	);

	vc_add_params( 'vc_btn', $vc_btn_attributes );
	
?>