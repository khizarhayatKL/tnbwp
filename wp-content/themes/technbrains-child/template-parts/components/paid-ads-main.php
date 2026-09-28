<?php
defined( 'ABSPATH' ) || exit;

$mod = get_query_var( 'component_modifier_classes', '' );
?>
<section class="seoPaidAds<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<h2>Our Paid Social Ads Tactics</h2>
		<div class="pam-ul-grid">
			<ul>
				<li>Facebook ads</li>
				<li>TikTok ads</li>
				<li>Instagram ads</li>
				<li>Twitter ads</li>
				<li>Paid social reporting</li>
			</ul>
			<ul>
				<li>Youtube ads</li>
				<li>Pinterest ads</li>
				<li>WhatsApp ads</li>
				<li>Reddit ads</li>
			</ul>
			<ul>
				<li>Rapid experimentation</li>
				<li>Copy optimization</li>
				<li>Multimedia content creation</li>
				<li>Audience segmentation</li>
			</ul>
			<ul>
				<li>Campaign structure</li>
				<li>Linkedin ads</li>
				<li>Paid social reporting</li>
				<li>Spotify ads</li>
			</ul>
		</div>
	</div>
</section>
