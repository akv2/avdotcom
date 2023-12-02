<?php

// Build args
$args = cs_build_acf_block_args( array(
  'name'              => 'image-text-cta',
  'title'             => __('Image, Text & CTA'),
  'description'       => __('A block that contains an small image some text and a CTA.'),
  'keywords'          => array( 'image', 'text', 'conduit' ),
  'category'          => 'cs-layout',
) );

// Register
acf_register_block_type( $args );

// Include fields
include_once 'fields.php';
