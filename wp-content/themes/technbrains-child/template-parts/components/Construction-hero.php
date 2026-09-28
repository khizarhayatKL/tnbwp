<?php
/**
 * Construction Software — Hero.
 *
 * Layout : cn_hero (ACF Flexible Content)
 * Fields : cnh_eyebrow, cnh_h1, cnh_lead, cnh_lead_2, cnh_points{ cnh_point_text },
 *          cnh_photo, cnh_cta_primary, cnh_cta_secondary, cnh_anchor
 * CSS    : assets/css/construction.css (.cn-hero-*) over components.css (.dt-hero-*)
 * JS     : none of its own — the .dt-rev reveal in components.js is the only behaviour.
 *
 * Built on the existing .dt-hero shell rather than a new one. That is deliberate and load-bearing
 * for typography: .dt-hero h1 and .dt-hero-lead are already members of the site-wide heading and
 * hero-sub groups in components.css, so this hero inherits the same clamp() sizes as Staff Aug,
 * Software Outsourcing and Dedicated Teams instead of restating them. Only the photo layer and the
 * second lead paragraph are new.
 *
 * The prototype declares a rotating activity ticker (CN_ACTIVITY plus a tick state in
 * construction-1.jsx) and never renders it — the state is read nowhere in its returned markup. It
 * is not reproduced here; shipping the interval and the markup for it would be dead code.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cnh_eyebrow = (string) get_sub_field( 'cnh_eyebrow' );
$cnh_heading = tnb_accent_heading( (string) get_sub_field( 'cnh_h1' ) );
$cnh_lead    = (string) get_sub_field( 'cnh_lead' );
$cnh_lead_2  = (string) get_sub_field( 'cnh_lead_2' );
$cnh_points  = (array) get_sub_field( 'cnh_points' );
$cnh_photo   = get_sub_field( 'cnh_photo' );
$cnh_anchor  = sanitize_title( (string) get_sub_field( 'cnh_anchor' ) );

$cnh_kses = tnb_cn_allowed_html();
$cnh_svg  = tnb_cn_svg_html();

/**
 * Reads one ACF link field down to the parts the markup needs. The URL "#tnb-popup" or
 * "#tnb-form" is the sitewide magic value — same convention as Software-outsourcing-hero.php /
 * Staff-aug-hero.php / Construction-banner.php — which renders a <button class="tnb-popup-trigger">
 * (opens popup-form.php, delegated by popup.js) instead of a link.
 *
 * @param mixed $link ACF link value.
 * @return array{label:string,url:string,target:string,is_popup:bool}
 */
$cnh_link = static function ( $link ): array {
	$url      = is_array( $link ) ? trim( (string) ( $link['url'] ?? '' ) ) : '';
	$is_popup = in_array( $url, array( '#tnb-popup', '#tnb-form' ), true );

	return array(
		'label'    => is_array( $link ) ? trim( (string) ( $link['title'] ?? '' ) ) : '',
		'url'      => $is_popup ? '' : $url,
		'target'   => is_array( $link ) ? (string) ( $link['target'] ?? '' ) : '',
		'is_popup' => $is_popup,
	);
};

$cnh_cta1 = $cnh_link( get_sub_field( 'cnh_cta_primary' ) );
$cnh_cta2 = $cnh_link( get_sub_field( 'cnh_cta_secondary' ) );

// Nothing above the fold survives an empty heading, so the section stands down rather than
// rendering an empty banner the page still has to scroll past.
if ( '' === $cnh_heading ) {
	return;
}
?>
<section class="dt-hero cn-hero<?php echo ! empty( $cnh_photo['id'] ) ? ' cn-hero-photo-bg' : ''; ?>"<?php
	echo '' !== $cnh_anchor ? ' id="' . esc_attr( $cnh_anchor ) . '"' : '';
