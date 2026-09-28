<?php
/**
 * Component: Industry-Specific Cards Grid (new-Industry-specific)
 *
 * Flexible content layout part. All fields retrieved via get_sub_field().
 *
 * ACF Fields — Section Header:
 *  - ihi_eyebrow         (text)     Small uppercase eyebrow label above the H2.
 *  - ihi_title           (text)     H2 plain/main text portion.
 *  - ihi_title_accent    (text)     H2 red accent text portion (wrapped in <span class="accent">).
 *  - ihi_description     (wysiwyg) Subtitle below the H2 — supports links, bold, lists.
 *
 * ACF Fields — Repeater: ihi_cards (each row):
 *  - ihi_card_image       (image)   ACF image array for the card's thumbnail.
 *  - ihi_card_title       (text)    Card heading (H3).
 *  - ihi_card_description (text)    Card description paragraph.
 *  - ihi_card_bullets     (textarea) One bullet point per line.
 *  - ihi_card_btn_text    (text)    Card link label (optional).
 *  - ihi_card_btn_url     (url)     Card link URL; wraps H3 title in <a> when set.
 *
 * @package TechnBrains_Child
 */

defined( 'ABSPATH' ) || exit;

// ── Section header fields ─────────────────────────────────────────────────────
$eyebrow     = get_sub_field( 'ihi_eyebrow' );
$title       = get_sub_field( 'ihi_title' );
$title_accent = get_sub_field( 'ihi_title_accent' );
$description = get_sub_field( 'ihi_description' );

// ── Repeater ──────────────────────────────────────────────────────────────────
$cards = get_sub_field( 'ihi_cards' );
?>

<section class="ih-section ih-industry-specific">
	<div class="ih-container">

		<?php /* ── Section header ─────────────────────────────────────────── */ ?>
		<?php if ( $eyebrow ) : ?>
			<div class="ih-eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
		<?php endif; ?>

		<?php if ( $title || $title_accent ) : ?>
			<h2 class="ih-h2">
				<?php if ( $title ) : ?>
					<?php echo esc_html( $title ); ?>
				<?php endif; ?>
				<?php if ( $title_accent ) : ?>
					<span><?php echo esc_html( $title_accent ); ?></span>
				<?php endif; ?>
			</h2>
		<?php endif; ?>

		<?php if ( $description ) : ?>
			<div class="ih-sub"><?php echo wp_kses_post( $description ); ?></div>
		<?php endif; ?>

		<?php /* ── Cards grid ───────────────────────────────────────────────── */ ?>
		<?php if ( ! empty( $cards ) ) : ?>
			<div class="ih-ind-grid">

				<?php foreach ( $cards as $card ) : ?>
					<?php
					// ── Per-card field extraction ──────────────────────────
					$image_field = ! empty( $card['ihi_card_image'] )       ? $card['ihi_card_image']       : array();
					$card_title  = ! empty( $card['ihi_card_title'] )       ? $card['ihi_card_title']       : '';
					$card_desc   = ! empty( $card['ihi_card_description'] ) ? $card['ihi_card_description'] : '';
					$bullets_raw = ! empty( $card['ihi_card_bullets'] )     ? $card['ihi_card_bullets']     : '';
					$btn_text    = ! empty( $card['ihi_card_btn_text'] )    ? $card['ihi_card_btn_text']    : '';
					$btn_url     = ! empty( $card['ihi_card_btn_url'] )     ? $card['ihi_card_btn_url']     : '';

					// ── Image details ──────────────────────────────────────
					$image_id  = ! empty( $image_field['id'] )  ? (int) $image_field['id']  : 0;
					$image_alt = ! empty( $image_field['alt'] ) ? $image_field['alt'] : ( ! empty( $image_field['title'] ) ? $image_field['title'] : $card_title );

					// ── Bullets parsing (PHP 7.4 compatible) ──────────────
					$bullets = array();
					if ( $bullets_raw !== '' ) {
						$bullets = array_filter(
							array_map( 'trim', explode( "\n", $bullets_raw ) ),
							function ( $line ) {
								return $line !== '';
							}
						);
					}

					?>

					<div class="ih-ind-card">

						<?php if ( $image_id ) : ?>
							<div class="ih-ind-img">
								<a href="<?php echo esc_url( $btn_url ); ?>">
								<?php
								echo wp_get_attachment_image(
									$image_id,
									'medium_large',
									false,
									array(
										'loading'  => 'lazy',
										'decoding' => 'async',
										'alt'      => esc_attr( $image_alt ),
									)
								);
								?>
								</a>
							</div>
						<?php endif; ?>

						<div class="ih-ind-body">

							<?php if ( $card_title ) : ?>
								<h3>
									<?php if ( $btn_url ) : ?>
										<a href="<?php echo esc_url( $btn_url ); ?>"><?php echo esc_html( $card_title ); ?></a>
									<?php else : ?>
										<?php echo esc_html( $card_title ); ?>
									<?php endif; ?>
								</h3>
							<?php endif; ?>

							<?php if ( $card_desc ) : ?>
								<div class="ih-ind-desc"><?php echo wp_kses_post( $card_desc ); ?></div>
							<?php endif; ?>

							<?php if ( ! empty( $bullets ) ) : ?>
								<ul class="ih-ind-bullets">
									<?php foreach ( $bullets as $bullet ) : ?>
										<li><?php echo esc_html( $bullet ); ?></li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>

							<?php if ( $btn_text ) : ?>
								<span class="ih-ind-card-link"><?php echo esc_html( $btn_text ); ?></span>
							<?php endif; ?>

						</div>

					</div>

				<?php endforeach; ?>

			</div>
		<?php endif; ?>

	</div>
</section>
