<?php
/**
 * Case Study — The Challenge.
 *
 * Carries the first .cs-node, which assets/js/case-study.js uses as the thread's first anchor.
 * The node must stay a direct child of .cs-wrap inside #narrative.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cs_eyebrow    = (string) get_field( 'cs_prob_eyebrow' );
$cs_h2         = (string) get_field( 'cs_prob_h2' );
$cs_body       = (string) get_field( 'cs_prob_body' );
$cs_panel      = (string) get_field( 'cs_prob_panel_label' );
$cs_challenges = (array) get_field( 'cs_challenges' );
$cs_close      = (string) get_field( 'cs_prob_close' );
$cs_allowed    = tnb_cs_allowed_html();
?>
<section class="cs-section cs-prob2" data-screen-label="Problem">
	<div class="cs-wrap">
		<span class="cs-node cs-node--left" data-thread-node="problem"><span class="cs-node-label">Problem</span></span>
		<div class="cs-prob4-head cs-reveal">
			<?php if ( '' !== $cs_eyebrow ) : ?>
				<span class="cs-eyebrow"><?php echo esc_html( $cs_eyebrow ); ?></span>
			<?php endif; ?>
			<?php if ( '' !== $cs_h2 ) : ?>
				<h2 class="cs-h2" style="font-size:32px;font-weight:500"><?php echo wp_kses( $cs_h2, $cs_allowed ); ?></h2>
			<?php endif; ?>
		</div>
		<div class="cs-prob4-grid">
			<div class="cs-prob4-narrative cs-reveal">
				<?php
				// A paragraph per block here, unlike the About and Technology bodies.
				echo tnb_cs_paragraphs( $cs_body, 'p', ' class="cs-lede-lg"' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped inside the helper.
				?>
			</div>
			<div class="cs-prob4-panel cs-reveal d1">
				<?php if ( '' !== $cs_panel ) : ?>
					<span class="cs-prob4-label"><?php echo esc_html( $cs_panel ); ?></span>
				<?php endif; ?>
				<?php if ( $cs_challenges ) : ?>
					<ul class="cs-prob4-list">
						<?php foreach ( $cs_challenges as $cs_i => $cs_row ) : ?>
							<li><span class="cs-prob4-n"><?php echo esc_html( tnb_cs_index( (int) $cs_i ) ); ?></span><p><?php echo wp_kses( (string) ( $cs_row['cs_challenge'] ?? '' ), $cs_allowed ); ?></p></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				<?php if ( '' !== $cs_close ) : ?>
					<p class="cs-prob4-close"><?php echo wp_kses( $cs_close, $cs_allowed ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
