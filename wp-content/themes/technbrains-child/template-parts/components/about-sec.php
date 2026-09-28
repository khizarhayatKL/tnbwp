<?php
defined( 'ABSPATH' ) || exit;

$mod = get_query_var( 'component_modifier_classes', '' );
?>
<section class="aboutSec<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="aboutSec-info">
			<h6>About Us</h6>
			<h2>A <span>Leading</span> Digital Marketing Company</h2>
			<p>Digital marketing on its basic level is known as advertising distributed via digital channels like search engines, websites, social media, email, and mobile apps. Digital marketing is the process of organizations endorsing goods, services, and brands through these online media channels. <span>Digital marketing for business</span> is required to optimize your marketing efforts. <span>Digital marketing strategies</span> may bring you closer to your target audience, learning critical facts about them, and providing solutions that will lend credibility to your marketing team. Technbrains is a full-service digital marketing business that is creative, agile and doesn't rely on old-school methods to attract new clients. Instead, we rely on our search engine optimization (SEO) and marketing expertise to attract new visitors to your site.</p>
			<h4>Already Feel ConvinCed?</h4>
			<div class="aboutSec-cta">
				<div class="qoute">
					<a class="custom-btn tnb-popup-trigger" role="button" tabindex="0">
						<span class="text">GET STARTED</span>
						<span class="line -right"></span>
						<span class="line -top"></span>
						<span class="line -left"></span>
						<span class="line -bottom"></span>
					</a>
				</div>
				<div class="qoute">
					<a class="custom-btn" href="tel:+1 (833) 888-6032">
						<span class="text">Call Now</span>
						<span class="line -right"></span>
						<span class="line -top"></span>
						<span class="line -left"></span>
						<span class="line -bottom"></span>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
