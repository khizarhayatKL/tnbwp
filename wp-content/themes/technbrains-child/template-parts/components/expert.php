<?php
defined( 'ABSPATH' ) || exit;

static $exp_printed = false;
if ( ! $exp_printed ) :
	$exp_printed = true;
?>
<style>.hireExpert{padding:60px 0;text-align:center;background-color:#f8f8f8}.hireExpert .content{padding-bottom:60px}.hireExpert .content h5{font-size:16px;font-weight:550;color:#ed2a32}.hireExpert .content h3{font-size:28px;font-weight:bold;color:#000}.hireExpert .content p{font-size:16px;font-weight:500;color:#000}.hireExpert .list{display:grid;grid-template-columns:1fr 1fr 1fr;gap:25px}.hireExpert .list .list-item{background-color:#fff;padding:30px 25px;color:#ec1c24;box-shadow:0 3px 6px #0000001c;transition:.3s}.hireExpert .list .list-item:hover{background-color:#f8f8f8}.hireExpert .list .list-item h4{font-size:30px;font-weight:bold;position:relative;margin:15px 0 25px}.hireExpert .list .list-item h4::before{content:"";border-bottom:2px solid #ec1c24;width:100px;height:5px;position:absolute;bottom:-10px;left:0;right:0;margin:auto}.hireExpert .list .list-item ul{list-style:none;padding-left:0;color:#000;margin-top:30px;margin-bottom:0}.hireExpert .list .list-item ul li{text-align:left;font-size:16px;line-height:29px;display:grid;gap:10px;grid-template-columns:auto 1fr}.hireExpert .list .list-item ul li svg{color:#ed2a32;margin-top:6px;width:16px;height:16px;flex-shrink:0}@media(max-width:991px){.hireExpert .list{grid-template-columns:1fr}}@media(max-width:767px){.hireExpert .content h3{font-size:22px}.hireExpert .content p{font-size:15px}}</style>
<?php endif; ?>
<?php
$data       = get_query_var( 'component_data' );
$d          = $data['expert'] ?? array();
$mod        = get_query_var( 'component_modifier_classes', '' );
$img_base   = get_stylesheet_directory_uri() . '/assets/images';
$expert_box = $d['expert_box'] ?? array();
?>
<section class="hireExpert<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="content">
			<?php if ( ! empty( $d['sub_head'] ) ) : ?>
			<h3><?php echo esc_html( $d['sub_head'] ); ?></h3>
			<?php endif; ?>
			<?php if ( ! empty( $d['para_text'] ) ) : ?>
			<p><?php echo esc_html( $d['para_text'] ); ?></p>
			<?php endif; ?>
		</div>
		<div class="list">
			<?php foreach ( $expert_box as $box ) : ?>
			<div class="list-item">
				<?php if ( ! empty( $box['src'] ) ) : ?>
				<img
					src="<?php echo esc_url( $img_base . $box['src'] ); ?>"
					width="<?php echo (int) ( $box['width'] ?? 85 ); ?>"
					height="<?php echo (int) ( $box['height'] ?? 85 ); ?>"
					alt="<?php echo esc_attr( $box['head'] ?? '' ); ?>"
					loading="lazy"
					decoding="async"
				>
				<?php endif; ?>
				<h4><?php echo esc_html( $box['head'] ?? '' ); ?></h4>
				<?php if ( ! empty( $box['expert_list'] ) ) : ?>
				<ul>
					<?php foreach ( $box['expert_list'] as $item ) : ?>
					<li>
						<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z"/></svg>
						<?php echo esc_html( $item['item'] ?? '' ); ?>
					</li>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
