<?php

/**
 * Component: Platform Engagement
 * Layout   : platform_engagement (ACF Flexible Content)
 *
 * Displays a centred section header followed by a 3-column grid of
 * engagement-model cards. Each card shows an icon tile (ACF image),
 * a heading, and a short description. On hover the icon tile fills
 * solid red and the icon inverts to white via CSS.
 *
 * Icon upload guidance:
 *   Upload a DARK (black / navy) stroke icon on a transparent background,
 *   SVG preferred, 52 × 52 px minimum. The CSS will invert it to white on
 *   card hover automatically.
 *
 * Fields:
 *   pe_eyebrow      — text     (eyebrow pill above heading, optional)
 *   pe_heading      — text     (section h2)
 *   pe_subheading   — textarea (paragraph below heading)
 *   pe_cards        — repeater:
 *       pe_card_icon    — image  (dark stroke icon, transparent bg)
 *       pe_card_title   — text
 *       pe_card_desc    — textarea
 *       pe_card_link    — text   (URL — omit to render as non-linked div)
 *   custom_classes  — text     (extra CSS classes on the section wrapper)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$eyebrow        = get_sub_field( 'pe_eyebrow' )    ?: '';
$heading        = get_sub_field( 'pe_heading' )    ?: '';
$subheading     = get_sub_field( 'pe_subheading' ) ?: '';
$cards          = get_sub_field( 'pe_cards' )       ?: [];
$custom_classes = trim( get_sub_field( 'custom_classes' ) ?: '' );

if ( empty( $heading ) && empty( $cards ) ) {
	return;
}

$section_class = 'pe-section';
if ( $custom_classes ) {
	$section_class .= ' ' . $custom_classes;
}
?>
<section class="<?php echo esc_attr( $section_class ); ?>">
	<div class="pe-container">

		<?php if ( $heading || $subheading || $eyebrow ) : ?>
		<div class="pe-head">
			<?php if ( $eyebrow ) : ?>
			<span class="pe-eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
			<?php endif; ?>

			<?php if ( $heading ) : ?>
			<h2 class="pe-h2"><?php echo esc_html( $heading ); ?></h2>
			<?php endif; ?>

			<?php if ( $subheading ) : ?>
			<p class="pe-sub"><?php echo esc_html( $subheading ); ?></p>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<?php if ( ! empty( $cards ) ) : ?>
		<div class="pe-grid">

			<?php foreach ( $cards as $card ) :
				$icon  = $card['pe_card_icon']  ?? null;
				$title = $card['pe_card_title'] ?? '';
				$desc  = $card['pe_card_desc']  ?? '';
				$link  = trim( $card['pe_card_link'] ?? '' );

				$icon_url = '';
				$icon_alt = $title;
				if ( is_array( $icon ) && ! empty( $icon['url'] ) ) {
					$icon_url = $icon['url'];
					$icon_alt = $icon['alt'] ?: $title;
				}

				$el       = $link ? 'a' : 'div';
				$href_att = $link ? ' href="' . esc_url( $link ) . '"' : '';
			?>
			<<?php echo $el; ?> class="pe-card"<?php echo $href_att; ?>>

				<div class="pe-icon">
					<?php if ( $icon_url ) : ?>
					<img
						src="<?php echo esc_url( $icon_url ); ?>"
						alt="<?php echo esc_attr( $icon_alt ); ?>"
						width="26"
						height="26"
						loading="lazy"
						decoding="async"
					>
					<?php endif; ?>
				</div>

				<?php if ( $title ) : ?>
				<h3 class="pe-card__title"><?php echo esc_html( $title ); ?></h3>
				<?php endif; ?>

				<?php if ( $desc ) : ?>
				<p class="pe-card__desc"><?php echo wp_kses( $desc, [ 'span' => [ 'class' => true ], 'br' => [], 'b' => [], 'strong' => [] ] ); ?></p>
				<?php endif; ?>

			</<?php echo $el; ?>>

			<?php endforeach; ?>

		</div><!-- .pe-grid -->
		<?php endif; ?>

	</div><!-- .pe-container -->
</section>
