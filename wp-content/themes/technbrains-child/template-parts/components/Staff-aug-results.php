<?php
/**
 * Staff Augmentation — Results & recognition (counting metrics + logo strip).
 *
 * Layout : sa_results (ACF Flexible Content)
 * Fields : sars_eyebrow, sars_heading, sars_sub, sars_anchor,
 *          sars_metrics{ sars_num, sars_suffix, sars_decimals, sars_label },
 *          sars_logos{ sars_logo }
 * CSS    : assets/css/components.css (.sa-results, .sa-metric*, .sa-logos)
 * JS     : assets/js/components.js — [data-count] scroll counter.
 *
 * The number is printed at its final value and only then animated: the counter
 * overwrites it on scroll. With JS off, no IntersectionObserver, or reduced
 * motion, the figure is already correct — the approved build starts every metric
 * at 0 and leaves it there in all three cases.
 *
 * The suffix is a sibling span, never part of the animated text, so "+", "%" and
 * "/5" can never be fed to the maths or blink during the count.
 *
 * Logos are attachments rather than the approved build's inline SVGs. Those are
 * hand-drawn approximations of the marks — real brand artwork cannot be rebuilt
 * as <path> data in a template, and the theme already ships the five badges.
 * Because of that the greyscale rule targets img, not svg. Alt text comes from
 * each attachment, so the name lives with the image.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$sars_eyebrow = (string) get_sub_field( 'sars_eyebrow' );
$sars_heading = (string) get_sub_field( 'sars_heading' );
$sars_sub     = (string) get_sub_field( 'sars_sub' );
$sars_anchor  = sanitize_title( (string) get_sub_field( 'sars_anchor' ) );
$sars_metrics = (array) get_sub_field( 'sars_metrics' );
$sars_logos   = (array) get_sub_field( 'sars_logos' );

if ( ! $sars_metrics && ! $sars_logos ) {
	return;
}

$sars_kses = array(
	'br'   => array(),
	'span' => array( 'class' => true ),
);
?>
<section class="sa-results"<?php echo '' !== $sars_anchor ? ' id="' . esc_attr( $sars_anchor ) . '"' : ''; ?>>
	<div class="container sa-results-inner">
		<?php if ( '' !== $sars_eyebrow ) : ?>
			<div class="eyebrow"><?php echo esc_html( $sars_eyebrow ); ?></div>
		<?php endif; ?>
		<?php if ( '' !== $sars_heading ) : ?>
			<h2 class="sa-results-h2"><?php echo wp_kses( $sars_heading, $sars_kses ); ?></h2>
		<?php endif; ?>
		<?php if ( '' !== $sars_sub ) : ?>
			<p class="sa-results-sub"><?php echo wp_kses( $sars_sub, $sars_kses ); ?></p>
		<?php endif; ?>

		<?php if ( $sars_metrics ) : ?>
			<div class="sa-metrics">
				<?php
				foreach ( $sars_metrics as $sars_m ) :
					$sars_num   = trim( (string) ( $sars_m['sars_num'] ?? '' ) );
					$sars_label = (string) ( $sars_m['sars_label'] ?? '' );

					if ( '' === $sars_num && '' === $sars_label ) {
						continue;
					}

					$sars_dec = max( 0, min( 2, (int) ( $sars_m['sars_decimals'] ?? 0 ) ) );

					// The editor's figure is the animation's target and its own
					// fallback, so the two can never disagree.
					$sars_target  = (float) preg_replace( '/[^0-9.\-]/', '', $sars_num );
					$sars_display = $sars_dec > 0
						? number_format( $sars_target, $sars_dec, '.', '' )
						: (string) (int) round( $sars_target );
					$sars_suffix  = (string) ( $sars_m['sars_suffix'] ?? '' );
					?>
					<div class="sa-metric">
						<div class="sa-metric-value">
							<?php if ( '' !== $sars_num ) : ?>
								<span data-count data-target="<?php echo esc_attr( $sars_target ); ?>" data-decimals="<?php echo (int) $sars_dec; ?>">
									<span data-count-num><?php echo esc_html( $sars_display ); ?></span><?php
									if ( '' !== $sars_suffix ) :
										?><span class="sa-metric-suffix"><?php echo esc_html( $sars_suffix ); ?></span><?php
									endif;
								?></span>
							<?php endif; ?>
						</div>
						<?php if ( '' !== $sars_label ) : ?>
							<div class="sa-metric-label"><?php echo esc_html( $sars_label ); ?></div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php if ( $sars_logos ) : ?>
			<div class="sa-logos">
				<?php
				foreach ( $sars_logos as $sars_row ) :
					$sars_id = (int) ( $sars_row['sars_logo']['ID'] ?? 0 );

					if ( ! $sars_id ) {
						continue;
					}

					echo wp_get_attachment_image(
						$sars_id,
						'medium',
						false,
						array(
							'loading'  => 'lazy',
							'decoding' => 'async',
						)
					);
				endforeach;
				?>
			</div>
		<?php endif; ?>
	</div>
</section>
