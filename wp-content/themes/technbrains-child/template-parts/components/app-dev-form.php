<?php
/**
 * Component: App Dev Form — mirrors AppDevForm.jsx with intl-tel-input phone field.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data = get_query_var( 'component_data' );
$d    = $data['app_dev_form'] ?? array();
?>
<section class="appDevForm">
	<div class="container">
		<div class="adf-grid">
			<div class="adf-left">
				<h2><?php echo wp_kses( $d['title'] ?? '', array( 'br' => array(), 'span' => array( 'class' => true ) ) ); ?></h2>
				<p><?php echo nl2br( esc_html( $d['para'] ?? '' ) ); ?></p>
			</div>
			<div class="adf-right">
				<span>Talk to our </span>
				<strong>Experts Now</strong>
				<p>Our expert developers can turn your idea into reality.</p>
				<form id="tnb-app-dev-form" class="adf-form" novalidate>
					<?php wp_nonce_field( 'tnb_app_dev_form', 'tnb_app_dev_nonce' ); ?>
					<?php tnb_honeypot_field(); ?>
					<div class="adf-field">
						<input type="text" name="firstName" placeholder="Full Name *" autocomplete="name">
					</div>
					<div class="adf-field">
						<input type="email" name="cemail" placeholder="Email Address *" autocomplete="email">
					</div>
					<div class="adf-field adf-phone-field">
						<input type="tel" id="adf-phone" name="cnumber" placeholder="Phone Number (optional)" autocomplete="off">
					</div>
					<div class="adf-field">
						<textarea name="message" rows="3" placeholder="How can we help you?" autocomplete="off"></textarea>
					</div>
					<div id="tnb-app-dev-form-msg" aria-live="polite"></div>
					<?php tnb_recaptcha_field(); ?>
					<button type="submit" class="tnb-btn slideHOv">
                    BOOK YOUR CONSULTATION NOW    
                    </button>
				</form>
			</div>
		</div>
	</div>
</section>
