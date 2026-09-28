<?php
defined( 'ABSPATH' ) || exit;

$img = get_stylesheet_directory_uri() . '/assets/images';
$mod = get_query_var( 'component_modifier_classes', '' );
?>
<section class="project-background<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="content">
			<div class="head">
				<h2>Project <span>Background</span></h2>
				<p>The client, a professional wedding planner, aimed to create a dedicated mobile app to complement their web-based wedding planning tools. They needed a solution that would simplify complex planning tasks, enhance guest engagement, and provide couples with a memorable experience.</p>
			</div>
			<div class="box">
				<div class="grid">
					<div class="text">
						<h3>Key Features</h3>
						<ul>
							<li>
								<h4>Couple Features</h4>
								<ul>
									<li>Personalized couple story and wedding details</li>
									<li>Social media handle management</li>
									<li>Comprehensive event schedule</li>
								</ul>
							</li>
							<li>
								<h4>Guest Features</h4>
								<ul>
									<li>RSVP management and SMS reminders</li>
									<li>Access to flight details, floor plans, and seating charts</li>
									<li>Gift registry with in-app purchase options</li>
								</ul>
							</li>
							<li>
								<h4>Vendor Features</h4>
								<ul>
									<li>Vendor profiles and service management</li>
									<li>Direct communication with couples</li>
								</ul>
							</li>
							<li>
								<h4>General Features</h4>
								<ul>
									<li>Destination recommendations for travel</li>
									<li>QR codes for seamless check-ins</li>
									<li>Community and chat features for guests</li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="image">
						<img src="<?php echo esc_url( $img . '/case-studies/wedding-app/b-problem.webp' ); ?>" width="330" height="620" alt="mobile" loading="lazy" decoding="async">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
