/* global Swiper, intlTelInput */
/* jshint esversion: 5 */
( function () {
	'use strict';

	// ── Swiper ───────────────────────────────────────────────────────────────
	function initSwipers() {
		if ( typeof Swiper === 'undefined' ) { return; }
		document.querySelectorAll( '[data-swiper]' ).forEach( function ( el ) {
			try {
				var instance = new Swiper( el, JSON.parse( el.dataset.swiper ) );
				el._swiperInstance = instance;
			} catch ( e ) {}
		} );
		initCaseSliderNav();
	}

	function initCaseSliderNav() {
		var slider = document.querySelector( '.custom-case-slider' );
		if ( ! slider || ! slider._swiperInstance ) { return; }
		var swiper = slider._swiperInstance;
		var prev = slider.querySelector( '.swiper-button-prev' );
		var next = slider.querySelector( '.swiper-button-next' );
		if ( prev ) {
			prev.addEventListener( 'click', function () { swiper.slidePrev(); } );
		}
		if ( next ) {
			next.addEventListener( 'click', function () { swiper.slideNext(); } );
		}
	}

	// ── intl-tel-input ────────────────────────────────────────────────────────
	function initPhoneInputs() {
		if ( ! window.intlTelInput ) { return; }
		document.querySelectorAll( '[data-iti]' ).forEach( function ( el ) {
			var iti  = intlTelInput( el, { initialCountry: 'us', nationalMode: false } );
			if ( el.dataset.itiDefault ) { iti.setNumber( el.dataset.itiDefault ); }
			var form = el.closest( 'form' );
			if ( form ) {
				form.addEventListener( 'submit', function () {
					var full = iti.getNumber();
					if ( full ) { el.value = full; }
				} );
			}
		} );
	}

	// ── Methodology tabs ──────────────────────────────────────────────────────
	function initMethodologyTabs() {
		document.querySelectorAll( '.tab[data-meth-group]' ).forEach( function ( btn ) {
			btn.addEventListener( 'click', function () {
				var group = btn.dataset.methGroup;
				var idx   = btn.dataset.methIndex;
				document.querySelectorAll( '.tab[data-meth-group="' + group + '"]' ).forEach( function ( b ) { b.classList.remove( 'active' ); } );
				document.querySelectorAll( '.content[data-meth-group="' + group + '"]' ).forEach( function ( p ) { p.classList.remove( 'active' ); } );
				btn.classList.add( 'active' );
				var panel = document.querySelector( '.content[data-meth-group="' + group + '"][data-meth-index="' + idx + '"]' );
				if ( panel ) { panel.classList.add( 'active' ); }
			} );
		} );
	}

	// ── Pricing tabs ──────────────────────────────────────────────────────────
	function initPricingTabs() {
		document.querySelectorAll( '.pt-tab-btn[data-pt-group]' ).forEach( function ( btn ) {
			btn.addEventListener( 'click', function () {
				var group = btn.dataset.ptGroup;
				var key   = btn.dataset.ptKey;
				document.querySelectorAll( '.pt-tab-btn[data-pt-group="' + group + '"]' ).forEach( function ( b ) { b.classList.remove( 'active' ); } );
				document.querySelectorAll( '.box[data-pt-group="' + group + '"]' ).forEach( function ( p ) { p.classList.remove( 'active' ); } );
				btn.classList.add( 'active' );
				var panel = document.querySelector( '.box[data-pt-group="' + group + '"][data-pt-key="' + key + '"]' );
				if ( panel ) { panel.classList.add( 'active' ); }
			} );
		} );
	}

	// ── Stack-new-box tabs ────────────────────────────────────────────────────
	function initStackTabs() {
		document.querySelectorAll( '.Tab[data-snb-group]' ).forEach( function ( btn ) {
			btn.addEventListener( 'click', function () {
				var group = btn.dataset.snbGroup;
				var idx   = btn.dataset.snbIndex;
				document.querySelectorAll( '.Tab[data-snb-group="' + group + '"]' ).forEach( function ( b ) { b.classList.remove( 'active' ); } );
				document.querySelectorAll( '.tab-content[data-snb-group="' + group + '"]' ).forEach( function ( p ) { p.classList.remove( 'active' ); } );
				btn.classList.add( 'active' );
				var panel = document.querySelector( '.tab-content[data-snb-group="' + group + '"][data-snb-index="' + idx + '"]' );
				if ( panel ) { panel.classList.add( 'active' ); }
			} );
		} );
	}

	// ── Types-of-apps tabs ────────────────────────────────────────────────────
	function initTypesOfAppsTabs() {
		document.querySelectorAll( '.toa-tab-btn[data-toa-group]' ).forEach( function ( btn ) {
			btn.addEventListener( 'click', function () {
				var group = btn.dataset.toaGroup;
				var idx   = btn.dataset.toaIndex;
				document.querySelectorAll( '.toa-tab-btn[data-toa-group="' + group + '"]' ).forEach( function ( b ) { b.classList.remove( 'active' ); } );
				document.querySelectorAll( '.tab-details[data-toa-group="' + group + '"]' ).forEach( function ( p ) { p.classList.remove( 'active-tab' ); } );
				btn.classList.add( 'active' );
				var panel = document.querySelector( '.tab-details[data-toa-group="' + group + '"][data-toa-index="' + idx + '"]' );
				if ( panel ) { panel.classList.add( 'active-tab' ); }
			} );
		} );
	}

	// ── Industries-slider tabs ────────────────────────────────────────────────
	function initIndustriesTabs() {
		document.querySelectorAll( '.is-tab-box[data-is-group]' ).forEach( function ( btn ) {
			btn.addEventListener( 'click', function () {
				var group = btn.dataset.isGroup;
				var idx   = btn.dataset.isIndex;
				document.querySelectorAll( '.is-tab-box[data-is-group="' + group + '"]' ).forEach( function ( b ) { b.classList.remove( 'active' ); } );
				document.querySelectorAll( '.is-content-box[data-is-group="' + group + '"]' ).forEach( function ( p ) { p.classList.remove( 'active' ); } );
				btn.classList.add( 'active' );
				var panel = document.querySelector( '.is-content-box[data-is-group="' + group + '"][data-is-index="' + idx + '"]' );
				if ( panel ) { panel.classList.add( 'active' ); }
			} );
		} );
	}

	// ── Progress tabs ─────────────────────────────────────────────────────────
	function initProgressTabs() {
		document.querySelectorAll( '[data-prog-group][data-prog-index]' ).forEach( function ( box ) {
			function activate() {
				var group = box.dataset.progGroup;
				var idx   = box.dataset.progIndex;
				document.querySelectorAll( '[data-prog-group="' + group + '"][data-prog-index]' ).forEach( function ( b ) { b.classList.remove( 'active' ); } );
				document.querySelectorAll( '[data-prog-group="' + group + '"][data-prog-panel]' ).forEach( function ( p ) { p.classList.remove( 'active' ); } );
				box.classList.add( 'active' );
				var panel = document.querySelector( '[data-prog-group="' + group + '"][data-prog-panel="' + idx + '"]' );
				if ( panel ) { panel.classList.add( 'active' ); }
			}
			box.addEventListener( 'click', activate );
			box.addEventListener( 'keypress', function ( e ) { if ( e.key === 'Enter' || e.key === ' ' ) { activate(); } } );
		} );
	}

	// ── Our-process hover cards ───────────────────────────────────────────────
	function initOurProcessCards() {
		document.querySelectorAll( '.card[data-op-group]' ).forEach( function ( card ) {
			card.addEventListener( 'mouseenter', function () {
				var group = card.dataset.opGroup;
				document.querySelectorAll( '.card[data-op-group="' + group + '"]' ).forEach( function ( c ) { c.classList.remove( 'active' ); } );
				card.classList.add( 'active' );
			} );
		} );
	}

	// ── Case-studies tabs ─────────────────────────────────────────────────────
	function initCaseStudiesTabs() {
		var tabs   = document.querySelectorAll( '#tnb-case-tabs li' );
		var panels = document.querySelectorAll( '#tnb-case-content .grid' );
		tabs.forEach( function ( tab ) {
			tab.addEventListener( 'click', function () {
				var idx = parseInt( tab.getAttribute( 'data-tab' ), 10 );
				tabs.forEach( function ( t ) { t.classList.remove( 'active' ); } );
				panels.forEach( function ( p ) { p.classList.remove( 'active' ); } );
				tab.classList.add( 'active' );
				var panel = document.querySelector( '#tnb-case-content .grid[data-panel="' + idx + '"]' );
				if ( panel ) { panel.classList.add( 'active' ); }
			} );
		} );
	}

	// ── Tech-stack tabs ───────────────────────────────────────────────────────
	function initTechStackTabs() {
		var spans    = document.querySelectorAll( '#tnb-stack-listing .tst-tabs > li > span' );
		var contents = document.querySelectorAll( '#tnb-stack-listing .tst-tabs > li > .tst-tabContent' );
		spans.forEach( function ( span, i ) {
			span.addEventListener( 'mouseenter', function () {
				spans.forEach( function ( s ) { s.classList.remove( 'active' ); } );
				contents.forEach( function ( c ) { c.classList.remove( 'active' ); } );
				span.classList.add( 'active' );
				if ( contents[ i ] ) { contents[ i ].classList.add( 'active' ); }
			} );
		} );
		var mLis      = document.querySelectorAll( '#tnb-stack-mobile .tst-tabs li' );
		var mContents = document.querySelectorAll( '#tnb-stack-mobile .tst-tabContent' );
		mLis.forEach( function ( li, i ) {
			li.addEventListener( 'click', function () {
				mLis.forEach( function ( l ) { l.classList.remove( 'active' ); } );
				mContents.forEach( function ( c ) { c.classList.remove( 'active' ); } );
				li.classList.add( 'active' );
				if ( mContents[ i ] ) { mContents[ i ].classList.add( 'active' ); }
			} );
		} );
	}

	// ── FAQ load-more (faq-revamp) ────────────────────────────────────────────
	function initFaqRevamp() {
		document.querySelectorAll( '[data-faq-acc]' ).forEach( function ( btn ) {
			var accId = btn.dataset.faqAcc;
			btn.addEventListener( 'click', function () {
				var hidden = document.querySelectorAll( '#' + accId + ' .fr-hidden' );
				Array.prototype.slice.call( hidden, 0, 5 ).forEach( function ( el ) { el.classList.remove( 'fr-hidden' ); } );
				if ( ! document.querySelectorAll( '#' + accId + ' .fr-hidden' ).length ) {
					btn.style.display = 'none';
				}
			} );
		} );
	}

	// ── FAQ load-more (revamp-faqs) ───────────────────────────────────────────
	function initRevampFaqs() {
		document.querySelectorAll( '[data-rfaq-acc]' ).forEach( function ( btn ) {
			var accId  = btn.dataset.rfaqAcc;
			var moreId = btn.dataset.rfaqMore;
			btn.addEventListener( 'click', function () {
				var hidden = document.querySelectorAll( '#' + accId + ' .rf-item.rf-hidden' );
				Array.prototype.slice.call( hidden, 0, 5 ).forEach( function ( el ) { el.classList.remove( 'rf-hidden' ); } );
				if ( ! document.querySelectorAll( '#' + accId + ' .rf-item.rf-hidden' ).length ) {
					var wrapper = document.getElementById( moreId );
					if ( wrapper ) { wrapper.style.display = 'none'; }
				}
			} );
		} );
	}

	// ── Steps-hire scroll ─────────────────────────────────────────────────────
	function initStepsHire() {
		document.querySelectorAll( '.sh-hire-btn' ).forEach( function ( btn ) {
			btn.addEventListener( 'click', function () {
				var s = document.getElementById( 'form-section' );
				if ( s ) { s.scrollIntoView( { behavior: 'smooth' } ); }
			} );
		} );
	}

	// ── Our-clients-say slider ────────────────────────────────────────────────
	function initOurClientsSay() {
		var slider = document.getElementById( 'tnb-client-slider' );
		if ( ! slider ) { return; }
		var slides  = slider.querySelectorAll( '.sliderInfo' );
		var total   = slides.length;
		var current = 0;

		function getPerView() { return window.innerWidth >= 768 ? 2 : 1; }

		function updateSlider() {
			var perView   = getPerView();
			var maxIdx    = Math.max( 0, total - perView );
			if ( current > maxIdx ) { current = maxIdx; }
			var slideWidth = slider.parentElement.offsetWidth;
			var gap        = 30;
			var itemWidth  = ( slideWidth - gap * ( perView - 1 ) ) / perView;
			slides.forEach( function ( s ) {
				s.style.flex     = '0 0 ' + itemWidth + 'px';
				s.style.maxWidth = itemWidth + 'px';
			} );
			slider.style.transform = 'translateX(-' + ( current * ( itemWidth + gap ) ) + 'px)';
		}

		function goNext() {
			var maxIdx = Math.max( 0, total - getPerView() );
			current = current >= maxIdx ? 0 : current + 1;
			updateSlider();
		}

		function goPrev() {
			var maxIdx = Math.max( 0, total - getPerView() );
			current = current <= 0 ? maxIdx : current - 1;
			updateSlider();
		}

		var btnNext = document.querySelector( '.button-next' );
		var btnPrev = document.querySelector( '.button-prev' );
		if ( btnNext ) { btnNext.addEventListener( 'click', goNext ); }
		if ( btnPrev ) { btnPrev.addEventListener( 'click', goPrev ); }
		if ( btnNext ) {
			btnNext.addEventListener( 'keydown', function ( e ) {
				if ( e.key === 'Enter' || e.key === ' ' ) { e.preventDefault(); goNext(); }
			} );
		}
		if ( btnPrev ) {
			btnPrev.addEventListener( 'keydown', function ( e ) {
				if ( e.key === 'Enter' || e.key === ' ' ) { e.preventDefault(); goPrev(); }
			} );
		}
		window.addEventListener( 'resize', updateSlider );
		updateSlider();
	}

	// ── Testimonials video popup ──────────────────────────────────────────────
	function initVideoModals() {
		document.querySelectorAll( '.testi-video-modal' ).forEach( function ( modal ) {
			var id       = modal.id;
			var iframe   = modal.querySelector( 'iframe' );
			var overlay  = modal.querySelector( '.testi-video-overlay' );
			var closeBtn = modal.querySelector( '.testi-video-close' );

			document.querySelectorAll( '.video-icon[data-modal="' + id + '"]' ).forEach( function ( btn ) {
				btn.addEventListener( 'click', function () {
					iframe.src = btn.dataset.videoUrl;
					modal.style.display = 'flex';
					modal.setAttribute( 'aria-hidden', 'false' );
				} );
			} );

			function closeModal() {
				modal.style.display = 'none';
				modal.setAttribute( 'aria-hidden', 'true' );
				iframe.src = '';
			}

			if ( overlay ) { overlay.addEventListener( 'click', closeModal ); }
			if ( closeBtn ) { closeBtn.addEventListener( 'click', closeModal ); }
		} );

		document.addEventListener( 'keydown', function ( e ) {
			if ( e.key !== 'Escape' ) { return; }
			document.querySelectorAll( '.testi-video-modal' ).forEach( function ( modal ) {
				if ( modal.style.display === 'flex' ) {
					modal.style.display = 'none';
					modal.setAttribute( 'aria-hidden', 'true' );
					modal.querySelector( 'iframe' ).src = '';
				}
			} );
		} );
	}

	// ── SEO progress bars (IntersectionObserver) ─────────────────────────────
	function initSeoProgressBars() {
		var section = document.querySelector( '[data-progress-section]' );
		if ( ! section ) { return; }
		var circumference = 289.02652413026095;
		var triggered = false;
		var observer = new IntersectionObserver( function ( entries ) {
			entries.forEach( function ( entry ) {
				if ( ! entry.isIntersecting || triggered ) { return; }
				triggered = true;
				section.querySelectorAll( '[data-progress-circle]' ).forEach( function ( svg ) {
					var target  = parseInt( svg.dataset.target, 10 ) || 0;
					var path    = svg.querySelector( '.CircularProgressbar-path' );
					var text    = svg.querySelector( '.CircularProgressbar-text' );
					var current = 0;
					var interval = setInterval( function () {
						if ( current >= target ) { clearInterval( interval ); return; }
						current++;
						if ( text ) { text.textContent = current + '%'; }
						if ( path ) { path.style.strokeDashoffset = String( circumference * ( 1 - current / 100 ) ); }
					}, 50 );
				} );
			} );
		}, { threshold: 0.3 } );
		observer.observe( section );
	}

	// ── SEO process step toggle ───────────────────────────────────────────────
	function initSeoStepToggle() {
		var steps = document.querySelectorAll( '[data-seo-step]' );
		if ( ! steps.length ) { return; }

		function activate( step ) {
			steps.forEach( function ( g ) { g.classList.remove( 'active' ); } );
			document.querySelectorAll( '[data-seo-box]' ).forEach( function ( box ) { box.classList.remove( 'active' ); } );
			steps.forEach( function ( g ) {
				if ( g.dataset.seoStep === String( step ) ) { g.classList.add( 'active' ); }
			} );
			var box = document.querySelector( '[data-seo-box="' + step + '"]' );
			if ( box ) { box.classList.add( 'active' ); }
		}

		steps.forEach( function ( g ) {
			g.addEventListener( 'click', function () { activate( g.dataset.seoStep ); } );
			g.addEventListener( 'keydown', function ( e ) {
				if ( e.key === 'Enter' || e.key === ' ' ) { e.preventDefault(); activate( g.dataset.seoStep ); }
			} );
		} );
	}

	// ── Counter section (IntersectionObserver) ───────────────────────────────
	function initCounterSec() {
		document.querySelectorAll( '.counterSec[data-counter-sec]' ).forEach( function ( section ) {
			var triggered = false;
			var observer  = new IntersectionObserver( function ( entries ) {
				entries.forEach( function ( entry ) {
					if ( ! entry.isIntersecting || triggered ) { return; }
					triggered = true;
					section.querySelectorAll( '[data-counter-target]' ).forEach( function ( el ) {
						var target   = parseInt( el.dataset.counterTarget, 10 ) || 0;
						var sign     = el.dataset.counterSign || '';
						var current  = 0;
						var interval = setInterval( function () {
							if ( current >= target ) {
								clearInterval( interval );
								el.textContent = target + sign;
								return;
							}
							current++;
							el.textContent = current + sign;
						}, 50 );
					} );
				} );
			}, { threshold: 0.5 } );
			observer.observe( section );
		} );
	}

	// ── Industry-features tabs ────────────────────────────────────────────────
	function initIndustryFeaturesTabs() {
		document.querySelectorAll( '.if-tab-btn[data-if-group]' ).forEach( function ( btn ) {
			function activate() {
				var group = btn.dataset.ifGroup;
				var idx   = btn.dataset.ifIndex;
				document.querySelectorAll( '.if-tab-btn[data-if-group="' + group + '"]' ).forEach( function ( b ) { b.classList.remove( 'active-tab' ); } );
				document.querySelectorAll( '.tab-content[data-if-group="' + group + '"]' ).forEach( function ( p ) { p.classList.remove( 'active-tab-content' ); } );
				btn.classList.add( 'active-tab' );
				var panel = document.querySelector( '.tab-content[data-if-group="' + group + '"][data-if-index="' + idx + '"]' );
				if ( panel ) { panel.classList.add( 'active-tab-content' ); }
			}
			btn.addEventListener( 'click', activate );
			btn.addEventListener( 'keypress', function ( e ) { if ( e.key === 'Enter' || e.key === ' ' ) { activate(); } } );
		} );
	}

	// ── Our-expertise tabs ────────────────────────────────────────────────────
	function initOurExpertiseTabs() {
		document.querySelectorAll( '.oe-tab-btn[data-oe-group]' ).forEach( function ( btn ) {
			function activate() {
				var group = btn.dataset.oeGroup;
				var idx   = btn.dataset.oeIndex;
				document.querySelectorAll( '.oe-tab-btn[data-oe-group="' + group + '"]' ).forEach( function ( b ) { b.classList.remove( 'active' ); } );
				document.querySelectorAll( '.oe-tab-content[data-oe-group="' + group + '"]' ).forEach( function ( p ) { p.classList.remove( 'active' ); } );
				btn.classList.add( 'active' );
				var panel = document.querySelector( '.oe-tab-content[data-oe-group="' + group + '"][data-oe-index="' + idx + '"]' );
				if ( panel ) { panel.classList.add( 'active' ); }
			}
			btn.addEventListener( 'click', activate );
			btn.addEventListener( 'keypress', function ( e ) { if ( e.key === 'Enter' || e.key === ' ' ) { activate(); } } );
		} );
	}

	// ── Hiring tabs ───────────────────────────────────────────────────────────
	function initHiringTabs() {
		document.querySelectorAll( '.hiring-tab-btn[data-hr-group]' ).forEach( function ( btn ) {
			function activate() {
				var group = btn.dataset.hrGroup;
				var tab   = btn.dataset.hrTab;
				document.querySelectorAll( '.hiring-tab-btn[data-hr-group="' + group + '"]' ).forEach( function ( b ) { b.classList.remove( 'active' ); } );
				document.querySelectorAll( '.hiring-tab-content[data-hr-group="' + group + '"]' ).forEach( function ( p ) { p.classList.remove( 'active' ); } );
				btn.classList.add( 'active' );
				var panel = document.querySelector( '.hiring-tab-content[data-hr-group="' + group + '"][data-hr-panel="' + tab + '"]' );
				if ( panel ) { panel.classList.add( 'active' ); }
			}
			btn.addEventListener( 'click', activate );
			btn.addEventListener( 'keypress', function ( e ) { if ( e.key === 'Enter' || e.key === ' ' ) { activate(); } } );
		} );
	}

	// ── Banner read-more toggle ───────────────────────────────────────────────
	function initBannerReadMore() {
		document.querySelectorAll( '[data-read-more-btn]' ).forEach( function ( btn ) {
			var wrap = btn.closest( '.mainBanner' ) && btn.closest( '.mainBanner' ).querySelector( '[data-read-more]' );
			if ( ! wrap ) { return; }
			btn.addEventListener( 'click', function () {
				var expanded = wrap.classList.toggle( 'custom-show-more' );
				wrap.classList.toggle( 'custom-hide-more', ! expanded );
				btn.textContent = expanded ? 'Read Less' : 'Read More';
				if ( ! expanded ) { wrap.scrollIntoView( { behavior: 'smooth', block: 'nearest' } ); }
			} );
		} );
	}

	// ── StackServices tabs ────────────────────────────────────────────────────
	function initStackServices() {
		document.querySelectorAll( '.tabBox[data-ss-group]' ).forEach( function ( btn ) {
			btn.addEventListener( 'click', function () {
				var group = btn.dataset.ssGroup;
				var idx   = btn.dataset.ssIndex;
				document.querySelectorAll( '.tabBox[data-ss-group="' + group + '"]' ).forEach( function ( b ) { b.classList.remove( 'active' ); } );
				document.querySelectorAll( '.contentBox[data-ss-group="' + group + '"]' ).forEach( function ( p ) { p.classList.remove( 'active' ); } );
				btn.classList.add( 'active' );
				var panel = document.querySelector( '.contentBox[data-ss-group="' + group + '"][data-ss-index="' + idx + '"]' );
				if ( panel ) { panel.classList.add( 'active' ); }
			} );
		} );
	}

	// ── HowWeDeliver tabs ─────────────────────────────────────────────────────
	function initHowWeDeliver() {
		document.querySelectorAll( '.hwd-tab-btn[data-hwd-group]' ).forEach( function ( btn ) {
			btn.addEventListener( 'click', function () {
				var group = btn.dataset.hwdGroup;
				var idx   = btn.dataset.hwdIndex;
				document.querySelectorAll( '.hwd-tab-btn[data-hwd-group="' + group + '"]' ).forEach( function ( b ) { b.classList.remove( 'active' ); } );
				document.querySelectorAll( '.hwd-tab-content[data-hwd-group="' + group + '"]' ).forEach( function ( p ) { p.classList.remove( 'active' ); } );
				btn.classList.add( 'active' );
				var panel = document.querySelector( '.hwd-tab-content[data-hwd-group="' + group + '"][data-hwd-index="' + idx + '"]' );
				if ( panel ) { panel.classList.add( 'active' ); }
			} );
		} );
	}

	// ── App Development Section read-more toggle ─────────────────────────────
	function initAppDevReadMore() {
		document.querySelectorAll( '[data-ad-toggle]' ).forEach( function ( btn ) {
			btn.addEventListener( 'click', function () {
				var targetId = btn.dataset.adToggle;
				var target   = document.getElementById( targetId );
				if ( ! target ) { return; }
				var expanded = target.classList.contains( 'custom-show-more' );
				target.classList.toggle( 'custom-hide-more', expanded );
				target.classList.toggle( 'custom-show-more', ! expanded );
				btn.textContent = expanded ? 'Read More' : 'Read Less';
			} );
		} );
	}

	// ── Hire-page engagement model tabs ──────────────────────────────────────
	function initHireTabs() {
		document.querySelectorAll( '.ht-tab-btn[data-ht-group]' ).forEach( function ( btn ) {
			btn.addEventListener( 'click', function () {
				var group = btn.dataset.htGroup;
				var key   = btn.dataset.htKey;
				document.querySelectorAll( '.ht-tab-btn[data-ht-group="' + group + '"]' ).forEach( function ( b ) { b.classList.remove( 'active' ); } );
				document.querySelectorAll( '.box[data-ht-group="' + group + '"]' ).forEach( function ( p ) { p.classList.remove( 'active' ); } );
				btn.classList.add( 'active' );
				var panel = document.querySelector( '.box[data-ht-group="' + group + '"][data-ht-key="' + key + '"]' );
				if ( panel ) { panel.classList.add( 'active' ); }
			} );
		} );
	}

	// ── Fancybox lightbox ─────────────────────────────────────────────────────
	// Mirror React Fancybox component: bind per-container so each .main-fancybox
	// wrapper is its own independent gallery (1 item = no arrows/thumbnails).
	function initFancybox() {
		if ( typeof Fancybox === 'undefined' ) { return; }
		document.querySelectorAll( '.main-fancybox' ).forEach( function ( container ) {
			Fancybox.bind( container, '[data-fancybox]', {
				Carousel: { infinite: false },
			} );
		} );
	}

	// ── FixCarSharer user-needs tabs ──────────────────────────────────────────
	function initFcsTabs() {
		var container = document.querySelector( '.fcs-user-need-main .tab-container' );
		if ( ! container ) { return; }
		var buttons = container.querySelectorAll( '[data-fcs-tab]' );
		var panels  = container.querySelectorAll( '[data-fcs-panel]' );
		buttons.forEach( function ( btn ) {
			btn.addEventListener( 'click', function () {
				var target = btn.dataset.fcsTab;
				buttons.forEach( function ( b ) { b.classList.remove( 'active' ); } );
				panels.forEach( function ( p ) { p.style.display = 'none'; } );
				btn.classList.add( 'active' );
				var panel = container.querySelector( '[data-fcs-panel="' + target + '"]' );
				if ( panel ) { panel.style.display = 'block'; }
			} );
		} );
	}

	// ── Streamline-Live timeline tabs ────────────────────────────────────────
	function initStreamlineLiveTabs() {
		document.querySelectorAll( '[data-slive-tab-btn]' ).forEach( function ( btn ) {
			btn.addEventListener( 'click', function () {
				var container = btn.closest( '.timeline-info' );
				if ( ! container ) { return; }
				var idx = btn.dataset.sliveTabIdx;
				container.querySelectorAll( '[data-slive-tab-btn]' ).forEach( function ( b ) { b.classList.remove( 'active' ); } );
				container.querySelectorAll( '.slive-tab-panel' ).forEach( function ( p ) { p.classList.remove( 'active' ); } );
				btn.classList.add( 'active' );
				var panel = container.querySelector( '.slive-tab-panel[data-slive-tab-idx="' + idx + '"]' );
				if ( panel ) { panel.classList.add( 'active' ); }
			} );
		} );
	}

	// ── About Info Counters ───────────────────────────────────────────────────
	function initAboutInfoCounters() {
		if ( ! window.IntersectionObserver ) { return; }
		document.querySelectorAll( '[data-counter-end]' ).forEach( function ( el ) {
			var observed = false;
			var observer = new IntersectionObserver( function ( entries ) {
				entries.forEach( function ( entry ) {
					if ( entry.isIntersecting && ! observed ) {
						observed = true;
						observer.disconnect();
						var end      = parseInt( el.dataset.counterEnd, 10 );
						var suffix   = el.dataset.counterSuffix || '';
						var span     = el.querySelector( 'span' );
						var duration = 2000;
						var startTime = null;
						function step( ts ) {
							if ( ! startTime ) { startTime = ts; }
							var progress = Math.min( ( ts - startTime ) / duration, 1 );
							var current  = Math.floor( progress * end );
							el.childNodes[0].nodeValue = current;
							if ( progress < 1 ) { requestAnimationFrame( step ); }
						}
						requestAnimationFrame( step );
					}
				} );
			}, { threshold: 0.5 } );
			observer.observe( el );
		} );
	}

	 
  // ── Platform FAQs accordion (.platform-faqs / .pfaq-*) ──────────────────
  // One item open at a time. Clicking an open item closes it.
  function initPlatformFaqs() {
    document
      .querySelectorAll(".platform-faqs .pfaq-list")
      .forEach(function (list) {
        list.querySelectorAll(".pfaq-q").forEach(function (btn) {
          btn.addEventListener("click", function () {
            var item = btn.closest(".pfaq-item");
            var isOpen = item.classList.contains("is-open");

            list.querySelectorAll(".pfaq-item").forEach(function (el) {
              el.classList.remove("is-open");
              el.querySelector(".pfaq-q").setAttribute(
                "aria-expanded",
                "false",
              );
            });

            if (!isOpen) {
              item.classList.add("is-open");
              btn.setAttribute("aria-expanded", "true");
            }
          });
        });
      });
  }

  // ── IH Case Studies deck (ih-cases-v2) ───────────────────────────────────
  function initIhCaseDeck() {
    document.querySelectorAll("[data-ih-cases-deck]").forEach(function (deck) {
      var cards = Array.from(deck.querySelectorAll(".case-card"));
      var total = cards.length;
      if (total < 2) {
        return;
      }
      var active = 0;
      var timer = null;
      var section = deck.closest("[data-ih-cases-deck-wrap]");
      var dots = section
        ? Array.from(section.querySelectorAll("[data-ih-cases-dot]"))
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
          card.setAttribute("aria-current", i === active ? "true" : "false");
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
        var prev = section.querySelector("[data-ih-cases-prev]");
        var next = section.querySelector("[data-ih-cases-next]");
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
            go(parseInt(dot.getAttribute("data-ih-cases-dot"), 10));
            startTimer();
          });
        });
      }

      update();
      startTimer();
    });
  }

 // ── Industry Experts — click-only thumbnail rail ─────────────────────────
  function initIhExperts() {
    document
      .querySelectorAll("[data-ih-experts-wrap]")
      .forEach(function (section) {
        var thumbs = Array.from(
          section.querySelectorAll("[data-ih-experts-thumb]"),
        );
        var cards = Array.from(
          section.querySelectorAll("[data-ih-experts-card]"),
        );
        var total = thumbs.length;
        if (total < 1) {
          return;
        }
        var active = 0;

        function getOrder(i) {
          var distance = (i - active + total) % total;
          if (i === active) {
            return 2;
          }
          if (distance === 1) {
            return 3;
          }
          if (distance === total - 1) {
            return 1;
          }
          return 0;
        }

        function update(idx) {
          active = idx;
          thumbs.forEach(function (thumb, i) {
            thumb.classList.toggle("is-active", i === active);
            thumb.setAttribute(
              "aria-selected",
              i === active ? "true" : "false",
            );
            thumb.style.order = getOrder(i);
          });
          cards.forEach(function (card, i) {
            if (i === active) {
              card.classList.add("is-active");
              card.style.animation = "none";
              card.offsetHeight; // reflow to restart animation
              card.style.animation = "";
            } else {
              card.classList.remove("is-active");
            }
          });
        }

        thumbs.forEach(function (thumb, i) {
          thumb.addEventListener("click", function () {
            update(i);
          });
        });

        update(0);
      });
  }

  // ── Industry Testimonials — DOM Shifting Carousel (Infinite Loop Without Clones) ────
