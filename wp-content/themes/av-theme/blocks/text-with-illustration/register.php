<?php

// Build args
$args = cs_build_acf_block_args( array(
  'name'              => 'text-with-illustration',
  'title'             => __('Text / Illustration'),
  'description'       => __('Block contains image, text and illustration.'),
  'keywords'          => array( 'text', 'conduit' ),
  'category'          => 'cs-layout',
) );

// Register
acf_register_block_type( $args );

// Include fields
include_once 'fields.php';
