<?php
/**
 * Component: Hire Developer — Engagement Models
 * Layout   : hd_engage (ACF Flexible Content)
 *
 * Accordion list on left + animated SVG diagram on right.
 * First model is open by default. Hover or click opens a row.
 *
 * Fields:
 *   hdeg_eyebrow        — text
 *   hdeg_heading        — text   (plain)
 *   hdeg_heading_accent — text   (accent span)
 *   hdeg_sub            — textarea
 *   hdeg_models         — repeater
 *     hdeg_model_num       — text   (e.g. "01")
 *     hdeg_model_title     — text
 *     hdeg_model_desc      — textarea
 *     hdeg_model_bullets   — textarea (one bullet per line)
 *     hdeg_model_best      — text
 *     hdeg_model_cta_text  — text   (default "Learn more")
 *     hdeg_model_cta_url   — url    (empty = popup)
 *     hdeg_model_svg       — select (staff_aug|dedicated_team)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$eyebrow        = get_sub_field( 'hdeg_eyebrow' )        ?: '';
$heading        = get_sub_field( 'hdeg_heading' )        ?: 'Choose the Right Model for';
$heading_accent = get_sub_field( 'hdeg_heading_accent' ) ?: 'Your Team';
$sub            = get_sub_field( 'hdeg_sub' )            ?: '';

$models = [];
if ( have_rows( 'hdeg_models' ) ) {
	while ( have_rows( 'hdeg_models' ) ) {
		the_row();
		$bullets_raw = get_sub_field( 'hdeg_model_bullets' ) ?: '';
		$bullets     = array_filter( array_map( 'trim', explode( "\n", $bullets_raw ) ) );
		$models[]    = [
			'num'      => get_sub_field( 'hdeg_model_num' )      ?: '',
			'title'    => get_sub_field( 'hdeg_model_title' )    ?: '',
			'desc'     => get_sub_field( 'hdeg_model_desc' )     ?: '',
			'bullets'  => $bullets,
			'best'     => get_sub_field( 'hdeg_model_best' )     ?: '',
			'cta_text' => get_sub_field( 'hdeg_model_cta_text' ) ?: 'Learn more',
			'cta_url'  => get_sub_field( 'hdeg_model_cta_url' )  ?: '',
			'svg'      => get_sub_field( 'hdeg_model_svg' )      ?: '',
		];
	}
}

if ( empty( $models ) ) {
	$models = [
		[
			'num'     => '01',
			'title'   => 'Staff Augmentation',
			'desc'    => 'Embed senior engineers directly into your existing team, working within your process, tools, and sprint cycles. You retain full control over execution while we ensure consistent access to pre-vetted talent.',
			'bullets' => [ 'Onboard in 48–72 hours', 'Scale team size by sprint needs', 'Inside your tools and workflows', 'Senior-only engineering talent' ],
			'best'    => 'Ongoing development, scaling teams, filling specific skill gaps',
			'cta_text'=> 'Learn more',
			'cta_url' => '',
			'svg'     => 'staff_aug',
		],
		[
			'num'     => '02',
			'title'   => 'Dedicated Team',
			'desc'    => 'A fully assembled engineering unit operating as an extension of your product function, including developers and technical leadership. The team runs its own release process while staying aligned with your roadmap.',
			'bullets' => [ 'End-to-end product ownership', 'Dedicated PM + engineers + QA', 'Aligned to your sprint cadence', 'Scalable team structure' ],
			'best'    => 'New product builds, parallel workstreams, scaling product velocity',
			'cta_text'=> 'Learn more',
			'cta_url' => '',
			'svg'     => 'dedicated_team',
		],
	];
}

/* Inline SVG diagrams — keyed by model svg type or fallback by index */
if ( ! function_exists( 'tnb_hdeg_svg' ) ) :
function tnb_hdeg_svg( string $type, int $idx ): string {
	$resolved = $type ?: ( $idx === 0 ? 'staff_aug' : 'dedicated_team' );
	if ( $resolved === 'staff_aug' ) {
		return '<svg viewBox="0 0 480 320" class="hd-ev-svg" aria-hidden="true">
			<text x="60" y="28" font-size="10" font-weight="600" fill="rgba(255,255,255,0.45)" letter-spacing="0.12em" text-anchor="middle">YOUR TEAM</text>
			<circle cx="35" cy="80" r="22" fill="rgba(255,255,255,0.06)" stroke="rgba(255,255,255,0.14)" stroke-width="1.5"/>
			<circle cx="35" cy="72" r="6" fill="rgba(255,255,255,0.3)"/>
			<path d="M25 86 Q35 93 45 86" stroke="rgba(255,255,255,0.3)" stroke-width="1.5" fill="none"/>
			<circle cx="85" cy="80" r="22" fill="rgba(255,255,255,0.06)" stroke="rgba(255,255,255,0.14)" stroke-width="1.5"/>
			<circle cx="85" cy="72" r="6" fill="rgba(255,255,255,0.3)"/>
			<path d="M75 86 Q85 93 95 86" stroke="rgba(255,255,255,0.3)" stroke-width="1.5" fill="none"/>
			<line x1="150" y1="30" x2="150" y2="130" stroke="rgba(255,255,255,0.08)" stroke-width="1" stroke-dasharray="4 4"/>
			<text x="320" y="28" font-size="10" font-weight="600" fill="#EC1C24" letter-spacing="0.12em" text-anchor="middle">TECHNBRAINS ENGINEERS</text>
			<circle cx="260" cy="80" r="22" fill="rgba(236,28,36,0.10)" stroke="#EC1C24" stroke-width="1.5" opacity="0" class="hd-ev-pop" style="--d:0.2s"/>
			<circle cx="260" cy="72" r="6" fill="#EC1C24" opacity="0" class="hd-ev-pop" style="--d:0.2s"/>
			<circle cx="320" cy="80" r="22" fill="rgba(236,28,36,0.10)" stroke="#EC1C24" stroke-width="1.5" opacity="0" class="hd-ev-pop" style="--d:0.5s"/>
			<circle cx="320" cy="72" r="6" fill="#EC1C24" opacity="0" class="hd-ev-pop" style="--d:0.5s"/>
			<circle cx="380" cy="80" r="22" fill="rgba(236,28,36,0.10)" stroke="#EC1C24" stroke-width="1.5" opacity="0" class="hd-ev-pop" style="--d:0.8s"/>
			<circle cx="380" cy="72" r="6" fill="#EC1C24" opacity="0" class="hd-ev-pop" style="--d:0.8s"/>
			<rect x="30" y="190" width="420" height="40" rx="8" fill="rgba(255,255,255,0.03)" stroke="rgba(255,255,255,0.08)" stroke-width="1"/>
			<text x="240" y="215" font-size="11" font-weight="600" fill="rgba(255,255,255,0.5)" text-anchor="middle" letter-spacing="0.10em">YOUR SPRINT CYCLE</text>
			<rect x="30" y="250" width="420" height="6" rx="3" fill="rgba(255,255,255,0.06)"/>
			<rect x="30" y="250" width="0" height="6" rx="3" fill="#EC1C24" class="hd-ev-bar-fill" opacity="0.8"/>
			<text x="30" y="275" font-size="9" fill="rgba(255,255,255,0.4)" letter-spacing="0.08em">CAPACITY</text>
			<text x="320" y="275" font-size="10" fill="#EC1C24" font-weight="700">+67%</text>
		</svg>';
	}
	/* dedicated_team */
	return '<svg viewBox="0 0 480 320" class="hd-ev-svg" aria-hidden="true">
		<text x="240" y="28" font-size="10" font-weight="600" fill="#EC1C24" letter-spacing="0.12em" text-anchor="middle">DEDICATED ENGINEERING UNIT</text>
		<circle cx="240" cy="120" r="60" fill="rgba(236,28,36,0.04)" stroke="rgba(236,28,36,0.20)" stroke-width="1" stroke-dasharray="6 3"/>
		<circle cx="240" cy="80" r="18" fill="rgba(236,28,36,0.12)" stroke="#EC1C24" stroke-width="1.5" opacity="0" class="hd-ev-pop" style="--d:0.1s"/>
		<text x="240" y="84" font-size="8" font-weight="700" fill="#EC1C24" text-anchor="middle" opacity="0" class="hd-ev-pop" style="--d:0.1s">PM</text>
		<circle cx="195" cy="130" r="18" fill="rgba(236,28,36,0.08)" stroke="rgba(236,28,36,0.35)" stroke-width="1.5" opacity="0" class="hd-ev-pop" style="--d:0.3s"/>
		<text x="195" y="134" font-size="8" font-weight="700" fill="rgba(255,255,255,0.7)" text-anchor="middle" opacity="0" class="hd-ev-pop" style="--d:0.3s">DEV</text>
		<circle cx="285" cy="130" r="18" fill="rgba(236,28,36,0.08)" stroke="rgba(236,28,36,0.35)" stroke-width="1.5" opacity="0" class="hd-ev-pop" style="--d:0.5s"/>
		<text x="285" y="134" font-size="8" font-weight="700" fill="rgba(255,255,255,0.7)" text-anchor="middle" opacity="0" class="hd-ev-pop" style="--d:0.5s">DEV</text>
		<circle cx="240" cy="160" r="18" fill="rgba(236,28,36,0.08)" stroke="rgba(236,28,36,0.35)" stroke-width="1.5" opacity="0" class="hd-ev-pop" style="--d:0.7s"/>
		<text x="240" y="164" font-size="8" font-weight="700" fill="rgba(255,255,255,0.7)" text-anchor="middle" opacity="0" class="hd-ev-pop" style="--d:0.7s">QA</text>
		<line x1="240" y1="185" x2="240" y2="220" stroke="rgba(255,255,255,0.12)" stroke-width="1" stroke-dasharray="4 3"/>
		<rect x="120" y="220" width="240" height="36" rx="8" fill="rgba(255,255,255,0.03)" stroke="rgba(255,255,255,0.08)" stroke-width="1"/>
		<text x="240" y="243" font-size="11" font-weight="600" fill="rgba(255,255,255,0.5)" text-anchor="middle" letter-spacing="0.10em">ALIGNED TO YOUR ROADMAP</text>
		<rect x="120" y="272" width="240" height="6" rx="3" fill="rgba(255,255,255,0.06)"/>
		<rect x="120" y="272" width="0" height="6" rx="3" fill="#EC1C24" class="hd-ev-bar-fill" opacity="0.8"/>
		<text x="120" y="296" font-size="9" fill="rgba(255,255,255,0.4)" letter-spacing="0.08em">RELEASE VELOCITY</text>
		<text x="310" y="296" font-size="10" fill="#EC1C24" font-weight="700">3× FASTER</text>
	</svg>';
}
endif;

