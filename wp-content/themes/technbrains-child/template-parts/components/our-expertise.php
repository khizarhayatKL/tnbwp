<?php
defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['our_expertise'] ?? array();
$listing  = $d['listing'] ?? array();
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$mod      = get_query_var( 'component_modifier_classes', '' );

static $oe_instance = 0;
$oe_instance++;
$uid = 'oe-' . $oe_instance;
?>
<section class="ourExpertise<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<?php if ( ! empty( $d['sub_title'] ) ) : ?>
		<h5><?php echo esc_html( $d['sub_title'] ); ?></h5>
		<?php endif; ?>
		<?php if ( ! empty( $d['title'] ) ) : ?>
		<h2><?php echo esc_html( $d['title'] ); ?></h2>
		<?php endif; ?>

		<?php if ( ! empty( $listing ) ) : ?>
		<div class="oe-tab-info">
			<ul>
				<?php foreach ( $listing as $i => $item ) : ?>
				<li
					class="oe-tab-btn<?php echo 0 === $i ? ' active' : ''; ?>"
					data-oe-index="<?php echo esc_attr( $i ); ?>"
					data-oe-group="<?php echo esc_attr( $uid ); ?>"
					role="button"
					tabindex="0"
				>
					<?php echo esc_html( $item['tab_title'] ?? '' ); ?>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<?php foreach ( $listing as $i => $item ) : ?>
		<div
			class="oe-tab-content<?php echo 0 === $i ? ' active' : ''; ?>"
			data-oe-index="<?php echo esc_attr( $i ); ?>"
			data-oe-group="<?php echo esc_attr( $uid ); ?>"
		>
			<div class="oe-content-grid">
				<div class="oe-left-info">
					<div class="oe-img-grid">
						<?php foreach ( $item['content_images'] ?? array() as $img ) : ?>
						<div class="oe-box">
							<img
								src="<?php echo esc_url( $img_base . ( $img['img_src'] ?? '' ) ); ?>"
								width="<?php echo esc_attr( $img['img_width'] ?? '100' ); ?>"
								height="<?php echo esc_attr( $img['img_height'] ?? '100' ); ?>"
								alt="<?php echo esc_attr( $img['text'] ?? '' ); ?>"
								loading="lazy"
								decoding="async"
							>
							<p><?php echo esc_html( $img['text'] ?? '' ); ?></p>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="oe-right-info">
					<?php if ( ! empty( $item['content'] ) ) : ?>
					<p><?php echo esc_html( $item['content'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $item['content_title'] ) ) : ?>
					<h4><?php echo esc_html( $item['content_title'] ); ?></h4>
					<?php endif; ?>
					<?php if ( ! empty( $item['content_list'] ) ) : ?>
					<ul>
						<?php foreach ( $item['content_list'] as $li ) : ?>
						<li><?php echo esc_html( $li['list'] ?? '' ); ?></li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
		<?php endif; ?>
	</div>
</section>
