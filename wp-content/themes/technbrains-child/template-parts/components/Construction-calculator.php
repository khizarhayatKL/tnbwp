<?php
/**
 * Construction Software — Fragmentation cost calculator ("What Does Your Stack Cost Per Year?").
 *
 * Layout : cn_calculator (ACF Flexible Content)
 * Fields : cnc_eyebrow, cnc_heading, cnc_sub, cnc_bg, cnc_anchor
 * CSS    : assets/css/construction.css (.cn-calc-*)
 * JS     : assets/js/construction.js (its own IIFE — see the "FRAGMENTATION COST CALCULATOR"
 *          section there)
 *
 * Ported from construction-calc.jsx's CNCalculator, "build spec v4 (lean)": 4 inputs → 3 numbers
 * → 1 verdict tier → 1 CTA → 1 reference line. Every label, help string, tier threshold and
 * verdict copy below is fixed content matching that spec exactly, not editor content — only the
 * section's own head (eyebrow/heading/sub/background) is a field, same as every other cn_*
 * section's head. The static markup below renders the spec's own default inputs (5 systems,
 * $50,000/yr, 12 hrs/week, $55/hr) pre-computed, so the page is correct even before JS runs; the
 * JS then recomputes live on every input change using the exact same formula.
 *
 * Diagnoses only — the spec is explicit that this never shows a build price, savings figure,
 * payback period, or percentage improvement, only the three input-derived numbers and a tier
 * verdict.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cnc_eyebrow = (string) get_sub_field( 'cnc_eyebrow' );
$cnc_heading = (string) get_sub_field( 'cnc_heading' );
$cnc_sub     = (string) get_sub_field( 'cnc_sub' );
$cnc_bg      = get_sub_field( 'cnc_bg' );
$cnc_anchor  = sanitize_title( (string) get_sub_field( 'cnc_anchor' ) );

if ( '' === $cnc_heading ) {
	return;
}

$cnc_bg_url = ! empty( $cnc_bg['id'] ) ? (string) wp_get_attachment_image_url( (int) $cnc_bg['id'], 'large' ) : '';
$cnc_arrow  = tnb_cn_icon( 'arrow' );
?>
<section
	class="dt-section cn-calc-sec<?php echo '' !== $cnc_bg_url ? ' cn-calc-has-bg' : ''; ?>"
	<?php echo '' !== $cnc_anchor ? ' id="' . esc_attr( $cnc_anchor ) . '"' : ''; ?>
	<?php echo '' !== $cnc_bg_url ? ' style="--cn-calc-bg:url(' . esc_url( $cnc_bg_url ) . ')"' : ''; ?>
>
	<?php if ( '' !== $cnc_bg_url ) : ?>
		<div class="cn-calc-bg" aria-hidden="true"></div>
	<?php endif; ?>
	<div class="container">
		<div class="dt-head dt-center dt-rev">
			<?php if ( '' !== $cnc_eyebrow ) : ?>
				<div class="eyebrow"><?php echo esc_html( $cnc_eyebrow ); ?></div>
			<?php endif; ?>
			<h2 class="dt-h2"><?php echo esc_html( $cnc_heading ); ?></h2>
			<?php if ( '' !== $cnc_sub ) : ?>
				<p class="dt-sub"><?php echo esc_html( $cnc_sub ); ?></p>
			<?php endif; ?>
		</div>

		<div class="cn-calc-module dt-rev" id="cn-calc-module">
			<div class="cn-calc-shell">
				<div class="cn-calc-inputs">
					<div class="cn-calc-field">
						<label class="cn-calc-label" for="cnc-systems">How many separate systems do you run?</label>
						<div class="cn-calc-slider">
							<div class="cn-calc-slider-val" id="cnc-systems-val">5</div>
							<input type="range" id="cnc-systems" min="2" max="15" step="1" value="5" style="--pct:23.076923076923077%">
						</div>
						<p class="cn-calc-help">Anything your team logs into separately, including spreadsheets that matter.</p>
					</div>

					<div class="cn-calc-field">
						<label class="cn-calc-label" for="cnc-spend">What do you spend on software per year?</label>
						<div class="cn-calc-currency">
							<span class="cn-calc-cur-sign">$</span>
							<input type="text" id="cnc-spend" inputmode="numeric" placeholder="e.g. 50000" value="50,000">
						</div>
						<p class="cn-calc-help" id="cnc-spend-help">A ballpark is fine.</p>
					</div>

					<div class="cn-calc-field">
						<label class="cn-calc-label" for="cnc-hours">Hours a week moving data between systems</label>
						<div class="cn-calc-slider">
							<div class="cn-calc-slider-val" id="cnc-hours-val">12 hrs</div>
							<input type="range" id="cnc-hours" min="0" max="120" step="1" value="12" style="--pct:10%">
						</div>
						<p class="cn-calc-help">Re-entering, exporting, reconciling, rebuilding the same report.</p>
					</div>

					<div class="cn-calc-field">
						<label class="cn-calc-label" for="cnc-rate">Loaded hourly rate</label>
						<div class="cn-calc-currency">
							<span class="cn-calc-cur-sign">$</span>
							<input type="text" id="cnc-rate" inputmode="numeric" value="55">
						</div>
						<p class="cn-calc-help" id="cnc-rate-help">Wage plus burden. Salary &divide; 2,080 is close enough.</p>
					</div>
				</div>

				<div class="cn-calc-results">
					<div class="cn-calc-hero-card">
						<span class="cn-calc-hero-label">Software + manual data work per year</span>
						<span class="cn-calc-hero-val" id="cnc-hero-val">$84,300</span>
						<span class="cn-calc-hero-sub" id="cnc-hero-sub">Software spend plus employee time spent moving data by hand.</span>
					</div>

					<div class="cn-calc-ab-grid">
						<div class="cn-calc-card">
							<span class="cn-calc-card-label">Annual cost of manual data movement</span>
							<span class="cn-calc-card-val" id="cnc-manual-val">$34,300</span>
							<span class="cn-calc-card-sub" id="cnc-manual-sub">About 0.3 FTE of team capacity.</span>
						</div>
						<div class="cn-calc-card">
							<span class="cn-calc-card-label">Cost per system per year</span>
							<span class="cn-calc-card-val" id="cnc-persystem-val">$16,900</span>
							<span class="cn-calc-card-sub" id="cnc-persystem-sub">An average across your 5 systems, not the cost of any one.</span>
						</div>
					</div>
					<span class="cn-calc-tag">From the numbers you entered. Assumes a 40-hour week.</span>
				</div>
			</div>

			<div class="cn-calc-divider" aria-hidden="true"></div>
			<div class="cn-calc-verdict tier-2" id="cnc-verdict">
				<span class="cn-calc-verdict-flag">A screening guide, not a financial recommendation. Thresholds are ours.</span>
				<div class="cn-calc-verdict-body">
					<h3 id="cnc-verdict-h">Your systems may need better connections.</h3>
					<p id="cnc-verdict-p">Before replacing a platform, check whether your highest-volume handoffs can be handled between the tools you already own.</p>
				</div>
				<div class="cn-calc-lead" id="cnc-lead">
					<p class="cn-calc-lead-intro">Asad will tell you where he would start, including if the answer is that you do not need a build.</p>
					<button type="button" class="dt-btn dt-btn-primary tnb-popup-trigger" id="cnc-cta-btn">Get an integration opinion <span class="arr"><?php echo wp_kses( $cnc_arrow, tnb_cn_svg_html() ); ?></span></button>
				</div>
			</div>
		</div>
	</div>
</section>
