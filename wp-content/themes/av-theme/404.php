<?php

// Handle 404 on bynder search results with paged var higher than WP
// if( ! empty( get_query_var('s') ) && ! empty( $_GET['type'] ) && $_GET['type'] === 'images' ) :
//   http_response_code(200);
//   include 'search.php';
//   exit;
// endif;



// $image = get_field('bg_404', 'option');

get_header();

?><section id="the-404"><?php

	?><div class="container">
    <div class="content">
  		<h2><?php _e("Page not found") ?></h2>
  		<div class="description">
  			<p><?php _e('We can’t find the page you’re looking for. To learn more about what we’re doing, head to our homepage.') ?></p>
        <?php cs_component( 'link', array('title' => __('Visit Homepage'), 'url' => home_url(), 'target' => '' ) ); ?>
  		</div>
    </div>
	</div>
</section><?php

get_footer();
