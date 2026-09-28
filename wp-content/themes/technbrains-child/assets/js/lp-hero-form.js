/**
 * Landing Page — Hero form: AJAX submission.
 */
( function () {
	'use strict';

	document.addEventListener( 'DOMContentLoaded', function () {
		var form    = document.getElementById( 'tnb-lp-hero-form' );
		if ( ! form ) return;

		var msgBox  = document.getElementById( 'tnb-lp-hero-form-msg' );
		var success = document.getElementById( 'lphf-success' );
		var btn     = form.querySelector( '.lp-hero-form-submit' );

		form.addEventListener( 'submit', function ( e ) {
			e.preventDefault();

			var errs     = [];
			var nameVal  = form.querySelector( '[name="firstName"]' ).value.trim();
			var emailVal = form.querySelector( '[name="cemail"]' ).value.trim();

			if ( ! nameVal ) errs.push( 'Full name is required.' );
			if ( ! /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test( emailVal ) ) errs.push( 'Valid email is required.' );

			if ( errs.length ) {
				showMsg( errs.join( '<br>' ), 'error' );
				return;
			}

			if ( btn ) { btn.disabled = true; btn.classList.add( 'is-loading' ); }
			showMsg( '', '' );

			/* SwiftSales — same client-side lead capture every other form on the
			   site does (hire-dev-form.js, contact-form.js, app-dev-form.js);
			   this one was missing it, so submissions never showed up there.
			   Each field is looked up defensively (element may not exist —
			   e.g. the company field has been removed on some deployments)
			   so a missing optional field can't throw and abort the submit. */
			if ( typeof swiftSalesSDK !== 'undefined' && typeof swiftSalesSDK.CreateContact === 'function' ) {
				var phoneEl   = form.querySelector( '[name="cnumber"]' );
				var messageEl = form.querySelector( '[name="message"]' );
				var companyEl = form.querySelector( '[name="company"]' );
				swiftSalesSDK.CreateContact( {
					FirstName : nameVal,
					Email     : emailVal,
					Phone     : phoneEl ? phoneEl.value.trim() : '',
					Notes     : messageEl ? messageEl.value.trim() : '',
					Meta      : {
						Path    : window.location.pathname,
						Company : companyEl ? companyEl.value.trim() : '',
					},
				}, function ( cb, err ) { if ( err ) { console.error( 'SwiftSales:', err ); } } );
			}

			var fd = new FormData( form );
			fd.set( 'action', 'tnb_lp_hero_form' );
			fd.set( 'nonce', ( window.tnbAjax && window.tnbAjax.lpHeroFormNonce ) ? window.tnbAjax.lpHeroFormNonce : '' );

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

		function showMsg( html, type ) {
			if ( ! msgBox ) return;
			msgBox.innerHTML = html;
			msgBox.className = html ? 'hd-form-msg hd-form-msg--' + type : '';
		}
	} );
} )();
