<?php
defined( 'ABSPATH' ) || exit;

$mod = get_query_var( 'component_modifier_classes', '' );
?>
<section class="dmGetInstantBtn<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<a class="custom-btn" href="mailto:contact@technbrains.com">
			<span class="text">HAVE MORE QUESTIONS? EMAIL US!</span>
			<span class="line -right"></span>
			<span class="line -top"></span>
			<span class="line -left"></span>
			<span class="line -bottom"></span>
		</a>
	</div>
</section>
