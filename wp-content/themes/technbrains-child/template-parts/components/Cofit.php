<?php
defined( 'ABSPATH' ) || exit;

$data        = get_query_var( 'component_data' );
$d           = $data['cofit'] ?? array();
$img         = get_stylesheet_directory_uri() . '/assets/images';
$slider_list = $d['slider_list'] ?? array();
$screen_list = $d['screen_list'] ?? array();
$mod         = get_query_var( 'component_modifier_classes', '' );

$slider_cfg = wp_json_encode( array(
	'slidesPerView'  => 5,
	'centeredSlides' => true,
	'spaceBetween'   => 10,
	'autoplay'       => array( 'delay' => 2500, 'disableOnInteraction' => false ),
	'loop'           => true,
	'breakpoints'    => array(
		'1'    => array( 'slidesPerView' => 1 ),
		'320'  => array( 'slidesPerView' => 2 ),
		'500'  => array( 'slidesPerView' => 3 ),
		'768'  => array( 'slidesPerView' => 4 ),
		'1024' => array( 'slidesPerView' => 5 ),
	),
) );

$screen_cfg = wp_json_encode( array(
	'slidesPerView'  => 6,
	'centeredSlides' => true,
	'spaceBetween'   => 0,
	'autoplay'       => array( 'delay' => 2500, 'disableOnInteraction' => false ),
	'loop'           => true,
	'breakpoints'    => array(
		'1'    => array( 'slidesPerView' => 2 ),
		'320'  => array( 'slidesPerView' => 3 ),
		'500'  => array( 'slidesPerView' => 4 ),
		'768'  => array( 'slidesPerView' => 5 ),
		'1024' => array( 'slidesPerView' => 6 ),
	),
) );
?>

<!-- Section 1: Banner + Introduction -->
<section class="cofit-sec-1<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<?php tnb_breadcrumb_html(); ?>
		<div class="row">
			<div class="Main-box">
				<div class="Inner-box1">
					<img src="<?php echo esc_url( $img . '/case-studies/cofit/Case-logo.webp' ); ?>" width="192" height="172" alt="CoFit365 logo" loading="eager" decoding="async">
					<h1 class="screen-reader-text">CoFit365: A Health &amp; Fitness Social Network App</h1>
					<p>Tackle the dual challenges of isolation and inactivity exacerbated by technology</p>
				</div>
				<div class="Inner-box2">
					<img src="<?php echo esc_url( $img . '/case-studies/cofit/Banner-right.webp' ); ?>" width="855" height="836" alt="CoFit365 banner" loading="eager" decoding="async">
				</div>
			</div>
			<div class="Intro-sec">
				<div class="Intro-Hdng">
					<h2>Introduction</h2>
				</div>
				<div class="Intro-decs">
					<div class="Main-boxes">
						<div class="Intro-Box">
							<img src="<?php echo esc_url( $img . '/case-studies/cofit/running-man.png' ); ?>" width="46" height="46" alt="Business" loading="lazy" decoding="async">
							<div class="Context-box">
								<h4>Business</h4>
								<p>Health &amp; Fitness<br>Social Network</p>
							</div>
						</div>
						<div class="Intro-Box">
							<img src="<?php echo esc_url( $img . '/case-studies/cofit/map.png' ); ?>" width="46" height="46" alt="Country" loading="lazy" decoding="async">
							<div class="Context-box">
								<h4>Country</h4>
								<p>United States</p>
							</div>
						</div>
					</div>
					<div class="Descri">
						<p>CoFit365, an innovative hybrid app, emerged from a need to tackle the dual challenges of isolation and inactivity exacerbated by technology. Founded by individuals deeply connected to both local communities and the global society, we recognize the importance of strong bonds and holistic health.</p>
						<br>
						<p>Our mission is to combat isolation and inactivity using cutting-edge technology, fostering social interaction, promoting exercise and wellness, and supporting local businesses and communities.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Section 2: Features Slider -->
