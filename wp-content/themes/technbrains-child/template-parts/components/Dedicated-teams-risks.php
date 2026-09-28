<?php
/**
 * Dedicated Teams — Why dedicated teams fail, and how we prevent it.
 *
 * Layout : dt_risks (ACF Flexible Content)
 * Fields : dtr_eyebrow, dtr_heading, dtr_sub, dtr_risk_label, dtr_fix_label,
 *          dtr_pairs{ dtr_risk_title, dtr_risk_body, dtr_fix_title, dtr_fix_body }
 * CSS    : assets/css/components.css (.dt-ps*)
 * JS     : assets/js/components.js ([data-ps-slider]) — shared with sa_fit
 *
 * Same shape as the Staff Augmentation fit slider: every pair is in the DOM with
 * `hidden` on the inactive ones so the content is crawlable and readable without
 * JavaScript, and the connector path is measured from the live node positions
 * rather than authored, because its geometry changes with the container width.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$dtr_eyebrow = (string) get_sub_field( 'dtr_eyebrow' );
$dtr_heading = (string) get_sub_field( 'dtr_heading' );
$dtr_sub     = (string) get_sub_field( 'dtr_sub' );
$dtr_pairs   = (array) get_sub_field( 'dtr_pairs' );
$dtr_risk    = (string) get_sub_field( 'dtr_risk_label' );
$dtr_fix     = (string) get_sub_field( 'dtr_fix_label' );

if ( ! $dtr_pairs ) {
	return;
}

$dtr_kses = array(
	'br'   => array(),
	'span' => array( 'class' => true ),
);

$dtr_risk  = '' !== $dtr_risk ? $dtr_risk : __( 'The Risk', 'technbrains-child' );
$dtr_fix   = '' !== $dtr_fix ? $dtr_fix : __( 'How We Prevent It', 'technbrains-child' );
$dtr_total = count( $dtr_pairs );
?>
<section class="dt-section" data-ps-slider>
	<div class="container">
		<?php if ( '' !== $dtr_eyebrow || '' !== $dtr_heading || '' !== $dtr_sub ) : ?>
			<div class="dt-head dt-center">
				<?php if ( '' !== $dtr_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $dtr_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $dtr_heading ) : ?>
					<h2 class="dt-h2"><?php echo wp_kses( $dtr_heading, $dtr_kses ); ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $dtr_sub ) : ?>
					<p class="dt-sub"><?php echo wp_kses( $dtr_sub, $dtr_kses ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="dt-ps">
			<?php foreach ( $dtr_pairs as $dtr_i => $dtr_pair ) : ?>
				<div class="dt-ps-stage" data-ps-pair<?php echo 0 === (int) $dtr_i ? '' : ' hidden'; ?>>
					<div class="dt-ps-col dt-ps-col-left">
						<div class="dt-ps-pill dt-ps-pill-problem"><span><?php echo esc_html( $dtr_risk ); ?></span></div>
						<div class="dt-ps-card dt-ps-card-problem">
							<span class="dt-ps-node dt-ps-node-out" data-ps-node-out aria-hidden="true"></span>
							<h3><?php echo esc_html( (string) ( $dtr_pair['dtr_risk_title'] ?? '' ) ); ?></h3>
							<p><?php echo esc_html( (string) ( $dtr_pair['dtr_risk_body'] ?? '' ) ); ?></p>
						</div>
					</div>

					<svg class="dt-ps-connector" data-ps-connector viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
						<path class="dt-ps-arrow" data-ps-arrow d=""></path>
					</svg>

					<div class="dt-ps-col dt-ps-col-right">
						<div class="dt-ps-card dt-ps-card-solution">
							<span class="dt-ps-node dt-ps-node-in" data-ps-node-in aria-hidden="true"></span>
							<h3><?php echo esc_html( (string) ( $dtr_pair['dtr_fix_title'] ?? '' ) ); ?></h3>
							<p><?php echo esc_html( (string) ( $dtr_pair['dtr_fix_body'] ?? '' ) ); ?></p>
						</div>
						<div class="dt-ps-pill dt-ps-pill-solution"><span><?php echo esc_html( $dtr_fix ); ?></span></div>
					</div>
				</div>
			<?php endforeach; ?>

			<?php if ( $dtr_total > 1 ) : ?>
				<div class="dt-ps-nav">
					<button class="dt-ps-nav-prev" type="button" data-ps-prev disabled aria-label="<?php esc_attr_e( 'Previous', 'technbrains-child' ); ?>">&larr;</button>
					<div class="dt-ps-dots">
						<?php foreach ( $dtr_pairs as $dtr_i => $dtr_pair ) : ?>
							<button class="dt-ps-dot<?php echo 0 === (int) $dtr_i ? ' is-active' : ''; ?>"
								type="button"
								data-ps-dot="<?php echo esc_attr( (string) (int) $dtr_i ); ?>"
								aria-current="<?php echo 0 === (int) $dtr_i ? 'true' : 'false'; ?>"
								aria-label="<?php
									/* translators: %d: slide number. */
									echo esc_attr( sprintf( __( 'Show risk %d', 'technbrains-child' ), (int) $dtr_i + 1 ) );
								?>"></button>
						<?php endforeach; ?>
					</div>
					<button class="dt-ps-nav-next" type="button" data-ps-next aria-label="<?php esc_attr_e( 'Next', 'technbrains-child' ); ?>">&rarr;</button>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
