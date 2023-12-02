_.controllers.toggle__main_nav = (el) => {

  // Do click
  el.addEventListener( 'click', (e) => {
    e.preventDefault();
    
    if( ! document.body.classList.contains('h-main-nav') ) {

      // Add document listener
      setTimeout( () => {
        _.removable_listener__add( document.body, 'click.main-nav', e => {
          if( e.target.closest('.bg') === null ) {
            _.trigger( 'click', el );
          }
        });
      }, 10 );

      // Open
      document.body.classList.add('h-main-nav');

    } else {

      // Close
      document.body.classList.remove('h-main-nav')

      // Remove listener
      _.removable_listener__remove( document.body, 'click.main-nav' );

    }
  });

}