<section class="cofit-sec-2">
	<div class="container">
		<div class="swiper cofit-feature-slider" data-swiper="<?php echo esc_attr( $slider_cfg ); ?>">
			<div class="swiper-wrapper">
				<?php foreach ( $slider_list as $item ) : ?>
				<div class="swiper-slide">
					<div class="Second-Sec-Inner">
						<img src="<?php echo esc_url( $img . $item['img_src'] ); ?>" width="32" height="32" alt="<?php echo esc_attr( $item['para_text'] ); ?>" loading="lazy" decoding="async">
						<p><?php echo esc_html( $item['para_text'] ); ?></p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<!-- Section 3: Business Goal -->
<section class="cofit-sec-3">
	<div class="container">
		<div class="Business-Goal">
			<div class="Image-box">
				<img src="<?php echo esc_url( $img . '/case-studies/cofit/Second-Sec-leftimg.webp' ); ?>" width="900" height="450" alt="Business goal" loading="lazy" decoding="async">
			</div>
			<div class="Busi-Contect-box">
				<h2 class="Comm-heding">Business<span> Goal</span></h2>
				<p>With our app, CoFit365 successfully achieved multiple business goals. We enhanced community engagement, combating isolation. We promoted healthier lifestyles through exercise and wellness. We facilitated connections, strengthening relationships. Additionally, we supported local businesses, fostering economic growth. Our app has proven instrumental in achieving these objectives.</p>
			</div>
		</div>
	</div>
</section>

<!-- Section 4: Pain Areas -->
<section class="cofit-sec-4">
	<div class="container">
		<div class="Fourth-Inner">
			<h2 class="Comm-heding">Pain <span>Areas</span></h2>
			<div class="F-Sec-descri">
				<div>
					<p>User Adoption</p>
					<p>Data Privacy</p>
				</div>
				<div>
					<p>Content Quality</p>
					<p>Market Competition</p>
				</div>
				<p>Technical Hurdles</p>
			</div>
		</div>
	</div>
</section>

<!-- Section 5: TechnBrains Approach -->
<section class="cofit-sec-5">
	<div class="container">
		<div class="Approach">
			<div class="Approach-Contect-box">
				<h2 class="Comm-heding">TechnBrains <span>Approach</span></h2>
				<p>Technbrain's approach to building the CoFit365 app is impressive. They excel in design, development, and cloud support, leveraging technologies like Google Firebase, LEMP Stack, React Native, and Laravel. With AWS hosting, they ensure reliability for a global audience on iOS and Android. Their commitment to combating isolation and promoting well-being, including support for local businesses and communities, is commendable.</p>
			</div>
			<div class="Approach-Image-box">
				<img src="<?php echo esc_url( $img . '/case-studies/cofit/sec-five-left.webp' ); ?>" width="900" height="450" alt="TechnBrains approach" loading="lazy" decoding="async">
			</div>
		</div>
	</div>
</section>

