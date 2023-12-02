_.controllers.scroll_to = (el) => {

  el.addEventListener('click', e => {
    e.preventDefault();
    const target_name = el.getAttribute('href').replace('#',''),
      target = document.querySelector( 'a[name="' + target_name +'"]' );


    // Do scroll
    _.scroll_to( target, target_name );

  })
}
