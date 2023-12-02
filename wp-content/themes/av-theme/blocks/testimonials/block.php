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
$testimonials = get_field('testimonials');

?><section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>"><?php
  if( $is_preview ) :

    cs_component('admin/preview-thumb', $args );
    
    ?><div class="preview-text">
      <p><?php echo $block['title']; ?></p>
    </div><?php

  else:

    ?><div class="container">
      <div class="glide" data-controller="slideshow">
        <div data-glide-el="track" class="glide__track">
          <ul class="glide__slides"><?php
            foreach( $testimonials as $holder ) : 
              extract( $holder );
              ?><li class="glide__slide">
                <div class="border">
                  <div class="text"><?php echo wp_kses_post( $quote ); ?></div>
                  <?php if( $by ) : ?><div class="by"><?php echo esc_html( $by ); ?></div><?php endif; ?>
                </div>
              </li><?php
            endforeach;
          ?></ul>
        </div>
        <div class="glide__bullets" data-glide-el="controls[nav]">
          <button class="glide__bullet" data-glide-dir="=0"></button>
          <button class="glide__bullet" data-glide-dir="=1"></button>
          <button class="glide__bullet" data-glide-dir="=2"></button>
        </div>
      </div>
    </div><?php

  endif;

?></section>
