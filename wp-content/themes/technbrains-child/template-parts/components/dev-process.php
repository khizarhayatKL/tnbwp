<?php
/**
 * Component: Dev Process — grid layout, mirrors DevProcess.jsx.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['dev_process'] ?? array();
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$title    = $d['title_html'] ?? '';
$para     = $d['para']       ?? '';
$listing  = $d['listing']    ?? array();
$allowed  = array( 'span' => array(), 'br' => array() );
?>
<section class="devProcess <?php echo esc_attr( get_query_var( 'component_modifier_classes', '' ) ); ?>">
	<div class="container">
		<div class="main-info">
			<?php if ( $title ) : ?>
			<h2><?php echo wp_kses( $title, $allowed ); ?></h2>
			<?php endif; ?>
			<?php if ( $para ) : ?>
			<p><?php echo wp_kses_post( $para ); ?></p>
			<?php endif; ?>
		</div>

		<?php if ( ! empty( $listing ) ) : ?>
		<div class="info-grid">
			<?php foreach ( $listing as $item ) : ?>
			<div class="box">
				<?php if ( ! empty( $item['number'] ) ) : ?>
				<div class="num-img">
					<span><?php echo esc_html( $item['number'] ); ?></span>
					<img
						src="<?php echo esc_url( $img_base . ( $item['img_src'] ?? '' ) ); ?>"
						width="56"
						height="56"
						alt="<?php echo esc_attr( $item['title'] ?? 'icon' ); ?>"
						loading="lazy"
						decoding="async"
					>
				</div>
				<?php elseif ( ! empty( $item['img_src'] ) ) : ?>
				<img
					src="<?php echo esc_url( $img_base . $item['img_src'] ); ?>"
					width="56"
					height="56"
					alt="<?php echo esc_attr( $item['title'] ?? 'icon' ); ?>"
					loading="lazy"
					decoding="async"
				>
				<?php endif; ?>
				<h3><?php echo wp_kses( $item['title'] ?? '', $allowed ); ?></h3>
				<p><?php echo esc_html( $item['para'] ?? '' ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
