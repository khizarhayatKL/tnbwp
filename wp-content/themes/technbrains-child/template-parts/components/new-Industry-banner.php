<?php
/**
 * Component: Industry Hero Banner (new-Industry-banner)
 *
 * Left column: heading, highlighted accent, description, two CTAs.
 * Right column: 3-column vertical marquee image grid (IHStreamViz).
 *
 * ACF Fields:
 *  - ihb_eyebrow            (text)       Optional uppercase eyebrow label.
 *  - ihb_badge_text         (text)       Optional pulsing-dot pill badge text.
 *  - ihb_title              (text)       H1 plain/main text portion.
 *  - ihb_title_accent       (text)       H1 red accent text portion.
 *  - ihb_description        (textarea)   Subtitle paragraph below the H1.
 *  - ihb_cta_primary_text   (text)       Primary CTA label.
 *  - ihb_cta_primary_url    (url)        Primary CTA URL (# prefix = popup trigger).
 *  - ihb_cta_secondary_text (text)       Secondary CTA label.
 *  - ihb_cta_secondary_url  (url)        Secondary CTA URL (# prefix = popup trigger).
 *  - ihb_bg_image           (image)      Optional section background image.
 *  - ihb_hero_images        (repeater)   Images for the 3-column scroll grid.
 *    └ ihb_hi_image         (image)      One image per row (6–12 recommended).
 *
 * @package TechnBrains_Child
 */

defined( 'ABSPATH' ) || exit;

// ── Field retrieval ───────────────────────────────────────────────────────────
$eyebrow      = get_sub_field( 'ihb_eyebrow' );
$badge_text   = get_sub_field( 'ihb_badge_text' );
$title        = get_sub_field( 'ihb_title' );
$title_accent = get_sub_field( 'ihb_title_accent' );
$description  = get_sub_field( 'ihb_description' );
$cta_pri_text = get_sub_field( 'ihb_cta_primary_text' );
$cta_pri_url  = get_sub_field( 'ihb_cta_primary_url' );
$cta_sec_text = get_sub_field( 'ihb_cta_secondary_text' );
$cta_sec_url  = get_sub_field( 'ihb_cta_secondary_url' );
$bg_image     = get_sub_field( 'ihb_bg_image' );

// ── Collect hero images from repeater ────────────────────────────────────────
$all_imgs = [];
if ( have_rows( 'ihb_hero_images' ) ) {
	while ( have_rows( 'ihb_hero_images' ) ) {
		the_row();
		$img = get_sub_field( 'ihb_hi_image' );
		if ( ! empty( $img['ID'] ) ) {
			$all_imgs[] = $img;
		}
	}
}

// ── Distribute images across 3 lanes (modulo) ────────────────────────────────
// Lane 0 → up   26s  (indices 0, 3, 6 …)
// Lane 1 → down 32s  (indices 1, 4, 7 …)
// Lane 2 → up   29s  (indices 2, 5, 8 …)
$lane_cfg  = [
	[ 'dir' => 'up',   'dur' => 26 ],
	[ 'dir' => 'down', 'dur' => 32 ],
	[ 'dir' => 'up',   'dur' => 29 ],
];
$lane_imgs = [ [], [], [] ];
foreach ( $all_imgs as $idx => $img ) {
	$lane_imgs[ $idx % 3 ][] = $img;
}
// Each lane needs at least 2 unique images for the doubled-track loop.
foreach ( $lane_imgs as &$lane ) {
	if ( empty( $lane ) ) { continue; }
	while ( count( $lane ) < 2 ) {
		$lane = array_merge( $lane, $lane );
	}
}
unset( $lane );

$has_stream = ! empty( $all_imgs );

// ── Derived values ────────────────────────────────────────────────────────────
$bg_image_id  = ! empty( $bg_image['id'] ) ? (int) $bg_image['id'] : 0;
$pri_is_popup = $cta_pri_url && strncmp( ltrim( $cta_pri_url ), '#', 1 ) === 0;
$sec_is_popup = $cta_sec_url && strncmp( ltrim( $cta_sec_url ), '#', 1 ) === 0;

$arrow_svg = '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>';
?>

