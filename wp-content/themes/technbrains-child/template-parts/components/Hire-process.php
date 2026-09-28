<?php
/**
 * Component: Hire Developer — Hiring Process (HDProcess)
 * Layout   : hd_process (ACF Flexible Content)
 *
 * Fields:
 *   hdproc_eyebrow          — text
 *   hdproc_heading          — text   (plain part)
 *   hdproc_heading_accent   — text   (accent span)
 *   hdproc_sub              — textarea
 *   hdproc_steps            — repeater
 *     hdproc_step_num       — text   (e.g. "01", "02" …)
 *     hdproc_step_icon      — image  (array) — upload white icon PNG/SVG
 *     hdproc_step_title     — text
 *     hdproc_step_desc      — textarea
 *
 * Interaction:
 *   Scroll-based active step detection (matches viewport center).
 *   Clicking a step row also sets it active.
 *   Orbit SVG rotates by (activeIdx × -15°); active dot colours change.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/* ── 1. Fetch ACF data ─────────────────────────────────────────── */
$eyebrow        = get_sub_field( 'hdproc_eyebrow' )        ?: '';
$heading        = get_sub_field( 'hdproc_heading' )        ?: '';
$heading_accent = get_sub_field( 'hdproc_heading_accent' ) ?: '';
$sub            = get_sub_field( 'hdproc_sub' )            ?: '';

$steps     = [];
$steps_raw = get_sub_field( 'hdproc_steps' );
if ( is_array( $steps_raw ) ) {
	foreach ( $steps_raw as $step ) {
		$steps[] = [
			'num'   => $step['hdproc_step_num']   ?? '',
			'icon'  => $step['hdproc_step_icon']  ?? null,
			'title' => $step['hdproc_step_title'] ?? '',
			'desc'  => $step['hdproc_step_desc']  ?? '',
		];
	}
}

if ( empty( $steps ) ) {
	return;
}

/* ── 2. Unique section ID (supports multiple instances per page) ─ */
static $hdproc_uid = 0;
$hdproc_uid++;
$section_id = 'hd-process-' . $hdproc_uid;

/* ── 3. Orbit SVG geometry ─────────────────────────────────────── */
$svg_size = 420;
$cx       = $svg_size / 2; // 210
$cy       = $svg_size / 2; // 210
$r1       = 110;
$r2       = 155;
$r3       = 195;

$p2xy = static function ( $r, $deg ) use ( $cx, $cy ) {
	$rad = deg2rad( $deg );
	return [
		'x' => round( $cx + $r * cos( $rad ), 2 ),
		'y' => round( $cy + $r * sin( $rad ), 2 ),
	];
};

$orbit_dots = [
	[ 'r' => $r2, 'a' => -35,  'sz' => 10, 'fill' => true  ],
	[ 'r' => $r2, 'a' => 75,   'sz' => 7,  'fill' => false ],
	[ 'r' => $r3, 'a' => 20,   'sz' => 12, 'fill' => true  ],
	[ 'r' => $r3, 'a' => 135,  'sz' => 6,  'fill' => false ],
	[ 'r' => $r3, 'a' => -65,  'sz' => 8,  'fill' => true  ],
	[ 'r' => $r1, 'a' => 165,  'sz' => 5,  'fill' => false ],
	[ 'r' => $r2, 'a' => -115, 'sz' => 6,  'fill' => true  ],
	[ 'r' => $r3, 'a' => -145, 'sz' => 5,  'fill' => false ],
	[ 'r' => $r3, 'a' => 210,  'sz' => 8,  'fill' => true  ],
];

$orbit_squares = [
	[ 'r' => $r3 + 14, 'a' => -25,  'sz' => 7, 'filled' => true  ],
	[ 'r' => $r2 - 12, 'a' => 205,  'sz' => 6, 'filled' => false ],
	[ 'r' => $r3 + 18, 'a' => 165,  'sz' => 8, 'filled' => false ],
];

