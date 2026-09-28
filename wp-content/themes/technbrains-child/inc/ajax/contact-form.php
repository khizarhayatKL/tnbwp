<?php
/**
 * Contact Us Form AJAX handler.
 * Matches Next.js flow: honeypot → validate → reCAPTCHA → HubSpot → email → lead save → redirect
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_ajax_tnb_contact_form',        'tnb_handle_contact_form' );
add_action( 'wp_ajax_nopriv_tnb_contact_form', 'tnb_handle_contact_form' );

function tnb_handle_contact_form(): void {
	check_ajax_referer( 'tnb_contact_form', 'nonce' );
	tnb_check_honeypot();

	$first_name = sanitize_text_field( wp_unslash( $_POST['firstName'] ?? '' ) );
	$last_name  = sanitize_text_field( wp_unslash( $_POST['lastName']  ?? '' ) );
	$email      = sanitize_email( wp_unslash( $_POST['cemail']         ?? '' ) );
	$phone      = sanitize_text_field( wp_unslash( $_POST['cnumber']   ?? '' ) );
	$message    = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );
	$country    = sanitize_text_field( wp_unslash( $_POST['country']   ?? '' ) );

	$errors = array();
	if ( empty( $first_name ) )  $errors[] = 'First name is required.';
	if ( empty( $last_name ) )   $errors[] = 'Last name is required.';
	if ( ! is_email( $email ) )  $errors[] = 'Valid email is required.';
	if ( $phone !== '' && strlen( preg_replace( '/\D/', '', $phone ) ) < 7 ) $errors[] = 'Phone number must be at least 7 digits.';

	if ( ! empty( $errors ) ) {
		wp_send_json_error( array( 'messages' => $errors ) );
	}

	tnb_require_recaptcha();

	tnb_submit_to_hubspot(
		array(
			'firstname' => $first_name,
			'lastname'  => $last_name,
			'email'     => $email,
			'phone'     => $phone,
			'message'   => $message,
			'country'   => $country,
		),
		'tnb_hubspot_popup_form_guid'
	);

	tnb_send_lead_email(
		array( 'name' => $first_name . ' ' . $last_name, 'email' => $email, 'phone' => $phone, 'message' => $message ),
		'New Lead (Contact Form)'
	);

	tnb_save_lead( array(
		'name'    => $first_name . ' ' . $last_name,
		'email'   => $email,
		'phone'   => $phone,
		'message' => $message,
		'form'    => 'Contact Form',
	) );

	wp_send_json_success( array( 'redirect' => home_url( '/thank-you/' ) ) );
}