function initIhTestimonials() {
  document.querySelectorAll("[data-ih-ts-wrap]").forEach(function (section) {
    var row = section.querySelector("[data-ih-ts-row]");
    var track = section.querySelector("[data-ih-ts-track]");
    var dots = Array.from(section.querySelectorAll("[data-ih-ts-dot]"));
    
    // Original total items check karny k liye initial cards count lete hain
    var total = section.querySelectorAll("[data-ih-ts-card]").length;
    if (!row || !track || total < 2) {
      return;
    }

    var timer = null;
    var GAP = 24;
    var cardW = 0;
    var resizeT = null;
    var isTransitioning = false; // Double click ya fast animation glitch rokne ke liye

    // Current active card ka tracking index (0 to total-1)
    // Chunkay cards shuffle hongi, ham data-attribute se pehchanenge konsi card active hai
    var activeRealIndex = 0;

    function visibleCount() {
      return row.offsetWidth >= 1024 ? 3 : 1;
    }

    function setCardWidths() {
      var rowW = row.offsetWidth;
      var vis = visibleCount();
      cardW = Math.floor((rowW - GAP * (vis - 1)) / vis);
      
      // Dynamic lists kyunki cards ka order change hota rahega DOM mein
      var allSlides = Array.from(track.children);
      allSlides.forEach(function (s) {
        s.style.width = cardW + "px";
      });
    }

    // Is function se center card aligned rehti hai
    function applyTranslate(animate, customOffsetIndex) {
      var index = customOffsetIndex !== undefined ? customOffsetIndex : 1; 
      // 1 index isliye kyunki center design ke mutabik hamesha index 1 (yaani 2nd card) center me honi chahiye 3 visible items me
      if (visibleCount() === 1) index = 0; // Mobile par pehli card center hogi

      var offset = Math.round((row.offsetWidth - cardW) / 2) - index * (cardW + GAP);
      
      if (!animate) {
        track.style.transition = "none";
        track.style.transform = "translateX(" + offset + "px)";
        track.offsetHeight; // force reflow
        track.style.transition = "transform 0.5s ease-in-out"; // smooth slide custom transition
      } else {
        track.style.transform = "translateX(" + offset + "px)";
      }
    }

    function updateClassesAndDots() {
      var allSlides = Array.from(track.children);
      allSlides.forEach(function (s) {
        s.classList.remove("is-l", "is-c", "is-r");
      });

      var centerIdx = visibleCount() >= 3 ? 1 : 0;
      
      if (allSlides[centerIdx]) {
        allSlides[centerIdx].classList.add("is-c");
        // Active real index update karte hain dot highlights ke liye
        var originalIdx = parseInt(allSlides[centerIdx].getAttribute("data-ih-ts-dot-idx"), 10);
        if (!isNaN(originalIdx)) {
          activeRealIndex = originalIdx;
        }
      }
      
      if (visibleCount() >= 3) {
        if (allSlides[centerIdx - 1]) allSlides[centerIdx - 1].classList.add("is-l");
        if (allSlides[centerIdx + 1]) allSlides[centerIdx + 1].classList.add("is-r");
      }

      // Dots highlight update
      dots.forEach(function (dot, i) {
        dot.classList.toggle("is-active", i === activeRealIndex);
      });
    }

    // Agli slide par ghoom ke jaane ka function
    function nextSlide() {
      if (isTransitioning) return;
      isTransitioning = true;

      // 1 step aage move karte hain animation ke sath
      var targetIndex = visibleCount() >= 3 ? 2 : 1;
      applyTranslate(true, targetIndex);

      // Animation khatam hone par elements ko shift karte hain takay loop bana rahe
      setTimeout(function () {
        var firstChild = track.firstElementChild;
        track.appendChild(firstChild); // Pehli card utha kar aakhiri me phenk di
        applyTranslate(false); // Bina animation position reset ki
        updateClassesAndDots();
        isTransitioning = false;
      }, 500); // 500ms transition time ke barabar hona chahiye
    }

    // Pichli slide par ghoom ke jaane ka function
    function prevSlide() {
      if (isTransitioning) return;
      isTransitioning = true;

      // Piche shift karne ke liye pehle DOM change karte hain bina animation ke
      var lastChild = track.lastElementChild;
      track.insertBefore(lastChild, track.firstElementChild); // Aakhiri card pehle le aaye
      
      var initialIndex = visibleCount() >= 3 ? 2 : 1;
      applyTranslate(false, initialIndex); // Silent shift

      // Ab smooth transition se wapas center par slide karte hain
      setTimeout(function () {
        applyTranslate(true);
        updateClassesAndDots();
        setTimeout(function () {
          isTransitioning = false;
        }, 500);
      }, 20);
    }

    function startTimer() {
      clearInterval(timer);
      timer = setInterval(function () {
        nextSlide();
      }, 7000);
    }

    // HTML elements par unka asli sequence save karne ke liye index set karte hain (dots sync ke liye)
    Array.from(track.children).forEach(function (card, idx) {
      card.setAttribute("data-ih-ts-dot-idx", idx);
    });

    // Initial setups
    setCardWidths();
    // Shuruat me agar 3 visible hain, to balance ke liye last card ko pehle le aate hain takay index 1 center ban sakay
    if (visibleCount() >= 3) {
      track.insertBefore(track.lastElementChild, track.firstElementChild);
    }
    applyTranslate(false);
    updateClassesAndDots();
    startTimer();

    // Event Listeners
    window.addEventListener("resize", function () {
      clearTimeout(resizeT);
      resizeT = setTimeout(function () {
        setCardWidths();
        applyTranslate(false);
        updateClassesAndDots();
      }, 80);
    });

    row.addEventListener("mouseenter", function () {
      clearInterval(timer);
    });
    row.addEventListener("mouseleave", function () {
      startTimer();
    });

    var prev = section.querySelector("[data-ih-ts-prev]");
    var next = section.querySelector("[data-ih-ts-next]");
    if (prev) {
      prev.addEventListener("click", function () {
        prevSlide();
        startTimer();
      });
    }
    if (next) {
      next.addEventListener("click", function () {
        nextSlide();
        startTimer();
      });
    }

    // Dots Click Logic (Ghoom kar usi index par laane ke liye)
    dots.forEach(function (dot) {
      dot.addEventListener("click", function () {
        var targetRealIdx = parseInt(dot.getAttribute("data-ih-ts-dot"), 10);
        if (targetRealIdx === activeRealIndex || isTransitioning) return;

        // Loop chalayega jab tak target slide center me nahi aa jati
        var safetyCounter = 0;
        var clickInterval = setInterval(function () {
          if (activeRealIndex === targetRealIdx || safetyCounter > total) {
            clearInterval(clickInterval);
          } else {
            nextSlide();
          }
          safetyCounter++;
        }, 150); // fast transitions to the dot
        startTimer();
      });
    });
  });
}

  // ── Boot ──────────────────────────────────────────────────────────────────
  function boot() {
    initPhoneInputs();
    initMethodologyTabs();
    initPricingTabs();
    initStackTabs();
    initTypesOfAppsTabs();
    initIndustriesTabs();
    initProgressTabs();
    initOurProcessCards();
    initCaseStudiesTabs();
    initTechStackTabs();
    initFaqRevamp();
    initRevampFaqs();
    initStepsHire();
    initOurClientsSay();
    initVideoModals();
    initBannerReadMore();
    initSeoProgressBars();
    initSeoStepToggle();
    initOurExpertiseTabs();
    initHiringTabs();
    initCounterSec();
    initIndustryFeaturesTabs();
    initStackServices();
    initHowWeDeliver();
    initAppDevReadMore();
    initHireTabs();
    initFcsTabs();
    initStreamlineLiveTabs();
    initAboutInfoCounters();
    initPlatformFaqs();
    initIhCaseDeck();
    initIhExperts();
    initIhTestimonials();

    // Swiper waits for its library (loaded async from CDN)
    if (typeof Swiper !== "undefined") {
      initSwipers();
    } else {
      var swiperPoll = setInterval(function () {
        if (typeof Swiper !== "undefined") {
          clearInterval(swiperPoll);
          initSwipers();
        }
      }, 50);
    }

    // Fancybox waits for its library (loaded async from CDN)
    if (typeof Fancybox !== "undefined") {
      initFancybox();
    } else {
      var fancyboxPoll = setInterval(function () {
        if (typeof Fancybox !== "undefined") {
          clearInterval(fancyboxPoll);
          initFancybox();
        }
      }, 50);
    }
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", boot);
  } else {
    boot();
  }
})();

