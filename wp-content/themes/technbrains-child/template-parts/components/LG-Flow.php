<?php
/**
 * Logistics — Management Platform pipeline (Plan → Execute → Track → Document →
 * Bill → Report).
 *
 * Layout : lg_flow (ACF Flexible Content)
 * Fields : lgfl_eyebrow, lgfl_heading, lgfl_sub, lgfl_stages{ lgfl_stage_label,
 *          lgfl_stage_desc }, lgfl_note
 * CSS    : assets/css/logistics.css (.lg-flow-*)
 * JS     : assets/js/logistics.js — click-to-select stage + pulse reposition
 *          ([data-lg-flow] block; no-ops when the markup is absent).
 *
 * Stage icons are uploaded per-row (lgfl_stage_icon) — no default, a stage with
 * no upload shows only its number badge (.lg-flow-num).
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$lgfl_eyebrow = (string) get_sub_field( 'lgfl_eyebrow' );
$lgfl_heading = (string) get_sub_field( 'lgfl_heading' );
$lgfl_sub     = (string) get_sub_field( 'lgfl_sub' );
$lgfl_note    = (string) get_sub_field( 'lgfl_note' );

$lgfl_stages = [];
if ( have_rows( 'lgfl_stages' ) ) {
	while ( have_rows( 'lgfl_stages' ) ) {
		the_row();
		$lgfl_label = trim( (string) get_sub_field( 'lgfl_stage_label' ) );
		if ( '' === $lgfl_label ) {
			continue;
		}
		$lgfl_icon     = get_sub_field( 'lgfl_stage_icon' );
		$lgfl_stages[] = [
			'label'    => $lgfl_label,
			'desc'     => trim( (string) get_sub_field( 'lgfl_stage_desc' ) ),
			'icon_url' => is_array( $lgfl_icon ) && ! empty( $lgfl_icon['url'] ) ? (string) $lgfl_icon['url'] : '',
			'icon_alt' => is_array( $lgfl_icon ) ? (string) ( $lgfl_icon['alt'] ?? '' ) : '',
		];
	}
}

if ( empty( $lgfl_stages ) ) {
	return;
}

$lgfl_total      = count( $lgfl_stages );
$lgfl_pulse_left = ( 0.5 / $lgfl_total ) * 100;
?>
<section class="dt-section lg-flow-section">
	<div class="container">

		<?php if ( '' !== $lgfl_eyebrow || '' !== $lgfl_heading || '' !== $lgfl_sub ) : ?>
			<div class="dt-head dt-center dt-rev">
				<?php if ( '' !== $lgfl_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $lgfl_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $lgfl_heading ) : ?>
					<h2 class="dt-h2"><?php echo esc_html( $lgfl_heading ); ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $lgfl_sub ) : ?>
					<p class="dt-sub"><?php echo esc_html( $lgfl_sub ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="lg-flow dt-rev" data-lg-flow>
			<span class="lg-flow-track" aria-hidden="true"></span>
			<span class="lg-flow-pulse" aria-hidden="true" style="left:<?php echo esc_attr( (string) round( $lgfl_pulse_left, 3 ) ); ?>%"></span>
			<?php foreach ( $lgfl_stages as $lgfl_i => $lgfl_stage ) :
				$lgfl_is_on = 0 === $lgfl_i;
				?>
				<button
					type="button"
					role="tab"
					aria-selected="<?php echo $lgfl_is_on ? 'true' : 'false'; ?>"
					class="lg-flow-stage<?php echo $lgfl_is_on ? ' on' : ''; ?>"
					data-lg-flow-stage
				>
					<span class="lg-flow-node">
						<span class="lg-flow-num"><?php echo esc_html( (string) ( $lgfl_i + 1 ) ); ?></span>
						<?php if ( '' !== $lgfl_stage['icon_url'] ) : ?>
							<img src="<?php echo esc_url( $lgfl_stage['icon_url'] ); ?>" alt="<?php echo esc_attr( $lgfl_stage['icon_alt'] ); ?>" width="22" height="22" loading="lazy" decoding="async">
						<?php endif; ?>
					</span>
					<span class="lg-flow-card">
						<b><?php echo esc_html( $lgfl_stage['label'] ); ?></b>
						<?php if ( '' !== $lgfl_stage['desc'] ) : ?>
							<p><?php echo esc_html( $lgfl_stage['desc'] ); ?></p>
						<?php endif; ?>
					</span>
				</button>
			<?php endforeach; ?>
		</div>

		<?php if ( '' !== $lgfl_note ) : ?>
			<p class="lg-pipe-note dt-rev"><?php echo wp_kses( $lgfl_note, tnb_lg_allowed_html() ); ?></p>
		<?php endif; ?>

	</div>
</section>
