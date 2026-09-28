<?php
/**
 * Component: Service Hero Banner
 * Layout   : sv_hero (ACF Flexible Content)
 *
 * Pixel-perfect match of Claude Design SvHero (services-page-1.jsx).
 * 2-column grid: LEFT (hero content) | RIGHT (SvServiceCircleViz — circle disc
 * with radial chip items from ACF repeater).
 *
 * Fields:
 *   svh_eyebrow          — text     (optional eyebrow label)
 *   svh_heading          — text     (plain h1 text)
 *   svh_heading_accent   — text     (accent span, rendered in red)
 *   svh_sub              — textarea (subheading paragraph)
 *   svh_btn1_text        — text     (primary CTA label)
 *   svh_btn1_url         — url      (primary CTA href; empty → popup)
 *   svh_btn2_text        — text     (secondary CTA label)
 *   svh_btn2_url         — url      (secondary CTA href; empty → popup)
 *   svh_hero_image       — image    (optional — displayed inside circular disc)
 *   svh_bg_image         — image    (optional decorative section background)
 *   svh_items            — repeater (circle chip items)
 *     svh_item_icon      — image    (chip icon, shown in circular icon button)
 *     svh_item_title     — text     (chip label text)
 *     svh_item_desc      — textarea (unused in circle layout; kept for compatibility)
 *
 * Button logic:
 *   URL set  → normal <a href="url">
 *   URL empty → <button class="tnb-popup-trigger"> (opens existing popup)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/* ── 1. Fetch ACF data ──────────────────────────────────────────────────── */
$eyebrow        = get_sub_field( 'svh_eyebrow' )        ?: '';
$heading        = get_sub_field( 'svh_heading' )        ?: '';
$heading_accent = get_sub_field( 'svh_heading_accent' ) ?: '';
$sub            = get_sub_field( 'svh_sub' )            ?: '';
$btn1_text      = get_sub_field( 'svh_btn1_text' )      ?: '';
$btn1_url       = get_sub_field( 'svh_btn1_url' )       ?: '';
$btn2_text      = get_sub_field( 'svh_btn2_text' )      ?: '';
$btn2_url       = get_sub_field( 'svh_btn2_url' )       ?: '';
$hero_image     = get_sub_field( 'svh_hero_image' );
$bg_image       = get_sub_field( 'svh_bg_image' );

/* Feature chips — avoid have_rows() to protect ACF loop stack */
$raw_items = get_sub_field( 'svh_items' );
$items     = [];
if ( is_array( $raw_items ) ) {
	foreach ( $raw_items as $row ) {
		$title = trim( $row['svh_item_title'] ?? '' );
		if ( ! $title ) {
			continue;
		}
		$items[] = [
			'icon'  => $row['svh_item_icon'] ?? null,
			'title' => $title,
		];
	}
}

/* ── 2. Calculate radial angles for each chip ───────────────────────────
 * Original design places 6 items on the LEFT arc of the circle:
 * angles 134° → 224° (90° arc, 18° step). Labels appear to the left of each
 * icon via CSS `right: calc(100% + 14px)`, pointing inward into the viewport.
 */
