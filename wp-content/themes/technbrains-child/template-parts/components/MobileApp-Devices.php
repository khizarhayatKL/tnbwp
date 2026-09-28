<?php
/**
 * Mobile App Development — Devices & Integrations (tabbed rail + chip panel).
 *
 * Layout : ma_eco (ACF Flexible Content)
 * Fields : mae_eyebrow, mae_heading, mae_sub, mae_anchor, additional_classes,
 *          mae_groups{ mae_group_icon (optional image override), mae_group_title,
 *                      mae_group_desc, mae_group_items{ mae_item_icon, mae_item_link } }
 *          mae_item_link is an ACF link field — its title is the chip's visible label,
 *          its url (optional) makes the chip an <a> instead of a plain <span>.
 * CSS    : assets/css/mobile-app.css (.ma-eco*)
 * JS     : assets/js/mobile-app.js (data-ma-eco / data-ma-eco-tab / data-ma-eco-panel) —
 *          same ARIA tablist pattern as Construction-integrations.php's data-cn-tabs.
 *
 * Only the first group's panel is rendered open; the rest are swapped in by JS on tab
 * click, matching the mockup's single-panel-at-a-time behaviour (not all panels present
 * simultaneously, unlike Construction's tabs which keep every panel in the DOM with
 * `hidden`). Chip tile letters come from tnb_ma_abbr(), matching map-3.jsx's maAbbr().
 *
 * If the repeater is empty, falls back to tnb_ma_default_devgroups() (the mockup's real
 * copy) rather than rendering nothing — see inc/mobile-app-helpers.php.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$mae_eyebrow = (string) get_sub_field( 'mae_eyebrow' );
$mae_heading = tnb_accent_heading( (string) get_sub_field( 'mae_heading' ) );
$mae_sub     = (string) get_sub_field( 'mae_sub' );
$mae_anchor  = sanitize_title( (string) get_sub_field( 'mae_anchor' ) );
$mae_classes = trim( (string) get_sub_field( 'additional_classes' ) );
$mae_groups  = (array) get_sub_field( 'mae_groups' );

if ( ! $mae_groups ) {
	$mae_groups = tnb_ma_default_devgroups();
}

// Groups with no tab label can't be a tab.
$mae_groups = array_values(
	array_filter(
		$mae_groups,
		static function ( $group ) {
			return '' !== trim( (string) ( $group['mae_group_title'] ?? '' ) );
		}
	)
);

if ( ! $mae_groups ) {
	return;
}

$mae_kses = tnb_ma_allowed_html();

// Icon keys by position — matching the mockup's fixed 3 groups. A 4th+ group falls back
// to the first key rather than rendering with no icon (see tnb_ma_icon_slot()).
$mae_icon_keys = array( 'cube', 'pulse', 'branch' );

// Unique per instance, so two of these sections on one page cannot collide on ids.
$mae_uid = 'ma-eco-' . wp_unique_id();

$mae_section_class = 'dt-section ma-eco-sec';
if ( '' !== $mae_classes ) {
	$mae_section_class .= ' ' . $mae_classes;
}
?>
<section class="<?php echo esc_attr( $mae_section_class ); ?>"<?php echo '' !== $mae_anchor ? ' id="' . esc_attr( $mae_anchor ) . '"' : ''; ?>>
	<div class="container">
		<?php if ( '' !== $mae_eyebrow || '' !== $mae_heading || '' !== $mae_sub ) : ?>
			<div class="dt-head dt-center dt-rev">
				<?php if ( '' !== $mae_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $mae_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $mae_heading ) : ?>
					<h2 class="dt-h2"><?php echo $mae_heading; // Sanitised by tnb_accent_heading(). ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $mae_sub ) : ?>
					<p class="dt-sub"><?php echo wp_kses( $mae_sub, $mae_kses ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="ma-eco dt-rev" data-ma-eco>
			<aside class="ma-eco-rail" role="tablist" aria-label="<?php esc_attr_e( 'Device and capability groups', 'technbrains-child' ); ?>">
				<?php foreach ( $mae_groups as $mae_i => $mae_group ) :
					$mae_icon  = tnb_ma_icon_slot( $mae_icon_keys, $mae_i, $mae_group['mae_group_icon'] ?? null );
					$mae_title = trim( (string) ( $mae_group['mae_group_title'] ?? '' ) );
					$mae_items = (array) ( $mae_group['mae_group_items'] ?? array() );
					$mae_on    = ( 0 === $mae_i );
					?>
					<button
						type="button"
						role="tab"
						id="<?php echo esc_attr( $mae_uid . '-tab-' . $mae_i ); ?>"
						class="ma-eco-tab<?php echo $mae_on ? ' is-active' : ''; ?>"
						aria-selected="<?php echo $mae_on ? 'true' : 'false'; ?>"
						aria-controls="<?php echo esc_attr( $mae_uid . '-panel' ); ?>"
						tabindex="<?php echo $mae_on ? '0' : '-1'; ?>"
						data-ma-eco-tab
						data-ma-eco-index="<?php echo (int) $mae_i; ?>"
					>
						<span class="ma-eco-tab-ic"><?php echo $mae_icon; // Self-escaping from tnb_ma_icon_slot(). ?></span>
						<span class="ma-eco-tab-txt">
							<span class="ma-eco-tab-t"><?php echo esc_html( $mae_title ); ?></span>
							<span class="ma-eco-tab-n"><?php echo esc_html( count( $mae_items ) . ' supported' ); ?></span>
						</span>
					</button>
				<?php endforeach; ?>
			</aside>

			<?php
			// Pre-render every panel's markup server-side (JS just toggles which is on-screen via
			// [hidden], same mechanism as Construction's tabs) so the section works even before
			// mobile-app.js has run, and so there is no client-side re-render/flash on first tab click.
			?>
			<div class="ma-eco-panel" id="<?php echo esc_attr( $mae_uid . '-panel' ); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr( $mae_uid . '-tab-0' ); ?>" data-ma-eco-panel>
				<?php foreach ( $mae_groups as $mae_i => $mae_group ) :
					$mae_desc  = trim( (string) ( $mae_group['mae_group_desc'] ?? '' ) );
					$mae_items = (array) ( $mae_group['mae_group_items'] ?? array() );
					$mae_on    = ( 0 === $mae_i );
					?>
					<div class="ma-eco-panel-group" data-ma-eco-group="<?php echo (int) $mae_i; ?>"<?php echo $mae_on ? '' : ' hidden'; ?>>
						<?php if ( '' !== $mae_desc ) : ?>
							<p class="ma-eco-desc"><span class="ma-eco-bar"></span><?php echo wp_kses( $mae_desc, $mae_kses ); ?></p>
						<?php endif; ?>
						<?php if ( $mae_items ) : ?>
							<div class="ma-eco-items">
								<?php foreach ( $mae_items as $mae_pos => $mae_item ) :
									$mae_link   = $mae_item['mae_item_link'] ?? null;
									$mae_label  = is_array( $mae_link ) ? trim( (string) ( $mae_link['title'] ?? '' ) ) : '';
									$mae_url    = is_array( $mae_link ) ? trim( (string) ( $mae_link['url'] ?? '' ) ) : '';
									$mae_target = is_array( $mae_link ) ? (string) ( $mae_link['target'] ?? '' ) : '';
									$mae_icon_i = $mae_item['mae_item_icon'] ?? array();

									// A bare '#' is a placeholder, not a destination — same convention
									// as Construction-trust.php's $cnt_url handling.
									if ( '#' === $mae_url ) {
										$mae_url = '';
									}

									if ( '' === $mae_label ) {
										continue;
									}

									// Plain span when there's no URL, an <a> when there is — same
									// "only be a link when there's somewhere to go" rule as the hero CTAs.
									$mae_tag = '' !== $mae_url ? 'a' : 'span';
									?>
									<<?php echo $mae_tag; ?>
										class="ma-eco-chip"
										style="animation-delay: <?php echo (int) $mae_pos * 45; ?>ms"
										<?php if ( 'a' === $mae_tag ) : ?>
											href="<?php echo esc_url( $mae_url ); ?>"
											<?php echo '' !== $mae_target ? ' target="' . esc_attr( $mae_target ) . '" rel="noopener"' : ''; ?>
										<?php endif; ?>
									>
										<span class="ma-eco-chip-tile">
											<?php if ( ! empty( $mae_icon_i['id'] ) ) : ?>
												<?php
												echo wp_get_attachment_image(
													(int) $mae_icon_i['id'],
													'thumbnail',
													false,
													array( 'alt' => '', 'loading' => 'lazy', 'decoding' => 'async' )
												);
												?>
											<?php else : ?>
												<?php echo esc_html( tnb_ma_abbr( $mae_label ) ); ?>
											<?php endif; ?>
										</span>
										<?php echo esc_html( $mae_label ); ?>
									</<?php echo $mae_tag; ?>>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