/* ── HD. Comparison filter chips (hd_compare) ──────────────────────── */
(function () {
  document.querySelectorAll(".hd-compare").forEach(function (sec) {
    var chips = sec.querySelectorAll(".hd-chip");
    var dataRows = sec.querySelectorAll(".hd-compare-row[data-tags]");

    chips.forEach(function (chip) {
      chip.addEventListener("click", function () {
        chips.forEach(function (c) {
          c.classList.remove("active");
        });
        chip.classList.add("active");

        var filter = chip.getAttribute("data-filter");
        dataRows.forEach(function (row) {
          if (filter === "all") {
            row.style.display = "";
          } else {
            var tags = row.getAttribute("data-tags").split(",");
            row.style.display = tags.indexOf(filter) > -1 ? "" : "none";
          }
        });
      });
    });
  });
})();

/* ── HD. Industry Experts expanding strip (hd_experts) ─────────────── */
(function () {
  document.querySelectorAll(".hd-experts").forEach(function (sec) {
    var cards = sec.querySelectorAll(".hd-strip-card");

    function setActive(idx) {
      cards.forEach(function (card, i) {
        var isActive = i === idx;
        card.classList.toggle("is-active", isActive);
        var titleEl = card.querySelector(".hd-strip-card-title");
        if (titleEl) {
          titleEl.textContent = isActive
            ? card.getAttribute("data-title-full")
            : card.getAttribute("data-title-short");
        }
      });
    }

    cards.forEach(function (card, i) {
      card.addEventListener("click", function () {
        setActive(i);
      });
      card.addEventListener("mouseenter", function () {
        setActive(i);
      });
    });
  });
})();

