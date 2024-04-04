/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	const siteNavigation = document.getElementById( 'site-navigation' );

	// Return early if the navigation don't exist.
	if ( ! siteNavigation ) {
		return;
	}

	const button = siteNavigation.getElementsByTagName( 'button' )[ 0 ];

	// Return early if the button don't exist.
	if ( 'undefined' === typeof button ) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( ! menu.classList.contains( 'nav-menu' ) ) {
		menu.classList.add( 'nav-menu' );
	}

	// Toggle the .toggled class and the aria-expanded value each time the button is clicked.
/*	button.addEventListener( 'click', function() {
		siteNavigation.classList.toggle( 'toggled' );

		if ( button.getAttribute( 'aria-expanded' ) === 'true' ) {
			button.setAttribute( 'aria-expanded', 'false' );
			jQuery(".custom-logo-link > img").attr("src", "/wp-content/uploads/logo.svg");
			jQuery('body').removeClass("mobile_menu_no_bg_scroll");
		} else {
			button.setAttribute( 'aria-expanded', 'true' );
			jQuery(".custom-logo-link > img").attr("src", "/wp-content/uploads/logo_white.svg");
			jQuery('body').addClass("mobile_menu_no_bg_scroll");
		}
	} ); */

	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener( 'click', function( event ) {
		const isClickInside = siteNavigation.contains( event.target );

		if ( ! isClickInside ) {
			siteNavigation.classList.remove( 'toggled' );
			button.setAttribute( 'aria-expanded', 'false' );
		}
	} );

	// Get all the link elements within the menu.
	const links = menu.getElementsByTagName( 'a' );

	// Get all the link elements with children within the menu.
	const linksWithChildren = menu.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

	// Toggle focus each time a menu link is focused or blurred.
	for ( const link of links ) {
		link.addEventListener( 'focus', toggleFocus, true );
		link.addEventListener( 'blur', toggleFocus, true );
	}

	// Toggle focus each time a menu link with children receive a touch event.
	for ( const link of linksWithChildren ) {
		link.addEventListener( 'touchstart', toggleFocus, false );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		if ( event.type === 'focus' || event.type === 'blur' ) {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while ( ! self.classList.contains( 'nav-menu' ) ) {
				// On li elements toggle the class .focus.
				if ( 'li' === self.tagName.toLowerCase() ) {
					self.classList.toggle( 'focus' );
				}
				self = self.parentNode;
			}
		}

		if ( event.type === 'touchstart' ) {
			const menuItem = this.parentNode;
			event.preventDefault();
			for ( const link of menuItem.parentNode.children ) {
				if ( menuItem !== link ) {
					link.classList.remove( 'focus' );
				}
			}
			menuItem.classList.toggle( 'focus' );
		}
	}

	const fadeInAnimationObservable = new IntersectionObserver((entries, observer) => {
		entries.forEach(entry => {
			const entryItemClassList = entry.target.classList;
			if ( entry.isIntersecting ) {
				if ( entryItemClassList.contains('engiicore-animate-fade-in-one') ) {
					entryItemClassList.add('animating');
				} else if ( entryItemClassList.contains('engiicore-animate-fade-in-two') ) {
					entryItemClassList.add('animating');
				} else if ( entryItemClassList.contains('engiicore-animate-fade-in-three') ) {
					entryItemClassList.add('animating');
				} else if ( entryItemClassList.contains('engiicore-animate-fade-in-four') ) {
					entryItemClassList.add('animating');
				}
			}
		})
	});

	// animation observer
	/**
	 * Animation observer for fadeup and fadeDown animations
	 * observes each element and checks if it contains fade down or fade up animation class
	 * needs testing
	 */
	const fadeUpAnimationObservable = new IntersectionObserver((entries, observer) => {
		entries.forEach(entry => {
			const entryItemClassList = entry.target.classList;
			if ( entry.isIntersecting ) {
				console.log(entry.target + " is intersecting")
				if ( entryItemClassList.contains('engiicore-animate-fade-up-one') ) {
					entryItemClassList.add('animating');
				} else if ( entryItemClassList.contains('engiicore-animate-fade-up-two') ) {
					entryItemClassList.add('animating')
				} else if ( entryItemClassList.contains('engiicore-animate-fade-up-three') ) {
					entryItemClassList.add('animating')
				} else if ( entryItemClassList.contains('engiicore-animate-fade-up-four') ) {
					entryItemClassList.add('animating')
				}
			}
		})
	})

	/**
	 * Observer for all entries with fade down animation class
	 */
	const fadeDownAnimationObservble = new IntersectionObserver((entries, observer) => {
		entries.forEach(entry => {
			const entryItemClassList = entry.target.classList;
			if ( entry.isIntersecting ) {
				if ( entryItemClassList.contains('engiicore-animate-fade-down-one') ) {
					entryItemClassList.add('animating')
				} else if ( entryItemClassList.contains('engiicore-animate-fade-down-two') ) {
					entryItemClassList.add('animating')
				}
				else if ( entryItemClassList.contains('engiicore-animate-fade-down-three') ) {
					entryItemClassList.add('animating')
				}
				else if ( entryItemClassList.contains('engiicore-animate-fade-down-four') ) {
					entryItemClassList.add('animating')
				}
			}
		})
	})

	/**
	 * Animation observer for slide left and slide left out animations
	 * needs to be observed for each element with slide left or slide right out animation
	 * needs testing
	 */
	const slideLeftAnimationObservable = new IntersectionObserver((entries, observer) => {
		entries.forEach(entry => {
			const entryItemClassList = entry.target.classList;
			if (entry.isIntersecting) {
				console.log("fade down entry is intersecting");
				if (entryItemClassList.contains('engiicore-animate-slide-left-out-one')) {
					entryItemClassList.add('animating')
				} else if (entryItemClassList.contains('engiicore-animate-slide-left-out-two')) {
					entryItemClassList.add('animating')
				} else if (entryItemClassList.contains('engiicore-animate-slide-left-out-three')) {
					entryItemClassList.add('animating')
				} else if (entryItemClassList.contains('engiicore-animate-slide-left-out-four')) {
					entryItemClassList.add('ainmating')
				}
			}
		})
	})

	/**
	 * Animation observer for slide right and slide right out animations
	 * needs to be observed for each element with slide right or slide right out animation
	 * needs testing
	 */
	const slideRightElementsObservable = new IntersectionObserver((entries, observer) => {
		entries.forEach(entry => {
			const entryItemClassList = entry.target.classList;
			if (entry.isIntersecting) {
				console.log("fade down entry is intersecting");
				if (entryItemClassList.contains('engiicore-animate-slide-right-one')) {
					entryItemClassList.add('animating')
				} else if (entryItemClassList.contains('engiicore-animate-slide-right-two')) {
					entryItemClassList.add('animating');
				} else if (entryItemClassList.contains('engiicore-animate-slide-right-three')) {
					entryItemClassList.add('animating');
				} else if (entryItemClassList.contains('engiicore-animate-slide-right-four')) {
					entryItemClassList.add('animating');
				}
			}
		})
	})

	const fadeInElements = document.querySelectorAll('.engiicore-animate-fade-in-one, .engiicore-animate-fade-in-two, .engiicore-animate-fade-in-three, .engiicore-animate-fade-in-four');
	const fadeUpElements = document.querySelectorAll('.engiicore-animate-fade-up-one, .engiicore-animate-fade-up-two, .engiicore-animate-fade-up-three, .engiicore-animate-fade-up-four');
	const slideLeftElements = document.querySelectorAll('.engiicore-animate-slide-left-one, .engiicore-animate-slide-left-two, .engiicore-animate-slide-left-three, engiicore-animate-slide-right-four');
	const slideRightElements = document.querySelectorAll('.engiicore-animate-slide-right-one, .engiicore-animate-slide-right-two, .engiicore-animate-slide-right-three, .engiicore-animate-slide-right-four');
	const fadeDownElements = document.querySelectorAll('.engiicore-animate-fade-down-one, .engiicore-animate-fade-down-two, .engiicore-animate-fade-down-three, .engiicore-animate-fade-down-four');
	
	fadeInElements.forEach(element => {
		fadeInAnimationObservable.observe(element, {rootMargin: "0px 0px -100px 0px"});
	})

	// observe each element with fade up animation class
	fadeUpElements.forEach(element => {
		fadeUpAnimationObservable.observe(element, {rootMargin: "0px 0px -100px 0px"});
	})

	// observe each element with fade down animation class
	fadeDownElements.forEach(element => {
		fadeDownAnimationObservble.observe(element, {rootMargin: "0px 0px -100px 0px"});
	})

	// observe each element with slide left animation class
	slideLeftElements.forEach(element => {
		slideLeftAnimationObservable.observe(element, {rootMargin: "0px 0px -100px 0px"});
	})

	// observe each element with slide right animation class
	slideRightElements.forEach(element => {
		slideRightElementsObservable.observe(element, {rootMargin: "0px 0px -100px 0px"})
	})

	// adding swiper effect to top features section
	jQuery('.menu-engiicore-feature-slider-menu-container').addClass('swiper').find('ul').addClass('swiper-wrapper').find('li').addClass('swiper-slide');
	jQuery('.menu-engiicore-feature-slider-menu-container').append('<div class="swiper-button-prev"></div><div class="swiper-button-next"></div>');

	// --------------------------------------------------------------------------------------------

	// add carousel effect to features section #ribbon-section
	/* jQuery('#ribbon-section .menu-regnbue-banner-container').addClass('swiper').find('ul').addClass('swiper-wrapper').find('li').addClass('swiper-slide');
	jQuery('#ribbon-section').append('<div class="swiper-button-prev"></div><div class="swiper-button-next"></div>'); */
}() );



