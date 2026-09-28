<?php
defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['software_solution'] ?? array();
$mod      = get_query_var( 'component_modifier_classes', '' );
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$heading  = $d['heading'] ?? '';
$para     = $d['para'] ?? '';
$listing  = $d['box_listing'] ?? array();
$kses_h   = array( 'span' => array(), 'br' => array(), 'a' => array( 'href' => true, 'class' => true ) );

static $ss_instance = 0;
$ss_instance++;
$uid = 'ss-' . $ss_instance;

$_sc = wp_json_encode( array(
	'slidesPerView' => 2,
	'spaceBetween'  => 10,
	'navigation'    => array( 'nextEl' => '.award-button-next', 'prevEl' => '.award-button-prev' ),
	'breakpoints'   => array(
		'1'   => array( 'slidesPerView' => 1 ),
		'991' => array( 'slidesPerView' => 2 ),
	),
) );
?>
<section class="softwareSolution<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="content">
			<div class="head">
				<?php if ( $heading ) : ?>
				<h2><?php echo wp_kses( $heading, $kses_h ); ?></h2>
				<?php endif; ?>
				<?php if ( $para ) : ?>
				<p><?php echo wp_kses_post( $para ); ?></p>
				<?php endif; ?>
			</div>
			<div class="boxes">
				<?php foreach ( $listing as $item ) : ?>
				<div class="singleBox">
					<?php if ( ! empty( $item['side_image'] ) ) : ?>
					<img
						src="<?php echo esc_url( $img_base . $item['side_image'] ); ?>"
						width="<?php echo (int) ( $item['img_width'] ?? 30 ); ?>"
						height="<?php echo (int) ( $item['img_height'] ?? 45 ); ?>"
						alt="<?php echo esc_attr( strip_tags( $item['title'] ?? '' ) ); ?>"
						loading="lazy"
						decoding="async"
					>
					<?php endif; ?>
					<div class="textSection">
						<?php if ( ! empty( $item['number'] ) ) : ?>
						<h2><?php echo esc_html( $item['number'] ); ?></h2>
						<?php endif; ?>
						<?php if ( ! empty( $item['title'] ) ) : ?>
						<h3><?php echo wp_kses( $item['title'], $kses_h ); ?></h3>
						<?php endif; ?>
						<?php if ( ! empty( $item['content'] ) ) : ?>
						<p><?php echo wp_kses_post( $item['content'] ); ?></p>
						<?php endif; ?>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="slider">
				<div class="swiper software-slider" id="<?php echo esc_attr( $uid ); ?>" data-swiper="<?php echo esc_attr( $_sc ); ?>">
					<div class="swiper-wrapper">
						<?php foreach ( $listing as $item ) : ?>
						<div class="swiper-slide">
							<div class="singleBox">
								<?php if ( ! empty( $item['side_image'] ) ) : ?>
								<img
									src="<?php echo esc_url( $img_base . $item['side_image'] ); ?>"
									width="<?php echo (int) ( $item['img_width'] ?? 30 ); ?>"
									height="<?php echo (int) ( $item['img_height'] ?? 45 ); ?>"
									alt="<?php echo esc_attr( strip_tags( $item['title'] ?? '' ) ); ?>"
									loading="lazy"
									decoding="async"
								>
								<?php endif; ?>
								<div class="textSection">
									<?php if ( ! empty( $item['number'] ) ) : ?>
									<h2><?php echo esc_html( $item['number'] ); ?></h2>
									<?php endif; ?>
									<?php if ( ! empty( $item['title'] ) ) : ?>
									<h3><?php echo wp_kses( $item['title'], $kses_h ); ?></h3>
									<?php endif; ?>
									<?php if ( ! empty( $item['content'] ) ) : ?>
									<p><?php echo wp_kses_post( $item['content'] ); ?></p>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
