<?php
/**
 * Component: Service — Tools & Technologies
 * Layout   : sv_tools (ACF Flexible Content)
 *
 * Centered header + tabbed category navigation + animated tool tile grid.
 * Switching tabs shows/hides the matching panel via JS.
 *
 * Fields:
 *   svt_eyebrow    — text     (optional eyebrow label)
 *   svt_heading    — text     (section heading; br/span allowed)
 *   svt_sub        — textarea (sub-paragraph below heading)
 *   svt_categories — repeater (one entry per tab / category)
 *     svt_cat_label — text    (tab label, e.g. "Frontend")
 *     svt_items     — repeater (tools in this category)
 *       svt_item_name  — text         (full name, e.g. "ReactJS")
 *       svt_item_url   — text         (optional link URL for the tool card)
 *       svt_item_color — color_picker (brand hex, e.g. #149ECA)
 *       svt_item_logo  — image        (optional logo image for the tile)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/* ── Helper: hex → rgba ─────────────────────────────────────────────────── */
if ( ! function_exists( 'svt_hex_rgba' ) ) {
	function svt_hex_rgba( $hex, $alpha ) {
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

/* ── 1. Fetch ACF data ──────────────────────────────────────────────────── */
$eyebrow = get_sub_field( 'svt_eyebrow' ) ?: '';
$heading = get_sub_field( 'svt_heading' ) ?: '';
$sub     = get_sub_field( 'svt_sub' )     ?: '';

$cats_raw = get_sub_field( 'svt_categories' );
$cats     = [];
if ( is_array( $cats_raw ) ) {
	foreach ( $cats_raw as $cat_row ) {
		$label = sanitize_text_field( $cat_row['svt_cat_label'] ?? '' );
		if ( ! $label ) {
			continue;
		}
		$items = [];
		if ( is_array( $cat_row['svt_items'] ?? null ) ) {
			foreach ( $cat_row['svt_items'] as $item_row ) {
				$name = sanitize_text_field( $item_row['svt_item_name'] ?? '' );
				if ( ! $name ) {
					continue;
				}
				$items[] = [
					'name'  => $name,
					'url'   => esc_url( $item_row['svt_item_url'] ?? '' ),
					'color' => sanitize_hex_color( $item_row['svt_item_color'] ?? '#0C2340' ) ?: '#0C2340',
					'logo'  => $item_row['svt_item_logo'] ?? null,
				];
			}
		}
		$cats[] = [
			'label' => $label,
			'items' => $items,
		];
	}
}
?>
<section class="sv-tools" data-sv-tools>
	<div class="container">

		<div class="sv-tools-head-center">

			<?php if ( $eyebrow ) : ?>
			<div class="sv-tools-eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
			<?php endif; ?>

			<?php if ( $heading ) : ?>
			<h2 class="sv-tools-h2">
				<?php
				echo wp_kses( $heading, [
					'br'   => [],
					'span' => [ 'class' => [] ],
				] );
				?>
			</h2>
			<?php endif; ?>

			<?php if ( $sub ) : ?>
			<p class="sv-tools-sub"><?php echo esc_html( $sub ); ?></p>
			<?php endif; ?>

		</div><!-- .sv-tools-head-center -->

		<?php if ( ! empty( $cats ) ) : ?>

		<div class="sv-tabs" role="tablist" aria-label="<?php esc_attr_e( 'Technology categories', 'technbrains-child' ); ?>">
			<?php foreach ( $cats as $idx => $cat ) : ?>
			<button
				class="sv-tab<?php echo 0 === $idx ? ' is-active' : ''; ?>"
				role="tab"
				aria-selected="<?php echo 0 === $idx ? 'true' : 'false'; ?>"
				type="button"
			><?php echo esc_html( $cat['label'] ); ?></button>
			<?php endforeach; ?>
		</div>

		<?php foreach ( $cats as $idx => $cat ) : ?>
		<div class="sv-tools-panel"<?php echo $idx > 0 ? ' hidden' : ''; ?>>
			<?php if ( ! empty( $cat['items'] ) ) : ?>
			<div class="sv-tools-grid">
				<?php foreach ( $cat['items'] as $j => $item ) : ?>
				<?php if ( $item['url'] ) : ?>
				<a href="<?php echo $item['url']; ?>" class="sv-tool" style="animation-delay:<?php echo esc_attr( $j * 40 ); ?>ms" target="_blank" rel="noopener noreferrer">
				<?php else : ?>
				<div class="sv-tool" style="animation-delay:<?php echo esc_attr( $j * 40 ); ?>ms">
				<?php endif; ?>

					<?php if ( ! empty( $item['logo']['ID'] ) ) : ?>
					<span class="sv-tool-tile sv-tool-tile--logo"
						style="background:<?php echo esc_attr( svt_hex_rgba( $item['color'], 0.12 ) ); ?>;border:1px solid <?php echo esc_attr( svt_hex_rgba( $item['color'], 0.28 ) ); ?>">
						<?php echo wp_get_attachment_image(
							$item['logo']['ID'],
							[ 32, 32 ],
							false,
							[ 'alt' => '', 'loading' => 'lazy' ]
						); ?>
					</span>
					<?php else : ?>
					<span class="sv-tool-tile"
						style="background:<?php echo esc_attr( svt_hex_rgba( $item['color'], 0.12 ) ); ?>;border:1px solid <?php echo esc_attr( svt_hex_rgba( $item['color'], 0.28 ) ); ?>">
					</span>
					<?php endif; ?>

					<span class="sv-tool-name"><?php echo esc_html( $item['name'] ); ?></span>

				<?php echo $item['url'] ? '</a>' : '</div>'; ?><!-- .sv-tool -->
				<?php endforeach; ?>
			</div><!-- .sv-tools-grid -->
			<?php endif; ?>
		</div><!-- .sv-tools-panel -->
		<?php endforeach; ?>

		<?php endif; ?>

	</div><!-- .container -->
</section><!-- .sv-tools -->
