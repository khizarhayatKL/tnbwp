<?php
/**
 * Article template family — Case study box (scenario / what we did / outcome, plus key lesson).
 *
 * Layout : art_case_box (ACF Flexible Content)
 * Fields : art_cb_eyebrow, art_cb_heading, art_cb_scenario, art_cb_did, art_cb_outcome,
 *          art_cb_lesson, art_anchor
 * CSS    : assets/css/article.css (.art-cb-*)
 * JS     : none of its own.
 *
 * Self-wrapping (own <section>, own eyebrow + H2), matching Article-DecisionTable.php's
 * convention — unlike most of this family, the source renders this with no preceding art_prose
 * row of its own.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_eyebrow  = trim( (string) get_sub_field( 'art_cb_eyebrow' ) );
$art_heading  = trim( (string) get_sub_field( 'art_cb_heading' ) );
$art_scenario = trim( (string) get_sub_field( 'art_cb_scenario' ) );
$art_did      = trim( (string) get_sub_field( 'art_cb_did' ) );
$art_outcome  = trim( (string) get_sub_field( 'art_cb_outcome' ) );
$art_lesson   = trim( (string) get_sub_field( 'art_cb_lesson' ) );
$art_anchor   = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

if ( '' === $art_heading || ( '' === $art_scenario && '' === $art_did && '' === $art_outcome ) ) {
	return;
}

$art_kses = tnb_art_allowed_html();
?>
<section class="art-sec art-fade art-sec--major art-cb"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<?php if ( '' !== $art_eyebrow ) : ?>
		<span class="art-cb-eyebrow"><?php echo wp_kses( tnb_art_icon( 'scope' ), tnb_art_svg_html() ); ?><?php echo esc_html( $art_eyebrow ); ?></span>
	<?php endif; ?>
	<h2><?php echo esc_html( $art_heading ); ?></h2>

	<div class="art-cb-grid">
		<?php if ( '' !== $art_scenario ) : ?>
			<div class="art-cb-col"><span class="art-cb-k">Scenario</span><p><?php echo wp_kses( $art_scenario, $art_kses ); ?></p></div>
		<?php endif; ?>
		<?php if ( '' !== $art_did ) : ?>
			<div class="art-cb-col"><span class="art-cb-k">What we did</span><p><?php echo wp_kses( $art_did, $art_kses ); ?></p></div>
		<?php endif; ?>
		<?php if ( '' !== $art_outcome ) : ?>
			<div class="art-cb-col"><span class="art-cb-k">Outcome</span><p><?php echo wp_kses( $art_outcome, $art_kses ); ?></p></div>
		<?php endif; ?>
	</div>

	<?php if ( '' !== $art_lesson ) : ?>
		<div class="art-cb-lesson"><span class="art-cb-k">Key lesson</span><p><?php echo wp_kses( $art_lesson, $art_kses ); ?></p></div>
	<?php endif; ?>
</section>
