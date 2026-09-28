<?php
/**
 * Component: Revamp FAQs — mirrors RevampComponents/MainFaqs/MainFaqs.jsx.
 * +/- icons, border separators, optional Load More.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data    = get_query_var( 'component_data' );
$d       = $data['faqs'] ?? array();
$listing = $d['listing'] ?? array();

static $rf_instance = 0;
$rf_instance++;
$accordion_id = 'rfAcc-' . $rf_instance;
$more_id      = 'rf-more-' . $rf_instance;
$btn_id       = 'rf-btn-' . $rf_instance;
?>
<section class="revampFaqs">
	<div class="container">
		<div class="rf-content">
			<h2>Frequently Asked Questions</h2>
		</div>
		<div class="rf-faq">
			<div class="accordion accordion-flush rf-accordian" id="<?php echo esc_attr( $accordion_id ); ?>">
				<?php foreach ( $listing as $i => $faq ) : ?>
				<div class="accordion-item rf-item<?php echo $i >= 5 ? ' rf-hidden' : ''; ?>">
					<h3 class="accordion-header rf-head" id="<?php echo esc_attr( $accordion_id . '-h-' . $i ); ?>">
						<button
							class="accordion-button<?php echo 0 === $i ? '' : ' collapsed'; ?>"
							type="button"
							data-bs-toggle="collapse"
							data-bs-target="#<?php echo esc_attr( $accordion_id . '-b-' . $i ); ?>"
							aria-expanded="<?php echo 0 === $i ? 'true' : 'false'; ?>"
							aria-controls="<?php echo esc_attr( $accordion_id . '-b-' . $i ); ?>"
						>
							<?php echo esc_html( $faq['faqhead'] ?? '' ); ?>
							<span class="rf-icon" aria-hidden="true">
								<span class="rf-plus-icon">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" focusable="false"><path d="M7.75 2a.75.75 0 01.75.75V7h4.25a.75.75 0 110 1.5H8.5v4.25a.75.75 0 11-1.5 0V8.5H2.75a.75.75 0 010-1.5H7V2.75A.75.75 0 017.75 2z"/></svg>
								</span>
								<span class="rf-minus-icon">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" focusable="false"><line x1="5" y1="12" x2="19" y2="12"/></svg>
								</span>
							</span>
						</button>
					</h3>
					<div
						id="<?php echo esc_attr( $accordion_id . '-b-' . $i ); ?>"
						class="accordion-collapse collapse<?php echo 0 === $i ? ' show' : ''; ?>"
						aria-labelledby="<?php echo esc_attr( $accordion_id . '-h-' . $i ); ?>"
						data-bs-parent="#<?php echo esc_attr( $accordion_id ); ?>"
					>
						<div class="accordion-body rf-body">
							<?php echo wp_kses_post( $faq['faqbody'] ?? '' ); ?>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>

		<?php if ( count( $listing ) > 5 ) : ?>
		<div class="rf-btn-wrapper" id="<?php echo esc_attr( $more_id ); ?>">
			<button class="tnb-btn" type="button" id="<?php echo esc_attr( $btn_id ); ?>" data-rfaq-acc="<?php echo esc_attr( $accordion_id ); ?>" data-rfaq-more="<?php echo esc_attr( $more_id ); ?>">
				<div class="textWrapper">
					<span class="primaryText">Load More</span>
					<span class="secondaryText" aria-hidden="true">Load More</span>
				</div>
			</button>
		</div>
		<?php endif; ?>
	</div>
</section>