/* =========================================================
   Engineering Setup Advisor (.hd-advisor)
   ========================================================= */
(function () {
  var SVG_CHECK =
    '<svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="3,8 6.5,11.5 13,4.5"/></svg>';
  var SVG_ARROW =
    '<svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="2" y1="8" x2="14" y2="8"/><polyline points="9,3 14,8 9,13"/></svg>';
  var SVG_ARROWL =
    '<svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="14" y1="8" x2="2" y2="8"/><polyline points="7,3 2,8 7,13"/></svg>';
  var SVG_SPARKLE =
    '<svg viewBox="0 0 16 16" fill="currentColor"><path d="M8 1l1.5 4.5L14 7l-4.5 1.5L8 13l-1.5-4.5L2 7l4.5-1.5L8 1z"/></svg>';
  var SVG_CROWN =
    '<svg viewBox="0 0 16 16" fill="currentColor"><path d="M2 12h12l1-8-4 3-3-5-3 5-4-3 1 8z"/></svg>';
  var SVG_CHECKGR =
    '<svg viewBox="0 0 16 16" fill="none" stroke="#29D27D" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="3,8 6.5,11.5 13,4.5"/></svg>';

  function esc(str) {
    return String(str)
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;");
  }

  /* answers[] stores option INDEX (integer), not key string.
   * Look up the key from steps data for semantic result mapping. */
  function getKey(steps, stepIdx, ansIdx) {
    if (ansIdx === null || ansIdx === undefined) return "";
    var opts = steps[stepIdx] && steps[stepIdx].options;
    return opts && opts[ansIdx] ? opts[ansIdx].key || "" : "";
  }

  function computeResult(answers, steps) {
    var lastIdx = steps.length - 1;
    var lastAns = answers[lastIdx];
    var lastOpt =
      lastAns !== null && steps[lastIdx].options[lastAns]
        ? steps[lastIdx].options[lastAns]
        : null;
    if (lastOpt && lastOpt.is_other) return "custom";

    var key0 = getKey(steps, 0, answers[0]);
    var key1 = getKey(steps, 1, answers[1]);
    if (key0 === "new_product") return "full";
    var scaling = key0 === "scaling" || key0 === "expanding";
    if (scaling && (key1 === "hiring" || key1 === "expertise")) return "senior";
    if (key1 === "delivery" || key1 === "coordination") return "dedicated";
    if (key1 === "maintain") return "full";
    return "dedicated";
  }

  function initAdvisor(dataEl) {
    var data;
    try {
      data = JSON.parse(dataEl.textContent);
    } catch (e) {
      return;
    }
    var shell = document.getElementById(data.shell);
    if (!shell) return;

    var panelEl = shell.querySelector(".hd-advisor-panel");
    var resultEl = shell.querySelector(".hd-advisor-result");
    if (!panelEl || !resultEl) return;

    var steps = data.steps;
    var results = data.results;
    var total = data.total;
    var step = 0;
    var answers = new Array(total).fill(null);
    var otherText = "";
    var done = false;

    function isOtherSelected() {
      var ans = answers[step];
      if (ans === null || ans === undefined) return false;
      var opt = steps[step].options[ans];
      return !!(opt && opt.is_other);
    }

    function renderPanel() {
      var s = steps[step];
      var progressHtml = "";
      for (var i = 0; i < total; i++) {
        var cls = i < step ? "done" : i === step ? "active" : "";
        progressHtml +=
          "<span" + (cls ? ' class="' + cls + '"' : "") + "></span>";
      }

      var optsHtml = "";
      for (var j = 0; j < s.options.length; j++) {
        var opt = s.options[j];
        var isSel = answers[step] === j;
        optsHtml +=
          '<button type="button" class="hd-advisor-option' +
          (isSel ? " selected" : "") +
          '"' +
          ' data-idx="' +
          j +
          '"' +
          ' data-is-other="' +
          (opt.is_other ? "1" : "0") +
          '">' +
          "<span>" +
          esc(opt.text) +
          "</span>" +
          '<span class="hd-advisor-option-check">' +
          SVG_CHECK +
          "</span>" +
          "</button>";
      }

      var otherHtml = "";
      if (isOtherSelected()) {
        otherHtml =
          '<div class="hd-advisor-other is-visible">' +
          '<label class="hd-advisor-other-label">' +
          esc(data.other_label) +
          "</label>" +
          '<textarea class="hd-advisor-input" placeholder="' +
          esc(data.other_ph) +
          '"></textarea>' +
          '<button type="button" class="hd-btn hd-btn-primary hd-advisor-other-submit" style="margin-top:12px;padding:12px 22px;font-size:14px;">Get my recommendation</button>' +
          "</div>";
      }

      var backDisabled = step === 0 && !done ? " disabled" : "";
      panelEl.innerHTML =
        '<div class="hd-advisor-progress">' +
        progressHtml +
        "</div>" +
        '<div class="hd-advisor-step-label">Step ' +
        (step + 1) +
        " of " +
        total +
        "</div>" +
        '<h3 class="hd-advisor-question">' +
        esc(s.question) +
        "</h3>" +
        '<div class="hd-advisor-options">' +
        optsHtml +
        otherHtml +
        "</div>" +
        '<div class="hd-advisor-nav">' +
        '<button type="button" class="hd-advisor-back"' +
        backDisabled +
        ">" +
        SVG_ARROWL +
        " Back</button>" +
        '<button type="button" class="hd-advisor-reset">Start over</button>' +
        "</div>";

      panelEl.querySelectorAll(".hd-advisor-option").forEach(function (btn) {
        btn.addEventListener("click", function () {
          var idx = parseInt(btn.getAttribute("data-idx"), 10);
          var isOther = btn.getAttribute("data-is-other") === "1";
          answers[step] = idx;
          if (step === total - 1) {
            if (!isOther) {
              done = true;
              render();
            } else {
              renderPanel();
            }
          } else {
            renderPanel();
            setTimeout(function () {
              step++;
              done = false;
              render();
            }, 220);
          }
        });
      });

      var ta = panelEl.querySelector(".hd-advisor-input");
      if (ta) {
        ta.value = otherText;
        ta.addEventListener("input", function () {
          otherText = ta.value;
        });
      }

      var submitBtn = panelEl.querySelector(".hd-advisor-other-submit");
      if (submitBtn) {
        submitBtn.addEventListener("click", function () {
          done = true;
          render();
        });
      }

      var backBtn = panelEl.querySelector(".hd-advisor-back");
      if (backBtn) {
        backBtn.addEventListener("click", function () {
          if (done) {
            done = false;
            render();
            return;
          }
          if (step > 0) {
            step--;
            render();
          }
        });
      }

      var resetBtn = panelEl.querySelector(".hd-advisor-reset");
      if (resetBtn) {
        resetBtn.addEventListener("click", function () {
          step = 0;
          answers = new Array(total).fill(null);
          otherText = "";
          done = false;
          render();
        });
      }
    }

    function renderResult() {
      if (done) {
        var resKey = computeResult(answers, steps);
        var res = results[resKey] || results[Object.keys(results)[0]];
        if (!res) {
          resultEl.innerHTML = "";
          return;
        }

        var fitHtml = "";
        for (var i = 0; i < res.fit.length; i++) {
          fitHtml += "<li>" + SVG_CHECKGR + " " + esc(res.fit[i]) + "</li>";
        }

        resultEl.innerHTML =
          '<div class="hd-advisor-result-badge">' +
          SVG_SPARKLE +
          " Recommended Setup</div>" +
          '<div class="hd-advisor-result-title">' +
          esc(res.title) +
          "</div>" +
          '<div class="hd-advisor-result-desc">' +
          esc(res.desc) +
          "</div>" +
          '<div class="hd-advisor-result-model">' +
          SVG_CROWN +
          " " +
          esc(res.model) +
          "</div>" +
          '<div class="hd-advisor-result-fit-label">Best fit for</div>' +
          '<ul class="hd-advisor-result-fit">' +
          fitHtml +
          "</ul>" +
          '<div class="hd-advisor-result-actions">' +
          (res.primary_url
            ? '<a href="' +
              esc(res.primary_url) +
              '" class="hd-btn hd-btn-primary">' +
              esc(res.primary_text) +
              "</a>"
            : '<a class="hd-btn hd-btn-primary tnb-popup-trigger">' +
              esc(res.primary_text) +
              "</a>") +
          (res.secondary_url
            ? '<a href="' +
              esc(res.secondary_url) +
              '" class="hd-btn hd-btn-secondary">' +
              esc(res.secondary_text) +
              "</a>"
            : '<a class="hd-btn hd-btn-secondary tnb-popup-trigger">' +
              esc(res.secondary_text) +
              "</a>");
        ("</div>");
      } else {
        var v = steps[step];
        resultEl.innerHTML =
          '<div class="hd-advisor-visual">' +
          (v.visual_img
            ? '<img src="' +
              esc(v.visual_img) +
              '" alt="' +
              esc(v.visual_img_alt) +
              '" class="hd-advisor-visual-img" loading="lazy">'
            : "") +
          '<div class="hd-advisor-visual-overlay"></div>' +
          '<div class="hd-advisor-visual-content">' +
          '<h3 class="hd-advisor-visual-caption">' +
          esc(v.visual_caption) +
          "</h3>" +
          '<p class="hd-advisor-visual-sub">' +
          esc(v.visual_sub) +
          "</p>" +
          "</div>" +
          "</div>";
      }
    }

    function render() {
      renderPanel();
      renderResult();
    }

    render();
  }

  document
    .querySelectorAll('script.hd-advisor-data[type="application/json"]')
    .forEach(initAdvisor);
})();

