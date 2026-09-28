<?php
/**
 * Component: Choose Results
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data       = get_query_var( 'component_data' );
$d          = $data['choose_results'] ?? [];
$img_base   = get_stylesheet_directory_uri() . '/assets/images';
$title      = $d['title']      ?? '';
$para       = $d['para']       ?? '';
$sub_text   = $d['sub_text']   ?? '';
$awards     = $d['awards']     ?? [];
$side_items = $d['side_items'] ?? [];
?>
<section class="choose-results <?php echo esc_attr( get_query_var( 'component_modifier_classes', '' ) ); ?>">
	<div class="container">
		<div class="content">
			<div class="leftSide">
				<?php if ( $title ) : ?>
				<h2><?php echo esc_html( $title ); ?></h2>
				<?php endif; ?>
				<?php if ( $para ) : ?>
				<p><?php echo wp_kses( $para, [ 
    'a' => [ 
        'href'   => [], 
        'title'  => [], 
        'target' => [], 
        'rel'    => [] 
    ] 
] ); ?></p>
				<?php endif; ?>
				<?php if ( ! empty( $awards ) ) : ?>
				<div class="awardGrid">
					<?php foreach ( $awards as $award ) : ?>
					<div class="imageWrapper">
						<img
							src="<?php echo esc_url( $img_base . $award['img_src'] ); ?>"
							width="<?php echo (int) $award['width']; ?>"
							height="<?php echo (int) $award['height']; ?>"
							alt="Award"
							loading="lazy"
							decoding="async"
						>
					</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>

			<div class="rightSide">
				<?php if ( $sub_text ) : ?>
				<span><?php echo esc_html( $sub_text ); ?></span>
				<?php endif; ?>
				<?php if ( ! empty( $side_items ) ) : ?>
				<ul>
					<?php foreach ( $side_items as $item ) : ?>
					<li>
						<span><?php echo esc_html( $item['count'] ); ?></span>
						<p><?php echo esc_html( $item['label'] ); ?></p>
					</li>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
