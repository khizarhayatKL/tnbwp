<?php
/**
 * Component: Hire Developer — Contact Form (HDForm)
 * Layout   : hd_form (ACF Flexible Content)
 *
 * Fields:
 *   hdf_eyebrow          — text
 *   hdf_heading          — text     (plain part before accent)
 *   hdf_heading_accent   — text     (accent span, rendered white)
 *   hdf_sub              — textarea
 *   hdf_trust_items      — repeater
 *     hdf_trust_item     — text
 *   hdf_cta_text         — text     (CTA button label)
 *   hdf_cta_url          — url      (CTA button href, e.g. tel:+1…)
 *   hdf_watermark_image  — image    (decorative background watermark, optional)
 *   hdf_role_options     — repeater
 *     hdf_role_option    — text     (select option value/label)
 *   hdf_submit_text      — text     (form submit button label)
 *   hdf_micro_text       — text     (fine-print below submit button)
 *   hdf_success_title    — text     (heading shown in success state)
 *   hdf_success_sub      — textarea (paragraph shown in success state)
 *
 * Submission:
 *   WordPress AJAX → tnb_hire_dev_form
 *   → HubSpot + SwiftSales SDK + email notification + lead save → redirect /thank-you
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/* ── 1. Fetch ACF data ─────────────────────────────────────────── */
$eyebrow        = get_sub_field( 'hdf_eyebrow' )        ?: '';
$heading        = get_sub_field( 'hdf_heading' )        ?: '';
$heading_accent = get_sub_field( 'hdf_heading_accent' ) ?: '';
$sub            = get_sub_field( 'hdf_sub' )            ?: '';
$cta_text       = get_sub_field( 'hdf_cta_text' )       ?: '';
$cta_url        = get_sub_field( 'hdf_cta_url' )        ?: '';
$submit_text    = get_sub_field( 'hdf_submit_text' )    ?: 'Get Matched';
$micro_text     = get_sub_field( 'hdf_micro_text' )     ?: '';
$success_title  = get_sub_field( 'hdf_success_title' )  ?: 'Thanks \xe2\x80\x94 request received.';
$success_sub    = get_sub_field( 'hdf_success_sub' )    ?: 'Our team will review your requirements and respond within 24 hours.';
$watermark      = get_sub_field( 'hdf_watermark_image' );

/* Trust items */
$trust_items     = [];
$trust_items_raw = get_sub_field( 'hdf_trust_items' );
if ( is_array( $trust_items_raw ) ) {
	foreach ( $trust_items_raw as $item ) {
		$text = $item['hdf_trust_item'] ?? '';
		if ( $text ) {
			$trust_items[] = $text;
		}
	}
}

