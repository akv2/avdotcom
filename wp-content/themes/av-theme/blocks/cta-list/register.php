<?php

// Build args
$args = cs_build_acf_block_args( array(
  'name'              => 'cta-list',
  'title'             => __('CTA List'),
  'description'       => __('A block with a list of buttons with arrows.'),
  'keywords'          => array( 'cta', 'conduit' ),
  'category'          => 'cs-layout',
) );

// Register
acf_register_block_type( $args );

// Include fields
include_once 'fields.php';
