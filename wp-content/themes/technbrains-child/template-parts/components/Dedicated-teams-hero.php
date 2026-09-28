<?php
/**
 * Dedicated Teams — Hero with the hiring orbit.
 *
 * Layout : dt_hero (ACF Flexible Content)
 * Fields : dth_eyebrow, dth_h1, dth_lead,
 *          dth_points{ dth_point }, dth_cta_primary, dth_cta_ghost,
 *          dth_roles{ dth_role_label, dth_role_photo },
 *          dth_status_building, dth_status_ready
 * CSS    : assets/css/components.css (.dt-hero, .dt-hire*)
 * JS     : assets/js/components.js ([data-dth-orbit])
 *
 * A <section>, not the <header> the prototype used, for the same reason as the
 * Software Outsourcing hero: inside <main> a <header> is not the banner landmark,
 * and the site header already owns it. Only .dt-hero is selected, so nothing moves.
 *
 * Slot positions are geometry, not content. The approved design places eight slots
 * on a circle of radius 38 centred at 50/50, starting at twelve o'clock — so those
 * eight coordinates are kept verbatim to stay pixel-identical, and any other count
 * is distributed evenly around the same circle rather than breaking the layout.
 * Spokes are a straight line from the hub drawn as a quadratic through the
 * midpoint, which is exactly what the approved build's dtArc(bow = 0) produces. *
 * The approved build hides every trailing button arrow globally (its NO-BTN-ARROWS
 * tweak sets `.dt-btn .arr { display: none !important }` plus the same for
 * `a[class*="btn"] > span:last-child > svg`), so the arrow is not part of the
 * approved render. It is left out of the markup rather than shipped and then hidden
 * with !important — same appearance, less DOM, no specificity fight.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$dth_eyebrow  = (string) get_sub_field( 'dth_eyebrow' );
/**
 * One authored h1 rather than a plain half plus an accent half, matching sa_hero
 * and so_hero. tnb_accent_heading() (functions.php) sanitises to <br> + <span
 * class> and stamps the accent class onto a bare <span>, so the editor marks the
 * red words without typing a class name and can accent a phrase mid-sentence.
 */
$dth_heading  = tnb_accent_heading( get_sub_field( 'dth_h1' ) );
$dth_lead     = (string) get_sub_field( 'dth_lead' );
$dth_points   = (array) get_sub_field( 'dth_points' );
$dth_cta_1    = get_sub_field( 'dth_cta_primary' );
$dth_cta_2    = get_sub_field( 'dth_cta_ghost' );
$dth_roles    = (array) get_sub_field( 'dth_roles' );
$dth_building = (string) get_sub_field( 'dth_status_building' );
$dth_ready    = (string) get_sub_field( 'dth_status_ready' );

if ( '' === $dth_heading && '' === $dth_lead ) {
	return;
}

$dth_kses = array(
	'br'   => array(),
	'span' => array( 'class' => true ),
);

if ( ! function_exists( 'tnb_dth_icon' ) ) {
	function tnb_dth_icon( string $name ): string {
		$icons = array(
			'check' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>',
			'arrow' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>',
			'plus'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true"><path d="M12 6v12M6 12h12"/></svg>',
			'team'  => '<svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="8" r="3"/><path d="M3 20c0-3.3 2.7-6 6-6s6 2.7 6 6"/><circle cx="17" cy="7" r="2.4"/><path d="M15.5 13.4c2.7.5 4.5 2.7 4.5 5.6"/></svg>',
		);

		return $icons[ $name ] ?? '';
	}
}

/**
 * Slot centres, in percent of the orbit box.
 *
 * @param int $total Number of slots.
 * @return array<int, array{x: float, y: float}>
 */
if ( ! function_exists( 'tnb_dth_ring' ) ) {
	function tnb_dth_ring( int $total ): array {
		// The approved eight, kept exactly as designed.
		$approved = array(
			array( 'x' => 50, 'y' => 12 ),
			array( 'x' => 77, 'y' => 23 ),
			array( 'x' => 88, 'y' => 50 ),
			array( 'x' => 77, 'y' => 77 ),
			array( 'x' => 50, 'y' => 88 ),
			array( 'x' => 23, 'y' => 77 ),
			array( 'x' => 12, 'y' => 50 ),
			array( 'x' => 23, 'y' => 23 ),
		);

		if ( 8 === $total ) {
			return $approved;
		}

		$ring = array();

		for ( $i = 0; $i < $total; $i++ ) {
			$angle  = deg2rad( -90 + ( $i * ( 360 / max( 1, $total ) ) ) );
			$ring[] = array(
				'x' => round( 50 + ( 38 * cos( $angle ) ), 1 ),
				'y' => round( 50 + ( 38 * sin( $angle ) ), 1 ),
			);
		}

		return $ring;
	}
}

