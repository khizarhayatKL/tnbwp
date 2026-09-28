<?php
/**
 * Component: Built For Startup
 * Note: No max-con wrapper — mainGrid is full-bleed.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data       = get_query_var( 'component_data' );
$d          = $data['built_for_startup'] ?? [];
$img_base   = get_stylesheet_directory_uri() . '/assets/images';
$title      = $d['title']      ?? '';
$para       = $d['para']       ?? '';
$btn_text   = $d['btn_text']   ?? '';
$img_src    = $d['img_src']    ?? '';
$bg_image   = $d['bg_image']   ?? '';
$extra_list = $d['extra_list'] ?? [];
?>
<section class="builtForStartup">
	<div class="mainGrid">
		<div class="left">
			<?php if ( $img_src ) : ?>
			<img
				src="<?php echo esc_url( $img_base . $img_src ); ?>"
				width="484"
				height="697"
				alt="Mobile app development for startups"
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
			<?php if ( $title ) : ?>
			<h2><?php echo esc_html( $title ); ?></h2>
			<?php endif; ?>

			<?php if ( $para ) : ?>
			<p><?php echo wp_kses_post( nl2br( esc_html( $para ) ) ); ?></p>
			<?php endif; ?>

			<?php if ( ! empty( $extra_list ) ) : ?>
			<div class="extraContent">
				<ul>
					<?php foreach ( $extra_list as $item ) : ?>
					<li>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" aria-hidden="true" focusable="false"><path d="M256 48a208 208 0 1 1 0 416A208 208 0 1 1 256 48zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z"/></svg>
						<?php echo esc_html( $item ); ?>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>

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
	</div>
</section>
