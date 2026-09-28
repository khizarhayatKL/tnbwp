/**
 * Logistics page family — interactive behaviour.
 *
 * Self-contained, matching construction.js: does not call into components.js and
 * is not called by it. Scroll reveal (.dt-rev) is handled globally by
 * components.js already and is not reimplemented here.
 *
 * Loaded only where an lg_* layout is placed — see tnb_logistics_enqueue_assets()
 * in functions.php — so it never runs on any other page. Each initialiser is a
 * no-op when its markup is absent.
 *
 * @package technbrains-child
 */
(function () {
	'use strict';

	/**
	 * Management Platform pipeline — auto-advances through stages (fills the
	 * active icon, moves the pulse dot), pauses on hover/focus, and a click
	 * jumps straight to that stage. Same pause-on-hover/focus shape as the
	 * Software Outsourcing risk slider in components.js.
	 */
	function initFlow() {
		var reduceMotion =
			window.matchMedia && window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

		document.querySelectorAll( '[data-lg-flow]' ).forEach( function ( flow ) {
			var stages = Array.prototype.slice.call( flow.querySelectorAll( '[data-lg-flow-stage]' ) );
			var pulse = flow.querySelector( '.lg-flow-pulse' );

			if ( ! stages.length ) {
				return;
			}

			var active = stages.findIndex( function ( s ) { return s.classList.contains( 'on' ); } );
			if ( active < 0 ) {
				active = 0;
			}
			var timer = null;

			function select( index ) {
				active = index;
				stages.forEach( function ( s, i ) {
					s.classList.toggle( 'on', i === index );
					s.setAttribute( 'aria-selected', i === index ? 'true' : 'false' );
				} );
				if ( pulse ) {
					pulse.style.left = ( ( index + 0.5 ) / stages.length ) * 100 + '%';
				}
			}

			function advance() {
				select( ( active + 1 ) % stages.length );
			}

			function play() {
				if ( reduceMotion || timer ) {
					return;
				}
				timer = window.setInterval( advance, 3200 );
			}

			function pause() {
				window.clearInterval( timer );
				timer = null;
			}

			stages.forEach( function ( stage, index ) {
				stage.addEventListener( 'click', function () {
					select( index );
					pause();
					play();
				} );
			} );

			flow.addEventListener( 'mouseenter', pause );
			flow.addEventListener( 'mouseleave', play );
			flow.addEventListener( 'focusin', pause );
			flow.addEventListener( 'focusout', play );

			select( active );
			play();
		} );
	}

	/**
	 * Decision ladder — one-open-at-a-time accordion (same close-all-then-open
	 * pattern as components.js's Platform FAQs accordion).
	 */
	function initLadder() {
		document.querySelectorAll( '[data-lg-lad]' ).forEach( function ( lad ) {
			var rows = Array.prototype.slice.call( lad.querySelectorAll( '.lg-lad-row' ) );

			rows.forEach( function ( row ) {
				var head = row.querySelector( '[data-lg-lad-head]' );
				if ( ! head ) {
					return;
				}

				head.addEventListener( 'click', function () {
					var wasOpen = row.classList.contains( 'open' );

					rows.forEach( function ( r ) {
						r.classList.remove( 'open' );
						var h = r.querySelector( '[data-lg-lad-head]' );
						if ( h ) {
							h.setAttribute( 'aria-expanded', 'false' );
						}
					} );

					if ( ! wasOpen ) {
						row.classList.add( 'open' );
						head.setAttribute( 'aria-expanded', 'true' );
					}
				} );
			} );
		} );
	}

	/**
	 * Build Cost Estimator — vanilla-JS port of logistics-3.jsx's LGEstimator.
	 * Formula, tiers and driver weighting are ported verbatim, not reimplemented —
	 * see LG-Estimator.php's header comment for the source. No-op if the module
	 * markup is absent, matching every other initialiser in this file.
	 */
	function initEstimator() {
		document.querySelectorAll( '[data-lg-est]' ).forEach( function ( root ) {
			var sysSeg   = root.querySelector( '[data-lg-est-seg="sys"]' );
			var roleSeg  = root.querySelector( '[data-lg-est-seg="roles"]' );
			var systems  = root.querySelector( '[data-lg-est-systems]' );
			var sysLabel = root.querySelector( '[data-lg-est-systems-label]' );
			var toggles  = root.querySelectorAll( '[data-lg-est-toggle]' );
			var heroVal  = root.querySelector( '[data-lg-est-hero-val]' );
			var moVal    = root.querySelector( '[data-lg-est-timeline-val]' );
			var baseVal  = root.querySelector( '[data-lg-est-base-val]' );
			var drivers  = root.querySelector( '[data-lg-est-drivers]' );

			if ( ! sysSeg || ! roleSeg || ! systems || ! heroVal || ! moVal || ! baseVal || ! drivers ) {
				return;
			}

			var LG_SYS = {
				driver:      { label: 'Driver app',           min:  30000, max:  70000, mo: 3.5 },
				dispatch:    { label: 'Dispatch layer',        min:  45000, max:  95000, mo: 4.5 },
				tracking:    { label: 'Tracking portal',       min:  40000, max:  85000, mo: 4.5 },
				tms:         { label: 'Custom TMS',            min:  95000, max: 200000, mo: 8   },
				marketplace: { label: 'Freight marketplace',   min: 130000, max: 300000, mo: 10  },
			};
			var ADD_MAP = {
				tracking:  { label: 'Real-time tracking',       min: 15000, max: 30000, mo: 0.6 },
				offline:   { label: 'Offline driver workflows', min: 12000, max: 26000, mo: 0.6 },
				ai:        { label: 'AI features',              min: 22000, max: 48000, mo: 1.1 },
				iot:       { label: 'IoT & sensors',            min: 15000, max: 35000, mo: 0.6 },
				migration: { label: 'Data migration',           min: 12000, max: 32000, mo: 0.9 },
			};
			var ROLE_ADD = {
				small: { add: [ 0, 0 ],          mo: 0   },
				mid:   { add: [ 7000, 13000 ],   mo: 0.4 },
				large: { add: [ 15000, 30000 ],  mo: 0.9 },
			};

			var state = {
				sys: 'dispatch',
				roles: 'mid',
				opts: { tracking: true, offline: false, ai: false, iot: false, migration: false },
			};

			function lgShort( n ) {
				if ( n >= 1000000 ) {
					return '$' + ( n / 1000000 ).toFixed( n % 1000000 === 0 ? 0 : 1 ) + 'M';
				}
				return '$' + Math.round( n / 1000 ) + 'K';
			}

			function render() {
				var base = LG_SYS[ state.sys ];
				var integrations = parseInt( systems.value, 10 ) || 0;
				var role = ROLE_ADD[ state.roles ];

				var min = base.min, max = base.max, mo = base.mo;
				var rowDrivers = [];

				var iMin = integrations * 8000, iMax = integrations * 16000;
				min += iMin; max += iMax; mo += integrations * 0.35;
				if ( integrations > 0 ) {
					rowDrivers.push( { label: integrations + ' system integration' + ( integrations > 1 ? 's' : '' ), w: iMax } );
				}

				Object.keys( ADD_MAP ).forEach( function ( k ) {
					if ( state.opts[ k ] ) {
						min += ADD_MAP[ k ].min; max += ADD_MAP[ k ].max; mo += ADD_MAP[ k ].mo;
						rowDrivers.push( { label: ADD_MAP[ k ].label, w: ADD_MAP[ k ].max } );
					}
				} );

				min += role.add[ 0 ]; max += role.add[ 1 ]; mo += role.mo;
				if ( 'large' === state.roles ) {
					rowDrivers.push( { label: 'Role & permission complexity', w: role.add[ 1 ] } );
				}
				rowDrivers.push( { label: base.label + ' base scope', w: base.max } );

				var moMin = Math.max( 3, Math.round( mo - 1 ) );
				var moMax = Math.round( mo + 2 );
				var top3 = rowDrivers.slice().sort( function ( a, b ) { return b.w - a.w; } ).slice( 0, 3 );

				sysLabel.textContent = integrations;
				systems.style.setProperty( '--pct', ( integrations / 10 * 100 ) + '%' );
				heroVal.textContent = lgShort( min ) + '–' + lgShort( max );
				moVal.textContent = moMin + '–' + moMax + ' mo';
				baseVal.textContent = base.label;

				drivers.innerHTML = '';
				top3.forEach( function ( d, i ) {
					var row = document.createElement( 'div' );
					row.className = 'lg-est-driver';
					var rank = document.createElement( 'span' );
					rank.className = 'lg-est-driver-rank';
					rank.textContent = String( i + 1 );
					var label = document.createElement( 'span' );
					label.textContent = d.label;
					row.appendChild( rank );
					row.appendChild( label );
					drivers.appendChild( row );
				} );
			}

			sysSeg.querySelectorAll( '[data-lg-est-opt]' ).forEach( function ( btn ) {
				btn.addEventListener( 'click', function () {
					sysSeg.querySelectorAll( '[data-lg-est-opt]' ).forEach( function ( b ) { b.classList.remove( 'on' ); } );
					btn.classList.add( 'on' );
					state.sys = btn.getAttribute( 'data-lg-est-opt' );
					render();
				} );
			} );

			roleSeg.querySelectorAll( '[data-lg-est-opt]' ).forEach( function ( btn ) {
				btn.addEventListener( 'click', function () {
					roleSeg.querySelectorAll( '[data-lg-est-opt]' ).forEach( function ( b ) { b.classList.remove( 'on' ); } );
					btn.classList.add( 'on' );
					state.roles = btn.getAttribute( 'data-lg-est-opt' );
					render();
				} );
			} );

			toggles.forEach( function ( btn ) {
				btn.addEventListener( 'click', function () {
					var key = btn.getAttribute( 'data-lg-est-toggle' );
					state.opts[ key ] = ! state.opts[ key ];
					btn.classList.toggle( 'on', state.opts[ key ] );
					render();
				} );
			} );

			systems.addEventListener( 'input', render );

			render();
		} );
	}

	// Deferred off the critical path: this script already loads in the footer, and
	// init is pushed past 'load' (via requestIdleCallback where available) so the
	// listener setup and the flow's autoplay timer start after Lighthouse's TBT
	// window closes, not during it. The setInterval tick itself is a handful of
	// classList/style writes — nowhere near the 50ms long-task threshold — but
	// deferring the initial setup costs nothing and keeps it off the trace either way.
	function deferredInit() {
		initFlow();
		initLadder();
		initEstimator();
	}

	function schedule() {
		if ( window.requestIdleCallback ) {
			window.requestIdleCallback( deferredInit, { timeout: 2000 } );
		} else {
			window.setTimeout( deferredInit, 200 );
		}
	}

	if ( document.readyState === 'complete' ) {
		schedule();
	} else {
		window.addEventListener( 'load', schedule );
	}
})();
