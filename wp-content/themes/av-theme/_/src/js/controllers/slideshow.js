/* globals Glide */
_.controllers.slideshow = el => {

  // ================================================================
  // Instantiate Slideshow
  // ================================================================
  const glide = new Glide( el, {
    type: 'carousel',
    focusAt: 'center',
    animationDuration: 500,
    animationTimingFunc: 'ease-in-out',
    run: move => {
      console.log(move);
    }
  });
  glide.mount();

}