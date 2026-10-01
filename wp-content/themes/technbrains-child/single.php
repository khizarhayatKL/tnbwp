<?php get_header(); 

$icon_chevron = '<svg class="icon-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="14" height="14" aria-hidden="true"><path d="M6 9l6 6 6-6" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
?>
<?php if ($wp_query->have_posts()):
  while ($wp_query->have_posts()):
    $wp_query->the_post(); ?>
  <section class="singleBanner">
    <div class="CustomContainer">
      <div class="mainGrid">
        <div class="leftSide">
			 <?php tnb_breadcrumb_html(); ?>
          <?php /* category chip — disabled per request
          <span><?php echo get_the_category()[0]->name; ?></span>
          */ ?>
          <h1><?php the_title(); ?></h1>
          <hr>
          <p>
    <?php
    echo has_excerpt()
        ? esc_html( get_the_excerpt() )
        : esc_html( wp_trim_words( strip_shortcodes( get_the_content() ), 60, '...' ) );
    ?>
</p>
          <div class="tnb-post-meta">
            <div class="tnb-byline">
              <?php
              $tnb_author_id = (int) get_the_author_meta( 'ID' );
              $tnb_portrait  = function_exists( 'get_field' ) ? get_field( 'ap_portrait', 'user_' . $tnb_author_id ) : null;
              $tnb_role      = function_exists( 'get_field' ) ? get_field( 'ap_role', 'user_' . $tnb_author_id ) : '';
              if ( is_array( $tnb_portrait ) && ! empty( $tnb_portrait['url'] ) ) {
                echo '<img src="' . esc_url( $tnb_portrait['url'] ) . '" alt="' . esc_attr( get_the_author() ) . '" width="42" height="42" loading="eager" decoding="async" />';
              } else {
                echo get_avatar( $tnb_author_id, 42, '', get_the_author() );
              }
              ?>
              <div class="tnb-byline-text">
                <a class="tnb-byline-name" href="<?php echo esc_url( get_author_posts_url( $tnb_author_id ) ); ?>"><?php the_author(); ?></a>
                <?php if ( $tnb_role ) : ?>
                  <span class="tnb-byline-role"><?php echo esc_html( $tnb_role ); ?></span>
                <?php endif; ?>
              </div>
              <?php
              // Hover card (desktop/laptop only, CSS-driven) — same data
              // sources as the author card after the FAQs.
              $tnb_hb_focus    = function_exists( 'get_field' ) ? get_field( 'ap_focus', 'user_' . $tnb_author_id ) : '';
              $tnb_hb_short    = function_exists( 'get_field' ) ? get_field( 'ap_short_description', 'user_' . $tnb_author_id ) : '';
              $tnb_hb_bio      = $tnb_hb_short ? $tnb_hb_short : get_the_author_meta( 'description' );
              $tnb_hb_linkedin = get_the_author_meta( 'linkedin' );
              $tnb_hb_twitter  = get_the_author_meta( 'twitter' );
              $tnb_hb_email    = get_the_author_meta( 'user_email' );
              ?>
              <div class="tnb-author-pop" role="tooltip" aria-hidden="true">
                <span class="tnb-author-pop-arrow" aria-hidden="true"></span>
                <div class="tnb-author-pop-card">
                  <?php
                  if ( is_array( $tnb_portrait ) && ! empty( $tnb_portrait['url'] ) ) {
                    echo '<img class="tnb-author-pop-img" src="' . esc_url( $tnb_portrait['url'] ) . '" alt="" width="90" height="90" loading="lazy" decoding="async" />';
                  } else {
                    echo get_avatar( $tnb_author_id, 90, '', '', array( 'class' => 'tnb-author-pop-img' ) );
                  }
                  ?>
                  <div class="tnb-author-pop-content">
                  <div class="tnb-author-pop-head">
                    <div class="tnb-author-pop-id">
                      <a class="tnb-author-pop-name" href="<?php echo esc_url( get_author_posts_url( $tnb_author_id ) ); ?>"><?php the_author(); ?></a>
                      <?php if ( $tnb_hb_focus || $tnb_role ) : ?>
                        <div class="tnb-author-pop-sub"><?php echo esc_html( $tnb_hb_focus ? $tnb_hb_focus : $tnb_role ); ?></div>
                      <?php endif; ?>
                    </div>
                    <div class="tnb-author-pop-social">
                      <?php if ( $tnb_hb_linkedin ) : ?>
                        <a href="<?php echo esc_url( $tnb_hb_linkedin ); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M6.94 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM3 8.5h3.94v12H3v-12zM10 8.5h3.78v1.66h.05a4.14 4.14 0 0 1 3.73-2.05c3.99 0 4.72 2.63 4.72 6.04v6.85h-3.94v-6.07c0-1.45-.03-3.31-2.02-3.31-2.02 0-2.33 1.58-2.33 3.21v6.17H10v-12z"/></svg></a>
                      <?php endif; ?>
                      <?php if ( $tnb_hb_twitter ) : ?>
                        <a href="<?php echo esc_url( $tnb_hb_twitter ); ?>" target="_blank" rel="noopener noreferrer" aria-label="X"><svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M18.9 2h3.3l-7.2 8.2L23.5 22h-6.6l-5.2-6.8L5.7 22H2.4l7.7-8.8L1.5 2h6.8l4.7 6.2zm-1.2 18h1.8L7.3 3.8H5.4z"/></svg></a>
                      <?php endif; ?>
                      <?php if ( $tnb_hb_email ) : ?>
                        <a href="mailto:<?php echo esc_attr( $tnb_hb_email ); ?>" aria-label="Email"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/></svg></a>
                      <?php endif; ?>
                    </div>
                  </div>
                  <?php if ( $tnb_hb_bio ) : ?>
                    <p class="tnb-author-pop-bio"><?php echo esc_html( $tnb_hb_bio ); ?></p>
                  <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
            <span class="tnb-meta-div" aria-hidden="true"></span>
            <p class="last-updated-date">
             <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4.5" width="18" height="16" rx="2"></rect><path d="M3 9h18M8 3v4M16 3v4"></path></svg> Updated <b><?php echo get_the_modified_date('M d, Y'); ?></b>
            </p>
          </div>
        </div>
        <!-- <div class="rightSide">
          <h2>Written by:</h2>
          <hr>
          <div class="profileInfo">
            <h3><?php the_author(); ?></h3>
            <p>Managing Director UK&I and VP of Innovation</p>
            <a href="#">More from this author 
              <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M14 5H1M11 1L15 5L11 9" stroke="#EC1C24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </a>
          </div>
        </div> -->
      </div>
    </div>
  </section>

  <section class="sec-post det-post">
    <div class="CustomContainer">
      <div class="singleGrid">
        <div class="leftContent">
          <div class="custom-table-of-content">
            <?php echo do_shortcode('[ez-toc]'); ?>
            <div class="soc">
              <p class="tnb-share-h">Share This Blog</p>
              <div class="tnb-share">
                <?php $tnb_share_url = get_permalink(); ?>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode( $tnb_share_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Share on Facebook">
                  <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M13 9h2.5V6.5h-2.5c-1.93 0-3.5 1.57-3.5 3.5v1.5H8V14h1.5v6.5h2.5V14h2l.5-2.5h-2.5V10c0-.55.45-1 1-1z"/></svg>
                </a>
                <a href="https://twitter.com/intent/tweet?text=<?php echo rawurlencode( get_the_title() ); ?>&amp;url=<?php echo rawurlencode( $tnb_share_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Share on X">
                  <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M18.9 2h3.3l-7.2 8.2L23.5 22h-6.6l-5.2-6.8L5.7 22H2.4l7.7-8.8L1.5 2h6.8l4.7 6.2zm-1.2 18h1.8L7.3 3.8H5.4z"/></svg>
                </a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo rawurlencode( $tnb_share_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Share on LinkedIn">
                  <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M6.94 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM3 8.5h3.94v12H3v-12zM10 8.5h3.78v1.66h.05a4.14 4.14 0 0 1 3.73-2.05c3.99 0 4.72 2.63 4.72 6.04v6.85h-3.94v-6.07c0-1.45-.03-3.31-2.02-3.31-2.02 0-2.33 1.58-2.33 3.21v6.17H10v-12z"/></svg>
                </a>
                <button type="button" class="tnb-copy-link" data-link="<?php echo esc_url( $tnb_share_url ); ?>" aria-label="Copy link">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10 13a5 5 0 0 0 7 0l3-3a5 5 0 0 0-7-7l-1 1"/><path d="M14 11a5 5 0 0 0-7 0l-3 3a5 5 0 0 0 7 7l1-1"/></svg>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="middleContent">
          <!-- <div class="main">
            <div class="post-tags">
              <?php
              $tags = get_the_tags();
              if ($tags) {
                foreach ($tags as $tag) {
                  echo '<a href="#">' . $tag->name . '</a>';
                  // echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
                }
              }
              ?>
            </div>
            <div class="post--title">
              <h1><?php the_title(); ?></h1>
            </div>
            <div class="post-date-name">
              <h5><i class="fa fa-calendar"></i><?php the_time('F j, Y'); ?></h5>
              <h5><i class="fa fa-user"></i><?php the_author(); ?></h5>
            </div>
            <div class="images-icon">

              <div class="pic">
                <?php the_post_thumbnail('full'); ?>
              </div>
            </div>
          </div> -->
          <div class="det">
            <?php the_content(); ?>
          </div>
      
        <?php if( have_rows('faqs') ): ?>
          <div class="faqSection">	
            <div class="faqheading">
              <h2>Frequently Asked Questions</h2>
            </div>
            <div class="accordion" id="accordionExample">
              <?php
                            $faq_count = 0; // Counter to generate unique IDs
                            while( have_rows('faqs') ) : the_row();
                                $question = get_sub_field('question');
                                $answer = get_sub_field('answer');
                                $addtionalContent = get_sub_field('additional_content');
                                if( $question  ): // Ensure both question and answer are set
                                    $faq_count++; // Increment counter for unique IDs
                                    ?>
                                    <div class="card">
                                        <div class="card-header" id="heading<?php echo $faq_count; ?>">
                                        <h3>
                                                <button class="btn btn-link btn-block <?php echo $faq_count === 1 ? '' : 'collapsed'; ?>" 
                                                        type="button" 
                                                        data-bs-toggle="collapse" 
                                                        data-bs-target="#collapse<?php echo $faq_count; ?>" 
                                                        aria-expanded="<?php echo $faq_count === 1 ? 'true' : 'false'; ?>" 
                                                        aria-controls="collapse<?php echo $faq_count; ?>">
                                                    <span><?php echo esc_html($question); ?></span>
                                                    <span class="icon">
                                                       <?php echo $icon_chevron; ?>
                                                    </span>
                                                </button>
                                            </h3>
                                        </div>
                                        <div id="collapse<?php echo $faq_count; ?>" 
                                            class="collapse <?php echo $faq_count === 1 ? 'show' : ''; ?>" 
                                            aria-labelledby="heading<?php echo $faq_count; ?>" 
                                            data-bs-parent="#accordionExample">
                                            <div class="card-body">
												<?php if ( ! empty( trim( wp_strip_all_tags( $addtionalContent ) ) ) ) : ?>
													<?php echo apply_filters( 'the_content', $addtionalContent ); ?>
												<?php elseif ( ! empty( $answer ) ) : ?>
													<p><?php echo esc_html( $answer ); ?></p>
												<?php endif; ?>
											</div>
                                        </div>
                                    </div>
                                    <?php
                                endif;
                            endwhile;
                        ?>
            </div>

          </div>
          <?php endif; ?>

          <?php
          // Author card — avatar/role from the Author Profile user fields,
          // bio from the WP user profile, socials only when set.
          $tnb_ac_id       = (int) get_the_author_meta( 'ID' );
          $tnb_ac_portrait = function_exists( 'get_field' ) ? get_field( 'ap_portrait', 'user_' . $tnb_ac_id ) : null;
          $tnb_ac_short    = function_exists( 'get_field' ) ? get_field( 'ap_short_description', 'user_' . $tnb_ac_id ) : '';
          $tnb_ac_bio      = $tnb_ac_short ? $tnb_ac_short : get_the_author_meta( 'description' );
          $tnb_ac_linkedin = get_the_author_meta( 'linkedin' );
          $tnb_ac_twitter  = get_the_author_meta( 'twitter' );
          $tnb_ac_email    = get_the_author_meta( 'user_email' );
          ?>
          <div class="tnb-authorcard">
            <?php
            if ( is_array( $tnb_ac_portrait ) && ! empty( $tnb_ac_portrait['url'] ) ) {
              echo '<img src="' . esc_url( $tnb_ac_portrait['url'] ) . '" alt="' . esc_attr( get_the_author() ) . '" width="74" height="74" loading="lazy" decoding="async" />';
            } else {
              echo get_avatar( $tnb_ac_id, 74, '', get_the_author() );
            }
            ?>
            <div class="tnb-authorcard-body">
              <div class="tnb-authorcard-top">
                <div>
                  <div class="tnb-authorcard-k">Written by</div>
                  <a class="tnb-authorcard-n" href="<?php echo esc_url( get_author_posts_url( $tnb_ac_id ) ); ?>"><?php the_author(); ?></a>
                </div>
                <div class="tnb-author-social">
                  <?php if ( $tnb_ac_linkedin ) : ?>
                    <a href="<?php echo esc_url( $tnb_ac_linkedin ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( get_the_author() ); ?> on LinkedIn">
                      <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M6.94 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM3 8.5h3.94v12H3v-12zM10 8.5h3.78v1.66h.05a4.14 4.14 0 0 1 3.73-2.05c3.99 0 4.72 2.63 4.72 6.04v6.85h-3.94v-6.07c0-1.45-.03-3.31-2.02-3.31-2.02 0-2.33 1.58-2.33 3.21v6.17H10v-12z"/></svg>
                    </a>
                  <?php endif; ?>
                  <?php if ( $tnb_ac_twitter ) : ?>
                    <a href="<?php echo esc_url( $tnb_ac_twitter ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( get_the_author() ); ?> on X">
                      <svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M18.9 2h3.3l-7.2 8.2L23.5 22h-6.6l-5.2-6.8L5.7 22H2.4l7.7-8.8L1.5 2h6.8l4.7 6.2zm-1.2 18h1.8L7.3 3.8H5.4z"/></svg>
                    </a>
                  <?php endif; ?>
                  <?php if ( $tnb_ac_email ) : ?>
                    <a href="mailto:<?php echo esc_attr( $tnb_ac_email ); ?>" aria-label="Email <?php echo esc_attr( get_the_author() ); ?>">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/></svg>
                    </a>
                  <?php endif; ?>
                </div>
              </div>
              <div class="tnb-authorcard-foot">
                <?php if ( $tnb_ac_bio ) : ?>
                  <p><?php echo esc_html( $tnb_ac_bio ); ?></p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="rightContent">
         
            <?php
            // Sidebar promo CTA — per-post fields override the site-wide
            // default (Blog Settings options page); built-in text is the
            // final fallback so the block never renders empty.
            $tnb_bp = function ( $name, $default = '' ) {
              $v = function_exists( 'get_field' ) ? get_field( $name ) : '';
              if ( ! $v && function_exists( 'get_field' ) ) {
                $v = get_field( $name, 'option' );
              }
              return $v ? $v : $default;
            };
            $tnb_bp_heading      = $tnb_bp( 'bp_promo_heading', 'Blocked by backlog or missing expertise?' );
            $tnb_bp_text         = $tnb_bp( 'bp_promo_text', 'Senior developers who build, fix, and ship — without slowing your team down.' );
            $tnb_bp_primary_text = $tnb_bp( 'bp_promo_primary_text', 'Start Your Project' );
            $tnb_bp_primary_link = $tnb_bp( 'bp_promo_primary_link' );

            // F4 Fix 4: default ghost-CTA text/link is derived from the post's
            // primary category instead of a single hard-coded pair, so 176/178
            // posts stop pointing the same anchor at the same URL. Per-post and
            // options-page overrides (above) still take precedence unchanged.
            $tnb_bp_cta_map = array(
              'app-development'      => array( 'Hire mobile app developers', '/hire-dedicated-team/' ),
              'ai'                    => array( 'Hire AI engineers', '/hire-software-developers/' ),
              'software-development'  => array( 'Hire software developers', '/hire-software-developers/' ),
              'tech-talent'           => array( 'Hire dedicated developers', '/hire-dedicated-team/' ),
              'industry-insights'     => array( 'Hire industry software engineers', '/hire-software-developers/' ),
              'news'                  => array( 'Hire vetted engineers', '/hire-software-developers/' ),
            );
            $tnb_bp_cat         = function_exists( 'tnb_blog_schema_primary_category' ) ? tnb_blog_schema_primary_category( get_the_ID() ) : null;
            $tnb_bp_cta_default = ( $tnb_bp_cat && isset( $tnb_bp_cta_map[ $tnb_bp_cat->slug ] ) )
              ? $tnb_bp_cta_map[ $tnb_bp_cat->slug ]
              : array( 'Hire vetted engineers', '/hire-software-developers/' );

            $tnb_bp_ghost_text   = $tnb_bp( 'bp_promo_ghost_text', $tnb_bp_cta_default[0] );
            $tnb_bp_ghost_link   = $tnb_bp( 'bp_promo_ghost_link', $tnb_bp_cta_default[1] );
            ?>
            <div class="rightCta bp-promo">
              <div class="bp-promo-inner">
                <p class="bp-promo-inner-heading"><?php echo esc_html( $tnb_bp_heading ); ?></p>
                <p><?php echo esc_html( $tnb_bp_text ); ?></p>
                <div class="bp-promo-btns">
                  <?php if ( $tnb_bp_primary_link ) : ?>
                    <a class="hd-btn hd-btn-primary" href="<?php echo esc_url( $tnb_bp_primary_link ); ?>"><?php echo esc_html( $tnb_bp_primary_text ); ?></a>
                  <?php else : ?>
                    <button type="button" class="hd-btn hd-btn-primary tnb-popup-trigger"><?php echo esc_html( $tnb_bp_primary_text ); ?></button>
                  <?php endif; ?>
                  <a class="hd-btn bp-promo-btn-ghost" href="<?php echo esc_url( $tnb_bp_ghost_link ); ?>"><?php echo esc_html( $tnb_bp_ghost_text ); ?></a>
                </div>
              </div>
            </div>
			      
        </div>
      </div>
    </div>
  </section>
 
  <?php endwhile; endif; ?>
<?php get_footer(); ?>
