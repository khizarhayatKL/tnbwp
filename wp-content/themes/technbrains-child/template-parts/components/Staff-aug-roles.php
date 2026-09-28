<?php
/**
 * Staff Augmentation — Hire vetted talent (tab rail + card stack).
 *
 * Layout : sa_roles (ACF Flexible Content)
 * Fields : sar_eyebrow, sar_heading, sar_sub, sar_cta,
 *          sar_roles{ sar_role_title, sar_role_desc, sar_techs{ sar_tech_logo,
 *          sar_tech_name } }
 * CSS    : assets/css/components.css (.sa-roles, .sa-role-*)
 * JS     : assets/js/components.js ([data-sar-section])
 *
 * The stack position is relative, not absolute: the card two slots after the
 * active one is always `behind-2`, so six roles still paint exactly three cards.
 * PHP renders the first role as `front` so the section reads correctly with no JS.
 *
 * Buttons are not marked up as ARIA tabs on purpose — a tablist implies one
 * visible panel, and this design deliberately shows three cards at once. They are
 * toggle buttons with aria-pressed, which is what they actually are. *
 * The approved build hides every trailing button arrow globally (its NO-BTN-ARROWS
 * tweak sets `.dt-btn .arr { display: none !important }` plus the same for
 * `a[class*="btn"] > span:last-child > svg`), so the arrow is not part of the
 * approved render. It is left out of the markup rather than shipped and then hidden
 * with !important — same appearance, less DOM, no specificity fight.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$sar_eyebrow = (string) get_sub_field( 'sar_eyebrow' );
$sar_heading = (string) get_sub_field( 'sar_heading' );
$sar_sub     = (string) get_sub_field( 'sar_sub' );
$sar_cta     = get_sub_field( 'sar_cta' );
$sar_roles   = (array) get_sub_field( 'sar_roles' );

if ( ! $sar_roles ) {
	return;
}

$sar_kses = array(
	'br'   => array(),
	'span' => array( 'class' => true ),
);

/**
 * Stack class for a card, given its index and the active index.
 *
 * @param int $i      Card index.
 * @param int $active  Active index.
 * @param int $total   Card count.
 * @return string
 */
if ( ! function_exists( 'tnb_sar_stack_class' ) ) {
	function tnb_sar_stack_class( int $i, int $active, int $total ): string {
		$d = ( $i - $active + $total ) % $total;

		if ( 0 === $d ) {
			return 'front';
		}
		if ( 1 === $d ) {
			return 'behind-1';
		}
		if ( 2 === $d ) {
			return 'behind-2';
		}

		return 'hidden';
	}
}

$sar_total = count( $sar_roles );
$sar_arrow = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>';
$sar_svg_kses = array(
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
<section class="sa-roles" data-sar-section>
	<div class="container">
		<div class="sa-roles-head sa-roles-head-row">
			<div class="sa-roles-head-text">
				<?php if ( '' !== $sar_eyebrow ) : ?>
					<div class="eyebrow eyebrow-light"><?php echo esc_html( $sar_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $sar_heading ) : ?>
					<h2 class="sa-roles-h2"><?php echo tnb_accent_heading( $sar_heading ); // Sanitised inside. ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $sar_sub ) : ?>
					<p class="sa-roles-sub"><?php echo wp_kses( $sar_sub, $sar_kses ); ?></p>
				<?php endif; ?>
			</div>
			<?php if ( is_array( $sar_cta ) && ! empty( $sar_cta['url'] ) ) : ?>
				<a class="btn btn-primary sa-roles-head-cta" href="<?php echo esc_url( $sar_cta['url'] ); ?>"<?php
					echo ! empty( $sar_cta['target'] ) ? ' target="' . esc_attr( $sar_cta['target'] ) . '" rel="noopener"' : '';
				?>><?php echo esc_html( (string) ( $sar_cta['title'] ?? '' ) ); ?></a>
			<?php endif; ?>
		</div>

		<div class="sa-roles-shell">
			<div class="sa-roles-list">
				<?php foreach ( $sar_roles as $sar_i => $sar_role ) : ?>
					<button type="button"
						class="sa-role-tab<?php echo 0 === (int) $sar_i ? ' active' : ''; ?>"
						aria-pressed="<?php echo 0 === (int) $sar_i ? 'true' : 'false'; ?>"
						data-sar-tab="<?php echo esc_attr( (string) (int) $sar_i ); ?>">
						<span><?php echo esc_html( (string) ( $sar_role['sar_role_title'] ?? '' ) ); ?></span>
					</button>
				<?php endforeach; ?>
			</div>

			<div class="sa-roles-stage">
				<?php foreach ( $sar_roles as $sar_i => $sar_role ) : ?>
					<div class="sa-role-card <?php echo esc_attr( tnb_sar_stack_class( (int) $sar_i, 0, $sar_total ) ); ?>" data-sar-card>
						<div class="sa-role-card-body">
							<div class="sa-role-card-title"><?php echo esc_html( (string) ( $sar_role['sar_role_title'] ?? '' ) ); ?></div>
							<div class="sa-role-card-desc"><?php echo esc_html( (string) ( $sar_role['sar_role_desc'] ?? '' ) ); ?></div>
							<?php $sar_techs = (array) ( $sar_role['sar_techs'] ?? array() ); ?>
							<?php if ( $sar_techs ) : ?>
								<div class="sa-role-card-tags">
									<?php
										foreach ( $sar_techs as $sar_tech ) :
											$sar_logo = (int) ( $sar_tech['sar_tech_logo']['ID'] ?? 0 );
											$sar_name = (string) ( $sar_tech['sar_tech_name'] ?? '' );

											if ( ! $sar_logo && '' === $sar_name ) {
												continue;
											}

											// Optional link wraps the whole chip (icon + name); no
											// link keeps the original span so old rows are untouched.
											$sar_link   = $sar_tech['sar_tech_link'] ?? null;
											$sar_url    = is_array( $sar_link ) ? (string) ( $sar_link['url'] ?? '' ) : '';
											$sar_target = is_array( $sar_link ) ? (string) ( $sar_link['target'] ?? '' ) : '';
											$sar_tag    = '' !== $sar_url ? 'a' : 'span';
											$sar_attrs  = '' !== $sar_url
												? ' href="' . esc_url( $sar_url ) . '"'
													. ( '' !== $sar_target ? ' target="' . esc_attr( $sar_target ) . '" rel="noopener"' : '' )
												: '';
											?>
									<<?php echo $sar_tag; ?> class="sa-role-tech"<?php echo $sar_attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?>>
										<?php if ( $sar_logo ) : ?>
											<span class="sa-role-tech-tile" aria-hidden="true"><?php
												// The name beside it already carries the meaning, so the mark is
												// decorative and takes an empty alt rather than repeating it.
												echo wp_get_attachment_image(
													$sar_logo,
													'medium',
													false,
													array(
														'alt'      => '',
														'loading'  => 'lazy',
														'decoding' => 'async',
													)
												);
											?></span>
										<?php endif; ?>
										<?php if ( '' !== $sar_name ) : ?>
											<span class="sa-role-tech-name"><?php echo esc_html( $sar_name ); ?></span>
										<?php endif; ?>
									</<?php echo $sar_tag; ?>>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
