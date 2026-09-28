<?php
/**
 * Landing Page — Case Studies (peek carousel).
 *
 * Layout : lp_case_studies (ACF Flexible Content)
 * Fields : lpcs_heading, lpcs_desc, lpcs_cta, lpcs_slides{ lpcs_slide_image,
 *          lpcs_slide_company, lpcs_slide_stats{ lpcs_stat_value, lpcs_stat_label },
 *          lpcs_slide_headline, lpcs_slide_body, lpcs_slide_url }, lpcs_anchor
 *
 * Same slider as case-studies-slider.php (IH Case Studies): reuses its
 * .case-deck / .case-card 3D-perspective deck (front/side-l/side-r/far states)
 * and the generic [data-ih-cases-deck] JS in components.js verbatim — that
 * script keys off data-ih-cases-deck-wrap / -deck / -prev / -next / -dot / -index
 * attributes only, no class-name coupling, so multiple independent decks on a
 * page (this one and the homepage's) already work side by side with no changes.
 *
 * Only the CARD CONTENT differs from that component (own .lp-cs-* classes,
 * not .case-art-frame/.case-body): a colour+mockup panel on the left, a
 * 3-stat divided row, headline, and body copy on the right, per this family's
 * design — the same content shape is used for every slide (front and the
 * scaled/rotated side peeks alike), exactly as the original does.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$lpcs_heading = (string) get_sub_field( 'lpcs_heading' );
$lpcs_desc    = (string) get_sub_field( 'lpcs_desc' );
$lpcs_anchor  = sanitize_title( (string) get_sub_field( 'lpcs_anchor' ) );

/** Same "#tnb-popup" convention as the other lp_* components. */
$lpcs_link = static function ( $link ): array {
	$url      = is_array( $link ) ? trim( (string) ( $link['url'] ?? '' ) ) : '';
	$is_popup = in_array( $url, array( '#tnb-popup', '#tnb-form' ), true );

	return array(
		'label'    => is_array( $link ) ? trim( (string) ( $link['title'] ?? '' ) ) : '',
		'url'      => $is_popup ? '' : $url,
		'target'   => is_array( $link ) ? (string) ( $link['target'] ?? '' ) : '',
		'is_popup' => $is_popup,
	);
};
$lpcs_cta = $lpcs_link( get_sub_field( 'lpcs_cta' ) );

$lpcs_slides = [];
if ( have_rows( 'lpcs_slides' ) ) {
	while ( have_rows( 'lpcs_slides' ) ) {
		the_row();
		$company = (string) get_sub_field( 'lpcs_slide_company' );
		if ( '' === $company ) {
			continue;
		}

		$stats = [];
		if ( have_rows( 'lpcs_slide_stats' ) ) {
			while ( have_rows( 'lpcs_slide_stats' ) ) {
				the_row();
				$value = (string) get_sub_field( 'lpcs_stat_value' );
				if ( '' === $value ) {
					continue;
				}
				$stats[] = [
					'value' => $value,
					'label' => (string) get_sub_field( 'lpcs_stat_label' ),
				];
			}
		}

		$lpcs_slides[] = [
			'image'    => get_sub_field( 'lpcs_slide_image' ),
			'company'  => $company,
			'stats'    => $stats,
			'headline' => (string) get_sub_field( 'lpcs_slide_headline' ),
			'body'     => (string) get_sub_field( 'lpcs_slide_body' ),
			'link'     => $lpcs_link( get_sub_field( 'lpcs_slide_link' ) ),
		];
	}
}

if ( '' === $lpcs_heading && empty( $lpcs_slides ) ) {
	return;
}

