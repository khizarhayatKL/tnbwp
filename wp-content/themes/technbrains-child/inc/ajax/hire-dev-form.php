<?php
/**
 * Hire Developer Form AJAX handler.
 * Action: tnb_hire_dev_form
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_ajax_tnb_hire_dev_form',        'tnb_handle_hire_dev_form' );
add_action( 'wp_ajax_nopriv_tnb_hire_dev_form', 'tnb_handle_hire_dev_form' );

function tnb_handle_hire_dev_form(): void {
	check_ajax_referer( 'tnb_hire_dev_form', 'nonce' );

	tnb_check_honeypot();

	$name    = sanitize_text_field( wp_unslash( $_POST['firstName'] ?? '' ) );
	$email   = sanitize_email( wp_unslash( $_POST['cemail']         ?? '' ) );
	$phone   = sanitize_text_field( wp_unslash( $_POST['cnumber']   ?? '' ) );
	$role    = sanitize_text_field( wp_unslash( $_POST['role']      ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );
	$country = sanitize_text_field( wp_unslash( $_POST['country']   ?? '' ) );
	$captcha = sanitize_text_field( wp_unslash( $_POST['g-recaptcha-response'] ?? '' ) );

	$errors = [];
	if ( empty( $name ) )       $errors[] = 'Full name is required.';
	if ( ! is_email( $email ) ) $errors[] = 'Valid work email is required.';
	if ( empty( $role ) )       $errors[] = 'Please select a developer role.';
	if ( $phone !== '' && strlen( preg_replace( '/\D/', '', $phone ) ) < 7 ) {
		$errors[] = 'Phone number must be at least 7 digits.';
	}

	if ( ! empty( $errors ) ) {
		wp_send_json_error( [ 'messages' => $errors ] );
	}

	tnb_require_recaptcha();

	tnb_submit_to_hubspot(
		[
			'firstname' => $name,
			'email'     => $email,
			'phone'     => $phone,
			'message'   => $message,
			'country'   => $country,
		],
		'tnb_hubspot_popup_form_guid'
	);

	tnb_send_lead_email(
		[
			'name'    => $name,
			'email'   => $email,
			'phone'   => $phone,
			'message' => $message,
			'service' => $role,
		],
		'New Lead (Hire Dev Form)'
	);

	tnb_save_lead( [
		'name'    => $name,
		'email'   => $email,
		'phone'   => $phone,
		'message' => $message,
		'form'    => 'Hire Dev Form',
	] );

	wp_send_json_success( [ 'redirect' => home_url( '/thank-you/' ) ] );
}
