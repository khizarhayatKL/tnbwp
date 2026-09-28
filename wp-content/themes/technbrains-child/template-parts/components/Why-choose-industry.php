<?php
/**
 * Why Choose Industry — ACF flexible content layout
 *
 * Matches the IHWhy component from the Claude Design exactly.
 * Left-aligned header, 3×2 benefit cards grid with icon, title, description.
 *
 * Layout name : why_choose_industry
 * Dispatcher  : template-parts/flexible/dispatch.php
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$eyebrow      = get_sub_field( 'ihw_eyebrow' );
$title        = get_sub_field( 'ihw_title' );
$desc         = get_sub_field( 'ihw_description' );
$cards        = get_sub_field( 'ihw_cards' );
$custom_class = trim( (string) get_sub_field( 'ihw_custom_class' ) );

if ( empty( $cards ) ) {
	return;
}

$section_classes = 'ih-section ih-why-clean';
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

		<div class="ih-why-cards">

			<?php foreach ( $cards as $card ) :
				$icon_id = ! empty( $card['ihw_card_icon']['ID'] ) ? (int) $card['ihw_card_icon']['ID'] : 0;
				$c_title = ! empty( $card['ihw_card_title'] )      ? $card['ihw_card_title']            : '';
				$c_desc  = ! empty( $card['ihw_card_desc'] )       ? $card['ihw_card_desc']             : '';
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
