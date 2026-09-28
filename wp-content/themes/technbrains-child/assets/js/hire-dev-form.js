/**
 * Hire Developer Form — intl-tel-input init + AJAX submission + SwiftSales
 */
( function () {
	'use strict';

	/* ── Wait for DOM ──────────────────────────────────────────────────── */
	document.addEventListener( 'DOMContentLoaded', function () {
		var phoneInput = document.getElementById( 'hdf-phone' );
		if ( ! phoneInput ) return;

		/* ── intl-tel-input ──────────────────────────────────────────── */
		var iti = window.intlTelInput( phoneInput, {
			preferredCountries : [ 'us', 'gb', 'ca', 'au' ],
			separateDialCode   : true,
			autoPlaceholder    : 'polite',
		} );

		// autoPlaceholder builds its example number from utils.js, so this field needs
		// utils before the visitor interacts with it — the lazy focus-triggered load
		// used elsewhere would leave the placeholder empty until first focus. This is
		// the only form with that requirement; it is not on the homepage, so the
		// homepage still avoids the download entirely.
		if ( window.tnbLoadItiUtils ) {
			window.tnbLoadItiUtils();
		}

		/* ── Geo-IP (shared promise, same pattern as other forms) ──── */
		if ( ! window._tnbCountryPromise ) {
			var key = ( window.tnbAjax && window.tnbAjax.ipdataKey ) ? window.tnbAjax.ipdataKey : '';
			window._tnbCountryPromise = key
				? fetch( 'https://api.ipdata.co/?api-key=' + key )
					.then( function ( r ) { return r.json(); } )
					.then( function ( d ) { return d.country_code || 'US'; } )
					.catch( function () { return 'US'; } )
				: Promise.resolve( 'US' );
		}

		window._tnbCountryPromise.then( function ( code ) {
			iti.setCountry( code.toLowerCase() );
		} );

		/* ── Form submit ─────────────────────────────────────────────── */
		var form    = document.getElementById( 'tnb-hire-dev-form' );
		var msgBox  = document.getElementById( 'tnb-hire-dev-form-msg' );
		var success = document.getElementById( 'hdf-success' );
		var btn     = form ? form.querySelector( '.hd-form-submit' ) : null;

		if ( ! form ) return;

		form.addEventListener( 'submit', function ( e ) {
			e.preventDefault();

			/* ── Inline validation ───────────────────────────────────── */
			var errs = [];
			var nameVal  = form.querySelector( '[name="firstName"]' ).value.trim();
			var emailVal = form.querySelector( '[name="cemail"]' ).value.trim();
			var roleVal  = form.querySelector( '[name="role"]' ).value;

			if ( ! nameVal )                               errs.push( 'Full name is required.' );
			if ( ! /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test( emailVal ) ) errs.push( 'Valid work email is required.' );
			if ( ! roleVal )                               errs.push( 'Please select a developer role.' );

			if ( errs.length ) {
				showMsg( errs.join( '<br>' ), 'error' );
				return;
			}

			/* ── Build phone string ──────────────────────────────────── */
			// getNumber() returns '' when intl-tel-input's utils.js has not loaded
			// (it is lazy-loaded on first contact with a phone field). Fall back to
			// the raw field value so a submit can never carry an empty phone number.
			var phoneVal = iti.getNumber() || ( phoneInput ? phoneInput.value : '' );

			/* ── Disable button ─────────────────────────────────────── */
			if ( btn ) { btn.disabled = true; btn.classList.add( 'is-loading' ); }
			showMsg( '', '' );

			/* ── Resolve country then submit ─────────────────────────── */
			window._tnbCountryPromise.then( function ( countryCode ) {
				var fd = new FormData( form );
				fd.set( 'cnumber', phoneVal );
				fd.set( 'country', countryCode );
				fd.set( 'action',  'tnb_hire_dev_form' );
				fd.set( 'nonce',   ( window.tnbAjax && window.tnbAjax.hireDevFormNonce ) ? window.tnbAjax.hireDevFormNonce : '' );

				/* SwiftSales */
				if ( window.swiftSalesSDK ) {
					swiftSalesSDK.CreateContact( {
						FirstName : nameVal,
						Email     : emailVal,
						Country   : countryCode,
						Phone     : phoneVal,
						Notes     : form.querySelector( '[name="message"]' ).value.trim(),
						Meta      : {
							Path              : window.location.pathname,
							'Developer Role'  : form.querySelector( '[name="role"]' ).value,
						},
					} );
				}

				fetch( window.tnbAjax ? window.tnbAjax.url : '/wp-admin/admin-ajax.php', {
					method      : 'POST',
					credentials : 'same-origin',
					body        : fd,
				} )
				.then( function ( r ) { return r.json(); } )
				.then( function ( data ) {
					if ( btn ) { btn.disabled = false; btn.classList.remove( 'is-loading' ); }

					if ( data.success ) {
						if ( data.data && data.data.redirect ) {
							window.location.href = data.data.redirect;
						} else {
							form.style.display = 'none';
							if ( success ) success.removeAttribute( 'hidden' );
						}
					} else {
						var msgs = ( data.data && data.data.messages ) ? data.data.messages : [ 'Something went wrong. Please try again.' ];
						showMsg( msgs.join( '<br>' ), 'error' );
					}
				} )
				.catch( function () {
					if ( btn ) { btn.disabled = false; btn.classList.remove( 'is-loading' ); }
					showMsg( 'Network error. Please try again.', 'error' );
				} );
			} );
		} );

		function showMsg( html, type ) {
			if ( ! msgBox ) return;
			msgBox.innerHTML  = html;
			msgBox.className  = html ? 'hd-form-msg hd-form-msg--' + type : '';
		}
	} );
} )();