$lpcs_total = count( $lpcs_slides );
?>
<section class="lp-cs"<?php echo '' !== $lpcs_anchor ? ' id="' . esc_attr( $lpcs_anchor ) . '"' : ''; ?> data-ih-cases-deck-wrap>
	<div class="lp-cs-inner">

		<?php if ( '' !== $lpcs_heading || '' !== $lpcs_desc || '' !== $lpcs_cta['url'] || $lpcs_cta['is_popup'] ) : ?>
			<div class="lp-cs-head">
				<div class="lp-cs-head-text">
					<?php if ( '' !== $lpcs_heading ) : ?>
						<h2 class="lp-cs-h2"><?php echo esc_html( $lpcs_heading ); ?></h2>
					<?php endif; ?>
					<?php if ( '' !== $lpcs_desc ) : ?>
						<p class="lp-cs-sub"><?php echo esc_html( $lpcs_desc ); ?></p>
					<?php endif; ?>
				</div>
				<?php if ( ( '' !== $lpcs_cta['url'] || $lpcs_cta['is_popup'] ) && '' !== $lpcs_cta['label'] ) : ?>
					<?php if ( $lpcs_cta['is_popup'] ) : ?>
						<button type="button" class="dt-btn dt-btn-primary lp-cs-cta tnb-popup-trigger"><?php echo esc_html( $lpcs_cta['label'] ); ?></button>
					<?php else : ?>
						<a class="dt-btn dt-btn-primary lp-cs-cta" href="<?php echo esc_url( $lpcs_cta['url'] ); ?>"<?php
							echo '' !== $lpcs_cta['target'] ? ' target="' . esc_attr( $lpcs_cta['target'] ) . '" rel="noopener"' : '';
						?>><?php echo esc_html( $lpcs_cta['label'] ); ?></a>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $lpcs_slides ) ) : ?>
			<div class="case-deck lp-cs-deck" data-ih-cases-deck>
				<?php foreach ( $lpcs_slides as $lpcs_i => $lpcs_slide ) :
					if ( 0 === $lpcs_i )                        { $lpcs_state = 'is-front';  $lpcs_z = 100; }
					elseif ( 1 === $lpcs_i )                    { $lpcs_state = 'is-side-r'; $lpcs_z = 10; }
					elseif ( $lpcs_i === $lpcs_total - 1 )      { $lpcs_state = 'is-side-l'; $lpcs_z = 10; }
					else                                         { $lpcs_state = 'is-far';    $lpcs_z = 30; }
					$lpcs_href = '' !== $lpcs_slide['link']['url'] ? $lpcs_slide['link']['url'] : '';
				?>
					<div class="case-card lp-cs-card <?php echo esc_attr( $lpcs_state ); ?>"
						href="<?php echo esc_url( $lpcs_href ); ?>"
						style="z-index:<?php echo (int) $lpcs_z; ?>"
						data-ih-cases-index="<?php echo (int) $lpcs_i; ?>"
						<?php echo '' !== $lpcs_slide['link']['target'] ? ' target="' . esc_attr( $lpcs_slide['link']['target'] ) . '" rel="noopener"' : ''; ?>
						aria-current="<?php echo 'is-front' === $lpcs_state ? 'true' : 'false'; ?>">

						<div class="lp-cs-art">
							<?php if ( ! empty( $lpcs_slide['image']['ID'] ) ) : ?>
								<?php echo wp_get_attachment_image( (int) $lpcs_slide['image']['ID'], 'large', false, [
									'class'   => 'lp-cs-art-img',
									'alt'     => esc_attr( $lpcs_slide['company'] . ' case study' ),
									'loading' => 0 === $lpcs_i ? 'eager' : 'lazy',
								] ); ?>
							<?php endif; ?>
						</div>

						<div class="lp-cs-body">
							<div class="lp-cs-company"><?php echo esc_html( $lpcs_slide['company'] ); ?></div>

							<?php if ( ! empty( $lpcs_slide['stats'] ) ) : ?>
								<div class="lp-cs-stats">
									<?php foreach ( $lpcs_slide['stats'] as $lpcs_stat ) : ?>
										<div class="lp-cs-stat">
											<div class="lp-cs-stat-v"><?php echo esc_html( $lpcs_stat['value'] ); ?></div>
											<?php if ( '' !== $lpcs_stat['label'] ) : ?>
												<div class="lp-cs-stat-l"><?php echo esc_html( $lpcs_stat['label'] ); ?></div>
											<?php endif; ?>
										</div>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>

							<?php if ( '' !== $lpcs_slide['headline'] ) : ?>
								<h3 class="lp-cs-headline"><?php echo esc_html( $lpcs_slide['headline'] ); ?></h3>
							<?php endif; ?>

							<?php if ( '' !== $lpcs_slide['body'] ) : ?>
								<p class="lp-cs-desc"><?php echo esc_html( $lpcs_slide['body'] ); ?></p>
							<?php endif; ?>

							<?php if ( '' !== $lpcs_slide['link']['label'] ) : ?>
								<div class="lp-cs-foot">
									<span class="lp-cs-link">
										<?php echo esc_html( $lpcs_slide['link']['label'] ); ?>
										<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
									</span>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div><!-- .case-deck -->

			<?php if ( $lpcs_total > 1 ) : ?>
				<div class="case-deck-nav lp-cs-nav">
					<button type="button" class="case-btn" aria-label="<?php esc_attr_e( 'Previous case study', 'technbrains-child' ); ?>" data-ih-cases-prev>
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
					</button>
					<div class="case-deck-dots">
						<?php for ( $lpcs_i = 0; $lpcs_i < $lpcs_total; $lpcs_i++ ) : ?>
							<button type="button"
								class="case-deck-dot<?php echo 0 === $lpcs_i ? ' is-active' : ''; ?>"
								aria-label="<?php echo esc_attr( sprintf( /* translators: %d: slide number */ __( 'Show case study %d', 'technbrains-child' ), $lpcs_i + 1 ) ); ?>"
								data-ih-cases-dot="<?php echo (int) $lpcs_i; ?>"></button>
						<?php endfor; ?>
					</div>
					<button type="button" class="case-btn" aria-label="<?php esc_attr_e( 'Next case study', 'technbrains-child' ); ?>" data-ih-cases-next>
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg>
					</button>
				</div>
			<?php endif; ?>
		<?php endif; ?>

	</div>
</section>
