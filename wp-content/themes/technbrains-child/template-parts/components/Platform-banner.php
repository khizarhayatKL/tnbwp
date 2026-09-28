<?php

/**
 * Component: Platform Banner / Hero
 * Layout   : platform_banner (ACF Flexible Content)
 *
 * Fields:
 *   pb_eyebrow            — eyebrow tag text
 *   pb_heading            — heading plain part
 *   pb_heading_accent     — heading red accent part
 *   pb_subheading         — subheading paragraph
 *   pb_cta_primary_text   — primary button label
 *   pb_cta_primary_link   — primary button URL / #anchor
 *   pb_cta_secondary_text — ghost button label
 *   pb_cta_secondary_link — ghost button URL / #anchor
 *   pb_tiles              — repeater: pb_tile_logo (image), pb_tile_name, pb_tile_wide
 *   pb_animation          — grid animation: assemble | float | pulse | static
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$breadcrumbs = get_sub_field( 'pb_breadcrumbs' )        ?: [];
$eyebrow    = get_sub_field( 'pb_eyebrow' )            ?: '';
$heading    = get_sub_field( 'pb_heading' )            ?: 'Platform Development & Consulting for';
$accent     = get_sub_field( 'pb_heading_accent' )     ?: 'Integrated Business Systems';
$sub        = get_sub_field( 'pb_subheading' )         ?: '';
$cta1_text  = get_sub_field( 'pb_cta_primary_text' )   ?: 'Get Platform Consultation';
$cta1_link  = get_sub_field( 'pb_cta_primary_link' )   ?: '#contact';
$cta2_text  = get_sub_field( 'pb_cta_secondary_text' ) ?: 'Talk to an Expert';
$cta2_link  = get_sub_field( 'pb_cta_secondary_link' ) ?: '#contact';
$tiles      = get_sub_field( 'pb_tiles' )              ?: [];
$raw_anim   = get_sub_field( 'pb_animation' )          ?: 'assemble';

$valid_anims = [ 'assemble', 'float', 'pulse', 'static' ];
$anim        = in_array( $raw_anim, $valid_anims, true ) ? $raw_anim : 'assemble';

// #anchor → popup trigger; full URL → <a> tag
$cta1_is_anchor = ( substr( $cta1_link, 0, 1 ) === '#' );
$cta2_is_anchor = ( substr( $cta2_link, 0, 1 ) === '#' );
?>
<section class="plt-banner" id="platform-banner">
	<div class="plt-banner__grid">

		<div class="plt-banner__content">
			<?php tnb_breadcrumb_html(); ?>

			<?php if ( ! empty( $breadcrumbs ) ) : ?>
				<nav class="plt-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'technbrains-child' ); ?>">
					<?php $bc_total = count( $breadcrumbs ); ?>
					<?php foreach ( $breadcrumbs as $bc_i => $crumb ) :
						$bc_label   = ! empty( $crumb['pb_bc_label'] ) ? $crumb['pb_bc_label'] : '';
						$bc_url     = ! empty( $crumb['pb_bc_url'] )   ? $crumb['pb_bc_url']   : '';
						$bc_is_last = ( $bc_i === $bc_total - 1 );
					?>
						<?php if ( $bc_i > 0 ) : ?>
							<span class="plt-breadcrumb__sep" aria-hidden="true">&gt;</span>
						<?php endif; ?>
						<?php if ( ! $bc_is_last && $bc_url ) : ?>
							<a href="<?php echo esc_url( $bc_url ); ?>" class="plt-breadcrumb__item"><?php echo esc_html( $bc_label ); ?></a>
						<?php else : ?>
							<span class="plt-breadcrumb__item plt-breadcrumb__item--current" aria-current="page"><?php echo esc_html( $bc_label ); ?></span>
						<?php endif; ?>
					<?php endforeach; ?>
				</nav>
			<?php endif; ?>

			<?php if ( ! empty( trim( $eyebrow ) ) ) : ?>
				<span class="plt-banner__eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
			<?php endif; ?>

			<h1 class="plt-banner__h1">
				<?php echo esc_html( $heading ); ?>
				<?php if ( $accent ) : ?>
				<span class="plt-banner__accent"><?php echo esc_html( $accent ); ?></span>
				<?php endif; ?>
			</h1>

			<?php if ( $sub ) : ?>
			<p class="plt-banner__sub"><?php echo esc_html( $sub ); ?></p>
			<?php endif; ?>

			<div class="plt-banner__actions">

				<?php if ( $cta1_text ) : ?>
					<?php if ( $cta1_is_anchor ) : ?>
					<button
						class="tnb-btn plt-banner__btn-primary tnb-popup-trigger"
						type="button"
						aria-label="<?php echo esc_attr( $cta1_text ); ?>"
					>
					<?php echo esc_html( $cta1_text ); ?>
						
					</button>
					<?php else : ?>
					<a
						class="tnb-btn plt-banner__btn-primary"
						href="<?php echo esc_url( $cta1_link ); ?>"
					>
					<?php echo esc_html( $cta1_text ); ?>
						
					</a>
					<?php endif; ?>
				<?php endif; ?>

				<?php if ( $cta2_text ) : ?>
					<?php if ( $cta2_is_anchor ) : ?>
					<button
						class="tnb-btn btnTransparent plt-banner__btn-ghost tnb-popup-trigger"
						type="button"
						aria-label="<?php echo esc_attr( $cta2_text ); ?>"
					><?php echo esc_html( $cta2_text ); ?>
						
					</button>
					<?php else : ?>
					<a
						class="tnb-btn btnTransparent plt-banner__btn-ghost"
						href="<?php echo esc_url( $cta2_link ); ?>"
					>
					<?php echo esc_html( $cta2_text ); ?>
						
					</a>
					<?php endif; ?>
				<?php endif; ?>

			</div><!-- .plt-banner__actions -->

		</div><!-- .plt-banner__content -->

		<?php if ( ! empty( $tiles ) ) : ?>
		<div class="plt-banner__grid-wrap" aria-hidden="true">
			<div class="plt-banner__tilegrid plt-banner__tilegrid--<?php echo esc_attr( $anim ); ?>">
				<?php foreach ( $tiles as $i => $tile ) :
					$logo    = $tile['pb_tile_logo'] ?? null;
					$name    = $tile['pb_tile_name'] ?? '';
					$is_wide = ! empty( $tile['pb_tile_wide'] );
					$img_url = is_array( $logo ) ? ( $logo['url']    ?? '' ) : '';
					$img_w   = is_array( $logo ) ? ( $logo['width']  ?? 40 ) : 40;
					$img_h   = is_array( $logo ) ? ( $logo['height'] ?? 40 ) : 40;
					$img_alt = is_array( $logo ) ? ( $logo['alt']    ?? $name ) : $name;
					$cls     = 'plt-banner__tile' . ( $is_wide ? ' plt-banner__tile--wide' : '' );
				?>
				<div class="<?php echo esc_attr( $cls ); ?>" title="<?php echo esc_attr( $name ); ?>">
					<?php if ( $img_url ) : ?>
					<span class="plt-banner__tile-ic">
						<img
							src="<?php echo esc_url( $img_url ); ?>"
							alt="<?php echo esc_attr( $img_alt ); ?>"
							width="<?php echo esc_attr( min( (int) $img_w, 40 ) ); ?>"
							height="<?php echo esc_attr( min( (int) $img_h, 40 ) ); ?>"
							loading="lazy"
							decoding="async"
						>
					</span>
					<?php endif; ?>
					<?php if ( $is_wide && $name ) : ?>
					<span class="plt-banner__tile-name"><?php echo esc_html( $name ); ?></span>
					<?php endif; ?>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php endif; ?>

	</div><!-- .plt-banner__grid -->
</section>
