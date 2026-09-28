<?php
/**
 * Landing Page — Workflow Slider.
 *
 * Layout : lp_workflow_slider (ACF Flexible Content)
 * Fields : lpf_heading, lpf_sub, lpf_items{ lpf_item_image, lpf_item_title,
 *          lpf_item_desc, lpf_item_tag_label, lpf_item_tag_text }, lpf_cta, lpf_anchor
 * CSS    : assets/css/components.css (.lp-flow-*), reuses the site's generic
 *          .case-deck-nav / .case-btn / .case-deck-dots / .case-deck-dot controls
 *          (see Software-outsourcing-risks.php for the sibling usage) rotated
 *          vertical via a wrapper modifier, not the .so-riskx-* classes
 *          themselves — those carry `.page-slug-software-outsourcing`-scoped
 *          overrides (crossfade opacity, nav breakpoint) this page doesn't have.
 * JS     : assets/js/components.js's generic [data-riskx] slider — same
 *          data-attribute contract Software-outsourcing-risks.php uses, so no
 *          new JS. Autoplays every 4.2s, pauses on hover/focus, wraps, and
 *          respects prefers-reduced-motion.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$lpf_heading = (string) get_sub_field( 'lpf_heading' );
$lpf_sub     = (string) get_sub_field( 'lpf_sub' );
$lpf_anchor  = sanitize_title( (string) get_sub_field( 'lpf_anchor' ) );

/** Same "#tnb-popup" convention as LP-Hero.php / LP-Cards.php. */
$lpf_link = static function ( $link ): array {
	$url      = is_array( $link ) ? trim( (string) ( $link['url'] ?? '' ) ) : '';
	$is_popup = in_array( $url, array( '#tnb-popup', '#tnb-form' ), true );

	return array(
		'label'    => is_array( $link ) ? trim( (string) ( $link['title'] ?? '' ) ) : '',
		'url'      => $is_popup ? '' : $url,
		'target'   => is_array( $link ) ? (string) ( $link['target'] ?? '' ) : '',
		'is_popup' => $is_popup,
	);
};
$lpf_cta = $lpf_link( get_sub_field( 'lpf_cta' ) );

$lpf_items = [];
if ( have_rows( 'lpf_items' ) ) {
	while ( have_rows( 'lpf_items' ) ) {
		the_row();
		$title = (string) get_sub_field( 'lpf_item_title' );
		if ( '' === $title ) {
			continue;
		}
		$lpf_items[] = [
			'image'     => get_sub_field( 'lpf_item_image' ),
			'title'     => $title,
			'desc'      => (string) get_sub_field( 'lpf_item_desc' ),
			'tag_label' => (string) get_sub_field( 'lpf_item_tag_label' ),
			'tag_text'  => (string) get_sub_field( 'lpf_item_tag_text' ),
		];
	}
}

if ( '' === $lpf_heading && empty( $lpf_items ) ) {
	return;
}

