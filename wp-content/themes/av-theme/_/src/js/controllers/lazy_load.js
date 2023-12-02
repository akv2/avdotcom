_.controllers.lazy_load = el => {

  const type = el.dataset.lazytype;

  // Default is scroll to (default lazy load behavior)
  if( type === 'custom' ) {

    // Loaded on a custom event (menu ads)
    return;

  } else if( type === 'deferred' ) {

    // Deferred is used for non in view on load, but need to be quickly
    _.on_window_load( () => _.load_image( el ) );

  } else {

    // Type = scroll to intersect
    const img_observer = new IntersectionObserver((entries, img_observer) => {
      entries.forEach(entry => {

        if( entry.target.classList.contains('lazy-debug') ) console.log(entry.target, entry.isIntersecting);
        
        if ( ! entry.isIntersecting) return;

        if( type === 'video_poster' ) {
          el.poster = el.dataset.poster;
          el.removeAttribute('data-poster');
        } else {
          _.load_image( entry.target );
        }

        img_observer.unobserve( entry.target );
      });
    }, { threshold: 0, rootMargin: "1000px 0px 1000px 0px" });

    // Observe it
    img_observer.observe(el);

  }

}
