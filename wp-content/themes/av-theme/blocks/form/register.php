<?php

// Build args
$args = cs_build_acf_block_args( array(
  'name'              => 'form',
  'title'             => __('Form'),
  'description'       => __('A WP Forms form block;'),
  'keywords'          => array( 'form', 'conduit' ),
  'category'          => 'cs-layout',
) );

// Register
acf_register_block_type( $args );

// Include fields
include_once 'fields.php';
