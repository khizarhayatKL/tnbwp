<?php
/**
 * Case Study — Previous / next case study bar.
 *
 * The reference leaves <section class="cs-next"> empty, but case-study.css already carries the
 * full .cs-next-* design, so this fills it with that markup rather than inventing a layout.
 *
 * Ordered by publish date, newest first, matching the case study listing. Wraps around so the
 * last study links forward to the first; renders nothing when there is only one study.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$cs_ids = get_posts(
	array(
		'post_type'              => 'case_study',
		'post_status'            => 'publish',
		'posts_per_page'         => -1,
		'orderby'                => 'date',
		'order'                  => 'DESC',
		'fields'                 => 'ids',
		'no_found_rows'          => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
	)
);

$cs_count = count( $cs_ids );

if ( $cs_count < 2 ) {
	return;
}

$cs_at   = array_search( get_the_ID(), $cs_ids, true );
$cs_at   = false === $cs_at ? 0 : (int) $cs_at;
$cs_prev = $cs_ids[ ( $cs_at - 1 + $cs_count ) % $cs_count ];
$cs_next = $cs_ids[ ( $cs_at + 1 ) % $cs_count ];

// ba-arrow is the design's forward arrow at this exact size and weight, reused rather than
// duplicated; nav-back is its mirror.
$cs_arrow_back = tnb_cs_icon( 'nav-back' );
$cs_arrow_fwd  = tnb_cs_icon( 'ba-arrow' );
?>
<section class="cs-next" data-screen-label="More Case Studies">
	<nav class="cs-next-bar" aria-label="More case studies">
		<a class="cs-next-link" href="<?php echo esc_url( (string) get_permalink( $cs_prev ) ); ?>">
			<span class="cs-next-arrow"><?php
				echo $cs_arrow_back; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- inline SVG from the theme.
			?></span>
			<span class="cs-next-text">
				<span class="cs-next-label">Previous Case Study</span>
				<span class="cs-next-title"><?php echo esc_html( (string) get_the_title( $cs_prev ) ); ?></span>
			</span>
		</a>
		<?php
		// Text before arrow on the forward link: .cs-next-fwd is right-aligned on desktop and
		// flipped with flex-direction: row-reverse under 900px, which only reads correctly from
		// this order.
		?>
		<a class="cs-next-link cs-next-fwd" href="<?php echo esc_url( (string) get_permalink( $cs_next ) ); ?>">
			<span class="cs-next-text">
				<span class="cs-next-label">Next Case Study</span>
				<span class="cs-next-title"><?php echo esc_html( (string) get_the_title( $cs_next ) ); ?></span>
			</span>
			<span class="cs-next-arrow"><?php
				echo $cs_arrow_fwd; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- inline SVG from the theme.
			?></span>
		</a>
	</nav>
</section>
