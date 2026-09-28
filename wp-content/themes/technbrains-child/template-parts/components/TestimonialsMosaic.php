<?php defined('ABSPATH')||exit;
$data=get_query_var('component_data');
$testimonials=$data['testimonials']??[];
$img_base=get_stylesheet_directory_uri().'/assets/images';
$video_src=$img_base.'/home/Testimonials%20Video%20Update%20(25-05-26).mp4';
// Poster lives in the media library, not in the theme. Concatenating the uploads
// path onto the theme assets base produced a 404 on every page render.
$uploads_base=wp_get_upload_dir()['baseurl'];
$poster_src=$uploads_base.'/2026/07/video-thumb.webp';
$featured=$testimonials[0]??[];
$raw_quote=$featured['quote']??'Two engineers were in our standups within 48 hours — and we shipped v2 on the original timeline.';
$pull=mb_strlen($raw_quote)>120?mb_substr($raw_quote,0,120).'…':$raw_quote;
?>
<section class="section testimonials tv-mos" data-screen-label="13 Testimonials">
  <img src="<?php echo esc_url($img_base.'/logo-icon-hires.png'); ?>" alt="" aria-hidden="true" class="tv-mos-watermark" width="480" height="480" loading="lazy">
  <div class="container">
    <header class="tv-mos-head">
      <h2 class="tv-mos-h2">Don't Take Our Word<br> for It</h2>
      <div class="tv-mos-sub">
        <p>Our clients’ reviews on Clutch, Trustpilot, and other platforms speak to the experience, trust, and results behind every project. </p>
        <!--<div class="tv-mos-rating">
           <span class="ts-stars" aria-label="5 out of 5 stars"><?php //for($s=0;$s<5;$s++): ?><svg viewBox="0 0 24 24" width="13" height="13" fill="currentColor" aria-hidden="true"><path d="M12 .587l3.668 7.568L24 9.423l-6 5.847L19.336 24 12 19.897 4.664 24 6 15.27 0 9.423l8.332-1.268z"/></svg><?php //endfor; ?></span>
          <strong>4.9</strong>
          <span>&middot; 38 reviews</span>
        </div> -->
      </div>
    </header>

    <div class="tv-mos-grid tv-mos-grid--video-only">
      <article class="tv-mos-video" data-tv-mos-article>
        <video class="tv-mos-video-el"
          src="<?php echo esc_url($video_src); ?>"
          controls
          playsinline
          preload="none"
          style="display:none;width:100%;height:100%;object-fit:cover;position:absolute;inset:0">
        </video>
        <button type="button" class="tv-mos-video-poster" data-tv-mos-play aria-label="Play client testimonials video"
          style="background-image:linear-gradient(180deg,rgba(0,0,0,.45) 0%,rgba(0,0,0,.92) 100%),url('<?php echo esc_url($poster_src); ?>')">
          <span class="tv-mos-video-grid" aria-hidden="true"></span>
          <div class="tv-mos-video-top">
<!--             <span class="tv-mos-video-tag"><span class="tv-mos-video-rec"></span>Featured &middot; video</span> -->
<!--             <span class="tv-mos-video-num">2:14</span> -->
          </div>
          <span class="tv-mos-video-play" aria-hidden="true">
            <span class="tv-mos-video-ring"></span>
            <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7L8 5z"/></svg>
          </span>
          <div class="tv-mos-video-bottom">
            <p class="tv-mos-video-pull">&ldquo;<?php echo esc_html($pull); ?>&rdquo;</p>
            <div class="tv-mos-video-cite">
              <div class="tv-mos-video-avatar" style="background-image:url('<?php echo esc_url($img_base.'/home/daniela-rivera.jpg'); ?>')"></div>
              <div class="tv-mos-video-info">
                <div class="name"><?php echo esc_html($featured['name']??'Maria Chen'); ?></div>
                <div class="role"><?php echo esc_html($featured['role']??'VP Engineering'); ?> &middot; <span><?php echo esc_html($featured['company']??'FinLane · Fintech'); ?></span></div>
              </div>
            </div>
          </div>
        </button>
      </article>
    </div>
  </div>
</section>
