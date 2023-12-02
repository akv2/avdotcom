<?php

$slug = $args['slug'];

$sub_path = '_/img/modules-admin/' . $slug . '-thumb.svg';
$file_path = get_theme_file_path( $sub_path );
if( ! file_exists( $file_path ) ) return;

$file_url = get_theme_file_uri( $sub_path );
?><img src="<?php echo esc_url( $file_url ) ?>" class="preview-thumb"  /><?php
