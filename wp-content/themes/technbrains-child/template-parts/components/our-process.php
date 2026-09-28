<?php
/**
 * Component: Our Process — interactive expanding cards. Mirrors OurProcess.jsx.
 *
 * Data key : our_process
 * Fields   : subtitle, title, para, listing[{bg_image,title,red_title,para}]
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['our_process'] ?? array();
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$listing  = $d['listing'] ?? array();
$mod      = get_query_var( 'component_modifier_classes', '' );

static $op_instance = 0;
$op_instance++;
$uid = 'op-' . $op_instance;
?>
<section class="ourProcess<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<?php if ( $d['subtitle'] ?? '' || $d['title'] ?? '' || $d['para'] ?? '' ) : ?>
		<div class="process-info">
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
		<?php endif; ?>

		<?php if ( ! empty( $listing ) ) : ?>
		<div class="cards" id="<?php echo esc_attr( $uid ); ?>">
			<?php foreach ( $listing as $i => $item ) : ?>
			<div class="card<?php echo 0 === $i ? ' active' : ''; ?>" data-op-group="<?php echo esc_attr( $uid ); ?>">
				<img
					src="<?php echo esc_url( $img_base . ( $item['bg_image'] ?? '' ) ); ?>"
					width="617"
					height="407"
					alt="<?php echo esc_attr( ( $item['title'] ?? '' ) . ' ' . ( $item['red_title'] ?? '' ) ); ?>"
					loading="lazy"
					decoding="async"
				>
				<div class="card-infos">
					<?php if ( ! empty( $item['title'] ) ) : ?>
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<?php endif; ?>
					<?php if ( ! empty( $item['red_title'] ) ) : ?>
					<span><?php echo esc_html( $item['red_title'] ); ?></span>
					<?php endif; ?>
					<?php if ( ! empty( $item['para'] ) ) : ?>
					<p><?php echo esc_html( $item['para'] ); ?></p>
					<?php endif; ?>
				</div>
				<h5><?php echo esc_html( ( $item['title'] ?? '' ) . ' ' . ( $item['red_title'] ?? '' ) ); ?></h5>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
