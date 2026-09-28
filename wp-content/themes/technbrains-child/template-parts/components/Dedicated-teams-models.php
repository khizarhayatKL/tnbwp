<?php
/**
 * Dedicated Teams — Team models (three tiers).
 *
 * Layout : dt_models (ACF Flexible Content)
 * Fields : dtm_eyebrow, dtm_heading, dtm_sub, dtm_anchor,
 *          dtm_tiers{ dtm_tier_name, dtm_tier_best, dtm_tier_desc,
 *                     dtm_tier_featured, dtm_tier_items{ dtm_tier_item } }
 * CSS    : assets/css/components.css (.dt-tiers, .dt-tier*)
 * JS     : none.
 *
 * The bullet list is a <ul> because it is a list; the design's tick is a decorative
 * span inside each item rather than a list marker, which is why the CSS turns
 * markers off instead of styling them.
 *
 * dtm_anchor exists because the approved page links to this section from the hero
 * (#dt-models). It is authored rather than hardcoded so a second instance on the
 * same page cannot duplicate the id.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$dtm_eyebrow = (string) get_sub_field( 'dtm_eyebrow' );
$dtm_heading = (string) get_sub_field( 'dtm_heading' );
$dtm_sub     = (string) get_sub_field( 'dtm_sub' );
$dtm_anchor  = sanitize_title( (string) get_sub_field( 'dtm_anchor' ) );
$dtm_tiers   = (array) get_sub_field( 'dtm_tiers' );

if ( ! $dtm_tiers ) {
	return;
}

$dtm_kses = array(
	'br'   => array(),
	'span' => array( 'class' => true ),
);

$dtm_check = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>';
$dtm_svg_kses = array(
	'svg'      => array(
		'viewbox'         => true,
		'fill'            => true,
		'stroke'          => true,
		'stroke-width'    => true,
		'stroke-linecap'  => true,
		'stroke-linejoin' => true,
		'aria-hidden'     => true,
	),
	'polyline' => array( 'points' => true ),
);
?>
<section class="dt-section"<?php echo '' !== $dtm_anchor ? ' id="' . esc_attr( $dtm_anchor ) . '"' : ''; ?>>
	<div class="container">
		<?php if ( '' !== $dtm_eyebrow || '' !== $dtm_heading || '' !== $dtm_sub ) : ?>
			<div class="dt-head dt-head-left">
				<?php if ( '' !== $dtm_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $dtm_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $dtm_heading ) : ?>
					<h2 class="dt-h2"><?php echo wp_kses( $dtm_heading, $dtm_kses ); ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $dtm_sub ) : ?>
					<p class="dt-sub"><?php echo wp_kses( $dtm_sub, $dtm_kses ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="dt-tiers">
			<?php foreach ( $dtm_tiers as $dtm_tier ) : ?>
				<div class="dt-tier<?php echo ! empty( $dtm_tier['dtm_tier_featured'] ) ? ' feat' : ''; ?>">
					<div class="dt-tier-name"><?php echo esc_html( (string) ( $dtm_tier['dtm_tier_name'] ?? '' ) ); ?></div>
					<?php $dtm_best = (string) ( $dtm_tier['dtm_tier_best'] ?? '' ); ?>
					<?php if ( '' !== $dtm_best ) : ?>
						<div class="dt-tier-best"><?php echo esc_html( $dtm_best ); ?></div>
					<?php endif; ?>
					<?php $dtm_desc = (string) ( $dtm_tier['dtm_tier_desc'] ?? '' ); ?>
					<?php if ( '' !== $dtm_desc ) : ?>
						<p class="dt-tier-desc"><?php echo esc_html( $dtm_desc ); ?></p>
					<?php endif; ?>
					<?php $dtm_items = (array) ( $dtm_tier['dtm_tier_items'] ?? array() ); ?>
					<?php if ( $dtm_items ) : ?>
						<ul class="dt-tier-list">
							<?php foreach ( $dtm_items as $dtm_row ) : ?>
								<?php $dtm_item = (string) ( $dtm_row['dtm_tier_item'] ?? '' ); ?>
								<?php if ( '' === $dtm_item ) { continue; } ?>
								<li><span class="ck" aria-hidden="true"><?php
									echo wp_kses( $dtm_check, $dtm_svg_kses );
								?></span><?php echo esc_html( $dtm_item ); ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
