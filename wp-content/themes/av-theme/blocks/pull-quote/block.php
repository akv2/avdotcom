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
$by = get_field('by');
$link = get_field('link');


// Add preview-as-is class
$class .= ' real-preview';


?><section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>"><?php

if( $is_preview ) :

  cs_component('admin/preview-thumb', $args );
  
  ?><div class="preview-text">
    <p><?php echo $text ? acf_get_truncated( $text, 50 ) . " [" . $block['title'] . "]" : $block['title']; ?></p>
    <?php

    // Display a list of rules in preview mode
    cs_component( 'admin/block-preview-permissions', [ get_field('restrict_access'),  get_field('rules') ] );

  ?></div><?php

else:

  ?><div class="container"><?php

    if( $text ) echo '<blockquote>' . apply_filters('the_contnet', $text) . '</blockquote>';
    if( $by ) echo '<div class="by">' . esc_html( $by ) . '</div>';
    if( $link ) :
      ?><div class="link-holder">
        <?php cs_component( 'link', $link ); ?>
      </div><?php
    endif;


  ?></div><?php

endif;

?></section>
