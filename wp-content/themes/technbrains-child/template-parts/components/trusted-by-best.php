<?php
/**
 * Component: Trusted By Best
 * Matches: SoftwareDevDallas/TrustedByBest/TrustedByBest.jsx
 * Hardcoded Swiper carousel — 5 slides per view, autoplay.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$img_base = get_stylesheet_directory_uri() . '/assets/images';

static $tb_instance = 0;
$tb_instance++;
$uid = 'tbb-' . $tb_instance;

$_sc = wp_json_encode( array(
	'slidesPerView' => 5,
	'spaceBetween'  => 20,
	'loop'          => true,
	'autoplay'      => array( 'delay' => 3000, 'disableOnInteraction' => false ),
	'breakpoints'   => array(
		'1'    => array( 'slidesPerView' => 1 ),
		'425'  => array( 'slidesPerView' => 2 ),
		'768'  => array( 'slidesPerView' => 3 ),
		'1024' => array( 'slidesPerView' => 4 ),
		'1200' => array( 'slidesPerView' => 5 ),
	),
) );

$trusted_list = array(
	array( 'img' => '/mob-app-dallas-new/1.svg', 'alt' => 'TrustPilot' ),
	array( 'img' => '/mob-app-dallas-new/2.svg', 'alt' => 'Design Rush' ),
	array( 'img' => '/mob-app-dallas-new/4.svg', 'alt' => 'Good Firms' ),
	array( 'img' => '/mob-app-dallas-new/5.svg', 'alt' => 'Clutch' ),
	array( 'img' => '/mob-app-dallas-new/1.svg', 'alt' => 'TrustPilot' ),
	array( 'img' => '/mob-app-dallas-new/2.svg', 'alt' => 'Design Rush' ),
	array( 'img' => '/mob-app-dallas-new/4.svg', 'alt' => 'Good Firms' ),
	array( 'img' => '/mob-app-dallas-new/5.svg', 'alt' => 'Clutch' ),
);
?>
<section class="trustedByBest">
	<div class="container">
		<h3>TRUSTED BY THE BEST IN BUSINESS</h3>
		<div class="swiper trusted-by-slider" id="<?php echo esc_attr( $uid ); ?>" data-swiper="<?php echo esc_attr( $_sc ); ?>">
			<div class="swiper-wrapper">
				<?php foreach ( $trusted_list as $item ) : ?>
				<div class="swiper-slide">
					<div class="imgWrap">
						<img
							src="<?php echo esc_url( $img_base . $item['img'] ); ?>"
							width="228"
							height="167"
							alt="<?php echo esc_attr( $item['alt'] ); ?>"
							loading="lazy"
							decoding="async"
						>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