static $hdeg_uid = 0;
$hdeg_uid++;
$sec_id = 'hd-engage-' . $hdeg_uid;
?>
<section class="hd-engage-v2" id="<?php echo esc_attr( $sec_id ); ?>">
	<div class="hd-container">

		<div class="hd-section-head">
			<?php if ( $eyebrow ) : ?>
			<div class="hd-eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
			<?php endif; ?>

			<?php if ( $heading || $heading_accent ) : ?>
			<h2 class="hd-h2">
				<?php echo esc_html( $heading ); ?>
				<?php if ( $heading_accent ) : ?>
				<span class="hd-accent"><?php echo esc_html( $heading_accent ); ?></span>
				<?php endif; ?>
			</h2>
			<?php endif; ?>

			<?php if ( $sub ) : ?>
			<p class="hd-sub"><?php echo esc_html( $sub ); ?></p>
			<?php endif; ?>
		</div>

		<div class="hd-ev-layout">

			<!-- LEFT: Accordion -->
			<div class="hd-ev-accordion" role="tablist">
				<?php foreach ( $models as $mi => $model ) :
					$open   = ( $mi === 0 );
					$has_url = ! empty( $model['cta_url'] );
				?>
				<div
					class="hd-ev-row<?php echo $open ? ' is-open' : ''; ?>"
					data-ev-row="<?php echo esc_attr( $mi ); ?>">
					<button
						type="button"
						class="hd-ev-row-head"
						aria-expanded="<?php echo $open ? 'true' : 'false'; ?>"
						data-ev-trigger="<?php echo esc_attr( $mi ); ?>">
						<span class="hd-ev-row-num"><?php echo esc_html( $model['num'] ); ?></span>
						<span class="hd-ev-row-title"><?php echo esc_html( $model['title'] ); ?></span>
						<span class="hd-ev-row-chev" aria-hidden="true">
							<svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
								<path d="M4 6 L8 10 L12 6"/>
							</svg>
						</span>
					</button>
					<div class="hd-ev-row-body">
						<div class="hd-ev-row-body-inner">
							<p class="hd-ev-row-desc"><?php echo esc_html( $model['desc'] ); ?></p>

							<?php if ( ! empty( $model['bullets'] ) ) : ?>
							<ul class="hd-ev-row-bullets">
								<?php foreach ( $model['bullets'] as $bullet ) : ?>
								<li>
									<span class="hd-ev-bullet-dot" aria-hidden="true"></span>
									<?php echo esc_html( $bullet ); ?>
								</li>
								<?php endforeach; ?>
							</ul>
							<?php endif; ?>

							<?php if ( $model['best'] ) : ?>
							<div class="hd-ev-row-best">
								<strong>Best for:</strong> <?php echo esc_html( $model['best'] ); ?>
							</div>
							<?php endif; ?>

							<?php if ( $model['cta_text'] ) : ?>
								<?php if ( $has_url ) : ?>
								<a class="hd-ev-row-cta" href="<?php echo esc_url( $model['cta_url'] ); ?>">
									<?php echo esc_html( $model['cta_text'] ); ?>
									<span aria-hidden="true">→</span>
								</a>
								<?php else : ?>
								<button type="button" class="hd-ev-row-cta tnb-popup-trigger">
									<?php echo esc_html( $model['cta_text'] ); ?>
									<span aria-hidden="true">→</span>
								</button>
								<?php endif; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

			<!-- RIGHT: SVG Stage -->
			<div class="hd-ev-stage" aria-hidden="true">
				<?php foreach ( $models as $mi => $model ) : ?>
				<div
					class="hd-ev-stage-frame"
					data-ev-stage="<?php echo esc_attr( $mi ); ?>"
					<?php echo $mi !== 0 ? 'style="display:none"' : ''; ?>>
					<div class="hd-ev-stage-meta">
						<span class="hd-ev-stage-num"><?php echo esc_html( $model['num'] ); ?></span>
						<span class="hd-ev-stage-title"><?php echo esc_html( $model['title'] ); ?></span>
					</div>
					<?php echo tnb_hdeg_svg( $model['svg'], $mi ); // hardcoded safe SVGs ?>
				</div>
				<?php endforeach; ?>
			</div>

		</div>
	</div>
</section>
<script>
(function() {
	var sec = document.getElementById(<?php echo wp_json_encode( $sec_id ); ?>);
	if (!sec) return;

	var rows   = sec.querySelectorAll('[data-ev-row]');
	var stages = sec.querySelectorAll('[data-ev-stage]');
	var btns   = sec.querySelectorAll('[data-ev-trigger]');

	function activate(idx) {
		rows.forEach(function(row) {
			var i    = parseInt(row.dataset.evRow, 10);
			var open = i === idx;
			row.classList.toggle('is-open', open);
			var btn = row.querySelector('[data-ev-trigger]');
			if (btn) btn.setAttribute('aria-expanded', open ? 'true' : 'false');
		});
		stages.forEach(function(st) {
			var i = parseInt(st.dataset.evStage, 10);
			st.style.display = i === idx ? '' : 'none';
		});
	}

	btns.forEach(function(btn) {
		btn.addEventListener('click', function() {
			activate(parseInt(btn.dataset.evTrigger, 10));
		});
	});

	rows.forEach(function(row) {
		row.addEventListener('mouseenter', function() {
			activate(parseInt(row.dataset.evRow, 10));
		});
	});
})();
</script>
