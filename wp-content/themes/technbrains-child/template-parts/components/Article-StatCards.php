<?php
/**
 * Article template family — Sourced stat cards (dashboard-style, big number + body + citation).
 *
 * Layout : art_stat_cards (ACF Flexible Content)
 * Fields : art_statc_items{ art_statc_num, art_statc_body, art_statc_src }, art_anchor
 * CSS    : assets/css/article.css (.art-evband, .art-ncard*)
 * JS     : none of its own.
 *
 * Headless, matching Article-DiagSet.php's convention. Distinct from Article-StatBlock.php
 * (.cost-stats — qualifier + short label + single publisher link): article-3.jsx's StatCard
 * instead takes a full rich-text body sentence and a full rich-text citation (both may carry
 * <cite>/<a>), with no qualifier badge and no icon on the source line — a different shape, not a
 * restyle, so it gets its own component rather than overloading StatBlock's fields. The
 * decorative sparkline SVG behind each card is `display: none` in the source itself, so it is not
 * ported; same for the count-up/donut motion (out of scope for this build, see article.css's own
 * top-of-file note) — the final static number renders directly.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_items  = (array) get_sub_field( 'art_statc_items' );
$art_anchor = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_items = array_values(
	array_filter(
		$art_items,
		static function ( $row ) {
			return '' !== trim( (string) ( $row['art_statc_num'] ?? '' ) );
		}
	)
);

if ( ! $art_items ) {
	return;
}

?>
<div class="art-evband"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<?php foreach ( $art_items as $art_item ) : ?>
		<?php
		$art_num  = trim( (string) $art_item['art_statc_num'] );
		$art_body = trim( (string) ( $art_item['art_statc_body'] ?? '' ) );
		$art_src  = trim( (string) ( $art_item['art_statc_src'] ?? '' ) );

		$art_is_pct = 1 === preg_match( '/%$/', $art_num );
		?>
		<article class="art-ncard">
			<div class="art-ncard-in">
				<div class="art-ncard-num">
					<?php if ( $art_is_pct ) : ?>
						<?php echo esc_html( substr( $art_num, 0, -1 ) ); ?><i class="art-ncard-unit">%</i>
					<?php else : ?>
						<?php echo esc_html( $art_num ); ?>
					<?php endif; ?>
				</div>
				<?php if ( '' !== $art_body ) : ?>
					<p class="art-ncard-body"><?php echo wp_kses_post( $art_body ); ?></p>
				<?php endif; ?>
				<?php if ( '' !== $art_src ) : ?>
					<div class="art-ncard-src"><?php echo wp_kses_post( $art_src ); ?></div>
				<?php endif; ?>
			</div>
		</article>
	<?php endforeach; ?>
</div>
