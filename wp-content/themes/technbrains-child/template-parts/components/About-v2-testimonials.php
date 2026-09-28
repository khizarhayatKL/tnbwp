<?php
/**
 * About Us V2 — 10 Testimonials (single rotating card on a ghost stack).
 *
 * Port of ABSTestimonials from the QA-approved prototype
 * (about-story-copy.jsx:554-599). The source renders one card and swaps its
 * contents on a 2s interval, so the first quote is rendered server-side here
 * and the remaining quotes are handed to about-v2.js as JSON on the wrapper.
 * With JS off, the first quote still renders — no empty card, nothing hidden
 * from crawlers.
 *
 * Chapter of: abs_story (About-story.php) — a row of its abs_chapters field,
 * so values are read with get_sub_field() against the current row.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$abs_h2         = get_sub_field( 'abs_ts_h2' );
$abs_lead       = get_sub_field( 'abs_ts_lead' );
$abs_role_label = get_sub_field( 'abs_ts_role_label' );
$abs_platform   = get_sub_field( 'abs_ts_platform' );
$abs_link_text  = get_sub_field( 'abs_ts_link_text' );
$abs_link_url   = get_sub_field( 'abs_ts_link_url' );
$abs_quotes     = get_sub_field( 'abs_testimonials' );

if ( empty( $abs_quotes ) ) {
	return;
}

/** Two-letter initials for the avatar, mirroring ABSTstInitials at :552. */
$abs_initials = static function ( $name ) {
	$abs_parts  = preg_split( '/\s+/', trim( (string) $name ) );
	$abs_letters = '';

	foreach ( array_slice( (array) $abs_parts, 0, 2 ) as $abs_word ) {
		if ( '' === $abs_word ) {
			continue;
		}
		$abs_letters .= function_exists( 'mb_substr' ) ? mb_substr( $abs_word, 0, 1 ) : substr( $abs_word, 0, 1 );
	}

	return function_exists( 'mb_strtoupper' ) ? mb_strtoupper( $abs_letters ) : strtoupper( $abs_letters );
};

// Payload for the rotation. Kept to the values the card actually swaps.
// 'r' is the per-quote role, falling back to the shared attribution line so
// rows saved before that sub-field existed still read correctly.
$abs_payload = array();
foreach ( $abs_quotes as $abs_row ) {
	$abs_q  = isset( $abs_row['quote'] ) ? trim( (string) $abs_row['quote'] ) : '';
	$abs_by = isset( $abs_row['author'] ) ? trim( (string) $abs_row['author'] ) : '';
	$abs_r  = isset( $abs_row['role'] ) ? trim( (string) $abs_row['role'] ) : '';

	if ( '' === $abs_q ) {
		continue;
	}

	// Optional reviewer photo. A 'thumbnail' URL is handed to the rotation rather
	// than full markup: the avatar is 44px, so 150px already covers 3x, and the
	// JS only has to swap one src. Empty string keeps the initials.
	$abs_photo_id  = ( isset( $abs_row['photo'] ) && is_array( $abs_row['photo'] ) && ! empty( $abs_row['photo']['ID'] ) )
		? (int) $abs_row['photo']['ID']
		: 0;
	$abs_photo_url = $abs_photo_id ? (string) wp_get_attachment_image_url( $abs_photo_id, 'thumbnail' ) : '';

	$abs_payload[] = array(
		'q'   => $abs_q,
		'by'  => $abs_by,
		'i'   => $abs_initials( $abs_by ),
		'r'   => '' !== $abs_r ? $abs_r : (string) $abs_role_label,
		'img' => $abs_photo_url,
	);
}

if ( empty( $abs_payload ) ) {
	return;
}

$abs_first = $abs_payload[0];

