/**
 * Author Profile — front-end behaviour.
 *
 * Scroll-reveal: adds `.in` to `.ap-rev` elements as they enter the viewport (ported from the
 * QA source; reduced-motion handled in CSS). The contributions list paginates server-side with
 * the_posts_pagination(), so nothing here touches it.
 *
 * @package technbrains-child
 */
(function () {
	'use strict';

	/* ---------- scroll reveal (verbatim behaviour from source) ---------- */
	var revs = Array.prototype.slice.call(document.querySelectorAll('.ap-rev:not(.in)'));
	function revealUpdate() {
		var vh = window.innerHeight;
		revs.forEach(function (el) {
			var r = el.getBoundingClientRect();
			if (r.top < vh * 0.88 && r.bottom > 0) {
				el.classList.add('in');
			}
		});
		revs = revs.filter(function (el) { return !el.classList.contains('in'); });
	}
	window.addEventListener('scroll', revealUpdate, { passive: true });
	window.addEventListener('resize', revealUpdate);
	revealUpdate();

})();
