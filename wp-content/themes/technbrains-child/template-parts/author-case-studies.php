<?php
/**
 * Author page — "Selected Work" case-study carousel.
 *
 * Rendered from author.php between the Credentials CTA and Contributions
 * sections. Reads the author's own `case_study` CPT posts (post_author match —
 * this CPT has no dedicated author-relationship ACF field) and reuses the
 * site's own existing "cases deck" engine — initCasesDeck() in
 * assets/js/custom-theme-interactions.js, the same data-deck="cases" /
 * data-cases-index / data-cases-prev/next / data-cases-dot markup contract
 * template-parts/components/Cases.php uses — rather than Swiper or any new
 * slider JS. That engine (front/side-l/side-r/far card states, always-on
 * prev/next + dots) is purpose-built for exactly "one featured card, the rest
 * positioned around it, always navigable regardless of count" — the actual
 * requirement here — where a linear-scroll carousel like Swiper isn't:
 * Swiper legitimately has nothing to scroll to once every card already fits
 * the visible row (confirmed directly against a live Swiper instance this
 * session: isEnd/isBeginning both true, "not enough slides for loop mode").
 * Nav markup/CSS (.case-deck-nav/.case-btn/.case-deck-dots) is reused as-is
 * from components.css; only the card position-state visuals below are new,
 * since Cases.php's own .case-card is a fixed 1060px 3D layout built for its
 * specific metrics/meta content shape, not this page's badge/title/desc cards.
 *
 * Card fields all come from the existing single-case-study ACF group
 * (inc/acf-case-study.php) — no schema changes:
 *   - cs_hero_headline -> card title
 *   - cs_hero_lede     -> card description
 *   - cs_facts repeater, row where the label contains "industry" -> badge
 *   - featured image (post thumbnail) -> card background, no color fill
 *
 * Heading: ap_cs_heading (ACF User field, acf-json/group_tnb_author_profile.json)
 * overrides the auto-derived "{Industry} Projects By {FirstName}" heading when set.
 *
 * Expects $args['author_id'] (int) and $args['author_name'] (string, for the
 * empty-industry fallback heading) from the get_template_part() call in
 * author.php.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$tnb_acs_author_id   = isset( $args['author_id'] ) ? (int) $args['author_id'] : 0;
$tnb_acs_author_name = isset( $args['author_name'] ) ? (string) $args['author_name'] : '';

if ( ! $tnb_acs_author_id ) {
	return;
}

// PERF-6: cache the fully hydrated cards + industry counts, not just the query —
// the real per-request cost is the N+1 get_field() ACF lookups per card.
// See inc/perf-query-cache.php.
$tnb_acs_data = tnb_perf_cache_remember( 'tnb_author_case_studies_' . $tnb_acs_author_id, 6 * HOUR_IN_SECONDS, function () use ( $tnb_acs_author_id ) {
	$tnb_acs_posts = get_posts( array(
		'post_type'              => 'case_study',
		'post_status'            => 'publish',
		'author'                 => $tnb_acs_author_id,
		'posts_per_page'         => 6,
		'orderby'                => 'date',
		'order'                  => 'DESC',
		'no_found_rows'          => true,
		'update_post_meta_cache' => false,
	) );

	if ( empty( $tnb_acs_posts ) ) {
		return array( 'cards' => array(), 'industry_counts' => array() );
	}

	/** Plain-text card title/desc — cs_hero_headline may carry <br>/<span class="hl"> for the single-page H1; a slider card wants text only. */
	$tnb_acs_plain = static function ( $html ): string {
		$text = wp_strip_all_tags( (string) $html );
		return trim( preg_replace( '/\s+/', ' ', $text ) );
	};

	$tnb_acs_cards           = array();
	$tnb_acs_industry_counts = array();

	foreach ( $tnb_acs_posts as $tnb_acs_post ) {
		$tnb_acs_id = $tnb_acs_post->ID;

		$tnb_acs_title = $tnb_acs_plain( get_field( 'cs_hero_headline', $tnb_acs_id ) );
		if ( '' === $tnb_acs_title ) {
			continue; // no headline — nothing to show on a card
		}

		$tnb_acs_badge = '';
		$tnb_acs_facts = get_field( 'cs_facts', $tnb_acs_id );
		if ( is_array( $tnb_acs_facts ) ) {
			foreach ( $tnb_acs_facts as $tnb_acs_fact ) {
				$tnb_acs_key = isset( $tnb_acs_fact['cs_fact_key'] ) ? (string) $tnb_acs_fact['cs_fact_key'] : '';
				if ( false !== stripos( $tnb_acs_key, 'industry' ) ) {
					$tnb_acs_badge = trim( (string) ( $tnb_acs_fact['cs_fact_value'] ?? '' ) );
					break;
				}
			}
		}

		if ( '' !== $tnb_acs_badge ) {
			$tnb_acs_industry_counts[ $tnb_acs_badge ] = ( $tnb_acs_industry_counts[ $tnb_acs_badge ] ?? 0 ) + 1;
		}

		// cs_hero_bg is the same image the single case-study page's own hero uses
		// (Case-study-hero.php) — prefer it over the WP featured image, which
		// isn't consistently set on every case study; fall back to the featured
		// image when a study has no hero background configured.
		$tnb_acs_hero_bg = get_field( 'cs_hero_bg', $tnb_acs_id );
		$tnb_acs_thumb   = ( is_array( $tnb_acs_hero_bg ) && ! empty( $tnb_acs_hero_bg['url'] ) )
			? $tnb_acs_hero_bg['url']
			: get_the_post_thumbnail_url( $tnb_acs_id, 'large' );

		$tnb_acs_cards[] = array(
			'id'    => $tnb_acs_id,
			'badge' => $tnb_acs_badge,
			'title' => $tnb_acs_title,
			'thumb' => $tnb_acs_thumb,
			'desc'  => $tnb_acs_plain( get_field( 'cs_hero_lede', $tnb_acs_id ) ),
			'url'   => get_permalink( $tnb_acs_id ),
		);
	}

	return array( 'cards' => $tnb_acs_cards, 'industry_counts' => $tnb_acs_industry_counts );
} );

