<?php
/**
 * Article template family — Alternative evaluation cards (rank, pricing, integrations, pros/cons).
 *
 * Layout : art_alt_evals (ACF Flexible Content)
 * Fields : art_alt_items{ art_alt_rank, art_alt_name, art_alt_best_for, art_alt_screenshot,
 *          art_alt_pricing, art_alt_why, art_alt_integrations{art_alt_integration_name},
 *          art_alt_pros{art_alt_pro_text}, art_alt_cons{art_alt_con_text} }, art_anchor
 * CSS    : assets/css/article.css (.pa-evals, .pa-eval*, .pa-shot, .pa-field*, .pa-int*, .pa-run*)
 * JS     : none of its own.
 *
 * No heading of its own — matches procore-app.jsx's AltEval grid, which sits inside the SAME
 * conceptual section as a preceding art_prose row's H2 + intro paragraph.
 *
 * art_alt_screenshot is optional: the prototype's own `<image-slot>` here is a design-mockup
 * placeholder with no backing data (no screenshot URL anywhere in procore-data.jsx), but the field
 * exists so an editor can attach a real product screenshot per alternative when one is available.
 *
 * Each row's id is synthesised (name slug + index) rather than a per-row art_anchor field, same
 * convention as Article-DiagSet.php: these are sub-items of one flexible-content row, not each
 * their own row with independent editor-set anchors.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_items  = (array) get_sub_field( 'art_alt_items' );
$art_anchor = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_items = array_values(
	array_filter(
		$art_items,
		static function ( $row ) {
			return '' !== trim( (string) ( $row['art_alt_name'] ?? '' ) );
		}
	)
);

if ( ! $art_items ) {
	return;
}

$art_kses = tnb_art_allowed_html();
$art_svg  = tnb_art_svg_html();

$art_pluck = static function ( array $rows, string $key ): array {
	return array_values(
		array_filter(
			array_map(
				static function ( $row ) use ( $key ) {
					return trim( (string) ( $row[ $key ] ?? '' ) );
				},
				$rows
			),
			static function ( $val ) {
				return '' !== $val;
			}
		)
	);
};
?>
<div class="pa-evals"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<?php foreach ( $art_items as $art_i => $art_item ) : ?>
		<?php
		$art_name         = trim( (string) $art_item['art_alt_name'] );
		$art_rank         = (int) ( $art_item['art_alt_rank'] ?? ( $art_i + 1 ) );
		$art_best         = trim( (string) ( $art_item['art_alt_best_for'] ?? '' ) );
		$art_shot         = $art_item['art_alt_screenshot'] ?? null;
		$art_pricing      = trim( (string) ( $art_item['art_alt_pricing'] ?? '' ) );
		$art_why          = trim( (string) ( $art_item['art_alt_why'] ?? '' ) );
		$art_integrations = $art_pluck( (array) ( $art_item['art_alt_integrations'] ?? array() ), 'art_alt_integration_name' );
		$art_pros         = $art_pluck( (array) ( $art_item['art_alt_pros'] ?? array() ), 'art_alt_pro_text' );
		$art_cons         = $art_pluck( (array) ( $art_item['art_alt_cons'] ?? array() ), 'art_alt_con_text' );
		$art_id           = 'pa-' . sanitize_title( $art_name ) . '-' . $art_i;
		?>
		<article id="<?php echo esc_attr( $art_id ); ?>" class="pa-eval">
			<div class="pa-eval-head">
				<span class="pa-eval-rank"><?php echo esc_html( sprintf( '%02d', $art_rank ) ); ?></span>
				<div class="pa-eval-titles">
					<h3 id="<?php echo esc_attr( $art_id ); ?>-h"><?php echo esc_html( $art_name ); ?></h3>
					<?php if ( '' !== $art_best ) : ?>
						<span class="pa-eval-best"><?php echo esc_html( $art_best ); ?></span>
					<?php endif; ?>
				</div>
			</div>
			<?php if ( ! empty( $art_shot['id'] ) ) : ?>
				<div class="pa-shot">
					<?php echo wp_get_attachment_image( (int) $art_shot['id'], 'large', false, array( 'alt' => $art_name, 'loading' => 'lazy' ) ); ?>
				</div>
			<?php endif; ?>
			<div class="pa-fields">
				<?php if ( '' !== $art_pricing ) : ?>
					<div class="pa-field"><span class="pa-field-k">Pricing</span><p><?php echo esc_html( $art_pricing ); ?></p></div>
				<?php endif; ?>
				<?php if ( '' !== $art_why ) : ?>
					<div class="pa-field"><span class="pa-field-k">Why choose it</span><p><?php echo wp_kses( $art_why, $art_kses ); ?></p></div>
				<?php endif; ?>
				<?php if ( $art_integrations ) : ?>
					<div class="pa-field pa-field--int">
						<span class="pa-field-k">Integrations</span>
						<div class="pa-int-list">
							<?php foreach ( $art_integrations as $art_int ) : ?>
								<span class="pa-int"><?php echo esc_html( $art_int ); ?></span>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<?php if ( $art_pros || $art_cons ) : ?>
				<div class="pa-runs">
					<?php if ( $art_pros ) : ?>
						<div class="pa-run pa-run--pro">
							<span class="pa-run-k"><?php echo wp_kses( tnb_art_icon( 'check' ), $art_svg ); ?>Pros</span>
							<span class="pa-run-items">
								<?php foreach ( $art_pros as $art_j => $art_pro ) : ?>
									<?php if ( $art_j > 0 ) : ?><span class="pa-run-sep" aria-hidden="true"></span><?php endif; ?>
									<span class="pa-run-item"><?php echo esc_html( $art_pro ); ?></span>
								<?php endforeach; ?>
							</span>
						</div>
					<?php endif; ?>
					<?php if ( $art_cons ) : ?>
						<div class="pa-run pa-run--con">
							<span class="pa-run-k"><?php echo wp_kses( tnb_art_icon( 'x' ), $art_svg ); ?>Cons</span>
							<span class="pa-run-items">
								<?php foreach ( $art_cons as $art_j => $art_con ) : ?>
									<?php if ( $art_j > 0 ) : ?><span class="pa-run-sep" aria-hidden="true"></span><?php endif; ?>
									<span class="pa-run-item"><?php echo esc_html( $art_con ); ?></span>
								<?php endforeach; ?>
							</span>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</article>
	<?php endforeach; ?>
</div>
