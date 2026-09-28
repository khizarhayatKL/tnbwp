<?php
/**
 * Article template family — Scope note (small methodology aside).
 *
 * Layout : art_scope_note (ACF Flexible Content)
 * Fields : art_scope_text, art_anchor
 * CSS    : assets/css/article.css (.art-scope)
 * JS     : none of its own.
 *
 * One field, on purpose — article-1.jsx's ScopeNote is a single fixed-icon aside (a "scope" glyph,
 * no tag/variant switch like Article-Callout.php has), used once in the source content ("How We
 * Evaluated"). Kept as its own tiny component rather than folded into Article-Prose.php since its
 * markup/icon treatment is visually distinct, not just another paragraph.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_text   = (string) get_sub_field( 'art_scope_text' );
$art_anchor = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

if ( '' === $art_text ) {
	return;
}
?>
<div class="art-scope"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<span class="art-scope-tag"><span aria-hidden="true"><?php echo wp_kses( tnb_art_icon( 'scope' ), tnb_art_svg_html() ); ?></span>Scope note</span>
	<p><?php echo wp_kses( $art_text, tnb_art_allowed_html() ); ?></p>
</div>
