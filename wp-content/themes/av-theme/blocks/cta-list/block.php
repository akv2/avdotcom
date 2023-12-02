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
$title = get_field('title');
$links = get_field('links');

?><section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>"><?php
  if( $is_preview ) :

    cs_component('admin/preview-thumb', $args );

    $preview_title = false;
    if( $title ) :
      $preview_title = $title;
    elseif( $links ) :
      $link_titles = array_map(fn($holder) => $holder['link']['title'], $links);
      $preview_title = implode( ', ', $link_titles );
    endif;
    
    ?><div class="preview-text">
      <p><?php echo $preview_title ? acf_get_truncated( $preview_title, 60 ) . " [" . $block['title'] . "]" : $block['title']; ?></p>
    </div><?php

  else:

    ?><div class="container">
      <?php if( $title ) : ?><h2><?php echo wp_kses_post( $title ); ?></h2><?php endif; ?>
      <div class="links"><?php
        foreach( $links as $link_holder ) :
          extract( $link_holder );
          cs_component( 'link', $link );
        endforeach;
      ?></div>
    </div><?php
  endif;

?></section>
