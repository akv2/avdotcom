<?php

// ***************************
// Block Registrations
if( function_exists('acf_register_block_type') ) {
	function register_acf_block_types() {

		// Auto load everything in the /blocks/ dir
		$block_dirs = glob(get_template_directory() . '/blocks/*', GLOB_ONLYDIR);
		if( ! empty( $block_dirs ) ) :
			foreach( $block_dirs as $dir ) :
				include_once $dir . '/register.php';
			endforeach;
		endif;

	}
  add_action('acf/init', 'register_acf_block_types');
}




// ***************************
// Add custom block categories
function cs_block_categories( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'cs-image',
				'title' => __( 'Image', TEXT_DOMAIN ),
			),
			array(
				'slug' => 'cs-layout',
				'title' => __( 'Layout', TEXT_DOMAIN ),
			),
			array(
				'slug' => 'cs-media',
				'title' => __( 'Media', TEXT_DOMAIN ),
			),
			array(
				'slug' => 'cs-text',
				'title' => __( 'Text', TEXT_DOMAIN ),
			),
			array(
				'slug' => 'cs-slideshow',
				'title' => __( 'Slideshow', TEXT_DOMAIN ),
			),
			// array(
			// 	'slug' => 'cs-widgets',
			// 	'title' => __( 'Widgets', TEXT_DOMAIN ),
			// ),


			// Legacy
			array(
				'slug' => 'conduit',
				'title' => __( 'Conduit', TEXT_DOMAIN ),
			),
		)
	);
}
add_filter( 'block_categories_all', 'cs_block_categories', 10, 2);






/*
 * ACF Blocks Helpers
*/
if( ! function_exists( 'cs_build_acf_block_args' ) ) :
	function cs_build_acf_block_args( $args ) {

		// Only required = 'name'
		$slug = $args['name'];
		$path = ! empty( $args['path'] ) ? $args['path'] : $slug;

		$args = wp_parse_args(
			$args,
			array(
				'name'              => 'temp',
				'title'             => __( 'Temp', TEXT_DOMAIN ),
				'description'       => __('A custom temp block.', TEXT_DOMAIN ),
				'category'          => 'conduit',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'conduit' ),
				'render_template'   => get_template_directory() . '/blocks/' . $path . '/block.php',
			  'enqueue_style'     => get_template_directory_uri() . "/_/dist/css/blocks/" . $path . ".min.css",
			  'supports'          => array( 'align' => false ),
			),
		);

		// Get icon (if it exists)
		$file_path = get_theme_file_path( '_/img/modules-admin/' . $args['name'] . '-icon.svg' );
		if( file_exists( $file_path ) ) :
		  $file_contents = file_get_contents( $file_path );
		  $file_contents = preg_replace('/<!--(.|\s)*?-->/', '', $file_contents); // <= remove html comments
		  $args['icon'] = preg_replace( "/<br>|\n/", "", $file_contents ); // <= remove line breaks
		endif;

		return $args;
	}
endif;
