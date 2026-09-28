<?php
/**
 * Software Outsourcing — Hero with the live delivery board.
 *
 * Layout : so_hero (ACF Flexible Content)
 * Fields : soh_eyebrow, soh_h1, soh_lead,
 *          soh_points{ soh_point }, soh_cta_primary, soh_cta_ghost,
 *          soh_board_title, soh_board_sub, soh_board_live, soh_logo,
 *          soh_team{ soh_member }, soh_team_label, soh_team_more,
 *          soh_stages{ soh_stage }, soh_kpis{ soh_kpi_value, soh_kpi_label },
 *          soh_milestones{ soh_milestone }
 * CSS    : assets/css/components.css (.dt-hero base, .so-odb board, .so-chip)
 * JS     : assets/js/components.js ([data-soh-board])
 *
 * A <section>, not the <header> the prototype used: inside <main> a <header> is a
 * generic element rather than the banner landmark, and the site header already
 * owns that role. No rule selects the element, only .dt-hero, so nothing moves.
 *
 * The board is aria-hidden in full. It is an animated illustration of a delivery
 * pipeline — every number in it is decorative, and the accountable claims are all
 * stated in the copy beside it. *
 * The approved build hides every trailing button arrow globally (its NO-BTN-ARROWS
 * tweak sets `.dt-btn .arr { display: none !important }` plus the same for
 * `a[class*="btn"] > span:last-child > svg`), so the arrow is not part of the
 * approved render. It is left out of the markup rather than shipped and then hidden
 * with !important — same appearance, less DOM, no specificity fight.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$soh_eyebrow = (string) get_sub_field( 'soh_eyebrow' );

/**
 * One authored h1 rather than a plain half plus an accent half. The accent is a
 * phrase inside the sentence, so two fields forced the break to fall between them
 * and gave no way to accent a word mid-sentence. tnb_accent_heading()
 * (functions.php) sanitises to <br> + <span class> and stamps the accent class on
 * a bare <span>, so the editor never types a class name.
 */
$soh_heading = tnb_accent_heading( get_sub_field( 'soh_h1' ) );
$soh_lead    = (string) get_sub_field( 'soh_lead' );
$soh_points  = (array) get_sub_field( 'soh_points' );
$soh_cta_1   = get_sub_field( 'soh_cta_primary' );
$soh_cta_2   = get_sub_field( 'soh_cta_ghost' );

$soh_live       = (string) get_sub_field( 'soh_board_live' );
$soh_title      = (string) get_sub_field( 'soh_board_title' );
$soh_sub        = (string) get_sub_field( 'soh_board_sub' );
$soh_logo       = get_sub_field( 'soh_logo' );
$soh_team_label = (string) get_sub_field( 'soh_team_label' );
$soh_team       = (array) get_sub_field( 'soh_team' );
$soh_team_more  = (string) get_sub_field( 'soh_team_more' );
$soh_stages     = (array) get_sub_field( 'soh_stages' );
$soh_kpis       = (array) get_sub_field( 'soh_kpis' );
$soh_milestones = (array) get_sub_field( 'soh_milestones' );
$soh_chips      = (array) get_sub_field( 'soh_chips' );

if ( '' === $soh_heading && '' === $soh_lead ) {
	return;
}

$soh_kses = array(
	'br'   => array(),
	'span' => array( 'class' => true ),
);

// Icon geometry is the approved build's, inlined so it inherits currentColor from
// the tile it sits in — an <img> would resolve it to black and kill every state.
if ( ! function_exists( 'tnb_soh_icon' ) ) {
	function tnb_soh_icon( string $name ): string {
		$icons = array(
			'check' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>',
			'arrow' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>',
			'bolt'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>',
			'shield' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>',
		);

		return $icons[ $name ] ?? '';
	}
}

$soh_svg_kses = array(
	'svg'      => array(
		'viewbox'         => true,
		'fill'            => true,
		'stroke'          => true,
		'stroke-width'    => true,
		'stroke-linecap'  => true,
		'stroke-linejoin' => true,
		'aria-hidden'     => true,
	),
	'path'     => array( 'd' => true ),
	'line'     => array( 'x1' => true, 'y1' => true, 'x2' => true, 'y2' => true ),
	'polyline' => array( 'points' => true ),
	'polygon'  => array( 'points' => true ),
);

