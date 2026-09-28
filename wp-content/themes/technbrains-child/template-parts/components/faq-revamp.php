<?php

/**
 * Component: FAQ Revamp — mirrors FaqRevamp.jsx (Bootstrap accordion, load-more)
 *
 * Data key : faqs
 * Fields   : heading (string), listing[{faqhead, faqbody}]
 *
 * @package technbrains-child
 */

defined('ABSPATH') || exit;

$data    = get_query_var('component_data');
$d       = $data['faqs'] ?? array();
$listing   = $d['listing'] ?? array();
$heading   = $d['heading'] ?? '';
$head_text = $d['head_text'] ?? '';
$mod       = get_query_var('component_modifier_classes', '');

static $fr_instance = 0;
$fr_instance++;
$acc_id = 'frAcc-' . $fr_instance;
$btn_id = 'frBtn-' . $fr_instance;
?>
<section class="faqRevampSection<?php echo $mod ? ' ' . esc_attr($mod) : ''; ?>">
	<div class="container">
		<div class="frs-content">
			<?php if ( $head_text ) : ?>
			<p class="frs-subheading"><?php echo esc_html( $head_text ); ?></p>
			<?php endif; ?>
			<h2><?php echo $heading ? wp_kses( $heading, array( 'span' => array(), 'br' => array() ) ) : '<span>Frequently Asked</span><br>Questions'; ?></h2>
		</div>
		<div class="frs-faq">
			<div class="accordion accordion-flush" id="<?php echo esc_attr($acc_id); ?>">
				<?php foreach ($listing as $i => $faq) : ?>
					<div class="accordion-item<?php echo $i >= 5 ? ' fr-hidden' : ''; ?>">
						<h3 class="accordion-header" id="<?php echo esc_attr($acc_id . '-h-' . $i); ?>">
							<button
								class="accordion-button<?php echo 0 === $i ? '' : ' collapsed'; ?>"
								type="button"
								data-bs-toggle="collapse"
								data-bs-target="#<?php echo esc_attr($acc_id . '-b-' . $i); ?>"
								aria-expanded="<?php echo 0 === $i ? 'true' : 'false'; ?>"
								aria-controls="<?php echo esc_attr($acc_id . '-b-' . $i); ?>">
								<?php echo esc_html($faq['faqhead'] ?? ''); ?>
							</button>
						</h3>
						<div
							id="<?php echo esc_attr($acc_id . '-b-' . $i); ?>"
							class="accordion-collapse collapse<?php echo 0 === $i ? ' show' : ''; ?>"
							aria-labelledby="<?php echo esc_attr($acc_id . '-h-' . $i); ?>"
							data-bs-parent="#<?php echo esc_attr($acc_id); ?>">
							<div class="accordion-body">
								<?php echo wp_kses_post($faq['faqbody'] ?? ''); ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<?php if (count($listing) > 5) : ?>
			<div class="frs-btn-wrapper">
				<?php if ( ! empty( $d['is_houston'] ) ) : ?>
				<button class="new-btn-lp" type="button" id="<?php echo esc_attr($btn_id); ?>" data-faq-acc="<?php echo esc_attr($acc_id); ?>">
					Load More
					<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"></path></svg>
				</button>
				<?php else : ?>
				<button class="faq-load-more-btn" type="button" id="<?php echo esc_attr($btn_id); ?>" data-faq-acc="<?php echo esc_attr($acc_id); ?>">Load More</button>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>