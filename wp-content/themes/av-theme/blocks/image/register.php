<?php

// Build args
$args = cs_build_acf_block_args( array(
  'name'              => 'image',
  'title'             => __('Image'),
  'description'       => __('A block that contains an wide image.'),
  'keywords'          => array( 'image', 'conduit' ),
  'category'          => 'cs-layout',
) );

// Register
acf_register_block_type( $args );

// Include fields
include_once 'fields.php';
