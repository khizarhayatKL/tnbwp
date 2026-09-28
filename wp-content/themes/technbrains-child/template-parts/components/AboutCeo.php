<?php
defined( 'ABSPATH' ) || exit;

$img = get_stylesheet_directory_uri() . '/assets/images';
$mod = get_query_var( 'component_modifier_classes', '' );
?>
<section class="ceo-main<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="ceo-grid">
			<div class="right-info">
				<h2>Message From The Co-Founder</h2>
				<h3>"Technology isn't just a tool; it's the architect of tomorrow's possibilities."</h3>
				<p>I believe in the transformative power of technology. As the architect of tomorrow's possibilities, we strive to create solutions that not only meet today's challenges but also anticipate the needs of the future. Join us on this exhilarating journey, where every idea, every innovation, is a step towards a brighter and more connected world.<br><br></p>
				<h4>Muzammil Rawjani</h4>
				<p>Co-Founder</p>
			</div>
		</div>
	</div>
</section>
