<?php
/**
 * Footer contact form AJAX handler.
 * Matches Next.js flow: validate → reCAPTCHA → HubSpot → Swift Sales → email → redirect
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_ajax_tnb_footer_form',        'tnb_handle_footer_form' );
add_action( 'wp_ajax_nopriv_tnb_footer_form', 'tnb_handle_footer_form' );

function tnb_handle_footer_form(): void {
	// Accept both field names (footer-main.php sends tnb_footer_nonce via wp_nonce_field; JS appends 'nonce')
	if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['tnb_footer_nonce'] ?? $_POST['nonce'] ?? '' ) ), 'tnb_footer_form' ) ) {
		wp_send_json_error( array( 'messages' => array( 'Security check failed.' ) ) );
	}

	tnb_check_honeypot();

	$first   = sanitize_text_field( wp_unslash( $_POST['firstName'] ?? '' ) );
	$last    = sanitize_text_field( wp_unslash( $_POST['lastName']  ?? '' ) );
	$email   = sanitize_email( wp_unslash( $_POST['cemail']         ?? '' ) );
	$phone   = sanitize_text_field( wp_unslash( $_POST['cnumber']   ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );
	$captcha = sanitize_text_field( wp_unslash( $_POST['g-recaptcha-response'] ?? '' ) );

	$errors = array();
	if ( empty( $first ) )               $errors[] = 'First name is required.';
	if ( empty( $last ) )                $errors[] = 'Last name is required.';
	if ( ! is_email( $email ) )          $errors[] = 'Valid email address is required.';
	if ( $phone !== '' && strlen( $phone ) < 10 )    $errors[] = 'Phone number must be at least 10 digits.';

	if ( ! empty( $errors ) ) {
		wp_send_json_error( array( 'messages' => $errors ) );
	}

	// reCAPTCHA v2 — mandatory
	tnb_require_recaptcha();

	$name = trim( $first . ' ' . $last );

	// HubSpot
	tnb_submit_to_hubspot(
		array(
			'firstname' => $first,
			'lastname'  => $last,
			'email'     => $email,
			'phone'     => $phone,
			'message'   => $message,
		),
		'tnb_hubspot_popup_form_guid'
	);

	// Email notification
	tnb_send_lead_email(
		array( 'name' => $name, 'email' => $email, 'phone' => $phone, 'message' => $message ),
		'New Lead (Footer Form)'
	);

	tnb_save_lead( array(
		'name'    => $name,
		'email'   => $email,
		'phone'   => $phone,
		'message' => $message,
		'form'    => 'Footer Form',
	) );

	wp_send_json_success( array( 'redirect' => home_url( '/thank-you/' ) ) );
}
