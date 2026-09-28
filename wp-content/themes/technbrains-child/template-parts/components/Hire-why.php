<?php
/**
 * Component: Hire Developer — Why Hire With Us (HDWhy)
 * Layout   : hd_why (ACF Flexible Content)
 *
 * Fields:
 *   hdwhy_eyebrow          — text
 *   hdwhy_heading          — text   (plain part)
 *   hdwhy_heading_accent   — text   (accent span)
 *   hdwhy_sub              — textarea
 *   hdwhy_center_image     — image  (array) — circular hero photo
 *   hdwhy_logo_image       — image  (array) — brand logo overlay
 *   hdwhy_cards            — repeater (6 items; 1–3 → left col, 4–6 → right col)
 *     hdwhy_card_icon      — image  (array) — upload white/red icon
 *     hdwhy_card_title     — text
 *     hdwhy_card_desc      — textarea
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$eyebrow        = get_sub_field( 'hdwhy_eyebrow' )        ?: '';
$heading        = get_sub_field( 'hdwhy_heading' )        ?: '';
$heading_accent = get_sub_field( 'hdwhy_heading_accent' ) ?: '';
$sub            = get_sub_field( 'hdwhy_sub' )            ?: '';
$center_image   = get_sub_field( 'hdwhy_center_image' );
$logo_image     = get_sub_field( 'hdwhy_logo_image' );

$cards     = [];
$cards_raw = get_sub_field( 'hdwhy_cards' );
if ( is_array( $cards_raw ) ) {
	foreach ( $cards_raw as $card ) {
		$cards[] = [
			'icon'  => $card['hdwhy_card_icon']  ?? null,
			'title' => $card['hdwhy_card_title'] ?? '',
			'desc'  => $card['hdwhy_card_desc']  ?? '',
		];
	}
}

if ( empty( $cards ) ) {
	return;
}

$left_cards  = array_slice( $cards, 0, 3 );
$right_cards = array_slice( $cards, 3 );
?>
<section class="hd-why">
	<div class="hd-container">

		<div class="hd-section-head center">
			<?php if ( $eyebrow ) : ?>
			<div class="hd-eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
			<?php endif; ?>

			<?php if ( $heading || $heading_accent ) : ?>
			<h2 class="hd-h2">
				<?php echo esc_html( $heading ); ?>
				<?php if ( $heading_accent ) : ?>
				<span class="hd-accent"><?php echo esc_html( $heading_accent ); ?></span>
				<?php endif; ?>
			</h2>
			<?php endif; ?>

			<?php if ( $sub ) : ?>
			<p class="hd-sub"><?php echo esc_html( $sub ); ?></p>
			<?php endif; ?>
		</div>

		<div class="hd-why-stage">

			<div class="hd-why-col">
				<?php foreach ( $left_cards as $card ) : ?>
				<div class="hd-why-card">
					<?php if ( ! empty( $card['icon'] ) ) : ?>
					<div class="hd-why-icon">
						<?php echo wp_get_attachment_image(
							(int) $card['icon']['ID'],
							[ 18, 18 ],
							false,
							[ 'alt' => '', 'loading' => 'lazy' ]
						); ?>
					</div>
					<?php endif; ?>
					<?php if ( $card['title'] ) : ?>
					<h3><?php echo esc_html( $card['title'] ); ?></h3>
					<?php endif; ?>
					<?php if ( $card['desc'] ) : ?>
					<p><?php echo esc_html( $card['desc'] ); ?></p>
					<?php endif; ?>
				</div>
				<?php endforeach; ?>
			</div>

			<div class="hd-why-center">
				<div class="hd-why-ring"></div>
				<div class="hd-why-ring inner"></div>
				<div class="hd-why-mask">
					<?php if ( ! empty( $center_image ) ) :
						echo wp_get_attachment_image(
							(int) $center_image['ID'],
							'large',
							false,
							[
								'alt'     => esc_attr( $center_image['alt'] ?: 'Engineering team collaboration' ),
								'loading' => 'lazy',
							]
						);
					endif; ?>
					<?php if ( ! empty( $logo_image ) ) : ?>
					<div class="hd-why-mask-logo">
						<?php echo wp_get_attachment_image(
							(int) $logo_image['ID'],
							[ 120, 22 ],
							false,
							[
								'alt'     => esc_attr( $logo_image['alt'] ?: get_bloginfo( 'name' ) ),
								'loading' => 'lazy',
							]
						); ?>
					</div>
					<?php endif; ?>
				</div>
			</div>

			<div class="hd-why-col">
				<?php foreach ( $right_cards as $card ) : ?>
				<div class="hd-why-card">
					<?php if ( ! empty( $card['icon'] ) ) : ?>
					<div class="hd-why-icon">
						<?php echo wp_get_attachment_image(
							(int) $card['icon']['ID'],
							[ 18, 18 ],
							false,
							[ 'alt' => '', 'loading' => 'lazy' ]
						); ?>
					</div>
					<?php endif; ?>
					<?php if ( $card['title'] ) : ?>
					<h3><?php echo esc_html( $card['title'] ); ?></h3>
					<?php endif; ?>
					<?php if ( $card['desc'] ) : ?>
					<p><?php echo esc_html( $card['desc'] ); ?></p>
					<?php endif; ?>
				</div>
				<?php endforeach; ?>
			</div>

		</div>
	</div>
</section>
