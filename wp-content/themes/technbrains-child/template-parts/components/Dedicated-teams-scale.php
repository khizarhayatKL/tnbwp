<?php
/**
 * Dedicated Teams — Scaling panels (sprint bar chart + points).
 *
 * Layout : dt_scale (ACF Flexible Content)
 * Fields : dts_eyebrow, dts_heading, dts_sub, dts_anchor, dts_head_align,
 *          dts_cols{ dts_col_title, dts_col_tone,
 *                    dts_col_bars{ dts_bar_label, dts_bar_height },
 *                    dts_col_items{ dts_item_lead, dts_item_text } }
 * CSS    : assets/css/components.css (.dt-scale2*)
 * JS     : assets/js/components.js — the shared .dt-rev reveal only.
 *
 * .dt-scale2-bar carries no height in CSS, so the inline percentage is
 * load-bearing rather than decorative: without it every bar collapses to 0px.
 * It is clamped to 0-100 here because the value reaches the style attribute.
 *
 * The whole two-panel block reveals as one unit, matching the approved build —
 * there is no per-bar or per-panel stagger to reproduce.
 *
 * The em dash between a point's lead and its text is the approved typography,
 * not editor input, so it is joined here and only when both halves exist.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$dts_eyebrow = (string) get_sub_field( 'dts_eyebrow' );
$dts_heading = (string) get_sub_field( 'dts_heading' );
$dts_sub     = (string) get_sub_field( 'dts_sub' );
$dts_anchor  = sanitize_title( (string) get_sub_field( 'dts_anchor' ) );
$dts_align   = (string) get_sub_field( 'dts_head_align' );
$dts_cols    = (array) get_sub_field( 'dts_cols' );

if ( ! $dts_cols ) {
	return;
}

$dts_kses = array(
	'br'   => array(),
	'span' => array( 'class' => true ),
);

$dts_svg_kses = array(
	'svg'      => array(
		'viewbox'         => true,
		'fill'            => true,
		'stroke'          => true,
		'stroke-width'    => true,
		'stroke-linecap'  => true,
		'stroke-linejoin' => true,
	),
	'line'     => array(
		'x1' => true,
		'y1' => true,
		'x2' => true,
		'y2' => true,
	),
	'polyline' => array( 'points' => true ),
);

/**
 * Inline arrow for a scaling panel. Geometry is the approved set verbatim.
 *
 * @param string $tone up|down.
 * @return string SVG markup.
 */
if ( ! function_exists( 'tnb_dts_arrow' ) ) {
	function tnb_dts_arrow( $tone ) {
		$open = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">';

		if ( 'down' === $tone ) {
			return $open . '<line x1="12" y1="5" x2="12" y2="19"/><polyline points="19 12 12 19 5 12"/></svg>';
		}

		return $open . '<line x1="12" y1="19" x2="12" y2="5"/><polyline points="5 12 12 5 19 12"/></svg>';
	}
}

$dts_head_cl = 'dt-head dt-rev' . ( 'center' === $dts_align ? ' dt-center' : ' dt-head-left' );
?>
<section class="dt-section"<?php echo '' !== $dts_anchor ? ' id="' . esc_attr( $dts_anchor ) . '"' : ''; ?>>
	<div class="container">
		<?php if ( '' !== $dts_eyebrow || '' !== $dts_heading || '' !== $dts_sub ) : ?>
			<div class="<?php echo esc_attr( $dts_head_cl ); ?>">
				<?php if ( '' !== $dts_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $dts_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $dts_heading ) : ?>
					<h2 class="dt-h2 dt-h2-2l"><?php echo wp_kses( $dts_heading, $dts_kses ); ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $dts_sub ) : ?>
					<p class="dt-sub"><?php echo wp_kses( $dts_sub, $dts_kses ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="dt-scale2 dt-rev">
			<?php
			foreach ( $dts_cols as $dts_col ) :
				$dts_tone  = 'down' === (string) ( $dts_col['dts_col_tone'] ?? '' ) ? 'down' : 'up';
				$dts_title = (string) ( $dts_col['dts_col_title'] ?? '' );
				$dts_bars  = (array) ( $dts_col['dts_col_bars'] ?? array() );
				$dts_items = (array) ( $dts_col['dts_col_items'] ?? array() );
				?>
				<div class="dt-scale2-col">
					<?php if ( '' !== $dts_title ) : ?>
						<div class="dt-scale2-head">
							<span class="dt-scale2-ic <?php echo esc_attr( $dts_tone ); ?>" aria-hidden="true"><?php
								echo wp_kses( tnb_dts_arrow( $dts_tone ), $dts_svg_kses );
							?></span><?php echo esc_html( $dts_title ); ?>
						</div>
					<?php endif; ?>

					<?php if ( $dts_bars ) : ?>
						<div class="dt-scale2-chart">
							<?php
							foreach ( $dts_bars as $dts_bar ) :
								$dts_h = max( 0, min( 100, (int) ( $dts_bar['dts_bar_height'] ?? 0 ) ) );
								?>
								<div class="dt-scale2-bar-wrap">
									<div class="dt-scale2-bar <?php echo esc_attr( $dts_tone ); ?>" style="height:<?php echo (int) $dts_h; ?>%"></div>
									<span><?php echo esc_html( (string) ( $dts_bar['dts_bar_label'] ?? '' ) ); ?></span>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php if ( $dts_items ) : ?>
						<ul class="dt-scale2-list <?php echo esc_attr( $dts_tone ); ?>">
							<?php
							foreach ( $dts_items as $dts_item ) :
								$dts_lead = (string) ( $dts_item['dts_item_lead'] ?? '' );
								$dts_text = (string) ( $dts_item['dts_item_text'] ?? '' );

								if ( '' === $dts_lead && '' === $dts_text ) {
									continue;
								}
								?>
								<li><?php
									if ( '' !== $dts_lead ) {
										echo '<b>' . esc_html( $dts_lead ) . '</b>';
									}
									if ( '' !== $dts_lead && '' !== $dts_text ) {
										echo ' : ';
									}
									echo esc_html( $dts_text );
								?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
