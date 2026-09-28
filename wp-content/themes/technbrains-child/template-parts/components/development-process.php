<?php
/**
 * Component: Development Process — mirrors DevelopmentProcess.jsx (single component, two uses).
 *
 * Args:
 *   data_key (string) — key inside component_data to read from. Default: 'dev_process'.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data      = get_query_var( 'component_data' );
$data_key  = $args['data_key'] ?? 'dev_process';
$d         = $data[ $data_key ] ?? array();
$img_base  = get_stylesheet_directory_uri() . '/assets/images';
$listing   = $d['listing'] ?? array();
$mod_class = ! empty( $d['classes'] ) ? ' ' . sanitize_html_class( $d['classes'] ) : '';

static $dp_instance = 0;
$dp_instance++;
$uid      = 'dp-' . $dp_instance;
$prev_cls = 'dp-prev-' . $dp_instance;
$next_cls = 'dp-next-' . $dp_instance;
$_sc      = wp_json_encode( array(
	'slidesPerView' => 3,
	'spaceBetween'  => 40,
	'loop'          => true,
	'navigation'    => array( 'nextEl' => '.' . $next_cls, 'prevEl' => '.' . $prev_cls ),
	'breakpoints'   => array(
		'1'    => array( 'slidesPerView' => 1 ),
		'768'  => array( 'slidesPerView' => 2 ),
		'1024' => array( 'slidesPerView' => 3 ),
	),
) );
?>
<section class="developmentProcess<?php echo esc_attr( $mod_class ); ?>">
	<div class="container">
		<div class="content">
			<span><?php echo esc_html( $d['main_title'] ?? '' ); ?></span>
			<h2><?php echo wp_kses( $d['lang_title'] ?? '', array( 'br' => array() ) ); ?></h2>
			<?php if ( ! empty( $d['lang_para'] ) ) : ?>
			<p><?php echo esc_html( $d['lang_para'] ); ?></p>
			<?php endif; ?>
		</div>
		<div class="dev-slider">
			<div class="swiper development-slider testi-slider dev-process" id="<?php echo esc_attr( $uid ); ?>" data-swiper="<?php echo esc_attr( $_sc ); ?>">
				<div class="swiper-wrapper">
					<?php foreach ( $listing as $item ) : ?>
					<div class="swiper-slide">
						<div class="dev-box">
							<?php if ( ! empty( $item['img_src'] ) ) : ?>
							<img
								src="<?php echo esc_url( $img_base . $item['img_src'] ); ?>"
								width="<?php echo esc_attr( $item['width_img'] ?? '60' ); ?>"
								height="<?php echo esc_attr( $item['height_img'] ?? '60' ); ?>"
								alt="<?php echo esc_attr( $item['title'] ?? 'icon' ); ?>"
								loading="lazy"
							>
							<?php elseif ( ! empty( $item['number'] ) ) : ?>
							<span><?php echo esc_html( $item['number'] ); ?></span>
							<?php endif; ?>
							<h3><?php echo wp_kses( $item['title'] ?? '', array( 'span' => array(), 'br' => array() ) ); ?></h3>
							<p><?php echo wp_kses( $item['para'] ?? '', array( 
    'span' => array(), 
    'br'   => array(),
    'a'    => array( 
        'href'   => array(), 
        'title'  => array(), 
        'target' => array(), 
        'rel'    => array() 
    ) 
) ); ?></p>
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
