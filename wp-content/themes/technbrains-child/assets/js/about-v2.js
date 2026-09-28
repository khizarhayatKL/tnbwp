/**
 * About Us V2 ("Our Story") — front-end behaviour.
 *
 * Vanilla port of the QA-approved prototype (about-story-copy.jsx). No React,
 * no dependencies. Loaded in the footer, only on the About Us V2 template.
 *
 *  1) Hero plexus canvas — animated particle net behind the hero copy.
 *  2) Scroll reveal — adds `.in` to `.abs-rev` as it enters the viewport.
 *  3) Stat count-up + `%` bars — gated on an IntersectionObserver.
 *  4) Story rail — measures each chapter heading, places the rail nodes and
 *     drives the travelling logo bead + fill from the viewport centre.
 *  5) Per-card entrance for `.abs-capcard` and `.abs-jc`.
 *  6) Testimonial rotation, with manual prev/next/dot controls.
 *  7) Capability carousel — paging controls over a native scroll-snap track.
 *
 * Every animation honours prefers-reduced-motion, and the hero canvas loop is
 * suspended while the hero is off-screen or the tab is hidden so it costs
 * nothing on the rest of the page.
 *
 * @package technbrains-child
 */
(function () {
	'use strict';

	var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	/* ================================================== 1. HERO PLEXUS CANVAS */
	function initHeroPlexus() {
		var canvas = document.querySelector('.abs-hero-plexus');
		var host = canvas && canvas.closest('.abs-hero');
		if (!canvas || !host) {
			return;
		}

		var ctx = canvas.getContext('2d');
		if (!ctx) {
			return;
		}

		var COUNT = 90;
		var LINK = 160;
		var w = 0;
		var h = 0;
		var dpr = 1;
		var raf = null;
		var nodes = [];
		var visible = true;

		function size() {
			dpr = Math.min(window.devicePixelRatio || 1, 2);
			w = host.clientWidth;
			h = host.clientHeight;
			canvas.width = w * dpr;
			canvas.height = h * dpr;
			canvas.style.width = w + 'px';
			canvas.style.height = h + 'px';
			ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
		}

		function init() {
			nodes = [];
			for (var i = 0; i < COUNT; i++) {
				nodes.push({
					x: Math.random() * w,
					y: Math.random() * h,
					vx: (Math.random() - 0.5) * 0.35,
					vy: (Math.random() - 0.5) * 0.35,
					r: Math.random() * 1.6 + 1
				});
			}
		}

		function draw() {
			var i, j, a, b, dx, dy, d, n;

			ctx.clearRect(0, 0, w, h);

			for (i = 0; i < nodes.length; i++) {
				n = nodes[i];
				n.x += n.vx;
				n.y += n.vy;
				if (n.x < 0 || n.x > w) { n.vx *= -1; }
				if (n.y < 0 || n.y > h) { n.vy *= -1; }
			}

			for (i = 0; i < nodes.length; i++) {
				for (j = i + 1; j < nodes.length; j++) {
					a = nodes[i];
					b = nodes[j];
					dx = a.x - b.x;
					dy = a.y - b.y;
					d = Math.sqrt(dx * dx + dy * dy);
					if (d < LINK) {
						ctx.strokeStyle = 'rgba(236,28,36,' + ((1 - d / LINK) * 0.45) + ')';
						ctx.lineWidth = 1;
						ctx.beginPath();
						ctx.moveTo(a.x, a.y);
						ctx.lineTo(b.x, b.y);
						ctx.stroke();
					}
				}
			}

			for (i = 0; i < nodes.length; i++) {
				n = nodes[i];
				ctx.fillStyle = 'rgba(236,28,36,0.95)';
				ctx.beginPath();
				ctx.arc(n.x, n.y, n.r, 0, Math.PI * 2);
				ctx.fill();
			}
		}

		function frame() {
			draw();
			raf = requestAnimationFrame(frame);
		}

		function start() {
			if (raf === null && !reduce) {
				raf = requestAnimationFrame(frame);
			}
		}

		function stop() {
			if (raf !== null) {
				cancelAnimationFrame(raf);
				raf = null;
			}
		}

		size();
		init();

		// Reduced motion: render one static frame and never animate.
		if (reduce) {
			draw();
		} else {
			start();
		}

		window.addEventListener('resize', function () {
			size();
			init();
			if (reduce) {
				draw();
			}
		});

		// Suspend the loop while the hero is off-screen or the tab is hidden.
		if ('IntersectionObserver' in window) {
			new IntersectionObserver(function (entries) {
				entries.forEach(function (e) {
					visible = e.isIntersecting;
					if (visible && !document.hidden) {
						start();
					} else {
						stop();
					}
				});
			}, { threshold: 0 }).observe(host);
		}

		document.addEventListener('visibilitychange', function () {
			if (document.hidden || !visible) {
				stop();
			} else {
				start();
			}
		});
	}

	/* ================================================== 2/3. REVEAL + COUNT-UP */
	var revs = Array.prototype.slice.call(document.querySelectorAll('.abs-rev:not(.in)'));
	var counted = [];

	/**
	 * Animates an element's text from 0 up to its data-to value.
	 * The final value is already in the markup, so no-JS visitors and crawlers
	 * see the real number.
	 */
	function countUp(el) {
		if (!el || counted.indexOf(el) > -1) {
			return;
		}
		counted.push(el);

		var raw = el.getAttribute('data-to');
		var num = parseFloat(raw);
		if (isNaN(num)) {
			return;
		}
		if (reduce) {
			return;
		}

		var dec = raw.indexOf('.') > -1 ? 1 : 0;
		var dur = 1400;
		var start = null;

		function step(ts) {
			if (start === null) {
				start = ts;
			}
			var p = Math.min((ts - start) / dur, 1);
			var e = 1 - Math.pow(1 - p, 3);
			el.textContent = (num * e).toFixed(dec);
			if (p < 1) {
				requestAnimationFrame(step);
			} else {
				el.textContent = raw;
			}
		}

		requestAnimationFrame(step);
	}

	/** Fills a `%` bar by handing its target width to CSS as a custom property. */
	function fillBar(el) {
		var pct = el.getAttribute('data-pct');
		if (pct) {
			el.style.setProperty('--abs-pct', pct + '%');
		}
	}

	/* ================================================== 4. STORY RAIL */
	var track = null;
	var line = null;
	var traveler = null;
	var fill = null;
	var nodeTops = [];

	function moveTraveler() {
		if (!traveler || !nodeTops.length || !track) {
			return;
		}

		var railEl = line.querySelector('.abs-rail');
		var first = railEl ? railEl.offsetTop : nodeTops[0];
		var last = nodeTops[nodeTops.length - 1];
		var trackTopDoc = track.getBoundingClientRect().top + window.scrollY;
		var focus = window.scrollY + window.innerHeight * 0.5;
		var p = (last > first) ? (focus - (trackTopDoc + first)) / (last - first) : 0;

		p = Math.max(0, Math.min(1, p));

		var topRel = first + p * (last - first);

		traveler.style.top = topRel + 'px';
		traveler.style.transform = 'translate(-50%, -50%) rotate(' + (reduce ? 0 : topRel * 0.5) + 'deg)';

		if (fill) {
			fill.style.height = Math.max(0, topRel - fill.offsetTop) + 'px';
		}

		line.querySelectorAll('.abs-rail-node').forEach(function (n, i) {
			n.classList.toggle('done', nodeTops[i] <= topRel + 2);
		});
	}

	function placeRail() {
		track = document.querySelector('.abs-story-track');
		line = document.querySelector('.abs-storyline');
		if (!track || !line) {
			return;
		}

		fill = line.querySelector('.abs-rail-fill');
		line.querySelectorAll('.abs-rail-node, .abs-rail-traveler').forEach(function (d) {
			d.remove();
		});

		var secs = track.querySelectorAll(':scope > section');
		var trackTop = track.getBoundingClientRect().top;

		// Lowest point the first node may take, so it cannot land above where the
		// rail starts. Read from CSS (--abs-rail-floor) because the rail shrinks on
		// mobile and a hard-coded desktop value would overshoot the first heading.
		var floor = parseFloat(
			window.getComputedStyle(document.body).getPropertyValue('--abs-rail-floor')
		);
		if (isNaN(floor)) {
			floor = 196;
		}

		nodeTops = [];

		secs.forEach(function (s, i) {
			var isLast = i === secs.length - 1;
			var top;

			if (isLast) {
				// Final CTA: end the line and the bead at the bottom of the copy block.
				var inner = s.querySelector('.abs-final-inner') || s;
				var sr = inner.getBoundingClientRect();
				top = sr.top + sr.height - trackTop;
			} else {
				var head = s.querySelector('h2') || s;
				var hr = head.getBoundingClientRect();
				top = Math.max(hr.top + hr.height / 2 - trackTop, floor);
			}

			nodeTops.push(top);

			var node = document.createElement('span');
			node.className = 'abs-rail-node';
			node.style.top = top + 'px';
			line.appendChild(node);
		});

		traveler = document.createElement('span');
		traveler.className = 'abs-rail-dot abs-rail-traveler';
		line.appendChild(traveler);

		// The traveler is driven by viewport-centre (scrollY + vh/2), so at max page
		// scroll it can only physically reach a certain point. Clamp the LAST node to
		// that reachable position so the bead, the fill and the faint rail all end
		// together instead of the bead stalling short of the final marker.
		var railEl = line.querySelector('.abs-rail');
		if (railEl && nodeTops.length) {
			var li = nodeTops.length - 1;
			var trackTopDoc = track.getBoundingClientRect().top + window.scrollY;
			var maxScrollY = Math.max(0, document.documentElement.scrollHeight - window.innerHeight);
			var maxReach = maxScrollY + window.innerHeight * 0.5 - trackTopDoc;
			var prev = li > 0 ? nodeTops[li - 1] : railEl.offsetTop;
			var lastTop = Math.max(prev + 24, Math.min(nodeTops[li], maxReach));

			nodeTops[li] = lastTop;

			var lastNode = line.querySelectorAll('.abs-rail-node')[li];
			if (lastNode) {
				lastNode.style.top = lastTop + 'px';
			}

			railEl.style.bottom = 'auto';
			railEl.style.height = Math.max(0, lastTop - railEl.offsetTop) + 'px';
		}

		moveTraveler();
	}

	/* ================================================== SCROLL LOOP */
	function update() {
		var vh = window.innerHeight;

		revs = revs.filter(function (el) {
			var r = el.getBoundingClientRect();
			if (r.top < vh * 0.86 && r.bottom > 0) {
				el.classList.add('in');
				el.querySelectorAll('[data-to]').forEach(countUp);
				el.querySelectorAll('[data-pct]').forEach(fillBar);
				return false;
			}
			return true;
		});

		moveTraveler();
	}

	/* ================================================== 5. PER-CARD ENTRANCE */
	function initCardEntrance() {
		if (reduce || !('IntersectionObserver' in window)) {
			document.querySelectorAll('.abs-capcard, .abs-jc').forEach(function (c) {
				c.classList.add('is-in');
			});
			return;
		}

		var capIO = new IntersectionObserver(function (entries) {
			entries.forEach(function (e) {
				if (e.isIntersecting) {
					e.target.classList.add('is-in');
					capIO.unobserve(e.target);
				}
			});
		}, { threshold: 0.2, rootMargin: '0px 0px -8% 0px' });
		document.querySelectorAll('.abs-capcard').forEach(function (c) {
			capIO.observe(c);
		});

		// Journey cards reveal strictly one-by-one as each crosses a low trigger line.
		var jcIO = new IntersectionObserver(function (entries) {
			entries.forEach(function (e) {
				if (e.isIntersecting) {
					e.target.classList.add('is-in');
					jcIO.unobserve(e.target);
				}
			});
		}, { threshold: 0, rootMargin: '0px 0px -32% 0px' });
		document.querySelectorAll('.abs-jc').forEach(function (c) {
			jcIO.observe(c);
		});
	}

	/* ================================================== 6. TESTIMONIAL ROTATION */
	function initTestimonials() {
		var body = document.querySelector('.abs-ts2-body');
		if (!body) {
			return;
		}

		var data = [];
		try {
			data = JSON.parse(body.getAttribute('data-quotes') || '[]');
		} catch (err) {
			return;
		}
		if (data.length < 2) {
			return;
		}

		var card = body.querySelector('.abs-ts2-card');
		var quote = body.querySelector('.abs-ts2-quote');
		var avatar = body.querySelector('.abs-ts2-avatar');
		// Photo and initials are separate nodes so neither is ever written with
		// innerHTML. Both are optional — a card rendered before the photo field
		// existed has only the text node.
		var avatarImg = avatar ? avatar.querySelector('img') : null;
		var avatarText = avatar ? avatar.querySelector('.abs-ts2-initials') : null;
		var name = body.querySelector('.abs-ts2-name');
		// Optional: only present when a quote supplies a role or the shared
		// attribution line is filled in.
		var role = body.querySelector('.abs-ts2-role');
		if (!card || !quote || !avatar || !name) {
			return;
		}

		var nav = body.querySelector('.abs-ts-nav');
		var dots = nav ? Array.prototype.slice.call(nav.querySelectorAll('[data-abs-ts-dot]')) : [];
		var active = 0;
		var paused = false;
		var manual = false;
		var timer = null;

		function render() {
			var t = data[active];
			quote.textContent = '“' + t.q + '”';
			name.textContent = t.by;

			// Photo when the row has one, initials otherwise — the modifier class
			// drops the tinted circle so it cannot show behind the image.
			if (avatarImg && avatarText) {
				if (t.img) {
					avatarImg.src = t.img;
					avatarImg.hidden = false;
					avatarText.textContent = '';
					avatar.classList.add('abs-ts2-avatar--img');
				} else {
					avatarImg.hidden = true;
					avatarText.textContent = t.i;
					avatar.classList.remove('abs-ts2-avatar--img');
				}
			} else {
				avatar.textContent = t.i;
			}
			if (role) {
				role.textContent = t.r || '';
			}

			dots.forEach(function (d, i) {
				var on = i === active;
				d.classList.toggle('is-active', on);
				d.setAttribute('aria-selected', on ? 'true' : 'false');
			});

			// Re-trigger the card's entrance animation, as the prototype's React
			// `key={active}` remount did. The quotes themselves keep rotating under
			// reduced motion — suppressing them would hide content, not just motion.
			if (!reduce) {
				card.style.animation = 'none';
				void card.offsetWidth;
				card.style.animation = '';
			}
		}

		function tick() {
			if (manual || paused || document.hidden) {
				return;
			}
			active = (active + 1) % data.length;
			render();
		}

		function play() {
			if (timer === null) {
				timer = window.setInterval(tick, 2000);
			}
		}

		function halt() {
			if (timer !== null) {
				window.clearInterval(timer);
				timer = null;
			}
		}

		/**
		 * Jumps to a quote. Any manual use ends the autoplay for the rest of the
		 * visit — an unattended 2s rotation that resumes under the visitor's cursor
		 * is the behaviour WCAG 2.2.2 asks us to give them a way out of.
		 */
		function go(i) {
			manual = true;
			halt();
			active = ((i % data.length) + data.length) % data.length;
			render();
		}

		if (nav) {
			var prevBtn = nav.querySelector('[data-abs-ts-prev]');
			var nextBtn = nav.querySelector('[data-abs-ts-next]');

			if (prevBtn) {
				prevBtn.addEventListener('click', function () { go(active - 1); });
			}
			if (nextBtn) {
				nextBtn.addEventListener('click', function () { go(active + 1); });
			}
			nav.addEventListener('click', function (e) {
				var dot = e.target.closest('[data-abs-ts-dot]');
				if (dot) {
					go(parseInt(dot.getAttribute('data-abs-ts-dot'), 10));
				}
			});

			nav.hidden = false;
		}

		body.addEventListener('mouseenter', function () { paused = true; });
		body.addEventListener('mouseleave', function () { paused = false; });
		document.addEventListener('visibilitychange', function () {
			if (document.hidden) {
				halt();
			} else if (!manual) {
				play();
			}
		});

		play();
	}

	/* ================================================== 7. CAPABILITY CAROUSEL */
	function initCapsCarousel() {
		var wall = document.querySelector('.abs-capwall');
		var nav = document.querySelector('.abs-caps-nav');
		if (!wall || !nav) {
			return;
		}

		var cards = Array.prototype.slice.call(wall.querySelectorAll('.abs-capcard'));
		var dotsBox = nav.querySelector('.case-deck-dots');
		var prevBtn = nav.querySelector('[data-abs-caps-prev]');
		var nextBtn = nav.querySelector('[data-abs-caps-next]');
		if (!cards.length || !dotsBox || !prevBtn || !nextBtn) {
			return;
		}

		var behavior = reduce ? 'auto' : 'smooth';
		var pages = 0;
		var ticking = false;

		/** Cards visible at once — CSS owns the 3 / 2 / 1 ladder, not this file. */
		function perView() {
			var n = parseInt(window.getComputedStyle(wall).getPropertyValue('--abs-caps-per'), 10);
			return n > 0 ? n : 1;
		}

		/** Scroll offset of the page starting at card index page * perView. */
		function offsetOf(page) {
			var card = cards[Math.min(page * perView(), cards.length - 1)];
			var max = Math.max(0, wall.scrollWidth - wall.clientWidth);
			return Math.min(card.offsetLeft - cards[0].offsetLeft, max);
		}

		/** Page nearest the current scroll position — touch swipes count too. */
		function current() {
			var best = 0;
			var dist = Infinity;

			for (var i = 0; i < pages; i++) {
				var d = Math.abs(wall.scrollLeft - offsetOf(i));
				if (d < dist) {
					dist = d;
					best = i;
				}
			}

			return best;
		}

		function paintDots() {
			var at = current();
			dotsBox.querySelectorAll('[data-abs-caps-dot]').forEach(function (d, i) {
				var on = i === at;
				d.classList.toggle('is-active', on);
				d.setAttribute('aria-selected', on ? 'true' : 'false');
			});
		}

		// Page count is viewport-dependent, so the dots are built here rather than
		// server-side, and rebuilt only when the count actually changes.
		function buildDots() {
			var count = Math.max(1, Math.ceil(cards.length / perView()));

			if (count !== pages) {
				pages = count;
				dotsBox.textContent = '';

				for (var i = 0; i < count; i++) {
					var dot = document.createElement('button');
					dot.type = 'button';
					dot.className = 'case-deck-dot';
					dot.setAttribute('role', 'tab');
					dot.setAttribute('data-abs-caps-dot', String(i));
					dot.setAttribute('aria-label', 'Show capabilities ' + (i + 1) + ' of ' + count);
					dotsBox.appendChild(dot);
				}
			}

			// Nothing to page through once every card fits on screen.
			nav.hidden = cards.length <= perView();
			paintDots();
		}

		function go(page) {
			wall.scrollTo({ left: offsetOf(((page % pages) + pages) % pages), behavior: behavior });
		}

		prevBtn.addEventListener('click', function () { go(current() - 1); });
		nextBtn.addEventListener('click', function () { go(current() + 1); });
		dotsBox.addEventListener('click', function (e) {
			var dot = e.target.closest('[data-abs-caps-dot]');
			if (dot) {
				go(parseInt(dot.getAttribute('data-abs-caps-dot'), 10));
			}
		});

		wall.addEventListener('scroll', function () {
			if (ticking) {
				return;
			}
			ticking = true;
			requestAnimationFrame(function () {
				ticking = false;
				paintDots();
			});
		}, { passive: true });

		window.addEventListener('resize', buildDots);
		buildDots();
	}

	/* ================================================== BOOT */
	initHeroPlexus();
	initCardEntrance();
	initTestimonials();
	initCapsCarousel();

	window.addEventListener('scroll', update, { passive: true });
	window.addEventListener('resize', update);
	update();

	placeRail();
	window.addEventListener('resize', placeRail);
	window.addEventListener('load', placeRail);

	// Re-measure when the track's height changes (web fonts landing, images
	// decoding, cards revealing). Replaces the prototype's fixed 700/1800ms
	// re-measure timers.
	if ('ResizeObserver' in window) {
		var trackEl = document.querySelector('.abs-story-track');
		if (trackEl) {
			new ResizeObserver(function () {
				placeRail();
			}).observe(trackEl);
		}
	}
})();
