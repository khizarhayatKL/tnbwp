<?php
/**
 * Construction Software — Delivery process (six-step rail).
 *
 * Layout : cn_process (ACF Flexible Content)
 * Fields : cnp_eyebrow, cnp_heading, cnp_sub, cnp_anchor, cnp_marker,
 *          cnp_steps{ cnp_step_name, cnp_step_text }, cnp_note
 * CSS    : assets/css/construction.css (.cn-proc*)
 * JS     : none — the .dt-rev reveal in components.js is the only behaviour.
 *
 * An ordered list, because the six phases are a sequence and not a set. The step number is drawn by
 * a CSS counter rather than written into the markup, so reordering the repeater renumbers itself and
 * a screen reader is not told the position twice.
 *
 * The rail, its progress fill and the travelling marker are decorative: they restate visually what
 * the ordered list already says, so all three are aria-hidden. The marker image is optional — with
 * no image the rail still reads correctly, it just loses the ornament.
 *
 * --ni carries the step index to the stylesheet, kept for the prototype's own linear stagger
 * fallback (.cn-proc-node's base animation-delay). Each node's SPAN also gets --cnp-node-anim,
 * naming a per-index @keyframes rule this file generates inline (see $cnp_node_activate_pct and
 * the <style> block below) — needed because an `animation-delay` trick can't work here: giving
 * each node its own delay also shifts WHEN that node's own iteration boundary falls, so on every
 * loop after the first its "reset to white" moment drifts away from the hammer/fill's own cycle
 * boundary (both share the same 6s duration and start together) and it ends up staying lit
 * through most of the next pass instead of going dark and relighting as the hammer reaches it —
 * invisible on the very first pass (everything starts white together) but obvious on the second.
 * A per-node keyframe with its OWN activation percentage, sharing the hammer's exact 0%/100%
 * cycle boundary, fixes that permanently rather than just for one pass.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/**
 * The % of the 6s cycle at which cnBuildLine/cnHammerMove's height/position reaches this node's
 * target fraction, assuming steps are evenly spaced down the rail — i.e. where this node's own
 * generated keyframe should flip from white to red.
 *
 * cubic-bezier(.5,0,.5,1)'s y(t) reduces algebraically to the smoothstep curve 3t^2 - 2t^3, so the
 * fraction-to-time inversion below is Newton-Raphson on that closed form rather than a generic
 * bezier solver. x(t) = 1.5t - 1.5t^2 + t^3 is the matching real-elapsed-time fraction.
 *
 * @param int $index Zero-based step index.
 * @param int $total Total step count.
 * @return float Percentage, 0-100.
 */
$cnp_node_activate_pct = static function ( int $index, int $total ): float {
	if ( $total <= 1 ) {
		return 0.0;
	}

	// (float) cast matters: PHP's `/` returns an int when it divides evenly (e.g. 0/5 is int(0),
	// not float(0.0)), which would silently fail the === checks below and fall through to the
	// Newton-Raphson branch with a zero derivative on the first step.
	$target = (float) $index / ( $total - 1 );

	if ( 0.0 === $target ) {
		$t = 0.0;
	} elseif ( 1.0 === $target ) {
		$t = 1.0;
	} else {
		$t = $target;
		for ( $n = 0; $n < 8; $n++ ) {
			$y  = 3 * $t ** 2 - 2 * $t ** 3;
			$dy = 6 * $t - 6 * $t ** 2;
			if ( abs( $dy ) < 1.0e-9 ) {
				break;
			}
			$t -= ( $y - $target ) / $dy;
		}
	}

	$progress = 1.5 * $t - 1.5 * $t ** 2 + $t ** 3;

	return round( $progress * 85, 2 ); // 85%: cnBuildLine/cnHammerMove reach full height/position at their own 85% stop.
};

$cnp_eyebrow = (string) get_sub_field( 'cnp_eyebrow' );
$cnp_heading = tnb_accent_heading( (string) get_sub_field( 'cnp_heading' ) );
$cnp_sub     = (string) get_sub_field( 'cnp_sub' );
$cnp_anchor  = sanitize_title( (string) get_sub_field( 'cnp_anchor' ) );
$cnp_marker  = get_sub_field( 'cnp_marker' );
$cnp_steps   = (array) get_sub_field( 'cnp_steps' );
$cnp_note    = (string) get_sub_field( 'cnp_note' );

$cnp_kses = tnb_cn_allowed_html();

$cnp_steps = array_values(
	array_filter(
		$cnp_steps,
		static function ( $step ) {
			return '' !== trim( (string) ( $step['cnp_step_name'] ?? '' ) );
		}
	)
);

