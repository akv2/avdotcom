<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_612cf89a819fa',
	'title' => 'Block Settings',
	'fields' => array(
		array(
			'key' => 'field_612cf8a512053',
			'label' => 'Block Settings',
			'name' => '',
			'type' => 'accordion',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'open' => 0,
			'multi_expand' => 0,
			'endpoint' => 0,
		),
		// array(
		// 	'key' => 'field_612e91823a90f',
		// 	'label' => 'Background Color',
		// 	'name' => 'bg_color',
		// 	'type' => 'select',
		// 	'instructions' => '',
		// 	'required' => 0,
		// 	'conditional_logic' => 0,
		// 	'wrapper' => array(
		// 		'width' => '',
		// 		'class' => '',
		// 		'id' => '',
		// 	),
		// 	'choices' => array(
		// 		'lt-blue' => 'Light Blue',
		// 		'tan' => 'Tan',
		// 		'white' => 'White',
		// 	),
		// 	'default_value' => 'white',
		// 	'allow_null' => 0,
		// 	'multiple' => 0,
		// 	'ui' => 0,
		// 	'return_format' => 'value',
		// 	'ajax' => 0,
		// 	'placeholder' => '',
		// ),
		// array(
		// 	'key' => 'field_619bc379effaa',
		// 	'label' => 'Jump Link <span class="opt">optional</span>',
		// 	'name' => 'jump_link',
		// 	'type' => 'group',
		// 	'instructions' => 'Adds an anchor to use as a jump link.',
		// 	'required' => 0,
		// 	'conditional_logic' => 0,
		// 	'wrapper' => array(
		// 		'width' => '',
		// 		'class' => '',
		// 		'id' => '',
		// 	),
		// 	'layout' => 'table',
		// 	'sub_fields' => array(
		// 		array(
		// 			'key' => 'field_619bc3aceffab',
		// 			'label' => 'Title',
		// 			'name' => 'title',
		// 			'type' => 'text',
		// 			'instructions' => 'Word that is used for the header link link (if template has it).',
		// 			'required' => 0,
		// 			'conditional_logic' => 0,
		// 			'wrapper' => array(
		// 				'width' => '',
		// 				'class' => '',
		// 				'id' => '',
		// 			),
		// 			'default_value' => '',
		// 			'placeholder' => '',
		// 			'prepend' => '',
		// 			'append' => '',
		// 			'maxlength' => '',
		// 		),
		// 		array(
		// 			'key' => 'field_61687e6b4b09e',
		// 			'label' => 'Key <span class="opt">optional</span>',
		// 			'name' => 'key',
		// 			'type' => 'text',
		// 			'instructions' => 'Slug that shows up in the URL. Defaults to sanitized Jump Link > Title field. Can be <span>"[configurator]"</span> to link to the configurator.',
		// 			'required' => 0,
		// 			'conditional_logic' => 0,
		// 			'wrapper' => array(
		// 				'width' => '',
		// 				'class' => '',
		// 				'id' => '',
		// 			),
		// 			'default_value' => '',
		// 			'placeholder' => '',
		// 			'prepend' => '#',
		// 			'append' => '',
		// 			'maxlength' => '',
		// 		),
		// 	),
		// ),
		array(
			'key' => 'field_612f8c32be7ce',
			'label' => 'Space',
			'name' => 'space',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'table',
			'sub_fields' => array(
				array(
					'key' => 'field_612f8c42be7d0',
					'label' => 'Above',
					'name' => 'above',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'none' => 'None',
						'default' => 'Default',
						'large' => 'Large',
						'small' => 'Small',
					),
					'default_value' => 'none',
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'value',
					'ajax' => 0,
					'placeholder' => '',
				),
				array(
					'key' => 'field_612f8c39be7cf',
					'label' => 'Below',
					'name' => 'below',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'none' => 'None',
						'default' => 'Default',
						'large' => 'Large',
						'small' => 'Small',
					),
					'default_value' => 'default',
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'value',
					'ajax' => 0,
					'placeholder' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'all',
			),
		),
	),
	'menu_order' => 1,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
));

endif;
