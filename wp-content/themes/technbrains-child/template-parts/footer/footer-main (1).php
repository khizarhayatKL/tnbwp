<?php
/**
 * Footer top section — form column + offices + social + ratings.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$assets = get_stylesheet_directory_uri() . '/assets/images';

$usa_locations = array(
	array( 'city' => 'Dallas',    'content' => '15305 Dallas Pkwy 12th Floor, suite # 1257, Addison, TX 75001 USA' ),
	array( 'city' => 'New York',  'content' => '165 Broadway Suite # 1007, 23rd Floor, New York, NY 10006, USA' ),
	array( 'city' => 'Grapevine', 'content' => 'Office# 2451 West Grapevine Mills Circle, Suite #116 Grapevine, TX 76051, USA' ),
);

$uae_locations = array(
	array( 'city' => 'Dubai', 'content' => 'Dubai 2080, Binary Tower Marasi Drive, Business Bay PO Box: 294474, Dubai, UAE' ),
);

$social_links = array(
	array(
		'url'   => 'https://www.facebook.com/technbrains/',
		'label' => 'Facebook',
		'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 320 512" aria-hidden="true" focusable="false"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>',
	),
	array(
		'url'   => 'https://twitter.com/technbrains',
		'label' => 'X (Twitter)',
		'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 512 512" aria-hidden="true" focusable="false"><path fill="currentColor" d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8l164.9-188.5L26.8 48H172.4l102.5 135.5zm-25.2 374.8h39.1L151.1 88h-42z"/></svg>',
	),
	array(
		'url'   => 'https://www.linkedin.com/company/technbrains',
		'label' => 'LinkedIn',
		'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 448 512" aria-hidden="true" focusable="false"><path fill="currentColor" d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"/></svg>',
	),
	array(
		'url'   => 'https://www.youtube.com/@TechnBrainsofficial',
		'label' => 'YouTube',
		'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 576 512" aria-hidden="true" focusable="false"><path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"/></svg>',
	),
	array(
		'url'   => 'https://www.pinterest.com/technbrains/',
		'label' => 'Pinterest',
		'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 496 512" aria-hidden="true" focusable="false"><path fill="currentColor" d="M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3.8-3.4 5-20.3 6.9-28.1.6-2.5.3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z"/></svg>',
	),
	array(
		'url'   => 'https://www.instagram.com/technbrains/',
		'label' => 'Instagram',
		'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 448 512" aria-hidden="true" focusable="false"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>',
	),
);

$rating_list = array(
	array( 'img' => '/revamp/footer/clutch.png',      'w' => 108, 'h' => 31, 'rating' => '4.8', 'url' => 'https://clutch.co/profile/technbrains',                                   'alt' => 'Clutch' ),
	array( 'img' => '/revamp/footer/designrush.png',  'w' => 185, 'h' => 42, 'rating' => '4.4', 'url' => 'https://www.designrush.com/agency/profile/technbrains',                   'alt' => 'DesignRush' ),
	array( 'img' => '/revamp/footer/google.png',      'w' => 105, 'h' => 38, 'rating' => '4.7', 'url' => 'https://maps.app.goo.gl/NLqcWAfCiJVotKDf8',                              'alt' => 'Google' ),
	array( 'img' => '/revamp/footer/goodfirms.png',   'w' => 162, 'h' => 26, 'rating' => '5.0', 'url' => 'https://www.goodfirms.co/company/technbrains',                            'alt' => 'GoodFirms' ),
	array( 'img' => '/revamp/footer/trust.png',       'w' => 165, 'h' => 41, 'rating' => '4.1', 'url' => 'https://www.trustpilot.com/review/technbrains.com',                       'alt' => 'Trustpilot' ),
);
?>

<div class="topWrapper">
	<div class="container">
		<div class="footer-grid">

			<!-- Left: Collaborate form -->
			<div class="footer-left-info">
				<h4>Collaborate <br> With <span>TechnBrains</span></h4>

				<form
					id="tnb-footer-form"
					class="bannerForm footer-new-form"
					novalidate
					aria-label="Contact form"
				>
					<?php wp_nonce_field( 'tnb_footer_form', 'tnb_footer_nonce' ); ?>
					<?php tnb_honeypot_field(); ?>

					<div class="form-grid">
						<div class="inputField">
							<input type="text" name="firstName" placeholder="First Name" autocomplete="given-name" required>
						</div>
						<div class="inputField">
							<input type="text" name="lastName" placeholder="Last Name" autocomplete="family-name" required>
						</div>
					</div>

					<div class="form-grid">
						<div class="inputField">
							<input type="email" name="cemail" placeholder="Email Address" autocomplete="email" required>
						</div>
						<div class="inputField">
							<input type="tel" id="footer-phone" name="cnumber" placeholder="Phone Number (optional)" autocomplete="tel">
						</div>
					</div>

					<div class="inputField">
						<textarea name="message" rows="6" placeholder="About your project"></textarea>
					</div>

					<div id="tnb-footer-form-msg" aria-live="polite"></div>

					<?php tnb_recaptcha_field(); ?>

					<button type="submit" class="tnb-btn">
						<div class="textWrapper">
							<span class="primaryText">Inquire now</span>
							<span class="secondaryText" aria-hidden="true">Inquire now</span>
						</div>
					</button>
				</form>
			</div>

			<!-- Right: Offices + social + ratings -->
			<div class="footer-right-info">
				<h4>Our Offices</h4>

				<!-- USA -->
				<div class="locationWrapper usa">
					<div class="state-flag">
						<img
							src="<?php echo esc_url( $assets . '/revamp/footer/usa.png' ); ?>"
							width="56"
							height="56"
							alt="United States"
							loading="lazy"
						>
						<h5>United States</h5>
					</div>
					<div class="grid-info">
						<?php foreach ( $usa_locations as $loc ) : ?>
							<div class="location-info">
								<h5><?php echo esc_html( $loc['city'] ); ?></h5>
								<p><?php echo esc_html( $loc['content'] ); ?></p>
							</div>
						<?php endforeach; ?>
					</div>
				</div>

				<!-- UAE -->
				<div class="locationWrapper uae">
					<div class="state-flag">
						<img
							src="<?php echo esc_url( $assets . '/revamp/footer/uae.png' ); ?>"
							width="56"
							height="56"
							alt="United Arab Emirates"
							loading="lazy"
						>
						<h5>UAE</h5>
					</div>
					<div class="grid-info">
						<?php foreach ( $uae_locations as $loc ) : ?>
							<div class="location-info">
								<h5><?php echo esc_html( $loc['city'] ); ?></h5>
								<p><?php echo esc_html( $loc['content'] ); ?></p>
							</div>
						<?php endforeach; ?>
					</div>
				</div>

				<!-- Social icons -->
				<div class="social-icon">
					<div class="icon">
						<?php foreach ( $social_links as $social ) : ?>
							<a
								href="<?php echo esc_url( $social['url'] ); ?>"
								target="_blank"
								rel="noopener noreferrer"
								aria-label="<?php echo esc_attr( $social['label'] ); ?>"
							>
								<?php echo $social['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped — hardcoded SVG ?>
							</a>
						<?php endforeach; ?>
					</div>
				</div>

				<!-- Ratings -->
				<div class="award-and-rating">
					<?php foreach ( $rating_list as $item ) : ?>
						<div class="rating-info">
							<a href="<?php echo esc_url( $item['url'] ); ?>" target="_blank" rel="noopener noreferrer">
								<img
									src="<?php echo esc_url( $assets . $item['img'] ); ?>"
									width="<?php echo (int) $item['w']; ?>"
									height="<?php echo (int) $item['h']; ?>"
									alt="<?php echo esc_attr( $item['alt'] ); ?>"
									loading="lazy"
								>
								<div class="rating">
									<img
										src="<?php echo esc_url( $assets . '/footer/rating.png' ); ?>"
										width="20"
										height="20"
										alt="Star rating"
										loading="lazy"
									>
									<h5><?php echo esc_html( $item['rating'] ); ?></h5>
								</div>
							</a>
						</div>
					<?php endforeach; ?>
				</div>

			</div>
		</div>
	</div>
</div>
