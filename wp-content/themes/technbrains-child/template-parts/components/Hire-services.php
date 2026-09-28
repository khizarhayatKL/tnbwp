<?php
/**
 * Component: Hire Developer — Services (HDServices)
 * Layout   : hd_services (ACF Flexible Content)
 *
 * Fields:
 *   hdsvc_eyebrow         — text
 *   hdsvc_heading         — text   (plain part)
 *   hdsvc_heading_accent  — text   (accent span)
 *   hdsvc_sub             — textarea
 *   hdsvc_services        — repeater
 *     hdsvc_icon          — image (array)
 *     hdsvc_title         — text
 *     hdsvc_desc          — textarea
 *     hdsvc_link_text     — text   (optional)
 *     hdsvc_link_url      — url    (optional)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$eyebrow        = get_sub_field( 'hdsvc_eyebrow' )        ?: '';
$heading        = get_sub_field( 'hdsvc_heading' )        ?: '';
$heading_accent = get_sub_field( 'hdsvc_heading_accent' ) ?: '';
$sub            = get_sub_field( 'hdsvc_sub' )            ?: '';

$services = [];
if ( have_rows( 'hdsvc_services' ) ) {
	while ( have_rows( 'hdsvc_services' ) ) {
		the_row();
		$services[] = [
			'icon'       => get_sub_field( 'hdsvc_icon' ),
			'title'      => get_sub_field( 'hdsvc_title' )     ?: '',
			'desc'       => get_sub_field( 'hdsvc_desc' )      ?: '',
			'link_text'  => get_sub_field( 'hdsvc_link_text' ) ?: '',
			'link_url'   => get_sub_field( 'hdsvc_link_url' )  ?: '',
		];
	}
}

if ( empty( $services ) ) {
	return;
}
?>
<section class="hd-services">
	<div class="hd-container">
		<div class="hd-services-shell">

			<div class="hd-section-head">
				<?php if ( $eyebrow ) : ?>
				<div class="hd-eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
				<?php endif; ?>

				<?php if ( $heading || $heading_accent ) : ?>
				<h2 class="hd-h2">
					<?php echo esc_html( $heading ); ?>
					<?php if ( $heading_accent ) : ?>
					<span class="hd-accent"><?php echo esc_html( $heading_accent ); ?></span>
					<?php endif; ?>
				</h2>
				<?php endif; ?>

				<?php if ( $sub ) : ?>
				<p class="hd-sub"><?php echo esc_html( $sub ); ?></p>
				<?php endif; ?>
			</div>

			<div class="hd-services-grid">
				<?php
				// Inline HTML allowed in the description (anchors as authored in content).
				$desc_kses = [
					'a'      => [ 'href' => true, 'target' => true, 'rel' => true, 'title' => true ],
					'br'     => [],
					'strong' => [],
					'em'     => [],
				];
				foreach ( $services as $svc ) :
					$has_link = ! empty( $svc['link_url'] );
				?>
				<div class="hd-svc-item">

					<div class="hd-svc-icon">
						<?php if ( ! empty( $svc['icon'] ) ) :
							echo wp_get_attachment_image(
								(int) $svc['icon']['ID'],
								[ 22, 22 ],
								false,
								[ 'class' => 'hd-svc-icon-img', 'alt' => esc_attr( $svc['title'] ), 'loading' => 'lazy' ]
							);
						endif; ?>
					</div>

					<div class="hd-svc-text">
						<?php if ( $svc['title'] ) : ?>
						<div class="hd-svc-title">
							<?php if ( $has_link ) : ?>
							<a href="<?php echo esc_url( $svc['link_url'] ); ?>"><?php echo esc_html( $svc['title'] ); ?></a>
							<?php else : ?>
							<?php echo esc_html( $svc['title'] ); ?>
							<?php endif; ?>
						</div>
						<?php endif; ?>

						<?php if ( $svc['desc'] ) : ?>
						<div class="hd-svc-desc">
							<?php echo wp_kses( $svc['desc'], $desc_kses ); ?>
						</div>
						<?php endif; ?>
					</div>

				</div>
				<?php endforeach; ?>
			</div>

		</div>
	</div>
</section>
