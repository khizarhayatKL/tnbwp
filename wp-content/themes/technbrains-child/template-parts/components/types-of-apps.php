<?php
/**
 * Component: Types of Apps
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['types_of_apps'] ?? array();
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$subtitle = $d['subtitle'] ?? '';
$title    = $d['title']    ?? '';
$para     = $d['para']     ?? '';
$bg_image = $d['bg_image'] ?? '';
$listing  = $d['listing']  ?? array();

static $toa_instance = 0;
$toa_instance++;
$uid = 'toa-' . $toa_instance;

$has_tabs = false;
foreach ( $listing as $item ) {
	if ( ! empty( $item['tab_title'] ) ) {
		$has_tabs = true;
		break;
	}
}
?>
<section
	class="typesOfApps <?php echo esc_attr( get_query_var( 'component_modifier_classes', '' ) ); ?>"
	<?php if ( $bg_image ) : ?>style="background-image:url('<?php echo esc_url( $img_base . $bg_image ); ?>')"<?php endif; ?>
>
	<div class="container">
		<div class="types-info">
			<?php if ( $subtitle ) : ?>
			<span><?php echo esc_html( $subtitle ); ?></span>
			<?php endif; ?>
			<?php if ( $title ) : ?>
			<h2><?php echo esc_html( $title ); ?></h2>
			<?php endif; ?>
			<?php if ( $para ) : ?>
			<p><?php echo wp_kses_post( $para ); ?></p>
			<?php endif; ?>
		</div>

		<?php if ( $has_tabs ) : ?>
		<div class="types-tab">
			<ul>
				<?php foreach ( $listing as $i => $item ) : ?>
				<li
					class="toa-tab-btn<?php echo 0 === $i ? ' active' : ''; ?>"
					data-toa-index="<?php echo esc_attr( $i ); ?>"
					data-toa-group="<?php echo esc_attr( $uid ); ?>"
					role="button"
					tabindex="0"
				><?php echo esc_html( $item['tab_title'] ?? '' ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php endif; ?>

		<div class="tab-content">
			<?php foreach ( $listing as $i => $item ) : ?>
				<?php
				$extra = '';
				if ( $has_tabs ) {
					$extra = 0 === $i ? 'tab-details active-tab' : 'tab-details';
				} else {
					$extra = 'tab-details ' . esc_attr( get_query_var( 'component_modifier_classes', '' ) );
				}
				?>
			<div
				class="<?php echo esc_attr( $extra ); ?>"
				<?php if ( $has_tabs ) : ?>
				data-toa-index="<?php echo esc_attr( $i ); ?>"
				data-toa-group="<?php echo esc_attr( $uid ); ?>"
				<?php endif; ?>
			>
				<div class="content-grid">
					<div class="left-info">
						<img
							src="<?php echo esc_url( $img_base . ( $item['img_src'] ?? '' ) ); ?>"
							width="<?php echo esc_attr( $item['img_width'] ?? '570' ); ?>"
							height="<?php echo esc_attr( $item['img_height'] ?? '1160' ); ?>"
							alt="<?php echo esc_attr( $item['alt_text'] ?? $item['tab_title'] ?? 'image' ); ?>"
							loading="lazy"
							decoding="async"
						>
					</div>
					<div class="right-info">
						<?php echo wp_kses_post( $item['tab_content'] ?? '' ); ?>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

