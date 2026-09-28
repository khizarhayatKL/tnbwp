<?php
/**
 * Article template family — Tool evaluation tabs (per-category tabbed tool deep-dives).
 *
 * Layout : art_tool_eval_tabs (ACF Flexible Content)
 * Fields : art_cat_heading, art_cat_intro, art_cat_outro,
 *          art_tool_items{ art_tool_name, art_tool_best_for, art_tool_screenshot,
 *          art_tool_price, art_tool_price_state, art_tool_sentiment, art_tool_sentiment_note,
 *          art_tool_fit, art_tool_intro, art_tool_pros, art_tool_cons, art_tool_check,
 *          art_tool_yes, art_tool_no, art_tool_ownership }, art_anchor
 * CSS    : assets/css/article.css (.art-etabs*, .art-aeval*, .art-spl*, .art-pc2*, .art-fieldnote,
 *          .art-verdict*, .art-ownership)
 * JS     : assets/js/article-toc.js ("TOOL EVAL TABS" — click-to-switch panels; "TOC HIDDEN PANEL
 *          REVEAL" — activates the right tab before the sidebar TOC scrolls to a tool sub-heading
 *          that is not the currently active tab).
 *
 * Self-contained (carries its own H2), unlike most of this family — article-3.jsx's
 * CategorySection gives every category its own heading directly, with no preceding art_prose
 * row. One tool's panel is visible at a time (matching article-3.jsx's ToolEvalTabs /
 * ToolEvalCard / ToolPanel exactly); the rest render with the `hidden` attribute rather than
 * being omitted from the DOM, so the sidebar TOC's per-tool sub-headings (rank + name, one per
 * tool, exactly like Article-AltEvals.php's TOC entries) stay valid ids to scroll to.
 *
 * Rank is the tool's position in the list (rank = index + 1), not a stored field — the source
 * computes it the same way from the active tab index. Sentiment uses a fixed 5-bar meter
 * (negative=1 .. positive=5 lit bars), matching article-2.jsx's SpecList SENT_LEVEL map. "Choose
 * it if" / "Avoid it if" always get an auto-appended period, matching
 * `<p>{tool.yes}.</p>` / `<p>{tool.no}.</p>` in the source — art_tool_no is a plain reason (no
 * rich "noText" variant), since none of this family's tools currently need one.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$art_heading = (string) get_sub_field( 'art_cat_heading' );
$art_intro   = (string) get_sub_field( 'art_cat_intro' );
$art_outro   = (string) get_sub_field( 'art_cat_outro' );
$art_items   = (array) get_sub_field( 'art_tool_items' );
$art_anchor  = sanitize_title( (string) get_sub_field( 'art_anchor' ) );

$art_items = array_values(
	array_filter(
		$art_items,
		static function ( $row ) {
			return '' !== trim( (string) ( $row['art_tool_name'] ?? '' ) );
		}
	)
);

if ( '' === $art_heading || ! $art_items ) {
	return;
}

$art_svg  = tnb_art_svg_html();
$art_kses = tnb_art_allowed_html();

$art_sent_label = array(
	'positive' => 'Generally positive',
	'concerns' => 'Positive with recurring concerns',
	'mixed'    => 'Mixed',
	'limited'  => 'Limited evidence',
	'negative' => 'Generally negative',
);
$art_sent_level = array(
	'negative' => 1,
	'limited'  => 2,
	'mixed'    => 3,
	'concerns' => 4,
	'positive' => 5,
);
?>
<section class="art-sec art-fade art-sec--major"<?php echo '' !== $art_anchor ? ' id="' . esc_attr( $art_anchor ) . '"' : ''; ?>>
	<div class="art-catopen">
		<h2><?php echo esc_html( $art_heading ); ?></h2>
		<?php if ( '' !== $art_intro ) : ?>
			<div class="art-catintro art-prose"><p><?php echo wp_kses_post( $art_intro ); ?></p></div>
		<?php endif; ?>
	</div>
	<div class="art-sub">
		<div class="art-etabs">
			<?php if ( count( $art_items ) > 1 ) : ?>
				<div class="art-etabs-strip" role="tablist">
					<?php foreach ( $art_items as $art_i => $art_item ) : ?>
						<?php $art_slug = 'tool-' . sanitize_title( (string) $art_item['art_tool_name'] ); ?>
						<button type="button" role="tab" aria-selected="<?php echo 0 === $art_i ? 'true' : 'false'; ?>" class="art-etab<?php echo 0 === $art_i ? ' is-active' : ''; ?>" data-etab-target="<?php echo esc_attr( $art_slug ); ?>">
							<span class="art-etab-name"><?php echo esc_html( trim( (string) $art_item['art_tool_name'] ) ); ?></span>
						</button>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<div class="art-etabs-panels">
				<?php foreach ( $art_items as $art_i => $art_item ) : ?>
					<?php
					$art_rank      = $art_i + 1;
					$art_slug      = 'tool-' . sanitize_title( (string) $art_item['art_tool_name'] );
					$art_name      = trim( (string) $art_item['art_tool_name'] );
					$art_best_for  = trim( (string) ( $art_item['art_tool_best_for'] ?? '' ) );
					$art_shot      = (array) ( $art_item['art_tool_screenshot'] ?? array() );
					$art_price     = trim( (string) ( $art_item['art_tool_price'] ?? '' ) );
					$art_price_st  = (string) ( $art_item['art_tool_price_state'] ?? 'undisclosed' );
					$art_sentiment = (string) ( $art_item['art_tool_sentiment'] ?? 'limited' );
					$art_sent_note = trim( (string) ( $art_item['art_tool_sentiment_note'] ?? '' ) );
					$art_fit       = trim( (string) ( $art_item['art_tool_fit'] ?? '' ) );
					$art_intro_txt = trim( (string) ( $art_item['art_tool_intro'] ?? '' ) );
					$art_pros      = (array) ( $art_item['art_tool_pros'] ?? array() );
					$art_cons      = (array) ( $art_item['art_tool_cons'] ?? array() );
					$art_check     = trim( (string) ( $art_item['art_tool_check'] ?? '' ) );
					$art_yes       = trim( (string) ( $art_item['art_tool_yes'] ?? '' ) );
					$art_no        = trim( (string) ( $art_item['art_tool_no'] ?? '' ) );
					$art_ownership = trim( (string) ( $art_item['art_tool_ownership'] ?? '' ) );
					$art_lvl       = $art_sent_level[ $art_sentiment ] ?? 0;
					?>
					<article class="art-aeval" id="<?php echo esc_attr( $art_slug ); ?>" data-etab-panel-id="<?php echo esc_attr( $art_slug ); ?>"<?php echo 0 === $art_i ? '' : ' hidden'; ?>>
						<div class="art-aeval-head">
							<span class="art-aeval-rank"><?php echo esc_html( str_pad( (string) $art_rank, 2, '0', STR_PAD_LEFT ) ); ?></span>
							<div class="art-aeval-titles">
								<h3 id="<?php echo esc_attr( $art_slug ); ?>-h" data-toc="<?php echo esc_attr( $art_rank . '. ' . $art_name ); ?>"><?php echo esc_html( $art_name ); ?></h3>
								<?php if ( '' !== $art_best_for ) : ?>
									<span class="art-aeval-best"><?php echo esc_html( $art_best_for ); ?></span>
								<?php endif; ?>
							</div>
						</div>
						<div class="art-panel">
							<div class="art-panel-top">
								<?php if ( ! empty( $art_shot['url'] ) ) : ?>
									<div class="art-tt-shot">
										<img src="<?php echo esc_url( $art_shot['url'] ); ?>" alt="<?php echo esc_attr( $art_shot['alt'] ?? ( 'Screenshot, ' . $art_name ) ); ?>" loading="lazy" />
									</div>
								<?php endif; ?>
								<div class="art-spl">
									<div class="art-spl-row">
										<span class="art-spl-k">Pricing</span>
										<span class="art-spl-v"><span class="art-price<?php echo 'undisclosed' === $art_price_st ? ' art-price--undisclosed' : ( 'quote' === $art_price_st ? ' art-price--quote' : '' ); ?>"><?php echo esc_html( $art_price ); ?></span></span>
									</div>
									<div class="art-spl-row art-spl-sent art-sent--<?php echo esc_attr( $art_sentiment ); ?>">
										<span class="art-spl-k">
											Sentiment
											<?php if ( '' !== $art_sent_note ) : ?>
												<span class="art-spl-tip" tabindex="0" aria-label="Sentiment evidence: <?php echo esc_attr( $art_sent_note ); ?>">
													<?php echo wp_kses( tnb_art_icon( 'info' ), $art_svg ); ?>
													<span class="art-spl-tipbox" role="tooltip"><span class="art-spl-tipbox-h">Evidence</span><?php echo esc_html( $art_sent_note ); ?></span>
												</span>
											<?php endif; ?>
										</span>
										<span class="art-spl-v">
											<span class="art-spl-sentline">
												<span class="art-spl-meter" aria-hidden="true">
													<?php for ( $art_n = 1; $art_n <= 5; $art_n++ ) : ?>
														<i class="<?php echo $art_n <= $art_lvl ? 'on' : ''; ?>"></i>
													<?php endfor; ?>
												</span>
												<span class="art-spl-sentlabel"><?php echo esc_html( $art_sent_label[ $art_sentiment ] ?? '' ); ?></span>
											</span>
										</span>
									</div>
									<?php if ( '' !== $art_fit ) : ?>
										<div class="art-spl-row">
											<span class="art-spl-k">Strongest fit</span>
											<span class="art-spl-v"><?php echo esc_html( $art_fit ); ?></span>
										</div>
									<?php endif; ?>
								</div>
							</div>
							<?php if ( '' !== $art_intro_txt ) : ?>
								<div class="art-eval-intro art-prose"><p><?php echo wp_kses_post( $art_intro_txt ); ?></p></div>
							<?php endif; ?>
							<?php if ( $art_pros || $art_cons ) : ?>
								<div class="art-pc2">
									<div class="art-pc2-col art-pc2-pro">
										<h4><?php echo wp_kses( tnb_art_icon( 'check' ), $art_svg ); ?>What works</h4>
										<ul>
											<?php foreach ( $art_pros as $art_pro ) : ?>
												<?php $art_pro_text = trim( (string) ( $art_pro['art_tool_pro_text'] ?? '' ) ); ?>
												<?php if ( '' !== $art_pro_text ) : ?>
													<li><?php echo wp_kses( $art_pro_text, $art_kses ); ?></li>
												<?php endif; ?>
											<?php endforeach; ?>
										</ul>
									</div>
									<div class="art-pc2-col art-pc2-con">
										<h4><?php echo wp_kses( tnb_art_icon( 'x' ), $art_svg ); ?>What to watch</h4>
										<ul>
											<?php foreach ( $art_cons as $art_con ) : ?>
												<?php $art_con_text = trim( (string) ( $art_con['art_tool_con_text'] ?? '' ) ); ?>
												<?php if ( '' !== $art_con_text ) : ?>
													<li><?php echo wp_kses( $art_con_text, $art_kses ); ?></li>
												<?php endif; ?>
											<?php endforeach; ?>
										</ul>
									</div>
								</div>
							<?php endif; ?>
							<?php if ( '' !== $art_check ) : ?>
								<div class="art-fieldnote">
									<span class="art-fieldnote-tag"><?php echo wp_kses( tnb_art_icon( 'gauge' ), $art_svg ); ?>What I check first</span>
									<p><?php echo wp_kses_post( $art_check ); ?></p>
								</div>
							<?php endif; ?>
							<?php if ( '' !== $art_yes || '' !== $art_no ) : ?>
								<div class="art-verdict">
									<div class="art-verdict-head">
										<span class="art-verdict-eyebrow"><?php echo wp_kses( tnb_art_icon( 'gauge' ), $art_svg ); ?>The decision</span>
										<span class="art-verdict-title">Is <?php echo esc_html( $art_name ); ?> the right call?</span>
									</div>
									<div class="art-verdict-routes">
										<?php if ( '' !== $art_yes ) : ?>
											<div class="art-vr art-vr--yes">
												<span class="art-vr-lbl"><span class="art-vr-ico"><?php echo wp_kses( tnb_art_icon( 'check' ), $art_svg ); ?></span>Choose it if</span>
												<p><?php echo wp_kses_post( $art_yes ); ?>.</p>
											</div>
										<?php endif; ?>
										<?php if ( '' !== $art_no ) : ?>
											<div class="art-vr art-vr--no">
												<span class="art-vr-lbl"><span class="art-vr-ico"><?php echo wp_kses( tnb_art_icon( 'x' ), $art_svg ); ?></span>Avoid it if</span>
												<p><?php echo wp_kses_post( $art_no ); ?>.</p>
											</div>
										<?php endif; ?>
									</div>
								</div>
							<?php endif; ?>
							<?php if ( '' !== $art_ownership ) : ?>
								<div class="art-ownership"><?php echo wp_kses( tnb_art_icon( 'info' ), $art_svg ); ?><span><?php echo wp_kses_post( $art_ownership ); ?></span></div>
							<?php endif; ?>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<?php if ( '' !== $art_outro ) : ?>
		<div class="art-prose" style="margin-top: 24px;"><p><?php echo wp_kses_post( $art_outro ); ?></p></div>
	<?php endif; ?>
</section>
