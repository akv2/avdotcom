<?php

// Build args
$args = cs_build_acf_block_args( array(
  'name'              => 'intro-text-2',
  'title'             => __('Intro Text: Variation 2'),
  'description'       => __('A block, generally placed below a hero with a title, paragraph and CTA.'),
  'keywords'          => array( 'intro', 'conduit' ),
  'category'          => 'cs-layout',
) );

// Register
acf_register_block_type( $args );

// Include fields
include_once 'fields.php';
