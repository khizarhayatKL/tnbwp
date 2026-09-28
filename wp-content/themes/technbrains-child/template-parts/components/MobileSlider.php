<?php
defined( 'ABSPATH' ) || exit;

$img = get_stylesheet_directory_uri() . '/assets/images';
$mod = get_query_var( 'component_modifier_classes', '' );

$slides = array(
	'/case-studies/wedding-app/mob-1.png',
	'/case-studies/wedding-app/mob-2.png',
	'/case-studies/wedding-app/mob-3.png',
	'/case-studies/wedding-app/mob-4.png',
	'/case-studies/wedding-app/mob-5.png',
	'/case-studies/wedding-app/mob-1.png',
	'/case-studies/wedding-app/mob-2.png',
	'/case-studies/wedding-app/mob-3.png',
	'/case-studies/wedding-app/mob-4.png',
	'/case-studies/wedding-app/mob-5.png',
	'/case-studies/wedding-app/mob-1.png',
	'/case-studies/wedding-app/mob-2.png',
	'/case-studies/wedding-app/mob-3.png',
	'/case-studies/wedding-app/mob-4.png',
	'/case-studies/wedding-app/mob-5.png',
);

$swiper_config = json_encode( array(
	'slidesPerView'    => 6,
	'centeredSlides'   => true,
	'autoplay'         => array( 'delay' => 3000, 'disableOnInteraction' => false ),
	'spaceBetween'     => 40,
	'loop'             => true,
	'breakpoints'      => array(
		'1'   => array( 'slidesPerView' => 1 ),
		'320' => array( 'slidesPerView' => 1 ),
		'500' => array( 'slidesPerView' => 1, 'centeredSlides' => false ),
		'768' => array( 'slidesPerView' => 4 ),
		'1024'=> array( 'slidesPerView' => 4 ),
	),
) );
?>
<section class="app-slider<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="swiper wedding-app-slider" data-swiper="<?php echo esc_attr( $swiper_config ); ?>">
		<div class="swiper-wrapper">
			<?php foreach ( $slides as $slide ) : ?>
			<div class="swiper-slide">
				<div class="slider-info">
					<img src="<?php echo esc_url( $img . $slide ); ?>" width="290" height="600" alt="app screen" loading="lazy" decoding="async">
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
