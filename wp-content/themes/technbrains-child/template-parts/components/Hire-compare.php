<?php
/**
 * Component: Hire Developer — Comparison Table (HDCompare)
 * Layout   : hd_compare (ACF Flexible Content)
 *
 * Fields:
 *   hdcmp_eyebrow          — text
 *   hdcmp_heading          — text   (plain part)
 *   hdcmp_heading_accent   — text   (accent span)
 *   hdcmp_sub              — textarea
 *   hdcmp_col_tb_header    — text   (TechnBrains column header)
 *   hdcmp_col_out_header   — text   (Project Outsourcing header)
 *   hdcmp_col_in_header    — text   (In-House Hiring header)
 *   hdcmp_rows             — repeater
 *     hdcmp_row_factor     — text   (row label, e.g. "Control")
 *     hdcmp_row_tb_mark    — select (pos|neu|neg)
 *     hdcmp_row_tb_text    — textarea
 *     hdcmp_row_out_mark   — select (pos|neu|neg)
 *     hdcmp_row_out_text   — textarea
 *     hdcmp_row_in_mark    — select (pos|neu|neg)
 *     hdcmp_row_in_text    — textarea
 *     hdcmp_row_tags       — text   (comma-separated filter tags, e.g. "Speed,Control")
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/* ── 1. Fetch ACF data ──────────────────────────────────────────────── */
$eyebrow        = get_sub_field( 'hdcmp_eyebrow' )        ?: '';
$heading        = get_sub_field( 'hdcmp_heading' )        ?: '';
$heading_accent = get_sub_field( 'hdcmp_heading_accent' ) ?: '';
$sub            = get_sub_field( 'hdcmp_sub' )            ?: '';
$col_tb_header  = get_sub_field( 'hdcmp_col_tb_header' )  ?: 'Dedicated Developer (TechnBrains)';
$col_out_header = get_sub_field( 'hdcmp_col_out_header' ) ?: 'Project Outsourcing';
$col_in_header  = get_sub_field( 'hdcmp_col_in_header' )  ?: 'In-House Hiring';

$rows     = [];
$rows_raw = get_sub_field( 'hdcmp_rows' );
if ( is_array( $rows_raw ) ) {
	foreach ( $rows_raw as $row ) {
		$tags_raw = $row['hdcmp_row_tags'] ?? '';
		$rows[]   = [
			'factor'   => $row['hdcmp_row_factor']   ?? '',
			'tb_mark'  => $row['hdcmp_row_tb_mark']  ?? 'pos',
			'tb_text'  => $row['hdcmp_row_tb_text']  ?? '',
			'out_mark' => $row['hdcmp_row_out_mark']  ?? 'neu',
			'out_text' => $row['hdcmp_row_out_text']  ?? '',
			'in_mark'  => $row['hdcmp_row_in_mark']   ?? 'pos',
			'in_text'  => $row['hdcmp_row_in_text']   ?? '',
			'tags'     => array_filter( array_map( 'trim', explode( ',', $tags_raw ) ) ),
		];
	}
}

if ( empty( $rows ) ) {
	return;
}

/* ── 2. Unique section ID ───────────────────────────────────────────── */
static $hdcmp_uid = 0;
$hdcmp_uid++;
$section_id = 'hd-compare-' . $hdcmp_uid;

/* ── 3. Mark helper ─────────────────────────────────────────────────── */
$marks = [
	'pos' => '<span class="hd-mark pos">&#10003;</span>',
	'neu' => '<span class="hd-mark neu">&#126;</span>',
	'neg' => '<span class="hd-mark neg">&#10007;</span>',
];
?>
<section class="hd-compare" id="<?php echo esc_attr( $section_id ); ?>">
	<div class="hd-container">

		<?php if ( $eyebrow || $heading || $heading_accent || $sub ) : ?>
		<div class="hd-section-head">
			<?php if ( $eyebrow ) : ?>
			<div class="hd-eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
			<?php endif; ?>

			<?php if ( $heading || $heading_accent ) : ?>
			<h2 class="hd-h2">
				<?php echo esc_html( $heading ); ?>
				<?php if ( $heading_accent ) : ?>
				<span class="hd-accent"><?php echo esc_html( $heading_accent ); ?></span>
				<?php endif; ?>
			</h2>
			<?php endif; ?>

			<?php if ( $sub ) : ?>
			<p class="hd-sub"><?php echo esc_html( $sub ); ?></p>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<!-- Filter chips -->
		<div class="hd-compare-filters" role="group" aria-label="Filter comparison factors">
			<button type="button" class="hd-chip active" data-filter="all">All factors</button>
			<?php
			$all_tags = [];
			foreach ( $rows as $row ) {
				foreach ( $row['tags'] as $tag ) {
					if ( ! in_array( $tag, $all_tags, true ) ) {
						$all_tags[] = $tag;
					}
				}
			}
			foreach ( $all_tags as $tag ) :
			?>
			<button type="button" class="hd-chip" data-filter="<?php echo esc_attr( sanitize_title( $tag ) ); ?>">
				<?php echo esc_html( $tag ); ?>
			</button>
			<?php endforeach; ?>
		</div>

		<!-- Comparison table -->
		<div class="hd-compare-table" role="table" aria-label="Developer hiring comparison">

			<!-- Header row -->
			<div class="hd-compare-row head" role="row">
				<div class="hd-compare-cell factor" role="columnheader">Factor</div>
				<div class="hd-compare-cell tb" role="columnheader"><?php echo esc_html( $col_tb_header ); ?></div>
				<div class="hd-compare-cell" role="columnheader"><?php echo esc_html( $col_out_header ); ?></div>
				<div class="hd-compare-cell" role="columnheader"><?php echo esc_html( $col_in_header ); ?></div>
			</div>

			<!-- Data rows -->
			<?php foreach ( $rows as $row ) :
				$tags_attr = implode( ',', array_map( 'sanitize_title', $row['tags'] ) );
				$tb_mark   = isset( $marks[ $row['tb_mark'] ] )  ? $marks[ $row['tb_mark'] ]  : '';
				$out_mark  = isset( $marks[ $row['out_mark'] ] ) ? $marks[ $row['out_mark'] ] : '';
				$in_mark   = isset( $marks[ $row['in_mark'] ] )  ? $marks[ $row['in_mark'] ]  : '';
			?>
			<div class="hd-compare-row" role="row" data-tags="<?php echo esc_attr( $tags_attr ); ?>">
				<div class="hd-compare-cell factor" role="rowheader">
					<?php echo esc_html( $row['factor'] ); ?>
				</div>
				<div class="hd-compare-cell tb" role="cell"
					data-col="<?php echo esc_attr( $col_tb_header ); ?>">
					<?php echo $tb_mark;  ?>
					<?php echo esc_html( $row['tb_text'] ); ?>
				</div>
				<div class="hd-compare-cell" role="cell"
					data-col="<?php echo esc_attr( $col_out_header ); ?>">
					<?php echo $out_mark;  ?>
					<?php echo esc_html( $row['out_text'] ); ?>
				</div>
				<div class="hd-compare-cell" role="cell"
					data-col="<?php echo esc_attr( $col_in_header ); ?>">
					<?php echo $in_mark; ?>
					<?php echo esc_html( $row['in_text'] ); ?>
				</div>
			</div>
			<?php endforeach; ?>

		</div><!-- .hd-compare-table -->

	</div><!-- .hd-container -->
</section>
