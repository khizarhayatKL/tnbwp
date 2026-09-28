<?php
defined( 'ABSPATH' ) || exit;

$data    = get_query_var( 'component_data' );
$items   = $data['key_challenge_list'] ?? array();
$img     = get_stylesheet_directory_uri() . '/assets/images';
$mod     = get_query_var( 'component_modifier_classes', '' );
$allowed = array( 'span' => array() );
?>
<section class="wedding-challenges<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="content">
			<div class="text">
				<h3>Key <span>Challenges</span></h3>
				<ul>
					<?php foreach ( $items as $item ) : ?>
					<li>
						<h4><?php echo esc_html( $item['title'] ); ?></h4>
						<p><?php echo esc_html( $item['content'] ); ?></p>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="image">
				<img src="<?php echo esc_url( $img . '/case-studies/wedding-app/challenge-side-2.webp' ); ?>" width="619" height="932" alt="Key challenges" loading="lazy" decoding="async">
			</div>
		</div>
	</div>
</section>
