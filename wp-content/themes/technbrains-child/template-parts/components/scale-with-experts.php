<?php
defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['scale_with_experts'] ?? [];
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$title    = $d['title']    ?? '';
$para     = $d['para']     ?? '';
$listing  = $d['listing']  ?? [];
$btn_text = $d['btn_text'] ?? '';
$mod      = get_query_var( 'component_modifier_classes', '' );
?>
<section class="ScaleWithExperts<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="main">
			<?php if ( $title ) : ?>
			<h2><?php echo wp_kses_post( $title ); ?></h2>
			<?php endif; ?>
			<?php if ( $para ) : ?>
			<p><?php echo wp_kses_post( $para ); ?></p>
			<?php endif; ?>
		</div>
		<?php if ( ! empty( $listing ) ) : ?>
		<div class="listing">
			<?php foreach ( $listing as $item ) : ?>
			<div class="single">
				<div class="icon">
					<img
						src="<?php echo esc_url( $img_base . ( $item['icon'] ?? '' ) ); ?>"
						width="59"
						height="53"
						alt="icon"
						loading="lazy"
						decoding="async"
					>
				</div>
				<h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
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
</section>
