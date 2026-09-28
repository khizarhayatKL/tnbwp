/* custom-theme-interactions.js — TechnBrains homepage interactions */
(function() {
  'use strict';

  // ── COUNTER ANIMATION ──────────────────────────────────────────────────────
  function initCounters() {
    var els = document.querySelectorAll('[data-counter]');
    els.forEach(function(el) {
      var target = parseFloat(el.dataset.counter) || 0;
      var decimals = parseInt(el.dataset.counterDecimals || '0', 10);
      var started = false;
      var io = new IntersectionObserver(function(entries) {
        entries.forEach(function(e) {
          if (!e.isIntersecting || started) return;
          started = true;
          var t0 = performance.now();
          var dur = 1600;
          function tick(now) {
            var t = Math.min(1, (now - t0) / dur);
            var eased = 1 - Math.pow(1 - t, 3);
            var val = target * eased;
            el.textContent = decimals > 0 ? val.toFixed(decimals) : Math.round(val).toLocaleString();
            if (t < 1) requestAnimationFrame(tick);
            else el.textContent = decimals > 0 ? target.toFixed(decimals) : target.toLocaleString();
          }
          requestAnimationFrame(tick);
        });
      }, { threshold: 0.4 });
      io.observe(el);
    });
  }

  // initRoleCycle() and initNeuralCanvas() moved to assets/js/hero-neural.js,
  // enqueued only on the homepage template (see tnb_enqueue_assets() in
  // functions.php) — they targeted #neural-canvas / [data-role-cycle], which
  // exist on no other page, so loading them everywhere cost every non-homepage
  // page a canvas-sized parse/init for nothing.

  // ── MARQUEE (CSS handles animation; JS only pauses on hover) ──────────────
  function initMarquee() {
    document.querySelectorAll('.recog-track,.hire-marquee-track,.tech-track').forEach(function(el) {
      el.addEventListener('mouseenter', function() { el.style.animationPlayState = 'paused'; });
      el.addEventListener('mouseleave', function() { el.style.animationPlayState = 'running'; });
    });
  }

  // ── CASES DECK ─────────────────────────────────────────────────────────────
  function initCasesDeck() {
    var section = document.querySelector('[data-deck="cases"]');
    if (!section) return;
    var cards = Array.from(section.querySelectorAll('[data-cases-index]'));
    var dots = Array.from(section.querySelectorAll('[data-cases-dot]'));
    var prevBtn = section.querySelector('[data-cases-prev]');
    var nextBtn = section.querySelector('[data-cases-next]');
    var total = cards.length;
    var active = 0;
    var shuffling = false;

    // Both opt-in via data attributes on the [data-deck="cases"] root, so
    // Cases.php (which sets neither) is completely unaffected — same markup,
    // same instant class-swap, same no-autoplay behavior as before.
    var fadeOnChange = section.hasAttribute('data-deck-fade');
    var autoplayMs = parseInt(section.getAttribute('data-deck-autoplay'), 10) || 0;

    function setActive(idx) {
      if (shuffling) return;
      shuffling = true;
      active = (idx + total) % total;
      if (fadeOnChange) {
        cards.forEach(function(c){ c.classList.add('is-changing'); });
      }
      cards.forEach(function(c, i) {
        var offset = (i - active + total) % total;
        // classList.remove/add rather than a full className overwrite — a
        // reused card (e.g. the author "Selected Work" deck) can carry extra
        // classes of its own (has-bg, etc.) that a blanket className
        // reassignment would silently strip on every navigation. Cases.php's
        // own cards never carry any class beyond 'case-card' + one state, so
        // this is behavior-identical there.
        c.classList.remove('is-front', 'is-side-r', 'is-side-l', 'is-far');
        c.classList.add(offset===0?'is-front':offset===1?'is-side-r':offset===total-1?'is-side-l':'is-far');
        c.style.zIndex = offset===0?50:offset===1||offset===total-1?40:30;
      });
      dots.forEach(function(d, i) {
        d.classList.toggle('is-active', i===active);
        d.setAttribute('aria-selected', i===active);
      });
      setTimeout(function(){
        shuffling=false;
        if (fadeOnChange) {
          cards.forEach(function(c){ c.classList.remove('is-changing'); });
        }
      }, 520);
    }

    cards.forEach(function(c) {
      c.addEventListener('click', function() {
        if (!c.classList.contains('is-front')) setActive(parseInt(c.dataset.casesIndex,10));
      });
    });
    dots.forEach(function(d) { d.addEventListener('click', function(){setActive(parseInt(d.dataset.casesDot,10));}); });

    if (autoplayMs) {
      var reduceMotion = !!(window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches);
      var autoplayTimer = null;
      function playAutoplay() {
        if (reduceMotion || autoplayTimer) return;
        autoplayTimer = setInterval(function(){ setActive(active+1); }, autoplayMs);
      }
      function stopAutoplay() {
        if (autoplayTimer) { clearInterval(autoplayTimer); autoplayTimer = null; }
      }
      // Same pause-on-hover/focus convention as the site's other auto-advancing
      // sliders (e.g. the [data-riskx] engine) — a manual move also restarts
      // the clock via setActive()'s own shuffling/setTimeout cycle.
      section.addEventListener('mouseenter', stopAutoplay);
      section.addEventListener('mouseleave', playAutoplay);
      section.addEventListener('focusin', stopAutoplay);
      section.addEventListener('focusout', playAutoplay);
      playAutoplay();
    }
    if (prevBtn) prevBtn.addEventListener('click', function(){setActive(active-1);});
    if (nextBtn) nextBtn.addEventListener('click', function(){setActive(active+1);});
  }

  // ── HIRE ACCORDION ─────────────────────────────────────────────────────────
  function initHireAccordion() {
    var groups = document.querySelectorAll('[data-accordion-group="hire"]');
    groups.forEach(function(group) {
      var items = group.querySelectorAll('[data-accordion-item]');
      items.forEach(function(item) {
        var trigger = item.querySelector('[data-accordion-trigger]');
        if (!trigger) return;
        trigger.addEventListener('click', function() {
          var isOpen = item.classList.contains('is-open');
          items.forEach(function(other) { other.classList.remove('is-open'); other.querySelector('[data-accordion-trigger]') && other.querySelector('[data-accordion-trigger]').setAttribute('aria-expanded','false'); });
          if (!isOpen) { item.classList.add('is-open'); trigger.setAttribute('aria-expanded','true'); }
        });
      });
    });
  }

  // ── FAQ ACCORDION ──────────────────────────────────────────────────────────
  function initFaqAccordion() {
    document.querySelectorAll('[data-faq-group]').forEach(function(group) {
      var items = group.querySelectorAll('.faq-item');
      items.forEach(function(item) {
        var btn = item.querySelector('.faq-q');
        if (!btn) return;
        btn.addEventListener('click', function() {
          var open = item.classList.contains('open');
          items.forEach(function(other){ other.classList.remove('open'); var b=other.querySelector('.faq-q'); if(b)b.setAttribute('aria-expanded','false'); });
          if (!open) { item.classList.add('open'); btn.setAttribute('aria-expanded','true'); }
        });
      });
    });
  }

  // ── ENGAGE ACCORDION (legacy em-card) ─────────────────────────────────────
  function initEngageAccordion() {
    var cards = document.querySelectorAll('[data-engage-card]');
    cards.forEach(function(card) {
      var head = card.querySelector('.em-card-head');
      if (!head) return;
      head.addEventListener('click', function() {
        var isActive = card.classList.contains('is-active');
        cards.forEach(function(c){ c.classList.remove('is-active'); var h=c.querySelector('.em-card-head'); if(h)h.setAttribute('aria-expanded','false'); });
        if (!isActive) { card.classList.add('is-active'); head.setAttribute('aria-expanded','true'); }
      });
    });
  }

  // ── ENGAGE V3 (ev-accordion) ───────────────────────────────────────────────
  function initEngageV3() {
    var acc = document.querySelector('[data-engage-accordion]');
    if (!acc) return;
    var rows   = Array.prototype.slice.call(acc.querySelectorAll('.ev-row'));
    var panels = Array.prototype.slice.call(document.querySelectorAll('[data-ev-panel]'));
    var stage  = document.querySelector('.engage-v3 .ev-stage-frame');

    // mark stage JS-ready so CSS :first-child fallback stops applying
    if (stage) stage.setAttribute('data-js-ready', '1');

    function activate(idx) {
      rows.forEach(function(r, i) {
        var open = i === idx;
        r.classList.toggle('is-open', open);
        var btn = r.querySelector('.ev-row-head');
        if (btn) btn.setAttribute('aria-expanded', String(open));
      });
      panels.forEach(function(p) {
        p.classList.toggle('is-active', Number(p.getAttribute('data-ev-panel')) === idx);
      });
    }

    // activate first row on load
    activate(0);

    rows.forEach(function(row, i) {
      // hover on the button triggers activate
      var btn = row.querySelector('.ev-row-head');
      if (btn) {
        btn.addEventListener('mouseenter', function() { activate(i); });
        btn.addEventListener('click',      function() { activate(i); });
        btn.addEventListener('focus',      function() { activate(i); });
      }
    });
  }

  // ── DECISION QUIZ ──────────────────────────────────────────────────────────
  function initDecisionQuiz() {
    var section = document.querySelector('[data-quiz="decision"]');
    if (!section) return;
    var inner = section.querySelector('[data-dq-inner]');
    if (!inner) return;

    var step1Options, step2Options, results;
    try {
      step1Options = JSON.parse(section.dataset.dqStep1 || '[]');
      step2Options = JSON.parse(section.dataset.dqStep2 || '[]');
      results = JSON.parse(section.dataset.dqResults || '{}');
    } catch(e) { return; }

    var progressBar = section.querySelector('.dq-progress-bar');
    var step = 1, s1 = null, s2 = null, transitioning = false;

    function decideResult(a, b) {
      if (a==='noteam'||a==='scope') return 'outsourcing';
      if (a==='live') return 'dedicated';
      if (b==='hiring'||b==='overloaded') return 'staffaug';
      return 'dedicated';
    }

    function setProgress(pct) { if (progressBar) progressBar.style.width = pct + '%'; }

    var currentDir = 'forward';

    function stageWrap(content, dir) {
      return '<div class="dq-stage dq-' + dir + ' is-enter">' + content + '</div>';
    }

    function renderStep(s, dir) {
      var d = dir || currentDir;
      if (s === 1) {
        setProgress(50);
        var c = '<div class="dq-step-counter"><span></span><span class="dq-step-label">Step 1 of 2</span><span></span></div>';
        c += '<h3 class="dq-q">Where are you right now?</h3><div class="dq-options">';
        step1Options.forEach(function(o,i){
          c += '<button type="button" class="dq-option" data-val="'+escAttr(o.value)+'" style="animation-delay:'+(i*60)+'ms"><span class="dq-option-label">'+escHtml(o.label)+'</span><span class="dq-option-arrow" aria-hidden="true">→</span></button>';
        });
        c += '</div>';
        inner.innerHTML = stageWrap(c, d);
        inner.querySelectorAll('.dq-option').forEach(function(btn){
          btn.addEventListener('click', function(){ s1 = btn.dataset.val; goTo(2); });
        });
      } else if (s === 2) {
        setProgress(100);
        var c = '<div class="dq-step-counter"><button type="button" class="dq-back" data-dq-back><span aria-hidden="true">←</span> back</button><span class="dq-step-label">Step 2 of 2</span><span></span></div>';
        c += '<h3 class="dq-q">What\'s slowing you down the most?</h3><div class="dq-options">';
        step2Options.forEach(function(o,i){
          c += '<button type="button" class="dq-option" data-val="'+escAttr(o.value)+'" style="animation-delay:'+(i*60)+'ms"><span class="dq-option-label">'+escHtml(o.label)+'</span><span class="dq-option-arrow" aria-hidden="true">→</span></button>';
        });
        c += '</div>';
        inner.innerHTML = stageWrap(c, d);
        inner.querySelector('[data-dq-back]').addEventListener('click', function(){ goTo(1,'back'); });
        inner.querySelectorAll('.dq-option').forEach(function(btn){
          btn.addEventListener('click', function(){ s2 = btn.dataset.val; goTo('calc'); setTimeout(function(){goTo('result');},1100); });
        });
      } else if (s === 'calc') {
        setProgress(100);
        var c = '<div class="dq-calc"><div class="dq-calc-ring" aria-hidden="true"><svg viewBox="0 0 60 60" width="60" height="60"><circle cx="30" cy="30" r="26" fill="none" stroke="#E5E5E5" stroke-width="3"/><circle cx="30" cy="30" r="26" fill="none" stroke="#CC1F1F" stroke-width="3" stroke-linecap="round" stroke-dasharray="40 200" transform="rotate(-90 30 30)"><animateTransform attributeName="transform" type="rotate" from="-90 30 30" to="270 30 30" dur="0.9s" repeatCount="indefinite"/></circle></svg></div><div class="dq-calc-text">Calculating your match…</div></div>';
        inner.innerHTML = stageWrap(c, d);
      } else if (s === 'result') {
        var key = decideResult(s1, s2);
        var r = results[key];
        if (!r) return;
        var c = '<div class="dq-result"><h3 class="dq-result-name">'+escHtml(r.name)+'</h3>';
        c += '<p class="dq-result-summary">'+escHtml(r.summary)+'</p>';
        c += '<div class="dq-result-blocktitle">What this gives you</div><ul class="dq-result-bullets">';
        r.bullets.forEach(function(b,i){
          c += '<li style="animation-delay:'+(200+i*100)+'ms"><span class="dq-tick" aria-hidden="true"><svg viewBox="0 0 14 14" width="11" height="11"><path d="M2 7.5L5.5 11L12 3.5" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg></span><span>'+escHtml(b)+'</span></li>';
        });
        c += '</ul><div class="dq-result-ctas">';
        if (r.primary.href) {
          c += '<a class="dq-cta dq-cta-black" href="'+escAttr(r.primary.href)+'">'+escHtml(r.primary.label)+' <span aria-hidden="true">→</span></a>';
        } else {
          c += '<button type="button" class="dq-cta dq-cta-black tnb-popup-trigger">'+escHtml(r.primary.label)+' <span aria-hidden="true">→</span></button>';
        }
        if (r.secondary.href) {
          c += '<a class="dq-cta dq-cta-outline" href="'+escAttr(r.secondary.href)+'">'+escHtml(r.secondary.label)+'</a>';
        } else {
          c += '<button type="button" class="dq-cta dq-cta-outline tnb-popup-trigger">'+escHtml(r.secondary.label)+'</button>';
        }
        c += '</div>';
        c += '<button type="button" class="dq-restart" data-dq-restart><span aria-hidden="true">↺</span> Start over</button>';
        c += '</div>';
        inner.innerHTML = stageWrap(c, d);
        var restartBtn = inner.querySelector('[data-dq-restart]');
        if (restartBtn) {
          restartBtn.addEventListener('click', function(){ s1=null;s2=null;goTo(1,'back'); });
        }
      }
    }

    function goTo(next, dir) {
      if (transitioning) return;
      transitioning = true;
      currentDir = dir || 'forward';
      var stage = inner.querySelector('.dq-stage');
      if (stage) {
        stage.classList.remove('is-enter');
        stage.classList.add('is-exit', 'dq-' + currentDir);
      }
      setTimeout(function(){
        try {
          step = next;
          renderStep(step, currentDir);
        } finally {
          // Always unlock, even if renderStep() throws — a future render error
          // must not permanently disable the widget the way the missing
          // [data-dq-restart] markup used to.
          setTimeout(function(){ transitioning = false; }, 300);
        }
      }, 280);
    }

    renderStep(1, 'forward');
  }

  // ── WHY HUB ────────────────────────────────────────────────────────────────
  function initWhyHub() {
    var hub = document.querySelector('[data-why-hub]');
    if (!hub) return;
    var points = hub.querySelectorAll('[data-why-point]');
    var spokes = hub.querySelectorAll('[data-spoke-index]');
    points.forEach(function(pt) {
      pt.addEventListener('mouseenter', function(){
        var idx = pt.dataset.whyPoint;
        hub.classList.add('has-active');
        points.forEach(function(p){ p.classList.toggle('is-active', p.dataset.whyPoint===idx); p.classList.toggle('is-dim', p.dataset.whyPoint!==idx); });
        spokes.forEach(function(s){ s.classList.toggle('is-active', s.dataset.spokeIndex===idx); });
      });
      pt.addEventListener('mouseleave', function(){
        hub.classList.remove('has-active');
        points.forEach(function(p){ p.classList.remove('is-active','is-dim'); });
        spokes.forEach(function(s){ s.classList.remove('is-active'); });
      });
    });
  }

  // ── PHONE DIAL DROPDOWN ────────────────────────────────────────────────────
  function initDialDropdown() {
    document.querySelectorAll('[data-dial-wrapper]').forEach(function(wrapper) {
      var trigger = wrapper.querySelector('[data-dial-trigger]');
      var menu = wrapper.querySelector('[data-dial-menu]');
      var flagEl = wrapper.querySelector('[data-collab-flag]');
      var codeEl = wrapper.querySelector('[data-collab-code]');
      if (!trigger || !menu) return;
      trigger.addEventListener('click', function(){
        var open = menu.style.display !== 'none';
        menu.style.display = open ? 'none' : 'block';
        trigger.setAttribute('aria-expanded', !open);
        wrapper.classList.toggle('open', !open);
      });
      menu.querySelectorAll('[data-dial-code]').forEach(function(opt){
        opt.addEventListener('click', function(){
          if (codeEl) codeEl.textContent = opt.dataset.dialCode;
          if (flagEl) flagEl.textContent = opt.dataset.dialFlag;
          menu.style.display = 'none';
          wrapper.classList.remove('open');
          trigger.setAttribute('aria-expanded','false');
        });
      });
      document.addEventListener('mousedown', function(e){
        if (!wrapper.contains(e.target)){ menu.style.display='none'; wrapper.classList.remove('open'); trigger.setAttribute('aria-expanded','false'); }
      });
    });
  }

  // ── CONTACT FORM INTENT ────────────────────────────────────────────────────
  function initContactForm() {
    document.querySelectorAll('[data-intent-group]').forEach(function(group){
      var opts = group.querySelectorAll('[data-intent-opt]');
      opts.forEach(function(opt){
        var radio = opt.querySelector('input[type="radio"]');
        if (!radio) return;
        radio.addEventListener('change', function(){
          opts.forEach(function(o){ o.classList.toggle('is-selected', o.querySelector('input[type="radio"]').checked); });
        });
      });
    });
  }

  // ── HELPERS ────────────────────────────────────────────────────────────────
  function escHtml(s){ return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;'); }
  function escAttr(s){ return String(s).replace(/"/g,'&quot;'); }

  // ── TESTIMONIALS VIDEO ────────────────────────────────────────────────────
  function initTestimonialsVideo() {
    var article = document.querySelector('[data-tv-mos-article]');
    if (!article) return;
    var btn = article.querySelector('[data-tv-mos-play]');
    var vid = article.querySelector('.tv-mos-video-el');
    if (!btn || !vid) return;
    btn.addEventListener('click', function() {
      btn.style.display = 'none';
      vid.style.display = 'block';
      vid.play().catch(function(){});
    });
    vid.addEventListener('ended', function() {
      vid.style.display = 'none';
      btn.style.display = 'block';
    });
  }
  
  // ── BUTTON TEXT TO CAPITALIZE ────────────────────────────────────────────────────  
	function initButtonTextToCapitalize(){
		const buttons = document.querySelectorAll(".tnb-popup-trigger");
		buttons.forEach(button => {
			button.childNodes.forEach(node => {
				if (node.nodeType === Node.TEXT_NODE) {
					let text = node.textContent.toLowerCase();
					let capitalized = text.replace(/(?<!')\b\w/g, char => char.toUpperCase());
					node.textContent = capitalized;
				}
			});
		});
	}
  
    function initBlogTableWrap() {
    var det = document.querySelector('.det');
    if (!det) return;
    det.querySelectorAll('table').forEach(function(table) {
      if (table.parentNode.classList.contains('responsive-table')) return;
      var wrapper = document.createElement('div');
      wrapper.className = 'responsive-table';
      table.parentNode.insertBefore(wrapper, table);
      wrapper.appendChild(table);
    });
  }
	
  // ── LAZY IMAGE FADE-IN ────────────────────────────────────────────────────
  // Hides lazy images that haven't loaded yet and fades them in on load.
  // Only applied to images not yet complete — cached/instant images are unaffected.
  //
  // Excludes [data-riskx-img] (the so_riskx / lp_workflow_slider crossfade deck):
  // that slider toggles each stacked image's opacity via the .is-active CLASS,
  // but this script sets opacity via inline style on 'load' — inline style always
  // wins over a stylesheet class rule, so once a lazy slide image finished
  // loading it got stuck at opacity:1 forever, no longer respecting is-active.
  // With several images loaded, they all show at once — the "unstable image
  // change on autoplay and arrow clicks" bug.
  function initLazyImageFade() {
    function revealImg(img) {
      if (img.hasAttribute('data-riskx-img')) return;
      if (img.complete && img.naturalWidth > 0) return;
      img.style.opacity = '0';
      img.style.transition = 'opacity 0.4s ease';
      function show() { img.style.opacity = '1'; }
      img.addEventListener('load', show);
      img.addEventListener('error', show);
    }
    document.querySelectorAll('img[loading="lazy"]').forEach(revealImg);
    if (window.MutationObserver) {
      new MutationObserver(function(mutations) {
        mutations.forEach(function(m) {
          m.addedNodes.forEach(function(n) {
            if (n.nodeType !== 1) return;
            if (n.tagName === 'IMG' && n.getAttribute('loading') === 'lazy') revealImg(n);
            if (n.querySelectorAll) n.querySelectorAll('img[loading="lazy"]').forEach(revealImg);
          });
        });
      }).observe(document.body, { childList: true, subtree: true });
    }
  }

  // ── INIT ───────────────────────────────────────────────────────────────────
  document.addEventListener('DOMContentLoaded', function() {
	initLazyImageFade();
    initCounters();
    initMarquee();
    initCasesDeck();
    initHireAccordion();
    initFaqAccordion();
    initEngageAccordion();
    initEngageV3();
    initTestimonialsVideo();
    initDecisionQuiz();
    initWhyHub();
    initDialDropdown();
    initContactForm();
	initButtonTextToCapitalize();
    initBlogTableWrap();
  });
 
})();
