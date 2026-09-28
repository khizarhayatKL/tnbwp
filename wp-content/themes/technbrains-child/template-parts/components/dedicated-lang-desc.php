<?php
/**
 * Component: Dedicated Language Description (real Swiper 11)
 *
 * Mirrors DedicatedLanguageDescription.jsx exactly:
 *   Swiper config: slidesPerView=6, spaceBetween=20, pagination clickable
 *   Breakpoints: 1=1, 425=2, 768=3, 1024+=4
 *
 * Data key : dedicated_lang_desc
 * Fields   : para_html (HTML — span/br/a allowed)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['dedicated_lang_desc'] ?? array();
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$kses     = array(
	'span'   => array( 'class' => true ),
	'b'      => array(),
	'strong' => array(),
	'br'     => array(),
	'a'      => array( 'href' => true, 'target' => true ),
);

$icons = array(
	array( 'src' => '/engagement-model/dedicated-team/c1.png', 'width' => '201', 'height' => '62', 'alt' => 'React' ),
	array( 'src' => '/engagement-model/dedicated-team/c2.png', 'width' => '178', 'height' => '62', 'alt' => 'Ionic' ),
	array( 'src' => '/engagement-model/dedicated-team/c5.png', 'width' => '207', 'height' => '56', 'alt' => 'Xamarin' ),
	array( 'src' => '/engagement-model/dedicated-team/c4.png', 'width' => '188', 'height' => '75', 'alt' => 'Xcode' ),
	array( 'src' => '/engagement-model/dedicated-team/c6.png', 'width' => '188', 'height' => '75', 'alt' => 'Flutter' ),
	array( 'src' => '/engagement-model/dedicated-team/c7.png', 'width' => '188', 'height' => '75', 'alt' => 'Android' ),
	array( 'src' => '/engagement-model/dedicated-team/c8.png', 'width' => '188', 'height' => '75', 'alt' => 'Swift' ),
);

static $dld_instance = 0;
$dld_instance++;
$dld_id = 'dld-swiper-' . $dld_instance;
$_sc    = wp_json_encode( array(
	'slidesPerView' => 6,
	'spaceBetween'  => 20,
	'breakpoints'   => array(
		'1'    => array( 'slidesPerView' => 1 ),
		'425'  => array( 'slidesPerView' => 2 ),
		'768'  => array( 'slidesPerView' => 3 ),
		'1024' => array( 'slidesPerView' => 4 ),
		'1200' => array( 'slidesPerView' => 4 ),
		'1400' => array( 'slidesPerView' => 4 ),
	),
) );
?>
<section class="dedicatedLangDesc">
	<div class="container">
		<div class="content">
			<p><?php echo wp_kses( $d['para_html'] ?? '', $kses ); ?></p>
		</div>
		<div class="swiper development-slider testi-slider dev-process" id="<?php echo esc_attr( $dld_id ); ?>" data-swiper="<?php echo esc_attr( $_sc ); ?>">
			<div class="swiper-wrapper">
				<?php foreach ( $icons as $icon ) : ?>
				<div class="swiper-slide">
					<div class="images">
						<img
							src="<?php echo esc_url( $img_base . $icon['src'] ); ?>"
							width="<?php echo esc_attr( $icon['width'] ); ?>"
							height="<?php echo esc_attr( $icon['height'] ); ?>"
							alt="<?php echo esc_attr( $icon['alt'] ); ?>"
							loading="lazy"
						>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
