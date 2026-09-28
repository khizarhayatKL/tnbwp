<?php
/**
 * Article template family — Diagnostic block set (icon + heading + prose, side by side).
 *
 * Layout : art_diag_set (ACF Flexible Content)
 * Fields : art_diag_items{ art_diag_icon, art_diag_heading, art_diag_text }, art_anchor
 * CSS    : assets/css/article.css (.pa-diags, .pa-diag*)
 * JS     : none of its own.
 *
 * Reproduces procore-app.jsx's DiagBlock/DIAG_ICONS exactly: a fixed 3-icon set (cost, fit,
 * field) because those are the only diagnostic angles the approved copy covers, mapped to rows by
 * position (cnab-style) via tnb_art_icon_slot(). art_diag_icon is an image upload — when a row has
 * no uploaded image it falls back to the position-mapped default icon, same override pattern as
 * the Construction family's icon fields (tnb_cn_icon_slot()).
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_items  = (array) get_sub_field( 'art_diag_items' );
$art_anchor = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_items = array_values(
	array_filter(
		$art_items,
		static function ( $row ) {
			return '' !== trim( (string) ( $row['art_diag_heading'] ?? '' ) );
		}
	)
);

if ( ! $art_items ) {
	return;
}

$art_kses  = tnb_art_allowed_html();
$art_icons = array( 'cost', 'fit', 'field' );
?>
<div class="pa-diags"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<?php foreach ( $art_items as $art_i => $art_item ) : ?>
		<?php
		$art_override = $art_item['art_diag_icon'] ?? null;
		$art_heading   = trim( (string) $art_item['art_diag_heading'] );
		$art_text      = trim( (string) ( $art_item['art_diag_text'] ?? '' ) );
		$art_id        = sanitize_title( $art_heading ) . '-' . $art_i;
		?>
		<div class="pa-diag">
			<div class="pa-diag-side">
				<span class="pa-diag-ico"><?php
					echo tnb_art_icon_slot( $art_icons, (int) $art_i, $art_override ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- self-escaping, see tnb_art_icon_slot().
				?></span>
				<h3 id="<?php echo esc_attr( $art_id ); ?>"><?php echo esc_html( $art_heading ); ?></h3>
			</div>
			<?php if ( '' !== $art_text ) : ?>
				<div class="pa-diag-body art-prose">
					<p><?php echo wp_kses( $art_text, $art_kses ); ?></p>
				</div>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
</div>
