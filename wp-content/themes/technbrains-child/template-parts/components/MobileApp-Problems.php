<?php
/**
 * Mobile App Development — Problems We Solve (accordion).
 *
 * Layout : ma_acc (ACF Flexible Content)
 * Fields : maa_eyebrow, maa_heading, maa_sub, maa_anchor, additional_classes,
 *          maa_categories{ maa_cat_icon (optional image override), maa_cat_title,
 *                           maa_cat_items{ maa_item_h, maa_item_d } }
 * CSS    : assets/css/mobile-app.css (.ma-acc*)
 * JS     : assets/js/mobile-app.js (data-ma-acc / data-ma-acc-head / data-ma-acc-panel)
 *
 * First category open by default, matching the mockup. Panel open/close uses a
 * grid-template-rows transition (0fr/1fr) — the exact technique the mockup's CSS already
 * uses — rather than a max-height hack, so content of any height animates cleanly.
 *
 * If the repeater is empty, falls back to tnb_ma_default_problems() (the mockup's real
 * copy) rather than rendering nothing — see inc/mobile-app-helpers.php.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$maa_eyebrow    = (string) get_sub_field( 'maa_eyebrow' );
$maa_heading    = tnb_accent_heading( (string) get_sub_field( 'maa_heading' ) );
$maa_sub        = (string) get_sub_field( 'maa_sub' );
$maa_anchor     = sanitize_title( (string) get_sub_field( 'maa_anchor' ) );
$maa_classes    = trim( (string) get_sub_field( 'additional_classes' ) );
$maa_categories = (array) get_sub_field( 'maa_categories' );

if ( ! $maa_categories ) {
	$maa_categories = tnb_ma_default_problems();
}

// Categories with no title can't be a valid accordion row.
$maa_categories = array_values(
	array_filter(
		$maa_categories,
		static function ( $cat ) {
			return '' !== trim( (string) ( $cat['maa_cat_title'] ?? '' ) );
		}
	)
);

if ( ! $maa_categories ) {
	return;
}

$maa_kses = tnb_ma_allowed_html();
$maa_svg  = tnb_ma_svg_html();

// Icon keys by position — matching the mockup's fixed 3 categories. A 4th+ category
// falls back to the first key rather than rendering with no icon (see tnb_ma_icon_slot()).
$maa_icon_keys = array( 'branch', 'design', 'database' );

// Unique per instance, so two accordions on one page cannot collide on ids.
$maa_uid = 'ma-acc-' . wp_unique_id();

$maa_section_class = 'dt-section ma-acc-sec';
if ( '' !== $maa_classes ) {
	$maa_section_class .= ' ' . $maa_classes;
}
?>
<section class="<?php echo esc_attr( $maa_section_class ); ?>"<?php echo '' !== $maa_anchor ? ' id="' . esc_attr( $maa_anchor ) . '"' : ''; ?>>
	<div class="container">
		<?php if ( '' !== $maa_eyebrow || '' !== $maa_heading || '' !== $maa_sub ) : ?>
			<div class="dt-head dt-head-left dt-rev">
				<?php if ( '' !== $maa_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $maa_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $maa_heading ) : ?>
					<h2 class="dt-h2"><?php echo $maa_heading; // Sanitised by tnb_accent_heading(). ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $maa_sub ) : ?>
					<p class="dt-sub"><?php echo wp_kses( $maa_sub, $maa_kses ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="ma-acc dt-rev" data-ma-acc>
			<?php foreach ( $maa_categories as $maa_i => $maa_cat ) :
				$maa_icon  = tnb_ma_icon_slot( $maa_icon_keys, $maa_i, $maa_cat['maa_cat_icon'] ?? null );
				$maa_title = trim( (string) ( $maa_cat['maa_cat_title'] ?? '' ) );
				$maa_items = (array) ( $maa_cat['maa_cat_items'] ?? array() );
				$maa_open  = ( 0 === $maa_i );
				?>
				<div class="ma-acc-row<?php echo $maa_open ? ' is-open' : ''; ?>">
					<button
						type="button"
						class="ma-acc-head"
						id="<?php echo esc_attr( $maa_uid . '-head-' . $maa_i ); ?>"
						aria-expanded="<?php echo $maa_open ? 'true' : 'false'; ?>"
						aria-controls="<?php echo esc_attr( $maa_uid . '-panel-' . $maa_i ); ?>"
						data-ma-acc-head
					>
						<span class="ma-acc-ic"><?php echo $maa_icon; // Self-escaping from tnb_ma_icon_slot(). ?></span>
						<span class="ma-acc-t"><?php echo esc_html( $maa_title ); ?></span>
						<span class="ma-acc-toggle" aria-hidden="true"><?php echo wp_kses( tnb_ma_icon( 'chevdown' ), $maa_svg ); ?></span>
					</button>
					<div
						class="ma-acc-panel"
						id="<?php echo esc_attr( $maa_uid . '-panel-' . $maa_i ); ?>"
						role="region"
						aria-labelledby="<?php echo esc_attr( $maa_uid . '-head-' . $maa_i ); ?>"
						data-ma-acc-panel
						style="grid-template-rows: <?php echo $maa_open ? '1fr' : '0fr'; ?>;"
					>
						<div class="ma-acc-panel-in">
							<?php if ( $maa_items ) : ?>
								<div class="ma-acc-items">
									<?php foreach ( $maa_items as $maa_item ) :
										$maa_item_h = trim( (string) ( $maa_item['maa_item_h'] ?? '' ) );
										$maa_item_d = trim( (string) ( $maa_item['maa_item_d'] ?? '' ) );

										if ( '' === $maa_item_h ) {
											continue;
										}
										?>
										<div class="ma-acc-item">
											<b><?php echo esc_html( $maa_item_h ); ?></b>
											<?php if ( '' !== $maa_item_d ) : ?>
												<span><?php echo wp_kses( $maa_item_d, $maa_kses ); ?></span>
											<?php endif; ?>
										</div>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
