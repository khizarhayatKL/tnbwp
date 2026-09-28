<?php
/**
 * Case Study — Inside the Build (dark CTA with the PDF request form).
 *
 * The email input keeps id="thread-end": assets/js/case-study.js terminates the narrative
 * thread at its left edge, so removing or renaming it breaks the thread on every case study.
 *
 * The reference prototype left the form inert (onsubmit="return false"). Here it posts to
 * tnb_case_study_form in inc/ajax/case-study-form.php, which runs the same pipeline as the
 * theme's other forms: honeypot -> validate -> reCAPTCHA -> HubSpot -> mail -> tnb_lead.
 * The nonce, honeypot and post-id fields plus the status paragraph are what that requires;
 * none of them render anything until a submission fails.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cs_h2       = (string) get_field( 'cs_cta_h2' );
$cs_sub      = (string) get_field( 'cs_cta_sub' );
$cs_formlbl  = (string) get_field( 'cs_cta_form_label' );
$cs_btn      = (string) get_field( 'cs_cta_btn' );
$cs_alt_text = (string) get_field( 'cs_cta_alt_text' );
$cs_alt_link = get_field( 'cs_cta_alt_link' );
$cs_allowed  = tnb_cs_allowed_html();
?>
<section class="cs-cta" id="build" data-screen-label="Inside the Build">
	<div class="cs-wrap">
		<span class="cs-node cs-node--left lit" data-thread-node="cta" style="top:auto;"></span>
		<div class="cs-cta-inner cs-reveal">
			<?php if ( '' !== $cs_h2 ) : ?>
				<h2 class="cs-h2"><?php echo wp_kses( $cs_h2, $cs_allowed ); ?></h2>
			<?php endif; ?>
			<?php if ( '' !== $cs_sub ) : ?>
				<p class="cs-cta-sub"><?php echo wp_kses( $cs_sub, $cs_allowed ); ?></p>
			<?php endif; ?>
			<?php if ( '' !== $cs_formlbl ) : ?>
				<div class="cs-cta-formlabel"><?php echo esc_html( $cs_formlbl ); ?></div>
			<?php endif; ?>
			<form class="cs-cta-form" id="tnb-case-study-form" novalidate>
				<?php
				wp_nonce_field( 'tnb_case_study_form', 'tnb_case_study_nonce' );
				tnb_honeypot_field();
				?>
				<input type="hidden" name="caseStudyId" value="<?php echo esc_attr( (string) get_the_ID() ); ?>"/>
				<input class="cs-cta-input" style="display:none" id="thread-end" name="cemail" type="email" placeholder="you@company.com" aria-label="Email address"/>
				<button class="cs-btn cs-btn-primary" style="display:none" type="submit"><?php echo esc_html( '' !== $cs_btn ? $cs_btn : 'Get PDF' ); ?></button>
			</form>
			<p class="inner-form-msg cs-cta-msg" id="tnb-case-study-form-msg" role="status" aria-live="polite"></p>
			<?php if ( '' !== $cs_alt_text || $cs_alt_link ) : ?>
				<div class="cs-cta-alt">
					<?php if ( '' !== $cs_alt_text ) : ?>
						<span><?php echo esc_html( $cs_alt_text ); ?></span>
					<?php endif; ?>
					<?php if ( is_array( $cs_alt_link ) && ! empty( $cs_alt_link['url'] ) ) : ?>
						<a class="cs-btn cs-btn-secondary cs-cta-alt-btn" href="<?php echo esc_url( $cs_alt_link['url'] ); ?>"<?php
							echo ! empty( $cs_alt_link['target'] ) ? ' target="' . esc_attr( $cs_alt_link['target'] ) . '" rel="noopener"' : '';
						?>><?php echo esc_html( $cs_alt_link['title'] ?? '' ); ?></a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
