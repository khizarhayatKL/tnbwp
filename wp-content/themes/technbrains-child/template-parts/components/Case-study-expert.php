<?php
/**
 * Case Study — Expert note from the TechnBrains side.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cs_quote = (string) get_field( 'cs_expert_quote' );
$cs_name  = (string) get_field( 'cs_expert_name' );
$cs_role  = (string) get_field( 'cs_expert_role' );
$cs_org   = (string) get_field( 'cs_expert_org' );
$cs_photo = get_field( 'cs_expert_photo' );

if ( '' === $cs_quote ) {
	return;
}
?>
<section class="cs-section cs-expert" data-screen-label="Expert Note">
	<div class="cs-wrap">
		<div class="cs-expert-card cs-reveal">
			<?php if ( is_array( $cs_photo ) && ! empty( $cs_photo['url'] ) ) : ?>
				<div class="cs-expert-photo">
					<img src="<?php echo esc_url( $cs_photo['url'] ); ?>" alt="<?php echo esc_attr( $cs_photo['alt'] ?? '' ); ?>" width="<?php echo esc_attr( (string) ( $cs_photo['width'] ?? '' ) ); ?>" height="<?php echo esc_attr( (string) ( $cs_photo['height'] ?? '' ) ); ?>" loading="lazy" decoding="async"/>
				</div>
			<?php endif; ?>
			<div class="cs-expert-body">
				<span class="cs-expert-mark" aria-hidden="true">&ldquo;</span>
				<blockquote class="cs-expert-quote"><?php echo wp_kses( $cs_quote, tnb_cs_allowed_html() ); ?></blockquote>
				<div class="cs-expert-cite">
					<?php if ( '' !== $cs_name ) : ?>
						<span class="cs-expert-name"><?php echo esc_html( $cs_name ); ?></span>
					<?php endif; ?>
					<span class="cs-expert-role"><?php echo esc_html( $cs_role ); ?></span>
					<span class="cs-expert-org"><?php echo esc_html( $cs_org ); ?></span>
				</div>
			</div>
		</div>
	</div>
</section>
