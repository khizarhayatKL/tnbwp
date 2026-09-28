<?php
/**
 * Centralized Google reCAPTCHA v2 — render + verify
 * One place to manage reCAPTCHA for the entire theme.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/**
 * Output the reCAPTCHA v2 widget.
 * Call inside any <form> before the submit button.
 * Returns empty string (and logs admin notice) when site key not configured.
 */
function tnb_recaptcha_field( string $theme = 'light' ): void {
	$site_key = get_option( 'tnb_recaptcha_site_key', '' );

	if ( empty( $site_key ) ) {
		// Show visible warning only in admin debug mode; silently skip on front-end
		if ( defined( 'WP_DEBUG' ) && WP_DEBUG && current_user_can( 'manage_options' ) ) {
			echo '<p style="color:#c00;font-size:12px;">⚠ reCAPTCHA site key not configured. Go to Settings → TechnBrains.</p>';
		}
		// Emit a hidden error field so JS blocks submission when key is missing
		echo '<input type="hidden" name="g-recaptcha-response" value="" data-recaptcha-missing="1">';
		return;
	}

	echo '<div class="g-recaptcha tnb-recaptcha-field" data-sitekey="' . esc_attr( $site_key ) . '" data-theme="' . esc_attr( $theme ) . '"></div>';
}

/**
 * Server-side reCAPTCHA v2 verification.
 * Returns true = human, false = bot/missing/error.
 * Sends JSON error and exits if verification fails (for use in AJAX handlers).
 */
function tnb_require_recaptcha(): void {
	$secret   = get_option( 'tnb_recaptcha_secret_key', '' );
	$site_key = get_option( 'tnb_recaptcha_site_key', '' );
	$token    = sanitize_text_field( wp_unslash( $_POST['g-recaptcha-response'] ?? '' ) );

	// If keys not configured, block submission — misconfiguration is not a bypass
	if ( empty( $site_key ) || empty( $secret ) ) {
		wp_send_json_error( array(
			'messages' => array( 'reCAPTCHA is not configured. Please contact the site administrator.' ),
		) );
	}

	if ( empty( $token ) ) {
		wp_send_json_error( array(
			'messages' => array( 'Please complete the reCAPTCHA verification.' ),
		) );
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
		wp_send_json_error( array( 'messages' => array( 'reCAPTCHA verification failed. Please try again.' ) ) );
	}

	$body = json_decode( wp_remote_retrieve_body( $response ), true );

	if ( empty( $body['success'] ) ) {
		wp_send_json_error( array( 'messages' => array( 'reCAPTCHA verification failed. Please try again.' ) ) );
	}
}
