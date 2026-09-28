<?php
/**
 * Case Study — About the client (dark band with the scale grid).
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cs_brand   = (string) get_field( 'cs_hero_brand' );
$cs_eyebrow = (string) get_field( 'cs_about_eyebrow' );
$cs_h2      = (string) get_field( 'cs_about_h2' );
$cs_body    = (string) get_field( 'cs_about_body' );
$cs_scale   = (array) get_field( 'cs_scale' );
$cs_allowed = tnb_cs_allowed_html();

// The approved design sets this heading at 101px, and at 88px where the wording runs long.
// Both are the design's values; the flag picks between them.
$cs_h2_attr = get_field( 'cs_about_h2_sm' ) ? ' style="font-size:88px"' : ' style="font-size:101px"';

$cs_scale_icons = array(
	'scale-multirole',
	'scale-booking',
	'fact-region',
	'scale-messaging',
);

// The design labels this band with the client name.
$cs_label = '' !== $cs_brand ? 'About ' . $cs_brand : 'About';
?>
<section class="cs-section cs-about-dark" data-screen-label="<?php echo esc_attr( $cs_label ); ?>">
	<div class="cs-wrap">
		<div class="cs-about-dark-top">
			<div class="cs-about-dark-copy cs-reveal d1">
				<?php if ( '' !== $cs_eyebrow ) : ?>
					<span class="cs-eyebrow"><?php echo esc_html( $cs_eyebrow ); ?></span>
				<?php endif; ?>
				<?php if ( '' !== $cs_h2 ) : ?>
					<h2 class="cs-h2"<?php echo $cs_h2_attr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- literal, chosen above. ?>><?php echo wp_kses( $cs_h2, $cs_allowed ); ?></h2>
				<?php endif; ?>
				<?php
				// One paragraph with a blank line between blocks, as the design marks it up.
				// 32px is the design's value for this intro; it lives in .cs-lede-xl rather than an
				// inline style so the phone step in case-study.css can override it.
				echo tnb_cs_paragraphs( $cs_body, 'br', ' class="cs-lede-xl"' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped inside the helper.
				?>
			</div>

			<?php if ( $cs_scale ) : ?>
				<div class="cs-about-scale cs-reveal d2">
					<ul class="cs-about-scale-grid">
						<?php foreach ( $cs_scale as $cs_i => $cs_item ) : ?>
							<li class="cs-about-scale-item">
								<span class="cs-about-scale-ic" aria-hidden="true"><?php
									echo tnb_cs_icon_slot( $cs_scale_icons, (int) $cs_i, $cs_item['cs_scale_icon'] ?? null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- inline SVG from the theme, or an escaped <img>.
								?></span>
								<p><?php echo wp_kses( (string) ( $cs_item['cs_scale_text'] ?? '' ), $cs_allowed ); ?></p>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
