<?php

/**
 * Component: Platform Services
 * Layout   : platform_services (ACF Flexible Content)
 *
 * Displays a section-header (eyebrow / heading / subtitle) followed by a
 * 3-column grid of service cards. Each card contains a gradient icon tile
 * (image uploaded via ACF), a service title, and a description. Cards are
 * optionally linked when a URL is supplied.
 *
 * Icon tile gradient colors cycle automatically via CSS nth-child rules.
 * Upload white/light icons (SVG recommended, transparent background) so they
 * show clearly against the gradient tile.
 *
 * Fields:
 *   pls_eyebrow      — text     (eyebrow pill above heading, optional)
 *   pls_heading      — text     (section h2)
 *   pls_subheading   — textarea (paragraph below heading)
 *   pls_services     — repeater:
 *       pls_service_icon    — image  (icon — white SVG/PNG on transparent bg)
 *       pls_service_title   — text
 *       pls_service_desc    — wysiwyg (rich text with links/formatting)
 *       pls_service_link    — text   (URL — wraps H3 title in <a> when set)
 *   custom_classes   — text     (extra CSS classes on the section wrapper)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$eyebrow        = get_sub_field( 'pls_eyebrow' )    ?: '';
$heading        = get_sub_field( 'pls_heading' )    ?: '';
$subheading     = get_sub_field( 'pls_subheading' ) ?: '';
$services       = get_sub_field( 'pls_services' )   ?: [];
$custom_classes = trim( get_sub_field( 'custom_classes' ) ?: '' );

if ( empty( $heading ) && empty( $services ) ) {
	return;
}

$section_class = 'pls-section';
if ( $custom_classes ) {
	$section_class .= ' ' . $custom_classes;
}
?>
<section class="<?php echo esc_attr( $section_class ); ?>">
	<div class="pls-container">
		<div class="pls-shell">

			<?php if ( $heading || $subheading || $eyebrow ) : ?>
			<div class="pls-head">
				<?php if ( $eyebrow ) : ?>
				<span class="pls-eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
				<?php endif; ?>

				<?php if ( $heading ) : ?>
				<h2 class="pls-h2"><?php echo esc_html( $heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $subheading ) : ?>
				<p class="pls-sub"><?php echo esc_html( $subheading ); ?></p>
				<?php endif; ?>
			</div>
			<?php endif; ?>

			<?php if ( ! empty( $services ) ) : ?>
			<div class="pls-grid">

				<?php foreach ( $services as $service ) :
					$icon  = $service['pls_service_icon']  ?? null;
					$title = $service['pls_service_title'] ?? '';
					$desc  = $service['pls_service_desc']  ?? '';
					$link  = trim( $service['pls_service_link'] ?? '' );

					$icon_url = '';
					$icon_alt = $title;
					if ( is_array( $icon ) && ! empty( $icon['url'] ) ) {
						$icon_url = $icon['url'];
						$icon_alt = $icon['alt'] ?: $title;
					}

				?>
				<div class="pls-card">

					<div class="pls-tile">
						<?php if ( $icon_url ) : ?>
						<img
							src="<?php echo esc_url( $icon_url ); ?>"
							alt="<?php echo esc_attr( $icon_alt ); ?>"
							width="56"
							height="56"
							loading="lazy"
							decoding="async"
						>
						<?php endif; ?>
					</div>

					<?php if ( $title ) : ?>
					<h3 class="pls-card__title">
						<?php if ( $link ) : ?>
						<a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $title ); ?></a>
						<?php else : ?>
						<?php echo esc_html( $title ); ?>
						<?php endif; ?>
					</h3>
					<?php endif; ?>

					<?php if ( $desc ) : ?>
					<div class="pls-card__desc"><?php echo wp_kses_post( $desc ); ?></div>
					<?php endif; ?>

				</div>

				<?php endforeach; ?>

			</div><!-- .pls-grid -->
			<?php endif; ?>

		</div><!-- .pls-shell -->
	</div><!-- .pls-container -->
</section>
