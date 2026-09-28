(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {
    if (typeof tnbAjax === 'undefined') return;

    var form  = document.getElementById('tnb-contact-form');
    var msgEl = document.getElementById('tnb-contact-form-msg');
    if (!form) return;

    var phoneInput = form.querySelector('[name="cnumber"]');
    var phoneIti   = null;
    
    function tnbGeoIpLookup(callback) {
      if (!window._tnbCountryPromise) {
        window._tnbCountryPromise = fetch('https://api.ipdata.co/?api-key=' + ((window.tnbAjax && tnbAjax.ipdataKey) || '9f7971df30fbd476f189d359ad4b22c4b1caf52409f0bc9653b7e262'))
          .then(function(r) { return r.json(); })
          .then(function(d) { return d.country_code ? d.country_code.toLowerCase() : 'us'; })
          .catch(function() { return 'us'; });
      }
      window._tnbCountryPromise.then(callback).catch(function() { callback('us'); });
    }


    function tryInitIti() {
      if (!phoneInput) return;
      if (typeof intlTelInput === 'undefined') { setTimeout(tryInitIti, 100); return; }
      phoneIti = intlTelInput(phoneInput, {
        initialCountry: 'auto',
        geoIpLookup: tnbGeoIpLookup,
        separateDialCode: false,
      });
      phoneInput.addEventListener('countrychange', function () {
        var code = phoneIti.getSelectedCountryData().dialCode;
        if (!phoneInput.value || phoneInput.value === '+') phoneInput.value = '+' + code;
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

    function isValidEmail(val) {
      return /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(String(val));
    }

    function tnbCheckRecaptcha(frm) {
      var widget = frm.querySelector('.g-recaptcha, [data-recaptcha-missing]');
      if (!widget) return true;
      if (widget.getAttribute('data-recaptcha-missing') === '1') return false;
      var f = frm.querySelector('[name="g-recaptcha-response"]');
      return f ? f.value.length > 0 : false;
    }

    function showMsg(text, type) {
      if (!msgEl) return;
      msgEl.textContent = text;
      msgEl.className   = text ? 'cf-form-msg' + (type ? ' ' + type : '') : 'cf-form-msg';
    }

    function setFieldError(fieldEl, msg) {
      if (!fieldEl) return;
      var wrapper = fieldEl.closest ? fieldEl.closest('.cf-input-field') : fieldEl.parentElement;
      if (!wrapper) wrapper = fieldEl.parentElement;
      var err = wrapper.querySelector('.cf-field-error');
      if (!err) {
        err = document.createElement('p');
        err.className = 'cf-field-error';
        wrapper.appendChild(err);
      }
      err.textContent = msg;
    }

    function clearErrors() {
      form.querySelectorAll('.cf-field-error').forEach(function (el) { el.textContent = ''; });
    }

    form.addEventListener('submit', function (e) {
      e.preventDefault();

      var hpField = form.querySelector('[name="hp_field_verify"]');
      if (hpField && hpField.value) {
        showMsg('Submission blocked. Please reload the page and try again.', 'error');
        return;
      }

      var firstNameEl = form.querySelector('[name="firstName"]');
      var lastNameEl  = form.querySelector('[name="lastName"]');
      var emailEl     = form.querySelector('[name="cemail"]');
      var submitBtn   = form.querySelector('[type="submit"]');

      clearErrors();
      showMsg('', '');

      var hasErrors = false;
      if (!firstNameEl || !firstNameEl.value.trim()) { setFieldError(firstNameEl, 'First name is required.'); hasErrors = true; }
      if (!lastNameEl  || !lastNameEl.value.trim())  { setFieldError(lastNameEl,  'Last name is required.');  hasErrors = true; }
      if (!emailEl     || !isValidEmail(emailEl.value.trim())) { setFieldError(emailEl, 'Valid email is required.'); hasErrors = true; }

    //   if (phoneInput) {
    //     var _dc  = phoneIti ? String(phoneIti.getSelectedCountryData().dialCode || '') : '';
	if (phoneInput && phoneIti) {
        var _dc  = String(phoneIti.getSelectedCountryData().dialCode || '');
        var _dig = phoneInput.value.replace(/\D/g, '');
        var _loc = (_dc && _dig.indexOf(_dc) === 0) ? _dig.slice(_dc.length) : _dig;
        if (_loc.length > 0 && _loc.length < 7) { setFieldError(phoneInput, 'Valid phone number is required.'); hasErrors = true; }
      }

      if (hasErrors) return;

      if (!tnbCheckRecaptcha(form)) {
        showMsg('Please complete the reCAPTCHA verification.', 'error');
        return;
      }

      var country  = phoneIti ? (phoneIti.getSelectedCountryData().name || 'United States') : 'United States';
      var _dc2     = phoneIti ? String(phoneIti.getSelectedCountryData().dialCode || '') : '';
      var _dig2    = phoneInput ? phoneInput.value.replace(/\D/g, '') : '';
      var _loc2    = (_dc2 && _dig2.indexOf(_dc2) === 0) ? _dig2.slice(_dc2.length) : _dig2;
      var phoneVal = _loc2.length > 0 ? ('+' + (_dc2 || '1') + _loc2) : '';

      var originalTxt = submitBtn ? submitBtn.textContent : 'Submit';
      if (submitBtn) { submitBtn.disabled = true; submitBtn.textContent = 'Sending…'; }

      if (typeof swiftSalesSDK !== 'undefined' && typeof swiftSalesSDK.CreateContact === 'function') {
        swiftSalesSDK.CreateContact({
          FirstName: firstNameEl.value.trim(),
          LastName:  lastNameEl ? lastNameEl.value.trim() : '',
          Email:     emailEl.value.trim(),
          Country:   country,
          Phone:     phoneVal,
          Notes:     (form.querySelector('[name="message"]') || {}).value || '',
          Meta:      { Path: window.location.href },
        }, function (cb, err) { if (err) console.error('SwiftSales:', err); });
      }

      var fd = new FormData();
      fd.append('action',               'tnb_contact_form');
      fd.append('nonce',                tnbAjax.contactNonce);
      fd.append('firstName',            firstNameEl.value.trim());
      fd.append('lastName',             lastNameEl ? lastNameEl.value.trim() : '');
      fd.append('cemail',               emailEl.value.trim());
      fd.append('cnumber',              phoneVal);
      fd.append('country',              country);
      fd.append('message',              (form.querySelector('[name="message"]') || {}).value || '');
      fd.append('g-recaptcha-response', (form.querySelector('[name="g-recaptcha-response"]') || {}).value || '');

      fetch(tnbAjax.url, { method: 'POST', body: fd })
        .then(function (r) { return r.json(); })
        .then(function (data) {
          if (data.success && data.data && data.data.redirect) {
            window.location.href = data.data.redirect;
          } else {
            if (submitBtn) { submitBtn.disabled = false; submitBtn.textContent = originalTxt; }
            var msgs = (data.data && data.data.messages) ? data.data.messages.join(' ') : 'Submission failed. Please try again.';
            showMsg(msgs, 'error');
          }
        })
        .catch(function () {
          if (submitBtn) { submitBtn.disabled = false; submitBtn.textContent = originalTxt; }
          showMsg('Submission failed. Please try again.', 'error');
        });
    });
  });
})();
