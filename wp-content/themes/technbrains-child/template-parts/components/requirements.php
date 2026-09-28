<?php
/**
 * Component: Requirements — mirrors EngagementModel/Requirements.jsx
 *
 * Data key : requirements
 * Fields   : main_title, lang_title, lang_para,
 *            listing[{ img_src, title, para_html }]
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['requirements'] ?? array();
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$listing  = $d['listing'] ?? array();
$mod      = get_query_var( 'component_modifier_classes', '' );

static $req_instance = 0;
$req_instance++;
$uid      = 'req-' . $req_instance;
$prev_cls = 'req-prev-' . $req_instance;
$next_cls = 'req-next-' . $req_instance;
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
<section class="requirements<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="content">
			<?php if ( ! empty( $d['main_title'] ) ) : ?>
			<span><?php echo esc_html( $d['main_title'] ); ?></span>
			<?php endif; ?>
			<?php if ( ! empty( $d['lang_title'] ) ) : ?>
			<h2><?php echo esc_html( $d['lang_title'] ); ?></h2>
			<?php endif; ?>
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
							<div class="imgHead">
								<img
									src="<?php echo esc_url( $img_base . ( $item['img_src'] ?? '' ) ); ?>"
									width="35"
									height="35"
									alt="icon"
									loading="lazy"
									decoding="async"
								>
								<h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
							</div>
							<?php echo wp_kses( $item['para_html'] ?? '', array( 
    'ul' => array(), 
    'li' => array(),
    'a'  => array( 
        'href'   => array(), 
        'title'  => array(), 
        'target' => array(), 
        'rel'    => array() 
    ) 
) ); ?>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
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
