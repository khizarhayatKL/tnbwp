<?php
defined( 'ABSPATH' ) || exit;

$data        = get_query_var( 'component_data' );
$d           = $data['plate_mockup'] ?? array();
$img         = get_stylesheet_directory_uri() . '/assets/images';
$mod         = get_query_var( 'component_modifier_classes', '' );
$side_img    = $d['side_img'] ?? '';
$img_w       = $d['img_w'] ?? 1252;
$img_h       = $d['img_h'] ?? 1360;
$mob_listing = $d['mob_listing'] ?? array();

$swiper_config = wp_json_encode( array(
	'slidesPerView'  => 6,
	'centeredSlides' => true,
	'spaceBetween'   => 20,
	'autoplay'       => array( 'delay' => 2500, 'disableOnInteraction' => false ),
	'loop'           => true,
	'breakpoints'    => array(
		'1'   => array( 'slidesPerView' => 1 ),
		'320' => array( 'slidesPerView' => 1 ),
		'500' => array( 'slidesPerView' => 1 ),
		'768' => array( 'slidesPerView' => 3 ),
	),
) );
?>
<section class="plateMockup<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="gridSec">
			<img src="<?php echo esc_url( $img . $side_img ); ?>" width="<?php echo esc_attr( $img_w ); ?>" height="<?php echo esc_attr( $img_h ); ?>" alt="sideImg" loading="lazy" decoding="async">
		</div>
		<div class="mobSlider">
			<div class="sliderImg">
				<div class="swiper screen-slider-tatt-plateTalk" data-swiper="<?php echo esc_attr( $swiper_config ); ?>">
					<div class="swiper-wrapper">
						<?php foreach ( $mob_listing as $slide ) : ?>
						<div class="swiper-slide">
							<div class="slides-here">
								<img src="<?php echo esc_url( $img . $slide['img'] ); ?>" width="290" height="699" alt="slider-images" loading="lazy" decoding="async">
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
