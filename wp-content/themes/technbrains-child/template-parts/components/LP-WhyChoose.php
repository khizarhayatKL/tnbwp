<?php
/**
 * Landing Page — Why Choose (4 Cards).
 *
 * Layout : lp_why_choose (ACF Flexible Content)
 * Clone of Why-choose-industry.php (why_choose_industry) — same fields
 * (including the "Custom CSS Class" option), own layout so the grid can
 * default to 4 columns instead of that component's 3, without touching it.
 *
 * Reuses the global .ih-section / .ih-container / .ih-h2 / .ih-sub /
 * .ih-eyebrow / .ih-why-* classes as-is: their custom properties are declared
 * on :root (see components.css "Industry Hub" block), not scoped to a specific
 * page/section the way the --cs- and --dt- token families are, so no
 * re-pointing is needed here.
 *
 * Fields:
 *   lpwc_custom_class — text     (extra class(es) on the section wrapper)
 *   lpwc_eyebrow       — text
 *   lpwc_title         — text
 *   lpwc_description   — textarea
 *   lpwc_cards         — repeater: lpwc_card_icon, lpwc_card_title, lpwc_card_desc
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$eyebrow      = get_sub_field( 'lpwc_eyebrow' );
$title        = get_sub_field( 'lpwc_title' );
$desc         = get_sub_field( 'lpwc_description' );
$cards        = get_sub_field( 'lpwc_cards' );
$custom_class = trim( (string) get_sub_field( 'lpwc_custom_class' ) );

if ( empty( $cards ) ) {
	return;
}

$section_classes = 'ih-section lp-why-clean';
if ( $custom_class ) {
	$section_classes .= ' ' . $custom_class;
}
?>
<section class="<?php echo esc_attr( $section_classes ); ?>">
	<div class="ih-container">

		<div class="ih-why-head">
			<?php if ( $eyebrow ) : ?>
				<div class="ih-eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
			<?php endif; ?>
			<?php if ( $title ) : ?>
				<h2 class="ih-h2"><?php echo wp_kses_post( $title ); ?></h2>
			<?php endif; ?>
			<?php if ( $desc ) : ?>
				<p class="ih-sub"><?php echo esc_html( $desc ); ?></p>
			<?php endif; ?>
		</div>

		<div class="ih-why-cards lp-why-cards">

			<?php foreach ( $cards as $card ) :
				$icon_id = ! empty( $card['lpwc_card_icon']['ID'] ) ? (int) $card['lpwc_card_icon']['ID'] : 0;
				$c_title = ! empty( $card['lpwc_card_title'] )      ? $card['lpwc_card_title']            : '';
				$c_desc  = ! empty( $card['lpwc_card_desc'] )       ? $card['lpwc_card_desc']             : '';
			?>
			<div class="ih-why-card">

				<span class="ih-why-card-icon">
					<?php if ( $icon_id ) : ?>
						<?php echo wp_get_attachment_image( $icon_id, 'full', false, [
							'alt' => esc_attr( $c_title ),
						] ); ?>
					<?php else : ?>
						<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
							<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
							<polyline points="9 12 11 14 15 10"/>
						</svg>
					<?php endif; ?>
				</span>

				<?php if ( $c_title ) : ?>
					<h3><?php echo esc_html( $c_title ); ?></h3>
				<?php endif; ?>

				<?php if ( $c_desc ) : ?>
					<p><?php echo esc_html( $c_desc ); ?></p>
				<?php endif; ?>

			</div>
			<?php endforeach; ?>

		</div>

	</div>
</section>
