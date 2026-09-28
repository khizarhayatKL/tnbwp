<?php
/**
 * Component: Benefits of Work
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data        = get_query_var( 'component_data' );
$d           = $data['benefits_of_work'] ?? array();
$img_base    = get_stylesheet_directory_uri() . '/assets/images';
$subtitle    = $d['subtitle']     ?? '';
$title       = $d['title']        ?? '';
$para        = $d['para']         ?? '';
$listing     = $d['listing']      ?? array();
$listing_two = $d['listing_two']  ?? array();
?>
<section class="benefitsOfWork <?php echo esc_attr( get_query_var( 'component_modifier_classes', '' ) ); ?>">
	<div class="container">
		<div class="main-info">
			<?php if ( $subtitle ) : ?>
			<h5><?php echo esc_html( $subtitle ); ?></h5>
			<?php endif; ?>
			<?php if ( $title ) : ?>
			<h2><?php echo wp_kses( $title, array( 'br' => array(), 'span' => array( 'class' => true ) ) ); ?></h2>
			<?php endif; ?>
			<?php if ( $para ) : ?>
			<p><?php echo esc_html( $para ); ?></p>
			<?php endif; ?>
		</div>

		<?php if ( ! empty( $listing ) ) : ?>
		<div class="grid-info">
			<?php foreach ( $listing as $item ) : ?>
			<div class="stats">
				<div class="img-box">
					<img
						src="<?php echo esc_url( $img_base . ( $item['img_src'] ?? '' ) ); ?>"
						width="64"
						height="64"
						alt="icon"
						loading="lazy"
						decoding="async"
					>
				</div>
			 <p><?php echo wp_kses( $item['para'] ?? '', array( 'b' => array(), 'strong' => array(), 'br' => array() ) ); ?></p>

			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<?php if ( ! empty( $listing_two ) ) : ?>
		<div class="grid-stats-content">
			<?php foreach ( $listing_two as $item ) : ?>
			<div class="content-box">
				<h3><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
				<ul>
					<?php foreach ( $item['content'] ?? array() as $li ) : ?>
					<li><?php echo wp_kses( $li['list'] ?? '', array( 'b' => array(), 'strong' => array() ) ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
