<?php

/**
 * Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Setup block (gives us a $class and $id)
$args = cs_setup_block_vars( $block, $is_preview );
extract( $args );

// Fields
$text = get_field('text');
$cta = get_field('cta');

?><section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>"><?php
  if( $is_preview ) :

    cs_component('admin/preview-thumb', $args );
    
    ?><div class="preview-text">
      <p><?php echo $text ? acf_get_truncated( $text, 50 ) . " [" . $block['title'] . "]" : $block['title']; ?></p>
    </div><?php

  else:

    ?><div class="container">
      <div class="content">
        <div class="text"><?php echo wp_kses_post( $text ); ?></div><?php
        cs_component( 'link', $cta );
      ?></div>
    </div><?php
  endif;

?></section>