/* ─────────────────────────────────────────────────────────────────────────
   SvServiceCircleViz — canvas animations
   Ports of SvServiceCircleViz React component (services-page-1.jsx).
   Initialised for every .sv-svc element on the page.
   ───────────────────────────────────────────────────────────────────────── */
(function () {
  "use strict";

  var reduce =
    window.matchMedia &&
    window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var rand = function (a, b) {
    return a + Math.random() * (b - a);
  };

  /* ── Particle canvas (.sv-svc-particles) ─────────────────────────────
   * 34 red glowing dots drift left-to-right with sinusoidal vertical wobble.
   */
  function initParticles(canvas) {
    var ctx = canvas.getContext("2d");
    var dpr = Math.min(window.devicePixelRatio || 1, 2);
    var W = 0,
      H = 0,
      raf = 0,
      parts = [];

    function spawn(init) {
      return {
        x: init ? rand(0, W) : rand(-40, 0),
        y: rand(0, H),
        vx: rand(10, 34),
        vy: rand(-5, 5),
        r: rand(0.6, 2.2),
        ph: Math.random() * Math.PI * 2,
      };
    }

    function resize() {
      var r = canvas.parentElement.getBoundingClientRect();
      W = Math.max(320, r.width);
      H = Math.max(280, r.height);
      canvas.width = Math.floor(W * dpr);
      canvas.height = Math.floor(H * dpr);
      canvas.style.width = W + "px";
      canvas.style.height = H + "px";
      ctx.setTransform(1, 0, 0, 1, 0, 0);
      ctx.scale(dpr, dpr);
      if (!parts.length) {
        parts = [];
        for (var i = 0; i < 34; i++) parts.push(spawn(true));
      }
    }

    var ro = new ResizeObserver(resize);
    ro.observe(canvas.parentElement);
    resize();

    var last = performance.now();
    function draw(now) {
      var dt = Math.min((now - last) / 1000, 0.05);
      last = now;
      var t = now / 1000;
      ctx.clearRect(0, 0, W, H);
      for (var i = 0; i < parts.length; i++) {
        var p = parts[i];
        if (!reduce) {
          p.x += p.vx * dt;
          p.y += (p.vy + Math.sin(t + p.ph) * 4) * dt;
        }
        if (p.x > W + 40) {
          parts[i] = spawn(false);
          continue;
        }
        var pulse = 0.6 + 0.4 * Math.sin(t * 3 + p.ph);
        var halo = ctx.createRadialGradient(p.x, p.y, 0, p.x, p.y, p.r * 5);
        halo.addColorStop(
          0,
          "rgba(255,60,80," + (0.1 * pulse).toFixed(3) + ")",
        );
        halo.addColorStop(1, "rgba(255,60,80,0)");
        ctx.fillStyle = halo;
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.r * 5, 0, Math.PI * 2);
        ctx.fill();
        ctx.fillStyle =
          "rgba(236,28,36," + (0.3 + 0.25 * pulse).toFixed(3) + ")";
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
        ctx.fill();
      }
      if (!reduce) raf = requestAnimationFrame(draw);
    }
    raf = requestAnimationFrame(draw);

    return function () {
      cancelAnimationFrame(raf);
      ro.disconnect();
    };
  }

  /* ── Plexus network canvas (.sv-svc-plexus) ──────────────────────────
   * 90 connected nodes + floating dust + twinkle glints inside the disc.
   */
  function initPlexus(canvas) {
    var ctx = canvas.getContext("2d");
    var dpr = Math.min(window.devicePixelRatio || 1, 2);
    var LINK = 118,
      COUNT = 90;
    var W = 0,
      H = 0,
      raf = 0;
    var nodes = [],
      dust = [],
      glints = [];

    function seed() {
      nodes = [];
      for (var i = 0; i < COUNT; i++) {
        nodes.push({
          x: rand(0, W),
          y: rand(0, H),
          vx: rand(-8, 8),
          vy: rand(-8, 8),
          r: rand(0.9, 2.6),
          ph: Math.random() * Math.PI * 2,
        });
      }
      dust = [];
      for (var j = 0; j < 70; j++) {
        dust.push({
          x: rand(0, W),
          y: rand(0, H),
          r: rand(0.4, 1.3),
          ph: Math.random() * Math.PI * 2,
          vy: rand(-4, 4),
          vx: rand(-4, 4),
        });
      }
      glints = [];
      for (var k = 0; k < 26; k++) {
        glints.push({
          x: rand(0, W),
          y: rand(0, H),
          r: rand(0.8, 1.8),
          sp: rand(1.5, 4),
          ph: Math.random() * Math.PI * 2,
        });
      }
    }

    function resize() {
      var r = canvas.parentElement.getBoundingClientRect();
      W = Math.max(200, r.width);
      H = Math.max(200, r.height);
      canvas.width = Math.floor(W * dpr);
      canvas.height = Math.floor(H * dpr);
      canvas.style.width = W + "px";
      canvas.style.height = H + "px";
      ctx.setTransform(1, 0, 0, 1, 0, 0);
      ctx.scale(dpr, dpr);
      if (!nodes.length) seed();
    }

    var ro = new ResizeObserver(resize);
    ro.observe(canvas.parentElement);
    resize();

    var last = performance.now();
    function draw(now) {
      var dt = Math.min((now - last) / 1000, 0.05);
      last = now;
      var t = now / 1000;
      ctx.clearRect(0, 0, W, H);
      ctx.globalCompositeOperation = "lighter";

      /* Dust */
      for (var d = 0; d < dust.length; d++) {
        var p = dust[d];
        if (!reduce) {
          p.x += p.vx * dt;
          p.y += p.vy * dt;
        }
        if (p.x < 0) p.x += W;
        if (p.x > W) p.x -= W;
        if (p.y < 0) p.y += H;
        if (p.y > H) p.y -= H;
        var tw = 0.4 + 0.6 * Math.sin(t * 2 + p.ph);
        ctx.fillStyle = "rgba(255,90,105," + (0.22 * tw).toFixed(3) + ")";
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
        ctx.fill();
      }

      /* Move nodes */
      for (var i = 0; i < nodes.length; i++) {
        var n = nodes[i];
        if (!reduce) {
          n.x += n.vx * dt;
          n.y += n.vy * dt;
        }
        if (n.x < 6 || n.x > W - 6) n.vx *= -1;
        if (n.y < 6 || n.y > H - 6) n.vy *= -1;
        n.x = Math.max(6, Math.min(W - 6, n.x));
        n.y = Math.max(6, Math.min(H - 6, n.y));
      }

      /* Links */
      for (var a = 0; a < nodes.length; a++) {
        for (var b = a + 1; b < nodes.length; b++) {
          var na = nodes[a],
            nb = nodes[b];
          var dx = na.x - nb.x,
            dy = na.y - nb.y;
          var dist = Math.sqrt(dx * dx + dy * dy);
          if (dist < LINK) {
            var o = 1 - dist / LINK;
            ctx.strokeStyle = "rgba(236,28,36," + (0.3 * o).toFixed(3) + ")";
            ctx.lineWidth = 0.6 + o * 0.8;
            ctx.beginPath();
            ctx.moveTo(na.x, na.y);
            ctx.lineTo(nb.x, nb.y);
            ctx.stroke();
          }
        }
      }

      /* Glints */
      for (var g = 0; g < glints.length; g++) {
        var s = glints[g];
        var gw = Math.pow(0.5 + 0.5 * Math.sin(t * s.sp + s.ph), 2.5);
        var gr = s.r * (3 + 4 * gw);
        var gg = ctx.createRadialGradient(s.x, s.y, 0, s.x, s.y, gr);
        gg.addColorStop(0, "rgba(255,150,160," + (0.8 * gw).toFixed(3) + ")");
        gg.addColorStop(0.4, "rgba(236,28,36," + (0.4 * gw).toFixed(3) + ")");
        gg.addColorStop(1, "rgba(236,28,36,0)");
        ctx.fillStyle = gg;
        ctx.beginPath();
        ctx.arc(s.x, s.y, gr, 0, Math.PI * 2);
        ctx.fill();
        ctx.fillStyle = "rgba(255,235,238," + (0.5 + 0.5 * gw).toFixed(3) + ")";
        ctx.beginPath();
        ctx.arc(s.x, s.y, s.r * 0.7, 0, Math.PI * 2);
        ctx.fill();
      }

      /* Nodes + glow */
      for (var j = 0; j < nodes.length; j++) {
        var n2 = nodes[j];
        var pulse = 0.6 + 0.4 * Math.sin(t * 2.2 + n2.ph);
        var hr = n2.r * 5;
        var gl = ctx.createRadialGradient(n2.x, n2.y, 0, n2.x, n2.y, hr);
        gl.addColorStop(0, "rgba(255,70,90," + (0.5 * pulse).toFixed(3) + ")");
        gl.addColorStop(1, "rgba(255,70,90,0)");
        ctx.fillStyle = gl;
        ctx.beginPath();
        ctx.arc(n2.x, n2.y, hr, 0, Math.PI * 2);
        ctx.fill();
        ctx.fillStyle =
          "rgba(255,140,150," + (0.7 + 0.3 * pulse).toFixed(3) + ")";
        ctx.beginPath();
        ctx.arc(n2.x, n2.y, n2.r, 0, Math.PI * 2);
        ctx.fill();
      }

      ctx.globalCompositeOperation = "source-over";
      if (!reduce) raf = requestAnimationFrame(draw);
    }
    raf = requestAnimationFrame(draw);

    return function () {
      cancelAnimationFrame(raf);
      ro.disconnect();
    };
  }

  /* ── Init ─────────────────────────────────────────────────────────── */
  function initSvSvc(el) {
    var particles = el.querySelector(".sv-svc-particles");
    var plexus = el.querySelector(".sv-svc-plexus");
    if (particles) initParticles(particles);
    if (plexus) initPlexus(plexus);
  }

  document.querySelectorAll(".sv-svc").forEach(initSvSvc);
})();

/* ─────────────────────────────────────────────────────────────────────────
   SvCounter — animated count-up for .sv-metric-value elements
   Port of Claude Design SvCounter (services-page-1.jsx).
   Triggers on IntersectionObserver at 40% visibility (matching React impl).
   ───────────────────────────────────────────────────────────────────────── */
(function () {
  "use strict";

  if (typeof IntersectionObserver === "undefined") return;

  var DURATION = 1800;

  function easeOutCubic(t) {
    return 1 - Math.pow(1 - t, 3);
  }

  function initCounter(el) {
    var target = parseFloat(el.dataset.target || "0");
    var suffix = el.dataset.suffix || "";
    var decimals = parseInt(el.dataset.decimals || "0", 10);
    var numEl = el.querySelector(".sv-metric-num");
    if (!numEl) return;
    var started = false;

    function format(val) {
      return decimals > 0 ? val.toFixed(decimals) : String(Math.round(val));
    }

    function run() {
      if (started) return;
      started = true;
      var t0 = performance.now();
      function tick(now) {
        var t = Math.min(1, (now - t0) / DURATION);
        var val = target * easeOutCubic(t);
        numEl.textContent = format(val);
        if (t < 1) {
          requestAnimationFrame(tick);
        } else {
          numEl.textContent = format(target);
        }
      }
      requestAnimationFrame(tick);
    }

    var io = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (en) {
          if (en.isIntersecting) run();
        });
      },
      { threshold: 0.4 },
    );
    io.observe(el);
  }

  document
    .querySelectorAll(".sv-metric-value[data-target]")
    .forEach(initCounter);
})();

/* ==========================================================================
   Service Process — scroll-driven step progress line + active states
   ========================================================================== */
(function () {
  "use strict";

  function initSvProcess(ol) {
    var progressEl = ol.querySelector(".sv-steps-progress");
    var items = Array.from(ol.querySelectorAll(".sv-step"));
    if (!items.length || !progressEl) return;

    var raf = 0;

    function update() {
      raf = 0;
      var marker = window.innerHeight * 0.55;
      var active = 0;
      var centers = items.map(function (li) {
        var num = li.querySelector(".sv-step-num");
        var r = (num || li).getBoundingClientRect();
        return r.top + r.height / 2;
      });
      centers.forEach(function (cy) {
        if (cy <= marker) active++;
      });
      var first = centers[0];
      var last = centers[centers.length - 1];
      var span = Math.max(1, last - first);
      var p = (marker - first) / span;
      p = Math.max(0, Math.min(1, p));
      progressEl.style.transform = "scaleY(" + p + ")";
      items.forEach(function (li, i) {
        li.classList.toggle("is-active", i < active);
      });
    }

    function onScroll() {
      if (!raf) raf = requestAnimationFrame(update);
    }

    update();
    window.addEventListener("scroll", onScroll, { passive: true });
    window.addEventListener("resize", onScroll);
  }

  document
    .querySelectorAll("[data-sv-process-steps]")
    .forEach(initSvProcess);
})();

