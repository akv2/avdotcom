<?php

function cs_acf_options_pages() {
  if( function_exists('acf_add_options_page') ) {

   	// add parent
  	$parent = acf_add_options_page(array(
  		'page_title' 	=> 'Theme Options',
  		'menu_title' 	=> 'Theme Options',
  		'redirect' 		=> false
  	));

  	// add sub page
  	acf_add_options_sub_page(array(
  		'page_title' 	=> 'Global Content',
  		'menu_title' 	=> 'Global Content',
  		'parent_slug' => $parent['menu_slug'],
  	));

  	// add sub page
  	acf_add_options_sub_page(array(
  		'page_title' 	=> 'Recaptcha',
  		'menu_title' 	=> 'recaptcha',
  		'parent_slug' => $parent['menu_slug'],
  	));

  }
}
add_action('acf/init', 'cs_acf_options_pages', 1);
