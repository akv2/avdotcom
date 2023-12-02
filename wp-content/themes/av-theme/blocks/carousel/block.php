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
$slides = get_field('slides');

?><section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>"><?php
  if( $is_preview ) :

    cs_component('admin/preview-thumb', $args );

    // Get titles from slides
    $preview_title = false;
    if( $slides ) :
      $slide_titles = array_map(fn($holder) => $holder['title'], $slides);
      $preview_title = implode( ', ', $slide_titles );
    endif;
    
    ?><div class="preview-text">
      <p><?php echo $preview_title ? acf_get_truncated( $preview_title, 50 ) . " [" . $block['title'] . "]" : $block['title']; ?></p>
    </div><?php

  else:


    ?><div class="glide" data-controller="slideshow">
      <div data-glide-el="track" class="glide__track">
        <ul class="glide__slides"><?php
          foreach( $slides as $slide ) : 
            ?><li class="glide__slide">
              <div class="container">
                <div class="image-holder"><?php 
                  cs_image( $slide['image'], array(
                    'srcset' => array( 'default' => ['square-200', 'square-300'] ),
                    'sizes' => array( 'handheld' => '50vw', '100vw'),
                  ) ); ?></div>
                <div class="content">
                  <h3><?php echo $slide['title'] ?></h3>
                  <div class="text"><?php echo wp_kses_post( $slide['text'] ); ?></div>
                </div>
              </div>
            </li><?php
          endforeach;
          ?>
        </ul>
      </div>
      <div class="arrows-holder">
        <div class="glide__arrows" data-glide-el="controls">
          <button class="prev" data-glide-dir="&lt;"><span class="sr-only">prev</span></button>
          <button class="next" data-glide-dir="&gt;"><span class="sr-only">next</span></button>
        </div>
      </div>
    </div><?php

  endif;

?></section>