$tnb_acs_cards           = $tnb_acs_data['cards'];
$tnb_acs_industry_counts = $tnb_acs_data['industry_counts'];

if ( empty( $tnb_acs_cards ) ) {
	return;
}

// Heading: manual override (ACF User field) wins; otherwise derive from the most
// common "Industry" cs_facts value across this author's cards (ties keep the
// first — most recent, since $tnb_acs_posts is date DESC); falls back further to
// a plain "Selected Work" heading when no card is industry-tagged at all.
$tnb_acs_heading_override = function_exists( 'get_field' ) ? trim( (string) get_field( 'ap_cs_heading', 'user_' . $tnb_acs_author_id ) ) : '';

$tnb_acs_top_industry = '';
$tnb_acs_top_count    = 0;
foreach ( $tnb_acs_industry_counts as $tnb_acs_ind => $tnb_acs_count ) {
	if ( $tnb_acs_count > $tnb_acs_top_count ) {
		$tnb_acs_top_industry = $tnb_acs_ind;
		$tnb_acs_top_count    = $tnb_acs_count;
	}
}

if ( '' !== $tnb_acs_heading_override ) {
	$tnb_acs_heading = $tnb_acs_heading_override;
} elseif ( '' !== $tnb_acs_top_industry ) {
	$tnb_acs_heading = sprintf(
		/* translators: 1: industry name, 2: author first name */
		__( '%1$s Projects By %2$s', 'technbrains-child' ),
		$tnb_acs_top_industry,
		$tnb_acs_author_name
	);
} else {
	$tnb_acs_heading = sprintf(
		/* translators: %s: author first name */
		__( 'Selected Work By %s', 'technbrains-child' ),
		$tnb_acs_author_name
	);
}

$tnb_acs_total = count( $tnb_acs_cards );

