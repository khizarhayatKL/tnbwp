<?php
/**
 * Component: Location Expert — mirrors Locations/ExpertLocation/ExpertLocation.jsx
 *
 * Data key : expert_location
 * Fields   : title (span allowed), para (HTML — multiple <p> tags)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data = get_query_var( 'component_data' );
$d    = $data['expert_location'] ?? array();
$mod  = get_query_var( 'component_modifier_classes', '' );
$kses = array( 'span' => array() );
?>
<section class="location-sec<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<div class="global-bio">
			<?php if ( ! empty( $d['title'] ) ) : ?>
			<h2><?php echo wp_kses( $d['title'], $kses ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $d['para'] ) ) : ?>
			<?php echo wp_kses_post( $d['para'] ); ?>
			<?php endif; ?>
		</div>
	</div>
</section>
