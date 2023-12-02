<?php

get_header();

while( have_posts() ) : the_post();

  // The title
  if( get_field('show_title') ) :
  	?><h1><?php the_title(); ?></h1><?php
  endif;

  // The Content
  the_content();

endwhile;

get_footer();
