<?php
/**
 * Component: Hire Developer Hero
 * Layout   : hd_hero (ACF Flexible Content)
 *
 * Dark hero with animated orbital canvas on the right and content on the left.
 *
 * Fields:
 *   hdhero_heading         — text   (plain part of h1)
 *   hdhero_heading_accent  — text   (red-accent part of h1)
 *   hdhero_sub             — textarea
 *   hdhero_cta1_text       — text
 *   hdhero_cta1_url        — url
 *   hdhero_cta2_text       — text
 *   hdhero_cta2_url        — url
 *   hdhero_center_logo     — image (array, SVG/PNG center logo)
 *   hdhero_orbit_avatars   — repeater
 *     hdhero_orbit_img     — image (array)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$heading        = get_sub_field( 'hdhero_heading' )        ?: 'Hire Developers Who Ship';
$heading_accent = get_sub_field( 'hdhero_heading_accent' ) ?: 'Products at Scale';
$sub            = get_sub_field( 'hdhero_sub' )            ?: '';
$cta1_text      = get_sub_field( 'hdhero_cta1_text' )      ?: 'Hire Developers';
$cta1_url       = get_sub_field( 'hdhero_cta1_url' )       ?: '';
$cta2_text      = get_sub_field( 'hdhero_cta2_text' )      ?: 'Talk to an Expert';
$cta2_url       = get_sub_field( 'hdhero_cta2_url' )       ?: '';

$center_logo     = get_sub_field( 'hdhero_center_logo' );
$center_logo_url = ! empty( $center_logo['url'] ) ? esc_url( $center_logo['url'] ) : '';

$orbit_avatars = [];
if ( have_rows( 'hdhero_orbit_avatars' ) ) {
	while ( have_rows( 'hdhero_orbit_avatars' ) ) {
		the_row();
		$img = get_sub_field( 'hdhero_orbit_img' );
		if ( ! empty( $img['url'] ) ) {
			$orbit_avatars[] = esc_url( $img['url'] );
		}
	}
}

static $hdhero_uid = 0;
$hdhero_uid++;
$canvas_id = 'hd-orbit-canvas-' . $hdhero_uid;
$wrap_id   = 'hd-orbit-wrap-' . $hdhero_uid;
?>
<section class="hd-hero">
	<div class="hd-hero-grid hd-container">
		<div class="hd-hero-content">
			<h1>
				<?php echo esc_html( $heading ); ?>
				<?php if ( $heading_accent ) : ?>
				<span class="hd-hero-accent"><?php echo esc_html( $heading_accent ); ?></span>
				<?php endif; ?>
			</h1>
			<?php if ( $sub ) : ?>
			<p class="hd-hero-sub"><?php echo esc_html( $sub ); ?></p>
			<?php endif; ?>
			<div class="hd-hero-actions">
				<?php if ( $cta1_text ) : ?>
					<?php if ( $cta1_url ) : ?>
					<a class="hd-btn hd-btn-primary" href="<?php echo esc_url( $cta1_url ); ?>">
						<?php echo esc_html( $cta1_text ); ?>
					</a>
					<?php else : ?>
					<button class="hd-btn hd-btn-primary tnb-popup-trigger" type="button">
						<?php echo esc_html( $cta1_text ); ?>
					</button>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ( $cta2_text ) : ?>
					<?php if ( $cta2_url ) : ?>
					<a class="hd-btn hd-btn-secondary" href="<?php echo esc_url( $cta2_url ); ?>">
						<?php echo esc_html( $cta2_text ); ?>
					</a>
					<?php else : ?>
					<button class="hd-btn hd-btn-secondary tnb-popup-trigger" type="button">
						<?php echo esc_html( $cta2_text ); ?>
					</button>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>

		<div class="hd-orbit-wrap" id="<?php echo esc_attr( $wrap_id ); ?>">
			<canvas class="hd-orbit-canvas" id="<?php echo esc_attr( $canvas_id ); ?>"></canvas>
		</div>
	</div>
</section>
<script>
(function() {
	var AVATARS_SRC     = <?php echo wp_json_encode( $orbit_avatars ); ?>;
	var CENTER_LOGO_SRC = <?php echo wp_json_encode( $center_logo_url ); ?>;

	var ORBIT_CONFIG = {
		rings: [
			{ radius: 110, speed: 0.12, dir:  1, stroke: 'rgba(255,255,255,0.18)', width: 1   },
			{ radius: 195, speed: 0.08, dir: -1, stroke: 'rgba(236,28,36,0.28)',   width: 1   },
			{ radius: 290, speed: 0.06, dir:  1, stroke: 'rgba(255,255,255,0.12)', width: 1   },
			{ radius: 380, speed: 0.045,dir: -1, stroke: 'rgba(236,28,36,0.18)',   width: 1   },
			{ radius: 470, speed: 0.03, dir:  1, stroke: 'rgba(255,255,255,0.08)', width: 0.8 },
			{ radius: 570, speed: 0.025,dir: -1, stroke: 'rgba(236,28,36,0.10)',   width: 0.7 },
			{ radius: 680, speed: 0.018,dir:  1, stroke: 'rgba(255,255,255,0.05)', width: 0.6 }
		],
		avatars: [
			[0,   0, 0, 44], [0, 120, 1, 44], [0, 240, 2, 44],
			[1,  30, 3, 52], [1, 110, 4, 52], [1, 200, 5, 52], [1, 300, 6, 52],
			[2,  15, 7, 58], [2,  80, 8, 58], [2, 150, 9, 58], [2, 220,10, 58], [2, 300,11, 58],
			[3,  40, 0, 50], [3, 130, 3, 50], [3, 230, 6, 50], [3, 320, 9, 50],
			[5, 155, 2, 46], [5, 260, 7, 46],
			[6, 190,10, 42]
		],
		nodes: [
			[0,  60,'red',5], [0, 180,'white',4],
			[1,  70,'red',5], [1, 160,'white',4], [1, 260,'red',4],
			[2,  45,'white',4],[2, 120,'red',5],  [2, 195,'white',4],[2, 270,'red',4],
			[3,  10,'red',4], [3,  85,'white',3],[3, 180,'red',4],  [3, 270,'white',3],
			[4,  20,'red',4], [4,  75,'white',3],[4, 140,'red',3],  [4, 210,'white',3],
			[4, 280,'red',4], [4, 340,'white',3],
			[5,  50,'red',4], [5, 120,'white',3],[5, 210,'red',3],  [5, 310,'white',3],
			[6,  80,'red',3], [6, 150,'white',3],[6, 240,'red',3],  [6, 330,'white',3]
		]
	};

	var wrap   = document.getElementById(<?php echo wp_json_encode( $wrap_id ); ?>);
	var canvas = document.getElementById(<?php echo wp_json_encode( $canvas_id ); ?>);
	if (!wrap || !canvas) return;

	var ctx  = canvas.getContext('2d');
	var DPR, W, H;
	var t0   = performance.now();
	var raf  = 0;

	/* Pre-load avatar images */
	var imgs = AVATARS_SRC.length
		? AVATARS_SRC.map(function(src) {
			var img = new Image();
			img.crossOrigin = 'anonymous';
			img.src = src;
			return img;
		})
		: [];

	/* Pre-load center logo */
	var logoImg = null;
	if (CENTER_LOGO_SRC) {
		logoImg = new Image();
		logoImg.crossOrigin = 'anonymous';
		logoImg.src = CENTER_LOGO_SRC;
	}

	function resize() {
		var rect      = wrap.getBoundingClientRect();
		var viewportW = window.innerWidth;
		var extraRight = Math.max(0, viewportW - rect.right);
		W = Math.max(200, rect.width + extraRight);
		H = Math.max(200, rect.height + 240);
		DPR = Math.min(window.devicePixelRatio || 1, 2);
		canvas.width  = Math.floor(W * DPR);
		canvas.height = Math.floor(H * DPR);
		canvas.style.width  = W + 'px';
		canvas.style.height = H + 'px';
		ctx.setTransform(DPR, 0, 0, DPR, 0, 0);
	}

	function getAngle(ringIdx, startDeg, t) {
		var ring  = ORBIT_CONFIG.rings[ringIdx];
		var speed = ring.speed * ring.dir;
		return startDeg * Math.PI / 180 + speed * t;
	}

	function drawFrame(now) {
		var t = (now - t0) / 1000;
		ctx.clearRect(0, 0, W, H);

		var cx = W - 60;
		var cy = H * 0.5;

		/* Core glow */
		var glow = ctx.createRadialGradient(cx, cy, 10, cx, cy, 160);
		glow.addColorStop(0,   'rgba(236,28,36,0.25)');
		glow.addColorStop(0.4, 'rgba(236,28,36,0.08)');
		glow.addColorStop(1,   'rgba(236,28,36,0)');
		ctx.fillStyle = glow;
		ctx.beginPath();
		ctx.arc(cx, cy, 160, 0, Math.PI * 2);
		ctx.fill();

		/* Rings */
		ORBIT_CONFIG.rings.forEach(function(ring) {
			ctx.beginPath();
			ctx.arc(cx, cy, ring.radius, 0, Math.PI * 2);
			ctx.strokeStyle = ring.stroke;
			ctx.lineWidth   = ring.width;
			ctx.stroke();
		});

		/* Nodes */
		ORBIT_CONFIG.nodes.forEach(function(n) {
			var ri = n[0], startA = n[1], color = n[2], size = n[3];
			var ang = getAngle(ri, startA, t);
			var r   = ORBIT_CONFIG.rings[ri].radius;
			var x   = cx + r * Math.cos(ang);
			var y   = cy + r * Math.sin(ang);

			var ng = ctx.createRadialGradient(x, y, 0, x, y, size * 4);
			if (color === 'red') {
				ng.addColorStop(0, 'rgba(236,28,36,0.7)');
				ng.addColorStop(1, 'rgba(236,28,36,0)');
			} else {
				ng.addColorStop(0, 'rgba(255,255,255,0.6)');
				ng.addColorStop(1, 'rgba(255,255,255,0)');
			}
			ctx.fillStyle = ng;
			ctx.beginPath();
			ctx.arc(x, y, size * 4, 0, Math.PI * 2);
			ctx.fill();

			ctx.fillStyle = color === 'red' ? '#EC1C24' : '#FFFFFF';
			ctx.beginPath();
			ctx.arc(x, y, size, 0, Math.PI * 2);
			ctx.fill();
		});

		/* Avatars */
		ORBIT_CONFIG.avatars.forEach(function(av) {
			var ri = av[0], startA = av[1], faceIdx = av[2], size = av[3];
			var ang  = getAngle(ri, startA, t);
			var r    = ORBIT_CONFIG.rings[ri].radius;
			var x    = cx + r * Math.cos(ang);
			var y    = cy + r * Math.sin(ang);
			var half = size / 2;

			var img  = imgs.length ? imgs[faceIdx % imgs.length] : null;
			var ready = img && img.complete && img.naturalWidth > 0;

			ctx.save();
			ctx.shadowColor   = 'rgba(0,0,0,0.5)';
			ctx.shadowBlur    = 16;
			ctx.shadowOffsetY = 4;

			ctx.beginPath();
			ctx.arc(x, y, half, 0, Math.PI * 2);
			ctx.closePath();
			ctx.clip();

			if (ready) {
				ctx.drawImage(img, x - half, y - half, size, size);
			} else {
				ctx.fillStyle = '#1A1718';
				ctx.fillRect(x - half, y - half, size, size);
			}

			ctx.fillStyle = 'rgba(10,10,20,0.15)';
			ctx.fillRect(x - half, y - half, size, size);
			ctx.globalCompositeOperation = 'saturation';
			ctx.fillStyle = 'rgba(128,128,128,0.35)';
			ctx.fillRect(x - half, y - half, size, size);
			ctx.globalCompositeOperation = 'source-over';
			ctx.restore();

			ctx.beginPath();
			ctx.arc(x, y, half, 0, Math.PI * 2);
			ctx.strokeStyle = 'rgba(255,255,255,0.15)';
			ctx.lineWidth   = 1.5;
			ctx.stroke();

			ctx.beginPath();
			ctx.arc(x, y, half + 3, 0, Math.PI * 2);
			ctx.strokeStyle = 'rgba(236,28,36,0.12)';
			ctx.lineWidth   = 1;
			ctx.stroke();
		});

		/* Central logo mark */
		ctx.beginPath();
		ctx.arc(cx, cy, 52, 0, Math.PI * 2);
		ctx.fillStyle = 'rgba(236,28,36,0.12)';
		ctx.fill();

		var logoGrad = ctx.createRadialGradient(cx, cy, 0, cx, cy, 46);
		logoGrad.addColorStop(0, '#1A1718');
		logoGrad.addColorStop(1, '#0A0A0B');
		ctx.beginPath();
		ctx.arc(cx, cy, 46, 0, Math.PI * 2);
		ctx.fillStyle = logoGrad;
		ctx.fill();
		ctx.strokeStyle = 'rgba(255,255,255,0.12)';
		ctx.lineWidth   = 1;
		ctx.stroke();

		/* Center logo (ACF) — falls back to TB text */
		if (logoImg && logoImg.complete && logoImg.naturalWidth > 0) {
			var logoSize = 56;
			var logoHalf = logoSize / 2;
			ctx.save();
			ctx.beginPath();
			ctx.arc(cx, cy, 46, 0, Math.PI * 2);
			ctx.clip();
			ctx.drawImage(logoImg, cx - logoHalf, cy - logoHalf, logoSize, logoSize);
			ctx.restore();
		} else {
			ctx.fillStyle = '#EC1C24';
			ctx.beginPath();
			ctx.arc(cx, cy, 18, 0, Math.PI * 2);
			ctx.fill();
			ctx.fillStyle    = '#FFFFFF';
			ctx.font         = 'bold 15px Outfit, system-ui, sans-serif';
			ctx.textAlign    = 'center';
			ctx.textBaseline = 'middle';
			ctx.fillText('TB', cx, cy);
		}
		

		raf = requestAnimationFrame(drawFrame);
	}

	resize();
	window.addEventListener('resize', resize);
	raf = requestAnimationFrame(drawFrame);
})();
</script>
