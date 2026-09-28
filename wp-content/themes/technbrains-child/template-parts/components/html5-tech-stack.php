<?php
defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['html5_tech_stack'] ?? array();
$listing  = $d['listing'] ?? array();
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$mod      = get_query_var( 'component_modifier_classes', '' );
?>
<section class="html5TechStack<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<?php if ( ! empty( $d['sub_title'] ) ) : ?>
		<h4><?php echo esc_html( $d['sub_title'] ); ?></h4>
		<?php endif; ?>
		<?php if ( ! empty( $d['title'] ) ) : ?>
		<h2><?php echo esc_html( $d['title'] ); ?></h2>
		<?php endif; ?>
		<div class="hts-stack-grid">
			<?php foreach ( $listing as $item ) : ?>
			<div class="hts-stack-box">
				<img
					src="<?php echo esc_url( $img_base . ( $item['img_src'] ?? '' ) ); ?>"
					width="60"
					height="60"
					alt="<?php echo esc_attr( $item['title'] ?? '' ); ?>"
					loading="lazy"
					decoding="async"
				>
				<h6><?php echo esc_html( $item['title'] ?? '' ); ?></h6>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
