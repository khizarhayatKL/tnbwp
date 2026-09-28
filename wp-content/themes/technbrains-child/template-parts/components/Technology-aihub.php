<?php
/**
 * Technology AI Hub Component
 *
 * Flexible content layout part: "AI & Automation" section.
 * Horizontal pill tab bar → detail panel with 2-col tech list.
 * JS switches panels and replays the tcFadeUp animation on each tab click.
 *
 * ACF Fields (get_sub_field):
 *   tai_heading   — text
 *   tai_sub       — textarea
 *   tai_cta_text  — text   (optional CTA label)
 *   tai_cta_url   — url    (optional; empty = popup trigger)
 *   tai_note      — text   (optional note shown below panels with red dot)
 *   tai_clusters  — repeater
 *     tai_cluster_label — text
 *     tai_cluster_blurb — textarea (panel description)
 *     tai_techs         — repeater
 *       tai_tech_logo   — image  (array; shown in tc-tile — abbr fallback)
 *       tai_tech_name   — text
 *       tai_tech_role   — text   (one-line description)
 *       tai_tech_color  — color_picker (hex; drives tc-tile CSS vars)
 *
 * @package TechnbrainsChild
 */

defined( 'ABSPATH' ) || exit;

// ── Hex → rgba helper ─────────────────────────────────────────────────────────
if ( ! function_exists( 'tai_hex_rgba' ) ) {
	function tai_hex_rgba( $hex, $alpha ) {
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
$heading  = get_sub_field( 'tai_heading' );
$sub      = get_sub_field( 'tai_sub' );
$cta_text = get_sub_field( 'tai_cta_text' );
$cta_url  = get_sub_field( 'tai_cta_url' );
$note     = get_sub_field( 'tai_note' );
$clusters_raw = get_sub_field( 'tai_clusters' );

// ── Build clusters array ──────────────────────────────────────────────────────
$clusters = array();
if ( is_array( $clusters_raw ) ) {
	foreach ( $clusters_raw as $cl_row ) {
		$label = sanitize_text_field( $cl_row['tai_cluster_label'] ?? '' );
		if ( ! $label ) {
			continue;
		}
		$techs = array();
		if ( is_array( $cl_row['tai_techs'] ?? null ) ) {
			foreach ( $cl_row['tai_techs'] as $tech_row ) {
				$name = sanitize_text_field( $tech_row['tai_tech_name'] ?? '' );
				if ( ! $name ) {
					continue;
				}
				$hex    = sanitize_hex_color( $tech_row['tai_tech_color'] ?? '' ) ?: '#0C2340';
				$techs[] = array(
					'logo'  => $tech_row['tai_tech_logo'] ?? array(),
					'name'  => $name,
					'role'  => sanitize_text_field( $tech_row['tai_tech_role'] ?? '' ),
					'color' => $hex,
				);
			}
		}
		$clusters[] = array(
			'label' => $label,
			'blurb' => sanitize_text_field( $cl_row['tai_cluster_blurb'] ?? '' ),
			'techs' => $techs,
		);
	}
}
?>

<section class="tc-section tc-ai" data-tai-section>
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
				<div class="tai-head-cta">
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

		<?php if ( ! empty( $clusters ) ) : ?>

		<div class="tc-ai-layout">

			<?php /* ── Tab button bar ────────────────────────────────────────── */ ?>
			<div
				class="tc-ai-btnbar"
				role="tablist"
				aria-label="<?php esc_attr_e( 'AI technology clusters', 'technbrains-child' ); ?>"
			>
				<?php foreach ( $clusters as $idx => $cl ) : ?>
					<button
						class="tc-ai-btn<?php echo 0 === $idx ? ' is-active' : ''; ?>"
						role="tab"
						aria-selected="<?php echo 0 === $idx ? 'true' : 'false'; ?>"
						data-tai-tab="<?php echo (int) $idx; ?>"
						type="button"
					>
						<?php echo esc_html( $cl['label'] ); ?>
					</button>
				<?php endforeach; ?>
			</div>

			<?php /* ── Detail panels ─────────────────────────────────────────── */ ?>
			<?php foreach ( $clusters as $idx => $cl ) : ?>
				<div
					class="tc-ai-detail"
					role="tabpanel"
					data-tai-panel="<?php echo (int) $idx; ?>"
					<?php echo $idx > 0 ? 'hidden' : ''; ?>
				>

					<h3 class="tc-ai-detail-title"><?php echo esc_html( $cl['label'] ); ?></h3>

					<?php if ( $cl['blurb'] ) : ?>
						<p class="tc-ai-detail-desc"><?php echo esc_html( $cl['blurb'] ); ?></p>
					<?php endif; ?>

					<?php if ( ! empty( $cl['techs'] ) ) : ?>
					<div class="tc-ai-techlist">
						<?php foreach ( $cl['techs'] as $j => $tech ) : ?>
							<?php
							$tile_tint = tai_hex_rgba( $tech['color'], 0.12 );
							$tile_line = tai_hex_rgba( $tech['color'], 0.28 );
							$abbr      = mb_strtoupper( mb_substr( preg_replace( '/[^a-zA-Z]/', '', $tech['name'] ), 0, 2 ) );
							$delay     = (int) $j * 55;
							?>
							<div
								class="tc-ai-techrow"
								style="animation-delay:<?php echo esc_attr( $delay ); ?>ms"
							>
								<span
									class="tc-tile is-sm"
									aria-hidden="true"
									style="--tile-tint:<?php echo esc_attr( $tile_tint ); ?>;--tile-fg:<?php echo esc_attr( $tech['color'] ); ?>;--tile-line:<?php echo esc_attr( $tile_line ); ?>"
								>
									<?php if ( ! empty( $tech['logo']['id'] ) ) : ?>
										<?php echo wp_get_attachment_image(
											(int) $tech['logo']['id'],
											array( 28, 28 ),
											false,
											array( 'alt' => '', 'loading' => 'lazy' )
										); ?>
									<?php else : ?>
										<?php echo esc_html( $abbr ?: '?' ); ?>
									<?php endif; ?>
								</span>

								<div class="tc-ai-techrow-body">
									<div class="tc-ai-techrow-name"><?php echo esc_html( $tech['name'] ); ?></div>
									<?php if ( $tech['role'] ) : ?>
										<div class="tc-ai-techrow-role"><?php echo esc_html( $tech['role'] ); ?></div>
									<?php endif; ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>

				</div><!-- .tc-ai-detail -->
			<?php endforeach; ?>

		</div><!-- .tc-ai-layout -->

		<?php endif; ?>

		<?php /* ── Bottom note ──────────────────────────────────────────────── */ ?>
		<?php if ( $note ) : ?>
			<div class="tc-ai-note">
				<span><?php echo esc_html( $note ); ?></span>
			</div>
		<?php endif; ?>

	</div><!-- .tc-container -->
</section><!-- .tc-ai -->