/* ── 5. Pass step data to JS ───────────────────────────────────── */
$steps_js = array_map( static function ( $s ) {
	return [ 'num' => $s['num'], 'title' => $s['title'] ];
}, $steps );
?>

<section class="hd-process" id="<?php echo esc_attr( $section_id ); ?>">
	<div class="hd-container">

		<div class="hd-process-head">
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

		<div class="hd-process-ref-layout">

			<!-- Left: orbit SVG -->
			<div class="hd-process-ref-left">
				<div class="hd-orbit-wrapper">

					<svg viewBox="0 0 <?php echo esc_attr( $svg_size ); ?> <?php echo esc_attr( $svg_size ); ?>"
						class="hd-orbit-svg"
						aria-hidden="true"
						focusable="false">

						<!-- Orbit rings -->
						<circle cx="<?php echo $cx; ?>" cy="<?php echo $cy; ?>" r="<?php echo $r3; ?>"
							fill="none" stroke="rgba(255,255,255,0.06)" stroke-width="1"/>
						<circle cx="<?php echo $cx; ?>" cy="<?php echo $cy; ?>" r="<?php echo $r2; ?>"
							fill="none" stroke="rgba(255,255,255,0.08)" stroke-width="1"/>
						<circle cx="<?php echo $cx; ?>" cy="<?php echo $cy; ?>" r="<?php echo $r1; ?>"
							fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1"
							stroke-dasharray="4 6"/>

						<?php foreach ( $orbit_dots as $di => $dot ) :
							$pt = $p2xy( $dot['r'], $dot['a'] );
							$hr = $dot['sz'] / 2;
							if ( $dot['fill'] ) : ?>
						<circle data-dot-i="<?php echo $di; ?>"
							cx="<?php echo $pt['x']; ?>" cy="<?php echo $pt['y']; ?>" r="<?php echo $hr; ?>"
							fill="rgba(255,255,255,0.22)"
							style="transition:fill 0.5s ease"/>
						<?php else : ?>
						<circle cx="<?php echo $pt['x']; ?>" cy="<?php echo $pt['y']; ?>" r="<?php echo $hr; ?>"
							fill="none" stroke="rgba(255,255,255,0.18)" stroke-width="1"/>
						<?php endif;
						endforeach; ?>

						<?php foreach ( $orbit_squares as $si => $sq ) :
							$pt  = $p2xy( $sq['r'], $sq['a'] );
							$hs  = $sq['sz'] / 2;
							$fill_val = ( $si === 0 ) ? 'rgba(255,255,255,0.25)' : 'none';
						?>
						<rect x="<?php echo $pt['x'] - $hs; ?>" y="<?php echo $pt['y'] - $hs; ?>"
							width="<?php echo $sq['sz']; ?>" height="<?php echo $sq['sz']; ?>"
							fill="<?php echo esc_attr( $fill_val ); ?>"
							stroke="rgba(255,255,255,0.18)" stroke-width="1"
							transform="rotate(45,<?php echo $pt['x']; ?>,<?php echo $pt['y']; ?>)"/>
						<?php endforeach; ?>

						<!-- Whisker lines -->
						<line x1="<?php echo $cx; ?>" y1="<?php echo $cy - $r1 + 8; ?>"
							x2="<?php echo $cx; ?>" y2="<?php echo $cy - $r3 + 4; ?>"
							stroke="rgba(255,255,255,0.04)" stroke-width="0.5"/>
						<line x1="<?php echo $cx + $r1 - 8; ?>" y1="<?php echo $cy; ?>"
							x2="<?php echo $cx + $r3 - 4; ?>" y2="<?php echo $cy; ?>"
							stroke="rgba(255,255,255,0.04)" stroke-width="0.5"/>

					</svg>

					<!-- Center label (does not rotate with SVG) -->
					<div class="hd-orbit-center">
						<div class="hd-orbit-center-inner">
							<span class="hd-orbit-center-step"><?php echo esc_html( $steps[0]['num'] ); ?></span>
							<span class="hd-orbit-center-title"><?php echo esc_html( $steps[0]['title'] ); ?></span>
						</div>
					</div>

				</div>
			</div>

			<!-- Right: steps list -->
			<div class="hd-process-ref-right">
				<?php foreach ( $steps as $si => $step ) : ?>
				<div class="hd-process-ref-step<?php echo $si === 0 ? ' is-active' : ''; ?>"
					data-step-idx="<?php echo esc_attr( $si ); ?>">

					<div class="hd-process-ref-part">
						<?php echo esc_html( $step['num'] ); ?>
					</div>

					<div class="hd-process-ref-icon">
						<?php if ( ! empty( $step['icon'] ) ) :
							echo wp_get_attachment_image(
								(int) $step['icon']['ID'],
								[ 18, 18 ],
								false,
								[ 'alt' => '', 'loading' => 'lazy' ]
							);
						endif; ?>
					</div>

					<div class="hd-process-ref-content">
						<?php if ( $step['title'] ) : ?>
						<h3 class="hd-process-ref-title"><?php echo esc_html( $step['title'] ); ?></h3>
						<?php endif; ?>
						<?php if ( $step['desc'] ) : ?>
						<p class="hd-process-ref-desc"><?php echo esc_html( $step['desc'] ); ?></p>
						<?php endif; ?>
					</div>

				</div>
				<?php endforeach; ?>
			</div>

		</div>
	</div>
