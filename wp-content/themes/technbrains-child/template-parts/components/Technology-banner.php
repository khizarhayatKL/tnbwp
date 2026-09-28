<?php
/**
 * Technology Banner Component
 *
 * Flexible content layout part: dark hero section with 3D layered stack visual.
 * Renders a two-column hero: left = heading/sub/CTAs, right = animated 3D tech stack.
 *
 * ACF Fields (get_sub_field):
 *   tch_heading          — text
 *   tch_highlight        — text (accent span)
 *   tch_sub              — textarea
 *   tch_btn_primary_text — text
 *   tch_btn_primary_url  — url
 *   tch_btn_secondary_text — text
 *   tch_btn_secondary_url  — url
 *   tch_hero_image       — image (array)
 *   tch_layers           — repeater
 *     tch_layer_icon     — image (array)
 *     tch_layer_title    — text
 *     tch_layer_desc     — text
 *
 * @package TechnbrainsChild
 */

defined( 'ABSPATH' ) || exit;

// ── Fields ────────────────────────────────────────────────────────────────────
$heading        = get_sub_field( 'tch_heading' );
$highlight      = get_sub_field( 'tch_highlight' );
$sub            = get_sub_field( 'tch_sub' );
$btn_p_text     = get_sub_field( 'tch_btn_primary_text' );
$btn_p_url      = get_sub_field( 'tch_btn_primary_url' );
$btn_s_text     = get_sub_field( 'tch_btn_secondary_text' );
$btn_s_url      = get_sub_field( 'tch_btn_secondary_url' );
$hero_image     = get_sub_field( 'tch_hero_image' );
$layers         = get_sub_field( 'tch_layers' );
$layer_count    = is_array( $layers ) ? count( $layers ) : 0;

// Arrow SVG shared by both buttons.
$arrow_svg = '<span class="tc-btn-arrow" aria-hidden="true">'
	. '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" '
	. 'stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">'
	. '<line x1="5" y1="12" x2="19" y2="12"/>'
	. '<polyline points="12 5 19 12 12 19"/>'
	. '</svg></span>';

// Allowed HTML for button inner content (text + svg arrow).
$arrow_kses_args = array(
	'span'     => array( 'class' => true, 'aria-hidden' => true ),
	'svg'      => array(
		'width'        => true,
		'height'       => true,
		'viewbox'      => true,
		'fill'         => true,
		'stroke'       => true,
		'stroke-width' => true,
		'stroke-linecap'  => true,
		'stroke-linejoin' => true,
	),
	'line'     => array( 'x1' => true, 'y1' => true, 'x2' => true, 'y2' => true ),
	'polyline' => array( 'points' => true ),
);

// Fallback monitor SVG for layers without an icon.
$fallback_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" '
	. 'fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" '
	. 'aria-hidden="true">'
	. '<rect x="2" y="3" width="20" height="14" rx="2" ry="2"/>'
	. '<line x1="8" y1="21" x2="16" y2="21"/>'
	. '<line x1="12" y1="17" x2="12" y2="21"/>'
	. '</svg>';

$fallback_icon_kses = array(
	'svg'  => array(
		'xmlns'           => true,
		'width'           => true,
		'height'          => true,
		'viewbox'         => true,
		'fill'            => true,
		'stroke'          => true,
		'stroke-width'    => true,
		'stroke-linecap'  => true,
		'stroke-linejoin' => true,
		'aria-hidden'     => true,
	),
	'rect' => array( 'x' => true, 'y' => true, 'width' => true, 'height' => true, 'rx' => true, 'ry' => true ),
	'line' => array( 'x1' => true, 'y1' => true, 'x2' => true, 'y2' => true ),
);
?>

