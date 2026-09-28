<?php
/**
 * Case Study — Our Solution (tabbed capability panels).
 *
 * The rail and the stage are index-paired: assets/js/case-study.js matches a tab's data-i to
 * the panel's data-i, so both loops have to walk the same repeater in the same order. The first
 * row is the open panel, which is why is-active is written from the index rather than stored.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cs_eyebrow = (string) get_field( 'cs_sol_eyebrow' );
$cs_h2      = (string) get_field( 'cs_sol_h2' );
$cs_lede    = (string) get_field( 'cs_sol_lede' );
$cs_caps    = (array) get_field( 'cs_caps' );
$cs_allowed = tnb_cs_allowed_html();

$cs_cap_icons = array(
	'sol-mobile',
	'sol-portal',
	'sol-capacity',
	'sol-pricing',
	'sol-dashboard',
);
?>
<section class="cs-section cs-soljourney" data-screen-label="Solution">
	<div class="cs-wrap">
		<span class="cs-node cs-node--right" data-thread-node="solution"><span class="cs-node-label">Solution</span></span>
		<div class="cs-solj-head cs-reveal" style="text-align:left">
			<?php if ( '' !== $cs_eyebrow ) : ?>
				<span class="cs-eyebrow"><?php echo esc_html( $cs_eyebrow ); ?></span>
			<?php endif; ?>
			<?php if ( '' !== $cs_h2 ) : ?>
				<h2 class="cs-h2"  ><?php echo wp_kses( $cs_h2, $cs_allowed ); ?></h2>
			<?php endif; ?>
			<?php if ( '' !== $cs_lede ) : ?>
				<p class="cs-body cs-lede-lg"  ><?php echo wp_kses( $cs_lede, $cs_allowed ); ?></p>
			<?php endif; ?>
		</div>

		<?php if ( $cs_caps ) : ?>
			<div class="cs-solx2 cs-reveal d1" id="cs-solx2">
				<div class="cs-solx2-rail" role="tablist" aria-label="Platform capabilities">
					<?php
					foreach ( $cs_caps as $cs_i => $cs_cap ) :
						// The rail gives one line, so the design shortens some labels there. Falls
						// back to the title when no short form is set.
						$cs_tab = (string) ( $cs_cap['cs_cap_tab'] ?? '' );
						$cs_tab = '' !== $cs_tab ? $cs_tab : (string) ( $cs_cap['cs_cap_title'] ?? '' );
						?>
						<?php $cs_open = 0 === (int) $cs_i; ?>
						<button class="cs-solx2-tab<?php echo $cs_open ? ' is-active' : ''; ?>"
							type="button"
							role="tab"
							id="cs-sol-tab-<?php echo esc_attr( (string) (int) $cs_i ); ?>"
							aria-controls="cs-sol-panel-<?php echo esc_attr( (string) (int) $cs_i ); ?>"
							aria-selected="<?php echo $cs_open ? 'true' : 'false'; ?>"
							tabindex="<?php echo $cs_open ? '0' : '-1'; ?>"
							data-i="<?php echo esc_attr( (string) (int) $cs_i ); ?>">
							<span class="cs-solx2-tab-n" aria-hidden="true"><?php echo esc_html( tnb_cs_index( (int) $cs_i ) ); ?></span>
							<span class="cs-solx2-tab-t"><?php echo esc_html( $cs_tab ); ?></span>
						</button>
					<?php endforeach; ?>
				</div>
				<div class="cs-solx2-stage">
					<?php foreach ( $cs_caps as $cs_i => $cs_cap ) : ?>
						<div class="cs-solx2-panel<?php echo 0 === (int) $cs_i ? ' is-active' : ''; ?>"
							role="tabpanel"
							id="cs-sol-panel-<?php echo esc_attr( (string) (int) $cs_i ); ?>"
							aria-labelledby="cs-sol-tab-<?php echo esc_attr( (string) (int) $cs_i ); ?>"
							tabindex="0"
							data-i="<?php echo esc_attr( (string) (int) $cs_i ); ?>">
							<span class="cs-solx2-ic" aria-hidden="true"><?php
								echo tnb_cs_icon_slot( $cs_cap_icons, (int) $cs_i, $cs_cap['cs_cap_icon'] ?? null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- inline SVG from the theme, or an escaped <img>.
							?></span>
							<h3><?php echo esc_html( (string) ( $cs_cap['cs_cap_title'] ?? '' ) ); ?></h3>
							<p><?php echo wp_kses( (string) ( $cs_cap['cs_cap_desc'] ?? '' ), $cs_allowed ); ?></p>
							<?php if ( ! empty( $cs_cap['cs_cap_result'] ) ) : ?>
								<?php
								// The red arrow badge is real markup, not a ::before glyph, so the mark
								// is the theme's own SVG rather than whatever "\2192" resolves to in the
								// visitor's font stack. Decorative — the result text beside it carries
								// the meaning — so the span is aria-hidden.
								?>
								<div class="cs-solx2-res"><span class="cs-solx2-res-ic" aria-hidden="true"><?php
									echo tnb_cs_icon( 'ba-arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- inline SVG from the theme.
								?></span><?php echo wp_kses( (string) $cs_cap['cs_cap_result'], $cs_allowed ); ?></div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