$abs_ts_star = '<svg viewBox="0 0 24 24" fill="currentColor" width="14" height="14" class="glyph" aria-hidden="true"><path d="M12 2l2.9 6.3 6.9.7-5.1 4.6 1.4 6.8L12 17.8 5.9 20.4l1.4-6.8L2.2 9l6.9-.7z" /></svg>';
?>
<section class="abs-chapter abs-ts-chapter" data-screen-label="10 Testimonials">
	<div class="abs-wrap">
		<div class="abs-split">
			<div class="abs-split-head abs-rev">
				<?php if ( $abs_h2 ) : ?>
					<h2 class="abs-h2"><?php echo esc_html( $abs_h2 ); ?></h2>
				<?php endif; ?>
				<?php if ( $abs_lead ) : ?>
					<p class="abs-lead"><?php echo esc_html( $abs_lead ); ?></p>
				<?php endif; ?>
			</div>
			<div class="abs-ts2-body abs-split-body abs-rev d1" data-quotes="<?php echo esc_attr( wp_json_encode( $abs_payload ) ); ?>">
				<div class="abs-ts2-stack">
					<span class="abs-ts2-ghost g2" aria-hidden="true"></span>
					<span class="abs-ts2-ghost g1" aria-hidden="true"></span>
					<article class="abs-ts2-card is-c is-solo">
						<svg class="abs-ts2-mark" viewBox="0 0 24 24" fill="currentColor" width="32" height="32" aria-hidden="true"><path d="M7 11h3v6H4V11c0-3 2-5 5-5v2c-1 0-2 1-2 3zm10 0h3v6h-6V11c0-3 2-5 5-5v2c-1 0-2 1-2 3z" /></svg>
						<blockquote class="abs-ts2-quote">&ldquo;<?php echo esc_html( $abs_first['q'] ); ?>&rdquo;</blockquote>
						<div class="abs-ts2-divider"></div>
						<div class="abs-ts2-foot">
							<?php
							/*
							 * The initials live in their own <span> so about-v2.js can swap
							 * between photo and initials by setting textContent and an img
							 * src, with no innerHTML anywhere near reviewer data. The span is
							 * a grid item in a place-items:center parent, so wrapped or bare
							 * the initials render identically.
							 *
							 * The wrapper keeps aria-hidden — the reviewer's name is already
							 * announced by .abs-ts2-name right below — so the photo is
							 * decorative and carries alt="".
							 */
							?>
							<div class="abs-ts2-avatar<?php echo $abs_first['img'] ? ' abs-ts2-avatar--img' : ''; ?>" aria-hidden="true">
								<img
									src="<?php echo esc_url( $abs_first['img'] ); ?>"
									alt=""
									width="44"
									height="44"
									decoding="async"
									<?php echo $abs_first['img'] ? '' : 'hidden'; ?>
								/>
								<span class="abs-ts2-initials"><?php echo $abs_first['img'] ? '' : esc_html( $abs_first['i'] ); ?></span>
							</div>
							<div class="abs-ts2-cite">
								<div class="abs-ts2-name"><?php echo esc_html( $abs_first['by'] ); ?></div>
								<?php if ( '' !== $abs_first['r'] ) : ?>
									<div class="abs-ts2-role"><?php echo esc_html( $abs_first['r'] ); ?></div>
								<?php endif; ?>
							</div>
							<?php if ( $abs_platform ) : ?>
								<div class="abs-ts2-platform">
									<?php
									// Hardcoded design asset, not user input.
									echo $abs_ts_star; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									?>
									<?php echo esc_html( $abs_platform ); ?>
								</div>
							<?php endif; ?>
						</div>
						<?php if ( $abs_link_text && $abs_link_url ) : ?>
							<a href="<?php echo esc_url( $abs_link_url ); ?>" class="abs-ts2-link"><?php echo esc_html( $abs_link_text ); ?> <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12" /><polyline points="12 5 19 12 12 19" /></svg></a>
						<?php endif; ?>
					</article>
				</div>
				<?php
				/*
				 * Manual controls for the rotation, to the right of the card. Placed
				 * after the card on purpose: CSS puts the rail on the right, so
				 * markup order this way keeps tab order matching the visual order.
				 *
				 * Rendered hidden and unhidden by about-v2.js — without JS the buttons
				 * would be dead, and the card is already fully readable server-side.
				 * Clicking any control stops the 2s autoplay for good, which is also
				 * the escape hatch WCAG 2.2.2 asks for.
				 *
				 * Classes are the theme's own case-deck nav (components.css) so no
				 * button or dot styling is duplicated for this page.
				 */
				if ( count( $abs_payload ) > 1 ) :
					?>
					<div class="case-deck-nav abs-ts-nav" aria-label="<?php esc_attr_e( 'Testimonial navigation', 'technbrains-child' ); ?>" hidden>
						<button type="button" class="case-btn" data-abs-ts-prev aria-label="<?php esc_attr_e( 'Previous testimonial', 'technbrains-child' ); ?>">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5M11 19l-7-7 7-7" /></svg>
						</button>
						<div class="case-deck-dots" role="tablist">
							<?php
							foreach ( array_keys( $abs_payload ) as $abs_i ) {
								printf(
									'<button type="button" role="tab" class="case-deck-dot%1$s" data-abs-ts-dot="%2$d" aria-selected="%3$s" aria-label="%4$s"></button>',
									0 === $abs_i ? ' is-active' : '',
									(int) $abs_i,
									0 === $abs_i ? 'true' : 'false',
									/* translators: 1: testimonial number, 2: total testimonials. */
									esc_attr( sprintf( __( 'Show testimonial %1$d of %2$d', 'technbrains-child' ), (int) $abs_i + 1, count( $abs_payload ) ) )
								);
							}
							?>
						</div>
						<button type="button" class="case-btn" data-abs-ts-next aria-label="<?php esc_attr_e( 'Next testimonial', 'technbrains-child' ); ?>">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7" /></svg>
						</button>
					</div>
					<?php
				endif;
				?>
			</div>
		</div>
	</div>
</section>
