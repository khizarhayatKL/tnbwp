<?php
/**
 * Component: Location FAQs — mirrors Locations/Faqs/Faqs.jsx
 *
 * Data key : faqs_loc
 * Fields   : listing[{faqhead, faqbody}]
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data    = get_query_var( 'component_data' );
$d       = $data['faqs_loc'] ?? array();
$listing = $d['listing'] ?? array();
$mod     = get_query_var( 'component_modifier_classes', '' );
$img_base = get_stylesheet_directory_uri() . '/assets/images';

static $lf_instance = 0;
$lf_instance++;
$acc_id = 'locFaqAcc-' . $lf_instance;
?>
<section class="faqs-section<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<img
			src="<?php echo esc_url( $img_base . '/faqsimg.png' ); ?>"
			width="200"
			height="177"
			alt="faqs image"
			loading="lazy"
			decoding="async"
		>
		<h4>We&#8217;re here to help</h4>
		<h2>Frequently Asked Questions</h2>
		<div class="accordion custom-accordion" id="<?php echo esc_attr( $acc_id ); ?>">
			<?php foreach ( $listing as $i => $faq ) : ?>
			<div class="accordion-item custom-accordion-item">
				<h2 class="accordion-header" id="<?php echo esc_attr( $acc_id . '-h-' . $i ); ?>">
					<button
						class="accordion-button<?php echo 0 === $i ? '' : ' collapsed'; ?>"
						type="button"
						data-bs-toggle="collapse"
						data-bs-target="#<?php echo esc_attr( $acc_id . '-b-' . $i ); ?>"
						aria-expanded="<?php echo 0 === $i ? 'true' : 'false'; ?>"
						aria-controls="<?php echo esc_attr( $acc_id . '-b-' . $i ); ?>"
					>
						<?php echo esc_html( $faq['faqhead'] ?? '' ); ?>
					</button>
				</h2>
				<div
					id="<?php echo esc_attr( $acc_id . '-b-' . $i ); ?>"
					class="accordion-collapse collapse<?php echo 0 === $i ? ' show' : ''; ?>"
					aria-labelledby="<?php echo esc_attr( $acc_id . '-h-' . $i ); ?>"
					data-bs-parent="#<?php echo esc_attr( $acc_id ); ?>"
				>
					<div class="accordion-body custom-accordion-body">
						<?php echo wp_kses_post( $faq['faqbody'] ?? '' ); ?>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
