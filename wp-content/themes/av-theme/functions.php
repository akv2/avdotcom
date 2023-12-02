<?php
/**
 * functions.php
 **/


// Open up CORS for now... TODO: should be restricted in the future
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Headers: *");

// Autoloader
locate_template('_/php/autoload.php', true);
$loader = new AutoLoad;

// Constants
$loader->load('_/php/constants.php');

// Composer autoload
$loader->load('vendor/autoload.php');

// ACF (plugin, settings and blocks)
$loader->load('_/php/acf/init.php');

// Loaders
$loader->load('_/php/helpers/'); // First for debugging

$loader->load('_/php/cts/');
$loader->load('_/php/cpts/'); // <= needs cts for user permissions (companies / types)
$loader->load('_/php/cfs/');
$loader->load('_/php/ajax/');
$loader->load('_/php/crons/');
$loader->load('_/php/on/');
$loader->load('_/php/wp/');

// Classes (this allows us to not have to worry about load order)
spl_autoload_register( function( $class_name ) {
	if( file_exists( get_template_directory() . '/_/php/classes/' . $class_name . '.php' ) ) :
		include get_template_directory() . '/_/php/classes/' . $class_name . '.php';
	endif;
} );

// User Globals
// $loader->load('_/php/user-storage.php');

// Plugin specific
// $loader->load('_/php/polylang/');
// $loader->load('_/php/woocommerce/');
$loader->load('_/php/gravity-forms.php');

// Files
$loader->load('_/php/application.php');
