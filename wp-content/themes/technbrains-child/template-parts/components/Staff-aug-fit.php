<?php
/**
 * Staff Augmentation — Is it right for you? (problem / solution slider).
 *
 * Layout : sa_fit (ACF Flexible Content)
 * Fields : saf_eyebrow, saf_heading, saf_sub, saf_pairs{ saf_problem_title,
 *          saf_problem_body, saf_solution_title, saf_solution_body }
 * CSS    : assets/css/components.css (.sa-fit, .sa-fit-ps, .sa-ps-*)
 * JS     : assets/js/components.js ([data-ps-slider]) — shared with dt_risks
 *
 * The approved build renders only the active pair. Here every pair is in the DOM
 * with `hidden` on the inactive ones, so all of the content is present for search
 * engines and readable with JavaScript off — the slider then just unhides.
 *
 * The connector <svg> is emitted empty. Its viewBox and path are measured from the
 * live position of the two nodes by the JS, because the geometry changes with the
 * container width; a hardcoded path would only line up at one viewport size.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$saf_eyebrow = (string) get_sub_field( 'saf_eyebrow' );
$saf_heading = (string) get_sub_field( 'saf_heading' );
$saf_sub     = (string) get_sub_field( 'saf_sub' );
$saf_pairs   = (array) get_sub_field( 'saf_pairs' );
$saf_problem = (string) get_sub_field( 'saf_problem_label' );
$saf_soln    = (string) get_sub_field( 'saf_solution_label' );

if ( ! $saf_pairs ) {
	return;
}

$saf_kses = array(
	'br'   => array(),
	'span' => array( 'class' => true ),
);

$saf_problem = '' !== $saf_problem ? $saf_problem : __( 'Problem', 'technbrains-child' );
$saf_soln    = '' !== $saf_soln ? $saf_soln : __( 'Solution', 'technbrains-child' );
$saf_total   = count( $saf_pairs );
?>
<section class="sa-fit sa-section" data-ps-slider>
	<div class="container">
		<?php if ( '' !== $saf_eyebrow || '' !== $saf_heading || '' !== $saf_sub ) : ?>
			<div class="sa-section-head sa-center">
				<?php if ( '' !== $saf_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $saf_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $saf_heading ) : ?>
					<h2 class="sa-h2"><?php echo wp_kses( $saf_heading, $saf_kses ); ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $saf_sub ) : ?>
					<p class="sa-section-sub"><?php echo wp_kses( $saf_sub, $saf_kses ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="sa-fit-ps">
			<?php foreach ( $saf_pairs as $saf_i => $saf_pair ) : ?>
				<div class="sa-ps-stage" data-ps-pair<?php echo 0 === (int) $saf_i ? '' : ' hidden'; ?>>
					<div class="sa-ps-col sa-ps-col-left">
						<div class="sa-ps-pill sa-ps-pill-problem">
							<span><?php echo esc_html( $saf_problem ); ?></span>
						</div>
						<div class="sa-ps-card sa-ps-card-problem">
							<span class="sa-ps-node sa-ps-node-out" data-ps-node-out aria-hidden="true"></span>
							<h3><?php echo esc_html( (string) ( $saf_pair['saf_problem_title'] ?? '' ) ); ?></h3>
							<p><?php echo esc_html( (string) ( $saf_pair['saf_problem_body'] ?? '' ) ); ?></p>
						</div>
					</div>

					<svg class="sa-ps-connector" data-ps-connector viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
						<path class="sa-ps-arrow" data-ps-arrow d=""></path>
					</svg>

					<div class="sa-ps-col sa-ps-col-right">
						<div class="sa-ps-card sa-ps-card-solution">
							<span class="sa-ps-node sa-ps-node-in" data-ps-node-in aria-hidden="true"></span>
							<h3><?php echo esc_html( (string) ( $saf_pair['saf_solution_title'] ?? '' ) ); ?></h3>
							<p><?php echo esc_html( (string) ( $saf_pair['saf_solution_body'] ?? '' ) ); ?></p>
						</div>
						<div class="sa-ps-pill sa-ps-pill-solution">
							<span><?php echo esc_html( $saf_soln ); ?></span>
						</div>
					</div>
				</div>
			<?php endforeach; ?>

			<?php if ( $saf_total > 1 ) : ?>
				<div class="sa-ps-nav">
					<button class="sa-ps-nav-prev" type="button" data-ps-prev disabled aria-label="<?php esc_attr_e( 'Previous', 'technbrains-child' ); ?>">&larr;</button>
					<div class="sa-ps-dots">
						<?php foreach ( $saf_pairs as $saf_i => $saf_pair ) : ?>
							<button class="sa-ps-dot<?php echo 0 === (int) $saf_i ? ' is-active' : ''; ?>"
								type="button"
								data-ps-dot="<?php echo esc_attr( (string) (int) $saf_i ); ?>"
								aria-current="<?php echo 0 === (int) $saf_i ? 'true' : 'false'; ?>"
								aria-label="<?php
									/* translators: %d: slide number. */
									echo esc_attr( sprintf( __( 'Show pair %d', 'technbrains-child' ), (int) $saf_i + 1 ) );
								?>"></button>
						<?php endforeach; ?>
					</div>
					<button class="sa-ps-nav-next" type="button" data-ps-next aria-label="<?php esc_attr_e( 'Next', 'technbrains-child' ); ?>">&rarr;</button>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
