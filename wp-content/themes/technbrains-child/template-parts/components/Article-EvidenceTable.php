<?php
/**
 * Article template family — Source-contradiction / evidence table (numbered, competitor flag).
 *
 * Layout : art_evidence_table (ACF Flexible Content)
 * Fields : art_evidence_items{ art_evidence_source, art_evidence_figure, art_evidence_type,
 *          art_evidence_competitor(true_false) }, art_evidence_caption, art_anchor
 * CSS    : assets/css/article.css (.art-cmp2, .cost-et-*, .cost-flag)
 * JS     : none of its own.
 *
 * Fixed shape (numbered source / figure given / what it is), like Article-VendorTable.php —
 * column 1 always renders an index badge + source name, column 3 always carries the optional
 * "Direct competitor" flag. Reuses the .art-cmp2 grid skeleton for visual consistency with the
 * other comparison tables in this family.
 *
 * Headless, matching Article-DiagSet.php's convention — the H2 + lead paragraph come from a
 * preceding art_prose row.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_items   = (array) get_sub_field( 'art_evidence_items' );
$art_caption = trim( (string) get_sub_field( 'art_evidence_caption' ) );
$art_anchor  = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_items = array_values(
	array_filter(
		$art_items,
		static function ( $row ) {
			return '' !== trim( (string) ( $row['art_evidence_source'] ?? '' ) );
		}
	)
);

if ( ! $art_items ) {
	return;
}

$art_svg = tnb_art_svg_html();
?>
<div class="cost-eviz-wrap"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<div class="art-cmp2-scroll">
	<table class="art-dtable art-cmp2 cost-et-cmp" style="--cmp-cols:1.2fr 1.1fr 1.3fr; min-width: 480px;">
		<thead>
			<tr class="art-cmp2-heads">
				<th class="art-cmp2-head tone-blue" scope="col"><b>Source</b></th>
				<th class="art-cmp2-head tone-navy" scope="col"><b>Figure given</b></th>
				<th class="art-cmp2-head tone-red" scope="col"><b>What it is</b></th>
			</tr>
		</thead>
		<tbody class="art-cmp2-body">
			<?php foreach ( $art_items as $art_i => $art_item ) : ?>
				<?php
				$art_source     = trim( (string) $art_item['art_evidence_source'] );
				$art_figure     = trim( (string) ( $art_item['art_evidence_figure'] ?? '' ) );
				$art_type       = trim( (string) ( $art_item['art_evidence_type'] ?? '' ) );
				$art_competitor = ! empty( $art_item['art_evidence_competitor'] );
				?>
				<tr class="art-cmp2-row<?php echo $art_competitor ? ' is-competitor' : ''; ?>">
					<td class="art-cmp2-cell">
						<div class="cost-et-src">
							<span class="cost-et-idx"><?php echo esc_html( $art_i + 1 ); ?></span>
							<span class="cost-et-name"><?php echo esc_html( $art_source ); ?></span>
						</div>
					</td>
					<td class="art-cmp2-cell txt cost-et-fig"><?php echo esc_html( $art_figure ); ?></td>
					<td class="art-cmp2-cell txt">
						<span class="cost-et-type"><?php echo esc_html( $art_type ); ?></span>
						<?php if ( $art_competitor ) : ?>
							<span class="cost-flag"><?php echo wp_kses( tnb_art_icon( 'competitor-flag' ), $art_svg ); ?>Direct competitor</span>
						<?php endif; ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	</div>
	<?php if ( '' !== $art_caption ) : ?>
		<div class="cost-eviz-cap"><?php echo esc_html( $art_caption ); ?></div>
	<?php endif; ?>
</div>
