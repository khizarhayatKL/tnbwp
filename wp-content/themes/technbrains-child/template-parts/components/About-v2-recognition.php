<?php
/**
 * About Us V2 — 07 Recognition (review-platform badges + feature card).
 *
 * Port of ABSRecognition from the QA-approved prototype
 * (about-story-copy.jsx:430-458), including the extra feature card that was
 * hardcoded at :450-454 and is now editable.
 *
 * Chapter of: abs_story (About-story.php) — a row of its abs_chapters field,
 * so values are read with get_sub_field() against the current row.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$abs_eyebrow = get_sub_field( 'abs_rec_eyebrow' );
$abs_h2      = get_sub_field( 'abs_rec_h2' );
$abs_lead    = get_sub_field( 'abs_rec_lead' );
$abs_cards   = get_sub_field( 'abs_recognition' );
$abs_f_pill  = get_sub_field( 'abs_rec_feat_pill' );
$abs_f_value = get_sub_field( 'abs_rec_feat_value' );
$abs_f_text  = get_sub_field( 'abs_rec_feat_text' );

$abs_has_feature = ( $abs_f_pill || $abs_f_value || $abs_f_text );

if ( empty( $abs_cards ) && ! $abs_has_feature ) {
	return;
}

// Solid five-star glyph used in every rating row.
$abs_rec_star = '<svg viewBox="0 0 24 24" fill="currentColor" width="13" height="13" aria-hidden="true"><path d="M12 2l2.9 6.3 6.9.7-5.1 4.6 1.4 6.8L12 17.8 5.9 20.4l1.4-6.8L2.2 9l6.9-.7z" /></svg>';
?>
<section class="abs-chapter" data-screen-label="06a Recognition">
	<div class="abs-wrap">
		<div class="abs-split">
			<div class="abs-rec-head abs-split-head abs-rev">
				<?php if ( $abs_eyebrow ) : ?>
					<span class="abs-eyebrow2"><span class="pip"></span> <?php echo esc_html( $abs_eyebrow ); ?></span>
				<?php endif; ?>
				<?php if ( $abs_h2 ) : ?>
					<h2 class="abs-h2"><?php echo esc_html( $abs_h2 ); ?></h2>
				<?php endif; ?>
				<?php if ( $abs_lead ) : ?>
					<p class="abs-lead"><?php echo esc_html( $abs_lead ); ?></p>
				<?php endif; ?>
			</div>
			<div class="abs-rec-grid abs-split-body abs-rev d1">
				<?php
				if ( ! empty( $abs_cards ) ) {
					foreach ( $abs_cards as $abs_card ) {
						$abs_badge  = isset( $abs_card['badge'] ) ? $abs_card['badge'] : '';
						$abs_rating = isset( $abs_card['rating'] ) ? $abs_card['rating'] : '';
						$abs_label  = isset( $abs_card['label'] ) ? $abs_card['label'] : '';

						$abs_badge_url = ( is_array( $abs_badge ) && ! empty( $abs_badge['url'] ) ) ? $abs_badge['url'] : '';
						$abs_badge_alt = ( is_array( $abs_badge ) && ! empty( $abs_badge['alt'] ) ) ? $abs_badge['alt'] : '';
						$abs_badge_w   = ( is_array( $abs_badge ) && ! empty( $abs_badge['width'] ) ) ? (int) $abs_badge['width'] : 0;
						$abs_badge_h   = ( is_array( $abs_badge ) && ! empty( $abs_badge['height'] ) ) ? (int) $abs_badge['height'] : 0;
						?>
						<div class="abs-rec-card">
							<?php if ( $abs_badge_url ) : ?>
								<div class="abs-rec-badge">
									<img src="<?php echo esc_url( $abs_badge_url ); ?>" alt="<?php echo esc_attr( $abs_badge_alt ); ?>"<?php echo $abs_badge_w ? ' width="' . esc_attr( $abs_badge_w ) . '"' : ''; ?><?php echo $abs_badge_h ? ' height="' . esc_attr( $abs_badge_h ) . '"' : ''; ?> loading="lazy" decoding="async" />
								</div>
							<?php endif; ?>
							<?php if ( '' !== trim( (string) $abs_rating ) ) : ?>
								<div class="abs-rec-rating">
									<span class="v"><?php echo esc_html( $abs_rating ); ?></span>
									<span class="stars">
										<?php
										for ( $abs_s = 0; $abs_s < 5; $abs_s++ ) {
											// Hardcoded design asset, not user input.
											echo $abs_rec_star; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
										}
										?>
									</span>
								</div>
							<?php endif; ?>
							<?php if ( $abs_label ) : ?>
								<div class="abs-rec-l"><?php echo esc_html( $abs_label ); ?></div>
							<?php endif; ?>
						</div>
						<?php
					}
				}

				if ( $abs_has_feature ) {
					?>
					<div class="abs-rec-card">
						<?php if ( $abs_f_pill ) : ?>
							<span class="abs-rec-pill">&#9733; <?php echo esc_html( $abs_f_pill ); ?></span>
						<?php endif; ?>
						<?php if ( $abs_f_value ) : ?>
							<div class="abs-rec-rating"><span class="v"><?php echo esc_html( $abs_f_value ); ?></span></div>
						<?php endif; ?>
						<?php if ( $abs_f_text ) : ?>
							<div class="abs-rec-l"><?php echo esc_html( $abs_f_text ); ?></div>
						<?php endif; ?>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</section>
