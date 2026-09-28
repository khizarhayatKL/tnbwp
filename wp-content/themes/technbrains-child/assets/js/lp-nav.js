/**
 * Landing Page — Header V2 nav: transparent-over-hero, solid once scrolled.
 */
( function () {
	'use strict';

	document.addEventListener( 'DOMContentLoaded', function () {
		var nav = document.querySelector( '.lp-nav' );
		if ( ! nav ) return;

		var threshold = 24;

		function update() {
			nav.classList.toggle( 'is-scrolled', window.scrollY > threshold );
		}

		update();
		window.addEventListener( 'scroll', update, { passive: true } );
	} );
} )();
