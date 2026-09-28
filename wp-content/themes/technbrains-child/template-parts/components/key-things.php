<?php
/**
 * Component: Key Things
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data    = get_query_var( 'component_data' );
$d       = $data['key_things'] ?? array();
$listing = $d['listing'] ?? array();
?>
<section class="keyThings">
	<div class="container">
		<span class="subheading"><?php echo esc_html( $d['sub_title'] ?? '' ); ?></span>
		<h2><?php echo wp_kses_post( $d['title'] ?? '' ); ?></h2>
		<div class="kt-grid">
			<div class="kt-left">
				<ul>
					<?php foreach ( $listing as $i => $item ) : ?>
					<li
						class="kt-tab-btn<?php echo 0 === $i ? ' active' : ''; ?>"
						data-tab-group="kt-tabs"
						data-tab-trigger="kt-panel-<?php echo esc_attr( $i ); ?>"
						role="button"
						tabindex="0"
					>
						<h3><?php echo esc_html( $item['tab_title'] ?? '' ); ?></h3>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" aria-hidden="true" focusable="false"><path fill="currentColor" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"/></svg>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="kt-right">
				<?php foreach ( $listing as $i => $item ) : ?>
				<div
					class="kt-tab-content<?php echo 0 === $i ? ' active' : ''; ?>"
					data-tab-group="kt-tabs"
					data-tab-panel="kt-panel-<?php echo esc_attr( $i ); ?>"
				>
					<?php echo wp_kses_post( $item['tab_content'] ?? '' ); ?>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
