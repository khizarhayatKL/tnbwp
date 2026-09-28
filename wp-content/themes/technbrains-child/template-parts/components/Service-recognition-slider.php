<?php
/**
 * Component: Service — Recognition Slider (Marquee)
 * Layout   : sv_recog_slider (ACF Flexible Content)
 *
 * Dark-band auto-scrolling logo marquee with masked fade edges.
 * Matches Claude Design RecognitionSlider component exactly.
 *
 * Fields:
 *   svrs_eyebrow  — text     (optional eyebrow label)
 *   svrs_heading  — text     (section heading)
 *   svrs_sub      — textarea (sub-paragraph)
 *   svrs_cards    — repeater (slider items, duplicated internally for infinite scroll)
 *     svrs_logo     — image  (platform logo; CSS inverts to white)
 *     svrs_rating   — text   (optional rating, e.g. "4.7" or "Top")
 *     svrs_sub_text — text   (optional label, e.g. "Top B2B Company")
 *     svrs_link     — url    (optional — wraps card in <a>)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/* ── 1. Fetch ACF data ──────────────────────────────────────────────────── */
$eyebrow = get_sub_field( 'svrs_eyebrow' ) ?: '';
$heading = get_sub_field( 'svrs_heading' ) ?: '';
$sub     = get_sub_field( 'svrs_sub' )     ?: '';

$cards_raw = get_sub_field( 'svrs_cards' );
$cards     = [];
if ( is_array( $cards_raw ) ) {
	foreach ( $cards_raw as $row ) {
		$logo = $row['svrs_logo'] ?? null;
		if ( empty( $logo['ID'] ) ) {
			continue;
		}
		$cards[] = [
			'logo'     => $logo,
			'rating'   => sanitize_text_field( $row['svrs_rating']   ?? '' ),
			'sub_text' => sanitize_text_field( $row['svrs_sub_text'] ?? '' ),
			'link'     => esc_url( $row['svrs_link'] ?? '' ),
		];
	}
}

/* Duplicate cards for seamless infinite scroll (matches React: [...SV_BADGES, ...SV_BADGES]) */
$all_cards = array_merge( $cards, $cards );
$count     = count( $cards );
?>
<section class="sv-recog">
	<div class="container">

		<?php if ( $eyebrow || $heading || $sub ) : ?>
		<div class="sv-recog-head">

			<?php if ( $eyebrow ) : ?>
			<div class="sv-recog-eyebrow">
				<?php echo esc_html( $eyebrow ); ?>
			</div>
			<?php endif; ?>

			<?php if ( $heading ) : ?>
			<h2 class="sv-recog-h2"><?php echo esc_html( $heading ); ?></h2>
			<?php endif; ?>

			<?php if ( $sub ) : ?>
			<p class="sv-recog-sub"><?php echo esc_html( $sub ); ?></p>
			<?php endif; ?>

		</div>
		<?php endif; ?>

		<?php if ( ! empty( $all_cards ) ) : ?>
		<div class="sv-recog-marquee">
			<div class="sv-recog-track">
				<?php foreach ( $all_cards as $i => $card ) :
					$is_duplicate = $i >= $count;
					$tag_open     = $card['link'] ? '<a href="' . $card['link'] . '" class="sv-recog-card" target="_blank" rel="noopener noreferrer"' : '<div class="sv-recog-card"';
					$tag_close    = $card['link'] ? '</a>' : '</div>';
					$aria_hidden  = $is_duplicate ? ' aria-hidden="true"' : '';
				?>
				<?php echo $tag_open . $aria_hidden . '>'; ?>

					<div class="sv-recog-card-logo">
						<?php echo wp_get_attachment_image(
							$card['logo']['ID'],
							[ 120, 38 ],
							false,
							[ 'alt' => '', 'loading' => 'lazy' ]
						); ?>
					</div><!-- .sv-recog-card-logo -->

					<?php if ( $card['rating'] || $card['sub_text'] ) : ?>
					<div class="sv-recog-card-meta">
						<?php if ( $card['rating'] ) : ?>
						<span class="sv-recog-card-rating">
							<?php echo esc_html( $card['rating'] ); ?>
						</span>
						<?php endif; ?>
						<?php if ( $card['sub_text'] ) : ?>
						<span class="sv-recog-card-sub"><?php echo esc_html( $card['sub_text'] ); ?></span>
						<?php endif; ?>
					</div><!-- .sv-recog-card-meta -->
					<?php endif; ?>

				<?php echo $tag_close; ?>
				<?php endforeach; ?>
			</div><!-- .sv-recog-track -->
		</div><!-- .sv-recog-marquee -->
		<?php endif; ?>

	</div><!-- .container -->
</section><!-- .sv-recog -->
