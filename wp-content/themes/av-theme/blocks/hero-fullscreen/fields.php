<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_612e4304b49172',
	'title' => 'Hero: Under Header',
	'fields' => array(
		array(
			'key' => 'field_653a90e6452d9',
			'label' => 'Image',
			'name' => 'image',
			'aria-label' => '',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
			'preview_size' => 'medium',
		),
		array(
			'key' => 'field_612e431568eb1',
			'label' => 'Text <span class="opt">optional</span>',
			'name' => 'text',
			'type' => 'text',
			// 'instructions' => 'Use "&lt;br>" for hard line breaks.<br>Note: Line breaks are ignored on mobile devices.',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_612e432268eb2',
			'label' => 'CTA <span class="opt">optional</span>',
			'name' => 'link',
			'type' => 'link',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
		),
		// array(
		// 	'key' => 'field_618ac1b8a0082',
		// 	'label' => 'Additional Fields',
		// 	'name' => '',
		// 	'type' => 'accordion',
		// 	'instructions' => '',
		// 	'required' => 0,
		// 	'conditional_logic' => 0,
		// 	'wrapper' => array(
		// 		'width' => '',
		// 		'class' => '',
		// 		'id' => '',
		// 	),
		// 	'open' => 0,
		// 	'multi_expand' => 0,
		// 	'endpoint' => 0,
		// ),
		// array(
		// 	'key' => 'field_618ac20f1de20',
		// 	'label' => 'Image Position <span class="opt">optional</span>',
		// 	'name' => 'image_position',
		// 	'type' => 'group',
		// 	'instructions' => '',
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
		// 			'key' => 'field_618ac114a0080',
		// 			'label' => 'X',
		// 			'name' => 'x',
		// 			'type' => 'select',
		// 			'instructions' => '',
		// 			'required' => 0,
		// 			'conditional_logic' => 0,
		// 			'wrapper' => array(
		// 				'width' => '',
		// 				'class' => '',
		// 				'id' => '',
		// 			),
		// 			'choices' => array(
		// 				'center' => 'Center',
		// 				'left' => 'Left',
		// 				'right' => 'Right',
		// 			),
		// 			'default_value' => false,
		// 			'allow_null' => 0,
		// 			'multiple' => 0,
		// 			'ui' => 0,
		// 			'return_format' => 'value',
		// 			'ajax' => 0,
		// 			'placeholder' => '',
		// 		),
		// 		array(
		// 			'key' => 'field_618ac18ca0081',
		// 			'label' => 'Y',
		// 			'name' => 'y',
		// 			'type' => 'select',
		// 			'instructions' => '',
		// 			'required' => 0,
		// 			'conditional_logic' => 0,
		// 			'wrapper' => array(
		// 				'width' => '',
		// 				'class' => '',
		// 				'id' => '',
		// 			),
		// 			'choices' => array(
		// 				'center' => 'Center',
		// 				'bottom' => 'Bottom',
		// 				'top' => 'Top',
		// 			),
		// 			'default_value' => false,
		// 			'allow_null' => 0,
		// 			'multiple' => 0,
		// 			'ui' => 0,
		// 			'return_format' => 'value',
		// 			'ajax' => 0,
		// 			'placeholder' => '',
		// 		),
		// 	),
		// ),
		// array(
		// 	'key' => 'field_787aabd3fb036',
		// 	'label' => 'Hide Gradient',
		// 	'name' => 'hide_gradient',
		// 	'type' => 'true_false',
		// 	'instructions' => 'The bottom slide gradient shows up if there is text. Checking this will force it to not show up.',
		// 	'required' => 0,
		// 	'conditional_logic' => 0,
		// 	'wrapper' => array(
		// 		'width' => '',
		// 		'class' => '',
		// 		'id' => '',
		// 	),
		// 	'message' => '',
		// 	'default_value' => 0,
		// 	'ui' => 0,
		// 	'ui_on_text' => '',
		// 	'ui_off_text' => '',
		// ),
		// array(
		// 	'key' => 'field_618adebe31a72',
		// 	'label' => 'Text Position <span class="opt">optional</span>',
		// 	'name' => 'text_position',
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
		// 		'start' => 'Top',
		// 		'center' => 'Middle',
		// 		'end' => 'Bottom',
		// 	),
		// 	'default_value' => 'start',
		// 	'allow_null' => 0,
		// 	'multiple' => 0,
		// 	'ui' => 0,
		// 	'return_format' => 'value',
		// 	'ajax' => 0,
		// 	'placeholder' => '',
		// ),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/hero-fullscreen',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;