$dth_svg_kses = array(
	'svg'      => array(
		'viewbox'         => true,
		'fill'            => true,
		'stroke'          => true,
		'stroke-width'    => true,
		'stroke-linecap'  => true,
		'stroke-linejoin' => true,
		'aria-hidden'     => true,
		'class'           => true,
	),
	'circle'   => array( 'cx' => true, 'cy' => true, 'r' => true, 'class' => true, 'style' => true ),
	'path'     => array( 'd' => true, 'class' => true ),
	'line'     => array( 'x1' => true, 'y1' => true, 'x2' => true, 'y2' => true ),
	'polyline' => array( 'points' => true ),
);

$dth_total = count( $dth_roles );
$dth_ring  = tnb_dth_ring( $dth_total );

$dth_building = '' !== $dth_building ? $dth_building : __( 'Building Your Delivery Team', 'technbrains-child' );
$dth_ready    = '' !== $dth_ready ? $dth_ready : __( 'Your Dedicated Team Is Ready', 'technbrains-child' );
?>
<section class="dt-hero">
	<div class="dt-hero-bg" aria-hidden="true"></div>
	<div class="dt-hero-grid-layout">
		<div class="dt-hero-content">
		    <?php tnb_breadcrumb_html(); ?>
			<?php if ( '' !== $dth_eyebrow ) : ?>
				<div class="eyebrow"><?php echo esc_html( $dth_eyebrow ); ?></div>
			<?php endif; ?>
			<?php if ( '' !== $dth_heading ) : ?>
				<h1><?php echo $dth_heading; // Sanitised by tnb_accent_heading(). ?></h1>
			<?php endif; ?>
			<?php if ( '' !== $dth_lead ) : ?>
				<p class="dt-hero-lead"><?php echo wp_kses( $dth_lead, $dth_kses ); ?></p>
			<?php endif; ?>
			<?php if ( $dth_points ) : ?>
				<div class="dt-hero-points">
					<?php foreach ( $dth_points as $dth_row ) : ?>
						<?php $dth_point = (string) ( $dth_row['dth_point'] ?? '' ); ?>
						<?php if ( '' === $dth_point ) { continue; } ?>
						<div class="dt-hero-point"><span class="ck" aria-hidden="true"><?php
							echo wp_kses( tnb_dth_icon( 'check' ), $dth_svg_kses );
						?></span><?php echo esc_html( $dth_point ); ?></div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<?php
			// URL "#tnb-popup" renders the CTA as a contact-form popup trigger
			// (popup.js delegates on .tnb-popup-trigger) instead of a link.
			$dth_render_cta = static function ( $cta, $class ) {
				if ( ! is_array( $cta ) || empty( $cta['url'] ) || '' === (string) ( $cta['title'] ?? '' ) ) {
					return;
				}
				if ( '#tnb-popup' === $cta['url'] ) {
					echo '<button type="button" class="' . esc_attr( $class ) . ' tnb-popup-trigger">'
						. esc_html( (string) $cta['title'] ) . '</button>';
					return;
				}
				echo '<a class="' . esc_attr( $class ) . '" href="' . esc_url( $cta['url'] ) . '"'
					. ( ! empty( $cta['target'] ) ? ' target="' . esc_attr( $cta['target'] ) . '" rel="noopener"' : '' )
					. '>' . esc_html( (string) $cta['title'] ) . '</a>';
			};
			?>
			<?php if ( ( is_array( $dth_cta_1 ) && ! empty( $dth_cta_1['url'] ) ) || ( is_array( $dth_cta_2 ) && ! empty( $dth_cta_2['url'] ) ) ) : ?>
				<div class="dt-hero-actions">
					<?php $dth_render_cta( $dth_cta_1, 'dt-btn dt-btn-primary' ); ?>
					<?php $dth_render_cta( $dth_cta_2, 'dt-btn dt-btn-ghost' ); ?>
				</div>
			<?php endif; ?>
		</div>

		<?php if ( $dth_roles ) : ?>
			<div class="dt-hero-visual dt-hv-orbit" aria-hidden="true">
				<div class="dt-hire" data-dth-orbit>
					<svg class="dt-hire-spokes" viewBox="0 0 100 100" aria-hidden="true">
						<?php
						foreach ( $dth_ring as $dth_i => $dth_pos ) :
							// Straight hub-to-slot line, expressed as a quadratic through the
							// midpoint — the approved dtArc() with no bow.
							$dth_mx = ( 50 + $dth_pos['x'] ) / 2;
							$dth_my = ( 50 + $dth_pos['y'] ) / 2;
							$dth_d  = sprintf(
								'M50 50 Q%s %s %s %s',
								number_format( $dth_mx, 1, '.', '' ),
								number_format( $dth_my, 1, '.', '' ),
								$dth_pos['x'],
								$dth_pos['y']
							);
							?>
							<path class="dt-hire-spoke" data-dth-spoke d="<?php echo esc_attr( $dth_d ); ?>"></path>
						<?php endforeach; ?>
					</svg>

					<?php foreach ( $dth_roles as $dth_i => $dth_role ) : ?>
						<?php
						$dth_pos   = $dth_ring[ $dth_i ] ?? array( 'x' => 50, 'y' => 50 );
						$dth_photo = $dth_role['dth_role_photo'] ?? null;
						$dth_side  = $dth_pos['x'] < 40 ? 'l' : ( $dth_pos['x'] > 60 ? 'r' : 'c' );
						$dth_vpos  = $dth_pos['y'] < 40 ? 't' : ( $dth_pos['y'] > 60 ? 'b' : 'm' );
						$dth_style = sprintf( 'left:%s%%;top:%s%%;width:15%%', $dth_pos['x'], $dth_pos['y'] );
						?>
						<span class="dt-hire-slot on"
							data-dth-slot
							data-side="<?php echo esc_attr( $dth_side ); ?>"
							data-vpos="<?php echo esc_attr( $dth_vpos ); ?>"
							style="<?php echo esc_attr( $dth_style ); ?>">
							<span class="dt-hire-node" data-dth-node><?php
								if ( is_array( $dth_photo ) && ! empty( $dth_photo['ID'] ) ) {
									echo wp_get_attachment_image(
										(int) $dth_photo['ID'],
										array( 160, 160 ),
										false,
										array( 'alt' => '', 'loading' => 'lazy', 'decoding' => 'async' )
									);
								}
							?><span class="dt-hire-badge"><?php
								echo wp_kses( tnb_dth_icon( 'check' ), $dth_svg_kses );
							?> <?php esc_html_e( 'Hired', 'technbrains-child' ); ?></span></span>
							<span class="dt-hire-empty" data-dth-empty hidden><?php
								echo wp_kses( tnb_dth_icon( 'plus' ), $dth_svg_kses );
							?></span>
							<span class="dt-hire-role on" data-dth-role><?php
								echo esc_html( (string) ( $dth_role['dth_role_label'] ?? '' ) );
							?></span>
						</span>
					<?php endforeach; ?>

					<div class="dt-hire-core" style="width:30%">
						<svg class="dt-hire-prog" viewBox="0 0 36 36" aria-hidden="true">
							<circle class="dt-hire-track" cx="18" cy="18" r="15"></circle>
							<circle class="dt-hire-fill" data-dth-fill cx="18" cy="18" r="15" style="stroke-dasharray:94.2478;stroke-dashoffset:0"></circle>
						</svg>
						<span class="dt-hire-core-inner"><?php echo wp_kses( tnb_dth_icon( 'team' ), $dth_svg_kses ); ?></span>
					</div>

					<div class="dt-hire-status">
						<span class="dt-hire-status-tx"
							data-dth-status
							data-dth-building="<?php echo esc_attr( $dth_building ); ?>"
							data-dth-ready="<?php echo esc_attr( $dth_ready ); ?>"><?php echo esc_html( $dth_ready ); ?></span>
						<span class="dt-hire-count" data-dth-count hidden><b>0</b>/<?php echo esc_html( (string) $dth_total ); ?></span>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
