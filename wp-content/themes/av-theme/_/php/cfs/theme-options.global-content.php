<?php
if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array(
    'key' => 'group_610051f83d50f',
    'title' => 'Global Content',
    'fields' => array(
      array(
        'key' => 'field_610051fd7f94d',
        'label' => 'Header',
        'name' => '',
        'type' => 'tab',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'placement' => 'top',
        'endpoint' => 0,
      ),
      array (
        'key' => 'field_44f8a8c3501f69d98c01bf98924c95d56717eea0',
        'label' => 'Extra Tags',
        'name' => 'extra_header',
        'type' => 'textarea',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
        'readonly' => 0,
        'disabled' => 0,
      ),
      

      // FOOTER TAB
      array(
        'key' => 'field_610052137f94e',
        'label' => 'Footer',
        'name' => '',
        'type' => 'tab',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'placement' => 'top',
        'endpoint' => 0,
      ),
      array (
        'key' => 'field_a6c41dc70d2561b98157ad25465b1de928b9e3bb',
        'label' => 'Extra Tags',
        'name' => 'extra_footer',
        'type' => 'textarea',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
        'readonly' => 0,
        'disabled' => 0,
      ),
      array(
        'key' => 'field_654aaef9074f8',
        'label' => 'Footer',
        'name' => 'footer',
        'aria-label' => '',
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
            'key' => 'field_654aaeb56182f',
            'label' => 'Column 1',
            'name' => 'column_1',
            'aria-label' => '',
            'type' => 'wysiwyg',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'tabs' => 'visual',
            'toolbar' => 'basic',
            'media_upload' => 0,
            'delay' => 0,
          ),
          array(
            'key' => 'field_654aaf17074fa',
            'label' => 'Column 2',
            'name' => 'column_2',
            'aria-label' => '',
            'type' => 'wysiwyg',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'tabs' => 'visual',
            'toolbar' => 'basic',
            'media_upload' => 0,
            'delay' => 0,
          ),
          array(
            'key' => 'field_654aaf19074fb',
            'label' => 'Column 3',
            'name' => 'column_3',
            'aria-label' => '',
            'type' => 'wysiwyg',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'tabs' => 'visual',
            'toolbar' => 'basic',
            'media_upload' => 0,
            'delay' => 0,
          ),
        ),
      ),
      array(
        'key' => 'field_61005355a7a22',
        'label' => 'Social Media',
        'name' => 'social_media',
        'type' => 'group',
        'instructions' => 'All optional. If left blank they will be skipped.',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'layout' => 'row',
        'sub_fields' => array(
          array(
            'key' => 'field_610053fa448a8',
            'label' => 'Instagram',
            'name' => 'instagram',
            'type' => 'url',
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
          ),
          array(
            'key' => 'field_610053e9448a6',
            'label' => 'Facebook',
            'name' => 'facebook',
            'type' => 'url',
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
          ),
          // array(
          //   'key' => 'field_610053fd448a9',
          //   'label' => 'Twitter',
          //   'name' => 'twitter',
          //   'type' => 'url',
          //   'instructions' => '',
          //   'required' => 0,
          //   'conditional_logic' => 0,
          //   'wrapper' => array(
          //     'width' => '',
          //     'class' => '',
          //     'id' => '',
          //   ),
          //   'default_value' => '',
          //   'placeholder' => '',
          // ),
          // array(
          //   'key' => 'field_61005412448ab',
          //   'label' => 'Pinterest',
          //   'name' => 'pinterest',
          //   'type' => 'url',
          //   'instructions' => '',
          //   'required' => 0,
          //   'conditional_logic' => 0,
          //   'wrapper' => array(
          //     'width' => '',
          //     'class' => '',
          //     'id' => '',
          //   ),
          //   'default_value' => '',
          //   'placeholder' => '',
          // ),
          // array(
          //   'key' => 'field_61005403448aa',
          //   'label' => 'YouTube',
          //   'name' => 'youtube',
          //   'type' => 'url',
          //   'instructions' => '',
          //   'required' => 0,
          //   'conditional_logic' => 0,
          //   'wrapper' => array(
          //     'width' => '',
          //     'class' => '',
          //     'id' => '',
          //   ),
          //   'default_value' => '',
          //   'placeholder' => '',
          // ),
          array(
            'key' => 'field_610053f5448a7',
            'label' => 'LinkedIn',
            'name' => 'linkedin',
            'type' => 'url',
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
          ),
        ),
      ),


      // 404 TAB
      // array(
      //   'key' => 'field_8ec9b5df2f60b',
      //   'label' => '404',
      //   'name' => '',
      //   'type' => 'tab',
      //   'instructions' => '',
      //   'required' => 0,
      //   'conditional_logic' => 0,
      //   'wrapper' => array(
      //     'width' => '',
      //     'class' => '',
      //     'id' => '',
      //   ),
      //   'placement' => 'top',
      //   'endpoint' => 0,
      // ),

    ),
    'location' => array(
      array(
        array(
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'acf-options-global-content',
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




	// Translate footer button as Polylang String Translations
  add_action('admin_init', 'cs_footer_button_to_string_translations');
	function cs_footer_button_to_string_translations(){

		// use identifier
		$footer_button = get_field('footer_button', 'options');
		if( empty( $footer_button ) ) return;

		pll_register_string('footer-button--title', $footer_button['title'],  TEXT_DOMAIN );
		pll_register_string('footer-button--url',   $footer_button['url'],    TEXT_DOMAIN );
	}

endif;
