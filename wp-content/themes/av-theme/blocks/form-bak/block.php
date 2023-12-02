<?php

/**
 * Media Room Access Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


// Permissions check
// if( ! $is_preview && ! cs_user_can_access_block( $block ) ) return;

// Setup block (gives us a $class and $id)
$args = cs_setup_block_vars( $block, $is_preview );
extract( $args );

$form = get_field('form');
$title = ! empty( $form ) && ! empty( $form->post_title ) ? $form->post_title : 'No form selected';

?><section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>"><?php
  if( $is_preview ) :

    cs_component('admin/preview-thumb', $args );
    
    ?><div class="preview-text">
      <p><?php echo $title ? "$title [" . $block['title'] . "]" : $block['title']; ?></p>
      <?php

      // Display a list of rules in preview mode
      // cs_component( 'admin/block-preview-permissions', [ get_field('restrict_access'),  get_field('rules') ] );

    ?></div><?php
  else:

    // cs_component( 'globals/jump-link', get_field('jump_link') );

    ?><div class="form-wrapper" data-controller="form__preselector" data-preselect="<?php echo str_replace( '"', "'", get_field('preselect') ); ?>"><?php

      // cs_component('globals/callout', array( 'text' => get_field('callout') ) );

      // Offer signup / request access forms
      if( empty( $form ) || empty( $form->ID ) ) :
        echo '<p style="text-align:center">No form selected</p>';
      else:
        wpforms_display( $form->ID, false, false );
      endif;

    ?></div><?php

  endif;

?></section>
