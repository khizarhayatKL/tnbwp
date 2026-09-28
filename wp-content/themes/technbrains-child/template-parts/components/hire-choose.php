<?php
defined( 'ABSPATH' ) || exit;

static $hch_printed = false;
if ( ! $hch_printed ) :
	$hch_printed = true;
?>
<style>.hireChoose{padding:60px 0;text-align:center;background-color:#F8F8F8}.hireChoose .content{padding-bottom:60px}.hireChoose .content h5{font-size:16px;font-weight:550;color:#ed2a32}.hireChoose .content h3{font-size:28px;font-weight:bold;color:#000}.hireChoose .content p{font-size:16px;font-weight:500;color:#000}.hireChoose .list{display:grid;grid-template-columns:1fr 1fr 1fr;gap:70px}.hireChoose .list .list-item .list-img{height:150px;width:150px;border-radius:50%;background-color:#F7E1E2;display:flex;align-items:center;justify-content:center;margin:auto}.hireChoose .list .list-item h4{font-size:20px;font-weight:bold;color:#ed2a32;margin:25px 0}.hireChoose .list .list-item p{font-size:16px;font-weight:500;color:#000}.hireChoose.white-bg{background-color:#fff}@media(max-width:575px){.hireChoose .content h5{font-size:14px}.hireChoose .content h3{font-size:20px}.hireChoose .content p{font-size:14px}.hireChoose .list{grid-template-columns:1fr;gap:20px}}</style>
<?php endif; ?>
<?php
$data        = get_query_var( 'component_data' );
$d           = $data['hire_choose'] ?? array();
$mod         = get_query_var( 'component_modifier_classes', '' );
$img_base    = get_stylesheet_directory_uri() . '/assets/images';
$choose_list = $d['choose_list'] ?? array();
?>
<section class="hireChoose<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="content">
			<h2><?php echo esc_html( $d['sub_head'] ?? '' ); ?></h2>
			<p><?php echo esc_html( $d['para_text'] ?? '' ); ?></p>
		</div>
		<div class="list">
			<?php foreach ( $choose_list as $item ) : ?>
			<div class="list-item">
				<div class="list-img">
					<img
						src="<?php echo esc_url( $img_base . ( $item['src'] ?? '' ) ); ?>"
						width="<?php echo (int) ( $item['width'] ?? 88 ); ?>"
						height="<?php echo (int) ( $item['height'] ?? 88 ); ?>"
						alt="<?php echo esc_attr( $item['head'] ?? '' ); ?>"
						loading="lazy"
						decoding="async"
					>
				</div>
				<h3><?php echo wp_kses( $item['head'] ?? '', array( 
    'a' => array( 
        'href'   => array(), 
        'title'  => array(), 
        'target' => array(), 
        'rel'    => array() 
    ) 
) ); ?></h3>
				<p><?php echo wp_kses( $item['para'] ?? '', array( 'br' => array() ) ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
