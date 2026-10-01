<?php
/**
 * Breadcrumb utilities — dynamic, SEO-friendly, schema-ready.
 *
 * SEO-G6: the visible trail (tnb_breadcrumb_html) and the BreadcrumbList
 * JSON-LD (tnb_breadcrumb_schema in functions.php, wp_footer) share one items
 * array, and the schema is emitted only when the trail was actually printed —
 * so markup and visible path can't drift apart.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/**
 * One plain-text form for every crumb label. Titles are stored with entities
 * (&amp;amp;, &#038;, sometimes double-encoded) and archive titles carry markup;
 * JSON-LD needs the bare string. The HTML path re-escapes at output.
 */
function tnb_breadcrumb_label( $label ): string {
	$label = wp_strip_all_tags( (string) $label );
	for ( $i = 0; $i < 3; $i++ ) {
		$decoded = html_entity_decode( $label, ENT_QUOTES | ENT_HTML5, 'UTF-8' );
		if ( $decoded === $label ) {
			break;
		}
		$label = $decoded;
	}
	return trim( (string) preg_replace( '/\s+/u', ' ', $label ) );
}

function tnb_breadcrumb_normalize( array $items ): array {
	foreach ( $items as &$item ) {
		$item['label'] = tnb_breadcrumb_label( $item['label'] );
	}
	unset( $item );
	return $items;
}

/**
 * Build breadcrumb items from current WordPress context.
 *
 * @return array[] Each item: ['label' => string, 'url' => string, 'current' => bool]
 */
function tnb_get_breadcrumbs() {
	if ( is_front_page() ) {
		return array();
	}

	// ACF per-page override
	if ( function_exists( 'get_field' ) && is_singular() && get_field( 'tnb_breadcrumb_override' ) ) {
		$rows = get_field( 'tnb_breadcrumb_items' );
		if ( ! empty( $rows ) ) {
			$items = array();
			$last  = count( $rows ) - 1;
			foreach ( $rows as $i => $row ) {
				$page  = isset( $row['page'] ) ? $row['page'] : null;
				$label = trim( isset( $row['label'] ) ? $row['label'] : '' );
				$url   = trim( isset( $row['url'] ) ? $row['url'] : '' );

				// Auto-fill from selected page if fields left empty
				if ( $page instanceof WP_Post ) {
					if ( empty( $label ) ) {
						$label = get_the_title( $page );
					}
					if ( empty( $url ) ) {
						$url = get_permalink( $page );
					}
				}

				if ( empty( $label ) ) {
					continue; // skip incomplete rows
				}

				$items[] = array(
					'label'   => $label,
					'url'     => $url,
					'current' => ( $i === $last ),
				);
			}
			if ( ! empty( $items ) ) {
				return tnb_breadcrumb_normalize( $items );
			}
		}
	}

	$items = array(
		array(
			'label'   => 'Home',
			'url'     => home_url( '/' ),
			'current' => false,
		),
	);

	if ( is_singular() ) {
		$post = get_queried_object();

		// For blog posts: inject blog listing page into trail
		if ( 'post' === $post->post_type ) {
			$blog_id = (int) get_option( 'page_for_posts' );
			if ( ! $blog_id ) {
				$blog_page = get_page_by_path( 'blog' );
				if ( $blog_page ) {
					$blog_id = $blog_page->ID;
				}
			}
			if ( $blog_id ) {
				$items[] = array(
					'label'   => get_the_title( $blog_id ),
					'url'     => get_permalink( $blog_id ),
					'current' => false,
				);
			} else {
				$items[] = array(
					'label'   => 'Blog',
					'url'     => home_url( '/blog/' ),
					'current' => false,
				);
			}

			// Primary category level (Yoast primary, else first assigned) —
			// same resolver inc/blog-schema.php uses for the Article node.
			$cat = function_exists( 'tnb_blog_schema_primary_category' ) ? tnb_blog_schema_primary_category( $post->ID ) : null;
			if ( $cat instanceof WP_Term && (int) get_option( 'default_category' ) !== (int) $cat->term_id ) {
				$cat_link = get_category_link( $cat );
				if ( $cat_link && ! is_wp_error( $cat_link ) ) {
					$items[] = array(
						'label'   => $cat->name,
						'url'     => $cat_link,
						'current' => false,
					);
				}
			}
		}

		// Case studies have no CPT archive; the hub is the static "case-studies" page.
		if ( 'case_study' === $post->post_type ) {
			$hub     = get_page_by_path( 'case-studies' );
			$items[] = array(
				'label'   => $hub instanceof WP_Post ? get_the_title( $hub ) : 'Case Studies',
				'url'     => $hub instanceof WP_Post ? get_permalink( $hub ) : home_url( '/case-studies/' ),
				'current' => false,
			);
		}

		$ancestors = array_reverse( get_post_ancestors( $post->ID ) );

		foreach ( $ancestors as $ancestor_id ) {
			$items[] = array(
				'label'   => get_the_title( $ancestor_id ),
				'url'     => get_permalink( $ancestor_id ),
				'current' => false,
			);
		}

		$items[] = array(
			'label'   => get_the_title( $post ),
			'url'     => get_permalink( $post ),
			'current' => true,
		);

	} elseif ( is_category() ) {
		$cat = get_queried_object();
		if ( $cat->parent ) {
			$parent  = get_category( $cat->parent );
			$items[] = array(
				'label'   => $parent->name,
				'url'     => get_category_link( $parent->term_id ),
				'current' => false,
			);
		}
		$items[] = array(
			'label'   => $cat->name,
			'url'     => '',
			'current' => true,
		);

	} elseif ( is_tag() ) {
		$tag     = get_queried_object();
		$items[] = array(
			'label'   => 'Blog',
			'url'     => home_url( '/blog/' ),
			'current' => false,
		);
		$items[] = array(
			'label'   => $tag->name,
			'url'     => '',
			'current' => true,
		);

	} elseif ( is_home() ) {
		$blog_id = (int) get_option( 'page_for_posts' );
		$label   = $blog_id ? get_the_title( $blog_id ) : 'Blog';
		$items[] = array(
			'label'   => $label,
			'url'     => '',
			'current' => true,
		);

	} elseif ( is_search() ) {
		$items[] = array(
			'label'   => sprintf( 'Search results for "%s"', get_search_query() ),
			'url'     => '',
			'current' => true,
		);

	} elseif ( is_404() ) {
		$items[] = array(
			'label'   => 'Page Not Found',
			'url'     => '',
			'current' => true,
		);

	} elseif ( is_author() ) {
		// Author archives live under /blog/author/…; get_the_archive_title()
		// would return "Author: <span class="vcard">…</span>".
		$items[] = array(
			'label'   => 'Blog',
			'url'     => home_url( '/blog/' ),
			'current' => false,
		);
		$items[] = array(
			'label'   => get_the_author_meta( 'display_name', get_queried_object_id() ),
			'url'     => '',
			'current' => true,
		);

	} elseif ( is_archive() ) {
		if ( is_post_type_archive() ) {
			$items[] = array(
				'label'   => post_type_archive_title( '', false ),
				'url'     => '',
				'current' => true,
			);
		} else {
			$items[] = array(
				'label'   => get_the_archive_title(),
				'url'     => '',
				'current' => true,
			);
		}
	}

	return tnb_breadcrumb_normalize( $items );
}

