<?php



/* ***************************
 * Disable admin for subscribers (non admins)
 *************************** */
function cs_disable_dashboard() {
	if ( ! is_user_logged_in() ) return null;

	if ( ! current_user_can('administrator') && is_admin() && ! defined( 'DOING_AJAX' ) ) {
		wp_redirect( home_url() );
		exit;
	}
}
add_action('admin_init', 'cs_disable_dashboard');





/* ******************************************************
 * Basic HTML output cleanup
 ****************************************************** */
// remove emoji support
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Remove rss feed links (Blog)
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );

// Wemove wp-embed
add_action( 'wp_footer', function(){
  wp_dequeue_script( 'wp-embed' );
});





/* ***************************
 * Remove most body classes
 *************************** */
add_filter('body_class', 'cs_body_class_filter' );
function cs_body_class_filter( $classes ) {
	return $classes;

	// return $classes;
  $body_class = array();

  // A few pass through
  $allowed = array(
		'admin-bar',
		'logged-in',
		'header-over-content',
		'blog',
		'single',
		'single-product',
		'archive',
		'category',
	);
  foreach( $allowed as $allowed_class ) :
    if( in_array( $allowed_class, $classes, true) ) :
      $body_class[] = $allowed_class;
    endif;
  endforeach;

	// Post specific
	if( in_array('page-template', $classes, true ) ) :

		// This is currently "page-templates/template-homepage.php"
		$page_template = get_page_template_slug();

		// Remove '.php'
		$page_template = str_replace( '.php', '', $page_template );

		// Only get things after all slashes
		$page_template_arr = explode( '/', $page_template );
		$page_template = $page_template_arr[ count( $page_template_arr ) - 1 ];

		// Remove "template-" from begining of string
		$page_template = str_replace( 'template-', '', $page_template );

		$body_class[] = $page_template;

	endif;

  return $body_class;
}





/* ***************************
 * Remove most menu classes
 *************************** */
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
  return is_array($var) ? array_intersect($var, array('current-menu-item', 'is-heading', 'menu-item-has-children', 'cli_settings_button')) : '';
}





/* ***************************
 * Only enable specific Blocks
 *************************** */
function cs_allowed_block_types( $allowed_block_types, $post ) {

	$acf_blocks = acf_get_block_types();
	$acf_slugs = array_keys( $acf_blocks );

	if( ! empty( $_GET['allow-all-blocks'] ) ) :
		return $allowed_block_types;
	endif;

	$slim_allowed = array_merge( $acf_slugs, array(
		'core/html',
		'core/shortcode',
    // 'core/paragraph',
		// 'core/table',

		// Enable reusable blocks
		// 'core/block',
		// 'core/template',
	));

  return $slim_allowed;
}
add_filter( 'allowed_block_types_all', 'cs_allowed_block_types', 10, 2 );




/* ***************************
 * View Reusable blocks in the Admin
 *************************** */
// function cs_reusable_blocks_admin_menu() {
//   add_menu_page( 'Reusable Blocks', 'Reusable Blocks', 'edit_posts', 'edit.php?post_type=wp_block', '', 'dashicons-editor-table', 22 );
// }
// add_action( 'admin_menu', 'cs_reusable_blocks_admin_menu' );




/* ***************************
 * Disable Default Fullscreen Editor
 *************************** */
function cs_disable_default_fullscreen_editor() {
	$script = "window.onload = function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } }";
	wp_add_inline_script( 'wp-blocks', $script );
}
add_action( 'enqueue_block_editor_assets', 'cs_disable_default_fullscreen_editor' );




/* ***************************
 * Disable Color / Typography
 *************************** */
function cs_disable_gutenberg_custom_colors() {

	// Colors
	// add_theme_support( 'editor-color-palette' ); // <= need to pass some in... errors in WP admin.  disabling for now
	add_theme_support( 'disable-custom-colors' );

	// Text Sizes / Typography
  // removes the text box where users can enter custom pixel sizes
  add_theme_support('disable-custom-font-sizes');

  // forces the dropdown for font sizes to only contain "normal"
  add_theme_support('editor-font-sizes', array());

	// Add wide support
	add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'cs_disable_gutenberg_custom_colors' );
function cs_disabledropcap( $editor_settings ) {
	$editor_settings['__experimentalFeatures']['typography']['dropCap'] = false;
	return $editor_settings;
}
add_filter('block_editor_settings_all', 'cs_disabledropcap');



/* ***************************
 * Disable support for comments and trackbacks in post types
 *************************** */
function cs_disable_comments_post_types_support() {
	// Remove post types
  $post_types = get_post_types();
  foreach ($post_types as $post_type) {
    if(post_type_supports($post_type, 'comments')) {
      remove_post_type_support($post_type, 'comments');
      remove_post_type_support($post_type, 'trackbacks');
    }
  }

	// Remove metabox
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

	// Redirect any user trying to access comments page
  global $pagenow;
  if ($pagenow === 'edit-comments.php') {
    wp_redirect(admin_url()); exit;
  }
}
add_action('admin_init', 'cs_disable_comments_post_types_support');

// Remove admin pages
function cs_disable_comments_admin_page() {
	remove_menu_page('edit.php');
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'cs_disable_comments_admin_page');

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Remove comments links from admin bar
function cs_disable_comments_admin_bar(){
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'cs_disable_comments_admin_bar' );



