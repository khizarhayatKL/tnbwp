<?php
/**
 * Component: Testimonials — mirrors Testimonials.jsx.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$img_base     = get_stylesheet_directory_uri() . '/assets/images';
$testimonials = array(
	array(
		'pro_logo'   => '/testimonials/sabrina.png',
		'pro_title'  => 'Sabrina Nawalrai Scott',
		'para'       => 'Technbrains delivered the project on time and consistently provided us with updates and feedback. Their transparency throughout the process allowed us to trust and rely on their work.',
		'video_link' => '',
	),
	array(
		'pro_logo'   => '/testimonials/profile-2.png',
		'pro_title'  => 'Adam Zwingler',
		'para'       => "The agency has grown by more than 40% in the past six months thanks to Technbrains' (formerly KoderLabs LLC) technical expertise. Their team excels at keeping projects well-organized, which helps development progress efficiently.",
		'video_link' => '',
	),
	array(
		'pro_logo'   => '/testimonials/mindi.png',
		'pro_title'  => 'Mindi Boysen',
		'para'       => "Thanks to Technbrain's development prowess. The team has gone the extra mile to exceed the needs and requirements of the internal team.",
		'video_link' => '',
	),
	array(
		'pro_logo'   => '/testimonials/profile-3.png',
		'pro_title'  => 'Chris Degenaars',
		'para'       => "Conscious of internal bandwidth, Technbrains (formerly KoderLabs LLC) excels at working independently and offering suggestions proactively. The solution outperformed expectations significantly upon launch, speaking to the team's ability to meet challenges.",
		'video_link' => '',
	),
	array(
		'pro_logo'   => '/testimonials/circle_02.gif',
		'pro_title'  => 'Tom Fuller',
		'para'       => "I wanted something unique and exceptional, thanks to the experts at Technbrains.",
		'video_link' => 'https://www.youtube.com/embed/hd8dujAwL30?si=vt26BF5n5lYKT485',
	),
	array(
		'pro_logo'   => '/testimonials/circle_01.gif',
		'pro_title'  => 'Ashleys Founder',
		'para'       => "As a marketing specialist, it took a lot of work to find a company that promised me results that, too, under my budget.",
		'video_link' => 'https://www.youtube.com/embed/61l2ReO3HuY?si=GkBFYJHnll10ObYr',
	),
	array(
		'pro_logo'   => '/testimonials/caleb.gif',
		'pro_title'  => 'Caleb Rancourt',
		'para'       => "Working with TechnBrains transformed my prototype into a live app in the store. Their team truly understood my vision, making the process collaborative and enjoyable. I'm excited to expand my app's features with them.",
		'video_link' => 'https://www.youtube.com/embed/ASfYIut7-Y8?si=PpU9qNzZ1ZkzNYL-s',
	),
);

static $t_instance = 0;
$t_instance++;
$uid      = 'testi-' . $t_instance;
$prev_cls = 'testi-prev-' . $t_instance;
$next_cls = 'testi-next-' . $t_instance;
$modal_id = 'testi-modal-' . $t_instance;
$_sc      = wp_json_encode( array(
	'slidesPerView' => 3,
	'spaceBetween'  => 30,
	'loop'          => true,
	'navigation'    => array( 'nextEl' => '.' . $next_cls, 'prevEl' => '.' . $prev_cls ),
	'pagination'    => array( 'clickable' => true ),
	'breakpoints'   => array(
		'1'    => array( 'slidesPerView' => 1 ),
		'768'  => array( 'slidesPerView' => 2 ),
		'1024' => array( 'slidesPerView' => 2 ),
		'1200' => array( 'slidesPerView' => 3 ),
	),
) );
?>
<section class="testimonialMain">
	<div class="container">
		<div class="testi-heading">
			<h2>Clients Who Demand Results. And Get Them.</h2>
			<p>From high-growth startups to enterprise systems, our clients trust us to deliver business-ready software, on time and with impact. Here&#8217;s what they say:</p>
		</div>
		<div class="main-testi-slider">
			<div class="swiper testi-slider testimonial-slider" id="<?php echo esc_attr( $uid ); ?>" data-swiper="<?php echo esc_attr( $_sc ); ?>">
				<div class="swiper-wrapper">
					<?php foreach ( $testimonials as $item ) : ?>
					<div class="swiper-slide">
						<div class="slider-box">
							<div class="top-info">
								<?php if ( ! empty( $item['video_link'] ) ) : ?>
								<div class="video-icon" data-video-url="<?php echo esc_attr( $item['video_link'] ); ?>" data-modal="<?php echo esc_attr( $modal_id ); ?>" role="button" aria-label="Play video">
									<img
										class="pro-img"
										src="<?php echo esc_url( $img_base . $item['pro_logo'] ); ?>"
										width="180"
										height="180"
										alt="<?php echo esc_attr( $item['pro_title'] ); ?>"
										loading="lazy"
									>
								</div>
								<?php else : ?>
								<img
									class="pro-img"
									src="<?php echo esc_url( $img_base . $item['pro_logo'] ); ?>"
									width="180"
									height="180"
									alt="<?php echo esc_attr( $item['pro_title'] ); ?>"
									loading="lazy"
								>
								<?php endif; ?>
								<div class="reviews">
									<span><?php echo esc_html( $item['pro_title'] ); ?></span>
									<img
										src="<?php echo esc_url( $img_base . '/testimonials/comma.png' ); ?>"
										width="100"
										height="100"
										alt=""
										loading="lazy"
									>
									<p><?php echo esc_html( $item['para'] ); ?></p>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<div class="swiper-pagination"></div>
			</div>
			<div class="testimo-button-prev <?php echo esc_attr( $prev_cls ); ?>" role="button" aria-label="Previous">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" focusable="false" aria-hidden="true"><path fill-rule="evenodd" d="M11.03 3.97a.75.75 0 0 1 0 1.06l-6.22 6.22H21a.75.75 0 0 1 0 1.5H4.81l6.22 6.22a.75.75 0 1 1-1.06 1.06l-7.5-7.5a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd"/></svg>
			</div>
			<div class="testimo-button-next <?php echo esc_attr( $next_cls ); ?>" role="button" aria-label="Next">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" focusable="false" aria-hidden="true"><path fill-rule="evenodd" d="M12.97 3.97a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06l6.22-6.22H3a.75.75 0 0 1 0-1.5h16.19l-6.22-6.22a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/></svg>
			</div>
		</div>
	</div>
</section>

<!-- Video modal -->
<div id="<?php echo esc_attr( $modal_id ); ?>" class="testi-video-modal" aria-hidden="true" style="display:none">
	<div class="testi-video-overlay"></div>
	<div class="testi-video-inner">
		<button class="testi-video-close" aria-label="Close">&times;</button>
<!-- 		<iframe src="" width="660" height="415" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
	<iframe src="about:blank" width="660" height="415" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

	</div>
</div>
