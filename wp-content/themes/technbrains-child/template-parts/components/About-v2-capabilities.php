<?php
/**
 * About Us V2 — 04 Capabilities ("What We Help Build").
 *
 * Port of ABSCaps from the QA-approved prototype (about-story-copy.jsx:265-293).
 *
 * Icons: the approved design uses inline stroke SVGs that inherit the icon
 * colour rotating by card position (amber / periwinkle / coral, set in
 * about-v2.css:.abs-capcard:nth-child(3n…)). Those six SVGs are the default and
 * are kept verbatim below. An editor may override any card with an uploaded
 * image; in that case the tile background is suppressed via
 * .abs-capcard-ic--img because uploaded tiles already include their own
 * rounded background, and drawing both would double it.
 *
 * Chapter of: abs_story (About-story.php) — a row of its abs_chapters field,
 * so values are read with get_sub_field() against the current row.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$abs_eyebrow = get_sub_field( 'abs_caps_eyebrow' );
$abs_h2      = get_sub_field( 'abs_caps_h2' );
$abs_lead    = get_sub_field( 'abs_caps_lead' );
$abs_caps    = get_sub_field( 'abs_caps' );

if ( empty( $abs_caps ) ) {
	return;
}

/**
 * Built-in capability icons, in the approved design's card order.
 * Index-keyed so a reordered repeater keeps the design's icon-per-position.
 */
$abs_cap_icons = array(
	// 1 — Custom software (code brackets).
	'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6" /><polyline points="8 6 2 12 8 18" /></svg>',
	// 2 — Mobile and web apps (device).
	'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2.5" /><line x1="12" y1="18" x2="12" y2="18" /></svg>',
	// 3 — AI and ML solutions (robot).
	'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="7" width="14" height="12" rx="3" /><path d="M12 7V4" /><circle cx="12" cy="3" r="1" /><line x1="9" y1="12" x2="9" y2="14" /><line x1="15" y1="12" x2="15" y2="14" /></svg>',
	// 4 — Enterprise systems (database).
	'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="8" ry="3" /><path d="M4 5v6c0 1.66 3.58 3 8 3s8-1.34 8-3V5" /><path d="M4 11v6c0 1.66 3.58 3 8 3s8-1.34 8-3v-6" /></svg>',
	// 5 — Embedded engineering teams (user plus).
	'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" /><circle cx="9" cy="7" r="4" /><line x1="19" y1="8" x2="19" y2="14" /><line x1="22" y1="11" x2="16" y2="11" /></svg>',
	// 6 — Cloud and infrastructure (cloud check).
	'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M17.5 19a4.5 4.5 0 0 0 .5-8.98A6 6 0 0 0 6.2 9.3 4 4 0 0 0 6.5 19z" /><path d="M9 14l2 2 4-4" /></svg>',
);

?>
<section class="abs-chapter" data-screen-label="04 Capabilities">
	<div class="abs-wrap">
		<div class="abs-split">
			<div class="abs-split-head abs-rev">
				<?php if ( $abs_eyebrow ) : ?>
					<span class="abs-eyebrow2"><?php echo esc_html( $abs_eyebrow ); ?></span>
				<?php endif; ?>
				<?php if ( $abs_h2 ) : ?>
					<h2 class="abs-h2"><?php echo esc_html( $abs_h2 ); ?></h2>
				<?php endif; ?>
				<?php if ( $abs_lead ) : ?>
					<p class="abs-lead"><?php echo esc_html( $abs_lead ); ?></p>
				<?php endif; ?>
			</div>
			<div class="abs-capwall abs-split-body abs-rev d1" role="group" tabindex="0" aria-label="<?php echo esc_attr( $abs_h2 ? $abs_h2 : __( 'Capabilities', 'technbrains-child' ) ); ?>">
				<?php
				foreach ( $abs_caps as $abs_i => $abs_cap ) {
					$abs_title = isset( $abs_cap['title'] ) ? $abs_cap['title'] : '';
					$abs_desc  = isset( $abs_cap['description'] ) ? $abs_cap['description'] : '';
					$abs_icon  = isset( $abs_cap['icon'] ) ? $abs_cap['icon'] : '';

					$abs_icon_url = ( is_array( $abs_icon ) && ! empty( $abs_icon['url'] ) ) ? $abs_icon['url'] : '';
					$abs_icon_alt = ( is_array( $abs_icon ) && ! empty( $abs_icon['alt'] ) ) ? $abs_icon['alt'] : '';
					?>
					<div class="abs-capcard">
						<span class="abs-capcard-ic<?php echo $abs_icon_url ? ' abs-capcard-ic--img' : ''; ?>">
							<?php
							if ( $abs_icon_url ) {
								printf(
									'<img src="%1$s" alt="%2$s" width="48" height="48" loading="lazy" decoding="async" />',
									esc_url( $abs_icon_url ),
									esc_attr( $abs_icon_alt )
								);
							} elseif ( isset( $abs_cap_icons[ $abs_i ] ) ) {
								// Hardcoded design asset, not user input — echoed as-is so the
								// SVG's camelCase attributes survive intact.
								echo $abs_cap_icons[ $abs_i ]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							}
							?>
						</span>
						<?php if ( $abs_title ) : ?>
							<h3 class="abs-capcard-t"><?php echo esc_html( $abs_title ); ?></h3>
						<?php endif; ?>
						<?php if ( $abs_desc ) : ?>
							<p class="abs-capcard-d"><?php echo esc_html( $abs_desc ); ?></p>
						<?php endif; ?>
					</div>
					<?php
				}
				?>
			</div>
			<?php
			/*
			 * Paging controls. Rendered hidden and unhidden by about-v2.js, because
			 * without JS the arrows would be dead and the dot count is viewport-
			 * dependent (3 / 2 / 1 cards per view) so only the browser can know it.
			 * With JS off nothing is lost — the wall is a native scroll container.
			 *
			 * Classes are the theme's own case-deck nav (components.css) so no
			 * carousel styling is duplicated for this page.
			 */
			?>
			<div class="case-deck-nav abs-caps-nav" aria-label="<?php esc_attr_e( 'Capability navigation', 'technbrains-child' ); ?>" hidden>
				<button type="button" class="case-btn" data-abs-caps-prev aria-label="<?php esc_attr_e( 'Previous capabilities', 'technbrains-child' ); ?>">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5M11 19l-7-7 7-7" /></svg>
				</button>
				<div class="case-deck-dots" role="tablist"></div>
				<button type="button" class="case-btn" data-abs-caps-next aria-label="<?php esc_attr_e( 'Next capabilities', 'technbrains-child' ); ?>">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7" /></svg>
				</button>
			</div>
		</div>
	</div>
</section>
