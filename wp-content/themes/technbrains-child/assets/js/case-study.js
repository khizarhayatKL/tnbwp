/**
 * Case Study — scroll reveal, narrative thread, solution tabs.
 *
 * Ported from the QA-approved reference (tnb-claude-v2 case study pages). The reference
 * ships ten <script> blocks; only three behaviours are live on those pages:
 *
 *   - reveal-on-scroll for .cs-reveal
 *   - the narrative thread SVG that links the .cs-node markers
 *   - the solution capability tabs (#cs-solx2)
 *
 * Not ported, and why:
 *   - the hero count-up targets .cs-count, which no case study page contains
 *   - script 2 targets #cs-prob-stepper, which no case study page contains
 *   - script 3 targets #tslider, which no case study page contains
 *   - scripts 6-10 are the React/Babel tweaks-panel design harness (dev tooling). Its
 *     runtime output was measured and baked into case-study.css instead.
 *
 * Two defects in the reference are fixed here rather than reproduced:
 *   - the tab handler was pasted twice, so every click and hover ran go() twice
 *   - the thread builder dereferenced #narrative without a null check, throwing on any
 *     page that lacks it and taking the reveals down with it
 *
 * Vanilla, no jQuery, loaded in the footer. Logic and timings are otherwise unchanged
 * from the reference: reveal at 92% of viewport height, focus line at 62%, 150 ms resize
 * debounce, 400 ms and 1400 ms safety passes.
 *
 * Known gap, left alone on purpose: the reference gives the tab buttons role="tab" inside
 * role="tablist" but never sets aria-selected, and the panels have no role="tabpanel". That
 * is an incomplete ARIA tab pattern. Completing it is a behaviour change to an approved
 * design, so it is flagged rather than applied — it has no visual effect and can be added
 * in one line once agreed.
 */
