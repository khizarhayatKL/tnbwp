/**
 * Blog detail — TOC scroll-spy.
 *
 * Highlights the ez-toc link for the section currently in view (red left
 * border via the `.active` rule in blog-detail.css). Mirrors the reference
 * design's spy: the last heading above the scroll line wins.
 *
 * Vanilla JS, no dependencies. Loaded only on single posts.
 */
( function () {
	'use strict';

	function init() {
		// Scope to the sidebar TOC only — ez-toc also auto-inserts a duplicate
		// (theme-hidden) TOC inside post content that must not receive .active.
		var links = Array.prototype.slice.call(
			document.querySelectorAll( '.custom-table-of-content #ez-toc-container nav a.ez-toc-link' )
		);
		if ( ! links.length ) {
			return;
		}

		var targets = links.map( function ( link ) {
			var href = link.getAttribute( 'href' ) || '';
			var id   = href.indexOf( '#' ) !== -1 ? decodeURIComponent( href.split( '#' )[1] ) : '';
			return id ? document.getElementById( id ) : null;
		} );

		var ticking = false;

		function spy() {
			ticking = false;
			var line   = window.pageYOffset + 140;
			var active = -1;
			for ( var i = 0; i < targets.length; i++ ) {
				if ( targets[ i ] ) {
					var top = targets[ i ].getBoundingClientRect().top + window.pageYOffset;
					if ( top <= line ) {
						active = i;
					}
				}
			}
			for ( var j = 0; j < links.length; j++ ) {
				links[ j ].classList.toggle( 'active', j === active );
			}
		}

		function onScroll() {
			if ( ! ticking ) {
				ticking = true;
				window.requestAnimationFrame( spy );
			}
		}

		window.addEventListener( 'scroll', onScroll, { passive: true } );
		window.addEventListener( 'resize', onScroll );
		spy();

		// Smooth scroll on TOC click. ez-toc's own smooth-scroll script is
		// delayed by WP Rocket, so first clicks can go dead in real browsers —
		// this handler is always live (theme JS is excluded from delay) and
		// wins via the capture phase.
		links.forEach( function ( link, i ) {
			link.addEventListener(
				'click',
				function ( e ) {
					var target = targets[ i ];
					if ( ! target ) {
						return;
					}
					e.preventDefault();
					e.stopPropagation();
					var top = target.getBoundingClientRect().top + window.pageYOffset - 110;
					window.scrollTo( { top: top, behavior: 'smooth' } );
					if ( window.history && window.history.pushState ) {
						window.history.pushState( null, '', link.getAttribute( 'href' ) );
					}
				},
				true
			);
		} );
	}

	function initCopyLink() {
		var btn = document.querySelector( '.tnb-share .tnb-copy-link' );
		if ( ! btn ) {
			return;
		}
		btn.addEventListener( 'click', function () {
			var link = btn.getAttribute( 'data-link' ) || window.location.href;

			function done() {
				btn.classList.add( 'copied' );
				btn.setAttribute( 'aria-label', 'Link copied' );
				window.setTimeout( function () {
					btn.classList.remove( 'copied' );
					btn.setAttribute( 'aria-label', 'Copy link' );
				}, 1500 );
			}

			if ( navigator.clipboard && navigator.clipboard.writeText ) {
				navigator.clipboard.writeText( link ).then( done );
			} else {
				var ta = document.createElement( 'textarea' );
				ta.value = link;
				ta.style.position = 'fixed';
				ta.style.opacity = '0';
				document.body.appendChild( ta );
				ta.select();
				try {
					document.execCommand( 'copy' );
					done();
				} catch ( e ) {}
				document.body.removeChild( ta );
			}
		} );
	}

	function boot() {
		init();
		initCopyLink();
	}

	if ( 'loading' === document.readyState ) {
		document.addEventListener( 'DOMContentLoaded', boot );
	} else {
		boot();
	}
} )();
