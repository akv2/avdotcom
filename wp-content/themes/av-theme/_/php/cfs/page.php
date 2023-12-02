<?php
if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array(
    'key' => 'group_60f08cb679586',
    'title' => 'Page Settings',
    'fields' => array(
      array(
        'key' => 'field_60f08d3a7393c',
        'label' => 'Text Color',
        'name' => 'text_color',
        'type' => 'select',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => array(),
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'choices' => array(
          'dark' => 'Dark',
          'light' => 'Light',
        ),
        'default_value' => 'dark',
        'allow_null' => 0,
        'multiple' => 0,
        'ui' => 0,
        'return_format' => 'value',
        'ajax' => 0,
        'placeholder' => '',
      ),
      array(
        'key' => 'field_z0nr2ykpl',
        'label' => 'Background Image',
        'name' => 'background_image',
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
        'preview_size' => 'medium',
        'mime_types' => '',
      ),

      array(
        'key' => 'field_60f08d6b6b45e',
        'label' => 'Header Settings',
        'name' => 'header_settings',
        'type' => 'group',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'layout' => 'block',
        'sub_fields' => array(
          array(
            'key' => 'field_60f08cb9110ad',
            'label' => 'Is Over Content',
            'name' => 'is_over_content',
            'type' => 'true_false',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'message' => '',
            'default_value' => 0,
            'ui' => 0,
            'ui_on_text' => '',
            'ui_off_text' => '',
          ),
        ),
      ),
      //     array(
      //       'key' => 'field_60f08d3a7393c',
      //       'label' => 'Text Color',
      //       'name' => 'text_color',
      //       'type' => 'select',
      //       'instructions' => '',
      //       'required' => 0,
      //       'conditional_logic' => array(
      //         array(
      //           array(
      //             'field' => 'field_60f08cb9110ad',
      //             'operator' => '==',
      //             'value' => '1',
      //           ),
      //         ),
      //       ),
      //       'wrapper' => array(
      //         'width' => '',
      //         'class' => '',
      //         'id' => '',
      //       ),
      //       'choices' => array(
      //         'dark' => 'Dark',
      //         'light' => 'Light',
      //       ),
      //       'default_value' => 'dark',
      //       'allow_null' => 0,
      //       'multiple' => 0,
      //       'ui' => 0,
      //       'return_format' => 'value',
      //       'ajax' => 0,
      //       'placeholder' => '',
      //     ),
      //     array(
      //       'key' => 'field_61041c16065ae',
      //       'label' => 'Show Top Gradient',
      //       'name' => 'show_top_gradient',
      //       'type' => 'true_false',
      //       'instructions' => 'The top gradient is helpful when using a busy image.',
      //       'required' => 0,
      //       'conditional_logic' => array(
      //         array(
      //           array(
      //             'field' => 'field_60f08cb9110ad',
      //             'operator' => '==',
      //             'value' => '1',
      //           ),
      //         ),
      //       ),
      //       'wrapper' => array(
      //         'width' => '',
      //         'class' => '',
      //         'id' => '',
      //       ),
      //       'message' => '',
      //       'default_value' => 0,
      //       'ui' => 0,
      //       'ui_on_text' => '',
      //       'ui_off_text' => '',
      //     ),
      //   ),
      // ),
      array(
        'key' => 'field_60f0905ca2710',
        'label' => 'Show Title',
        'name' => 'show_title',
        'type' => 'true_false',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'message' => '',
        'default_value' => 0,
        'ui' => 0,
        'ui_on_text' => '',
        'ui_off_text' => '',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'page',
        ),
      ),
    ),
    'menu_order' => 1,
    'position' => 'side',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
  ));

  endif;