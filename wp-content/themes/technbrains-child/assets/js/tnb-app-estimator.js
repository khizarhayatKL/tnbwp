/**
 * TnB App Development Cost Estimator — front-end script.
 *
 * Self-gating IIFE: runs only when window.tnbAEST is localized (i.e. the
 * shortcode is on the page). The calculator logic is unchanged from the
 * delivered component; only the modal submit path is wired to the theme's
 * shared AJAX lead pipeline (nonce + honeypot → admin email → tnb_lead CPT),
 * replacing the original mailto fallback.
 *
 * @package technbrains-child
 */
(function () {
	'use strict';

	if (typeof window.tnbAEST === 'undefined') {
		return;
	}

	var cfg = window.tnbAEST;
	var root = document.getElementById('tbEst');
	if (!root) {
		return;
	}

	var summaryText = '';
	var TIERS = {
		simple: { lo: 15000, hi: 50000, time: '6 to 12 weeks', label: 'simple / MVP' },
		medium: { lo: 50000, hi: 120000, time: '4 to 7 months', label: 'medium-complexity' },
		complex: { lo: 120000, hi: 300000, time: '7 to 12+ months', label: 'complex' }
	};
	// Platform modifiers are directional adjustments, not hard source figures.
	var PLAT = {
		cross: { m: 1.0, label: 'cross-platform' },
		one: { m: 1.0, label: 'a single platform' },
		both: { m: 1.25, label: 'both platforms natively' }
	};

	function money(n) {
		n = Math.round(n / 1000) * 1000;
		return '$' + n.toLocaleString('en-US');
	}

	function calc() {
		var tierKey = root.querySelector('input[name="tier"]:checked').value;
		var platKey = root.querySelector('input[name="plat"]:checked').value;
		var tier = TIERS[tierKey], plat = PLAT[platKey];

		var lo = tier.lo * plat.m;
		var hi = tier.hi * plat.m;

		var featNames = [], scoped = [];
		root.querySelectorAll('.tb-feat input[type="checkbox"]').forEach(function (cb) {
			if (!cb.checked) return;
			var name = cb.parentElement.querySelector('.tb-feat__n').textContent;
			if (cb.dataset.scoped) { scoped.push(name); return; }
			lo += parseInt(cb.dataset.lo, 10);
			hi += parseInt(cb.dataset.hi, 10);
			featNames.push(name.toLowerCase());
		});

		// maintenance = 15-20% of midpoint per year
		var mid = (lo + hi) / 2;
		var mLo = mid * 0.15, mHi = mid * 0.20;

		// render numbers
		root.querySelector('#tbLo').textContent = money(lo);
		root.querySelector('#tbHi').textContent = (tierKey === 'complex' ? money(hi) + '+' : money(hi));
		root.querySelector('#tbTime').textContent = tier.time;
		root.querySelector('#tbMaint').textContent = money(mLo) + '–' + money(mHi);

		// scoped note
		var sc = root.querySelector('#tbScoped');
		if (scoped.length) {
			sc.classList.add('on');
			sc.textContent = 'Your build includes features we scope per project (' + scoped.join(', ').toLowerCase() + '). Expect the final quote to sit toward or above the upper range.';
		} else {
			sc.classList.remove('on'); sc.textContent = '';
		}

		// verbalized summary (readable by crawlers + screen readers)
		var featText = featNames.length ? (' with ' + featNames.join(', ')) : '';
		var hiText = (tierKey === 'complex' ? money(hi) + ' or more' : money(hi));
		root.querySelector('#tbSummary').innerHTML =
			'A <b>' + tier.label + ' app</b> built for <b>' + plat.label + '</b>' + featText +
			' is estimated at <b>' + money(lo) + ' to ' + hiText + '</b>, typically over ' + tier.time +
			', plus about ' + money(mLo) + ' to ' + money(mHi) + ' per year to maintain.';
		summaryText = 'A ' + tier.label + ' app built for ' + plat.label + featText +
			' is estimated at ' + money(lo) + ' to ' + hiText + ', typically over ' + tier.time +
			', plus about ' + money(mLo) + ' to ' + money(mHi) + ' per year to maintain.' +
			(scoped.length ? ' Also includes scoped features: ' + scoped.join(', ').toLowerCase() + '.' : '');
	}

	root.querySelectorAll('input').forEach(function (el) {
		el.addEventListener('change', calc);
	});

	/* ---- CTA -> shared "Start Your Project" popup, prefilled with the estimate ----
	 * The estimator no longer has its own modal. The CTA (#tbOpen) carries the
	 * .tnb-popup-trigger class, so popup.js opens #tnb-popup-overlay on click.
	 * Here we only fill that popup's Project details field (#popup-message) with
	 * the current on-page estimate, refreshed each open unless the user edited it. */
	var openBtn = document.getElementById('tbOpen');
	var lastAutoDetails = '';   // last value we auto-injected, to detect user edits
	if (openBtn) {
		openBtn.addEventListener('click', function () {
			var msg = document.getElementById('popup-message');
			if (!msg) return;
			var summaryEl = root.querySelector('#tbSummary');
			var current = (summaryEl && summaryEl.textContent.trim()) ? summaryEl.textContent.trim() : summaryText;
			if (!current) return;
			if (!msg.value.trim() || msg.value === lastAutoDetails) {
				lastAutoDetails = current;
				msg.value = current;
			}
		});
	}

	/* ---- mobile step wizard (phones only) ---- */
	(function () {
		var inEl = root.querySelector('.tb-in');
		var nav = root.querySelector('.tb-wiz-nav');
		if (!inEl || !nav) return;
		var steps = Array.prototype.slice.call(inEl.querySelectorAll('.tb-step'));
		if (!steps.length) return;
		var prevBtn = nav.querySelector('.tb-wiz-prev');
		var nextBtn = nav.querySelector('.tb-wiz-next');
		var status = nav.querySelector('.tb-wiz-status');
		var mq = window.matchMedia('(max-width:767px)');
		var idx = 0;

		function render() {
			steps.forEach(function (s, i) { s.classList.toggle('is-active', i === idx); });
			if (status) { status.textContent = 'Step ' + (idx + 1) + ' of ' + steps.length; }
			if (prevBtn) { prevBtn.hidden = (idx === 0); }
			if (nextBtn) { nextBtn.hidden = (idx === steps.length - 1); }
		}
		function enable() {
			inEl.classList.add('tb-wiz-on');
			if (idx > steps.length - 1) { idx = 0; }
			render();
		}
		function disable() {
			inEl.classList.remove('tb-wiz-on');
			steps.forEach(function (s) { s.classList.remove('is-active'); });
		}
		function go(delta) {
			var next = idx + delta;
			if (next < 0 || next > steps.length - 1) return;
			idx = next;
			render();
			root.scrollIntoView({ block: 'start', behavior: 'smooth' });
		}
		if (prevBtn) { prevBtn.addEventListener('click', function () { go(-1); }); }
		if (nextBtn) { nextBtn.addEventListener('click', function () { go(1); }); }

		function apply() { if (mq.matches) { enable(); } else { disable(); } }
		if (mq.addEventListener) { mq.addEventListener('change', apply); }
		else if (mq.addListener) { mq.addListener(apply); }
		apply();
	})();

	/* ---- laptop accordion (1200–1599px): questions as FAQ accordions ---- */
	(function () {
		var inEl = root.querySelector('.tb-in');
		if (!inEl) return;
		var steps = Array.prototype.slice.call(inEl.querySelectorAll('.tb-step'));
		if (!steps.length) return;
		var heads = steps.map(function (s) { return s.querySelector('.tb-step__q'); });
		var mq = window.matchMedia('(min-width:1200px) and (max-width:1599px)');
		var bound = false;

		function open(i) {
			steps.forEach(function (s, j) { s.classList.toggle('is-open', j === i); });
		}
		function toggle(step) {
			if (step.classList.contains('is-open')) { step.classList.remove('is-open'); }
			else { open(steps.indexOf(step)); }   // single-open FAQ behaviour
		}
		function onHead(e) { toggle(e.currentTarget.parentElement); }
		function onKey(e) {
			if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); toggle(e.currentTarget.parentElement); }
		}
		function bind() {
			if (bound) return;
			heads.forEach(function (h) {
				if (!h) return;
				h.addEventListener('click', onHead);
				h.addEventListener('keydown', onKey);
				h.setAttribute('role', 'button');
				h.setAttribute('tabindex', '0');
			});
			bound = true;
		}
		function enable() { inEl.classList.add('tb-acc-on'); bind(); open(0); }
		function disable() {
			inEl.classList.remove('tb-acc-on');
			steps.forEach(function (s) { s.classList.remove('is-open'); });
		}
		function apply() { if (mq.matches) { enable(); } else { disable(); } }
		if (mq.addEventListener) { mq.addEventListener('change', apply); }
		else if (mq.addListener) { mq.addListener(apply); }
		apply();
	})();

	calc();
})();
