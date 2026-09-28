<?php
defined('ABSPATH') || exit;

static $hire_printed = false;
if (! $hire_printed) :
	$hire_printed = true;
?>
	<style>
		.hireTechStack {
			padding: 60px 0;
			text-align: center;
			background-color: #f8f8f8
		}

		.hireTechStack .content {
			padding-bottom: 60px
		}

		.hireTechStack .content h5 {
			font-size: 16px;
			font-weight: 550;
			color: #ed2a32
		}

		.hireTechStack .content h3 {
			font-size: 28px;
			font-weight: bold;
			color: #000
		}

		.hireTechStack .content p {
			font-size: 16px;
			font-weight: 500;
			color: #000
		}

		.hireTechStack .list {
			display: grid;
			grid-template-columns: 1fr 1fr 1fr 1fr;
			gap: 25px
		}

		.hireTechStack .list .list-item {
			position: relative;
			background-color: #fff;
			padding: 30px 25px;
			box-shadow: 0 3px 6px #0000001c;
			overflow: hidden
		}

		.hireTechStack .list .list-item:hover h4 {
			color: #ed2a32
		}

		.hireTechStack .list .list-item:hover img {
			filter: invert(20%) sepia(55%) saturate(5584%) hue-rotate(348deg) brightness(99%) contrast(88%)
		}

		.hireTechStack .list .list-item img {
			width: auto;
			height: auto;
			transition: .1s
		}

		.hireTechStack .list .list-item h4 {
			font-size: 18px;
			font-weight: bold;
			margin: 12px 0;
			transition: .1s;
			position: relative;
			z-index: 2
		}

		.hireTechStack .list .list-item h2 {
			font-weight: bold;
			font-size: 90px;
			text-align: center;
			color: #ec1c24;
			border: 1px solid rgba(202, 206, 213, 0.05);
			opacity: .1;
			position: absolute;
			bottom: 0;
			left: 10px;
			z-index: 1;
			margin: 0;
			line-height: 1
		}

		.hireTechStack .list .list-item p {
			font-size: 16px;
			font-weight: 600;
			position: relative;
			z-index: 2;
			margin: 0
		}

		@media(max-width:991px) {
			.hireTechStack .content h3 {
				font-size: 22px
			}

			.hireTechStack .content p {
				font-size: 15px
			}

			.hireTechStack .list {
				grid-template-columns: 1fr 1fr
			}
		}

		@media(max-width:575px) {
			.hireTechStack .list {
				grid-template-columns: 1fr
			}
		}

		@media(max-width:280px) {
			.hireTechStack .content h5 {
				font-size: 13px
			}

			.hireTechStack .content h3 {
				font-size: 18px
			}

			.hireTechStack .content p {
				font-size: 13px
			}

			.hireTechStack .list {
				grid-template-columns: 1fr
			}
		}
	</style>
<?php endif; ?>
<?php
$data      = get_query_var('component_data');
$d         = $data['hire_tech_stack'] ?? array();
$mod       = get_query_var('component_modifier_classes', '');
$hire_list = $d['hire_list'] ?? array();
$kses_br   = array('br' => array());
?>
<section class="hireTechStack<?php echo $mod ? ' ' . esc_attr($mod) : ''; ?>">
	<div class="container">
		<div class="content">
			<h3><?php echo esc_html($d['sub_head'] ?? ''); ?></h3>
			<p><?php echo esc_html($d['para_text'] ?? ''); ?></p>
		</div>
		<div class="list">
			<?php foreach ($hire_list as $item) : ?>
				<div class="list-item">
					<?php if (! empty($item['img'])) : ?>
						<img
							src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images' . $item['img']); ?>"
							width="<?php echo (int) ($item['width'] ?? 75); ?>"
							height="<?php echo (int) ($item['height'] ?? 75); ?>"
							alt="<?php echo esc_attr($item['head'] ?? ''); ?>"
							loading="lazy"
							decoding="async">
					<?php endif; ?>
					<h4><?php echo esc_html($item['head'] ?? ''); ?></h4>
					<p><?php echo wp_kses($item['para'] ?? '', $kses_br); ?></p>
					<?php if (empty($item['img'])) : ?>
						<h2><?php echo esc_html($item['number'] ?? ''); ?></h2>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>