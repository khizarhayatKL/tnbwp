/**
 * TechnBrains — Inner page form handlers
 * Handles: Hire Banner, Engagement Banner, SDD Banner
 * Matches Next.js flow: honeypot → validate → reCAPTCHA → SwiftSales → AJAX → redirect
 */
(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {
    if (typeof tnbAjax === 'undefined') return;
    
    function tnbGeoIpLookup(callback) {
      if (!window._tnbCountryPromise) {
        window._tnbCountryPromise = fetch('https://api.ipdata.co/?api-key=' + ((window.tnbAjax && tnbAjax.ipdataKey) || '9f7971df30fbd476f189d359ad4b22c4b1caf52409f0bc9653b7e262'))
          .then(function(r) { return r.json(); })
          .then(function(d) { return d.country_code ? d.country_code.toLowerCase() : 'us'; })
          .catch(function() { return 'us'; });
      }
      window._tnbCountryPromise.then(callback).catch(function() { callback('us'); });
    }

    function tnbCheckRecaptcha(form) {
      var widget = form.querySelector('.g-recaptcha, [data-recaptcha-missing]');
      if (!widget) return true;
      if (widget.getAttribute('data-recaptcha-missing') === '1') return false;
      var f = form.querySelector('[name="g-recaptcha-response"]');
      return f ? f.value.length > 0 : false;
    }

    function isValidEmail(val) {
      return /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(String(val));
    }

    function showMsg(el, text, type) {
      if (!el) return;
      el.textContent = text;
      el.className   = text ? 'inner-form-msg' + (type ? ' ' + type : '') : 'inner-form-msg';
    }

    function setFieldError(fieldEl, msg) {
      var wrapper = fieldEl.closest ? fieldEl.closest('.inputField, .sdf-field') : fieldEl.parentElement;
      if (!wrapper) wrapper = fieldEl.parentElement;
      var err = wrapper.querySelector('.tnb-field-error');
      if (!err) {
        err = document.createElement('p');
        err.className = 'tnb-field-error';
        wrapper.appendChild(err);
      }
      err.textContent = msg;
    }

    function clearFieldErrors(form) {
      var errs = form.querySelectorAll('.tnb-field-error');
      for (var i = 0; i < errs.length; i++) {
        errs[i].textContent = '';
      }
    }

    function setupInnerForm(config) {
      var form  = document.getElementById(config.formId);
      var msgEl = document.getElementById(config.msgId);
      if (!form) return;

      var phoneInput = form.querySelector('[name="cnumber"]');
      var phoneIti   = null;

      function tryInitIti() {
        if (!phoneInput) return;
        if (typeof intlTelInput === 'undefined') {
          setTimeout(tryInitIti, 100);
          return;
        }
        phoneIti = intlTelInput(phoneInput, {
          initialCountry: 'auto',
          geoIpLookup: tnbGeoIpLookup,
          separateDialCode: false,
        });
         var _prevCode = '';
        phoneInput.addEventListener('countrychange', function () {
          var code = phoneIti.getSelectedCountryData().dialCode || '';
          if (!code) return;
          var val = phoneInput.value;
          var raw = val.replace(/\D/g, '');
          var loc = (_prevCode && raw.indexOf(_prevCode) === 0) ? raw.slice(_prevCode.length) : raw;
          if (!val || val === '+' || loc.length === 0) {
            phoneInput.value = '+' + code;
          }
          _prevCode = code;
        });
		 // ITI v17 bug: sets aria-activedescendant on closed combobox (invalid ARIA)
        var itiWrap = phoneInput.closest ? phoneInput.closest('.iti') : null;
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

      form.addEventListener('submit', function (e) {
        e.preventDefault();

        // Honeypot check — matches logodesignvalley behavior
        var hpField = form.querySelector('[name="hp_field_verify"]');
        if (hpField && hpField.value) {
          showMsg(msgEl, 'Submission blocked. Please reload the page and try again.', 'error');
          return;
        }

        var nameEl    = form.querySelector('[name="firstName"]');
        var emailEl   = form.querySelector('[name="cemail"]');
        var phoneEl   = form.querySelector('[name="cnumber"]');
        var messageEl = form.querySelector('[name="message"]');
        var submitBtn = form.querySelector('[type="submit"]');
        var originalBtnText = submitBtn ? submitBtn.textContent : '';

        clearFieldErrors(form);
        showMsg(msgEl, '', '');

        var hasErrors = false;
        if (!nameEl  || !nameEl.value.trim())                        { setFieldError(nameEl,  'Full name is required.');        hasErrors = true; }
        if (!emailEl || !isValidEmail(emailEl.value.trim()))          { setFieldError(emailEl, 'Valid email is required.');      hasErrors = true; }
        // if (phoneEl) { var _iDc = phoneIti ? String(phoneIti.getSelectedCountryData().dialCode || '') : ''; var _iDig = phoneEl.value.replace(/\D/g,''); var _iLoc = (_iDc && _iDig.indexOf(_iDc) === 0) ? _iDig.slice(_iDc.length) : _iDig; if (_iLoc.length > 0 && _iLoc.length < 7) { setFieldError(phoneEl, 'Valid phone number is required.'); hasErrors = true; } }
        if (phoneEl && phoneIti) { var _iDc = String(phoneIti.getSelectedCountryData().dialCode || ''); var _iDig = phoneEl.value.replace(/\D/g,''); var _iLoc = (_iDc && _iDig.indexOf(_iDc) === 0) ? _iDig.slice(_iDc.length) : _iDig; if (_iLoc.length > 0 && _iLoc.length < 7) { setFieldError(phoneEl, 'Valid phone number is required.'); hasErrors = true; } }

        if (hasErrors) return;

        if (!tnbCheckRecaptcha(form)) {
          showMsg(msgEl, 'Please complete the reCAPTCHA verification.', 'error');
          return;
        }

        if (submitBtn) { submitBtn.disabled = true; submitBtn.textContent = 'Sending...'; }

		var _ifDc   = phoneIti ? String(phoneIti.getSelectedCountryData().dialCode || '') : '';
        var _ifDig  = phoneEl ? phoneEl.value.replace(/\D/g, '') : '';
        var _ifLoc  = (_ifDc && _ifDig.indexOf(_ifDc) === 0) ? _ifDig.slice(_ifDc.length) : _ifDig;
       var ifPhone = (_ifLoc.length > 0 && _ifDc) ? ('+' + _ifDc + _ifLoc) : '';


        // SwiftSales SDK — matches Next.js Hire/Banner and EngagementModel/Banner payloads
        if (typeof swiftSalesSDK !== 'undefined' && typeof swiftSalesSDK.CreateContact === 'function') {
          var country = phoneIti ? (phoneIti.getSelectedCountryData().name || 'United States') : 'United States';
          var meta    = { Path: window.location.href };

          if (config.hasTimeline) {
            var tlEl = form.querySelector('[name="projectTimeline"]');
            if (tlEl && tlEl.options[tlEl.selectedIndex]) {
              meta['Project timeline'] = tlEl.options[tlEl.selectedIndex].text;
            }
          }

          swiftSalesSDK.CreateContact({
            FirstName: nameEl.value.trim(),
            Email:     emailEl.value.trim(),
            Country:   country,
            // Phone:     phoneEl.value.trim(),
			      Phone:     ifPhone,
            Notes:     messageEl ? messageEl.value.trim() : '',
            Meta:      meta,
          }, function (cb, err) {
            if (err) console.error('SwiftSales error:', err);
          });
        }

        var fd = new FormData(form);
		 fd.set('cnumber', ifPhone);
        fd.append('action', config.action);

        fetch(tnbAjax.url, { method: 'POST', credentials: 'same-origin', body: fd })
          .then(function (r) { return r.json(); })
          .then(function (res) {
            if (res.success && res.data && res.data.redirect) {
              window.location.href = res.data.redirect;
            } else if (res.success && res.data && res.data.bot) {
              showMsg(msgEl, 'Submission blocked. Please reload the page and try again.', 'error');
              if (submitBtn) { submitBtn.disabled = false; submitBtn.textContent = originalBtnText; }
            } else {
              var msg = (res.data && res.data.messages) ? res.data.messages.join(' ') : 'Submission failed. Please try again.';
              showMsg(msgEl, msg, 'error');
              if (submitBtn) { submitBtn.disabled = false; submitBtn.textContent = originalBtnText; }
            }
          })
          .catch(function () {
            showMsg(msgEl, 'Network error. Please try again.', 'error');
            if (submitBtn) { submitBtn.disabled = false; submitBtn.textContent = originalBtnText; }
          });
      });
    }

    setupInnerForm({
      formId:      'tnb-hire-banner-form',
      action:      'tnb_hire_banner_form',
      msgId:       'tnb-hire-banner-msg',
      hasTimeline: true,
    });

    setupInnerForm({
      formId:      'tnb-engagement-banner-form',
      action:      'tnb_engagement_banner_form',
      msgId:       'tnb-engagement-banner-msg',
      hasTimeline: true,
    });

    setupInnerForm({
      formId:      'tnb-sdd-form',
      action:      'tnb_sdd_form',
      msgId:       'tnb-sdd-form-msg',
      hasTimeline: false,
    });
  });
})();
