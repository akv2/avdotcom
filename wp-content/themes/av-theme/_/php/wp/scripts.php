<?php

//  load_scripts.php
function cs_scripts() {
	global $post;

	// When to show minified version
	$v = get_field( 'version', 'option' );

	// Front Application
	if( ! is_admin() || wp_doing_ajax() ){


		// ========================
		// @Stylesheets
		// ========================
		wp_enqueue_style( 'application', get_template_directory_uri() . "/_/dist/css/application.min.css", '', $v, 'screen, print' );




		// ========================
		// @Javascripts
		// ========================


    // Google Recaptcha (https://developers.google.com/recaptcha/docs/v3)
    $recaptcha_keys = get_field('recaptcha_keys', 'option');
    if( $recaptcha_keys ) :
      if( ! empty( $recaptcha_keys['site_key'] ) ) :
        wp_register_script( 'recaptcha', 'https://www.google.com/recaptcha/api.js?render=' . $recaptcha_keys['site_key'], '', $v, true );

        // Localize the script with new data
        $keys = array(
          'site' => $recaptcha_keys['site_key'],
        );
        wp_localize_script( 'recaptcha', 'RecaptchaKeys', $keys );
        wp_enqueue_script( 'recaptcha' );
      endif;
    endif;


		// Main libraries
		wp_enqueue_script( 'libs', get_template_directory_uri() . "/_/dist/js/libs.min.js", '', $v, true );


		// Dependents for selective loading
		$deps = array();
		$deps[] = 'libs';

		// ========================
		// Application
		wp_enqueue_script( 'application', get_template_directory_uri() . "/_/dist/js/application.min.js", $deps, $v, true );

	}
}
add_action( 'wp_enqueue_scripts', 'cs_scripts' );







// Admin styles
function cs_admin_scripts() {

	// Application
	wp_enqueue_style(  'admin', get_template_directory_uri() . "/_/dist/css/admin.min.css", '', '1.0', 'screen, print' );
	wp_enqueue_script( 'admin',  get_template_directory_uri() . "/_/dist/js/admin.min.js", 	'', '1.0', true );

	// Localize Variables
	// wp_add_inline_script( 'admin', 'const Front = ' . json_encode( array(
  //   'ajax_url' => admin_url( 'admin-ajax.php' ),
  //   'ajax_nonce' => wp_create_nonce('cs_ajax_nonce'),
	// ) ), 'before' );

}
add_action('admin_enqueue_scripts', 'cs_admin_scripts');


// Note that it’s a best practice to prefix function names (e.g. myprefix)
function cs_admin_block_scripts() {
	wp_enqueue_script( 'admin-blocks',  get_template_directory_uri() . "/_/dist/js/admin.blocks.min.js", '', '1.0', true );

	// Localize Variables
	wp_add_inline_script( 'admin-blocks', 'const BlocksFront = ' . json_encode( array(
    'ajax_url' => admin_url( 'admin-ajax.php' ),
    'ajax_nonce' => wp_create_nonce('cs_ajax_nonce'),
	) ), 'before' );
}
add_action( 'enqueue_block_editor_assets', 'cs_admin_block_scripts' );


// function cs_gutenberg_css(){
//
// 	add_theme_support( 'editor-styles' );
// 	add_editor_style( '_/dist/css/application.min.css' );
// 	add_editor_style( '_/dist/css/gutenberg.min.css' );
//
// }
// add_action( 'after_setup_theme', 'cs_gutenberg_css' );


// Resource Hints
// function cs_resource_hints( $urls, $relation_type ) {

//   // Remove default dns-prefetch (pulled dynamically from wp_enqueue_styles / scripts)
// 	if ( 'dns-prefetch' === $relation_type ) {
//     $urls = [];
//   }

//   // Preconnects: Other servers (google fonts, bynder)
// 	if ( wp_style_is( 'cs-google-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
//     // <link rel="preconnect" href="https://fonts.googleapis.com">
//     // <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
//     $urls[] = ['href' => '//fonts.googleapis.com'];
// 		$urls[] = ['href' => '//fonts.gstatic.com', 'crossorigin'];

//     // If we want to add bynder
//     // $bynder_portal_domain = get_field('bynder_portal_domain','option');
//     // if( $bynder_api_domain ) :
//     //   $urls[] = ['href' => '//' . $bynder_portal_domain];
//     // endif;
// 	}

// 	return $urls;
// }
// add_filter( 'wp_resource_hints', 'cs_resource_hints', 0, 2 );
