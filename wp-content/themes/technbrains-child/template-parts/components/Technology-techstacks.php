<?php
/**
 * Technology Techstacks Component
 *
 * Flexible content layout part: "Technologies We Work With" section.
 * Two-column desktop layout — sticky left category rail + right panel grid.
 * Mobile collapses to accordion. Tab/accordion switching handled by JS.
 *
 * ACF Fields (get_sub_field):
 *   tst_heading      — text
 *   tst_sub          — textarea
 *   tst_cta_text     — text   (optional CTA label)
 *   tst_cta_url      — url    (optional; empty = popup trigger)
 *   tst_categories   — repeater
 *     tst_cat_label  — text
 *     tst_cat_desc   — text   (panel sub-description)
 *     tst_cat_icon   — image  (array; shown in category button icon box)
 *     tst_items      — repeater
 *       tst_item_logo  — image  (array; logo inside tc-tile)
 *       tst_item_title — text
 *       tst_item_desc  — textarea (optional)
 *       tst_item_color — color_picker (hex; drives tc-tile CSS vars)
 *       tst_item_url   — url (optional; makes card an <a>)
 *
 * @package TechnbrainsChild
 */

defined( 'ABSPATH' ) || exit;

// ── Hex → rgba helper ─────────────────────────────────────────────────────────
if ( ! function_exists( 'tst_hex_rgba' ) ) {
	function tst_hex_rgba( $hex, $alpha ) {
		$hex = ltrim( $hex, '#' );
		if ( strlen( $hex ) === 3 ) {
			$hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
		}
		$r = hexdec( substr( $hex, 0, 2 ) );
		$g = hexdec( substr( $hex, 2, 2 ) );
		$b = hexdec( substr( $hex, 4, 2 ) );
		return 'rgba(' . $r . ',' . $g . ',' . $b . ',' . $alpha . ')';
	}
}

// ── Fields ────────────────────────────────────────────────────────────────────
$heading  = get_sub_field( 'tst_heading' );
$sub      = get_sub_field( 'tst_sub' );
$cta_text = get_sub_field( 'tst_cta_text' );
$cta_url  = get_sub_field( 'tst_cta_url' );
$cats_raw = get_sub_field( 'tst_categories' );

// ── Build categories array ────────────────────────────────────────────────────
$cats = array();
if ( is_array( $cats_raw ) ) {
	foreach ( $cats_raw as $cat_row ) {
		$label = sanitize_text_field( $cat_row['tst_cat_label'] ?? '' );
		if ( ! $label ) {
			continue;
		}
		$items = array();
		if ( is_array( $cat_row['tst_items'] ?? null ) ) {
			foreach ( $cat_row['tst_items'] as $item_row ) {
				$name = sanitize_text_field( $item_row['tst_item_title'] ?? '' );
				if ( ! $name ) {
					continue;
				}
				$hex     = sanitize_hex_color( $item_row['tst_item_color'] ?? '' ) ?: '#0C2340';
				$items[] = array(
					'logo'  => $item_row['tst_item_logo'] ?? array(),
					'title' => $name,
					'desc'  => sanitize_text_field( $item_row['tst_item_desc'] ?? '' ),
					'color' => $hex,
					'url'   => esc_url( $item_row['tst_item_url'] ?? '' ),
				);
			}
		}
		$cats[] = array(
			'label' => $label,
			'desc'  => sanitize_text_field( $cat_row['tst_cat_desc'] ?? '' ),
			'icon'  => $cat_row['tst_cat_icon'] ?? array(),
			'items' => $items,
		);
	}
}

// ── Shared SVGs ───────────────────────────────────────────────────────────────
$arrow_svg = '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" '
	. 'stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">'
	. '<line x1="5" y1="12" x2="19" y2="12"/>'
	. '<polyline points="12 5 19 12 12 19"/>'
	. '</svg>';

$chev_svg = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" '
	. 'stroke-width="2" stroke-linecap="round" stroke-linejoin="round">'
	. '<polyline points="9 18 15 12 9 6"/>'
	. '</svg>';

$plus_svg = '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" '
	. 'stroke-width="2.4" stroke-linecap="round">'
	. '<line x1="12" y1="5" x2="12" y2="19"/>'
	. '<line x1="5" y1="12" x2="19" y2="12"/>'
	. '</svg>';

