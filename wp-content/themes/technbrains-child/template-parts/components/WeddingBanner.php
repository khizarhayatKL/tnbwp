<?php
defined( 'ABSPATH' ) || exit;

$img          = get_stylesheet_directory_uri() . '/assets/images';
$mod          = get_query_var( 'component_modifier_classes', '' );
$bg_image     = $args['bg_image'] ?? '';
$logo         = $args['logo'] ?? '';
$logo_width   = $args['logo_width'] ?? 195;
$logo_height  = $args['logo_height'] ?? 94;
$heading      = $args['heading'] ?? '';
$para         = $args['para'] ?? '';
$btn_title    = $args['btn_title'] ?? '';
$banner_image = $args['banner_image'] ?? '';
$banner_w     = $args['banner_width'] ?? 670;
$banner_h     = $args['banner_height'] ?? 404;
$allowed_h    = array( 'span' => array(), 'br' => array() );
$heading_tag  = ( strpos( $mod, 'wedding-app-footer' ) !== false ) ? 'h2' : 'h1';
?>
<section class="wedding-app<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>" style="background-image:url('<?php echo esc_url( $img . $bg_image ); ?>');">
	<div class="container">
		<?php tnb_breadcrumb_html(); ?>
		<div class="content">
			<?php if ( $logo ) : ?>
			<img src="<?php echo esc_url( $img . $logo ); ?>" width="<?php echo esc_attr( $logo_width ); ?>" height="<?php echo esc_attr( $logo_height ); ?>" alt="logo" loading="eager" decoding="async">
			<?php endif; ?>
			<?php if ( $heading ) : ?>
			<?php echo '<' . $heading_tag . '>' . wp_kses( $heading, $allowed_h ) . '</' . $heading_tag . '>'; ?>
			<?php endif; ?>
			<?php if ( $para ) : ?>
			<p><?php echo wp_kses_post( $para ); ?></p>
			<?php endif; ?>
			<?php if ( $btn_title ) : ?>
			<button class="tnb-popup-trigger slideHOv"><?php echo esc_html( $btn_title ); ?></button>
			<?php endif; ?>
			<?php if ( $banner_image ) : ?>
			<div class="image">
				<img src="<?php echo esc_url( $img . $banner_image ); ?>" width="<?php echo esc_attr( $banner_w ); ?>" height="<?php echo esc_attr( $banner_h ); ?>" alt="banner" loading="lazy" decoding="async">
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
