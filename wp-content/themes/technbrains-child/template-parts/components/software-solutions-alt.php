<?php
/**
 * Component: Software Solutions (Alt) — second SolutionBusiness instance on same page
 *
 * Identical to software-solutions.php but reads from component_data['software_solutions_alt'].
 * Use when a page needs two SolutionBusiness blocks with different content.
 *
 * Data key : software_solutions_alt
 * Fields   : main_title, title, para, show_button (bool),
 *            listing[{ img_src, img_width, img_height, title, link }]
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['software_solutions_alt'] ?? array();
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$listing  = $d['listing'] ?? array();
$mod      = get_query_var( 'component_modifier_classes', '' );
?>
<section class="softwareSolutions<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="ss-content">
			<?php if ( ! empty( $d['main_title'] ) ) : ?>
			<h5><?php echo esc_html( $d['main_title'] ); ?></h5>
			<?php endif; ?>
			<?php if ( ! empty( $d['title'] ) ) : ?>
			<h3><?php echo wp_kses_post( $d['title'] ); ?></h3>
			<?php endif; ?>
			<?php if ( ! empty( $d['para'] ) ) : ?>
			<p><?php echo esc_html( $d['para'] ); ?></p>
			<?php endif; ?>
		</div>

		<?php if ( ! empty( $listing ) ) : ?>
		<div class="ss-main-row">
			<?php foreach ( $listing as $item ) : ?>
			<div class="ss-main-div">
				<a href="<?php echo esc_url( $item['link'] ?? '#' ); ?>">
					<img
						src="<?php echo esc_url( $img_base . ( $item['img_src'] ?? '' ) ); ?>"
						width="<?php echo (int) ( $item['img_width'] ?? 48 ); ?>"
						height="<?php echo (int) ( $item['img_height'] ?? 48 ); ?>"
						alt="<?php echo esc_attr( $item['title'] ?? '' ); ?>"
						loading="lazy"
						decoding="async"
					>
					<h4><?php echo esc_html( $item['title'] ?? '' ); ?></h4>
				</a>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<?php if ( ! empty( $d['show_button'] ) ) : ?>
		<div class="ss-btns">
			<a class="tnb-btn slideHOv" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">SCHEDULE A DEVELOPERS INTERVIEW</a>
		</div>
		<?php endif; ?>
	</div>
</section>
