<?php
/**
 * Construction Software — Build vs buy comparison.
 *
 * Layout : cn_compare (ACF Flexible Content)
 * Fields : cncmp_eyebrow, cncmp_heading, cncmp_sub, cncmp_anchor,
 *          cncmp_col_factor, cncmp_col_buy, cncmp_col_buy_note,
 *          cncmp_col_build, cncmp_col_build_note,
 *          cncmp_rows{ cncmp_row_factor, cncmp_row_buy, cncmp_row_build },
 *          cncmp_verdict
 * CSS    : components.css (.so-cmp2*) plus construction.css for .cn-cmp-verdict
 * JS     : none — the .dt-rev reveal in components.js is the only behaviour.
 *
 * The matrix is the Software Outsourcing comparison table, reused rather than rebuilt: .so-cmp2,
 * .so-cmp2-heads, .so-cmp2-head, .so-cmp2-body, .so-cmp2-row, .so-cmp2-cell and .so-cmp2-tick are
 * all already in components.css, including the mobile scroll behaviour and the 12% minimum column
 * width. Only the verdict box below it is new.
 *
 * Column widths ride on the --cmp-cols custom property the existing CSS reads. It is set inline
 * because an inline custom property is the only way to give one instance its own ratio without
 * adding a per-page rule — and an inline custom property beats a stylesheet one, which is what
 * makes it authoritative here.
 *
 * minmax(0, …) rather than a bare fr on purpose: a bare fr is minmax(auto, …), and the auto
 * minimum lets a long cell push the authored ratio out of shape. That was the defect behind the
 * 257/149/174/153 columns on the Software Outsourcing table at 768px.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cncmp_eyebrow = (string) get_sub_field( 'cncmp_eyebrow' );
$cncmp_heading = tnb_accent_heading( (string) get_sub_field( 'cncmp_heading' ) );
$cncmp_sub     = (string) get_sub_field( 'cncmp_sub' );
$cncmp_anchor  = sanitize_title( (string) get_sub_field( 'cncmp_anchor' ) );
$cncmp_rows    = (array) get_sub_field( 'cncmp_rows' );

$cncmp_c_factor     = (string) get_sub_field( 'cncmp_col_factor' );
$cncmp_c_buy        = (string) get_sub_field( 'cncmp_col_buy' );
$cncmp_c_buy_note   = (string) get_sub_field( 'cncmp_col_buy_note' );
$cncmp_c_build      = (string) get_sub_field( 'cncmp_col_build' );
$cncmp_c_build_note = (string) get_sub_field( 'cncmp_col_build_note' );

$cncmp_verdict = (string) get_sub_field( 'cncmp_verdict' );

$cncmp_kses = tnb_cn_allowed_html();
$cncmp_svg  = tnb_cn_svg_html();

if ( ! $cncmp_rows ) {
	return;
}
?>
<section class="dt-section cn-cmp-sec"<?php echo '' !== $cncmp_anchor ? ' id="' . esc_attr( $cncmp_anchor ) . '"' : ''; ?>>
	<div class="container">
		<?php if ( '' !== $cncmp_eyebrow || '' !== $cncmp_heading || '' !== $cncmp_sub ) : ?>
			<div class="dt-head dt-center dt-rev">
				<?php if ( '' !== $cncmp_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $cncmp_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $cncmp_heading ) : ?>
					<h2 class="dt-h2"><?php echo $cncmp_heading; // Sanitised by tnb_accent_heading(). ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $cncmp_sub ) : ?>
					<p class="dt-sub"><?php echo wp_kses_post( $cncmp_sub ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="so-cmp2 dt-rev" style="--cmp-cols:minmax(0,0.9fr) minmax(0,1.35fr) minmax(0,1.35fr)">
			<div class="so-cmp2-heads">
				<div class="so-cmp2-head lbl">
					<b><?php echo esc_html( '' !== $cncmp_c_factor ? $cncmp_c_factor : __( 'Comparison', 'technbrains-child' ) ); ?></b>
					<span><?php esc_html_e( 'Factor', 'technbrains-child' ); ?></span>
				</div>
				<div class="so-cmp2-head tone-blue">
					<b><?php echo esc_html( $cncmp_c_buy ); ?></b>
					<?php if ( '' !== $cncmp_c_buy_note ) : ?>
						<span><?php echo esc_html( $cncmp_c_buy_note ); ?></span>
					<?php endif; ?>
				</div>
				<div class="so-cmp2-head tone-red">
					<b><?php echo esc_html( $cncmp_c_build ); ?></b>
					<?php if ( '' !== $cncmp_c_build_note ) : ?>
						<span><?php echo esc_html( $cncmp_c_build_note ); ?></span>
					<?php endif; ?>
				</div>
			</div>

			<div class="so-cmp2-body">
				<?php
				$cncmp_i = 0;

				foreach ( $cncmp_rows as $cncmp_row ) :
					$cncmp_factor = trim( (string) ( $cncmp_row['cncmp_row_factor'] ?? '' ) );
					$cncmp_buy    = trim( (string) ( $cncmp_row['cncmp_row_buy'] ?? '' ) );
					$cncmp_build  = trim( (string) ( $cncmp_row['cncmp_row_build'] ?? '' ) );

					if ( '' === $cncmp_factor && '' === $cncmp_buy && '' === $cncmp_build ) {
						continue;
					}
					?>
					<div class="so-cmp2-row<?php echo $cncmp_i % 2 ? ' alt' : ''; ?>">
						<div class="so-cmp2-cell cap"><?php echo wp_kses( $cncmp_factor, $cncmp_kses ); ?></div>
						<div class="so-cmp2-cell txt"><?php echo wp_kses( $cncmp_buy, $cncmp_kses ); ?></div>
						<div class="so-cmp2-cell txt feat">
							<span class="so-cmp2-tick"><?php echo wp_kses( tnb_cn_icon( 'check' ), $cncmp_svg ); ?></span>
							<span><?php echo wp_kses( $cncmp_build, $cncmp_kses ); ?></span>
						</div>
					</div>
					<?php
					$cncmp_i++;
				endforeach;
				?>
			</div>
		</div>

		<?php if ( '' !== $cncmp_verdict ) : ?>
			<?php
			// wp_kses_post rather than the narrow allowlist: the approved copy carries an inline link
			// out to the Procore alternatives page, and losing it would drop an internal link.
			?>
			<div class="cn-cmp-verdict dt-rev"><?php echo wp_kses_post( $cncmp_verdict ); ?></div>
		<?php endif; ?>
	</div>
</section>
