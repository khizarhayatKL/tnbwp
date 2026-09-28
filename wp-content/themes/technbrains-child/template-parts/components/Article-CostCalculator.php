<?php
/**
 * Article template family — Three-year cost calculator (interactive widget).
 *
 * Layout : art_cost_calculator (ACF Flexible Content)
 * Fields : art_anchor only — every label/help string here is fixed copy matching the source
 *          prototype exactly (cost-app.jsx's CostCalculator), not editor content. Headless,
 *          matching Article-DiagSet.php's convention — the H2 + lead paragraph come from a
 *          preceding art_prose row.
 * CSS    : assets/css/article.css (.cc, .cc-*)
 * JS     : assets/js/article-toc.js (its own IIFE, independent of the TOC logic in that same
 *          file — see the "COST CALCULATOR" section there).
 *
 * Renders pre-computed for the source's own default inputs (quote $24,000, implementation
 * $8,000, 0% renewal, no internal cost) so the page is correct even before JS runs; the JS then
 * recomputes live on every input change using the exact same formula (ported from
 * cost-app.jsx's CostCalculator, not reimplemented from scratch).
 *
 * The calculator's own closing CTA (cost-app.jsx wraps an <InlineCTA> in .cc-cta-wrap, shown only
 * once inputs are valid) is reproduced here as plain, fixed .art-cta-inline.art-cta-solid markup
 * — same visual family as Article-InlineCta.php — rather than trying to invoke that component
 * from inside this one; JS only toggles its `hidden` attribute.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_anchor = sanitize_title( (string) get_sub_field( 'art_anchor' ) );
$art_svg    = tnb_art_svg_html();
?>
<div class="cc"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<div class="cc-grid">
		<div class="cc-inputs">
			<div class="cc-notice">
				<?php echo wp_kses( tnb_art_icon( 'info' ), $art_svg ); ?>
				<span>Example figures are prefilled to demonstrate the calculator. Replace them with the numbers from your quote.</span>
			</div>

			<div class="cc-field">
				<label class="cc-label" for="cc-quote">Year-one quote, annual</label>
				<span class="cc-help">The subscription figure on the quote, before extras.</span>
				<div class="cc-inputwrap">
					<span class="cc-cur">$</span>
					<input id="cc-quote" class="cc-input" type="text" inputmode="decimal" value="24,000" aria-describedby="cc-quote-err">
				</div>
				<span class="cc-err" id="cc-quote-err" hidden>Enter a positive quote amount to model.</span>
			</div>

			<div class="cc-field">
				<label class="cc-label" for="cc-impl">Implementation and data migration</label>
				<span class="cc-help">One-time. Enter 0 if bundled or waived.</span>
				<div class="cc-inputwrap">
					<span class="cc-cur">$</span>
					<input id="cc-impl" class="cc-input" type="text" inputmode="decimal" value="8,000" aria-describedby="cc-impl-err">
				</div>
				<span class="cc-err" id="cc-impl-err" hidden>Enter 0 if implementation is bundled or waived.</span>
			</div>

			<div class="cc-field">
				<label class="cc-label" for="cc-ratenum">Annual renewal increase</label>
				<span class="cc-help">Use the cap written into your contract. If no cap is stated, compare several scenarios before budgeting.</span>
				<div class="cc-scenarios" role="group" aria-label="Renewal rate scenarios">
					<button type="button" class="cc-scen" data-pct="0" aria-pressed="true">0% no escalation</button>
					<button type="button" class="cc-scen" data-pct="5" aria-pressed="false">5% scenario</button>
					<button type="button" class="cc-scen" data-pct="10" aria-pressed="false">10% scenario</button>
					<button type="button" class="cc-scen" data-pct="15" aria-pressed="false">15% stress test</button>
				</div>
				<div class="cc-rate">
					<input class="cc-slider" type="range" min="0" max="30" step="0.5" value="0" aria-label="Annual renewal increase percentage" style="--fill:0%">
					<div class="cc-ratenum">
						<input id="cc-ratenum" type="text" inputmode="decimal" value="0" aria-label="Annual renewal increase, percent">
						<span class="cc-pct">%</span>
					</div>
				</div>
			</div>

			<button type="button" class="cc-addinternal" aria-expanded="false">
				<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true" focusable="false"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
				Add internal running cost
			</button>
			<div class="cc-field" id="cc-internal-field" style="margin-top:14px;display:none">
				<label class="cc-label" for="cc-internal">Internal time cost per year</label>
				<span class="cc-help">Whoever configures, maintains and trains on the system. Hours/week &times; 52 &times; loaded rate.</span>
				<div class="cc-inputwrap">
					<span class="cc-cur">$</span>
					<input id="cc-internal" class="cc-input" type="text" inputmode="decimal" placeholder="0">
				</div>
			</div>

			<div class="cc-included">
				<span class="cc-included-h">What this models</span>
				<ul>
					<li><?php echo wp_kses( tnb_art_icon( 'check' ), $art_svg ); ?>Year-one subscription plus one-time implementation</li>
					<li><?php echo wp_kses( tnb_art_icon( 'check' ), $art_svg ); ?>Renewal escalation compounded across three years</li>
					<li><?php echo wp_kses( tnb_art_icon( 'check' ), $art_svg ); ?>Optional internal time cost of running the system</li>
				</ul>
			</div>
		</div>

		<div class="cc-outputs" aria-live="polite">
			<div class="cc-placeholder" id="cc-placeholder" hidden>
				<?php echo wp_kses( tnb_art_icon( 'gauge' ), $art_svg ); ?>
				<p id="cc-placeholder-text">Enter your year-one quote to model the three-year cost.</p>
			</div>

			<div class="cc-results" id="cc-results">
				<div class="cc-hero">
					<div class="cc-hero-k">Three-year total</div>
					<div class="cc-hero-v" id="cc-hero-v">$80,000</div>
					<div class="cc-hero-sub" id="cc-hero-sub">Year one $32,000, year two $24,000, year three $24,000.</div>
				</div>

				<div class="cc-gap">
					<div class="cc-gap-k">Cost above three times the annual quote</div>
					<div class="cc-gap-v" id="cc-gap-v">$8,000</div>
					<div class="cc-gap-sub" id="cc-gap-sub">A flat three-year subscription would be $72,000. Implementation, internal costs and renewal escalation add $8,000.</div>
					<span class="cc-gap-pct" id="cc-gap-pct">11.1% higher than a flat three-year subscription</span>
				</div>

				<div class="cc-bars-wrap">
					<div class="cc-bars-h">Year by year</div>
					<div class="cc-bars" id="cc-bars">
						<div class="cc-bar"><span class="cc-bar-val">$32,000</span><div class="cc-bar-fill" style="height:100%"></div><span class="cc-bar-lbl">Year 1</span></div>
						<div class="cc-bar"><span class="cc-bar-val">$24,000</span><div class="cc-bar-fill" style="height:75%"></div><span class="cc-bar-lbl">Year 2</span></div>
						<div class="cc-bar"><span class="cc-bar-val">$24,000</span><div class="cc-bar-fill" style="height:75%"></div><span class="cc-bar-lbl">Year 3</span></div>
					</div>
					<ul class="cc-sr" id="cc-bars-sr">
						<li>Year 1: $32,000</li>
						<li>Year 2: $24,000</li>
						<li>Year 3: $24,000</li>
					</ul>
					<div class="cc-bars-cap">Year one includes one-time costs. Years two and three show how the renewal rate you selected affects the subscription.</div>
					<span class="cc-bars-tag">Calculated from the numbers you entered.</span>
				</div>

				<div class="cc-insight" id="cc-insight">
					<?php echo wp_kses( tnb_art_icon( 'pulse' ), $art_svg ); ?>
					<span id="cc-insight-text">At the 0% renewal rate selected, implementation costs add $8,000 over three years.</span>
				</div>
				<div class="cc-standing">A model, not a quote. Renewal terms vary by vendor and contract.</div>

				<div class="cc-bench">
					<span class="cc-bench-k"><?php echo wp_kses( tnb_art_icon( 'info' ), $art_svg ); ?>Market reference</span>
					<p>For context, construction firms in an Intuit survey reported spending an average of about <b>$58,000 a year across their full software stack</b>, with the typical firm running around ten applications. <a href="https://www.intuit.com/enterprise/blog/guide/construction-digital-transformation-survey/" target="_blank" rel="noopener nofollow">Intuit, 2025</a></p>
					<p class="cc-bench-note">This is a market reference for a whole company&rsquo;s software spend, not an estimate of what your firm or any single product should cost.</p>
				</div>
			</div>
		</div>
	</div>

	 
</div>
