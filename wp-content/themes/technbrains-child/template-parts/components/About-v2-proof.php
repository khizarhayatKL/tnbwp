<?php
/**
 * About Us V2 — 02 Proof (stat bento).
 *
 * Port of the ABSProof component from the QA-approved prototype
 * (about-story-copy.jsx:166-206). Grid placement follows row order via the
 * :nth-child rules in about-v2.css, so no inline grid-area is emitted.
 *
 * Purely numeric values carry data-to and animate up from zero on reveal;
 * the final value is already in the markup so no-JS visitors and crawlers see
 * the real figure. Percentage bars carry data-pct and are filled by CSS from
 * the --abs-pct custom property that about-v2.js sets.
 *
 * Chapter of: abs_story (About-story.php) — a row of its abs_chapters field,
 * so values are read with get_sub_field() against the current row.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$abs_h2    = get_sub_field( 'abs_proof_h2' );
$abs_stats = get_sub_field( 'abs_stats' );

if ( ! $abs_h2 && empty( $abs_stats ) ) {
	return;
}
?>
<section class="abs-chapter" data-screen-label="02 Proof">
	<div class="abs-wrap">
		<div class="abs-split">
			<div class="abs-split-head abs-proof-head abs-rev">
				<?php if ( $abs_h2 ) : ?>
					<h2 class="abs-h2"><?php echo esc_html( $abs_h2 ); ?></h2>
				<?php endif; ?>
			</div>
			<?php if ( ! empty( $abs_stats ) ) : ?>
				<div class="abs-bento abs-split-body abs-rev">
					<?php
					foreach ( $abs_stats as $abs_i => $abs_stat ) {
						$abs_value = isset( $abs_stat['value'] ) ? trim( (string) $abs_stat['value'] ) : '';
						$abs_unit  = isset( $abs_stat['unit'] ) ? $abs_stat['unit'] : '';
						$abs_label = isset( $abs_stat['label'] ) ? $abs_stat['label'] : '';
						$abs_wm    = isset( $abs_stat['index'] ) ? $abs_stat['index'] : '';
						$abs_kind  = isset( $abs_stat['kind'] ) ? $abs_stat['kind'] : '';
						$abs_pct   = isset( $abs_stat['pct'] ) ? (float) $abs_stat['pct'] : 0;
						$abs_tag   = isset( $abs_stat['tag'] ) ? $abs_stat['tag'] : '';
						$abs_feat  = ! empty( $abs_stat['featured'] );
						?>
						<div class="abs-bento-card<?php echo $abs_feat ? ' feat' : ''; ?>">
							<?php if ( '' !== $abs_wm ) : ?>
								<span class="abs-bento-wm" aria-hidden="true"><?php echo esc_html( $abs_wm ); ?></span>
							<?php endif; ?>
							<div class="abs-bento-bot">
								<div class="abs-bento-v">
									<?php
									if ( is_numeric( $abs_value ) ) {
										echo '<span data-to="' . esc_attr( $abs_value ) . '">' . esc_html( $abs_value ) . '</span>';
									} else {
										echo esc_html( $abs_value );
									}
									?>
									<?php if ( '' !== $abs_unit ) : ?>
										<span class="u"><?php echo esc_html( $abs_unit ); ?></span>
									<?php endif; ?>
								</div>

								<?php
								if ( 'rating' === $abs_kind && is_numeric( $abs_value ) ) {
									$abs_rating = (float) $abs_value;
									?>
									<div class="abs-bento-stars" aria-label="<?php echo esc_attr( sprintf( /* translators: %s: rating value out of five. */ __( '%s out of 5', 'technbrains-child' ), $abs_value ) ); ?>">
										<?php
										for ( $abs_s = 0; $abs_s < 5; $abs_s++ ) {
											$abs_fill = max( 0, min( 1, $abs_rating - $abs_s ) );
											$abs_gid  = 'absfg-' . $abs_i . '-' . $abs_s;

											if ( $abs_fill >= 1 ) {
												$abs_paint = 'currentColor';
											} elseif ( $abs_fill <= 0 ) {
												$abs_paint = 'rgba(12,35,64,0.14)';
											} else {
												$abs_paint = 'url(#' . $abs_gid . ')';
											}
											?>
											<svg viewBox="0 0 24 24" width="15" height="15" aria-hidden="true">
												<?php if ( $abs_fill > 0 && $abs_fill < 1 ) : ?>
													<defs>
														<linearGradient id="<?php echo esc_attr( $abs_gid ); ?>">
															<stop offset="<?php echo esc_attr( ( $abs_fill * 100 ) . '%' ); ?>" stop-color="currentColor" />
															<stop offset="<?php echo esc_attr( ( $abs_fill * 100 ) . '%' ); ?>" stop-color="transparent" />
														</linearGradient>
													</defs>
												<?php endif; ?>
												<path d="M12 2l2.9 6.1 6.6.9-4.8 4.6 1.2 6.6L12 18.6 6.1 21l1.2-6.6L2.5 9l6.6-.9z" fill="<?php echo esc_attr( $abs_paint ); ?>" stroke="none" />
											</svg>
											<?php
										}
										?>
									</div>
									<?php
								}
								?>

								<?php if ( $abs_label ) : ?>
									<div class="abs-bento-l"><?php echo esc_html( $abs_label ); ?></div>
								<?php endif; ?>

								<?php if ( $abs_tag ) : ?>
									<div class="abs-bento-tag"><?php echo esc_html( $abs_tag ); ?></div>
								<?php endif; ?>

								<?php if ( 'pct' === $abs_kind && $abs_pct > 0 ) : ?>
									<div class="abs-bento-bar"><span data-pct="<?php echo esc_attr( $abs_pct ); ?>"></span></div>
								<?php endif; ?>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
