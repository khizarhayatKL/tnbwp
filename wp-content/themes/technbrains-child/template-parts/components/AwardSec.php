<?php
defined( 'ABSPATH' ) || exit;

$data    = get_query_var( 'component_data' );
$listing = $data['award_list'] ?? array();
$img     = get_stylesheet_directory_uri() . '/assets/images';
$mod     = get_query_var( 'component_modifier_classes', '' );

static $as_instance = 0;
$as_instance++;
$prev_cls = 'award-prev-' . $as_instance;
$next_cls = 'award-next-' . $as_instance;

$swiper_config = wp_json_encode( array(
	'slidesPerView' => 6,
	'spaceBetween'  => 30,
	'loop'          => true,
	'autoplay'      => array( 'delay' => 3000, 'disableOnInteraction' => false ),
	'navigation'    => array( 'nextEl' => '.' . $next_cls, 'prevEl' => '.' . $prev_cls ),
	'breakpoints'   => array(
		'1'    => array( 'slidesPerView' => 1 ),
		'479'  => array( 'slidesPerView' => 2 ),
		'768'  => array( 'slidesPerView' => 3 ),
		'992'  => array( 'slidesPerView' => 4 ),
		'1400' => array( 'slidesPerView' => 5 ),
		'1650' => array( 'slidesPerView' => 6 ),
	),
) );
?>
<section class="awardSec<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container"></div>
	<div class="dev-slider">
		<div class="swiper award-slider testi-slider dev-process award-slider-list" data-swiper="<?php echo esc_attr( $swiper_config ); ?>">
			<div class="swiper-wrapper">
				<?php foreach ( $listing as $item ) : ?>
				<div class="swiper-slide">
					<div class="award-dev-box">
						<img src="<?php echo esc_url( $img . $item['img_src'] ); ?>" width="<?php echo esc_attr( $item['img_width'] ); ?>" height="<?php echo esc_attr( $item['img_height'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" loading="lazy" decoding="async">
						<h5><?php echo esc_html( $item['title'] ); ?></h5>
						<p><?php echo esc_html( $item['para'] ); ?></p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="container">
				<div class="award-pagination-nav">
					<div class="award-button-prev <?php echo esc_attr( $prev_cls ); ?>" role="button" aria-label="Previous">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20" focusable="false" aria-hidden="true"><path fill="currentColor" d="M448 256L272 64l-17.5 19.5L385 245H0v22h385L254.5 428.5 272 448z" transform="scale(-1,1) translate(-448,0)"/></svg>
					</div>
					<div class="award-button-next <?php echo esc_attr( $next_cls ); ?>" role="button" aria-label="Next">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20" focusable="false" aria-hidden="true"><path fill="currentColor" d="M0 256L176 64l17.5 19.5L63 245h385v22H63l130.5 161.5L176 448z" transform="scale(-1,1) translate(-448,0)"/></svg>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
