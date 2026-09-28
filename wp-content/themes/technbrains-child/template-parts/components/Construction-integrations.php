<?php
/**
 * Construction Software — Integrations (tabbed logo wall).
 *
 * Layout : cn_integrations (ACF Flexible Content)
 * Fields : cni_eyebrow, cni_heading, cni_sub, cni_anchor,
 *          cni_groups{ cni_group_label, cni_group_caption,
 *                      cni_group_items{ cni_item_name, cni_item_logo } }
 * CSS    : assets/css/construction.css (.cn-stack*)
 * JS     : assets/js/construction.js (data-cn-tabs / data-cn-tab / data-cn-panel)
 *
 * Three groups behind tabs: the platform teams work in, the accounting system, and the field data
 * that reaches neither. The copy deck asks for this to stay visually distinct from the tech stack
 * table further down the page, which is why the groups carry a caption line explaining the
 * direction of sync rather than being a bare logo grid.
 *
 * Logos are uploaded images, not the prototype's cdn.simpleicons.org hotlinks. Runtime requests to
 * a third-party icon CDN would add an origin to the critical path and put the wall at the mercy of
 * someone else's uptime. A row with no logo falls back to a lettermark built from its own name, so
 * the wall never has a hole in it.
 *
 * Only the first panel is open on load. The rest carry the hidden attribute, which construction.js
 * toggles — the panels must not be given a display rule that outranks it.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cni_eyebrow = (string) get_sub_field( 'cni_eyebrow' );
$cni_heading = tnb_accent_heading( (string) get_sub_field( 'cni_heading' ) );
$cni_sub     = (string) get_sub_field( 'cni_sub' );
$cni_anchor  = sanitize_title( (string) get_sub_field( 'cni_anchor' ) );
$cni_groups  = (array) get_sub_field( 'cni_groups' );

$cni_kses = tnb_cn_allowed_html();

// Only groups that have a label can be a tab, so they are filtered before the ids are generated —
// otherwise a skipped group would leave a gap in the aria-controls numbering.
$cni_groups = array_values(
	array_filter(
		$cni_groups,
		static function ( $group ) {
			return '' !== trim( (string) ( $group['cni_group_label'] ?? '' ) );
		}
	)
);

if ( ! $cni_groups ) {
	return;
}

// Unique per instance, so two integration sections on one page cannot collide on ids.
$cni_uid = 'cn-int-' . wp_unique_id();
?>
<section class="dt-section cn-int-sec"<?php echo '' !== $cni_anchor ? ' id="' . esc_attr( $cni_anchor ) . '"' : ''; ?>>
	<div class="container">
		<?php if ( '' !== $cni_eyebrow || '' !== $cni_heading || '' !== $cni_sub ) : ?>
			<div class="dt-head dt-center dt-rev">
				<?php if ( '' !== $cni_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $cni_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $cni_heading ) : ?>
					<h2 class="dt-h2"><?php echo $cni_heading; // Sanitised by tnb_accent_heading(). ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $cni_sub ) : ?>
					<p class="dt-sub"><?php echo wp_kses( $cni_sub, $cni_kses ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="cn-stack dt-rev" data-cn-tabs>
			<div class="cn-stack-tabs" role="tablist" aria-label="<?php esc_attr_e( 'Integration directions', 'technbrains-child' ); ?>">
				<?php foreach ( $cni_groups as $cni_i => $cni_group ) : ?>
					<button
						type="button"
						role="tab"
						id="<?php echo esc_attr( $cni_uid . '-tab-' . $cni_i ); ?>"
						class="cn-stack-tab<?php echo 0 === $cni_i ? ' is-active' : ''; ?>"
						aria-selected="<?php echo 0 === $cni_i ? 'true' : 'false'; ?>"
						aria-controls="<?php echo esc_attr( $cni_uid . '-panel-' . $cni_i ); ?>"
						tabindex="<?php echo 0 === $cni_i ? '0' : '-1'; ?>"
						data-cn-tab
					><?php echo esc_html( (string) $cni_group['cni_group_label'] ); ?></button>
				<?php endforeach; ?>
			</div>

			<?php
			foreach ( $cni_groups as $cni_i => $cni_group ) :
				$cni_caption = trim( (string) ( $cni_group['cni_group_caption'] ?? '' ) );
				$cni_items   = (array) ( $cni_group['cni_group_items'] ?? array() );
				?>
				<div
					class="cn-stack-panel"
					role="tabpanel"
					id="<?php echo esc_attr( $cni_uid . '-panel-' . $cni_i ); ?>"
					aria-labelledby="<?php echo esc_attr( $cni_uid . '-tab-' . $cni_i ); ?>"
					tabindex="0"
					data-cn-panel
					<?php echo 0 === $cni_i ? '' : 'hidden'; ?>
				>
					<?php if ( '' !== $cni_caption ) : ?>
						<p class="cn-stack-cap"><?php echo wp_kses( $cni_caption, $cni_kses ); ?></p>
					<?php endif; ?>

					<?php if ( $cni_items ) : ?>
						<div class="cn-stack-chips">
							<?php
							$cni_pos = 0;

							foreach ( $cni_items as $cni_item ) :
								$cni_name = trim( (string) ( $cni_item['cni_item_name'] ?? '' ) );

								if ( '' === $cni_name ) {
									continue;
								}

								$cni_logo = $cni_item['cni_item_logo'] ?? array();
								?>
								<?php
								// The stagger index goes out as a custom property rather than an inline
								// animation-delay, so the timing curve stays in the stylesheet.
								?>
								<div class="cn-stack-chip" style="--cn-chip-i:<?php echo (int) $cni_pos; ?>">
									<?php if ( ! empty( $cni_logo['id'] ) ) : ?>
										<?php
										echo wp_get_attachment_image(
											(int) $cni_logo['id'],
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
											echo esc_html( mb_substr( $cni_name, 0, 1 ) );
										?></span>
									<?php endif; ?>
									<span class="cn-stack-chip-n"><?php echo esc_html( $cni_name ); ?></span>
								</div>
								<?php
								$cni_pos++;
							endforeach;
							?>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
