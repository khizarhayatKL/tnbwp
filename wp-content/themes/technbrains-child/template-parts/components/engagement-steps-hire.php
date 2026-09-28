<?php
defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['steps_hire'] ?? array();
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$box_list = $d['box_list'] ?? array();
$mod      = get_query_var( 'component_modifier_classes', '' );
?>
<section class="stepsHire<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="sh-content">
			<?php if ( ! empty( $d['head_text'] ) ) : ?>
			<span><?php echo esc_html( $d['head_text'] ); ?></span>
			<?php endif; ?>
			<?php if ( ! empty( $d['sub_head'] ) ) : ?>
			<h2><?php echo esc_html( $d['sub_head'] ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $d['para_text'] ) ) : ?>
			<p><?php echo esc_html( $d['para_text'] ); ?></p>
			<?php endif; ?>
		</div>
		<?php foreach ( $box_list as $box ) : ?>
		<div class="sh-box">
			<div class="sh-box-image">
				<?php if ( ! empty( $box['image_src'] ) ) : ?>
				<img
					src="<?php echo esc_url( $img_base . $box['image_src'] ); ?>"
					width="<?php echo (int) ( $box['width'] ?? 368 ); ?>"
					height="<?php echo (int) ( $box['height'] ?? 261 ); ?>"
					alt="<?php echo esc_attr( $box['title'] ?? '' ); ?>"
					loading="lazy"
					decoding="async"
				>
				<?php endif; ?>
			</div>
			<div class="sh-box-content">
				<h3><?php echo esc_html( $box['title'] ?? '' ); ?></h3>
				<?php if ( ! empty( $box['content'] ) ) : ?>
				<ul>
					<?php foreach ( $box['content'] as $item ) : ?>
					<li><?php echo wp_kses( $item, array( 
    'a' => array( 
        'href'   => array(), 
        'title'  => array(), 
        'target' => array(), 
        'rel'    => array() 
    ) 
) ); ?></li>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
				<a class="tnb-btn slideHOv sh-hire-btn" href="#form-section">Hire Now</a>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</section>
