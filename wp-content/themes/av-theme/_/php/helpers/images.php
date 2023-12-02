<?php

// Update compression
function custom_jpeg_quality() { return 90; }
add_filter( 'jpeg_quality', 'custom_jpeg_quality', 10, 2 );





/**
 * Generate echo image html
 *
 * @param  ACFImage $acf_image
 * @param  array 		$args
 *
 * @return void html of image
 */
if( ! function_exists( 'cs_image' ) ) :
  function cs_image( $acf_image = false, $args = array() ) {
		echo cs_get_image( $acf_image, $args );
	}
endif;




/**
 * Generate image html
 *
 * @param  ACFImage $acf_image
 * @param  array 		$args
 *
 * @return (string|void) html of image
 */
if( ! function_exists( 'cs_get_image' ) ) :
	function cs_get_image( $acf_image = false, $args = array() ) {

		// We need an image
		if( ! $acf_image ) return false;

		// Process args
		$args = wp_parse_args(
			$args,
			array(
				'src' 		=> $acf_image['sizes']['thumbnail'],
				'alt' 		=> $acf_image['alt'],
				'class' 	=> 'c-image',
        'sizes'   => array( // <= defaults to 100vw till handheld, then 50vw, and after 1640 changes to max 50% of 1640
          'full' => '820px',
          'handheld' => '50vw',
          '100vw'
        ),
			),
		);

		// Generate srcset - function receives additional args [see cs_srcset()]
    if( isset( $args['srcset'] ) && ! $args['srcset'] ) :
      unset( $args['srcset'] );
    else:
      if( ! isset( $args['srcset'] ) ) $args['srcset'] = array();
      $args['srcset'] = cs_srcset( $acf_image, $args['srcset'] );
    endif;

    // Generate sizes (receives string)
    $args['sizes'] = cs_image__sizes_attr( $args['sizes'] );


    // Handle lazy adjustments
    if ( isset( $args['lazy'] ) && $args['lazy'] === true ) :
      $args['class'] .= ' lazy';
      $args['data-src'] = $args['src'];
      $args['data-srcset'] = $args['srcset'];
      unset( $args['src'] );
      unset( $args['srcset'] );
      unset( $args['lazy'] );
    endif;

		// Once we have attributes as strings, we can implode them into html format (src="" class="", ect)
		$img_html = implode(' ', array_map(
			function ($k, $v) { return $k .'="'. esc_attr( $v ) .'"'; },
			array_keys($args),
			$args
		));

		// Return it
		return '<img ' . $img_html . ' />';
	}
endif;






/**
 * Helper to get "sizes" attribute for image tags.
 * Note: Browser uses first successfull media query.
 *
 * Usage:
 *	cs_image__sizes_attr( array(
 *    'full' => '820px',
 *    'handheld' => '50vw', 
 *    '100vw'
 * 	));
 *
 * @param  array|string $args
 *
 * @return string|false sizes attribute string
 */
function cs_image__sizes_attr($sizes) {

  if( ! $sizes ) return false;
  if( is_string( $sizes ) ) return $sizes;

  // Breakpoints
  $bps = array(
    'full' => 1640,
    'large-desktop' => 1200,
    'desktop' => 992,
    'handheld' => 768,
    'large-mobile' => 578,
    'mobile' => 375,
  );
  
  // Converts to
  // (min-width:1640px) 820px, (min-width: 768px) 50vw, 100vw

  $tmp = array();
  foreach( $sizes as $bp => $size ) :

    // If we receive '100vw' just add it
    if( is_int( $bp ) ) :
      $tmp[] = $size;
    else:
      $tmp[] = "(min-width:{$bps[ $bp ]}px) {$size}";
    endif;

  endforeach;

  return empty( $tmp ) ? false : implode( ', ', $tmp );

}





/*
 * Helper to get srcset for images
 *
 * Usage:
 *	cs_srcset( $acf, array(
 * 	 	'append' => array(
 *			'full',  // <= can pass in a WP size
 *			'gallery' => '2348w', // <= can pass in a [url] => [size]w
 *	 	),
 * 	)
 */
if( ! function_exists( 'cs_srcset' ) ) :
	function cs_srcset( $acf_image = false, $args = array() ) {

		// We need an image
		if( ! $acf_image ) return false;


		// Process args
		$args = wp_parse_args(
			$args,
			array(
				'prepend' => false,
				'default' => array(
					'thumbnail',
					'medium',
					// 'medium-large',
					'large',
					// 'extra-large',
          // 'super-large',
          // 'full',
				),
				'append' => false,
			),
		);


		// Init array for return
		$srcset = array();

		// Add additional srcsets
		if( $args['prepend'] ) 	$srcset = array_merge( $srcset, cs_image_build_srcset_arr( $acf_image, $args['prepend'] ) );
		if( $args['default'] ) 	$srcset = array_merge( $srcset, cs_image_build_srcset_arr( $acf_image, $args['default'] ) );
		if( $args['append'] ) 	$srcset = array_merge( $srcset, cs_image_build_srcset_arr( $acf_image, $args['append'] ) );

		// Glue them all together
		$return_str = '';
		if( ! empty( $srcset ) ) :
			foreach( $srcset as $i => $tmp ) :
				$return_str .= $tmp['url'] . ' ' . $tmp['size'];
				if( $i < count( $srcset ) - 1 ) $return_str .= ', ';
			endforeach;
		endif;


		// Return
		return $return_str;

	}
endif;


// Helper function to simplify conduit_get_default_srcset()
function cs_image_build_srcset_arr( $acf_image, $arr ) {
  $srcset = array();
  foreach( $arr as $key => $size ) :
    if( ! is_string( $key ) ) : // <= when 'full' is passed in, we need to look up the url
      $srcset[] = array( 'url' => str_replace( ' ', '%20', $acf_image['sizes'][ $size ] ), 'size' => $acf_image['sizes'][ $size . '-width'] . 'w' );
    else : // <= when a [url] => [size] is passed $key is a string/URL
      $srcset[] = array( 'url' => $key, 'size' => $size );
    endif;
  endforeach;

  return $srcset;
}

