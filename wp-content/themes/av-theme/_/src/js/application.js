/* ---------------------------------- */

/*
 * AV
 * By Aaron Vanderzwan
 * 2023
 *
 * application.js
 *
 */
/* globals _ */


/* ---------------------------------- */

/* Initialize */

console.log('Version: 1.0');
_.init();



// ================================================================
// Allow CSS to calc for scrollbar width
// ================================================================
document.body.style.setProperty( "--scrollbar-width", `${window.innerWidth - document.body.clientWidth}px` );