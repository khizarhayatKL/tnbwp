<?php
/**
 * Component: Service — Track Record (Metrics)
 * Layout   : sv_track_record (ACF Flexible Content)
 *
 * White-background section displaying animated count-up stat metrics.
 * Matches Claude Design TrackRecord / SvCounter component exactly.
 *
 * Fields:
 *   svtr_eyebrow  — text     (optional eyebrow label)
 *   svtr_heading  — text     (section heading)
 *   svtr_sub      — textarea (sub-paragraph)
 *   svtr_metrics  — repeater
 *     svtr_value    — number (target number, e.g. 12, 150, 94, 4.7)
 *     svtr_suffix   — text   (suffix after number, e.g. "+", "%", "★")
 *     svtr_decimals — number (decimal places: 0 or 1)
 *     svtr_label    — text   (label below the metric value)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/* ── 1. Fetch ACF data ──────────────────────────────────────────────────── */
$eyebrow  = get_sub_field( 'svtr_eyebrow' ) ?: '';
$heading  = get_sub_field( 'svtr_heading' ) ?: '';
$sub      = get_sub_field( 'svtr_sub' )     ?: '';

$metrics_raw = get_sub_field( 'svtr_metrics' );
$metrics     = [];
if ( is_array( $metrics_raw ) ) {
	foreach ( $metrics_raw as $row ) {
		$value = $row['svtr_value'] ?? 0;
		if ( $value === '' || $value === null ) {
			continue;
		}
		$metrics[] = [
			'value'    => (float) $value,
			'suffix'   => sanitize_text_field( $row['svtr_suffix']   ?? '' ),
			'decimals' => (int) ( $row['svtr_decimals'] ?? 0 ),
			'label'    => sanitize_text_field( $row['svtr_label']    ?? '' ),
		];
	}
}
?>
<section class="sv-results">
	<div class="container sv-results-inner">

		<?php if ( $eyebrow ) : ?>
		<div class="sv-results-eyebrow">
			<?php echo esc_html( $eyebrow ); ?>
		</div>
		<?php endif; ?>

		<?php if ( $heading ) : ?>
			<h2 class="sv-results-h2">
				<?php 
				echo wp_kses( $heading, array(
					'br'   => array(),
					'span' => array(
						'class' => array(),
					),
				) ); 
				?>
			</h2>
		<?php endif; ?>

		<?php if ( $sub ) : ?>
		<p class="sv-results-sub"><?php echo esc_html( $sub ); ?></p>
		<?php endif; ?>

		<?php if ( ! empty( $metrics ) ) : ?>
		<div class="sv-metrics">
			<?php foreach ( $metrics as $m ) : ?>
			<div class="sv-metric">
				<div class="sv-metric-value"
					data-target="<?php echo esc_attr( $m['value'] ); ?>"
					data-suffix="<?php echo esc_attr( $m['suffix'] ); ?>"
					data-decimals="<?php echo esc_attr( $m['decimals'] ); ?>">
					<span class="sv-metric-num">
						<?php
						if ( $m['decimals'] > 0 ) {
							echo esc_html( number_format( $m['value'], $m['decimals'] ) );
						} else {
							echo esc_html( (int) round( $m['value'] ) );
						}
						?>
					</span>
					<?php if ( $m['suffix'] ) : ?>
					<span class="sv-metric-suffix"><?php echo esc_html( $m['suffix'] ); ?></span>
					<?php endif; ?>
				</div>
				<?php if ( $m['label'] ) : ?>
				<div class="sv-metric-label"><?php echo esc_html( $m['label'] ); ?></div>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

	</div>
</section><!-- .sv-results -->
