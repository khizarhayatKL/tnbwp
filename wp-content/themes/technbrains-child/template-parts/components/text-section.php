<?php
/**
 * Component: Text Section — mirrors Industry/TextSection/TextSection.jsx
 *
 * Data key : text_section
 * Fields   : title (h4), para (p)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data = get_query_var( 'component_data' );
$d    = $data['text_section'] ?? array();
$mod  = get_query_var( 'component_modifier_classes', '' );
?>
<section class="textSection<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>">
	<div class="container">
		<?php if ( ! empty( $d['title'] ) ) : ?>
		<h3><?php echo esc_html( $d['title'] ); ?></h3>
		<?php endif; ?>
		<?php if ( ! empty( $d['para'] ) ) : ?>
		<p><?php echo esc_html( $d['para'] ); ?></p>
		<?php endif; ?>
	</div>
</section>
