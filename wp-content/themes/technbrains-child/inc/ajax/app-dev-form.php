<?php
/**
 * App Dev Form AJAX handler.
 * Matches Next.js flow: validate → reCAPTCHA → HubSpot → Swift Sales → email → redirect
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_ajax_tnb_app_dev_form',        'tnb_handle_app_dev_form' );
add_action( 'wp_ajax_nopriv_tnb_app_dev_form', 'tnb_handle_app_dev_form' );

function tnb_handle_app_dev_form(): void {
	check_ajax_referer( 'tnb_app_dev_form', 'nonce' );

	tnb_check_honeypot();

	$name    = sanitize_text_field( wp_unslash( $_POST['firstName'] ?? '' ) );
	$email   = sanitize_email( wp_unslash( $_POST['cemail']         ?? '' ) );
	$phone   = sanitize_text_field( wp_unslash( $_POST['cnumber']   ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );
	$country = sanitize_text_field( wp_unslash( $_POST['country']   ?? '' ) );
	$captcha = sanitize_text_field( wp_unslash( $_POST['g-recaptcha-response'] ?? '' ) );

	$errors = array();
	if ( empty( $name ) )        $errors[] = 'Full name is required.';
	if ( ! is_email( $email ) )  $errors[] = 'Valid email is required.';
	if ( $phone !== '' && strlen( preg_replace( '/\D/', '', $phone ) ) < 7 ) $errors[] = 'Phone number must be at least 7 digits.';

	if ( ! empty( $errors ) ) {
		wp_send_json_error( array( 'messages' => $errors ) );
	}

	// reCAPTCHA v2 — mandatory
	tnb_require_recaptcha();

	// HubSpot
	tnb_submit_to_hubspot(
		array(
			'firstname' => $name,
			'email'     => $email,
			'phone'     => $phone,
			'message'   => $message,
			'country'   => $country,
		),
		'tnb_hubspot_popup_form_guid'
	);

	// Email notification
	tnb_send_lead_email(
		array( 'name' => $name, 'email' => $email, 'phone' => $phone, 'message' => $message, 'service' => $country ),
		'New Lead (App Dev Form)'
	);

	tnb_save_lead( array(
		'name'    => $name,
		'email'   => $email,
		'phone'   => $phone,
		'message' => $message,
		'form'    => 'App Dev Form',
	) );

	wp_send_json_success( array( 'redirect' => home_url( '/thank-you/' ) ) );
}
