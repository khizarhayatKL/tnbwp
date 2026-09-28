<?php
/**
 * Article template family — Head-to-head split (alternative vs. the subject product).
 *
 * Layout : art_head_to_head (ACF Flexible Content)
 * Fields : art_h2h_right_name, art_h2h_items{ art_h2h_alt_name, art_h2h_alt_edge,
 *          art_h2h_pro_edge, art_h2h_body }, art_anchor
 * CSS    : assets/css/article.css (.pa-vs-set, .pa-vs*)
 * JS     : none of its own.
 *
 * procore-app.jsx hardcodes the right-hand side as "Procore" (page-specific there); since this
 * family is meant to serve sibling article pages comparing a different subject product,
 * art_h2h_right_name is a field here instead of a literal string. Headless/intro-less like
 * Article-AltEvals.php — the section's H2 and lead paragraph come from a preceding art_prose row.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_right  = trim( (string) get_sub_field( 'art_h2h_right_name' ) );
$art_items  = (array) get_sub_field( 'art_h2h_items' );
$art_anchor = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_items = array_values(
	array_filter(
		$art_items,
		static function ( $row ) {
			return '' !== trim( (string) ( $row['art_h2h_alt_name'] ?? '' ) );
		}
	)
);

if ( ! $art_items ) {
	return;
}
?>
<div class="pa-vs-set"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<?php foreach ( $art_items as $art_item ) : ?>
		<?php
		$art_alt_name  = trim( (string) $art_item['art_h2h_alt_name'] );
		$art_alt_edge  = trim( (string) ( $art_item['art_h2h_alt_edge'] ?? '' ) );
		$art_pro_edge  = trim( (string) ( $art_item['art_h2h_pro_edge'] ?? '' ) );
		$art_body      = trim( (string) ( $art_item['art_h2h_body'] ?? '' ) );
		?>
		<div class="pa-vs">
			<div class="pa-vs-heads">
				<div class="pa-vs-side pa-vs-side--alt">
					<span class="pa-vs-name"><?php echo esc_html( $art_alt_name ); ?></span>
					<?php if ( '' !== $art_alt_edge ) : ?><span class="pa-vs-edge"><?php echo esc_html( $art_alt_edge ); ?></span><?php endif; ?>
				</div>
				<span class="pa-vs-badge" aria-hidden="true">vs</span>
				<div class="pa-vs-side pa-vs-side--pro">
					<span class="pa-vs-name"><?php echo esc_html( $art_right ); ?></span>
					<?php if ( '' !== $art_pro_edge ) : ?><span class="pa-vs-edge"><?php echo esc_html( $art_pro_edge ); ?></span><?php endif; ?>
				</div>
			</div>
			<?php if ( '' !== $art_body ) : ?>
				<div class="pa-vs-body"><p><?php echo wp_kses( $art_body, tnb_art_allowed_html() ); ?></p></div>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
</div>
