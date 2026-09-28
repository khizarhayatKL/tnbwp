<?php
/**
 * Component: Industries Slider — mirrors IndustriesSlider.jsx.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['industries_slider'] ?? array();
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$listing  = $d['listing'] ?? array();
$classes  = ! empty( $d['classes'] ) ? ' ' . sanitize_html_class( $d['classes'] ) : '';

$allowed_link_tags = array(
	'a' => array(
		'href'   => array(),
		'title'  => array(),
		'target' => array(),
		'rel'    => array(),
	),
);

static $is_instance = 0;
$is_instance++;
$uid      = 'is-' . $is_instance;
$prev_cls = 'is-prev-' . $is_instance;
$next_cls = 'is-next-' . $is_instance;
$_sc      = wp_json_encode( array(
	'slidesPerView' => 6,
	'spaceBetween'  => 20,
	'navigation'    => array( 'nextEl' => '.' . $next_cls, 'prevEl' => '.' . $prev_cls ),
	'breakpoints'   => array(
		'1'    => array( 'slidesPerView' => 1 ),
		'425'  => array( 'slidesPerView' => 2 ),
		'768'  => array( 'slidesPerView' => 3 ),
		'1024' => array( 'slidesPerView' => 4 ),
		'1200' => array( 'slidesPerView' => 5 ),
		'1400' => array( 'slidesPerView' => 6 ),
	),
) );
?>
<section class="industriesSlider<?php echo esc_attr( $classes ); ?>">
	<div class="container">
		<div class="is-main-info">
			<span class="subheading"><?php echo esc_html( $d['subtitle'] ?? '' ); ?></span>
			<h2><?php echo wp_kses_post( $d['title'] ?? '' ); ?></h2>
			<p><?php echo wp_kses( $d['para'] ?? '', $allowed_link_tags ); ?></p>
		</div>
		<div class="is-main-tab">
			<div class="swiper is-dev-slider testi-slider dev-process" id="<?php echo esc_attr( $uid ); ?>" data-swiper="<?php echo esc_attr( $_sc ); ?>">
				<div class="swiper-wrapper">
					<?php foreach ( $listing as $i => $item ) : ?>
					<div class="swiper-slide">
						<div
							class="is-tab-box<?php echo 0 === $i ? ' active' : ''; ?>"
							data-is-index="<?php echo esc_attr( $i ); ?>"
							data-is-group="<?php echo esc_attr( $uid ); ?>"
							role="button"
							tabindex="0"
						>
							<img
								src="<?php echo esc_url( $img_base . ( $item['img_src'] ?? '' ) ); ?>"
								width="60"
								height="60"
								alt="<?php echo esc_attr( wp_strip_all_tags( $item['tab_title'] ?? '' ) ); ?>"
								loading="lazy"
							>
							<h3><?php echo esc_html( wp_strip_all_tags( $item['tab_title'] ?? '' ) ); ?></h3>
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
		<div class="is-tab-content">
			<?php foreach ( $listing as $i => $item ) : ?>
			<div
				class="is-content-box<?php echo 0 === $i ? ' active' : ''; ?>"
				data-is-index="<?php echo esc_attr( $i ); ?>"
				data-is-group="<?php echo esc_attr( $uid ); ?>"
			>
				<img
					src="<?php echo esc_url( $img_base . ( $item['img_src'] ?? '' ) ); ?>"
					width="70"
					height="70"
					alt="<?php echo esc_attr( wp_strip_all_tags( $item['tab_title'] ?? '' ) ); ?>"
					loading="lazy"
				>
				<?php if ( ! empty( $item['title_two'] ) ) : ?>
				<span><?php echo wp_kses( $item['title_two'], $allowed_link_tags ); ?></span>
				<?php else : ?>
				<h3><?php echo wp_kses( $item['tab_title'] ?? '', $allowed_link_tags ); ?></h3>
				<?php endif; ?>
				<p><?php echo wp_kses( $item['content'] ?? '', $allowed_link_tags ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>