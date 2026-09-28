<?php
/**
 * Mobile App Development — Hero.
 *
 * Layout : ma_hero (ACF Flexible Content)
 * Fields : mah_eyebrow, mah_h1, mah_lead, mah_cta_primary, mah_cta_secondary,
 *          mah_photo, mah_anchor, additional_classes
 * CSS    : assets/css/mobile-app.css (.ma-stack/.ma-grid-bg/.ma-showcase*) over
 *          components.css (.dt-hero-*) — .dt-hero is already the dark hero shell used by
 *          Staff Aug, Software Outsourcing, and Dedicated Teams, so no new hero background,
 *          heading, or CTA styling is declared here — only the phone-mockup visual layer is new.
 * JS     : none of its own — the .dt-rev reveal in components.js is the only behaviour.
 *
 * A <section>, not a <header> — this sits among <section class="dt-section"> siblings from
 * the same ma_* family and the page already has its own site <header> (header.php); a second
 * <header> landmark here would be ambiguous for assistive tech.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$mah_eyebrow = (string) get_sub_field( 'mah_eyebrow' );
$mah_heading = tnb_accent_heading( (string) get_sub_field( 'mah_h1' ) );
$mah_lead    = (string) get_sub_field( 'mah_lead' );
$mah_photo   = get_sub_field( 'mah_photo' );
$mah_anchor  = sanitize_title( (string) get_sub_field( 'mah_anchor' ) );
$mah_classes = trim( (string) get_sub_field( 'additional_classes' ) );

$mah_kses = tnb_ma_allowed_html();
$mah_svg  = tnb_ma_svg_html();

/**
 * Reads one ACF link field down to the parts the markup needs — same convention as
 * Construction-hero.php's $cnh_link closure. "#tnb-popup"/"#tnb-form" opens the sitewide
 * popup form instead of linking out.
 *
 * @param mixed $link ACF link value.
 * @return array{label:string,url:string,target:string,is_popup:bool}
 */
$mah_link = static function ( $link ): array {
	$url      = is_array( $link ) ? trim( (string) ( $link['url'] ?? '' ) ) : '';
	$is_popup = in_array( $url, array( '#tnb-popup', '#tnb-form' ), true );

	return array(
		'label'    => is_array( $link ) ? trim( (string) ( $link['title'] ?? '' ) ) : '',
		'url'      => $is_popup ? '' : $url,
		'target'   => is_array( $link ) ? (string) ( $link['target'] ?? '' ) : '',
		'is_popup' => $is_popup,
	);
};

$mah_cta1 = $mah_link( get_sub_field( 'mah_cta_primary' ) );
$mah_cta2 = $mah_link( get_sub_field( 'mah_cta_secondary' ) );

// Nothing above the fold survives an empty heading.
if ( '' === $mah_heading ) {
	return;
}

$mah_section_class = 'dt-hero ma-hero';
if ( '' !== $mah_classes ) {
	$mah_section_class .= ' ' . $mah_classes;
}
?>
<section class="<?php echo esc_attr( $mah_section_class ); ?>"<?php echo '' !== $mah_anchor ? ' id="' . esc_attr( $mah_anchor ) . '"' : ''; ?>>
	<div class="dt-hero-bg" aria-hidden="true"></div>
	<div class="dt-hero-grid-layout">
		<div class="dt-hero-content">
			<?php if ( '' !== $mah_eyebrow ) : ?>
				<div class="eyebrow"><?php echo esc_html( $mah_eyebrow ); ?></div>
			<?php endif; ?>

			<h1><?php echo $mah_heading; // Sanitised by tnb_accent_heading(). ?></h1>

			<?php if ( '' !== $mah_lead ) : ?>
				<p class="dt-hero-lead"><?php echo wp_kses( $mah_lead, $mah_kses ); ?></p>
			<?php endif; ?>

			<?php if ( '' !== $mah_cta1['url'] || $mah_cta1['is_popup'] || '' !== $mah_cta2['url'] || $mah_cta2['is_popup'] ) : ?>
				<div class="dt-hero-actions">
					<?php if ( ( '' !== $mah_cta1['url'] || $mah_cta1['is_popup'] ) && '' !== $mah_cta1['label'] ) : ?>
						<?php if ( $mah_cta1['is_popup'] ) : ?>
							<button type="button" class="dt-btn dt-btn-primary tnb-popup-trigger"><?php echo esc_html( $mah_cta1['label'] ); ?> <span class="arr"><?php
								echo wp_kses( tnb_ma_icon( 'arrow' ), $mah_svg );
							?></span></button>
						<?php else : ?>
							<a class="dt-btn dt-btn-primary" href="<?php echo esc_url( $mah_cta1['url'] ); ?>"<?php
								echo '' !== $mah_cta1['target'] ? ' target="' . esc_attr( $mah_cta1['target'] ) . '" rel="noopener"' : '';
							?>><?php echo esc_html( $mah_cta1['label'] ); ?> <span class="arr"><?php
								echo wp_kses( tnb_ma_icon( 'arrow' ), $mah_svg );
							?></span></a>
						<?php endif; ?>
					<?php endif; ?>

					<?php if ( ( '' !== $mah_cta2['url'] || $mah_cta2['is_popup'] ) && '' !== $mah_cta2['label'] ) : ?>
						<?php if ( $mah_cta2['is_popup'] ) : ?>
							<button type="button" class="dt-btn dt-btn-ghost tnb-popup-trigger"><?php echo esc_html( $mah_cta2['label'] ); ?></button>
						<?php else : ?>
							<a class="dt-btn dt-btn-ghost" href="<?php echo esc_url( $mah_cta2['url'] ); ?>"<?php
								echo '' !== $mah_cta2['target'] ? ' target="' . esc_attr( $mah_cta2['target'] ) . '" rel="noopener"' : '';
							?>><?php echo esc_html( $mah_cta2['label'] ); ?></a>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>

		<div class="dt-hero-visual" aria-hidden="true">
			<div class="ma-stack">
				<div class="ma-grid-bg" aria-hidden="true"></div>
				<?php if ( ! empty( $mah_photo['id'] ) ) : ?>
					<div class="ma-showcase">
						<?php
						// Likely LCP candidate — eager + high priority, matching Construction-hero.php's
						// treatment of its own hero photo.
						echo wp_get_attachment_image(
							(int) $mah_photo['id'],
							'large',
							false,
							array(
								'alt'           => '',
								'loading'       => 'eager',
								'fetchpriority' => 'high',
								'decoding'      => 'async',
								'class'         => 'ma-showcase-img',
							)
						);
						?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