if ( ! $cnp_steps ) {
	return;
}
?>
<section class="dt-section gray cn-proc-sec"<?php echo '' !== $cnp_anchor ? ' id="' . esc_attr( $cnp_anchor ) . '"' : ''; ?>>
	<div class="container">
		<div class="cn-proc-layout">
			<?php if ( '' !== $cnp_eyebrow || '' !== $cnp_heading || '' !== $cnp_sub ) : ?>
				<div class="cn-proc-intro dt-rev">
					<?php if ( '' !== $cnp_eyebrow ) : ?>
						<div class="eyebrow"><?php echo esc_html( $cnp_eyebrow ); ?></div>
					<?php endif; ?>
					<?php if ( '' !== $cnp_heading ) : ?>
						<h2 class="dt-h2"><?php echo $cnp_heading; // Sanitised by tnb_accent_heading(). ?></h2>
					<?php endif; ?>
					<?php if ( '' !== $cnp_sub ) : ?>
						<p class="dt-sub"><?php echo wp_kses( $cnp_sub, $cnp_kses ); ?></p>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php
			// One @keyframes per step, each flipping from white to red at its own precomputed
			// percentage of the SAME 6s cycle the hammer/fill already run — see the docblock above
			// for why animation-delay can't do this. Harmless to regenerate per page load; there
			// are never more than a handful of steps.
			//
			// animation-timing-function: step-end on the 0% stop matters: keyframes interpolate
			// continuously between stops by default, so without it the node would fade smoothly
			// from white through pink to red across the ENTIRE 0%-to-activate gap (invisible for
			// the fallback cnNodeLight's tiny 3% gap, but a slow, obviously-wrong bleed for the
			// large gaps most of these nodes need) instead of staying crisp white right up to the
			// moment it should flip.
			?>
			<style>
				<?php foreach ( $cnp_steps as $cnp_i => $cnp_step ) : ?>
					<?php $cnp_pct = max( 0.01, min( 99.99, $cnp_node_activate_pct( $cnp_i, count( $cnp_steps ) ) ) ); ?>
					@keyframes cnp-node-<?php echo (int) $cnp_i; ?> {
						0% { background: #fff; border-color: var(--dt-line); color: var(--dt-ink); box-shadow: 0 0 0 6px #fff; animation-timing-function: step-end; }
						<?php echo esc_html( (string) $cnp_pct ); ?>%, 100% { background: var(--dt-red); border-color: var(--dt-red); color: #fff; box-shadow: 0 8px 18px -6px rgba(236, 28, 36, 0.55), 0 0 0 6px #fff; }
					}
				<?php endforeach; ?>
			</style>
			<ol class="cn-proc" style="--cn-proc-count:<?php echo (int) count( $cnp_steps ); ?>">
				<span class="cn-proc-line" aria-hidden="true"></span>
				<span class="cn-proc-fill" aria-hidden="true"></span>

				<?php if ( ! empty( $cnp_marker['id'] ) ) : ?>
					<span class="cn-proc-hammer" aria-hidden="true">
						<?php
						echo wp_get_attachment_image(
							(int) $cnp_marker['id'],
							'thumbnail',
							false,
							array(
								'alt'      => '',
								'loading'  => 'lazy',
								'decoding' => 'async',
							)
						);
						?>
					</span>
				<?php endif; ?>

				<?php
				foreach ( $cnp_steps as $cnp_i => $cnp_step ) :
					$cnp_name = trim( (string) $cnp_step['cnp_step_name'] );
					$cnp_text = trim( (string) ( $cnp_step['cnp_step_text'] ?? '' ) );
					?>
					<li class="cn-proc-step dt-rev" style="--ni:<?php echo (int) $cnp_i; ?>">
						<span class="cn-proc-node" aria-hidden="true" style="--cnp-node-anim:cnp-node-<?php echo (int) $cnp_i; ?>;--cnp-node-delay:0s"></span>
						<div class="cn-proc-tx">
							<b><?php echo esc_html( $cnp_name ); ?></b>
							<?php if ( '' !== $cnp_text ) : ?>
								<p><?php echo wp_kses( $cnp_text, $cnp_kses ); ?></p>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>

		<?php if ( '' !== $cnp_note ) : ?>
			<?php
			// wp_kses_post: the approved copy hands off to the support and maintenance page,
			// so the anchor has to survive.
			?>
			<p class="cn-proc-note dt-rev"><?php echo wp_kses_post( $cnp_note ); ?></p>
		<?php endif; ?>
	</div>
</section>
