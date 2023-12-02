<?php
if( function_exists('acf_add_local_field_group') ):


  acf_add_local_field_group( array(
    'key' => 'group_ag65z5zcl',
    'title' => 'Form',
    'fields' => array(
      array(
        'key' => 'field_6565f90101903',
        'label' => 'Form',
        'name' => 'form',
        'aria-label' => '',
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
        'post_status' => '',
        'taxonomy' => '',
        'return_format' => 'object',
        'multiple' => 0,
        'allow_null' => 0,
        'bidirectional' => 0,
        'ui' => 1,
        'bidirectional_target' => array(
        ),
      ),
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
