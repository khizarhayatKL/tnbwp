/**
 * Construction Software page — interactive behaviour.
 *
 * Self-contained on purpose. components.js already carries a case deck, a tab set and a
 * testimonial carousel, and this file deliberately does not call into any of them: everything this
 * page does lives here, so a change to a shared initialiser cannot alter this page and nothing
 * here can alter the sections those initialisers drive. The cost is a second, smaller
 * implementation of shuffle and tabs, which is the trade being made knowingly.
 *
 * Only presentation is shared. The deck reuses the theme's .case-* classes and state names
 * (is-front / is-side-l / is-side-r / is-far) so the visual treatment stays identical; the hooks
 * are this page's own data-cn-* attributes.
 *
 * Loaded only where a cn_* layout is placed — see tnb_construction_enqueue_assets() — so it never
 * runs on any other page. Every initialiser is a no-op when its markup is absent, so a page using
 * some sections and not others is safe.
 *
 * Scroll reveal is NOT here: .dt-rev is already handled in components.js and re-implementing it
 * would double the observers on the same elements.
 *
 * @package technbrains-child
 */
(function () {
	'use strict';

	var reduceMotion =
		window.matchMedia && window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

	/**
	 * Case deck — the front card plus its two neighbours, the rest stacked behind.
	 *
	 * No autoplay, matching the approved prototype. Movement is user-driven only, which also means
	 * there is no timer to pause for WCAG 2.2.2.
	 */
	function initDecks() {
		document.querySelectorAll( '[data-cn-deck-wrap]' ).forEach( function ( wrap ) {
			var deck = wrap.querySelector( '[data-cn-deck]' );

			if ( ! deck ) {
				return;
			}

			var cards = Array.prototype.slice.call( deck.querySelectorAll( '.case-card' ) );
			var total = cards.length;

			// One card cannot shuffle, and the template omits the nav in that case.
			if ( total < 2 ) {
				return;
			}

			var dots = Array.prototype.slice.call( wrap.querySelectorAll( '[data-cn-deck-dot]' ) );
			var active = 0;
			var busy = false;

			function state( i ) {
				var offset = ( i - active + total ) % total;

				if ( 0 === offset ) {
					return 'is-front';
				}

				if ( 1 === offset ) {
					return 'is-side-r';
				}

				if ( offset === total - 1 ) {
					return 'is-side-l';
				}

				return 'is-far';
			}

			function paint() {
				cards.forEach( function ( card, i ) {
					var st = state( i );

					card.classList.remove( 'is-front', 'is-side-r', 'is-side-l', 'is-far' );
					card.classList.add( st );

					// Stacking order has to follow the state, or a side card paints over the front one.
					card.style.zIndex = 'is-front' === st ? '50' : 0 === st.indexOf( 'is-side' ) ? '40' : '30';

					// Only the front card is reachable; the ones behind it are decorative until promoted.
					card.setAttribute( 'aria-hidden', 'is-front' === st ? 'false' : 'true' );
				} );

				dots.forEach( function ( dot, i ) {
					var on = i === active;

					dot.classList.toggle( 'is-active', on );
					dot.setAttribute( 'aria-selected', on ? 'true' : 'false' );
				} );
			}

			function go( next ) {
				if ( busy ) {
					return;
				}

				active = ( ( next % total ) + total ) % total;

				// The lock spans the CSS transition so a fast double-click cannot leave two cards
				// mid-shuffle. Skipped when motion is reduced, because there is no transition to wait on.
				if ( reduceMotion ) {
					paint();
					return;
				}

				busy = true;
				paint();
				window.setTimeout( function () {
					busy = false;
				}, 520 );
			}

			cards.forEach( function ( card, i ) {
				card.addEventListener( 'click', function () {
					if ( ! card.classList.contains( 'is-front' ) ) {
						go( i );
					}
				} );
			} );

			dots.forEach( function ( dot ) {
				dot.addEventListener( 'click', function () {
					go( parseInt( dot.getAttribute( 'data-cn-deck-dot' ), 10 ) || 0 );
				} );
			} );

			var prev = wrap.querySelector( '[data-cn-deck-prev]' );
			var next = wrap.querySelector( '[data-cn-deck-next]' );

			if ( prev ) {
				prev.addEventListener( 'click', function () {
					go( active - 1 );
				} );
			}

			if ( next ) {
				next.addEventListener( 'click', function () {
					go( active + 1 );
				} );
			}

			paint();
		} );
	}

	/**
	 * Tab sets — used by both the integrations wall and the tech stack.
	 *
	 * Panels are shown and hidden with the hidden attribute rather than a class, so a panel that is
	 * off is off for assistive tech too. construction.css must not set display on a panel without
	 * guarding for [hidden], because a class rule with display:grid outranks the UA sheet's
	 * display:none and the panel would stay visible.
	 *
	 * Arrow keys move between tabs, per the tablist pattern.
	 */
	function initTabs() {
		document.querySelectorAll( '[data-cn-tabs]' ).forEach( function ( group ) {
			var tabs = Array.prototype.slice.call( group.querySelectorAll( '[data-cn-tab]' ) );
			var panels = Array.prototype.slice.call( group.querySelectorAll( '[data-cn-panel]' ) );

			if ( ! tabs.length || ! panels.length ) {
				return;
			}

			function activate( idx, focus ) {
				tabs.forEach( function ( tab, i ) {
					var on = i === idx;

					tab.classList.toggle( 'is-active', on );
					tab.setAttribute( 'aria-selected', on ? 'true' : 'false' );

					// Only the selected tab stays in the tab order; the rest are reached with arrows.
					tab.setAttribute( 'tabindex', on ? '0' : '-1' );
				} );

				panels.forEach( function ( panel, i ) {
					panel.hidden = i !== idx;
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

			activate( 0, false );
		} );
	}

	/**
	 * Review carousel — a window of three, previous / active / next.
	 *
	 * Not the theme's testimonial carousel, which slides a three-up track by transform. Here the
	 * cards hold position and only their role changes, which is what the approved design shows: the
	 * centre card emphasised, its neighbours receded.
	 *
	 * Position is stamped by offset from the active index, the same way the deck works, so the DOM is
	 * never rebuilt. Re-rendering the slice on every move — as the React prototype does — would drop
	 * keyboard focus and re-trigger the reveal animation on cards that had already appeared.
	 */
	function initReviews() {
		document.querySelectorAll( '[data-cn-rev]' ).forEach( function ( wrap ) {
			var slides = Array.prototype.slice.call( wrap.querySelectorAll( '[data-cn-rev-slide]' ) );
			var dots = Array.prototype.slice.call( wrap.querySelectorAll( '[data-cn-rev-dot]' ) );
			var total = slides.length;

			if ( total < 2 ) {
				return;
			}

			var active = 0;

			function role( i ) {
				var offset = ( i - active + total ) % total;

				if ( 0 === offset ) {
					return 'is-c';
				}

				// With only two reviews the same card would be both neighbours; the right-hand slot wins
				// so one card is never given two conflicting positions.
				if ( 1 === offset ) {
					return 'is-r';
				}

				if ( offset === total - 1 ) {
					return 'is-l';
				}

				return 'is-far';
			}

			function paint() {
				slides.forEach( function ( slide, i ) {
					var st = role( i );

					slide.classList.remove( 'is-c', 'is-l', 'is-r', 'is-far' );
					slide.classList.add( st );

					// Only the three in the window are exposed. The rest are out of view, so announcing
					// them would read out reviews nobody can see.
					slide.setAttribute( 'aria-hidden', 'is-far' === st ? 'true' : 'false' );
				} );

				dots.forEach( function ( dot, i ) {
					var on = i === active;

					dot.classList.toggle( 'is-active', on );
					dot.setAttribute( 'aria-selected', on ? 'true' : 'false' );
				} );
			}

			function go( next ) {
				active = ( ( next % total ) + total ) % total;
				paint();
			}

			dots.forEach( function ( dot, i ) {
				dot.addEventListener( 'click', function () {
					go( i );
				} );
			} );

			var prev = wrap.querySelector( '[data-cn-rev-prev]' );
			var next = wrap.querySelector( '[data-cn-rev-next]' );

			if ( prev ) {
				prev.addEventListener( 'click', function () {
					go( active - 1 );
				} );
			}

			if ( next ) {
				next.addEventListener( 'click', function () {
					go( active + 1 );
				} );
			}

			paint();
		} );
	}

	/**
	 * FAQ accordion — one answer open at a time.
	 *
	 * The theme's platform FAQ accordion is bound to .platform-faqs .pfaq-list rather than a data
	 * attribute, so it cannot be pointed at this markup without editing shared code.
	 *
	 * Each question is a <button> inside its heading, so it is focusable, operable with Enter and
	 * Space for free, and still contributes its text to the document outline.
	 */
	function initFaqs() {
		document.querySelectorAll( '[data-cn-faq]' ).forEach( function ( list ) {
			var items = Array.prototype.slice.call( list.querySelectorAll( '[data-cn-faq-item]' ) );

			if ( ! items.length ) {
				return;
			}

			items.forEach( function ( item ) {
				var btn = item.querySelector( '[data-cn-faq-q]' );
				var panel = item.querySelector( '[data-cn-faq-a]' );

				if ( ! btn || ! panel ) {
					return;
				}

				btn.addEventListener( 'click', function () {
					var open = 'true' === btn.getAttribute( 'aria-expanded' );

					// Collapse everything first, then reopen the one that was clicked if it had been shut.
					items.forEach( function ( other ) {
						var otherBtn = other.querySelector( '[data-cn-faq-q]' );
						var otherPanel = other.querySelector( '[data-cn-faq-a]' );

						if ( ! otherBtn || ! otherPanel ) {
							return;
						}

						other.classList.remove( 'is-open' );
						otherBtn.setAttribute( 'aria-expanded', 'false' );
						otherPanel.hidden = true;
					} );

					if ( ! open ) {
						item.classList.add( 'is-open' );
						btn.setAttribute( 'aria-expanded', 'true' );
						panel.hidden = false;
					}
				} );
			} );
		} );
	}

	/**
	 * FRAGMENTATION COST CALCULATOR — "What Does Your Stack Cost Per Year?"
	 * (Construction-calculator.php). Vanilla-JS port of construction-calc.jsx's CNCalculator,
	 * "build spec v4 (lean)": 4 inputs → 3 numbers → 1 verdict tier → 1 CTA. Formulas, tiers and
	 * verdict copy are ported verbatim, not reimplemented from scratch. No-op if the calculator
	 * markup is absent, matching every other initialiser in this file.
	 */
	function initCalculator() {
		var root = document.getElementById( 'cn-calc-module' );
		if ( ! root ) {
			return;
		}

		var el = {
			systems: document.getElementById( 'cnc-systems' ),
			systemsVal: document.getElementById( 'cnc-systems-val' ),
			spend: document.getElementById( 'cnc-spend' ),
			spendHelp: document.getElementById( 'cnc-spend-help' ),
			hours: document.getElementById( 'cnc-hours' ),
			hoursVal: document.getElementById( 'cnc-hours-val' ),
			rate: document.getElementById( 'cnc-rate' ),
			rateHelp: document.getElementById( 'cnc-rate-help' ),
			heroVal: document.getElementById( 'cnc-hero-val' ),
			heroSub: document.getElementById( 'cnc-hero-sub' ),
			manualVal: document.getElementById( 'cnc-manual-val' ),
			manualSub: document.getElementById( 'cnc-manual-sub' ),
			persystemVal: document.getElementById( 'cnc-persystem-val' ),
			persystemSub: document.getElementById( 'cnc-persystem-sub' ),
			verdict: document.getElementById( 'cnc-verdict' ),
			verdictH: document.getElementById( 'cnc-verdict-h' ),
			verdictP: document.getElementById( 'cnc-verdict-p' ),
			lead: document.getElementById( 'cnc-lead' ),
			ctaBtn: document.getElementById( 'cnc-cta-btn' ),
		};

		if ( ! el.systems || ! el.spend || ! el.hours || ! el.rate ) {
			return;
		}

		var CN_TIER = { t1: 0.2, t2: 0.5 };
		var VERDICT = {
			0: { h: 'No manual data movement reported.', b: 'If that is accurate, fragmentation is not your constraint; if it looks low, check with whoever builds your monthly reports.', cta: null },
			1: { h: 'Your manual data burden looks limited.', b: 'The single highest-friction handoff is a more useful place to start than a broad software project.', cta: null },
			2: { h: 'Your systems may need better connections.', b: 'Before replacing a platform, check whether your highest-volume handoffs can be handled between the tools you already own.', cta: 'Get an integration opinion' },
			3: { h: 'Manual data work is becoming a capacity issue.', b: 'At this level it is worth scoping whether integration, consolidation, or workflow redesign reduces it.', cta: 'Get a scoped opinion' },
		};

		function cnRoundCurrency( n ) {
			if ( n === null || isNaN( n ) ) { return n; }
			if ( n >= 1000000 ) { return Math.round( n / 1000 ) * 1000; }
			return Math.round( n / 100 ) * 100;
		}
		function cnMoney( n ) {
			if ( n === null || isNaN( n ) ) { return '—'; }
			return '$' + Math.round( n ).toLocaleString( 'en-US' );
		}
		function cnGroupDigits( raw ) {
			var digits = String( raw ).replace( /[^0-9]/g, '' );
			return digits === '' ? '' : Number( digits ).toLocaleString( 'en-US' );
		}
		function cnDigitsToInt( raw ) {
			var digits = String( raw ).replace( /[^0-9]/g, '' );
			return digits === '' ? null : parseInt( digits, 10 );
		}

		function render() {
			var systems = parseInt( el.systems.value, 10 );
			var annualSpend = cnDigitsToInt( el.spend.value );
			var hoursPerWeek = parseInt( el.hours.value, 10 );
			var hourlyRate = cnDigitsToInt( el.rate.value );

			el.systemsVal.textContent = systems;
			el.systems.style.setProperty( '--pct', ( ( systems - 2 ) / ( 15 - 2 ) * 100 ) + '%' );
			el.hoursVal.textContent = hoursPerWeek + ' hrs';
			el.hours.style.setProperty( '--pct', ( hoursPerWeek / 120 * 100 ) + '%' );

			var rateInvalid = ! hourlyRate || hourlyRate <= 0;
			var systemsInvalid = ! systems || systems <= 0;
			var spendInvalid = annualSpend === null || annualSpend < 0;
			var hoursInvalid = isNaN( hoursPerWeek ) || hoursPerWeek < 0;
			var canRender = ! rateInvalid && ! systemsInvalid && ! spendInvalid && ! hoursInvalid;

			if ( el.spendHelp ) { el.spendHelp.textContent = spendInvalid ? 'Add a number to see your result.' : 'A ballpark is fine.'; }
			if ( el.rateHelp ) { el.rateHelp.textContent = rateInvalid ? 'Add a number to see your result.' : 'Wage plus burden. Salary ÷ 2,080 is close enough.'; }

			if ( ! canRender ) {
				el.heroVal.textContent = '—';
				el.heroSub.textContent = 'Add a number to see your result.';
				el.manualVal.textContent = '—';
				el.manualSub.textContent = 'Add a number to see your result.';
				el.persystemVal.textContent = '—';
				el.persystemSub.textContent = 'Add a number to see your result.';
				if ( el.verdict ) { el.verdict.hidden = true; }
				return;
			}

			var manualCostRaw = hoursPerWeek * 52 * hourlyRate;
			var headlineRaw = ( annualSpend || 0 ) + manualCostRaw;
			var costPerSystemRaw = systems > 0 ? headlineRaw / systems : 0;
			var fte = hoursPerWeek / 40;

			var manualCost = cnRoundCurrency( manualCostRaw );
			var headline = cnRoundCurrency( headlineRaw );
			var costPerSystem = cnRoundCurrency( costPerSystemRaw );

			el.heroVal.textContent = cnMoney( headline );
			el.heroSub.textContent = 'Software spend plus employee time spent moving data by hand.';
			el.manualVal.textContent = cnMoney( manualCost );
			el.manualSub.textContent = 'About ' + fte.toFixed( 1 ) + ' FTE of team capacity.';
			el.persystemVal.textContent = cnMoney( costPerSystem );
			el.persystemSub.textContent = 'An average across your ' + systems + ' systems, not the cost of any one.';

			var tier;
			if ( hoursPerWeek === 0 ) { tier = 0; }
			else if ( fte < CN_TIER.t1 ) { tier = 1; }
			else if ( fte <= CN_TIER.t2 ) { tier = 2; }
			else { tier = 3; }
			var v = VERDICT[ tier ];

			if ( el.verdict ) {
				el.verdict.hidden = false;
				el.verdict.className = 'cn-calc-verdict tier-' + tier;
			}
			if ( el.verdictH ) { el.verdictH.textContent = v.h; }
			if ( el.verdictP ) { el.verdictP.textContent = v.b; }
			if ( el.lead ) {
				el.lead.hidden = ! v.cta;
				if ( v.cta ) {
					if ( el.ctaBtn && el.ctaBtn.childNodes.length ) { el.ctaBtn.childNodes[0].textContent = v.cta + ' '; }
				}
			}
		}

		el.systems.addEventListener( 'input', render );
		el.hours.addEventListener( 'input', render );
		el.spend.addEventListener( 'input', function ( e ) {
			e.target.value = cnGroupDigits( e.target.value );
			render();
		} );
		el.rate.addEventListener( 'input', function ( e ) {
			e.target.value = cnGroupDigits( e.target.value );
			render();
		} );

		render();
	}

	function init() {
		initDecks();
		initTabs();
		initReviews();
		initFaqs();
		initCalculator();
	}

	if ( 'loading' === document.readyState ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
})();
