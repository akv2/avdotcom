_.controllers.sticky = (el, options) => {

  // Defaults
  options = options ? options : {};
  options.create_wrapper = options.create_wrapper ? options.create_wrapper : true;
  options.sticky_class = options.sticky_class ? options.sticky_class : 'cs-sticky';

  // Vars
  let wrapper = undefined, sticky_el = undefined;
  if( options.create_wrapper ) {
    const parent = el.parentNode;
    wrapper = document.createElement('div');

    // set the wrapper as child (instead of the element)
    parent.replaceChild(wrapper, el);
    wrapper.appendChild(el);

    sticky_el = el;

  } else {

    // Not creating a wrapper so use this and child
    wrapper = el;
    sticky_el = wrapper.childNodes[0];

  }

  // Add sticky class
  wrapper.classList.add( options.sticky_class );


  // ==============================
  // Build observer options
  // ==============================
  // Now that we have a wrapper we calculate rootMargin (negative wrapper height)
  const top_of_screen = _.get_top_of_screen(),
    observer = {
      callback: entries => {
        entries.forEach( entry => {
          if( ! entry.isIntersecting ) {
            wrapper.style.height = wrapper.offsetHeight + 'px';
            sticky_el.classList.add('stuck');

            // Reset observer
            observer.current_observer.unobserve(entry.target);
            observer.current_observer = new IntersectionObserver( observer.callback, observer.options_up );
            observer.current_observer.observe( wrapper );

          } else {
            wrapper.style.height = null;
            sticky_el.classList.remove('stuck');

            // Reset observer
            observer.current_observer.unobserve(entry.target);
            observer.current_observer = new IntersectionObserver( observer.callback, observer.options_down );
            observer.current_observer.observe( wrapper );

          }
        })
      },
      options_up: { rootMargin: `${ ( top_of_screen + document.querySelector('header').offsetHeight + wrapper.offsetHeight ) * -1 }px`},
      options_down: { rootMargin: `${ ( top_of_screen + wrapper.offsetHeight ) * -1 }px`}
    };

  // ==============================
  // Setup observer
  // ==============================
  observer.current_observer = new IntersectionObserver( observer.callback, observer.options_down );
  observer.current_observer.observe( wrapper );

}
