<?php
/**
 * Article template family — Legend + card matrix (coded workflow/risk grid, card treatment).
 *
 * Layout : art_legend_matrix (ACF Flexible Content)
 * Fields : art_lm_legend_title, art_lm_legend{ art_lm_legend_code, art_lm_legend_label,
 *          art_lm_legend_tone, art_lm_legend_counts, art_lm_legend_desc }, art_lm_legend_note,
 *          art_lm_cols{ art_lm_col_label }, art_lm_rows{ art_lm_row_name, art_lm_cells{
 *          art_lm_cell_code } }, art_lm_emphasize_last_col, art_lm_show_badge, art_lm_badge_label,
 *          art_anchor
 * CSS    : assets/css/article.css (.art-lm-*)
 * JS     : none of its own.
 *
 * One component, two known uses (native sourcing / risk profile), matching the source's two
 * near-duplicate card-grid components rather than a literal HTML table — the source's own
 * table-based LegendMatrix/MatrixToken treatment exists but is dead code, never rendered.
 *
 * Each row's cell codes are resolved against THIS INSTANCE's own art_lm_legend list (case
 * insensitive), not a hardcoded vocabulary — the native-sourcing and risk-profile uses reuse some
 * of the same single-letter codes (e.g. "M") for different meanings, so the lookup has to stay
 * scoped per layout row rather than shared in PHP.
 *
 * art_lm_emphasize_last_col carries the risk profile's own last-column ("Evidence") visual
 * distinction; art_lm_show_badge/art_lm_badge_label carries native sourcing's "N/7 native" per-row
 * count (counted from cells whose matched legend entry has art_lm_legend_counts set) — both are
 * optional so this one component covers either shape without a hardcoded native-vs-risk branch.
 *
 * Headless, matching Article-DiagSet.php's convention — the H2 + lead paragraph come from a
 * preceding art_prose row.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_legend_title  = trim( (string) get_sub_field( 'art_lm_legend_title' ) );
$art_legend        = (array) get_sub_field( 'art_lm_legend' );
$art_legend_note   = trim( (string) get_sub_field( 'art_lm_legend_note' ) );
$art_cols          = (array) get_sub_field( 'art_lm_cols' );
$art_rows          = (array) get_sub_field( 'art_lm_rows' );
$art_emphasize_last = ! empty( get_sub_field( 'art_lm_emphasize_last_col' ) );
$art_show_badge    = ! empty( get_sub_field( 'art_lm_show_badge' ) );
$art_badge_label   = trim( (string) get_sub_field( 'art_lm_badge_label' ) );
$art_anchor        = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_legend = array_values(
	array_filter(
		$art_legend,
		static function ( $row ) {
			return '' !== trim( (string) ( $row['art_lm_legend_code'] ?? '' ) );
		}
	)
);

$art_col_labels = array();
foreach ( $art_cols as $art_col ) {
	$art_col_labels[] = trim( (string) ( $art_col['art_lm_col_label'] ?? '' ) );
}

$art_rows = array_values(
	array_filter(
		$art_rows,
		static function ( $row ) {
			return '' !== trim( (string) ( $row['art_lm_row_name'] ?? '' ) );
		}
	)
);

if ( ! $art_legend || ! $art_col_labels || ! $art_rows ) {
	return;
}

$art_tones = array( 'green', 'blue', 'amber', 'gray', 'red' );

$art_legend_by_code = array();
foreach ( $art_legend as $art_l ) {
	$art_code = strtolower( trim( (string) $art_l['art_lm_legend_code'] ) );
	$art_legend_by_code[ $art_code ] = array(
		'label'  => trim( (string) ( $art_l['art_lm_legend_label'] ?? '' ) ),
		'tone'   => in_array( $art_l['art_lm_legend_tone'] ?? '', $art_tones, true ) ? $art_l['art_lm_legend_tone'] : 'gray',
		'counts' => ! empty( $art_l['art_lm_legend_counts'] ),
	);
}

$art_last_i = count( $art_col_labels ) - 1;
$art_svg    = tnb_art_svg_html();

// Explicit width/height on this one icon only — tnb_art_icon()'s svg markup is deliberately
// unsized everywhere else (sized by the wrapper via CSS), so the allowlist widened here is
// local to this call, not added to tnb_art_svg_html() itself.
$art_note_kses = $art_svg;
$art_note_kses['svg']['width']  = true;
$art_note_kses['svg']['height'] = true;
$art_note_icon = str_replace( '<svg ', '<svg width="15" height="15" ', tnb_art_icon( 'info' ) );
?>
<div class="art-lm"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<div class="art-lm-legend">
		<?php if ( '' !== $art_legend_title ) : ?>
			<span class="art-lm-legend-title"><?php echo esc_html( $art_legend_title ); ?></span>
		<?php endif; ?>
		<div class="art-lm-legend-items">
			<?php foreach ( $art_legend as $art_l ) : ?>
				<?php if ( ! empty( $art_l['art_lm_legend_hidden'] ) ) : ?>
					<?php continue; ?>
				<?php endif; ?>
				<?php
				$art_l_code  = trim( (string) $art_l['art_lm_legend_code'] );
				$art_l_label = trim( (string) ( $art_l['art_lm_legend_label'] ?? '' ) );
				$art_l_desc  = trim( (string) ( $art_l['art_lm_legend_desc'] ?? '' ) );
				$art_l_tone  = in_array( $art_l['art_lm_legend_tone'] ?? '', $art_tones, true ) ? $art_l['art_lm_legend_tone'] : 'gray';
				?>
				<div class="art-lm-legend-item">
					<span class="art-lm-chip art-lm-chip--<?php echo esc_attr( $art_l_tone ); ?>"><?php echo esc_html( '' !== $art_l_label ? $art_l_label : $art_l_code ); ?></span>
					<span class="art-lm-legend-text"><?php echo esc_html( $art_l_desc ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>
		<?php if ( '' !== $art_legend_note ) : ?>
			<p class="art-lm-legend-note"><?php echo wp_kses( $art_note_icon, $art_note_kses ); ?><span><?php echo esc_html( $art_legend_note ); ?></span></p>
		<?php endif; ?>
	</div>

	<div class="art-lm-list">
		<?php foreach ( $art_rows as $art_row ) : ?>
			<?php
			$art_row_name = trim( (string) $art_row['art_lm_row_name'] );
			$art_cells    = (array) ( $art_row['art_lm_cells'] ?? array() );

			$art_counted = 0;
			foreach ( $art_cells as $art_cell ) {
				$art_code = strtolower( trim( (string) ( $art_cell['art_lm_cell_code'] ?? '' ) ) );
				if ( isset( $art_legend_by_code[ $art_code ] ) && $art_legend_by_code[ $art_code ]['counts'] ) {
					++$art_counted;
				}
			}
			?>
			<div class="art-lm-card">
				<div class="art-lm-card-head">
					<span class="art-lm-card-name"><?php echo esc_html( $art_row_name ); ?></span>
					<?php if ( $art_show_badge ) : ?>
						<span class="art-lm-badge"><?php echo esc_html( $art_counted . '/' . count( $art_col_labels ) ); ?><?php echo '' !== $art_badge_label ? ' ' . esc_html( $art_badge_label ) : ''; ?></span>
					<?php endif; ?>
				</div>
				<div class="art-lm-chips">
					<?php foreach ( $art_col_labels as $art_ci => $art_col_label ) : ?>
						<?php
						$art_code = strtolower( trim( (string) ( $art_cells[ $art_ci ]['art_lm_cell_code'] ?? '' ) ) );
						$art_meta = $art_legend_by_code[ $art_code ] ?? array( 'label' => '', 'tone' => 'gray' );
						$art_emph = $art_emphasize_last && $art_ci === $art_last_i;
						?>
						<span class="art-lm-chip2 art-lm-chip2--<?php echo esc_attr( $art_meta['tone'] ); ?><?php echo $art_emph ? ' art-lm-chip2--emph' : ''; ?>" title="<?php echo esc_attr( $art_meta['label'] ); ?>">
							<span class="art-lm-chip2-col"><?php echo esc_html( $art_col_label ); ?></span>
							<span class="art-lm-chip2-code"><?php echo esc_html( $art_meta['label'] ?: '—' ); ?></span>
						</span>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
