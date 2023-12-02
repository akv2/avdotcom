// /* ---------------------------------- */
//
// /* Auto Instantiate
//
// /* ---------------------------------- */


let _ = {

	// Vars
	html: document.documentElement,


	// Controllers
	init: () => {

		// Get all controllers and loop them
		const controllers = document.querySelectorAll( '[data-controller]' );
		controllers.forEach( (controller) => {

			// Get which controller
			const controller_name = controller.getAttribute('data-controller');

			// If function exists and it hasn't been instantiated yet
			if( typeof _.controllers[controller_name] === "function" && ! controller.classList.contains('cs-i')) {

				// Run function
				_.controllers[controller_name](controller);

				// Save to know only run once
				controller.classList.add('cs-init');

			}

		});
	},


	// Global Controllers
	controllers: {},



  // HELPERS
	on_window_load: callback => {

		if (document.readyState === 'complete') {
			callback();
		} else {
			window.addEventListener("load", callback);
		}

	},

  
	// Traversing DOM
	filter: ( prev, selector = '*' ) => {
		if( ! prev ) return false;
		return [].filter.call(prev, function(node) {
			return node.matches(selector);
		});
	},
  siblings: ( el, selector = '*' ) => {
    return Array.from( el.parentNode.children ).filter( (sibling) => {
      return sibling !== el && sibling.matches( selector );
    });
  },

	// Devices
  size_is: which => { return document.querySelector('#responsive-detection .' + which).offsetParent !== null; },


	get_top_of_screen: () => {

		let top_of_screen = 0;

    // Handle admin bar top
		if( document.body.classList.contains('admin-bar') ) {
			if( window.innerWidth <= 753 ) {
				top_of_screen += 46;
			} else {
				top_of_screen += 32;
			}
		}

		// Handle any alerts
		const alert = document.querySelector('.g-alert');
		if( alert ) top_of_screen += alert.offsetHeight;

		return top_of_screen;
	}

};

// console.log('is mobile', _.size_is( 'mobile' ) );
// console.log('is handheld', _.size_is( 'handheld' ) );
// console.log('is wordpress', _.size_is( 'wordpress' ) );
// console.log('is desktop', _.size_is( 'desktop' ) );
// console.log('is large-desktop', _.size_is( 'large-desktop' ) );
// console.log('is full', _.size_is( 'full' ) );
