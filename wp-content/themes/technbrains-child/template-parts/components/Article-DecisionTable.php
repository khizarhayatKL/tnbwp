<?php
/**
 * Article template family — Decision table (plain comparison grid).
 *
 * Layout : art_decision_table (ACF Flexible Content)
 * Fields : art_dt_heading, art_dt_toc_label, art_dt_category_col,
 *          art_dt_cols{ art_dt_col_label },
 *          art_dt_rows{ art_dt_cells{ art_dt_cell_text } }, art_anchor
 * CSS    : assets/css/article.css (.art-dtable, .art-cmp2*) — the same skeleton the Construction
 *          page's cn_compare reuses from Software Outsourcing (.so-cmp2), just under the
 *          article-family's own class names.
 * JS     : none of its own.
 *
 * One component, three uses: "At a Glance" (8x5), "Choose by Reason" (5x4), and "Fit by
 * Contractor Type" (7x3) are all this same layout with different column/row data, not three
 * separate components — column count is read from art_dt_cols, so the grid's own
 * --cmp-cols track list is built from however many columns exist rather than being hard-coded.
 *
 * art_dt_category_col highlights one column in the "tone-red" treatment (the prototype's catCol
 * prop) — e.g. "Best-matched alternatives" in the why-leave table. -1 (or empty) means none.
 * Column 0 always renders as "tone-blue" and every other column as "tone-navy", matching
 * DecisionTable's own tone() function.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_heading  = (string) get_sub_field( 'art_dt_heading' );
$art_cols     = (array) get_sub_field( 'art_dt_cols' );
$art_rows     = (array) get_sub_field( 'art_dt_rows' );
$art_cat_col  = get_sub_field( 'art_dt_category_col' );
$art_anchor   = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_cat_col = ( '' === $art_cat_col || null === $art_cat_col ) ? -1 : (int) $art_cat_col;

$art_col_labels = array();
foreach ( $art_cols as $art_col ) {
	$art_col_labels[] = trim( (string) ( $art_col['art_dt_col_label'] ?? '' ) );
}

$art_rows = array_values(
	array_filter(
		$art_rows,
		static function ( $row ) {
			foreach ( (array) ( $row['art_dt_cells'] ?? array() ) as $cell ) {
				if ( '' !== trim( (string) ( $cell['art_dt_cell_text'] ?? '' ) ) ) {
					return true;
				}
			}
			return false;
		}
	)
);

if ( ! $art_col_labels || ! $art_rows ) {
	return;
}

$art_track_list = array_fill( 0, count( $art_col_labels ), '1fr' );
// Column count varies by use (5/4/3 columns across this component's 3 known shapes), so the
// mobile min-width that forces proper horizontal scroll (rather than each column shrinking to
// its own min-content) has to be computed here rather than hard-coded, unlike its sibling
// components with a fixed column count.
$art_min_width = count( $art_col_labels ) * 150;
?>
<section class="art-sec art-fade art-sec--major"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<?php if ( '' !== $art_heading ) : ?>
		<h2><?php echo esc_html( $art_heading ); ?></h2>
	<?php endif; ?>

	<div class="art-sub">
		<div class="art-cmp2-scroll">
		<table class="art-dtable art-cmp2" style="--cmp-cols:<?php echo esc_attr( implode( ' ', $art_track_list ) ); ?>; min-width: <?php echo (int) $art_min_width; ?>px;">
			<thead>
				<tr class="art-cmp2-heads">
					<?php foreach ( $art_col_labels as $art_i => $art_label ) : ?>
						<?php
						$art_tone = $art_i === $art_cat_col ? 'tone-red' : ( 0 === $art_i ? 'tone-blue' : 'tone-navy' );
						?>
						<th class="art-cmp2-head <?php echo esc_attr( $art_tone ); ?>" scope="col"><b><?php echo esc_html( $art_label ); ?></b></th>
					<?php endforeach; ?>
				</tr>
			</thead>
			<tbody class="art-cmp2-body">
				<?php foreach ( $art_rows as $art_row ) : ?>
					<tr class="art-cmp2-row">
						<?php foreach ( (array) ( $art_row['art_dt_cells'] ?? array() ) as $art_j => $art_cell ) : ?>
							<?php
							$art_text = trim( (string) ( $art_cell['art_dt_cell_text'] ?? '' ) );
							$art_cell_class = 0 === $art_j ? 'cap' : ( $art_j === $art_cat_col ? 'txt art-dt-cat' : 'txt' );
							?>
							<td class="art-cmp2-cell <?php echo esc_attr( $art_cell_class ); ?>"><?php echo esc_html( $art_text ); ?></td>
						<?php endforeach; ?>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		</div>
	</div>
</section>
