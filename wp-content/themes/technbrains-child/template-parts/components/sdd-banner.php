<?php

/**
 * Component: SoftwareDevDallas Banner
 *
 * Data key : sdd_banner
 * Fields   : heading, paragraph, btn_title, btn_anchor_text, btn_anchor_url,
 *            form_title, form_para
 *
 * @package technbrains-child
 */

defined('ABSPATH') || exit;

$data     = get_query_var('component_data');
$d        = $data['sdd_banner'] ?? array();
$mod      = get_query_var('component_modifier_classes', '');
$img_base = get_stylesheet_directory_uri() . '/assets/images';

static $sdd_instance = 0;
$sdd_instance++;
$phone_id = 'sddPhone-' . $sdd_instance;
?>
<section class="mobileAppBanner<?php echo $mod ? ' ' . esc_attr($mod) : ''; ?>">
	<div class="container">
		<div class="sdd-content">
			<div class="sdd-left">
				<?php tnb_breadcrumb_html(); ?>
				<h1><?php echo wp_kses( $d['heading'] ?? '', array( 'span' => array( 'class' => true ) ) ); ?></h1>
				<p><?php echo wp_kses_post($d['paragraph'] ?? ''); ?></p>
				<div class="sdd-btn-wrapper">
					<button class="new-btn-lp tnb-popup-trigger" type="button"><?php echo esc_html($d['btn_title'] ?? 'Get a Free Quote!'); ?> <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
							<path d="M1 7H13M13 7L7 1M13 7L7 13" stroke="#ED2A32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg></button>
					<a class="new-btn-lp" href="<?php echo esc_url(home_url($d['btn_anchor_url'] ?? '/contact-us')); ?>"><?php echo esc_html($d['btn_anchor_text'] ?? 'Book a Call'); ?> <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
							<path d="M1 7H13M13 7L7 1M13 7L7 13" stroke="#ED2A32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg></a>
				</div>
			</div>
			<div class="sdd-right">
				<div class="sdd-banner-form<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
					<div class="sdf-header">
						<h4><?php echo esc_html($d['form_title'] ?? 'Share Your Requirements'); ?></h4>
						<p><?php echo esc_html($d['form_para'] ?? 'To help our experts understand your business objective and create your customized plan.'); ?></p>
					</div>
					<form id="tnb-sdd-form" class="sdf-contact-form" novalidate>
						<?php wp_nonce_field( 'tnb_sdd_form', 'tnb_sdd_nonce' ); ?>
						<?php tnb_honeypot_field(); ?>
						<div class="sdf-row">
							<div class="sdf-field">
								<input type="text" name="firstName" placeholder="Full Name" autocomplete="name">
							</div>
							<div class="sdf-field">
								<input type="email" name="cemail" placeholder="Email Address" autocomplete="email">
							</div>
						</div>
						<div class="sdf-field">
							<input type="tel" name="cnumber" id="<?php echo esc_attr($phone_id); ?>" placeholder="Phone Number (optional)" autocomplete="tel">
						</div>
						<div class="sdf-field">
							<textarea name="message" rows="3" placeholder="Describe your project/idea in brief"></textarea>
						</div>
						<p id="tnb-sdd-form-msg" class="inner-form-msg"></p>
						<?php tnb_recaptcha_field(); ?>
						<button type="submit" class="formBtnLp">Get Started</button>
					</form>
					<p class="sdf-btm">Signup to get a response within 5 minutes</p>
				</div>
			</div>
		</div>
	</div>
</section>
