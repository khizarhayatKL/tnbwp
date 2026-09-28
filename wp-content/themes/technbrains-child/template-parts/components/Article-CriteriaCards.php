<?php
/**
 * Article template family — Criteria cards (numbered/iconed comparison-criteria grid).
 *
 * Layout : art_criteria_cards (ACF Flexible Content)
 * Fields : art_crit_items{ art_crit_icon, art_crit_label, art_crit_note }, art_anchor
 * CSS    : assets/css/article.css (.art-crit, .art-crit-card, .art-crit-ico)
 * JS     : none of its own.
 *
 * Headless, matching Article-DiagSet.php's convention — the H2 + lead paragraph come from a
 * preceding art_prose row. Icons cycle through a fixed 7-icon set by row index via
 * tnb_art_icon_slot() — same override-with-position-fallback pattern as Article-DiagSet.php's
 * art_diag_icon — matching article-1.jsx's own `CRIT_ICONS[i % CRIT_ICONS.length]` by default; an
 * uploaded art_crit_icon image overrides the default for that row. The first card is always
 * tagged "Skipped most often" (source's hardcoded `i === 0` special case, not a per-row field).
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_items  = (array) get_sub_field( 'art_crit_items' );
$art_anchor = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_items = array_values(
	array_filter(
		$art_items,
		static function ( $row ) {
			return '' !== trim( (string) ( $row['art_crit_label'] ?? '' ) );
		}
	)
);

if ( ! $art_items ) {
	return;
}

$art_icons = array( 'crit-list', 'crit-device', 'crit-offline', 'crit-link', 'crit-export', 'crit-tag', 'crit-owner' );
?>
<div class="art-crit"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<?php foreach ( $art_items as $art_i => $art_item ) : ?>
		<?php
		$art_override = $art_item['art_crit_icon'] ?? null;
		$art_label    = trim( (string) $art_item['art_crit_label'] );
		$art_note     = trim( (string) ( $art_item['art_crit_note'] ?? '' ) );
		?>
		<div class="art-crit-card<?php echo 0 === $art_i ? ' is-key' : ''; ?>">
			<div class="art-crit-top">
				<span class="art-crit-ico"><?php
					echo tnb_art_icon_slot( $art_icons, (int) $art_i, $art_override ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- self-escaping, see tnb_art_icon_slot().
				?></span>
			</div>
			<div class="art-crit-label"><?php echo esc_html( $art_label ); ?></div>
			<?php if ( '' !== $art_note ) : ?>
				<p class="art-crit-note"><?php echo wp_kses( $art_note, tnb_art_allowed_html() ); ?></p>
			<?php endif; ?>
			<?php if ( 0 === $art_i ) : ?>
				<span class="art-crit-tag">Skipped most often</span>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
</div>