/* ==========================================================================
   Service Tools — tab switching (show/hide panels)
   ========================================================================== */
(function () {
  "use strict";

  document.querySelectorAll("[data-sv-tools]").forEach(function (section) {
    var tabs   = Array.from(section.querySelectorAll(".sv-tab"));
    var panels = Array.from(section.querySelectorAll(".sv-tools-panel"));
    if (!tabs.length || !panels.length) return;

    function activate(idx) {
      tabs.forEach(function (t, i) {
        t.classList.toggle("is-active", i === idx);
        t.setAttribute("aria-selected", i === idx ? "true" : "false");
      });
      panels.forEach(function (p, i) {
        p.hidden = i !== idx;
      });
    }

    tabs.forEach(function (tab, i) {
      tab.addEventListener("click", function () {
        activate(i);
      });
    });

    // Ensure first panel is visible on init (PHP sets hidden on idx > 0)
    activate(0);
  });
})();

// ── TechStack: desktop tab rail + mobile accordion (Technology-techstacks.php)
(function () {
  "use strict";

  document.querySelectorAll("[data-tst-section]").forEach(function (section) {

    // ── Desktop tab rail ────────────────────────────────────────────────────
    var tabs   = Array.from(section.querySelectorAll("[data-tst-tab]"));
    var panels = Array.from(section.querySelectorAll("[data-tst-panel]"));

    function activateTab(idx) {
      tabs.forEach(function (btn, i) {
        var on = i === idx;
        btn.classList.toggle("is-active", on);
        btn.setAttribute("aria-selected", on ? "true" : "false");
      });
      panels.forEach(function (panel, i) {
        panel.hidden = i !== idx;
        // Re-trigger card fade-in animation on panel reveal
        if (i === idx) {
          panel.querySelectorAll(".tc-tech-card").forEach(function (card) {
            card.style.animation = "none";
            void card.offsetHeight; // reflow
            card.style.animation = "";
          });
        }
      });
    }

    tabs.forEach(function (btn, i) {
      btn.addEventListener("click", function () { activateTab(i); });
    });

    // ── Mobile accordion ────────────────────────────────────────────────────
    var accItems = Array.from(section.querySelectorAll("[data-tst-acc-item]"));

    accItems.forEach(function (item) {
      var btn = item.querySelector(".tc-acc-q");
      if (!btn) { return; }

      btn.addEventListener("click", function () {
        var isOpen = item.classList.contains("is-open");

        // Close all
        accItems.forEach(function (it) {
          it.classList.remove("is-open");
          var q = it.querySelector(".tc-acc-q");
          if (q) { q.setAttribute("aria-expanded", "false"); }
        });

        // Open clicked if it was closed
        if (!isOpen) {
          item.classList.add("is-open");
          btn.setAttribute("aria-expanded", "true");
        }
      });
    });

  });
})();

// ── AI Hub: tab switching with animation replay (Technology-aihub.php)
(function () {
  "use strict";

  document.querySelectorAll("[data-tai-section]").forEach(function (section) {
    var tabs   = Array.from(section.querySelectorAll("[data-tai-tab]"));
    var panels = Array.from(section.querySelectorAll("[data-tai-panel]"));

    if (!tabs.length || !panels.length) { return; }

    function activateCluster(idx) {
      // Update tab buttons
      tabs.forEach(function (btn, i) {
        var on = i === idx;
        btn.classList.toggle("is-active", on);
        btn.setAttribute("aria-selected", on ? "true" : "false");
      });

      // Show/hide panels + replay tcFadeUp animation on tech rows
      panels.forEach(function (panel, i) {
        if (i === idx) {
          panel.hidden = false;
          // Replay animation by removing and re-adding it
          panel.querySelectorAll(".tc-ai-techrow").forEach(function (row) {
            row.style.animation = "none";
            void row.offsetHeight; // force reflow
            row.style.animation = "";
          });
        } else {
          panel.hidden = true;
        }
      });
    }

    tabs.forEach(function (btn, i) {
      btn.addEventListener("click", function () { activateCluster(i); });
    });
  });
})();


// ── Location Hero — Globe3D (exact match to Claude Design) ──────────────────
(function () {
  "use strict";

  // 7 continent centroids [lat, lon, name, code] — matches Claude Design source
  var CONTINENTS_DATA = [
    { lat:  45, lon: -100, name: "North America", code: "NA" },
    { lat: -15, lon:  -60, name: "South America", code: "SA" },
    { lat:  50, lon:   12, name: "Europe",        code: "EU" },
    { lat:   4, lon:   21, name: "Africa",         code: "AF" },
    { lat:  46, lon:   92, name: "Asia",           code: "AS" },
    { lat: -25, lon:  134, name: "Australia",      code: "AU" },
    { lat: -78, lon:   25, name: "Antarctica",     code: "AN" }
  ];

  // Continent network links (index pairs into CONTINENTS_DATA)
  var PIN_LINKS = [[0,1],[0,2],[0,4],[2,3],[2,4],[3,4],[4,5],[1,3],[5,6],[3,6]];

  var N     = 82;
  var GA    = Math.PI * (3 - Math.sqrt(5));
  var TILT  = 0.42;

  function rand(a, b) { return a + Math.random() * (b - a); }

  // lat/lon → unit 3D vector (same as toVec in Claude Design)
  function toVec(lat, lon) {
    var aa = lat * Math.PI / 180;
    var bb = lon * Math.PI / 180;
    return { x: Math.cos(aa) * Math.sin(bb), y: Math.sin(aa), z: Math.cos(aa) * Math.cos(bb) };
  }

  // Fibonacci sphere — 82 nodes
  function buildMeshNodes() {
    var nodes = [];
    for (var n = 0; n < N; n++) {
      var y  = 1 - n / (N - 1) * 2;
      var r  = Math.sqrt(Math.max(0, 1 - y * y));
      var th = n * GA;
      nodes.push({ x: Math.cos(th) * r, y: y, z: Math.sin(th) * r });
    }
    return nodes;
  }

  // KNN edges — 3 nearest neighbours per node, deduplicated
  function buildEdges(nodes) {
    var edges = [];
    var seen  = {};
    for (var a = 0; a < N; a++) {
      var dists = [];
      for (var b = 0; b < N; b++) {
        if (b === a) { continue; }
        var dx = nodes[a].x - nodes[b].x;
        var dy = nodes[a].y - nodes[b].y;
        var dz = nodes[a].z - nodes[b].z;
        dists.push({ b: b, dist: dx*dx + dy*dy + dz*dz });
      }
      dists.sort(function (p, q) { return p.dist - q.dist; });
      for (var k = 0; k < 3; k++) {
        var nb  = dists[k].b;
        var key = a < nb ? a + "-" + nb : nb + "-" + a;
        if (!seen[key]) { seen[key] = true; edges.push([a, nb]); }
      }
    }
    return edges;
  }

  function initGlobe(container) {
    var canvas = container.querySelector(".lhb-globe-canvas");
    if (!canvas || !canvas.getContext) { return; }

    var ctx  = canvas.getContext("2d");
    var dpr  = Math.min(window.devicePixelRatio || 1, 2);
    var W = 660, H = 560;
    var R, cx, cy;
    var parts = [];
    var t0    = performance.now();
    var lastT = t0;
    var animId = null;

    var cosT = Math.cos(TILT), sinT = Math.sin(TILT);

    var meshNodes = buildMeshNodes();
    var edges     = buildEdges(meshNodes);
    var pins      = CONTINENTS_DATA.map(function (c) {
      return toVec(c.lat, c.lon);
    });

    var reduce = !!(window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches);

    // Spawn one ambient particle from the edges, velocity toward center
    function spawn(p) {
      var ang = Math.random() * Math.PI * 2;
      var d   = Math.max(W, H) * 0.55;
      p.x  = cx + Math.cos(ang) * d;
      p.y  = cy + Math.sin(ang) * d;
      p.vx = -Math.cos(ang) * rand(4, 11);
      p.vy = -Math.sin(ang) * rand(4, 11);
      p.r  = rand(0.7, 1.9);
      p.ph = Math.random() * Math.PI * 2;
      return p;
    }

    function initParts() {
      parts = [];
      for (var i = 0; i < 30; i++) { parts.push(spawn({})); }
    }

    function resize() {
      var rect = container.getBoundingClientRect();
      W  = Math.max(360, Math.round(rect.width));
      H  = Math.max(320, Math.round(rect.height));
      canvas.width        = Math.floor(W * dpr);
      canvas.height       = Math.floor(H * dpr);
      canvas.style.width  = W + "px";
      canvas.style.height = H + "px";
      ctx.setTransform(1, 0, 0, 1, 0, 0);
      ctx.scale(dpr, dpr);
      R  = Math.min(W, H) * 0.38;
      cx = W * 0.52;
      cy = H * 0.5;
      if (!parts.length) { initParts(); }
    }

    // Project unit-sphere point with Y-rotation ang → {sx, sy, z}
    function project(v, ang) {
      var ca = Math.cos(ang), sa = Math.sin(ang);
      var x  =  v.x * ca + v.z * sa;
      var z  = -v.x * sa + v.z * ca;
      var y  = v.y;
      var y2 = y * cosT - z * sinT;
      var z2 = y * sinT + z * cosT;
      return { sx: cx + x * R, sy: cy - y2 * R, z: z2 };
    }

    // Classic billboarded map pin — tip at (px, py)
    function drawPin(px, py, sc, op, t, idx, front) {
      var head = 9.8 * sc;
      var hy   = py - head * 1.85;
      ctx.save();
      ctx.globalAlpha = op;

      // Soft glow behind head
      var g = ctx.createRadialGradient(px, hy, 0, px, hy, head * 3.2);
      g.addColorStop(0, "rgba(236,28,36,0.5)");
      g.addColorStop(1, "rgba(236,28,36,0)");
      ctx.fillStyle = g;
      ctx.beginPath();
      ctx.arc(px, hy, head * 3.2, 0, Math.PI * 2);
      ctx.fill();

      // Expanding ping ring at tip — front pins only
      if (front) {
        var phase = (t * 0.6 + idx * 0.55) % 2;
        var ringR = head * (0.6 + phase * 2.2);
        var ringA = Math.max(0, 0.4 * (1 - phase / 2)) * op;
        ctx.strokeStyle = "rgba(236,28,36," + ringA.toFixed(3) + ")";
        ctx.lineWidth   = 1.4;
        ctx.beginPath();
        ctx.ellipse(px, py, ringR, ringR * 0.42, 0, 0, Math.PI * 2);
        ctx.stroke();
      }

      // Pointer (teardrop triangle)
      ctx.beginPath();
      ctx.moveTo(px, py);
      ctx.lineTo(px - head * 0.72, hy + head * 0.34);
      ctx.lineTo(px + head * 0.72, hy + head * 0.34);
      ctx.closePath();
      ctx.fillStyle = "#EC1C24";
      ctx.fill();

      // Pin head circle
      ctx.beginPath();
      ctx.arc(px, hy, head, 0, Math.PI * 2);
      ctx.fillStyle = "#EC1C24";
      ctx.fill();

      // Inner white dot
      ctx.beginPath();
      ctx.arc(px, hy, head * 0.6, 0, Math.PI * 2);
      ctx.fillStyle = "#FFFFFF";
      ctx.fill();

      ctx.restore();
    }

    function draw(now) {
      var t  = (now - t0) / 1000;
      var dt = (now - lastT) / 1000;
      lastT  = now;
      if (dt > 0.05) { dt = 0.05; }

      var ang = reduce ? 0.6 : t * 0.20;

      ctx.clearRect(0, 0, W, H);

      // ── Ambient floating particles (behind globe) ──────────────────────
      for (var pi = 0; pi < parts.length; pi++) {
        var p = parts[pi];
        if (!reduce) { p.x += p.vx * dt; p.y += p.vy * dt; }
        var m = 50;
        if (p.x < -m || p.x > W + m || p.y < -m || p.y > H + m) { spawn(p); }
        var pulse = 0.7 + 0.3 * Math.sin(t * 4 + p.ph);
        var halo  = ctx.createRadialGradient(p.x, p.y, 0, p.x, p.y, p.r * 4);
        halo.addColorStop(0, "rgba(255,60,80," + (0.12 * pulse).toFixed(3) + ")");
        halo.addColorStop(1, "rgba(255,60,80,0)");
        ctx.fillStyle = halo;
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.r * 4, 0, Math.PI * 2);
        ctx.fill();
        ctx.fillStyle = "rgba(232,51,74," + (0.32 + 0.18 * pulse).toFixed(3) + ")";
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
        ctx.fill();
      }

      // Project all mesh nodes
      var mp = meshNodes.map(function (v) { return project(v, ang); });
      // Project all pins
      var pp = pins.map(function (v, i) {
        var pr = project(v, ang);
        pr.idx = i;
        return pr;
      });

      // ── Mesh edges ─────────────────────────────────────────────────────
      for (var ei = 0; ei < edges.length; ei++) {
        var A  = mp[edges[ei][0]];
        var B  = mp[edges[ei][1]];
        var za = (A.z + B.z) / 2;
        var op = 0.16 + 0.40 * ((za + 1) / 2);
        ctx.strokeStyle = "rgba(236,28,36," + op.toFixed(3) + ")";
        ctx.lineWidth   = 1.8;
        ctx.beginPath();
        ctx.moveTo(A.sx, A.sy);
        ctx.lineTo(B.sx, B.sy);
        ctx.stroke();
      }

      // ── Mesh nodes ─────────────────────────────────────────────────────
      for (var ni = 0; ni < mp.length; ni++) {
        var np = mp[ni];
        var f  = (np.z + 1) / 2;
        if (f > 0.45) {
          var hr = 8 * f;
          var ng = ctx.createRadialGradient(np.sx, np.sy, 0, np.sx, np.sy, hr);
          ng.addColorStop(0, "rgba(236,28,36," + (0.34 * f).toFixed(3) + ")");
          ng.addColorStop(1, "rgba(236,28,36,0)");
          ctx.fillStyle = ng;
          ctx.beginPath();
          ctx.arc(np.sx, np.sy, hr, 0, Math.PI * 2);
          ctx.fill();
        }
        var nop = 0.45 + 0.55 * f;
        var rr  = 2.4 + 2.6 * f;
        ctx.fillStyle = "rgba(236,28,36," + nop.toFixed(3) + ")";
        ctx.beginPath();
        ctx.arc(np.sx, np.sy, rr, 0, Math.PI * 2);
        ctx.fill();
        if (f > 0.62) {
          ctx.fillStyle = "rgba(255,200,205," + ((f - 0.62) * 1.8).toFixed(3) + ")";
          ctx.beginPath();
          ctx.arc(np.sx, np.sy, rr * 0.45, 0, Math.PI * 2);
          ctx.fill();
        }
      }

      // ── Continent network links (brighter) ─────────────────────────────
      for (var li = 0; li < PIN_LINKS.length; li++) {
        var LA  = pp[PIN_LINKS[li][0]];
        var LB  = pp[PIN_LINKS[li][1]];
        var lza = (LA.z + LB.z) / 2;
        var lop = 0.20 + 0.55 * ((lza + 1) / 2);
        ctx.strokeStyle = "rgba(236,28,36," + lop.toFixed(3) + ")";
        ctx.lineWidth   = 2.1;
        ctx.beginPath();
        ctx.moveTo(LA.sx, LA.sy);
        ctx.lineTo(LB.sx, LB.sy);
        ctx.stroke();
      }

      // ── Continent map pins — back-to-front ─────────────────────────────
      var order = [0,1,2,3,4,5,6].sort(function (a, b) { return pp[a].z - pp[b].z; });
      for (var oi = 0; oi < order.length; oi++) {
        var qi    = order[oi];
        var qp    = pp[qi];
        var qf    = (qp.z + 1) / 2;
        var front = qp.z > -0.1;
        var sc    = 0.6 + 0.55 * qf;
        var qop   = 0.28 + 0.72 * qf;
        drawPin(qp.sx, qp.sy, sc, qop, t, qi, front);
      }

      animId = requestAnimationFrame(draw);
    }

    var ro = new ResizeObserver(function () { resize(); });
    ro.observe(container);
    resize();
    animId = requestAnimationFrame(draw);
  }

  function initAllGlobes() {
    document.querySelectorAll("[data-lhb-globe]").forEach(function (el) {
      initGlobe(el);
    });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initAllGlobes);
  } else {
    initAllGlobes();
  }
})();

