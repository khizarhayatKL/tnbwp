<?php
/**
 * Component: Case Slider — mirrors AppDevelopment/CaseSlider.jsx
 *
 * Data key : case_slider
 * Fields   : title_html, para, classes,
 *            listing[{ link, img_src, logo, logo_width, logo_height, content, title, stack, tag }]
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['case_slider'] ?? array();
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$listing  = $d['listing'] ?? array();
$classes  = ! empty( $d['classes'] ) ? ' ' . sanitize_html_class( $d['classes'] ) : '';
$mod      = get_query_var( 'component_modifier_classes', '' );
if ( $mod ) {
	$classes = ' ' . sanitize_html_class( $mod );
}

static $cs_instance = 0;
$cs_instance++;
$uid      = 'cs-' . $cs_instance;
$prev_cls = 'cs-prev-' . $cs_instance;
$next_cls = 'cs-next-' . $cs_instance;
$_sc      = wp_json_encode( array(
	'slidesPerView' => 3,
	'spaceBetween'  => 30,
	'navigation'    => array( 'nextEl' => '.' . $next_cls, 'prevEl' => '.' . $prev_cls ),
	'breakpoints'   => array(
		'1'    => array( 'slidesPerView' => 1 ),
		'768'  => array( 'slidesPerView' => 2 ),
		'1024' => array( 'slidesPerView' => 3 ),
	),
) );
?>
<section class="caseSlider<?php echo esc_attr( $classes ); ?>">
	<div class="container">
		<div class="cs-main-info">
			<h2><?php echo wp_kses( $d['title_html'] ?? '', array( 'br' => array(), 'span' => array() ) ); ?></h2>
			<?php if ( ! empty( $d['para'] ) ) : ?>
			<p><?php echo esc_html( $d['para'] ); ?></p>
			<?php endif; ?>
		</div>
		<div class="main-case-slider">
			<div class="swiper cs-cost-slider" id="<?php echo esc_attr( $uid ); ?>" data-swiper="<?php echo esc_attr( $_sc ); ?>">
				<div class="swiper-wrapper">
					<?php foreach ( $listing as $item ) : ?>
					<div class="swiper-slide">
						<div class="cs-slider-box">
							<?php if ( ! empty( $item['tag'] ) ) : ?>
							<h6><?php echo esc_html( $item['tag'] ); ?></h6>
							<?php endif; ?>
							<img
								src="<?php echo esc_url( $img_base . ( $item['img_src'] ?? '' ) ); ?>"
								width="640"
								height="482"
								alt="<?php echo esc_attr( $item['title'] ?? '' ); ?>"
								loading="lazy"
								decoding="async"
							>
							<div class="cs-top-info">
								<div>
									<img
										src="<?php echo esc_url( $img_base . ( $item['logo'] ?? '' ) ); ?>"
										width="<?php echo esc_attr( $item['logo_width'] ?? '200' ); ?>"
										height="<?php echo esc_attr( $item['logo_height'] ?? '30' ); ?>"
										alt="<?php echo esc_attr( $item['title'] ?? '' ); ?> logo"
										loading="lazy"
										decoding="async"
									>
									<p><?php echo esc_html( $item['content'] ?? '' ); ?></p>
								</div>
								<div class="cs-arrow-info">
									<h5><?php echo esc_html( $item['title'] ?? '' ); ?> <br><span><?php echo esc_html( $item['stack'] ?? '' ); ?></span></h5>
									<a href="<?php echo esc_url( home_url( $item['link'] ?? '#' ) ); ?>" aria-label="View case study">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="24" height="24" fill="currentColor" aria-hidden="true"><path d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"/></svg>
									</a>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="cs-pagination">
				<div class="cs-btn-prev <?php echo esc_attr( $prev_cls ); ?>" role="button" aria-label="Previous">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20" fill="currentColor" aria-hidden="true"><path d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8 .4 34.3z"/></svg>
				</div>
				<div class="cs-btn-next <?php echo esc_attr( $next_cls ); ?>" role="button" aria-label="Next">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20" fill="currentColor" aria-hidden="true"><path d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"/></svg>
				</div>
			</div>
		</div>
	</div>
</section>
