<?php
/**
 * About Us V2 — 11 Principles ("How We Operate").
 *
 * Port of ABSPrinciples from the QA-approved prototype
 * (about-story-copy.jsx:602-627). The four icons are the design's inline stroke
 * SVGs; an editor picks one per card by key rather than uploading a file, so the
 * icons keep inheriting the card's accent colour.
 *
 * Chapter of: abs_story (About-story.php) — a row of its abs_chapters field,
 * so values are read with get_sub_field() against the current row.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$abs_eyebrow = get_sub_field( 'abs_prin_eyebrow' );
$abs_h2      = get_sub_field( 'abs_prin_h2' );
$abs_lead    = get_sub_field( 'abs_prin_lead' );
$abs_items   = get_sub_field( 'abs_principles' );

if ( empty( $abs_items ) ) {
	return;
}

/** Icon library — keys match the abs_principles → icon_key select choices. */
$abs_prin_icons = array(
	'target' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9" /><circle cx="12" cy="12" r="4.5" /><circle cx="12" cy="12" r="0.6" fill="currentColor" /></svg>',
	'chat'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.5 8.5 0 0 1-12.3 7.6L3 21l1.9-5.7A8.5 8.5 0 1 1 21 11.5z" /></svg>',
	'bolt'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 4 14 11 14 10 22 20 9 13 9 13 2" /></svg>',
	'link'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7 0l2.5-2.5a5 5 0 0 0-7-7L11 5" /><path d="M14 11a5 5 0 0 0-7 0L4.5 13.5a5 5 0 0 0 7 7L13 19" /></svg>',
);
?>
<section class="abs-chapter" data-screen-label="11 Principles">
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
			<div class="abs-op abs-split-body abs-rev d1">
				<?php
				foreach ( $abs_items as $abs_i => $abs_item ) {
					$abs_title = isset( $abs_item['title'] ) ? $abs_item['title'] : '';
					$abs_key   = isset( $abs_item['icon_key'] ) ? $abs_item['icon_key'] : '';

					if ( '' === trim( (string) $abs_title ) ) {
						continue;
					}
					?>
					<div class="abs-op-card">
						<span class="abs-op-ghost" aria-hidden="true"><?php echo esc_html( str_pad( (string) ( $abs_i + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						<div class="abs-op-ic">
							<?php
							if ( isset( $abs_prin_icons[ $abs_key ] ) ) {
								// Hardcoded design asset, not user input.
								echo $abs_prin_icons[ $abs_key ]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							}
							?>
						</div>
						<h3 class="abs-op-t"><?php echo esc_html( $abs_title ); ?></h3>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</section>
