<?php
/**
 * Landing Page — Stat Cards.
 *
 * Layout : lp_stats (ACF Flexible Content)
 * Fields : lps_heading, lps_cards{ lps_stat_value, lps_stat_suffix, lps_stat_title,
 *          lps_stat_desc }, lps_anchor
 * CSS    : assets/css/components.css (.lp-stats-*)
 * JS     : inline count-up-on-scroll, same IntersectionObserver pattern as
 *          hire-metrics.php's .hd-count-num — kept local since it's a handful
 *          of lines and this is the only place lp_stats renders.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$lps_heading = (string) get_sub_field( 'lps_heading' );
$lps_anchor  = sanitize_title( (string) get_sub_field( 'lps_anchor' ) );

$lps_cards = [];
if ( have_rows( 'lps_cards' ) ) {
	while ( have_rows( 'lps_cards' ) ) {
		the_row();
		$lps_cards[] = [
			'value'  => (string) get_sub_field( 'lps_stat_value' ),
			'suffix' => (string) get_sub_field( 'lps_stat_suffix' ),
			'title'  => (string) get_sub_field( 'lps_stat_title' ),
			'desc'   => (string) get_sub_field( 'lps_stat_desc' ),
		];
	}
}

if ( '' === $lps_heading && empty( $lps_cards ) ) {
	return;
}
?>
<section class="lp-stats"<?php echo '' !== $lps_anchor ? ' id="' . esc_attr( $lps_anchor ) . '"' : ''; ?>>
	<div class="lp-stats-inner">
		<?php if ( '' !== $lps_heading ) : ?>
			<h2 class="lp-stats-h2"><?php echo esc_html( $lps_heading ); ?></h2>
		<?php endif; ?>

		<?php if ( ! empty( $lps_cards ) ) : ?>
			<div class="lp-stats-grid">
				<?php foreach ( $lps_cards as $lps_card ) :
					if ( '' === $lps_card['value'] && '' === $lps_card['title'] ) {
						continue;
					}
					?>
					<div class="lp-stats-card">
						<div class="lp-stats-num">
							<?php if ( '' !== $lps_card['value'] ) : ?>
								<span class="lp-stats-count" data-target="<?php echo esc_attr( $lps_card['value'] ); ?>"><?php echo esc_html( $lps_card['value'] ); ?></span>
							<?php endif; ?>
							<?php if ( '' !== $lps_card['suffix'] ) : ?>
								<span class="lp-stats-suffix"><?php echo esc_html( $lps_card['suffix'] ); ?></span>
							<?php endif; ?>
						</div>
						<?php if ( '' !== $lps_card['title'] ) : ?>
							<div class="lp-stats-title"><?php echo esc_html( $lps_card['title'] ); ?></div>
						<?php endif; ?>
						<?php if ( '' !== $lps_card['desc'] ) : ?>
							<div class="lp-stats-hr" aria-hidden="true"></div>
							<p class="lp-stats-desc"><?php echo esc_html( $lps_card['desc'] ); ?></p>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
<script>
(function () {
	var nums = document.querySelectorAll('.lp-stats-count');
	if (!nums.length || typeof IntersectionObserver === 'undefined') return;

	nums.forEach(function (el) {
		var target = parseFloat(el.dataset.target) || 0;
		if (!target) return;
		var duration = 1400;
		var started = false;

		var io = new IntersectionObserver(function (entries) {
			entries.forEach(function (e) {
				if (!e.isIntersecting || started) return;
				started = true;
				var t0 = performance.now();

				function tick(now) {
					var t = Math.min(1, (now - t0) / duration);
					var eased = 1 - Math.pow(1 - t, 3);
					el.textContent = Math.round(target * eased).toLocaleString();
					if (t < 1) {
						requestAnimationFrame(tick);
					} else {
						el.textContent = target.toLocaleString();
					}
				}
				requestAnimationFrame(tick);
			});
		}, { threshold: 0.5 });

		io.observe(el);
	});
})();
</script>
