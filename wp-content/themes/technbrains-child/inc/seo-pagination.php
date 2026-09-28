<?php
/**
 * Paginated blog listing — canonical, og:url, rel prev/next and title.
 *
 * The blog listing is not a real archive. It is a static Page using the page template
 * template-parts/template-blog-main.php, which runs its own WP_Query paged off the `paged`
 * query var (WordPress resolves /blog/page/2/ to pagename=blog&paged=2).
 *
 * Yoast presents a Page through Indexable_Post_Type_Presentation, and that reads pagination
 * from Pagination_Helper::get_current_post_page_number() — the `page` var, i.e. <!--nextpage-->
 * splits — never `paged`. So without this file every /blog/page/N/ tells search engines it is
 * page 1: canonical and og:url point at /blog/, the title is identical, and no adjacent links
 * are emitted at all.
 *
 * Each paginated page is made to canonicalise to itself and stay indexable, which is Google's
 * guidance since rel=prev/next stopped being an indexing signal. The adjacent links are still
 * emitted because Bing continues to use them and they cost one filter.
 *
 * Every filter here no-ops unless the request is the listing itself, so canonical handling on
 * posts, other pages and the real archives is left entirely to Yoast.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

/**
 * Current page and permalink base for the blog listing.
 *
 * Detection is by page template rather than by slug: the template is what assigns the listing,
 * so the check survives the page being renamed. The paged expression is the same one the
 * template itself uses, so wp_head and the loop cannot disagree about which page this is.
 *
 * @return array{0:int,1:string}|null Page number and trailing-slashed base, or null off-listing.
 */
function tnb_blog_paged_context(): ?array {
	if ( ! is_page_template( 'template-parts/template-blog-main.php' ) ) {
		return null;
	}

	$base = (string) get_permalink( get_queried_object_id() );

	if ( '' === $base ) {
		return null;
	}

	return array(
		(int) max( 1, get_query_var( 'paged' ), get_query_var( 'page' ) ),
		trailingslashit( $base ),
	);
}

/**
 * URL of a given page of the listing.
 *
 * Built the same way as the paginate_links() base in template-blog-main.php, so a canonical
 * always matches a link the page actually renders.
 *
 * @param string $base  Trailing-slashed listing permalink.
 * @param int    $paged Page number.
 * @return string
 */
function tnb_blog_paged_url( string $base, int $paged ): string {
	return $paged > 1 ? $base . 'page/' . $paged . '/' : $base;
}

/**
 * How many pages the listing has.
 *
 * The listing always excludes exactly one post — the hero, which is the post flagged
 * is_featured or, when none is flagged, the latest one — so the count is the published total
 * minus one. wp_count_posts() is cached by core, so this adds no query.
 *
 * @return int
 */
function tnb_blog_max_pages(): int {
	$per_page = (int) get_option( 'posts_per_page' );
	$counts   = wp_count_posts( 'post' );
	$total    = max( 0, (int) ( $counts->publish ?? 0 ) - 1 );

	return (int) ceil( $total / max( 1, $per_page ) );
}

/**
 * Self-canonical for /blog/page/N/.
 *
 * @param string $canonical Canonical URL from Yoast.
 * @return string
 */
add_filter( 'wpseo_canonical', 'tnb_blog_paged_canonical' );
function tnb_blog_paged_canonical( $canonical ) {
	$context = tnb_blog_paged_context();

	if ( null === $context || $context[0] < 2 ) {
		return $canonical;
	}

	return tnb_blog_paged_url( $context[1], $context[0] );
}

/**
 * og:url follows the canonical, so a share of page 3 resolves to page 3.
 *
 * @param string $url Open Graph URL from Yoast.
 * @return string
 */
add_filter( 'wpseo_opengraph_url', 'tnb_blog_paged_og_url' );
function tnb_blog_paged_og_url( $url ) {
	$context = tnb_blog_paged_context();

	if ( null === $context || $context[0] < 2 ) {
		return $url;
	}

	return tnb_blog_paged_url( $context[1], $context[0] );
}

/**
 * rel="prev" / rel="next" for the listing.
 *
 * Yoast generates neither for this page, but the Rel_Prev and Rel_Next presenters always run
 * and take their value through this filter, so injecting one here is enough to print the link.
 * Page 2's previous link is the bare /blog/, never /blog/page/1/.
 *
 * @param string $url Adjacent URL from Yoast, normally empty here.
 * @param string $rel 'prev' or 'next'.
 * @return string
 */
add_filter( 'wpseo_adjacent_rel_url', 'tnb_blog_paged_adjacent', 10, 2 );
function tnb_blog_paged_adjacent( $url, $rel ) {
	$context = tnb_blog_paged_context();

	if ( null === $context ) {
		return $url;
	}

	list( $paged, $base ) = $context;

	if ( 'prev' === $rel ) {
		return $paged > 1 ? tnb_blog_paged_url( $base, $paged - 1 ) : $url;
	}

	if ( 'next' === $rel ) {
		return $paged < tnb_blog_max_pages() ? tnb_blog_paged_url( $base, $paged + 1 ) : $url;
	}

	return $url;
}

/**
 * Page number in the title, so pages 2+ are not title duplicates of page 1.
 *
 * @param string $title Title from Yoast.
 * @return string
 */
add_filter( 'wpseo_title', 'tnb_blog_paged_title' );
function tnb_blog_paged_title( $title ) {
	$context = tnb_blog_paged_context();

	if ( null === $context || $context[0] < 2 ) {
		return $title;
	}

	return sprintf(
		/* translators: 1: page title, 2: page number. */
		__( '%1$s - Page %2$d', 'technbrains-child' ),
		$title,
		$context[0]
	);
}
