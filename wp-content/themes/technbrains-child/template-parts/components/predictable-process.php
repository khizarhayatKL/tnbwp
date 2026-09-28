<?php
/**
 * Component: Predictable Process
 * Note: No max-con wrapper — mainGrid is full-bleed.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['predictable_process'] ?? [];
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$title    = $d['title']    ?? '';
$para     = $d['para']     ?? '';
$btn_text = $d['btn_text'] ?? '';
$btn_link = $d['btn_link'] ?? '';
$img_src  = $d['img_src']  ?? '';
$bg_image = $d['bg_image'] ?? '';
$listing  = $d['listing']  ?? [];
?>
<section class="predictableProcess <?php echo esc_attr( get_query_var( 'component_modifier_classes', '' ) ); ?>">
	<div class="mainGrid">
		<div class="left">
			<?php if ( $img_src ) : ?>
			<img
				src="<?php echo esc_url( $img_base . $img_src ); ?>"
				width="484"
				height="697"
				alt="Predictable mobile app delivery"
				loading="lazy"
				decoding="async"
			>
			<?php endif; ?>
		</div>

		<div
			class="right"
			<?php if ( $bg_image ) : ?>
			style="background-image:url('<?php echo esc_url( $img_base . $bg_image ); ?>')"
			<?php endif; ?>
		>
			<div class="info">
				<?php if ( $title ) : ?>
				<h2><?php echo esc_html( $title ); ?></h2>
				<?php endif; ?>
				<?php if ( $para ) : ?>
				<p><?php echo wp_kses( $para, [ 'a' => [ 'href' => [], 'title' => [], 'target' => [], 'rel' => [] ] ] ); ?></p>
				<?php endif; ?>
				<?php if ( $btn_text ) : ?>
					<?php if ( $btn_link ) : ?>
					<a class="tnb-btn" href="<?php echo esc_url( $btn_link ); ?>">
						<div class="textWrapper">
							<span class="primaryText"><?php echo esc_html( $btn_text ); ?></span>
							<span class="secondaryText" aria-hidden="true"><?php echo esc_html( $btn_text ); ?></span>
						</div>
					</a>
					<?php else : ?>
					<button class="tnb-btn tnb-popup-trigger" type="button">
						<div class="textWrapper">
							<span class="primaryText"><?php echo esc_html( $btn_text ); ?></span>
							<span class="secondaryText" aria-hidden="true"><?php echo esc_html( $btn_text ); ?></span>
						</div>
					</button>
					<?php endif; ?>
				<?php endif; ?>
			</div>

			<div class="grid">
				<?php foreach ( $listing as $item ) : ?>
				<div class="single">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['para'] ); ?></p>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
