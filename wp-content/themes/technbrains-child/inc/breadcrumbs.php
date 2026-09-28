<?php
/**
 * Breadcrumb utilities — dynamic, SEO-friendly, schema-ready.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

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
				return $items;
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

	return $items;
}

/**
 * Render visual breadcrumb HTML. Static flag prevents double output
 * when page has multiple banner components.
 */
function tnb_breadcrumb_html() {
	static $rendered = false;
	if ( $rendered || is_front_page() ) {
		return;
	}

	$items = tnb_get_breadcrumbs();
	if ( count( $items ) < 2 ) {
		return;
	}

	$rendered = true;
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
