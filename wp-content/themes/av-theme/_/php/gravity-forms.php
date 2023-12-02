<?php


/*
 * Gravity Forms: Dynamically Populate Field
 */
add_filter( 'gform_field_value_cs_url', 'cs_custom_population_function' );
function cs_custom_population_function( $value ) {
    return get_permalink();
}


// Add dynamic value to class (so JS can update fields)
add_filter( 'gform_pre_render', 'conduit_populate_fields' );
function conduit_populate_fields( $form ) {
  foreach ( $form['fields'] as &$field ) :

    // Add class for input name (Access via JS)
    if( ! empty( $field->inputName ) && strpos( $field->cssClass, $field->inputName ) === false ) :
      $field->cssClass .= ' ' . $field->inputName;
    endif;
    
  endforeach;

  return $form;
}



/*
 * Gravity Forms: Google Recaptcha (https://developers.google.com/recaptcha/docs/v3)
 */
add_filter( 'gform_validation', 'conduit_gform_recaptcha' );
function conduit_gform_recaptcha( $validation_result ) {

  // Verify with Google Recapcha (https://developers.google.com/recaptcha/docs/v3)
  $recaptcha_keys = get_field('recaptcha_keys', 'option');
  if( empty( $recaptcha_keys ) ||
    empty( $recaptcha_keys['site_key'] ) ||
    empty( $recaptcha_keys['secret_key'] ) ||
    empty( $recaptcha_keys['score'] ) ) return $validation_result;


  // Get Token from form
  $form  = $validation_result['form'];
  $entry = GFFormsModel::get_current_lead();

  // Find ID of our Token Field
  $token_field_id = false;
  $score_field_id = false;

  //finding Field with ID of 1 and marking it as failed validation
  foreach( $form['fields'] as &$field ) :
    if ( $field->inputName == 'g-recaptcha-token' ) {
      $token_field_id = $field->id;
    } elseif( $field->inputName === 'g-recaptcha-score' ) {
      $score_field_id = $field->id;
    }
  endforeach;

  $token = rgar( $entry, $token_field_id ); // <= field with ID of 11 is the token (ugh)
  if( empty( $token ) ) :

    // Set it as invalid
    $validation_result['is_valid'] = false;
    return $validation_result;

  endif;

  // Verify with google recaptcha
  $verify_url = "https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_keys['secret_key']."&response={$token}";
  $response = wp_remote_get( $verify_url );
  $result = json_decode( wp_remote_retrieve_body( $response ), true );

  // If we aren't successful
  if( empty( $result ) ||
    $result['success'] !== true ||
    $result['score'] <= $recaptcha_keys['score'] ) :

    // Set it as invalid
    $validation_result['is_valid'] = false;

  endif;

  // Save score for submission (to update field)
  if( $score_field_id ) :
    $form['recaptcha_min_score'] = $recaptcha_keys['score'];
    $form['recaptcha_score'] = $result['score'];
    $form['recaptcha_score_field_id'] = $score_field_id;
  endif;

  // Assign modified $form object back to the validation result
  $validation_result['form'] = $form;

  return $validation_result;
}


add_action( 'gform_pre_submission', 'conduit_pre_submission' );
function conduit_pre_submission($form) {
  // Update the score field with the score value that was saved in gform_validation
  $_POST['input_' . $form['recaptcha_score_field_id']] = $form['recaptcha_score'];
}

add_filter( 'gform_validation_message', 'conduit_validation_message', 10, 2 );
function conduit_validation_message( $message, $form ) {
  if( ! empty( $form['recaptcha_score_field_id'] && $form['recaptcha_score'] <= $form['recaptcha_min_score'] ) ) :
    return '<div class="validation_error">There was a problem with your submission.</div>';
  endif;
  return $message;
}




/**
 * Force GFORM Scripts inline next to Form Output
 *
 * force the script tags inline next to the form. This allows
 * us to regex them out each time the form is rendered.
 *
 * see strip_inline_gform_scripts() function below
 * which implements the required regex
 */
function force_gform_inline_scripts() {
  return false;
}
add_filter("gform_init_scripts_footer", "force_gform_inline_scripts");

/**
 * Strip out GForm Script tags
 *
 * note: this diables post and pre render hooks which are triggered
 * when the form renders so if you need these then it's important
 * to manually re-add them in your compiled JS source code
 */
function strip_inline_gform_scripts( $form_string, $form ) {
  return $form_string = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $form_string);
}
add_filter("gform_get_form_filter", "strip_inline_gform_scripts", 10, 2);
