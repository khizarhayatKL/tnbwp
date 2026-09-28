<?php
/**
 * TnB App Development Cost Estimator — standalone shortcode.
 *
 * A self-contained interactive component rendered via [tnb_app_cost_estimator].
 * It is completely independent of the [tnb_blocks] content-blocks / ACF system:
 * its own prefix (tnb_aest_*), own constants, own asset handles, own AJAX action.
 *
 * The ONLY thing it shares with the rest of the theme is the generic lead/mail
 * pipeline used by every TnB form — tnb_check_honeypot(), tnb_send_lead_email()
 * and tnb_save_lead() — so a submitted estimate becomes a real lead (admin email
 * + tnb_lead CPT) exactly like the contact / popup / lead-magnet forms.
 *
 * Loaded by a single require_once line in functions.php. Nothing else is touched.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

if ( defined( 'TNB_AEST_DIR' ) ) {
	// Already loaded.
	return;
}

define( 'TNB_AEST_VERSION', '1.0.0' );
define( 'TNB_AEST_DIR', trailingslashit( __DIR__ ) );
define( 'TNB_AEST_THEME_DIR', trailingslashit( get_stylesheet_directory() ) );
define( 'TNB_AEST_THEME_URI', trailingslashit( get_stylesheet_directory_uri() ) );

/* =========================================================================
 * Assets — registered on their own hook; never touch tnb_enqueue_assets().
 * ====================================================================== */

/**
 * Register the estimator's style + script. Cache-busted with filemtime(),
 * matching the theme's convention for local assets.
 */
function tnb_aest_register_assets() {
	$css_path = TNB_AEST_THEME_DIR . 'assets/css/tnb-app-estimator.css';
	$js_path  = TNB_AEST_THEME_DIR . 'assets/js/tnb-app-estimator.js';

	// Outfit font — the component is designed in Outfit; load it where it renders.
	wp_register_style(
		'tnb-aest-outfit',
		'https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap',
		array(),
		null
	);

	// The QA-approved styles live in the external file, unchanged. It is made to
	// DEPEND on the theme's components/responsive stylesheets so WordPress prints
	// it AFTER them — winning cascade-order ties exactly as the original inline
	// <style> did, without editing any rule. (Registered at priority 20 below so
	// those theme handles already exist as dependencies.)
	wp_register_style(
		'tnb-app-estimator',
		TNB_AEST_THEME_URI . 'assets/css/tnb-app-estimator.css',
		array( 'tnb-aest-outfit', 'tnb-components', 'tnb-responsive' ),
		file_exists( $css_path ) ? filemtime( $css_path ) : TNB_AEST_VERSION
	);

	wp_register_script(
		'tnb-app-estimator',
		TNB_AEST_THEME_URI . 'assets/js/tnb-app-estimator.js',
		array(),
		file_exists( $js_path ) ? filemtime( $js_path ) : TNB_AEST_VERSION,
		true
	);

	wp_localize_script(
		'tnb-app-estimator',
		'tnbAEST',
		array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'tnb_aest_lead' ),
			'action'  => 'tnb_app_estimate_submit',
		)
	);
}
add_action( 'wp_enqueue_scripts', 'tnb_aest_register_assets', 20 );

/**
 * Decide whether to load the estimator assets on this request.
 *
 * Auto-detects the shortcode in singular content. Override with the filter:
 *   add_filter( 'tnb_aest_load_assets', '__return_true' );   // always load
 *   add_filter( 'tnb_aest_load_assets', '__return_false' );  // never load
 *
 * @return bool
 */
function tnb_aest_should_enqueue() {
	$pre = apply_filters( 'tnb_aest_load_assets', null );
	if ( is_bool( $pre ) ) {
		return $pre;
	}

	if ( ! is_singular() ) {
		return false;
	}

	$post = get_post();
	if ( ! $post instanceof WP_Post ) {
		return false;
	}

	return has_shortcode( $post->post_content, 'tnb_app_cost_estimator' );
}

/**
 * Conditionally enqueue the registered assets.
 */
function tnb_aest_maybe_enqueue_assets() {
	if ( tnb_aest_should_enqueue() ) {
		tnb_aest_enqueue_assets();
	}
}
add_action( 'wp_enqueue_scripts', 'tnb_aest_maybe_enqueue_assets', 30 );

/**
 * Enqueue the registered handles. Safe to call repeatedly; also used as a late
 * safety-net from the shortcode renderer.
 */
function tnb_aest_enqueue_assets() {
	wp_enqueue_style( 'tnb-aest-outfit' );
	wp_enqueue_style( 'tnb-app-estimator' );
	wp_enqueue_script( 'tnb-app-estimator' );
}

/* =========================================================================
 * Shortcode
 * ====================================================================== */

