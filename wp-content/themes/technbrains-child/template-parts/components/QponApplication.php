<?php
defined( 'ABSPATH' ) || exit;

$data   = get_query_var( 'component_data' );
$d      = $data['qpon_application'] ?? array();
$img    = get_stylesheet_directory_uri() . '/assets/images';
$mod    = get_query_var( 'component_modifier_classes', '' );
$slides = $d['slides'] ?? array();

$swiper_cfg = wp_json_encode( array(
	'slidesPerView'  => 5,
	'centeredSlides' => true,
	'spaceBetween'   => 0,
	'autoplay'       => array( 'delay' => 2500, 'disableOnInteraction' => false ),
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
<section class="qpon-application<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="application-content">
			<h2>Application<br>Screens</h2>
			<div class="swiper explore-slider app-slider" data-swiper="<?php echo esc_attr( $swiper_cfg ); ?>">
				<div class="swiper-wrapper">
					<?php foreach ( $slides as $slide ) : ?>
					<div class="swiper-slide">
						<div class="slider-info">
							<img src="<?php echo esc_url( $img . $slide['img'] ); ?>" width="570" height="830" alt="qpon-screen" loading="lazy" decoding="async">
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
	</div>
</section>
