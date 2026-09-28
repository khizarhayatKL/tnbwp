<?php

/**
 * Component: Our Clients Say
 * Uses native CSS scroll-snap + JS navigation (matches Swiper API: button-prev / button-next).
 *
 * @package technbrains-child
 */

defined('ABSPATH') || exit;

$data     = get_query_var('component_data');
$d        = $data['clients_say'] ?? [];
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$title    = $d['title']   ?? '';
$listing  = $d['listing'] ?? [];
?>
<section class="ourClientsSay">
	<div class="container">
		<div class="mainGrid">
			<div class="left">
				<?php if ($title) : ?>
					<h2><?php echo esc_html($title); ?></h2>
				<?php endif; ?>
			</div>
			<div class="right">
				<div class="pagination">
					<div class="btn button-prev" role="button" aria-label="Previous testimonial" tabindex="0">
						<!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg> -->
						<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
						</svg>
					</div>
					<div class="btn button-next" role="button" aria-label="Next testimonial" tabindex="0">
						<!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
							<line x1="5" y1="12" x2="19" y2="12" />
							<polyline points="12 5 19 12 12 19" />
						</svg> -->
						<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
						</svg>
					</div>
				</div>
			</div>
		</div>

		<div class="sliderSec">
			<div class="clientSlider" id="tnb-client-slider">
				<?php foreach ($listing as $item) : ?>
					<div class="sliderInfo">
						<div>
							<p>"<?php echo esc_html($item['content']); ?>"</p>
							<div class="profileFlex">
								<img
									src="<?php echo esc_url($img_base . $item['profile']); ?>"
									width="54"
									height="54"
									alt="<?php echo esc_attr($item['name']); ?>"
									loading="lazy"
									decoding="async">
								<div class="info">
									<span><?php echo esc_html($item['name']); ?></span>
									<p><?php echo esc_html($item['description']); ?></p>
								</div>
							</div>
						</div>
						<div class="bottomInfo">
							<img
								src="<?php echo esc_url($img_base . $item['icon']); ?>"
								width="<?php echo (int) $item['width']; ?>"
								height="<?php echo (int) $item['height']; ?>"
								alt="Review platform logo"
								loading="lazy"
								decoding="async">
							<?php if (! empty($item['link'])) : ?>
								<a href="<?php echo esc_url($item['link']); ?>" target="_blank" rel="noopener noreferrer">
									View Testimonial
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
										<line x1="7" y1="17" x2="17" y2="7" />
										<polyline points="7 7 17 7 17 17" />
									</svg>
								</a>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
