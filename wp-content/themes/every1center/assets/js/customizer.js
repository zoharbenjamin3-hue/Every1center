/* Live previews for the WordPress Customizer. */
( function ( $ ) {
	'use strict';

	wp.customize( 'blogname', function ( value ) {
		value.bind( function ( to ) {
			document.querySelectorAll( '.site-title a' ).forEach( function ( el ) { el.textContent = to; } );
		} );
	} );

	wp.customize( 'blogdescription', function ( value ) {
		value.bind( function ( to ) {
			document.querySelectorAll( '.site-description' ).forEach( function ( el ) { el.textContent = to; } );
		} );
	} );
} )( jQuery );
