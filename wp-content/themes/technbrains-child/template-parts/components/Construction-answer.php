<?php
/**
 * Construction Software — Answer strip.
 *
 * Layout : cn_answer (ACF Flexible Content)
 * Fields : cna_badge, cna_question, cna_answer, cna_anchor
 * CSS    : assets/css/construction.css (.cn-answer*)
 * JS     : none — the .dt-rev reveal in components.js is the only behaviour.
 *
 * The copy deck is explicit that this is the highest-value block on the page for AI Overview and
 * LLM extraction, and that design must not fold it into the hero or the section below it. That is
 * why it is its own layout rather than a field on the hero: kept separate, an editor cannot merge
 * the two, and the question stays a real heading in the document outline.
 *
 * The question is an <h2> and the answer a <p> immediately after it. Extraction depends on that
 * pairing, so the badge is decorative only — it carries no text an assistant would need.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cna_badge    = (string) get_sub_field( 'cna_badge' );
$cna_question = (string) get_sub_field( 'cna_question' );
$cna_answer   = (string) get_sub_field( 'cna_answer' );
$cna_anchor   = sanitize_title( (string) get_sub_field( 'cna_anchor' ) );

$cna_kses = tnb_cn_allowed_html();

// Both halves are required: a question with no answer extracts as a dead heading, and an answer
// with no question loses the pairing that makes the block worth having.
if ( '' === $cna_question || '' === $cna_answer ) {
	return;
}
?>
<section class="cn-answer"<?php echo '' !== $cna_anchor ? ' id="' . esc_attr( $cna_anchor ) . '"' : ''; ?>>
	<div class="container">
		<div class="cn-answer-inner cn-answer-oneline dt-rev">
			<?php if ( '' !== $cna_badge ) : ?>
				<span class="cn-answer-badge" aria-hidden="true"><?php echo esc_html( $cna_badge ); ?></span>
			<?php endif; ?>
			<h2 class="cn-answer-q"><?php echo wp_kses( $cna_question, $cna_kses ); ?></h2>
			<p class="cn-answer-a"><?php echo wp_kses( $cna_answer, $cna_kses ); ?></p>
		</div>
	</div>
</section>
