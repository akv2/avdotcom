<?php

add_action("wp_ajax_cs_all_blocks_to_preview", "cs_all_blocks_to_preview"); // <= only logged in
function cs_all_blocks_to_preview() {

  // Security
  check_ajax_referer( 'cs_ajax_nonce', 'security' );

  if( empty( $_REQUEST['post_id'] ) ) exit;
  $post_id = (int) $_REQUEST['post_id'];

  // Close blocks /helpers/blocks.php
  $success = cs_close_blocks( $post_id );

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
