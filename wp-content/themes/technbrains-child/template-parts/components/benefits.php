<?php
/**
 * Component: Benefits — mirrors EngagementModel/Benefits.jsx
 *
 * Data key : benefits
 * Fields   : title_html, para, box_para, listing[{ img_src, name, para }]
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data      = get_query_var( 'component_data' );
$d         = $data['benefits'] ?? array();
$img_base  = get_stylesheet_directory_uri() . '/assets/images';
$listing   = $d['listing']    ?? array();
$para_two  = $d['para_two']   ?? '';
$para_three = $d['para_three'] ?? '';
$mod       = get_query_var( 'component_modifier_classes', '' );

$kses_title = array(
	'span' => array( 'class' => true ),
	'br'   => array(),
	'em'   => array(),
	'b'    => array(),
);
?>
<section class="benefitsSection<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="bs-main-info">
			<?php if ( ! empty( $d['title_html'] ) ) : ?>
			<h2><?php echo wp_kses( $d['title_html'], $kses_title ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $d['para'] ) ) : ?>
			<p><?php echo esc_html( $d['para'] ); ?></p>
			<?php endif; ?>
		</div>
		<?php if ( $para_two ) : ?>
		<div class="bs-para-div">
			<p><?php echo esc_html( $para_two ); ?></p>
		</div>
		<?php endif; ?>
		<?php if ( ! empty( $d['box_para'] ) ) : ?>
		<div class="bs-para-box">
			<p><?php echo esc_html( $d['box_para'] ); ?></p>
		</div>
		<?php endif; ?>
		<?php if ( ! empty( $listing ) ) : ?>
		<div class="bs-info-grid">
			<?php foreach ( $listing as $item ) : ?>
			<div class="bs-box-list">
				<div class="bs-image-box">
					<img
						src="<?php echo esc_url( $img_base . ( $item['img_src'] ?? '' ) ); ?>"
						width="56"
						height="56"
						alt="<?php echo esc_attr( $item['name'] ?? '' ); ?>"
						loading="lazy"
						decoding="async"
					>
					<h3><?php echo esc_html( $item['name'] ?? '' ); ?></h3>
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
		<?php if ( $para_three ) : ?>
		<div class="bs-third-para">
			<p><?php echo esc_html( $para_three ); ?></p>
		</div>
		<?php endif; ?>
	</div>
</section>
