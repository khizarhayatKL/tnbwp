<?php
/**
 * Staff Augmentation — How we integrate (scroll-driven process rail).
 *
 * Layout : sa_process (ACF Flexible Content)
 * Fields : sap_eyebrow, sap_heading, sap_sub,
 *          sap_steps{ sap_step_title, sap_step_body }
 * CSS    : assets/css/components.css (.sa-process2, .sa-steps2, .sa-step2*)
 * JS     : assets/js/components.js ([data-sap-steps])
 *
 * Step numbers are generated, not authored: reordering the repeater renumbers the
 * list instead of leaving 03 above 02.
 *
 * The rail is an <ol> because the steps are a sequence. The fill element is inside
 * it as a decorative span, which the JS drives through --sa-rail-p; with no JS the
 * rail simply sits at 0 and every step still reads.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$sap_eyebrow = (string) get_sub_field( 'sap_eyebrow' );
$sap_heading = (string) get_sub_field( 'sap_heading' );
$sap_sub     = (string) get_sub_field( 'sap_sub' );
$sap_steps   = (array) get_sub_field( 'sap_steps' );

if ( ! $sap_steps ) {
	return;
}

$sap_kses = array(
	'br'   => array(),
	'span' => array( 'class' => true ),
);
?>
<section class="section sa-process2">
	<div class="container">
		<div class="sa-process2-layout">
			<div class="sa-process2-head">
				<?php if ( '' !== $sap_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $sap_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $sap_heading ) : ?>
					<h2><?php echo wp_kses( $sap_heading, $sap_kses ); ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $sap_sub ) : ?>
					<?php // .sa-section-sub, so the paragraph reads at the same size as every other section's subtext and steps down with them at 768px. ?>
					<p class="sa-section-sub"><?php echo wp_kses( $sap_sub, $sap_kses ); ?></p>
				<?php endif; ?>
			</div>

			<ol class="sa-steps2" data-sap-steps>
				<span class="sa-steps2-rail" aria-hidden="true">
					<span class="sa-steps2-fill"></span>
					<span class="sa-steps2-runner"></span>
				</span>
				<?php foreach ( $sap_steps as $sap_i => $sap_step ) : ?>
					<li class="sa-step2">
						<div class="sa-step2-num" aria-hidden="true"><?php
							echo esc_html( str_pad( (string) ( (int) $sap_i + 1 ), 2, '0', STR_PAD_LEFT ) );
						?></div>
						<div class="sa-step2-body">
							<h3><?php echo esc_html( (string) ( $sap_step['sap_step_title'] ?? '' ) ); ?></h3>
							<p><?php echo esc_html( (string) ( $sap_step['sap_step_body'] ?? '' ) ); ?></p>
						</div>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</div>
</section>
