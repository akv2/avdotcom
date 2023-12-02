<?php
if( function_exists('acf_add_local_field_group') ):


  acf_add_local_field_group( array(
    'key' => 'group_mdp56lawy',
    'title' => 'Intro Text',
    'fields' => array(
      array(
        'key' => 'field_654c01c7fa0c6',
        'label' => 'Title',
        'name' => 'title',
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
      array(
        'key' => 'field_654a5814bb51d',
        'label' => 'Text',
        'name' => 'text',
        'aria-label' => '',
        'type' => 'textarea',
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
        'rows' => '3',
        'placeholder' => '',
        'new_lines' => 'br',
      ),
      array(
        'key' => 'field_654a5836bb51e',
        'label' => 'CTA',
        'name' => 'cta',
        'aria-label' => '',
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
  ) );

endif;
