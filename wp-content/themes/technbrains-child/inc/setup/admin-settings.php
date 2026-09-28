<?php
/**
 * TechnBrains Admin Settings Page
 * Provides UI to update reCAPTCHA, Swift Sales, and HubSpot credentials.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

// ── Register settings ─────────────────────────────────────────────────────────
add_action( 'admin_init', 'tnb_register_settings' );
function tnb_register_settings(): void {
	$fields = array(
		// reCAPTCHA
		'tnb_recaptcha_site_key',
		'tnb_recaptcha_secret_key',
		// Swift Sales
		'tnb_swift_sales_script_id',
		'tnb_swift_sales_script_url',
		// HubSpot
		'tnb_hubspot_portal_id',
		'tnb_hubspot_popup_form_guid',
		'tnb_hubspot_exit_form_guid',
      // IP Geolocation
		'tnb_ipdata_api_key',
	);
	foreach ( $fields as $field ) {
		register_setting( 'tnb_integrations', $field, array( 'sanitize_callback' => 'sanitize_text_field' ) );
	}
}

// ── Admin menu ────────────────────────────────────────────────────────────────
add_action( 'admin_menu', 'tnb_add_settings_page' );
function tnb_add_settings_page(): void {
	add_options_page(
		'TechnBrains Integrations',
		'TechnBrains',
		'manage_options',
		'tnb-integrations',
		'tnb_render_settings_page'
	);
}

// ── Helper to get option with fallback ────────────────────────────────────────
function tnb_get( string $key, string $fallback = '' ): string {
	return (string) get_option( $key, $fallback );
}

// ── Render settings page ──────────────────────────────────────────────────────
function tnb_render_settings_page(): void {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	?>
	<div class="wrap">
		<h1>TechnBrains — Integrations</h1>

		<?php settings_errors( 'tnb_integrations' ); ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'tnb_integrations' ); ?>

			<!-- reCAPTCHA ──────────────────────────────────────────────── -->
			<h2>Google reCAPTCHA v2</h2>
			<table class="form-table" role="presentation">
				<tr>
					<th><label for="tnb_recaptcha_site_key">Site Key</label></th>
					<td>
						<input
							type="text"
							id="tnb_recaptcha_site_key"
							name="tnb_recaptcha_site_key"
							value="<?php echo esc_attr( tnb_get( 'tnb_recaptcha_site_key' ) ); ?>"
							class="regular-text"
						>
						<p class="description">Public key shown in the reCAPTCHA widget.</p>
					</td>
				</tr>
				<tr>
					<th><label for="tnb_recaptcha_secret_key">Secret Key</label></th>
					<td>
						<input
							type="password"
							id="tnb_recaptcha_secret_key"
							name="tnb_recaptcha_secret_key"
							value="<?php echo esc_attr( tnb_get( 'tnb_recaptcha_secret_key' ) ); ?>"
							class="regular-text"
						>
						<p class="description">Private key used for server-side verification.</p>
					</td>
				</tr>
			</table>

			<!-- Swift Sales ────────────────────────────────────────────── -->
			<h2>Swift Sales</h2>
			<table class="form-table" role="presentation">
				<tr>
					<th><label for="tnb_swift_sales_script_id">Script ID</label></th>
					<td>
						<input
							type="text"
							id="tnb_swift_sales_script_id"
							name="tnb_swift_sales_script_id"
							value="<?php echo esc_attr( tnb_get( 'tnb_swift_sales_script_id', '482' ) ); ?>"
							class="small-text"
						>
						<p class="description">Production: <code>482</code> — Staging: <code>659</code></p>
					</td>
				</tr>
				<tr>
					<th><label for="tnb_swift_sales_script_url">Script URL</label></th>
					<td>
						<input
							type="url"
							id="tnb_swift_sales_script_url"
							name="tnb_swift_sales_script_url"
							value="<?php echo esc_attr( tnb_get( 'tnb_swift_sales_script_url', 'https://script.swiftsales.io/swiftsales.js?v=c5e4a51a45544' ) ); ?>"
							class="large-text"
							placeholder="https://script.swiftsales.io/swiftsales.js?v=c5e4a51a45544"
						>
						<p class="description">
							Get this URL from the SwiftSales dashboard.<br>
							⚠ The <code>?v=</code> version hash must be exact — a wrong version causes a JavaScript crash on every page.<br>
							Production default: <code>https://script.swiftsales.io/swiftsales.js?v=c5e4a51a45544</code>
						</p>
					</td>
				</tr>
			</table>

			<!-- HubSpot ────────────────────────────────────────────────── -->
			<h2>HubSpot</h2>
			<table class="form-table" role="presentation">
				<tr>
					<th><label for="tnb_hubspot_portal_id">Portal ID</label></th>
					<td>
						<input
							type="text"
							id="tnb_hubspot_portal_id"
							name="tnb_hubspot_portal_id"
							value="<?php echo esc_attr( tnb_get( 'tnb_hubspot_portal_id' ) ); ?>"
							class="small-text"
						>
					</td>
				</tr>
				<tr>
					<th><label for="tnb_hubspot_popup_form_guid">Form GUID — Popup CTA</label></th>
					<td>
						<input
							type="text"
							id="tnb_hubspot_popup_form_guid"
							name="tnb_hubspot_popup_form_guid"
							value="<?php echo esc_attr( tnb_get( 'tnb_hubspot_popup_form_guid' ) ); ?>"
							class="regular-text"
						>
						<p class="description">Used for "Start Your Project" popup submissions.</p>
					</td>
				</tr>
				<tr>
					<th><label for="tnb_hubspot_exit_form_guid">Form GUID — Exit Popup</label></th>
					<td>
						<input
							type="text"
							id="tnb_hubspot_exit_form_guid"
							name="tnb_hubspot_exit_form_guid"
							value="<?php echo esc_attr( tnb_get( 'tnb_hubspot_exit_form_guid' ) ); ?>"
							class="regular-text"
						>
						<p class="description">Used for exit intent popup submissions.</p>
					</td>
				</tr>
			</table>

			<!-- IP Geolocation ─────────────────────────────────────── -->
			<h2>IP Geolocation</h2>
			<table class="form-table" role="presentation">
				<tr>
					<th><label for="tnb_ipdata_api_key">ipdata.co API Key</label></th>
					<td>
						<input
							type="text"
							id="tnb_ipdata_api_key"
							name="tnb_ipdata_api_key"
							value="<?php echo esc_attr( tnb_get( 'tnb_ipdata_api_key', '9f7971df30fbd476f189d359ad4b22c4b1caf52409f0bc9653b7e262' ) ); ?>"
							class="large-text"
						>
						<p class="description">
							Used to auto-detect visitor country for phone flag selection on all forms.<br>
							Get your key at <code>https://ipdata.co</code>. Defaults to the built-in key if left unchanged.
						</p>
					</td>
				</tr>
			</table>

			<?php submit_button( 'Save Settings' ); ?>
		</form>
	</div>
	<?php
}
