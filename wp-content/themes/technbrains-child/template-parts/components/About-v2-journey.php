<?php
/**
 * About Us V2 — 06 Journey (sticky heading left, era cards right).
 *
 * Port of ABSExperience from the QA-approved prototype
 * (about-story-copy.jsx:394-421). Cards reveal one-by-one via the .abs-jc
 * IntersectionObserver in about-v2.js; the last row carries .is-now and the
 * "Today" badge.
 *
 * Chapter of: abs_story (About-story.php) — a row of its abs_chapters field,
 * so values are read with get_sub_field() against the current row.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$abs_eyebrow  = get_sub_field( 'abs_journey_eyebrow' );
$abs_h2       = get_sub_field( 'abs_journey_h2' );
$abs_lead     = get_sub_field( 'abs_journey_lead' );
$abs_today    = get_sub_field( 'abs_journey_today' );
$abs_timeline = get_sub_field( 'abs_timeline' );

if ( empty( $abs_timeline ) ) {
	return;
}

$abs_last = count( $abs_timeline ) - 1;
?>
<section class="abs-yr abs-erx" data-screen-label="06b Years">
	<div class="abs-wrap">
		<div class="abs-jrn-split">
			<div class="abs-jrn-head abs-rev">
				<?php if ( $abs_eyebrow ) : ?>
					<span class="abs-eyebrow2"><span class="pip"></span> <?php echo esc_html( $abs_eyebrow ); ?></span>
				<?php endif; ?>
				<?php if ( $abs_h2 ) : ?>
					<h2 class="abs-h2"><?php echo wp_kses_post( $abs_h2 ); ?></h2>
				<?php endif; ?>
				<?php if ( $abs_lead ) : ?>
					<p class="abs-lead abs-jrn-sub"><?php echo esc_html( $abs_lead ); ?></p>
				<?php endif; ?>
			</div>
			<div class="abs-jrn-cards">
				<?php
				foreach ( $abs_timeline as $abs_i => $abs_era ) {
					$abs_label = isset( $abs_era['era'] ) ? $abs_era['era'] : '';
					$abs_text  = isset( $abs_era['text'] ) ? $abs_era['text'] : '';

					if ( '' === trim( (string) $abs_label ) && '' === trim( (string) $abs_text ) ) {
						continue;
					}

					$abs_is_now = ( $abs_i === $abs_last );
					?>
					<div class="abs-jc<?php echo $abs_is_now ? ' is-now' : ''; ?>">
						<div class="abs-jc-head">
							<?php if ( $abs_label ) : ?>
								<span class="abs-jc-year"><?php echo esc_html( $abs_label ); ?></span>
							<?php endif; ?>
							<?php if ( $abs_is_now && $abs_today ) : ?>
								<span class="abs-jc-step"><?php echo esc_html( $abs_today ); ?></span>
							<?php endif; ?>
						</div>
						<?php if ( $abs_text ) : ?>
							<p class="abs-jc-text"><?php echo esc_html( $abs_text ); ?></p>
						<?php endif; ?>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</section>
