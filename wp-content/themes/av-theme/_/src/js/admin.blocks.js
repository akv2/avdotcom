/* global wp, BlocksFront */
// CLOSE BLOCK BUTTON
( function( window, wp, BlocksFront ){

    // just to keep it cleaner - we refer to our link by id for speed of lookup on DOM.
    var close_link_id = 'cs-acf-close';
    const post_id = document.getElementById('post_ID').value;
    var link_html = '<a id="' + close_link_id + '" class="components-button" href="' + BlocksFront.ajax_url + '?security=' + BlocksFront.ajax_nonce +  '&action=cs_all_blocks_to_preview&post_id='+ post_id +'&ref=true" >Close Blocks</a>';

    // check if gutenberg's editor root element is present.
    var editorEl = document.getElementById( 'editor' );
    if( ! editorEl ) return; // do nothing if there's no gutenberg root element on page.

    let block_count = wp.data.select('core/block-editor').getBlockCount();
    // console.log(block_count);

    // const unsubscribe = wp.data.subscribe( function () {
    wp.data.subscribe( function () {
      setTimeout( function () {

        const new_block_count = wp.data.select('core/block-editor').getBlockCount();
        // console.log(new_block_count,'new');

        if( block_count !== new_block_count && new_block_count > 0 ) {
          if ( ! document.getElementById( close_link_id ) ) {

            var toolbalEl = editorEl.querySelector( '.edit-post-header__toolbar' );
            if( toolbalEl instanceof HTMLElement ){
              toolbalEl.insertAdjacentHTML( 'beforeend', link_html );
            }

          }
        }
      }, 1 )
    } );
    // unsubscribe is a function - it's not used right now
      // but in case we need to stop this link from being reappeared at any point just call unsubscribe();

} )( window, wp, BlocksFront )
