<?php
/**
 * Component: Counter Section — mirrors Industry/CounterSec/CounterSec.jsx
 *
 * Data key : counter_sec
 * Fields   : listing[{count, sign, content}]
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data    = get_query_var( 'component_data' );
$d       = $data['counter_sec'] ?? array();
$listing = $d['listing'] ?? array();
$mod     = get_query_var( 'component_modifier_classes', '' );

static $cs_instance = 0;
$cs_instance++;
$uid = 'cs-' . $cs_instance;
?>
<section class="counterSec<?php echo $mod ? ' ' . esc_attr( $mod ) : ''; ?>" data-counter-sec="<?php echo esc_attr( $uid ); ?>">
	<div class="container">
		<div class="counter-grid">
			<?php foreach ( $listing as $item ) : ?>
			<div class="counter-info">
				<span
					data-counter-target="<?php echo esc_attr( $item['count'] ?? '0' ); ?>"
					data-counter-sign="<?php echo esc_attr( $item['sign'] ?? '' ); ?>"
				>0<?php echo esc_html( $item['sign'] ?? '' ); ?></span>
				<p><?php echo esc_html( $item['content'] ?? '' ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
