  </main>
  <footer>
    <div class="container">
      <p class="copyright">&copy;<?php echo current_time('Y'); ?> Aaron Vanderzwan</p>
      <div class="links">
        <div class="social">
          <?php if( get_field('social_media_facebook', 'option' ) ) : ?><a href="<?php echo esc_url( get_field('social_media_facebook', 'option' ) ); ?>" class="facebook" target="_blank"><span class="sr-only">Facebook</span></a><?php endif; ?>
          <?php if( get_field('social_media_instagram', 'option' ) ) : ?><a href="<?php echo esc_url( get_field('social_media_instagram', 'option' ) ); ?>" class="instagram" target="_blank"><span class="sr-only">Instagram</span></a><?php endif; ?>
          <?php if( get_field('social_media_linkedin', 'option' ) ) : ?><a href="<?php echo esc_url( get_field('social_media_linkedin', 'option' ) ); ?>" class="linkedin" target="_blank"><span class="sr-only">LinkedIn</span></a><?php endif; ?>
          </div>
        <a href="/contact/" class="join">Contact</a>
      </div>
    </div>
  </footer>
  
  <div id="responsive-detection"><i class="mobile"></i><i class="handheld"></i><i class="wordpress"></i><i class="desktop"></i><i class="large-desktop"></i><i class="full"></i></div><?php
  wp_footer();

?></body>
</html>
