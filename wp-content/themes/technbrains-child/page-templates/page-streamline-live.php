<?php
/**
 * Template Name: Streamline Live Case Study
 * @package technbrains-child
 */
defined( 'ABSPATH' ) || exit;

$registry = require get_stylesheet_directory() . '/data-registry/streamline-live.php';

add_action( 'wp_head', function () use ( $registry ) {
	foreach ( $registry['schemas'] as $schema ) {
		echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
	}
}, 10 );

get_header();

set_query_var( 'component_data', $registry['mock_data'] );

foreach ( $registry['components'] as $c ) {
	set_query_var( 'component_modifier_classes', $c['modifier_class'] ?? '' );
	get_template_part( 'template-parts/components/' . $c['name'], null, $c['args'] ?? array() );
}

get_footer();
