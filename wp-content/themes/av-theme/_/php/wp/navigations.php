<?php

function cs_register_menus() {

  register_nav_menus(
    array(
      'header'     => __( 'Header' ),
      // 'footer_col_1'   => __( 'Footer: Column 1'),
      // 'footer_col_2'   => __( 'Footer: Column 2'),
      // 'footer_col_3'   => __( 'Footer: Column 3'),
    )
  );
}
add_action( 'init', 'cs_register_menus' );

