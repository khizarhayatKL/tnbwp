<?php
/**
 * Popup + Exit-popup form AJAX handlers.
 * Integrations: reCAPTCHA v2 · Swift Sales · HubSpot · Email notification
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

// ── Register AJAX actions ─────────────────────────────────────────────────────
add_action( 'wp_ajax_tnb_popup_form',        'tnb_handle_popup_form' );
add_action( 'wp_ajax_nopriv_tnb_popup_form', 'tnb_handle_popup_form' );

add_action( 'wp_ajax_tnb_exit_popup_form',        'tnb_handle_exit_popup_form' );
add_action( 'wp_ajax_nopriv_tnb_exit_popup_form', 'tnb_handle_exit_popup_form' );

// ── Shared: verify reCAPTCHA v2 ───────────────────────────────────────────────
function tnb_verify_recaptcha( string $token ): bool {
	$secret = get_option( 'tnb_recaptcha_secret_key', '' );
	if ( empty( $secret ) || empty( $token ) ) {
		return false;
	}

	$response = wp_remote_post(
		'https://www.google.com/recaptcha/api/siteverify',
		array(
			'timeout' => 10,
			'body'    => array(
				'secret'   => $secret,
				'response' => $token,
				'remoteip' => sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ?? '' ) ),
			),
		)
	);

	if ( is_wp_error( $response ) ) {
		return false;
	}

	$body = json_decode( wp_remote_retrieve_body( $response ), true );
	return ! empty( $body['success'] );
}

// ── Shared: submit to HubSpot Forms API ──────────────────────────────────────
function tnb_submit_to_hubspot( array $fields, string $form_guid_option ): void {
	$portal_id = get_option( 'tnb_hubspot_portal_id', '' );
	$form_guid = get_option( $form_guid_option, '' );

	if ( empty( $portal_id ) || empty( $form_guid ) ) {
		return; // Not configured — skip silently
	}

	$hs_fields = array();
	foreach ( $fields as $name => $value ) {
		$hs_fields[] = array(
			'objectTypeId' => '0-1',
			'name'         => $name,
			'value'        => $value,
		);
	}

	$payload = array(
		'fields'  => $hs_fields,
		'context' => array(
			'pageUri'  => sanitize_text_field( wp_unslash( $_SERVER['HTTP_REFERER'] ?? '' ) ),
			'pageName' => get_bloginfo( 'name' ),
		),
	);

	wp_remote_post(
		"https://api.hsforms.com/submissions/v3/integration/submit/{$portal_id}/{$form_guid}",
		array(
			'timeout' => 10,
			'headers' => array( 'Content-Type' => 'application/json' ),
			'body'    => wp_json_encode( $payload ),
		)
	);
}

// ── Shared: send admin email notification ────────────────────────────────────
function tnb_send_lead_email( array $data, string $subject_prefix ): void {
	$to      = get_option( 'admin_email' );
	$subject = $subject_prefix . ': ' . $data['name'];
	$body    = "Name: {$data['name']}\n"
		. "Email: {$data['email']}\n"
		. "Phone: {$data['phone']}\n"
		. "Service: " . ( $data['service'] ?? '' ) . "\n\n"
		. "Message:\n" . ( $data['message'] ?? '' ) . "\n\n"
		. "Page: " . sanitize_text_field( wp_unslash( $_SERVER['HTTP_REFERER'] ?? '' ) );

	wp_mail( $to, $subject, $body, array( 'Content-Type: text/plain; charset=UTF-8' ) );
}

// ── Shared: validate + sanitize incoming POST ─────────────────────────────────
function tnb_parse_lead_post(): array|false {
	tnb_check_honeypot();

	$name    = sanitize_text_field( wp_unslash( $_POST['firstName']   ?? '' ) );
	$email   = sanitize_email( wp_unslash( $_POST['cemail']           ?? '' ) );
	$phone   = sanitize_text_field( wp_unslash( $_POST['cnumber']     ?? '' ) );
	$service = sanitize_text_field( wp_unslash( $_POST['serviceType'] ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );
	$captcha = sanitize_text_field( wp_unslash( $_POST['g-recaptcha-response'] ?? '' ) );

	$errors = array();
	if ( empty( $name ) )        $errors[] = 'Full name is required.';
	if ( ! is_email( $email ) )  $errors[] = 'Valid email address is required.';
	//if ( strlen( $phone ) < 10 ) $errors[] = 'Phone number must be at least 10 digits.';
  	if ( $phone !== '' && strlen( $phone ) < 7 ) $errors[] = 'Enter a valid phone number.';


	if ( ! empty( $errors ) ) {
		wp_send_json_error( array( 'messages' => $errors ) );
		return false;
	}

	// reCAPTCHA v2 — mandatory (tnb_require_recaptcha exits with JSON error if fails)
	tnb_require_recaptcha();

	return compact( 'name', 'email', 'phone', 'service', 'message' );
}

// ── Handler: Popup CTA ("Start Your Project") ─────────────────────────────────
function tnb_handle_popup_form(): void {
	check_ajax_referer( 'tnb_popup_form', 'tnb_popup_nonce' );

	$data = tnb_parse_lead_post();
	if ( false === $data ) {
		return;
	}

	// HubSpot
	tnb_submit_to_hubspot(
		array(
			'firstname' => $data['name'],
			'email'     => $data['email'],
			'phone'     => $data['phone'],
			'message'   => $data['service'] . ( $data['message'] ? ' — ' . $data['message'] : '' ),
		),
		'tnb_hubspot_popup_form_guid'
	);

	// Email notification
	tnb_send_lead_email( $data, 'New Lead (Popup)' );

	tnb_save_lead( array(
		'name'    => $data['name'],
		'email'   => $data['email'],
		'phone'   => $data['phone'],
		'service' => $data['service'],
		'message' => $data['message'],
		'form'    => 'Popup CTA',
	) );

	wp_send_json_success( array( 'redirect' => home_url( '/thank-you' ) ) );
}

// ── Handler: Exit Popup ───────────────────────────────────────────────────────
function tnb_handle_exit_popup_form(): void {
	check_ajax_referer( 'tnb_exit_popup_form', 'tnb_exit_popup_nonce' );

	$data = tnb_parse_lead_post();
	if ( false === $data ) {
		return;
	}

	// HubSpot
	tnb_submit_to_hubspot(
		array(
			'firstname' => $data['name'],
			'email'     => $data['email'],
			'phone'     => $data['phone'],
			'message'   => $data['message'],
		),
		'tnb_hubspot_exit_form_guid'
	);

	// Email notification
	tnb_send_lead_email( $data, 'New Lead (Exit Popup)' );

	tnb_save_lead( array(
		'name'    => $data['name'],
		'email'   => $data['email'],
		'phone'   => $data['phone'],
		'service' => $data['service'],
		'message' => $data['message'],
		'form'    => 'Exit Popup',
	) );

	wp_send_json_success( array( 'redirect' => home_url( '/thank-you/' ) ) );
}
