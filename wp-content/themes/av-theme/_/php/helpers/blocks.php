<?php


/**
 * cs_setup_block_vars
 *
 * Returns block vars to keep block.php dry
 *
 * @since 1.0.0
 *
 * @param array $block      The prepared ACF Block object
 * @param bool  $is_preview Whether in preview mode or not
 *
 * @return array
 */
if( ! function_exists( 'cs_setup_block_vars' ) ) :
  function cs_setup_block_vars( $block, $is_preview = false ) {

    // Create slug from path (folder name)
    $slug = ! empty( $block['path'] ) ? sanitize_title( $block['path'] ) : sanitize_title( str_replace('acf/', '', $block['name'] ) );

    // *********************
    // BUILD BLOCK ID
    $id = $slug . '-' . $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }


    // *********************
    // BUILD CLASSES
    // Instantiate classes array
    $classes = array( 'cs-block', $slug );

    // Add if preview
    if( $is_preview ) $classes[] = 'is-preview';

    // Custom classes from admin
    if( ! empty( $block['className'] ) ) $classes = array_merge( $classes, explode( ' ', $block['className'] ) );

    // If align
    if( ! empty( $block['align'] ) ) $classes[] = 'align-' . $block['align'];

    // Add extra space from fields
    if( ! empty( $block['data']['bg_color'] ) ) $classes[] = 'bg-' . $block['data']['bg_color'];
    if( ! empty( $block['data']['space_above'] ) ) $classes[] = 'space-a-' . $block['data']['space_above'];
    if( ! empty( $block['data']['space_below'] ) ) $classes[] = 'space-b-' . $block['data']['space_below'];

    // Return vars
    return array(
      'slug'   => $slug,
      'id'     => $id,
      'class'  => implode( ' ', $classes ),
    );

  }
endif;






/**
 * cs_add_block_to_post
 *
 * Programmatically add an ACF Block to a post's post_content.
 * Note: This could be done for default blocks on a post type, or for testing [tests/test-permissions-blocks.php].
 *
 * @since 1.0.0
 *
 * @param integer        $post_id
 * @param array          $attrs The attributes in the JSON portion of the ACF Block
 * @param array          $args Whether to overwrite, or merge default $attrs
 *                             Whether to prepend, append, or replace to current post_content
 *
 * @return array $acf_block The newly created block from parse_blocks converted to ACF Block
 */
if( ! function_exists( 'cs_add_block_to_post' ) ) :
  function cs_add_block_to_post( $post_id, $attrs = array(), $args = array() ) {

    // If we didn't get a block_name, set it to the first block_type
    if( empty( $attrs ) || empty( $attrs['name'] ) ) :
      $block_types = acf_get_block_types();
      $test_block = reset( $block_types );
      $block_name = $test_block['name'];
    else:
      $block_name = $attrs['name'];
    endif;

    // Assign defaults
    $default = array(
      "id"    => "block_" . uniqid(),
      "name"  => $block_name,
      "data"  => array(
        "restricted_access"       => "0",
        "_restrict_access"        => 'field_605ce7c607a90',
        "allowed_user_companies"  => "0",
        "_allowed_user_companies" => "field_605ce7e407a91",
        "allowed_user_types"      => "0",
        "_allowed_user_types"     => "field_605ce71107a8f"
      ),
      "align" => "",
      "mode"  => "preview"
    );

    // Merge atts
    if( ! empty( $args['overwrite_attrs'] ) && $args['overwrite_attrs'] ) :
      $acf_json_arr = wp_parse_args( $attrs, $default );
    else :
      $acf_json_arr = cs_wp_parse_args( $attrs, $default ); // <= recursive parse_args [helpers/general.php]
    endif;

    // Construct the block code
    $new_content = '<!-- wp:' . $block_name . ' ' . json_encode( $acf_json_arr ) . ' /-->';

    // Append or prepend to previous content
    if( ! empty( $args['type'] ) && $args['type'] === 'prepend' ) :
      $the_post = get_post( $post_id );
      $new_content = $new_content . "\n" . $the_post->post_content;
    elseif( ! empty( $args['type'] ) && $args['type'] === 'append' ) :
      $the_post = get_post( $post_id );
      $new_content = $the_post->post_content . "\n" . $new_content;
    endif;

    // Do it
    wp_update_post( array(
      'ID' => $post_id,
      'post_content' => $new_content,
    ));

    // Return block
    $parsed_blocks = parse_blocks( $new_content );

    // Which block
    $parsed_block = $parsed_blocks[0];
    if( ! empty( $args['type'] ) && $args['type'] === 'append' ) :
      $parsed_block = $parsed_blocks[ count($parsed_blocks) - 1 ];
    endif;

    // Convert to ACF Block
    return acf_prepare_block( $parsed_block['attrs'] );

  }
endif;






/**
 * cs_close_blocks
 *
 * Close all blocks on a post.
 * [tests/test/helpers/test-blocks.php].
 *
 * @since 1.0.0
 *
 * @param integer   $post_id
 *
 * @return boolean  $success
 */
if( ! function_exists( 'cs_close_blocks' ) ) :
  function cs_close_blocks( $post_id ) {
    $the_post = get_post( $post_id );

    if( is_wp_error( $the_post ) ) return false;

    // if there are blocks
    if ( has_blocks( $the_post->post_content ) ) :

      // Make new content
      $the_post->post_content = str_replace('"mode": "edit"','"mode": "preview"', $the_post->post_content); // <= exactly as ACF writes it
      $the_post->post_content = str_replace('"mode":"edit"','"mode":"preview"', $the_post->post_content);

      // Do it
      wp_update_post( $the_post );

    endif;

    return true;

  }
endif;






/**
 * cs_get_block_fields_from_post
 *
 * Programmatically add an ACF Block to a post's post_content.
 * Note: This could be done for default blocks on a post type, or for testing [tests/test-permissions-blocks.php].
 *
 * @since 1.0.0
 *
 * @param integer        $post_id
 * @param array          $attrs The attributes in the JSON portion of the ACF Block
 * @param array          $args Whether to overwrite, or merge default $attrs
 *                             Whether to prepend, append, or replace to current post_content
 *
 * @return array $acf_block The newly created block from parse_blocks converted to ACF Block
 */
if( ! function_exists( 'cs_get_block_fields_from_post' ) ) :
  function cs_get_block_fields_from_post(string $block_id, int $post_id) {
    $post = get_post($post_id);

    if (!$post) return false;

    $blocks = parse_blocks($post->post_content);

    foreach($blocks as $block){
      if( empty( $block['attrs']['id'] ) ) continue;
      if ($block['attrs']['id'] !== $block_id) continue;

      acf_setup_meta($block['attrs']['data'], $block['attrs']['id'], true);
      $fields = get_fields();
      acf_reset_meta($block['attrs']['id']);
      wp_reset_postdata();

      return $fields;
    }

    return false;


  }
endif;
