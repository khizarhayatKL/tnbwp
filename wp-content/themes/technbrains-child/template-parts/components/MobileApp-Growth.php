<?php
/**
 * Mobile App Development — Post-Launch Growth.
 *
 * Layout : ma_grow3 (ACF Flexible Content)
 * Fields : mag_eyebrow, mag_heading, mag_sub, mag_anchor, additional_classes,
 *          mag_cards{ mag_card_icon (optional image override), mag_card_title, mag_card_text }
 * CSS    : assets/css/mobile-app.css (.ma-grow3*)
 * JS     : none — the .dt-rev reveal in components.js is the only behaviour; the icon float
 *          animation and its per-row stagger are pure CSS (nth-child delays).
 *
 * If the repeater is empty, falls back to tnb_ma_default_growth() (the mockup's real copy)
 * rather than rendering nothing — see inc/mobile-app-helpers.php.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$mag_eyebrow = (string) get_sub_field( 'mag_eyebrow' );
$mag_heading = tnb_accent_heading( (string) get_sub_field( 'mag_heading' ) );
$mag_sub     = (string) get_sub_field( 'mag_sub' );
$mag_anchor  = sanitize_title( (string) get_sub_field( 'mag_anchor' ) );
$mag_classes = trim( (string) get_sub_field( 'additional_classes' ) );
$mag_cards   = (array) get_sub_field( 'mag_cards' );

if ( ! $mag_cards ) {
	$mag_cards = tnb_ma_default_growth();
}

$mag_kses = tnb_ma_allowed_html();

// Icon keys by position — matching the mockup's fixed 5 cards. A 6th+ card falls back
// to the first key rather than rendering with no icon (see tnb_ma_icon_slot()).
$mag_icon_keys = array( 'pulse', 'gauge', 'rocket', 'chart', 'recycle' );

if ( ! $mag_cards ) {
	return;
}

$mag_section_class = 'dt-section gray ma-grow3-sec';
if ( '' !== $mag_classes ) {
	$mag_section_class .= ' ' . $mag_classes;
}
?>
<section class="<?php echo esc_attr( $mag_section_class ); ?>"<?php echo '' !== $mag_anchor ? ' id="' . esc_attr( $mag_anchor ) . '"' : ''; ?>>
	<div class="container">
		<?php if ( '' !== $mag_eyebrow || '' !== $mag_heading || '' !== $mag_sub ) : ?>
			<div class="dt-head dt-center dt-rev">
				<?php if ( '' !== $mag_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $mag_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $mag_heading ) : ?>
					<h2 class="dt-h2"><?php echo $mag_heading; // Sanitised by tnb_accent_heading(). ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $mag_sub ) : ?>
					<p class="dt-sub"><?php echo wp_kses( $mag_sub, $mag_kses ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="ma-grow3">
			<?php foreach ( $mag_cards as $mag_i => $mag_card ) :
				$mag_icon  = tnb_ma_icon_slot( $mag_icon_keys, $mag_i, $mag_card['mag_card_icon'] ?? null );
				$mag_title = trim( (string) ( $mag_card['mag_card_title'] ?? '' ) );
				$mag_text  = trim( (string) ( $mag_card['mag_card_text'] ?? '' ) );

				if ( '' === $mag_title ) {
					continue;
				}
				?>
				<div class="ma-grow3-row dt-rev">
					<span class="ma-grow3-ic"><?php echo $mag_icon; // Self-escaping from tnb_ma_icon_slot(). ?></span>
					<div class="ma-grow3-body">
						<h3 class="ma-grow3-t"><?php echo esc_html( $mag_title ); ?></h3>
						<?php if ( '' !== $mag_text ) : ?>
							<p class="ma-grow3-d"><?php echo wp_kses( $mag_text, $mag_kses ); ?></p>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
