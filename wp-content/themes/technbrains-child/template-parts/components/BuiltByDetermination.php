<?php
defined( 'ABSPATH' ) || exit;

$mod        = get_query_var( 'component_modifier_classes', '' );
$img        = get_stylesheet_directory_uri() . '/assets/images/case-studies/bbd';
$app_slides = array(
	'/slide3.webp', '/slide2.webp', '/slide5.webp', '/slide1.webp', '/slide4.webp',
	'/slide3.webp', '/slide2.webp', '/slide5.webp', '/slide1.webp', '/slide4.webp',
	'/slide3.webp', '/slide2.webp', '/slide5.webp', '/slide1.webp', '/slide4.webp',
);
?>

<section class="main-top-banner<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<?php tnb_breadcrumb_html(); ?>
		<div class="top-banner-info">
			<div class="left">
				<img src="<?php echo esc_url( $img . '/logo.png' ); ?>" width="394" height="88" alt="Built By Determination" loading="eager" decoding="async">
				<div class="built-by-head">
					<h1>BUILT BY</h1>
				</div>
				<h2>Transform Your Body, <span>Get Fit!</span></h2>
			</div>
			<div class="right">
				<img src="<?php echo esc_url( $img . '/bbd-top-1.webp' ); ?>" width="750" height="900" alt="Built By Determination App" loading="eager" decoding="async">
			</div>
		</div>
		<div class="banner-points-main">
			<div class="points">
				<img src="<?php echo esc_url( $img . '/data-management.png' ); ?>" width="70" height="70" alt="Built On" loading="lazy" decoding="async">
				<div class="points-info">
					<h4 class="before-line">01 Built On</h4>
					<p>React, React native, .NET, Azure</p>
				</div>
			</div>
			<div class="points">
				<img src="<?php echo esc_url( $img . '/gym.png' ); ?>" width="70" height="70" alt="Industry" loading="lazy" decoding="async">
				<div class="points-info">
					<h4 class="before-line">02 Industry</h4>
					<p>Health &amp; Fitness</p>
				</div>
			</div>
			<div class="points">
				<img src="<?php echo esc_url( $img . '/countries.png' ); ?>" width="70" height="70" alt="Region" loading="lazy" decoding="async">
				<div class="points-info">
					<h4 class="before-line">03 Region</h4>
					<p>USA</p>
				</div>
			</div>
			<div class="points">
				<img src="<?php echo esc_url( $img . '/operation.png' ); ?>" width="70" height="70" alt="Integrations" loading="lazy" decoding="async">
				<div class="points-info">
					<h4 class="before-line">04 Integrations</h4>
					<p>Agora, Sandgird, Google API &amp; Stripe</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="pro-background-main">
	<div class="container">
		<div class="pro-info">
			<h2>Project Background</h2>
			<p>To create an innovative fitness solution tailored to the needs of health-conscious individuals in the region. The vision was to empower users to take control of their health, transform their lives, and make fitness a sustainable lifestyle choice.</p>
		</div>
	</div>
	<h2 class="left">BUILT BY DETERMINATION</h2>
</section>

<section class="key-features-main">
	<div class="container">
		<div class="key-features-info">
			<h2>Key Features</h2>
			<div class="key-features-grid">
				<div class="left">
					<div class="instant-main">
						<div class="instant-img">
							<img src="<?php echo esc_url( $img . '/report.png' ); ?>" width="37" height="37" alt="Fit Connect" loading="lazy" decoding="async">
						</div>
						<div class="instant-info"><h4>Fit Connect</h4></div>
					</div>
					<div class="instant-main">
						<div class="instant-img">
							<img src="<?php echo esc_url( $img . '/location.png' ); ?>" width="37" height="37" alt="GYM store" loading="lazy" decoding="async">
						</div>
						<div class="instant-info"><h4>GYM store</h4></div>
					</div>
					<div class="instant-main">
						<div class="instant-img">
							<img src="<?php echo esc_url( $img . '/healthy-food.png' ); ?>" width="37" height="37" alt="Nutrition Tracking" loading="lazy" decoding="async">
						</div>
						<div class="instant-info"><h4>Nutrition Tracking</h4></div>
					</div>
					<div class="instant-main">
						<div class="instant-img">
							<img src="<?php echo esc_url( $img . '/personalization.png' ); ?>" width="37" height="37" alt="Personalized Workouts" loading="lazy" decoding="async">
						</div>
						<div class="instant-info"><h4>Personalized Workouts</h4></div>
					</div>
					<div class="instant-main">
						<div class="instant-img">
							<img src="<?php echo esc_url( $img . '/tracking.png' ); ?>" width="37" height="37" alt="Progress Tracking" loading="lazy" decoding="async">
						</div>
						<div class="instant-info"><h4>Progress Tracking</h4></div>
					</div>
					<div class="instant-main">
						<div class="instant-img">
							<img src="<?php echo esc_url( $img . '/certified.png' ); ?>" width="37" height="37" alt="Certified Fitness Trainers" loading="lazy" decoding="async">
						</div>
						<div class="instant-info"><h4>Certified Fitness Trainers</h4></div>
					</div>
				</div>
				<div class="right">
					<div class="right-svg">
						<img src="<?php echo esc_url( $img . '/count.svg' ); ?>" width="360" height="320" alt="User count" loading="lazy" decoding="async">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="business-prob-main">
	<div class="before-heading">
		<h2>Business Problem</h2>
	</div>
	<div class="container">
		<div class="info-business-prob">
			<hr>
			<p>The challenge is to achieve sustainable monetization in a highly competitive fitness app market while offering free access to essential features.<br><br>Finding a balance between revenue generation through premium offerings and retaining a sizable user base on the free plan poses a critical business problem for the app.</p>
		</div>
	</div>
