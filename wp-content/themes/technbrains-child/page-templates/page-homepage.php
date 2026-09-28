<?php
/**
 * Template Name: Homepage
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$registry = require get_stylesheet_directory() . '/data-registry/homepage.php';

// Output JSON-LD schemas
add_action( 'wp_head', function() use ( $registry ) {
	foreach ( $registry['schemas'] as $schema ) {
		echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
	}
	// FAQPage schema from mock data
	$faqs = $registry['mock_data']['faqs'] ?? array();
	if ( $faqs ) {
		$faq_schema = array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => array_map( function( $f ) {
				return array(
					'@type'          => 'Question',
					'name'           => $f['q'],
					'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $f['a'] ),
				);
			}, $faqs ),
		);
		echo '<script type="application/ld+json">' . wp_json_encode( $faq_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
	}
}, 5 );

// get_header( 'homepage' );
get_header();

set_query_var( 'component_data', $registry['mock_data'] );

echo '<main id="main" class="site-main">';

foreach ( $registry['components'] as $c ) {
	set_query_var( 'component_modifier_classes', $c['modifier_class'] ?? '' );
	get_template_part( 'template-parts/components/' . $c['name'], '', $c['args'] ?? array() );
}

echo '</main>';

get_footer();

// get_footer( 'homepage' );