(function () {
	'use strict';

	var reveals = Array.prototype.slice.call(document.querySelectorAll('.cs-reveal'));

	/* ---------- scroll reveal (observer-free; reliable everywhere) ---------- */
	function revealInView() {
		var vh = window.innerHeight;
		for (var i = 0; i < reveals.length; i++) {
			var el = reveals[i];
			if (el.classList.contains('in')) {
				continue;
			}
			var r = el.getBoundingClientRect();
			if (r.top < vh * 0.92 && r.bottom > -80) {
				el.classList.add('in');
			}
		}
	}

	window.addEventListener('load', revealInView);
	document.addEventListener('DOMContentLoaded', revealInView);
	revealInView();

	// Never leave content hidden, even where scroll or rAF are throttled — a background
	// tab, a slow device, or a reduced-motion setting that suppresses the transition.
	setTimeout(function () {
		reveals.forEach(function (el) {
			el.style.transition = 'none';
			el.classList.add('in');
		});
	}, 1400);

	/* ---------- narrative thread ---------- */
	// The reference read these unguarded. Everything below is optional: a case study with
	// no narrative wrapper still gets its reveals.
	var narr = document.getElementById('narrative');
	var svg = document.getElementById('thread-svg');
	var path = document.getElementById('thread-path');

	if (narr && svg && path) {
		var nodes = Array.prototype.slice.call(narr.querySelectorAll('.cs-node'));
		var endEl = document.getElementById('thread-end');
		var len = 0;
		var nodeY = [];
		var resizeTimer = null;

		function clamp(v, a, b) {
			return v < a ? a : (v > b ? b : v);
		}

		function update() {
			revealInView();
			var nr = narr.getBoundingClientRect();
			var focus = window.innerHeight * 0.62;
			var prog = clamp((focus - nr.top) / nr.height, 0, 1);
			path.style.strokeDashoffset = (len * (1 - prog)).toFixed(1);
			nodes.forEach(function (n, i) {
				if (nr.top + nodeY[i] <= focus + 6) {
					n.classList.add('lit');
				} else {
					n.classList.remove('lit');
				}
			});
		}

		function build() {
			var W = narr.offsetWidth;
			var H = narr.offsetHeight;
			var nr = narr.getBoundingClientRect();

			svg.setAttribute('viewBox', '0 0 ' + W + ' ' + H);
			svg.setAttribute('width', W);
			svg.setAttribute('height', H);

			var pts = nodes.map(function (n) {
				var r = n.getBoundingClientRect();
				return {
					x: r.left - nr.left + r.width / 2,
					y: r.top - nr.top + r.height / 2
				};
			});

			// Terminal point: into the CTA email input, left-of-centre.
			if (endEl) {
				var er = endEl.getBoundingClientRect();
				pts.push({
					x: er.left - nr.left + 24,
					y: er.top - nr.top + er.height / 2
				});
			}

			if (!pts.length) {
				return;
			}

			nodeY = pts.map(function (p) {
				return p.y;
			});

			var d = 'M ' + pts[0].x.toFixed(1) + ' ' + pts[0].y.toFixed(1);
			for (var i = 1; i < pts.length; i++) {
				var p0 = pts[i - 1];
				var p1 = pts[i];
				var dy = p1.y - p0.y;
				var c1y = p0.y + dy * 0.45;
				var c2y = p1.y - dy * 0.45;
				d += ' C ' + p0.x.toFixed(1) + ' ' + c1y.toFixed(1) + ', ' +
					p1.x.toFixed(1) + ' ' + c2y.toFixed(1) + ', ' +
					p1.x.toFixed(1) + ' ' + p1.y.toFixed(1);
			}

			path.setAttribute('d', d);
			len = path.getTotalLength();
			path.style.strokeDasharray = len;
			update();
		}

		window.addEventListener('scroll', function () {
			revealInView();
			update();
		}, { passive: true });

		window.addEventListener('resize', function () {
			clearTimeout(resizeTimer);
			resizeTimer = setTimeout(build, 150);
		});

		window.addEventListener('load', function () {
			build();
			revealInView();
		});

		// Build now, then again once metrics settle — web fonts land after first paint and
		// shift every node position.
		build();
		setTimeout(build, 400);
		if (document.fonts && document.fonts.ready) {
			document.fonts.ready.then(build);
		}
	}

	/* ---------- solution capability tabs ---------- */
	var solx = document.getElementById('cs-solx2');
	if (solx) {
		var tabs = Array.prototype.slice.call(solx.querySelectorAll('.cs-solx2-tab'));
		var panels = Array.prototype.slice.call(solx.querySelectorAll('.cs-solx2-panel'));

		// aria-selected and tabindex move with the active tab so assistive technology reports
		// the same state the class does, and only the active tab is a tab stop — the roving
		// tabindex the ARIA tabs pattern expects.
		var go = function (i, focus) {
			tabs.forEach(function (t, j) {
				var on = j === i;
				t.classList.toggle('is-active', on);
				t.setAttribute('aria-selected', on ? 'true' : 'false');
				t.setAttribute('tabindex', on ? '0' : '-1');
			});
			panels.forEach(function (p, j) {
				p.classList.toggle('is-active', j === i);
			});
			if (focus && tabs[i]) {
				tabs[i].focus();
			}
		};

		tabs.forEach(function (t) {
			var i = +t.dataset.i;
			t.addEventListener('click', function () {
				go(i);
			});
			// Hover-to-switch is part of the approved interaction. It does not move focus.
			t.addEventListener('mouseenter', function () {
				go(i);
			});
			t.addEventListener('keydown', function (e) {
				var last = tabs.length - 1;
				var next = null;
				if (e.key === 'ArrowDown' || e.key === 'ArrowRight') {
					next = i === last ? 0 : i + 1;
				} else if (e.key === 'ArrowUp' || e.key === 'ArrowLeft') {
					next = i === 0 ? last : i - 1;
				} else if (e.key === 'Home') {
					next = 0;
				} else if (e.key === 'End') {
					next = last;
				}
				if (next !== null) {
					e.preventDefault();
					go(next, true);
				}
			});
		});
	}

	/* ---------- CTA: request the full case study PDF ---------- */
	// The reference left this form inert (onsubmit="return false"). Same flow as the theme's
	// other forms — honeypot -> validate -> reCAPTCHA -> AJAX -> redirect — but email-only,
	// so assets/js/inner-forms.js does not fit: it requires a name and phone field.
	var csForm = document.getElementById('tnb-case-study-form');
	if (csForm && typeof tnbAjax !== 'undefined') {
		var csMsg = document.getElementById('tnb-case-study-form-msg');

		var csShow = function (text, type) {
			if (!csMsg) return;
			csMsg.textContent = text;
			csMsg.className = 'inner-form-msg cs-cta-msg' + (text && type ? ' ' + type : '');
		};

		csForm.addEventListener('submit', function (e) {
			e.preventDefault();

			var hp = csForm.querySelector('[name="hp_field_verify"]');
			if (hp && hp.value) {
				csShow('Submission blocked. Please reload the page and try again.', 'error');
				return;
			}

			var emailEl = csForm.querySelector('[name="cemail"]');
			var btn = csForm.querySelector('[type="submit"]');
			var btnText = btn ? btn.textContent : '';
			var email = emailEl ? emailEl.value.trim() : '';

			csShow('', '');

			if (!/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(email)) {
				csShow('Please enter a valid email address.', 'error');
				if (emailEl) emailEl.focus();
				return;
			}

			var widget = csForm.querySelector('.g-recaptcha, [data-recaptcha-missing]');
			if (widget) {
				if (widget.getAttribute('data-recaptcha-missing') === '1') {
					csShow('Verification is unavailable right now. Please try again later.', 'error');
					return;
				}
				var token = csForm.querySelector('[name="g-recaptcha-response"]');
				if (!token || !token.value.length) {
					csShow('Please complete the reCAPTCHA verification.', 'error');
					return;
				}
			}

			if (btn) {
				btn.disabled = true;
				btn.textContent = 'Sending...';
			}

			var reset = function () {
				if (btn) {
					btn.disabled = false;
					btn.textContent = btnText;
				}
			};

			var fd = new FormData(csForm);
			fd.append('action', 'tnb_case_study_form');

			fetch(tnbAjax.url, { method: 'POST', credentials: 'same-origin', body: fd })
				.then(function (r) { return r.json(); })
				.then(function (res) {
					if (res.success && res.data && res.data.redirect) {
						window.location.href = res.data.redirect;
						return;
					}
					if (res.success && res.data && res.data.bot) {
						csShow('Submission blocked. Please reload the page and try again.', 'error');
					} else {
						csShow(
							(res.data && res.data.messages)
								? res.data.messages.join(' ')
								: 'Submission failed. Please try again.',
							'error'
						);
					}
					reset();
				})
				.catch(function () {
					csShow('Network error. Please try again.', 'error');
					reset();
				});
		});
	}
})();