?>>
	<div class="dt-hero-bg" aria-hidden="true"></div>

	<?php if ( ! empty( $cnh_photo['id'] ) ) : ?>
		<div class="cn-hero-photo" aria-hidden="true">
			<?php
			// fetchpriority high and eager loading: this is the LCP candidate on the page when a
			// photo is set, so it must not wait behind the lazy-load observer.
			echo wp_get_attachment_image(
				(int) $cnh_photo['id'],
				'full',
				false,
				array(
					'alt'           => '',
					'loading'       => 'eager',
					'fetchpriority' => 'high',
					'decoding'      => 'async',
					'class'         => 'cn-hero-photo-img',
				)
			);
			?>
			<span class="cn-hero-photo-scrim"></span>
		</div>
	<?php endif; ?>

	<div class="dt-hero-grid-layout">
		<div class="dt-hero-content">
			<?php tnb_breadcrumb_html(); ?>

			<?php if ( '' !== $cnh_eyebrow ) : ?>
				<div class="eyebrow cn-hero-ey"><?php echo esc_html( $cnh_eyebrow ); ?></div>
			<?php endif; ?>

			<h1><?php echo $cnh_heading; // Sanitised by tnb_accent_heading(). ?></h1>

			<?php if ( '' !== $cnh_lead ) : ?>
				<p class="dt-hero-lead"><?php echo wp_kses( $cnh_lead, $cnh_kses ); ?></p>
			<?php endif; ?>

			<?php if ( '' !== $cnh_lead_2 ) : ?>
				<p class="dt-hero-lead cn-hero-lead-2"><?php echo wp_kses( $cnh_lead_2, $cnh_kses ); ?></p>
			<?php endif; ?>

			<?php if ( $cnh_points ) : ?>
				<div class="dt-hero-points">
					<?php
					foreach ( $cnh_points as $cnh_point ) :
						$cnh_text = (string) ( $cnh_point['cnh_point_text'] ?? '' );

						if ( '' === $cnh_text ) {
							continue;
						}
						?>
						<div class="dt-hero-point"><span class="ck"><?php
							echo wp_kses( tnb_cn_icon( 'point' ), $cnh_svg );
						?></span><?php echo esc_html( $cnh_text ); ?></div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<?php if ( '' !== $cnh_cta1['url'] || $cnh_cta1['is_popup'] || '' !== $cnh_cta2['url'] || $cnh_cta2['is_popup'] ) : ?>
				<div class="dt-hero-actions">
					<?php if ( ( '' !== $cnh_cta1['url'] || $cnh_cta1['is_popup'] ) && '' !== $cnh_cta1['label'] ) : ?>
						<?php if ( $cnh_cta1['is_popup'] ) : ?>
							<button type="button" class="dt-btn dt-btn-primary tnb-popup-trigger"><?php echo esc_html( $cnh_cta1['label'] ); ?> <span class="arr"><?php
								echo wp_kses( tnb_cn_icon( 'arrow' ), $cnh_svg );
							?></span></button>
						<?php else : ?>
							<a class="dt-btn dt-btn-primary" href="<?php echo esc_url( $cnh_cta1['url'] ); ?>"<?php
								echo '' !== $cnh_cta1['target'] ? ' target="' . esc_attr( $cnh_cta1['target'] ) . '" rel="noopener"' : '';
							?>><?php echo esc_html( $cnh_cta1['label'] ); ?> <span class="arr"><?php
								echo wp_kses( tnb_cn_icon( 'arrow' ), $cnh_svg );
							?></span></a>
						<?php endif; ?>
					<?php endif; ?>

					<?php if ( ( '' !== $cnh_cta2['url'] || $cnh_cta2['is_popup'] ) && '' !== $cnh_cta2['label'] ) : ?>
						<?php if ( $cnh_cta2['is_popup'] ) : ?>
							<button type="button" class="dt-btn dt-btn-ghost tnb-popup-trigger"><?php echo esc_html( $cnh_cta2['label'] ); ?></button>
						<?php else : ?>
							<a class="dt-btn dt-btn-ghost" href="<?php echo esc_url( $cnh_cta2['url'] ); ?>"<?php
								echo '' !== $cnh_cta2['target'] ? ' target="' . esc_attr( $cnh_cta2['target'] ) . '" rel="noopener"' : '';
							?>><?php echo esc_html( $cnh_cta2['label'] ); ?></a>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
