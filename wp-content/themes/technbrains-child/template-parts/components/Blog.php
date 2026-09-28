<?php
/**
 * Component: Blog — dynamic, pulls from WP post type.
 * Feature post = most recent. Side posts = next 2.
 *
 * @package technbrains-child
 */
defined( 'ABSPATH' ) || exit;

$blog_query = new WP_Query( [
	'post_type'           => 'post',
	'posts_per_page'      => 4,
	'post_status'         => 'publish',
	'no_found_rows'       => true,
	'ignore_sticky_posts' => true,
] );

$posts = [];
if ( $blog_query->have_posts() ) {
	while ( $blog_query->have_posts() ) {
		$blog_query->the_post();
		$thumb_id   = get_post_thumbnail_id();
		$thumb_url  = $thumb_id ? wp_get_attachment_image_url( $thumb_id, 'large' ) : '';
		$cats       = get_the_category();
		$cat_name   = ! empty( $cats ) ? $cats[0]->name : 'Insights';
		$word_count = str_word_count( strip_tags( get_the_content() ) );
		$read_min   = max( 1, (int) round( $word_count / 200 ) );
		$posts[]    = [
			'url'     => get_permalink(),
			'title'   => get_the_title(),
			'excerpt' => wp_trim_words( get_the_excerpt(), 20, '...' ),
			'tag'     => $cat_name,
			'meta'    => $read_min . ' min read · ' . get_the_date( 'M Y' ),
			'img'     => $thumb_url,
		];
	}
	wp_reset_postdata();
}

$feature = $posts[0] ?? [];
$side    = array_slice( $posts, 1, 3 );
?>
<section class="section blog" id="blog" data-screen-label="15 Blog">
  <div class="container">
    <div class="section-head">
      <div class="section-intro">
        <div class="eyebrow">Tech Insights</div>
        <h2>Notes from the engineering side</h2>
      </div>
      <a class="view-all" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">All posts <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 5l7 7-7 7"/></svg></a>
    </div>

    <?php if ( $feature ) : ?>
    <div class="blog-grid">

      <a class="blog-feature" href="<?php echo esc_url( $feature['url'] ); ?>">
        <div class="blog-img"<?php if ( $feature['img'] ) : ?> style="background-image:url('<?php echo esc_url( $feature['img'] ); ?>')"<?php endif; ?>></div>
        <div class="blog-tag"><?php echo esc_html( $feature['tag'] ); ?></div>
        <h3><?php echo esc_html( $feature['title'] ); ?></h3>
        <p><?php echo esc_html( $feature['excerpt'] ); ?></p>
        <div class="blog-meta"><?php echo esc_html( $feature['meta'] ); ?></div>
      </a>

      <div class="blog-side">
        <?php foreach ( $side as $b ) : ?>
        <a class="blog-card" href="<?php echo esc_url( $b['url'] ); ?>">
          <div class="blog-img"<?php if ( $b['img'] ) : ?> style="background-image:url('<?php echo esc_url( $b['img'] ); ?>')"<?php endif; ?>></div>
          <div>
            <div class="blog-tag"><?php echo esc_html( $b['tag'] ); ?></div>
            <h3><?php echo esc_html( $b['title'] ); ?></h3>
            <div class="blog-meta blog-meta-card"><?php echo esc_html( $b['meta'] ); ?></div>
          </div>
        </a>
        <?php endforeach; ?>
      </div>

    </div>
    <?php else : ?>
    <p style="text-align:center;color:#888;padding:40px 0">No blog posts published yet.</p>
    <?php endif; ?>

  </div>
</section>
