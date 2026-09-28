<?php
defined( 'ABSPATH' ) || exit;

$img = get_stylesheet_directory_uri() . '/assets/images';
$mod = get_query_var( 'component_modifier_classes', '' );
?>

<!-- Section 1: Banner -->
<section class="fcs-main-fix-car-banner<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
	
		<div class="fix-car-main">
				<?php tnb_breadcrumb_html(); ?>
			<div class="ban-logo">
				<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/fix-logo.png' ); ?>" width="262" height="201" alt="FixCarSharer logo" loading="eager" decoding="async">
			</div>
		</div>
	</div>
</section>

<!-- Section 2: Project Overview -->
<section class="fcs-section-project-overview">
	<div class="container">
		<div class="project-overview-grid">
			<div class="project-title">
				<h2>Project Overview</h2>
			</div>
			<div class="project-details">
				<h4>About Fixcarsharer</h4>
				<p>The "Fix Car Sharer" aims to develop a user-centric carpooling app that revolutionizes how people commute. This app is designed to provide a sustainable and convenient transportation solution, catering to users' preferences and needs while reducing traffic congestion and carbon emissions.</p>
				<h4>Business Problem</h4>
				<p>The primary business challenge for Fix Car Sharer is to rapidly attract and retain users and drivers, overcoming hurdles such as user adoption, driver recruitment, safety concerns, and competitive pressures. Ensuring regulatory compliance, promoting sustainability, and managing finances are critical for its success and growth in carpooling.</p>
			</div>
		</div>
	</div>
</section>

<!-- Section 3: Pin Location -->
<section class="fcs-pin-location-sec">
	<div class="container">
		<div class="pin-img">
			<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/pin.png' ); ?>" width="1200" height="212" alt="pin" loading="lazy" decoding="async">
		</div>
		<div class="pro-sec-grid">
			<div class="pro-sec-info">
				<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/money.png' ); ?>" width="100" height="100" alt="money" loading="lazy" decoding="async">
				<h4>Preference-Based<br>Matchmaking</h4>
				<p>Users can set their carpooling preferences, including route, departure times, and fellow passengers, and the app matches them with compatible carpooling partners.</p>
			</div>
			<div class="pro-sec-info">
				<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/planet-earth.png' ); ?>" width="100" height="100" alt="planet-earth" loading="lazy" decoding="async">
				<h4>Real-Time<br>Tracking</h4>
				<p>The app offers real-time tracking of carpooling partners' locations on a map, ensuring transparency and safety during the journey.</p>
			</div>
			<div class="pro-sec-info">
				<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/laugh.png' ); ?>" width="100" height="100" alt="laugh" loading="lazy" decoding="async">
				<h4>Payment<br>Integration</h4>
				<p>Users can seamlessly split the cost of fuel and maintenance with their carpooling partners through the app, simplifying financial transactions.</p>
			</div>
		</div>
	</div>
</section>

<!-- Section 4: Problem Definition -->
<section class="fcs-problem-defination-main">
	<div class="container">
		<div class="problem-title">
			<h2>Problem defination</h2>
		</div>
		<div class="problem-defination-grid">
			<div class="problem-info">
				<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/shield.png' ); ?>" width="72" height="72" alt="shield" loading="lazy" decoding="async">
				<h4>Carpooling</h4>
				<ul>
					<li>
						<span>Challenge</span>
						<p>Convincing individuals to embrace carpooling as a sustainable and convenient mode of transportation.</p>
					</li>
					<li>
						<span>Key Result</span>
						<p>A substantial increase in active users indicates successful adoption and retention strategies.</p>
					</li>
				</ul>
			</div>
			<div class="problem-info">
				<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/shield.png' ); ?>" width="72" height="72" alt="shield" loading="lazy" decoding="async">
				<h4>Drivers</h4>
				<ul>
					<li>
						<span>Challenge</span>
						<p>Attracting a diverse pool of drivers to provide ample carpooling options.</p>
					</li>
					<li>
						<span>Key Result</span>
						<p>A diverse group of drivers from various backgrounds and demographics ensures a wide range of carpooling options.</p>
					</li>
				</ul>
			</div>
			<div class="problem-info">
				<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/shield.png' ); ?>" width="72" height="72" alt="shield" loading="lazy" decoding="async">
				<h4>Security</h4>
				<ul>
					<li>
						<span>Challenge</span>
						<p>Establishing trust among users regarding safety, preferences, reliability, and compatibility with carpooling partners.</p>
					</li>
					<li>
						<span>Key Result</span>
						<p>Positive user ratings and reviews reflect a strong sense of trust and satisfaction.</p>
					</li>
				</ul>
			</div>
			<div class="problem-info">
				<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/shield.png' ); ?>" width="72" height="72" alt="shield" loading="lazy" decoding="async">
				<h4>QR CODE Start</h4>
				<ul>
					<li>
						<span>Challenge</span>
						<p>Encouraging users to choose carpooling by introducing a modern feature.</p>
					</li>
					<li>
						<span>Key Result</span>
						<p>Introduced a QR CODE Start feature to start the ride hassle-free and quickly.</p>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<!-- Section 5: User Needs (Tabs) -->
