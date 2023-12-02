<?php

/*
 * Debugging
 */
if( ! function_exists( 'echo_array' ) ) :
  function echo_array( $arr ){
  	echo '<pre style="text-align:left;">';
  	print_r($arr);
  	echo '</pre>';
  }
endif;



/*
 * Multidimensional wp_parse_args <= used for merging $args instead of overwriting them
 */
if( ! function_exists( 'cs_wp_parse_args' ) ) :
  function cs_wp_parse_args( &$a, $b ) {
    $a = (array) $a;
    $b = (array) $b;
    $result = $b;
    foreach ( $a as $k => &$v ) {
      if ( is_array( $v ) && isset( $result[ $k ] ) ) {
        $result[ $k ] = cs_wp_parse_args( $v, $result[ $k ] );
      } else {
        $result[ $k ] = $v;
      }
    }
    return $result;
  }
endif;


/*
 * Speedy queries
 * Use this if we do not need any meta or taxonomy info from this query
 */
if( ! function_exists( 'cs_get_slim_posts' ) ) :
  function cs_get_slim_posts( $args ) {

    $defaults = [
      // Speedy request
      'fields' => 'ids', // <= wp_query default = 'all'

      // These are only required if fields is not set to 'all'
      'no_found_rows' => true,
      'update_post_term_cache' => false,
      'update_post_meta_cache' => false,
    ];

    // Parse
    $args = wp_parse_args( $args, $defaults );

    // Return get_posts
    return get_posts( $args );

  }
endif;




/*
 * Custom include components
 */
if( ! function_exists( 'cs_component' ) ) :
  // Maybe rename to cs_get_template_part or cs_locate_template
  function cs_component( $file, $args = array() ) {
    locate_template( "components/$file.php", true, false, $args );
  }
endif;




/*
 * Convert object to array
 */
if( ! function_exists( 'cs_to_array' ) ) :
  // Maybe rename to cs_get_template_part or cs_locate_template
  function cs_to_array( $the_object ) {
    if( is_object( $the_object ) ) return json_decode( json_encode( $the_object ), TRUE );
    return $the_object;
  }
endif;



/*
 * Get page by template
 */
if( ! function_exists( 'cs_page_by_template' ) ) :
  function cs_page_by_template( $template_slug, $lang = false, $single = true ) {

  	// Lookup a page by template
  	if( ! $lang ) $lang = pll_current_language();

  	// We need to cache this in transients so we don't hit the same query over and over
  	$transient_key = 'cs-template-' . $template_slug . '-' . $lang . '-' . get_field( 'version', 'option' );

  	// if ( WP_DEBUG or false === ( $the_page_ids = get_transient( $transient_key ) ) ) {
  	if ( false === ( $the_page_ids = get_transient( $transient_key ) ) ) {

  		$the_page_ids = get_posts( array(
  			'post_type' 	=> 'page',
  			// 'fields' 			=> 'ids',
  			'nopaging' 		=> true,
        'meta_query' => array(
          'relation' => 'OR',
          array(
            'key'     => '_wp_page_template',
            'value'   => $template_slug . '.php',
          ),
          array(
            'key'     => '_wp_page_template',
            'value'   => 'page-templates/' . $template_slug . '.php',
          ),
        ),
  			'lang' 				=> $lang,
  		) );

  		set_transient( $transient_key, $the_page_ids, MONTH_IN_SECONDS );

  	}

  	if( empty( $the_page_ids ) ) return false;

  	return $single ? $the_page_ids[0] : $the_page_ids;
  }
endif;



/*
 * Redirect to login
 */
if( ! function_exists( 'cs_redirect_to_login' ) ) :
  function cs_redirect_to_login() {
    $login = cs_page_by_template('create-account-login');
    $login_with_redirect = add_query_arg(
      'redirect_to',
      get_permalink(),
      get_permalink( $login ) // your my acount url
    );

    wp_redirect( $login_with_redirect );
    exit;
  }
endif;






/*
 * Register custom post type
 */
