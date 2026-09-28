<?php
/**
 * Component: Software Dev Process
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data       = get_query_var( 'component_data' );
$d          = $data['software_dev_process'] ?? array();
$img_base   = get_stylesheet_directory_uri() . '/assets/images';
$main_title = $d['main_title'] ?? '';
$lang_title = $d['lang_title'] ?? '';
$lang_para  = $d['lang_para']  ?? '';
$listing    = $d['listing']    ?? array();

static $sdp_instance = 0;
$sdp_instance++;
$uid      = 'sdp-' . $sdp_instance;
$mod      = get_query_var( 'component_modifier_classes', '' );
$prev_cls = 'sdp-prev-' . $uid;
$next_cls = 'sdp-next-' . $uid;
$_sc      = wp_json_encode( array(
	'loop'         => true,
	'spaceBetween' => 40,
	'navigation'   => array( 'nextEl' => '.' . $next_cls, 'prevEl' => '.' . $prev_cls ),
	'breakpoints'  => array(
		'1'    => array( 'slidesPerView' => 1 ),
		'768'  => array( 'slidesPerView' => 2 ),
		'1024' => array( 'slidesPerView' => 3 ),
	),
) );
?>
<section class="softwareDevProcess<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>" id="<?php echo esc_attr( $uid ); ?>">
	<div class="container">
		<div class="content">
			<?php if ( $main_title ) : ?>
			<span><?php echo esc_html( $main_title ); ?></span>
			<?php endif; ?>
			<?php if ( $lang_title ) : ?>
			<h3><?php echo esc_html( $lang_title ); ?></h3>
			<?php endif; ?>
			<?php if ( $lang_para ) : ?>
			<p><?php echo esc_html( $lang_para ); ?></p>
			<?php endif; ?>
		</div>

		<?php if ( ! empty( $listing ) ) : ?>
		<div class="dev-slider">
			<div class="swiper <?php echo esc_attr( $uid ); ?>-swiper development-slider" data-swiper="<?php echo esc_attr( $_sc ); ?>">
				<div class="swiper-wrapper">
					<?php foreach ( $listing as $item ) : ?>
					<div class="swiper-slide">
						<div class="dev-box">
							<?php if ( ! empty( $item['img_src'] ) ) : ?>
							<img
								src="<?php echo esc_url( $img_base . $item['img_src'] ); ?>"
								width="60"
								height="60"
								alt="icon"
								loading="lazy"
								decoding="async"
							>
							<?php elseif ( ! empty( $item['number'] ) ) : ?>
							<p><?php echo esc_html( $item['number'] ); ?></p>
							<?php endif; ?>
							<h3><?php echo wp_kses( $item['title'] ?? '', array( 
    'br' => array(),
    'a'  => array( 
        'href'   => array(), 
        'title'  => array(), 
        'target' => array(), 
        'rel'    => array() 
    ) 
) ); ?></h3>
							<?php foreach ( $item['content'] ?? array() as $row ) : ?>
							<span>
								<img
									src="<?php echo esc_url( $img_base . '/app-dev/custom-software/left-icon.png' ); ?>"
									width="12"
									height="12"
									alt=""
									loading="lazy"
									decoding="async"
								>
								<?php echo esc_html( $row['para'] ?? '' ); ?>
							</span>
							<?php endforeach; ?>
							<?php if ( ! empty( $item['activities'] ) ) : ?>
							<ul>
								<?php foreach ( $item['activities'] as $li ) : ?>
								<li><?php echo esc_html( $li['list'] ?? '' ); ?></li>
								<?php endforeach; ?>
							</ul>
							<?php endif; ?>
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
		<?php endif; ?>
	</div>
</section>
