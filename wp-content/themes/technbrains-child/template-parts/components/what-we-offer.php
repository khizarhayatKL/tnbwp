<?php
/**
 * Component: What We Offer
 *
 * Data key : what_we_offer
 * Fields   : sub_title, title (HTML — span allowed), para, listing[{img_src,alt,title,content}]
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['what_we_offer'] ?? array();
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$listing  = $d['listing'] ?? array();
$mod      = get_query_var( 'component_modifier_classes', '' );
$kses     = array( 'span' => array( 'class' => true ) );
?>
<section class="whatWeOffer<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="offer-info">
			<?php if ( ! empty( $d['sub_title'] ) ) : ?>
			<h5><?php echo esc_html( $d['sub_title'] ); ?></h5>
			<?php endif; ?>
			<?php if ( ! empty( $d['title'] ) ) : ?>
			<h2><?php echo wp_kses( $d['title'], $kses ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $d['para'] ) ) : ?>
			<p><?php echo esc_html( $d['para'] ); ?></p>
			<?php endif; ?>
		</div>
		<?php if ( ! empty( $listing ) ) : ?>
		<div class="offer-grid">
			<?php foreach ( $listing as $item ) : ?>
			<div class="box">
				<img
					src="<?php echo esc_url( $img_base . ( $item['img_src'] ?? '' ) ); ?>"
					width="65"
					height="65"
					alt="<?php echo esc_attr( $item['alt'] ?? $item['title'] ?? '' ); ?>"
					loading="lazy"
					decoding="async"
				>
				<h4><?php echo esc_html( $item['title'] ?? '' ); ?></h4>
				<p><?php echo esc_html( $item['content'] ?? '' ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
