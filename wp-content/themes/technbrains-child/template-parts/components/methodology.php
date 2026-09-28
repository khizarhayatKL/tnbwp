<?php
/**
 * Component: Methodology
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['methodology'] ?? array();
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$title    = $d['title']   ?? '';
$para     = $d['para']    ?? '';
$listing  = $d['listing'] ?? array();

static $meth_instance = 0;
$meth_instance++;
$uid = 'meth-' . $meth_instance;
?>
<section class="methodology <?php echo esc_attr( get_query_var( 'component_modifier_classes', '' ) ); ?>" id="<?php echo esc_attr( $uid ); ?>">
	<div class="container">
		<div class="main-info">
			<?php if ( $title ) : ?>
			<h2><?php echo esc_html( $title ); ?></h2>
			<?php endif; ?>
			<?php if ( $para ) : ?>
			<p><?php echo esc_html( $para ); ?></p>
			<?php endif; ?>
		</div>

		<?php if ( ! empty( $listing ) ) : ?>
		<div class="main-tab">
			<?php foreach ( $listing as $i => $item ) : ?>
			<div
				class="tab<?php echo 0 === $i ? ' active' : ''; ?>"
				data-meth-index="<?php echo esc_attr( $i ); ?>"
				data-meth-group="<?php echo esc_attr( $uid ); ?>"
				role="button"
				tabindex="0"
			>
				<img
					src="<?php echo esc_url( $img_base . ( $item['img_src'] ?? '' ) ); ?>"
					width="100"
					height="100"
					alt="<?php echo esc_attr( $item['title'] ?? 'icon' ); ?>"
					loading="lazy"
					decoding="async"
				>
				<span><?php echo esc_html( $item['title'] ?? '' ); ?></span>
			</div>
			<?php endforeach; ?>
		</div>

		<div class="tab-content">
			<?php foreach ( $listing as $i => $item ) : ?>
			<div
				class="content<?php echo 0 === $i ? ' active' : ''; ?>"
				data-meth-index="<?php echo esc_attr( $i ); ?>"
				data-meth-group="<?php echo esc_attr( $uid ); ?>"
			>
				<p><?php echo esc_html( $item['para'] ?? '' ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<button class="tnb-btn slideHOv tnb-popup-trigger" type="button">Talk to our experts</button>
	</div>
</section>
