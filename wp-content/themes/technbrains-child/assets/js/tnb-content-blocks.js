/**
 * TnB Content Blocks — front + admin script (one file, two self-guarded IIFEs).
 *
 *  1) Lead-magnet modal (front-end): runs when window.tnbCB is present.
 *  2) Editor shortcode box (wp-admin): runs when jQuery + acf + window.tnbCBAdmin
 *     are present.
 *
 * The same file is enqueued via two handles (front dependency-free; admin with
 * jquery + acf-input). Each IIFE returns early in the wrong context, so loading
 * it where the other belongs is a harmless no-op.
 *
 * @package technbrains-child
 */

/* ---------------------------------------------------------------------------
 * 1) Front-end: lead-magnet email gate. Vanilla, no dependencies.
 * ------------------------------------------------------------------------ */
(function () {
	'use strict';

	if (typeof window.tnbCB === 'undefined') {
		return;
	}

	var cfg = window.tnbCB;
	var i18n = cfg.i18n || {};
	var modal = null;
	var lastFocused = null;
	var pendingFile = '';
	var pendingPost = '';

	function t(key, fallback) {
		return i18n[key] || fallback;
	}

	// Debug logging — off by default. Enable by localizing tnbCB.debug = true.
	function log() {
		if (!cfg || !cfg.debug) {
			return;
		}
		try {
			console.log.apply(console, ['[tnb-lead-magnet]'].concat([].slice.call(arguments)));
		} catch (e) {}
	}

	function buildModal() {
		var overlay = document.createElement('div');
		overlay.className = 'tnb-cb-modal';
		overlay.setAttribute('hidden', '');
		overlay.setAttribute('role', 'dialog');
		overlay.setAttribute('aria-modal', 'true');
		overlay.setAttribute('aria-labelledby', 'tnb-cb-modal-title');

		var box = document.createElement('div');
		box.className = 'tnb-cb-modal__box';

		var title = document.createElement('p');
		title.className = 'tnb-cb-modal__title';
		title.id = 'tnb-cb-modal-title';
		title.textContent = t('title', 'Get your download');

		var form = document.createElement('form');
		form.className = 'tnb-cb-modal__form';
		form.noValidate = true;

		var label = document.createElement('label');
		label.className = 'tnb-cb-modal__label';
		label.setAttribute('for', 'tnb-cb-email');
		label.textContent = t('emailLabel', 'Email address');

		var input = document.createElement('input');
		input.className = 'tnb-cb-modal__input';
		input.id = 'tnb-cb-email';
		input.type = 'email';
		input.name = 'email';
		input.required = true;
		input.autocomplete = 'email';
		input.placeholder = t('placeholder', 'you@example.com');

		var error = document.createElement('p');
		error.className = 'tnb-cb-modal__error';
		error.setAttribute('hidden', '');
		error.setAttribute('role', 'alert');

		// Honeypot — same field name the theme's tnb_check_honeypot() reads.
		var honeypot = document.createElement('input');
		honeypot.type = 'text';
		honeypot.name = 'hp_field_verify';
		honeypot.tabIndex = -1;
		honeypot.autocomplete = 'off';
		honeypot.setAttribute('aria-hidden', 'true');
		honeypot.style.cssText = 'position:absolute;left:-9999px;width:0;height:0;overflow:hidden;';

		var actions = document.createElement('div');
		actions.className = 'tnb-cb-modal__actions';

		// Corner close (×), top-right of the modal box.
		var closeBtn = document.createElement('button');
		closeBtn.type = 'button';
		closeBtn.className = 'tnb-cb-modal__close';
		closeBtn.setAttribute('aria-label', t('close', 'Close'));
		closeBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 384 512" aria-hidden="true" focusable="false"><path fill="currentColor" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3l105.4 105.3c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256l105.3-105.4z"></path></svg>';

		var submitBtn = document.createElement('button');
		submitBtn.type = 'submit';
		submitBtn.className = 'tnb-cb-btn tnb-cb-modal__submit';
		submitBtn.textContent = t('submit', 'Get the download');

		actions.appendChild(submitBtn);

		form.appendChild(label);
		form.appendChild(input);
		form.appendChild(honeypot);
		form.appendChild(error);
		form.appendChild(actions);

		box.appendChild(closeBtn);
		box.appendChild(title);
		box.appendChild(form);
		overlay.appendChild(box);
		document.body.appendChild(overlay);

		// Events.
		closeBtn.addEventListener('click', closeModal);
		overlay.addEventListener('click', function (e) {
			if (e.target === overlay) {
				closeModal();
			}
		});
		form.addEventListener('submit', onSubmit);

		modal = {
			overlay: overlay,
			box: box,
			form: form,
			input: input,
			honeypot: honeypot,
			error: error,
			submit: submitBtn
		};
		return modal;
	}

	function getModal() {
		return modal || buildModal();
	}

	function showError(msg) {
		var m = getModal();
		m.error.textContent = msg;
		m.error.removeAttribute('hidden');
	}

	function clearError() {
		var m = getModal();
		m.error.textContent = '';
		m.error.setAttribute('hidden', '');
	}

	function openModal(file, post, heading) {
		log('1. open modal — file:', file);
		pendingFile = file;
		pendingPost = post || '';
		lastFocused = document.activeElement;

		var m = getModal();
		if (heading) {
			m.box.querySelector('.tnb-cb-modal__title').textContent = heading;
		}
		clearError();
		m.input.value = '';
		m.honeypot.value = '';
		m.submit.disabled = false;
		m.submit.textContent = t('submit', 'Get the download');
		m.overlay.removeAttribute('hidden');
		document.addEventListener('keydown', onKeydown);
		m.input.focus();
	}

	function closeModal() {
		if (!modal) {
			return;
		}
		modal.overlay.setAttribute('hidden', '');
		document.removeEventListener('keydown', onKeydown);
		if (lastFocused && typeof lastFocused.focus === 'function') {
			lastFocused.focus();
		}
	}

	function onKeydown(e) {
		if (e.key === 'Escape') {
			closeModal();
			return;
		}
		if (e.key === 'Tab' && modal) {
			// Simple focus trap between the input and the two buttons.
			var focusable = modal.overlay.querySelectorAll(
				'input, button, [href], [tabindex]:not([tabindex="-1"])'
			);
			if (!focusable.length) {
				return;
			}
			var first = focusable[0];
			var last = focusable[focusable.length - 1];
			if (e.shiftKey && document.activeElement === first) {
				e.preventDefault();
				last.focus();
			} else if (!e.shiftKey && document.activeElement === last) {
				e.preventDefault();
				first.focus();
			}
		}
	}

	function startDownload(url) {
		var a = document.createElement('a');
		a.href = url;
		a.setAttribute('download', '');
		a.rel = 'nofollow';
		document.body.appendChild(a);
		a.click();
		document.body.removeChild(a);
	}

	function resetSubmit(m) {
		m.submit.disabled = false;
		m.submit.textContent = t('submit', 'Get the download');
	}

	function onSubmit(e) {
		e.preventDefault();
		var m = getModal();
		var email = m.input.value.trim();
		log('2. submit — email:', email, '| file:', pendingFile);

		// Lightweight client check; server re-validates authoritatively.
		if (!email || email.indexOf('@') < 1 || email.indexOf('.') < 0) {
			log('2a. invalid email — abort');
			showError(t('invalid', 'Please enter a valid email address.'));
			m.input.focus();
			return;
		}

		clearError();
		m.submit.disabled = true;
		m.submit.textContent = t('sending', 'Sending…');

		// SwiftSales CRM — client-side, same as the other forms. Fire-and-forget.
		// Payload mirrors the other forms (FirstName + Country) — an email-only
		// body returns 400 from the SwiftSales integration endpoint.
		if (typeof swiftSalesSDK !== 'undefined' && typeof swiftSalesSDK.CreateContact === 'function') {
			var ssName = (email.split('@')[0] || 'Subscriber').trim();
			var ssData = {
				FirstName: ssName,
				Email:     email,
				Country:   'United States',
				Phone:     '',
				Notes:     'Lead magnet: ' + pendingFile,
				Meta:      { Path: window.location.href }
			};
			log('3. SwiftSales CreateContact →', ssData);
			try {
				swiftSalesSDK.CreateContact(ssData, function (cb, err) {
					if (err) { log('3b. SwiftSales error:', err); console.error('SwiftSales error:', err); }
					else { log('3a. SwiftSales OK', cb); }
				});
			} catch (e) { log('3c. SwiftSales threw:', e); }
		} else {
			log('3. SwiftSales SDK not available — skipped');
		}

		var body = new URLSearchParams();
		body.append('action', cfg.action || 'tnb_leadmagnet_submit');
		body.append('nonce', cfg.nonce || '');
		body.append('email', email);
		body.append('file', pendingFile);
		body.append('hp_field_verify', m.honeypot.value || '');

		log('4. POST', cfg.ajaxUrl, '| action:', cfg.action);
		fetch(cfg.ajaxUrl, {
			method: 'POST',
			credentials: 'same-origin',
			headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
			body: body.toString()
		})
			.then(function (res) {
				log('5. response status:', res.status);
				return res.json().catch(function () {
					return { success: false };
				});
			})
			.then(function (data) {
				log('6. response json:', data);
				if (data && data.success) {
					// Preferred: redirect to the thank-you page (it auto-downloads).
					if (data.data && data.data.redirect) {
						log('7. success → redirect:', data.data.redirect);
						window.location.href = data.data.redirect;
						return;
					}
					// Fallback: inline download if no redirect returned.
					var file = (data.data && data.data.file) ? data.data.file : pendingFile;
					log('7. success → download (fallback):', file);
					closeModal();
					if (file) {
						startDownload(file);
					}
				} else {
					var msgs = data && data.data && data.data.messages;
					var msg = (msgs && msgs.length) ? msgs.join(' ')
						: ((data && data.data && data.data.message) ? data.data.message
						: t('error', 'Something went wrong. Please try again.'));
					log('7. error →', msg);
					showError(msg);
					resetSubmit(m);
				}
			})
			.catch(function (err) {
				log('7. fetch failed:', err);
				showError(t('error', 'Something went wrong. Please try again.'));
				resetSubmit(m);
			});
	}

	// Delegated trigger.
	document.addEventListener('click', function (e) {
		var btn = e.target.closest ? e.target.closest('[data-tnb-file]') : null;
		if (!btn) {
			return;
		}
		e.preventDefault();
		openModal(
			btn.getAttribute('data-tnb-file'),
			btn.getAttribute('data-tnb-post'),
			btn.getAttribute('data-tnb-heading')
		);
	});
})();

