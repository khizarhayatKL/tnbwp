<?php

/**
 * Component: Platforms Specialize
 * Layout   : platforms_specialize (ACF Flexible Content)
 *
 * Displays a section-header (eyebrow / heading / subtitle) followed by
 * a 3-column responsive grid of platform cards. Each card shows a logo
 * image, tag line, platform name, and a short description. Cards are
 * optionally linked when a URL is provided.
 *
 * Fields:
 *   ps_eyebrow      — text  (small pill tag above heading, optional)
 *   ps_heading      — text  (section h2)
 *   ps_subheading   — textarea (paragraph below heading)
 *   ps_cards        — repeater:
 *       ps_card_logo   — image  (platform logo, uploaded by editor)
 *       ps_card_name   — text   (platform name)
 *       ps_card_tag    — text   (e.g. "ERP · Modular")
 *       ps_card_desc   — textarea
 *       ps_card_link   — text   (URL — omit to render card as non-linked div)
 *   custom_classes  — text  (extra CSS classes on the section wrapper)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$eyebrow        = get_sub_field( 'ps_eyebrow' )     ?: '';
$heading        = get_sub_field( 'ps_heading' )     ?: '';
$subheading     = get_sub_field( 'ps_subheading' )  ?: '';
$cards          = get_sub_field( 'ps_cards' )        ?: [];
$custom_classes = trim( get_sub_field( 'custom_classes' ) ?: '' );

if ( empty( $heading ) && empty( $cards ) ) {
	return;
}

$section_class = 'ps-section';
if ( $custom_classes ) {
	$section_class .= ' ' . $custom_classes;
}
?>
<section class="<?php echo esc_attr( $section_class ); ?>">
	<div class="ps-container">

		<?php if ( $heading || $subheading || $eyebrow ) : ?>
		<div class="ps-head">
			<?php if ( $eyebrow ) : ?>
			<span class="ps-eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
			<?php endif; ?>

			<?php if ( $heading ) : ?>
			<h2 class="ps-h2"><?php echo esc_html( $heading ); ?></h2>
			<?php endif; ?>

			<?php if ( $subheading ) : ?>
			<p class="ps-sub"><?php echo esc_html( $subheading ); ?></p>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<?php if ( ! empty( $cards ) ) : ?>
		<div class="ps-grid">

			<?php foreach ( $cards as $card ) :
				$logo = $card['ps_card_logo']  ?? null;
				$name = $card['ps_card_name']  ?? '';
				$tag  = $card['ps_card_tag']   ?? '';
				$desc = $card['ps_card_desc']  ?? '';
				$link = trim( $card['ps_card_link'] ?? '' );

				$logo_url = '';
				$logo_alt = $name;
				if ( is_array( $logo ) && ! empty( $logo['url'] ) ) {
					$logo_url = $logo['url'];
					$logo_alt = $logo['alt'] ?: $name;
				}

				$el       = $link ? 'a' : 'div';
				$href_att = $link ? ' href="' . esc_url( $link ) . '"' : '';
			?>
			<<?php echo $el; ?> class="ps-card"<?php echo $href_att; ?>>

				<div class="ps-card__top">
					<div class="ps-card__logo">
						<?php if ( $logo_url ) : ?>
						<img
							src="<?php echo esc_url( $logo_url ); ?>"
							alt="<?php echo esc_attr( $logo_alt ); ?>"
							loading="lazy"
							decoding="async"
							width="32"
							height="32"
						>
						<?php endif; ?>
					</div>
					<?php if ( $tag ) : ?>
					<span class="ps-card__tag"><?php echo esc_html( $tag ); ?></span>
					<?php endif; ?>
				</div>

				<?php if ( $name ) : ?>
				<h3 class="ps-card__name"><?php echo esc_html( $name ); ?></h3>
				<?php endif; ?>

				<?php if ( $desc ) : ?>
				<p class="ps-card__desc"><?php echo esc_html( $desc ); ?></p>
				<?php endif; ?>

			</<?php echo $el; ?>>

			<?php endforeach; ?>

		</div><!-- .ps-grid -->
		<?php endif; ?>

	</div><!-- .ps-container -->
</section>
