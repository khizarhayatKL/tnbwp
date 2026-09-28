<?php
/**
 * Case Study — Hero.
 *
 * Rendered from single-case_study.php. Reads the post-level ACF group registered in
 * inc/acf-case-study.php.
 *
 * The reference marks this section up as <header>. It is a <div> here: inside <main> a
 * <header> is a generic element rather than the banner landmark it is in the reference, so the
 * tag carries no meaning at this position, and the theme's own site header already owns the
 * banner role. No rule in case-study.css selects the element, only .cs-hero, so rendering is
 * unchanged.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cs_brand    = (string) get_field( 'cs_hero_brand' );
$cs_headline = (string) get_field( 'cs_hero_headline' );
$cs_lede     = (string) get_field( 'cs_hero_lede' );
$cs_allowed  = tnb_cs_allowed_html();

// Long headlines are set smaller and wider in the approved design, with a matching wider lede.
// The flag only chooses between the two treatments so nobody has to type CSS into a content
// field. The size and width live in .cs-h1-rest--long rather than an inline style: an inline
// declaration cannot be overridden by a media query without !important, and this pair needs a
// phone step (40px is the desktop value, and the 900px width overflowed a 390px viewport).
$cs_long       = (bool) get_field( 'cs_hero_long' );
$cs_rest_class = $cs_long ? ' cs-h1-rest--long' : '';
$cs_lede_attr  = $cs_long ? ' style="max-width:920px"' : '';

// Optional background image. Rendered as an <img> rather than a CSS background so the browser
// can pick a size from srcset and so it is discoverable as the hero's LCP candidate — eager
// and high priority for the same reason. Decorative: it sits inside the aria-hidden .cs-hero-bg
// and carries no meaning the headline does not already give, so alt is empty.
//
// Shown at full strength with nothing layered over it: the images supplied for this hero already
// carry their own darkening, so a theme-side scrim or opacity would darken them twice.
$cs_bg = get_field( 'cs_hero_bg' );
$cs_bg = is_array( $cs_bg ) && ! empty( $cs_bg['ID'] ) ? $cs_bg : null;

// The first line of the headline is the client's name, optionally as a logo instead of type.
// The logo keeps the name as its alt text rather than being decorative: it is part of the H1,
// so dropping it would leave the page's main heading starting mid-sentence.
$cs_logo = get_field( 'cs_hero_brand_logo' );
$cs_logo = is_array( $cs_logo ) && ! empty( $cs_logo['ID'] ) ? $cs_logo : null;

// Emitted as a unitless ratio, not a percentage: the CSS multiplies it by 1em, and calc()
// cannot divide by a percentage — `calc(1em * (100% / 100%))` is invalid and the whole
// declaration is dropped, which left the logo at its intrinsic pixel size.
$cs_logo_scale = (int) get_field( 'cs_hero_brand_logo_scale' );
$cs_logo_scale = $cs_logo_scale > 0 ? min( 200, max( 40, $cs_logo_scale ) ) : 100;
$cs_logo_ratio = rtrim( rtrim( number_format( $cs_logo_scale / 100, 2, '.', '' ), '0' ), '.' );
?>
<div class="cs-hero cs-hero--rich" data-screen-label="Hero">
	<div class="cs-hero-bg" aria-hidden="true">
		<?php
		if ( $cs_bg ) :
			echo wp_get_attachment_image(
				(int) $cs_bg['ID'],
				'full',
				false,
				array(
					'class'         => 'cs-hero-bg-img',
					'alt'           => '',
					'loading'       => 'eager',
					'fetchpriority' => 'high',
					'decoding'      => 'async',
				)
			);
		endif;
		?>
	</div>
	<div class="cs-wrap cs-hero-layout">
		<div class="cs-hero-col-text cs-hero-centered">
			<h1 class="cs-h1 cs-reveal d1"><?php
			if ( $cs_logo ) :
				?><span class="cs-h1-lead cs-h1-lead--logo" style="--cs-lead-logo: <?php echo esc_attr( $cs_logo_ratio ); ?>"><?php
				echo wp_get_attachment_image(
					(int) $cs_logo['ID'],
					'full',
					false,
					array(
						'class'         => 'cs-h1-logo',
						'alt'           => $cs_brand,
						'loading'       => 'eager',
						'fetchpriority' => 'high',
						'decoding'      => 'async',
					)
				);
				?></span><?php
			elseif ( '' !== $cs_brand ) :
				?><span class="cs-h1-lead"><?php echo esc_html( $cs_brand ); ?></span><?php
			endif;
			if ( '' !== $cs_headline ) :
				// Space between the two spans on purpose. Both are display:block so it changes
				// nothing on screen, but without it the H1's text runs together as
				// "SpruceProperty Services Platform…" for search engines and screen readers.
				?> <span class="cs-h1-rest<?php echo esc_attr( $cs_rest_class ); ?>"><?php echo wp_kses( $cs_headline, $cs_allowed ); ?></span><?php
			endif;
			?></h1>
			<?php if ( '' !== $cs_lede ) : ?>
				<p class="cs-hero-lede cs-reveal d2"<?php echo $cs_lede_attr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- literal, chosen above. ?>><?php echo wp_kses( $cs_lede, $cs_allowed ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</div>
