<?php
/**
 * About Us V2 — 09 Experts (circular portraits).
 *
 * Port of ABSExperts from the QA-approved prototype
 * (about-story-copy.jsx:523-542). As in the source, each card shows the
 * portrait and the role only, and the role doubles as the image's alt text.
 *
 * Chapter of: abs_story (About-story.php) — a row of its abs_chapters field,
 * so values are read with get_sub_field() against the current row.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$abs_eyebrow = get_sub_field( 'abs_experts_eyebrow' );
$abs_h2      = get_sub_field( 'abs_experts_h2' );
$abs_lead    = get_sub_field( 'abs_experts_lead' );
$abs_experts = get_sub_field( 'abs_experts' );

if ( empty( $abs_experts ) ) {
	return;
}
?>
<section class="abs-chapter" data-screen-label="09 Experts">
	<div class="abs-wrap">
		<div class="abs-split">
			<div class="abs-split-head abs-rev">
				<?php if ( $abs_eyebrow ) : ?>
					<span class="abs-eyebrow2"><?php echo esc_html( $abs_eyebrow ); ?></span>
				<?php endif; ?>
				<?php if ( $abs_h2 ) : ?>
					<h2 class="abs-h2"><?php echo esc_html( $abs_h2 ); ?></h2>
				<?php endif; ?>
				<?php if ( $abs_lead ) : ?>
					<p class="abs-lead"><?php echo esc_html( $abs_lead ); ?></p>
				<?php endif; ?>
			</div>
			<div class="abs-expring abs-split-body abs-rev d1">
				<?php
				foreach ( $abs_experts as $abs_expert ) {
					$abs_role  = isset( $abs_expert['role'] ) ? $abs_expert['role'] : '';
					$abs_image = isset( $abs_expert['image'] ) ? $abs_expert['image'] : '';

					$abs_img_id  = ( is_array( $abs_image ) && ! empty( $abs_image['ID'] ) ) ? (int) $abs_image['ID'] : 0;
					$abs_img_url = ( is_array( $abs_image ) && ! empty( $abs_image['url'] ) ) ? $abs_image['url'] : '';

					if ( ! $abs_img_url && '' === trim( (string) $abs_role ) ) {
						continue;
					}

					$abs_img_w = ( is_array( $abs_image ) && ! empty( $abs_image['width'] ) ) ? (int) $abs_image['width'] : 0;
					$abs_img_h = ( is_array( $abs_image ) && ! empty( $abs_image['height'] ) ) ? (int) $abs_image['height'] : 0;
					?>
					<div class="abs-expc">
						<?php if ( $abs_img_url ) : ?>
							<div class="abs-expc-photo">
								<?php
								if ( $abs_img_id ) {
									// Rendered in a 250px circle (500px at 2x). Going through
									// wp_get_attachment_image() emits srcset/sizes so the browser
									// picks a ~300-768px file instead of decoding the multi-MB
									// original — which is what made the greyscale/scale hover
									// repaint janky.
									echo wp_get_attachment_image(
										$abs_img_id,
										'medium_large',
										false,
										array(
											'alt'      => $abs_role,
											'sizes'    => '(max-width: 760px) 45vw, 250px',
											'loading'  => 'lazy',
											'decoding' => 'async',
										)
									);
								} else {
									printf(
										'<img src="%1$s" alt="%2$s"%3$s%4$s loading="lazy" decoding="async" />',
										esc_url( $abs_img_url ),
										esc_attr( $abs_role ),
										$abs_img_w ? ' width="' . esc_attr( $abs_img_w ) . '"' : '',
										$abs_img_h ? ' height="' . esc_attr( $abs_img_h ) . '"' : ''
									);
								}
								?>
							</div>
						<?php endif; ?>
						<?php if ( $abs_role ) : ?>
							<div class="abs-expc-role"><?php echo esc_html( $abs_role ); ?></div>
						<?php endif; ?>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</section>
