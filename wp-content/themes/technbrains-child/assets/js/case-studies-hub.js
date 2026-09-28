/**
 * Case Studies Hub — page-scoped JS for the 3 `csh-` components (Hero,
 * Coverflow, Filtered Grid). Self-contained: does not call, extend, or
 * depend on anything in components.js. Only enqueued on pages that use one
 * of the case_studies_hero / case_studies_coverflow / case_studies_filtered_grid
 * flexible-content layouts (see tnb_case_studies_hub_enqueue_assets() in
 * functions.php).
 */
(function () {
  "use strict";

  // ── Coverflow deck (csh-feat) ─────────────────────────────────────────────
  // 4-state deck: one focused "is-front" slide, two dimmed "is-side-l"/
  // "is-side-r" neighbors, the rest "is-far" (hidden). Same mechanism as the
  // theme's other case-study deck sliders, written fresh here under this
  // page's own `data-csh-*` attributes / `.csh-*` classes.
  function initCshCoverflow() {
    document.querySelectorAll("[data-csh-deck]").forEach(function (deck) {
      var cards = Array.from(deck.querySelectorAll(".csh-show"));
      var total = cards.length;
      if (total < 2) {
        return;
      }
      var active = 0;
      var timer = null;
      var section = deck.closest("[data-csh-deck-wrap]");
      var dots = section
        ? Array.from(section.querySelectorAll("[data-csh-dot]"))
        : [];

      function getState(i) {
        var offset = (i - active + total) % total;
        if (offset === 0) {
          return "is-front";
        }
        if (offset === 1) {
          return "is-side-r";
        }
        if (offset === total - 1) {
          return "is-side-l";
        }
        return "is-far";
      }

      function update() {
        cards.forEach(function (card, i) {
          card.className = card.className
            .replace(/\bis-front\b|\bis-side-r\b|\bis-side-l\b|\bis-far\b/g, "")
            .replace(/\s{2,}/g, " ")
            .trim();
          var st = getState(i);
          card.classList.add(st);
          card.style.zIndex =
            st === "is-front" ? "100" : st.indexOf("side") !== -1 ? "10" : "1";
          card.setAttribute("aria-hidden", i === active ? "false" : "true");
        });
        dots.forEach(function (dot, i) {
          dot.classList.toggle("is-active", i === active);
        });
      }

      function go(idx) {
        active = ((idx % total) + total) % total;
        update();
      }

      function startTimer() {
        clearInterval(timer);
        timer = setInterval(function () {
          go(active + 1);
        }, 7000);
      }

      cards.forEach(function (card, i) {
        card.addEventListener("click", function (e) {
          if (!card.classList.contains("is-front")) {
            e.preventDefault();
            go(i);
            startTimer();
          }
        });
      });

      if (section) {
        var prev = section.querySelector("[data-csh-prev]");
        var next = section.querySelector("[data-csh-next]");
        if (prev) {
          prev.addEventListener("click", function () {
            go(active - 1);
            startTimer();
          });
        }
        if (next) {
          next.addEventListener("click", function () {
            go(active + 1);
            startTimer();
          });
        }
        dots.forEach(function (dot) {
          dot.addEventListener("click", function () {
            go(parseInt(dot.getAttribute("data-csh-dot"), 10));
            startTimer();
          });
        });
      }

      update();
      startTimer();
    });
  }

  // ── Filtered grid (csh-filters / csp-card) ────────────────────────────────
  // Click a filter pill → mark it active → show only cards whose
  // data-csh-tags list contains that filter's slug ("all" shows everything).
  function initCshFilterGrid() {
    document.querySelectorAll("[data-csh-filters]").forEach(function (wrap) {
      var chips = Array.from(wrap.querySelectorAll("[data-csh-filter]"));
      var section = wrap.closest("[data-csh-filter-wrap]");
      var cards = section
        ? Array.from(section.querySelectorAll("[data-csh-tags]"))
        : [];
      if (!chips.length || !cards.length) {
        return;
      }

      chips.forEach(function (chip) {
        chip.addEventListener("click", function () {
          chips.forEach(function (c) {
            c.classList.remove("is-active");
          });
          chip.classList.add("is-active");

          var filter = chip.getAttribute("data-csh-filter");
          cards.forEach(function (card) {
            if (filter === "all") {
              card.style.display = "";
              return;
            }
            var tags = (card.getAttribute("data-csh-tags") || "")
              .split(",")
              .map(function (t) {
                return t.trim();
              });
            card.style.display = tags.indexOf(filter) > -1 ? "" : "none";
          });
        });
      });
    });
  }

  function boot() {
    initCshCoverflow();
    initCshFilterGrid();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", boot);
  } else {
    boot();
  }
})();
