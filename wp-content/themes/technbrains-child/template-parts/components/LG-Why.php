<?php
/**
 * Logistics — Why TechnBrains stats strip.
 *
 * Layout : lg_why (ACF Flexible Content)
 * Fields : lgwy_eyebrow, lgwy_heading, lgwy_sub, lgwy_stats{ lgwy_stat_value, lgwy_stat_label }
 * CSS    : assets/css/logistics.css (.lg-why-*)
 * JS     : none — values are plain text (mixed numeric/text like "5-day"), no count-up.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$lgwy_eyebrow = (string) get_sub_field( 'lgwy_eyebrow' );
$lgwy_heading = (string) get_sub_field( 'lgwy_heading' );
$lgwy_sub     = (string) get_sub_field( 'lgwy_sub' );

$lgwy_stats = [];
if ( have_rows( 'lgwy_stats' ) ) {
	while ( have_rows( 'lgwy_stats' ) ) {
		the_row();
		$lgwy_value = trim( (string) get_sub_field( 'lgwy_stat_value' ) );
		$lgwy_label = trim( (string) get_sub_field( 'lgwy_stat_label' ) );
		if ( '' === $lgwy_value && '' === $lgwy_label ) {
			continue;
		}
		$lgwy_stats[] = [ 'value' => $lgwy_value, 'label' => $lgwy_label ];
	}
}

if ( '' === $lgwy_heading && empty( $lgwy_stats ) ) {
	return;
}
?>
<section class="dt-section lg-why-section">
	<div class="container">

		<?php if ( '' !== $lgwy_eyebrow || '' !== $lgwy_heading || '' !== $lgwy_sub ) : ?>
			<div class="dt-head dt-center dt-rev">
				<?php if ( '' !== $lgwy_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $lgwy_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $lgwy_heading ) : ?>
					<h2 class="dt-h2"><?php echo esc_html( $lgwy_heading ); ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $lgwy_sub ) : ?>
					<p class="dt-sub"><?php echo esc_html( $lgwy_sub ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $lgwy_stats ) ) : ?>
			<div class="lg-why-grid dt-rev">
				<?php foreach ( $lgwy_stats as $lgwy_stat ) : ?>
					<div class="lg-why-stat">
						<?php if ( '' !== $lgwy_stat['value'] ) : ?>
							<div class="lg-why-v"><?php echo esc_html( $lgwy_stat['value'] ); ?></div>
						<?php endif; ?>
						<?php if ( '' !== $lgwy_stat['label'] ) : ?>
							<div class="lg-why-l"><?php echo esc_html( $lgwy_stat['label'] ); ?></div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

	</div>
</section>
