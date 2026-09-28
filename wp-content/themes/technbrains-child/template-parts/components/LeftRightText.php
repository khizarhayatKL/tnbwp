<?php
defined( 'ABSPATH' ) || exit;

$img = get_stylesheet_directory_uri() . '/assets/images';
$mod = get_query_var( 'component_modifier_classes', '' );
?>
<section class="left-right-text<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="content">
			<div class="image">
				<img src="<?php echo esc_url( $img . '/case-studies/wedding-app/ltr-side.webp' ); ?>" width="650" height="677" alt="The Wedding App" loading="lazy" decoding="async">
			</div>
			<div class="text">
				<h2>The <span>Wedding App</span></h2>
				<p>At TechnBrains, we understand that weddings are one of the most cherished milestones in a couple's life. Our client, a wedding planner, envisioned an app that would centralize every detail of wedding planning—making it easier for couples, their guests, and vendors to collaborate effortlessly.<br>
				Using technologies like React Native, Node.js, and MySQL, we developed The Wedding App, a mobile-first solution packed with features for organizing weddings of all scales. The app provides a seamless platform for couples to share their stories, manage schedules, and interact with guests while enabling guests to RSVP, access travel details, and even purchase gifts.<br>
				Key integrations like Twilio, SendGrid, and Google Places power automated reminders, QR codes, and destination recommendations. Whether it's creating seating charts or coordinating floor plans, this app is a one-stop solution for modern wedding planning.<br>
				TechnBrains' empathetic approach to understanding the wedding planning industry ensured that we delivered a solution tailored to the client's vision, making this app an indispensable tool for weddings across the USA.</p>
			</div>
		</div>
	</div>
</section>
