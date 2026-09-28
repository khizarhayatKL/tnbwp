<?php
/**
 * Case Studies Hero — ACF flexible content layout
 *
 * One of the 3 Case Studies Hub components — page-scoped CSS/JS in
 * assets/css/case-studies-hub.css / assets/js/case-studies-hub.js, not the
 * shared components.css/components.js bundle.
 *
 * Layout name : case_studies_hero
 * Dispatcher  : template-parts/flexible/dispatch.php
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$custom_class = get_sub_field( 'csh_custom_class' );
$title        = get_sub_field( 'csh_title' );
$title_accent = get_sub_field( 'csh_title_accent' );
$title_end    = get_sub_field( 'csh_title_end' );
$description  = get_sub_field( 'csh_description' );
$bg_image     = get_sub_field( 'csh_bg_image' );
$cta_pri_text = get_sub_field( 'csh_cta_primary_text' );
$cta_pri_url  = get_sub_field( 'csh_cta_primary_url' );
$cta_sec_text = get_sub_field( 'csh_cta_secondary_text' );
$cta_sec_url  = get_sub_field( 'csh_cta_secondary_url' );

$bg_image_id  = ! empty( $bg_image['id'] ) ? (int) $bg_image['id'] : 0;
$bg_image_url = $bg_image_id
	? wp_get_attachment_url( $bg_image_id )
	: get_stylesheet_directory_uri() . '/assets/images/csh-hero-bg.webp';

// A `#`-prefixed URL opens the sitewide popup instead of navigating — same
// convention as new-Industry-banner.php. popup.js's click-delegation listener
// only checks for the `tnb-popup-trigger` class (components.js/popup.js:67),
// so a plain href="#..." alone does nothing.
$pri_is_popup = $cta_pri_url && strncmp( ltrim( $cta_pri_url ), '#', 1 ) === 0;
$sec_is_popup = $cta_sec_url && strncmp( ltrim( $cta_sec_url ), '#', 1 ) === 0;
?>
<section class="csh-hero<?php echo $custom_class ? ' ' . esc_attr( $custom_class ) : ''; ?>" style="background-image:url('<?php echo esc_url( $bg_image_url ); ?>')">
	<div class="csh-hero-inner">

		<?php if ( $title || $title_accent || $title_end ) : ?>
			<h1 class="csh-hero-title">
				<?php if ( $title ) : ?><?php echo esc_html( $title ); ?> <?php endif; ?>
				<?php if ( $title_accent ) : ?><span class="accent"><?php echo esc_html( $title_accent ); ?></span> <?php endif; ?>
				<?php if ( $title_end ) : ?><?php echo esc_html( $title_end ); ?><?php endif; ?>
			</h1>
		<?php endif; ?>

		<?php if ( $description ) : ?>
			<p class="csh-hero-sub"><?php echo esc_html( $description ); ?></p>
		<?php endif; ?>

		<?php if ( $cta_pri_text || $cta_sec_text ) : ?>
			<div class="csh-hero-actions">
				<?php if ( $cta_pri_text ) : ?>
					<?php if ( $pri_is_popup ) : ?>
						<button type="button" class="csh-btn csh-btn-primary tnb-popup-trigger">
							<?php echo esc_html( $cta_pri_text ); ?>
						</button>
					<?php else : ?>
						<a href="<?php echo esc_url( $cta_pri_url ?: '#' ); ?>" class="csh-btn csh-btn-primary">
							<?php echo esc_html( $cta_pri_text ); ?>
						</a>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ( $cta_sec_text ) : ?>
					<?php if ( $sec_is_popup ) : ?>
						<button type="button" class="csh-btn csh-btn-ghost tnb-popup-trigger">
							<?php echo esc_html( $cta_sec_text ); ?>
						</button>
					<?php else : ?>
						<a href="<?php echo esc_url( $cta_sec_url ?: '#' ); ?>" class="csh-btn csh-btn-ghost">
							<?php echo esc_html( $cta_sec_text ); ?>
						</a>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>

	</div>
</section>
