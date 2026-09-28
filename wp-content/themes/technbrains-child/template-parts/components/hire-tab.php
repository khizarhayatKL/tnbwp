<?php
defined( 'ABSPATH' ) || exit;

static $htab_printed = false;
if ( ! $htab_printed ) :
	$htab_printed = true;
?>
<style>.hireTab{padding:60px 0;text-align:center}.hireTab .content{padding-bottom:60px}.hireTab .content h5{font-size:16px;font-weight:550;color:#ed2a32}.hireTab .content h3{font-size:28px;font-weight:bold;color:#000}.hireTab .content p{font-size:16px;font-weight:500;color:#000}.hireTab .tab-list{border-bottom:1px solid #c8c8c8;margin-bottom:50px;cursor:pointer}.hireTab .tab-list ul{display:grid;grid-template-columns:1fr 1fr 1fr 1fr;list-style:none;padding:0;margin-bottom:0}.hireTab .tab-list ul li{font-size:16px;font-weight:550;padding:10px 5px;transition:color .2s,border-bottom .2s}.hireTab .tab-list ul li.active{color:#ed2a32;border-bottom:3px solid #ed2a32}.hireTab .box{background-color:#f9f9f9;padding:30px;text-align:left;display:none}.hireTab .box.active{display:block}.hireTab .box h4{font-size:22px;font-weight:bold;margin-bottom:50px;color:#ed2a32}.hireTab .box .box-content{display:grid;grid-template-columns:1.5fr 1fr;align-items:start;justify-items:center}.hireTab .box .box-content ul{list-style:none;padding:0;margin-bottom:0;display:grid;grid-template-columns:1fr 1fr;align-items:flex-start}.hireTab .box .box-content ul li{font-size:16px;font-weight:500;margin-bottom:12px;display:flex;align-items:center;gap:40px}.hireTab .box .box-content ul li .ht-arrow{color:#ed2a32;width:14px;height:14px;flex-shrink:0}@media(max-width:1200px){.hireTab .content h3{font-size:26px}.hireTab .tab-list ul li{font-size:15px;font-weight:600}.hireTab .box h4{font-size:20px}.hireTab .box .box-content ul li{font-size:15px}.hireTab .box .box-content img{max-width:200px;height:auto}}@media(max-width:991px){.hireTab .content h3{font-size:22px}.hireTab .content p{font-size:15px}.hireTab .tab-list ul{display:flex;flex-wrap:wrap;justify-content:center;gap:20px}.hireTab .box h4{font-size:18px}.hireTab .box .box-content{grid-template-columns:1fr auto}.hireTab .box .box-content ul li{gap:20px;font-size:15px}.hireTab .box .box-content img{max-width:180px}}@media(max-width:767px){.hireTab .box .box-content{gap:20px;grid-template-columns:1fr}.hireTab .box .box-content ul li{font-size:14px;gap:10px}}@media(max-width:479px){.hireTab .content h3{font-size:20px}.hireTab .content p{font-size:14px}.hireTab .tab-list ul{grid-template-columns:1fr}.hireTab .tab-list ul li{margin-top:20px}.hireTab .box .box-content ul li{font-size:14px;gap:10px}}@media(max-width:400px){.hireTab .content h3{font-size:20px}.hireTab .box{padding:20px}.hireTab .box .box-content ul li{font-size:12px;gap:10px}}</style>
<?php endif; ?>
<?php
$data     = get_query_var( 'component_data' );
$d        = $data['hire_tab'] ?? array();
$mod      = get_query_var( 'component_modifier_classes', '' );
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$tab_list = $d['tab_list'] ?? array();

static $htab_instance = 0;
$htab_instance++;
$uid = 'ht-' . $htab_instance;
?>
<section class="hireTab<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="content">
			<h2><?php echo esc_html( $d['sub_head'] ?? '' ); ?></h2>
			<p><?php echo esc_html( $d['para_text'] ?? '' ); ?></p>
		</div>
		<div class="tab-list">
			<ul>
				<?php foreach ( $tab_list as $i => $tab ) : ?>
				<li
					class="ht-tab-btn<?php echo 0 === $i ? ' active' : ''; ?>"
					data-ht-group="<?php echo esc_attr( $uid ); ?>"
					data-ht-key="<?php echo esc_attr( $tab['key'] ); ?>"
				><?php echo esc_html( $tab['label'] ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php foreach ( $tab_list as $i => $tab ) : ?>
		<div
			class="box<?php echo 0 === $i ? ' active' : ''; ?>"
			data-ht-group="<?php echo esc_attr( $uid ); ?>"
			data-ht-key="<?php echo esc_attr( $tab['key'] ); ?>"
		>
			<h3><?php echo wp_kses( $tab['title'], array( 
    'a' => array( 
        'href'   => array(), 
        'title'  => array(), 
        'target' => array(), 
        'rel'    => array() 
    ) 
) ); ?></h3>
			<div class="box-content">
				<ul>
					<?php foreach ( $tab['tab_heads'] as $head ) : ?>
					<li>
						<svg class="ht-arrow" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z"/></svg>
						<?php echo esc_html( $head['text'] ); ?>
					</li>
					<li><?php echo esc_html( $head['texttwo'] ); ?></li>
					<?php endforeach; ?>
				</ul>
				<?php if ( ! empty( $tab['src'] ) ) : ?>
				<img
					src="<?php echo esc_url( $img_base . $tab['src'] ); ?>"
					width="<?php echo (int) ( $tab['width'] ?? 227 ); ?>"
					height="<?php echo (int) ( $tab['height'] ?? 180 ); ?>"
					alt="<?php echo esc_attr( $tab['alt'] ?? '' ); ?>"
					loading="lazy"
					decoding="async"
				>
				<?php endif; ?>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</section>