/* Role options */
$role_options     = [];
$role_options_raw = get_sub_field( 'hdf_role_options' );
if ( is_array( $role_options_raw ) ) {
	foreach ( $role_options_raw as $item ) {
		$opt = $item['hdf_role_option'] ?? '';
		if ( $opt ) {
			$role_options[] = $opt;
		}
	}
}
?>
<section class="hd-form" id="hd-form">

	<?php if ( ! empty( $watermark ) ) : ?>
	<img
		src="<?php echo esc_url( $watermark['url'] ); ?>"
		alt=""
		class="hd-form-watermark"
		aria-hidden="true"
		loading="lazy">
	<?php endif; ?>

	<div class="hd-form-shell">

		<!-- ─── Left: heading, trust items, CTA ──────────────── -->
		<div class="hd-form-left">

			<?php if ( $eyebrow ) : ?>
			<div class="hd-eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
			<?php endif; ?>

			<?php if ( $heading || $heading_accent ) : ?>
			<h2>
				<?php echo esc_html( $heading ); ?>
				<?php if ( $heading_accent ) : ?>
				<span style="color:#fff"><?php echo esc_html( $heading_accent ); ?></span>
				<?php endif; ?>
			</h2>
			<?php endif; ?>

			<?php if ( $sub ) : ?>
			<p><?php echo esc_html( $sub ); ?></p>
			<?php endif; ?>

			<?php if ( ! empty( $trust_items ) ) : ?>
			<div class="hd-form-trust">
				<?php foreach ( $trust_items as $item ) : ?>
				<div class="hd-form-trust-item">
					<svg width="18" height="18" viewBox="0 0 24 24" fill="none"
						stroke="#29D27D" stroke-width="2.5"
						stroke-linecap="round" stroke-linejoin="round"
						aria-hidden="true" focusable="false">
						<polyline points="20 6 9 17 4 12"/>
					</svg>
					<?php echo esc_html( $item ); ?>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>

			<?php if ( $cta_text ) : ?>
				<?php if ( $cta_url ) : ?>
				<a href="<?php echo esc_url( $cta_url ); ?>" class="hd-btn hd-btn-secondary">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none"
						stroke="currentColor" stroke-width="2"
						stroke-linecap="round" stroke-linejoin="round"
						aria-hidden="true" focusable="false">
						<rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
						<line x1="16" y1="2" x2="16" y2="6"/>
						<line x1="8" y1="2" x2="8" y2="6"/>
						<line x1="3" y1="10" x2="21" y2="10"/>
					</svg>
					<?php echo esc_html( $cta_text ); ?>
				</a>
				<?php else : ?>
				<button type="button" class="hd-btn hd-btn-secondary" onclick="var t=document.getElementById('tnb-calendar-trigger');if(t)t.click();">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none"
						stroke="currentColor" stroke-width="2"
						stroke-linecap="round" stroke-linejoin="round"
						aria-hidden="true" focusable="false">
						<rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
						<line x1="16" y1="2" x2="16" y2="6"/>
						<line x1="8" y1="2" x2="8" y2="6"/>
						<line x1="3" y1="10" x2="21" y2="10"/>
					</svg>
					<?php echo esc_html( $cta_text ); ?>
				</button>
				<?php endif; ?>
			<?php endif; ?>

		</div><!-- .hd-form-left -->

		<!-- ─── Right: form card ─────────────────────────────── -->
		<div class="hd-form-card">

			<!-- Success state (shown on redirect failure or in-place success) -->
			<div class="hd-form-success" id="hdf-success" hidden>
				<div class="hd-form-success-icon">
					<svg width="28" height="28" viewBox="0 0 24 24" fill="none"
						stroke="#29D27D" stroke-width="2.5"
						stroke-linecap="round" stroke-linejoin="round"
						aria-hidden="true" focusable="false">
						<polyline points="20 6 9 17 4 12"/>
					</svg>
				</div>
				<h4><?php echo esc_html( $success_title ); ?></h4>
				<p><?php echo esc_html( $success_sub ); ?></p>
			</div>

			<!-- Form -->
			<form id="tnb-hire-dev-form" class="hd-form-inner" novalidate>
				<?php wp_nonce_field( 'tnb_hire_dev_form', 'tnb_hire_dev_nonce' ); ?>
				<?php tnb_honeypot_field(); ?>

				<!-- Row 1: Name + Email (2-col) -->
				<div class="hd-form-row two">
					<div class="hd-form-field">
						<label for="hdf-name">
							Full Name <span class="hd-form-req" aria-hidden="true">*</span>
						</label>
						<input
							type="text"
							id="hdf-name"
							name="firstName"
							placeholder="Jane Smith"
							autocomplete="name"
							required>
					</div>
					<div class="hd-form-field">
						<label for="hdf-email">
							Work Email <span class="hd-form-req" aria-hidden="true">*</span>
						</label>
						<input
							type="email"
							id="hdf-email"
							name="cemail"
							placeholder="name@company.com"
							autocomplete="email"
							required>
					</div>
				</div>

				<!-- Row 2: Phone (intl-tel-input) -->
				<div class="hd-form-row">
					<div class="hd-form-field">
						<label for="hdf-phone">Phone Number</label>
						<div class="hd-form-phone">
							<input
								type="tel"
								id="hdf-phone"
								name="cnumber"
								placeholder="300 1234567"
								autocomplete="off">
						</div>
					</div>
				</div>

				<!-- Row 3: Developer Role -->
				<div class="hd-form-row">
					<div class="hd-form-field">
						<label for="hdf-role">
							Developer Role / Stack Needed <span class="hd-form-req" aria-hidden="true">*</span>
						</label>
						<select id="hdf-role" name="role" required>
							<option value="">Select role or technology</option>
							<?php foreach ( $role_options as $opt ) : ?>
							<option value="<?php echo esc_attr( $opt ); ?>"><?php echo esc_html( $opt ); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>

				<!-- Row 4: Project Details -->
				<div class="hd-form-row">
					<div class="hd-form-field">
						<label for="hdf-details">Project Details</label>
						<textarea
							id="hdf-details"
							name="message"
							rows="4"
							placeholder="Tell us what you&#x2019;re building, your current stack, timeline, or team gaps&#x2026;"></textarea>
					</div>
				</div>

				<!-- reCAPTCHA -->
				<div class="hd-form-row">
					<?php tnb_recaptcha_field(); ?>
				</div>

				<div id="tnb-hire-dev-form-msg" aria-live="polite"></div>

				<button type="submit" class="hd-form-submit">
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none"
						stroke="currentColor" stroke-width="2"
						stroke-linecap="round" stroke-linejoin="round"
						aria-hidden="true" focusable="false">
						<line x1="22" y1="2" x2="11" y2="13"/>
						<polygon points="22 2 15 22 11 13 2 9 22 2"/>
					</svg>
					<?php echo esc_html( $submit_text ); ?>
				</button>

				<?php if ( $micro_text ) : ?>
				<div class="hd-form-micro"><?php echo esc_html( $micro_text ); ?></div>
				<?php endif; ?>

			</form><!-- #tnb-hire-dev-form -->

		</div><!-- .hd-form-card -->

	</div><!-- .hd-form-shell -->
</section><!-- .hd-form -->