/**
 * [tnb_app_cost_estimator] shortcode.
 *
 * Renders the interactive estimator. The "Get a project estimate" CTA opens the
 * theme's shared "Start Your Project" popup (#tnb-popup-overlay) via the
 * .tnb-popup-trigger class, and the script prefills that popup's Project details
 * field with the on-page estimate. Single instance per page: the markup uses
 * fixed element IDs (tbEst, tbRange, …) driven via getElementById.
 *
 * @return string Rendered HTML (buffered; never echoed directly).
 */
function tnb_aest_shortcode() {
	// Safety-net: guarantee assets are present even if this shortcode was injected
	// outside normal post content (e.g. via a filter) and auto-detect missed it.
	if ( function_exists( 'tnb_aest_enqueue_assets' ) ) {
		tnb_aest_enqueue_assets();
	}

	ob_start();
	?>
	<div class="tb-est" id="tbEst">
		<div class="tb-est__grid">
			<!-- INPUTS -->
			<div class="tb-in">
				<p class="tb-eyebrow"><?php esc_html_e( 'Interactive estimate', 'technbrains-child' ); ?></p>
				<h2 class="tb-title"><?php esc_html_e( 'App Development Cost Estimator', 'technbrains-child' ); ?></h2>
				<p class="tb-sub"><?php esc_html_e( 'Answer three questions for an instant cost range, built from 2026 industry data. It is an estimate, not a quote.', 'technbrains-child' ); ?></p>

				<div class="tb-step">
					<p class="tb-step__q"><span class="tb-step__n">1</span> <?php esc_html_e( 'What are you building?', 'technbrains-child' ); ?></p>
					<div class="tb-opts tb-opts--row" role="radiogroup" aria-label="<?php esc_attr_e( 'App complexity', 'technbrains-child' ); ?>">
						<label class="tb-opt"><input type="radio" name="tier" value="simple" checked>
							<span class="tb-opt__box"><span class="tb-opt__t"><?php esc_html_e( 'Simple / MVP', 'technbrains-child' ); ?></span><span class="tb-opt__d"><?php esc_html_e( 'One core workflow', 'technbrains-child' ); ?></span></span></label>
						<label class="tb-opt"><input type="radio" name="tier" value="medium">
							<span class="tb-opt__box"><span class="tb-opt__t"><?php esc_html_e( 'Medium', 'technbrains-child' ); ?></span><span class="tb-opt__d"><?php esc_html_e( 'Marketplace, custom UI', 'technbrains-child' ); ?></span></span></label>
						<label class="tb-opt"><input type="radio" name="tier" value="complex">
							<span class="tb-opt__box"><span class="tb-opt__t"><?php esc_html_e( 'Complex', 'technbrains-child' ); ?></span><span class="tb-opt__d"><?php esc_html_e( 'Enterprise, multi-role', 'technbrains-child' ); ?></span></span></label>
					</div>
				</div>

				<div class="tb-step">
					<p class="tb-step__q"><span class="tb-step__n">2</span> <?php esc_html_e( 'Which platforms?', 'technbrains-child' ); ?></p>
					<div class="tb-opts tb-opts--row" role="radiogroup" aria-label="<?php esc_attr_e( 'Platform', 'technbrains-child' ); ?>">
						<label class="tb-opt"><input type="radio" name="plat" value="cross" checked>
							<span class="tb-opt__box"><span class="tb-opt__t"><?php esc_html_e( 'Cross-platform', 'technbrains-child' ); ?></span><span class="tb-opt__d"><?php esc_html_e( 'One codebase, both', 'technbrains-child' ); ?></span></span></label>
						<label class="tb-opt"><input type="radio" name="plat" value="one">
							<span class="tb-opt__box"><span class="tb-opt__t"><?php esc_html_e( 'One platform', 'technbrains-child' ); ?></span><span class="tb-opt__d"><?php esc_html_e( 'iOS or Android', 'technbrains-child' ); ?></span></span></label>
						<label class="tb-opt"><input type="radio" name="plat" value="both">
							<span class="tb-opt__box"><span class="tb-opt__t"><?php esc_html_e( 'Both native', 'technbrains-child' ); ?></span><span class="tb-opt__d"><?php esc_html_e( 'Two codebases', 'technbrains-child' ); ?></span></span></label>
					</div>
				</div>

				<div class="tb-step">
					<p class="tb-step__q"><span class="tb-step__n">3</span> <?php esc_html_e( 'Add advanced features', 'technbrains-child' ); ?> <span style="font-weight:500;color:var(--muted)">(<?php esc_html_e( 'optional', 'technbrains-child' ); ?>)</span></p>
					<div class="tb-feats">
						<label class="tb-feat"><input type="checkbox" data-lo="3200" data-hi="9000">
							<span class="tb-feat__tick"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6.2l2.6 2.6L10 3" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
							<span class="tb-feat__txt"><span class="tb-feat__n"><?php esc_html_e( 'Payments', 'technbrains-child' ); ?></span><span class="tb-feat__p">+$3,200&ndash;$9,000</span></span></label>

						<label class="tb-feat"><input type="checkbox" data-lo="2000" data-hi="8000">
							<span class="tb-feat__tick"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6.2l2.6 2.6L10 3" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
							<span class="tb-feat__txt"><span class="tb-feat__n"><?php esc_html_e( 'Maps & GPS', 'technbrains-child' ); ?></span><span class="tb-feat__p">+$2,000&ndash;$8,000</span></span></label>

						<label class="tb-feat"><input type="checkbox" data-lo="8000" data-hi="25000">
							<span class="tb-feat__tick"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6.2l2.6 2.6L10 3" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
							<span class="tb-feat__txt"><span class="tb-feat__n"><?php esc_html_e( 'AI chatbot', 'technbrains-child' ); ?></span><span class="tb-feat__p">+$8,000&ndash;$25,000</span></span></label>

						<label class="tb-feat"><input type="checkbox" data-lo="12000" data-hi="35000">
							<span class="tb-feat__tick"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6.2l2.6 2.6L10 3" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
							<span class="tb-feat__txt"><span class="tb-feat__n"><?php esc_html_e( 'Live chat', 'technbrains-child' ); ?></span><span class="tb-feat__p">+$12,000&ndash;$35,000</span></span></label>

						<label class="tb-feat"><input type="checkbox" data-scoped="1">
							<span class="tb-feat__tick"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6.2l2.6 2.6L10 3" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
							<span class="tb-feat__txt"><span class="tb-feat__n"><?php esc_html_e( 'Real-time tracking', 'technbrains-child' ); ?></span><span class="tb-feat__p"><?php esc_html_e( 'Scoped per project', 'technbrains-child' ); ?></span></span></label>

						<label class="tb-feat"><input type="checkbox" data-scoped="1">
							<span class="tb-feat__tick"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6.2l2.6 2.6L10 3" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
							<span class="tb-feat__txt"><span class="tb-feat__n"><?php esc_html_e( 'Video calling', 'technbrains-child' ); ?></span><span class="tb-feat__p"><?php esc_html_e( 'Scoped per project', 'technbrains-child' ); ?></span></span></label>

						<label class="tb-feat"><input type="checkbox" data-scoped="1">
							<span class="tb-feat__tick"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6.2l2.6 2.6L10 3" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
							<span class="tb-feat__txt"><span class="tb-feat__n"><?php esc_html_e( 'Offline mode', 'technbrains-child' ); ?></span><span class="tb-feat__p"><?php esc_html_e( 'Scoped per project', 'technbrains-child' ); ?></span></span></label>

						<label class="tb-feat"><input type="checkbox" data-scoped="1">
							<span class="tb-feat__tick"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6.2l2.6 2.6L10 3" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
							<span class="tb-feat__txt"><span class="tb-feat__n"><?php esc_html_e( 'Admin dashboard', 'technbrains-child' ); ?></span><span class="tb-feat__p"><?php esc_html_e( 'Scoped per project', 'technbrains-child' ); ?></span></span></label>
					</div>
				</div>

				<!-- Mobile-only step nav (shown/managed by JS on phones; hidden on desktop) -->
				<div class="tb-wiz-nav" aria-hidden="true">
					<button type="button" class="tb-wiz-btn tb-wiz-prev" hidden><?php esc_html_e( 'Previous', 'technbrains-child' ); ?></button>
					<span class="tb-wiz-status"></span>
					<button type="button" class="tb-wiz-btn tb-wiz-next"><?php esc_html_e( 'Next', 'technbrains-child' ); ?></button>
				</div>
			</div>

			<!-- RESULT -->
			<div class="tb-out">
				<p class="tb-out__label"><?php esc_html_e( 'Estimated cost', 'technbrains-child' ); ?></p>
				<p class="tb-range" id="tbRange" aria-live="polite"><span id="tbLo">$15,000</span><span class="dash">&ndash;</span><span id="tbHi">$50,000</span></p>
				<div class="tb-bar__wrap"><div class="tb-bar"></div></div>

				<div class="tb-facts">
					<div class="tb-fact"><span class="k"><?php esc_html_e( 'Typical timeline', 'technbrains-child' ); ?></span><span class="v" id="tbTime"><?php esc_html_e( '6 to 12 weeks', 'technbrains-child' ); ?></span></div>
					<div class="tb-fact"><span class="k"><?php esc_html_e( 'Annual maintenance', 'technbrains-child' ); ?></span><span class="v" id="tbMaint">$5,000&ndash;$7,000</span></div>
				</div>

				<div class="tb-scoped" id="tbScoped"></div>

				<p class="tb-summary" id="tbSummary"></p>

				<div class="tb-cta">
					<button type="button" class="tb-btn tb-btn--primary tnb-popup-trigger" id="tbOpen"><?php esc_html_e( 'Get a project estimate', 'technbrains-child' ); ?></button>
					<a class="tb-btn tb-btn--ghost" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"><?php esc_html_e( 'Or talk to our team', 'technbrains-child' ); ?></a>
					<p class="tb-note"><?php esc_html_e( 'Estimate uses 2026 ranges from Business of Apps, GoodFirms and Netguru (US rates). Your real number depends on scope.', 'technbrains-child' ); ?></p>
				</div>
			</div>
		</div>
	</div>
	<?php
	return ob_get_clean();
}
add_shortcode( 'tnb_app_cost_estimator', 'tnb_aest_shortcode' );

