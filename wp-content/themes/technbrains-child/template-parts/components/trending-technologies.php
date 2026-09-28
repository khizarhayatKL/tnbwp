<?php
defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['trending_technologies'] ?? array();
$listing  = $d['listing'] ?? array();
$mod      = get_query_var( 'component_modifier_classes', '' );
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$kses_h   = array( 'span' => array() );
?>
<section class="TrendingTechSec<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="content">
			<div class="heading">
				<?php if ( ! empty( $d['heading'] ) ) : ?>
				<h2><?php echo wp_kses( $d['heading'], $kses_h ); ?></h2>
				<?php endif; ?>
				<?php if ( ! empty( $d['content'] ) ) : ?>
				<p><?php echo esc_html( $d['content'] ); ?></p>
				<?php endif; ?>
			</div>
			<div class="TechBoxes">
				<?php foreach ( $listing as $item ) : ?>
				<div class="TechBox">
					<img
						src="<?php echo esc_url( $img_base . ( $item['img_src'] ?? '' ) ); ?>"
						width="<?php echo esc_attr( $item['width'] ?? '92' ); ?>"
						height="<?php echo esc_attr( $item['height'] ?? '92' ); ?>"
						alt="<?php echo esc_attr( $item['title'] ?? 'technology' ); ?>"
						loading="lazy"
						decoding="async"
					>
					<h3><?php echo wp_kses( $item['title'] ?? '', array( 
    'a' => array( 
        'href'   => array(), 
        'title'  => array(), 
        'target' => array(), 
        'rel'    => array() 
    ) 
) ); ?></h3>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
