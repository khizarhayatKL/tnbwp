<?php
/**
 * Logistics — numbered stat cards ("What Logistics Leaders Are Prioritizing").
 *
 * Layout : lg_priorities (ACF Flexible Content)
 * Fields : lgpr_eyebrow, lgpr_heading, lgpr_sub,
 *          lgpr_stats{ lgpr_stat_eyebrow, lgpr_stat_value, lgpr_stat_micro, lgpr_stat_reason }
 * CSS    : assets/css/logistics.css (.lg-pri-*)
 * JS     : none.
 *
 * Values are authored strings, not numbers ("$2.336", "~10%", "< half"), so this is
 * a plain static grid — not the count-up lp_stats widget. The "01/02…" index is
 * derived from the repeater position, matching Consult-steps.php's convention.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$lgpr_eyebrow = (string) get_sub_field( 'lgpr_eyebrow' );
$lgpr_heading = (string) get_sub_field( 'lgpr_heading' );
$lgpr_sub     = (string) get_sub_field( 'lgpr_sub' );

$lgpr_stats = [];
if ( have_rows( 'lgpr_stats' ) ) {
	while ( have_rows( 'lgpr_stats' ) ) {
		the_row();
		$lgpr_value = trim( (string) get_sub_field( 'lgpr_stat_value' ) );
		if ( '' === $lgpr_value ) {
			continue;
		}
		$lgpr_stats[] = [
			'eyebrow' => trim( (string) get_sub_field( 'lgpr_stat_eyebrow' ) ),
			'value'   => $lgpr_value,
			'micro'   => trim( (string) get_sub_field( 'lgpr_stat_micro' ) ),
			'reason'  => trim( (string) get_sub_field( 'lgpr_stat_reason' ) ),
		];
	}
}

if ( empty( $lgpr_stats ) ) {
	return;
}
?>
<section class="dt-section lg-priorities-section">
	<div class="container">

		<?php if ( '' !== $lgpr_eyebrow || '' !== $lgpr_heading || '' !== $lgpr_sub ) : ?>
			<div class="dt-head dt-center dt-rev">
				<?php if ( '' !== $lgpr_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $lgpr_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $lgpr_heading ) : ?>
					<h2 class="dt-h2"><?php echo esc_html( $lgpr_heading ); ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $lgpr_sub ) : ?>
					<p class="dt-sub"><?php echo esc_html( $lgpr_sub ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="lg-pri-grid">
			<?php foreach ( $lgpr_stats as $lgpr_i => $lgpr_stat ) :
				$lgpr_num = str_pad( (string) ( $lgpr_i + 1 ), 2, '0', STR_PAD_LEFT );
				?>
				<div class="lg-pri-card dt-rev" style="transition-delay:<?php echo esc_attr( (string) ( ( $lgpr_i % 3 ) * 70 ) ); ?>ms">
					<span class="lg-pri-idx"><?php echo esc_html( $lgpr_num ); ?></span>
					<div class="lg-pri-head">
						<?php if ( '' !== $lgpr_stat['eyebrow'] ) : ?>
							<div class="lg-pri-ey"><?php echo esc_html( $lgpr_stat['eyebrow'] ); ?></div>
						<?php endif; ?>
						<div class="lg-pri-v"><?php echo esc_html( $lgpr_stat['value'] ); ?></div>
					</div>
					<?php if ( '' !== $lgpr_stat['micro'] ) : ?>
						<p class="lg-pri-m"><?php echo wp_kses( $lgpr_stat['micro'], tnb_lg_allowed_html() ); ?></p>
					<?php endif; ?>
					<?php if ( '' !== $lgpr_stat['reason'] ) : ?>
						<p class="lg-pri-r"><?php echo esc_html( $lgpr_stat['reason'] ); ?></p>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</section>