$tnb_acs_arrow = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>';
$tnb_acs_svg_kses = array(
	'svg'      => array(
		'viewbox'         => true,
		'fill'            => true,
		'stroke'          => true,
		'stroke-width'    => true,
		'stroke-linecap'  => true,
		'stroke-linejoin' => true,
		'aria-hidden'     => true,
	),
	'line'     => array( 'x1' => true, 'y1' => true, 'x2' => true, 'y2' => true ),
	'polyline' => array( 'points' => true ),
);
?>
<section class="ap-section" data-screen-label="04.5 Selected Work">
	<div class="ap-wrap">
		<div class="ap-cs" data-deck="cases" data-deck-fade data-deck-autoplay="4000">
			<div class="ap-cs-head ap-rev">
				<h2 class="ap-h2"><?php echo esc_html( $tnb_acs_heading ); ?></h2>
			</div>

			<div class="ap-cs-deck">
				<?php foreach ( $tnb_acs_cards as $tnb_acs_i => $tnb_acs_card ) :
					$tnb_acs_pos = 0 === $tnb_acs_i ? 'is-front' : ( 1 === $tnb_acs_i ? 'is-side-r' : ( $tnb_acs_i === $tnb_acs_total - 1 ? 'is-side-l' : 'is-far' ) );
					?>
					<article class="ap-cs-card <?php echo esc_attr( $tnb_acs_pos ); ?><?php echo $tnb_acs_card['thumb'] ? ' has-bg' : ''; ?>"
						data-cases-index="<?php echo esc_attr( (string) $tnb_acs_i ); ?>"
						<?php echo $tnb_acs_card['thumb'] ? ' style="--ap-cs-bg: url(\'' . esc_url( $tnb_acs_card['thumb'] ) . '\')"' : ''; ?>>
						<div class="ap-cs-body">
							<?php if ( '' !== $tnb_acs_card['badge'] ) : ?>
								<span class="ap-cs-badge"><?php echo esc_html( $tnb_acs_card['badge'] ); ?></span>
							<?php endif; ?>
							<h3 class="ap-cs-title"><?php echo esc_html( $tnb_acs_card['title'] ); ?></h3>
							<?php if ( '' !== $tnb_acs_card['desc'] ) : ?>
								<p class="ap-cs-desc"><?php echo esc_html( wp_trim_words( $tnb_acs_card['desc'], 26, '…' ) ); ?></p>
							<?php endif; ?>
						</div>
						<a class="ap-cs-view" href="<?php echo esc_url( $tnb_acs_card['url'] ); ?>">
							<?php esc_html_e( 'View Case Study', 'technbrains-child' ); ?>
							<?php echo wp_kses( $tnb_acs_arrow, $tnb_acs_svg_kses ); ?>
						</a>
					</article>
				<?php endforeach; ?>
			</div>

			<?php if ( $tnb_acs_total > 1 ) : ?>
				<div class="case-deck-nav ap-cs-nav" aria-label="<?php esc_attr_e( 'Case study navigation', 'technbrains-child' ); ?>">
					<button class="case-btn" type="button" aria-label="<?php esc_attr_e( 'Previous case study', 'technbrains-child' ); ?>" data-cases-prev>
						<span class="icon-flip"><?php echo wp_kses( $tnb_acs_arrow, $tnb_acs_svg_kses ); ?></span>
					</button>
					<div class="case-deck-dots" role="tablist">
						<?php foreach ( $tnb_acs_cards as $tnb_acs_i => $tnb_acs_card ) : ?>
							<button type="button" role="tab" class="case-deck-dot<?php echo 0 === $tnb_acs_i ? ' is-active' : ''; ?>"
								aria-label="<?php echo esc_attr( sprintf( /* translators: %s: case study title */ __( 'Show case study: %s', 'technbrains-child' ), $tnb_acs_card['title'] ) ); ?>"
								aria-selected="<?php echo 0 === $tnb_acs_i ? 'true' : 'false'; ?>"
								data-cases-dot="<?php echo esc_attr( (string) $tnb_acs_i ); ?>"></button>
						<?php endforeach; ?>
					</div>
					<button class="case-btn" type="button" aria-label="<?php esc_attr_e( 'Next case study', 'technbrains-child' ); ?>" data-cases-next>
						<?php echo wp_kses( $tnb_acs_arrow, $tnb_acs_svg_kses ); ?>
					</button>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
