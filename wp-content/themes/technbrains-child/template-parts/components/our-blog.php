<?php
/**
 * Component: Our Blog
 * Fetches posts via WP_Query from category ID 3. Matches OurBlog.jsx DOM.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$data        = get_query_var( 'component_data' );
$d           = $data['our_blog'] ?? [];
$title       = $d['title']       ?? '';
$para        = $d['para']        ?? '';
$category_id = ! empty( $d['category_id'] ) ? (int) $d['category_id'] : 0;
// Optional: pin specific posts by slug (rendered in the given order) instead of
// the latest-by-category query.
$post_slugs  = ! empty( $d['post_slugs'] ) && is_array( $d['post_slugs'] )
	? array_map( 'sanitize_title', $d['post_slugs'] )
	: [];

$query_args = [
	'post_type'      => 'post',
	'posts_per_page' => 3,
	'post_status'    => 'publish',
	'no_found_rows'  => true,
];
if ( $post_slugs ) {
	$query_args['post_name__in']  = $post_slugs;
	$query_args['orderby']        = 'post_name__in';
	$query_args['posts_per_page'] = count( $post_slugs );
} elseif ( $category_id ) {
	$query_args['cat'] = $category_id;
}

$blog_query = new WP_Query( $query_args );

// Fallback: if the pinned slugs or category yielded no results, query latest posts.
if ( ( $post_slugs || $category_id ) && ! $blog_query->have_posts() ) {
	unset( $query_args['cat'], $query_args['post_name__in'], $query_args['orderby'] );
	$query_args['posts_per_page'] = 3;
	$blog_query = new WP_Query( $query_args );
}
?>
<section class="ourBlog">
	<div class="container">
		<div class="main">
			<?php if ( $title ) : ?>
			<h2><?php echo esc_html( $title ); ?></h2>
			<?php endif; ?>
			<?php if ( $para ) : ?>
			<p><?php echo esc_html( $para ); ?></p>
			<?php endif; ?>
		</div>

		<div class="listing">
			<?php if ( $blog_query->have_posts() ) : ?>
				<?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
				<?php
				$post_link    = get_permalink();
				$post_title   = get_the_title();
				$post_excerpt = wp_trim_words( get_the_excerpt(), 18, '...' );
				$thumb_id     = get_post_thumbnail_id();
				$thumb_url    = $thumb_id ? wp_get_attachment_image_url( $thumb_id, 'medium_large' ) : '';
				$thumb_meta   = $thumb_id ? wp_get_attachment_image_src( $thumb_id, 'medium_large' ) : [];
				$thumb_w      = ! empty( $thumb_meta[1] ) ? (int) $thumb_meta[1] : 800;
				$thumb_h      = ! empty( $thumb_meta[2] ) ? (int) $thumb_meta[2] : 450;
				$author_id    = get_the_author_meta( 'ID' );
				$author_name  = get_the_author_meta( 'display_name' );
				// Author profile photo (ACF ap_portrait on the user) — Gravatar fallback,
				// same convention as author.php / single.php.
				$author_avatar = get_avatar_url( $author_id, [ 'size' => 41 ] );
				$ap_portrait   = function_exists( 'get_field' ) ? get_field( 'ap_portrait', 'user_' . $author_id ) : null;
				if ( is_array( $ap_portrait ) ) {
					$author_avatar = $ap_portrait['sizes']['thumbnail'] ?? $ap_portrait['url'] ?? $author_avatar;
				}
				$post_date    = get_the_date();
				?>
				<div class="single">
					<?php if ( $thumb_url ) : ?>
					<div class="imageWrapper">
						<a href="<?php echo esc_url( $post_link ); ?>">
							<img
								src="<?php echo esc_url( $thumb_url ); ?>"
								width="<?php echo (int) $thumb_w; ?>"
								height="<?php echo (int) $thumb_h; ?>"
								alt="<?php echo esc_attr( $post_title ); ?>"
								loading="lazy"
								decoding="async"
							>
						</a>
					</div>
					<?php endif; ?>
					<div class="content">
						<a href="<?php echo esc_url( $post_link ); ?>">
							<h3>
								<?php echo esc_html( $post_title ); ?>
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><line x1="7" y1="17" x2="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>
							</h3>
						</a>
						<p><?php echo esc_html( $post_excerpt ); ?></p>
						<div class="profileInfo">
							<img
								src="<?php echo esc_url( $author_avatar ); ?>"
								width="41"
								height="41"
								alt="<?php echo esc_attr( $author_name ); ?>"
								loading="lazy"
								decoding="async"
							>
							<div class="info">
								<h4><?php echo esc_html( $author_name ); ?></h4>
								<p><?php echo esc_html( $post_date ); ?></p>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<p style="grid-column:1/-1;text-align:center;color:#888">No blog posts found.</p>
			<?php endif; ?>
		</div>

		<div class="btnWrapper">
			<a class="tnb-btn" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">
				<div class="textWrapper">
					<span class="primaryText">View More</span>
					<span class="secondaryText" aria-hidden="true">View More</span>
				</div>
			</a>
		</div>
	</div>
</section>
