<?php
defined( 'ABSPATH' ) || exit;

$mod  = get_query_var( 'component_modifier_classes', '' );
$base = get_stylesheet_directory_uri() . '/assets/images';

$slides = array(
	array( 'src' => 'seo-services/1.png', 'w' => 99,  'h' => 55,  'alt' => 'Partner logo' ),
	array( 'src' => 'seo-services/2.png', 'w' => 173, 'h' => 97,  'alt' => 'Partner logo' ),
	array( 'src' => 'seo-services/3.png', 'w' => 139, 'h' => 79,  'alt' => 'Partner logo' ),
	array( 'src' => 'seo-services/4.png', 'w' => 139, 'h' => 79,  'alt' => 'Partner logo' ),
	array( 'src' => 'seo-services/5.png', 'w' => 97,  'h' => 55,  'alt' => 'Partner logo' ),
	array( 'src' => 'seo-services/6.png', 'w' => 171, 'h' => 97,  'alt' => 'Partner logo' ),
	array( 'src' => 'seo-services/1.png', 'w' => 99,  'h' => 55,  'alt' => 'Partner logo' ),
	array( 'src' => 'seo-services/2.png', 'w' => 173, 'h' => 97,  'alt' => 'Partner logo' ),
	array( 'src' => 'seo-services/3.png', 'w' => 139, 'h' => 79,  'alt' => 'Partner logo' ),
	array( 'src' => 'seo-services/4.png', 'w' => 139, 'h' => 79,  'alt' => 'Partner logo' ),
	array( 'src' => 'seo-services/5.png', 'w' => 97,  'h' => 55,  'alt' => 'Partner logo' ),
	array( 'src' => 'seo-services/6.png', 'w' => 171, 'h' => 97,  'alt' => 'Partner logo' ),
);

$swiper_config = wp_json_encode( array(
	'slidesPerView' => 1,
	'spaceBetween'  => 20,
	'loop'          => true,
	'navigation'    => true,
	'navigation'    => array(
		'nextEl' => '.swiper-button-next',
		'prevEl' => '.swiper-button-prev',
	),
	'autoplay'      => array( 'delay' => 2500, 'disableOnInteraction' => false ),
	'breakpoints'   => array(
		'400'  => array( 'slidesPerView' => 2 ),
		'600'  => array( 'slidesPerView' => 3 ),
		'768'  => array( 'slidesPerView' => 4 ),
		'1200' => array( 'slidesPerView' => 6 ),
	),
) );
?>
<section class="seoPaidSlider<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="ps-info">
			<h4><span>Paid Social partner</span> for many startups and Fortune 500 brands:</h4>
			<div class="ps-slider-wrap">
				<div class="swiper paid-slider" data-swiper="<?php echo esc_attr( $swiper_config ); ?>">
					<div class="swiper-wrapper">
						<?php foreach ( $slides as $slide ) : ?>
						<div class="swiper-slide">
							<div class="ps-slide-item">
								<img
									src="<?php echo esc_url( $base . '/' . $slide['src'] ); ?>"
									width="<?php echo esc_attr( $slide['w'] ); ?>"
									height="<?php echo esc_attr( $slide['h'] ); ?>"
									alt="<?php echo esc_attr( $slide['alt'] ); ?>"
									loading="lazy" decoding="async"
								>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				</div>
			</div>
		</div>
	</div>
</section>
