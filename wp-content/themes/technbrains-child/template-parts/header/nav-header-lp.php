<?php

/**
 * Header V2 — Landing Page nav.
 *
 * Stripped-down nav for lp_hero pages: logo + phone + email only, no menu.
 * Swapped in for template-parts/components/Header by header.php when the
 * current page has an lp_hero flexible-content row (see tnb_page_has_layout()).
 *
 * @package technbrains-child
 */
defined( 'ABSPATH' ) || exit;

$img = get_stylesheet_directory_uri() . '/assets/images';

$ico_tel = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 15a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.56 4h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8 10.91a16 16 0 0 0 6 6l.81-.81a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>';
$ico_env = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>';
?>
<header class="lp-nav" aria-label="Main navigation">
	<div class="lp-nav-inner">
		<a class="lp-nav-logo" href="" aria-label="TechnBrains &#8212; Home">
			<img
				src="<?php echo esc_url( $img . '/logo.svg' ); ?>"
				alt="TechnBrains"
				width="171"
				height="32"
				loading="eager"
				fetchpriority="high">
		</a>

		<div class="lp-nav-contact">
			<a class="lp-nav-contact-item" href="tel:+18338886032">
				<span class="lp-nav-contact-ic" aria-hidden="true"><?php echo $ico_tel; ?></span>
				<span class="lp-nav-contact-text">
					<span class="lp-nav-contact-label">Phone</span>
					<span class="lp-nav-contact-value">+1 (833) 888-6032</span>
				</span>
			</a>
			<a class="lp-nav-contact-item" href="mailto:contact@technbrains.com">
				<span class="lp-nav-contact-ic" aria-hidden="true"><?php echo $ico_env; ?></span>
				<span class="lp-nav-contact-text">
					<span class="lp-nav-contact-label">Email</span>
					<span class="lp-nav-contact-value">contact@technbrains.com</span>
				</span>
			</a>
		</div>
	</div>
</header>
