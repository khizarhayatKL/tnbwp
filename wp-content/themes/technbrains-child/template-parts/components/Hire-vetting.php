<?php
/**
 * Component: Hire Developer — Vetting Pipeline (VetScanner)
 * Layout   : hd_vetting (ACF Flexible Content)
 *
 * Scroll-triggered scanning pipeline animation. On entry, a candidate card
 * travels through 6 vetting stations. Clearance stamps accumulate on the right.
 *
 * Fields:
 *   hdvt_eyebrow        — text
 *   hdvt_heading        — text   (plain)
 *   hdvt_heading_accent — text   (accent span)
 *   hdvt_sub            — textarea
 *   hdvt_badge          — text   (badge below sub, e.g. "Only the top 3% pass…")
 *   hdvt_rider_name     — text   (name on the moving card, default "Senior Candidate")
 *   hdvt_rider_photo    — image  (avatar on the card)
 *   hdvt_steps          — repeater
 *     hdvt_step_num     — text   (e.g. "01")
 *     hdvt_step_label   — text   (e.g. "Identity")
 *     hdvt_step_status  — text   (e.g. "Verifying")
 *     hdvt_step_icon    — select (shield|terminal|git|task|msg|globe)
 *     hdvt_step_title   — text
 *     hdvt_step_desc    — textarea
 *     hdvt_step_checks  — text   (comma-separated, e.g. "ID Verified, GitHub Verified")
 *     hdvt_step_pool    — number
 *     hdvt_step_pass    — number
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$eyebrow        = get_sub_field( 'hdvt_eyebrow' )        ?: '';
$heading        = get_sub_field( 'hdvt_heading' )        ?: '';
$heading_accent = get_sub_field( 'hdvt_heading_accent' ) ?: '';
$sub            = get_sub_field( 'hdvt_sub' )            ?: '';
$badge          = get_sub_field( 'hdvt_badge' )          ?: '';
$rider_name     = get_sub_field( 'hdvt_rider_name' )     ?: '';
$rider_photo    = get_sub_field( 'hdvt_rider_photo' );

$steps = [];
if ( have_rows( 'hdvt_steps' ) ) {
	while ( have_rows( 'hdvt_steps' ) ) {
		the_row();
		$checks_raw = get_sub_field( 'hdvt_step_checks' ) ?: '';
		$steps[] = [
			'num'    => get_sub_field( 'hdvt_step_num' )    ?: '',
			'label'  => get_sub_field( 'hdvt_step_label' )  ?: '',
			'status' => get_sub_field( 'hdvt_step_status' ) ?: '',
			'icon'   => get_sub_field( 'hdvt_step_icon' )   ?: 'shield',
			'title'  => get_sub_field( 'hdvt_step_title' )  ?: '',
			'desc'   => get_sub_field( 'hdvt_step_desc' )   ?: '',
			'checks' => array_filter( array_map( 'trim', explode( ',', $checks_raw ) ) ),
			'pool'   => (int) ( get_sub_field( 'hdvt_step_pool' ) ?: 100 ),
			'pass'   => (int) ( get_sub_field( 'hdvt_step_pass' ) ?: 0 ),
		];
	}
}

$total_steps = count( $steps );

/* Icon SVG helper */
if ( ! function_exists( 'tnb_hdvt_icon_svg' ) ) :
function tnb_hdvt_icon_svg( string $key ): string {
	$map = [
		'shield'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2l8 4v6c0 5-3.5 9-8 10-4.5-1-8-5-8-10V6l8-4z"/></svg>',
		'terminal' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2"/><polyline points="6 9 9 12 6 15"/><line x1="11" y1="15" x2="17" y2="15"/></svg>',
		'git'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="6" cy="6" r="2.5"/><circle cx="6" cy="18" r="2.5"/><circle cx="18" cy="12" r="2.5"/><path d="M6 8.5v7"/><path d="M6 12c0-3 3-5 6-5h3.5"/></svg>',
		'task'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="4" width="16" height="16" rx="2"/><path d="M9 9l2 2 4-4M9 15l2 2 4-4"/></svg>',
		'msg'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 5h18v12H7l-4 4z"/><path d="M7 9h10M7 12h6"/></svg>',
		'globe'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a14 14 0 0 1 0 18M12 3a14 14 0 0 0 0 18"/></svg>',
		'crown'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 18l1.5-10L9 13l3-9 3 9 4.5-5L21 18z"/><path d="M3 21h18"/></svg>',
	];
	return $map[ $key ] ?? $map['shield'];
}
endif;

