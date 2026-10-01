<?php
/**
 * Case Study post type.
 *
 * Case studies are a closed, repeatable structure — every one has the same eleven sections
 * in the same order — so they are a post type with a fixed single template
 * (single-case_study.php) rather than a flexible-content page. Nothing here touches
 * page_sections, page-flexible.php or the layout dispatcher.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/**
 * Registers the case_study post type.
 *
 * Rewrite slug is the PLURAL 'case-studies', giving /case-studies/{slug}/ — the same
 * base the legacy case-study child pages live under. The CPT rewrite rule sits ahead of
 * WordPress's page catch-all, so a request filter in inc/case-studies.php falls back to
 * the matching child page whenever no case_study post has that slug. Both can therefore
 * share the base: new posts win when they exist, legacy pages keep serving otherwise.
 *
 * has_archive is false because the existing /case-studies/ page already serves as the
 * index; an archive would compete with it.
 */
add_action( 'init', 'tnb_register_case_study_cpt' );
function tnb_register_case_study_cpt(): void {
	register_post_type(
		'case_study',
		array(
			'labels'             => array(
				'name'               => 'Case Studies',
				'singular_name'      => 'Case Study',
				'add_new_item'       => 'Add New Case Study',
				'edit_item'          => 'Edit Case Study',
				'new_item'           => 'New Case Study',
				'view_item'          => 'View Case Study',
				'search_items'       => 'Search Case Studies',
				'not_found'          => 'No case studies found.',
				'not_found_in_trash' => 'No case studies in trash.',
				'all_items'          => 'All Case Studies',
				'menu_name'          => 'Case Studies',
			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_nav_menus'  => true,
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_icon'          => 'dashicons-portfolio',
			'menu_position'      => 21,
			'supports'           => array( 'title', 'thumbnail', 'excerpt', 'revisions' ,'author'),
			'rewrite'            => array(
				'slug'       => 'case-studies',
				'with_front' => false,
			),
		)
	);
}

/**
 * Registers the Industry taxonomy for case_study posts.
 *
 * Flat/tag-like (not hierarchical) — powers the filter tabs on the "Browse Case
 * Studies By Industry" grid (case-studies-filtered-grid.php) via get_the_terms()/
 * get_terms() server-side lookups only. rewrite is false and public is false:
 * this taxonomy has no public archive/permalink of its own — public was previously
 * true, which contradicted that intent by exposing a real, indexable
 * ?case_study_industry={slug} archive (crawlable, sitemapped, no meta description
 * of its own — SMAP-2). show_ui/show_in_rest stay true so it's still manageable
 * in wp-admin and Gutenberg; only the public-facing archive is disabled.
 */
add_action( 'init', 'tnb_register_case_study_industry_tax' );
function tnb_register_case_study_industry_tax(): void {
	register_taxonomy(
		'case_study_industry',
		'case_study',
		array(
			'labels'            => array(
				'name'          => 'Industries',
				'singular_name' => 'Industry',
				'search_items'  => 'Search Industries',
				'all_items'     => 'All Industries',
				'edit_item'     => 'Edit Industry',
				'update_item'   => 'Update Industry',
				'add_new_item'  => 'Add New Industry',
				'new_item_name' => 'New Industry Name',
				'menu_name'     => 'Industry',
			),
			'hierarchical'      => false,
			'public'            => false,
			'publicly_queryable' => false,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => false,
			'show_in_rest'      => true,
			'rewrite'           => false,
		)
	);
}

/**
 * Flushes rewrite rules once so /case-studies/{slug}/ starts resolving.
 *
 * Same guarded-option pattern as tnb_author_flush_rewrite() in functions.php: a flush on
 * every request is expensive, and register_post_type() alone does not regenerate the
 * stored rules. Bump the version string to force a re-flush.
 * Version 2: rewrite slug changed from singular case-study to plural case-studies.
 * Version 3: live's rewrite rules had gone stale (every /case-studies/{legacy-slug}/
 * page — cofit, fixcarsharer, soccerfy, etc. — was falling through to redirect_canonical()
 * and 301ing to the homepage instead of resolving via the request filter in
 * inc/case-studies.php), even though the guard already read '2'. Forcing one more flush.
 */
add_action( 'init', 'tnb_case_study_flush_rewrite', 1000 );
function tnb_case_study_flush_rewrite(): void {
	if ( '3' !== get_option( 'tnb_case_study_rw_version' ) ) {
		flush_rewrite_rules( false );
		update_option( 'tnb_case_study_rw_version', '3' );
	}
}
