<?php
/**
 * Landing Page — Hero.
 *
 * Layout : lp_hero (ACF Flexible Content)
 * Fields : lph_heading, lph_lead, lph_lead_2, lph_points{ lph_point_text },
 *          lph_photo, lph_cta, lph_form_heading, lph_form_sub, lph_form_submit_text,
 *          lph_recog_label, lph_recog_logos{ lph_recog_logo }, lph_anchor
 * CSS    : assets/css/components.css (.lp-hero-*), built on the shared .dt-hero /
 *          .dt-btn shell (see Construction-hero.php) and reusing .hd-form-row /
 *          .hd-form-field / .hd-form-submit / .hd-form-msg for the form card fields.
 * JS     : assets/js/lp-hero-form.js — submit handler for the embedded lead form.
 *
 * Submission: WordPress AJAX → tnb_lp_hero_form → HubSpot + email notification +
 * lead save → redirect /thank-you (see inc/ajax/lp-hero-form.php).
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$lph_heading = (string) get_sub_field( 'lph_heading' );
$lph_lead    = (string) get_sub_field( 'lph_lead' );
$lph_lead_2  = (string) get_sub_field( 'lph_lead_2' );
$lph_points  = (array) get_sub_field( 'lph_points' );
$lph_photo   = get_sub_field( 'lph_photo' );
$lph_anchor  = sanitize_title( (string) get_sub_field( 'lph_anchor' ) );

$lph_form_heading = (string) get_sub_field( 'lph_form_heading' ) ?: 'What are you trying to build or fix?';
$lph_form_sub     = (string) get_sub_field( 'lph_form_sub' );
$lph_submit_text  = (string) get_sub_field( 'lph_form_submit_text' ) ?: 'Discuss the Problem';

$lph_recog_label     = (string) get_sub_field( 'lph_recog_label' ) ?: 'Recognised By';
$lph_recog_logos_raw = (array) get_sub_field( 'lph_recog_logos' );
$lph_recog_logos     = [];
foreach ( $lph_recog_logos_raw as $lph_logo_row ) {
	$lph_logo = $lph_logo_row['lph_recog_logo'] ?? null;
	if ( ! empty( $lph_logo['ID'] ) ) {
		$lph_recog_logos[] = $lph_logo;
	}
}

// Nothing above the fold survives an empty heading, so the section stands down rather than
// rendering an empty banner the page still has to scroll past (matches Construction-hero.php).
if ( '' === $lph_heading ) {
	return;
}

/**
 * Reads one ACF link field down to the parts the markup needs. The URL "#tnb-popup" or
 * "#tnb-form" is the sitewide magic value — same convention as Construction-hero.php /
 * Staff-aug-hero.php — which renders a <button class="tnb-popup-trigger"> instead of a link.
 * An empty URL falls back to an in-page anchor that scrolls to this hero's own form card.
 *
 * @param mixed $link ACF link value.
 * @return array{label:string,url:string,target:string,is_popup:bool}
 */
$lph_link = static function ( $link ): array {
	$url      = is_array( $link ) ? trim( (string) ( $link['url'] ?? '' ) ) : '';
	$is_popup = in_array( $url, array( '#tnb-popup', '#tnb-form' ), true );

	return array(
		'label'    => is_array( $link ) ? trim( (string) ( $link['title'] ?? '' ) ) : '',
		'url'      => $is_popup ? '' : $url,
		'target'   => is_array( $link ) ? (string) ( $link['target'] ?? '' ) : '',
		'is_popup' => $is_popup,
	);
};

$lph_cta = $lph_link( get_sub_field( 'lph_cta' ) );
if ( '' === $lph_cta['url'] && ! $lph_cta['is_popup'] ) {
	$lph_cta['url'] = '#lp-hero-form';
}
if ( '' === $lph_cta['label'] ) {
	$lph_cta['label'] = 'Discuss Your Project';
}
?>
<section class="dt-hero lp-hero<?php echo ! empty( $lph_photo['ID'] ) ? ' lp-hero-photo-bg' : ''; ?>"<?php
	echo '' !== $lph_anchor ? ' id="' . esc_attr( $lph_anchor ) . '"' : '';
