<?php
defined( 'ABSPATH' ) || exit;

static $hcta_printed = false;
if ( ! $hcta_printed ) :
	$hcta_printed = true;
?>
<style>.hireCta{background:url("<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/hire/cta.png") center/cover no-repeat;padding:60px 0;box-shadow:0 0 10px rgb(0 0 0/53%);text-align:center}.hireCta .cta-main{width:70%;margin:auto}.hireCta .cta-main .cta-content{text-align:center;margin-bottom:25px}.hireCta .cta-main .cta-content h2{font-size:35px;font-weight:700;text-transform:uppercase;color:#ffff00;margin:0}.hireCta .cta-main .cta-content p{color:#fff;font-size:30px;font-weight:550;margin:0}.hireCta .cta-main .cta-btn{display:flex;gap:15px;justify-content:center}.hireCta .cta-main .cta-btn a,.hireCta .cta-main .cta-btn button{background-color:#fff;color:#ec1c24;width:50%;margin:auto;display:block;padding:11px 30px;font-size:18px;font-weight:700;text-transform:uppercase;text-align:center;border:2px solid transparent;transition:.5s;text-decoration:none;cursor:pointer;font-family:inherit;line-height:normal}.hireCta .cta-main .cta-btn a:hover,.hireCta .cta-main .cta-btn button:hover{color:#fff;background:transparent;border-color:#fff}@media(max-width:1199px){.hireCta .cta-main .cta-content h2{font-size:30px}.hireCta .cta-main .cta-content p{font-size:25px}}@media(max-width:991px){.hireCta .cta-main .cta-content h2{font-size:26px}.hireCta .cta-main .cta-content p{font-size:22px}}@media(max-width:767px){.hireCta .cta-main{width:100%}.hireCta .cta-main .cta-content h2{font-size:20px}.hireCta .cta-main .cta-content p{font-size:18px}}@media(max-width:575px){.hireCta .cta-main .cta-btn{display:grid}.hireCta .cta-main .cta-btn a,.hireCta .cta-main .cta-btn button{width:100%}}@media(max-width:400px){.hireCta .cta-main .cta-content h2{font-size:18px}.hireCta .cta-main .cta-content p{font-size:14px}}</style>
<?php endif; ?>
<?php
$data     = get_query_var( 'component_data' );
$data_key = $args['data_key'] ?? 'hire_cta_1';
$d        = $data[ $data_key ] ?? array();
$mod      = get_query_var( 'component_modifier_classes', '' );
?>
<section class="hireCta<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="cta-main">
			<div class="cta-content">
				<h2><?php echo esc_html( $d['title'] ?? '' ); ?></h2>
				<p><?php echo esc_html( $d['para'] ?? '' ); ?></p>
			</div>
			<div class="cta-btn">
				<?php if ( ! empty( $d['primary_button'] ) ) : ?>
				<?php if ( ! empty( $d['primary_btn_popup'] ) ) : ?>
				<button type="button" class="tnb-popup-trigger"><?php echo esc_html( $d['primary_btn_title'] ?? 'Get In Touch' ); ?></button>
				<?php else : ?>
				<a href="/contact-us"><?php echo esc_html( $d['primary_btn_title'] ?? 'Get In Touch' ); ?></a>
				<?php endif; ?>
				<?php endif; ?>
				<?php if ( ! empty( $d['secondary_button'] ) ) : ?>
				<a href="/contact-us/"><?php echo esc_html( $d['secondary_btn_title'] ?? 'Contact Us' ); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
