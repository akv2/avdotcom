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
$image = get_field('image');
$image_type = get_field('image_type') ?: 'card';
$text = get_field('text');
$cta = get_field('cta');
$style = get_field('style');

$class .= ' image-' . $image_type;
$class .= ' style-' . $style;
$class .= ' ' . ( $cta ? 'has-cta' : 'no-cta' );

?><section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>"><?php
  if( $is_preview ) :

    cs_component('admin/preview-thumb', $args );
    
    ?><div class="preview-text">
      <p><?php echo $text ? acf_get_truncated( $text, 50 ) . " [" . $block['title'] . "]" : $block['title']; ?></p>
    </div><?php

  else:
    
    ?><div class="bg">
      <div class="container">
        <h2><?php echo wp_kses_post( $text ); ?></h2>
        <?php if( $cta ) : ?><div class="cta-holder"><?php cs_component( 'link', $cta ); ?></div><?php endif; ?>
        <div class="image-holder"><?php 

          // "Card" image maxes at 760 when browser is 1640, full is always 50vw
          $sizes = $image_type == 'card' ? array('full' => '760px') : array();
          $sizes['handheld'] = '50vw';
          $sizes[] = '100vw';
          
          cs_image( $image, array( 
            'sizes' => $sizes
          ) ); ?></div>
      </div>
    </div><?php

  endif;

?></section>
