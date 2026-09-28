<?php
/**
 * Dedicated Teams — Available developers (dark card grid).
 *
 * Layout : dt_devs (ACF Flexible Content)
 * Fields : dtd_eyebrow, dtd_heading, dtd_sub, dtd_anchor, dtd_head_align, dtd_badge,
 *          dtd_devs{ dtd_dev_photo, dtd_dev_role, dtd_dev_exp, dtd_dev_tz,
 *                    dtd_tags{ dtd_tag_name, dtd_tag_link } }
 * CSS    : assets/css/components.css (.dt-devs, .dt-dev-*)
 * JS     : assets/js/components.js — the shared .dt-rev reveal only.
 *
 * Field names mirror hd_available's hdav_dev_* set on purpose: the two
 * "available developers" sections describe the same object, so an editor moving
 * between them meets the same vocabulary. Nothing is shared beyond the naming —
 * hd_available is a duplicated-card marquee, this is a static grid.
 *
 * The availability badge is one section-level string rather than a per-card
 * field because every approved card carries the same text; a per-card field
 * would be eight times the authoring for no design difference. Empty hides it.
 *
 * Photos are attachments, never remote URLs: the approved build pulls portraits
 * from Unsplash, which cannot ship inside a template. A card with no photo drops
 * the whole .dt-dev-photo slot rather than reserving an empty circle.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$dtd_eyebrow = (string) get_sub_field( 'dtd_eyebrow' );
$dtd_heading = (string) get_sub_field( 'dtd_heading' );
$dtd_sub     = (string) get_sub_field( 'dtd_sub' );
$dtd_anchor  = sanitize_title( (string) get_sub_field( 'dtd_anchor' ) );
$dtd_align   = (string) get_sub_field( 'dtd_head_align' );
$dtd_badge   = (string) get_sub_field( 'dtd_badge' );
$dtd_devs    = (array) get_sub_field( 'dtd_devs' );

if ( ! $dtd_devs ) {
	return;
}

$dtd_kses = array(
	'br'   => array(),
	'span' => array( 'class' => true ),
);

$dtd_head_cl = 'dt-head dt-rev' . ( 'center' === $dtd_align ? ' dt-center' : ' dt-head-left' );
?>
<section class="dt-section dt-devs"<?php echo '' !== $dtd_anchor ? ' id="' . esc_attr( $dtd_anchor ) . '"' : ''; ?>>
	<div class="container">
		<?php if ( '' !== $dtd_eyebrow || '' !== $dtd_heading || '' !== $dtd_sub ) : ?>
			<div class="<?php echo esc_attr( $dtd_head_cl ); ?>">
				<?php if ( '' !== $dtd_eyebrow ) : ?>
					<div class="eyebrow"><?php echo esc_html( $dtd_eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( '' !== $dtd_heading ) : ?>
					<h2 class="dt-h2 dt-h2-1l"><?php echo wp_kses( $dtd_heading, $dtd_kses ); ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $dtd_sub ) : ?>
					<p class="dt-sub"><?php echo wp_kses( $dtd_sub, $dtd_kses ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="dt-devs-grid dt-rev">
			<?php
			foreach ( $dtd_devs as $dtd_dev ) :
				$dtd_role  = (string) ( $dtd_dev['dtd_dev_role'] ?? '' );
				$dtd_exp   = (string) ( $dtd_dev['dtd_dev_exp'] ?? '' );
				$dtd_tz    = (string) ( $dtd_dev['dtd_dev_tz'] ?? '' );
				$dtd_photo = $dtd_dev['dtd_dev_photo'] ?? array();

				// A row with no link stays a <span>, so a tag that needs no destination is
				// unaffected by the link field existing.
				$dtd_tags = array();

				foreach ( (array) ( $dtd_dev['dtd_tags'] ?? array() ) as $dtd_row ) {
					$dtd_name = trim( (string) ( $dtd_row['dtd_tag_name'] ?? '' ) );

					if ( '' === $dtd_name ) {
						continue;
					}

					$dtd_link = $dtd_row['dtd_tag_link'] ?? null;
					$dtd_url  = is_array( $dtd_link ) ? trim( (string) ( $dtd_link['url'] ?? '' ) ) : '';

					// A bare '#' is a placeholder an editor leaves behind, not a destination. Treat it
					// as no link so the tag renders as plain text instead of a dead anchor.
					if ( '#' === $dtd_url ) {
						$dtd_url = '';
					}

					$dtd_tags[] = array(
						'name'   => $dtd_name,
						'url'    => $dtd_url,
						'target' => is_array( $dtd_link ) ? (string) ( $dtd_link['target'] ?? '' ) : '',
					);
				}

				if ( '' === $dtd_role && ! $dtd_tags && empty( $dtd_photo['id'] ) ) {
					continue;
				}
				?>
				<div class="dt-dev-card">
					<?php if ( '' !== $dtd_badge ) : ?>
						<span class="dt-dev-avail"><?php echo esc_html( $dtd_badge ); ?></span>
					<?php endif; ?>

					<?php if ( ! empty( $dtd_photo['id'] ) ) : ?>
						<div class="dt-dev-photo">
							<?php
							echo wp_get_attachment_image(
								(int) $dtd_photo['id'],
								'thumbnail',
								false,
								array(
									'alt'      => esc_attr( $dtd_role ),
									'loading'  => 'lazy',
									'decoding' => 'async',
								)
							);
							?>
						</div>
					<?php endif; ?>

					<?php if ( '' !== $dtd_role ) : ?>
						<div class="dt-dev-name"><?php echo esc_html( $dtd_role ); ?></div>
					<?php endif; ?>

					<?php if ( $dtd_tags ) : ?>
						<div class="dt-dev-tags">
							<?php foreach ( $dtd_tags as $dtd_tag ) : ?>
								<?php if ( '' !== $dtd_tag['url'] ) : ?>
									<a class="dt-dev-tag" href="<?php echo esc_url( $dtd_tag['url'] ); ?>"<?php echo '' !== $dtd_tag['target'] ? ' target="' . esc_attr( $dtd_tag['target'] ) . '" rel="noopener"' : ''; ?>><?php echo esc_html( $dtd_tag['name'] ); ?></a>
								<?php else : ?>
									<span class="dt-dev-tag"><?php echo esc_html( $dtd_tag['name'] ); ?></span>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php if ( '' !== $dtd_exp || '' !== $dtd_tz ) : ?>
						<div class="dt-dev-meta">
							<?php if ( '' !== $dtd_exp ) : ?>
								<span><strong><?php echo esc_html( $dtd_exp ); ?></strong> <?php esc_html_e( 'experience', 'technbrains-child' ); ?></span>
							<?php endif; ?>
							<?php if ( '' !== $dtd_tz ) : ?>
								<span><?php echo esc_html( $dtd_tz ); ?></span>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
