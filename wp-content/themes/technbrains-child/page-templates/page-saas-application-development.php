<?php
/**
 * Template Name: SaaS Application Development
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$registry = require get_stylesheet_directory() . '/data-registry/saas-application-development.php';

get_header();

foreach ( $registry['schemas'] as $schema ) {
	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}

set_query_var( 'component_data', $registry['mock_data'] );

foreach ( $registry['components'] as $c ) {
	set_query_var( 'component_modifier_classes', $c['modifier_class'] ?? '' );
	get_template_part( 'template-parts/components/' . $c['name'], '', $c['args'] ?? array() );
}

get_footer();
