<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Shape
 * @since Shape 1.0
 */

get_header(); ?>

        <section class="beer-sec mn-hd cus-search-sec">
            <div class="container">
                <form role="search" method="get" id="searchform" class="search-form" action="<?php echo home_url( '/' ); ?>">
                <div class="cus--search">
                    <input type="search" class="search-field searchTerm" placeholder="Search..." value="<?php echo get_search_query() ?>" name="s" />
                    <button type="submit" class="search-submit searchButton" value="<?php echo esc_attr_x(
                        'Search', 'submit button' ) ?>"><svg width="18" height="18" viewBox="0 0 512 512" fill="currentColor" aria-hidden="true" style="display:inline-block;vertical-align:middle"><path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg>
                    </button>
                </div>
                </form>
            </div>
            <div class="CustomContainer">
            <?php if ( have_posts() ) : ?>
            <h4 class="showing-text"><?php printf( __( 'Search Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h4>
            <div class="search-grid">
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
                     

            <?php else : ?>

                <h4>Sorry Nothig Found</h4>

            <?php endif; ?>

            </div><!-- #content .site-content -->
        </section><!-- #primary .content-area -->
<?php get_footer(); ?>