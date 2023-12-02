<?php

// Build args
$args = cs_build_acf_block_args( array(
  'name'              => 'pull-quote',
  'title'             => __('Pull Quote w/ CTA'),
  'description'       => __('A block containing some large text and a CTA.'),
  'keywords'          => array( 'pull', 'quote', 'conduit' ),
  'category'          => 'cs-layout',
) );

// Register
acf_register_block_type( $args );

// Include fields
include_once 'fields.php';