/**
 * The items the visible trail printed this request (empty = nothing printed).
 * Setter when $items is passed. Gates the JSON-LD emitter.
 */
function tnb_breadcrumb_printed( ?array $items = null ): array {
	static $printed = array();
	if ( null !== $items ) {
		$printed = $items;
	}
	return $printed;
}

/**
 * Render visual breadcrumb HTML. Prints once per request — the printed-state
 * guard also prevents double output when a page has multiple banner components.
 */
function tnb_breadcrumb_html() {
	if ( tnb_breadcrumb_printed() || is_front_page() ) {
		return;
	}

	$items = tnb_get_breadcrumbs();
	if ( count( $items ) < 2 ) {
		return;
	}

	tnb_breadcrumb_printed( $items );
	?>
	<nav class="tnb-breadcrumb-nav" aria-label="Breadcrumb">
		<ol class="tnb-breadcrumb">
			<?php foreach ( $items as $item ) : ?>
			<li>
				<?php if ( ! $item['current'] && ! empty( $item['url'] ) ) : ?>
				<a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a>
				<?php else : ?>
				<span class="tnb-bc-current" aria-current="page"><?php echo esc_html( $item['label'] ); ?></span>
				<?php endif; ?>
			</li>
			<?php endforeach; ?>
		</ol>
	</nav>
	<?php
}

/**
 * BreadcrumbList node for a set of items. $id becomes the node's @id so the
 * hand-written WebPage nodes' "breadcrumb": {"@id": "<url>#breadcrumb"} resolve.
 */
function tnb_breadcrumb_schema_array( array $items, string $id ): array {
	$list = array();
	foreach ( $items as $i => $item ) {
		$el = array(
			'@type'    => 'ListItem',
			'position' => $i + 1,
			'name'     => $item['label'],
		);
		if ( ! empty( $item['url'] ) ) {
			$el['item'] = $item['url'];
		}
		$list[] = $el;
	}
	return array(
		'@context'        => 'https://schema.org',
		'@type'           => 'BreadcrumbList',
		'@id'             => $id,
		'itemListElement' => $list,
	);
}

/** Canonical URL of the current request, for the BreadcrumbList @id. */
function tnb_breadcrumb_current_url(): string {
	if ( is_singular() ) {
		return (string) get_permalink( get_queried_object_id() );
	}
	if ( is_author() ) {
		return (string) get_author_posts_url( get_queried_object_id() );
	}
	if ( is_category() || is_tag() || is_tax() ) {
		$link = get_term_link( get_queried_object() );
		return is_wp_error( $link ) ? home_url( '/' ) : (string) $link;
	}
	$request = isset( $GLOBALS['wp']->request ) ? (string) $GLOBALS['wp']->request : '';
	return home_url( '' !== $request ? user_trailingslashit( $request ) : '/' );
}
