<?php
defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['industry_specific'] ?? array();
$listing  = $d['listing'] ?? array();
$mod      = get_query_var( 'component_modifier_classes', '' );
$img_base = get_stylesheet_directory_uri() . '/assets/images';

static $is_instance = 0;
$is_instance++;
$uid = 'is-' . $is_instance;

$_sc = wp_json_encode( array(
	'slidesPerView' => 3,
	'spaceBetween'  => 20,
	'navigation'    => array( 'nextEl' => '.award-button-next', 'prevEl' => '.award-button-prev' ),
	'scrollbar'     => array( 'el' => '#' . $uid . ' .swiper-scrollbar', 'draggable' => true, 'hide' => false ),
	'breakpoints'   => array(
		'1'    => array( 'slidesPerView' => 1 ),
		'768'  => array( 'slidesPerView' => 2 ),
		'1024' => array( 'slidesPerView' => 2 ),
		'1200' => array( 'slidesPerView' => 3 ),
	),
) );
?>
<section class="trendTech<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="content">
			<?php if ( ! empty( $d['heading'] ) ) : ?>
			<h2><?php echo esc_html( $d['heading'] ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $d['subheading'] ) ) : ?>
			<h4><?php echo esc_html( $d['subheading'] ); ?></h4>
			<?php endif; ?>
			<?php if ( ! empty( $d['content'] ) ) : ?>
			<p><?php echo esc_html( $d['content'] ); ?></p>
			<?php endif; ?>
		</div>

		<div class="boxes">
			<div class="swiper houston-slider" id="<?php echo esc_attr( $uid ); ?>" data-swiper="<?php echo esc_attr( $_sc ); ?>">
				<div class="swiper-wrapper">
					<?php foreach ( $listing as $item ) : ?>
					<div class="swiper-slide">
						<div class="singleBox">
							<img
								src="<?php echo esc_url( $img_base . ( $item['img_src'] ?? '' ) ); ?>"
								width="<?php echo esc_attr( $item['width'] ?? '400' ); ?>"
								height="<?php echo esc_attr( $item['height'] ?? '279' ); ?>"
								alt="<?php echo esc_attr( $item['title'] ?? 'industry' ); ?>"
								loading="lazy"
								decoding="async"
							>
							<div class="contentBox">
								<h3>
									<a href="<?php echo esc_url( $item['link'] ?? '#' ); ?>">
										<?php echo esc_html( $item['title'] ?? '' ); ?>
									</a>
								</h3>
								<p><?php echo esc_html( $item['content'] ?? '' ); ?></p>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<div class="swiper-scrollbar"></div>
			</div>
		</div>

		<div class="award-pagination">
			<div class="award-button-prev">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="30" height="30" focusable="false" aria-hidden="true"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg>
			</div>
			<div class="award-button-next">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="30" height="30" focusable="false" aria-hidden="true"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>
			</div>
		</div>
	</div>
</section>
