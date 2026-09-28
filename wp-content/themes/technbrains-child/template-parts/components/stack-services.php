<?php
defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['stack_services'] ?? array();
$listing  = $d['listing'] ?? array();
$mod      = get_query_var( 'component_modifier_classes', '' );
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$kses_h   = array( 'span' => array( 'class' => true ) );

static $ss_instance = 0;
$ss_instance++;
$uid = 'ss-' . $ss_instance;

$_sc = wp_json_encode( array(
	'slidesPerView' => 6,
	'spaceBetween'  => 20,
	'navigation'    => array(
		'nextEl' => '.testimo-button-next',
		'prevEl' => '.testimo-button-prev',
	),
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
<section class="StackServicesSec<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="content">
			<div class="heading">
				<?php if ( ! empty( $d['heading'] ) ) : ?>
				<h2><?php echo wp_kses( $d['heading'], $kses_h ); ?></h2>
				<?php endif; ?>
				<?php if ( ! empty( $d['content'] ) ) : ?>
				<p><?php echo esc_html( $d['content'] ); ?></p>
				<?php endif; ?>
			</div>

			<div class="servicesList">
				<div class="swiper servicesListSlider" id="<?php echo esc_attr( $uid ); ?>" data-swiper="<?php echo esc_attr( $_sc ); ?>">
					<div class="swiper-wrapper">
						<?php foreach ( $listing as $i => $item ) : ?>
						<div class="swiper-slide">
							<div
								class="tabBox<?php echo 0 === $i ? ' active' : ''; ?>"
								data-ss-group="<?php echo esc_attr( $uid ); ?>"
								data-ss-index="<?php echo esc_attr( $i ); ?>"
							>
								<p><?php echo wp_kses( $item['tab_title'] ?? '', array( 
    'a' => array( 
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
				</div>

				<div class="tabContent">
					<?php foreach ( $listing as $i => $item ) : ?>
					<div
						class="contentBox<?php echo 0 === $i ? ' active' : ''; ?>"
						data-ss-group="<?php echo esc_attr( $uid ); ?>"
						data-ss-index="<?php echo esc_attr( $i ); ?>"
					>
						<div class="boxGrid">
							<div class="leftSide">
								<h3><?php echo wp_kses( $item['title_two'] ?? $item['tab_title'] ?? '', array( 
    'a' => array( 
        'href'   => array(), 
        'title'  => array(), 
        'target' => array(), 
        'rel'    => array() 
    ) 
) ); ?></h3>
								<p><?php echo wp_kses_post( $item['content'] ?? '' ); ?></p>
							</div>
							<div class="rightSide">
								<?php if ( ! empty( $item['img_src'] ) ) : ?>
								<img
									src="<?php echo esc_url( $img_base . $item['img_src'] ); ?>"
									width="463"
									height="382"
									alt="<?php echo esc_attr( $item['tab_alt'] ?? 'service image' ); ?>"
									loading="lazy"
									decoding="async"
								>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
