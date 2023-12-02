<?php
/*
 * By Aaron Vanderzwan
 * A customized website.
 */



 // For debugging
 if( cs_environment() === 'development' ) :
   ini_set( 'error_log', WP_CONTENT_DIR . '/debug.log' );
 endif;



/*
 * Extra Tags
 */
add_action('wp_head', 'cs_add_extra_header_tags');
add_action('wp_footer', 'cs_add_extra_footer_tags', 100);
function cs_add_extra_header_tags() { the_field( 'extra_header', 'options' ); }
function cs_add_extra_footer_tags() { the_field( 'extra_footer', 'options' ); }


// Pre PHP 8 Helpers
if ( ! function_exists('str_contains') ) {
  function str_contains(string $haystack, string $needle): bool {
    return '' === $needle || false !== strpos($haystack, $needle);
  }
}



add_filter('allowed_http_origins', 'cs_add_allowed_origins');
function cs_add_allowed_origins($origins) {
    $origins[] = 'https://av.local';
    $origins[] = 'https://aaronvanderzwan.com';
    $origins[] = 'https://www.aaronvanderzwan.com';
    return $origins;
}

