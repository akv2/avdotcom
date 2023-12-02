<?php
if( function_exists('acf_add_local_field_group') ):


  acf_add_local_field_group( array(
    'key' => 'group_tjrrni873',
    'title' => 'Text with Illustration',
    'fields' => array(
      array(
        'key' => 'field_654a5ba3e9ffa',
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
        'key' => 'field_qk7cpovvw',
        'label' => 'Text',
        'name' => 'text',
        'aria-label' => '',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'maxlength' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
      ),
      // array(
      // 	'key' => 'field_c329gudlm',
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
    ),
    'location' => array(
      array(
        array(
          'param' => 'block',
          'operator' => '==',
          'value' => 'acf/text-with-illustration',
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
  ) );

endif;
