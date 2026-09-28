/**
 * TechnBrains — Popup modal, service cards, review slider, footer form AJAX
 */
(function () {
  'use strict';

  // ── Centralized reCAPTCHA v2 frontend enforcement ──────────────────────────
  // Checks all forms on the page — blocks submit if reCAPTCHA not completed.
  // Works automatically for any form containing a .g-recaptcha widget.
  function tnbCheckRecaptcha(form) {
    var widget = form.querySelector('.g-recaptcha, [data-recaptcha-missing]');
    if (!widget) return true; // no widget on this form — skip (should not happen)

    // Missing key indicator — output by tnb_recaptcha_field() when key not set
    if (widget.getAttribute('data-recaptcha-missing') === '1') {
      return false; // block: misconfigured
    }

    // Check completed response
    var responseField = form.querySelector('[name="g-recaptcha-response"]');
    var token = responseField ? responseField.value : '';
    return token.length > 0;
  }

  function tnbRecaptchaError(form, msgFn) {
    msgFn('Please complete the reCAPTCHA verification.', 'error');
    // Scroll widget into view
    var widget = form.querySelector('.g-recaptcha');
    if (widget) { widget.scrollIntoView({ behavior: 'smooth', block: 'center' }); }
  }

  document.addEventListener('DOMContentLoaded', function () {

    // ── Popup open/close ────────────────────────────────────────────────────
    var popup     = document.getElementById('tnb-popup-overlay');
    var closeBtns = popup ? popup.querySelectorAll('[data-popup-close]') : [];
    var lastTrigger = null;

    function openPopup() {
      if (!popup) return;
      popup.removeAttribute('hidden');
      popup.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
      var first = popup.querySelector('input, button, textarea, select, a[href]');
      if (first) first.focus();
    }

    function closePopup() {
      if (!popup) return;
      popup.setAttribute('hidden', '');
      popup.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
      if (lastTrigger) lastTrigger.focus();
    }

    // bind all triggers: legacy #tnb-popup-trigger + any .tnb-popup-trigger
    // var triggers = document.querySelectorAll('#tnb-popup-trigger, .tnb-popup-trigger');
    // triggers.forEach(function (t) {
    //   t.addEventListener('click', function () {
    //     lastTrigger = t;
    //     openPopup();
    //   });

    // Event delegation for popup triggers — handles both static elements and
    // dynamically rendered ones (e.g. decision-quiz result buttons).
    document.addEventListener('click', function (e) {
      var t = e.target.closest('#tnb-popup-trigger, .tnb-popup-trigger');
      if (!t) return;
      e.preventDefault();
      lastTrigger = t;
      openPopup();
    });

    closeBtns.forEach(function (btn) {
      btn.addEventListener('click', closePopup);
    });

    if (popup) {
      popup.addEventListener('click', function (e) {
        if (e.target === popup) closePopup();
      });
    }

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && popup && !popup.hasAttribute('hidden')) closePopup();
    });

    // focus trap
    if (popup) {
      popup.addEventListener('keydown', function (e) {
        if (e.key !== 'Tab') return;
        var focusable = popup.querySelectorAll(
          'a[href], button:not([disabled]), input:not([disabled]), textarea:not([disabled]), select:not([disabled]), [tabindex]:not([tabindex="-1"])'
        );
        var first = focusable[0];
        var last  = focusable[focusable.length - 1];
        if (!first) return;
        if (e.shiftKey) {
          if (document.activeElement === first) { e.preventDefault(); last.focus(); }
        } else {
          if (document.activeElement === last)  { e.preventDefault(); first.focus(); }
        }
      });
    }

    // ── Popup review Swiper (matches PopupCta.jsx: speed:800, loop, navigation) ─
    function initPopupSwiper() {
      if (typeof Swiper === 'undefined') {
        setTimeout(initPopupSwiper, 100);
        return;
      }
      var el = document.querySelector('.popup-review-swiper .swiper');
      if (!el || el._swiperInit) return;
      el._swiperInit = true;
      new Swiper(el, {
        slidesPerView: 1,
        speed: 800,
        loop: true,
        spaceBetween: 20,
        navigation: {
          nextEl: el.querySelector('.swiper-button-next'),
          prevEl: el.querySelector('.swiper-button-prev'),
        },
      });
    }
    initPopupSwiper();

    // ── Shared geo-IP lookup (cached) ────────────────────────────────────────
    function tnbGeoIpLookup(callback) {
      if (!window._tnbCountryPromise) {
        window._tnbCountryPromise = fetch('https://api.ipdata.co/?api-key=' + ((window.tnbAjax && tnbAjax.ipdataKey) || '9f7971df30fbd476f189d359ad4b22c4b1caf52409f0bc9653b7e262'))
          .then(function(r) { return r.json(); })
          .then(function(d) { return d.country_code ? d.country_code.toLowerCase() : 'us'; })
          .catch(function() { return 'us'; });
      }
      window._tnbCountryPromise.then(callback).catch(function() { callback('us'); });
    }

    // ── intl-tel-input for popup phone fields ───────────────────────────────
    function initItiField(inputId) {
      var el = document.getElementById(inputId);
      if (!el) return null;
      if (typeof intlTelInput === 'undefined') {
        setTimeout(function() { initItiField(inputId); }, 100);
        return null;
      }
      var iti = intlTelInput(el, {
        initialCountry: 'auto',
        geoIpLookup: tnbGeoIpLookup,
        separateDialCode: false,
      });
      el.addEventListener('countrychange', function() {
        var code = iti.getSelectedCountryData().dialCode;
        if (el.value === '' || el.value === '+') {
          el.value = '+' + code;
        }
      });
		// ITI v17 bug: sets aria-activedescendant on closed combobox (invalid ARIA)
      var itiWrap = el.closest ? el.closest('.iti') : null;
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
      return iti;
    }

    var popupPhoneIti  = initItiField('popup-phone');
    var exitPhoneIti   = initItiField('exit-phone');
    var footerPhoneIti = initItiField('footer-phone');
    var collabPhoneIti = initItiField('collab-phone');

    // Clear per-field errors on input
    [popupForm, document.getElementById('tnb-exit-popup-form')].forEach(function(form) {
      if (!form) return;
      form.querySelectorAll('input, textarea').forEach(function(field) {
        field.addEventListener('input', function() { clearFieldError(field); });
        field.addEventListener('change', function() { clearFieldError(field); });
      });
    });

    // ── Service selection cards ─────────────────────────────────────────────
    var serviceCards   = document.querySelectorAll('#tnb-popup-form .serviceCard');
    var serviceTypeInput = document.getElementById('popup-service-type');

    serviceCards.forEach(function (card) {
      function selectCard() {
        serviceCards.forEach(function (c) {
          c.classList.remove('active');
          c.setAttribute('aria-checked', 'false');
        });
        card.classList.add('active');
        card.setAttribute('aria-checked', 'true');
        if (serviceTypeInput) serviceTypeInput.value = card.getAttribute('data-service') || '';
      }

      card.addEventListener('click', selectCard);
      card.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); selectCard(); }
      });
    });

    // ── Review slider ───────────────────────────────────────────────────────
    var sliders = document.querySelectorAll('[data-slider]');

    sliders.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var sliderId = btn.getAttribute('data-slider');
        var container = document.getElementById(sliderId);
        if (!container) return;

        var reviews = container.querySelectorAll('.singleReview');
        if (!reviews.length) return;

        var current = -1;
        reviews.forEach(function (r, i) { if (r.classList.contains('active')) current = i; });
        if (current === -1) current = 0;

        var isPrev  = btn.classList.contains('slider-prev');
        var next    = isPrev
          ? (current - 1 + reviews.length) % reviews.length
          : (current + 1) % reviews.length;

        reviews[current].classList.remove('active');
        reviews[next].classList.add('active');
      });
    });

    // ── Swift Sales SDK helper ──────────────────────────────────────────────
    // Matches Next.js formApi.js handleSwiftSDKForm payload exactly.
    function callSwiftSalesSDK(data) {
      if (typeof swiftSalesSDK === 'undefined' || typeof swiftSalesSDK.CreateContact !== 'function') return;
      var SSData = {
        FirstName: data.name,
        Email:     data.email,
        Country:   data.country || 'United States',
        Phone:     data.phone,
        Notes:     data.message || '',
        Meta: {
          Path: window.location.href,
        },
      };
      if (data.lastName)  { SSData.LastName        = data.lastName; }
      if (data.service)   { SSData.Meta.Services   = data.service; }
      swiftSalesSDK.CreateContact(SSData, function (cb, err) {
        if (err) console.error('SwiftSales error:', err);
      });
    }

    // ── Per-field validation helpers ────────────────────────────────────────
    function setFieldError(field, msg) {
      if (!field) return;
      var wrap = field.closest('.inputField') || field.parentElement;
      field.classList.add('field-error');
      var existing = wrap.querySelector('.field-error-msg');
      if (!existing) {
        var span = document.createElement('span');
        span.className = 'field-error-msg';
        wrap.appendChild(span);
        existing = span;
      }
      existing.textContent = msg;
    }
    function clearFieldError(field) {
      if (!field) return;
      var wrap = field.closest('.inputField') || field.parentElement;
      field.classList.remove('field-error');
      var existing = wrap.querySelector('.field-error-msg');
      if (existing) existing.textContent = '';
    }
    function clearAllErrors(form) {
      form.querySelectorAll('.field-error').forEach(function(f) { f.classList.remove('field-error'); });
      form.querySelectorAll('.field-error-msg').forEach(function(s) { s.textContent = ''; });
    }
    function validateForm(form) {
      var name  = form.querySelector('[name="firstName"]');
      var email = form.querySelector('[name="cemail"]');
      var phone = form.querySelector('[name="cnumber"]');
      var valid = true;

      clearAllErrors(form);

      if (!name || !name.value.trim()) {
        setFieldError(name, 'Full name is required.');
        valid = false;
      }
      if (!email || !isValidEmail(email.value)) {
        setFieldError(email, 'Valid email address is required.');
        valid = false;
      }
      if (phone) {
        var _pIti = (typeof intlTelInputGlobals !== 'undefined') ? intlTelInputGlobals.getInstance(phone) : null;
        if (_pIti) {
          var _pDc  = String(_pIti.getSelectedCountryData().dialCode || '');
          var _pDig = phone.value.replace(/\D/g, '');
          var _pLoc = (_pDc && _pDig.indexOf(_pDc) === 0) ? _pDig.slice(_pDc.length) : _pDig;
          if (_pLoc.length > 0 && _pLoc.length < 7) {
            setFieldError(phone, 'Valid phone number is required.');
            valid = false;
          }
        }
      }
      return valid;
    }

    // ── Popup form AJAX ─────────────────────────────────────────────────────
    var popupForm    = document.getElementById('tnb-popup-form');
    var popupFormMsg = document.getElementById('tnb-popup-form-msg');

    if (popupForm && typeof tnbAjax !== 'undefined') {
      popupForm.addEventListener('submit', function (e) {
        e.preventDefault();

        if ((popupForm.querySelector('[name="hp_field_verify"]') || {}).value) {
          showPopupMsg('Submission blocked. Please reload the page and try again.', 'error');
          return;
        }

        var submitBtn = popupForm.querySelector('[type="submit"]');
        var name      = popupForm.querySelector('[name="firstName"]');
        var email     = popupForm.querySelector('[name="cemail"]');
        var phone     = popupForm.querySelector('[name="cnumber"]');

        if (!validateForm(popupForm)) { return; }
        if (!tnbCheckRecaptcha(popupForm)) { tnbRecaptchaError(popupForm, showPopupMsg); return; }

        if (submitBtn) { submitBtn.disabled = true; submitBtn.textContent = 'Sending...'; }
        showPopupMsg('', '');

        var _popIti  = (typeof intlTelInputGlobals !== 'undefined' && phone) ? intlTelInputGlobals.getInstance(phone) : null;
        var _popDc   = _popIti ? String(_popIti.getSelectedCountryData().dialCode || '') : '';
        var _popDig  = phone ? phone.value.replace(/\D/g, '') : '';
        var _popLoc  = (_popDc && _popDig.indexOf(_popDc) === 0) ? _popDig.slice(_popDc.length) : _popDig;
        var popPhone = _popLoc.length > 0 ? ('+' + (_popDc || '1') + _popLoc) : '';

        // Swift Sales — client-side SDK call (matches Next.js PopupForm payload)
        callSwiftSalesSDK({
          name:    name.value.trim(),
          email:   email.value.trim(),
          phone:   popPhone,
          message: (popupForm.querySelector('[name="message"]') || {}).value || '',
          service: (popupForm.querySelector('[name="serviceType"]') || {}).value || '',
          country: _popIti ? (_popIti.getSelectedCountryData().name || 'United States') : 'United States',
        });

        var data = new FormData(popupForm);
        data.set('cnumber', popPhone);
        data.append('action', 'tnb_popup_form');

        fetch(tnbAjax.url, {
          method: 'POST',
          credentials: 'same-origin',
          body: data,
        })
          .then(function (res) { return res.json(); })
          .then(function (res) {
            if (res.success && res.data && res.data.redirect) {
				 window.location.href = res.data.redirect;
				
            } else {
              var msgs = (res.data && res.data.messages) ? res.data.messages.join(' ') : 'Submission failed. Please try again.';
              showPopupMsg(msgs, 'error');
              if (submitBtn) { submitBtn.disabled = false; submitBtn.textContent = 'Start Your Project'; }
            }
          })
          .catch(function () {
            showPopupMsg('Network error. Please try again.', 'error');
            if (submitBtn) { submitBtn.disabled = false; submitBtn.textContent = 'Start Your Project'; }
          });
      });
    }

    // ── Footer form AJAX ────────────────────────────────────────────────────
    var footerForm = document.getElementById('tnb-footer-form');
    var footerMsg  = document.getElementById('tnb-footer-form-msg');

    if (footerForm && typeof tnbAjax !== 'undefined') {
      footerForm.addEventListener('submit', function (e) {
        e.preventDefault();

        if ((footerForm.querySelector('[name="hp_field_verify"]') || {}).value) {
          showFooterMsg('Submission blocked. Please reload the page and try again.', 'error');
          return;
        }

        var submitBtn = footerForm.querySelector('[type="submit"]');
        var primaryText = footerForm.querySelector('.primaryText');
        var firstName = footerForm.querySelector('[name="firstName"]');
        var lastName  = footerForm.querySelector('[name="lastName"]');
        var email     = footerForm.querySelector('[name="cemail"]');
        var phone     = footerForm.querySelector('[name="cnumber"]');
        var errors    = [];

        if (!firstName || !firstName.value.trim()) errors.push('First name is required.');
        if (!lastName  || !lastName.value.trim())  errors.push('Last name is required.');
        if (!email     || !isValidEmail(email.value)) errors.push('Valid email is required.');
        if (phone && footerPhoneIti) { var _fDc = String(footerPhoneIti.getSelectedCountryData().dialCode || ''); var _fDig = phone.value.replace(/\D/g,''); var _fLoc = (_fDc && _fDig.indexOf(_fDc) === 0) ? _fDig.slice(_fDc.length) : _fDig; if (_fLoc.length > 0 && _fLoc.length < 7) errors.push('Valid phone number is required.'); }

        if (errors.length) { showFooterMsg(errors.join(' '), 'error'); return; }
        if (!tnbCheckRecaptcha(footerForm)) { tnbRecaptchaError(footerForm, showFooterMsg); return; }

        if (submitBtn) { submitBtn.disabled = true; }
        if (primaryText) { primaryText.textContent = 'Sending...'; }
        showFooterMsg('', '');

        var _ftIti  = (typeof intlTelInputGlobals !== 'undefined' && phone) ? intlTelInputGlobals.getInstance(phone) : null;
        var _ftDc   = _ftIti ? String(_ftIti.getSelectedCountryData().dialCode || '') : '';
        var _ftDig  = phone ? phone.value.replace(/\D/g, '') : '';
        var _ftLoc  = (_ftDc && _ftDig.indexOf(_ftDc) === 0) ? _ftDig.slice(_ftDc.length) : _ftDig;
        var ftPhone = _ftLoc.length > 0 ? ('+' + (_ftDc || '1') + _ftLoc) : '';

        // Swift Sales — client-side SDK call (matches Next.js RevampComponents/FooterForm payload)
        callSwiftSalesSDK({
          name:     firstName.value.trim(),
          lastName: lastName.value.trim(),
          email:    email.value.trim(),
          phone:    ftPhone,
          message:  (footerForm.querySelector('[name="message"]') || {}).value || '',
          country:  _ftIti ? (_ftIti.getSelectedCountryData().name || 'United States') : 'United States',
        });

        var data = new FormData(footerForm);
        data.set('cnumber', ftPhone);
        data.append('action', 'tnb_footer_form');
        data.append('nonce',  tnbAjax.nonce);

        fetch(tnbAjax.url, {
          method: 'POST',
          credentials: 'same-origin',
          body: data,
        })
          .then(function (res) { return res.json(); })
          .then(function (res) {
            if (res.success && res.data && res.data.redirect) {
              window.location.href = res.data.redirect;
            } else {
              var msgs = (res.data && res.data.messages) ? res.data.messages.join(' ') : 'Submission failed. Please try again.';
              showFooterMsg(msgs, 'error');
              if (submitBtn) { submitBtn.disabled = false; }
              if (primaryText) { primaryText.textContent = 'Inquire now'; }
            }
          })
          .catch(function () {
            showFooterMsg('Network error. Please try again.', 'error');
            if (submitBtn) { submitBtn.disabled = false; }
            if (primaryText) { primaryText.textContent = 'Inquire now'; }
          });
      });
    }

    // ── Generic scroll sliders ───────────────────────────────────────────────
    document.querySelectorAll('[data-scroll-next],[data-scroll-prev]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var trackId = btn.getAttribute('data-scroll-next') || btn.getAttribute('data-scroll-prev');
        var track   = document.getElementById(trackId);
        if (!track) return;
        var card = track.querySelector('.scroll-card');
        var gap  = parseInt(window.getComputedStyle(track).gap) || 40;
        var w    = card ? card.offsetWidth + gap : 300;
        var dir  = btn.hasAttribute('data-scroll-prev') ? -1 : 1;
        track.scrollBy({ left: dir * w, behavior: 'smooth' });
      });
    });

    // ── Generic tab switcher ─────────────────────────────────────────────────
    function activateTab(trigger) {
      var group   = trigger.getAttribute('data-tab-group');
      var panelId = trigger.getAttribute('data-tab-trigger');
      document.querySelectorAll('[data-tab-group="' + group + '"][data-tab-trigger]').forEach(function (t) {
        t.classList.remove('active');
      });
      document.querySelectorAll('[data-tab-group="' + group + '"][data-tab-panel]').forEach(function (p) {
        p.classList.remove('active');
      });
      trigger.classList.add('active');
      var panel = document.querySelector('[data-tab-group="' + group + '"][data-tab-panel="' + panelId + '"]');
      if (panel) panel.classList.add('active');
    }

    document.querySelectorAll('[data-tab-trigger]').forEach(function (trigger) {
      trigger.addEventListener('click', function () { activateTab(trigger); });
      trigger.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); activateTab(trigger); }
      });
    });

    // ── Helpers ─────────────────────────────────────────────────────────────
    function isValidEmail(val) {
      return /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(val);
    }

    function showPopupMsg(text, type) {
      if (!popupFormMsg) return;
      popupFormMsg.textContent = text;
      popupFormMsg.className   = type;
    }

    function showFooterMsg(text, type) {
      if (!footerMsg) return;
      footerMsg.textContent = text;
      footerMsg.className   = type;
    }

    // ── Exit Popup open/close ───────────────────────────────────────────────
    var exitOverlay = document.getElementById('tnb-exit-popup-overlay');

    function openExitPopup() {
      if (!exitOverlay) return;
      exitOverlay.removeAttribute('hidden');
      exitOverlay.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
      var first = exitOverlay.querySelector('input, button');
      if (first) first.focus();
    }

    function closeExitPopup() {
      if (!exitOverlay) return;
      exitOverlay.setAttribute('hidden', '');
      exitOverlay.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
    }

    if (exitOverlay) {
      var exitCloseBtns = exitOverlay.querySelectorAll('[data-exit-popup-close]');
      exitCloseBtns.forEach(function (btn) { btn.addEventListener('click', closeExitPopup); });

      exitOverlay.addEventListener('click', function (e) {
        if (e.target === exitOverlay) closeExitPopup();
      });

      document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && !exitOverlay.hasAttribute('hidden')) closeExitPopup();
      });
    }

    // ── Exit Intent trigger ─────────────────────────────────────────────────
    // Fires when mouse leaves document from the top edge — same as Next.js
    // Shows once per session via localStorage (key: tnb_exit_popup_shown)
    var exitIntentFired = false;

    document.addEventListener('mouseleave', function (e) {
      if (e.clientY > 0) return;          // only top-edge exits
      if (exitIntentFired) return;
      if (localStorage.getItem('tnb_exit_popup_shown')) return;

      exitIntentFired = true;
      localStorage.setItem('tnb_exit_popup_shown', '1');
      openExitPopup();
    });

    // ── Exit Popup form AJAX ────────────────────────────────────────────────
    var exitForm    = document.getElementById('tnb-exit-popup-form');
    var exitFormMsg = document.getElementById('tnb-exit-popup-form-msg');

    if (exitForm && typeof tnbAjax !== 'undefined') {
      exitForm.addEventListener('submit', function (e) {
        e.preventDefault();

        if ((exitForm.querySelector('[name="hp_field_verify"]') || {}).value) {
          showExitMsg('Submission blocked. Please reload the page and try again.', 'error');
          return;
        }

        var submitBtn = exitForm.querySelector('[type="submit"]');

        if (!validateForm(exitForm)) { return; }
        if (!tnbCheckRecaptcha(exitForm)) { tnbRecaptchaError(exitForm, showExitMsg); return; }

        if (submitBtn) { submitBtn.disabled = true; submitBtn.textContent = 'Sending...'; }
        showExitMsg('', '');

        // Swift Sales — client-side SDK call (matches Next.js NewPopupForm payload)
        var exitNameEl  = exitForm.querySelector('[name="firstName"]');
        var exitEmailEl = exitForm.querySelector('[name="cemail"]');
        var exitPhoneEl = exitForm.querySelector('[name="cnumber"]');
        var _exIti  = (typeof intlTelInputGlobals !== 'undefined' && exitPhoneEl) ? intlTelInputGlobals.getInstance(exitPhoneEl) : null;
        var _exDc   = _exIti ? String(_exIti.getSelectedCountryData().dialCode || '') : '';
        var _exDig  = exitPhoneEl ? exitPhoneEl.value.replace(/\D/g, '') : '';
        var _exLoc  = (_exDc && _exDig.indexOf(_exDc) === 0) ? _exDig.slice(_exDc.length) : _exDig;
        var exPhone = _exLoc.length > 0 ? ('+' + (_exDc || '1') + _exLoc) : '';
        callSwiftSalesSDK({
          name:    exitNameEl  ? exitNameEl.value.trim()  : '',
          email:   exitEmailEl ? exitEmailEl.value.trim() : '',
          phone:   exPhone,
          message: (exitForm.querySelector('[name="message"]') || {}).value || '',
          service: (exitForm.querySelector('[name="serviceType"]') || {}).value || '',
          country: _exIti ? (_exIti.getSelectedCountryData().name || 'United States') : 'United States',
        });

        var data = new FormData(exitForm);
        data.set('cnumber', exPhone);
        data.append('action', 'tnb_exit_popup_form');

        fetch(tnbAjax.url, {
          method: 'POST',
          credentials: 'same-origin',
          body: data,
        })
          .then(function (res) { return res.json(); })
          .then(function (res) {
            if (res.success && res.data && res.data.redirect) {
              window.location.href = res.data.redirect;
            } else {
              var msgs = (res.data && res.data.messages) ? res.data.messages.join(' ') : 'Submission failed. Please try again.';
              showExitMsg(msgs, 'error');
              if (submitBtn) { submitBtn.disabled = false; submitBtn.textContent = 'Start Your Project'; }
            }
          })
          .catch(function () {
            showExitMsg('Network error. Please try again.', 'error');
            if (submitBtn) { submitBtn.disabled = false; submitBtn.textContent = 'Start Your Project'; }
          });
      });
    }

    function showExitMsg(text, type) {
      if (!exitFormMsg) return;
      exitFormMsg.textContent = text;
      exitFormMsg.className   = type;
    }

    // ── Collab section form AJAX ─────────────────────────────────────────────
    var collabForm    = document.getElementById('tnb-collab-form');
    var collabFormMsg = document.getElementById('tnb-collab-form-msg');

    if (collabForm && typeof tnbAjax !== 'undefined') {
      collabForm.addEventListener('submit', function (e) {
        e.preventDefault();

        if ((collabForm.querySelector('[name="hp_field_verify"]') || {}).value) {
          showCollabMsg('Submission blocked. Please reload the page and try again.', 'error');
          return;
        }

        var submitBtn = collabForm.querySelector('[type="submit"]');
        var nameEl    = collabForm.querySelector('[name="firstName"]');
        var emailEl   = collabForm.querySelector('[name="cemail"]');
        var phoneEl   = collabForm.querySelector('[name="cnumber"]');
        var errors    = [];

        if (!nameEl  || !nameEl.value.trim())          errors.push('Full name is required.');
        if (!emailEl || !isValidEmail(emailEl.value))  errors.push('Valid email is required.');
        if (phoneEl && collabPhoneIti) { var _cDc = String(collabPhoneIti.getSelectedCountryData().dialCode || ''); var _cDig = phoneEl.value.replace(/\D/g,''); var _cLoc = (_cDc && _cDig.indexOf(_cDc) === 0) ? _cDig.slice(_cDc.length) : _cDig; if (_cLoc.length > 0 && _cLoc.length < 7) errors.push('Valid phone number is required.'); }

        if (errors.length) { showCollabMsg(errors.join(' '), 'error'); return; }
        if (!tnbCheckRecaptcha(collabForm)) { tnbRecaptchaError(collabForm, showCollabMsg); return; }

        if (submitBtn) { submitBtn.disabled = true; submitBtn.textContent = 'Sending...'; }
        showCollabMsg('', '');

        var _clIti  = (typeof intlTelInputGlobals !== 'undefined' && phoneEl) ? intlTelInputGlobals.getInstance(phoneEl) : null;
        var _clDc   = _clIti ? String(_clIti.getSelectedCountryData().dialCode || '') : '';
        var _clDig  = phoneEl ? phoneEl.value.replace(/\D/g, '') : '';
        var _clLoc  = (_clDc && _clDig.indexOf(_clDc) === 0) ? _clDig.slice(_clDc.length) : _clDig;
        var clPhone = _clLoc.length > 0 ? ('+' + (_clDc || '1') + _clLoc) : '';
        callSwiftSalesSDK({
          name:    nameEl.value.trim(),
          email:   emailEl.value.trim(),
          phone:   clPhone,
          message: (collabForm.querySelector('[name="message"]') || {}).value || '',
          service: (collabForm.querySelector('[name="serviceType"]') || {}).value || '',
          country: _clIti ? (_clIti.getSelectedCountryData().name || 'United States') : 'United States',
        });

        var data = new FormData(collabForm);
        data.set('cnumber', clPhone);
        data.append('action', 'tnb_collab_form');

        fetch(tnbAjax.url, {
          method: 'POST',
          credentials: 'same-origin',
          body: data,
        })
          .then(function (res) { return res.json(); })
          .then(function (res) {
            if (res.success && res.data && res.data.redirect) {
              window.location.href = res.data.redirect;
            } else {
              var msgs = (res.data && res.data.messages) ? res.data.messages.join(' ') : 'Submission failed. Please try again.';
              showCollabMsg(msgs, 'error');
              if (submitBtn) { submitBtn.disabled = false; submitBtn.textContent = 'Inquire Now'; }
            }
          })
          .catch(function () {
            showCollabMsg('Network error. Please try again.', 'error');
            if (submitBtn) { submitBtn.disabled = false; submitBtn.textContent = 'Inquire Now'; }
          });
      });
    }

    function showCollabMsg(text, type) {
      if (!collabFormMsg) return;
      collabFormMsg.textContent = text;
      collabFormMsg.className   = type ? 'field-error-msg ' + type : 'field-error-msg';
    }

  });

})();

  // ── Calendar / Schedule popup ──────────────────────────────────────────────
  // Floating icon (and every button that clicks #tnb-calendar-trigger) opens
  // Calendly's official popup widget. Widget assets are lazy-loaded on first
  // click; if the script cannot load, the legacy iframe modal opens instead.
  function initCalendarPopup() {
    var trigger  = document.getElementById('tnb-calendar-trigger');
    var overlay  = document.getElementById('tnb-calendar-overlay');
    var closeBtn = document.getElementById('tnb-calendar-close');
    var iframe   = document.getElementById('tnb-calendar-iframe');

    if (!trigger || !overlay) return;

    var calendlyUrl = iframe && iframe.dataset.src && iframe.dataset.src.indexOf('calendly.com') !== -1
      ? iframe.dataset.src
      : '';

    function loadCalendlyAssets(onReady, onFail) {
      if (window.Calendly) { onReady(); return; }
      if (!document.getElementById('calendly-widget-css')) {
        var link = document.createElement('link');
        link.id   = 'calendly-widget-css';
        link.rel  = 'stylesheet';
        link.href = 'https://assets.calendly.com/assets/external/widget.css';
        document.head.appendChild(link);
      }
      var script = document.getElementById('calendly-widget-js');
      if (!script) {
        script = document.createElement('script');
        script.id    = 'calendly-widget-js';
        script.src   = 'https://assets.calendly.com/assets/external/widget.js';
        script.async = true;
        document.head.appendChild(script);
      }
      script.addEventListener('load', onReady);
      script.addEventListener('error', onFail);
    }

    function openCalendar() {
      if (calendlyUrl) {
        loadCalendlyAssets(function () {
          window.Calendly.initPopupWidget({ url: calendlyUrl });
        }, openFallbackModal);
        return;
      }
      openFallbackModal();
    }

    function openFallbackModal() {
      // Lazy-load iframe src on first open (avoids loading the scheduler on every page load)
      if (iframe && iframe.src !== iframe.dataset.src) {
        iframe.src = iframe.dataset.src;
      }
      overlay.removeAttribute('hidden');
      overlay.setAttribute('aria-hidden', 'false');
      trigger.setAttribute('aria-expanded', 'true');
      document.body.style.overflow = 'hidden';
    }

    function closeCalendar() {
      overlay.setAttribute('hidden', '');
      overlay.setAttribute('aria-hidden', 'true');
      trigger.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
    }

    trigger.addEventListener('click', openCalendar);
    if (closeBtn) closeBtn.addEventListener('click', closeCalendar);

    overlay.addEventListener('click', function(e) {
      if (e.target === overlay || e.target === overlay.querySelector('.tnb-calendar-modal-align')) {
        closeCalendar();
      }
    });

    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && !overlay.hasAttribute('hidden')) closeCalendar();
    });
  }

  initCalendarPopup();
