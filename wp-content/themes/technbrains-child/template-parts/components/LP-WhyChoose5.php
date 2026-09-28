<?php
/**
 * Landing Page — Why Choose (5 Cards).
 *
 * Layout : lp_why_choose5 (ACF Flexible Content)
 * Clone of LP-WhyChoose.php (lp_why_choose) — same fields (including the
 * "Custom CSS Class" option), own layout so the grid can default to 5
 * columns instead of that component's 4, without touching it.
 *
 * Reuses the global .ih-section / .ih-container / .ih-h2 / .ih-sub /
 * .ih-eyebrow / .ih-why-* classes as-is: their custom properties are declared
 * on :root (see components.css "Industry Hub" block), not scoped to a specific
 * page/section the way the --cs- and --dt- token families are, so no
 * re-pointing is needed here.
 *
 * Fields:
 *   lpwc5_custom_class — text     (extra class(es) on the section wrapper)
 *   lpwc5_eyebrow       — text
 *   lpwc5_title         — text
 *   lpwc5_description   — textarea
 *   lpwc5_cards         — repeater: lpwc5_card_icon, lpwc5_card_title, lpwc5_card_desc
 *   lpwc5_cta           — link (optional, centered below the cards)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$eyebrow      = get_sub_field( 'lpwc5_eyebrow' );
$title        = get_sub_field( 'lpwc5_title' );
$desc         = get_sub_field( 'lpwc5_description' );
$cards        = get_sub_field( 'lpwc5_cards' );
$cta          = get_sub_field( 'lpwc5_cta' );
$custom_class = trim( (string) get_sub_field( 'lpwc5_custom_class' ) );

if ( empty( $cards ) ) {
	return;
}

$section_classes = 'ih-section lp-why-clean';
if ( $custom_class ) {
	$section_classes .= ' ' . $custom_class;
}

$render_cta = static function ( $cta, $class ) {
	if ( ! is_array( $cta ) || empty( $cta['url'] ) || '' === (string) ( $cta['title'] ?? '' ) ) {
		return;
	}
	if ( in_array( $cta['url'], array( '#tnb-popup', '#tnb-form' ), true ) ) {
		echo '<button type="button" class="' . esc_attr( $class ) . ' tnb-popup-trigger">'
			. esc_html( (string) $cta['title'] ) . '</button>';
		return;
	}
	echo '<a class="' . esc_attr( $class ) . '" href="' . esc_url( $cta['url'] ) . '"'
		. ( ! empty( $cta['target'] ) ? ' target="' . esc_attr( $cta['target'] ) . '" rel="noopener"' : '' )
		. '>' . esc_html( (string) $cta['title'] ) . '</a>';
};
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

		<div class="ih-why-cards lp-why-cards5">

			<?php foreach ( $cards as $card ) :
				$icon_id = ! empty( $card['lpwc5_card_icon']['ID'] ) ? (int) $card['lpwc5_card_icon']['ID'] : 0;
				$c_title = ! empty( $card['lpwc5_card_title'] )      ? $card['lpwc5_card_title']            : '';
				$c_desc  = ! empty( $card['lpwc5_card_desc'] )       ? $card['lpwc5_card_desc']             : '';
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

		<?php if ( is_array( $cta ) && ! empty( $cta['url'] ) ) : ?>
			<div class="lp-why5-cta">
				<?php $render_cta( $cta, 'dt-btn dt-btn-primary' ); ?>
			</div>
		<?php endif; ?>

	</div>
</section>
