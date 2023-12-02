<?php

add_action("wp_ajax_cs_break_cache", "cs_break_cache");
add_action("wp_ajax_nopriv_cs_break_cache", "cs_break_cache");

function cs_break_cache() {

  // Security
  check_ajax_referer( 'cs_ajax_nonce', 'security' );

  // Write to the page
  $version = get_field('version', 'option');
  $arr = explode( '.', $version );
  $arr[ count( $arr ) - 1 ] = (int)$arr[ count( $arr ) - 1 ] + 1;
  $new_version = implode( '.', $arr );

  // Update the field
  update_field( 'version', $new_version, 'option' );

  // Return
  $return_array['success'] = true;
  $return_array['version'] = $new_version;

  // Redirect back
  if( ! empty( $_REQUEST['type'] ) && strtolower( $_REQUEST['type'] ) == 'json' ) :

    wp_send_json_success( $return_array );
    wp_die();

  else:

    if ( $_REQUEST['ref'] && $_REQUEST['ref'] == 'true' && wp_get_referer() ) :
      wp_safe_redirect( add_query_arg( 'message', 1, wp_get_referer() ) );
      exit;
    endif;

  endif;


  // End script
  die();
}
