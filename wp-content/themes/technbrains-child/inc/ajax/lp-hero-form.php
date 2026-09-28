<?php
/**
 * Landing Page — Hero Form AJAX handler.
 * Action: tnb_lp_hero_form
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_ajax_tnb_lp_hero_form',        'tnb_handle_lp_hero_form' );
add_action( 'wp_ajax_nopriv_tnb_lp_hero_form', 'tnb_handle_lp_hero_form' );

function tnb_handle_lp_hero_form(): void {
	check_ajax_referer( 'tnb_lp_hero_form', 'nonce' );

	tnb_check_honeypot();

	$name    = sanitize_text_field( wp_unslash( $_POST['firstName'] ?? '' ) );
	$email   = sanitize_email( wp_unslash( $_POST['cemail']         ?? '' ) );
	$phone   = sanitize_text_field( wp_unslash( $_POST['cnumber']   ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );
	$captcha = sanitize_text_field( wp_unslash( $_POST['g-recaptcha-response'] ?? '' ) );

	$errors = [];
	if ( empty( $name ) )       $errors[] = 'Full name is required.';
	if ( ! is_email( $email ) ) $errors[] = 'Valid email is required.';
	if ( $phone !== '' && strlen( preg_replace( '/\D/', '', $phone ) ) < 7 ) {
		$errors[] = 'Phone number must be at least 7 digits.';
	}

	if ( ! empty( $errors ) ) {
		wp_send_json_error( [ 'messages' => $errors ] );
	}

	tnb_require_recaptcha();

	// tnb_send_lead_email() writes a fixed name/email/phone/service/message template with no
	// "company" line, so the company name rides along inside the message body instead of being
	// silently dropped from the notification (it is still saved verbatim via tnb_save_lead()'s
	// _lead_raw_data + the HubSpot "company" property below).
	$message_with_company =  $message;

	tnb_submit_to_hubspot(
		[
			'firstname' => $name,
			'email'     => $email,
			'phone'     => $phone,
			'message'   => $message,
		],
		'tnb_hubspot_popup_form_guid'
	);

	tnb_send_lead_email(
		[
			'name'    => $name,
			'email'   => $email,
			'phone'   => $phone,
			'service' => $company,
			'message' => $message_with_company,
		],
		'New Lead (LP Hero Form)'
	);

	tnb_save_lead( [
		'name'    => $name,
		'email'   => $email,
		'phone'   => $phone,
		'message' => $message,
		'form'    => 'LP Hero Form',
	] );

	wp_send_json_success( [ 'redirect' => home_url( '/thank-you/' ) ] );
}
