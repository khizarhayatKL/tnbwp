<?php
/**
 * About Us V2 — 12 Final CTA.
 *
 * Port of ABSFinal from the QA-approved prototype
 * (about-story-copy.jsx:630-647). Keeps the #abs-cta id, which the hero's
 * primary button links to and which about-v2.js uses as the story rail's end
 * point (the last rail node is placed at the bottom of .abs-final-inner).
 *
 * Chapter of: abs_story (About-story.php) — a row of its abs_chapters field,
 * so values are read with get_sub_field() against the current row.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$abs_h2    = get_sub_field( 'abs_cta_h2' );
$abs_lines = get_sub_field( 'abs_cta_lines' );
$abs_close = get_sub_field( 'abs_cta_close' );
$abs_b1_t  = get_sub_field( 'abs_cta_btn1_text' );
$abs_b1_u  = get_sub_field( 'abs_cta_btn1_url' );
$abs_b2_t  = get_sub_field( 'abs_cta_btn2_text' );
$abs_b2_u  = get_sub_field( 'abs_cta_btn2_url' );
$abs_bg    = get_sub_field( 'abs_cta_bg' );

if ( ! $abs_h2 && empty( $abs_lines ) ) {
	return;
}

/*
 * Background image, handed to CSS as a custom property rather than a background
 * declaration. An uploads URL cannot live in a static stylesheet — it differs per
 * environment — so the URL is data and the rule stays in about-v2.css. Same
 * technique as --ap-bg on the author page.
 *
 * The stylesheet layers a dark scrim over it so the white copy keeps its contrast
 * ratio whatever image is chosen; with no image the section renders exactly as
 * before.
 */
$abs_bg_url   = ( is_array( $abs_bg ) && ! empty( $abs_bg['url'] ) ) ? $abs_bg['url'] : '';
$abs_bg_style = $abs_bg_url
	? ' style="--abs-cta-bg:url(' . esc_url( $abs_bg_url ) . ')"'
	: '';
?>
<section class="abs-final" id="abs-cta" data-screen-label="12 Final CTA"<?php echo $abs_bg_style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- URL escaped above, rest is a fixed literal. ?>>
	<div class="abs-final-glow" aria-hidden="true"></div>
	<div class="abs-wrap">
		<div class="abs-final-inner abs-rev">
			<?php if ( $abs_h2 ) : ?>
				<h2><?php echo esc_html( $abs_h2 ); ?></h2>
			<?php endif; ?>

			<?php if ( ! empty( $abs_lines ) ) : ?>
				<div class="abs-final-lines">
					<?php
					foreach ( $abs_lines as $abs_line ) {
						if ( empty( $abs_line['text'] ) ) {
							continue;
						}
						echo '<p>' . esc_html( $abs_line['text'] ) . '</p>';
					}
					?>
				</div>
			<?php endif; ?>

			<?php if ( $abs_close ) : ?>
				<div class="abs-final-close"><?php echo esc_html( $abs_close ); ?></div>
			<?php endif; ?>

			<?php if ( ( $abs_b1_t && $abs_b1_u ) || ( $abs_b2_t && $abs_b2_u ) ) : ?>
				<div class="abs-final-actions">
					<?php if ( $abs_b1_t && $abs_b1_u ) : ?>
						<a class="hd-btn hd-btn-primary" href="<?php echo esc_url( $abs_b1_u ); ?>"><?php echo esc_html( $abs_b1_t ); ?></a>
					<?php endif; ?>
					<?php if ( $abs_b2_t && $abs_b2_u ) : ?>
						<a class="hd-btn hd-btn-secondary" href="<?php echo esc_url( $abs_b2_u ); ?>"><?php echo esc_html( $abs_b2_t ); ?></a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
