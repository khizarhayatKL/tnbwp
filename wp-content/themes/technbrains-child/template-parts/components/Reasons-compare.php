<?php
/**
 * Reasons Compare — "When You Need X, And When You Do Not".
 *
 * Layout : reasons_compare (ACF Flexible Content)
 * Fields : rc_heading, rc_sub, rc_cta, rc_rows{ rc_row_label, rc_row_text }
 * CSS    : assets/css/components.css (.rc-*)
 * JS     : none.
 *
 * Heading/CTA markup follows the existing dt-section/dt-head/dt-btn convention
 * (see Construction-compare.php, Software-outsourcing-hero.php) rather than
 * inventing new heading classes. The CTA closure mirrors
 * Software-outsourcing-hero.php's $soh_render_cta exactly, including the
 * #tnb-popup contact-form-trigger convention.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$rc_heading = (string) get_sub_field( 'rc_heading' );
$rc_sub     = (string) get_sub_field( 'rc_sub' );
$rc_cta     = get_sub_field( 'rc_cta' );
$rc_rows    = (array) get_sub_field( 'rc_rows' );

if ( ! $rc_rows ) {
	return;
}

$rc_render_cta = static function ( $cta, $class ) {
	if ( ! is_array( $cta ) || empty( $cta['url'] ) || '' === (string) ( $cta['title'] ?? '' ) ) {
		return;
	}
	if ( in_array( $cta['url'], array( '#tnb-popup', '#tnb-form' ), true ) ) {
		echo '<button type="button" class="' . esc_attr( $class ) . ' tnb-popup-trigger">'
			. esc_html( (string) $cta['title'] ) . '</button>';
		return;
	}
	echo '<a class="' . esc_attr( $class ) . '" href="' . esc_url( $cta['url'] ) . '"'
		. ( ! empty( $cta['target'] ) ? ' target="' . esc_attr( $cta['target'] ) . '" rel="noopener"' : '' )
		. '>' . esc_html( (string) $cta['title'] ) . '</a>';
};
?>
<section class="dt-section rc-section">
	<div class="container">

		<?php if ( '' !== $rc_heading || '' !== $rc_sub || ( is_array( $rc_cta ) && ! empty( $rc_cta['url'] ) ) ) : ?>
			<div class="dt-head rc-head">
				<div class="rc-head-text">
					<?php if ( '' !== $rc_heading ) : ?>
						<h2 class="dt-h2"><?php echo esc_html( $rc_heading ); ?></h2>
					<?php endif; ?>
					<?php if ( '' !== $rc_sub ) : ?>
						<p class="dt-sub"><?php echo esc_html( $rc_sub ); ?></p>
					<?php endif; ?>
				</div>
				<?php if ( is_array( $rc_cta ) && ! empty( $rc_cta['url'] ) ) : ?>
					<div class="rc-head-cta">
						<?php $rc_render_cta( $rc_cta, 'dt-btn dt-btn-primary' ); ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="rc-rows">
			<?php foreach ( $rc_rows as $rc_row ) :
				$rc_label = trim( (string) ( $rc_row['rc_row_label'] ?? '' ) );
				$rc_text  = trim( (string) ( $rc_row['rc_row_text'] ?? '' ) );

				if ( '' === $rc_label && '' === $rc_text ) {
					continue;
				}
				?>
				<div class="rc-row">
					<div class="rc-row-left">
					<?php if ( '' !== $rc_label ) : ?>
						<div class="rc-pill"><?php echo esc_html( $rc_label ); ?></div>
					<?php endif; ?>
					<span class="rc-arrow" aria-hidden="true"></span>
					</div>
					<?php if ( '' !== $rc_text ) : ?>
						<div class="rc-box"><?php echo esc_html( $rc_text ); ?></div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</section>
