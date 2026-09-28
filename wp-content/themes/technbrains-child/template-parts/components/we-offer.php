<?php
/**
 * Component: We Offer â€” mirrors Cms/WeOffer/WeOffer.jsx
 *
 * Data key : we_offer
 * Fields   : subtitle, title, para, listing[{img_src, title, para}]
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['we_offer'] ?? array();
$listing  = $d['listing'] ?? array();
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$mod      = get_query_var( 'component_modifier_classes', '' );

static $wo_instance = 0;
$wo_instance++;
$uid      = 'wo-' . $wo_instance;
$prev_cls = 'wo-prev-' . $wo_instance;
$next_cls = 'wo-next-' . $wo_instance;

$_sc = wp_json_encode( array(
	'slidesPerView' => 4,
	'spaceBetween'  => 40,
	'loop'          => true,
	'navigation'    => array( 'nextEl' => '.' . $next_cls, 'prevEl' => '.' . $prev_cls ),
	'breakpoints'   => array(
		'1'    => array( 'slidesPerView' => 1 ),
		'768'  => array( 'slidesPerView' => 2 ),
		'1024' => array( 'slidesPerView' => 3 ),
		'1200' => array( 'slidesPerView' => 4 ),
	),
) );
?>
<section class="weOffer<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="main-info">
			<?php if ( ! empty( $d['subtitle'] ) ) : ?>
			<h4><?php echo esc_html( $d['subtitle'] ); ?></h4>
			<?php endif; ?>
			<?php if ( ! empty( $d['title'] ) ) : ?>
			<h2><?php echo esc_html( $d['title'] ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $d['para'] ) ) : ?>
			<p><?php echo esc_html( $d['para'] ); ?></p>
			<?php endif; ?>
		</div>
		<div class="dev-slider">
			<div class="swiper development-slider testi-slider dev-process" id="<?php echo esc_attr( $uid ); ?>" data-swiper="<?php echo esc_attr( $_sc ); ?>">
				<div class="swiper-wrapper">
					<?php foreach ( $listing as $item ) : ?>
					<div class="swiper-slide">
						<div class="dev-box">
							<div class="dev-info">
								<?php if ( ! empty( $item['img_src'] ) ) : ?>
								<img
									src="<?php echo esc_url( $img_base . $item['img_src'] ); ?>"
									width="60"
									height="60"
									alt="<?php echo esc_attr( $item['title'] ?? 'icon' ); ?>"
									loading="lazy"
									decoding="async"
								>
								<?php endif; ?>
								<h4><?php echo esc_html( $item['title'] ?? '' ); ?></h4>
								<p><?php echo esc_html( $item['para'] ?? '' ); ?></p>
							</div>
							<span class="arrow-icon">
								<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M313.941 216H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12h301.941v46.059c0 21.382 25.851 32.09 40.971 16.971l86.059-86.059c9.373-9.373 9.373-24.569 0-33.941l-86.059-86.059c-15.119-15.119-40.971-4.411-40.971 16.971V216z"></path></svg>
							</span>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<div class="swiper-pagination"></div>
			</div>
			<div class="testimo-button-prev <?php echo esc_attr( $prev_cls ); ?>" role="button" aria-label="Previous">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" focusable="false" aria-hidden="true"><path fill="currentColor" d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8 .4 34.3z"/></svg>
			</div>
			<div class="testimo-button-next <?php echo esc_attr( $next_cls ); ?>" role="button" aria-label="Next">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" focusable="false" aria-hidden="true"><path fill="currentColor" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"/></svg>
			</div>
		</div>
	</div>
</section>
