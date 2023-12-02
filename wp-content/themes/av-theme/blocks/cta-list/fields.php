<?php
if( function_exists('acf_add_local_field_group') ):


  acf_add_local_field_group( array(
    'key' => 'group_kvvk3lq',
    'title' => 'CTA List',
    'fields' => array(
      array(
        'key' => 'field_654a66375011b',
        'label' => 'Links',
        'name' => 'links',
        'aria-label' => '',
        'type' => 'repeater',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'layout' => 'table',
        'pagination' => 0,
        'min' => 0,
        'max' => 0,
        'collapsed' => '',
        'button_label' => 'Add Link',
        'rows_per_page' => 20,
        'sub_fields' => array(
          array(
            'key' => 'field_654a66435011c',
            'label' => 'Link',
            'name' => 'link',
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
            'parent_repeater' => 'field_654a66375011b',
          ),
        ),
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
