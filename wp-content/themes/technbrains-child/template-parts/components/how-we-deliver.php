<?php
defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['how_we_deliver'] ?? array();
$listing  = $d['listing'] ?? array();
$mod      = get_query_var( 'component_modifier_classes', '' );
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$kses_s   = array( 'span' => array() );

static $hwd_instance = 0;
$hwd_instance++;
$uid = 'hwd-' . $hwd_instance;
?>
<section class="howWeDeliverSec<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="text">
			<?php if ( ! empty( $d['title'] ) ) : ?>
			<h2><?php echo esc_html( $d['title'] ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $d['para'] ) ) : ?>
			<p><?php echo esc_html( $d['para'] ); ?></p>
			<?php endif; ?>
		</div>

		<div class="tabsMain">
			<div class="tabs">
				<ul>
					<?php foreach ( $listing as $i => $item ) : ?>
					<li
						class="hwd-tab-btn<?php echo 0 === $i ? ' active' : ''; ?>"
						data-hwd-group="<?php echo esc_attr( $uid ); ?>"
						data-hwd-index="<?php echo esc_attr( $i ); ?>"
						role="button"
						tabindex="0"
					>
						<div class="redBox">
							<?php if ( ! empty( $item['img_src'] ) ) : ?>
							<img
								src="<?php echo esc_url( $img_base . $item['img_src'] ); ?>"
								width="<?php echo esc_attr( $item['img_width'] ?? '28' ); ?>"
								height="<?php echo esc_attr( $item['img_height'] ?? '28' ); ?>"
								alt="<?php echo esc_attr( $item['title'] ?? 'icon' ); ?>"
								loading="lazy"
								decoding="async"
							>
							<?php endif; ?>
							<h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
							<?php if ( ! empty( $item['number'] ) ) : ?>
							<h6><?php echo esc_html( $item['number'] ); ?></h6>
							<?php endif; ?>
						</div>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="right-info">
				<?php foreach ( $listing as $i => $item ) : ?>
				<div
					class="hwd-tab-content<?php echo 0 === $i ? ' active' : ''; ?>"
					data-hwd-group="<?php echo esc_attr( $uid ); ?>"
					data-hwd-index="<?php echo esc_attr( $i ); ?>"
				>
					<div class="mainBox">
						<div class="textBox">
							<h3><?php echo wp_kses( $item['heading_html'] ?? esc_html( $item['title'] ?? '' ), $kses_s ); ?></h3>
						</div>
						<div class="paraBox">
							<p><?php echo wp_kses_post( $item['content'] ?? '' ); ?></p>
						</div>
						<div class="imgBox">
							<?php if ( ! empty( $item['img_one'] ) ) : ?>
							<img
								src="<?php echo esc_url( $img_base . $item['img_one'] ); ?>"
								width="379"
								height="268"
								alt="tab image"
								loading="lazy"
								decoding="async"
							>
							<?php endif; ?>
							<?php if ( ! empty( $item['img_two'] ) ) : ?>
							<img
								src="<?php echo esc_url( $img_base . $item['img_two'] ); ?>"
								width="518"
								height="268"
								alt="tab image"
								loading="lazy"
								decoding="async"
							>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
