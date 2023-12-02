_.controllers.on_scroll_intersect = el => {

  // Set options
  const options = {};
  options.toggle_class = el.dataset.toggleclass ? el.dataset.toggleclass : 'active';

  // Now that we have a wrapper we calculate rootMargin (negative wrapper height)
  const rootMargin = _.get_top_of_screen() + 0;
  options.observer_options = options.observer_options ? options.observer_options : { rootMargin: `${rootMargin * -1}px` };

  // Setup observer
  const observer = new IntersectionObserver( (entries) => {
    entries.forEach( entry => {
      // Can add types here in future if needed (on / off, first arrive, etc)
      if( el.classList.contains( options.toggle_class ) ) return;
      if( entry.isIntersecting ) {
        el.classList.add( options.toggle_class );
        observer.unobserve(entry.target);
      }

    })
  }, options.observer_options );

  // Wait for window to be loaded (loader to fade out) plus an additional .5s
  _.on_window_load( () => setTimeout( () => observer.observe( el ), 500 ) );

}
