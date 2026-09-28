/**
 * TechnBrains — Desktop header JS
 * Dropdown: CSS .li-nav:hover .onHover shows panel (matches live site).
 * JS adds .is-open to the LI for keyboard users to keep panel open.
 */
(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {

    var header  = document.querySelector('.tnb-desktop-header');
    var overlay = document.getElementById('menuoverlay');
    if (!header) return;

    var dropdownItems = header.querySelectorAll('.li-nav:has(.core-services-dropdown)');

    // ── Overlay helpers ─────────────────────────────────────────────────────
    function openOverlay() {
      if (overlay) overlay.classList.add('open');
    }
    function closeOverlay() {
      if (overlay) overlay.classList.remove('open');
    }

    // ── aria-expanded sync ──────────────────────────────────────────────────
    function setExpanded(li, value) {
      var trigger = li.querySelector('.parent-link');
      if (trigger) trigger.setAttribute('aria-expanded', String(value));
    }

    // ── Close all open dropdowns ────────────────────────────────────────────
    function closeAll() {
      dropdownItems.forEach(function (li) {
        li.classList.remove('is-open');
        setExpanded(li, false);
      });
      closeOverlay();
    }

    // ── Mouse: aria + overlay (CSS :hover handles visibility) ───────────────
    dropdownItems.forEach(function (li) {
      li.addEventListener('mouseenter', function () {
        setExpanded(li, true);
        openOverlay();
      });

      li.addEventListener('mouseleave', function () {
        // only clear aria if not keyboard-opened
        if (!li.classList.contains('is-open')) {
          setExpanded(li, false);
        }
        // close overlay only if no other dropdown is hovered/open
        var anyOpen = Array.prototype.some.call(dropdownItems, function (item) {
          return item.classList.contains('is-open');
        });
        if (!anyOpen) closeOverlay();
      });
    });

    // ── Keyboard: Enter/Space opens, Escape closes ──────────────────────────
    dropdownItems.forEach(function (li) {
      var trigger = li.querySelector('.parent-link');
      if (!trigger) return;

      trigger.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          var isOpen = li.classList.contains('is-open');
          closeAll();
          if (!isOpen) {
            li.classList.add('is-open');
            setExpanded(li, true);
            openOverlay();
          }
        }

        if (e.key === 'Escape') {
          closeAll();
          trigger.focus();
        }
      });

      // Escape inside dropdown panel
      var dropdown = li.querySelector('.core-services-dropdown');
      if (dropdown) {
        dropdown.addEventListener('keydown', function (e) {
          if (e.key === 'Escape') {
            closeAll();
            trigger.focus();
          }
        });
      }
    });

    // ── Close on outside click ──────────────────────────────────────────────
    document.addEventListener('click', function (e) {
      if (!header.contains(e.target)) {
        closeAll();
      }
    });

    // ── Prevent default on href="#" parent links ────────────────────────────
    header.querySelectorAll('.parent-link[href="#"]').forEach(function (a) {
      a.addEventListener('click', function (e) {
        e.preventDefault();
      });
    });

  });

})();
// ── Homepage: sticky nav on scroll (absolute → fixed + dark bg) ─────────────
(function () {
  'use strict';
  var nav = document.getElementById('hp-nav');
  if (!nav || !document.body.classList.contains('page-homepage')) return;

  function onScroll() {
    nav.classList.toggle('hp-scrolled', window.scrollY > 10);
  }

  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
})();
