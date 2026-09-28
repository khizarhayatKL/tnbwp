<?php
/**
 * Template Part: Location Results & Recognition
 *
 * ACF sub_fields (inside flexible content layout 'loc_results_rec'):
 *   lrr_section_title  — Section heading
 *   lrr_subtitle       — Eyebrow label
 *   lrr_description    — Subtitle paragraph
 *   lrr_cta_text       — CTA button label
 *   lrr_cta_url        — CTA button URL (empty → popup trigger)
 *
 *   lrr_metrics (repeater):
 *     lrr_metric_value    — Numeric value (e.g. 12, 94, 4.7)
 *     lrr_metric_suffix   — Suffix appended in red (e.g. +, %, ★)
 *     lrr_metric_decimals — Decimal places for counter animation (default 0)
 *     lrr_metric_label    — Label beneath value
 *
 *   lrr_logos (repeater):
 *     lrr_logo_image — Image (array)
 *     lrr_logo_link  — Optional URL
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$lrr_title       = get_sub_field( 'lrr_section_title' );
$lrr_subtitle    = get_sub_field( 'lrr_subtitle' );
$lrr_description = get_sub_field( 'lrr_description' );
$lrr_cta_text    = get_sub_field( 'lrr_cta_text' );
$lrr_cta_url     = get_sub_field( 'lrr_cta_url' );
$lrr_metrics     = get_sub_field( 'lrr_metrics' );
$lrr_logos       = get_sub_field( 'lrr_logos' );
?>

<section class="loc-results">

	<!-- Dome decorative background -->
	<div class="loc-results-comp" aria-hidden="false">

		<div class="loc-dome-glow-ambient" aria-hidden="true"></div>
		<div class="loc-dome-glow" aria-hidden="true"></div>
		<div class="loc-dome-wrap" aria-hidden="true">
			<svg class="loc-dome-svg" viewBox="0 0 1600 680" preserveAspectRatio="xMidYMin meet" aria-hidden="true" focusable="false">
				<defs>
					<radialGradient id="locDomeGrad" cx="50%" cy="100%" r="55%" fx="50%" fy="100%">
						<stop offset="0%" stop-color="#140c16"/>
						<stop offset="45%" stop-color="#0c0812"/>
						<stop offset="80%" stop-color="#07060e"/>
						<stop offset="100%" stop-color="#050810"/>
					</radialGradient>
				</defs>
				<!-- bloom ring -->
				<circle cx="800" cy="680" r="612" class="loc-dome-edge-bloom"/>
				<!-- outer edge -->
				<circle cx="800" cy="680" r="604" class="loc-dome-edge-outer"/>
				<!-- dome body -->
				<circle cx="800" cy="680" r="600" class="loc-dome-body"/>
				<!-- red rim -->
				<circle cx="800" cy="680" r="600" class="loc-dome-edge"/>
			</svg>
		</div>

		<!-- Content -->
		<div class="loc-results-content">

			<?php if ( $lrr_subtitle ) : ?>
				<p class="loc-results-eyebrow"><?php echo esc_html( $lrr_subtitle ); ?></p>
			<?php endif; ?>

			<?php if ( $lrr_title ) : ?>
				<h2 class="loc-results-h2"><?php echo wp_kses_post( $lrr_title ); ?></h2>
			<?php endif; ?>

			<?php if ( $lrr_description ) : ?>
				<p class="loc-results-sub"><?php echo esc_html( $lrr_description ); ?></p>
			<?php endif; ?>

			<?php if ( ! empty( $lrr_metrics ) ) : ?>
			<div class="loc-metrics">
				<?php foreach ( $lrr_metrics as $metric ) :
					$val      = ! empty( $metric['lrr_metric_value'] )    ? $metric['lrr_metric_value']    : '0';
					$suffix   = ! empty( $metric['lrr_metric_suffix'] )   ? $metric['lrr_metric_suffix']   : '';
					$decimals = isset( $metric['lrr_metric_decimals'] )   ? (int) $metric['lrr_metric_decimals'] : 0;
					$label    = ! empty( $metric['lrr_metric_label'] )    ? $metric['lrr_metric_label']    : '';
				?>
				<div class="loc-metric">
					<div class="loc-metric-value"
						data-lrr-counter
						data-target="<?php echo esc_attr( $val ); ?>"
						data-suffix="<?php echo esc_attr( $suffix ); ?>"
						data-decimals="<?php echo esc_attr( $decimals ); ?>">
						<span class="loc-metric-num"><?php echo esc_html( $decimals > 0 ? number_format( (float) $val, $decimals ) : (string) (int) $val ); ?></span><span class="loc-metric-suffix"><?php echo esc_html( $suffix ); ?></span>
					</div>
					<?php if ( $label ) : ?>
					<div class="loc-metric-label"><?php echo esc_html( $label ); ?></div>
					<?php endif; ?>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>

			<?php if ( ! empty( $lrr_logos ) ) : ?>
			<div class="loc-logos">
				<?php foreach ( $lrr_logos as $logo ) :
					$logo_img  = ! empty( $logo['lrr_logo_image'] )  ? $logo['lrr_logo_image']  : '';
					$logo_link = ! empty( $logo['lrr_logo_link'] )   ? $logo['lrr_logo_link']   : '';

					if ( empty( $logo_img['ID'] ) ) continue;

					$img_tag = wp_get_attachment_image(
						$logo_img['ID'],
						'full',
						false,
						[
							'class'   => 'loc-logo-img',
							'alt'     => esc_attr( ! empty( $logo_img['alt'] ) ? $logo_img['alt'] : '' ),
							'loading' => 'lazy',
						]
					);
				?>
					<?php if ( $logo_link ) : ?>
					<a href="<?php echo esc_url( $logo_link ); ?>" class="loc-logo-item" target="_blank" rel="noopener noreferrer">
						<?php echo $img_tag; ?>
					</a>
					<?php else : ?>
					<span class="loc-logo-item"><?php echo $img_tag; ?></span>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>

			<?php if ( $lrr_cta_text ) : ?>
			<div class="loc-results-cta">
				<?php if ( $lrr_cta_url ) : ?>
					<a href="<?php echo esc_url( $lrr_cta_url ); ?>" class="loc-btn-primary">
						<?php echo esc_html( $lrr_cta_text ); ?>
					</a>
				<?php else : ?>
					<button type="button" class="loc-btn-primary tnb-popup-trigger">
						<?php echo esc_html( $lrr_cta_text ); ?>
					</button>
				<?php endif; ?>
			</div>
			<?php endif; ?>

		</div><!-- .loc-results-content -->

	</div><!-- .loc-results-comp -->

</section>