static $hdvt_uid = 0;
$hdvt_uid++;
$sec_id = 'hd-vetting-' . $hdvt_uid;

if ( empty( $steps ) ) {
	return;
}

/* First step data for initial render */
$first = $steps[0];
?>
<section class="hd-vetting" id="<?php echo esc_attr( $sec_id ); ?>">
	<div class="hd-container">

		<div class="hd-section-head center">
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

			<?php if ( $badge ) : ?>
			<div class="hd-vetting-badge">
				<span><?php echo esc_html( $badge ); ?></span>
			</div>
			<?php endif; ?>
		</div>

		<div class="vp-variant-area">
			<div class="vs-shell">

				<!-- Pipeline track -->
				<div class="vs-pipeline">
					<div class="vs-track">
						<div class="vs-track-fill" id="<?php echo esc_attr( $sec_id ); ?>-fill" style="width:0%"></div>
					</div>

					<!-- Rider card -->
					<div class="vs-rider" id="<?php echo esc_attr( $sec_id ); ?>-rider" style="--vs-step:0">
						<div class="vs-rider-avatar">
							<?php if ( ! empty( $rider_photo['id'] ) ) : ?>
								<?php echo wp_get_attachment_image( $rider_photo['id'], 'thumbnail', false, [ 'alt' => esc_attr( $rider_name ), 'loading' => 'lazy' ] ); ?>
							<?php else : ?>
							<div style="width:100%;height:100%;background:#231F20;border-radius:50%;"></div>
							<?php endif; ?>
						</div>
						<div class="vs-rider-info">
							<span class="vs-rider-name"><?php echo esc_html( $rider_name ); ?></span>
							<span class="vs-rider-status" id="<?php echo esc_attr( $sec_id ); ?>-status"><?php echo esc_html( $first['status'] ); ?></span>
						</div>
						<div class="vs-scan-beam" id="<?php echo esc_attr( $sec_id ); ?>-beam"></div>
					</div>

					<!-- Stations -->
					<div class="vs-stations">
						<?php foreach ( $steps as $si => $step ) : ?>
						<div class="vs-station<?php echo $si === 0 ? ' is-curr' : ''; ?>" data-station="<?php echo esc_attr( $si ); ?>" role="button" tabindex="0" aria-label="<?php echo esc_attr( 'Show step: ' . $step['label'] ); ?>">
							<div class="vs-station-post">
								<?php echo tnb_hdvt_icon_svg( $step['icon'] ); // hardcoded safe SVGs ?>
								<?php if ( $si === 0 ) : ?>
								<span class="vs-station-seal"></span>
								<?php endif; ?>
							</div>
							<div class="vs-station-label"><?php echo esc_html( $step['label'] ); ?></div>
							<div class="vs-station-inline-detail">
								<div class="vs-detail-tag"><?php echo esc_html( $step['num'] ); ?> · <?php echo esc_html( $step['title'] ); ?></div>
								<p class="vs-detail-desc"><?php echo esc_html( $step['desc'] ); ?></p>
								<div class="vs-detail-checks">
									<?php foreach ( $step['checks'] as $ck ) : ?>
									<span class="vp-check"><span class="vp-check-dot"></span><?php echo esc_html( $ck ); ?></span>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>

				<!-- Bottom: detail + stamps -->
				<div class="vs-bottom">
					<div class="vs-detail" id="<?php echo esc_attr( $sec_id ); ?>-detail">
						<div class="vs-detail-tag"><?php echo esc_html( $first['num'] ); ?> · <?php echo esc_html( $first['title'] ); ?></div>
						<p class="vs-detail-desc"><?php echo esc_html( $first['desc'] ); ?></p>
						<div class="vs-detail-checks">
							<?php foreach ( $first['checks'] as $ck ) : ?>
							<span class="vp-check"><span class="vp-check-dot"></span><?php echo esc_html( $ck ); ?></span>
							<?php endforeach; ?>
						</div>
					</div>

					<div class="vs-stamps">
						<div class="vs-stamps-label">Clearances obtained</div>
						<div class="vs-stamps-row">
							<?php foreach ( $steps as $si => $step ) : ?>
							<div class="vs-stamp<?php echo $si === 0 ? ' is-earned' : ''; ?>" data-stamp="<?php echo esc_attr( $si ); ?>">
								<?php echo tnb_hdvt_icon_svg( $step['icon'] ); ?>
							</div>
							<?php endforeach; ?>
						</div>
						<div class="vs-approved-badge" id="<?php echo esc_attr( $sec_id ); ?>-badge" style="display:none">
							<?php echo tnb_hdvt_icon_svg( 'crown' ); ?> Top 3% Approved
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
</section>
<script>
(function() {
	var SEC    = document.getElementById(<?php echo wp_json_encode( $sec_id ); ?>);
	if (!SEC) return;

	var STEPS  = <?php echo wp_json_encode( $steps ); ?>;
	var TOTAL  = STEPS.length;
	var STEP_DURATION = 1800;

	var fill     = document.getElementById(<?php echo wp_json_encode( $sec_id . '-fill' ); ?>);
	var rider    = document.getElementById(<?php echo wp_json_encode( $sec_id . '-rider' ); ?>);
	var rStatus  = document.getElementById(<?php echo wp_json_encode( $sec_id . '-status' ); ?>);
	var beam     = document.getElementById(<?php echo wp_json_encode( $sec_id . '-beam' ); ?>);
	var detail   = document.getElementById(<?php echo wp_json_encode( $sec_id . '-detail' ); ?>);
	var badge    = document.getElementById(<?php echo wp_json_encode( $sec_id . '-badge' ); ?>);
	var stations = SEC.querySelectorAll('.vs-station');
	var stamps   = SEC.querySelectorAll('.vs-stamp');

	function buildChecks(checks) {
		return checks.map(function(c) {
			return '<span class="vp-check"><span class="vp-check-dot"></span>' + escHtml(c) + '</span>';
		}).join('');
	}
	function escHtml(s) {
		return s.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
	}

	function update(active) {
		var s    = STEPS[active];
		var pct  = active === 0 ? 0 : (active / (TOTAL - 1) * 100);
		var done = active >= TOTAL - 1;

		/* Track fill */
		if (fill) fill.style.width = pct + '%';

		/* Rider position + status */
		if (rider) rider.style.setProperty('--vs-step', active);
		if (rStatus) { rStatus.textContent = s.status; }

		/* Scan beam visibility */
		if (beam) beam.style.display = done ? 'none' : '';

		/* Stations */
		stations.forEach(function(st, i) {
			st.classList.toggle('is-past', i < active);
			st.classList.toggle('is-curr', i === active);
			var seal = st.querySelector('.vs-station-seal');
			if (i < active) {
				if (!seal) {
					seal = document.createElement('span');
					seal.className = 'vs-station-seal';
					st.querySelector('.vs-station-post').appendChild(seal);
				}
			} else if (seal && i !== active) {
				seal.remove();
			}
		});

		/* Detail panel */
		if (detail) {
			detail.innerHTML =
				'<div class="vs-detail-tag">' + escHtml(s.num) + ' · ' + escHtml(s.title) + '</div>' +
				'<p class="vs-detail-desc">' + escHtml(s.desc) + '</p>' +
				'<div class="vs-detail-checks">' + buildChecks(s.checks) + '</div>';
		}

		/* Stamps */
		stamps.forEach(function(st, i) {
			st.classList.toggle('is-earned', i <= active);
		});

		/* Approved badge */
		if (badge) badge.style.display = done ? '' : 'none';
	}

	var hasRun = false;
	var timer  = null;

	function runOnce() {
		if (hasRun) return;
		hasRun = true;
		var step = 0;
		update(0);
		timer = setInterval(function() {
			step++;
			if (step >= TOTAL) { clearInterval(timer); return; }
			update(step);
		}, STEP_DURATION);
	}

	function goToStation(st) {
		if (timer) clearInterval(timer);
		hasRun = true;
		update(parseInt(st.dataset.station, 10));
	}

	stations.forEach(function(st) {
		st.addEventListener('click', function() { goToStation(st); });
		st.addEventListener('keydown', function(e) {
			if (e.key === 'Enter' || e.key === ' ') {
				e.preventDefault();
				goToStation(st);
			}
		});
	});

	if (typeof IntersectionObserver !== 'undefined') {
		var io = new IntersectionObserver(function(entries) {
			entries.forEach(function(e) { if (e.isIntersecting) runOnce(); });
		}, { threshold: 0.2 });
		io.observe(SEC);
	} else {
		runOnce();
	}
})();
</script>
