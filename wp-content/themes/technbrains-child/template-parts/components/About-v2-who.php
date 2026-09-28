<?php
/**
 * About Us V2 — 03 Who (copy left, card collage right).
 *
 * Port of ABSWho + ABSWhoArt from the QA-approved prototype
 * (about-story-copy.jsx:214-262, rendered through the shared Chapter wrapper
 * at :115-128). The three floating cards keep their fixed positions, colours
 * and icons from the approved design — only their text is editable, taken from
 * the repeater rows in order: top-left, right, bottom-left.
 *
 * Chapter of: abs_story (About-story.php) — a row of its abs_chapters field,
 * so values are read with get_sub_field() against the current row.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$abs_eyebrow = get_sub_field( 'abs_who_eyebrow' );
$abs_h2      = get_sub_field( 'abs_who_h2' );
$abs_lead    = get_sub_field( 'abs_who_lead' );
$abs_image   = get_sub_field( 'abs_who_image' );
$abs_cards   = get_sub_field( 'abs_who_cards' );

if ( ! $abs_h2 && ! $abs_lead ) {
	return;
}

$abs_card_text = static function ( $rows, $index ) {
	return ( is_array( $rows ) && isset( $rows[ $index ]['text'] ) ) ? $rows[ $index ]['text'] : '';
};

$abs_card_1 = $abs_card_text( $abs_cards, 0 );
$abs_card_2 = $abs_card_text( $abs_cards, 1 );
$abs_card_3 = $abs_card_text( $abs_cards, 2 );

$abs_img_url = ( is_array( $abs_image ) && ! empty( $abs_image['url'] ) ) ? $abs_image['url'] : '';
$abs_img_alt = ( is_array( $abs_image ) && ! empty( $abs_image['alt'] ) ) ? $abs_image['alt'] : '';
$abs_img_w   = ( is_array( $abs_image ) && ! empty( $abs_image['width'] ) ) ? (int) $abs_image['width'] : 0;
$abs_img_h   = ( is_array( $abs_image ) && ! empty( $abs_image['height'] ) ) ? (int) $abs_image['height'] : 0;
?>
<section class="abs-chapter" data-screen-label="03 Who">
	<div class="abs-wrap">
		<div class="abs-ch-grid">
			<div class="abs-ch-text abs-rev">
				<?php if ( $abs_eyebrow ) : ?>
					<span class="abs-eyebrow"><?php echo esc_html( $abs_eyebrow ); ?></span>
				<?php endif; ?>
				<?php if ( $abs_h2 ) : ?>
					<h2 class="abs-h2"><?php echo wp_kses_post( $abs_h2 ); ?></h2>
				<?php endif; ?>
				<?php if ( $abs_lead ) : ?>
					<p class="abs-lead"><?php echo esc_html( $abs_lead ); ?></p>
				<?php endif; ?>
			</div>
			<div class="abs-ch-visual abs-rev d1">
				<div class="abs-wa2" aria-hidden="true">
					<span class="abs-wa2-blob"></span>
					<?php if ( $abs_img_url ) : ?>
						<div class="abs-wa2-portrait">
							<img src="<?php echo esc_url( $abs_img_url ); ?>" alt="<?php echo esc_attr( $abs_img_alt ); ?>"<?php echo $abs_img_w ? ' width="' . esc_attr( $abs_img_w ) . '"' : ''; ?><?php echo $abs_img_h ? ' height="' . esc_attr( $abs_img_h ) . '"' : ''; ?> loading="lazy" decoding="async" />
						</div>
					<?php endif; ?>

					<?php if ( $abs_card_1 ) : ?>
						<div class="abs-wa2-card abs-wa2-job">
							<span class="abs-wa2-bell">
								<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 8l-9-5-9 5 9 5 9-5z" /><path d="M3 8v8l9 5 9-5V8" /><path d="M12 13v8" /></svg>
							</span>
							<div class="abs-wa2-ttl"><?php echo esc_html( $abs_card_1 ); ?></div>
						</div>
					<?php endif; ?>

					<?php if ( $abs_card_2 ) : ?>
						<div class="abs-wa2-card abs-wa2-app">
							<span class="abs-wa2-bell">
								<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" /><circle cx="9" cy="7" r="4" /><line x1="19" y1="8" x2="19" y2="14" /><line x1="22" y1="11" x2="16" y2="11" /></svg>
							</span>
							<div class="abs-wa2-h"><?php echo esc_html( $abs_card_2 ); ?></div>
						</div>
					<?php endif; ?>

					<?php if ( $abs_card_3 ) : ?>
						<div class="abs-wa2-card abs-wa2-saved">
							<span class="abs-wa2-book">
								<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M3 17l5-5 4 4 8-8" /><polyline points="14 8 21 8 21 15" /></svg>
							</span>
							<div class="abs-wa2-ttl light"><?php echo esc_html( $abs_card_3 ); ?></div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
