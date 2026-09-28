<?php
defined( 'ABSPATH' ) || exit;

static $ins_instance = 0;
$ins_instance++;
$uid      = 'ins-' . $ins_instance;
$prev_cls = 'ins-prev-' . $ins_instance;
$next_cls = 'ins-next-' . $ins_instance;

$data     = get_query_var( 'component_data' );
$d        = $data['industry_slider'] ?? [];
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$title    = $d['title']    ?? '';
$para     = $d['para']     ?? '';
$listing  = $d['listing']  ?? [];
$btn_text = $d['btn_text'] ?? '';
$mod      = get_query_var( 'component_modifier_classes', '' );

$_sc = wp_json_encode( array(
	'slidesPerView' => 3,
	'spaceBetween'  => 30,
	'loop'          => true,
	'navigation'    => array( 'nextEl' => '.' . $next_cls, 'prevEl' => '.' . $prev_cls ),
	'breakpoints'   => array(
		'1'    => array( 'slidesPerView' => 1 ),
		'768'  => array( 'slidesPerView' => 2 ),
		'1440' => array( 'slidesPerView' => 3 ),
	),
) );
?>
<section class="IndustrySlider<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="mainGrid">
			<div class="left">
				<?php if ( $title ) : ?>
				<h2><?php echo esc_html( $title ); ?></h2>
				<?php endif; ?>
				<?php if ( $para ) : ?>
				<p><?php echo esc_html( $para ); ?></p>
				<?php endif; ?>
			</div>
			<div class="right">
				<div class="pagination">
					<div class="btn <?php echo esc_attr( $prev_cls ); ?>" role="button" aria-label="Previous">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="25" height="25" focusable="false" aria-hidden="true"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
					</div>
					<div class="btn <?php echo esc_attr( $next_cls ); ?>" role="button" aria-label="Next">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="25" height="25" focusable="false" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
					</div>
				</div>
			</div>
		</div>

		<div class="sliderSec">
			<div class="swiper ins-swiper" id="<?php echo esc_attr( $uid ); ?>" data-swiper="<?php echo esc_attr( $_sc ); ?>">
				<div class="swiper-wrapper">
					<?php foreach ( $listing as $item ) : ?>
					<div class="swiper-slide">
						<div
							class="sliderInfo<?php echo ! empty( $item['class'] ) ? ' ' . esc_attr( $item['class'] ) : ''; ?>"
							<?php if ( ! empty( $item['bg_image'] ) ) : ?>
							style="background-image:url('<?php echo esc_url( $img_base . $item['bg_image'] ); ?>')"
							<?php endif; ?>
						>
							<h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
							<div class="innerCont">
								<p><?php echo esc_html( $item['paragraph'] ?? '' ); ?></p>
								<a href="<?php echo esc_url( home_url( $item['link'] ?? '#' ) ); ?>" aria-label="View <?php echo esc_attr( $item['title'] ?? '' ); ?>">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="22" height="22" focusable="false" aria-hidden="true"><line x1="7" y1="17" x2="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>
								</a>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>

		<?php if ( $btn_text ) : ?>
		<div class="btnWrapper">
			<button class="tnb-btn tnb-popup-trigger" type="button">
				<div class="textWrapper">
					<span class="primaryText"><?php echo esc_html( $btn_text ); ?></span>
					<span class="secondaryText" aria-hidden="true"><?php echo esc_html( $btn_text ); ?></span>
				</div>
			</button>
		</div>
		<?php endif; ?>
	</div>
</section>
