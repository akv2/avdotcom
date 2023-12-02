<?php

// Build args
$args = cs_build_acf_block_args( array(
  'name'              => 'list',
  'title'             => __('List'),
  'description'       => __('A block with a list of items.'),
  'keywords'          => array( 'list', 'conduit' ),
  'category'          => 'cs-layout',
) );

// Register
acf_register_block_type( $args );

// Include fields
include_once 'fields.php';
