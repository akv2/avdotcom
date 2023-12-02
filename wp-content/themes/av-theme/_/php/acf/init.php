<?php

// We only want 1 (our theme) ACF
if( function_exists( 'get_field' ) ) wp_die( 'Please disable Advanced Custom Fields plugin.');

// Define path and URL to the ACF plugin.
define( 'cs_ACF_PATH', get_stylesheet_directory() . '/_/php/acf' );
define( 'cs_ACF_URL',  get_stylesheet_directory_uri() . '/_/php/acf' );


// 1. Include the ACF plugin.
include_once( cs_ACF_PATH . '/plugin/acf.php' );


// 2. Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return cs_ACF_URL . '/plugin/';
}


// 3. customize ACF JSON
// add_filter('acf/settings/save_json', 'cs_acf_json_save_point');
// add_filter('acf/settings/load_json', 'cs_acf_json_load_point');
// function cs_acf_json_save_point( $path ) {
//   return cs_ACF_PATH . '/json';
// }
// function cs_acf_json_load_point( $paths ) {
//   unset($paths[0]);
//   $paths[] = cs_ACF_PATH . '/json';
//   return $paths;
// }

// 4. Hide ACF field group menu item
// if( ! current_user_can('administrator') ) :
//   add_filter('acf/settings/show_admin', '__return_false');
// endif;

// 5. Include ACF Plugin
// locate_template( '_/php/acf/acf.php', true );

// 6. Include ACF Block Settings
locate_template( '_/php/acf/blocks.php', true );

// 7. Include ACF Bynder Asset Fields
// locate_template( '_/php/acf/fields/bynder-file.php', true );
// locate_template( '_/php/acf/fields/bynder-image.php', true );
// locate_template( '_/php/acf/fields/bynder-mapping.php', true );

// 8. Create Options Pages
locate_template( '_/php/acf/options-pages.php', true );

// 9. Google Maps API Setup
// function cs_google_map_api( $api ){
//   $api['key'] = GOOGLE_API_KEY;
//   return $api;
// }
// add_filter('acf/fields/google_map/api', 'cs_google_map_api');

// Method 2: Setting.
// function cs_google_api_setting_acf_init() {
//   acf_update_setting('google_api_key', GOOGLE_API_KEY);
// }
// add_action('acf/init', 'cs_google_api_setting_acf_init');


// Helper function to clear cache
// add_filter('acf/fields/post_object/result', 'cs_add_polylang_to_acf_post_object', 10, 4);
// function cs_add_polylang_to_acf_post_object( $result, $object, $field, $post ) {
//   if( pll_is_translated_post_type( get_post_type( $object->ID ) ) ) {
//     $language_slug = pll_get_post_language( $object->ID, 'slug' );
//   	if( ! empty( $language_slug ) ) $result .= ' (' . $language_slug . ')';
//   }
// 	return $result;
// }


// add_filter('acf/fields/relationship/query', 'acf_relationship_field_by_lang', 10, 3);
// function acf_relationship_field_by_lang( $args, $field, $post_id ) {
//   if( isset( $field['lang'] ) && ! empty( $field['lang'] ) ) :
//     $args['lang'] = $field['lang'];
//   endif;

//   return $args;
// }
