<?php

/**
 * Gets the primary category set by Yoast SEO.
 *
 * @return array The category name, slug, and URL.
 */
if( ! function_exists( 'cs_get_primary_category' ) ) :
  function cs_get_primary_category( $post = 0, $taxonomy = 'category' ) {
    if ( ! $post ) $post = get_the_ID();

  	$terms        = get_the_terms( $post, $taxonomy );
  	$primary_term = array();

  	if ( $terms ) {
  		$term_display = '';
  		$term_slug    = '';
  		$term_link    = '';
  		if ( class_exists( 'WPSEO_Primary_Term' ) ) {
  			$wpseo_primary_term = new WPSEO_Primary_Term( $taxonomy, $post );
  			$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
  			$term               = get_term( $wpseo_primary_term );
  			if ( is_wp_error( $term ) ) {
  				$term_display = $terms[0]->name;
  				$term_slug    = $terms[0]->slug;
  				$term_link    = get_term_link( $terms[0]->term_id );
  			} else {
  				$term_display = $term->name;
  				$term_slug    = $term->slug;
  				$term_link    = get_term_link( $term->term_id );
  			}
  		} else {
  			$term_display = $terms[0]->name;
  			$term_slug    = $terms[0]->slug;
  			$term_link    = get_term_link( $terms[0]->term_id );
  		}
  		$primary_term['url']   = $term_link;
  		$primary_term['slug']  = $term_slug;
  		$primary_term['title'] = $term_display;
  	}
  	return $primary_term;

  }
endif;
