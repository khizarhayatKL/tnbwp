<?php
/**
 * Component: App Portfolio
 *
 * Data key : app_portfolio
 * Fields   : heading_html (wp_kses span) + content → dallasContent block (NYC/Dallas)
 *            main_heading + sub_heading → content block (Houston — white/uppercase h2 + h4)
 *            neither → default "Portfolio" content block
 * Listing  : hardcoded portfolioList (same as Next.js mockup)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data      = get_query_var( 'component_data' );
$d         = $data['app_portfolio'] ?? array();
$mod       = get_query_var( 'component_modifier_classes', '' );
$img_base  = get_stylesheet_directory_uri() . '/assets/images';
$kses_h    = array( 'span' => array() );
$kses_br   = array( 'br' => array() );

static $ap_instance = 0;
$ap_instance++;
$uid = 'ap-' . $ap_instance;

$_sc = wp_json_encode( array(
	'slidesPerView' => 2,
	'loop'          => true,
	'autoHeight'    => true,
	'spaceBetween'  => 50,
	'autoplay'      => array( 'delay' => 3000, 'disableOnInteraction' => false, 'pauseOnMouseEnter' => true ),
	'navigation'    => array(
		'nextEl' => '#' . $uid . ' .ap-next',
		'prevEl' => '#' . $uid . ' .ap-prev',
	),
	'breakpoints'   => array(
		'1'    => array( 'slidesPerView' => 1, 'spaceBetween' => 20 ),
		'768'  => array( 'slidesPerView' => 1, 'spaceBetween' => 20 ),
		'1200' => array( 'slidesPerView' => 2, 'spaceBetween' => 20 ),
		'1400' => array( 'slidesPerView' => 2, 'spaceBetween' => 50 ),
		'1680' => array( 'slidesPerView' => 2, 'spaceBetween' => 30 ),
	),
) );

$portfolio_list = array(
	array(
		'classes'      => 'wedding-app',
		'main_img'     => '/mobile-app-new/port-1.webp',
		'main_width'   => '222',
		'main_height'  => '352',
		'main_alt'     => 'The Wedding App',
		'logo'         => '/mobile-app-new/plog-1.png',
		'logo_width'   => '113',
		'logo_height'  => '55',
		'content'      => "A mobile wedding planning app with shared schedules, RSVP management, and vendor coordination, built for fast-moving, high-coordination events like New York weddings.",
		'first_numb'   => '72%',
		'first_para'   => 'RSVP response<br>boost.',
		'second_numb'  => '72%',
		'second_para'  => 'Vendor <br>coordination.',
		'gradient'     => 'linear-gradient(117deg, rgba(164,151,134,1) 38%, rgba(44,44,44,1) 38%)',
	),
	array(
		'classes'      => 'tatt-ai',
		'main_img'     => '/mobile-app-new/port-2.webp',
		'main_width'   => '222',
		'main_height'  => '352',
		'main_alt'     => 'Tatt.ai',
		'logo'         => '/mobile-app-new/plog-2.png',
		'logo_width'   => '153',
		'logo_height'  => '38',
		'content'      => "An AI tattoo-design app with realistic placement previews and artist-client collaboration tools. On-device previews keep the experience fast and private across iOS and Android.",
		'first_numb'   => '80%',
		'first_para'   => 'Faster design<br>approvals.',
		'second_numb'  => '75%',
		'second_para'  => "Artist-client <br>collaboration",
		'gradient'     => 'linear-gradient(117deg, #C51E06 38%, #4D140C 38%)',
	),
	array(
		'classes'      => 'crasher',
		'main_img'     => '/mobile-app-new/port-3.webp',
		'main_width'   => '222',
		'main_height'  => '352',
		'main_alt'     => 'Fix Car Sharer',
		'logo'         => '/mobile-app-new/plog-3.png',
		'logo_width'   => '84',
		'logo_height'  => '57',
		'content'      => "A carpooling app with real-time tracking, preference-based matching, QR-code ride start, and in-app payments. Built to improve rider safety, cut per-trip emissions, and keep pickups on time. Where it fits: dense-commute cities like New York, where shared rides ease congestion.",
		'first_numb'   => '60%',
		'first_para'   => 'Lower <br>emissions',
		'brand'        => 'FixCarSharer',
		'second_numb'  => '85%',
		'second_para'  => 'User <br>satisfaction',
		'gradient'     => 'linear-gradient(117deg, #170429 38%, #400C71 38%)',
	),
	array(
		'classes'      => 'determination',
		'main_img'     => '/mobile-app-new/port-4.webp',
		'main_width'   => '222',
		'main_height'  => '352',
		'main_alt'     => 'Built By Determination',
		'logo'         => '/mobile-app-new/plog-4.png',
		'logo_width'   => '168',
		'logo_height'  => '59',
		'content'      => "A fitness app with personalized workouts, progress tracking, certified trainers, and gamification, backed by secure data handling. Built to hold user engagement and long-term retention. Where it fits: the always-on schedules of NYC professionals and studio members.",
		'first_numb'   => '70%',
		'first_para'   => 'Consistent<br>workouts',
		'second_numb'  => '78%',
		'second_para'  => 'User retention',
		'gradient'     => 'linear-gradient(117deg, #BF292E 38%, #242424 38%)',
	),
	array(
		'classes'      => 'golf',
		'main_img'     => '/mobile-app-new/port-5.webp',
		'main_width'   => '222',
		'main_height'  => '352',
		'main_alt'     => 'Fit For Golf',
		'logo'         => '/mobile-app-new/plog-5.png',
		'logo_width'   => '105',
		'logo_height'  => '92',
		'content'      => "A golf app for players over 50, combining fitness, mental resilience, real-time tracking, personalized coaching, and community. Built to improve on-course performance and coaching engagement.",
		'first_numb'   => '65%',
		'first_para'   => 'Performance<br>improvement.',
		'second_numb'  => '80%',
		'second_para'  => 'Coaching<br>engagement.',
		'gradient'     => 'linear-gradient(117deg, #3B8EEC 38%, #034896 38%)',
	),
	array(
		'classes'      => 'animalac',
		'main_img'     => '/mobile-app-new/port-6.webp',
		'main_width'   => '222',
		'main_height'  => '352',
		'main_alt'     => 'Whitetail Almanac',
		'logo'         => '/mobile-app-new/plog-6.png',
		'logo_width'   => '188',
		'logo_height'  => '54',
		'content'      => "An ad-free hunting app with GPS, weather forecasts, and deer-pattern tracking for precision and safety in the field. Built on a LEMP stack for reliability.",
		'first_numb'   => '90%',
		'first_para'   => 'Performance<br>improvement',
		'second_numb'  => '85%',
		'second_para'  => 'GPS feature<br> adoption',
		'gradient'     => 'linear-gradient(117deg, #033219 38%, #007837 38%)',
	),
	array(
		'classes'      => 'spheres',
		'main_img'     => '/mobile-app-new/port-7.webp',
		'main_width'   => '222',
		'main_height'  => '352',
		'main_alt'     => 'The 5 Spheres of Fit',
		'logo'         => '/mobile-app-new/plog-7.png',
		'logo_width'   => '106',
		'logo_height'  => '91',
		'content'      => 'Holistic wellness app covering fitness, mental clarity, social connections, financial planning, and education. Secure, user-friendly, and expertly curated for balance.',
		'first_numb'   => '68%',
		'first_para'   => 'Wellness<br>improvement.',
		'second_numb'  => '72%',
		'second_para'  => 'Retention<br>rate.',
		'gradient'     => 'linear-gradient(117deg, #5250A2 38%, #EDEDFF 38%)',
	),
	array(
		'classes'      => 'soccer',
		'main_img'     => '/mobile-app-new/port-8.webp',
		'main_width'   => '222',
		'main_height'  => '352',
		'main_alt'     => 'Soccerfy',
		'logo'         => '/mobile-app-new/plog-8.png',
		'logo_width'   => '118',
		'logo_height'  => '78',
		'content'      => 'A feature-rich soccer betting app offering real-time updates, user-friendly navigation, and engaging competition. Crafted with innovative designs for a seamless and thrilling experience.',
		'first_numb'   => '80%',
		'first_para'   => 'User engagement<br>rise.',
		'second_numb'  => '75%',
		'second_para'  => 'Better profit<br>growth.',
		'gradient'     => 'linear-gradient(117deg, #2FDD5B 38%, #F9FFE1 38%)',
	),
	array(
		'classes'      => 'cruze',
		'main_img'     => '/mobile-app-new/port-9.webp',
		'main_width'   => '222',
		'main_height'  => '352',
		'main_alt'     => 'Cruze4Cash',
		'logo'         => '/mobile-app-new/plog-9.png',
		'logo_width'   => '215',
		'logo_height'  => '66',
		'content'      => 'An efficient property finder app delivering instant access to property details, secure navigation, and user-friendly browsing. Simplifies property hunting with a sleek, minimal design.',
		'first_numb'   => '70%',
		'first_para'   => 'Faster property<br>searches.',
		'second_numb'  => '85%',
		'second_para'  => 'Navigation<br>satisfaction.',
		'gradient'     => 'linear-gradient(117deg, #0170FF 38%, #D0E6FF 38%)',
	),
	array(
		'classes'      => 'stream',
		'main_img'     => '/mobile-app-new/port-10.webp',
		'main_width'   => '222',
		'main_height'  => '352',
		'main_alt'     => 'Streamline Live',
		'logo'         => '/mobile-app-new/plog-10.png',
		'logo_width'   => '56',
		'logo_height'  => '56',
		'brand'        => 'Streamline Live',
		'content'      => 'Location-based social media platform for real-time content sharing and engagement. Features AI moderation, scalable infrastructure, and personalized feeds.',
		'first_numb'   => '65%',
		'first_para'   => 'Content generation<br>boost.',
		'second_numb'  => '78%',
		'second_para'  => 'Retention via<br>personalization.',
		'gradient'     => 'linear-gradient(117deg, #24A9EB 38%, #006596 38%)',
	),
);
?>
<section class="portfolioSec<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<?php if ( ! empty( $d['heading_html'] ) ) : ?>
		<div class="dallasContent">
			<h2><?php echo wp_kses( $d['heading_html'], $kses_h ); ?></h2>
			<?php if ( ! empty( $d['content'] ) ) : ?>
			<p><?php echo wp_kses_post( $d['content'] ); ?></p>
			<?php endif; ?>
		</div>
		<?php elseif ( ! empty( $d['main_heading'] ) ) : ?>
		<div class="content">
			<h2><?php echo esc_html( $d['main_heading'] ); ?></h2>
			<h4><?php echo ! empty( $d['sub_heading'] ) ? esc_html( $d['sub_heading'] ) : 'We did it for them, We can do it for you!'; ?></h4>
		</div>
		<?php else : ?>
		<div class="content">
			<h2>Portfolio</h2>
			<h4>We did it for them, We can do it for you!</h4>
		</div>
		<?php endif; ?>

		<div class="portfolioSliders">
			<div class="swiper portfolio-app-slider" id="<?php echo esc_attr( $uid ); ?>" data-swiper="<?php echo esc_attr( $_sc ); ?>">
				<div class="swiper-wrapper">
					<?php foreach ( $portfolio_list as $item ) : ?>
					<div class="swiper-slide">
						<div
							class="singleSLide <?php echo esc_attr( $item['classes'] ); ?>"
							style="background: <?php echo esc_attr( $item['gradient'] ); ?>;"
						>
							<div class="contentSlide">
								<div class="left">
									<img
										src="<?php echo esc_url( $img_base . $item['main_img'] ); ?>"
										width="<?php echo (int) $item['main_width']; ?>"
										height="<?php echo (int) $item['main_height']; ?>"
										alt="<?php echo esc_attr( $item['main_alt'] ); ?>"
										loading="lazy"
										decoding="async"
									>
								</div>
								<div class="right">
									<img
										src="<?php echo esc_url( $img_base . $item['logo'] ); ?>"
										width="<?php echo (int) $item['logo_width']; ?>"
										height="<?php echo (int) $item['logo_height']; ?>"
										alt="logo"
										loading="lazy"
										decoding="async"
									>
									<p><?php if ( ! empty( $item['brand'] ) ) : ?><b><?php echo esc_html( $item['brand'] ); ?></b> <?php endif; ?><?php echo esc_html( $item['content'] ); ?></p>
									<div class="boxWrap">
										<div class="boxOne">
											<strong><?php echo esc_html( $item['first_numb'] ); ?></strong>
											<p><?php echo wp_kses( $item['first_para'], $kses_br ); ?></p>
										</div>
										<div class="boxTwo">
											<strong><?php echo esc_html( $item['second_numb'] ); ?></strong>
											<p><?php echo wp_kses( $item['second_para'], $kses_br ); ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<div class="ap-arrows" role="group" aria-label="Portfolio navigation">
					<button type="button" class="ap-btn ap-prev" aria-label="Previous slide">
						<svg class="ap-icon-flip" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"></path></svg>
					</button>
					<button type="button" class="ap-btn ap-next" aria-label="Next slide">
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"></path></svg>
					</button>
				</div>
			</div>
		</div>
	</div>
</section>
