<?php
defined( 'ABSPATH' ) || exit;

$mod = get_query_var( 'component_modifier_classes', '' );
?>
<section class="qpon-conclusion<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="conclusion-content">
			<h2>Conclusion</h2>
			<p>In partnership with TechnBrains, QPon is poised to revolutionize your savings journey. Embrace the future of discounts, and start saving today!</p>
		</div>
	</div>
</section>
