<?php
/**
 * Component: Augmentation Services
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['augmentation_services'] ?? [];
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$title    = $d['title']    ?? '';
$para     = $d['para']     ?? '';
$listing  = $d['listing']  ?? [];
$btn_text = $d['btn_text'] ?? '';
$classes  = $d['classes']  ?? '';
$is_three = ( $classes === 'gridThree' );
?>
<section class="augmentationServices">
	<div class="container">
		<div class="main">
			<?php if ( $title ) : ?>
			<h2><?php echo wp_kses_post( $title ); ?></h2>
			<?php endif; ?>
			<?php if ( $para ) : ?>
			<p><?php echo esc_html( $para ); ?></p>
			<?php endif; ?>
		</div>

		<div class="listing<?php echo $is_three ? ' three-col' : ''; ?>">
			<?php foreach ( $listing as $item ) : ?>
			<div class="single">
				<div class="icon">
					<img
						src="<?php echo esc_url( $img_base . $item['icon'] ); ?>"
						width="59"
						height="53"
						alt="<?php echo esc_attr( $item['title'] ); ?>"
						loading="lazy"
						decoding="async"
					>
				</div>
				<h3><?php echo esc_html( $item['title'] ); ?></h3>
				<p><?php echo wp_kses( $item['para'], [ 
    'a' => [ 
        'href'   => [], 
        'title'  => [], 
        'target' => [], 
        'rel'    => [] 
    ] 
] ); ?></p>
				<?php if ( ! empty( $item['link'] ) ) : ?>
				<a class='arrowIcon' href="<?php echo esc_url( $item['link'] ); ?>" aria-label="Learn more about <?php echo esc_attr( $item['title'] ); ?>">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><line x1="7" y1="17" x2="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>
				</a>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>

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
