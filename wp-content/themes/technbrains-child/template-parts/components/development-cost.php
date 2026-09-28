<?php
/**
 * Component: Development Cost
 *
 * Data key : dev_cost
 * Fields   : title (h2 with span), para, listing[n].title, listing[n].img_src, listing[n].content[m].list
 * Section  : DevelopmentCostSec — static 3-column grid matching DevelopmentCost.jsx
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['dev_cost'] ?? array();
$listing  = $d['listing'] ?? array();
$mod      = get_query_var( 'component_modifier_classes', '' );
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$kses_h   = array( 'span' => array() );
$kses_li  = array( 'span' => array( 'class' => true ) );
?>
<section class="DevelopmentCostSec<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="content">
			<div class="heading">
				<?php if ( ! empty( $d['title'] ) ) : ?>
				<h2><?php echo wp_kses( $d['title'], $kses_h ); ?></h2>
				<?php endif; ?>
				<?php if ( ! empty( $d['para'] ) ) : ?>
				<p><?php echo wp_kses( $d['para'], array( 
    'a' => array( 
        'href'   => array(), 
        'title'  => array(), 
        'target' => array(), 
        'rel'    => array() 
    ) 
) ); ?></p>
				<?php endif; ?>
			</div>
			<div class="costBoxes">
				<?php foreach ( $listing as $item ) : ?>
				<div class="box">
					<?php if ( ! empty( $item['img_src'] ) ) : ?>
					<div class="imgWrapper">
						<img
							src="<?php echo esc_url( $img_base . $item['img_src'] ); ?>"
							width="<?php echo esc_attr( $item['img_width'] ?? '100' ); ?>"
							height="<?php echo esc_attr( $item['img_height'] ?? '100' ); ?>"
							alt="<?php echo esc_attr( $item['img_alt'] ?? ( $item['title'] ?? '' ) ); ?>"
							loading="lazy"
							decoding="async"
						>
					</div>
					<?php endif; ?>
					<div class="contentWrapper">
						<h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
						<ul>
							<?php foreach ( $item['content'] ?? array() as $li ) : ?>
							<li><?php echo wp_kses( $li['list'] ?? '', $kses_li ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
