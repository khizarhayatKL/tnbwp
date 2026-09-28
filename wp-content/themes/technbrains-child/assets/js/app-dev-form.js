(function () {
	document.addEventListener('DOMContentLoaded', function () {
		if (typeof tnbAjax === 'undefined') return;

		var form = document.getElementById('tnb-app-dev-form');
		if (!form) return;

		var phoneEl = document.getElementById('adf-phone');
		var iti     = null;

		/* ── format helpers ──────────────────────────────────── */

		function dialCode() {
			return iti ? (iti.getSelectedCountryData().dialCode || '1') : '1';
		}

		function formatLocal(code, localDigits) {
			if (!localDigits) return '+' + code;
			if (code === '1') {
				var d = localDigits.slice(0, 10);
				if (d.length <= 3)  return '+1 (' + d;
				if (d.length <= 6)  return '+1 (' + d.slice(0, 3) + ') ' + d.slice(3);
				return '+1 (' + d.slice(0, 3) + ') ' + d.slice(3, 6) + '-' + d.slice(6, 10);
			}
			return '+' + code + ' ' + localDigits;
		}

		function applyFormat() {
			var code = dialCode();
			var val  = phoneEl.value;
			if (!val.startsWith('+' + code)) return;
			var localDigits = val.replace(/\D/g, '').slice(code.length);
			if (!localDigits) return;
			phoneEl.value = formatLocal(code, localDigits.slice(0, 15));
		}

		/* ── Geo-IP lookup (shared cache) ───────────────────────── */

		function tnbGeoIpLookup(callback) {
			if (!window._tnbCountryPromise) {
				window._tnbCountryPromise = fetch('https://api.ipdata.co/?api-key=' + ((window.tnbAjax && tnbAjax.ipdataKey) || '9f7971df30fbd476f189d359ad4b22c4b1caf52409f0bc9653b7e262'))
					.then(function(r) { return r.json(); })
					.then(function(d) { return d.country_code ? d.country_code.toLowerCase() : 'us'; })
					.catch(function() { return 'us'; });
			}
			window._tnbCountryPromise.then(callback).catch(function() { callback('us'); });
		}

		/* ── intl-tel-input init ──────────────────────────────── */

		function tryInitIti() {
			if (!phoneEl) return;
			if (typeof intlTelInput === 'undefined') { setTimeout(tryInitIti, 100); return; }
			iti = intlTelInput(phoneEl, {
				initialCountry: 'auto',
				geoIpLookup: tnbGeoIpLookup,
				separateDialCode: false,
			});
			phoneEl.addEventListener('countrychange', function () {
				var code = iti.getSelectedCountryData().dialCode;
				if (!phoneEl.value || phoneEl.value === '+') phoneEl.value = '+' + code;
			});
			phoneEl.addEventListener('blur', applyFormat);
			// ITI v17 bug: sets aria-activedescendant on closed combobox (invalid ARIA)
			var itiWrap = phoneEl.closest ? phoneEl.closest('.iti') : null;
			var flagBtn = itiWrap ? itiWrap.querySelector('.iti__selected-flag') : null;
			if (flagBtn) {
				var _origSetAttr = flagBtn.setAttribute;
				flagBtn.setAttribute = function(name, value) {
					if (name === 'aria-activedescendant' && this.getAttribute('aria-expanded') !== 'true') {
						return;
					}
					return _origSetAttr.call(this, name, value);
				};
				flagBtn.removeAttribute('aria-activedescendant');
				new MutationObserver(function() {
					if (flagBtn.getAttribute('aria-expanded') !== 'true') {
						flagBtn.removeAttribute('aria-activedescendant');
					}
				}).observe(flagBtn, { attributes: true, attributeFilter: ['aria-expanded', 'aria-activedescendant'] });
			}
		}
		tryInitIti();

		/* ── validation helpers ──────────────────────────────── */

		function setError(el, msg) {
			el.classList.add('tnb-invalid');
			var field    = el.closest('.adf-field');
			var existing = field.querySelector('.adf-field-error');
			if (existing) existing.remove();
			var span = document.createElement('span');
			span.className   = 'adf-field-error';
			span.textContent = msg;
			field.appendChild(span);
		}

		function clearErrors() {
			form.querySelectorAll('.tnb-invalid').forEach(function (el) { el.classList.remove('tnb-invalid'); });
			form.querySelectorAll('.adf-field-error').forEach(function (el) { el.remove(); });
		}

		/* ── submit ──────────────────────────────────────────── */

		form.addEventListener('submit', function (e) {
			e.preventDefault();
			clearErrors();

			var hpField = form.querySelector('[name="hp_field_verify"]');
			if (hpField && hpField.value) {
				var hpErrEl = form.querySelector('.tnb-hp-error');
				if (!hpErrEl) {
					hpErrEl = document.createElement('p');
					hpErrEl.className = 'tnb-hp-error adf-field-error';
					form.appendChild(hpErrEl);
				}
				hpErrEl.textContent = 'Submission blocked. Please reload the page and try again.';
				return;
			}

			var nameEl    = form.querySelector('[name="firstName"]');
			var emailEl   = form.querySelector('[name="cemail"]');
			var messageEl = form.querySelector('[name="message"]');
			var valid     = true;

			if (!nameEl.value.trim()) {
				setError(nameEl, 'Full Name is required');
				valid = false;
			}

			var emailVal = emailEl.value.trim();
			if (!emailVal || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal)) {
				setError(emailEl, 'Email Address is required');
				valid = false;
			}

			var code        = dialCode();
			var allDigits   = phoneEl.value.replace(/\D/g, '');
			var localDigits = allDigits.indexOf(code) === 0 ? allDigits.slice(code.length) : allDigits;
			// var phoneVal    = '+' + code + localDigits;
			var phoneVal    = localDigits.length > 0 ? ('+' + code + localDigits) : '';

			if (localDigits.length > 0 && localDigits.length < 7) {
				setError(phoneEl, 'Enter a valid phone number');
				valid = false;
			}

			// reCAPTCHA v2
			var recaptchaEl = form.querySelector('[name="g-recaptcha-response"]');
			if (!recaptchaEl || !recaptchaEl.value) {
				var recaptchaWrapper = form.querySelector('.g-recaptcha');
				if (recaptchaWrapper) {
					var existing = recaptchaWrapper.parentNode.querySelector('.adf-field-error');
					if (!existing) {
						var rcErr = document.createElement('span');
						rcErr.className   = 'adf-field-error';
						rcErr.textContent = 'Please complete the reCAPTCHA';
						recaptchaWrapper.parentNode.appendChild(rcErr);
					}
				}
				valid = false;
			}

			if (!valid) return;

			var btn         = form.querySelector('[type="submit"]');
			var originalTxt = btn.textContent;
			btn.disabled    = true;
			btn.textContent = 'Sending…';

			// Swift Sales — client-side SDK call (matches Next.js AppDevForm payload)
			if (typeof swiftSalesSDK !== 'undefined' && typeof swiftSalesSDK.CreateContact === 'function') {
				swiftSalesSDK.CreateContact({
					FirstName: nameEl.value.trim(),
					Email:     emailVal,
					Country:   iti ? (iti.getSelectedCountryData().name || 'United States') : 'United States',
					Phone:     phoneVal,
					Notes:     messageEl.value.trim(),
					Meta: {
						Path: window.location.href,
					},
				}, function (cb, err) {
					if (err) { console.error('SwiftSales error:', err); }
				});
			}

			var fd = new FormData();
			fd.append('action',              'tnb_app_dev_form');
			fd.append('nonce',               tnbAjax.appDevNonce);
			fd.append('firstName',           nameEl.value.trim());
			fd.append('cemail',              emailVal);
			fd.append('cnumber',             phoneVal);
			fd.append('country',             iti ? (iti.getSelectedCountryData().name || 'United States') : 'United States');
			fd.append('message',             messageEl.value.trim());
			fd.append('g-recaptcha-response', recaptchaEl.value);

			fetch(tnbAjax.url, { method: 'POST', body: fd })
				.then(function (r) { return r.json(); })
				.then(function (data) {
					if (data.success && data.data && data.data.redirect) {
						window.location.href = data.data.redirect;
					} else {
						btn.disabled    = false;
						btn.textContent = originalTxt;
					}
				})
				.catch(function () {
					btn.disabled    = false;
					btn.textContent = originalTxt;
				});
		});
	});
})();