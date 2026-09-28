/**
 * TechBrains — ACF Flexible Content Section Picker Modal
 *
 * Intercepts the native "+ Add Section" dropdown, reads the available
 * layouts ACF already generated, then shows a searchable 2-column grid
 * modal instead. Clicking a card triggers ACF's own addLayout logic.
 *
 * Requires: jQuery, ACF Pro (acf-input handle), acf-modal.css
 * Loaded via: acf/input/admin_enqueue_scripts (admin-only)
 */
(function ($) {
	'use strict';

	if (typeof acf === 'undefined') return;

	/* ─── Config ─────────────────────────────────────────────────────────── */

	var PREVIEWS = (window.tnbAcfModal && window.tnbAcfModal.previews) || {};

	/* ─── State ──────────────────────────────────────────────────────────── */

	var state = {
		$overlay:     null,
		$nativePopup: null,
		layouts:      [],
	};

	/* ─── Build modal DOM (once on init) ─────────────────────────────────── */

	function buildModal() {
		var html =
			'<div id="tnb-acf-modal-overlay" class="tnb-acf-modal-overlay" role="dialog" aria-modal="true" aria-labelledby="tnb-acf-modal-title">' +
				'<div class="tnb-acf-modal">' +
					'<div class="tnb-acf-modal__header">' +
						'<div class="tnb-acf-modal__header-top">' +
							'<h2 id="tnb-acf-modal-title" class="tnb-acf-modal__title">Add Section</h2>' +
							'<button class="tnb-acf-modal__close" type="button" aria-label="Close">' +
								svg('close') +
							'</button>' +
						'</div>' +
						'<div class="tnb-acf-modal__search-wrap">' +
							svg('search', 'tnb-acf-modal__search-icon') +
							'<input type="search" class="tnb-acf-modal__search" placeholder="Search components…" autocomplete="off" spellcheck="false">' +
						'</div>' +
					'</div>' +
					'<div class="tnb-acf-modal__body">' +
						'<div class="tnb-acf-modal__grid"></div>' +
					'</div>' +
				'</div>' +
			'</div>';

		$('body').append(html);
		state.$overlay = $('#tnb-acf-modal-overlay');
	}

	/* ─── SVG helpers ─────────────────────────────────────────────────────── */

	function svg(name, cls) {
		var extra = cls ? ' class="' + cls + '"' : '';
		switch (name) {
			case 'close':
				return '<svg' + extra + ' width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14 4L4 14M4 4L14 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>';
			case 'search':
				return '<svg' + extra + ' width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="6.5" cy="6.5" r="4.75" stroke="currentColor" stroke-width="1.5"/><path d="M10.5 10.5L14 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>';
			case 'placeholder':
				return '<svg' + extra + ' width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="4" y="8" width="28" height="5" rx="2.5" fill="#dde0e5"/><rect x="4" y="17" width="18" height="5" rx="2.5" fill="#dde0e5"/><rect x="4" y="26" width="22" height="5" rx="2.5" fill="#dde0e5"/></svg>';
			case 'add':
				return '<svg' + extra + ' width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 1v9M1 5.5h9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>';
			case 'empty':
				return '<svg' + extra + ' width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="22" cy="22" r="19" stroke="#dde0e5" stroke-width="2"/><path d="M15 22h14M22 15v14" stroke="#dde0e5" stroke-width="2" stroke-linecap="round"/></svg>';
		}
		return '';
	}

	/* ─── Render grid ─────────────────────────────────────────────────────── */

	function renderGrid(layouts) {
		var $grid = state.$overlay.find('.tnb-acf-modal__grid');
		$grid.empty();

		if (!layouts.length) {
			$grid.append(
				'<div class="tnb-acf-modal__empty">' +
					svg('empty') +
					'<p>No components match your search.</p>' +
				'</div>'
			);
			return;
		}

		$.each(layouts, function (i, layout) {
			var preview    = PREVIEWS[layout.layout] || '';
			var previewHtml;

			if (preview) {
				previewHtml =
					'<div class="tnb-acf-modal__card-img">' +
						'<img src="' + escAttr(preview) + '" alt="" loading="lazy">' +
					'</div>';
			} else {
				previewHtml =
					'<div class="tnb-acf-modal__card-img tnb-acf-modal__card-img--placeholder">' +
						svg('placeholder') +
						'<span>No Preview</span>' +
					'</div>';
			}

			var $card = $('<button>', {
				type:           'button',
				'class':        'tnb-acf-modal__card',
				'data-layout':  layout.layout,
			}).html(
				previewHtml +
				'<div class="tnb-acf-modal__card-foot">' +
					'<span class="tnb-acf-modal__card-name">' + escHtml(layout.name) + '</span>' +
					'<span class="tnb-acf-modal__card-add">Add ' + svg('add') + '</span>' +
				'</div>'
			);

			$card.on('click', function () {
				selectLayout(layout);
			});

			$grid.append($card);
		});
	}

	/* ─── Open / close ────────────────────────────────────────────────────── */

	function openModal() {
		state.$overlay.find('.tnb-acf-modal__search').val('');
		renderGrid(state.layouts);
		state.$overlay.addClass('is-active');
		$('body').addClass('tnb-modal-open');
		// Focus search after transition starts
		setTimeout(function () {
			state.$overlay.find('.tnb-acf-modal__search').trigger('focus');
		}, 60);
	}

	function closeModal() {
		state.$overlay.removeClass('is-active');
		$('body').removeClass('tnb-modal-open');
		if (state.$nativePopup) {
			state.$nativePopup.remove();
			state.$nativePopup = null;
		}
	}

	/* ─── Select a layout → hand back to ACF ─────────────────────────────── */

	function selectLayout(layout) {
		// Close modal visually first
		state.$overlay.removeClass('is-active');
		$('body').removeClass('tnb-modal-open');

		// Trigger ACF's own click handler on the native popup item.
		// The popup is off-screen (not removed), so the $el reference is valid.
		layout.$el.trigger('click');

		// Nullify reference — ACF will clean up the popup after it adds the row
		state.$nativePopup = null;
	}

	/* ─── Search / filter ─────────────────────────────────────────────────── */

	function filterLayouts(query) {
		var q = query.trim().toLowerCase();
		if (!q) {
			renderGrid(state.layouts);
			return;
		}
		var filtered = state.layouts.filter(function (l) {
			return l.name.toLowerCase().indexOf(q) !== -1;
		});
		renderGrid(filtered);
	}

	/* ─── Intercept native ACF popup ──────────────────────────────────────── */

	/**
	 * ACF appends a div.acf-fc-popup to <body> when the add-layout button
	 * is clicked. We watch for it with a MutationObserver, then read the
	 * layout items it contains, move it off-screen, and show our modal.
	 */
	function watchForNativePopup() {
		var observer = new MutationObserver(function (mutations) {
			mutations.forEach(function (mutation) {
				Array.prototype.forEach.call(mutation.addedNodes, function (node) {
					if (node.nodeType !== 1) return;
					if ($(node).hasClass('acf-fc-popup')) {
						handleNativePopup($(node));
					}
				});
			});
		});

		observer.observe(document.body, { childList: true });
	}

	function handleNativePopup($popup) {
		state.$nativePopup = $popup;

		// Read available layouts from the popup ACF just built
		state.layouts = [];
		$popup.find('li a').each(function () {
			var $a = $(this);
			state.layouts.push({
				name:   $.trim($a.text()),
				layout: $a.data('layout'),
				$el:    $a,
			});
		});

		// Move popup completely off-screen (not removed — we need $el refs)
		$popup.css({
			position:      'fixed',
			top:           '-9999px',
			left:          '-9999px',
			visibility:    'hidden',
			pointerEvents: 'none',
		});

		// Show our modal
		openModal();
	}

	/* ─── Event bindings ──────────────────────────────────────────────────── */

	function bindEvents() {
		// Close button
		$(document).on('click.tnbAcfModal', '.tnb-acf-modal__close', closeModal);

		// Backdrop click (only the overlay itself, not the modal card)
		$(document).on('click.tnbAcfModal', '#tnb-acf-modal-overlay', function (e) {
			if ($(e.target).is('#tnb-acf-modal-overlay')) {
				closeModal();
			}
		});

		// ESC key
		$(document).on('keydown.tnbAcfModal', function (e) {
			if (e.key === 'Escape' && state.$overlay && state.$overlay.hasClass('is-active')) {
				closeModal();
			}
		});

		// Real-time search
		$(document).on('input.tnbAcfModal', '.tnb-acf-modal__search', function () {
			filterLayouts($(this).val());
		});

		// Enter key in search selects first visible card
		$(document).on('keydown.tnbAcfModal', '.tnb-acf-modal__search', function (e) {
			if (e.key === 'Enter') {
				var $first = state.$overlay.find('.tnb-acf-modal__card').first();
				if ($first.length) {
					$first.trigger('click');
				}
			}
		});
	}

	/* ─── Utility ─────────────────────────────────────────────────────────── */

	function escHtml(str) {
		return $('<div>').text(String(str)).html();
	}

	function escAttr(str) {
		return String(str)
			.replace(/&/g, '&amp;')
			.replace(/"/g, '&quot;')
			.replace(/</g, '&lt;')
			.replace(/>/g, '&gt;');
	}

	/* ─── Init ────────────────────────────────────────────────────────────── */

	acf.addAction('ready', function () {
		buildModal();
		bindEvents();
		watchForNativePopup();
	});

})(jQuery);
