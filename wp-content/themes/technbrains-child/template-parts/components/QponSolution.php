<?php
defined( 'ABSPATH' ) || exit;

$data      = get_query_var( 'component_data' );
$d         = $data['qpon_solution'] ?? array();
$mod       = get_query_var( 'component_modifier_classes', '' );
$solutions = $d['solutions'] ?? array();
?>
<section class="qpon-solution<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="solution-content">
			<h2>TechnBrains<br>Solution</h2>
			<p>Your innovation partner in mobile app development, brings strategic expertise to enhance QPon, making it your ultimate savings and discount app.</p>
		</div>
		<div class="solution-wrapper">
			<?php foreach ( $solutions as $item ) : ?>
			<div class="wrapper-content">
				<h4><?php echo esc_html( $item['title'] ); ?></h4>
				<p><?php echo esc_html( $item['para'] ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
