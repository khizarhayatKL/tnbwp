/**
 * Article template family — sidebar Table of Contents behaviour.
 *
 * The TOC links themselves are server-rendered from an ACF repeater (see
 * page-templates/page-flexible.php), not scanned from the DOM like the source prototype's
 * TableOfContents component — so this script only needs to wire up already-rendered `.art-toc-link`
 * elements: active-section highlighting via IntersectionObserver, and click → smooth-scroll +
 * history.replaceState. Self-contained, no dependency on components.js, same isolation as
 * construction.js.
 *
 * @package technbrains-child
 */
(function () {
	'use strict';

	function init() {
		var toc = document.querySelector( '.art-toc' );
		if ( ! toc ) {
			return;
		}

		var links = Array.prototype.slice.call( toc.querySelectorAll( '.art-toc-link' ) );
		if ( ! links.length ) {
			return;
		}

		var targets = [];
		links.forEach( function ( link ) {
			var id = ( link.getAttribute( 'href' ) || '' ).replace( /^#/, '' );
			var el = id ? document.getElementById( id ) : null;
			if ( el ) {
				targets.push( { id: id, el: el, link: link } );
			}
		} );

		if ( ! targets.length ) {
			return;
		}

		function setActive( id ) {
			links.forEach( function ( link ) {
				link.classList.toggle( 'is-active', link.getAttribute( 'href' ) === '#' + id );
			} );
		}

		var io = new IntersectionObserver(
			function ( entries ) {
				var visible = entries
					.filter( function ( e ) { return e.isIntersecting; } )
					.sort( function ( a, b ) { return a.boundingClientRect.top - b.boundingClientRect.top; } );
				if ( visible.length ) {
					setActive( visible[ 0 ].target.id );
				}
			},
			{ rootMargin: '-88px 0px -70% 0px', threshold: 0 }
		);
		targets.forEach( function ( t ) { io.observe( t.el ); } );

		targets.forEach( function ( t ) {
			t.link.addEventListener( 'click', function ( e ) {
				e.preventDefault();
				var rect = t.el.getBoundingClientRect();
				var y = rect.top + window.pageYOffset - 88;
				window.scrollTo( { top: y, behavior: 'smooth' } );
				if ( window.history && window.history.replaceState ) {
					window.history.replaceState( null, '', '#' + t.id );
				}
			} );
		} );
	}

	if ( 'loading' === document.readyState ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
})();

/**
 * COST CALCULATOR — three-year cost model (Article-CostCalculator.php).
 *
 * Independent IIFE, unrelated to the TOC logic above (same one-file-multiple-init-blocks
 * pattern already used by construction.js/components.js in this theme). Vanilla-JS port of
 * cost-app.jsx's CostCalculator: no React, a plain state object re-rendered into the
 * already-server-rendered DOM nodes on every input change. Formulas are ported verbatim, not
 * reimplemented from scratch.
 */
(function () {
	'use strict';

	function money( n ) {
		return '$' + Math.round( n ).toLocaleString( 'en-US' );
	}

	function capFirst( s ) {
		return s.charAt( 0 ).toUpperCase() + s.slice( 1 );
	}

	function cleanCur( raw ) {
		var v = String( raw ).replace( /[^0-9.]/g, '' );
		var idx = v.indexOf( '.' );
		if ( idx !== -1 ) {
			v = v.slice( 0, idx + 1 ) + v.slice( idx + 1 ).replace( /\./g, '' );
		}
		var parts = v.split( '.' );
		var intPart = parts[ 0 ].replace( /^0+(?=\d)/, '' );
		var commas = intPart === '' ? '' : Number( intPart ).toLocaleString( 'en-US' );
		return parts.length > 1 ? commas + '.' + parts[ 1 ].slice( 0, 2 ) : commas;
	}

	function toNum( raw ) {
		var c = String( raw ).replace( /[$,\s]/g, '' );
		if ( c === '' ) {
			return NaN;
		}
		var v = parseFloat( c );
		return isNaN( v ) ? NaN : v;
	}

	function init() {
		var root = document.querySelector( '.cc' );
		if ( ! root ) {
			return;
		}

		var el = {
			quote: root.querySelector( '#cc-quote' ),
			quoteErr: root.querySelector( '#cc-quote-err' ),
			impl: root.querySelector( '#cc-impl' ),
			implErr: root.querySelector( '#cc-impl-err' ),
			scenBtns: Array.prototype.slice.call( root.querySelectorAll( '.cc-scen' ) ),
			slider: root.querySelector( '.cc-slider' ),
			rateNum: root.querySelector( '#cc-ratenum' ),
			addInternalBtn: root.querySelector( '.cc-addinternal' ),
			internalField: root.querySelector( '#cc-internal-field' ),
			internal: root.querySelector( '#cc-internal' ),
			placeholder: root.querySelector( '#cc-placeholder' ),
			placeholderText: root.querySelector( '#cc-placeholder-text' ),
			results: root.querySelector( '#cc-results' ),
			heroV: root.querySelector( '#cc-hero-v' ),
			heroSub: root.querySelector( '#cc-hero-sub' ),
			gapV: root.querySelector( '#cc-gap-v' ),
			gapSub: root.querySelector( '#cc-gap-sub' ),
			gapPct: root.querySelector( '#cc-gap-pct' ),
			bars: root.querySelector( '#cc-bars' ),
			barsSr: root.querySelector( '#cc-bars-sr' ),
			insightText: root.querySelector( '#cc-insight-text' ),
			ctaWrap: root.querySelector( '#cc-cta-wrap' ),
		};

		if ( ! el.quote || ! el.impl || ! el.slider || ! el.rateNum ) {
			return;
		}

		var state = {
			ratePct: 0,
			scenario: 0,
		};

		function setRate( v, clearScenario ) {
			var n = parseFloat( v );
			if ( isNaN( n ) ) {
				n = 0;
			}
			n = Math.max( 0, Math.min( 30, n ) );
			state.ratePct = n;
			if ( clearScenario ) {
				state.scenario = null;
			}
			el.slider.value = String( n );
			el.slider.style.setProperty( '--fill', ( n / 30 * 100 ) + '%' );
			el.rateNum.value = String( n );
			el.scenBtns.forEach( function ( btn, i ) {
				btn.setAttribute( 'aria-pressed', state.scenario === i ? 'true' : 'false' );
			} );
		}

		function render() {
			var quote = el.quote.value;
			var impl = el.impl.value;
			var internal = el.internal ? el.internal.value : '';

			var q = toNum( quote );
			var im = toNum( impl );
			var quoteBlank = quote.trim() === '';
			var implBlank = impl.trim() === '';
			var quoteValid = ! isNaN( q ) && q >= 1;
			var implValid = ! implBlank && ! isNaN( im ) && im >= 0;
			var inRaw = internal.trim() === '' ? null : toNum( internal );
			var internalVal = inRaw && inRaw > 0 ? inRaw : 0;
			var ready = quoteValid && implValid;

			el.quote.classList.toggle( 'is-error', ! quoteBlank && ! quoteValid );
			if ( el.quoteErr ) {
				el.quoteErr.hidden = quoteBlank || quoteValid;
			}
			if ( el.implErr ) {
				el.implErr.hidden = ! implBlank;
			}

			if ( ! ready ) {
				if ( el.placeholderText ) {
					el.placeholderText.textContent = ( quoteBlank || ! quoteValid )
						? 'Enter your year-one quote to model the three-year cost.'
						: 'Enter your implementation cost, or 0 if it is bundled, to see the result.';
				}
				if ( el.placeholder ) { el.placeholder.hidden = false; }
				if ( el.results ) { el.results.hidden = true; }
				if ( el.ctaWrap ) { el.ctaWrap.hidden = true; }
				return;
			}

			var rate = state.ratePct / 100;
			var y1 = q, y2 = q * ( 1 + rate ), y3 = q * Math.pow( 1 + rate, 2 );
			var year1 = y1 + im + internalVal, year2 = y2 + internalVal, year3 = y3 + internalVal;
			var dY1 = Math.round( year1 ), dY2 = Math.round( year2 ), dY3 = Math.round( year3 );
			var dTotal = dY1 + dY2 + dY3;
			var dNaive = Math.round( q * 3 );
			var dGap = dTotal - dNaive;
			var dGapPct = dNaive > 0 ? ( dGap / dNaive ) * 100 : null;
			var escalationTotal = ( y2 - y1 ) + ( y3 - y1 );
			var nonSubscriptionTotal = im + internalVal * 3;
			var nonSubLabel = internalVal > 0
				? ( im > 0 ? 'implementation and internal running costs' : 'internal running costs' )
				: 'implementation costs';

			var insight;
			if ( state.ratePct === 0 && nonSubscriptionTotal === 0 ) {
				insight = 'At the 0% renewal rate selected and with no additional costs, three times the annual quote equals the modelled total.';
			} else if ( im > q ) {
				insight = 'Implementation exceeds the first-year subscription. Review the scope, the services included, and which implementation items may be negotiable.';
			} else if ( state.ratePct === 0 ) {
				insight = 'At the 0% renewal rate selected, ' + nonSubLabel + ' add ' + money( nonSubscriptionTotal ) + ' over three years.';
			} else if ( nonSubscriptionTotal >= escalationTotal ) {
				insight = capFirst( nonSubLabel ) + ' add ' + money( nonSubscriptionTotal ) + ' over three years, ahead of the ' + money( escalationTotal ) + ' from renewal escalation at the rate you selected. That is the bigger line to negotiate.';
			} else if ( state.ratePct >= 15 ) {
				insight = 'At ' + state.ratePct + '% annually, renewal escalation adds ' + money( escalationTotal ) + ' over three years. Ask for a written cap before signing.';
			} else {
				insight = 'Renewal escalation adds ' + money( escalationTotal ) + ' over three years. Ask for a written cap before signing, not at renewal.';
			}

			var maxV = Math.max( dY1, dY2, dY3, 1 );

			if ( el.placeholder ) { el.placeholder.hidden = true; }
			if ( el.results ) { el.results.hidden = false; }
			if ( el.ctaWrap ) { el.ctaWrap.hidden = false; }

			if ( el.heroV ) { el.heroV.textContent = money( dTotal ); }
			if ( el.heroSub ) {
				el.heroSub.textContent = 'Year one ' + money( dY1 ) + ', year two ' + money( dY2 ) + ', year three ' + money( dY3 ) + '.';
			}
			if ( el.gapV ) { el.gapV.textContent = money( dGap ); }
			if ( el.gapSub ) {
				el.gapSub.textContent = 'A flat three-year subscription would be ' + money( dNaive ) + '. Implementation, internal costs and renewal escalation add ' + money( dGap ) + '.';
			}
			if ( el.gapPct ) {
				if ( dGapPct !== null && dGap !== 0 ) {
					el.gapPct.hidden = false;
					el.gapPct.textContent = dGapPct.toFixed( 1 ) + '% higher than a flat three-year subscription';
				} else {
					el.gapPct.hidden = true;
				}
			}

			var bars = [ { n: 1, v: dY1 }, { n: 2, v: dY2 }, { n: 3, v: dY3 } ];
			if ( el.bars ) {
				el.bars.innerHTML = '';
				bars.forEach( function ( b ) {
					var bar = document.createElement( 'div' );
					bar.className = 'cc-bar';
					bar.setAttribute( 'aria-hidden', 'true' );
					var val = document.createElement( 'span' );
					val.className = 'cc-bar-val';
					val.textContent = money( b.v );
					var fill = document.createElement( 'div' );
					fill.className = 'cc-bar-fill';
					fill.style.height = ( b.v / maxV * 100 ) + '%';
					var lbl = document.createElement( 'span' );
					lbl.className = 'cc-bar-lbl';
					lbl.textContent = 'Year ' + b.n;
					bar.appendChild( val );
					bar.appendChild( fill );
					bar.appendChild( lbl );
					el.bars.appendChild( bar );
				} );
			}
			if ( el.barsSr ) {
				el.barsSr.innerHTML = '';
				bars.forEach( function ( b ) {
					var li = document.createElement( 'li' );
					li.textContent = 'Year ' + b.n + ': ' + money( b.v );
					el.barsSr.appendChild( li );
				} );
			}

			if ( el.insightText ) { el.insightText.textContent = insight; }

			root.dataset.ccResult = JSON.stringify( { quote: quote, impl: impl, ratePct: state.ratePct, internal: internal, total: dTotal, gap: dGap, insight: insight } );
		}

		el.quote.addEventListener( 'input', function ( e ) {
			e.target.value = cleanCur( e.target.value );
			render();
		} );
		el.impl.addEventListener( 'input', function ( e ) {
			e.target.value = cleanCur( e.target.value );
			render();
		} );
		if ( el.internal ) {
			el.internal.addEventListener( 'input', function ( e ) {
				e.target.value = cleanCur( e.target.value );
				render();
			} );
		}

		el.scenBtns.forEach( function ( btn, i ) {
			btn.addEventListener( 'click', function () {
				state.scenario = i;
				setRate( btn.getAttribute( 'data-pct' ), false );
				render();
			} );
		} );

		el.slider.addEventListener( 'input', function ( e ) {
			setRate( e.target.value, true );
			render();
		} );
		el.rateNum.addEventListener( 'input', function ( e ) {
			setRate( e.target.value, true );
			render();
		} );

		if ( el.addInternalBtn && el.internalField ) {
			el.addInternalBtn.addEventListener( 'click', function () {
				var expanded = el.addInternalBtn.getAttribute( 'aria-expanded' ) === 'true';
				el.addInternalBtn.setAttribute( 'aria-expanded', expanded ? 'false' : 'true' );
				el.internalField.style.display = expanded ? 'none' : '';
				if ( ! expanded && el.internal ) {
					el.internal.focus();
				}
			} );
		}

		var ctaBtn = root.querySelector( '#cc-cta-wrap .art-cta-btn2' );
		if ( ctaBtn ) {
			ctaBtn.addEventListener( 'click', function () {
				try {
					if ( root.dataset.ccResult ) {
						sessionStorage.setItem( 'cc_quote', root.dataset.ccResult );
					}
				} catch ( err ) {
					/* sessionStorage may be unavailable; the calculator still works without it */
				}
			} );
		}

		render();
	}

	if ( 'loading' === document.readyState ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
})();

/**
 * COMPARISON TABLE SORT (Article-CompareTable.php).
 *
 * Independent IIFE. Vanilla-JS port of article-2.jsx's ComparisonTable sort logic: click a column
 * header to sort ascending, click again to reverse. Field usability / sentiment / pricing sort by
 * their fixed rank order (weak<moderate<strong, etc.), same as the source's FIELD_RANK/SENT_RANK/
 * PRICE_RANK maps; every other column sorts alphabetically on its own cell text.
 */
(function () {
	'use strict';

	var FIELD_RANK = { weak: 1, moderate: 2, strong: 3 };
	var SENT_RANK = { negative: 1, limited: 2, mixed: 3, concerns: 4, positive: 5 };
	var PRICE_RANK = { undisclosed: 1, quote: 2, published: 3 };

	function valueFor( row, key ) {
		if ( 'field-usability' === key ) {
			return FIELD_RANK[ row.dataset.field ] || 0;
		}
		if ( 'sentiment' === key ) {
			return SENT_RANK[ row.dataset.sentiment ] || 0;
		}
		if ( 'pricing' === key ) {
			return PRICE_RANK[ row.dataset.priceState ] || 0;
		}
		return row.dataset[ key ] || '';
	}

	function initTable( wrap ) {
		var body = wrap.querySelector( '.art-cmp2-body' );
		var buttons = Array.prototype.slice.call( wrap.querySelectorAll( '.art-cmp2-sortbtn' ) );
		if ( ! body || ! buttons.length ) {
			return;
		}

		var state = { key: null, dir: 1 };

		function sortBy( key ) {
			state.dir = state.key === key ? state.dir * -1 : 1;
			state.key = key;

			var rows = Array.prototype.slice.call( body.querySelectorAll( '.art-cmp2-row' ) );
			rows.sort( function ( a, b ) {
				var va = valueFor( a, key ), vb = valueFor( b, key );
				if ( va < vb ) { return -1 * state.dir; }
				if ( va > vb ) { return 1 * state.dir; }
				return 0;
			} );
			rows.forEach( function ( row ) { body.appendChild( row ); } );

			buttons.forEach( function ( btn ) {
				var on = btn.getAttribute( 'data-sort-key' ) === key;
				var ico = btn.querySelector( '.art-sort-ico' );
				if ( ! ico ) { return; }
				ico.classList.toggle( 'is-on', on );
				ico.classList.toggle( 'is-desc', on && state.dir === -1 );
			} );
		}

		buttons.forEach( function ( btn ) {
			btn.addEventListener( 'click', function () {
				sortBy( btn.getAttribute( 'data-sort-key' ) );
			} );
		} );
	}

	function init() {
		Array.prototype.slice.call( document.querySelectorAll( '.art-compare-wrap' ) ).forEach( initTable );
	}

	if ( 'loading' === document.readyState ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
})();

/**
 * TOOL EVAL TABS (Article-ToolEvalTabs.php).
 *
 * Independent IIFE. Vanilla-JS port of article-3.jsx's ToolEvalTabs: one `.art-aeval` panel
 * visible per `.art-etabs` group at a time, switched by its tab strip button. Panels stay in the
 * DOM (server-rendered with the `hidden` attribute) rather than being added/removed, so the
 * sidebar TOC's per-tool sub-heading ids are always valid scroll targets — see the
 * "TOC HIDDEN PANEL REVEAL" block below for what makes clicking one of those actually work.
 */
(function () {
	'use strict';

	function initGroup( group ) {
		var buttons = Array.prototype.slice.call( group.querySelectorAll( '[data-etab-target]' ) );
		var panels = Array.prototype.slice.call( group.querySelectorAll( '[data-etab-panel-id]' ) );
		if ( ! buttons.length || ! panels.length ) {
			return;
		}

		function activate( target ) {
			panels.forEach( function ( panel ) {
				panel.hidden = panel.getAttribute( 'data-etab-panel-id' ) !== target;
			} );
			buttons.forEach( function ( btn ) {
				var on = btn.getAttribute( 'data-etab-target' ) === target;
				btn.classList.toggle( 'is-active', on );
				btn.setAttribute( 'aria-selected', on ? 'true' : 'false' );
			} );
		}

		buttons.forEach( function ( btn ) {
			btn.addEventListener( 'click', function () {
				activate( btn.getAttribute( 'data-etab-target' ) );
			} );
		} );
	}

	function init() {
		Array.prototype.slice.call( document.querySelectorAll( '.art-etabs' ) ).forEach( initGroup );
	}

	if ( 'loading' === document.readyState ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
})();

/**
 * TOC HIDDEN PANEL REVEAL.
 *
 * Independent IIFE, decoupled from the TOC click handler at the top of this file (never edits
 * it) — registers its own capture-phase listener on the same `.art-toc-link` elements, which
 * fires before the TOC's own bubbling listener regardless of script order. If a TOC link points
 * into a tool-eval panel that is currently hidden behind a different active tab, this activates
 * the right tab first, so the TOC's own scroll-position math (computed right after, in its own
 * listener) measures a panel that is actually laid out and visible. Without this, clicking a TOC
 * link to a non-active tool would silently do nothing (the source's own behaviour — React only
 * mounts the active panel) or, worse here since panels stay in the DOM `hidden`, scroll to a
 * collapsed, invisible element.
 */
(function () {
	'use strict';

	function revealIfHidden( id ) {
		var el = document.getElementById( id );
		if ( ! el ) {
			return;
		}
		var panel = el.closest( '[data-etab-panel-id]' );
		if ( ! panel || ! panel.hasAttribute( 'hidden' ) ) {
			return;
		}
		var group = panel.closest( '.art-etabs' );
		if ( ! group ) {
			return;
		}
		var btn = group.querySelector( '[data-etab-target="' + panel.getAttribute( 'data-etab-panel-id' ) + '"]' );
		if ( btn ) {
			btn.click();
		}
	}

	document.addEventListener(
		'click',
		function ( e ) {
			var link = e.target.closest && e.target.closest( '.art-toc-link' );
			if ( ! link ) {
				return;
			}
			var id = ( link.getAttribute( 'href' ) || '' ).replace( /^#/, '' );
			if ( id ) {
				revealIfHidden( id );
			}
		},
		true
	);
})();
