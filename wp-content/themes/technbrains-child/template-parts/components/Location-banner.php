<?php
/**
 * Location Banner / Hero Component
 *
 * Flexible content layout part: dark hero with left content and right visual.
 *
 * Right column behavior (automatic — no extra setting):
 *   • Hero Image uploaded  → shows the image, canvas hidden.
 *   • Hero Image empty     → shows animated 3D canvas globe.
 *
 * ACF Fields (get_sub_field):
 *   lhb_heading            — text (main h1; supports <br> and <span>)
 *   lhb_highlight          — text (optional accent word appended in red)
 *   lhb_sub                — textarea
 *   lhb_btn_primary_text   — text
 *   lhb_btn_primary_url    — url  (empty = popup trigger)
 *   lhb_btn_secondary_text — text
 *   lhb_btn_secondary_url  — url  (empty = popup trigger)
 *   lhb_hero_image         — image (array; overrides globe when set)
 *
 * @package TechnbrainsChild
 */

defined( 'ABSPATH' ) || exit;

// ── Fields ────────────────────────────────────────────────────────────────────
$heading    = get_sub_field( 'lhb_heading' );
$highlight  = get_sub_field( 'lhb_highlight' );
$sub        = get_sub_field( 'lhb_sub' );
$btn_p_text = get_sub_field( 'lhb_btn_primary_text' );
$btn_p_url  = get_sub_field( 'lhb_btn_primary_url' );
$btn_s_text = get_sub_field( 'lhb_btn_secondary_text' );
$btn_s_url  = get_sub_field( 'lhb_btn_secondary_url' );
$hero_image = get_sub_field( 'lhb_hero_image' );
$has_image  = ! empty( $hero_image['url'] );
?>

<section class="loc-hero loc-hero-light loc-hero-onblack">
	<div class="loc-hero-grid">

		<?php /* ── Left column: text content ─────────────────────────────────── */ ?>
		<div class="loc-hero-content">
		<?php tnb_breadcrumb_html(); ?>
			<?php if ( $heading || $highlight ) : ?>
				<h1 class="loc-hero-h1">
					<?php
					if ( $heading ) {
						echo wp_kses(
							$heading,
							array(
								'br'   => array(),
								'span' => array( 'class' => true ),
							)
						);
					}
					if ( $highlight ) {
						echo ' <span class="lhb-accent">' . esc_html( $highlight ) . '</span>';
					}
					?>
				</h1>
			<?php endif; ?>

			<?php if ( $sub ) : ?>
				<p class="loc-hero-sub"><?php echo esc_html( $sub ); ?></p>
			<?php endif; ?>

			<?php if ( $btn_p_text || $btn_s_text ) : ?>
				<div class="loc-hero-actions">

					<?php if ( $btn_p_text ) : ?>
						<?php if ( $btn_p_url ) : ?>
							<a href="<?php echo esc_url( $btn_p_url ); ?>" class="loc-btn-primary">
								<?php echo esc_html( $btn_p_text ); ?>
							</a>
						<?php else : ?>
							<button type="button" class="loc-btn-primary tnb-popup-trigger">
								<?php echo esc_html( $btn_p_text ); ?>
							</button>
						<?php endif; ?>
					<?php endif; ?>

					<?php if ( $btn_s_text ) : ?>
						<?php if ( $btn_s_url ) : ?>
							<a href="<?php echo esc_url( $btn_s_url ); ?>" class="loc-btn-secondary">
								<?php echo esc_html( $btn_s_text ); ?>
							</a>
						<?php else : ?>
							<button type="button" class="loc-btn-secondary tnb-popup-trigger">
								<?php echo esc_html( $btn_s_text ); ?>
							</button>
						<?php endif; ?>
					<?php endif; ?>

				</div>
			<?php endif; ?>

		</div><!-- .loc-hero-content -->

		<?php /* ── Right column: hero image (override) OR animated canvas globe ── */ ?>
		<?php if ( $has_image ) : ?>
			<div class="lhb-hero-img-wrap">
				<img
					src="<?php echo esc_url( $hero_image['url'] ); ?>"
					alt="<?php echo esc_attr( $hero_image['alt'] ?? '' ); ?>"
					width="<?php echo esc_attr( $hero_image['width'] ?? '' ); ?>"
					height="<?php echo esc_attr( $hero_image['height'] ?? '' ); ?>"
					loading="eager"
				>
			</div><!-- .lhb-hero-img-wrap -->
		<?php else : ?>
			<div class="loc-hero-globe" aria-hidden="true" data-lhb-globe>
				<canvas class="lhb-globe-canvas" aria-label="Rotating 3D globe showing TechnBrains global delivery network"></canvas>
			</div><!-- .loc-hero-globe -->
		<?php endif; ?>

	</div><!-- .loc-hero-grid -->
</section><!-- .loc-hero -->
