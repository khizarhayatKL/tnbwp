<?php
/**
 * Article template family — Platform evaluation cards (ranked, meta strip, reviews, trade-off).
 *
 * Layout : art_platform_evals (ACF Flexible Content)
 * Fields : art_pe_items{ art_pe_rank, art_pe_name, art_pe_short_name, art_pe_best, art_pe_category,
 *          art_pe_pricing, art_pe_deployment, art_pe_licensing, art_pe_reviews_mode,
 *          art_pe_reviews_source, art_pe_reviews_rating, art_pe_reviews_count,
 *          art_pe_reviews_caveat, art_pe_intro, art_pe_body, art_pe_tradeoff, art_pe_avoid },
 *          art_anchor
 * CSS    : assets/css/article.css (.art-pe-*)
 * JS     : none of its own.
 *
 * Headless, matching Article-AltEvals.php's convention (the closest existing sibling in shape) —
 * the H2 + lead paragraph come from a preceding art_prose row.
 *
 * art_pe_short_name is an explicit field rather than derived in PHP from art_pe_name: the source
 * shortens "Trimble Viewpoint Vista" to "Vista" for the "Avoid X when" label via ad hoc JS string
 * munging, which would be fragile to replicate here — the editor sets it directly instead.
 *
 * Reviews render in one of 3 shapes off art_pe_reviews_mode: none (field omitted entirely), broad
 * (a caveat with no score), or scored (rating/5 + source + count, flagged "small sample" under 60
 * and "count n/a" when blank) — the flags are computed here from the raw count, not separate
 * editor toggles.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_items  = (array) get_sub_field( 'art_pe_items' );
$art_anchor = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_items = array_values(
	array_filter(
		$art_items,
		static function ( $row ) {
			return '' !== trim( (string) ( $row['art_pe_name'] ?? '' ) );
		}
	)
);

if ( ! $art_items ) {
	return;
}

$art_kses = tnb_art_allowed_html();
$art_svg  = tnb_art_svg_html();
?>
<div class="art-pe-grid"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<?php foreach ( $art_items as $art_i => $art_item ) : ?>
		<?php
		$art_rank        = trim( (string) ( $art_item['art_pe_rank'] ?? '' ) );
		$art_name        = trim( (string) $art_item['art_pe_name'] );
		$art_short_name  = trim( (string) ( $art_item['art_pe_short_name'] ?? '' ) );
		$art_best        = trim( (string) ( $art_item['art_pe_best'] ?? '' ) );
		$art_category    = trim( (string) ( $art_item['art_pe_category'] ?? '' ) );
		$art_pricing     = trim( (string) ( $art_item['art_pe_pricing'] ?? '' ) );
		$art_deployment  = trim( (string) ( $art_item['art_pe_deployment'] ?? '' ) );
		$art_licensing   = trim( (string) ( $art_item['art_pe_licensing'] ?? '' ) );
		$art_rv_mode     = (string) ( $art_item['art_pe_reviews_mode'] ?? 'none' );
		$art_rv_source_raw = $art_item['art_pe_reviews_source'] ?? '';
		if ( is_array( $art_rv_source_raw ) ) {
			// ACF link field: [ title, url, target ]. A raw legacy string gets auto-wrapped by ACF
			// itself into this shape with the whole string dumped into 'url' — handled below too.
			$art_rv_source_url    = trim( (string) ( $art_rv_source_raw['url'] ?? '' ) );
			$art_rv_source        = trim( (string) ( $art_rv_source_raw['title'] ?? '' ) );
			$art_rv_source_target = '_blank' === ( $art_rv_source_raw['target'] ?? '' ) ? '_blank' : '';
		} else {
			// Field not yet formatted as a link array at all (raw meta value).
			$art_rv_source_url    = '';
			$art_rv_source        = trim( (string) $art_rv_source_raw );
			$art_rv_source_target = '';
		}
		// Rows saved by import/migration as a raw JSON link object end up, after the above, either
		// as plain text (pre-link-field rows) or — since ACF wraps any loose string into the 'url'
		// slot of the link array — as that JSON text sitting in $art_rv_source_url. Decode it either way.
		$art_rv_source_json_src = '' !== $art_rv_source_url ? $art_rv_source_url : $art_rv_source;
		if ( '' !== $art_rv_source_json_src && '{' === $art_rv_source_json_src[0] ) {
			$art_rv_source_json = json_decode( $art_rv_source_json_src, true );
			if ( is_array( $art_rv_source_json ) && array_key_exists( 'url', $art_rv_source_json ) ) {
				$art_rv_source_url    = trim( (string) ( $art_rv_source_json['url'] ?? '' ) );
				$art_rv_source        = trim( (string) ( $art_rv_source_json['title'] ?? '' ) );
				$art_rv_source_target = '_blank' === ( $art_rv_source_json['target'] ?? '' ) ? '_blank' : '';
			}
		}
		if ( '' === $art_rv_source ) {
			$art_rv_source = $art_rv_source_url;
		}
		$art_rv_source_is_link = '' !== $art_rv_source_url && '#' !== $art_rv_source_url;
		$art_rv_rating   = $art_item['art_pe_reviews_rating'] ?? '';
		$art_rv_count    = $art_item['art_pe_reviews_count'] ?? '';
		$art_rv_caveat   = trim( (string) ( $art_item['art_pe_reviews_caveat'] ?? '' ) );
		$art_intro       = trim( (string) ( $art_item['art_pe_intro'] ?? '' ) );
		$art_body        = trim( (string) ( $art_item['art_pe_body'] ?? '' ) );
		$art_tradeoff    = trim( (string) ( $art_item['art_pe_tradeoff'] ?? '' ) );
		$art_avoid       = trim( (string) ( $art_item['art_pe_avoid'] ?? '' ) );
		$art_avoid_label = '' !== $art_short_name ? $art_short_name : $art_name;
		$art_screenshot  = $art_item['art_pe_screenshot'] ?? null;
		?>
		<article class="art-pe-card">
			<div class="art-pe-head">
				<?php if ( '' !== $art_rank ) : ?>
					<span class="art-pe-rank"><?php echo esc_html( $art_rank ); ?></span>
				<?php endif; ?>
				<div class="art-pe-titles">
					<h3><?php echo esc_html( $art_name ); ?></h3>
					<?php if ( '' !== $art_best ) : ?>
						<span class="art-pe-best"><?php echo esc_html( $art_best ); ?></span>
					<?php endif; ?>
				</div>
			</div>

			<?php if ( ! empty( $art_screenshot['ID'] ) ) : ?>
				<div class="art-pe-screenshot">
					<?php
					echo wp_get_attachment_image(
						$art_screenshot['ID'],
						'full',
						false,
						array(
							'alt'   => ( $art_screenshot['alt'] ?? '' ) ?: $art_name,
							'class' => 'art-pe-screenshot-img',
						)
					);
					?>
				</div>
			<?php endif; ?>

			<div class="art-pe-meta">
				<?php if ( '' !== $art_category ) : ?>
					<div class="art-pe-field"><span class="art-pe-field-k">Category</span><p><?php echo esc_html( $art_category ); ?></p></div>
				<?php endif; ?>
				<?php if ( '' !== $art_pricing ) : ?>
					<div class="art-pe-field"><span class="art-pe-field-k">Pricing</span><p><?php echo wp_kses( $art_pricing, $art_kses ); ?></p></div>
				<?php endif; ?>
				<?php if ( '' !== $art_deployment ) : ?>
					<div class="art-pe-field"><span class="art-pe-field-k">Deployment</span><p><?php echo esc_html( $art_deployment ); ?></p></div>
				<?php endif; ?>
				<?php if ( '' !== $art_licensing ) : ?>
					<div class="art-pe-field"><span class="art-pe-field-k">Licensing</span><p><?php echo esc_html( $art_licensing ); ?></p></div>
				<?php endif; ?>
			</div>

			<?php
			$art_rv_count_trim = trim( (string) $art_rv_count );
			$art_rv_weak       = 'scored' === $art_rv_mode && ( '' === $art_rv_count_trim || (int) $art_rv_count_trim < 60 );
			?>
			<?php if ( 'none' !== $art_rv_mode ) : ?>
				<div class="art-pe-reviews<?php echo $art_rv_weak ? ' art-pe-reviews--weak' : ''; ?>">
					<?php if ( 'scored' === $art_rv_mode && '' !== $art_rv_rating ) : ?>
						<span class="art-pe-rv-score"><?php echo esc_html( number_format( (float) $art_rv_rating, 1 ) ); ?>/5</span>
						<?php if ( '' !== $art_rv_source ) : ?>
							<span class="art-pe-rv-source"><?php if ( $art_rv_source_is_link ) : ?><a href="<?php echo esc_url( $art_rv_source_url ); ?>"<?php echo '_blank' === $art_rv_source_target ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>><?php echo esc_html( $art_rv_source ); ?></a><?php else : ?><?php echo esc_html( $art_rv_source ); ?><?php endif; ?></span>
						<?php endif; ?>
						<?php if ( '' !== $art_rv_count_trim ) : ?>
							<span class="art-pe-rv-count"><?php echo esc_html( number_format_i18n( (int) $art_rv_count_trim ) ); ?> reviews</span>
						<?php endif; ?>
						<?php if ( '' === $art_rv_count_trim ) : ?>
							<span class="art-pe-rv-flag">count n/a</span>
						<?php elseif ( (int) $art_rv_count_trim < 60 ) : ?>
							<span class="art-pe-rv-flag">small sample</span>
						<?php endif; ?>
					<?php endif; ?>
					<?php if ( '' !== $art_rv_caveat ) : ?>
						<span class="art-pe-rv-caveat"><?php echo esc_html( $art_rv_caveat ); ?></span>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if ( '' !== $art_intro ) : ?>
				<p class="art-pe-intro"><?php echo wp_kses( $art_intro, $art_kses ); ?></p>
			<?php endif; ?>
			<?php if ( '' !== $art_body ) : ?>
				<p class="art-pe-body"><?php echo wp_kses( $art_body, $art_kses ); ?></p>
			<?php endif; ?>

			<?php if ( '' !== $art_tradeoff || '' !== $art_avoid ) : ?>
				<div class="art-pe-runs">
					<?php if ( '' !== $art_tradeoff ) : ?>
						<div class="art-pe-run art-pe-run--trade">
							<span class="art-pe-run-k"><span class="art-pe-run-ico"><?php echo wp_kses( tnb_art_icon( 'gauge' ), $art_svg ); ?></span>Main trade-off</span>
							<p><?php echo wp_kses( $art_tradeoff, $art_kses ); ?></p>
						</div>
					<?php endif; ?>
					<?php if ( '' !== $art_avoid ) : ?>
						<div class="art-pe-run art-pe-run--avoid">
							<span class="art-pe-run-k"><span class="art-pe-run-ico"><?php echo wp_kses( tnb_art_icon( 'x' ), $art_svg ); ?></span>Avoid <?php echo esc_html( $art_avoid_label ); ?> when</span>
							<p><?php echo wp_kses( $art_avoid, $art_kses ); ?></p>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</article>
	<?php endforeach; ?>
</div>
