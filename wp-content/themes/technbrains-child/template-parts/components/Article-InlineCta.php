<?php
/**
 * Article template family — Inline CTA (compact solid-red box, 1 or many buttons).
 *
 * Layout : art_inline_cta (ACF Flexible Content)
 * Fields : art_cta_bg_image, art_cta_heading, art_cta_sub,
 *          art_cta_buttons{ art_cta_btn (link), art_cta_btn_primary (true_false) }, art_anchor
 * CSS    : assets/css/article.css (.art-cta-inline, .art-cta-solid, .art-cta-copy,
 *          .art-cta-btn2, .art-cta-btn2-ghost, .art-cta-band-row)
 * JS     : none of its own.
 *
 * article-1.jsx's InlineCTA (single button) and DarkCTA (multi-button) are visually the SAME
 * compact `.art-cta-inline.art-cta-solid` box, not a full-bleed dark banner like Platform-cta.php
 * — confirmed by reading article.css directly. They differ only in markup shape: a single button
 * renders bare (no wrapper, never "ghost"), 2+ buttons wrap in `.art-cta-band-row` and each
 * button's own "primary" flag decides ghost styling. This one component reproduces both shapes
 * off the same repeater rather than staying two separate components, since the only real
 * difference is button count. No arrow icon on either shape — removed per request.
 *
 * Used for both the mid-page "cta-1" (1 button) and the closing "cta-2" (2 buttons) rows in the
 * approved section order — art_anchor on the closing row is what "#pa-cta"-style in-page links
 * (footer buttons, the FAQ/checklist sections) target.
 *
 * A button's URL can also be the sitewide magic value "#tnb-popup" or "#tnb-form" — same
 * convention as Software-outsourcing-hero.php / Staff-aug-hero.php / Construction-banner.php /
 * Construction-hero.php — which renders a <button class="tnb-popup-trigger"> (opens
 * popup-form.php, delegated by popup.js) instead of a link.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_bg_image = get_sub_field( 'art_cta_bg_image' );
$art_bg_url   = is_array( $art_bg_image ) ? trim( (string) ( $art_bg_image['url'] ?? '' ) ) : '';

$art_heading = trim( (string) get_sub_field( 'art_cta_heading' ) );
$art_sub     = trim( (string) get_sub_field( 'art_cta_sub' ) );
$art_buttons = (array) get_sub_field( 'art_cta_buttons' );
$art_anchor  = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_btns = array();
foreach ( $art_buttons as $art_row ) {
	$art_link = (array) ( $art_row['art_cta_btn'] ?? array() );
	$art_url  = trim( (string) ( $art_link['url'] ?? '' ) );
	$is_popup = in_array( $art_url, array( '#tnb-popup', '#tnb-form' ), true );
	if ( ! $is_popup && ( '' === $art_url || '#' === $art_url ) ) {
		continue;
	}
	$art_btns[] = array(
		'label'    => trim( (string) ( $art_link['title'] ?? '' ) ),
		'url'      => $is_popup ? '' : $art_url,
		'target'   => trim( (string) ( $art_link['target'] ?? '' ) ),
		'primary'  => ! empty( $art_row['art_cta_btn_primary'] ),
		'is_popup' => $is_popup,
	);
}

if ( '' === $art_heading || ! $art_btns ) {
	return;
}

$art_solo = 1 === count( $art_btns );
?>
<div class="art-cta-inline art-cta-solid<?php echo '' !== $art_bg_url ? ' art-cta-solid--has-bg' : ''; ?>"<?php
	echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : '';
	echo '' !== $art_bg_url ? ' style="--art-cta-bg:url(' . esc_url( $art_bg_url ) . ')"' : '';
?>>
	<div class="art-cta-copy">
		<h3><?php echo esc_html( $art_heading ); ?></h3>
		<?php if ( '' !== $art_sub ) : ?>
			<p><?php echo wp_kses( $art_sub, tnb_art_allowed_html() ); ?></p>
		<?php endif; ?>
	</div>
	<?php if ( $art_solo ) : ?>
		<?php $art_btn = $art_btns[0]; ?>
		<?php if ( $art_btn['is_popup'] ) : ?>
			<button type="button" class="art-cta-btn2 tnb-popup-trigger">
				<?php echo esc_html( $art_btn['label'] ); ?>
			</button>
		<?php else : ?>
			<a class="art-cta-btn2" href="<?php echo esc_url( $art_btn['url'] ); ?>"<?php echo '_blank' === $art_btn['target'] ? ' target="_blank" rel="noopener"' : ''; ?>>
				<?php echo esc_html( $art_btn['label'] ); ?>
			</a>
		<?php endif; ?>
	<?php else : ?>
		<div class="art-cta-band-row">
			<?php foreach ( $art_btns as $art_btn ) : ?>
				<?php if ( $art_btn['is_popup'] ) : ?>
					<button type="button" class="art-cta-btn2<?php echo $art_btn['primary'] ? '' : ' art-cta-btn2-ghost'; ?> tnb-popup-trigger">
						<?php echo esc_html( $art_btn['label'] ); ?>
					</button>
				<?php else : ?>
					<a
						class="art-cta-btn2<?php echo $art_btn['primary'] ? '' : ' art-cta-btn2-ghost'; ?>"
						href="<?php echo esc_url( $art_btn['url'] ); ?>"
						<?php echo '_blank' === $art_btn['target'] ? ' target="_blank" rel="noopener"' : ''; ?>
					>
						<?php echo esc_html( $art_btn['label'] ); ?>
					</a>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>
