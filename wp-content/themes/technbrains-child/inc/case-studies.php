<?php
/**
 * Case Studies — URL coexistence and breadcrumb parity for the case_study CPT.
 *
 * The CPT (inc/case-study-cpt.php) rewrites to /case-studies/{slug}/ — the same
 * base the legacy case-study child pages live under. This file keeps both
 * working side by side and keeps the breadcrumb trail intact.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

// ── Coexistence: /case-studies/{slug} serves CPT post OR child page ──────────
// The CPT rewrite rule sits above page rules, so it captures every
// /case-studies/{slug}/ request. When no case_study post has that slug, fall
// back to the child page of the hub (the legacy case-study pages) instead of
// 404ing. New posts win when they exist; legacy pages keep serving otherwise.
add_filter( 'request', function ( array $vars ): array {
	if ( empty( $vars['case_study'] ) ) {
		return $vars;
	}
	$slug = $vars['case_study'];
	if ( get_page_by_path( $slug, OBJECT, 'case_study' ) ) {
		return $vars; // CPT post exists — normal routing
	}
	$page = get_page_by_path( 'case-studies/' . $slug, OBJECT, 'page' );
	if ( $page instanceof WP_Post ) {
		return array( 'pagename' => 'case-studies/' . $slug );
	}
	return $vars; // no match either way — natural 404
} );

// ── Yoast breadcrumb graph: Home > Case Studies > {title} ────────────────────
// The CPT is flat, so Yoast's schema-graph breadcrumb would emit Home > {title}.
// Inject the hub page as the parent crumb, matching tnb_get_breadcrumbs().
add_filter( 'wpseo_breadcrumb_links', function ( array $links ): array {
	if ( ! is_singular( 'case_study' ) ) {
		return $links;
	}
	$hub = get_page_by_path( 'case-studies' );
	if ( $hub instanceof WP_Post ) {
		array_splice( $links, count( $links ) - 1, 0, array(
			array(
				'url'  => get_permalink( $hub ),
				'text' => get_the_title( $hub ),
				'id'   => $hub->ID,
			),
		) );
	}
	return $links;
} );
