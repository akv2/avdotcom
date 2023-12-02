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
$showcase_items = get_field('showcase');


?><section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>"><?php
  if( $is_preview ) :

    cs_component('admin/preview-thumb', $args );
    
    ?><div class="preview-text">
      <p><?php echo $block['title']; ?></p>
    </div><?php

  else:

    ?><div class="container"><?php 
      if( ! empty( $showcase_items ) ) :
        foreach( $showcase_items as $item ) :

          ?><div class="showcase-item">
            <h2><?php echo esc_html( $item['title'] ); ?></h2>
            <div class="expertise"><?php echo esc_html( $item['expertise'] ); ?></div><?php

            if( $item['link'] ) :
              ?><a href="<?php echo esc_url( $item['link']['url']); ?>" target="<?php echo esc_attr( $item['link']['target'] ); ?>" class="image-holder"><?php
            else:
              ?><div class="image-holder"><?php 
            endif;

              cs_image( $item['image'], array(
                'srcset' => ['append' => ['1536x1536', '2048x2048'] ],
                'sizes' => ['full' => '1540px', '100vw'],
              ) ); 
            
            if( $item['link'] ) :
              ?></a><?php
            else:
              ?></div><?php 
            endif;

            ?><div class="description">
              <?php echo wp_kses_post( $item['description'] ); ?>
            </div>
            <?php cs_component('link', $item['link'] ); ?>
          </div><?php

        endforeach;
      endif; 
    ?></div><?php

  endif;

?></section>
