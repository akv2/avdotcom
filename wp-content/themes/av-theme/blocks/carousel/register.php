<?php

// Build args
$args = cs_build_acf_block_args( array(
  'name'              => 'carousel',
  'title'             => __('Carousel'),
  'description'       => __('A block with rotating content.'),
  'keywords'          => array( 'carousel', 'conduit' ),
  'category'          => 'cs-layout',
) );

// Register
acf_register_block_type( $args );

// Include fields
include_once 'fields.php';