?>>
	<div class="dt-hero-bg" aria-hidden="true"></div>

	<?php if ( ! empty( $lph_photo['ID'] ) ) : ?>
		<div class="lp-hero-photo" aria-hidden="true">
			<?php
			echo wp_get_attachment_image(
				(int) $lph_photo['ID'],
				'full',
				false,
				array(
					'alt'           => '',
					'loading'       => 'eager',
					'fetchpriority' => 'high',
					'decoding'      => 'async',
					'class'         => 'lp-hero-photo-img',
				)
			);
			?>
			<span class="lp-hero-photo-scrim"></span>
		</div>
	<?php endif; ?>

	<div class="dt-hero-grid-layout lp-hero-grid">
		<div class="dt-hero-content">
			<h1><?php echo esc_html( $lph_heading ); ?></h1>

			<?php if ( '' !== $lph_lead ) : ?>
				<p class="dt-hero-lead"><?php echo esc_html( $lph_lead ); ?></p>
			<?php endif; ?>

			<?php if ( '' !== $lph_lead_2 ) : ?>
				<p class="dt-hero-lead"><?php echo esc_html( $lph_lead_2 ); ?></p>
			<?php endif; ?>

			<?php if ( $lph_points ) : ?>
				<div class="dt-hero-points lp-hero-points">
					<?php
					foreach ( $lph_points as $lph_point ) :
						$lph_point_text = (string) ( $lph_point['lph_point_text'] ?? '' );

						if ( '' === $lph_point_text ) {
							continue;
						}
						?>
						<div class="dt-hero-point"><span class="ck lp-hero-point-ck" aria-hidden="true">
							<img src="/wp-content/uploads/2026/09/check.svg" >
						</span><?php echo esc_html( $lph_point_text ); ?></div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<?php if ( '' !== $lph_cta['url'] || $lph_cta['is_popup'] ) : ?>
				<div class="dt-hero-actions">
					<?php if ( $lph_cta['is_popup'] ) : ?>
						<button type="button" class="dt-btn dt-btn-primary tnb-popup-trigger"><?php echo esc_html( $lph_cta['label'] ); ?></button>
					<?php else : ?>
						<a class="dt-btn dt-btn-primary" href="<?php echo esc_url( $lph_cta['url'] ); ?>"<?php
							echo '' !== $lph_cta['target'] ? ' target="' . esc_attr( $lph_cta['target'] ) . '" rel="noopener"' : '';
						?>><?php echo esc_html( $lph_cta['label'] ); ?></a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div><!-- .dt-hero-content -->

		<div class="lp-hero-form-card" id="lp-hero-form">
			<div class="lp-hero-form-head">
				<h2><?php echo esc_html( $lph_form_heading ); ?></h2>
				<?php if ( '' !== $lph_form_sub ) : ?>
					<p><?php echo esc_html( $lph_form_sub ); ?></p>
				<?php endif; ?>
			</div>

			<div class="hd-form-success" id="lphf-success" hidden>
				<div class="hd-form-success-icon">
					<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#29D27D" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><polyline points="20 6 9 17 4 12"/></svg>
				</div>
				<h4>Thanks — request received.</h4>
				<p>Our team will review your project and respond within 24 hours.</p>
			</div>

			<form id="tnb-lp-hero-form" class="hd-form-inner" novalidate>
				<?php wp_nonce_field( 'tnb_lp_hero_form', 'tnb_lp_hero_nonce' ); ?>
				<?php tnb_honeypot_field(); ?>

				<div class="lp-field">
					<label for="lphf-name">Full Name <span class="hd-form-req" aria-hidden="true">*</span></label>
					<input type="text" id="lphf-name" name="firstName" placeholder="Jane Smith" autocomplete="name" required>
				</div>

				<div class="lp-field">
					<label for="lphf-email">Email ID <span class="hd-form-req" aria-hidden="true">*</span></label>
					<input type="email" id="lphf-email" name="cemail" placeholder="name@company.com" autocomplete="email" required>
				</div>

				<div class="lp-field">
					<label for="lphf-number">Number</label>
					<input type="tel" id="lphf-number" name="cnumber" placeholder="Phone number" autocomplete="tel">
				</div>

				<div class="lp-field lp-field-textarea">
					<label for="lphf-details">About Your Project</label>
					<textarea id="lphf-details" name="message" rows="2" placeholder="Tell us what you're trying to build or fix&#x2026;"></textarea>
				</div>

				<div class="hd-form-row">
					<?php tnb_recaptcha_field(); ?>
				</div>

				<div id="tnb-lp-hero-form-msg" aria-live="polite"></div>

				<button type="submit" class="hd-form-submit lp-hero-form-submit"><?php echo esc_html( $lph_submit_text ); ?></button>
				<p class="lp-hero-form-trust">
					We only use your details to contact you about your project. We&rsquo;ll respond within 24 hours.
					<a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">Privacy Policy</a>.
				</p>
			</form><!-- #tnb-lp-hero-form -->
		</div><!-- .lp-hero-form-card -->
	</div><!-- .dt-hero-grid-layout -->

	<?php if ( ! empty( $lph_recog_logos ) ) : ?>
		<div class="lp-hero-recog">
			<span class="lp-hero-recog-label"><?php echo esc_html( $lph_recog_label ); ?></span>
			<div class="lp-hero-recog-logos">
				<?php foreach ( $lph_recog_logos as $lph_logo ) : ?>
					<span class="lp-hero-recog-logo">
						<?php echo wp_get_attachment_image( (int) $lph_logo['ID'], 'medium', false, [ 'alt' => '', 'loading' => 'lazy' ] ); ?>
					</span>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>
</section>
