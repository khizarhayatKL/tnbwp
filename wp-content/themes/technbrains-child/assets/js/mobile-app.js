/**
 * Mobile App Development page — interactive behaviour.
 *
 * Self-contained on purpose, same reasoning as construction.js: components.js already
 * carries a generic tab/accordion pair, and this file does not call into it, so a shared
 * initialiser change cannot alter this page and nothing here can alter other pages'
 * sections. Hooks are this page's own data-ma-* attributes.
 *
 * Loaded only where an ma_* layout is placed — see tnb_mobile_app_enqueue_assets() — so it
 * never runs on any other page. Every initialiser is a no-op when its markup is absent.
 *
 * Scroll reveal is NOT here: .dt-rev is already handled in components.js.
 *
 * @package technbrains-child
 */
(function () {
	'use strict';

	/**
	 * Problems We Solve — accordion. One category open at a time, matching the mockup.
	 *
	 * Uses grid-template-rows (0fr/1fr) rather than max-height, so a panel of any content
	 * height animates cleanly without a hardcoded cap.
	 */
	function initAccordions() {
		document.querySelectorAll( '[data-ma-acc]' ).forEach( function ( group ) {
			var rows = Array.prototype.slice.call( group.children );

			rows.forEach( function ( row ) {
				var head = row.querySelector( '[data-ma-acc-head]' );
				var panel = row.querySelector( '[data-ma-acc-panel]' );

				if ( ! head || ! panel ) {
					return;
				}

				head.addEventListener( 'click', function () {
					var isOpen = row.classList.contains( 'is-open' );

					rows.forEach( function ( otherRow ) {
						var otherHead = otherRow.querySelector( '[data-ma-acc-head]' );
						var otherPanel = otherRow.querySelector( '[data-ma-acc-panel]' );

						if ( ! otherHead || ! otherPanel ) {
							return;
						}

						var open = otherRow === row && ! isOpen;

						otherRow.classList.toggle( 'is-open', open );
						otherHead.setAttribute( 'aria-expanded', open ? 'true' : 'false' );
						otherPanel.style.gridTemplateRows = open ? '1fr' : '0fr';
					} );
				} );
			} );
		} );
	}

	/**
	 * Devices & Integrations — tab rail. Only one panel group is visible at a time (the
	 * mockup swaps content rather than keeping every panel in the DOM), so this toggles
	 * [hidden] on the pre-rendered .ma-eco-panel-group elements rather than re-rendering.
	 *
	 * Arrow keys move between tabs, per the tablist pattern — same behaviour as
	 * construction.js's initTabs().
	 */
	function initEco() {
		document.querySelectorAll( '[data-ma-eco]' ).forEach( function ( group ) {
			var tabs = Array.prototype.slice.call( group.querySelectorAll( '[data-ma-eco-tab]' ) );
			var panelGroups = Array.prototype.slice.call( group.querySelectorAll( '[data-ma-eco-group]' ) );

			if ( ! tabs.length || ! panelGroups.length ) {
				return;
			}

			function activate( idx, focus ) {
				tabs.forEach( function ( tab, i ) {
					var on = i === idx;

					tab.classList.toggle( 'is-active', on );
					tab.setAttribute( 'aria-selected', on ? 'true' : 'false' );
					tab.setAttribute( 'tabindex', on ? '0' : '-1' );
				} );

				panelGroups.forEach( function ( panelGroup, i ) {
					panelGroup.hidden = i !== idx;
				} );

				if ( focus && tabs[ idx ] ) {
					tabs[ idx ].focus();
				}
			}

			tabs.forEach( function ( tab, i ) {
				tab.addEventListener( 'click', function () {
					activate( i, false );
				} );

				tab.addEventListener( 'keydown', function ( e ) {
					var move =
						'ArrowRight' === e.key || 'ArrowDown' === e.key
							? 1
							: 'ArrowLeft' === e.key || 'ArrowUp' === e.key
							? -1
							: 0;

					if ( move ) {
						e.preventDefault();
						activate( ( i + move + tabs.length ) % tabs.length, true );
						return;
					}

					if ( 'Home' === e.key ) {
						e.preventDefault();
						activate( 0, true );
					}

					if ( 'End' === e.key ) {
						e.preventDefault();
						activate( tabs.length - 1, true );
					}
				} );
			} );
		} );
	}

	function init() {
		initAccordions();
		initEco();
	}

	if ( 'loading' === document.readyState ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
})();
