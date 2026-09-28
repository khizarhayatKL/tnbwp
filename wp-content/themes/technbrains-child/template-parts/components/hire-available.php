<?php
/**
 * Component: Hire Developer — Available Developers Marquee
 * Layout   : hd_available (ACF Flexible Content)
 *
 * Scrolling marquee of developer cards. Cards are duplicated for infinite loop.
 *
 * Fields:
 *   hdav_eyebrow         — text    (e.g. "Live talent pool")
 *   hdav_heading         — text    (plain part of h2)
 *   hdav_heading_accent  — text    (red-accent span in h2)
 *   hdav_sub             — textarea
 *   hdav_devs            — repeater
 *     hdav_dev_photo     — image (array)
 *     hdav_dev_role      — text  (displayed as card title)
 *     hdav_dev_tags      — text  (comma-separated skill tags)
 *     hdav_dev_exp       — text  (e.g. "7 yrs")
 *     hdav_dev_tz        — text  (e.g. "EST · UTC-5")
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$eyebrow        = get_sub_field( 'hdav_eyebrow' )        ?: '';
$heading        = get_sub_field( 'hdav_heading' )        ?: 'Developers Available for';
$heading_accent = get_sub_field( 'hdav_heading_accent' ) ?: 'Immediate Hire';
$sub            = get_sub_field( 'hdav_sub' )            ?: '';

/* Collect dev cards */
$devs = [];
if ( have_rows( 'hdav_devs' ) ) {
	while ( have_rows( 'hdav_devs' ) ) {
		the_row();
		$photo = get_sub_field( 'hdav_dev_photo' );
		$tags_raw = get_sub_field( 'hdav_dev_tags' ) ?: '';
		$tags = array_filter( array_map( 'trim', explode( ',', $tags_raw ) ) );

		$devs[] = [
			'photo' => $photo,
			'role'  => get_sub_field( 'hdav_dev_role' ) ?: '',
			'tags'  => $tags,
			'exp'   => get_sub_field( 'hdav_dev_exp' )  ?: '',
			'tz'    => get_sub_field( 'hdav_dev_tz' )   ?: '',
		];
	}
}

/* Need at least one card to show something */
if ( empty( $devs ) ) {
	return;
}

/* Duplicate cards for seamless infinite scroll */
$items = array_merge( $devs, $devs );
?>
<section class="hd-devs">
	<div class="hd-container">
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
	</div>

	<div class="hd-devs-rail">
		<div class="hd-devs-track">
			<?php foreach ( $items as $i => $dev ) : ?>
			<div class="hd-dev-card"<?php echo $i >= count( $devs ) ? ' aria-hidden="true"' : ''; ?>>
				<span class="hd-dev-avail">Available now</span>

				<div class="hd-dev-photo">
					<?php if ( ! empty( $dev['photo']['id'] ) ) : ?>
						<?php echo wp_get_attachment_image(
							$dev['photo']['id'],
							'thumbnail',
							false,
							[
								'alt'      => esc_attr( $dev['role'] ),
								'loading'  => 'lazy',
								'decoding' => 'async',
							]
						); ?>
					<?php else : ?>
					<div class="hd-dev-photo-placeholder"></div>
					<?php endif; ?>
				</div>

				<div class="hd-dev-name"><?php echo esc_html( $dev['role'] ); ?></div>

				<?php if ( ! empty( $dev['tags'] ) ) : ?>
				<div class="hd-dev-tags">
					<?php foreach ( $dev['tags'] as $tag ) : ?>
					<span class="hd-dev-tag"><?php echo esc_html( $tag ); ?></span>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>

				<?php if ( $dev['exp'] || $dev['tz'] ) : ?>
				<div class="hd-dev-meta">
					<?php if ( $dev['exp'] ) : ?>
					<span><strong><?php echo esc_html( $dev['exp'] ); ?></strong> experience</span>
					<?php endif; ?>
					<?php if ( $dev['tz'] ) : ?>
					<span><?php echo esc_html( $dev['tz'] ); ?></span>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