</section>

<script>
(function () {
	var sec      = document.getElementById( <?php echo wp_json_encode( $section_id ); ?> );
	var stepsData = <?php echo wp_json_encode( array_values( $steps_js ) ); ?>;
	if ( ! sec ) return;

	var orbitSvg    = sec.querySelector( '.hd-orbit-svg' );
	var stepEls     = sec.querySelectorAll( '.hd-process-ref-step' );
	var centerStep  = sec.querySelector( '.hd-orbit-center-step' );
	var centerTitle = sec.querySelector( '.hd-orbit-center-title' );
	var fillDots    = sec.querySelectorAll( '[data-dot-i]' );
	var activeIdx   = 0;

	function setActive( idx ) {
		if ( idx === activeIdx && sec.querySelector( '.hd-process-ref-step.is-active' ) ) return;
		activeIdx = idx;

		/* Rotate orbit */
		orbitSvg.style.transform = 'rotate(' + ( activeIdx * -15 ) + 'deg)';

		/* Update fill dots */
		fillDots.forEach( function ( dot ) {
			var di = parseInt( dot.getAttribute( 'data-dot-i' ), 10 );
			dot.setAttribute( 'fill',
				di <= activeIdx ? 'rgba(236,28,36,0.65)' : 'rgba(255,255,255,0.22)'
			);
		} );

		/* Update center label */
		if ( stepsData[ activeIdx ] ) {
			centerStep.textContent  = stepsData[ activeIdx ].num;
			centerTitle.textContent = stepsData[ activeIdx ].title;
		}

		/* Update step row classes */
		stepEls.forEach( function ( el, i ) {
			el.classList.toggle( 'is-active', i === activeIdx );
			el.classList.toggle( 'is-past',   i < activeIdx );
		} );
	}

	/* Scroll detection — closest step to viewport midpoint */
	function onScroll() {
		var focus    = window.innerHeight * 0.5;
		var best     = 0;
		var bestDist = Infinity;
		stepEls.forEach( function ( el, i ) {
			var r = el.getBoundingClientRect();
			var d = Math.abs( ( r.top + r.height / 2 ) - focus );
			if ( d < bestDist ) { bestDist = d; best = i; }
		} );
		if ( best !== activeIdx ) setActive( best );
	}

	/* Click handler */
	stepEls.forEach( function ( el, i ) {
		el.addEventListener( 'click', function () { setActive( i ); } );
	} );

	window.addEventListener( 'scroll', onScroll, { passive: true } );
	setActive( 0 );
} )();
</script>