<section class="ih-hero ih-orbithero"<?php if ( $bg_image_id ) : ?> style="background-image:url('<?php echo esc_url( wp_get_attachment_url( $bg_image_id ) ); ?>')"<?php endif; ?>>

	<div class="ih-oh-bg" aria-hidden="true"></div>

	<div class="ih-oh-grid">

		<?php /* ── Left: Content column ────────────────────────────────── */ ?>
	
		<div class="ih-oh-content">
	<?php tnb_breadcrumb_html(); ?>
			<?php if ( $badge_text ) : ?>
				<div class="ih-hero-badge">
					<span class="ih-hero-badge-dot" aria-hidden="true"></span>
					<?php echo esc_html( $badge_text ); ?>
				</div>
			<?php endif; ?>

			<?php if ( $eyebrow ) : ?>
				<div class="ih-eyebrow ih-oh-eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
			<?php endif; ?>

			<?php if ( $title || $title_accent ) : ?>
				<h1 class="ih-h1 ih-oh-h1">
					<?php if ( $title ) : ?>
						<?php echo wp_kses( $title, [ 'span' => [], 'br' => [] ] ); ?>
					<?php endif; ?>
					<?php if ( $title_accent ) : ?>
						<span class="accent"><?php echo esc_html( $title_accent ); ?></span>
					<?php endif; ?>
				</h1>
			<?php endif; ?>

			<?php if ( $description ) : ?>
				<p class="ih-oh-sub"><?php echo esc_html( $description ); ?></p>
			<?php endif; ?>

			<?php if ( $cta_pri_text || $cta_sec_text ) : ?>
				<div class="ih-hero-actions ih-oh-actions">

					<?php if ( $cta_pri_text ) : ?>
						<?php if ( $pri_is_popup ) : ?>
							<button
								class="ih-btn ih-btn-primary tnb-popup-trigger"
								data-target="<?php echo esc_attr( ltrim( $cta_pri_url ) ); ?>"
								type="button"
							>
								<?php echo esc_html( $cta_pri_text ); ?>
								<?php //echo $arrow_svg; ?>
							</button>
						<?php else : ?>
							<a href="<?php echo esc_url( $cta_pri_url ); ?>" class="ih-btn ih-btn-primary">
								<?php echo esc_html( $cta_pri_text ); ?>
								<?php //echo $arrow_svg;?>
							</a>
						<?php endif; ?>
					<?php endif; ?>

					<?php if ( $cta_sec_text ) : ?>
						<?php if ( $sec_is_popup ) : ?>
							<button
								class="ih-btn ih-oh-ghost tnb-popup-trigger"
								data-target="<?php echo esc_attr( ltrim( $cta_sec_url ) ); ?>"
								type="button"
							>
								<?php echo esc_html( $cta_sec_text ); ?>
								<?php //echo $arrow_svg; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</button>
						<?php else : ?>
							<a href="<?php echo esc_url( $cta_sec_url ); ?>" class="ih-btn ih-oh-ghost">
								<?php echo esc_html( $cta_sec_text ); ?>
								<?php //echo $arrow_svg; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</a>
						<?php endif; ?>
					<?php endif; ?>

				</div>
			<?php endif; ?>

		</div>
		<?php /* ── End left column ──────────────────────────────────────── */ ?>

		<?php /* ── Right: 3-column vertical scroll image grid ────────────── */ ?>
		<div class="ih-oh-visual" aria-hidden="true">

			<?php if ( $has_stream ) : ?>
			<div class="ih-stream">
				<?php foreach ( $lane_cfg as $li => $lane ) :
					if ( empty( $lane_imgs[ $li ] ) ) { continue; }
					// Double the images for seamless infinite scroll
					$track_imgs = array_merge( $lane_imgs[ $li ], $lane_imgs[ $li ] );
				?>
				<div class="ih-stream-lane">
					<div class="ih-stream-track <?php echo esc_attr( $lane['dir'] ); ?>" style="animation-duration:<?php echo (int) $lane['dur']; ?>s">
						<?php foreach ( $track_imgs as $img ) : ?>
						<div class="ih-stream-chip">
							<span class="ih-stream-chip-img">
								<?php echo wp_get_attachment_image(
									(int) $img['ID'],
									'medium',
									false,
									[
										'loading'  => 'lazy',
										'decoding' => 'async',
										'alt'      => '',
									]
								); ?>
							</span>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>

		</div>
		<?php /* ── End right column ─────────────────────────────────────── */ ?>

	</div>

</section>
