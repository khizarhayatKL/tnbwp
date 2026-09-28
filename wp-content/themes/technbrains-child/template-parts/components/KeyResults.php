<?php
defined( 'ABSPATH' ) || exit;

$data  = get_query_var( 'component_data' );
$items = $data['result_list'] ?? array();
$img   = get_stylesheet_directory_uri() . '/assets/images';
$mod   = get_query_var( 'component_modifier_classes', '' );
?>
<section class="wedding-results<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="content">
			<div class="image">
				<img src="<?php echo esc_url( $img . '/case-studies/wedding-app/wedding-side-result.webp' ); ?>" width="619" height="932" alt="Key results" loading="lazy" decoding="async">
			</div>
			<div class="text">
				<h3>Key <span>Results</span></h3>
				<ul>
					<?php foreach ( $items as $item ) : ?>
					<li>
						<h4><?php echo esc_html( $item['title'] ); ?></h4>
						<p><?php echo esc_html( $item['content'] ); ?></p>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</section>
