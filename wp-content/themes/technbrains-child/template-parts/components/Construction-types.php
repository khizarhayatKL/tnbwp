<?php
/**
 * Construction Software — Types of software we build.
 *
 * Layout : cn_types (ACF Flexible Content)
 * Fields : cnty_eyebrow, cnty_heading, cnty_sub, cnty_anchor,
 *          cnty_cards{ cnty_card_title, cnty_card_text, cnty_card_link, cnty_card_icon }
 * CSS    : assets/css/construction.css (.cn-type*)
 * JS     : none — the .dt-rev reveal in components.js is the only behaviour.
 *
 * Icons come from the shared set in inc/construction-helpers.php, assigned by position from
 * $cnty_icons below, which reproduces the approved order: preconstruction, then delivery and
 * documents, then field ops and resources, then financial and stakeholder. An editor can override
 * a single row with cnty_card_icon when a new card needs a different mark; the default is used
 * otherwise, so a card can never render iconless.
 *
 * A card links only when it has a URL. Two of the approved cards do (scheduling, ERP) and the rest
 * are plain text, so the anchor is conditional rather than a wrapper around every card.
 *
 * The trailing CTA is no longer part of this layout — it is its own platform_cta row placed after
 * this one in page_sections, reusing the site's existing shared CTA component instead of a
 * bespoke inline block here.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cnty_eyebrow = (string) get_sub_field( 'cnty_eyebrow' );
$cnty_heading = tnb_accent_heading( (string) get_sub_field( 'cnty_heading' ) );
$cnty_sub     = (string) get_sub_field( 'cnty_sub' );
$cnty_anchor  = sanitize_title( (string) get_sub_field( 'cnty_anchor' ) );
$cnty_cards   = (array) get_sub_field( 'cnty_cards' );

$cnty_kses = tnb_cn_allowed_html();
$cnty_svg  = tnb_cn_svg_html();

// Icon per position, in the approved row order.
$cnty_icons = array(
	'clipboard', // Project management
	'ruler',     // Estimating and takeoff
	'doc',       // Bid and proposal management
	'truck',     // Field service and dispatch
	'layers',    // Submittals and RFIs
	'link',      // Document management
	'gauge',     // Equipment and asset tracking
	'helmet',    // Safety and inspections
	'pin',       // Payroll and workforce
	'cal',       // Scheduling and lookahead
	'calc',      // ERP and job costing
	'crm',       // CRM
	'portal',    // Owner and homeowner portals
);

if ( ! $cnty_cards ) {
	return;
}
?>
<section class="dt-section gray cn-types-sec"<?php echo '' !== $cnty_anchor ? ' id="' . esc_attr( $cnty_anchor ) . '"' : ''; ?>>
	<div class="container">
		<?php if ( '' !== $cnty_eyebrow || '' !== $cnty_heading || '' !== $cnty_sub ) : ?>
			<div class="dt-head dt-center dt-rev">
				<?php if ( '' !== $cnty_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $cnty_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $cnty_heading ) : ?>
					<h2 class="dt-h2"><?php echo $cnty_heading; // Sanitised by tnb_accent_heading(). ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $cnty_sub ) : ?>
					<p class="dt-sub"><?php echo wp_kses( $cnty_sub, $cnty_kses ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="cn-types-grid">
			<?php
			foreach ( $cnty_cards as $cnty_i => $cnty_card ) :
				$cnty_title = trim( (string) ( $cnty_card['cnty_card_title'] ?? '' ) );
				$cnty_text  = trim( (string) ( $cnty_card['cnty_card_text'] ?? '' ) );

				if ( '' === $cnty_title && '' === $cnty_text ) {
					continue;
				}

				// Icon override is an image field: an editor uploads a picture rather than typing
				// an icon key. Falls back to the position-keyed SVG when no image is set.
				$cnty_override = $cnty_card['cnty_card_icon'] ?? null;
				$cnty_icon_img = ! empty( $cnty_override['id'] ) ? (int) $cnty_override['id'] : 0;
				$cnty_icon     = $cnty_icon_img ? '' : tnb_cn_icon_slot( $cnty_icons, (int) $cnty_i );

				$cnty_link  = $cnty_card['cnty_card_link'] ?? null;
				$cnty_url   = is_array( $cnty_link ) ? trim( (string) ( $cnty_link['url'] ?? '' ) ) : '';
				$cnty_tgt   = is_array( $cnty_link ) ? (string) ( $cnty_link['target'] ?? '' ) : '';

				if ( '#' === $cnty_url ) {
					$cnty_url = '';
				}
				?>
				<div class="cn-type-card dt-rev">
					<?php if ( $cnty_icon_img ) : ?>
						<span class="cn-type-ic">
							<?php
							echo wp_get_attachment_image(
								$cnty_icon_img,
								'thumbnail',
								false,
								array(
									'alt'      => '',
									'loading'  => 'lazy',
									'decoding' => 'async',
								)
							);
							?>
						</span>
					<?php elseif ( '' !== $cnty_icon ) : ?>
						<span class="cn-type-ic"><?php echo wp_kses( $cnty_icon, $cnty_svg ); ?></span>
					<?php endif; ?>

					<?php if ( '' !== $cnty_title ) : ?>
						<h3><?php
						if ( '' !== $cnty_url ) {
							printf(
								'<a class="cn-type-link" href="%1$s"%2$s>%3$s</a>',
								esc_url( $cnty_url ),
								'' !== $cnty_tgt ? ' target="' . esc_attr( $cnty_tgt ) . '" rel="noopener"' : '',
								esc_html( $cnty_title )
							);
						} else {
							echo esc_html( $cnty_title );
						}
						?></h3>
					<?php endif; ?>

					<?php if ( '' !== $cnty_text ) : ?>
						<p><?php echo wp_kses( $cnty_text, $cnty_kses ); ?></p>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