if( ! function_exists( 'cs_register_cpt' ) ) :
  function cs_register_cpt( $slug, $args = array() ) {

    $defaults = array(
      "labels" => array(
        "name" => "New CPTs",
        "singular_name" => "New CPT",
      ),
      "description" => "",
      "public" => true,
      "show_ui" => true,
      "has_archive" => false,
      "exclude_from_search" => false,
      "capability_type" => "post",
      "map_meta_cap" => true,
      "hierarchical" => true,
      "rewrite" => array(
        "slug" => $slug,
        "with_front" => false
      ),
      "query_var" => true,
      "supports" => array(
        "title",
        "page-attributes"
      ),
    );

    $args = wp_parse_args( $args, $defaults );

    add_action( 'init', function() use ( $slug, $args ) {
    	register_post_type( $slug, $args );
    } );

  }
endif;



/*
 * Register taxonomy
 */
if( ! function_exists( 'cs_register_tax' ) ) :
  function cs_register_tax( $tax_slug, $post_type, $args = array() ) {

    // Just define name and singular
    $basic_labels = array(
      'name'          => 'New Taxs',
      'singular_name' => 'New Tax',
    );
    $basic_labels = wp_parse_args( $args['labels'], $basic_labels );


    // Dynamic default labels
    $plural             = $basic_labels['name'];
    $singular           = $basic_labels['name'];
    $lc_plural          = strtolower( $plural );
    $lc_singular        = strtolower( $singular );
    $uc_first_plural    = ucfirst( $lc_plural );
    $uc_first_singular  = ucfirst( $lc_singular );

    // Define dynamic labels
    $additional_labels  = array(
      'menu_name'                  => $plural,
      'all_items'                  => "All $plural",
      'parent_item'                => "Parent $singular",
      'parent_item_colon'          => "Parent $singular:",
      'new_item_name'              => "New $singular Name",
      'add_new_item'               => "Add $singular",
      'edit_item'                  => "Edit $singular",
      'update_item'                => "Update $singular",
      'view_item'                  => "View $singular",
      'separate_items_with_commas' => "Separate $lc_singular with commas",
      'add_or_remove_items'        => "Add or remove $lc_plural",
      'choose_from_most_used'      => "Choose from the most used",
      'popular_items'              => "Popular $plural",
      'search_items'               => "Search $plural",
      'not_found'                  => "Not Found",
      'no_terms'                   => "No $lc_plural",
      'items_list'                 => "$uc_first_plural list",
      'items_list_navigation'      => "$uc_first_plural list navigation",
    );
    $labels = wp_parse_args( $args['labels'], $additional_labels );


    // Defaults / merge other arguments
    $other_args = array(
      'hierarchical'               => true,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_in_rest'               => true,
      'show_tagcloud'              => true,
    );
    $args = wp_parse_args( $args, $other_args );

    // After parsing other args we can overwrite our default / merged labels
    $args['labels'] = array_merge( $basic_labels, $additional_labels );

    // echo_array(array($tax_slug, $post_type, $args ));
    add_action( 'init', function() use ( $tax_slug, $post_type, $args ) {
      register_taxonomy( $tax_slug, $post_type, $args );
    }, 1 );




    // Handle User Admin Menu issues right here
    if( 'user' === $post_type ) {

      // ***************************
      // Taxonomy Admin Page
      // ***************************
      // Add menu item under "Users"
      add_action( 'admin_menu', function() use ( $tax_slug, $args ) {
        add_users_page(
          esc_attr( $args['labels']['menu_name'] ),
          esc_attr( $args['labels']['menu_name'] ),
          'edit_users',
          'edit-tags.php?taxonomy=' . $tax_slug
        );
      });

      // Fix active menu item issue.  Without this, on this tax page, "Posts" menu item is active
      add_filter( 'parent_file', function( $parent_file ) use ( $tax_slug, $args ) {
        global $submenu_file;

        // If this is our tax, set our parent file
        if (
          isset( $_GET['taxonomy'] ) &&
          $_GET['taxonomy'] == $tax_slug &&
          $submenu_file == 'edit-tags.php?taxonomy=' . $tax_slug
        ) $parent_file = 'users.php';

        return $parent_file;
      });

      // Swap posts column for users column
      add_filter( 'manage_edit-' . $tax_slug . '_columns', function ( $columns ) {
        unset( $columns['posts'] );
        $columns['users'] = __( 'Users' );
        return $columns;
      });


      // Add user count content to the Users column
      add_filter( 'manage_' . $tax_slug . '_custom_column', function( $display, $column, $term_id ) use ( $tax_slug ) {
        if ( 'users' === $column ) {
          $term = get_term( $term_id, $tax_slug );
          // echo $term->count;
      		echo '<a href="users.php?filter_by_' . $tax_slug . '=' . $term->slug . '">' . $term->count . '</a>';
        }
      }, 10, 3 );


      // ***************************
      // Users Admin Page
      // ***************************
      // Handle query filter on "Users" admin page when we receive a tax filter
      add_action( 'pre_get_users', function( $query ) use ( $tax_slug ) {
        if( ! is_admin() ) return;

        if ( $tax_slug === $query->get( 'orderby') ) {
          $query->set( 'orderby', 'meta_value' );
          $query->set( 'meta_key', $tax_slug );
        } else if( ! empty( $_GET['filter_by_' . $tax_slug ] ) ) {

          // Get URL var
          $filter_by_ = sanitize_title( $_GET['filter_by_' . $tax_slug] );

          // get term ID
          $term = get_term_by( 'slug', $filter_by_, $tax_slug );
          $id = $term->term_id;

          $meta_query = array(
						array(
							'key' => 'user_company', // name of custom field
							'value' => '"' . $id . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
							'compare' => 'LIKE'
						)
					);
					$query->set('meta_query', $meta_query );
        }
      });


    }

  }
