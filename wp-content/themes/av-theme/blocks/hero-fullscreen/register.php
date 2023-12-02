<?php

// Build args
$args = cs_build_acf_block_args( array(
  'name'              => 'hero-fullscreen',
  'title'             => __('Hero: Fullscreen'),
  'description'       => __('A hero block with a background image that extends fullscreen.'),
  'keywords'          => array( 'hero', 'conduit' ),
  'category'          => 'cs-layout',
) );

// Register
acf_register_block_type( $args );

// Include fields
include_once 'fields.php';
