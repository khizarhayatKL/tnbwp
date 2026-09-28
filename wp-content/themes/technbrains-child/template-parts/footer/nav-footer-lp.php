<?php

/**
 * Footer V2 — Landing Page footer.
 *
 * Stripped-down footer for lp_hero pages: logo + description, social icons,
 * phone/email, copyright — no nav columns/offices/CTA. Swapped in for
 * template-parts/components/Footer by footer.php when the current page has
 * an lp_hero flexible-content row (see tnb_page_has_layout()).
 *
 * @package technbrains-child
 */
defined( 'ABSPATH' ) || exit;

$img_base = get_stylesheet_directory_uri() . '/assets/images';
$year     = date( 'Y' );

$ico_tel = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 15a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.56 4h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8 10.91a16 16 0 0 0 6 6l.81-.81a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>';
$ico_env = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>';

$socials = [
// 	[ 'https://www.facebook.com/technbrains/', 'Follow us on Facebook', 'social-facebook.svg', 8, 15 ],
// 	[ 'https://www.instagram.com/technbrains/', 'Follow us on Instagram', 'social-instagram.svg', 15, 15 ],
// 	[ 'https://www.linkedin.com/company/technbrains', 'Connect on LinkedIn', 'social-linkedin.svg', 13, 13 ],
// 	[ 'https://x.com/technbrains', 'Follow us on X (Twitter)', 'social-x.svg', 14, 16 ],
// 	[ 'https://www.pinterest.com/technbrains/', 'Follow us on Pinterest', 'pin.svg', 16, 16 ],
// 	[ 'https://www.youtube.com/@TechnBrainsofficial', 'Subscribe on YouTube', 'yt.svg', 14, 10 ],
];
?>
<footer class="lp-footer" aria-label="Site footer">
	<div class="lp-footer-inner">

		<div class="lp-footer-brand">
			<a href="" aria-label="TechnBrains &#8212; Home">
				<img
					src="<?php echo esc_url( $img_base . '/logo.svg' ); ?>"
					alt="TechnBrains"
					width="236"
					height="44"
					loading="lazy">
			</a>
			<p>TechnBrains helps logistics companies build custom software or add pre-vetted senior developers to existing teams, with expertise in dispatch, fleet management, routing, driver workflows, and shipment visibility.</p>
		</div>

		<ul class="lp-footer-social" aria-label="Follow us on social media">
			<?php foreach ( $socials as $s ) : ?>
			<li>
				<a href="<?php echo esc_url( $s[0] ); ?>" class="lp-footer-social-icon" aria-label="<?php echo esc_attr( $s[1] ); ?>" target="_blank" rel="noopener noreferrer">
					<img src="<?php echo esc_url( $img_base . '/revamp/icons/' . $s[2] ); ?>" width="<?php echo (int) $s[3]; ?>" height="<?php echo (int) $s[4]; ?>" alt="" aria-hidden="true">
				</a>
			</li>
			<?php endforeach; ?>
		</ul>

		<div class="lp-footer-contact">
			<a class="lp-footer-contact-item" href="tel:+18338886032">
				<span class="lp-footer-contact-ic" aria-hidden="true"><?php echo $ico_tel; ?></span>
				<span class="lp-footer-contact-text">
					<span class="lp-footer-contact-label">Phone</span>
					<span class="lp-footer-contact-value">+1 (833) 888-6032</span>
				</span>
			</a>
			<a class="lp-footer-contact-item" href="mailto:contact@technbrains.com">
				<span class="lp-footer-contact-ic" aria-hidden="true"><?php echo $ico_env; ?></span>
				<span class="lp-footer-contact-text">
					<span class="lp-footer-contact-label">Email</span>
					<span class="lp-footer-contact-value">contact@technbrains.com</span>
				</span>
			</a>
		</div>

		<div class="lp-footer-divider"></div>

		<p class="lp-footer-copy">&copy; <?php echo esc_html( $year ); ?> TechnBrains. All rights reserved.</p>

	</div>
</footer>