</section>

<section class="why-tech-solution-main">
	<div class="container">
		<div class="solution-grid">
			<div class="left-info">
				<h2>App Development Solutions</h2>
				<h3>Here is why TechnBrains is the<br>choice of millions around the Globe</h3>
				<h4 class="before-line">Client-Centric Approach:</h4>
				<p>We prioritize understanding each client's unique challenges and goals, ensuring tailor-made solutions.</p>
				<h4 class="before-line">Experienced Multidisciplinary Team:</h4>
				<p>Our diverse team of experts spans various domains, technologies, and industries, guaranteeing effective problem solving.</p>
				<h4 class="before-line">Innovation and Advanced Technology:</h4>
				<p>We foster innovation, employ the latest technologies, and maintain flexibility to adapt to evolving business needs.</p>
				<h4 class="before-line">Quality Assurance and Timely Delivery:</h4>
				<p>We uphold rigorous quality standards and adhere to timelines, delivering dependable solutions on schedule.</p>
				<h4 class="before-line">Sustained Support and Client Satisfaction:</h4>
				<p>Beyond implementation, we offer ongoing support, aiming for long-term client success and satisfaction.</p>
			</div>
			<div class="right-info">
				<h2>Why TechnBrains</h2>
				<h3>With TechnBrains, you gain a trusted partner committed to your success, offering expertise, innovation, and support for your unique business needs.</h3>
				<div class="why-tech">
					<h4 class="before-line">Diverse Expertise and Innovation:</h4>
					<p>We bring a wealth of industry knowledge and innovative solutions to address your unique challenges.</p>
				</div>
				<div class="why-tech">
					<h4 class="before-line">Client-Centric Dedication:</h4>
					<p>Your needs are our top priority, with tailored solutions, transparent communication, and a commitment to your success.</p>
				</div>
				<div class="why-tech">
					<h4 class="before-line">Proven Quality and Reliability:</h4>
					<p>We have a track record of delivering high-quality solutions on time, ensuring your business can rely on us.</p>
				</div>
				<div class="why-tech">
					<h4 class="before-line">Sustained Support and Scalability:</h4>
					<p>Our dedication extends beyond project completion, offering ongoing support and scalable solutions for long-term growth.</p>
				</div>
			</div>
		</div>
		<div class="para-box">
			<p>TechnBrains visionary prowess shines through as the top-notch mobile app developemnt company in USA crafting the <span>BUILT BY DETERMINATION</span> app. Our relentless dedication transformed fitness aspirations into a user-centric reality. With cutting-edge technology, a robust feature set, and unwavering commitment, we have elevated the fitness industry, empowering individuals to conquer their health goals with unparalleled ease and effectiveness.</p>
		</div>
	</div>
</section>

<section class="main-slider-banner">
	<div class="container">
		<div
			class="swiper application-slider bbd-app-slider"
			data-swiper='{"slidesPerView":5,"spaceBetween":20,"centeredSlides":true,"loop":true,"breakpoints":{"1":{"slidesPerView":1},"320":{"slidesPerView":2},"500":{"slidesPerView":2},"768":{"slidesPerView":3},"1024":{"slidesPerView":4},"1200":{"slidesPerView":5}}}'
		>
			<div class="swiper-wrapper">
				<?php foreach ( $app_slides as $slide ) : ?>
				<div class="swiper-slide">
					<div class="slider-info">
						<img src="<?php echo esc_url( $img . $slide ); ?>" width="428" height="926" alt="App screenshot" loading="lazy" decoding="async">
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<section class="challenges-main">
	<div class="black-box">
		<div class="container">
			<div class="challenges-grid">
				<div class="challenges-left">
					<h2>Challenges</h2>
					<div class="wrap-box">
						<p class="before-line">Encouraging consistent and long-term app usage can be challenging in the fitness industry, where motivation tends to wane over time.</p>
					</div>
					<div class="wrap-box">
						<p class="before-line">Safeguarding user data, especially personal health information, poses a significant challenge due to privacy concerns and regulatory requirements.</p>
					</div>
					<div class="wrap-box">
						<p class="before-line">Ensuring the app works seamlessly across various devices, operating systems, and screen sizes is a complex technical challenge.</p>
					</div>
					<div class="wrap-box">
						<p class="before-line">Attracting and retaining a substantial user base in a competitive fitness app market can be difficult, requiring effective marketing and growth strategies.</p>
					</div>
				</div>
				<div class="result-right">
					<h2>Key Results</h2>
					<p class="before-line">Implemented a gamification system, push notifications for reminders and milestone celebrations, and user surveys for feedback to improve user experience.</p>
					<p class="before-line">We use encryption to protect user data and comply with industry standards like GDPR and HIPAA.</p>
					<p class="before-line">Used React Native for responsive design and cross-platform development, Robust testing for compatibility.</p>
					<p class="before-line">Referral incentives and free trial period with premium features to grow user base.</p>
				</div>
			</div>
		</div>
	</div>
</section>