<section class="fcs-user-need-main">
	<div class="need-title">
		<h2>user needs</h2>
	</div>
	<div class="tab-container">
		<div class="tab-button-flex">
			<button class="tab-button active" data-fcs-tab="Ride Sharer">Ride Sharer</button>
			<button class="tab-button" data-fcs-tab="Ride Taker">Ride Taker</button>
		</div>
		<div class="tab-content">
			<div class="grid-tabs">
				<div class="tab-left">
					<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/sec-3.webp' ); ?>" width="1000" height="850" alt="image" loading="lazy" decoding="async">
				</div>
				<div class="tab-right" data-fcs-panel="Ride Sharer">
					<h4>Efficient Commuting</h4>
					<p>Users can easily find carpooling partners with similar preferences, saving time and reducing the hassle of commuting.</p>
					<h4>Cost Savings</h4>
					<p>Ride sharers successfully split expenses, significantly reducing their individual transportation costs.</p>
					<h4>Reduced Environmental Impact</h4>
					<p>Achieved by encouraging ride sharing and decreasing the number of single-occupancy vehicles on the road.</p>
					<h4>User Satisfaction</h4>
					<p>Users consistently report high satisfaction levels due to personalized preferences, safety features, and convenience.</p>
					<h4>Community Building</h4>
					<p>The platform has fostered a sense of community among ride sharers, promoting social interaction during commutes.</p>
				</div>
				<div class="tab-right" data-fcs-panel="Ride Taker" style="display:none">
					<h4>Streamlined Matchmaking</h4>
					<p>The ride taker panel effectively matches users with compatible ride sharers based on their preferences and requirements.</p>
					<h4>Real-Time Tracking</h4>
					<p>Ride takers can track their carpooling partners' locations in real-time, ensuring safety and transparency.</p>
					<h4>Smooth Financial Transactions</h4>
					<p>Payment integration has streamlined cost-sharing among ride sharers, reducing financial friction.</p>
					<h4>Safety Measures</h4>
					<p>Successfully implemented user verification, rating systems, and emergency contact options for a secure ride-taking experience.</p>
					<h4>User Engagement</h4>
					<p>The panel has effectively engaged users, leading to increased adoption and retention rates, reflecting their satisfaction with the service.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Section 6: User Interface -->
<section class="fcs-user-interface-main">
	<div class="container">
		<div class="user-title">
			<h2>user interface</h2>
		</div>
		<div class="user-interface-grid">
			<div class="main-info-left">
				<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/01.webp' ); ?>" width="600" height="1100" alt="image" loading="lazy" decoding="async">
			</div>
			<div class="main-info-right">
				<h2>Offer a Ride</h2>
				<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/sec-4.webp' ); ?>" width="750" height="860" alt="image" loading="lazy" decoding="async">
			</div>
		</div>
		<div class="user-interface-grid flex-reverse">
			<div class="main-info-left">
				<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/02.webp' ); ?>" width="600" height="1100" alt="image" loading="lazy" decoding="async">
			</div>
			<div class="main-info-right">
				<h2>Take A Ride</h2>
				<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/sec-5.webp' ); ?>" width="750" height="860" alt="image" loading="lazy" decoding="async">
			</div>
		</div>
		<div class="user-interface-grid">
			<div class="main-info-left">
				<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/03.webp' ); ?>" width="600" height="1100" alt="image" loading="lazy" decoding="async">
			</div>
			<div class="main-info-right">
				<h2>Ride Summary</h2>
				<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/sec-6.webp' ); ?>" width="750" height="860" alt="image" loading="lazy" decoding="async">
			</div>
		</div>
	</div>
</section>

<!-- Section 7: Sub Screens -->
<section class="fcs-sub-screens-main">
	<div class="container">
		<div class="screen-title">
			<h2>sub screens</h2>
		</div>
		<div class="screen-grid">
			<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/sign.webp' ); ?>" width="500" height="1000" alt="screen-1" loading="lazy" decoding="async">
			<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/Ride-Summary-6.webp' ); ?>" width="500" height="1000" alt="screen-2" loading="lazy" decoding="async">
			<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/RideSummary-5.webp' ); ?>" width="500" height="1000" alt="screen-3" loading="lazy" decoding="async">
			<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/Select-Start-point&#8211;1.webp' ); ?>" width="500" height="1000" alt="screen-4" loading="lazy" decoding="async">
			<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/Ride-summary-3.webp' ); ?>" width="500" height="1000" alt="screen-5" loading="lazy" decoding="async">
			<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/Finish-Ride.webp' ); ?>" width="500" height="1000" alt="screen-6" loading="lazy" decoding="async">
			<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/Ride-Requests.webp' ); ?>" width="500" height="1000" alt="screen-7" loading="lazy" decoding="async">
			<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/QR-Code.webp' ); ?>" width="500" height="1000" alt="screen-8" loading="lazy" decoding="async">
			<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/Map&#8211;1.webp' ); ?>" width="500" height="1000" alt="screen-9" loading="lazy" decoding="async">
		</div>
	</div>
</section>

<!-- Section 8: Achievement -->
<section class="fcs-achievement">
	<div class="container">
		<img src="<?php echo esc_url( $img . '/case-studies/fixcarsharer/Achievement.png' ); ?>" width="1600" height="200" alt="Achievement" loading="lazy" decoding="async">
		<p>Fix Car Sharer has achieved remarkable success with the assistance of TechnBrains by transforming the way people commute. With a growing user base, diverse pool of drivers, high trust levels, and a significant reduction in carbon emissions, the app has not only improved transportation but also contributed to a greener, more sustainable future</p>
	</div>
</section>
