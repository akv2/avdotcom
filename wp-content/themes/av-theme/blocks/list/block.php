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
$sub_title = get_field('sub_title');
$items = get_field('items');
$style = get_field('style');

$class .= ' style-' . $style;

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
      <?php if( $title ) : ?><h2 class="<?php echo $sub_title ? 'has-subtitle' : 'no-subtitle' ?>"><?php echo wp_kses_post( $title ); ?></h2><?php endif; ?>
      <?php if( $sub_title ) : ?><div class="sub"><?php echo wp_kses_post( $sub_title ); ?></div><?php endif; ?>
      <ul class="list"><?php
        foreach( $items as $item_holder ) :
          extract( $item_holder );
          ?><li><?php echo wp_kses_post( $title ) ?></li><?php
        endforeach;
      ?></ul>
    </div><?php
  endif;

?></section>
