<?php
extract( $args );
$placeholder = isset( $placeholder ) ? $placeholder : false;
?><div class="c-video video-holder">
  <video <?php
    if( ! isset( $options ) ) $options = array();
    $options = wp_parse_args( $options, array(
      'loop' => true,
      'autoplay' => true,
      'muted' => true,
    ));

    foreach( $options as $option => $is_set ) :
      if( $is_set ) :
        echo $option . ' ';
      endif;
    endforeach;
    ?> playsinline>
    <?php

    // Loop auto generated sources if there were any found
    ?><source src="<?php echo esc_url( $video['url'] ); ?>" type="<?php echo esc_attr( $video['mime_type'] ); ?>"><?php

    _e('Your browser does not support the video tag.');

  ?></video>
</div>
<?php
