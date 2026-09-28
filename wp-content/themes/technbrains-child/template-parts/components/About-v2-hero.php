<?php
/**
 * About Us V2 — 01 Hero.
 *
 * Port of the ABSHero component from the QA-approved prototype
 * (about-story-copy.jsx:89-111). Markup, classes and DOM order are identical
 * to the source; only the copy is dynamic. The particle net is drawn by
 * assets/js/about-v2.js into the <canvas> below.
 *
 * Rendered by: abs_story (About-story.php). The hero sits outside
 * .abs-story-track, so its fields are direct sub-fields of the abs_story layout
 * rather than an abs_chapters row — but still get_sub_field(), since the
 * dispatcher's page_sections row is the active context.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$abs_tag   = get_sub_field( 'abs_hero_tag' );
$abs_h1    = get_sub_field( 'abs_hero_h1' );
$abs_lines = get_sub_field( 'abs_hero_lines' );
$abs_em    = get_sub_field( 'abs_hero_em' );

// Both CTAs are ACF Link fields, so one field carries label + URL + target.
$abs_cta1 = get_sub_field( 'abs_hero_cta1' );
$abs_cta2 = get_sub_field( 'abs_hero_cta2' );

/**
 * Renders one hero CTA from an ACF Link value.
 *
 * A link needs both a URL and a label to be usable, so a half-filled field
 * renders nothing rather than an empty or unlabelled button.
 *
 * Special case: the URL "#tnb-popup" renders the site's enquiry popup trigger
 * instead of a link — a <button class="tnb-popup-trigger">, the same contract
 * hero-banner.php and banner.php use. assets/js/popup.js listens for clicks on
 * document and matches ".tnb-popup-trigger", so nothing needs registering, and
 * header.php already outputs the overlay on every page. A <button> is correct
 * here rather than an anchor: it opens an in-page dialog and navigates nowhere.
 * .hd-btn sets its own font-family, font-size and cursor, so the button is
 * visually identical to the anchor.
 *
 * @param mixed  $abs_link  ACF Link value (array) or empty.
 * @param string $abs_class Button class.
 */
$abs_render_cta = static function ( $abs_link, $abs_class ) {
	if ( ! is_array( $abs_link ) ) {
		return;
	}

	$abs_url   = isset( $abs_link['url'] ) ? trim( (string) $abs_link['url'] ) : '';
	$abs_label = isset( $abs_link['title'] ) ? trim( (string) $abs_link['title'] ) : '';

	if ( '' === $abs_url || '' === $abs_label ) {
		return;
	}

	if ( '#tnb-popup' === $abs_url ) {
		printf(
			'<button type="button" class="hd-btn %1$s tnb-popup-trigger">%2$s</button>',
			esc_attr( $abs_class ),
			esc_html( $abs_label )
		);
		return;
	}

	// rel="noopener" only where a new tab is actually requested.
	$abs_target = ( isset( $abs_link['target'] ) && '_blank' === $abs_link['target'] )
		? ' target="_blank" rel="noopener"'
		: '';

	printf(
		'<a class="hd-btn %1$s" href="%2$s"%3$s>%4$s</a>',
		esc_attr( $abs_class ),
		esc_url( $abs_url ),
		$abs_target, // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- fixed literal above.
		esc_html( $abs_label )
	);
};

$abs_has_cta = ( is_array( $abs_cta1 ) && ! empty( $abs_cta1['url'] ) ) || ( is_array( $abs_cta2 ) && ! empty( $abs_cta2['url'] ) );
?>
<div class="abs-hero" data-screen-label="01 Hero">
	<div aria-hidden="true">
		<span class="abs-hero-glow a"></span>
		<span class="abs-hero-glow b"></span>
		<span class="abs-hero-grid"></span>
		<canvas class="abs-hero-plexus"></canvas>
	</div>
	<div class="abs-hero-inner">
		<?php if ( $abs_tag ) : ?>
			<span class="abs-hero-tag abs-rev in"><span class="pip"></span> <?php echo esc_html( $abs_tag ); ?></span>
		<?php endif; ?>

		<?php if ( $abs_h1 ) : ?>
			<h1 class="abs-rev in d1"><?php echo wp_kses_post( $abs_h1 ); ?></h1>
		<?php endif; ?>

		<?php if ( ! empty( $abs_lines ) || $abs_em ) : ?>
			<div class="abs-hero-lines abs-rev in d2">
				<?php
				// The story lines are a list of visitor situations, so they render as a
				// real <ul>. The emphasised closing line is a statement about all three,
				// not a fourth item, so it stays a sibling of the list.
				if ( ! empty( $abs_lines ) ) {
					$abs_line_items = '';
					foreach ( $abs_lines as $abs_line ) {
						if ( empty( $abs_line['text'] ) ) {
							continue;
						}
						$abs_line_items .= '<li>' . esc_html( $abs_line['text'] ) . '</li>';
					}
					if ( '' !== $abs_line_items ) {
						echo '<ul class="abs-hero-list">' . $abs_line_items . '</ul>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- each item escaped above.
					}
				}
				if ( $abs_em ) {
					echo '<span class="em">' . esc_html( $abs_em ) . '</span>';
				}
				?>
			</div>
		<?php endif; ?>

		<?php if ( $abs_has_cta ) : ?>
			<div class="abs-hero-actions abs-rev in d3">
				<?php
				$abs_render_cta( $abs_cta1, 'hd-btn-primary' );
				$abs_render_cta( $abs_cta2, 'hd-btn-secondary' );
				?>
			</div>
		<?php endif; ?>
	</div>
</div>
