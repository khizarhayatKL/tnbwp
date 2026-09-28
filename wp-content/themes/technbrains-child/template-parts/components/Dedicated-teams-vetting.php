<?php
/**
 * Dedicated Teams — Vetting timeline (centre spine, alternating cards).
 *
 * Layout : dt_vetting (ACF Flexible Content)
 * Fields : dtv_eyebrow, dtv_heading, dtv_sub, dtv_anchor, dtv_head_align,
 *          dtv_steps{ dtv_step_icon, dtv_step_title, dtv_step_desc }
 * CSS    : assets/css/components.css (.dt-vt*)
 * JS     : assets/js/components.js — the shared .dt-rev reveal only.
 *
 * The left/right alternation and the 90ms-per-card entrance stagger are index
 * maths, not authored values: the approved build computes both from the array
 * position, so they are emitted from $dtv_i rather than exposed as fields an
 * editor could put out of step with the spine.
 *
 * The card title is an <h3> because it sits under the section's <h2>. Its icon
 * is decorative — the title already carries the meaning — so the slot is
 * aria-hidden rather than given a label that would be read twice.
 *
 * dtv_anchor exists because the approved page links to this section (#dt-vetting).
 * It is authored rather than hardcoded so a second instance on the same page
 * cannot duplicate the id.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$dtv_eyebrow = (string) get_sub_field( 'dtv_eyebrow' );
$dtv_heading = (string) get_sub_field( 'dtv_heading' );
$dtv_sub     = (string) get_sub_field( 'dtv_sub' );
$dtv_anchor  = sanitize_title( (string) get_sub_field( 'dtv_anchor' ) );
$dtv_align   = (string) get_sub_field( 'dtv_head_align' );
$dtv_steps   = (array) get_sub_field( 'dtv_steps' );

if ( ! $dtv_steps ) {
	return;
}

$dtv_kses = array(
	'br'   => array(),
	'span' => array( 'class' => true ),
);

$dtv_svg_kses = array(
	'svg'      => array(
		'viewbox'         => true,
		'fill'            => true,
		'stroke'          => true,
		'stroke-width'    => true,
		'stroke-linecap'  => true,
		'stroke-linejoin' => true,
	),
	'circle'   => array(
		'cx' => true,
		'cy' => true,
		'r'  => true,
	),
	'line'     => array(
		'x1' => true,
		'y1' => true,
		'x2' => true,
		'y2' => true,
	),
	'polygon'  => array( 'points' => true ),
	'polyline' => array( 'points' => true ),
	'path'     => array( 'd' => true ),
);

/**
 * Inline icon for a vetting step.
 *
 * Geometry is the approved set verbatim. An unknown slug falls back to the
 * first icon rather than printing nothing, so a step never loses its badge.
 *
 * @param string $slug One of search|layers|code|chat|flask|badge.
 * @return string SVG markup.
 */
if ( ! function_exists( 'tnb_dtv_icon' ) ) {
	function tnb_dtv_icon( $slug ) {
		$open  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">';
		$paths = array(
			'search' => '<circle cx="11" cy="11" r="7"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>',
			'layers' => '<polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/>',
			'code'   => '<polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/>',
			'chat'   => '<path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>',
			'flask'  => '<path d="M9 2h6"/><path d="M10 2v6.5L4.5 18a2 2 0 0 0 1.7 3h11.6a2 2 0 0 0 1.7-3L14 8.5V2"/><path d="M7 15h10"/>',
			'badge'  => '<circle cx="12" cy="8" r="6"/><path d="M9 14.5L7 22l5-3 5 3-2-7.5"/>',
		);

		$key = isset( $paths[ $slug ] ) ? $slug : 'search';

		return $open . $paths[ $key ] . '</svg>';
	}
}

$dtv_head_cl = 'dt-head dt-rev' . ( 'left' === $dtv_align ? ' dt-head-left' : ' dt-center' );
?>
<section class="dt-section"<?php echo '' !== $dtv_anchor ? ' id="' . esc_attr( $dtv_anchor ) . '"' : ''; ?>>
	<div class="container">
		<?php if ( '' !== $dtv_eyebrow || '' !== $dtv_heading || '' !== $dtv_sub ) : ?>
			<div class="<?php echo esc_attr( $dtv_head_cl ); ?>">
				<?php if ( '' !== $dtv_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $dtv_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $dtv_heading ) : ?>
					<h2 class="dt-h2"><?php echo wp_kses( $dtv_heading, $dtv_kses ); ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $dtv_sub ) : ?>
					<p class="dt-sub"><?php echo wp_kses( $dtv_sub, $dtv_kses ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="dt-vt">
			<span class="dt-vt-spine" aria-hidden="true"></span>
			<?php
			$dtv_i = 0;
			foreach ( $dtv_steps as $dtv_step ) :
				$dtv_title = (string) ( $dtv_step['dtv_step_title'] ?? '' );
				$dtv_desc  = (string) ( $dtv_step['dtv_step_desc'] ?? '' );

				if ( '' === $dtv_title && '' === $dtv_desc ) {
					continue;
				}

				$dtv_side  = $dtv_i % 2 ? 'is-right' : 'is-left';
				$dtv_delay = $dtv_i * 90;
				++$dtv_i;
				?>
				<div class="dt-vt-item dt-rev <?php echo esc_attr( $dtv_side ); ?>" style="transition-delay:<?php echo (int) $dtv_delay; ?>ms">
					<span class="dt-vt-node" aria-hidden="true"></span>
					<div class="dt-vt-card">
						<div class="dt-vt-head">
							<span class="dt-vt-ic" aria-hidden="true"><?php
								echo wp_kses( tnb_dtv_icon( (string) ( $dtv_step['dtv_step_icon'] ?? '' ) ), $dtv_svg_kses );
							?></span>
						</div>
						<?php if ( '' !== $dtv_title ) : ?>
							<h3 class="dt-vt-t"><?php echo esc_html( $dtv_title ); ?></h3>
						<?php endif; ?>
						<?php if ( '' !== $dtv_desc ) : ?>
							<p class="dt-vt-d"><?php echo esc_html( $dtv_desc ); ?></p>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
