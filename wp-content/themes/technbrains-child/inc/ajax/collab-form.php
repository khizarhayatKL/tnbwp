<?php
/**
 * "Let's build what's next, together" section — AJAX handler.
 * Matches existing form handlers: validate → reCAPTCHA → HubSpot → email → redirect.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_ajax_tnb_collab_form',        'tnb_handle_collab_form' );
add_action( 'wp_ajax_nopriv_tnb_collab_form', 'tnb_handle_collab_form' );

function tnb_handle_collab_form(): void {
	if ( ! wp_verify_nonce(
		sanitize_text_field( wp_unslash( $_POST['tnb_collab_nonce'] ?? '' ) ),
		'tnb_collab_form'
	) ) {
		wp_send_json_error( array( 'messages' => array( 'Security check failed.' ) ) );
	}

	tnb_check_honeypot();

	$name        = sanitize_text_field( wp_unslash( $_POST['firstName']   ?? '' ) );
	$email       = sanitize_email( wp_unslash( $_POST['cemail']           ?? '' ) );
	$phone       = sanitize_text_field( wp_unslash( $_POST['cnumber']     ?? '' ) );
	$service     = sanitize_text_field( wp_unslash( $_POST['serviceType'] ?? '' ) );
	$message     = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );

	$errors = array();
	if ( empty( $name ) )             $errors[] = 'Full name is required.';
	if ( ! is_email( $email ) )       $errors[] = 'Valid email address is required.';
	if ( $phone !== '' && strlen( $phone ) < 10 )  $errors[] = 'Phone number must be at least 10 digits.';

	if ( ! empty( $errors ) ) {
		wp_send_json_error( array( 'messages' => $errors ) );
	}

	// reCAPTCHA v2
	tnb_require_recaptcha();

	// HubSpot
	tnb_submit_to_hubspot(
		array(
			'firstname' => $name,
			'email'     => $email,
			'phone'     => $phone,
			'message'   => $service . ( $message ? ' — ' . $message : '' ),
		),
		'tnb_hubspot_popup_form_guid'
	);

	// Email notification
	tnb_send_lead_email(
		array( 'name' => $name, 'email' => $email, 'phone' => $phone, 'service' => $service, 'message' => $message ),
		'New Lead (Collab Section)'
	);

	tnb_save_lead( array(
		'name'    => $name,
		'email'   => $email,
		'phone'   => $phone,
		'service' => $service,
		'message' => $message,
		'form'    => 'Collab Section',
	) );

	wp_send_json_success( array( 'redirect' => home_url( '/thank-you/' ) ) );
}