/* ---------------------------------------------------------------------------
 * 1b) Thank-you page: auto-download the gated file (server-validated).
 *     Runs only when window.tnbCBDownload.file is localized on /thank-you.
 * ------------------------------------------------------------------------ */
(function () {
	'use strict';

	if (typeof window.tnbCBDownload === 'undefined' || !window.tnbCBDownload.file) {
		return;
	}

	var url = window.tnbCBDownload.file;

	function go() {
		try {
			var a = document.createElement('a');
			a.href = url;
			a.setAttribute('download', '');
			a.rel = 'nofollow';
			document.body.appendChild(a);
			a.click();
			document.body.removeChild(a);
		} catch (e) {}

		// Clean the ?tnb_dl=… off the URL so a refresh won't re-download.
		try {
			if (window.history && window.history.replaceState) {
				window.history.replaceState(null, '', window.location.pathname + window.location.hash);
			}
		} catch (e) {}
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', go);
	} else {
		go();
	}
})();

/* ---------------------------------------------------------------------------
 * 2) wp-admin: per-row copyable shortcode box. Needs jQuery + ACF.
 * ------------------------------------------------------------------------ */
(function ($) {
	'use strict';

	// Bail on the front end (no jQuery dependency forced there) or without ACF.
	if (!$ || typeof acf === 'undefined' || typeof window.tnbCBAdmin === 'undefined') {
		return;
	}

	var SC_KEY = 'field_tnb_shortcode_ref';
	var copyLabel = window.tnbCBAdmin.copy || 'Copy';
	var copiedLabel = window.tnbCBAdmin.copied || 'Copied!';
	var postId = window.tnbCBAdmin.postId || 0;

	function shortcodeFor(index) {
		// Page id + position, fully dynamic. post_id makes it render correctly
		// even when pasted on another page.
		return '[tnb_blocks post_id="' + postId + '" index="' + index + '"]';
	}

	function refresh() {
		// One shortcode-ref field exists per top-level block row. Selecting the
		// fields directly (and skipping ACF's hidden clone template) gives us the
		// rows in document = saved order without matching nested repeater rows.
		var $fields = $('.acf-field[data-key="' + SC_KEY + '"]').filter(function () {
			return $(this).closest('.acf-clone').length === 0;
		});

		$fields.each(function (index) {
			var $input = $(this).find('.acf-input').first();
			if (!$input.length) {
				return;
			}

			var $field = $input.find('.tnb-sc-input');
			if (!$field.length) {
				$input.html(
					'<div class="tnb-sc-wrap">' +
						'<input type="text" class="tnb-sc-input" readonly />' +
						'<button type="button" class="button tnb-sc-copy">' + copyLabel + '</button>' +
					'</div>'
				);
				$field = $input.find('.tnb-sc-input');
			}
			$field.val(shortcodeFor(index));
		});
	}

	// Copy handler.
	$(document).on('click', '.tnb-sc-copy', function () {
		var $btn = $(this);
		var $input = $btn.siblings('.tnb-sc-input');
		if (!$input.length) {
			return;
		}
		$input[0].focus();
		$input[0].select();
		$input[0].setSelectionRange(0, 99999);

		var done = function () {
			var original = $btn.text();
			$btn.text(copiedLabel);
			setTimeout(function () {
				$btn.text(original);
			}, 1200);
		};

		if (navigator.clipboard && navigator.clipboard.writeText) {
			navigator.clipboard.writeText($input.val()).then(done, function () {
				try { document.execCommand('copy'); done(); } catch (e) {}
			});
		} else {
			try { document.execCommand('copy'); done(); } catch (e) {}
		}
	});

	// Recalculate on the ACF lifecycle events that change row order/count.
	function scheduleRefresh() {
		setTimeout(refresh, 60);
	}
	acf.addAction('ready', scheduleRefresh);
	acf.addAction('append', scheduleRefresh);
	acf.addAction('remove', scheduleRefresh);
	acf.addAction('sortstop', scheduleRefresh);
})(window.jQuery);