$lpf_total = count( $lpf_items );
$lpf_uid   = wp_unique_id( 'lp-flow-' );
$lpf_arrow = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>';
$lpf_svg_kses = array(
	'svg'      => array(
		'viewbox'         => true,
		'fill'            => true,
		'stroke'          => true,
		'stroke-width'    => true,
		'stroke-linecap'  => true,
		'stroke-linejoin' => true,
		'aria-hidden'     => true,
	),
	'line'     => array( 'x1' => true, 'y1' => true, 'x2' => true, 'y2' => true ),
	'polyline' => array( 'points' => true ),
);
?>
<section class="lp-flow"<?php echo '' !== $lpf_anchor ? ' id="' . esc_attr( $lpf_anchor ) . '"' : ''; ?>>
	<div class="lp-flow-inner">

		<?php if ( '' !== $lpf_heading || '' !== $lpf_sub ) : ?>
			<div class="lp-flow-head">
				<?php if ( '' !== $lpf_heading ) : ?>
					<h2 class="lp-flow-h2"><?php echo esc_html( $lpf_heading ); ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $lpf_sub ) : ?>
					<p class="lp-flow-sub"><?php echo esc_html( $lpf_sub ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $lpf_items ) ) : ?>
			<div class="lp-flow-slider" data-riskx>
				<div class="lp-flow-feature">
					<div class="lp-flow-feature-media">
						<?php foreach ( $lpf_items as $lpf_i => $lpf_item ) :
							$lpf_img = (int) ( $lpf_item['image']['ID'] ?? 0 );
							if ( ! $lpf_img ) {
								continue;
							}
							echo wp_get_attachment_image(
								$lpf_img,
								'large',
								false,
								array(
									'class'          => 'lp-flow-detail-img' . ( 0 === (int) $lpf_i ? ' is-active' : '' ),
									'alt'            => '',
									'aria-hidden'    => 'true',
									'loading'        => 0 === (int) $lpf_i ? 'eager' : 'lazy',
									'decoding'       => 'async',
									'data-riskx-img' => (string) (int) $lpf_i,
								)
							);
						endforeach; ?>
					</div>

					<div class="lp-flow-feature-bodies">
						<?php foreach ( $lpf_items as $lpf_i => $lpf_item ) : ?>
							<div class="lp-flow-feature-body<?php echo 0 === (int) $lpf_i ? ' is-active' : ''; ?>"
								id="<?php echo esc_attr( $lpf_uid . '-panel-' . $lpf_i ); ?>"
								role="tabpanel"
								aria-labelledby="<?php echo esc_attr( $lpf_uid . '-tab-' . $lpf_i ); ?>"
								data-riskx-slide="<?php echo esc_attr( (string) (int) $lpf_i ); ?>"
								<?php echo 0 === (int) $lpf_i ? '' : 'aria-hidden="true"'; ?>>
								<h3><?php echo esc_html( $lpf_item['title'] ); ?></h3>
								<?php if ( '' !== $lpf_item['desc'] ) : ?>
									<p><?php echo esc_html( $lpf_item['desc'] ); ?></p>
								<?php endif; ?>
								<?php if ( '' !== $lpf_item['tag_label'] || '' !== $lpf_item['tag_text'] ) : ?>
									<div class="lp-flow-highlight">
										<?php if ( '' !== $lpf_item['tag_label'] ) : ?>
											<span class="lp-flow-highlight-label"><?php echo esc_html( $lpf_item['tag_label'] ); ?></span>
										<?php endif; ?>
										<?php if ( '' !== $lpf_item['tag_text'] ) : ?>
											<span class="lp-flow-highlight-text"><?php echo esc_html( $lpf_item['tag_text'] ); ?></span>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>

				<?php if ( $lpf_total > 1 ) : ?>
					<div class="case-deck-nav lp-flow-casenav" aria-label="<?php esc_attr_e( 'Workflow slide navigation', 'technbrains-child' ); ?>">
						<button class="case-btn" type="button" data-riskx-prev aria-label="<?php esc_attr_e( 'Previous slide', 'technbrains-child' ); ?>">
							<?php echo wp_kses( $lpf_arrow, $lpf_svg_kses ); ?>
						</button>
						<div class="case-deck-dots" role="tablist">
							<?php foreach ( $lpf_items as $lpf_i => $lpf_item ) : ?>
								<button class="case-deck-dot<?php echo 0 === (int) $lpf_i ? ' is-active' : ''; ?>"
									type="button"
									role="tab"
									id="<?php echo esc_attr( $lpf_uid . '-tab-' . $lpf_i ); ?>"
									aria-controls="<?php echo esc_attr( $lpf_uid . '-panel-' . $lpf_i ); ?>"
									aria-selected="<?php echo 0 === (int) $lpf_i ? 'true' : 'false'; ?>"
									data-riskx-dot="<?php echo esc_attr( (string) (int) $lpf_i ); ?>"
									aria-label="<?php echo esc_attr( sprintf( /* translators: %s: slide title */ __( 'Show slide: %s', 'technbrains-child' ), $lpf_item['title'] ) ); ?>"></button>
							<?php endforeach; ?>
						</div>
						<button class="case-btn" type="button" data-riskx-next aria-label="<?php esc_attr_e( 'Next slide', 'technbrains-child' ); ?>">
							<?php echo wp_kses( $lpf_arrow, $lpf_svg_kses ); ?>
						</button>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( ( '' !== $lpf_cta['url'] || $lpf_cta['is_popup'] ) && '' !== $lpf_cta['label'] ) : ?>
			<div class="lp-flow-cta-wrap">
				<?php if ( $lpf_cta['is_popup'] ) : ?>
					<button type="button" class="dt-btn dt-btn-primary lp-flow-cta tnb-popup-trigger"><?php echo esc_html( $lpf_cta['label'] ); ?></button>
				<?php else : ?>
					<a class="dt-btn dt-btn-primary lp-flow-cta" href="<?php echo esc_url( $lpf_cta['url'] ); ?>"<?php
						echo '' !== $lpf_cta['target'] ? ' target="' . esc_attr( $lpf_cta['target'] ) . '" rel="noopener"' : '';
					?>><?php echo esc_html( $lpf_cta['label'] ); ?></a>
				<?php endif; ?>
			</div>
		<?php endif; ?>

	</div>
</section>