<!-- Section 6: Professional Hybrid App Development -->
<section class="cofit-sec-6">
	<div class="container">
		<div class="Sec-six-Inner">
			<div class="top-hding">
				<h2>Professional Hybird<span> App Development </span></h2>
				<p>Professional Hybird App Development As a professional Hybrid App Development company, TechnBrains excelled in creating the CoFit365 app with the following key strategies</p>
			</div>
			<div class="Imagebox-Content">
				<div class="left">
					<div class="Image-box">
						<div class="Image-heading">
							<img src="<?php echo esc_url( $img . '/case-studies/cofit/connection.png' ); ?>" width="32" height="32" alt="Technology Integration" loading="lazy" decoding="async">
							<h5>Technology Integration</h5>
						</div>
						<p>Seamlessly integrated technologies like React Native, Laravel, and Google Firebase to ensure robust and efficient app performance.</p>
					</div>
					<div class="Image-box">
						<div class="Image-heading">
							<img src="<?php echo esc_url( $img . '/case-studies/cofit/cross-platform.png' ); ?>" width="32" height="32" alt="Cross-Platform Compatibility" loading="lazy" decoding="async">
							<h5>Cross-Platform Compatibility</h5>
						</div>
						<p>Developed a hybrid app to reach a wider audience, making it accessible on both iOS and Android platforms.</p>
					</div>
					<div class="Image-box">
						<div class="Image-heading">
							<img src="<?php echo esc_url( $img . '/case-studies/cofit/vector.png' ); ?>" width="32" height="32" alt="User-Centric Design" loading="lazy" decoding="async">
							<h5>User-Centric Design</h5>
						</div>
						<p>Prioritized user experience by implementing an intuitive and engaging interface, enhancing user adoption.</p>
					</div>
				</div>
				<div class="Center-Image">
					<img src="<?php echo esc_url( $img . '/case-studies/cofit/sec-six-center-img.webp' ); ?>" width="292" height="674" alt="App screens" loading="lazy" decoding="async">
				</div>
				<div class="right">
					<div class="Image-box">
						<div class="Image-heading">
							<img src="<?php echo esc_url( $img . '/case-studies/cofit/resize.png' ); ?>" width="32" height="32" alt="Scalability and Reliability" loading="lazy" decoding="async">
							<h5>Scalability and Reliability</h5>
						</div>
						<p>Built the app on AWS infrastructure, guaranteeing scalability and high reliability even during peak usage.</p>
					</div>
					<div class="Image-box">
						<div class="Image-heading">
							<img src="<?php echo esc_url( $img . '/case-studies/cofit/vitruvian-man.png' ); ?>" width="32" height="32" alt="Holistic Vision" loading="lazy" decoding="async">
							<h5>Holistic Vision</h5>
						</div>
						<p>Demonstrated a holistic approach by addressing isolation, promoting wellness, and supporting local businesses, aligning with the app's mission.</p>
					</div>
					<div class="Image-box">
						<div class="Image-heading">
							<img src="<?php echo esc_url( $img . '/case-studies/cofit/satisfaction.png' ); ?>" width="32" height="32" alt="Optimized User Experience" loading="lazy" decoding="async">
							<h5>Optimized User Experience</h5>
						</div>
						<p>Our design and development teams collaborate closely to ensure that the app's interface is intuitive, responsive, and visually appealing, resulting in higher user engagement and satisfaction.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Section 7: Screen Slider -->
<section class="cofit-sec-7">
	<div class="swiper screen-slider-cofit" data-swiper="<?php echo esc_attr( $screen_cfg ); ?>">
		<div class="swiper-wrapper">
			<?php foreach ( $screen_list as $item ) : ?>
			<div class="swiper-slide">
				<div class="slides-here">
					<img src="<?php echo esc_url( $img . $item['img_src'] ); ?>" width="376" height="813" alt="CoFit365 app screen" loading="lazy" decoding="async">
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Section 8: Results & Achievements (counter) -->
<section class="cofit-sec-8 counterSec" data-counter-sec="">
	<div class="container">
		<div class="Sec-Eight-Inner">
			<img src="<?php echo esc_url( $img . '/case-studies/cofit/Sec-Eight-Left.webp' ); ?>" width="630" height="603" alt="Results and Achievements" loading="lazy" decoding="async">
			<div class="Content-Side">
				<h2>Results &amp; <br><span>Achievements</span></h2>
				<div class="counters">
					<div class="counter-box">
						<span class="counterNo" data-counter-target="100">100</span>
						<span>k+</span>
						<h4>App Downloads</h4>
					</div>
					<div class="counter-box">
						<span class="counterNo" data-counter-target="50">50</span>
						<span>k+</span>
						<h4>Active Users</h4>
					</div>
					<div class="counter-box">
						<span class="counterNo" data-counter-target="95">95</span>
						<span>%</span>
						<h4>User Satisfaction</h4>
					</div>
					<div class="counter-box">
						<span class="counterNo" data-counter-target="30">30</span>
						<span>+</span>
						<h4>Countries Reached</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