<section class="tc-hero">
	<div class="tc-hero-grid">

		<?php /* ── Left column: text content ──────────────────────────────── */ ?>
		<div class="tc-hero-content">

			<?php if ( $heading || $highlight ) : ?>
				<h1 class="tc-hero-h1">
					<?php
					if ( $heading ) {
						// Allow <br> and <span> in heading for designed line breaks.
						echo wp_kses(
							$heading,
							array(
								'br'   => array(),
								'span' => array( 'class' => true ),
							)
						);
					}
					if ( $highlight ) {
						echo ' <span class="accent">' . esc_html( $highlight ) . '</span>';
					}
					?>
				</h1>
			<?php endif; ?>

			<?php if ( $sub ) : ?>
				<p class="tc-hero-sub"><?php echo esc_html( $sub ); ?></p>
			<?php endif; ?>

			<?php if ( $btn_p_text || $btn_s_text ) : ?>
				<div class="tc-hero-actions">

					<?php /* Primary button */ ?>
					<?php if ( $btn_p_text ) : ?>
						<?php if ( $btn_p_url ) : ?>
							<a href="<?php echo esc_url( $btn_p_url ); ?>" class="tc-btn-primary">
								<?php echo esc_html( $btn_p_text ); ?>
								<?php /* CTA arrow hidden for now. echo wp_kses( $arrow_svg, $arrow_kses_args ); */ ?>
							</a>
						<?php else : ?>
							<button type="button" class="tc-btn-primary tnb-popup-trigger">
								<?php echo esc_html( $btn_p_text ); ?>
								<?php /* CTA arrow hidden for now. echo wp_kses( $arrow_svg, $arrow_kses_args ); */ ?>
							</button>
						<?php endif; ?>
					<?php endif; ?>

					<?php /* Secondary button */ ?>
					<?php if ( $btn_s_text ) : ?>
						<?php if ( $btn_s_url ) : ?>
							<a href="<?php echo esc_url( $btn_s_url ); ?>" class="tc-btn-ghost-light">
								<?php echo esc_html( $btn_s_text ); ?>
								<?php /* CTA arrow hidden for now. echo wp_kses( $arrow_svg, $arrow_kses_args ); */ ?>
							</a>
						<?php else : ?>
							<button type="button" class="tc-btn-ghost-light tnb-popup-trigger">
								<?php echo esc_html( $btn_s_text ); ?>
								<?php /* CTA arrow hidden for now. echo wp_kses( $arrow_svg, $arrow_kses_args ); */ ?>
							</button>
						<?php endif; ?>
					<?php endif; ?>

				</div>
			<?php endif; ?>

		</div><!-- .tc-hero-content -->

		<?php /* ── Right column: 3D stack visual ─────────────────────────── */ ?>
		<div class="tc-arch" aria-hidden="true">

			<?php if ( ! empty( $hero_image['url'] ) ) : ?>
				<img
					class="tc-hero-center-img"
					src="<?php echo esc_url( $hero_image['url'] ); ?>"
					alt="<?php echo esc_attr( $hero_image['alt'] ?? '' ); ?>"
					width="<?php echo esc_attr( $hero_image['width'] ?? '' ); ?>"
					height="<?php echo esc_attr( $hero_image['height'] ?? '' ); ?>"
				>
			<?php endif; ?>

			<div class="tc-stack3d">
				<div class="tc-stack-glow"></div>

				<?php if ( $layers ) : ?>
					<?php foreach ( $layers as $i => $layer ) : ?>
						<?php
						// ── Per-layer timing calculations ──────────────────────────
						$layer_delay = round( 0.15 + $i * 0.18, 2 );
						$bead_delay  = round( 1.2 + $i * 0.3, 2 );
						$port_delay  = round( $i * 0.2, 2 );

						// First half of layers enter from above, second half from below.
						$half      = (int) ceil( $layer_count / 2 );
						$enter_y   = ( $i < $half ) ? '-22px' : '22px';

						// Layer index label: 01, 02 … zero-padded.
						$layer_num = str_pad( $i + 1, 2, '0', STR_PAD_LEFT );

						$icon  = $layer['tch_layer_icon'] ?? array();
						$title = $layer['tch_layer_title'] ?? '';
						$desc  = $layer['tch_layer_desc'] ?? '';

						$end_icons = array();
						foreach ( array( 'tch_layer_end_icon_1', 'tch_layer_end_icon_2' ) as $end_key ) {
							if ( ! empty( $layer[ $end_key ]['id'] ) ) {
								$end_icons[] = $layer[ $end_key ];
							}
						}
						?>
						<div
							class="tc-layer"
							style="--i:<?php echo (int) $i; ?>; --enterY:<?php echo esc_attr( $enter_y ); ?>; animation-delay:<?php echo esc_attr( $layer_delay ); ?>s"
						>
							<?php /* Guide line with travelling bead */ ?>
							<span class="tc-layer-guide">
								<span
									class="tc-layer-bead"
									style="animation-delay:<?php echo esc_attr( $bead_delay ); ?>s"
								></span>
							</span>

							<?php /* Red vertical left bar */ ?>
							<span class="tc-layer-bar"></span>

							<?php /* Zero-padded index number */ ?>
							<span class="tc-layer-idx"><?php echo esc_html( $layer_num ); ?></span>

							<?php /* Icon box */ ?>
							<span class="tc-layer-ic">
								<?php if ( ! empty( $icon['id'] ) ) : ?>
									<?php
									echo wp_get_attachment_image(
										(int) $icon['id'],
										array( 28, 28 ),
										false,
										array( 'alt' => esc_attr( $title ) )
									);
									?>
								<?php else : ?>
									<?php echo wp_kses( $fallback_icon, $fallback_icon_kses ); ?>
								<?php endif; ?>
							</span>

							<?php /* Layer name + description */ ?>
							<span class="tc-layer-main">
								<?php if ( $title ) : ?>
									<span class="tc-layer-name"><?php echo esc_html( $title ); ?></span>
								<?php endif; ?>
								<?php if ( $desc ) : ?>
									<span class="tc-layer-sub"><?php echo esc_html( $desc ); ?></span>
								<?php endif; ?>
							</span>

							<?php /* Optional end icons on right */ ?>
							<?php if ( ! empty( $end_icons ) ) : ?>
							<span class="tc-layer-end">
								<?php foreach ( $end_icons as $end_icon ) : ?>
									<?php
									echo wp_get_attachment_image(
										(int) $end_icon['id'],
										array( 28, 28 ),
										false,
										array( 'alt' => esc_attr( $end_icon['alt'] ?? '' ) )
									);
									?>
								<?php endforeach; ?>
							</span>
							<?php endif; ?>

							<?php /* Animated port dot on right */ ?>
							<span
								class="tc-layer-port"
								style="animation-delay:<?php echo esc_attr( $port_delay ); ?>s"
							></span>

						</div><!-- .tc-layer -->
					<?php endforeach; ?>
				<?php endif; ?>

			</div><!-- .tc-stack3d -->
		</div><!-- .tc-arch -->

	</div><!-- .tc-hero-grid -->
</section><!-- .tc-hero -->

