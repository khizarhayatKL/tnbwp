<?php
defined( 'ABSPATH' ) || exit;

$img = get_stylesheet_directory_uri() . '/assets/images';
$mod = get_query_var( 'component_modifier_classes', '' );
?>

<section class="contact-banner<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<?php tnb_breadcrumb_html(); ?>
		<div class="contact-banner-grid">
			<h2>Contact Us</h2>
			<img src="<?php echo esc_url( $img . '/contact-img.png' ); ?>" width="685" height="723" alt="contact-banner" loading="eager" decoding="async">
		</div>
	</div>
</section>

<section class="contact-info">
	<div class="container">
		<h3>Contact TechnBrains</h3>
		<p>Together, we will create powerful solutions that boost your bottom line, feel free to drop a call.</p>
		<div class="contact-info-grid">
			<div class="contact-info-box">
				<div class="contact-icon">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="20" height="20" fill="currentColor" aria-hidden="true"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
				</div>
				<h4>Address</h4>
				<a href="https://goo.gl/maps/z1XxT1b4jrAa3Vjv6" target="_blank" rel="noopener noreferrer">
					<p>15305 Dallas Pkwy 12th Floor, suite # 1257, Addison, TX 75001</p>
				</a>
			</div>
			<div class="contact-info-box">
				<div class="contact-icon">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="20" fill="currentColor" aria-hidden="true"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
				</div>
				<h4>phone</h4>
				<a href="tel:+18338886032">+1 (833) 888-6032</a>
			</div>
			<div class="contact-info-box">
				<div class="contact-icon">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="20" fill="currentColor" aria-hidden="true"><path d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z"/></svg>
				</div>
				<h4>email</h4>
				<a href="mailto:Contact@technbrains.com">Contact@technbrains.com</a>
			</div>
		</div>
	</div>
</section>

<section class="contact-map">
	<div class="container-fluid">
		<iframe
			src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1673.852171726104!2d-96.8243075611241!3d32.95881444393763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864c2138400402b7%3A0xebdc6e5446e02a81!2s15305%20Dallas%20Pkwy%2012th%20Floor%2C%20suite%20%23%201257%2C%20Addison%2C%20TX%2075001%2C%20USA!5e0!3m2!1sen!2s!4v1685362525245!5m2!1sen!2s"
			width="100%"
			height="500"
			allowfullscreen=""
			loading="lazy"
			referrerpolicy="no-referrer-when-downgrade"
			title="TechnBrains Office Location"
		></iframe>
	</div>
</section>
