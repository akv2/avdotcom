_.controllers.loader = () => {

  // Remove loader after first asset in slideshow is loaded
  const hero_slideshow = document.querySelector('main > .cs-block.hero-slideshow'),
    do_ready = () => {
      _.html.classList.add('ready')
    };


  if( hero_slideshow ) {
    const first_slide = hero_slideshow.querySelector('.slide');
    if( ! first_slide ) {
      do_ready();
      return;
    }


    const first_slide_asset = first_slide.querySelector('img,video');

    if( first_slide_asset ) {
      if( _.is_loaded( first_slide_asset ) ) {
        do_ready();
      } else {
        if( first_slide_asset.nodeName === 'IMG' ) first_slide_asset.addEventListener('load', do_ready );
        if( first_slide_asset.nodeName === 'VIDEO' ) first_slide_asset.addEventListener('canplay', do_ready );
      }
    } else {
      do_ready();
    }

  } else {
    do_ready();
  }
}
