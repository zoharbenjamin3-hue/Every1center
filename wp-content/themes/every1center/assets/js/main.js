/* Every1 Center theme — front-end JS */
( function () {
	'use strict';

	function ready( fn ) {
		if ( document.readyState !== 'loading' ) {
			fn();
		} else {
			document.addEventListener( 'DOMContentLoaded', fn );
		}
	}

	ready( function () {
		setupMobileMenu();
		setupSubmenuToggles();
		setupSmoothAnchorFocus();
		setupTelClickTracking();
	} );

	function setupMobileMenu() {
		var toggle = document.querySelector( '.menu-toggle' );
		var nav    = document.querySelector( '.main-navigation' );
		if ( ! toggle || ! nav ) {
			return;
		}
		toggle.addEventListener( 'click', function () {
			var expanded = toggle.getAttribute( 'aria-expanded' ) === 'true';
			toggle.setAttribute( 'aria-expanded', ( ! expanded ).toString() );
			nav.classList.toggle( 'is-open', ! expanded );
		} );
	}

	function setupSubmenuToggles() {
		var toggles = document.querySelectorAll( '.primary-menu .submenu-toggle' );
		toggles.forEach( function ( btn ) {
			btn.addEventListener( 'click', function ( e ) {
				e.preventDefault();
				e.stopPropagation();
				var li = btn.closest( 'li' );
				if ( ! li ) {
					return;
				}
				var expanded = btn.getAttribute( 'aria-expanded' ) === 'true';
				closeAllSubmenus( li );
				btn.setAttribute( 'aria-expanded', ( ! expanded ).toString() );
				li.classList.toggle( 'is-open', ! expanded );
			} );
		} );

		// Close on outside click.
		document.addEventListener( 'click', function ( e ) {
			if ( ! e.target.closest( '.primary-menu' ) ) {
				closeAllSubmenus();
			}
		} );

		// Escape closes open menus.
		document.addEventListener( 'keyup', function ( e ) {
			if ( e.key === 'Escape' ) {
				closeAllSubmenus();
			}
		} );
	}

	function closeAllSubmenus( except ) {
		var openItems = document.querySelectorAll( '.primary-menu li.is-open' );
		openItems.forEach( function ( li ) {
			if ( li === except ) {
				return;
			}
			li.classList.remove( 'is-open' );
			var btn = li.querySelector( ':scope > .submenu-toggle' );
			if ( btn ) {
				btn.setAttribute( 'aria-expanded', 'false' );
			}
		} );
	}

	function setupSmoothAnchorFocus() {
		document.querySelectorAll( 'a[href^="#"]' ).forEach( function ( a ) {
			a.addEventListener( 'click', function ( e ) {
				var id = a.getAttribute( 'href' );
				if ( id.length < 2 ) {
					return;
				}
				var target = document.querySelector( id );
				if ( ! target ) {
					return;
				}
				if ( ! target.hasAttribute( 'tabindex' ) ) {
					target.setAttribute( 'tabindex', '-1' );
				}
				setTimeout( function () { target.focus( { preventScroll: true } ); }, 50 );
			} );
		} );
	}

	function setupTelClickTracking() {
		// Hook for downstream analytics; ships no-op so links work without tracking.
		document.querySelectorAll( 'a[href^="tel:"]' ).forEach( function ( a ) {
			a.addEventListener( 'click', function () {
				if ( window.dataLayer && typeof window.dataLayer.push === 'function' ) {
					window.dataLayer.push( { event: 'phone_call_click', phone: a.getAttribute( 'href' ) } );
				}
			} );
		} );
	}
} )();
