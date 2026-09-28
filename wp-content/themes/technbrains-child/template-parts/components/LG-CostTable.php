<?php
/**
 * Logistics — Cost Drivers comparison table (2-column: driver / what it adds).
 *
 * Layout : lg_cost_table (ACF Flexible Content)
 * Fields : lgct_eyebrow, lgct_heading, lgct_sub, lgct_col1_label, lgct_col1_sub,
 *          lgct_col2_label, lgct_col2_sub, lgct_rows{ lgct_row_cap, lgct_row_txt },
 *          lgct_note
 * CSS    : assets/css/logistics.css (.lg-cost2-*)
 * JS     : none.
 *
 * Renamed from the mockup's raw ".dt-cmp2" class to ".lg-cost2" — scoped to this
 * component's family rather than a bare generic name, matching the theme's
 * per-family class-prefix convention (see the Construction "cn-" family).
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$lgct_eyebrow    = (string) get_sub_field( 'lgct_eyebrow' );
$lgct_heading    = (string) get_sub_field( 'lgct_heading' );
$lgct_sub        = (string) get_sub_field( 'lgct_sub' );
$lgct_col1_label = (string) get_sub_field( 'lgct_col1_label' );
$lgct_col1_sub   = (string) get_sub_field( 'lgct_col1_sub' );
$lgct_col2_label = (string) get_sub_field( 'lgct_col2_label' );
$lgct_col2_sub   = (string) get_sub_field( 'lgct_col2_sub' );
$lgct_note       = (string) get_sub_field( 'lgct_note' );

$lgct_rows = [];
if ( have_rows( 'lgct_rows' ) ) {
	while ( have_rows( 'lgct_rows' ) ) {
		the_row();
		$lgct_cap = trim( (string) get_sub_field( 'lgct_row_cap' ) );
		$lgct_txt = trim( (string) get_sub_field( 'lgct_row_txt' ) );
		if ( '' === $lgct_cap && '' === $lgct_txt ) {
			continue;
		}
		$lgct_rows[] = [ 'cap' => $lgct_cap, 'txt' => $lgct_txt ];
	}
}

if ( empty( $lgct_rows ) ) {
	return;
}
?>
<section class="dt-section lg-cost-section">
	<div class="container">

		<?php if ( '' !== $lgct_eyebrow || '' !== $lgct_heading || '' !== $lgct_sub ) : ?>
			<div class="dt-head dt-center dt-rev">
				<?php if ( '' !== $lgct_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $lgct_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $lgct_heading ) : ?>
					<h2 class="dt-h2"><?php echo esc_html( $lgct_heading ); ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $lgct_sub ) : ?>
					<p class="dt-sub"><?php echo esc_html( $lgct_sub ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="lg-cost2 dt-rev">
			<div class="lg-cost2-heads">
				<div class="lg-cost2-head lbl">
					<?php if ( '' !== $lgct_col1_label ) : ?><b><?php echo esc_html( $lgct_col1_label ); ?></b><?php endif; ?>
					<?php if ( '' !== $lgct_col1_sub ) : ?><span><?php echo esc_html( $lgct_col1_sub ); ?></span><?php endif; ?>
				</div>
				<div class="lg-cost2-head tone-blue">
					<?php if ( '' !== $lgct_col2_label ) : ?><b><?php echo esc_html( $lgct_col2_label ); ?></b><?php endif; ?>
					<?php if ( '' !== $lgct_col2_sub ) : ?><span><?php echo esc_html( $lgct_col2_sub ); ?></span><?php endif; ?>
				</div>
			</div>
			<div class="lg-cost2-body">
				<?php foreach ( $lgct_rows as $lgct_i => $lgct_row ) : ?>
					<div class="lg-cost2-row<?php echo ( $lgct_i % 2 === 1 ) ? ' alt' : ''; ?>">
						<div class="lg-cost2-cell cap"><?php echo esc_html( $lgct_row['cap'] ); ?></div>
						<div class="lg-cost2-cell txt"><?php echo esc_html( $lgct_row['txt'] ); ?></div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<?php if ( '' !== $lgct_note ) : ?>
			<p class="lg-pipe-note dt-rev" style="margin-top:32px"><?php echo wp_kses( $lgct_note, tnb_lg_allowed_html() ); ?></p>
		<?php endif; ?>

	</div>
</section>
