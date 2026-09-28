<?php
/**
 * Construction Software — Closing CTA banner.
 *
 * Layout : cn_banner (ACF Flexible Content)
 * Fields : cnb_bg_image, cnb_heading, cnb_text, cnb_sub, cnb_anchor,
 *          cnb_cta_primary, cnb_cta_secondary
 * CSS    : assets/css/construction.css (.cn-banner*)
 * JS     : none — the .dt-rev reveal in components.js is the only behaviour.
 *
 * Last block on the page, so the anchor field matters more here than elsewhere: the hero and several
 * mid-page CTAs point at it. Set it once (cn-contact in the prototype) and the in-page links resolve.
 *
 * Either CTA's URL can be the sitewide magic value "#tnb-popup" or "#tnb-form" — same convention
 * as Software-outsourcing-hero.php / Staff-aug-hero.php — which renders a <button class=
 * "tnb-popup-trigger"> (opens popup-form.php, delegated by popup.js) instead of a link. A button
 * with no URL and not a popup trigger is simply not rendered — an anchor with href="#" would
 * scroll to the top of the page and look broken.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cnb_bg_image = get_sub_field( 'cnb_bg_image' );
$cnb_bg_url   = is_array( $cnb_bg_image ) ? trim( (string) ( $cnb_bg_image['url'] ?? '' ) ) : '';

$cnb_heading = tnb_accent_heading( (string) get_sub_field( 'cnb_heading' ) );
$cnb_text    = (string) get_sub_field( 'cnb_text' );
$cnb_sub     = (string) get_sub_field( 'cnb_sub' );
$cnb_anchor  = sanitize_title( (string) get_sub_field( 'cnb_anchor' ) );

$cnb_kses = tnb_cn_allowed_html();
$cnb_svg  = tnb_cn_svg_html();

/**
 * Reads one ACF link field down to the parts the markup needs.
 *
 * @param mixed $link ACF link value.
 * @return array{label:string,url:string,target:string,is_popup:bool}
 */
$cnb_link = static function ( $link ): array {
	$url      = is_array( $link ) ? trim( (string) ( $link['url'] ?? '' ) ) : '';
	$is_popup = in_array( $url, array( '#tnb-popup', '#tnb-form' ), true );

	return array(
		'label'    => is_array( $link ) ? trim( (string) ( $link['title'] ?? '' ) ) : '',
		'url'      => ( '#' === $url || $is_popup ) ? '' : $url,
		'target'   => is_array( $link ) ? (string) ( $link['target'] ?? '' ) : '',
		'is_popup' => $is_popup,
	);
};

$cnb_cta1 = $cnb_link( get_sub_field( 'cnb_cta_primary' ) );
$cnb_cta2 = $cnb_link( get_sub_field( 'cnb_cta_secondary' ) );

if ( '' === $cnb_heading && '' === $cnb_text ) {
	return;
}
?>
<section class="cn-banner<?php echo '' !== $cnb_bg_url ? ' cn-banner--has-bg' : ''; ?>"<?php
	echo '' !== $cnb_anchor ? ' id="' . esc_attr( $cnb_anchor ) . '"' : '';
	echo '' !== $cnb_bg_url ? ' style="--cnb-bg:url(' . esc_url( $cnb_bg_url ) . ')"' : '';
?>>
	<div class="container">
		<div class="cn-banner-inner dt-rev">
			<?php if ( '' !== $cnb_heading ) : ?>
				<h2><?php echo $cnb_heading; // Sanitised by tnb_accent_heading(). ?></h2>
			<?php endif; ?>

			<?php if ( '' !== $cnb_text ) : ?>
				<p><?php echo wp_kses( $cnb_text, $cnb_kses ); ?></p>
			<?php endif; ?>

			<?php if ( '' !== $cnb_sub ) : ?>
				<p class="cn-banner-sub"><?php echo wp_kses( $cnb_sub, $cnb_kses ); ?></p>
			<?php endif; ?>

			<?php if ( '' !== $cnb_cta1['url'] || $cnb_cta1['is_popup'] || '' !== $cnb_cta2['url'] || $cnb_cta2['is_popup'] ) : ?>
				<div class="cn-banner-actions">
					<?php if ( ( '' !== $cnb_cta1['url'] || $cnb_cta1['is_popup'] ) && '' !== $cnb_cta1['label'] ) : ?>
						<?php if ( $cnb_cta1['is_popup'] ) : ?>
							<button type="button" class="dt-btn dt-btn-primary tnb-popup-trigger"><?php echo esc_html( $cnb_cta1['label'] ); ?> <span class="arr"><?php
								echo wp_kses( tnb_cn_icon( 'arrow' ), $cnb_svg );
							?></span></button>
						<?php else : ?>
							<a class="dt-btn dt-btn-primary" href="<?php echo esc_url( $cnb_cta1['url'] ); ?>"<?php
								echo '' !== $cnb_cta1['target'] ? ' target="' . esc_attr( $cnb_cta1['target'] ) . '" rel="noopener"' : '';
							?>><?php echo esc_html( $cnb_cta1['label'] ); ?> <span class="arr"><?php
								echo wp_kses( tnb_cn_icon( 'arrow' ), $cnb_svg );
							?></span></a>
						<?php endif; ?>
					<?php endif; ?>

					<?php if ( ( '' !== $cnb_cta2['url'] || $cnb_cta2['is_popup'] ) && '' !== $cnb_cta2['label'] ) : ?>
						<?php if ( $cnb_cta2['is_popup'] ) : ?>
							<button type="button" class="dt-btn dt-btn-ghost cn-banner-ghost tnb-popup-trigger"><?php echo esc_html( $cnb_cta2['label'] ); ?></button>
						<?php else : ?>
							<a class="dt-btn dt-btn-ghost cn-banner-ghost" href="<?php echo esc_url( $cnb_cta2['url'] ); ?>"<?php
								echo '' !== $cnb_cta2['target'] ? ' target="' . esc_attr( $cnb_cta2['target'] ) . '" rel="noopener"' : '';
							?>><?php echo esc_html( $cnb_cta2['label'] ); ?></a>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
