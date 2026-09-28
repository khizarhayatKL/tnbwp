<?php
/**
 * Component: Two Boxes
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data       = get_query_var( 'component_data' );
$d          = $data['two_boxes'] ?? array();
$img_base   = get_stylesheet_directory_uri() . '/assets/images';
$subtitle   = $d['subtitle']    ?? '';
$title      = $d['title']       ?? '';
$para       = $d['para']        ?? '';
$listing    = $d['listing']     ?? array();
$tnb_logo   = $d['tnb_logo']    ?? '';
$client_logo = $d['client_logo'] ?? '';
$mod_class  = get_query_var( 'component_modifier_classes', '' );
$mod_class  = $mod_class ? ' ' . esc_attr( $mod_class ) : '';
?>
<section class="twoBoxes<?php echo esc_attr( $mod_class ); ?>">
	<div class="container">
		<div class="main-info">
			<?php if ( $subtitle ) : ?>
			<span><?php echo esc_html( $subtitle ); ?></span>
			<?php endif; ?>
			<?php if ( $title ) : ?>
			<h2><?php echo esc_html( $title ); ?></h2>
			<?php endif; ?>
			<?php if ( $para ) : ?>
			<p><?php echo esc_html( $para ); ?></p>
			<?php endif; ?>
		</div>
		<?php if ( $tnb_logo ) : ?>
		<div class="tnbLogo">
			<img
				src="<?php echo esc_url( $img_base . $tnb_logo ); ?>"
				width="196"
				height="109"
				alt="TechnBrains Logo"
				loading="lazy"
				decoding="async"
			>
		</div>
		<?php endif; ?>
		<?php if ( ! empty( $listing ) ) : ?>
		<div class="main-tab">
			<?php foreach ( $listing as $item ) : ?>
			<div class="mainDiv">
				<div class="mainBox">
					<img
						src="<?php echo esc_url( $img_base . ( $item['img_src'] ?? '' ) ); ?>"
						width="<?php echo esc_attr( $item['img_width'] ?? '60' ); ?>"
						height="<?php echo esc_attr( $item['img_height'] ?? '60' ); ?>"
						alt="<?php echo esc_attr( $item['title'] ?? '' ); ?>"
						loading="lazy"
						decoding="async"
					>
					<h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
				</div>
				<p><?php echo wp_kses( $item['para'] ?? '', array( 
    'a' => array( 
        'href'   => array(), 
        'title'  => array(), 
        'target' => array(), 
        'rel'    => array() 
    ) 
) ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
		<?php if ( $client_logo ) : ?>
		<div class="clientLogo">
			<img
				src="<?php echo esc_url( $img_base . $client_logo ); ?>"
				width="109"
				height="109"
				alt="Client Logo"
				loading="lazy"
				decoding="async"
			>
		</div>
		<?php endif; ?>
	</div>
</section>
