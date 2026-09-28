<?php
/**
 * Article template family — Practitioner callout (tagged aside).
 *
 * Layout : art_callout (ACF Flexible Content)
 * Fields : art_callout_variant, art_callout_tag, art_callout_text, art_anchor
 * CSS    : assets/css/article.css (.art-call*)
 * JS     : none of its own.
 *
 * Three variants (article-1.jsx's CALL map): "seen"/"see" share the plain treatment and an eye
 * icon, "check" is the red-accented "what I check first" style, "read" is the quote-accented
 * "my read" style. art_callout_tag overrides the variant's own default label when set — an
 * editor rewording the tag without switching variants (and therefore the icon/colour) is a real
 * case here, since "What I see" (see) and "What we have seen" (seen) are copy variants of the
 * same visual treatment.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_variant = (string) get_sub_field( 'art_callout_variant' );
$art_tag     = trim( (string) get_sub_field( 'art_callout_tag' ) );
$art_text    = (string) get_sub_field( 'art_callout_text' );
$art_anchor  = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

if ( '' === $art_text ) {
	return;
}

$art_variants = array(
	'seen'  => array( 'class' => '', 'tag' => 'What we have seen', 'icon' => 'eye' ),
	'check' => array( 'class' => 'art-call--first', 'tag' => 'What I check first', 'icon' => 'gauge' ),
	'read'  => array( 'class' => 'art-call--read', 'tag' => 'My read', 'icon' => 'quote' ),
	'see'   => array( 'class' => '', 'tag' => 'What I see', 'icon' => 'eye' ),
);

$art_v = $art_variants[ $art_variant ] ?? $art_variants['seen'];

if ( '' === $art_tag ) {
	$art_tag = $art_v['tag'];
}
?>
<div class="art-call <?php echo esc_attr( $art_v['class'] ); ?>"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<span class="art-call-tag"><?php
		echo wp_kses( tnb_art_icon( $art_v['icon'] ), tnb_art_svg_html() );
		echo esc_html( $art_tag );
	?></span>
	<p><?php echo wp_kses( $art_text, tnb_art_allowed_html() ); ?></p>
</div>
