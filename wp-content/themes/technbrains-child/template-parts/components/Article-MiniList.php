<?php
/**
 * Article template family — Numbered/iconed mini card grid.
 *
 * Layout : art_mini_list (ACF Flexible Content)
 * Fields : art_mini_iconset, art_mini_items{ art_mini_icon, art_mini_heading, art_mini_text },
 *          art_anchor
 * CSS    : assets/css/article.css (.art-minilist, .art-mini-card, .art-mini-ico, .art-mini-n)
 * JS     : none of its own.
 *
 * Reused 3x on the Cost page (drivers, hidden costs, negotiable items) with different content
 * each time — one component, not three. Icons cycle through a fixed icon set by row index via
 * tnb_art_icon_slot() — same override-with-position-fallback pattern as Article-DiagSet.php's
 * art_diag_icon: an uploaded art_mini_icon image overrides the default for that row; empty falls
 * back to the position-mapped icon exactly as before.
 *
 * art_mini_iconset picks which fixed set: cost-app.jsx's own 6-icon `MINI_ICONS` (default — Cost
 * and ERP pages), or article-3.jsx's own separate 5-icon `MINI_ICONS` (Scheduling page's own
 * instances) — the reference defines two different icon sets for this same component depending on
 * which page renders it.
 *
 * art_mini_cols (2 or 3 per row) covers the source's two hard-coded variants: most usages are the
 * default 2-up grid (.art-minilist), a few — e.g. article-3.jsx's "free"/"integrations" sections —
 * are 3-up (.art-minilist-3). Omitting the field keeps existing rows (Procore, Cost) at 2-up,
 * unchanged.
 *
 * Headless, matching Article-DiagSet.php's convention — the H2 + lead paragraph come from a
 * preceding art_prose row.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_items    = (array) get_sub_field( 'art_mini_items' );
$art_cols     = (string) get_sub_field( 'art_mini_cols' );
$art_iconset  = (string) get_sub_field( 'art_mini_iconset' );
$art_anchor   = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_items = array_values(
	array_filter(
		$art_items,
		static function ( $row ) {
			return '' !== trim( (string) ( $row['art_mini_heading'] ?? '' ) );
		}
	)
);

if ( ! $art_items ) {
	return;
}

$art_icons = 'alt' === $art_iconset
	? array( 'mini2-link', 'mini2-layers', 'mini2-monitor', 'mini2-clock', 'mini2-star' )
	: array( 'mini-people', 'mini-modules', 'mini-link', 'mini-data', 'mini-support', 'mini-clock' );
?>
<div class="art-sub art-minilist<?php echo '3' === $art_cols ? ' art-minilist-3' : ''; ?>"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<?php foreach ( $art_items as $art_i => $art_item ) : ?>
		<?php
		$art_override = $art_item['art_mini_icon'] ?? null;
		$art_heading  = trim( (string) $art_item['art_mini_heading'] );
		$art_text     = trim( (string) ( $art_item['art_mini_text'] ?? '' ) );
		?>
		<div class="art-mini-card">
			<span class="art-mini-ico"><?php
				echo tnb_art_icon_slot( $art_icons, (int) $art_i, $art_override ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- self-escaping, see tnb_art_icon_slot().
			?></span>
			<h4><?php echo esc_html( $art_heading ); ?></h4>
			<?php if ( '' !== $art_text ) : ?>
				<p><?php echo wp_kses( $art_text, tnb_art_allowed_html() ); ?></p>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
</div>
