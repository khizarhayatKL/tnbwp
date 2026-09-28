<?php
defined( 'ABSPATH' ) || exit;

$mod = get_query_var( 'component_modifier_classes', '' );
?>
<section class="contact-form<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<h3>Get In Touch</h3>
		<p>Connect with us for any kind of query that you wish to ask and feel free to drop in your queries related to our services.</p>
		<div class="cf-form-info">
			<h4>Request a Free Quote</h4>
			<form id="tnb-contact-form" class="cf-banner-form contact-main-form" novalidate>
				<?php tnb_honeypot_field(); ?>
				<div class="cf-form-grid">
					<div class="cf-input-field">
						<input type="text" name="firstName" placeholder="First Name" autocomplete="given-name">
					</div>
					<div class="cf-input-field">
						<input type="text" name="lastName" placeholder="Last Name" autocomplete="family-name">
					</div>
				</div>
				<div class="cf-form-grid">
					<div class="cf-input-field">
						<input type="email" name="cemail" placeholder="Email" autocomplete="email">
					</div>
					<div class="cf-input-field cf-phone-field">
						<input type="tel" id="cf-phone" name="cnumber" placeholder="Phone Number (optional)" autocomplete="off">
					</div>
				</div>
				<div class="cf-input-field">
					<textarea name="message" rows="6" placeholder="Description" autocomplete="off"></textarea>
				</div>
				<div id="tnb-contact-form-msg" class="cf-form-msg"></div>
				<div class="tnb-recaptcha-wrap">
					<?php tnb_recaptcha_field(); ?>
				</div>
				<button type="submit" class="cf-submit-btn">Submit</button>
			</form>
		</div>
	</div>
</section>
