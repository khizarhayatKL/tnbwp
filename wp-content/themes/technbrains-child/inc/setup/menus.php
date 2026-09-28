<?php
/**
 * Register nav menu locations.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', 'tnb_register_menus' );
function tnb_register_menus() {
	register_nav_menus(
		array(
			'tnb-primary' => esc_html__( 'Primary Navigation', 'technbrains-child' ),
		)
	);
}
