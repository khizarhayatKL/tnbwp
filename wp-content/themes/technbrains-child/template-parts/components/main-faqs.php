<?php
/**
 * Component: Main FAQs — mirrors MainFaqs.jsx using Bootstrap 5 Accordion.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data      = get_query_var( 'component_data' );
$d         = $data['faqs'] ?? array();
$listing   = $d['listing'] ?? array();
$faq_image = ! empty( $d['faq_image'] );
$img_base  = get_stylesheet_directory_uri() . '/assets/images';

static $faq_instance = 0;
$faq_instance++;
$accordion_id = 'mainFaqAcc-' . $faq_instance;
?>
<section class="mainFaqs <?php echo esc_attr( get_query_var( 'component_modifier_classes', '' ) ); ?>">
	<div class="container">
		<div class="content">
			<?php if ( $faq_image ) : ?>
			<img src="<?php echo esc_url( $img_base ); ?>/seo-services/faq.png" width="223" height="197" alt="FAQ" loading="lazy" decoding="async">
			<?php endif; ?>
			<span><?php echo esc_html( $d['head_text'] ?? '' ); ?></span>
			<h2>Frequently Asked Questions</h2>
		</div>
		<div class="faq">
			<div class="accordion accordion-flush faqAccordian" id="<?php echo esc_attr( $accordion_id ); ?>">
				<?php foreach ( $listing as $i => $faq ) : ?>
				<div class="accordion-item faqItem">
					<h3 class="accordion-header faqHead" id="<?php echo esc_attr( $accordion_id . '-h-' . $i ); ?>">
						<button
							class="accordion-button<?php echo 0 === $i ? '' : ' collapsed'; ?>"
							type="button"
							data-bs-toggle="collapse"
							data-bs-target="#<?php echo esc_attr( $accordion_id . '-b-' . $i ); ?>"
							aria-expanded="<?php echo 0 === $i ? 'true' : 'false'; ?>"
							aria-controls="<?php echo esc_attr( $accordion_id . '-b-' . $i ); ?>"
						>
							<small>Q</small>
							<?php echo esc_html( $faq['faqhead'] ?? '' ); ?>
						</button>
					</h3>
					<div
						id="<?php echo esc_attr( $accordion_id . '-b-' . $i ); ?>"
						class="accordion-collapse collapse<?php echo 0 === $i ? ' show' : ''; ?>"
						aria-labelledby="<?php echo esc_attr( $accordion_id . '-h-' . $i ); ?>"
						data-bs-parent="#<?php echo esc_attr( $accordion_id ); ?>"
					>
						<div class="accordion-body faqBody">
							<?php echo wp_kses_post( $faq['faqbody'] ?? '' ); ?>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
