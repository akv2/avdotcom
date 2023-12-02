<?php

// ================================================
// Additional classes (passed in from page template)
// ================================================
$body_class = [];
$header_classes = [];
$main_class = [];

// From template
if( ! empty( $args ) && ! empty( $args['body_class'] ) ) $body_class[] = $args['body_class'];
if( ! empty( $args ) && ! empty( $args['main_class'] ) ) $main_class[] = $args['main_class'];

// From settings
$header_settings = get_field('header_settings');

if( ! is_search() && $header_settings && ! empty( $header_settings['is_over_content'] ) ) :
	$body_class[] = 'header-over-content';
endif;

// Background Image (Page settings)
$background_image = get_field('background_image');
$body_style = '';
if( $background_image ) :
  $body_class[] = 'has-bg-image';
  $body_style = 'style="background-image:url( ' . $background_image['url'] . ');"';
endif;


?><!DOCTYPE html>
<!--[if lt IE 7]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class='no-js' <?php language_attributes(); ?>>
	<!--<![endif]-->
	<head>
		<meta charset='utf-8' />
		<meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible' />
		<meta name='author' content='Aaron Vanderzwan' />
		<meta name="viewport" content="width=device-width, user-scalable=no" />

		<title><?php wp_title('| ' . get_bloginfo('name'), true, 'right'); ?></title>

		<link rel="icon" href="/favicon.ico?v1.0" sizes="any"><!-- 32×32 -->
		<link rel="icon" href="/icons/favicon.svg?v1.0" type="image/svg+xml">
		<link rel="apple-touch-icon" href="/icons/apple-touch-icon.png?v1.0"><!-- 180×180 -->
		<link rel="manifest" href="/manifest.webmanifest" crossorigin="use-credentials">

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet"> -->
    
    <?php wp_head(); ?>
	</head>
	<body <?php body_class( implode( ' ' , $body_class ) ); ?> <?php echo $body_style; ?>><?php

		cs_component('browser-notice');
    cs_component('skip-to-content'); // <= jump to #main link

    // Do header
    ?><header class="<?php echo esc_attr( implode(' ', $header_classes ) ); ?>"><?php
			?><div class="container"><?php

        ?><div class="tagline"><?php bloginfo('description') ?></div><?php
        
        // Logo
        ?><a href="<?php bloginfo('url'); ?>" class="logo"><span class="sr-only"><?php bloginfo( 'name' ); ?></span></a><?php

        // Menu
        ?><a href="" class="main-nav-trigger" data-controller="toggle__main_nav">
          <span class="lines"><span></span></span>
          <span class="sr-only"><?php _e('Toggle Menu') ?></span><?php
        ?></a><?php

        ?><nav><?php

          // Static menu
          wp_nav_menu( array( 'theme_location' => 'header', 'menu_class' => 'left', 'container' => 'ul' ) );

        ?></nav><?php

      ?></div><?php
    ?></header><?php


    // Open Main (#main jump for screen readers)
    ?><main id="main"><?php