$n      = count( $items );
$angles = [];
if ( $n === 1 ) {
	$angles = [ 179 ];
} elseif ( $n > 1 ) {
	$arc_start = 134;
	$arc_end   = 224;
	$step      = ( $arc_end - $arc_start ) / ( $n - 1 );
	for ( $i = 0; $i < $n; $i++ ) {
		$angles[] = (int) round( $arc_start + $step * $i );
	}
}
?>
<section class="sv-hero">

	<?php if ( ! empty( $bg_image['url'] ) ) : ?>
	<img
		src="<?php echo esc_url( $bg_image['url'] ); ?>"
		alt=""
		class="sv-hero-bg"
		aria-hidden="true"
		loading="eager">
	<?php endif; ?>

	<div class="sv-hero-wrap">

		<!-- ─── LEFT: hero content ────────────────────────────────── -->
		<div class="sv-hero-content">
				<?php tnb_breadcrumb_html(); ?>

			<?php if ( $eyebrow ) : ?>
			<div class="sv-hero-eyebrow">
				<span class="sv-hero-eyebrow-dot"></span>
				<?php echo esc_html( $eyebrow ); ?>
			</div>
			<?php endif; ?>

			<?php if ( $heading || $heading_accent ) : ?>
			<h1 class="sv-hero-h1">
				<?php echo esc_html( $heading ); ?>
				<?php if ( $heading_accent ) : ?>
				<br><span class="sv-hero-accent"><?php echo esc_html( $heading_accent ); ?></span>
				<?php endif; ?>
			</h1>
			<?php endif; ?>

			<?php if ( $sub ) : ?>
			<p class="sv-hero-sub"><?php echo esc_html( $sub ); ?></p>
			<?php endif; ?>

			<?php if ( $btn1_text || $btn2_text ) : ?>
			<div class="sv-hero-actions">

				<?php if ( $btn1_text ) : ?>
					<?php if ( $btn1_url ) : ?>
					<a href="<?php echo esc_url( $btn1_url ); ?>" class="sv-btn sv-btn-primary">
						<?php echo esc_html( $btn1_text ); ?>
					</a>
					<?php else : ?>
					<button type="button" class="sv-btn sv-btn-primary tnb-popup-trigger">
						<?php echo esc_html( $btn1_text ); ?>
					</button>
					<?php endif; ?>
				<?php endif; ?>

				<?php if ( $btn2_text ) : ?>
					<?php if ( $btn2_url ) : ?>
					<a href="<?php echo esc_url( $btn2_url ); ?>" class="sv-btn sv-btn-ghost-light">
						<?php echo esc_html( $btn2_text ); ?>
					</a>
					<?php else : ?>
					<button type="button" class="sv-btn sv-btn-ghost-light tnb-popup-trigger">
						<?php echo esc_html( $btn2_text ); ?>
					</button>
					<?php endif; ?>
				<?php endif; ?>

			</div><!-- .sv-hero-actions -->
			<?php endif; ?>

		</div><!-- .sv-hero-content -->

		<!-- ─── RIGHT: SvServiceCircleViz ────────────────────────── -->
		<div class="sv-hero-visual sv-anim-circle" aria-hidden="true">
			<div class="sv-svc">

				<!-- Floating particle canvas (JS-driven) -->
				<canvas class="sv-svc-particles"></canvas>

				<div class="sv-svc-orbit">

					<!-- Central disc -->
					<div class="sv-svc-disc">
						<!-- Plexus network canvas (JS-driven) -->
						<canvas class="sv-svc-plexus"></canvas>
						<span class="sv-svc-disc-tint"></span>
						<span class="sv-svc-disc-sheen"></span>
						<?php if ( ! empty( $hero_image['ID'] ) ) : ?>
						<?php echo wp_get_attachment_image(
							$hero_image['ID'],
							'large',
							false,
							[ 'alt' => '', 'loading' => 'eager' ]
						); ?>
						<?php endif; ?>
					</div><!-- .sv-svc-disc -->

					<!-- Rings -->
					<span class="sv-svc-ring ring-solid"></span>
					<span class="sv-svc-ring ring-dash"></span>

					<!-- Radial chip items from ACF repeater -->
					<?php foreach ( $items as $idx => $item ) :
						$angle = $angles[ $idx ] ?? 180;
					?>
					<div class="sv-svc-chip-pos" style="--chip-a:<?php echo (int) $angle; ?>deg">
						<div class="sv-svc-chip">
							<span class="sv-svc-chip-ic">
								<?php if ( ! empty( $item['icon']['ID'] ) ) : ?>
								<?php echo wp_get_attachment_image(
									$item['icon']['ID'],
									[ 30, 30 ],
									false,
									[ 'alt' => '', 'loading' => 'lazy' ]
								); ?>
								<?php else : ?>
								<!-- Default icon: code brackets -->
								<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
									stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
									<polyline points="16 18 22 12 16 6"/>
									<polyline points="8 6 2 12 8 18"/>
								</svg>
								<?php endif; ?>
							</span><!-- .sv-svc-chip-ic -->
							<span class="sv-svc-chip-label"><?php echo esc_html( $item['title'] ); ?></span>
						</div><!-- .sv-svc-chip -->
					</div><!-- .sv-svc-chip-pos -->
					<?php endforeach; ?>

				</div><!-- .sv-svc-orbit -->
			</div><!-- .sv-svc -->
		</div><!-- .sv-hero-visual -->

	</div><!-- .sv-hero-wrap -->
</section><!-- .sv-hero -->
