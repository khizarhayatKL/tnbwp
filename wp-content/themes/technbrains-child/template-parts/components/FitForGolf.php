<?php
defined( 'ABSPATH' ) || exit;

$data = get_query_var( 'component_data' );
$d    = $data['fitforgolf'] ?? array();
$img  = get_stylesheet_directory_uri() . '/assets/images';
$mod  = get_query_var( 'component_modifier_classes', '' );

$app_slides   = $d['app_slides']   ?? array();
$tech_items   = $d['tech_items']   ?? array();
$result_items = $d['result_items'] ?? array();

$swiper_config = wp_json_encode( array(
	'slidesPerView'  => 5,
	'spaceBetween'   => 20,
	'centeredSlides' => true,
	'loop'           => true,
	'pagination'     => array( 'clickable' => true ),
	'breakpoints'    => array(
		'1'    => array( 'slidesPerView' => 1, 'spaceBetween' => 10 ),
		'320'  => array( 'slidesPerView' => 2, 'spaceBetween' => 10 ),
		'500'  => array( 'slidesPerView' => 3, 'spaceBetween' => 10 ),
		'768'  => array( 'slidesPerView' => 4, 'spaceBetween' => 10 ),
		'1024' => array( 'slidesPerView' => 5 ),
	),
) );
?>

<!-- Section 1: Banner -->
<section class="ffg-main-banner<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<?php tnb_breadcrumb_html(); ?>
		<div class="banner-info">
			<img src="<?php echo esc_url( $img . '/case-studies/fitforgolf/logo.png' ); ?>" width="256" height="224" alt="Fit For Golf logo" class="logo-img" loading="eager" decoding="async">
			<h2>Revolutionize Your Golf Game At 50+ With Fit For Golf:<br> One Day At A Time</h2>
			<img src="<?php echo esc_url( $img . '/case-studies/fitforgolf/devices.webp' ); ?>" width="1184" height="665" alt="devices" class="devices-img" loading="eager" decoding="async">
		</div>
	</div>
</section>

<!-- Section 2: Tech Info -->
<section class="ffg-tech-main">
	<div class="container">
		<div class="tech-grid">
			<?php foreach ( $tech_items as $item ) : ?>
			<div class="tech-flex">
				<img src="<?php echo esc_url( $img . '/case-studies/fitforgolf/' . $item['icon'] ); ?>" width="<?php echo esc_attr( $item['w'] ); ?>" height="<?php echo esc_attr( $item['h'] ); ?>" alt="<?php echo esc_attr( $item['label'] ); ?>" loading="lazy" decoding="async">
				<div class="tech-info">
					<h4><?php echo esc_html( $item['label'] ); ?></h4>
					<p>
						<?php if ( ! empty( $item['link'] ) ) : ?>
						<a href="<?php echo esc_url( $item['link'] ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $item['text'] ); ?></a>
						<?php else : ?>
						<?php echo esc_html( $item['text'] ); ?>
						<?php endif; ?>
					</p>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Section 3: About / Background -->
<section class="ffg-about-main">
	<div class="container">
		<h2>Background</h2>
		<div class="about-grid">
			<div class="about-left">
				<h4>About Fit For Golf </h4>
				<p>"Fit for Golf (50+) offers holistic golf improvement, merging physical, mental, and spiritual aspects to transform players aged 50+.</p>
			</div>
			<div class="about-right">
				<h4>Business Problem</h4>
				<ol>
					<li>
						<h5>Age-Related Golf Challenges:</h5>
						<p>Addressing the unique needs and challenges faced by golfers aged 50 and above.</p>
					</li>
					<li>
						<h5>Age-Related Golf Challenges:</h5>
						<p>Addressing the unique needs and challenges faced by golfers aged 50 and above.</p>
					</li>
					<li>
						<h5>Age-Related Golf Challenges:</h5>
						<p>Addressing the unique needs and challenges faced by golfers aged 50 and above.</p>
					</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<!-- Section 4: Key Features -->
<section class="ffg-main-key-features">
	<div class="container">
		<h2>Key<br>Features</h2>
		<div class="main-key-info">
			<div class="paltform-main">
				<h5>Platforms</h5>
				<ul>
					<li>Real-time <br>Performance Tracking</li>
					<li>Cross-Platform <br>Compatibility</li>
					<li>Cloud<br> Integration</li>
				</ul>
			</div>
			<div class="paltform-main">
				<h5>Features</h5>
				<ul>
					<li>Holistic Golf<br> Training</li>
					<li>User Personal Asset <br>Gallery</li>
					<li>Community <br>Interaction</li>
					<li>Daily <br>Alerts</li>
					<li>In-App<br> Purchases</li>
					<li>Performance <br>Analytics</li>
					<li>Daily<br> Exercise</li>
					<li>Administration</li>
					<li>Personalized <br>Coaching</li>
					<li>Future <br>Posts</li>
					<li>No Ads</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<!-- Section 5: TechnBrains Approach -->
<section class="ffg-tech-approach">
	<div class="container">
		<div class="tech-grid">
			<div class="tech-info">
				<h2>TechnBrains<br>Approach</h2>
				<ul>
					<li>
						<span>1.</span>
						<h4>Holistic Golf Integration</h4>
						<p>Technbrains meticulously integrated physical, mental, and spiritual aspects into the app, offering golfers a comprehensive approach to improving their game.</p>
					</li>
					<li>
						<span>2.</span>
						<h4>User-Centric Design</h4>
						<p>The app was crafted with a user-centric design philosophy, ensuring an intuitive interface, daily alerts, and personalized coaching for an exceptional user experience.</p>
					</li>
					<li>
						<span>3.</span>
						<h4>Quality and Performance</h4>
						<p>Technbrains employed cutting-edge technology, Google Firebase, LEMP Stack, and AWS-backed hosting, guaranteeing high performance, stability, and a seamless golf improvement journey for users.</p>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<!-- Section 6: App Slider -->
<section class="ffg-app-slider">
	<div class="container">
		<h2>Application<br>Screens</h2>
		<div class="swiper application-slider" data-swiper="<?php echo esc_attr( $swiper_config ); ?>">
			<div class="swiper-wrapper">
				<?php foreach ( $app_slides as $slide ) : ?>
				<div class="swiper-slide">
					<div class="slider-info">
						<img src="<?php echo esc_url( $img . $slide['img_src'] ); ?>" width="325" height="590" alt="App screen" loading="lazy" decoding="async">
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="swiper-pagination"></div>
		</div>
	</div>
</section>

<!-- Section 7: Key Results -->
<section class="ffg-key-result-main">
	<div class="container">
		<h2>Key<br>Results</h2>
		<p>With a team of dedicated experts, we've crafted an extraordinary golf app that redefines performance, fitness, and well-being for golfers 50+. Here are the highlights:</p>
		<div class="result-grid">
			<?php foreach ( $result_items as $item ) : ?>
			<div class="result-box">
				<img src="<?php echo esc_url( $img . '/case-studies/fitforgolf/' . $item['icon'] ); ?>" width="<?php echo esc_attr( $item['w'] ); ?>" height="<?php echo esc_attr( $item['h'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" loading="lazy" decoding="async">
				<h4><?php echo esc_html( $item['title'] ); ?></h4>
				<p><?php echo esc_html( $item['text'] ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
