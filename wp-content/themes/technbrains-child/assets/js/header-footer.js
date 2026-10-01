(function() {
  'use strict';

  function initNewHeader() {
    var nav = document.getElementById('hp-nav');
    if (!nav) return;


    nav.querySelectorAll('.hp-links > li > a').forEach(function(link) {
      link.addEventListener('keydown', function(e) {
        var li = link.parentElement;
        if ((e.key === 'Enter' || e.key === ' ') && li.querySelector('.hp-drop')) {
          e.preventDefault();
          var open = li.classList.contains('hp-open');
          nav.querySelectorAll('.hp-links > li').forEach(function(el) { el.classList.remove('hp-open'); var a = el.querySelector('a'); if (a) a.setAttribute('aria-expanded', 'false'); });
          if (!open) { li.classList.add('hp-open'); link.setAttribute('aria-expanded', 'true'); }
        }
        if (e.key === 'Escape') nav.querySelectorAll('.hp-links > li').forEach(function(el) { el.classList.remove('hp-open'); });
      });
    });
    document.addEventListener('click', function(e) {
      if (!nav.contains(e.target)) nav.querySelectorAll('.hp-links > li').forEach(function(el) { el.classList.remove('hp-open'); });
    }, { passive: true });

    /* Tab switching — click .hp-tab → activate tab, show matching panel */
    nav.addEventListener('click', function(e) {
      var tab = e.target.closest('.hp-tab');
      if (!tab) return;
      var group = tab.closest('[data-group]');
      var drop  = tab.closest('.hp-drop');
      if (!drop) return;

      /* Deactivate all sibling tabs */
      if (group) {
        group.querySelectorAll('.hp-tab').forEach(function(t) { t.classList.remove('hp-tab--active'); });
      }
      tab.classList.add('hp-tab--active');

      /* Hide all panels in this dropdown */
      drop.querySelectorAll('.hp-panel').forEach(function(p) { p.classList.add('hp-panel--hidden'); });

      /* Show matching panel */
      var target = tab.dataset.target;
      var panel  = drop.querySelector('#hp-' + target);
      if (!panel) return;

      /* Hydrate from <template> the first time this panel is opened */
      if (!panel.childElementCount) {
        var tpl = document.getElementById('tpl-' + target);
        if (tpl) panel.appendChild(tpl.content.cloneNode(true));
      }

      panel.classList.remove('hp-panel--hidden');
    });
  }

  document.addEventListener('DOMContentLoaded', function() {
    initNewHeader();
  });
})();
