<?php
/**
 * Logistics — Build Cost Estimator ("Estimate Your Logistics Build Cost").
 *
 * Layout : lg_estimator (ACF Flexible Content)
 * Fields : lgest_eyebrow, lgest_heading, lgest_sub, lgest_bg, lgest_anchor
 * CSS    : assets/css/logistics.css (.lg-est-*)
 * JS     : assets/js/logistics.js (its own IIFE — see the "BUILD COST ESTIMATOR"
 *          section there)
 *
 * Vanilla-JS port of logistics-3.jsx's LGEstimator: 4 inputs (build type, connected
 * systems, capability toggles, role tier) → a build-cost range, a timeline range, the
 * base scope, and the top 3 cost drivers. The formula (LG_SYS base ranges, per-system
 * cost, per-capability cost, per-role-tier cost, timeline math) is ported verbatim from
 * that source, not reimplemented — see the JS file for the numbers. Fixed content, not
 * editor content, same reasoning as Construction-calculator.php: only the section's own
 * head (eyebrow/heading/sub/background) is a field.
 *
 * The static markup below renders the exact numbers the JS's own default state produces
 * (Dispatch layer, 3 connected systems, Real-time tracking on, 3–4 roles → $91K–$186K,
 * 6–9 mo), so the section is already correct before JS runs; the JS then recomputes live
 * on every input change using the same formula.
 *
 * Reuses tnb_lg_icon( 'check' ) for the capability-toggle checkmark and
 * tnb_lg_icon( 'arrow' ) for the CTA arrow — both already in the shared lg_* icon set
 * (inc/lg-helpers.php), no new icons added.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$lgest_eyebrow = (string) get_sub_field( 'lgest_eyebrow' );
$lgest_heading = (string) get_sub_field( 'lgest_heading' );
$lgest_sub     = (string) get_sub_field( 'lgest_sub' );
$lgest_bg      = get_sub_field( 'lgest_bg' );
$lgest_anchor  = sanitize_title( (string) get_sub_field( 'lgest_anchor' ) );

if ( '' === $lgest_heading ) {
	return;
}

$lgest_bg_url = ! empty( $lgest_bg['id'] ) ? (string) wp_get_attachment_image_url( (int) $lgest_bg['id'], 'large' ) : '';
?>
<section
	class="dt-section lg-est-sec<?php echo '' !== $lgest_bg_url ? ' lg-est-has-bg' : ''; ?>"
	<?php echo '' !== $lgest_anchor ? ' id="' . esc_attr( $lgest_anchor ) . '"' : ''; ?>
	<?php echo '' !== $lgest_bg_url ? ' style="--lg-est-bg:url(' . esc_url( $lgest_bg_url ) . ')"' : ''; ?>
>
	<?php if ( '' !== $lgest_bg_url ) : ?>
		<div class="lg-est-bg" aria-hidden="true"></div>
	<?php endif; ?>
	<div class="container">
		<div class="dt-head dt-center dt-rev">
			<?php if ( '' !== $lgest_eyebrow ) : ?>
				<div class="eyebrow"><?php echo esc_html( $lgest_eyebrow ); ?></div>
			<?php endif; ?>
			<h2 class="dt-h2"><?php echo esc_html( $lgest_heading ); ?></h2>
			<?php if ( '' !== $lgest_sub ) : ?>
				<p class="dt-sub"><?php echo esc_html( $lgest_sub ); ?></p>
			<?php endif; ?>
		</div>

		<div class="lg-est-module dt-rev" data-lg-est>
			<div class="lg-est-shell">
				<div class="lg-est-inputs">

					<div class="lg-est-field">
						<label>What are you building?</label>
						<div class="lg-est-seg" data-lg-est-seg="sys">
							<button type="button" data-lg-est-opt="driver">Driver app</button>
							<button type="button" class="on" data-lg-est-opt="dispatch">Dispatch layer</button>
							<button type="button" data-lg-est-opt="tracking">Tracking portal</button>
							<button type="button" data-lg-est-opt="tms">Custom TMS</button>
							<button type="button" data-lg-est-opt="marketplace">Freight marketplace</button>
						</div>
					</div>

					<div class="lg-est-field">
						<label>Connected systems (<span data-lg-est-systems-label>3</span>)</label>
						<div class="lg-est-slider">
							<input type="range" min="0" max="10" step="1" value="3" style="--pct:30%" data-lg-est-systems>
						</div>
						<p class="lg-est-help">TMS, ELD, telematics, ERP, accounting, carrier APIs, EDI.</p>
					</div>

					<div class="lg-est-field">
						<label>Capabilities</label>
						<div class="lg-est-toggles">
							<button type="button" class="lg-est-toggle on" data-lg-est-toggle="tracking">
								<span class="box"><?php echo tnb_lg_icon( 'check' ); ?></span>Real-time tracking
							</button>
							<button type="button" class="lg-est-toggle" data-lg-est-toggle="offline">
								<span class="box"><?php echo tnb_lg_icon( 'check' ); ?></span>Offline driver app
							</button>
							<button type="button" class="lg-est-toggle" data-lg-est-toggle="ai">
								<span class="box"><?php echo tnb_lg_icon( 'check' ); ?></span>AI features
							</button>
							<button type="button" class="lg-est-toggle" data-lg-est-toggle="iot">
								<span class="box"><?php echo tnb_lg_icon( 'check' ); ?></span>IoT &amp; sensors
							</button>
							<button type="button" class="lg-est-toggle" data-lg-est-toggle="migration">
								<span class="box"><?php echo tnb_lg_icon( 'check' ); ?></span>Data migration
							</button>
						</div>
					</div>

					<div class="lg-est-field">
						<label>Roles &amp; permissions</label>
						<div class="lg-est-seg" data-lg-est-seg="roles">
							<button type="button" data-lg-est-opt="small">2 roles</button>
							<button type="button" class="on" data-lg-est-opt="mid">3&ndash;4 roles</button>
							<button type="button" data-lg-est-opt="large">5+ roles</button>
						</div>
					</div>

				</div>

				<div class="lg-est-results">
					<div class="lg-est-hero">
						<span class="lg-est-hero-label">Estimated build cost</span>
						<span class="lg-est-hero-val" data-lg-est-hero-val>$91K &ndash; $186K</span>
						<span class="lg-est-hero-sub">A range for the first production release, not a quote. Budget year two &mdash; maintenance, monitoring, and a roadmap owner &mdash; from the start.</span>
					</div>
					<div class="lg-est-ab">
						<div class="lg-est-card">
							<span class="lg-est-card-label">Timeline to first release</span>
							<span class="lg-est-card-val" data-lg-est-timeline-val>6&ndash;9 mo</span>
						</div>
						<div class="lg-est-card">
							<span class="lg-est-card-label">Base scope</span>
							<span class="lg-est-card-val" style="font-size:20px" data-lg-est-base-val>Dispatch layer</span>
						</div>
					</div>
					<div class="lg-est-drivers">
						<p class="lg-est-drivers-t">Top drivers in your estimate</p>
						<div data-lg-est-drivers>
							<div class="lg-est-driver"><span class="lg-est-driver-rank">1</span><span>Dispatch layer base scope</span></div>
							<div class="lg-est-driver"><span class="lg-est-driver-rank">2</span><span>3 system integrations</span></div>
							<div class="lg-est-driver"><span class="lg-est-driver-rank">3</span><span>Real-time tracking</span></div>
						</div>
					</div>
					<span class="lg-est-tag">Ranges, not quotes. Bring the output to a scoping call and it becomes a scoped number.</span>
				</div>
			</div>
		</div>

		<div class="dt-rev" style="display:flex;justify-content:center;margin-top:36px">
			<a class="dt-btn dt-btn-primary" href="#lg-contact">Get an Estimate <span class="arr"><?php echo tnb_lg_icon( 'arrow' ); ?></span></a>
		</div>
	</div>
</section>
