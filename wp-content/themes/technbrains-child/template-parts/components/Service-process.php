<?php
/**
 * Component: Service — Process
 * Layout   : sv_process (ACF Flexible Content)
 *
 * Two-column layout: sticky left header + scrollable numbered steps with
 * a scroll-driven red progress line filling as steps come into view.
 *
 * Fields:
 *   svp_eyebrow — text     (optional eyebrow label)
 *   svp_heading — text     (section heading; br/span allowed)
 *   svp_sub     — textarea (description paragraph in left panel)
 *   svp_steps   — repeater
 *     svp_step_title — text
 *     svp_step_desc  — textarea
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/* ── 1. Fetch ACF data ──────────────────────────────────────────────────── */
$eyebrow = get_sub_field( 'svp_eyebrow' ) ?: '';
$heading = get_sub_field( 'svp_heading' ) ?: '';
$sub     = get_sub_field( 'svp_sub' )     ?: '';

$steps_raw = get_sub_field( 'svp_steps' );
$steps     = [];
if ( is_array( $steps_raw ) ) {
	foreach ( $steps_raw as $row ) {
		$title = trim( $row['svp_step_title'] ?? '' );
		if ( ! $title ) {
			continue;
		}
		$steps[] = [
			'title' => sanitize_text_field( $title ),
			'desc'  => (string) ( $row['svp_step_desc'] ?? '' ),
		];
	}
}
?>
<section class="sv-process">
	<div class="container sv-process-wrap">
		<div class="sv-process-layout">

			<div class="sv-process-head">

				<?php if ( $eyebrow ) : ?>
				<div class="sv-process-eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
				<?php endif; ?>

				<?php if ( $heading ) : ?>
				<h2 class="sv-process-h2">
					<?php
					echo wp_kses( $heading, [
						'br'   => [],
						'span' => [ 'class' => [] ],
					] );
					?>
				</h2>
				<?php endif; ?>

				<?php if ( $sub ) : ?>
				<p class="sv-process-sub"><?php echo esc_html( $sub ); ?></p>
				<?php endif; ?>

			</div><!-- .sv-process-head -->

			<?php if ( ! empty( $steps ) ) : ?>
			<ol class="sv-steps" data-sv-process-steps>
				<span class="sv-steps-progress" aria-hidden="true"></span>
				<?php foreach ( $steps as $i => $step ) : ?>
				<li class="sv-step">
					<div class="sv-step-num"><?php echo esc_html( str_pad( $i + 1, 2, '0', STR_PAD_LEFT ) ); ?></div>
					<div class="sv-step-body">
						<h3><?php echo esc_html( $step['title'] ); ?></h3>
						<?php if ( $step['desc'] ) : ?>
						<?php echo wp_kses_post( $step['desc'] ); ?>
						<?php endif; ?>
						
					</div>
				</li>
				<?php endforeach; ?>
			</ol><!-- .sv-steps -->
			<?php endif; ?>

		</div><!-- .sv-process-layout -->
	</div><!-- .container -->
</section><!-- .sv-process -->
