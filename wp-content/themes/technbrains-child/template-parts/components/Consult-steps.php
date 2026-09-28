<?php
/**
 * Consultation Steps — numbered step cards, one may be "featured" (taller,
 * shows its description).
 *
 * Layout : consult_steps (ACF Flexible Content)
 * Fields : cst_heading, cst_cta, cst_steps{ cst_step_icon, cst_step_title,
 *          cst_step_desc, cst_step_featured }
 * CSS    : assets/css/components.css (.cst-*)
 * JS     : none.
 *
 * Heading/CTA reuse the dt-section/dt-head/dt-h2/dt-btn convention already
 * used by Software-outsourcing-hero.php and Reasons-compare.php — the CTA
 * closure below is the same one repeated in both.
 *
 * The step number ("01", "02"...) is derived from the repeater position
 * rather than stored, matching the convention in Service-process.php and
 * Hire-process.php — reordering rows renumbers itself.
 *
 * Default icons fall back to the three real assets exported from the
 * approved Figma design (idea / searching / direction-sign) so an author
 * who has not yet uploaded a custom icon still sees the approved look, not
 * a placeholder. The card background art is a procedural CSS blob (see
 * .cst-card-art in components.css), not an exported image.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cst_heading = (string) get_sub_field( 'cst_heading' );
$cst_cta     = get_sub_field( 'cst_cta' );
$cst_steps   = (array) get_sub_field( 'cst_steps' );

if ( ! $cst_steps ) {
	return;
}

$cst_render_cta = static function ( $cta, $class ) {
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

// Default icons are solid black-on-transparent, tinted red via CSS mask
// (same technique as .rc-arrow in Reasons-compare.php) rather than a raw
// <img>, since an author-uploaded icon may carry its own colour and must
// not be forced through the same mask.
$cst_default_icons = array(
	'idea'      => get_stylesheet_directory_uri() . '/assets/images/consult-step-idea.png',
	'searching' => get_stylesheet_directory_uri() . '/assets/images/consult-step-searching.png',
	'direction' => get_stylesheet_directory_uri() . '/assets/images/consult-step-direction.png',
);
$cst_default_keys = array_keys( $cst_default_icons );
?>
<section class="dt-section cst-section">
	<div class="container">

		<?php if ( '' !== $cst_heading || ( is_array( $cst_cta ) && ! empty( $cst_cta['url'] ) ) ) : ?>
			<div class="dt-head cst-head">
				<?php if ( '' !== $cst_heading ) : ?>
					<h2 class="dt-h2"><?php echo esc_html( $cst_heading ); ?></h2>
				<?php endif; ?>
				<?php if ( is_array( $cst_cta ) && ! empty( $cst_cta['url'] ) ) : ?>
					<div class="cst-head-cta">
						<?php $cst_render_cta( $cst_cta, 'dt-btn dt-btn-primary' ); ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="cst-cards">
			<?php foreach ( $cst_steps as $cst_i => $cst_step ) :
				$cst_title    = trim( (string) ( $cst_step['cst_step_title'] ?? '' ) );
				$cst_desc     = trim( (string) ( $cst_step['cst_step_desc'] ?? '' ) );
				$cst_featured = ! empty( $cst_step['cst_step_featured'] );
				$cst_icon_id  = ! empty( $cst_step['cst_step_icon']['ID'] ) ? (int) $cst_step['cst_step_icon']['ID'] : 0;

				if ( '' === $cst_title ) {
					continue;
				}

				$cst_num  = str_pad( (string) ( $cst_i + 1 ), 2, '0', STR_PAD_LEFT );
				$cst_card = 'cst-card' . ( $cst_featured ? ' is-featured' : '' );
				?>
				<div class="<?php echo esc_attr( $cst_card ); ?>">
					<div class="cst-card-art" aria-hidden="true">
						<span class="cst-card-num"><?php echo esc_html( $cst_num ); ?></span>
					</div>
					<div class="cst-card-body">
						<div class="cst-card-icon">
							<?php if ( $cst_icon_id ) : ?>
								<?php echo wp_get_attachment_image( $cst_icon_id, 'thumbnail', false, array( 'alt' => '' ) ); ?>
							<?php else :
								$cst_default_key = $cst_default_keys[ $cst_i % count( $cst_default_keys ) ];
								?>
								<span
									class="cst-card-icon-mask"
									style="mask-image:url('<?php echo esc_url( $cst_default_icons[ $cst_default_key ] ); ?>');-webkit-mask-image:url('<?php echo esc_url( $cst_default_icons[ $cst_default_key ] ); ?>')"
									aria-hidden="true"
								></span>
							<?php endif; ?>
						</div>
						<h3 class="cst-card-title"><?php echo esc_html( $cst_title ); ?></h3>
						<?php if ( '' !== $cst_desc ) : ?>
							<p class="cst-card-desc"><?php echo esc_html( $cst_desc ); ?></p>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</section>
