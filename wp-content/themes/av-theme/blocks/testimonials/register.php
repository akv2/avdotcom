<?php

// Build args
$args = cs_build_acf_block_args( array(
  'name'              => 'testimonials',
  'title'             => __('Testimonials'),
  'description'       => __('A slider of testimonials.'),
  'keywords'          => array( 'pull', 'quote', 'testimonials', 'slider', 'conduit' ),
  'category'          => 'cs-layout',
) );

// Register
acf_register_block_type( $args );

// Include fields
include_once 'fields.php';
