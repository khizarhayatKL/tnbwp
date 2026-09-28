<?php
/**
 * Article template family — Pre-decision checklist (tagged box + tick list).
 *
 * Layout : art_checklist (ACF Flexible Content)
 * Fields : art_check_tag, art_check_sub, art_check_items{ art_check_item_text }, art_anchor
 * CSS    : assets/css/article.css (.pa-check*)
 * JS     : none of its own.
 *
 * The tick-mark SVG here is a distinct, heavier stroke-width (3, vs. the shared "check" icon's
 * 2.6) used nowhere else in procore-app.jsx — kept inline rather than added to
 * inc/article-helpers.php's shared icon set as a near-duplicate.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_tag    = trim( (string) get_sub_field( 'art_check_tag' ) );
$art_sub    = trim( (string) get_sub_field( 'art_check_sub' ) );
$art_items  = (array) get_sub_field( 'art_check_items' );
$art_anchor = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_items = array_values(
	array_filter(
		array_map(
			static function ( $row ) {
				return trim( (string) ( $row['art_check_item_text'] ?? '' ) );
			},
			$art_items
		),
		static function ( $val ) {
			return '' !== $val;
		}
	)
);

if ( ! $art_items ) {
	return;
}

$art_gauge = wp_kses( tnb_art_icon( 'gauge' ), tnb_art_svg_html() );
?>
<div class="pa-check"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<div class="pa-check-head">
		<?php if ( '' !== $art_tag ) : ?>
			<span class="pa-check-tag"><?php echo $art_gauge; ?><?php echo esc_html( $art_tag ); ?></span>
		<?php endif; ?>
		<?php if ( '' !== $art_sub ) : ?>
			<p class="pa-check-sub"><?php echo esc_html( $art_sub ); ?></p>
		<?php endif; ?>
	</div>
	<ul class="pa-check-list">
		<?php foreach ( $art_items as $art_item ) : ?>
			<li>
				<span class="pa-check-box" aria-hidden="true">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12" /></svg>
				</span>
				<span><?php echo esc_html( $art_item ); ?></span>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
