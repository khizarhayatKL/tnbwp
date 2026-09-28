<?php
/**
 * Software Outsourcing — Comparison matrix (columns × rows).
 *
 * Layout : so_compare (ACF Flexible Content)
 * Fields : soc_eyebrow, soc_heading, soc_sub, soc_head_align,
 *          soc_columns{ soc_col_label, soc_col_sub, soc_col_tone, soc_col_width,
 *                       soc_col_featured },
 *          soc_rows{ soc_row_label, soc_cells{ soc_cell } }, soc_cta
 * CSS    : assets/css/components.css (.so-cmp2*)
 * JS     : none.
 *
 * One component for both tables on the page — "Onshore / Nearshore / Offshore"
 * and "Why Choose TechnBrains". They are the same object: a label column plus N
 * comparison columns, one of which may be the featured one. The differences the
 * approved design shows between them (column widths, which column is highlighted,
 * whether cells carry a tick) are all authored, not forked into a second template.
 *
 * Cells are matched to columns by position: the first cell of a row lands under
 * the first comparison column. A row with fewer cells than there are columns
 * leaves the remainder empty rather than shifting everything left, so a
 * half-filled row can never silently misalign the table.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$soc_eyebrow = (string) get_sub_field( 'soc_eyebrow' );
$soc_heading = (string) get_sub_field( 'soc_heading' );
$soc_sub     = (string) get_sub_field( 'soc_sub' );
$soc_align   = (string) get_sub_field( 'soc_head_align' );
$soc_columns = (array) get_sub_field( 'soc_columns' );
$soc_rows    = (array) get_sub_field( 'soc_rows' );
$soc_cta     = get_sub_field( 'soc_cta' );

if ( ! $soc_columns || ! $soc_rows ) {
	return;
}

$soc_kses = array(
	'br'   => array(),
	'span' => array( 'class' => true ),
);

$soc_render_cta = static function ( $cta, $class ) {
	if ( ! is_array( $cta ) || empty( $cta['url'] ) || '' === (string) ( $cta['title'] ?? '' ) ) {
		return;
	}
	if ( in_array( $cta['url'], array( '#tnb-popup', '#tnb-form' ), true ) ) {
		echo '<button type="button" class="' . esc_attr( $class ) . ' tnb-popup-trigger">'
			. esc_html( (string) $cta['title'] ) . '</button>';
		return;
	}
	echo '<a class="' . esc_attr( $class ) . '" href="' . esc_url( $cta['url'] ) . '"'
		. ( ! empty( $cta['target'] ) ? ' target="' . esc_attr( $cta['target'] ) . '" rel="noopener"' : '' )
		. '>' . esc_html( (string) $cta['title'] ) . '</a>';
};

$soc_tick = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>';
$soc_svg_kses = array(
	'svg'      => array(
		'viewbox'         => true,
		'fill'            => true,
		'stroke'          => true,
		'stroke-width'    => true,
		'stroke-linecap'  => true,
		'stroke-linejoin' => true,
		'aria-hidden'     => true,
	),
	'polyline' => array( 'points' => true ),
);

/*
 * The label column plus one per comparison column, so --cmp-cols always names
 * exactly as many tracks as there are cells in a row.
 *
 * Widths are authored as percentages but emitted as fr units. A literal
 * `25% 25% 25% 25%` would overflow: .so-cmp2-heads puts a 12px gap between the
 * header pills, and percentages resolve against the full content box rather than
 * what the gaps leave over. fr divides the remaining space in the same ratio the
 * percentages express, so the authored proportions hold and the row can never be
 * wider than its container.
 *
 * Blank columns split whatever the authored ones do not claim; if they claim it
 * all, blanks fall back to a floor so a column can never collapse to nothing.
 * With every column blank the approved default ratio is used unchanged.
 */
$soc_pct   = array();
$soc_blank = array();
$soc_used  = 0.0;

foreach ( $soc_columns as $soc_i => $soc_col ) {
	$soc_raw = trim( (string) ( $soc_col['soc_col_width'] ?? '' ) );

	if ( '' === $soc_raw || ! is_numeric( $soc_raw ) || (float) $soc_raw <= 0 ) {
		$soc_pct[ $soc_i ] = null;
		$soc_blank[]       = $soc_i;
		continue;
	}

	$soc_pct[ $soc_i ] = min( 100.0, (float) $soc_raw );
	$soc_used         += $soc_pct[ $soc_i ];
}

/*
 * A column narrower than about 12% cannot hold its own chrome: a featured cell is
 * 44px of padding plus a 22px tick plus a 10px gap before any text, which is ~76px
 * of the 720px the table is floored at. So 12 is the smallest share handed out, and
 * authored values are scaled down proportionally when they would leave less than
 * that — the percentages a column is given always total 100. Without the scaling a
 * pair of careless entries (say 60 and 50) pushed the remaining columns below their
 * own chrome and the cell contents spilled off the page.
 */
$soc_min = 12.0;

if ( count( $soc_blank ) === count( $soc_columns ) ) {
	// Nothing authored — the approved ratio, left exactly as it was.
	foreach ( $soc_pct as $soc_i => $soc_unused ) {
		$soc_pct[ $soc_i ] = 0 === (int) $soc_i ? 1.35 : 1.0;
	}
} else {
	$soc_budget = 100.0 - ( count( $soc_blank ) * $soc_min );
	$soc_budget = max( $soc_min, $soc_budget );

	if ( $soc_used > $soc_budget ) {
		$soc_scale = $soc_budget / $soc_used;

		foreach ( $soc_pct as $soc_i => $soc_value ) {
			if ( null !== $soc_value ) {
				$soc_pct[ $soc_i ] = max( $soc_min, $soc_value * $soc_scale );
			}
		}

		$soc_used = $soc_budget;
	}

	if ( $soc_blank ) {
		$soc_share = ( 100.0 - $soc_used ) / count( $soc_blank );
		$soc_share = max( $soc_min, $soc_share );

		foreach ( $soc_blank as $soc_i ) {
			$soc_pct[ $soc_i ] = $soc_share;
		}
	}
}

