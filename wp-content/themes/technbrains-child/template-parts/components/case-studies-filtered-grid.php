<?php
/**
 * Case Studies Filtered Grid — ACF flexible content layout
 *
 * "Browse Case Studies By Industry" — filter pills + a flex-wrap card list
 * (no CSS grid, no absolute-positioned layout), pulling real, live case_study
 * posts and the case_study_industry taxonomy (inc/case-study-cpt.php) instead
 * of hand-typed content. One of the 3 Case Studies Hub components —
 * page-scoped CSS/JS in assets/css/case-studies-hub.css and
 * assets/js/case-studies-hub.js, not the shared components.css/components.js
 * bundle.
 *
 * Card field extraction mirrors template-parts/author-case-studies.php (same
 * cs_hero_headline/cs_hero_lede/cs_hero_bg/cs_facts fields, same plain-text
 * stripping) — duplicated rather than refactored into a shared helper, to
 * avoid touching that unrelated existing file.
 *
 * Layout name : case_studies_filtered_grid
 * Dispatcher  : template-parts/flexible/dispatch.php
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$custom_class = get_sub_field( 'cshg_custom_class' );
$title        = get_sub_field( 'cshg_title' );
$description  = get_sub_field( 'cshg_description' );

$posts = get_posts( array(
	'post_type'              => 'case_study',
	'post_status'            => 'publish',
	'posts_per_page'         => -1,
	'orderby'                => 'date',
	'order'                  => 'DESC',
	'no_found_rows'          => true,
	'update_post_meta_cache' => false,
) );

if ( empty( $posts ) ) {
	return;
}

$plain = static function ( $html ): string {
	$text = wp_strip_all_tags( (string) $html );
	return trim( preg_replace( '/\s+/', ' ', $text ) );
};

// Same 4-color palette used by the Coverflow slider's default gradient
// (case-studies-coverflow.php) — rotated by position since case_study posts
// have no per-post color field.
$palette = array(
	array( 'start' => '#ff0004', 'end' => '#a60103' ),
	array( 'start' => '#17324f', 'end' => '#0c2340' ),
	array( 'start' => '#2f6f68', 'end' => '#17403c' ),
	array( 'start' => '#3a7bd5', 'end' => '#1b3d6d' ),
);

$cards = array();
foreach ( $posts as $i => $post ) {
	$id = $post->ID;

	$card_title = $plain( get_field( 'cs_hero_headline', $id ) );
	if ( '' === $card_title ) {
		continue; // no headline — nothing to show on a card
	}

	$terms   = get_the_terms( $id, 'case_study_industry' );
	$terms   = is_array( $terms ) ? $terms : array();
	$eyebrow = implode( ' / ', wp_list_pluck( $terms, 'name' ) );
	$tags    = implode( ',', wp_list_pluck( $terms, 'slug' ) );

	// Featured image only for the grid card — unlike the coverflow slider,
	// this grid wants the real per-post photo, not the generic hero banner
	// (cs_hero_bg is intentionally not used here).
	$image_url = get_the_post_thumbnail_url( $id, 'large' );

	$manual_start = get_field( 'cs_card_color_start', $id );
	$manual_end   = get_field( 'cs_card_color_end', $id );
	$color        = ( $manual_start && $manual_end )
		? array( 'start' => $manual_start, 'end' => $manual_end )
		: $palette[ $i % count( $palette ) ];

	$cards[] = array(
		'title'    => $card_title,
		'desc'     => $plain( get_field( 'cs_hero_lede', $id ) ),
		'image'    => $image_url,
		'eyebrow'  => $eyebrow,
		'tags'     => $tags,
		'url'      => get_permalink( $id ),
		'color'    => $color,
	);
}

if ( empty( $cards ) ) {
	return;
}

$industry_terms = get_terms( array(
	'taxonomy'   => 'case_study_industry',
	'hide_empty' => true,
) );
$industry_terms = is_wp_error( $industry_terms ) ? array() : $industry_terms;
?>
<section class="csh-section<?php echo $custom_class ? ' ' . esc_attr( $custom_class ) : ''; ?>" data-csh-filter-wrap>
	<div class="csh-container">

		<?php if ( $title || $description ) : ?>
			<div class="csh-head-center">
				<?php if ( $title ) : ?>
					<h2 class="csh-h2"><?php echo esc_html( $title ); ?></h2>
				<?php endif; ?>
				<?php if ( $description ) : ?>
					<p class="csh-sub"><?php echo esc_html( $description ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $industry_terms ) ) : ?>
			<div class="csh-filters" data-csh-filters>
				<button type="button" class="csh-filter is-active" data-csh-filter="all">All</button>
				<?php foreach ( $industry_terms as $term ) : ?>
					<button type="button" class="csh-filter" data-csh-filter="<?php echo esc_attr( $term->slug ); ?>"><?php echo esc_html( $term->name ); ?></button>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<div class="csh-card-list">
			<?php foreach ( $cards as $card ) :
				$book_style = sprintf(
					'background-color:%1$s;background-image:radial-gradient(140%% 140%% at 100%% 100%%, %2$s 0%%, %1$s 100%%);',
					esc_attr( $card['color']['end'] ),
					esc_attr( $card['color']['start'] )
				);
			?>
			<div class="csp-card" data-csh-tags="<?php echo esc_attr( $card['tags'] ); ?>">
				<?php if ( $card['image'] ) : ?>
					<span class="csp-card-media" style="background-image:url('<?php echo esc_url( $card['image'] ); ?>')" aria-hidden="true"></span>
				<?php endif; ?>
				<span class="csp-book" style="<?php echo esc_attr( $book_style ); ?>">
					<span class="csp-book-body">
						<?php if ( $card['eyebrow'] ) : ?>
							<span class="csp-eyebrow"><?php echo esc_html( $card['eyebrow'] ); ?></span>
						<?php endif; ?>
						<h3><?php echo esc_html( $card['title'] ); ?></h3>
						<?php if ( $card['desc'] ) : ?>
							<span class="csp-separator" aria-hidden="true"></span>
							<span class="csp-desc"><?php echo esc_html( $card['desc'] ); ?></span>
						<?php endif; ?>
					</span>
					<a href="<?php echo esc_url( $card['url'] ); ?>" class="csp-read-more">
						Read More
						<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
					</a>
				</span>
			</div>
			<?php endforeach; ?>
		</div>

	</div>
</section>
