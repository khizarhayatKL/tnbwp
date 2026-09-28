<?php
/**
 * Software Outsourcing — Pricing tiers (numbered rows).
 *
 * Layout : so_pricing (ACF Flexible Content)
 * Fields : sop_eyebrow, sop_heading, sop_sub, sop_cta,
 *          sop_tiers{ sop_tier_title, sop_tier_price, sop_tier_desc,
 *                     sop_tier_featured }
 * CSS    : assets/css/components.css (.so-pr-*)
 * JS     : none.
 *
 * ⚠ The .so-pr-* rules are the one part of these pages with NO approved CSS: the
 * classes appear in the QA build's so-3.jsx but no stylesheet in that build
 * defines them, and there is no injected <style> either — the section renders
 * unstyled there. The CSS in components.css under "PRICING" is
 * therefore new work, built from the page's own tokens (--dt-ink / --dt-muted /
 * --dt-line / --dt-red) and the .dt-tier.feat treatment so it reads as part of
 * the same page. It has NOT been through design QA. Replace it wholesale if the
 * approved CSS turns up.
 *
 * Row numbers are generated from the order, so reordering renumbers the list. *
 * The approved build hides every trailing button arrow globally (its NO-BTN-ARROWS
 * tweak sets `.dt-btn .arr { display: none !important }` plus the same for
 * `a[class*="btn"] > span:last-child > svg`), so the arrow is not part of the
 * approved render. It is left out of the markup rather than shipped and then hidden
 * with !important — same appearance, less DOM, no specificity fight.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$sop_eyebrow = (string) get_sub_field( 'sop_eyebrow' );
$sop_heading = (string) get_sub_field( 'sop_heading' );
$sop_sub     = (string) get_sub_field( 'sop_sub' );
$sop_cta     = get_sub_field( 'sop_cta' );
$sop_tiers   = (array) get_sub_field( 'sop_tiers' );

if ( ! $sop_tiers ) {
	return;
}

$sop_kses = array(
	'br'   => array(),
	'span' => array( 'class' => true ),
);

$sop_arrow = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>';
$sop_svg_kses = array(
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
<section class="dt-section">
	<div class="container">
		<?php if ( '' !== $sop_eyebrow || '' !== $sop_heading || '' !== $sop_sub ) : ?>
			<div class="so-pr-head">
				<div class="so-pr-head-text">
					<div class="dt-head dt-center">
						<?php if ( '' !== $sop_eyebrow ) : ?>
							<div class="eyebrow"><?php echo esc_html( $sop_eyebrow ); ?></div>
						<?php endif; ?>
						<?php if ( '' !== $sop_heading ) : ?>
							<h2 class="dt-h2"><?php echo wp_kses( $sop_heading, $sop_kses ); ?></h2>
						<?php endif; ?>
						<?php if ( '' !== $sop_sub ) : ?>
							<p class="dt-sub"><?php echo wp_kses( $sop_sub, $sop_kses ); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<div class="so-pr-list-wrap">
			<?php foreach ( $sop_tiers as $sop_i => $sop_tier ) : ?>
				<div class="so-pr-row<?php echo ! empty( $sop_tier['sop_tier_featured'] ) ? ' featured' : ''; ?>">
					<span class="so-pr-num" aria-hidden="true"><?php
						echo esc_html( str_pad( (string) ( (int) $sop_i + 1 ), 2, '0', STR_PAD_LEFT ) );
					?></span>
					<div class="so-pr-row-main">
						<div class="so-pr-row-head">
							<h3><?php echo esc_html( (string) ( $sop_tier['sop_tier_title'] ?? '' ) ); ?></h3>
							<?php $sop_price = (string) ( $sop_tier['sop_tier_price'] ?? '' ); ?>
							<?php if ( '' !== $sop_price ) : ?>
								<div class="so-pr-price"><span class="cur"><?php echo esc_html( $sop_price ); ?></span></div>
							<?php endif; ?>
						</div>
						<?php $sop_desc = (string) ( $sop_tier['sop_tier_desc'] ?? '' ); ?>
						<?php if ( '' !== $sop_desc ) : ?>
							<p class="so-pr-desc"><?php echo esc_html( $sop_desc ); ?></p>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<?php if ( is_array( $sop_cta ) && ! empty( $sop_cta['url'] ) ) : ?>
			<div class="so-pr-cta">
				<a class="dt-btn dt-btn-primary" href="<?php echo esc_url( $sop_cta['url'] ); ?>"<?php
					echo ! empty( $sop_cta['target'] ) ? ' target="' . esc_attr( $sop_cta['target'] ) . '" rel="noopener"' : '';
				?>><?php echo esc_html( (string) ( $sop_cta['title'] ?? '' ) ); ?></a>
			</div>
		<?php endif; ?>
	</div>
</section>
