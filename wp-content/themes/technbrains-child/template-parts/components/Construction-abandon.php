<?php
/**
 * Construction Software — Why implementations get abandoned.
 *
 * Layout : cn_abandon (ACF Flexible Content)
 * Fields : cnab_eyebrow, cnab_heading, cnab_sub, cnab_anchor, cnab_bg,
 *          cnab_items{ cnab_item_lead, cnab_item_text, cnab_item_icon },
 *          cnab_test_lead, cnab_test_text
 * CSS    : assets/css/construction.css (.cn-abandon-*)
 * JS     : none — the .dt-rev reveal in components.js is the only behaviour.
 *
 * The copy deck asks for a tinted background so this reads as the risk section rather than another
 * benefits list. The backdrop image is passed as a custom property on the section rather than an
 * inline background shorthand, so the stylesheet keeps control of the gradient, blend and opacity
 * layered over it and the template only supplies the URL.
 *
 * Header is left-aligned here, not centred like the sections around it. That is the approved
 * treatment for this block, and it is the reason .dt-head appears without .dt-center.
 *
 * Icons come from the shared set by position. This is the one section where the mark carries part
 * of the meaning — a struck-through signal bar for the connectivity item, a padlock for login
 * friction — so the order below is not arbitrary and should track the copy if rows are reordered.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cnab_eyebrow = (string) get_sub_field( 'cnab_eyebrow' );
$cnab_heading = tnb_accent_heading( (string) get_sub_field( 'cnab_heading' ) );
$cnab_sub     = (string) get_sub_field( 'cnab_sub' );
$cnab_anchor  = sanitize_title( (string) get_sub_field( 'cnab_anchor' ) );
$cnab_bg      = get_sub_field( 'cnab_bg' );
$cnab_items   = (array) get_sub_field( 'cnab_items' );

$cnab_test_lead = (string) get_sub_field( 'cnab_test_lead' );
$cnab_test_text = (string) get_sub_field( 'cnab_test_text' );

$cnab_kses = tnb_cn_allowed_html();

// Icon per position, matching the approved copy order.
$cnab_icons = array( 'undo', 'nosignal', 'lock', 'alert', 'teach' );

$cnab_bg_url = ! empty( $cnab_bg['id'] ) ? (string) wp_get_attachment_image_url( (int) $cnab_bg['id'], 'full' ) : '';

if ( ! $cnab_items && '' === $cnab_test_text ) {
	return;
}
?>
<section
	class="cn-abandon"
	<?php echo '' !== $cnab_anchor ? ' id="' . esc_attr( $cnab_anchor ) . '"' : ''; ?>
	<?php echo '' !== $cnab_bg_url ? ' style="--cn-abandon-bg:url(' . esc_url( $cnab_bg_url ) . ')"' : ''; ?>
>
	<div class="cn-abandon-bg" aria-hidden="true"></div>
	<div class="container">
		<?php if ( '' !== $cnab_eyebrow || '' !== $cnab_heading || '' !== $cnab_sub ) : ?>
			<div class="dt-head dt-rev">
				<?php if ( '' !== $cnab_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $cnab_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $cnab_heading ) : ?>
					<h2 class="dt-h2"><?php echo $cnab_heading; // Sanitised by tnb_accent_heading(). ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $cnab_sub ) : ?>
					<p class="dt-sub"><?php echo wp_kses( $cnab_sub, $cnab_kses ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( $cnab_items ) : ?>
			<div class="cn-abandon-list">
				<?php
				foreach ( $cnab_items as $cnab_i => $cnab_item ) :
					$cnab_lead     = trim( (string) ( $cnab_item['cnab_item_lead'] ?? '' ) );
					$cnab_text     = trim( (string) ( $cnab_item['cnab_item_text'] ?? '' ) );
					$cnab_override = $cnab_item['cnab_item_icon'] ?? null;

					if ( '' === $cnab_lead && '' === $cnab_text ) {
						continue;
					}
					?>
					<div class="cn-abandon-item dt-rev">
						<span class="cn-abandon-ic"><?php
							echo tnb_cn_icon_slot( $cnab_icons, (int) $cnab_i, $cnab_override ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- self-escaping, see tnb_cn_icon_slot().
						?></span>
						<?php if ( '' !== $cnab_lead ) : ?>
							<b><?php echo esc_html( $cnab_lead ); ?></b>
						<?php endif; ?>
						<?php if ( '' !== $cnab_text ) : ?>
							<p><?php echo wp_kses( $cnab_text, $cnab_kses ); ?></p>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php if ( '' !== $cnab_test_text ) : ?>
			<div class="cn-abandon-test dt-rev">
				<?php if ( '' !== $cnab_test_lead ) : ?>
					<b><?php echo esc_html( $cnab_test_lead ); ?></b>
				<?php endif; ?>
				<?php echo ' ' . wp_kses( $cnab_test_text, $cnab_kses ); ?>
			</div>
		<?php endif; ?>
	</div>
</section>
