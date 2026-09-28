<?php
/**
 * Tech Certifications Component
 *
 * Flexible content layout part: white strip section with a label and an infinite
 * horizontal scrolling badge marquee displaying certification / technology logos.
 *
 * Marquee technique: badges are repeated 4× to fill the track, then the entire
 * set is duplicated so CSS can animate translateX(-50%) and loop seamlessly.
 *
 * ACF Fields (get_sub_field):
 *   tcc_label       — text   (section label)
 *   tcc_subtitle    — text   (optional, shown above label)
 *   tcc_description — textarea (optional, shown below subtitle)
 *   tcc_cta_text    — text   (optional CTA button label)
 *   tcc_cta_url     — url    (optional CTA URL)
 *   tcc_badges      — repeater
 *     tcc_badge_logo  — image (array)
 *     tcc_badge_title — text
 *     tcc_badge_desc  — textarea (optional, used as title attribute)
 *     tcc_badge_link  — url   (optional, wraps badge in <a>)
 *
 * @package TechnbrainsChild
 */

defined( 'ABSPATH' ) || exit;

// ── Fields ────────────────────────────────────────────────────────────────────
$label       = get_sub_field( 'tcc_label' );
$subtitle    = get_sub_field( 'tcc_subtitle' );
$description = get_sub_field( 'tcc_description' );
$cta_text    = get_sub_field( 'tcc_cta_text' );
$cta_url     = get_sub_field( 'tcc_cta_url' );
$badges      = get_sub_field( 'tcc_badges' );

// ── Build the looped badge array ──────────────────────────────────────────────
// Repeat 4× then duplicate the whole set → CSS scrolls by -50% to loop.
$badges_looped = array();
if ( ! empty( $badges ) ) {
	$quadrupled = array();
	for ( $r = 0; $r < 4; $r++ ) {
		foreach ( $badges as $badge ) {
			$quadrupled[] = $badge;
		}
	}
	// Duplicate for seamless loop.
	$badges_looped = array_merge( $quadrupled, $quadrupled );
}
?>
<section class="tc-certs">
	<div class="tc-certs-inner">

		<?php if ( $subtitle ) : ?>
			<p class="tc-certs-subtitle"><?php echo esc_html( $subtitle ); ?></p>
		<?php endif; ?>

		<?php if ( $description ) : ?>
			<p class="tc-certs-desc"><?php echo esc_html( $description ); ?></p>
		<?php endif; ?>

		<?php /* CTA button */ ?>
		<?php if ( $cta_text ) : ?>
			<div class="tc-certs-cta">
				<?php if ( $cta_url ) : ?>
					<a href="<?php echo esc_url( $cta_url ); ?>" class="tc-btn-secondary">
						<?php echo esc_html( $cta_text ); ?>
					</a>
				<?php else : ?>
					<button type="button" class="tc-btn-secondary tnb-popup-trigger">
						<?php echo esc_html( $cta_text ); ?>
					</button>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( $label ) : ?>
			<div class="tc-certs-label"><?php echo esc_html( $label ); ?></div>
		<?php endif; ?>

		<?php /* ── Marquee ──────────────────────────────────────────────────── */ ?>
		<?php if ( ! empty( $badges_looped ) ) : ?>
			<div class="tc-logos-marquee">
				<div class="tc-logos-track">

					<?php foreach ( $badges_looped as $badge ) : ?>
						<?php
						$logo       = $badge['tcc_badge_logo'] ?? array();
						$badge_name = $badge['tcc_badge_title'] ?? '';
						$badge_desc = $badge['tcc_badge_desc'] ?? '';
						$badge_link = $badge['tcc_badge_link'] ?? '';

						// Use desc as the accessible tooltip; fall back to name.
						$title_attr = $badge_desc ?: $badge_name;

						// Choose wrapper tag based on whether a link is provided.
						$has_link = ! empty( $badge_link );
						?>

						<?php if ( $has_link ) : ?>
							<a
								href="<?php echo esc_url( $badge_link ); ?>"
								class="tc-badge"
								<?php if ( $title_attr ) : ?>
									title="<?php echo esc_attr( $title_attr ); ?>"
								<?php endif; ?>
							>
						<?php else : ?>
							<div
								class="tc-badge"
								<?php if ( $title_attr ) : ?>
									title="<?php echo esc_attr( $title_attr ); ?>"
								<?php endif; ?>
							>
						<?php endif; ?>

							<?php if ( ! empty( $logo['id'] ) ) : ?>
								<span class="tc-badge-mark">
									<?php
									echo wp_get_attachment_image(
										(int) $logo['id'],
										array( 40, 40 ),
										false,
										array(
											'alt'     => esc_attr( $badge_name ),
											'loading' => 'lazy',
										)
									);
									?>
								</span>
							<?php endif; ?>

							<?php if ( $badge_name ) : ?>
								<span class="tc-badge-name"><?php echo esc_html( $badge_name ); ?></span>
							<?php endif; ?>

						<?php if ( $has_link ) : ?>
							</a>
						<?php else : ?>
							</div>
						<?php endif; ?>

					<?php endforeach; ?>

				</div><!-- .tc-logos-track -->
			</div><!-- .tc-logos-marquee -->
		<?php endif; ?>

	</div><!-- .tc-certs-inner -->
</section><!-- .tc-certs -->
