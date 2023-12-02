_.controllers.scroll_to = (el) => {

  const scroller = el.getElementById('scroller');
  el.getElementsByTagName('video')[0].addEventListener( 'loadeddata', function() {
    scroller.classList.add('in');
  });

  // Fallback in case loaddata doesn't load
  setTimeout( function() {
    if( scroller.classList.length === 0 ) {
      scroller.classList.add('in');
    }
  }, 3000 );

}