<?php
/**
 * Software Outsourcing — Risk mitigation (autoplaying safeguard slider).
 *
 * Layout : so_riskx (ACF Flexible Content)
 * Fields : sorx_eyebrow, sorx_heading, sorx_sub, sorx_anchor,
 *          sorx_items{ sorx_item_image, sorx_item_title, sorx_item_desc }
 * CSS    : assets/css/components.css (.so-riskx-*, plus the theme's .case-deck-*)
 * JS     : assets/js/components.js ([data-riskx])
 *
 * The nav reuses the theme's own .case-deck-nav / .case-btn / .case-deck-dot, as
 * the approved markup does. That is safe: the cases-deck script is scoped to
 * [data-deck="cases"] and keys on data-cases-* attributes, so those classes are
 * presentational here and the two controls cannot drive each other.
 *
 * Every panel is rendered and .is-active toggles between them, where the approved
 * build re-renders only the active one. Rendering all of them is what lets the
 * section work with JS disabled — the first safeguard is readable — and costs
 * nothing, since the images were already all present with one shown.
 *
 * The dots are the tablist and each panel its tabpanel, so the control is a real
 * tab set. PHP marks index 0 active; the script only ever moves that mark.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$sorx_eyebrow = (string) get_sub_field( 'sorx_eyebrow' );
$sorx_heading = tnb_accent_heading( get_sub_field( 'sorx_heading' ) );
$sorx_sub     = (string) get_sub_field( 'sorx_sub' );
$sorx_anchor  = sanitize_title( (string) get_sub_field( 'sorx_anchor' ) );
$sorx_items   = (array) get_sub_field( 'sorx_items' );

// Rows with no title and no image would be an unreachable slide with a dot.
$sorx_items = array_values(
	array_filter(
		$sorx_items,
		static function ( $row ) {
			return (int) ( $row['sorx_item_image']['ID'] ?? 0 )
				|| '' !== (string) ( $row['sorx_item_title'] ?? '' );
		}
	)
);

if ( ! $sorx_items ) {
	return;
}

$sorx_kses = array(
	'br'   => array(),
	'span' => array( 'class' => true ),
);

$sorx_total = count( $sorx_items );
$sorx_uid   = wp_unique_id( 'so-riskx-' );

$sorx_arrow = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>';
$sorx_svg_kses = array(
	'svg'      => array(
		'viewbox'         => true,
		'fill'            => true,
		'stroke'          => true,
		'stroke-width'    => true,
		'stroke-linecap'  => true,
		'stroke-linejoin' => true,
		'aria-hidden'     => true,
	),
	'line'     => array( 'x1' => true, 'y1' => true, 'x2' => true, 'y2' => true ),
	'polyline' => array( 'points' => true ),
);
?>
<section class="so-riskx-section"<?php echo '' !== $sorx_anchor ? ' id="' . esc_attr( $sorx_anchor ) . '"' : ''; ?>>
	<div class="container">
		<?php if ( '' !== $sorx_eyebrow || '' !== $sorx_heading || '' !== $sorx_sub ) : ?>
			<div class="so-riskx-head dt-rev">
				<?php if ( '' !== $sorx_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $sorx_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $sorx_heading ) : ?>
					<h2 class="so-riskx-h2"><?php echo $sorx_heading; // Sanitised by tnb_accent_heading(). ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $sorx_sub ) : ?>
					<p class="so-riskx-sub"><?php echo wp_kses( $sorx_sub, $sorx_kses ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="so-riskx-flow dt-rev" data-riskx>
			<div class="so-riskx-feature">
				<div class="so-riskx-feature-media">
					<?php
					foreach ( $sorx_items as $sorx_i => $sorx_item ) :
						$sorx_img = (int) ( $sorx_item['sorx_item_image']['ID'] ?? 0 );

						if ( ! $sorx_img ) {
							continue;
						}

						// Decorative: the panel beside it carries the meaning, and the
						// stack would otherwise announce every slide at once.
						echo wp_get_attachment_image(
							$sorx_img,
							'large',
							false,
							array(
								'class'         => 'so-riskx-detail-img' . ( 0 === (int) $sorx_i ? ' is-active' : '' ),
								'alt'           => '',
								'aria-hidden'   => 'true',
								'loading'       => 0 === (int) $sorx_i ? 'eager' : 'lazy',
								'decoding'      => 'async',
								'data-riskx-img' => (string) (int) $sorx_i,
							)
						);
					endforeach;
					?>
				</div>

				<?php
				/*
				 * The panels are stacked and cross-faded rather than shown one at a
				 * time with [hidden]. Two reasons: .so-riskx-feature-body is
				 * display: flex, and a class rule beats the UA's [hidden] display:
				 * none, so hidden panels would all stay visible — the same defect an
				 * earlier audit found on .sa-ps-stage. And a panel that is
				 * display: none cannot transition, so switching slides would snap
				 * where the approved build fades.
				 *
				 * The wrapper is the grid's second column, so the two-column
				 * proportion holds no matter how many safeguards are authored.
				 */
				?>
				<div class="so-riskx-feature-bodies">
					<?php foreach ( $sorx_items as $sorx_i => $sorx_item ) : ?>
						<div class="so-riskx-feature-body<?php echo 0 === (int) $sorx_i ? ' is-active' : ''; ?>"
							id="<?php echo esc_attr( $sorx_uid . '-panel-' . $sorx_i ); ?>"
							role="tabpanel"
							aria-labelledby="<?php echo esc_attr( $sorx_uid . '-tab-' . $sorx_i ); ?>"
							data-riskx-slide="<?php echo esc_attr( (string) (int) $sorx_i ); ?>"
							<?php echo 0 === (int) $sorx_i ? '' : 'aria-hidden="true"'; ?>>
							<?php $sorx_title = (string) ( $sorx_item['sorx_item_title'] ?? '' ); ?>
							<?php if ( '' !== $sorx_title ) : ?>
								<h3><?php echo esc_html( $sorx_title ); ?></h3>
							<?php endif; ?>
							<?php $sorx_desc = (string) ( $sorx_item['sorx_item_desc'] ?? '' ); ?>
							<?php if ( '' !== $sorx_desc ) : ?>
								<p><?php echo esc_html( $sorx_desc ); ?></p>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<?php if ( $sorx_total > 1 ) : ?>
				<div class="case-deck-nav so-riskx-casenav" aria-label="<?php esc_attr_e( 'Safeguard navigation', 'technbrains-child' ); ?>">
					<?php // The same glyph as Next, turned around in CSS — no wrapper element to collapse it. ?>
					<button class="case-btn" type="button" data-riskx-prev aria-label="<?php esc_attr_e( 'Previous safeguard', 'technbrains-child' ); ?>">
						<?php echo wp_kses( $sorx_arrow, $sorx_svg_kses ); ?>
					</button>
					<div class="case-deck-dots" role="tablist">
						<?php foreach ( $sorx_items as $sorx_i => $sorx_item ) : ?>
							<button class="case-deck-dot<?php echo 0 === (int) $sorx_i ? ' is-active' : ''; ?>"
								type="button"
								role="tab"
								id="<?php echo esc_attr( $sorx_uid . '-tab-' . $sorx_i ); ?>"
								aria-controls="<?php echo esc_attr( $sorx_uid . '-panel-' . $sorx_i ); ?>"
								aria-selected="<?php echo 0 === (int) $sorx_i ? 'true' : 'false'; ?>"
								data-riskx-dot="<?php echo esc_attr( (string) (int) $sorx_i ); ?>"
								aria-label="<?php
									/* translators: %s: safeguard title, or its number when untitled. */
									echo esc_attr(
										sprintf(
											/* translators: %s: safeguard name. */
											__( 'Show safeguard: %s', 'technbrains-child' ),
											'' !== (string) ( $sorx_item['sorx_item_title'] ?? '' )
												? (string) $sorx_item['sorx_item_title']
												: (string) ( (int) $sorx_i + 1 )
										)
									);
								?>"></button>
						<?php endforeach; ?>
					</div>
					<button class="case-btn" type="button" data-riskx-next aria-label="<?php esc_attr_e( 'Next safeguard', 'technbrains-child' ); ?>">
						<?php echo wp_kses( $sorx_arrow, $sorx_svg_kses ); ?>
					</button>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
