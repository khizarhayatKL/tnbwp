<?php

/**
 * Component: Platform FAQs
 * Layout   : platform_faqs (ACF Flexible Content)
 *
 * Accordion FAQ section. Matches Claude Design PlatformFAQ pixel-perfectly:
 * white background, centred head, max-width 860px list, + icon rotates 45°
 * to × on open, max-height slide animation.
 *
 * First item open by default. One open at a time; clicking open item closes it.
 *
 * Repeater data fetched as a flat array via get_sub_field() — same pattern
 * used by Platform-services.php and Platform-engagement.php.
 *
 * Fields:
 *   pfaq_eyebrow       — text     (eyebrow pill, e.g. "Common Questions")
 *   pfaq_heading       — text     (section h2)
 *   pfaq_description   — textarea (optional paragraph below heading)
 *   pfaq_faqs          — repeater
 *     pfaq_question    — text
 *     pfaq_answer      — textarea
 *   additional_classes — text     (extra CSS classes on section wrapper)
 *   pfaq_anchor        — text     (optional section id, for in-page links / a sidebar TOC)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$eyebrow     = get_sub_field( 'pfaq_eyebrow' )     ?: '';
$heading     = get_sub_field( 'pfaq_heading' )     ?: '';
$description = get_sub_field( 'pfaq_description' ) ?: '';
$faqs        = get_sub_field( 'pfaq_faqs' )         ?: [];
$theme       = get_sub_field( 'pfaq_theme' )        ?: 'light';
$add_classes = trim( get_sub_field( 'additional_classes' ) ?: '' );
$anchor      = sanitize_title( (string) get_sub_field( 'pfaq_anchor' ) );

if ( empty( $faqs ) ) {
	return;
}

$section_class = 'platform-faqs theme-' . ( 'dark' === $theme ? 'dark' : 'light' );
if ( $add_classes ) {
	$section_class .= ' ' . $add_classes;
}
?>
<section class="<?php echo esc_attr( $section_class ); ?>"<?php echo '' !== $anchor ? ' id="' . esc_attr( $anchor ) . '"' : ''; ?>>
	<div class="pfaq-container">

		<?php if ( $eyebrow || $heading || $description ) : ?>
		<div class="pfaq-head">

			<?php if ( $eyebrow ) : ?>
			<span class="pfaq-eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
			<?php endif; ?>

			<?php if ( $heading ) : ?>
			<h2 class="pfaq-h2"><?php echo esc_html( $heading ); ?></h2>
			<?php endif; ?>

			<?php if ( $description ) : ?>
			<p class="pfaq-desc"><?php echo esc_html( $description ); ?></p>
			<?php endif; ?>

		</div>
		<?php endif; ?>

		<div class="pfaq-list">
			<?php foreach ( $faqs as $idx => $faq ) :
				$question   = isset( $faq['pfaq_question'] ) ? trim( $faq['pfaq_question'] ) : '';
				$answer     = isset( $faq['pfaq_answer'] )   ? trim( $faq['pfaq_answer'] )   : '';
				$is_first   = ( 0 === $idx );
				$item_class = 'pfaq-item' . ( $is_first ? ' is-open' : '' );
			?>
			<div class="<?php echo esc_attr( $item_class ); ?>">

				<h3 class="pfaq-q-title">
					<button
						class="pfaq-q"
						type="button"
						aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>"
					>
						<span><?php echo esc_html( $question ); ?></span>
						<span class="pfaq-icon" aria-hidden="true">
							<svg width="14" height="14" viewBox="0 0 24 24" fill="none"
								stroke="currentColor" stroke-width="2.5"
								stroke-linecap="round" stroke-linejoin="round"
								focusable="false">
								<path d="M6 9l6 6 6-6" />
							</svg>
						</span>
					</button>
				</h3>

				<div class="pfaq-a">
					<?php echo wp_kses_post( wpautop( $answer ) ); ?>
				</div>

			</div>
			<?php endforeach; ?>
		</div>

	</div>
</section>
