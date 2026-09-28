<?php
defined( 'ABSPATH' ) || exit;

$data    = get_query_var( 'component_data' );
$items   = $data['feature_list'] ?? array();
$img     = get_stylesheet_directory_uri() . '/assets/images';
$mod     = get_query_var( 'component_modifier_classes', '' );
?>
<section class="features<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="box">
			<div class="grid">
				<div class="listing">
					<?php foreach ( $items as $item ) : ?>
					<div class="single">
						<img src="<?php echo esc_url( $img . $item['icon'] ); ?>" width="65" height="65" alt="<?php echo esc_attr( $item['title'] ); ?> icon" loading="lazy" decoding="async">
						<div class="content">
							<h4><?php echo esc_html( $item['title'] ); ?></h4>
							<p><?php echo esc_html( $item['content'] ); ?></p>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<div class="image">
					<img src="<?php echo esc_url( $img . '/case-studies/wedding-app/feature-side.webp' ); ?>" width="370" height="335" alt="feature side" loading="lazy" decoding="async">
				</div>
			</div>
		</div>
	</div>
</section>