$monitor_svg = '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" '
	. 'stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'
	. '<rect x="2" y="3" width="20" height="14" rx="2" ry="2"/>'
	. '<line x1="8" y1="21" x2="16" y2="21"/>'
	. '<line x1="12" y1="17" x2="12" y2="21"/>'
	. '</svg>';

// wp_kses allowlists
$svg_kses = array(
	'svg'      => array(
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
	'line'     => array( 'x1' => true, 'y1' => true, 'x2' => true, 'y2' => true ),
	'polyline' => array( 'points' => true ),
	'rect'     => array( 'x' => true, 'y' => true, 'width' => true, 'height' => true, 'rx' => true, 'ry' => true ),
);

// ── Tech card renderer (shared by desktop + mobile) ───────────────────────────
function tst_render_cards( $items, $arrow_svg, $svg_kses ) {
	foreach ( $items as $j => $item ) {
		$tile_tint = tst_hex_rgba( $item['color'], 0.12 );
		$tile_line = tst_hex_rgba( $item['color'], 0.28 );
		$abbr      = mb_strtoupper( mb_substr( preg_replace( '/[^a-zA-Z]/', '', $item['title'] ), 0, 2 ) );
		$has_url   = ! empty( $item['url'] );
		$tag       = $has_url ? 'a' : 'div';
		$delay     = (int) $j * 45;
		?>
		<<?php echo $tag; ?>
			<?php if ( $has_url ) : ?>href="<?php echo esc_url( $item['url'] ); ?>" target="_blank" rel="noopener noreferrer"<?php endif; ?>
			class="tc-tech-card"
			style="animation-delay:<?php echo esc_attr( $delay ); ?>ms"
		>
			<span
				class="tc-tile"
				aria-hidden="true"
				style="--tile-tint:<?php echo esc_attr( $tile_tint ); ?>;--tile-fg:<?php echo esc_attr( $item['color'] ); ?>;--tile-line:<?php echo esc_attr( $tile_line ); ?>"
			>
				<?php if ( ! empty( $item['logo']['id'] ) ) : ?>
					<?php echo wp_get_attachment_image(
						(int) $item['logo']['id'],
						array( 32, 32 ),
						false,
						array( 'alt' => '', 'loading' => 'lazy' )
					); ?>
				<?php else : ?>
					<?php echo esc_html( $abbr ?: '?' ); ?>
				<?php endif; ?>
			</span>

			<div class="tc-tech-card-body">
				<h4 class="tc-tech-name"><?php echo esc_html( $item['title'] ); ?></h4>
				<?php if ( $item['desc'] ) : ?>
					<p class="tc-tech-desc"><?php echo esc_html( $item['desc'] ); ?></p>
				<?php endif; ?>
			</div>

			<span class="tc-tech-arrow-circle" aria-hidden="true">
				<?php echo wp_kses( $arrow_svg, $svg_kses ); ?>
			</span>
		</<?php echo $tag; ?>>
		<?php
	}
}
?>

<section class="tc-section tc-stack" data-tst-section>
	<div class="tc-container">

		<?php /* ── Section header ────────────────────────────────────────────── */ ?>
		<?php if ( $heading || $sub || $cta_text ) : ?>
		<div class="tc-head-center">

			<?php if ( $heading ) : ?>
				<h2 class="tc-h2">
					<?php echo wp_kses(
						$heading,
						array(
							'br'   => array(),
							'span' => array( 'class' => true ),
						)
					); ?>
				</h2>
			<?php endif; ?>

			<?php if ( $sub ) : ?>
				<p class="tc-sub"><?php echo esc_html( $sub ); ?></p>
			<?php endif; ?>

			<?php if ( $cta_text ) : ?>
				<div class="tst-head-cta">
					<?php if ( $cta_url ) : ?>
						<a href="<?php echo esc_url( $cta_url ); ?>" class="tc-btn-secondary">
							<?php echo esc_html( $cta_text ); ?>
						</a>
					<?php else : ?>
						<button type="button" class="tc-btn-secondary tnb-popup-trigger">
							<?php echo esc_html( $cta_text ); ?>
						</button>
					<?php endif; ?>
				</div>
			<?php endif; ?>

		</div>
		<?php endif; ?>

		<?php if ( ! empty( $cats ) ) : ?>

		<?php /* ── Desktop: left rail + right panels ─────────────────────────── */ ?>
		<div class="tc-stack-layout" data-tst-desktop>

			<?php /* Category rail */ ?>
			<div class="tc-cat-rail" role="tablist" aria-label="<?php esc_attr_e( 'Technology categories', 'technbrains-child' ); ?>">
				<?php foreach ( $cats as $idx => $cat ) : ?>
					<button
						class="tc-cat-btn<?php echo 0 === $idx ? ' is-active' : ''; ?>"
						role="tab"
						aria-selected="<?php echo 0 === $idx ? 'true' : 'false'; ?>"
						data-tst-tab="<?php echo (int) $idx; ?>"
						type="button"
					>
						<span class="tc-cat-btn-icon">
							<?php if ( ! empty( $cat['icon']['id'] ) ) : ?>
								<?php echo wp_get_attachment_image(
									(int) $cat['icon']['id'],
									array( 24, 24 ),
									false,
									array( 'alt' => '' )
								); ?>
							<?php else : ?>
								<?php echo wp_kses( $monitor_svg, $svg_kses ); ?>
							<?php endif; ?>
						</span>
						<span class="tc-cat-btn-text">
							<span class="tc-cat-btn-title"><?php echo esc_html( $cat['label'] ); ?></span>
						</span>
						<span class="tc-cat-btn-chev" aria-hidden="true">
							<?php echo wp_kses( $chev_svg, $svg_kses ); ?>
						</span>
					</button>
				<?php endforeach; ?>
			</div>

			<?php /* Panels wrapper (second grid column) */ ?>
			<div class="tc-panels-wrap">
				<?php foreach ( $cats as $idx => $cat ) : ?>
					<div
						class="tc-panel"
						role="tabpanel"
						data-tst-panel="<?php echo (int) $idx; ?>"
						<?php echo $idx > 0 ? 'hidden' : ''; ?>
					>
						<div class="tc-panel-head">
							<div>
								<h3 class="tc-panel-title"><?php echo esc_html( $cat['label'] ); ?></h3>
								<?php if ( $cat['desc'] ) : ?>
									<p class="tc-panel-desc"><?php echo esc_html( $cat['desc'] ); ?></p>
								<?php endif; ?>
							</div>
						</div>

						<?php if ( ! empty( $cat['items'] ) ) : ?>
							<div class="tc-tech-grid">
								<?php tst_render_cards( $cat['items'], $arrow_svg, $svg_kses ); ?>
							</div>
						<?php endif; ?>
					</div><!-- .tc-panel -->
				<?php endforeach; ?>
			</div><!-- .tc-panels-wrap -->

		</div><!-- .tc-stack-layout -->

		<?php /* ── Mobile: accordion ─────────────────────────────────────────── */ ?>
		<div class="tc-acc" data-tst-acc>
			<?php foreach ( $cats as $idx => $cat ) : ?>
				<div
					class="tc-acc-item<?php echo 0 === $idx ? ' is-open' : ''; ?>"
					data-tst-acc-item
				>
					<button
						class="tc-acc-q"
						aria-expanded="<?php echo 0 === $idx ? 'true' : 'false'; ?>"
						type="button"
					>
						<span class="tc-cat-btn-icon">
							<?php if ( ! empty( $cat['icon']['id'] ) ) : ?>
								<?php echo wp_get_attachment_image(
									(int) $cat['icon']['id'],
									array( 24, 24 ),
									false,
									array( 'alt' => '' )
								); ?>
							<?php else : ?>
								<?php echo wp_kses( $monitor_svg, $svg_kses ); ?>
							<?php endif; ?>
						</span>
						<span class="tc-acc-q-text">
							<span class="tc-acc-q-title"><?php echo esc_html( $cat['label'] ); ?></span>
						</span>
						<span class="tc-acc-plus" aria-hidden="true">
							<?php echo wp_kses( $plus_svg, $svg_kses ); ?>
						</span>
					</button>

					<div class="tc-acc-body">
						<?php if ( ! empty( $cat['items'] ) ) : ?>
							<div class="tc-acc-body-inner">
								<?php tst_render_cards( $cat['items'], $arrow_svg, $svg_kses ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div><!-- .tc-acc-item -->
			<?php endforeach; ?>
		</div><!-- .tc-acc -->

		<?php endif; ?>

	</div><!-- .tc-container -->
</section><!-- .tc-stack -->
