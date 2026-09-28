<?php
/**
 * Logistics — "Custom Logistics Software We Build" types grid + closing CTA banner.
 *
 * Layout : lg_types (ACF Flexible Content)
 * Fields : lgty_eyebrow, lgty_heading, lgty_sub,
 *          lgty_cards{ lgty_card_title, lgty_card_desc },
 *          lgty_cta_text, lgty_cta_desc, lgty_cta_button
 * CSS    : assets/css/logistics.css (.lg-types-*, .lg-type-*)
 * JS     : none.
 *
 * Card icons are uploaded per-row (lgty_card_icon) — no default, a card
 * with no upload simply has no icon. lgty_card_desc allows inline links
 * (e.g. the "mobile app development" cross-link on the Logistics Apps card)
 * via tnb_lg_allowed_html(), plus 'p' locally so wpautop()'s blank-line ->
 * separate-paragraph split survives wp_kses — every other tnb_lg_allowed_html()
 * caller wraps its own single-line note in one <p>, so 'p' is added here only,
 * not in the shared allowlist.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$lgty_eyebrow    = (string) get_sub_field( 'lgty_eyebrow' );
$lgty_heading    = (string) get_sub_field( 'lgty_heading' );
$lgty_sub        = (string) get_sub_field( 'lgty_sub' );
$lgty_cta_text   = (string) get_sub_field( 'lgty_cta_text' );
$lgty_cta_desc   = (string) get_sub_field( 'lgty_cta_desc' );
$lgty_cta_button = get_sub_field( 'lgty_cta_button' );

$lgty_cards = [];
if ( have_rows( 'lgty_cards' ) ) {
	while ( have_rows( 'lgty_cards' ) ) {
		the_row();
		$lgty_title = trim( (string) get_sub_field( 'lgty_card_title' ) );
		if ( '' === $lgty_title ) {
			continue;
		}
		$lgty_icon    = get_sub_field( 'lgty_card_icon' );
		$lgty_cards[] = [
			'title'    => $lgty_title,
			'desc'     => trim( (string) get_sub_field( 'lgty_card_desc' ) ),
			'icon_url' => is_array( $lgty_icon ) && ! empty( $lgty_icon['url'] ) ? (string) $lgty_icon['url'] : '',
			'icon_alt' => is_array( $lgty_icon ) ? (string) ( $lgty_icon['alt'] ?? '' ) : '',
		];
	}
}

if ( empty( $lgty_cards ) ) {
	return;
}

$lgty_render_cta = static function ( $cta, $class ) {
	if ( ! is_array( $cta ) || empty( $cta['url'] ) || '' === (string) ( $cta['title'] ?? '' ) ) {
		return;
	}
	$lgty_arrow = '<span class="arr">' . tnb_lg_icon( 'arrow' ) . '</span>';
	if ( in_array( $cta['url'], array( '#tnb-popup', '#tnb-form' ), true ) ) {
		echo '<button type="button" class="' . esc_attr( $class ) . ' tnb-popup-trigger">'
			. esc_html( (string) $cta['title'] ) . $lgty_arrow . '</button>';
		return;
	}
	echo '<a class="' . esc_attr( $class ) . '" href="' . esc_url( $cta['url'] ) . '"'
		. ( ! empty( $cta['target'] ) ? ' target="' . esc_attr( $cta['target'] ) . '" rel="noopener"' : '' )
		. '>' . esc_html( (string) $cta['title'] ) . $lgty_arrow . '</a>';
};
?>
<section class="dt-section lg-types-section">
	<div class="container">

		<?php if ( '' !== $lgty_eyebrow || '' !== $lgty_heading || '' !== $lgty_sub ) : ?>
			<div class="dt-head dt-center dt-rev">
				<?php if ( '' !== $lgty_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $lgty_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $lgty_heading ) : ?>
					<h2 class="dt-h2"><?php echo esc_html( $lgty_heading ); ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $lgty_sub ) : ?>
					<p class="dt-sub"><?php echo wp_kses( $lgty_sub, tnb_lg_allowed_html() ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="lg-types-grid">
			<?php foreach ( $lgty_cards as $lgty_i => $lgty_card ) : ?>
				<div class="lg-type-card dt-rev" style="transition-delay:<?php echo esc_attr( (string) ( ( $lgty_i % 2 ) * 60 ) ); ?>ms">
					<?php if ( '' !== $lgty_card['icon_url'] ) : ?>
						<span class="lg-type-ic">
							<img src="<?php echo esc_url( $lgty_card['icon_url'] ); ?>" alt="<?php echo esc_attr( $lgty_card['icon_alt'] ); ?>" width="22" height="22" loading="lazy" decoding="async">
						</span>
					<?php endif; ?>
					<h3><?php echo esc_html( $lgty_card['title'] ); ?></h3>
					<?php if ( '' !== $lgty_card['desc'] ) : ?>
						<?php
						$lgty_desc_kses    = tnb_lg_allowed_html();
						$lgty_desc_kses['p'] = array();
						echo wp_kses( wpautop( $lgty_card['desc'] ), $lgty_desc_kses );
						?>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>

		<?php if ( '' !== $lgty_cta_text || '' !== $lgty_cta_desc || ( is_array( $lgty_cta_button ) && ! empty( $lgty_cta_button['url'] ) ) ) : ?>
			<div class="lg-types-cta dt-rev">
				<div class="lg-types-cta-tx">
					<?php if ( '' !== $lgty_cta_text ) : ?>
						<b><?php echo esc_html( $lgty_cta_text ); ?></b>
					<?php endif; ?>
					<?php if ( '' !== $lgty_cta_desc ) : ?>
						<p><?php echo esc_html( $lgty_cta_desc ); ?></p>
					<?php endif; ?>
				</div>
				<?php $lgty_render_cta( $lgty_cta_button, 'dt-btn dt-btn-primary' ); ?>
			</div>
		<?php endif; ?>

	</div>
</section>
