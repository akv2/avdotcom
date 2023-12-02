<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_317953b569b65',
	'title' => 'Block - Form',
	'fields' => array(
		array(
			'key' => 'field_417953baa46a3',
			'label' => 'Form',
			'name' => 'form',
			'type' => 'post_object',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
				0 => 'wpforms',
			),
			'taxonomy' => '',
			'allow_null' => 1,
			'multiple' => 0,
			'return_format' => 'object',
			'ui' => 1,
		),
		// array(
		// 	'key' => 'field_51b113c7eccbb',
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
		// 	'key' => 'field_41b1135432d3c',
		// 	'label' => 'Callout <span class="opt">optional</span>',
		// 	'name' => 'callout',
		// 	'type' => 'text',
		// 	'instructions' => '',
		// 	'required' => 0,
		// 	'conditional_logic' => 0,
		// 	'wrapper' => array(
		// 		'width' => '',
		// 		'class' => '',
		// 		'id' => '',
		// 	),
		// 	'default_value' => '',
		// 	'placeholder' => '',
		// 	'prepend' => '',
		// 	'append' => '',
		// 	'maxlength' => '',
		// ),
		// array(
		// 	'key' => 'field_6179a04ec4775',
		// 	'label' => 'Preselect <span class="opt">Optional</span>',
		// 	'name' => 'preselect',
		// 	'type' => 'text',
		// 	'instructions' => 'The CSS selector of a checkbox or select field\'s value that should be preselected on load.	As an example, this can be used to load a page with "Marine Customer" selected. i.e. [value=\'Marine Customer\'].',
		// 	'required' => 0,
		// 	'conditional_logic' => 0,
		// 	'wrapper' => array(
		// 		'width' => '',
		// 		'class' => '',
		// 		'id' => '',
		// 	),
		// 	'default_value' => '',
		// 	'placeholder' => '',
		// 	'prepend' => '',
		// 	'append' => '',
		// 	'maxlength' => '',
		// ),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
        'value' => 'acf/' . $args['name'],
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
	'show_in_rest' => 0,
));

endif;