/* ── Location Cards — 3D Carousel (Location-cards.php) ── */
(function () {
  var POS_CLASSES = ['is-active', 'is-left', 'is-right', 'is-far-left', 'is-far-right'];

  function getPos(idx, active, total) {
    var offset = (idx - active + total) % total;
    if (offset === 0)           return 'is-active';
    if (offset === 1)           return 'is-right';
    if (offset === total - 1)   return 'is-left';
    if (offset === 2)           return 'is-far-right';
    if (offset === total - 2)   return 'is-far-left';
    return 'is-far-right';
  }

  function initLocCarousel(section) {
    var carousel = section.querySelector('[data-loc-carousel]');
    if (!carousel) return;

    var cards   = Array.from(carousel.querySelectorAll('.loc-card'));
    var dots    = Array.from(section.querySelectorAll('[data-loc-dot]'));
    var prevBtn = section.querySelector('[data-loc-prev]');
    var nextBtn = section.querySelector('[data-loc-next]');
    var total   = cards.length;
    var active  = 0;

    if (!total) return;

    function update() {
      cards.forEach(function (card, i) {
        POS_CLASSES.forEach(function (cls) { card.classList.remove(cls); });
        card.classList.add(getPos(i, active, total));
        card.setAttribute('aria-current', i === active ? 'true' : 'false');
      });
      dots.forEach(function (dot, i) {
        dot.classList.toggle('is-active', i === active);
      });
    }

    function goTo(idx) {
      active = ((idx % total) + total) % total;
      update();
    }

    if (prevBtn) {
      prevBtn.addEventListener('click', function () { goTo(active - 1); });
    }
    if (nextBtn) {
      nextBtn.addEventListener('click', function () { goTo(active + 1); });
    }

    dots.forEach(function (dot) {
      dot.addEventListener('click', function () {
        goTo(parseInt(dot.dataset.locDot, 10));
      });
    });

    cards.forEach(function (card, i) {
      card.addEventListener('click', function (e) {
        if (!card.classList.contains('is-active')) {
          e.preventDefault();
          goTo(i);
        }
      });
    });

    update();
  }

  function initAllLocCarousels() {
    document.querySelectorAll('.loc-markets').forEach(initLocCarousel);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAllLocCarousels);
  } else {
    initAllLocCarousels();
  }
})();

/* ── Location Results — animated metric counters (Location-results-recognition.php) ── */
(function () {
  'use strict';

  if (typeof IntersectionObserver === 'undefined') return;

  var DURATION = 1800;

  function easeOutCubic(t) {
    return 1 - Math.pow(1 - t, 3);
  }

  function initLrrCounter(el) {
    var target   = parseFloat(el.dataset.target   || '0');
    var decimals = parseInt(el.dataset.decimals   || '0', 10);
    var numEl    = el.querySelector('.loc-metric-num');
    if (!numEl) return;
    var started  = false;

    function fmt(v) {
      return decimals > 0 ? v.toFixed(decimals) : String(Math.round(v));
    }

    function run() {
      if (started) return;
      started = true;
      var t0 = performance.now();
      function tick(now) {
        var t   = Math.min(1, (now - t0) / DURATION);
        var val = target * easeOutCubic(t);
        numEl.textContent = fmt(val);
        if (t < 1) {
          requestAnimationFrame(tick);
        } else {
          numEl.textContent = fmt(target);
        }
      }
      requestAnimationFrame(tick);
    }

    var io = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (en) { if (en.isIntersecting) run(); });
      },
      { threshold: 0.4 }
    );
    io.observe(el);
  }

  function initAllLrrCounters() {
    document.querySelectorAll('[data-lrr-counter]').forEach(initLrrCounter);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAllLrrCounters);
  } else {
    initAllLrrCounters();
  }
})();

/**
 * Landing sections — Staff Augmentation, Software Outsourcing, Dedicated Teams.
 *
 * One file for every behaviour across the three pages' twelve sections, loaded in
 * the footer only on pages that place at least one of those layouts.
 *
 * Four independent IIFEs, each keyed on a data-attribute the component emits and
 * scoped to that section instance, so a section can appear twice on one page
 * without the two copies fighting:
 *
 *   [data-ps-slider]   problem/solution slider  — shared by sa_fit and dt_risks
 *   [data-sar-section] roles tab rail + card stack
 *   [data-sap-steps]   scroll-driven process rail
 *   [data-soh-board]   outsourcing delivery board
 *   [data-dth-orbit]   dedicated-team hiring orbit
 *
 * Ported from the approved React sources (staff-aug-2/3.jsx, so-1.jsx, dt-1.jsx).
 * PHP renders the correct initial state for all of them, so every section is
 * complete and readable with this file absent.
 *
 * @package technbrains-child
 */


/* ############################################################
   Shared problem/solution slider (sa_fit, dt_risks)
   ############################################################ */

(function () {
	'use strict';

	document.querySelectorAll('[data-ps-slider]').forEach(function (section) {
		var pairs = Array.prototype.slice.call(section.querySelectorAll('[data-ps-pair]'));
		var dots  = Array.prototype.slice.call(section.querySelectorAll('[data-ps-dot]'));
		var prev  = section.querySelector('[data-ps-prev]');
		var next  = section.querySelector('[data-ps-next]');

		if (!pairs.length) {
			return;
		}

		var active = 0;
		var raf    = 0;

		function measure() {
			// The pair element IS the stage: it is the grid that places both columns
			// and the connector, so it is the box every coordinate is relative to.
			var stage = pairs[active];
			var svg   = stage.querySelector('[data-ps-connector]');
			var path  = stage.querySelector('[data-ps-arrow]');
			var out   = stage.querySelector('[data-ps-node-out]');
			var into  = stage.querySelector('[data-ps-node-in]');

			if (!svg || !path || !out || !into) {
				return;
			}

			var sr = stage.getBoundingClientRect();
			var ar = out.getBoundingClientRect();
			var br = into.getBoundingClientRect();

			// Hidden stage — width collapses to 0 and there is nothing to draw.
			if (!sr.width || !sr.height) {
				return;
			}

			var sx = ar.left + ar.width / 2 - sr.left;
			var sy = ar.top + ar.height / 2 - sr.top;
			var ex = br.left + br.width / 2 - sr.left;
			var ey = br.top + br.height / 2 - sr.top;
			var m1 = sx + (ex - sx) * 0.34;
			var m2 = sx + (ex - sx) * 0.66;

			svg.setAttribute('viewBox', '0 0 ' + sr.width + ' ' + sr.height);
			path.setAttribute(
				'd',
				'M ' + sx + ' ' + sy + ' L ' + m1 + ' ' + sy + ' L ' + m2 + ' ' + ey + ' L ' + ex + ' ' + ey
			);
		}

		function scheduleMeasure() {
			if (raf) { return; }
			raf = requestAnimationFrame(function () {
				raf = 0;
				measure();
			});
		}

		function activate(i) {
			active = Math.max(0, Math.min(pairs.length - 1, i));

			pairs.forEach(function (pair, idx) {
				pair.hidden = idx !== active;
			});
			dots.forEach(function (dot, idx) {
				var on = idx === active;
				dot.classList.toggle('is-active', on);
				dot.setAttribute('aria-current', on ? 'true' : 'false');
			});
			if (prev) { prev.disabled = active === 0; }
			if (next) { next.disabled = active === pairs.length - 1; }

			measure();
		}

		dots.forEach(function (dot, i) {
			dot.addEventListener('click', function () { activate(i); });
		});
		if (prev) {
			prev.addEventListener('click', function () { activate(active - 1); });
		}
		if (next) {
			next.addEventListener('click', function () { activate(active + 1); });
		}

		window.addEventListener('resize', scheduleMeasure);

		measure();
		if (document.fonts && document.fonts.ready) {
			document.fonts.ready.then(measure);
		}
	});
})();

/* ############################################################
   Staff Augmentation — roles rail, process rail
   ############################################################ */

(function () {
	'use strict';

	/* ────────────────────────────────────────────────────────────────────────
	 * Roles — tab rail driving a stack of cards (Staff-aug-roles.php)
	 *
	 * The stack position is relative to the active tab, not absolute: the card
	 * d slots behind the active one, so a six-role stack always paints exactly
	 * three visible cards no matter which tab is chosen.
	 * ──────────────────────────────────────────────────────────────────────── */
	document.querySelectorAll('[data-sar-section]').forEach(function (section) {
		var tabs  = Array.prototype.slice.call(section.querySelectorAll('[data-sar-tab]'));
		var cards = Array.prototype.slice.call(section.querySelectorAll('[data-sar-card]'));

		if (tabs.length < 2 || !cards.length) {
			return;
		}

		function positionOf(i, active) {
			var d = (i - active + cards.length) % cards.length;
			if (d === 0) { return 'front'; }
			if (d === 1) { return 'behind-1'; }
			if (d === 2) { return 'behind-2'; }
			return 'hidden';
		}

		function activate(active) {
			tabs.forEach(function (tab, i) {
				var on = i === active;
				tab.classList.toggle('active', on);
				tab.setAttribute('aria-pressed', on ? 'true' : 'false');
			});
			cards.forEach(function (card, i) {
				card.classList.remove('front', 'behind-1', 'behind-2', 'hidden');
				card.classList.add(positionOf(i, active));
			});
		}

		tabs.forEach(function (tab, i) {
			tab.addEventListener('click', function () { activate(i); });
		});
	});

	/* ────────────────────────────────────────────────────────────────────────
	 * Process — scroll-driven rail (Staff-aug-process.php)
	 *
	 * Progress is the viewport's focus line (55% down) mapped onto the distance
	 * between the first and last step number, so the rail fills in step with
	 * reading position rather than with raw scroll offset.
	 * ──────────────────────────────────────────────────────────────────────── */
	document.querySelectorAll('[data-sap-steps]').forEach(function (steps) {
		var raf = 0;

		function update() {
			if (raf) { return; }
			raf = requestAnimationFrame(function () {
				raf = 0;

				var nums = steps.querySelectorAll('.sa-step2-num');
				if (nums.length < 2) { return; }

				var first = nums[0].getBoundingClientRect();
				var last  = nums[nums.length - 1].getBoundingClientRect();
				var start = first.top + first.height / 2;
				var end   = last.top + last.height / 2;
				var focus = window.innerHeight * 0.55;
				var p     = Math.max(0, Math.min(1, (focus - start) / Math.max(1, end - start)));

				steps.style.setProperty('--sa-rail-p', p.toFixed(4));

				Array.prototype.forEach.call(steps.querySelectorAll('.sa-step2'), function (node) {
					var num = node.querySelector('.sa-step2-num');
					if (!num) { return; }
					var r = num.getBoundingClientRect();
					node.classList.toggle('is-reached', r.top + r.height / 2 <= focus + 4);
				});
			});
		}

		update();
		window.addEventListener('scroll', update, { passive: true });
		window.addEventListener('resize', update);
	});
})();

