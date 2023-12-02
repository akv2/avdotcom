<?php

// Build args
$args = cs_build_acf_block_args( array(
  'name'              => 'colorblock',
  'title'             => __('Colorblock'),
  'description'       => __('A block containing image, texts and cta with a color background.'),
  'keywords'          => array( 'colorblock', 'conduit' ),
  'category'          => 'cs-layout',
) );

// Register
acf_register_block_type( $args );

// Include fields
include_once 'fields.php';
