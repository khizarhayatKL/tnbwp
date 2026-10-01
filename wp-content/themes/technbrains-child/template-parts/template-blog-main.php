<?php
/**
Template Name: Blog Page Template
*/
get_header(); ?>


<section class="blog--main">
    <div class=" main-bg-banner">
        <div class="container">
			<?php tnb_breadcrumb_html(); ?>
            <h1>Our Blog</h1>
            <p>Read all of our recent posts or browse by category that interests you most.</p>
			<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
				<div class="cus--search">
				
					<input type="search" class="search-field searchTerm" placeholder="<?php echo esc_attr_x( 'Search here…', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x(
	'Search for:', 'label' ) ?>" />
					<input type="hidden" name="post_type" value="post" />
				
				<button type="submit" class="search-submit searchButton" value="<?php echo esc_attr_x(
	'Search', 'submit button' ) ?>"><svg width="18" height="18" viewBox="0 0 512 512" fill="currentColor" aria-hidden="true" style="display:inline-block;vertical-align:middle"><path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"/></svg></button>
					</div>
			</form>
        </div>
    </div>
</section>

<section class="featuredSec">
    <div class="CustomContainer">
        <div class="mainGrid">
            <div class="leftInfo">
				<?php
                // PERF-6: cache the hydrated featured post + slider data together (the
                // slider excludes $featured_id, so both must come from one cache-consistent
                // build) instead of running both queries every page load. See
                // inc/perf-query-cache.php.
                $tnb_blog_top = tnb_perf_cache_remember( 'tnb_blog_featured_and_slider', HOUR_IN_SECONDS, function () {
                    // Get the most recent featured post
                    $featured_query = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 1,
                        'meta_query' => array(
                            array(
                                'key' => 'is_featured',
                                'value' => '1',
                                'compare' => '='
                            )
                        )
                    ));

                    // If no featured post is set, get the latest post
                    if (!$featured_query->have_posts()) {
                        $featured_query = new WP_Query(array(
                            'post_type' => 'post',
                            'posts_per_page' => 1
                        ));
                    }

                    $featured      = null;
                    $featured_id   = 0;

                    if ($featured_query->have_posts()) :
                        $featured_query->the_post();
                        $featured_id = get_the_ID();
                        $excerpt     = get_the_excerpt();
                        $featured    = array(
                            'permalink' => get_permalink(),
                            'title'     => get_the_title(),
                            'excerpt'   => wp_trim_words($excerpt, 40, '...'),
                        );
                    endif;
                    wp_reset_postdata();

                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 4,
                        'post_status' => 'publish',
                        'post__not_in' => array($featured_id)
                    );
                    $query = new WP_Query($args);
                    $slider = array();
                    while ($query->have_posts()) : $query->the_post();
                        $slider[] = array(
                            'permalink' => get_permalink(),
                            'title'     => get_the_title(),
                            'image'     => get_the_post_thumbnail_url(get_the_ID(), 'full'),
                        );
                    endwhile;
                    wp_reset_postdata();

                    return array( 'featured' => $featured, 'featured_id' => $featured_id, 'slider' => $slider );
                } );
                $featured_id = $tnb_blog_top['featured_id'];
                if ($tnb_blog_top['featured']) :
                    $tnb_blog_featured = $tnb_blog_top['featured'];
                ?>
                <div class="featuredInfo">
                    <span><svg width="15" height="19" viewBox="0 0 15 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M8.06776 1C8.06776 1 9.21632 2.54111 9.21632 4.09436C9.21632 4.72537 9.21632 5.35637 9.16895 5.93884C9.07423 7.0431 10.3886 7.74692 11.1345 6.93389C11.2766 6.78827 11.395 6.61838 11.4898 6.41209C11.4898 6.41209 14 7.95321 14 11.4359C14 15.319 10.4478 18.4255 6.56398 17.9522C3.73403 17.6125 1.55532 15.2705 1.09353 12.4431C0.868555 11.084 1.04617 9.65207 1.66189 8.42646C1.8395 8.07455 2.06448 7.74692 2.30129 7.45568L8.06776 1Z" stroke="#EC1C24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M10 15.2757C10 16.7784 8.87892 18 7.5 18C6.12108 18 5 16.7784 5 15.2757C5 13.7731 7.14126 11 7.5 11C7.85874 11 10 13.7731 10 15.2757Z" stroke="#EC1C24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                     </svg> Featured Post</span>
                    <h2><a href="<?php echo esc_url($tnb_blog_featured['permalink']); ?>"><?php echo esc_html($tnb_blog_featured['title']); ?></a></h2>
                    <hr>
                    <p>
                        <?php echo esc_html( $tnb_blog_featured['excerpt'] ); ?>
                    </p>
                    <div class="btnWrapper">
                        <a href="<?php echo esc_url($tnb_blog_featured['permalink']); ?>">Read More <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 5H1M11 1L15 5L11 9" stroke="#EC1C24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
				<?php
                endif;
                ?>
            </div>
            <div class="rightInfo">
               <div class="articleSlider swiper">

                <div class="swiper-wrapper">
                <?php
                foreach ($tnb_blog_top['slider'] as $tnb_blog_slide) :
                ?>

                    <div class="single swiper-slide" style="background-image:url('<?php echo esc_url($tnb_blog_slide['image']); ?>')">
                        <div class="info">
                            <span>
                                <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 15H2C1.5 15 1 14.6 1 14V2C1 1.5 1.5 1 2 1H12C12.6 1 13 1.5 13 2V14C13 14.6 12.6 15 12 15Z" stroke="#ADBBC7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M5 5H9" stroke="#ADBBC7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M5 8H9" stroke="#ADBBC7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M5 11H8" stroke="#ADBBC7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            Article</span>
                            <h3><?php echo esc_html($tnb_blog_slide['title']); ?></h3>
                        </div>
                        <div class="btnWrapper">
                            <a href="<?php echo esc_url($tnb_blog_slide['permalink']); ?>">
                            Read More
                            <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 5H1M11 1L15 5L11 9" stroke="#EC1C24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            </a>
                        </div>
                    </div>

                <?php
                endforeach;
                ?>
                </div> </div>
               <div class="arrow-wrap">
                    <button class="prev-btn"><svg width="8" height="14" viewBox="0 0 8 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 1L1 7L7 13"/></svg></button>
                    <button class="next-btn"><svg width="8" height="14" viewBox="0 0 8 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M1 1L7 7L1 13"/></svg></button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="articleSec">
    <div class="CustomContainer">
       <h2>Articles</h2>
        <div class="articleTabs">
            <ul>
                <?php
						$categories = get_categories(array(
							'taxonomy'   => 'category',
							'hide_empty' => true,
							'parent'     => 0,
						));

						foreach ($categories as $category) :
							// Skip "All" category by name or slug
							if ( strtolower($category->name) === 'all' || strtolower($category->slug) === 'all' ) {
								continue;
							}
						?>
                        <li>
						<a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"
							class="marquee-category">
							<?php echo esc_html($category->name); ?>
						</a>
                        </li>
					<?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>

