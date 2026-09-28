<?php
/**
 * Article template family — Prose block (optional heading + paragraphs).
 *
 * Layout : art_prose (ACF Flexible Content)
 * Fields : art_prose_heading, art_prose_body, art_anchor
 * CSS    : assets/css/article.css (.art-prose, .art-sec, .art-sec--major)
 * JS     : none of its own.
 *
 * The generic building block for every "H2 + a paragraph or two" spot in the prototype — the
 * intro section (no heading at all) and the lead-in prose before/after a table, diagram set, or
 * CTA are all this same layout, stacked as separate rows rather than nested inside a bigger
 * "section" layout. That keeps every visual piece independently reorderable in the editor, which
 * is also what lets one row have no heading (the page intro) without a special case.
 *
 * art_prose_body is wp_kses_post, not the narrow allowlist: several of these paragraphs carry a
 * real inline link (e.g. to the Cost or Construction Software Development pages), and the
 * approved copy is a full paragraph, not a single sentence, so <a>/<p> both need to survive.
 *
 * A row with a heading is a major section boundary in the source design (matches article.css's
 * own .art-sec--major spacing) — the intro's own row, with no heading, is a minor one.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_heading = (string) get_sub_field( 'art_prose_heading' );
$art_body    = (string) get_sub_field( 'art_prose_body' );
$art_anchor  = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

if ( '' === $art_body ) {
	return;
}
?>
<section
	class="art-sec art-fade<?php echo '' !== $art_heading ? ' art-sec--major' : ''; ?>"
	<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>
>
	<?php if ( '' !== $art_heading ) : ?>
		<h2><?php echo esc_html( $art_heading ); ?></h2>
	<?php endif; ?>
	<div class="art-prose">
		<?php echo wp_kses_post( wpautop( $art_body ) ); ?>
	</div>
</section>
