/* globals RecaptchaKeys, grecaptcha */
_.controllers.gravity_forms = (el) => {

  // ******************************
  // RECAPTCHA
  // ******************************
  grecaptcha.ready(function() {
    grecaptcha.execute( RecaptchaKeys.site, {action: 'submit'}).then(function(token) {

      let g_recaptcha_input = el.querySelector('.g-recaptcha-token input[type="hidden"]');
      if( g_recaptcha_input === null ) {
        const input = document.createElement('input');
        input.classList.add('g-recaptcha-token');
        input.type = 'hidden';
        input.name = 'g-recaptcha-token';
        input.value = token;
        el.querySelector('.gform_fields').appendChild(input);
      } else {
        g_recaptcha_input.value = token;
      }

    });
  });

}
