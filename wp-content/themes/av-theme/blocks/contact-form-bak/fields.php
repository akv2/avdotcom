<?php
if( function_exists('acf_add_local_field_group') ):
  
  acf_add_local_field_group( array(
    'key' => 'group_bcp2w85rj',
    'title' => 'Contact Form',
    'fields' => array(
      array(
        'key' => 'field_654cf1e9ecf50',
        'label' => 'Info Text',
        'name' => 'info_text',
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
        'tabs' => 'all',
        'toolbar' => 'basic',
        'media_upload' => 0,
        'delay' => 0,
      ),
      array(
        'key' => 'field_654cf208ecf51',
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
      array(
        'key' => 'field_654cf217ecf52',
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
      array(
        'key' => 'field_654cf220ecf53',
        'label' => 'Form',
        'name' => 'form',
        'aria-label' => '',
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
        ),
        'default_value' => false,
        'return_format' => 'value',
        'multiple' => 0,
        'allow_null' => 0,
        'ui' => 0,
        'ajax' => 0,
        'placeholder' => '',
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

  function cs_acf_dynamic_icons( $field ) {

    if( 0 !== strpos( $field['name'], 'form' ) )
      return $field;
  
    // $type = str_replace( 'dynamic_icon_', '', $field['name'] );
    $gf_forms = GFAPI::get_forms();
    
    foreach( $gf_forms as $gf_form ) {
      $field['choices'][ $gf_form['id'] ] = $gf_form['title'];
    }
    return $field;
  }
  add_filter( 'acf/load_field', 'cs_acf_dynamic_icons' );

endif;
