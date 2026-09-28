<?php
/**
 * Construction Software — Tech stack (tabbed by layer).
 *
 * Layout : cn_stack (ACF Flexible Content)
 * Fields : cns_eyebrow, cns_heading, cns_anchor,
 *          cns_layers{ cns_layer_label, cns_layer_caption,
 *                      cns_layer_items{ cns_item_logo, cns_item_link } }
 * CSS    : assets/css/construction.css (.cn-stack*) — shared with cn_integrations
 * JS     : assets/js/construction.js (data-cn-tabs / data-cn-tab / data-cn-panel)
 *
 * There is no separate name field — cns_item_link's own title is the chip's label, and the
 * chip itself becomes the <a> when that link has a real URL (matching the "one CTA is one link
 * field" rule elsewhere on this page). A tool with nowhere to link to still needs a URL for ACF
 * to keep the title at all (see the field's own instructions); '#' is what that looks like, and
 * the chip renders as plain text exactly as it would with no link field at all.
 *
 * Same tab component as the integrations wall, deliberately: one set of .cn-stack* rules and one tab
 * initialiser serve both sections. The copy deck asks for the two to stay distinguishable, which
 * they are by content — integrations name third-party platforms and carry a sync-direction caption,
 * this names build tools by layer.
 *
 * Logos are uploaded attachments, not cdn.simpleicons.org requests. A row without one falls back to
 * a lettermark from its own name, so the grid never has a hole — and several rows here have no logo
 * by design ("Local-first storage", "Message queues", "Unit").
 *
 * Only the first panel is open; the rest carry the hidden attribute that construction.js toggles.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cns_eyebrow = (string) get_sub_field( 'cns_eyebrow' );
$cns_heading = tnb_accent_heading( (string) get_sub_field( 'cns_heading' ) );
$cns_anchor  = sanitize_title( (string) get_sub_field( 'cns_anchor' ) );
$cns_layers  = (array) get_sub_field( 'cns_layers' );

$cns_kses = tnb_cn_allowed_html();

// A layer with no label cannot be a tab, so those are dropped before ids are generated — otherwise
// a skipped layer would leave a gap in the aria-controls pairing.
$cns_layers = array_values(
	array_filter(
		$cns_layers,
		static function ( $layer ) {
			return '' !== trim( (string) ( $layer['cns_layer_label'] ?? '' ) );
		}
	)
);

if ( ! $cns_layers ) {
	return;
}

$cns_uid = 'cn-stack-' . wp_unique_id();
?>
<section class="dt-section gray cn-stack-sec"<?php echo '' !== $cns_anchor ? ' id="' . esc_attr( $cns_anchor ) . '"' : ''; ?>>
	<div class="container">
		<?php if ( '' !== $cns_eyebrow || '' !== $cns_heading ) : ?>
			<div class="dt-head dt-center dt-rev">
				<?php if ( '' !== $cns_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $cns_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $cns_heading ) : ?>
					<h2 class="dt-h2"><?php echo $cns_heading; // Sanitised by tnb_accent_heading(). ?></h2>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="cn-stack dt-rev" data-cn-tabs>
			<div class="cn-stack-tabs" role="tablist" aria-label="<?php esc_attr_e( 'Tech stack categories', 'technbrains-child' ); ?>">
				<?php foreach ( $cns_layers as $cns_i => $cns_layer ) : ?>
					<button
						type="button"
						role="tab"
						id="<?php echo esc_attr( $cns_uid . '-tab-' . $cns_i ); ?>"
						class="cn-stack-tab<?php echo 0 === $cns_i ? ' is-active' : ''; ?>"
						aria-selected="<?php echo 0 === $cns_i ? 'true' : 'false'; ?>"
						aria-controls="<?php echo esc_attr( $cns_uid . '-panel-' . $cns_i ); ?>"
						tabindex="<?php echo 0 === $cns_i ? '0' : '-1'; ?>"
						data-cn-tab
					><?php echo esc_html( (string) $cns_layer['cns_layer_label'] ); ?></button>
				<?php endforeach; ?>
			</div>

			<?php
			foreach ( $cns_layers as $cns_i => $cns_layer ) :
				$cns_caption = trim( (string) ( $cns_layer['cns_layer_caption'] ?? '' ) );
				$cns_items   = (array) ( $cns_layer['cns_layer_items'] ?? array() );
				?>
				<div
					class="cn-stack-panel"
					role="tabpanel"
					id="<?php echo esc_attr( $cns_uid . '-panel-' . $cns_i ); ?>"
					aria-labelledby="<?php echo esc_attr( $cns_uid . '-tab-' . $cns_i ); ?>"
					tabindex="0"
					data-cn-panel
					<?php echo 0 === $cns_i ? '' : 'hidden'; ?>
				>
					<?php if ( '' !== $cns_caption ) : ?>
						<p class="cn-stack-cap"><?php echo wp_kses( $cns_caption, $cns_kses ); ?></p>
					<?php endif; ?>

					<?php if ( $cns_items ) : ?>
						<div class="cn-stack-chips">
							<?php
							$cns_pos = 0;

							foreach ( $cns_items as $cns_item ) :
								// The chip's label is the link field's own title now — there is no
								// separate name field, so a row with no title has nothing to show.
								$cns_link = $cns_item['cns_item_link'] ?? null;
								$cns_name = is_array( $cns_link ) ? trim( (string) ( $cns_link['title'] ?? '' ) ) : '';

								if ( '' === $cns_name ) {
									continue;
								}

								$cns_logo = $cns_item['cns_item_logo'] ?? array();

								$cns_url = is_array( $cns_link ) ? trim( (string) ( $cns_link['url'] ?? '' ) ) : '';
								$cns_tgt = is_array( $cns_link ) ? (string) ( $cns_link['target'] ?? '' ) : '';

								if ( '#' === $cns_url ) {
									$cns_url = '';
								}

								$cns_tag = '' !== $cns_url ? 'a' : 'div';
								?>
								<<?php echo $cns_tag; // 'a' or 'div', both hard-coded above. ?>
									class="cn-stack-chip"
									style="--cn-chip-i:<?php echo (int) $cns_pos; ?>"
									<?php if ( '' !== $cns_url ) : ?>
										href="<?php echo esc_url( $cns_url ); ?>"
										<?php echo '_blank' === $cns_tgt ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>
									<?php endif; ?>
								>
									<?php if ( ! empty( $cns_logo['id'] ) ) : ?>
										<?php
										echo wp_get_attachment_image(
											(int) $cns_logo['id'],
											'thumbnail',
											false,
											array(
												'class'    => 'cn-stack-logo',
												'alt'      => '',
												'loading'  => 'lazy',
												'decoding' => 'async',
											)
										);
										?>
									<?php else : ?>
										<span class="cn-stack-logo cn-stack-logo-txt" aria-hidden="true"><?php
											echo esc_html( mb_substr( $cns_name, 0, 1 ) );
										?></span>
									<?php endif; ?>
									<span class="cn-stack-chip-n"><?php echo esc_html( $cns_name ); ?></span>
								</<?php echo $cns_tag; ?>>
								<?php
								$cns_pos++;
							endforeach;
							?>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
