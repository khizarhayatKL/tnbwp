<?php
/**
 * Construction Software — What drives cost.
 *
 * Layout : cn_drivers (ACF Flexible Content)
 * Fields : cndr_eyebrow, cndr_heading, cndr_sub, cndr_anchor,
 *          cndr_items{ cndr_item_lead, cndr_item_text, cndr_item_icon }, cndr_note
 * CSS    : assets/css/construction.css (.cn-driver*, .cn-drivers-*)
 * JS     : none — the .dt-rev reveal in components.js is the only behaviour.
 *
 * The copy deck calls for a numbered six-item list in two columns of three. The numbering is left
 * to CSS counters on an <ol> rather than typed into the copy: an editor reordering the repeater
 * would otherwise leave the numbers out of sequence, and a hand-typed "3." would be read aloud
 * twice by a screen reader once the list already conveys position.
 *
 * The reveal stagger rides on --cn-i so the delay curve lives in the stylesheet rather than as an
 * inline transition-delay per item.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cndr_eyebrow = (string) get_sub_field( 'cndr_eyebrow' );
$cndr_heading = tnb_accent_heading( (string) get_sub_field( 'cndr_heading' ) );
$cndr_sub     = (string) get_sub_field( 'cndr_sub' );
$cndr_anchor  = sanitize_title( (string) get_sub_field( 'cndr_anchor' ) );
$cndr_items   = (array) get_sub_field( 'cndr_items' );
$cndr_note    = (string) get_sub_field( 'cndr_note' );

$cndr_kses = tnb_cn_allowed_html();

// Icon per position, matching the approved copy order.
$cndr_icons = array( 'link', 'bolt', 'calc', 'crm', 'doc', 'layers' );

if ( ! $cndr_items ) {
	return;
}
?>
<section class="dt-section cn-drivers-sec"<?php echo '' !== $cndr_anchor ? ' id="' . esc_attr( $cndr_anchor ) . '"' : ''; ?>>
	<div class="container">
		<?php if ( '' !== $cndr_eyebrow || '' !== $cndr_heading || '' !== $cndr_sub ) : ?>
			<div class="dt-head dt-center dt-rev">
				<?php if ( '' !== $cndr_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $cndr_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $cndr_heading ) : ?>
					<h2 class="dt-h2"><?php echo $cndr_heading; // Sanitised by tnb_accent_heading(). ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $cndr_sub ) : ?>
					<?php // wp_kses_post: the approved copy carries an inline link to the cost page. ?>
					<p class="dt-sub"><?php echo wp_kses_post( $cndr_sub ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<ol class="cn-drivers-grid">
			<?php
			foreach ( $cndr_items as $cndr_i => $cndr_item ) :
				$cndr_lead     = trim( (string) ( $cndr_item['cndr_item_lead'] ?? '' ) );
				$cndr_text     = trim( (string) ( $cndr_item['cndr_item_text'] ?? '' ) );
				$cndr_override = $cndr_item['cndr_item_icon'] ?? null;

				if ( '' === $cndr_lead && '' === $cndr_text ) {
					continue;
				}
				?>
				<li class="cn-driver dt-rev" style="--cn-i:<?php echo (int) $cndr_i; ?>">
					<span class="cn-driver-ic"><?php
						echo tnb_cn_icon_slot( $cndr_icons, (int) $cndr_i, $cndr_override ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- self-escaping, see tnb_cn_icon_slot().
					?></span>
					<?php if ( '' !== $cndr_lead ) : ?>
						<b><?php echo esc_html( $cndr_lead ); ?></b>
					<?php endif; ?>
					<?php if ( '' !== $cndr_text ) : ?>
						<p><?php echo wp_kses( $cndr_text, $cndr_kses ); ?></p>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ol>

		<?php if ( '' !== $cndr_note ) : ?>
			<p class="cn-drivers-note dt-rev"><?php echo wp_kses( $cndr_note, $cndr_kses ); ?></p>
		<?php endif; ?>
	</div>
</section>
