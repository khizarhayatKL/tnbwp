<?php
/**
 * Case Study — Engineering approach.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cs_eyebrow = (string) get_field( 'cs_tech_eyebrow' );
$cs_h2      = (string) get_field( 'cs_tech_h2' );
$cs_body    = (string) get_field( 'cs_tech_body' );
$cs_allowed = tnb_cs_allowed_html();

if ( '' === $cs_h2 && '' === $cs_body ) {
	return;
}
?>
<section class="cs-section cs-tech2" data-screen-label="Technology">
	<div class="cs-wrap">
		<div class="cs-tech2-inner cs-reveal">
			<div class="cs-tech2-copy">
				<?php if ( '' !== $cs_eyebrow ) : ?>
					<span class="cs-eyebrow"><?php echo esc_html( $cs_eyebrow ); ?></span>
				<?php endif; ?>
				<?php if ( '' !== $cs_h2 ) : ?>
					<h2 class="cs-h2"><?php echo wp_kses( $cs_h2, $cs_allowed ); ?></h2>
				<?php endif; ?>
				<?php
				echo tnb_cs_paragraphs( $cs_body, 'br', ' class="cs-body cs-lede-lg"' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped inside the helper.
				?>
			</div>
		</div>
	</div>
</section>
