<?php
/**
 * Article template family — Methods diagram (3-up tag/heading/text/tool cards).
 *
 * Layout : art_methods_diagram (ACF Flexible Content)
 * Fields : art_method_items{ art_method_tag, art_method_heading, art_method_text,
 *          art_method_tool }, art_anchor
 * CSS    : assets/css/article.css (.art-methods, .art-method, .art-method-tool)
 * JS     : none of its own.
 *
 * Headless, matching Article-DiagSet.php's convention — the H2 + lead paragraph come from a
 * preceding art_prose row. Distinct from Article-DiagSet.php: no icon, adds a tag pill above the
 * heading and a footer "tool" line, matching article-1.jsx's MethodsDiagram exactly (a different
 * shape from the diagnostic set, not a restyle of it).
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_items  = (array) get_sub_field( 'art_method_items' );
$art_anchor = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_items = array_values(
	array_filter(
		$art_items,
		static function ( $row ) {
			return '' !== trim( (string) ( $row['art_method_heading'] ?? '' ) );
		}
	)
);

if ( ! $art_items ) {
	return;
}

$art_kses = tnb_art_allowed_html();
?>
<div class="art-methods"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<?php foreach ( $art_items as $art_item ) : ?>
		<?php
		$art_tag     = trim( (string) ( $art_item['art_method_tag'] ?? '' ) );
		$art_heading = trim( (string) $art_item['art_method_heading'] );
		$art_text    = trim( (string) ( $art_item['art_method_text'] ?? '' ) );
		$art_tool    = trim( (string) ( $art_item['art_method_tool'] ?? '' ) );
		?>
		<div class="art-method">
			<?php if ( '' !== $art_tag ) : ?>
				<span class="art-method-tag"><?php echo esc_html( $art_tag ); ?></span>
			<?php endif; ?>
			<h4><?php echo esc_html( $art_heading ); ?></h4>
			<?php if ( '' !== $art_text ) : ?>
				<p><?php echo wp_kses( $art_text, $art_kses ); ?></p>
			<?php endif; ?>
			<?php if ( '' !== $art_tool ) : ?>
				<div class="art-method-tool"><?php echo wp_kses( $art_tool, $art_kses ); ?></div>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
</div>
