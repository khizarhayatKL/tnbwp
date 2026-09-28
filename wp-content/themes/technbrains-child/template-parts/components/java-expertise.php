<?php
defined( 'ABSPATH' ) || exit;

$img = get_stylesheet_directory_uri() . '/assets/images';
$mod = get_query_var( 'component_modifier_classes', '' );
?>
<section class="javaExpertise<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="je-top">
			<h5>Leading Java Development Company</h5>
			<h3>Our Expertise Extends To A Wide Array Of Industries</h3>
		</div>
		<div class="je-bottom">
			<div class="je-image">
				<img src="<?php echo esc_url( $img . '/stack/java/expertise.png' ); ?>" width="650" height="570" alt="Java expertise" loading="lazy" decoding="async">
			</div>
			<div class="je-grid">
				<div class="je-item">
					<h4>Web Application Development</h4>
					<p>Create modular, scalable, reliable, and responsive solutions tailored to finance, healthcare, and manufacturing industries.</p>
				</div>
				<div class="je-item">
					<h4>Java API Development</h4>
					<p>Craft lightweight, high-performance, and secure REST APIs, consumable by any front-end or third-party applications.</p>
				</div>
				<div class="je-item">
					<h4>Enterprise Java Integration</h4>
					<p>Facilitate seamless communication between mission-critical, heterogeneous business applications to automate and enhance your business processes.</p>
				</div>
				<div class="je-item">
					<h4>Java Application Migration</h4>
					<p>Competently migrate your business applications to adapt to evolving demands, modern architectures, intuitive UI/UX, and the latest web standards.</p>
				</div>
				<div class="je-item">
					<h4>Java Maintenance &amp; Support</h4>
					<p>As a dedicated Java web development company, we offer full-fledged maintenance and support services, adding new features and modules as needed.</p>
				</div>
				<div class="je-item">
					<h4>Dedicated Java Team</h4>
					<p>Our highly motivated team of Java programmers serves as your extended team, adaptable to business needs for a cost-effective solution.</p>
				</div>
			</div>
		</div>
	</div>
</section>
