<?php
/**
 * Author Profile — single contribution (article) card.
 *
 * Renders one post as the QA-approved `.ap-art` card. Called inside the loop
 * (after the_post()) by author.php and by the tnb_author_load_more AJAX handler,
 * so both paths emit identical markup (no duplicate logic).
 *
 * Reveal stagger is handled purely in CSS (.ap-contrib-grid .ap-art:nth-child(3n…)),
 * so it applies to AJAX-appended cards too — no inline style here.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$tnb_ap_thumb = get_the_post_thumbnail_url( get_the_ID(), 'large' );
$tnb_ap_cats  = get_the_category();
$tnb_ap_cat   = ! empty( $tnb_ap_cats ) ? $tnb_ap_cats[0]->name : '';

// Estimated reading time (mirrors the source "min read" meta) — from word count.
$tnb_ap_words = str_word_count( wp_strip_all_tags( get_the_content() ) );
$tnb_ap_rt    = max( 1, (int) ceil( $tnb_ap_words / 200 ) );
?>
<a class="ap-art ap-rev" href="<?php the_permalink(); ?>">
	<div class="ap-art-img"<?php if ( $tnb_ap_thumb ) : ?> style="--ap-bg: url('<?php echo esc_url( $tnb_ap_thumb ); ?>')"<?php endif; ?>>
		<?php if ( $tnb_ap_cat ) : ?>
			<span class="ap-art-cat"><?php echo esc_html( $tnb_ap_cat ); ?></span>
		<?php endif; ?>
	</div>
	<div class="ap-art-body">
		<h3 class="ap-art-title"><?php the_title(); ?></h3>
		<p class="ap-art-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 30, '…' ) ); ?></p>
		<div class="ap-art-meta"><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?><span class="dot"></span><?php echo esc_html( $tnb_ap_rt . ' min read' ); ?></div>
	</div>
</a>
<?php
