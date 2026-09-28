<?php
defined( 'ABSPATH' ) || exit;

$img_base = get_stylesheet_directory_uri() . '/assets/images';

$port_listing = array(
	array(
		'main_img'    => '/port-sec/mobile-1.webp',
		'main_width'  => '513',
		'main_height' => '641',
		'alt_text'    => 'Whitetail',
		'title'       => 'Whitetail Almanac',
		'sec_class'   => 'newbg-shadow',
		'app_link'    => 'https://apps.apple.com/us/app/whitetail-almanac/id1603886153',
		'play_link'   => 'https://play.google.com/store/apps/details?id=com.whitetail.almanac',
		'para_html'   => '<p>Elevate your hunting experience with Whitetail Almanac by TechnBrains. Our app offers precision, safety, and adventure powered by LEMP Stack, React Native, and Laravel. Covering Florida, USA, we provide a user-friendly hunting calendar predictor with no ads, daily patterns, weather forecasts, and more. TechnBrains, a top Laravel Development Company, ensures bug-free, secure, and high-performance applications. Choose us for versatile expertise, cost-effective solutions, and on-time delivery. Join us for a superior hunting journey!</p>',
	),
	array(
		'main_img'    => '/port-sec/mobile-2.webp',
		'main_width'  => '517',
		'main_height' => '646',
		'alt_text'    => 'Fix Car Sharer',
		'title'       => 'Fix Car Sharer',
		'sec_class'   => 'newbg-shadow-2',
		'app_link'    => 'https://apps.apple.com/us/app/fix-car-sharer/id1666244616',
		'play_link'   => '',
		'para_html'   => '<p>Revolutionize your commute with Fix Car Sharer by TechnBrains! Our app offers preference-based matchmaking, real-time tracking, and seamless payment integration, making carpooling sustainable and convenient. Join our community and embrace efficient, cost-saving, and eco-friendly transportation today!</p>',
	),
	array(
		'main_img'    => '/port-sec/mobile-3.webp',
		'main_width'  => '517',
		'main_height' => '646',
		'alt_text'    => 'BBD',
		'title'       => 'Built By Determination',
		'sec_class'   => 'newbg-shadow-3',
		'app_link'    => 'https://apps.apple.com/us/app/built-by-determination/id1671567244',
		'play_link'   => 'https://play.google.com/store/apps/details?id=com.builtbydetermination',
		'para_html'   => '<p>Elevate Fitness with Built By Determination by TechnBrains: Your Ultimate Health Companion in the USA. Join us for a transformative fitness journey.</p><h4>Key Features:</h4><ul><li>Fit Connect: Connect with fitness enthusiasts.</li><li>GYM store: Shop for fitness essentials.</li><li>Nutrition Tracking: Fuel your journey.</li><li>Personalized Workouts: Tailored just for you.</li><li>Progress Tracking: Witness your transformation.</li><li>Certified Fitness Trainers: Expert guidance.</li></ul><p>Join us in conquering fitness goals with &#8220;Built By Determination&#8221; &#8211; where determination meets innovation.</p>',
	),
	array(
		'main_img'    => '/port-sec/mobile-4.webp',
		'main_width'  => '517',
		'main_height' => '646',
		'alt_text'    => 'Nynja',
		'title'       => 'Nynja',
		'sec_class'   => 'newbg-shadow-4',
		'app_link'    => 'https://itunes.apple.com/ua/app/nynja-communications-superapp/id1260052496',
		'play_link'   => 'https://play.google.com/store/apps/details?id=com.nynja.mobile.communicator',
		'para_html'   => '<p>Discover Nynja, the next-generation app transforming remote work. With Nynja, your team can collaborate effortlessly through secure chats, share files seamlessly, and conduct productive meetings from anywhere. Experience a new era of efficiency and connectivity with Nynja &#8211; your all-in-one solution for remote team success.</p>',
	),
);

$kses_para = array(
	'p'      => array(),
	'h4'     => array(),
	'ul'     => array(),
	'li'     => array(),
	'strong' => array(),
	'em'     => array(),
);
?>
<section class="innerPortfolioMain">
	<div class="container">
		<div class="top-info">
			<h5>PORTFOLIO</h5>
			<h3>A Glimpse of Our Achievements</h3>
			<p>There are some fantastic projects that we have completed in the recent past.<br>Have a look at a few of the exceptional jobs that we are proud of.</p>
		</div>
	</div>

	<?php foreach ( $port_listing as $item ) : ?>
	<div class="sec-rePort <?php echo esc_attr( $item['sec_class'] ); ?>">
		<div class="container">
			<div class="port-grid">
				<div class="left-info">
					<div class="pic">
						<img
							src="<?php echo esc_url( $img_base . $item['main_img'] ); ?>"
							width="<?php echo (int) $item['main_width']; ?>"
							height="<?php echo (int) $item['main_height']; ?>"
							alt="<?php echo esc_attr( $item['alt_text'] ); ?>"
							loading="lazy"
							decoding="async"
						>
					</div>
				</div>
				<div class="right-info">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<?php echo wp_kses( $item['para_html'], $kses_para ); ?>
					<h4>Download App</h4>
					<?php if ( ! empty( $item['app_link'] ) ) : ?>
					<a href="<?php echo esc_url( $item['app_link'] ); ?>" target="_blank" rel="noopener noreferrer">
						<img
							src="<?php echo esc_url( $img_base . '/app-stor.png' ); ?>"
							width="157"
							height="51"
							alt="Apple App Store"
							loading="lazy"
							decoding="async"
						>
					</a>
					<?php endif; ?>
					<?php if ( ! empty( $item['play_link'] ) ) : ?>
					<a href="<?php echo esc_url( $item['play_link'] ); ?>" target="_blank" rel="noopener noreferrer">
						<img
							src="<?php echo esc_url( $img_base . '/google-store.png' ); ?>"
							width="153"
							height="50"
							alt="Google Play Store"
							loading="lazy"
							decoding="async"
						>
					</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</section>