<section class="sec-post">
    <div class="CustomContainer">

        <?php
        /*
         * This listing is the blog archive, so it has to follow /blog/page/N/.
         * Without 'paged' every page served the same first batch — only 9 of 320
         * published posts were reachable from here.
         *
         * Both query vars are needed: this template runs on a static page (the
         * "Posts page" is not assigned, so /blog/ is a real page), and WordPress
         * paginates static pages with 'page' rather than 'paged'.
         */
        $paged = max( 1, get_query_var( 'paged' ), get_query_var( 'page' ) );

        $args = array(
            'post_type' => 'post',
            'posts_per_page' => (int) get_option( 'posts_per_page' ),
            'post_status' => 'publish',
            'paged' => $paged,
			'post__not_in' => array($featured_id)
        );

        $latest_posts = new WP_Query($args);

        if ($latest_posts->have_posts()) {
        ?>

        <div class="gridWrapper">

        <?php
        while ($latest_posts->have_posts()) {
            $latest_posts->the_post();
            ?>

            <div class="blog--cards">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail("full"); ?>
                </a>

                <div class="card--info">

                    <h6>#<?php echo get_the_category()[0]->name; ?></h6>

                    <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>

                    <div class="author-info">
                        <div class="author-img">
                            <?php echo get_avatar(get_the_author_meta('ID'), 50); ?>
                        </div>
                        <h5><?php the_author(); ?></h5>
                    </div>

                    <hr>

                    <div class="date-readmore">
                        <h5>
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="display:inline-block;vertical-align:middle;margin-right:5px"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                            <?php echo get_the_date('M d, Y'); ?>
                        </h5>

 <a href="<?php the_permalink(); ?>">
                                    Read More <svg width="14" height="10" viewBox="0 0 16 10" fill="none" aria-hidden="true" style="display:inline-block;vertical-align:middle;margin-left:5px">
                                        <path d="M1 5H15M11 1L15 5L11 9" stroke="#EC1C24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                    </div>

                </div>
            </div>

        <?php
        }
        ?>

        </div>

        <?php
        /*
         * paginate_links() rather than the_posts_pagination(). The latter cannot
         * work here: get_the_posts_pagination() bails out when the GLOBAL
         * $wp_query->max_num_pages is under 2, and it checks that before applying
         * any arguments — so on this static page (1 page) it emits nothing no
         * matter what 'total' says.
         *
         * base/format are given explicitly so the links come out as pretty,
         * trailing-slash /blog/page/N/ URLs rather than a ?page= query string.
         * The wrapper markup deliberately matches the_posts_pagination()'s own
         * output (nav.navigation.pagination > h2.screen-reader-text + div.nav-links)
         * so the category template and this one style identically.
         * See the category template for why end_size is set.
         */
        $blog_page_url = trailingslashit( get_permalink( get_queried_object_id() ) );
        $blog_links    = paginate_links(
            array(
                'base'      => $blog_page_url . '%_%',
                'format'    => 'page/%#%/',
                'total'     => $latest_posts->max_num_pages,
                'current'   => $paged,
                'mid_size'  => 2,
                'end_size'  => 3,
                'type'      => 'plain',
                'prev_text' => __( 'Previous', 'technbrains-child' ),
                'next_text' => __( 'Next', 'technbrains-child' ),
            )
        );

        if ( $blog_links ) {
            printf(
                '<nav class="navigation pagination" aria-label="%1$s"><h2 class="screen-reader-text">%2$s</h2><div class="nav-links">%3$s</div></nav>',
                esc_attr__( 'Blog posts navigation', 'technbrains-child' ),
                esc_html__( 'Posts pagination', 'technbrains-child' ),
                $blog_links // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- paginate_links() returns escaped anchor markup.
            );
        }
        }

        wp_reset_postdata();
        ?>

    </div>
</section>




<?php get_footer(); ?>
<script>
   (function () {
  function initFeaturedSwiper() {
    if (window.Swiper) {
      new Swiper(".articleSlider.swiper", {
        loop: true,          
        speed: 300,          
        grabCursor: true,
        observer: true,
        observeParents: true,
        
        
        navigation: {
          prevEl: ".prev-btn",
          nextEl: ".next-btn",
        },

        
        slidesPerView: 1, 
        spaceBetween: 10,

        breakpoints: {
          
          501: {
            slidesPerView: 2,
            spaceBetween: 20
          },
          
          768: {
            slidesPerView: 1,
            spaceBetween: 20
          },
          
          1200: {
            slidesPerView: 2,
            spaceBetween: 20
          }
        }
      });
    } else {
      setTimeout(initFeaturedSwiper, 50);
    }
  }
  initFeaturedSwiper();
})();
</script>