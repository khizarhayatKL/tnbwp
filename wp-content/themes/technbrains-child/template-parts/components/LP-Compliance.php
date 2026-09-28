<?php
/**
 * Landing Page — Compliance Badges (7 Cards).
 *
 * Layout : lp_compliance (ACF Flexible Content)
 * Bordered logo card per badge, label below. Each card image is a single
 * finished asset the user uploads (icon + wordmark already flattened) — no
 * separate icon/SVG handling needed.
 *
 * Fields:
 *   lpco_custom_class — text     (extra class(es) on the section wrapper)
 *   lpco_heading       — text     (optional)
 *   lpco_description   — textarea (optional)
 *   lpco_cards         — repeater: lpco_card_image, lpco_card_label
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$heading      = get_sub_field( 'lpco_heading' );
$desc         = get_sub_field( 'lpco_description' );
$cards        = get_sub_field( 'lpco_cards' );
$custom_class = trim( (string) get_sub_field( 'lpco_custom_class' ) );

if ( empty( $cards ) ) {
	return;
}

$section_classes = 'ih-section lp-compliance';
if ( $custom_class ) {
	$section_classes .= ' ' . $custom_class;
}
?>
<section class="<?php echo esc_attr( $section_classes ); ?>">
	<div class="ih-container">

		<?php if ( $heading || $desc ) : ?>
		<div class="lp-compliance-head">
			<?php if ( $heading ) : ?>
				<h2 class="ih-h2"><?php echo esc_html( $heading ); ?></h2>
			<?php endif; ?>
			<?php if ( $desc ) : ?>
				<p class="ih-sub"><?php echo esc_html( $desc ); ?></p>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<div class="lp-compliance-row">
			<?php foreach ( $cards as $card ) :
				$image = $card['lpco_card_image'] ?? null;
				$label = $card['lpco_card_label'] ?? '';
			?>
			<div class="lp-compliance-card">
				<div class="lp-compliance-badge">
					<?php if ( ! empty( $image['url'] ) ) : ?>
						<img
							src="<?php echo esc_url( $image['url'] ); ?>"
							alt="<?php echo esc_attr( $image['alt'] ?: $label ); ?>"
							loading="lazy"
							decoding="async"
						>
					<?php endif; ?>
				</div>
				<?php if ( $label ) : ?>
					<span class="lp-compliance-label"><?php echo esc_html( $label ); ?></span>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>

	</div>
</section>