/* ############################################################
   Software Outsourcing — delivery board
   ############################################################ */

(function () {
	'use strict';

	document.querySelectorAll('[data-soh-board]').forEach(function (board) {
		var stages     = Array.prototype.slice.call(board.querySelectorAll('[data-soh-stage]'));
		var fill       = board.querySelector('[data-soh-fill]');
		var rider      = board.querySelector('[data-soh-rider]');
		var activity   = board.querySelector('[data-soh-activity]');
		var milestones = [];

		if (activity) {
			try {
				milestones = JSON.parse(activity.getAttribute('data-soh-milestones') || '[]');
			} catch (e) {
				milestones = [];
			}
		}

		if (!stages.length) {
			return;
		}

		var last   = stages.length - 1;
		var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

		function paint(stage) {
			var activeStage = Math.min(stage, last);
			var pct         = last > 0 ? (activeStage / last) * 100 : 100;

			stages.forEach(function (node, i) {
				node.classList.toggle('is-done', i < stage);
				node.classList.toggle('is-active', i === stage);
			});

			if (fill) { fill.style.width = pct + '%'; }
			if (rider) { rider.style.left = pct + '%'; }
		}

		if (reduce) {
			// Completed board, no motion: every stage done, pipe full.
			paint(stages.length);
			return;
		}

		var stage = 0;
		paint(stage);

		setInterval(function () {
			stage = (stage + 1) % (stages.length + 1);
			paint(stage);
		}, 1300);

		if (activity && milestones.length > 1) {
			var tick = 0;
			setInterval(function () {
				tick = (tick + 1) % milestones.length;

				// Replace the node so the CSS entry animation runs again.
				var next = activity.cloneNode(false);
				next.textContent = milestones[tick];
				activity.parentNode.replaceChild(next, activity);
				activity = next;
			}, 2600);
		}
	});
})();

/* ############################################################
   Dedicated Teams — hiring orbit
   ############################################################ */

(function () {
	'use strict';

	document.querySelectorAll('[data-dth-orbit]').forEach(function (orbit) {
		var slots  = Array.prototype.slice.call(orbit.querySelectorAll('[data-dth-slot]'));
		var spokes = Array.prototype.slice.call(orbit.querySelectorAll('[data-dth-spoke]'));
		var fill   = orbit.querySelector('[data-dth-fill]');
		var status = orbit.querySelector('[data-dth-status]');
		var count  = orbit.querySelector('[data-dth-count]');

		var total = slots.length;
		if (!total) {
			return;
		}

		var buildingText = status ? (status.getAttribute('data-dth-building') || '') : '';
		var readyText    = status ? (status.getAttribute('data-dth-ready') || status.textContent) : '';

		// 2πr with r = 15, matching the viewBox the progress ring is drawn in.
		var circumference = 2 * Math.PI * 15;

		if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
			return;
		}

		function paint(hired) {
			slots.forEach(function (slot, i) {
				var on    = i < hired;
				var fresh = i === hired - 1;
				var node  = slot.querySelector('[data-dth-node]');
				var role  = slot.querySelector('[data-dth-role]');
				var empty = slot.querySelector('[data-dth-empty]');

				slot.classList.toggle('on', on);
				if (role) { role.classList.toggle('on', on); }
				if (node) {
					node.hidden = !on;
					node.classList.toggle('fresh', fresh);
				}
				if (empty) { empty.hidden = on; }
			});

			spokes.forEach(function (spoke, i) {
				spoke.hidden = i >= hired;
			});

			if (fill) {
				fill.style.strokeDasharray  = circumference;
				fill.style.strokeDashoffset = circumference * (1 - hired / total);
			}

			if (status && buildingText) {
				status.textContent = hired < total ? buildingText : readyText;
			}
			if (count) {
				count.hidden = hired >= total;
				var n = count.querySelector('b');
				if (n) { n.textContent = hired; }
			}
		}

		var hired = 0;
		var timer;

		function step() {
			hired++;

			if (hired <= total) {
				paint(hired);
				timer = setTimeout(step, 850);
				return;
			}

			// Ring complete — hold, then start over.
			timer = setTimeout(function () {
				hired = 0;
				paint(0);
				timer = setTimeout(step, 650);
			}, 2400);
		}

		paint(0);
		timer = setTimeout(step, 650);
	});

})();

/* ############################################################
   Dedicated Teams — scroll reveal (.dt-rev)
   ############################################################

   Ported from the approved build. One-way: .in is added once and never
   removed, so a reveal can't replay when the user scrolls back.

   The timed failsafe deliberately skips .dt-vt-item. Those carry a
   per-card transition-delay, and force-revealing them together would
   fire the whole vetting timeline at once instead of stepping down it.
   Everything else is force-revealed so no content can be left hidden by
   a layout the scroll test never satisfies.

   Sections that use no .dt-rev markup — every Dedicated Teams section
   shipped before this one — are untouched: the pass bails when the
   document has none. */

(function () {
	'use strict';

	if (!document.querySelector('.dt-rev')) {
		return;
	}

	function reveal() {
		var vh = window.innerHeight;
		var pending = [];

		// Batch all reads first, then all writes — interleaving them (as the
		// old single-pass forEach did) forces a synchronous layout recalc on
		// every .add('in') because the next node's getBoundingClientRect()
		// read is invalidated by the previous node's write.
		document.querySelectorAll('.dt-rev:not(.in)').forEach(function (el) {
			var r = el.getBoundingClientRect();
			if (r.top < vh * 0.9 && r.bottom > -80) {
				pending.push(el);
			}
		});

		pending.forEach(function (el) {
			el.classList.add('in');
		});
	}

	var raf = 0;
	function onScrollOrResize() {
		if (!raf) raf = requestAnimationFrame(function () { raf = 0; reveal(); });
	}

	window.addEventListener('scroll', onScrollOrResize, { passive: true });
	window.addEventListener('resize', onScrollOrResize, { passive: true });
	window.addEventListener('load', reveal);

	setTimeout(reveal, 200);

	setTimeout(function () {
		document.querySelectorAll('.dt-rev:not(.in):not(.dt-vt-item)').forEach(function (el) {
			el.classList.add('in');
		});
	}, 1500);

	reveal();

})();

/* ############################################################
   Scroll counter — [data-count]
   ############################################################

   Contract, all on the root element:
     data-count          marks the root
     data-target         the figure to count to
     data-decimals       how many decimal places to hold (default 0)
   and one descendant carrying data-count-num, which is the only node written to.
   The suffix therefore lives in a sibling and never enters the maths.

   Motion matches the approved build exactly: easeOutCubic over 1800ms, fired once
   at a 0.4 intersection ratio and never replayed.

   The markup already holds the final figure, so this only ever overwrites a
   correct value with the same correct value. That is what makes the three exits
   below safe: no IntersectionObserver, reduced motion, or no JS at all each leave
   the real number on screen rather than a zero. */

(function () {
	'use strict';

	var roots = document.querySelectorAll('[data-count]');

	if (!roots.length || typeof IntersectionObserver === 'undefined') {
		return;
	}

	// The count is decorative — the figure is already rendered — so an explicit
	// preference for less motion means simply leaving the markup alone.
	if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
		return;
	}

	var DURATION = 1800;

	function easeOutCubic(t) {
		return 1 - Math.pow(1 - t, 3);
	}

	function init(el) {
		var target   = parseFloat(el.getAttribute('data-target') || '0');
		var decimals = parseInt(el.getAttribute('data-decimals') || '0', 10);
		var numEl    = el.querySelector('[data-count-num]');

		if (!numEl || isNaN(target)) {
			return;
		}

		var started = false;

		function fmt(v) {
			return decimals > 0 ? v.toFixed(decimals) : String(Math.round(v));
		}

		function run() {
			if (started) {
				return;
			}
			started = true;

			var t0 = performance.now();

			function tick(now) {
				var t = Math.min(1, (now - t0) / DURATION);
				numEl.textContent = fmt(target * easeOutCubic(t));

				if (t < 1) {
					requestAnimationFrame(tick);
				} else {
					numEl.textContent = fmt(target);
				}
			}

			requestAnimationFrame(tick);
		}

		var io = new IntersectionObserver(function (entries) {
			entries.forEach(function (en) {
				if (en.isIntersecting) {
					run();
					io.disconnect();
				}
			});
		}, { threshold: 0.4 });

		io.observe(el);
	}

	roots.forEach(init);

})();

/* ############################################################
   Software Outsourcing — Risk Mitigation slider ([data-riskx])
   ############################################################

   Contract, per section root:
     [data-riskx]        the root
     [data-riskx-img]    one stacked image per slide, index as the value
     [data-riskx-slide]  one panel per slide, index as the value
     [data-riskx-dot]    one tab per slide, index as the value
     [data-riskx-prev]   [data-riskx-next]

   Motion matches the approved build: 4200ms between slides, wrapping, paused
   while hovered, and not started at all under reduced motion.

   Two additions to what the JSX does. It pauses on mouseenter only, so a keyboard
   user tabbing through the dots had the slide change underneath them — focusin
   pauses too, for the same reason the mouse does. And the aria-selected /
   aria-hidden pair is kept in sync, which React set once per render and is what
   makes the tablist honest.

   PHP already renders slide 0 active, so this only ever moves the mark: with no
   JS, no timer, or reduced motion, the first safeguard stays readable. */

(function () {
	'use strict';

	var roots = document.querySelectorAll('[data-riskx]');

	if (!roots.length) {
		return;
	}

	var DURATION = 4200;
	var reduce = !!(window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches);

	roots.forEach(function (root) {
		var imgs   = Array.prototype.slice.call(root.querySelectorAll('[data-riskx-img]'));
		var slides = Array.prototype.slice.call(root.querySelectorAll('[data-riskx-slide]'));
		var dots   = Array.prototype.slice.call(root.querySelectorAll('[data-riskx-dot]'));
		var prev   = root.querySelector('[data-riskx-prev]');
		var next   = root.querySelector('[data-riskx-next]');

		var total = slides.length;

		if (total < 2) {
			return;
		}

		var active = 0;
		var timer  = null;

		function paint(i) {
			active = (i + total) % total;

			imgs.forEach(function (el) {
				el.classList.toggle('is-active', parseInt(el.getAttribute('data-riskx-img'), 10) === active);
			});

			slides.forEach(function (el) {
				var on = parseInt(el.getAttribute('data-riskx-slide'), 10) === active;
				el.classList.toggle('is-active', on);

				if (on) {
					el.removeAttribute('aria-hidden');
				} else {
					el.setAttribute('aria-hidden', 'true');
				}
			});

			dots.forEach(function (el) {
				var on = parseInt(el.getAttribute('data-riskx-dot'), 10) === active;
				el.classList.toggle('is-active', on);
				el.setAttribute('aria-selected', on ? 'true' : 'false');
			});
		}

		function stop() {
			if (timer) {
				clearInterval(timer);
				timer = null;
			}
		}

		function play() {
			if (reduce || timer) {
				return;
			}
			timer = setInterval(function () {
				paint(active + 1);
			}, DURATION);
		}

		// A manual move restarts the clock, so a slide the reader just chose gets its
		// full turn rather than the remainder of the previous one.
		function goTo(i) {
			paint(i);
			stop();
			play();
		}

		if (prev) {
			prev.addEventListener('click', function () {
				goTo(active - 1);
			});
		}

		if (next) {
			next.addEventListener('click', function () {
				goTo(active + 1);
			});
		}

		dots.forEach(function (dot) {
			dot.addEventListener('click', function () {
				goTo(parseInt(dot.getAttribute('data-riskx-dot'), 10));
			});
		});

		root.addEventListener('mouseenter', stop);
		root.addEventListener('mouseleave', play);
		root.addEventListener('focusin', stop);
		root.addEventListener('focusout', play);

		play();
	});

})();
 