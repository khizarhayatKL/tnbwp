<?php
/**
 * Case Study PDF request form — AJAX handler.
 *
 * The case study CTA asks for one field, an email address, in exchange for the full PDF.
 * The reference prototype left it inert (onsubmit="return false"); this runs the same
 * pipeline as every other form on the site: honeypot -> validate -> reCAPTCHA -> HubSpot
 * -> admin email -> tnb_lead. Helpers are reused from inc/leads.php,
 * inc/setup/recaptcha.php and inc/ajax/popup-form.php rather than reimplemented.
 *
 * Unlike the other handlers there is no name or phone field, so tnb_parse_lead_post() does
 * not fit — it requires both. The validation below is the email-only subset.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_ajax_tnb_case_study_form', 'tnb_handle_case_study_form' );
add_action( 'wp_ajax_nopriv_tnb_case_study_form', 'tnb_handle_case_study_form' );

function tnb_handle_case_study_form(): void {
	check_ajax_referer( 'tnb_case_study_form', 'tnb_case_study_nonce' );
	tnb_check_honeypot();

	$email = sanitize_email( wp_unslash( $_POST['cemail'] ?? '' ) );

	// Which case study the request came from, so a lead is attributable to a story rather
	// than to "a case study page". Sent as the post ID and resolved server-side — the
	// title is not taken from the client.
	$post_id = isset( $_POST['caseStudyId'] ) ? absint( $_POST['caseStudyId'] ) : 0;
	$study   = ( $post_id && 'case_study' === get_post_type( $post_id ) )
		? get_the_title( $post_id )
		: '';

	if ( ! is_email( $email ) ) {
		wp_send_json_error( array( 'messages' => array( 'Valid email address is required.' ) ) );
	}

	tnb_require_recaptcha();

	tnb_submit_to_hubspot(
		array( 'email' => $email ),
		'tnb_hubspot_popup_form_guid'
	);

	$label = $study ? 'Case Study PDF — ' . $study : 'Case Study PDF';

	// The shared mailer reads name/phone/service keys; this form has none, so they are
	// passed empty rather than left undefined.
	tnb_send_lead_email(
		array(
			'name'    => $email,
			'email'   => $email,
			'phone'   => '',
			'service' => $study,
			'message' => 'Requested the full case study PDF.',
		),
		'New Lead (' . $label . ')'
	);

	tnb_save_lead(
		array(
			'name'    => '',
			'email'   => $email,
			'phone'   => '',
			'service' => $study,
			'message' => 'Requested the full case study PDF.',
			'form'    => $label,
		)
	);

	// The PDF rides to the thank-you page as ?tnb_dl=, where tnb_cb_thankyou_download() in
	// inc/tnb-content-blocks/tnb-content-blocks.php starts the download — the same gate the
	// lead-magnet block uses, so there is one download path on the site rather than two. That
	// hook re-validates the URL (same host, inside /wp-content/uploads/) before enqueueing
	// anything, and the URL is read from the post here rather than from the request, so a
	// client cannot name the file it gets.
	$redirect = home_url( '/thank-you/' );
	$pdf      = $post_id ? (string) get_field( 'cs_cta_pdf', $post_id ) : '';

	if ( '' !== $pdf ) {
		$redirect = add_query_arg( 'tnb_dl', rawurlencode( $pdf ), $redirect );
	}

	wp_send_json_success( array( 'redirect' => $redirect ) );
}
