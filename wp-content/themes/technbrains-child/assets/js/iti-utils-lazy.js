/**
 * intl-tel-input utils.js — lazy loader.
 *
 * utils.js is 253 KB unminified (~61 KB over the wire) and provides formatting,
 * validation and placeholder generation. Passing `utilsScript` to intlTelInput()
 * makes it fetch immediately at init, on every page, whether or not the visitor
 * ever touches a phone field. This loads it on first contact with a tel input
 * instead, which keeps it off the initial page load entirely for the majority of
 * visitors who never open a form.
 *
 * Timing safety: the load is triggered by `focusin`, which fires before the visitor
 * has finished typing a number — utils is in place long before any submit handler
 * reads it. The listener is on `document` in the capture phase so it also covers
 * phone fields injected later (popup, exit-popup, AJAX-rendered forms).
 *
 * Callers must still tolerate utils being absent: intlTelInput's getNumber()
 * returns '' and isValidNumber() returns null when window.intlTelInputUtils is
 * undefined. Every caller in this theme falls back to the raw field value.
 */
( function () {
	'use strict';

	var requested = false;

	function loadUtils() {
		if ( requested ) {
			return;
		}
		// Nothing to do until the library itself is present. Do not latch `requested`
		// here — a later event should retry once intlTelInput has finished loading.
		if ( ! window.intlTelInputGlobals || typeof window.intlTelInputGlobals.loadUtils !== 'function' ) {
			return;
		}
		// Already loaded by something else (e.g. a stray utilsScript option).
		if ( window.intlTelInputUtils ) {
			requested = true;
			return;
		}
		if ( ! window.tnbItiUtils || ! window.tnbItiUtils.url ) {
			return;
		}

		requested = true;
		window.intlTelInputGlobals.loadUtils( window.tnbItiUtils.url );
	}

	function isPhoneTarget( el ) {
		if ( ! el || ! el.tagName ) {
			return false;
		}
		if ( el.tagName === 'INPUT' && String( el.type ).toLowerCase() === 'tel' ) {
			return true;
		}
		// The country dropdown button — clicked without ever focusing the input.
		return !! ( el.closest && el.closest( '.iti' ) );
	}

	function onInteraction( e ) {
		if ( isPhoneTarget( e.target ) ) {
			loadUtils();
		}
	}

	// Capture phase: fires for dynamically inserted fields and before any
	// form-level handler that might read a formatted number.
	document.addEventListener( 'focusin', onInteraction, true );
	document.addEventListener( 'pointerdown', onInteraction, true );

	// Exposed for the one case that cannot wait for an interaction: a field using
	// intlTelInput's `autoPlaceholder`, which derives its example-number placeholder
	// from utils.js and must therefore have it before first paint of that form.
	window.tnbLoadItiUtils = loadUtils;
} )();
