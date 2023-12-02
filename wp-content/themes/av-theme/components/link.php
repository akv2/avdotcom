<?php

// Comes in as an ACF_Link
$link = $args;
if( $link ) :
  ?><a href="<?php echo esc_url( $link['url']); ?>" target="<?php echo esc_attr( $link['target'] ); ?>" class="g-link"><?php
    ?><span><?php echo esc_html( $link['title'] ); ?></span><?php
  ?></a><?php
  
endif;
