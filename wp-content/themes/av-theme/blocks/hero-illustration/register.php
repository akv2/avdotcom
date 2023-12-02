<?php

// Build args
$args = cs_build_acf_block_args( array(
  'name'              => 'hero-illustration',
  'title'             => __('Hero: Illustration'),
  'description'       => __('A hero block with no image.'),
  'keywords'          => array( 'hero', 'text', 'conduit' ),
  'category'          => 'cs-layout',
) );

// Register
acf_register_block_type( $args );

// Include fields
include_once 'fields.php';
