<?php


/*
 * Image Sizes
 */

// Square
add_image_size( 'square-200', 370, 370, true );
add_image_size( 'square-300', 740, 740, true );



// Remove default WC image sizes
function cs_remove_wc_image_sizes() {

  // Remove woocommerce sizes
  remove_image_size( 'woocommerce_thumbnail' );
  remove_image_size( 'woocommerce_single' );
  remove_image_size( 'woocommerce_gallery_thumbnail' );
  remove_image_size( 'shop_catalog' );
  remove_image_size( 'shop_single' );
  remove_image_size( 'shop_thumbnail' );
  
}
add_action('init', 'cs_remove_wc_image_sizes');


function cs_remove_wp_image_sizes( $sizes ) {

	// unset( $sizes['medium_large'] ); // disable medium-large size
	unset( $sizes['1536x1536'] );    // disable 2x medium-large size
	unset( $sizes['2048x2048'] );    // disable 2x large size

	return $sizes;
}
add_action('intermediate_image_sizes_advanced', 'cs_remove_wp_image_sizes');




/*
 * Enable SVG in sideload
 */
add_filter( 'image_sideload_extensions', function( $allowed_extensions ) {
  $allowed_extensions[] = 'svg';
  return $allowed_extensions;
});




/*
 * Rename featured image to SEO Image
 */
function cs_rename_featured_image( $labels ) {
    $labels->featured_image  = 'SEO Image';
    $labels->set_featured_image  = 'Set SEO image';
    $labels->remove_featured_image   = 'Remove SEO image';
    $labels->use_featured_image  = 'Use as SEO image';

    return $labels;

}
add_filter( 'post_type_labels_post', 'cs_rename_featured_image', 10, 1 );
add_filter( 'post_type_labels_page', 'cs_rename_featured_image', 10, 1 );
