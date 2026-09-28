<?php
/**
 * Construction Software — Where AI actually works.
 *
 * Layout : cn_ai (ACF Flexible Content)
 * Fields : cnai_eyebrow, cnai_heading, cnai_sub, cnai_anchor,
 *          cnai_donuts{ cnai_donut_value, cnai_donut_label, cnai_donut_delta, cnai_donut_source },
 *          cnai_bars_title, cnai_bars{ cnai_bar_label, cnai_bar_value }, cnai_bars_source,
 *          cnai_read, cnai_use_eyebrow, cnai_use_heading,
 *
 * cnai_donut_source and cnai_bars_source are link fields, not text — every figure here is
 * someone else's research, and this is the citation. With no URL they still degrade to plain
 * text, matching how the datacost tiles handle the same shape of field.
 *          cnai_cards{ cnai_card_icon, cnai_card_title, cnai_card_text },
 *          cnai_risk_tag, cnai_risk_text
 * CSS    : assets/css/construction.css (.cn-ai-*)
 * JS     : none — the .dt-rev reveal in components.js is the only behaviour.
 *
 * Every figure here is third-party research, and the copy deck is explicit that the two statistics
 * come from different populations answering different questions and must not be merged. That is why
 * each donut carries its own source line and the read-across paragraph sits outside them rather
 * than being folded into a caption.
 *
 * The donut ring and the bar fills are drawn from --val and --w rather than inline width or
 * stroke declarations, so the geometry stays in the stylesheet. The percentage is also printed as
 * text inside each ring: a ring alone conveys nothing to a screen reader, and a conic-gradient
 * cannot be read at all.
 *
 * Values are stored as plain numbers and the unit is markup. That keeps the figure machine-readable
 * and lets the design set the % at a smaller size without an editor having to split the string.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cnai_eyebrow = (string) get_sub_field( 'cnai_eyebrow' );
$cnai_heading = tnb_accent_heading( (string) get_sub_field( 'cnai_heading' ) );
$cnai_sub     = (string) get_sub_field( 'cnai_sub' );
$cnai_anchor  = sanitize_title( (string) get_sub_field( 'cnai_anchor' ) );

$cnai_donuts      = (array) get_sub_field( 'cnai_donuts' );
$cnai_bars_title  = (string) get_sub_field( 'cnai_bars_title' );
$cnai_bars        = (array) get_sub_field( 'cnai_bars' );

/**
 * Reads a source link field down to a label and an optional URL. A bare '#' is a
 * placeholder, not a destination, matching how every other link field on this page
 * treats it.
 *
 * @param mixed $link ACF link value.
 * @return array{label:string,url:string}
 */
$cnai_source = static function ( $link ): array {
	$url = is_array( $link ) ? trim( (string) ( $link['url'] ?? '' ) ) : '';

	return array(
		'label' => is_array( $link ) ? trim( (string) ( $link['title'] ?? '' ) ) : '',
		'url'   => '#' === $url ? '' : $url,
	);
};

$cnai_bars_source = $cnai_source( get_sub_field( 'cnai_bars_source' ) );

$cnai_read        = (string) get_sub_field( 'cnai_read' );
$cnai_use_eyebrow = (string) get_sub_field( 'cnai_use_eyebrow' );
$cnai_use_heading = (string) get_sub_field( 'cnai_use_heading' );
$cnai_cards       = (array) get_sub_field( 'cnai_cards' );

$cnai_risk_tag  = (string) get_sub_field( 'cnai_risk_tag' );
$cnai_risk_text = (string) get_sub_field( 'cnai_risk_text' );

$cnai_kses = tnb_cn_allowed_html();

// Icon per position for the use-case cards, in the approved order. A row's own cnai_card_icon
// image overrides its position-mapped default (tnb_cn_icon_slot()'s established fallback pattern).
$cnai_icons = array( 'gauge', 'doc-alt', 'camera', 'clipboard-flag', 'chart' );

/**
 * Clamps a percentage to 0-100.
 *
 * The value reaches a custom property that drives the ring sweep and the bar width, so a figure
 * outside the range would draw a ring past full or a bar out of its track.
 *
 * @param mixed $value Raw field value.
 * @return int
 */
$cnai_pct = static function ( $value ): int {
	return max( 0, min( 100, (int) $value ) );
};

