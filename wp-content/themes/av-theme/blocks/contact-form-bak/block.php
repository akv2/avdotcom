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
$info = get_field('info_text');
$text = get_field('text');
$cta = get_field('cta');
$form_id = get_field('form');


?><section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>"><?php
  if( $is_preview ) :

    cs_component('admin/preview-thumb', $args );
    
    ?><div class="preview-text">
      <p><?php echo $text ? acf_get_truncated( $text, 50 ) . " [" . $block['title'] . "]" : $block['title']; ?></p>
    </div><?php

  else:

    ?><div class="container" data-controller="gravity_forms">
      <?php if( $info ) : ?><div class="info"><?php echo wp_kses_post( $info ); ?></div><?php endif;
      
      if( $text || $cta ) :
      ?><div class="content">
        <?php if( $text ) : ?><div class="text"><?php echo wp_kses_post( $text ); ?></div><?php endif; ?>
        <?php if( $cta ) cs_component('link', $cta ); ?>
      </div><?php
      endif;

      // Form
      if( $form_id ) gravity_form( $form_id );

    ?></div><?php

  endif;

?></section>
