<?php
/**
 * PERF-6: transient cache for template queries that previously ran uncached on
 * every page load. SEO/CWV audit flagged sitewide TTFB — median 940ms, 98.6%
 * of pages over the 800ms budget — with no Cache-Control on HTML responses.
 * The CDN/edge-cache side of that finding is infra-level (out of this repo's
 * reach); this file addresses the PHP-side cost: several WP_Query/get_posts()
 * calls, including one in the sitewide header mega-menu, ran on every request
 * with no caching anywhere in the theme.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/**
 * Get-or-set transient helper. $build only runs on a cache miss.
 * Callers should cache a plain hydrated array (permalinks/titles/ACF values
 * already extracted), never a raw WP_Query/WP_Post — a cache hit must skip
 * the DB and any ACF meta lookups entirely, not just the query itself.
 */
function tnb_perf_cache_remember( string $key, int $ttl, callable $build ) {
	$cached = get_transient( $key );
	if ( false !== $cached ) {
		return $cached;
	}
	$value = $build();
	set_transient( $key, $value, $ttl );
	return $value;
}

// --- Invalidation: 'post' CPT ----------------------------------------------
add_action( 'save_post_post', 'tnb_perf_flush_post_caches' );
function tnb_perf_flush_post_caches( int $post_id ): void {
	delete_transient( 'tnb_header_latest_posts' );
	delete_transient( 'tnb_blog_featured_and_slider' );
}

// --- Invalidation: 'case_study' CPT -----------------------------------------
add_action( 'save_post_case_study', 'tnb_perf_flush_case_study_caches' );
function tnb_perf_flush_case_study_caches( int $post_id ): void {
	delete_transient( 'tnb_cs_next_ids' );
	delete_transient( 'tnb_cs_filtered_grid_data' );
	$author_id = (int) get_post_field( 'post_author', $post_id );
	if ( $author_id ) {
		delete_transient( 'tnb_author_case_studies_' . $author_id );
	}
}