if ( ! $cnai_donuts && ! $cnai_cards && '' === $cnai_risk_text ) {
	return;
}
?>
<section class="dt-section gray cn-ai-sec"<?php echo '' !== $cnai_anchor ? ' id="' . esc_attr( $cnai_anchor ) . '"' : ''; ?>>
	<div class="container">
		<?php if ( '' !== $cnai_eyebrow || '' !== $cnai_heading || '' !== $cnai_sub ) : ?>
			<div class="dt-head dt-center dt-rev">
				<?php if ( '' !== $cnai_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $cnai_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $cnai_heading ) : ?>
					<h2 class="dt-h2"><?php echo $cnai_heading; // Sanitised by tnb_accent_heading(). ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $cnai_sub ) : ?>
					<p class="dt-sub"><?php echo wp_kses( $cnai_sub, $cnai_kses ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( $cnai_donuts || $cnai_bars ) : ?>
			<div class="cn-ai-panel dt-rev">
				<div class="cn-ai-viz">
					<?php
					foreach ( $cnai_donuts as $cnai_i => $cnai_donut ) :
						$cnai_val   = $cnai_pct( $cnai_donut['cnai_donut_value'] ?? 0 );
						$cnai_label = trim( (string) ( $cnai_donut['cnai_donut_label'] ?? '' ) );
						$cnai_delta = trim( (string) ( $cnai_donut['cnai_donut_delta'] ?? '' ) );
						$cnai_src   = $cnai_source( $cnai_donut['cnai_donut_source'] ?? null );

						if ( '' === $cnai_label ) {
							continue;
						}
						?>
						<div class="cn-ai-donut dt-rev" style="--val:<?php echo (int) $cnai_val; ?>%;--cn-i:<?php echo (int) $cnai_i; ?>">
							<div class="cn-ai-donut-ring">
								<span class="cn-ai-donut-num"><?php
									echo esc_html( (string) $cnai_val );
								?><i>%</i></span>
							</div>
							<div class="cn-ai-donut-cap">
								<b><?php echo wp_kses( $cnai_label, $cnai_kses ); ?></b>
								<?php if ( '' !== $cnai_delta ) : ?>
									<span class="cn-ai-donut-from"><?php echo esc_html( $cnai_delta ); ?></span>
								<?php endif; ?>
								<?php if ( '' !== $cnai_src['label'] ) : ?>
									<span class="cn-ai-donut-src"><?php
										if ( '' !== $cnai_src['url'] ) {
											printf(
												'<a href="%1$s" target="_blank" rel="noopener noreferrer">%2$s</a>',
												esc_url( $cnai_src['url'] ),
												esc_html( $cnai_src['label'] )
											);
										} else {
											echo esc_html( $cnai_src['label'] );
										}
									?></span>
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>

					<?php if ( $cnai_bars ) : ?>
						<div class="cn-ai-bars dt-rev">
							<?php if ( '' !== $cnai_bars_title ) : ?>
								<span class="cn-ai-bars-t"><?php echo esc_html( $cnai_bars_title ); ?></span>
							<?php endif; ?>

							<?php
							foreach ( $cnai_bars as $cnai_bar ) :
								$cnai_bl = trim( (string) ( $cnai_bar['cnai_bar_label'] ?? '' ) );
								$cnai_bv = $cnai_pct( $cnai_bar['cnai_bar_value'] ?? 0 );

								if ( '' === $cnai_bl ) {
									continue;
								}
								?>
								<div class="cn-ai-bar">
									<span class="cn-ai-bar-l"><?php echo esc_html( $cnai_bl ); ?></span>
									<?php
									// The track is decorative — the figure beside it carries the value, so a
									// screen reader is not asked to interpret an empty span.
									?>
									<span class="cn-ai-bar-track" aria-hidden="true">
										<span class="cn-ai-bar-fill" style="--w:<?php echo (int) $cnai_bv; ?>%"></span>
									</span>
									<span class="cn-ai-bar-v"><?php echo esc_html( (string) $cnai_bv ); ?>%</span>
								</div>
							<?php endforeach; ?>

							<?php if ( '' !== $cnai_bars_source['label'] ) : ?>
								<span class="cn-ai-bars-src"><?php
									if ( '' !== $cnai_bars_source['url'] ) {
										printf(
											'<a href="%1$s" target="_blank" rel="noopener noreferrer">%2$s</a>',
											esc_url( $cnai_bars_source['url'] ),
											esc_html( $cnai_bars_source['label'] )
										);
									} else {
										echo esc_html( $cnai_bars_source['label'] );
									}
								?></span>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( '' !== $cnai_read ) : ?>
			<p class="cn-ai-read dt-rev"><?php echo wp_kses( $cnai_read, $cnai_kses ); ?></p>
		<?php endif; ?>

		<?php if ( $cnai_cards ) : ?>
			<?php if ( '' !== $cnai_use_eyebrow || '' !== $cnai_use_heading ) : ?>
				<div class="cn-ai-usehead dt-rev">
					<?php if ( '' !== $cnai_use_eyebrow ) : ?>
						<span class="eyebrow"><?php echo esc_html( $cnai_use_eyebrow ); ?></span>
					<?php endif; ?>
					<?php if ( '' !== $cnai_use_heading ) : ?>
						<h3><?php echo wp_kses( $cnai_use_heading, $cnai_kses ); ?></h3>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<div class="cn-ai-grid">
				<?php
				foreach ( $cnai_cards as $cnai_ci => $cnai_card ) :
					$cnai_ct = trim( (string) ( $cnai_card['cnai_card_title'] ?? '' ) );
					$cnai_cd = trim( (string) ( $cnai_card['cnai_card_text'] ?? '' ) );

					if ( '' === $cnai_ct && '' === $cnai_cd ) {
						continue;
					}
					?>
					<div class="cn-ai-card dt-rev" style="--cn-i:<?php echo (int) $cnai_ci; ?>">
						<span class="cn-ai-card-ic"><?php
							echo tnb_cn_icon_slot( $cnai_icons, (int) $cnai_ci, $cnai_card['cnai_card_icon'] ?? null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- self-escaping, see tnb_cn_icon_slot().
						?></span>
						<?php if ( '' !== $cnai_ct ) : ?>
							<h4><?php echo esc_html( $cnai_ct ); ?></h4>
						<?php endif; ?>
						<?php if ( '' !== $cnai_cd ) : ?>
							<p><?php echo wp_kses( $cnai_cd, $cnai_kses ); ?></p>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php if ( '' !== $cnai_risk_text ) : ?>
			<div class="cn-ai-risk dt-rev">
				<?php if ( '' !== $cnai_risk_tag ) : ?>
					<span class="cn-ai-risk-tag"><?php echo esc_html( $cnai_risk_tag ); ?></span>
				<?php endif; ?>
				<p><?php echo wp_kses_post( $cnai_risk_text ); ?></p>
			</div>
		<?php endif; ?>
	</div>
</section>
