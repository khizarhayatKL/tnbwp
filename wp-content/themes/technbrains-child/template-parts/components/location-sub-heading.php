<?php
/**
 * Component: Location Sub Heading — mirrors Locations/SubHeading/SubHeading.jsx
 *
 * Data key : sub_heading
 * Fields   : title (span allowed), para
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data = get_query_var( 'component_data' );
$d    = $data['sub_heading'] ?? array();
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
			<p><?php echo esc_html( $d['para'] ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</section>
