<?php
defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['awards_recognition'] ?? array();
$listing  = $d['listing'] ?? array();
$mod      = get_query_var( 'component_modifier_classes', '' );
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$kses_h   = array( 'span' => array() );

static $ar_instance = 0;
$ar_instance++;
$uid = 'ar-' . $ar_instance;

$_sc = wp_json_encode( array(
	'slidesPerView' => 3,
	'spaceBetween'  => 30,
	'loop'          => true,
	'autoplay'      => array( 'delay' => 3000, 'disableOnInteraction' => false ),
	'breakpoints'   => array(
		'1'    => array( 'slidesPerView' => 1 ),
		'1400' => array( 'slidesPerView' => 3 ),
	),
) );
?>
<section class="AwardsRecognitionSec<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="main-info">
			<div class="left">
				<?php if ( ! empty( $d['heading'] ) ) : ?>
				<h2><?php echo wp_kses( $d['heading'], $kses_h ); ?></h2>
				<?php endif; ?>
				<?php if ( ! empty( $d['para'] ) ) : ?>
				<p><?php echo esc_html( $d['para'] ); ?></p>
				<?php endif; ?>
				<a
					class="new-btn-lp"
					href="https://clutch.co/profile/technbrains"
					target="_blank"
					rel="noopener noreferrer"
				>Check Reviews <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M1 7H13M13 7L7 1M13 7L7 13" stroke="#ED2A32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
			</div>
			<div class="right">
				<p class="reviews-label">14+ Reviews on Clutch</p>
				<strong>4.7</strong>
				<img
					src="<?php echo esc_url( $img_base . '/home-page/award/rating-2.png' ); ?>"
					width="200"
					height="36"
					alt="rating"
					loading="lazy"
					decoding="async"
				>
			</div>
		</div>

		<div class="dev-slider">
			<div class="swiper award-slider" id="<?php echo esc_attr( $uid ); ?>" data-swiper="<?php echo esc_attr( $_sc ); ?>">
				<div class="swiper-wrapper">
					<?php foreach ( $listing as $item ) : ?>
					<div class="swiper-slide">
						<div class="dev-box">
							<div class="imgWrapper">
								<img
									src="<?php echo esc_url( $img_base . ( $item['img_src'] ?? '' ) ); ?>"
									width="<?php echo esc_attr( $item['width'] ?? '159' ); ?>"
									height="<?php echo esc_attr( $item['height'] ?? '73' ); ?>"
									alt="<?php echo esc_attr( $item['title'] ?? 'award' ); ?>"
									loading="lazy"
									decoding="async"
								>
							</div>
							<span><?php echo esc_html( $item['title'] ?? '' ); ?></span>
							<p><?php echo esc_html( $item['para'] ?? '' ); ?></p>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
