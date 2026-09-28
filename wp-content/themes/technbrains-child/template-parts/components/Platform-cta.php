<?php

/**
 * Component: Platform CTA
 * Layout   : platform_cta (ACF Flexible Content)
 *
 * Full-width dark CTA section with a centred heading, description, and
 * two action buttons. Background is a dark gradient + dot-grid overlay
 * by default; an optional ACF image field replaces the gradient with a
 * cover image (dark overlay preserved via CSS modifier class).
 *
 * Primary button with no URL becomes a popup trigger (.tnb-popup-trigger).
 * Ghost button with no URL also becomes a popup trigger.
 *
 * Fields:
 *   pcta_heading           — text     (h2)
 *   pcta_subheading        — textarea (paragraph below heading)
 *   pcta_btn_primary_text  — text     (primary button label)
 *   pcta_btn_primary_url   — text     (URL; blank = popup trigger)
 *   pcta_btn_ghost_text    — text     (ghost button label, optional)
 *   pcta_btn_ghost_url     — text     (URL; blank = popup trigger)
 *   background_image       — image    (optional section background image)
 *   additional_classes     — text     (extra CSS classes on section wrapper)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$heading       = get_sub_field( 'pcta_heading' )          ?: '';
$subheading    = get_sub_field( 'pcta_subheading' )       ?: '';
$btn_p_text    = get_sub_field( 'pcta_btn_primary_text' ) ?: '';
$btn_p_url     = trim( get_sub_field( 'pcta_btn_primary_url' )  ?: '' );
$btn_g_text    = get_sub_field( 'pcta_btn_ghost_text' )   ?: '';
$btn_g_url     = trim( get_sub_field( 'pcta_btn_ghost_url' )    ?: '' );
$bg_image      = get_sub_field( 'background_image' );
$add_classes   = trim( get_sub_field( 'additional_classes' ) ?: '' );

if ( empty( $heading ) ) {
	return;
}

/* ── Background image ── */
$bg_url = '';
if ( is_array( $bg_image ) && ! empty( $bg_image['url'] ) ) {
	$bg_url = $bg_image['url'];
}

/* ── Section classes ── */
$section_class = 'pcta-section';
if ( $bg_url ) {
	$section_class .= ' pcta-section--has-bg';
}
if ( $add_classes ) {
	$section_class .= ' ' . $add_classes;
}

/* ── Inline bg style (only when image provided) ── */
$bg_style = $bg_url
	? ' style="background-image:url(' . esc_url( $bg_url ) . ')"'
	: '';

/* ── Primary button ── */
$btn_p_class = 'pcta-btn-primary';
if ( empty( $btn_p_url ) ) {
	$btn_p_class .= ' tnb-popup-trigger';
}

/* ── Ghost button ── */
$btn_g_class = 'pcta-btn-ghost';
if ( empty( $btn_g_url ) ) {
	$btn_g_class .= ' tnb-popup-trigger';
}
?>
<section class="<?php echo esc_attr( $section_class ); ?>"<?php echo $bg_style; ?>>
	<div class="pcta-inner">

		<h2 class="pcta-h2"><?php echo esc_html( $heading ); ?></h2>

		<?php if ( $subheading ) : ?>
		<p class="pcta-sub"><?php echo esc_html( $subheading ); ?></p>
		<?php endif; ?>

		<?php if ( $btn_p_text || $btn_g_text ) : ?>
		<div class="pcta-actions">

			<?php if ( $btn_p_text ) : ?>
			<a
				class="<?php echo esc_attr( $btn_p_class ); ?>"
				<?php if ( $btn_p_url ) : ?>href="<?php echo esc_url( $btn_p_url ); ?>"<?php endif; ?>
			><?php echo esc_html( $btn_p_text ); ?></a>
			<?php endif; ?>

			<?php if ( $btn_g_text ) : ?>
			<a
				class="<?php echo esc_attr( $btn_g_class ); ?>"
				<?php if ( $btn_g_url ) : ?>href="<?php echo esc_url( $btn_g_url ); ?>"<?php endif; ?>
			><?php echo esc_html( $btn_g_text ); ?></a>
			<?php endif; ?>

		</div>
		<?php endif; ?>

	</div><!-- .pcta-inner -->
</section>
