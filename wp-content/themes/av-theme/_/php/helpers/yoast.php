<?php


function cs_get_primary_taxonomy_term( $post_id = 0, $taxonomy = 'category' ) {

	if ( ! $post_id ) $post_id = get_the_ID();

	$terms = get_the_terms( $post_id, $taxonomy );
	$primary_term = array();

	if ( $terms ) {
		if ( class_exists( 'WPSEO_Primary_Term' ) ) {
			$wpseo_primary_term = new WPSEO_Primary_Term( $taxonomy, $post_id );
			$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
			$primary_term = get_term( $wpseo_primary_term );
			if ( is_wp_error( $wpseo_primary_term ) || is_wp_error( $primary_term ) ) $primary_term = $terms[0];
		} else {
      $primary_term = $terms[0];
		}

	}
	return $primary_term;
}
