<?php
/**
 * REST API hardening.
 *
 * Nothing on this site's front end consumes the REST API. The child theme registers no routes
 * (no register_rest_route anywhere), every form posts to admin-ajax.php — see the tnbAjax
 * localize in functions.php plus inc/tnb-app-estimator.php and inc/tnb-content-blocks/ — and the
 * block editor is disabled. The plugins here that do speak REST (Redirection, Yoast, ACF) only
 * call it from wp-admin, where the user is authenticated. The single legitimate anonymous
 * consumer is oEmbed, which is what lets another site embed a TNB post, so it stays allowlisted.
 *
 * This is PHP rather than an Apache rule because blocking the /wp-json/ path does not work: the
 * same routes answer on the query-string form. /?rest_route=/wp/v2/users returned 200 on live.
 * Only a filter inside WP_REST_Server covers both spellings.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/**
 * Route prefixes that stay readable without authentication.
 *
 * Kept as a function so widening it is a deliberate edit rather than a loosened condition.
 *
 * @return array<int, string>
 */
function tnb_rest_public_namespaces(): array {
	return array( 'oembed/1.0' );
}

/**
 * Refuses REST requests from logged-out users outside the allowlist.
 *
 * rest_pre_dispatch rather than rest_authentication_errors: both fire before any route handler,
 * but only this one receives the WP_REST_Request, so the route comes from $request->get_route()
 * instead of re-parsing $_GET['rest_route'] and $wp->query_vars the way core does internally.
 *
 * @param mixed           $result  Existing short-circuit response, if any.
 * @param WP_REST_Server  $server  Server instance (unused).
 * @param WP_REST_Request $request Current request.
 * @return mixed
 */
add_filter( 'rest_pre_dispatch', 'tnb_rest_gate', 10, 3 );
function tnb_rest_gate( $result, $server, $request ) {
	// Something upstream already refused this request — keep its error rather than masking it.
	if ( is_wp_error( $result ) ) {
		return $result;
	}

	if ( is_user_logged_in() ) {
		return $result;
	}

	$route = ltrim( (string) $request->get_route(), '/' );

	// Checked before the allowlist: user enumeration must stay closed even if
	// tnb_rest_public_namespaces() is widened later.
	if ( 0 === strpos( $route, 'wp/v2/users' ) ) {
		return tnb_rest_denied();
	}

	foreach ( tnb_rest_public_namespaces() as $namespace ) {
		if ( 0 === strpos( $route, $namespace ) ) {
			return $result;
		}
	}

	return tnb_rest_denied();
}

/**
 * The refusal. rest_authorization_required_code() gives 401 when logged out, 403 when logged in.
 *
 * @return WP_Error
 */
function tnb_rest_denied(): WP_Error {
	return new WP_Error(
		'rest_forbidden',
		__( 'REST API access is restricted on this site.', 'technbrains-child' ),
		array( 'status' => rest_authorization_required_code() )
	);
}

// Stop advertising the API in <head> and in the Link: header. Hardening only — the gate above is
// the actual control; this just removes the signpost.
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'template_redirect', 'rest_output_link_header', 11 );
