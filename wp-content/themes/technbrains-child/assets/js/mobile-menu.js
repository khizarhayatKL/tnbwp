/**
 * TechnBrains — Mobile menu JS
 * Handles: hamburger toggle, level-1 accordion, level-2 accordion, close on navigate
 */
(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {

    var mobileHeader = document.querySelector('.tnb-mobile-header');
    if (!mobileHeader) return;

    var hamburger   = document.getElementById('tnb-hamburger');
    var panel       = document.getElementById('tnb-mobile-menu');
    var overlay     = document.getElementById('menuoverlay');

    // ── Hamburger toggle ────────────────────────────────────────────────────
    if (hamburger && panel) {
      hamburger.addEventListener('click', function () {
        var isOpen = panel.classList.contains('open');

        if (isOpen) {
          closeMenu();
        } else {
          openMenu();
        }
      });
    }

    function openMenu() {
      if (!panel || !hamburger) return;
      panel.classList.add('open');
      hamburger.classList.add('open');
      hamburger.setAttribute('aria-expanded', 'true');
      hamburger.setAttribute('aria-label', 'Close menu');
      if (overlay) overlay.classList.add('open');
      document.body.style.overflow = 'hidden';
    }

    function closeMenu() {
      if (!panel || !hamburger) return;
      panel.classList.remove('open');
      hamburger.classList.remove('open');
      hamburger.setAttribute('aria-expanded', 'false');
      hamburger.setAttribute('aria-label', 'Open menu');
      if (overlay) overlay.classList.remove('open');
      document.body.style.overflow = '';
    }

    // Close when overlay clicked
    if (overlay) {
      overlay.addEventListener('click', closeMenu);
    }

    // ── Level-1 accordion: data-toggle ──────────────────────────────────────
    // Toggles child ul[id="mob-{key}"]
    if (panel) {
      panel.querySelectorAll('[data-toggle]').forEach(function (trigger) {
        trigger.addEventListener('click', function (e) {
          e.preventDefault();
          var key    = trigger.getAttribute('data-toggle');
          var target = document.getElementById('mob-' + key);
          var parent = trigger.closest('.has-child');
          var dropdown = trigger.closest('.menuDropdown');
          if (!target) return;

          var isOpen = !target.hidden;

          // close all sibling level-1 menus
          panel.querySelectorAll('[data-toggle]').forEach(function (other) {
            var otherKey = other.getAttribute('data-toggle');
            var otherTarget = document.getElementById('mob-' + otherKey);
            var otherDropdown = other.closest('.menuDropdown');
            if (otherTarget && otherKey !== key) {
              otherTarget.hidden = true;
              if (otherDropdown) otherDropdown.classList.remove('open');
              other.setAttribute('aria-expanded', 'false');
              // also close any inner menus inside it
              otherTarget.querySelectorAll('[data-inner]').forEach(function (inner) {
                var innerKey = inner.getAttribute('data-inner');
                var innerTarget = document.getElementById('mob-' + innerKey);
                if (innerTarget) innerTarget.hidden = true;
                inner.classList.remove('open');
                inner.setAttribute('aria-expanded', 'false');
              });
            }
          });

          // toggle current
          target.hidden = isOpen;
          trigger.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
          if (dropdown) dropdown.classList.toggle('open', !isOpen);
          if (parent)   parent.classList.toggle('active', !isOpen);
        });
      });
    }

    // ── Level-2 accordion: data-inner ───────────────────────────────────────
    if (panel) {
      panel.querySelectorAll('[data-inner]').forEach(function (trigger) {
        trigger.addEventListener('click', function (e) {
          e.preventDefault();
          var key    = trigger.getAttribute('data-inner');
          var target = document.getElementById('mob-' + key);
          var parent = trigger.closest('.has-child');
          if (!target) return;

          var isOpen = !target.hidden;

          // close sibling inner menus in same parent ul
          var parentUl = trigger.closest('ul');
          if (parentUl) {
            parentUl.querySelectorAll('[data-inner]').forEach(function (other) {
              var otherKey    = other.getAttribute('data-inner');
              var otherTarget = document.getElementById('mob-' + otherKey);
              if (otherTarget && otherKey !== key) {
                otherTarget.hidden = true;
                other.classList.remove('open');
                other.setAttribute('aria-expanded', 'false');
                var otherParent = other.closest('.has-child');
                if (otherParent) otherParent.classList.remove('active');
              }
            });
          }

          // toggle current
          target.hidden = isOpen;
          trigger.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
          trigger.classList.toggle('open', !isOpen);
          if (parent) parent.classList.toggle('active', !isOpen);
        });
      });
    }

    // ── Close on navigation (link click inside panel) ────────────────────────
    if (panel) {
      panel.querySelectorAll('a[href]:not([href="#"]):not([data-toggle]):not([data-inner])').forEach(function (a) {
        a.addEventListener('click', function () {
          closeMenu();
          // reset all open states
          panel.querySelectorAll('[data-toggle]').forEach(function (trigger) {
            var key = trigger.getAttribute('data-toggle');
            var t   = document.getElementById('mob-' + key);
            if (t) t.hidden = true;
            var dd = trigger.closest('.menuDropdown');
            if (dd) dd.classList.remove('open');
            trigger.setAttribute('aria-expanded', 'false');
          });
          panel.querySelectorAll('[data-inner]').forEach(function (trigger) {
            var key = trigger.getAttribute('data-inner');
            var t   = document.getElementById('mob-' + key);
            if (t) t.hidden = true;
            trigger.classList.remove('open');
            trigger.setAttribute('aria-expanded', 'false');
          });
          panel.querySelectorAll('.has-child.active').forEach(function (li) {
            li.classList.remove('active');
          });
        });
      });
    }

    // ── Escape key closes menu ──────────────────────────────────────────────
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && panel && panel.classList.contains('open')) {
        closeMenu();
        if (hamburger) hamburger.focus();
      }
    });

  });

})();
