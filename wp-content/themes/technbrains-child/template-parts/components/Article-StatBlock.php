<?php
/**
 * Article template family — Sourced stat block (4-up cited headline figures).
 *
 * Layout : art_stat_block (ACF Flexible Content)
 * Fields : art_stat_items{ art_stat_num, art_stat_qualifier, art_stat_label,
 *          art_stat_source_link(link) }, art_anchor
 * CSS    : assets/css/article.css (.cost-stats, .cost-stat*)
 * JS     : none of its own.
 *
 * Headless, matching Article-DiagSet.php's convention — the H2 + lead paragraph come from a
 * preceding art_prose row (cost-app.jsx's "spend" section). art_stat_num is stored as authored
 * (e.g. "$58,000", "10%") rather than split into number+unit fields — cost-app.jsx's own
 * SourcedStatBlock detects a trailing "%" at render time to colour just that character, so this
 * component does the same rather than requiring editors to enter the unit separately.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_items  = (array) get_sub_field( 'art_stat_items' );
$art_anchor = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_items = array_values(
	array_filter(
		$art_items,
		static function ( $row ) {
			return '' !== trim( (string) ( $row['art_stat_num'] ?? '' ) );
		}
	)
);

if ( ! $art_items ) {
	return;
}

$art_svg = tnb_art_svg_html();
?>
<div class="cost-stats"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<?php foreach ( $art_items as $art_item ) : ?>
		<?php
		$art_num     = trim( (string) $art_item['art_stat_num'] );
		$art_qual    = trim( (string) ( $art_item['art_stat_qualifier'] ?? '' ) );
		$art_label   = trim( (string) ( $art_item['art_stat_label'] ?? '' ) );
		$art_link    = (array) ( $art_item['art_stat_source_link'] ?? array() );
		$art_src_url = trim( (string) ( $art_link['url'] ?? '' ) );
		$art_src_pub = trim( (string) ( $art_link['title'] ?? '' ) );
		$art_is_pct  = 1 === preg_match( '/%$/', $art_num );
		?>
		<div class="cost-stat">
			<div class="cost-stat-fig">
				<?php if ( '' !== $art_qual ) : ?>
					<span class="cost-stat-qual"><?php echo esc_html( $art_qual ); ?></span>
				<?php endif; ?>
				<span class="cost-stat-num">
					<?php if ( $art_is_pct ) : ?>
						<span><?php echo esc_html( substr( $art_num, 0, -1 ) ); ?></span><span class="cost-unit">%</span>
					<?php else : ?>
						<?php echo esc_html( $art_num ); ?>
					<?php endif; ?>
				</span>
			</div>
			<?php if ( '' !== $art_label ) : ?>
				<div class="cost-stat-label"><?php echo esc_html( $art_label ); ?></div>
			<?php endif; ?>
			<?php if ( '' !== $art_src_url && '' !== $art_src_pub ) : ?>
				<div class="cost-stat-src">
					<a href="<?php echo esc_url( $art_src_url ); ?>" target="_blank" rel="noopener nofollow">
						<?php echo wp_kses( tnb_art_icon( 'stat-link' ), $art_svg ); ?><?php echo esc_html( $art_src_pub ); ?>
					</a>
				</div>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
</div>
