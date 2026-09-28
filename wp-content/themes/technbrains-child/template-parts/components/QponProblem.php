<?php
defined( 'ABSPATH' ) || exit;

$mod = get_query_var( 'component_modifier_classes', '' );
?>
<section class="qpon-problem<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="problem-content">
			<h2>The Problem</h2>
			<p>Consumers struggle to maximize their savings because they lack a one-stop solution for accessing diverse brand discounts. QPon's challenge is to raise awareness of its mobile app, enticing users to subscribe to monthly deals and discounts while becoming a prominent name in the discount market.</p>
		</div>
	</div>
</section>
