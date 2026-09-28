<?php
/**
 * Case Study — Client quote (review card).
 *
 * Five stars are part of the card design, not a rating an editor sets, so they are fixed here
 * with the aria-label the design carries.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cs_quote = (string) get_field( 'cs_quote_text' );
$cs_name  = (string) get_field( 'cs_quote_name' );
$cs_role  = (string) get_field( 'cs_quote_role' );
$cs_photo = get_field( 'cs_quote_photo' );

if ( '' === $cs_quote ) {
	return;
}
?>
<section class="cs-section" data-screen-label="Quote">
	<div class="cs-wrap">
		<div class="cs-review cs-reveal">
			<?php if ( is_array( $cs_photo ) && ! empty( $cs_photo['url'] ) ) : ?>
				<figure class="cs-review-figure">
					<div class="cs-review-photo">
						<img src="<?php echo esc_url( $cs_photo['url'] ); ?>" alt="<?php echo esc_attr( $cs_photo['alt'] ?? '' ); ?>" width="<?php echo esc_attr( (string) ( $cs_photo['width'] ?? '' ) ); ?>" height="<?php echo esc_attr( (string) ( $cs_photo['height'] ?? '' ) ); ?>" loading="lazy" decoding="async"/>
					</div>
				</figure>
			<?php endif; ?>
			<div class="cs-review-right">
				<div class="cs-review-box">
					<span class="cs-review-mark" aria-hidden="true">&ldquo;</span>
					<blockquote class="cs-review-quote"><?php echo wp_kses( $cs_quote, tnb_cs_allowed_html() ); ?></blockquote>
					<div class="cs-review-divider"></div>
					<div class="cs-review-caption">
						<div class="cs-review-author">
							<div class="cs-review-name"><?php echo esc_html( $cs_name ); ?></div>
							<div class="cs-review-role"><?php echo esc_html( $cs_role ); ?></div>
						</div>
						<div class="cs-review-stars" aria-label="5 out of 5">★★★★★</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