/*
 * minmax(0, Nfr), not a bare Nfr. A bare fr track is minmax(auto, Nfr): its
 * content's minimum size can override the ratio, so a column holding a long
 * sentence quietly grew past its authored share once the table was cramped. The
 * zero floor makes the authored percentage the one that decides, and the
 * min-width on .so-cmp2-heads / -body keeps every column readable by turning the
 * table into a scrollbox rather than letting cells collapse.
 */
$soc_tracks = array();
foreach ( $soc_pct as $soc_value ) {
	$soc_fr       = rtrim( rtrim( number_format( (float) $soc_value, 2, '.', '' ), '0' ), '.' );
	$soc_tracks[] = 'minmax(0,' . $soc_fr . 'fr)';
}

$soc_style   = '--cmp-cols:' . implode( ' ', $soc_tracks );
$soc_head_cl = 'dt-head' . ( 'left' === $soc_align ? ' dt-head-left' : ' dt-center' );
?>
<section class="dt-section">
	<div class="container">
		<?php if ( '' !== $soc_eyebrow || '' !== $soc_heading || '' !== $soc_sub ) : ?>
			<div class="<?php echo esc_attr( $soc_head_cl ); ?>">
				<?php if ( '' !== $soc_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $soc_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $soc_heading ) : ?>
					<h2 class="dt-h2"><?php echo wp_kses( $soc_heading, $soc_kses ); ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $soc_sub ) : ?>
					<p class="dt-sub"><?php echo wp_kses( $soc_sub, $soc_kses ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="so-cmp2" style="<?php echo esc_attr( $soc_style ); ?>">
			<div class="so-cmp2-heads">
				<?php
					foreach ( $soc_columns as $soc_i => $soc_col ) :
						$soc_tone  = (string) ( $soc_col['soc_col_tone'] ?? '' );
						$soc_label = (string) ( $soc_col['soc_col_label'] ?? '' );
						$soc_sub_h = (string) ( $soc_col['soc_col_sub'] ?? '' );
						$soc_class = 'so-cmp2-head';

						// The first column is the table's own label; the rest take the
						// tone the design assigns them. An empty first column (no label,
						// no sub-heading) renders no pill at all -- some comparison tables
						// keep the row label in the body instead of a header pill.
						if ( 0 === (int) $soc_i ) {
							if ( '' === $soc_label && '' === $soc_sub_h ) {
								echo '<div class="so-cmp2-head lbl is-empty"></div>';
								continue;
							}
							$soc_class .= ' lbl';
						} elseif ( '' !== $soc_tone && 'none' !== $soc_tone ) {
							$soc_class .= ' tone-' . $soc_tone;
						}
						?>
						<?php
						// Optional heading link -- inherits the pill's color so linked and
						// plain headings look identical (see .so-cmp2-head b a in CSS).
						$soc_link = $soc_col['soc_col_link'] ?? null;
						$soc_url  = is_array( $soc_link ) ? (string) ( $soc_link['url'] ?? '' ) : '';
						?>
						<div class="<?php echo esc_attr( $soc_class ); ?>">
							<b><?php
							if ( '' !== $soc_url ) {
								echo '<a href="' . esc_url( $soc_url ) . '"'
									. ( ! empty( $soc_link['target'] ) ? ' target="' . esc_attr( $soc_link['target'] ) . '" rel="noopener"' : '' )
									. '>' . esc_html( $soc_label ) . '</a>';
							} else {
								echo esc_html( $soc_label );
							}
							?></b>
							<span><?php echo esc_html( $soc_sub_h ); ?></span>
						</div>
					<?php endforeach; ?>
			</div>

			<div class="so-cmp2-body">
				<?php
				foreach ( $soc_rows as $soc_r => $soc_row ) :
					$soc_cells = (array) ( $soc_row['soc_cells'] ?? array() );
					?>
					<div class="so-cmp2-row<?php echo 1 === (int) $soc_r % 2 ? ' alt' : ''; ?>">
						<div class="so-cmp2-cell cap"><?php echo esc_html( (string) ( $soc_row['soc_row_label'] ?? '' ) ); ?></div>
						<?php
						// One cell per comparison column, by position.
						for ( $soc_c = 1; $soc_c < count( $soc_columns ); $soc_c++ ) :
							$soc_cell = $soc_cells[ $soc_c - 1 ]['soc_cell'] ?? '';
							$soc_feat = ! empty( $soc_columns[ $soc_c ]['soc_col_featured'] );
							?>
							<div class="so-cmp2-cell txt<?php echo $soc_feat ? ' feat' : ''; ?>">
								<?php if ( $soc_feat && '' !== (string) $soc_cell ) : ?>
									<span class="so-cmp2-tick"><?php echo wp_kses( $soc_tick, $soc_svg_kses ); ?></span>
								<?php endif; ?>
								<span><?php echo esc_html( (string) $soc_cell ); ?></span>
							</div>
						<?php endfor; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<?php if ( is_array( $soc_cta ) && ! empty( $soc_cta['url'] ) ) : ?>
			<div class="so-cmp2-cta">
				<?php $soc_render_cta( $soc_cta, 'dt-btn dt-btn-primary' ); ?>
			</div>
		<?php endif; ?>
	</div>
</section>
