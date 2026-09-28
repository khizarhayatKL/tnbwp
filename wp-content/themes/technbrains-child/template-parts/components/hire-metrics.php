<?php
/**
 * Component: Hire Developer — Metrics
 * Layout   : hd_metrics (ACF Flexible Content)
 *
 * Centered heading, horizontal row of 5 stat items separated by dividers,
 * animated count-up on scroll, and a "Recognised By" logo marquee.
 *
 * Fields:
 *   hdmt_eyebrow         — text
 *   hdmt_heading         — text    (plain part)
 *   hdmt_heading_accent  — text    (accent span)
 *   hdmt_sub             — textarea
 *   hdmt_metrics         — repeater
 *     hdmt_num           — text    (e.g. "24" or "4.7")
 *     hdmt_suffix        — text    (e.g. " Hours" or "%")
 *     hdmt_label         — text
 *     hdmt_is_featured   — true_false
 *     hdmt_decimals      — number  (0 or 1)
 *   hdmt_recog_logos     — repeater
 *     hdmt_recog_logo    — image (array)
 *     hdmt_recog_alt     — text
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$eyebrow        = get_sub_field( 'hdmt_eyebrow' )        ?: '';
$heading        = get_sub_field( 'hdmt_heading' )        ?: 'Engineering Performance at';
$heading_accent = get_sub_field( 'hdmt_heading_accent' ) ?: 'Measurable Scale';
$sub            = get_sub_field( 'hdmt_sub' )            ?: '';

/* Metrics */
$metrics = [];
if ( have_rows( 'hdmt_metrics' ) ) {
	while ( have_rows( 'hdmt_metrics' ) ) {
		the_row();
		$metrics[] = [
			'num'         => get_sub_field( 'hdmt_num' )         ?: '0',
			'suffix'      => get_sub_field( 'hdmt_suffix' )      ?: '',
			'label'       => get_sub_field( 'hdmt_label' )       ?: '',
			'is_featured' => (bool) get_sub_field( 'hdmt_is_featured' ),
			'decimals'    => (int) ( get_sub_field( 'hdmt_decimals' ) ?: 0 ),
		];
	}
}

/* Recognised-by logos */
$recog_logos = [];
if ( have_rows( 'hdmt_recog_logos' ) ) {
	while ( have_rows( 'hdmt_recog_logos' ) ) {
		the_row();
		$logo = get_sub_field( 'hdmt_recog_logo' );
		$recog_logos[] = [
			'logo' => $logo,
			'alt'  => get_sub_field( 'hdmt_recog_alt' ) ?: '',
		];
	}
}
$show_recog = ! empty( $recog_logos );

/* Duplicate for infinite marquee */
$recog_items = $show_recog ? array_merge( $recog_logos, $recog_logos ) : [];
?>
<section class="hd-metrics">
	<div class="hd-container">

		<div class="hd-section-head center">
			<?php if ( $eyebrow ) : ?>
			<div class="hd-eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
			<?php endif; ?>

			<?php if ( $heading || $heading_accent ) : ?>
			<h2 class="hd-h2">
				<?php echo esc_html( $heading ); ?>
				<?php if ( $heading_accent ) : ?>
				<span class="hd-accent"><?php echo esc_html( $heading_accent ); ?></span>
				<?php endif; ?>
			</h2>
			<?php endif; ?>

			<?php if ( $sub ) : ?>
			<p class="hd-sub"><?php echo esc_html( $sub ); ?></p>
			<?php endif; ?>
		</div>

		<?php if ( ! empty( $metrics ) ) : ?>
		<div class="hd-metrics-row">
			<?php foreach ( $metrics as $idx => $m ) : ?>
				<?php if ( $idx > 0 ) : ?>
				<div class="hd-metrics-divider" aria-hidden="true"></div>
				<?php endif; ?>
				<div class="hd-metric-item<?php echo $m['is_featured'] ? ' is-featured' : ''; ?>">
					<div class="hd-metric-num">
						<span
							class="hd-count-num"
							data-target="<?php echo esc_attr( $m['num'] ); ?>"
							data-decimals="<?php echo esc_attr( $m['decimals'] ); ?>"
						><?php echo esc_html( $m['num'] ); ?></span>
						<span class="suffix"><?php echo esc_html( $m['suffix'] ); ?></span>
					</div>
					<div class="hd-metric-label"><?php echo esc_html( $m['label'] ); ?></div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<?php if ( $show_recog ) : ?>
		<div class="hd-recog-strip">
			<span class="hd-recog-label">Recognised By</span>
			<div class="hd-recog-marquee">
				<div class="hd-recog-track">
					<?php foreach ( $recog_items as $i => $item ) : ?>
					<div class="hd-recog-item"<?php echo $i >= count( $recog_logos ) ? ' aria-hidden="true"' : ''; ?>>
						<?php if ( ! empty( $item['logo']['id'] ) ) : ?>
							<?php echo wp_get_attachment_image(
								$item['logo']['id'],
								'full',
								false,
								[
									'alt'      => esc_attr( $item['alt'] ),
									'loading'  => 'lazy',
									'decoding' => 'async',
									'class'    => 'hd-recog-logo-img',
								]
							); ?>
						<?php endif; ?>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>

	</div>
</section>
<script>
(function() {
	var nums = document.querySelectorAll('.hd-count-num');
	if (!nums.length || typeof IntersectionObserver === 'undefined') return;

	nums.forEach(function(el) {
		var target   = parseFloat(el.dataset.target)   || 0;
		var decimals = parseInt(el.dataset.decimals, 10) || 0;
		var duration = 1700;
		var started  = false;

		var io = new IntersectionObserver(function(entries) {
			entries.forEach(function(e) {
				if (!e.isIntersecting || started) return;
				started = true;
				var t0 = performance.now();

				function tick(now) {
					var t     = Math.min(1, (now - t0) / duration);
					var eased = 1 - Math.pow(1 - t, 3);
					var val   = target * eased;
					el.textContent = decimals > 0
						? val.toFixed(decimals)
						: Math.round(val).toLocaleString();
					if (t < 1) {
						requestAnimationFrame(tick);
					} else {
						el.textContent = decimals > 0
							? target.toFixed(decimals)
							: target.toLocaleString();
					}
				}
				requestAnimationFrame(tick);
			});
		}, { threshold: 0.5 });

		io.observe(el);
	});
})();
</script>
