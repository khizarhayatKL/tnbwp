<?php
/**
 * Case Study — The Impact: before/after table, engagement note, outcome cards.
 *
 * Carries the third .cs-node for the narrative thread.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cs_eyebrow = (string) get_field( 'cs_impact_eyebrow' );
$cs_h2      = (string) get_field( 'cs_impact_h2' );
$cs_lede    = (string) get_field( 'cs_impact_lede' );
$cs_ba      = (array) get_field( 'cs_ba' );

$cs_eng_eyebrow = (string) get_field( 'cs_eng_eyebrow' );
$cs_eng_h2      = (string) get_field( 'cs_eng_h2' );
$cs_eng_body    = (string) get_field( 'cs_eng_body' );

$cs_out_label = (string) get_field( 'cs_outcomes_label' );
$cs_outcomes  = (array) get_field( 'cs_outcomes' );

$cs_allowed = tnb_cs_allowed_html();
?>
<section class="cs-section" data-screen-label="Impact">
	<div class="cs-wrap">
		<span class="cs-node cs-node--left" data-thread-node="impact"><span class="cs-node-label">Impact</span></span>
		<div class="cs-section-head cs-reveal">
			<?php if ( '' !== $cs_eyebrow ) : ?>
				<span class="cs-eyebrow"><?php echo esc_html( $cs_eyebrow ); ?></span>
			<?php endif; ?>
			<?php if ( '' !== $cs_h2 ) : ?>
				<h2 class="cs-h2"><?php echo wp_kses( $cs_h2, $cs_allowed ); ?></h2>
			<?php endif; ?>
			<?php if ( '' !== $cs_lede ) : ?>
				<p class="cs-body cs-lede-lg"><?php echo wp_kses( $cs_lede, $cs_allowed ); ?></p>
			<?php endif; ?>
		</div>

		<?php if ( $cs_ba ) : ?>
			<?php
			// Genuinely tabular: two labelled columns of paired values. Marked up as a table so
			// the Before/After headers are associated with their cells rather than being two
			// styled captions. The design's layout is unchanged — every row is still the same
			// three-column grid, driven by .cs-ba-head / .cs-ba-row as before, with the table
			// display modes neutralised in case-study.css.
			?>
			<table class="cs-ba cs-reveal">
				<caption class="screen-reader-text">What changed, before and after the engagement</caption>
				<thead>
					<tr class="cs-ba-head">
						<th scope="col" class="cs-ba-h cs-ba-h--before">Before</th>
						<td class="cs-ba-arrow" aria-hidden="true"><?php
							echo tnb_cs_icon( 'ba-arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- inline SVG from the theme.
						?></td>
						<th scope="col" class="cs-ba-h cs-ba-h--after">After</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $cs_ba as $cs_row ) : ?>
						<tr class="cs-ba-row">
							<td class="cs-ba-cell cs-ba-cell--before"><?php echo wp_kses( (string) ( $cs_row['cs_ba_before'] ?? '' ), $cs_allowed ); ?></td>
							<td class="cs-ba-sep" aria-hidden="true"><?php
								echo tnb_cs_icon( 'ba-sep' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- inline SVG from the theme.
							?></td>
							<td class="cs-ba-cell cs-ba-cell--after"><?php echo wp_kses( (string) ( $cs_row['cs_ba_after'] ?? '' ), $cs_allowed ); ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif; ?>

		<div class="cs-outcomes">
			<div class="cs-why2 cs-reveal">
				<div class="cs-why2-narr">
					<?php if ( '' !== $cs_eng_eyebrow ) : ?>
						<span class="cs-eyebrow"><?php echo esc_html( $cs_eng_eyebrow ); ?></span>
					<?php endif; ?>
					<?php if ( '' !== $cs_eng_h2 ) : ?>
						<h2 class="cs-h2" style="white-space:nowrap"><?php echo wp_kses( $cs_eng_h2, $cs_allowed ); ?></h2>
					<?php endif; ?>
					<?php
					echo tnb_cs_paragraphs( $cs_eng_body, 'br', ' class="cs-body" style="font-weight:500"' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped inside the helper.
					?>
				</div>
				<?php if ( '' !== $cs_out_label ) : ?>
					<span class="cs-why2-label"><?php echo esc_html( $cs_out_label ); ?></span>
				<?php endif; ?>
				<?php if ( $cs_outcomes ) : ?>
					<ul class="cs-why2-cards">
						<?php foreach ( $cs_outcomes as $cs_card ) : ?>
							<li class="cs-why2-card"><span class="cs-why2-v"><?php echo esc_html( (string) ( $cs_card['cs_outcome_value'] ?? '' ) ); ?></span><span class="cs-why2-l"><?php echo esc_html( (string) ( $cs_card['cs_outcome_label'] ?? '' ) ); ?></span></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
