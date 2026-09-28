<?php

/**
 * Component: Platform Blog
 * Layout   : platform_blog (ACF Flexible Content)
 *
 * Three-column equal grid of blog post cards. Each card shows a featured
 * image, category tag, title, excerpt, and read-time / date meta.
 *
 * Post source priority:
 *   1. Relationship field (pblg_posts) — up to 3 hand-picked posts.
 *   2. Fallback — latest 3 published posts ordered by date DESC.
 *
 * Featured image is output as a real <img> (object-fit cover via CSS),
 * so no inline styles are needed and alt text is preserved for SEO.
 *
 * Fields:
 *   pblg_eyebrow        — text     (eyebrow pill above heading, optional)
 *   pblg_heading        — text     (section h2)
 *   pblg_description    — textarea (optional paragraph below heading)
 *   pblg_posts          — relationship (post_object, max 3, post type: post)
 *   additional_classes  — text     (extra CSS classes on section wrapper)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$eyebrow       = get_sub_field( 'pblg_eyebrow' )     ?: '';
$heading       = get_sub_field( 'pblg_heading' )     ?: '';
$description   = get_sub_field( 'pblg_description' ) ?: '';
$btn_text      = get_sub_field( 'pblg_btn_text' )    ?: '';
$btn_url       = get_sub_field( 'pblg_btn_url' )     ?: '';
$theme         = get_sub_field( 'pblg_theme' )        ?: 'light';
$selected_raw  = get_sub_field( 'pblg_posts' );
$add_classes   = trim( get_sub_field( 'additional_classes' ) ?: '' );

/* ── Resolve posts ── */
$posts = [];

if ( ! empty( $selected_raw ) ) {
	// post_object (multiple) returns an array; a single selection returns one object — normalise both.
	$items = is_array( $selected_raw ) ? $selected_raw : [ $selected_raw ];

	foreach ( array_slice( $items, 0, 3 ) as $item ) {
		if ( $item instanceof WP_Post ) {
			$posts[] = $item;
		} elseif ( is_numeric( $item ) && intval( $item ) > 0 ) {
			$p = get_post( intval( $item ) );
			if ( $p instanceof WP_Post && 'publish' === $p->post_status ) {
				$posts[] = $p;
			}
		}
	}
}

if ( empty( $posts ) ) {
	$posts = get_posts( [
		'post_type'           => 'post',
		'posts_per_page'      => 3,
		'orderby'             => 'date',
		'order'               => 'DESC',
		'post_status'         => 'publish',
		'no_found_rows'       => true,
		'ignore_sticky_posts' => true,
	] );
}

if ( empty( $posts ) ) {
	return;
}

/* ── Section class ── */
$section_class = 'pblg-section theme-' . ( 'dark' === $theme ? 'dark' : 'light' );
if ( $add_classes ) {
	$section_class .= ' ' . $add_classes;
}

if ( ! function_exists( 'tnb_pblg_post_data' ) ) :
/**
 * Build a display-ready data array for each post.
 *
 * @param WP_Post $post
 * @return array
 */
function tnb_pblg_post_data( WP_Post $post ) {
	/* Category tag */
	$cats = get_the_category( $post->ID );
	$tag  = ! empty( $cats ) ? $cats[0]->name : '';

	/* Read-time estimate */
	$word_count = str_word_count( wp_strip_all_tags( get_post_field( 'post_content', $post->ID ) ) );
	$read_min   = max( 1, (int) round( $word_count / 200 ) );

	/* Excerpt */
	$excerpt = $post->post_excerpt
		? wp_trim_words( $post->post_excerpt, 22, '…' )
		: wp_trim_words( wp_strip_all_tags( $post->post_content ), 22, '…' );

	/* Featured image */
	$img_id  = get_post_thumbnail_id( $post->ID );
	$img_tag = '';
	if ( $img_id ) {
		$img_tag = wp_get_attachment_image(
			$img_id,
			'large',
			false,
			[
				'class'   => 'pblg-img-el',
				'alt'     => esc_attr( get_post_meta( $img_id, '_wp_attachment_image_alt', true ) ?: get_the_title( $post ) ),
				'loading' => 'lazy',
				'decoding'=> 'async',
			]
		);
	}

	return [
		'url'     => get_permalink( $post ),
		'title'   => get_the_title( $post ),
		'excerpt' => $excerpt,
		'tag'     => $tag,
		'meta'    => $read_min . ' min read · ' . get_the_date( 'M Y', $post ),
		'img_tag' => $img_tag,
	];
}
endif; // function_exists
?>
<section class="<?php echo esc_attr( $section_class ); ?>">
	<div class="pblg-container">

		<?php if ( $heading || $eyebrow || $description || ( $btn_text && $btn_url ) ) : ?>
		<div class="pblg-head">
			<div class="pblg-head-text">
				<?php if ( $eyebrow ) : ?>
				<span class="pblg-eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
				<?php endif; ?>

				<?php if ( $heading ) : ?>
				<h2 class="pblg-h2"><?php echo esc_html( $heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $description ) : ?>
				<p class="pblg-desc"><?php echo esc_html( $description ); ?></p>
				<?php endif; ?>
			</div>

			<?php if ( $btn_text ) : ?>
			<a class="pblg-cta-btn" href="<?php echo esc_url( ! empty( $btn_url ) ? $btn_url : '/blog/' ); ?>">
				<?php echo esc_html( $btn_text ); ?>
				<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
					<line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
				</svg>
			</a>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<div class="pblg-grid">
			<?php foreach ( $posts as $pblg_post ) :
				$d = tnb_pblg_post_data( $pblg_post );
			?>
			<a class="pblg-card" href="<?php echo esc_url( $d['url'] ); ?>">

				<div class="pblg-img">
					<?php if ( $d['img_tag'] ) : ?>
						<?php echo $d['img_tag']; // already sanitised by wp_get_attachment_image ?>
					<?php else : ?>
					<div class="pblg-img-placeholder"></div>
					<?php endif; ?>
				</div>

				<div class="pblg-body">
					<?php if ( $d['tag'] ) : ?>
					<div class="pblg-tag"><?php echo esc_html( $d['tag'] ); ?></div>
					<?php endif; ?>

					<h3 class="pblg-title"><?php echo esc_html( $d['title'] ); ?></h3>

					<?php if ( $d['excerpt'] ) : ?>
					<p class="pblg-excerpt"><?php echo esc_html( $d['excerpt'] ); ?></p>
					<?php endif; ?>

					<div class="pblg-meta"><?php echo esc_html( $d['meta'] ); ?></div>
				</div>

			</a>
			<?php endforeach;
			wp_reset_postdata(); ?>
		</div><!-- .pblg-grid -->

	</div><!-- .pblg-container -->
</section>
