<?php
defined( 'ABSPATH' ) || exit;

$data       = get_query_var( 'component_data' );
$challenges = $data['challenge_list'] ?? array();
$key_list   = $data['key_list'] ?? array();
$img        = get_stylesheet_directory_uri() . '/assets/images';
$mod        = get_query_var( 'component_modifier_classes', '' );
?>
<section class="business-problems<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="content">
			<div class="head">
				<h2>Business <span>Problems</span></h2>
				<p>Weddings involve intricate planning, communication, and coordination between multiple parties. The client struggled with the limitations of web-based tools, which lacked flexibility for on-the-go planning. They needed a mobile solution that would centralize all wedding planning tasks while keeping the experience intuitive and efficient for users.</p>
			</div>
			<div class="box">
				<div class="grid">
					<div class="image">
						<img src="<?php echo esc_url( $img . '/case-studies/wedding-app/b-problem.webp' ); ?>" width="330" height="620" alt="mobile" loading="lazy" decoding="async">
					</div>
					<div class="text">
						<h3>Challenges</h3>
						<ul>
							<?php foreach ( $challenges as $item ) : ?>
							<li><?php echo esc_html( $item['content'] ); ?></li>
							<?php endforeach; ?>
						</ul>
						<h3>Key Results</h3>
						<ul>
							<?php foreach ( $key_list as $item ) : ?>
							<li><?php echo esc_html( $item['content'] ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
