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
$title = get_field('title');
$text = get_field('text');
$cta = get_field('cta');
$style = get_field('style');

$class .= ' style-' . $style;

?><section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>"><?php
  if( $is_preview ) :

    cs_component('admin/preview-thumb', $args );
    
    ?><div class="preview-text">
      <p><?php echo $text ? acf_get_truncated( $text, 50 ) . " [" . $block['title'] . "]" : $block['title']; ?></p>
    </div><?php

  else:

    ?><div class="container">
      <div class="image-holder"><?php 
        cs_image( $image, array(
          'sizes' => array( 'full' => '500px', 'handheld' => '33vw', 'large-mobile' => '50vw', '100vw')
        ) ); 
      ?></div>
      <div class="content">
        <?php if( $title ) : ?><h2><?php echo esc_html( $title ); ?></h2><?php endif; ?>
        <div class="text"><?php echo wp_kses_post( $text ); ?></div>
        <?php cs_component('link', $cta ); ?>
      </div>
    </div><?php

  endif;

?></section>
