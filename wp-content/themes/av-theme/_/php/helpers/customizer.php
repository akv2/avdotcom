<?php


/*
 * Build customizer link from preset path (theme options) and customizer_id (product)
 */
if( ! function_exists( 'cs_get_customizer_preset_link' ) ) :
  function cs_get_customizer_preset_link( $customizer_id = false ) {

    $customizer = cs_page_by_template('customizer');
    $customizer_permalink = get_permalink( $customizer );

    if( $customizer_id ) :
      $customizer_preset_path = get_field('customizer_preset_path', 'options' );
      if( ! empty( $customizer_preset_path ) && str_contains( $customizer_preset_path, '[customizer_id]' ) ) :
        $customizer_permalink = untrailingslashit( $customizer_permalink ) . str_replace( '[customizer_id]', $customizer_id, $customizer_preset_path );
      endif;
    endif;

    return $customizer_permalink;

  }
endif;



/*
 * Build customizer link for loading favorites from state id
 */
if( ! function_exists( 'cs_get_customizer_load_link' ) ) :
  function cs_get_customizer_load_link( $customizer_id = false ) {

    $customizer = cs_page_by_template('customizer');
    $customizer_permalink = get_permalink( $customizer );

    // Add ID to permalink
    if( $customizer_id ) $customizer_permalink = untrailingslashit( $customizer_permalink ) . '/#/load/' . $customizer_id;

    return $customizer_permalink;

  }
endif;
