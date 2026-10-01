/**
 * Lazy-loads Google reCAPTCHA v2, and renders only the ONE widget in the form
 * a visitor actually touches — not every .g-recaptcha on the page.
 *
 * PERF-5: api.js was enqueued on every page, and Google's implicit rendering
 * scans the whole DOM on load and renders EVERY .g-recaptcha it finds — 2-3
 * forms per page (header CTA, footer, popup, exit-popup) meant ~350KB /
 * 9 requests / 6 iframes before any interaction, on blog posts and case
 * studies too. Now: zero reCAPTCHA requests on load; api.js is injected once
 * on the first focusin/click/touchstart/submit inside a form that has a
 * widget, with render=explicit so nothing auto-renders; grecaptcha.render()
 * is called per element, only for the form that was interacted with. Other
 * forms' widgets render when (if) they are touched in turn.
 *
 * Submission is unchanged: render() creates the standard g-recaptcha-response
 * field inside the widget, so the existing per-form JS checks and the
 * server-side tnb_require_recaptcha() keep working as before. A submit that
 * somehow arrives before any interaction (autofill + Enter) just renders the
 * widget; the form's own handler then blocks with "complete the reCAPTCHA".
 *
 * The same first-interaction trigger also pulls in the two form-only
 * third parties, SwiftSales (chat/CRM) and the HubSpot tracking script
 * (PERF-6c) — both defined as window.tnbLoad* in functions.php's
 * #swift-sales-loader inline script — so a visitor who never touches a
 * form loads none of the three.
 *
 * File is deliberately not named "recaptcha-*" so it doesn't show up when
 * DevTools Network is filtered to "recaptcha" while checking for 0 requests.
 */
(function () {
	'use strict';

	var scriptRequested = false;
	var apiReady = false;
	var pending = [];

	function renderWidget(el) {
		if (!el || el.dataset.tnbRendered) return;
		el.dataset.tnbRendered = '1';
		window.grecaptcha.render(el, {
			sitekey: el.getAttribute('data-sitekey'),
			theme: el.getAttribute('data-theme') || 'light'
		});
	}

	window.tnbRecaptchaInit = function () {
		apiReady = true;
		var toRender = pending;
		pending = [];
		toRender.forEach(renderWidget);
	};

	function requestWidget(el) {
		if (!el || el.dataset.tnbRendered) return;

		if (apiReady) {
			renderWidget(el);
			return;
		}

		if (pending.indexOf(el) === -1) pending.push(el);

		if (!scriptRequested) {
			scriptRequested = true;

			var s = document.createElement('script');
			s.src = 'https://www.google.com/recaptcha/api.js?onload=tnbRecaptchaInit&render=explicit';
			s.async = true;
			s.defer = true;
			document.head.appendChild(s);

			// Pull SwiftSales + HubSpot in on the same trigger — visitor is already
			// engaging a form; neither is needed by anyone who never touches one.
			if (window.tnbLoadSwiftSales) window.tnbLoadSwiftSales();
			if (window.tnbLoadHubSpot) window.tnbLoadHubSpot();
		}
	}

	function onFormInteraction(e) {
		var form = e.target && e.target.closest && e.target.closest('form');
		if (!form) return;
		var widget = form.querySelector('.g-recaptcha');
		if (widget) requestWidget(widget);
	}

	// Listeners stay attached for the life of the page — each form's widget
	// needs its own render call, whenever that particular form gets touched.
	document.addEventListener('focusin', onFormInteraction);
	document.addEventListener('click', onFormInteraction);
	document.addEventListener('touchstart', onFormInteraction, { passive: true });
	// Capture phase: runs before the form's own submit handler, so the widget
	// exists by the time that handler looks for g-recaptcha-response.
	document.addEventListener('submit', onFormInteraction, true);

	// Popup / exit-popup open: popup.js reveals the overlay by removing its
	// [hidden] attribute and focuses the first focusable element — which is a
	// hidden nonce input or the close button, not a form field, so focusin
	// never reaches the form. Watch for [hidden] being removed instead and
	// render the widget of any recaptcha form inside the revealed element, so
	// the checkbox is already there when the modal appears.
	if (window.MutationObserver) {
		new MutationObserver(function (mutations) {
			for (var i = 0; i < mutations.length; i++) {
				var t = mutations[i].target;
				if (t.hasAttribute('hidden')) continue;
				var widget = t.querySelector && t.querySelector('form .g-recaptcha');
				if (widget) requestWidget(widget);
			}
		}).observe(document.body, { attributes: true, attributeFilter: ['hidden'], subtree: true });
	}
})();
