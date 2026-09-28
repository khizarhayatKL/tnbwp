<?php
/**
 * Inner page form AJAX handlers: Hire Banner, Engagement Banner, SDD Banner.
 * Matches Next.js flow: honeypot → validate → reCAPTCHA → HubSpot → email → lead save → redirect
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

// ── Hire Banner form (hire-developer pages) ───────────────────────────────────
add_action( 'wp_ajax_tnb_hire_banner_form',        'tnb_handle_hire_banner_form' );
add_action( 'wp_ajax_nopriv_tnb_hire_banner_form', 'tnb_handle_hire_banner_form' );

function tnb_handle_hire_banner_form(): void {
	check_ajax_referer( 'tnb_hire_banner_form', 'tnb_hire_banner_nonce' );
	tnb_check_honeypot();

	$name     = sanitize_text_field( wp_unslash( $_POST['firstName']       ?? '' ) );
	$email    = sanitize_email( wp_unslash( $_POST['cemail']               ?? '' ) );
	$phone    = sanitize_text_field( wp_unslash( $_POST['cnumber']         ?? '' ) );
	$timeline = sanitize_text_field( wp_unslash( $_POST['projectTimeline'] ?? '' ) );
	$message  = sanitize_textarea_field( wp_unslash( $_POST['message']     ?? '' ) );

	$phone_digits  = strlen( preg_replace( '/\D/', '', $phone ) );
	$errors = array();
	if ( empty( $name ) )                                                    $errors[] = 'Full name is required.';
	if ( ! is_email( $email ) )                                              $errors[] = 'Valid email address is required.';
	if ( $phone !== '' && $phone_digits > 3 && $phone_digits < 8 )           $errors[] = 'Valid phone number is required.';
	if ( ! empty( $errors ) ) {
		wp_send_json_error( array( 'messages' => $errors ) );
	}

	tnb_require_recaptcha();

	tnb_submit_to_hubspot(
		array(
			'firstname' => $name,
			'email'     => $email,
			'phone'     => $phone,
			'message'   => $message,
		),
		'tnb_hubspot_popup_form_guid'
	);

	$email_message = $timeline ? "Timeline: $timeline\n\n$message" : $message;
	tnb_send_lead_email(
		array( 'name' => $name, 'email' => $email, 'phone' => $phone, 'message' => $email_message ),
		'New Lead (Hire Banner)'
	);

	tnb_save_lead( array(
		'name'    => $name,
		'email'   => $email,
		'phone'   => $phone,
		'message' => $message,
		'form'    => 'Hire Banner',
	) );

	wp_send_json_success( array( 'redirect' => home_url( '/thank-you/' ) ) );
}

// ── Engagement Banner form (engagement model page) ────────────────────────────
add_action( 'wp_ajax_tnb_engagement_banner_form',        'tnb_handle_engagement_banner_form' );
add_action( 'wp_ajax_nopriv_tnb_engagement_banner_form', 'tnb_handle_engagement_banner_form' );

function tnb_handle_engagement_banner_form(): void {
	check_ajax_referer( 'tnb_engagement_banner_form', 'tnb_engagement_banner_nonce' );
	tnb_check_honeypot();

	$name     = sanitize_text_field( wp_unslash( $_POST['firstName']       ?? '' ) );
	$email    = sanitize_email( wp_unslash( $_POST['cemail']               ?? '' ) );
	$phone    = sanitize_text_field( wp_unslash( $_POST['cnumber']         ?? '' ) );
	$timeline = sanitize_text_field( wp_unslash( $_POST['projectTimeline'] ?? '' ) );
	$message  = sanitize_textarea_field( wp_unslash( $_POST['message']     ?? '' ) );

	$phone_digits  = strlen( preg_replace( '/\D/', '', $phone ) );
	$errors = array();
	if ( empty( $name ) )                                                    $errors[] = 'Full name is required.';
	if ( ! is_email( $email ) )                                              $errors[] = 'Valid email address is required.';
	if ( $phone !== '' && $phone_digits > 3 && $phone_digits < 8 )           $errors[] = 'Valid phone number is required.';
	if ( ! empty( $errors ) ) {
		wp_send_json_error( array( 'messages' => $errors ) );
	}

	tnb_require_recaptcha();

	tnb_submit_to_hubspot(
		array(
			'firstname' => $name,
			'email'     => $email,
			'phone'     => $phone,
			'message'   => $message,
		),
		'tnb_hubspot_popup_form_guid'
	);

	$email_message = $timeline ? "Timeline: $timeline\n\n$message" : $message;
	tnb_send_lead_email(
		array( 'name' => $name, 'email' => $email, 'phone' => $phone, 'message' => $email_message ),
		'New Lead (Engagement Banner)'
	);

	tnb_save_lead( array(
		'name'    => $name,
		'email'   => $email,
		'phone'   => $phone,
		'message' => $message,
		'form'    => 'Engagement Banner',
	) );

	wp_send_json_success( array( 'redirect' => home_url( '/thank-you/' ) ) );
}

// ── SDD Banner form (Software Dev Dallas page) ────────────────────────────────
add_action( 'wp_ajax_tnb_sdd_form',        'tnb_handle_sdd_form' );
add_action( 'wp_ajax_nopriv_tnb_sdd_form', 'tnb_handle_sdd_form' );

function tnb_handle_sdd_form(): void {
	check_ajax_referer( 'tnb_sdd_form', 'tnb_sdd_nonce' );
	tnb_check_honeypot();

	$name    = sanitize_text_field( wp_unslash( $_POST['firstName'] ?? '' ) );
	$email   = sanitize_email( wp_unslash( $_POST['cemail']         ?? '' ) );
	$phone   = sanitize_text_field( wp_unslash( $_POST['cnumber']   ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );

	$phone_digits  = strlen( preg_replace( '/\D/', '', $phone ) );
	$errors = array();
	if ( empty( $name ) )                                                    $errors[] = 'Full name is required.';
	if ( ! is_email( $email ) )                                              $errors[] = 'Valid email address is required.';
	if ( $phone !== '' && $phone_digits > 3 && $phone_digits < 8 )           $errors[] = 'Valid phone number is required.';
	if ( ! empty( $errors ) ) {
		wp_send_json_error( array( 'messages' => $errors ) );
	}

	tnb_require_recaptcha();

	tnb_submit_to_hubspot(
		array(
			'firstname' => $name,
			'email'     => $email,
			'phone'     => $phone,
			'message'   => $message,
		),
		'tnb_hubspot_popup_form_guid'
	);

	tnb_send_lead_email(
		array( 'name' => $name, 'email' => $email, 'phone' => $phone, 'message' => $message ),
		'New Lead (SDD Banner)'
	);

	tnb_save_lead( array(
		'name'    => $name,
		'email'   => $email,
		'phone'   => $phone,
		'message' => $message,
		'form'    => 'SDD Banner',
	) );

	wp_send_json_success( array( 'redirect' => home_url( '/thank-you/' ) ) );
}
