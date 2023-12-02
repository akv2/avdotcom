<?php

// Build args
$args = cs_build_acf_block_args( array(
  'name'              => 'showcase',
  'title'             => __('Showcase'),
  'description'       => __('A block that contains the showcase of projects.'),
  'keywords'          => array( 'showcase' ),
  'category'          => 'cs-layout',
) );

// Register
acf_register_block_type( $args );

// Include fields
include_once 'fields.php';
