<?php
/**
 * Component: Teams Work
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['teams_work'] ?? [];
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$title    = $d['title']    ?? '';
$para     = $d['para']     ?? '';
$btn_text = $d['btn_text'] ?? '';
$img_src  = $d['img_src']  ?? '';
$width    = $d['width']    ?? 586;
$height   = $d['height']   ?? 547;
$listing  = $d['listing']  ?? [];
?>
<section class="teamsWork">
	<div class="container">
		<div class="mainGrid">
			<div class="left">
				<?php if ( $title ) : ?>
				<h2><?php echo esc_html( $title ); ?></h2>
				<?php endif; ?>
				<?php if ( $para ) : ?>
				<p><?php echo esc_html( $para ); ?></p>
				<?php endif; ?>

				<div class="grid">
					<?php foreach ( $listing as $item ) : ?>
					<div class="single">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" aria-hidden="true" focusable="false"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
						<div class="info">
							<h3><?php echo wp_kses( $item['title'], [ 'a' => [ 'href' => [], 'title' => [], 'rel' => [] ] ] ); ?></h3>
							<p><?php echo esc_html( $item['para'] ); ?></p>
						</div>
					</div>
					<?php endforeach; ?>
				</div>

				<?php if ( $btn_text ) : ?>
				<div class="btnWrapper">
					<button class="tnb-btn tnb-popup-trigger" type="button">
						<div class="textWrapper">
							<span class="primaryText"><?php echo esc_html( $btn_text ); ?></span>
							<span class="secondaryText" aria-hidden="true"><?php echo esc_html( $btn_text ); ?></span>
						</div>
					</button>
				</div>
				<?php endif; ?>
			</div>

			<div class="right">
				<?php if ( $img_src ) : ?>
				<img
					src="<?php echo esc_url( $img_base . $img_src ); ?>"
					width="<?php echo (int) $width; ?>"
					height="<?php echo (int) $height; ?>"
					alt="Ways teams work with us"
					loading="lazy"
					decoding="async"
				>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
