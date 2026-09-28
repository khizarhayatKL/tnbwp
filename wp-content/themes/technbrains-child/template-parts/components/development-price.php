<?php
/**
 * Component: Development Price — mirrors EngagementModel/DevelopmentPrice/DevelopmentPrice.jsx
 *
 * Data key : development_price
 * Fields   : subtitle, title, para
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data     = get_query_var( 'component_data' );
$d        = $data['development_price'] ?? array();
$img_base = get_stylesheet_directory_uri() . '/assets/images';
$mod      = get_query_var( 'component_modifier_classes', '' );
?>
<section class="developmentPrice<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="dp-main-info">
			<?php if ( ! empty( $d['subtitle'] ) ) : ?>
			<span><?php echo esc_html( $d['subtitle'] ); ?></span>
			<?php endif; ?>
			<?php if ( ! empty( $d['title'] ) ) : ?>
			<h2><?php echo esc_html( $d['title'] ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $d['para'] ) ) : ?>
			<p><?php echo esc_html( $d['para'] ); ?></p>
			<?php endif; ?>
		</div>
		<div class="dp-grid-info">
			<div class="dp-image-info">
				<img
					src="<?php echo esc_url( $img_base . '/engagement-model/fixed-price/why.webp' ); ?>"
					width="615"
					height="474"
					alt="Why the Fixed-Price Model"
					loading="lazy"
					decoding="async"
				>
			</div>
			<h3>Why the Fixed-Price Model</h4>
			<p>The fixed-price model is a cornerstone of our approach to project management, providing our clients with cost predictability and streamlined project execution. With this model, clients benefit from knowing the total project cost upfront, allowing for accurate budgeting and resource allocation. Additionally, our efficient project management practices ensure that projects are delivered on time and within budget, minimizing the risk of cost overruns or timeline delays.<br><br>TechnBrains has it All. While the fixed-price model offers numerous benefits, we understand that it may present challenges in terms of scope flexibility. However, at TechnBrains, we have developed strategies to effectively manage and mitigate these limitations. Through open communication, proactive risk management, and a collaborative approach to project planning, we ensure that any scope changes are addressed in a timely and efficient manner, minimizing disruption to project timelines and budgets.</p>
			<h3>Gain a Competitive Edge with TechnBrains&#39; Fixed Price Model</h4>
			<p>TechnBrains&#39; Fixed Price Model empowers businesses to stay ahead of the competition by offering cost predictability, streamlined project management, and unwavering quality assurance. With our commitment to delivering exceptional results within agreed budgets and timelines, you can trust us to elevate your project to new heights of success while maintaining a competitive edge in the market.</p>
			<ul>
				<li>Budget predictability assured.</li>
				<li>Streamlined project management guaranteed.</li>
				<li>Unwavering quality assurance maintained.</li>
				<li>Competitive edge amplified.</li>
				<li>Timely project delivery ensured.</li>
				<li>Confidence in project success.</li>
			</ul>
		</div>
	</div>
</section>
