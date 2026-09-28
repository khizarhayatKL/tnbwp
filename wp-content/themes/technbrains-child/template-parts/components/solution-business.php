<?php
defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['software_solutions'] ?? array();
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$listing  = $d['listing'] ?? array();
$mod      = get_query_var( 'component_modifier_classes', '' );
?>
<section class="solutionBusiness<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="sb-content">
			<?php if ( ! empty( $d['main_title'] ) ) : ?>
			<span><?php echo esc_html( $d['main_title'] ); ?></span>
			<?php endif; ?>
			<?php if ( ! empty( $d['title'] ) ) : ?>
			<h2><?php echo wp_kses_post( $d['title'] ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $d['para'] ) ) : ?>
			<p><?php echo esc_html( $d['para'] ); ?></p>
			<?php endif; ?>
		</div>

		<?php if ( ! empty( $listing ) ) : ?>
		<div class="sb-main-row">
			<?php foreach ( $listing as $item ) : ?>
			<div class="sb-main-div">
				<?php if ( ! empty( $item['link'] ) ) : ?>
					<a href="<?php echo esc_url( $item['link'] ); ?>">
				<?php endif; ?>

					<img
						src="<?php echo esc_url( $img_base . ( $item['img_src'] ?? '' ) ); ?>"
						width="<?php echo (int) ( $item['img_width'] ?? 48 ); ?>"
						height="<?php echo (int) ( $item['img_height'] ?? 48 ); ?>"
						alt="<?php echo esc_attr( $item['title'] ?? '' ); ?>"
						loading="lazy"
						decoding="async"
					>
					<h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3>

				<?php if ( ! empty( $item['link'] ) ) : ?>
					</a>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<?php if ( ! empty( $d['show_button'] ) ) : ?>
		<div class="sb-btns">
			<a class="tnb-btn slideHOv" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Schedule a Developer Interview</a>
		</div> 
		<?php endif; ?>
	</div>
</section>
