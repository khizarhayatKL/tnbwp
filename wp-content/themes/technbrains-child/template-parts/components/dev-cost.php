<?php

/**
 * Component: Dev Cost
 *
 * @package technbrains-child
 */

defined('ABSPATH') || exit;

$data     = get_query_var('component_data');
$d        = $data['dev_cost'] ?? array();
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$subtitle = $d['subtitle'] ?? '';
$title    = $d['title']    ?? '';
$para     = $d['para']     ?? '';
$listing  = $d['listing']  ?? array();

static $dc_instance = 0;
$dc_instance++;
$uid      = 'dc-' . $dc_instance;
$prev_cls = 'cost-button-prev-' . $uid;
$next_cls = 'cost-button-next-' . $uid;
$_sc      = wp_json_encode( array(
	'spaceBetween' => 30,
	'navigation'   => array( 'nextEl' => '.' . $next_cls, 'prevEl' => '.' . $prev_cls ),
	'breakpoints'  => array(
		'1'    => array( 'slidesPerView' => 1 ),
		'768'  => array( 'slidesPerView' => 2 ),
		'1024' => array( 'slidesPerView' => 3 ),
	),
) );
?>
<section class="devCost <?php echo esc_attr(get_query_var('component_modifier_classes', '')); ?>" id="<?php echo esc_attr($uid); ?>">
	<div class="container">
		<div class="main-info">
			<?php if ($subtitle) : ?>
				<span><?php echo esc_html($subtitle); ?></span>
			<?php endif; ?>
			<?php if ($title) : ?>
				<h2><?php echo esc_html($title); ?></h2>
			<?php endif; ?>
			<?php if ($para) : ?>
				<p><?php echo wp_kses_post( $para ); ?></p>
			<?php endif; ?>
		</div>

		<?php if (! empty($listing)) : ?>
			<div class="main-cost-slider">
				<div class="swiper cost-slider <?php echo esc_attr($uid); ?>-swiper" data-swiper="<?php echo esc_attr( $_sc ); ?>">
					<div class="swiper-wrapper">
						<?php foreach ($listing as $item) : ?>
							<div class="swiper-slide">
								<div class="slider-box">
									<img
										src="<?php echo esc_url($img_base . ($item['img_src'] ?? '')); ?>"
										width="640"
										height="482"
										alt="image"
										loading="lazy"
										decoding="async">
									<div class="top-info">
										<div>
											<span><?php echo esc_html($item['title'] ?? ''); ?></span>
											<ul>
												<?php foreach ($item['content'] ?? array() as $li) : ?>
													<li><?php echo esc_html($li['list'] ?? ''); ?></li>
												<?php endforeach; ?>
											</ul>
										</div>
										<button class="tnb-popup-trigger" type="button">
											Get Free Quote <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"></path></svg>
										</button>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="cost-pagination">
						<div class="cost-button-prev <?php echo esc_attr( $prev_cls ); ?>" role="button" aria-label="Previous"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg></div>
						<div class="cost-button-next <?php echo esc_attr( $next_cls ); ?>" role="button" aria-label="Next"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M313.941 216H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12h301.941v46.059c0 21.382 25.851 32.09 40.971 16.971l86.059-86.059c9.373-9.373 9.373-24.569 0-33.941l-86.059-86.059c-15.119-15.119-40.971-4.411-40.971 16.971V216z"></path></svg></div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
