_.toggle = ( el, options ) => {

  // Default options
  options         = options         !== undefined ? options         : {};
  options.group   = options.group   !== undefined ? options.group   : 'on';
  options.key     = options.key     !== undefined ? options.key     : 'trigger';
  options.focus   = options.focus   !== undefined ? options.focus   : false;
  options.only_on = options.only_on !== undefined ? options.only_on : true;
  options.on      = options.on      !== undefined ? options.on      : false;
  options.off     = options.off     !== undefined ? options.off     : false;
  options.scroll  = options.scroll  !== undefined ? options.scroll  : false;
  
  // Vars
  const $body = document.querySelector('body'),
    the_key = options.key;


  // Document click handler
  let doc_close_handler = false;
  if( options.doc_close_selector !== undefined ) {
    doc_close_handler = (e) => {
      if( e.target.closest( options.doc_close_selector ) === null ) {
        _.trigger( 'click', el );
      }
    }
  }
  // _.add_removable_listener( el, 'click', handler );
  // document.body.addEventListener('click', event_handler );


  // scroll handler
  let scroll_close_handler = false;
  if( options.scroll === false) {
    scroll_close_handler = () => {
      _.trigger('click', el );
    }
  }
  

  // Listener
  el.addEventListener('click', (e) => {
    e.preventDefault();
    
    // Off
    if( $body.classList.contains( the_key ) ) {

      // Which trigger
      el.classList.remove('toggle__active');

      // Deactivate
      $body.classList.remove( the_key );

      // Return focus
      if( options.focus ) el.focus();

      // Document listener
      _.remove_events( document.body );

      // Scroll listener
      _.remove_events( window );

      // Run callback
      if( options.off ) options.off();

    } else { // <= On

      // Close others in group
      if( options.only_on ) {
        const active_toggles = document.querySelectorAll('[data-group="' + options.group + '"].toggle__active');
        if( active_toggles !== undefined ) {
          active_toggles.forEach( active_toggle => {
            _.trigger('click', active_toggle );
          });
        }
      }

      // Which trigger
      el.classList.add('toggle__active');

      // Activate
      $body.classList.add( the_key );
      
      // Focus
      if( options.focus ) document.querySelector( options.focus ).focus();

      // Document listener
      if( options.doc_close_selector !== undefined ) {
        // Add document event listener
        setTimeout( () => {
          if( document.body.removable_events === undefined ) document.body.removable_events = [];
          document.body.removable_events.push({ 'type': 'click', 'handler': doc_close_handler });
          document.body.addEventListener('click', doc_close_handler );
        }, 10 );
      } 

      // Scroll listener
      // Close on scroll
      if( options.scroll === false ) {
        if( window.removable_events === undefined ) window.removable_events = [];
        window.removable_events.push({ 'type': 'scroll', 'handler': scroll_close_handler });
        window.addEventListener('scroll', scroll_close_handler );
      // } else if( options.scroll === 'cancel' ) {
      //   console.log( document.html );
      }

      // Run callback
      if( options.on ) options.on();

    }

  });
}