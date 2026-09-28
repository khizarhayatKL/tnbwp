<?php
/**
 * "Scale My Team" modal popup.
 * Triggered by #tnb-popup-trigger in nav-header.php.
 * Closed by data-popup-close or clicking overlay.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$assets = get_stylesheet_directory_uri() . '/assets/images';

// Exact match to PopupCta.jsx reviewSlider data
$reviews = array(
	array(
		'review'       => 'Their ability to quickly understand an unfamiliar use case and respond creatively to it is impressive.',
		'client'       => 'Anonymous',
		'job_title'    => 'Executive, Pured Disc Golf',
		'img'          => '/imp-img-ab.png',
		'platform_img' => '/clutch-review.png',
	),
	array(
		'review'       => 'TechnBrains resolved challenges efficiently and turned my vision into a solid, functional product with a strong foundation.',
		'client'       => 'Jalen Gibbs',
		'job_title'    => 'Founder, STREAMLINE LIVE',
		'img'          => '/imp-3a.png',
		'platform_img' => '/clutch-review.png',
	),
	array(
		'review'       => 'The talent they provided was solid, but more importantly, they were quick to align with our way of working.',
		'client'       => 'Nancy Snyder',
		'job_title'    => 'Managing Director, MimeCast',
		'img'          => '/imp-2a.png',
		'platform_img' => '/clutch-review.png',
	),
);

$trusted_logos = array(
	array( 'src' => '/popup-new/case-1.png', 'alt' => 'Client 1', 'w' => 41, 'h' => 41 ),
	array( 'src' => '/popup-new/case-2.png', 'alt' => 'Client 2', 'w' => 41, 'h' => 41 ),
	array( 'src' => '/popup-new/case-3.png', 'alt' => 'Client 3', 'w' => 41, 'h' => 41 ),
	array( 'src' => '/popup-new/case-4.png', 'alt' => 'Client 4', 'w' => 41, 'h' => 41 ),
	array( 'src' => '/popup-new/case-5.png', 'alt' => 'Client 5', 'w' => 41, 'h' => 41 ),
);

$featured_logos = array(
	array( 'src' => '/popup-new/img-3.png', 'alt' => 'Featured 1', 'w' => 87,  'h' => 17 ),
	array( 'src' => '/popup-new/img-4.png', 'alt' => 'Featured 2', 'w' => 76,  'h' => 28 ),
	array( 'src' => '/popup-new/img-2.png', 'alt' => 'Featured 3', 'w' => 44,  'h' => 30 ),
	array( 'src' => '/popup-new/img-1.png', 'alt' => 'Featured 4', 'w' => 135, 'h' => 21 ),
);
?>

<div
	id="tnb-popup-overlay"
	class="tnb-popup-overlay"
	role="dialog"
	aria-modal="true"
	aria-label="Scale My Team — contact form"
	hidden
>
	<div class="tnb-popup-align">
	<div class="tnb-popup-inner new-main-popup form-service">

		<!-- Close button -->
		<button
			class="tnb-popup-close"
			data-popup-close
			aria-label="Close"
			type="button"
		>
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 384 512" aria-hidden="true" focusable="false"><path fill="currentColor" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3l105.4 105.3c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256l105.3-105.4z"/></svg>
		</button>

		<div class="popup-grid">

			<!-- ── Right: social proof (dark panel) ────────────────────────── -->
			<div class="popup-right-info">
				<div class="headBox">
					<span>Build and Scale Faster</span>
					<p>150+ products shipped for startups and enterprises by engineers focused on real outcomes.</p>
				</div>

				<!-- Review slider — Swiper, exact match to PopupCta.jsx -->
				<div class="reviewSlider popup-review-swiper">
					<div class="swiper popupSlider">
						<div class="swiper-wrapper">
							<?php foreach ( $reviews as $r ) : ?>
							<div class="swiper-slide">
								<div class="singleReview">
									<div class="review">
										<p>"<?php echo esc_html( $r['review'] ); ?>"</p>
									</div>
									<div class="clientMeta">
										<div class="clientImg">
											<img
												src="<?php echo esc_url( $assets . $r['img'] ); ?>"
												width="50"
												height="50"
												alt="<?php echo esc_attr( $r['client'] ); ?>"
												loading="lazy"
											>
										</div>
										<div class="title">
											<span><?php echo esc_html( $r['client'] ); ?></span>
											<p><?php echo esc_html( $r['job_title'] ); ?></p>
										</div>
									</div>
									<div class="cardFooter">
										<img
											src="<?php echo esc_url( $assets . $r['platform_img'] ); ?>"
											width="78"
											height="22"
											alt="Clutch"
											loading="lazy"
										>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
						<!-- Swiper navigation -->
						<div class="swiper-button-prev"></div>
						<div class="swiper-button-next"></div>
					</div>
				</div>

				<!-- Trusted clients -->
				<div class="caseStudy">
					<span>Our trusted clients</span>
					<div class="logos">
						<?php foreach ( $trusted_logos as $logo ) : ?>
							<div class="image">
								<img
									src="<?php echo esc_url( $assets . $logo['src'] ); ?>"
									width="<?php echo (int) $logo['w']; ?>"
									height="<?php echo (int) $logo['h']; ?>"
									alt="<?php echo esc_attr( $logo['alt'] ); ?>"
									loading="lazy"
								>
							</div>
						<?php endforeach; ?>
					</div>
				</div>

				<!-- Featured in -->
			</div>

			<!-- ── Left: form ──────────────────────────────────────────────── -->
			<div class="popup-left-info">
				<span>Start Your Product Journey Today</span>
				<p>Turn your idea into a working product. Share a few details and we'll help define the roadmap, timeline, and execution approach.</p>

				<form
					id="tnb-popup-form"
					class="new-form popup-main-form"
					novalidate
					aria-label="Start your project"
				>
					<?php wp_nonce_field( 'tnb_popup_form', 'tnb_popup_nonce' ); ?>
					<?php tnb_honeypot_field(); ?>

					<div class="formRow">
						<div class="inputField">
							<label for="popup-name">Full name</label>
							<input
								type="text"
								id="popup-name"
								name="firstName"
								placeholder="Jane Smith"
								autocomplete="name"
								required
							>
						</div>
						<div class="inputField">
                          	<label for="popup-phone">Phone Number <span style="font-weight:400;font-size:13px;opacity:.7">(optional)</span></label>
							<input
								type="tel"
								id="popup-phone"
								name="cnumber"
								placeholder="+1 234 567 8900"
								autocomplete="tel"
							>
						</div>
					</div>

					<div class="inputField">
						<label for="popup-email">Email</label>
						<input
							type="email"
							id="popup-email"
							name="cemail"
							placeholder="jane@company.com"
							autocomplete="email"
							required
						>
					</div>

					<!-- Service type cards — horizontal selectionRow (matches PopupCta.jsx) -->
					<div class="serviceSelection">
						<label class="sectionLabel">What are you looking to do?</label>
						<div class="selectionRow">

							<div class="serviceCard active" data-service="Build a Product" role="radio" aria-checked="true" tabindex="0">
								<div class="cardText">
									<strong>Build a Product</strong>
									<p class="tooltipBox">End-to-end development from idea to launch</p>
								</div>
								<div class="customRadio"></div>
							</div>

							<div class="serviceCard" data-service="Hire Developers" role="radio" aria-checked="false" tabindex="0">
								<div class="cardText">
									<strong>Hire Developers</strong>
									<p class="tooltipBox">Add vetted developers to your existing team</p>
								</div>
								<div class="customRadio"></div>
							</div>

							<div class="serviceCard" data-service="Need Guidance" role="radio" aria-checked="false" tabindex="0">
								<div class="cardText">
									<strong>Need Guidance</strong>
									<p class="tooltipBox">We'll help you choose the right setup</p>
								</div>
								<div class="customRadio"></div>
							</div>

						</div>
						<!-- hidden field carries selected service value -->
						<input type="hidden" name="serviceType" id="popup-service-type" value="Build a Product">
					</div>

					<div class="inputField">
						<label for="popup-message">Project details <small>(optional)</small></label>
						<div class="textareaWrapper">
							<textarea
								id="popup-message"
								name="message"
								placeholder="Describe your project, requirements or any specific challenges..."
							></textarea>
						</div>
					</div>

					<div id="tnb-popup-form-msg" aria-live="polite"></div>

					<?php tnb_recaptcha_field(); ?>

					<div class="btnRow">
						<button type="submit" class="submitBtn" id="tnb-popup-submit">Start Your Project</button>
					</div>

				</form>
			</div>

		</div>
	</div><!-- .tnb-popup-inner -->
	</div><!-- .tnb-popup-align -->
</div><!-- #tnb-popup-overlay -->
