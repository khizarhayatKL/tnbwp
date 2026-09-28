<?php
/**
 * Flexible Engagement Models — ACF flexible content layout
 *
 * Matches the IHEngage component from the Claude Design exactly.
 * 3-column card grid with icon, title, description, best-for, includes boxes.
 *
 * Layout name : flexible_engagement
 * Dispatcher  : template-parts/flexible/dispatch.php
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$eyebrow = get_sub_field( 'ife_eyebrow' );
$title   = get_sub_field( 'ife_title' );
$desc    = get_sub_field( 'ife_description' );
$cards   = get_sub_field( 'ife_cards' );

if ( empty( $cards ) ) {
	return;
}
?>
<section class="ih-section">
	<div class="ih-container">

		<?php if ( $eyebrow ) : ?>
			<div class="ih-eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
		<?php endif; ?>

		<?php if ( $title ) : ?>
			<h2 class="ih-h2"><?php echo wp_kses_post( $title ); ?></h2>
		<?php endif; ?>

		<?php if ( $desc ) : ?>
			<p class="ih-sub"><?php echo esc_html( $desc ); ?></p>
		<?php endif; ?>

		<div class="ih-engage-grid">

			<?php foreach ( $cards as $card ) :
				$badge     = ! empty( $card['ife_card_badge'] )    ? $card['ife_card_badge']    : '';
				$icon_id   = ! empty( $card['ife_card_icon']['ID'] ) ? (int) $card['ife_card_icon']['ID'] : 0;
				$c_title   = ! empty( $card['ife_card_title'] )    ? $card['ife_card_title']    : '';
				$c_desc    = ! empty( $card['ife_card_desc'] )     ? $card['ife_card_desc']     : '';
				$best_for  = ! empty( $card['ife_card_best_for'] ) ? $card['ife_card_best_for'] : '';
				$includes  = ! empty( $card['ife_card_includes'] ) ? $card['ife_card_includes'] : '';
				$btn_text  = ! empty( $card['ife_card_btn_text'] ) ? $card['ife_card_btn_text'] : '';
				$btn_url   = ! empty( $card['ife_card_btn_url'] )  ? $card['ife_card_btn_url']  : '';

				$tag     = $btn_url ? 'a' : 'div';
				$tag_attr = $btn_url ? ' href="' . esc_url( $btn_url ) . '"' : '';
			?>
			<<?php echo $tag . $tag_attr; ?> class="ih-engage-card">

				<?php if ( $badge ) : ?>
					<div class="ih-engage-badge"><?php echo esc_html( $badge ); ?></div>
				<?php endif; ?>

				<div class="ih-engage-icon">
					<?php if ( $icon_id ) : ?>
						<?php echo wp_get_attachment_image( $icon_id, 'full', false, [
							'alt' => esc_attr( $c_title ),
						] ); ?>
					<?php else : ?>
						<svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
							<polygon points="12 2 2 7 12 12 22 7 12 2"/>
							<polyline points="2 17 12 22 22 17"/>
							<polyline points="2 12 12 17 22 12"/>
						</svg>
					<?php endif; ?>
				</div>

				<?php if ( $c_title ) : ?>
					<h3><?php echo esc_html( $c_title ); ?></h3>
				<?php endif; ?>

				<?php if ( $c_desc ) : ?>
					<p class="ih-engage-desc"><?php echo esc_html( $c_desc ); ?></p>
				<?php endif; ?>

				<?php if ( $best_for ) : ?>
					<div class="ih-engage-box">
						<strong>Best for:</strong> <?php echo esc_html( $best_for ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $includes ) : ?>
					<div class="ih-engage-box">
						<strong>Includes:</strong> <?php echo esc_html( $includes ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $btn_text ) : ?>
					<div class="ih-engage-foot">
						<?php echo esc_html( $btn_text ); ?>
						<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
					</div>
				<?php endif; ?>

			</<?php echo $tag; ?>>
			<?php endforeach; ?>

		</div>

	</div>
</section>