// Remove TinyMCE buttons
function cs_toolbars( $toolbars ) {

	// Remove items from Basic wysiwyg
	$removes = ['blockquote', 'strikethrough', 'alignleft', 'aligncenter', 'alignright'];
	foreach( $removes as $remove_key ) :
		if( ( $key = array_search( $remove_key , $toolbars['Basic'][1] ) ) !== false )
		  unset( $toolbars['Basic'][1][$key] );
	endforeach;

	// remove the 'Basic' toolbar completely
	// unset( $toolbars['Basic'] );
	$toolbars['Basic'][1][] = 'removeformat';
	$toolbars['Basic'][1][] = 'pastetext';

	return $toolbars;

}
add_filter( 'acf/fields/wysiwyg/toolbars' , 'cs_toolbars'  );




/**
 * Remove the 'Add Form' WPForms TinyMCE button.
 *
 * In the function below we disable displaying the 'Add Form' button
 * on pages and posts. You can replace 'page' and 'post' with your desired post type.
 *
 * @link   https://wpforms.com/developers/remove-add-form-button-from-tinymce-editor/
 *
 * @param  bool $display
 * @return bool
 */
function cs_wpf_remove_media_button( $display ) {
  $screen = get_current_screen();
  if ( 'page' == $screen->post_type || 'post' == $screen->post_type ) return false;
  return $display;
}
add_filter( 'wpforms_display_media_button', 'cs_wpf_remove_media_button' );








/* ******************************************************
 * Disable admin columns for products
 ****************************************************** */
function cs_remove_seo_columns( $columns ) {
	 unset($columns['wpseo-score']);
	 unset($columns['wpseo-score-readability']);
	 unset($columns['wpseo-title']);
	 unset($columns['wpseo-metadesc']);
	 unset($columns['wpseo-focuskw']);
	 unset($columns['wpseo-links']);
	 unset($columns['wpseo-linked']);
	 return $columns;
}
function cs_remove_product_columns( $columns ) {
  unset($columns['thumb']);
  unset($columns['sku']);
  unset($columns['is_in_stock']);
  unset($columns['product_cat']);
  unset($columns['product_tag']);
  unset($columns['featured']);
  unset($columns['date']);

	// Remove SEO columns
	$columns = cs_remove_seo_columns( $columns );

  return $columns;
}
add_filter( 'manage_edit-product_columns', 'cs_remove_product_columns',10, 1 );


add_filter( 'manage_edit-location_columns', 'cs_remove_seo_columns',10, 1 );
add_filter( 'manage_edit-post_columns', 'cs_remove_seo_columns',10, 1 );
add_filter( 'manage_edit-upgrade_columns', 'cs_remove_seo_columns',10, 1 );

function cs_remove_basic_columns( $columns ) {
	$columns = cs_remove_seo_columns( $columns );
	unset($columns['date']);
	return $columns;
}
add_filter( 'manage_edit-fabrics_columns', 'cs_remove_basic_columns',10, 1 );
add_filter( 'manage_edit-finish_columns', 'cs_remove_basic_columns',10, 1 );








/* ******************************************************
 * Limit sticky posts to only 1 at a time
 ****************************************************** */
function cs_only_one_sticky_post( $post_id ) {
  if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
  if ( ! wp_is_post_revision( $post_id ) ) $post_id = $post_id->ID;

  $sticky = ( isset( $_POST['sticky'] ) && $_POST['sticky'] == 'sticky' ) || is_sticky( $post_id );
  if( $sticky ) :
    $sticky_posts = array();
    $sticky_posts_list = get_option( 'sticky_posts', array() );

	  // The Post IDs are stored in the options table as a single list, so we need to construct a new list with the future posts, plus the newly-published sticky post.
    $new_sticky_posts_list = array();
    foreach( $sticky_posts_list as $sticky_post ) :
  	  $postStatus = get_post_status( $sticky_post );
  	  if ( get_post_status( $sticky_post ) != 'publish' || $sticky_post == $post_id ) :
  		  array_push( $new_sticky_posts_list, $sticky_post );
  		endif;
    endforeach;
    update_option( 'sticky_posts', $new_sticky_posts_list );
  endif;
}
add_action( 'draft_to_publish',   'cs_only_one_sticky_post' );
add_action( 'future_to_publish',  'cs_only_one_sticky_post' );
add_action( 'new_to_publish',     'cs_only_one_sticky_post' );
add_action( 'pending_to_publish', 'cs_only_one_sticky_post' );
add_action( 'publish_to_publish', 'cs_only_one_sticky_post' );








/* ******************************************************
 * Remove favicon since we have hardcoded it
 ****************************************************** */
function cs_remove_site_icon($wp_customize) {
	$wp_customize->remove_control('site_icon');
}
add_action( 'customize_register', 'cs_remove_site_icon', 20, 1 );
remove_action( 'wp_head', 'wp_site_icon', 99 );








/* ******************************************************
 * Disable Admin Email Verification
 ****************************************************** */
add_filter( 'admin_email_check_interval', '__return_false' );








/* ******************************************************
 * WYSIWYG EDITOR OPTIONS
 ****************************************************** */
// First line
function cs_mce_1( $buttons ) {
	// OPTIONS
	// bold, italic, bullist, numlist, blockquote, underline, alignjustify, alignleft,
	// aligncenter, alignright, link, unlink, strikethrough, wp_more, spellchecker,
	// wp_adv, dfw, formatselect, hr, forecolor, pastetext, removeformat, charmap,
	// outdent, indent, undo, redo, wp_help
	// echo_array($buttons);
	// exit;
	return array( 'formatselect', 'bold', 'italic', 'bullist', 'numlist', 'link', 'unlink', 'pastetext', 'removeformat', 'undo', 'redo' );
}
add_filter( 'mce_buttons', 'cs_mce_1' ); // <= first line of buttons

// Second line
function cs_mce_2( $buttons ) {
	return array();
}
add_filter( 'mce_buttons_2', 'cs_mce_2' ); // <= second line of buttons
