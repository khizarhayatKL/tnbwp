<?php
defined( 'ABSPATH' ) || exit;

$mod     = get_query_var( 'component_modifier_classes', '' );
$img     = get_stylesheet_directory_uri() . '/assets/images/case-study-slider';
$current = rtrim( wp_parse_url( get_permalink(), PHP_URL_PATH ), '/' );

$slides = array(
	array(
		'title'   => 'Built By Determination',
		'content' => 'Transform Your Body, Get Fit!',
		'img'     => '/slide-1.png',
		'width'   => 252,
		'height'  => 375,
		'class'   => 'red-box',
		'link'    => '/case-studies/built-by-determination/',
	),
	array(
		'title'   => 'FixCarSharer Mobile app',
		'content' => 'Set Your Preferences and Ride Your Way !',
		'img'     => '/slide-2.png',
		'width'   => 284,
		'height'  => 375,
		'class'   => 'purple-box',
		'link'    => '/case-studies/fixcarsharer/',
	),
	array(
		'title'   => 'Cofit 365 Mobile app',
		'content' => 'Tackle the dual challenges of isolation and inactivity exacerbated by technology',
		'img'     => '/cofit-2.png',
		'width'   => 290,
		'height'  => 355,
		'class'   => 'green-box',
		'link'    => '/case-studies/cofit/',
	),
	array(
		'title'   => 'Support XDR',
		'content' => 'With Laundry Delivery & Pick up Websites & Apps Development',
		'img'     => '/slide-4.png',
		'width'   => 491,
		'height'  => 380,
		'class'   => 'blue-box',
		'link'    => '/case-studies/support-xdr/',
	),
	array(
		'title'   => '05 Sphere of fit',
		'content' => 'Merge cutting-edge data and research to enhance fitness and overall Life Wellness',
		'img'     => '/slide-5.png',
		'width'   => 224,
		'height'  => 360,
		'class'   => 'orange-box',
		'link'    => '/case-studies/the-5-spheres-of-fit/',
	),
	array(
		'title'   => 'Soccerfy',
		'content' => 'The right solution for big-time soccer bettors!',
		'img'     => '/soccerfy.png',
		'width'   => 256,
		'height'  => 350,
		'class'   => 'moz-green-box',
		'link'    => '/case-studies/soccerfy/',
	),
	array(
		'title'   => 'Streamline Live',
		'content' => 'A groundbreaking location-based social media platform for content sharing',
		'img'     => '/stream.png',
		'width'   => 347,
		'height'  => 395,
		'class'   => 'white-blue-box',
		'link'    => '/case-studies/streamline-live/',
	),
	array(
		'title'   => 'Whitetail Almanac',
		'content' => 'Whitetail Almanac The Ultimate Deer Hunting Toolbox You Need',
		'img'     => '/white.png',
		'width'   => 306,
		'height'  => 355,
		'class'   => 'dark-green-box',
		'link'    => '/case-studies/white-tail/',
	),
	array(
		'title'   => 'Cruze4cash',
		'content' => 'Explore new ways to look for properties',
		'img'     => '/c4c.png',
		'width'   => 164,
		'height'  => 350,
		'class'   => 'light-blue-box',
		'link'    => '/case-studies/cruze4cash/',
	),
	array(
		'title'   => 'Fit For Golf',
		'content' => 'Revolutionize Your Golf Game At 50+ With Fit For Golf One Day At A Time',
		'img'     => '/fitforgolf.png',
		'width'   => 420,
		'height'  => 360,
		'class'   => 'sea-green-box',
		'link'    => '/case-studies/fitforgolf/',
	),
	array(
		'title'   => 'Qpon',
		'content' => 'Unlock Savings, Discover Deals, and Get More with Qpon',
		'img'     => '/qpon.png',
		'width'   => 374,
		'height'  => 420,
		'class'   => 'light-green-box',
		'link'    => '/case-studies/qpon/',
	),
);

$swiper_cfg = wp_json_encode( array(
	'slidesPerView'  => 4,
	'spaceBetween'   => 0,
	'centeredSlides' => true,
	'loop'           => true,
	'navigation'     => true,
	'breakpoints'    => array(
		'1'    => array( 'slidesPerView' => 1 ),
		'320'  => array( 'slidesPerView' => 1 ),
		'768'  => array( 'slidesPerView' => 2 ),
		'1100' => array( 'slidesPerView' => 3 ),
		'1600' => array( 'slidesPerView' => 4 ),
	),
) );
?>

<section class="main-slider<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<h4>Browse Our Successful App Projects.</h4>
	<h2>Our Projects</h2>
	<div
		class="swiper case-slider custom-case-slider"
		data-swiper="<?php echo esc_attr( $swiper_cfg ); ?>"
	>
		<div class="swiper-wrapper">
			<?php foreach ( $slides as $slide ) :
				if ( rtrim( $slide['link'], '/' ) === $current ) {
					continue;
				}
			?>
			<div class="swiper-slide">
				<div class="slider-info <?php echo esc_attr( $slide['class'] ); ?>">
					<a href="<?php echo esc_url( home_url( $slide['link'] ) ); ?>">
						<img
							src="<?php echo esc_url( $img . $slide['img'] ); ?>"
							width="<?php echo esc_attr( $slide['width'] ); ?>"
							height="<?php echo esc_attr( $slide['height'] ); ?>"
							alt="<?php echo esc_attr( $slide['title'] ); ?>"
							loading="lazy"
							decoding="async"
						>
						<h3><?php echo esc_html( $slide['title'] ); ?></h3>
						<p><?php echo esc_html( $slide['content'] ); ?></p>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" aria-hidden="true" focusable="false"><path d="M256 8c137 0 248 111 248 248S393 504 256 504 8 393 8 256 119 8 256 8zm-28.9 143.6l75.5 72.4H120c-13.3 0-24 10.7-24 24v16c0 13.3 10.7 24 24 24h182.6l-75.5 72.4c-9.7 9.4-9.9 24.9-.4 34.4l11 10.9c9.4 9.4 24.6 9.4 33.9 0L404.3 273c9.4-9.4 9.4-24.6 0-33.9L271.6 106.3c-9.4-9.4-24.6-9.4-33.9 0l-11 10.9c-9.5 9.6-9.3 25.1.4 34.4z"/></svg>
					</a>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>
	</div>
</section>
