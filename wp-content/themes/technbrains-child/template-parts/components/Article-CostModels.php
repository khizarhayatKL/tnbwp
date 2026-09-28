<?php
/**
 * Article template family — Pricing model list (row list, or icon+badge card grid).
 *
 * Layout : art_cost_models (ACF Flexible Content)
 * Fields : art_cost_style (select: row/card), art_cost_items{ art_cost_name, art_cost_mechanic,
 *          art_cost_growth, art_cost_trend (select: up/flat/step/front) }, art_anchor
 * CSS    : assets/css/article.css (.cost-models, .cost-model*)
 * JS     : none of its own.
 *
 * Two layouts sharing the same 4 fields — Procore and Cost use genuinely different visuals here,
 * not a restyle of the same one:
 *   - style "row" (Procore's shape, default): a plain row — number, name/mechanic/growth text
 *     block, trend icon on the right, no border per item.
 *   - style "card" (Cost's shape): a bordered card — icon+trend-badge row on top, then heading,
 *     then the mechanic paragraph, then a separately-bordered-off "Over three years" growth block.
 *
 * Headless, matching Article-DiagSet.php's convention — the surrounding H2 + lead paragraph come
 * from a preceding art_prose row. The trend sparkline path data lives in tnb_art_trend_path()
 * (inc/article-helpers.php) since it is plain geometry, not part of the shared icon set.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_style  = (string) get_sub_field( 'art_cost_style' );
$art_items  = (array) get_sub_field( 'art_cost_items' );
$art_anchor = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_items = array_values(
	array_filter(
		$art_items,
		static function ( $row ) {
			return '' !== trim( (string) ( $row['art_cost_name'] ?? '' ) );
		}
	)
);

if ( ! $art_items ) {
	return;
}

$art_is_card = 'card' === $art_style;

$art_trend_labels = array(
	'up'    => 'Rises with growth',
	'flat'  => 'Stays flat',
	'step'  => 'Steps up by module',
	'front' => 'Front-loaded',
);
?>
<div class="cost-models<?php echo $art_is_card ? ' cost-models--card' : ''; ?>"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<?php foreach ( $art_items as $art_i => $art_item ) : ?>
		<?php
		$art_name     = trim( (string) $art_item['art_cost_name'] );
		$art_mechanic = trim( (string) ( $art_item['art_cost_mechanic'] ?? '' ) );
		$art_growth   = trim( (string) ( $art_item['art_cost_growth'] ?? '' ) );
		$art_trend    = (string) ( $art_item['art_cost_trend'] ?? '' );
		$art_path     = tnb_art_trend_path( $art_trend );
		?>
		<?php if ( $art_is_card ) : ?>
			<div class="cost-model cost-model--<?php echo esc_attr( $art_trend ); ?>">
				<div class="cost-model-top">
					<?php if ( '' !== $art_path ) : ?>
						<span class="cost-model-ico">
							<svg class="cost-trend-ico" viewBox="0 0 26 26" aria-hidden="true"><path d="<?php echo esc_attr( $art_path ); ?>" /></svg>
						</span>
					<?php endif; ?>
					<?php if ( isset( $art_trend_labels[ $art_trend ] ) ) : ?>
						<span class="cost-model-badge"><?php echo esc_html( $art_trend_labels[ $art_trend ] ); ?></span>
					<?php endif; ?>
				</div>
				<h4><?php echo esc_html( $art_name ); ?></h4>
				<?php if ( '' !== $art_mechanic ) : ?>
					<p class="cost-model-mech"><?php echo esc_html( $art_mechanic ); ?></p>
				<?php endif; ?>
				<?php if ( '' !== $art_growth ) : ?>
					<div class="cost-model-grow">
						<span class="cost-model-grow-k">Over three years</span>
						<span class="cost-model-grow-t"><?php echo esc_html( $art_growth ); ?></span>
					</div>
				<?php endif; ?>
			</div>
		<?php else : ?>
			<div class="cost-model">
				<span class="cost-model-n"><?php echo esc_html( sprintf( '%02d', $art_i + 1 ) ); ?></span>
				<div class="cost-model-main">
					<h4><?php echo esc_html( $art_name ); ?></h4>
					<?php if ( '' !== $art_mechanic ) : ?>
						<p class="cost-model-mech"><?php echo esc_html( $art_mechanic ); ?></p>
					<?php endif; ?>
					<?php if ( '' !== $art_growth ) : ?>
						<span class="cost-model-grow"><?php echo esc_html( $art_growth ); ?></span>
					<?php endif; ?>
				</div>
				<?php if ( '' !== $art_path ) : ?>
					<span class="cost-model-trend">
						<svg class="cost-trend-ico" viewBox="0 0 26 26" aria-hidden="true"><path d="<?php echo esc_attr( $art_path ); ?>" /></svg>
					</span>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
</div>