// The activity ticker's copy travels to the JS as a JSON attribute rather than as
// a localised script object: the strings are this section's content, so they
// belong in its markup, and a page may hold more than one hero.
$soh_ticker = array();
foreach ( $soh_milestones as $soh_row ) {
	$soh_text = trim( (string) ( $soh_row['soh_milestone'] ?? '' ) );
	if ( '' !== $soh_text ) {
		$soh_ticker[] = $soh_text;
	}
}
?>
<section class="dt-hero">
	<div class="dt-hero-bg" aria-hidden="true"></div>
	<div class="dt-hero-grid-layout">
		<div class="dt-hero-content">
		    <?php tnb_breadcrumb_html(); ?>
			<?php if ( '' !== $soh_eyebrow ) : ?>
				<div class="eyebrow"><?php echo esc_html( $soh_eyebrow ); ?></div>
			<?php endif; ?>
			<?php if ( '' !== $soh_heading ) : ?>
				<h1><?php echo $soh_heading; // Sanitised by tnb_accent_heading(). ?></h1>
			<?php endif; ?>
			<?php if ( '' !== $soh_lead ) : ?>
				<p class="dt-hero-lead"><?php echo wp_kses( $soh_lead, $soh_kses ); ?></p>
			<?php endif; ?>
			<?php if ( $soh_points ) : ?>
				<div class="dt-hero-points">
					<?php foreach ( $soh_points as $soh_row ) : ?>
						<?php $soh_point = (string) ( $soh_row['soh_point'] ?? '' ); ?>
						<?php if ( '' === $soh_point ) { continue; } ?>
						<div class="dt-hero-point"><span class="ck" aria-hidden="true"><?php
							echo wp_kses( tnb_soh_icon( 'check' ), $soh_svg_kses );
						?></span><?php echo esc_html( $soh_point ); ?></div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<?php
			// URL "#tnb-popup" renders the CTA as a contact-form popup trigger
			// (popup.js delegates on .tnb-popup-trigger) instead of a link.
			$soh_render_cta = static function ( $cta, $class ) {
				if ( ! is_array( $cta ) || empty( $cta['url'] ) || '' === (string) ( $cta['title'] ?? '' ) ) {
					return;
				}
				if ( in_array( $cta['url'], array( '#tnb-popup', '#tnb-form' ), true ) ) {
					echo '<button type="button" class="' . esc_attr( $class ) . ' tnb-popup-trigger">'
						. esc_html( (string) $cta['title'] ) . '</button>';
					return;
				}
				echo '<a class="' . esc_attr( $class ) . '" href="' . esc_url( $cta['url'] ) . '"'
					. ( ! empty( $cta['target'] ) ? ' target="' . esc_attr( $cta['target'] ) . '" rel="noopener"' : '' )
					. '>' . esc_html( (string) $cta['title'] ) . '</a>';
			};
			?>
			<?php if ( ( is_array( $soh_cta_1 ) && ! empty( $soh_cta_1['url'] ) ) || ( is_array( $soh_cta_2 ) && ! empty( $soh_cta_2['url'] ) ) ) : ?>
				<div class="dt-hero-actions">
					<?php $soh_render_cta( $soh_cta_1, 'dt-btn dt-btn-primary' ); ?>
					<?php $soh_render_cta( $soh_cta_2, 'dt-btn dt-btn-ghost' ); ?>
				</div>
			<?php endif; ?>
		</div>

		<div class="dt-hero-visual" aria-hidden="true">
			<span class="dt-hero-orb dt-hero-orb-a"></span>
			<span class="dt-hero-orb dt-hero-orb-b"></span>

			<div class="so-odb" data-soh-board>
				<div class="so-odb-head">
					<?php if ( '' !== $soh_live ) : ?>
						<span class="so-odb-live"><span class="dot"></span><?php echo esc_html( $soh_live ); ?></span>
					<?php endif; ?>
					<?php if ( is_array( $soh_logo ) && ! empty( $soh_logo['ID'] ) ) : ?>
						<?php echo wp_get_attachment_image(
							(int) $soh_logo['ID'],
							array( 26, 26 ),
							false,
							array( 'class' => 'so-odb-logo', 'alt' => '', 'loading' => 'eager', 'decoding' => 'async' )
						); ?>
					<?php endif; ?>
				</div>

				<?php if ( '' !== $soh_title || '' !== $soh_sub ) : ?>
					<div class="so-odb-project">
						<?php if ( '' !== $soh_title ) : ?>
							<h4><?php echo esc_html( $soh_title ); ?></h4>
						<?php endif; ?>
						<?php if ( '' !== $soh_sub ) : ?>
							<span class="so-odb-sub"><?php echo esc_html( $soh_sub ); ?></span>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ( $soh_team || '' !== $soh_team_label ) : ?>
					<div class="so-odb-team">
						<?php if ( '' !== $soh_team_label ) : ?>
							<span class="so-odb-team-l"><?php echo esc_html( $soh_team_label ); ?></span>
						<?php endif; ?>
						<div class="so-odb-avatars">
							<?php
							// Stagger matches the approved build: 0.15s, then 0.09s apart.
							foreach ( $soh_team as $soh_i => $soh_row ) :
								$soh_member = $soh_row['soh_member'] ?? null;
								if ( ! is_array( $soh_member ) || empty( $soh_member['ID'] ) ) {
									continue;
								}
								$soh_delay = 0.15 + ( (int) $soh_i * 0.09 );
								?>
								<span class="so-odb-av" style="animation-delay:<?php echo esc_attr( number_format( $soh_delay, 2, '.', '' ) ); ?>s"><?php
									echo wp_get_attachment_image(
										(int) $soh_member['ID'],
										array( 60, 60 ),
										false,
										array( 'alt' => '', 'loading' => 'lazy', 'decoding' => 'async' )
									);
								?></span>
							<?php endforeach; ?>
							<?php if ( '' !== $soh_team_more ) : ?>
								<span class="so-odb-av so-odb-av-more" style="animation-delay:0.7s"><?php echo esc_html( $soh_team_more ); ?></span>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( $soh_stages ) : ?>
					<div class="so-odb-pipe">
						<div class="so-odb-pipe-line">
							<span class="so-odb-pipe-fill" data-soh-fill style="width:0%"></span>
							<span class="so-odb-pipe-rider" data-soh-rider style="left:0%"><?php
								echo wp_kses( tnb_soh_icon( 'bolt' ), $soh_svg_kses );
							?></span>
						</div>
						<?php foreach ( $soh_stages as $soh_i => $soh_row ) : ?>
							<div class="so-odb-stage<?php echo 0 === (int) $soh_i ? ' is-active' : ''; ?>" data-soh-stage>
								<span class="so-odb-stage-dot">
									<span class="n"><?php echo esc_html( (string) ( (int) $soh_i + 1 ) ); ?></span>
									<span class="ck"><?php echo wp_kses( tnb_soh_icon( 'check' ), $soh_svg_kses ); ?></span>
								</span>
								<span class="so-odb-stage-l"><?php echo esc_html( (string) ( $soh_row['soh_stage'] ?? '' ) ); ?></span>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<?php if ( $soh_kpis ) : ?>
					<div class="so-odb-kpis">
						<?php foreach ( $soh_kpis as $soh_row ) : ?>
							<div class="so-odb-kpi">
								<b><?php echo esc_html( (string) ( $soh_row['soh_kpi_value'] ?? '' ) ); ?></b>
								<span><?php echo esc_html( (string) ( $soh_row['soh_kpi_label'] ?? '' ) ); ?></span>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<?php if ( $soh_ticker ) : ?>
					<div class="so-odb-activity">
						<span class="so-odb-activity-dot"></span>
						<span class="so-odb-activity-tx"
							data-soh-activity
							data-soh-milestones="<?php echo esc_attr( wp_json_encode( $soh_ticker ) ); ?>"><?php
							echo esc_html( $soh_ticker[0] );
						?></span>
					</div>
				<?php endif; ?>
			</div>

			<?php
			// Three chips, and the design gives each its own place and gradient, so
			// the class comes from the row's position rather than from a field: an
			// editor cannot land two chips on the same corner.
			$soh_chip_pos = array( 'so-chip-top', 'so-chip-a', 'so-chip-b' );
			foreach ( array_slice( $soh_chips, 0, 3 ) as $soh_i => $soh_row ) :
				$soh_value = (string) ( $soh_row['soh_chip_value'] ?? '' );
				$soh_label = (string) ( $soh_row['soh_chip_label'] ?? '' );

				if ( '' === $soh_value && '' === $soh_label ) {
					continue;
				}
				?>
				<div class="so-chip <?php echo esc_attr( $soh_chip_pos[ $soh_i ] ); ?>">
					<span class="ico"><?php
						echo wp_kses( tnb_soh_icon( (string) ( $soh_row['soh_chip_icon'] ?? 'bolt' ) ), $soh_svg_kses );
					?></span>
					<span class="tx">
						<b><?php echo esc_html( $soh_value ); ?></b>
						<span><?php echo esc_html( $soh_label ); ?></span>
					</span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