endif;






/*
 * Get the top parent
 */
if( ! function_exists( 'cs_get_top_parent_id' ) ) :
  function cs_get_top_parent_id( $post = false ) {
    if( ! $post ) $post = get_post();
    if( is_int( $post ) ) $post = get_post( $post );

    $parent = false;
    if ( $post->post_parent )	{
    	$ancestors = get_post_ancestors( $post->ID );
    	$root = count( $ancestors ) - 1;
    	$parent = $ancestors[ $root ];
    } else {
    	$parent = $post->ID;
    }

    return $parent;
  }
endif;





/*
 * Which Environment
 */
if( ! function_exists( 'cs_environment' ) ) :
  function cs_environment() {
    return strpos( get_home_url(), '.local' ) !== false ? 'development' : 'production';
  }
endif;



/*
 * Log events
 */
if( ! function_exists( 'cs_log' ) ) :
  function cs_log( $str = '', $arr = array(), $line_breaks = false) {

    //Write action to txt log
    $log = '[' . current_time('mysql') . '] ' . $str;

    // Include data
    if( ! empty( $arr ) ) :
      $log .= ':  '; // <= ensure line break before array;

      if( ! $line_breaks ) :
        $log .= http_build_query($arr,'',', ');
      else:
        $log .= PHP_EOL;
        $log .= var_export( $arr, true );
      endif;
    endif;

    $log .= PHP_EOL;

    // Make sure /wp-content/uploads/logs/ directory exists
    $dir = WP_CONTENT_DIR . '/uploads/logs';
    if( ! is_dir( $dir ) ) :
      mkdir( $dir, 0777, true );
    endif;

    // Pack it away
    file_put_contents( trailingslashit( $dir ) . date('Y-m-d') . '.log', $log, FILE_APPEND );

  }
endif;



/*
 * Error Log events
 * /wp-content/debug.log
 */
if( ! function_exists( 'log_array' ) ) :
  function log_array( $arr ) {

    // Update ini
    ini_set( 'error_log', WP_CONTENT_DIR . '/debug.log' );
    error_log( var_export( $arr, true ) );
    // echo_array($arr);
    // error_log( print_r($arr) );

  }
endif;