/* =========================================================================
 * Lead capture — SAME generic pipeline as the theme's other forms
 * (honeypot -> admin email -> tnb_lead CPT). No coupling to the ACF blocks.
 *
 * NOTE: with the estimator's own modal removed, lead submission now flows
 * through the shared "Start Your Project" popup (tnb_handle_popup_form), which
 * already pushes to HubSpot + SwiftSales + tnb_lead. This AJAX handler is kept
 * as a harmless fallback (nothing posts to it in the current UI).
 * ====================================================================== */

/**
 * AJAX: estimator lead submit. Mirrors tnb_handle_contact_form's flow.
 */
function tnb_aest_submit() {
	check_ajax_referer( 'tnb_aest_lead', 'nonce' );

	// Honeypot (shared) — exits with a silent "bot" success if the trap is filled.
	if ( function_exists( 'tnb_check_honeypot' ) ) {
		tnb_check_honeypot();
	}

	$name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$company = isset( $_POST['company'] ) ? sanitize_text_field( wp_unslash( $_POST['company'] ) ) : '';
	$details = isset( $_POST['details'] ) ? sanitize_textarea_field( wp_unslash( $_POST['details'] ) ) : '';
	$summary = isset( $_POST['summary'] ) ? sanitize_textarea_field( wp_unslash( $_POST['summary'] ) ) : '';

	$errors = array();
	if ( '' === $name ) {
		$errors[] = __( 'Please enter your name.', 'technbrains-child' );
	}
	if ( ! is_email( $email ) ) {
		$errors[] = __( 'Please enter a valid work email.', 'technbrains-child' );
	}
	if ( ! empty( $errors ) ) {
		wp_send_json_error( array( 'messages' => $errors ) );
	}

	// Compose the message from company + details + the visitor's on-page estimate.
	$message = '';
	if ( '' !== $company ) {
		$message .= 'Company: ' . $company . "\n";
	}
	if ( '' !== $details ) {
		$message .= "Project details:\n" . $details . "\n\n";
	}
	if ( '' !== $summary ) {
		$message .= 'On-page estimate: ' . $summary;
	}
	$message = trim( $message );

	// HubSpot — same server-side Forms API + shared GUID as every other theme form.
	if ( function_exists( 'tnb_submit_to_hubspot' ) ) {
		// HubSpot's message property is single-line — build a clean one-liner:
		// "Company - <estimate/description>" (falls back to the on-page estimate).
		$hs_desc    = '' !== $details ? $details : $summary;
		$hs_desc    = trim( preg_replace( '/\s+/', ' ', $hs_desc ) );
		$hs_message = ( '' !== $company ? $company . ' - ' : '' ) . $hs_desc;
		tnb_submit_to_hubspot(
			array(
				'firstname' => $name,
				'email'     => $email,
				'phone'     => '',
				'message'   => $hs_message,
			),
			'tnb_hubspot_popup_form_guid'
		);
	}

	// Admin email notification (shared helper).
	if ( function_exists( 'tnb_send_lead_email' ) ) {
		tnb_send_lead_email(
			array( 'name' => $name, 'email' => $email, 'phone' => '', 'message' => $message ),
			'New Lead (App Cost Estimator)'
		);
	}

	// Local store: shared tnb_lead CPT — same as every other form.
	if ( function_exists( 'tnb_save_lead' ) ) {
		tnb_save_lead( array(
			'name'    => $name,
			'email'   => $email,
			'phone'   => '',
			'message' => $message,
			'form'    => 'App Cost Estimator',
		) );
	}

	wp_send_json_success( array( 'received' => true ) );
}
add_action( 'wp_ajax_tnb_app_estimate_submit', 'tnb_aest_submit' );
add_action( 'wp_ajax_nopriv_tnb_app_estimate_submit', 'tnb_aest_submit' );
