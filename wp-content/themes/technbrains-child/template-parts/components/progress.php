<?php
/**
 * Component: Progress — mirrors AppDevelopment/Progress.jsx
 *
 * Data key : progress
 * Fields   : subtitle, title, para, classes, show_button,
 *            listing[{ img_src, tab_title, custom_para }]
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['progress'] ?? array();
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$listing  = $d['listing'] ?? array();
$classes  = ! empty( $d['classes'] ) ? ' ' . sanitize_html_class( $d['classes'] ) : '';
$mod      = get_query_var( 'component_modifier_classes', '' );
if ( $mod ) {
	$classes = ' ' . sanitize_html_class( $mod );
}

static $prog_instance = 0;
$prog_instance++;
$gid = 'prog-' . $prog_instance;
?>
<section class="progressSection<?php echo esc_attr( $classes ); ?>">
	<div class="container">
		<div class="ps2-main-info">
			<?php if ( ! empty( $d['subtitle'] ) ) : ?>
			<span><?php echo esc_html( $d['subtitle'] ); ?></span>
			<?php endif; ?>
			<?php if ( ! empty( $d['title'] ) ) : ?>
			<h2><?php echo esc_html( $d['title'] ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $d['para'] ) ) : ?>
			<p><?php echo esc_html( $d['para'] ); ?></p>
			<?php endif; ?>
		</div>
		<div class="ps2-info-box">
			<div class="ps2-left-box">
				<?php foreach ( $listing as $i => $item ) : ?>
				<div
					class="ps2-image-box<?php echo 0 === $i ? ' active' : ''; ?>"
					data-prog-index="<?php echo esc_attr( $i ); ?>"
					data-prog-group="<?php echo esc_attr( $gid ); ?>"
					role="button"
					tabindex="0"
				>
					<img
						src="<?php echo esc_url( $img_base . ( $item['img_src'] ?? '' ) ); ?>"
						width="56"
						height="56"
						alt="icon"
						loading="lazy"
						decoding="async"
					>
					<h3><?php echo esc_html( $item['tab_title'] ?? '' ); ?></h3>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="ps2-right-box">
				<?php foreach ( $listing as $i => $item ) : ?>
				<div
					class="ps2-tab-panel<?php echo 0 === $i ? ' active' : ''; ?>"
					data-prog-panel="<?php echo esc_attr( $i ); ?>"
					data-prog-group="<?php echo esc_attr( $gid ); ?>"
				>
					<p><?php echo esc_html( $item['custom_para'] ?? '' ); ?></p>
					<?php if ( ! empty( $d['show_button'] ) ) : ?>
					<a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="tnb-btn slideHOv">Contact Us</a>
					<?php endif; ?>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
