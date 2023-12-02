<?php

// Build args
$args = cs_build_acf_block_args( array(
  'name'              => 'intro-text-1',
  'title'             => __('Intro Text: Variation 1'),
  'description'       => __('A block, generally placed below a hero with a paragraph and CTA.'),
  'keywords'          => array( 'intro', 'conduit' ),
  'category'          => 'cs-layout',
) );

// Register
acf_register_block_type( $args );

// Include fields
include_once 'fields.php';
