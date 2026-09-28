<?php

/**
 * Component: Banner
 *
 * @package technbrains-child
 */

defined('ABSPATH') || exit;

$data        = get_query_var('component_data');
$d           = $data['banner'] ?? [];
$img_base    = get_stylesheet_directory_uri() . '/assets/images';
$title_html  = $d['title_html']    ?? '';
$para        = $d['para']          ?? '';
$bg_image    = $d['bg_image']      ?? '';
$btn_text    = $d['btn_text']      ?? '';
$btn_link    = $d['btn_link']      ?? '';
$btn_classes = $d['btn_classes']   ?? '';
$btn_two_text    = $d['btn_two_text']    ?? '';
$btn_two_link    = $d['btn_two_link']    ?? '';
$btn_two_classes = $d['btn_two_classes'] ?? '';
?>
<section class="banner">
	<?php if ($bg_image) : ?>
		<div class="backgroundImageWrapper">
			<img
				src="<?php echo esc_url($img_base . $bg_image); ?>"
				alt="Mobile App Development"
				width="1920"
				height="900"
				loading="eager"
				fetchpriority="high"
				decoding="async"
				style="width:100%;height:100%;object-fit:cover;object-position:top center">
		</div>
	<?php endif; ?>

	<div class="mainWrapper">
		<div class="container">
			<div class="main">
				<?php tnb_breadcrumb_html(); ?>
				<h1><?php echo wp_kses_post($title_html); ?></h1>
				<p><?php echo esc_html($para); ?></p>
				<div class="btnWrapper">
					<?php if ($btn_text) : ?>
						<?php if ($btn_link) : ?>
							<a class="tnb-btn <?php echo esc_attr($btn_classes); ?>" href="<?php echo esc_url($btn_link); ?>">
								<div class="textWrapper"><span class="primaryText"><?php echo esc_html($btn_text); ?></span><span class="secondaryText"><?php echo esc_html($btn_text); ?></span></div>
							</a>
						<?php else : ?>
							<button class="tnb-btn <?php echo esc_attr($btn_classes); ?> tnb-popup-trigger" type="button">
								<div class="textWrapper"><span class="primaryText"><?php echo esc_html($btn_text); ?></span><span class="secondaryText"><?php echo esc_html($btn_text); ?></span></div>
							</button>
						<?php endif; ?>
					<?php endif; ?>

					<?php if ($btn_two_text) : ?>
						<?php if ($btn_two_link) : ?>
							<a class="tnb-btn <?php echo esc_attr($btn_two_classes); ?>" href="<?php echo esc_url($btn_two_link); ?>">
								<div class="textWrapper"><span class="primaryText"><?php echo esc_html($btn_two_text); ?></span><span class="secondaryText"><?php echo esc_html($btn_two_text); ?></span></div>
							</a>
						<?php else : ?>
							<button class="tnb-btn <?php echo esc_attr($btn_two_classes); ?> tnb-popup-trigger" type="button">
								<div class="textWrapper"><span class="primaryText"><?php echo esc_html($btn_two_text); ?></span><span class="secondaryText"><?php echo esc_html($btn_two_text); ?></span></div>
							</button>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>