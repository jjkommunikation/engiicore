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

	// animation observer
	// not working yet
	const fadeUpAnimationObservable = new IntersectionObserver((entries, observer) => {
		entries.forEach(entry => {
			const entryItemClassList = entry.target.classList;
			if ( entry.isIntersecting ) {
				console.log(entry.target + " is intersecting")
				if ( entryItemClassList.contains('engiicore-animate-fade-up-one') ) {
					entryItemClassList.add('engiicore-animate-fade-up-one-active')
					entryItemClassList.remove('engiicore-animate-fade-down-one')
				} else if ( entryItemClassList.contains('engiicore-animate-fade-up-two') ) {
					entryItemClassList.add('engiicore-animate-fade-down-two-active')
					entryItemClassList.remove('engiicore-animate-fade-down-two')
				} else if ( entryItemClassList.contains('engiicore-animate-fade-up-three') ) {
					entryItemClassList.add('engiicore-animate-fade-up-three-active')
					entryItemClassList.remove('engiicore-animate-fade-down-three')
				} else if ( entryItemClassList.contains('engiicore-animate-fade-up-four') ) {
					entryItemClassList.add('engiicore-animate-fade-up-four-active')
					entryItemClassList.remove('engiicore-animate-fade-down-four')
				}
			} else {
				console.log(entry.target + " is not intersecting")
				if ( entryItemClassList.contains('engiicore-animate-fade-up-one') ) {
					entryItemClassList.remove('engiicore-animate-fade-up-one-active')
					entryItemClassList.add('engiicore-animate-fade-down-one')
				} else if ( entryItemClassList.contains('engiicore-animate-fade-up-two') ) {
					entryItemClassList.remove('engiicore-animate-fade-up-two-active')
					entryItemClassList.add('engiicore-animate-fade-down-two')
				} else if ( entryItemClassList.contains('engiicore-animate-fade-up-three') ) {
					entryItemClassList.remove('engiicore-animate-fade-up-three-active')
					entryItemClassList.add('engiicore-animate-fade-down-three')
				} else if( entryItemClassList.contains('engiicore-animate-fade-up-four') ) {
					entryItemClassList.remove('engiicore-animate-fade-up-four-active')
					entryItemClassList.add('engiicore-animate-fade-down-four')
				}
			}
		})
	})

	const fadeUpElements = document.querySelectorAll('.engiicore-animate-fade-up-one, .engiicore-animate-fade-up-two, .engiicore-animate-fade-up-three, .engiicore-animate-fade-up-four');
	const slideLeftElements = document.querySelectorAll('.engiicore-animate-slide-left-one, .engiicore-animate-slide-left-two, .engiicore-animate-slide-left-three');
	const slideRightElements = document.querySelectorAll('.engiicore-animate-slide-right-one, .engiicore-animate-slide-right-two, .engiicore-animate-slide-right-three');

	fadeUpElements.forEach(element => {
		fadeUpAnimationObservable.observe(element);
	})
}() );



