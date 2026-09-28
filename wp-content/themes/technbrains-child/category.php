<?php get_header(); ?>


<section class="categoryMain">
    <div class="CustomContainer">
        <div class="catBanner">
            <h1><?php single_cat_title(); ?></h1>
        </div>
        <div class="categoryGrid">
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="blog--cards">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail("full"); ?>
                </a>
                <div class="card--info">
                    <h6>#<?php echo get_the_category()[0]->name; ?></h6>
                    <h4><?php the_title(); ?></h4>
                    <div class="author-info">
                        <div class="author-img">
                            <?php echo get_avatar(get_the_author_meta('ID'), 50); ?>
                        </div>
                        <h5><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></h5>
                    </div>
                    <hr>
                    <div class="date-readmore">
                        <h5>
                            <i class="far fa-calendar"></i>
                            <?php echo get_the_date('M d, Y'); ?>
                        </h5>
                        <a href="<?php the_permalink(); ?>">
                            Read More <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>

        <?php
        /*
         * Numbered pagination. This template runs on the main query, so
         * the_posts_pagination() picks up the right totals with no arguments.
         *
         * end_size widens the run of links at each end. With mid_size alone, page
         * 1 of 16 (app-development) exposes only "1 2 3 … 16", leaving mid-range
         * pages three or more clicks away; end_size 3 gives "1 2 3 … 14 15 16".
         * Deep middle pages of the largest category still need more than two
         * clicks — only 'show_all' would guarantee that.
         *
         * Real <a href> links, no JS: paginate_links() output is plain anchors and
         * WordPress's rewrite rules already give them a trailing slash.
         */
        the_posts_pagination(
            array(
                'mid_size'  => 2,
                'end_size'  => 3,
                'prev_text' => __( 'Previous', 'technbrains-child' ),
                'next_text' => __( 'Next', 'technbrains-child' ),
            )
        );
        ?>
    </div>
</section>
<?php get_footer(); ?>