<?php
defined( 'ABSPATH' ) || exit;

$img = get_stylesheet_directory_uri() . '/assets/images';
$mod = get_query_var( 'component_modifier_classes', '' );
?>
<section class="pythonDiscover<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<h4>Discover how python is Game Changer</h4>
		<h2>The Best Python Development Company</h2>
		<p>We stand out as a proficient, versatile, and agile Python development company leveraging Python for web development, Machine Learning, CMS portals, and mobile app development. With a dedicated team of 25+ Python experts and 5+ project managers boasting over a decade of experience, we deliver scalable and robust web solutions. From idea conceptualization to support &amp; maintenance, our end-to-end Python development services ensure a comprehensive approach, making us your one-stop destination.</p>
		<div class="pd-des-grid">
			<div class="pd-left-info">
				<img src="<?php echo esc_url( $img . '/stack/python/python-dev.png' ); ?>" width="558" height="312" alt="python-dev" loading="lazy" decoding="async">
			</div>
			<div class="pd-right-info">
				<h3>Critical Advantages of Python in Web Development</h3>
				<ul>
					<li>Rapid Application Development.</li>
					<li>Enhanced Web Productivity.</li>
					<li>Extensive Library Support in Python Software Development.</li>
					<li>User-Friendly Data Structures Tailored for Web Apps.</li>
					<li>Scalable Enterprise Application Building.</li>
					<li>Exceptional Performance in Data Science and Machine Learning.</li>
				</ul>
			</div>
		</div>
	</div>
</section>
