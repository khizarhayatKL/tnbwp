<?php
/**
 * IH Case Studies Slider — ACF flexible content layout
 *
 * Pixel-perfect recreation of the IHCases component from the Claude Design.
 * Uses the same 3D perspective card deck as the original (section.cases).
 *
 * Layout name : case_studies_slider
 * Dispatcher  : template-parts/flexible/dispatch.php
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$eyebrow  = get_sub_field( 'ihcs_eyebrow' );
$title    = get_sub_field( 'ihcs_title' );
$desc     = get_sub_field( 'ihcs_description' );
$cta_text = get_sub_field( 'ihcs_cta_text' );
$cta_url  = get_sub_field( 'ihcs_cta_url' );
$slides   = get_sub_field( 'ihcs_slides' );

if ( empty( $slides ) ) {
	return;
}

$total = count( $slides );
?>
<section class="section cases" id="cases" data-ihcs data-ih-cases-deck-wrap>
	<div class="container">

		<div class="section-head ihcs-head">
			<div class="section-intro ihcs-intro">
				<?php if ( $eyebrow ) : ?>
					<div class="ih-eyebrow ihcs-eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
				<?php endif; ?>
				<?php if ( $title ) : ?>
					<h2 class="ihcs-h2"><?php echo wp_kses_post( $title ); ?></h2>
				<?php endif; ?>
				<?php if ( $desc ) : ?>
					<p class="ihcs-desc"><?php echo esc_html( $desc ); ?></p>
				<?php endif; ?>
			</div>

			<?php if ( $cta_url ) : ?>
			<div class="ih-cases-view-all">
				<a href="<?php echo esc_url( $cta_url ); ?>" class="ih-btn ih-btn-primary">
					<?php echo esc_html( $cta_text ?: 'View All Case Studies' ); ?>
					<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
				</a>
			</div>
		<?php endif; ?>
		</div>

		<div class="case-deck" data-ih-cases-deck>

			<?php foreach ( $slides as $i => $slide ) :
				$image_id   = ! empty( $slide['ihcs_slide_image']['ID'] )   ? (int) $slide['ihcs_slide_image']['ID']  : 0;
				$industry   = ! empty( $slide['ihcs_slide_industry'] )       ? $slide['ihcs_slide_industry']           : '';
				$s_title    = ! empty( $slide['ihcs_slide_title'] )          ? $slide['ihcs_slide_title']              : '';
				$s_desc     = ! empty( $slide['ihcs_slide_description'] )    ? $slide['ihcs_slide_description']        : '';
				$m1_val     = ! empty( $slide['ihcs_slide_metric1_value'] )  ? $slide['ihcs_slide_metric1_value']      : '';
				$m1_lbl     = ! empty( $slide['ihcs_slide_metric1_label'] )  ? $slide['ihcs_slide_metric1_label']      : '';
				$m2_val     = ! empty( $slide['ihcs_slide_metric2_value'] )  ? $slide['ihcs_slide_metric2_value']      : '';
				$m2_lbl     = ! empty( $slide['ihcs_slide_metric2_label'] )  ? $slide['ihcs_slide_metric2_label']      : '';
				$team_size  = ! empty( $slide['ihcs_slide_team_size'] )      ? $slide['ihcs_slide_team_size']          : '';
				$tech_stack = ! empty( $slide['ihcs_slide_tech_stack'] )     ? $slide['ihcs_slide_tech_stack']         : '';
				$btn_text   = ! empty( $slide['ihcs_slide_btn_text'] )       ? $slide['ihcs_slide_btn_text']           : 'View Full Case Study';
				$btn_url    = ! empty( $slide['ihcs_slide_btn_url'] )        ? $slide['ihcs_slide_btn_url']            : '#';

				if ( $i === 0 )              { $state = 'is-front';  $z = 100; }
				elseif ( $i === 1 )          { $state = 'is-side-r'; $z = 10; }
				elseif ( $i === $total - 1 ) { $state = 'is-side-l'; $z = 10; }
				else                         { $state = 'is-far';    $z = 30; }
			?>
			<a class="case-card <?php echo esc_attr( $state ); ?>"
			   href="<?php echo esc_url( $btn_url ); ?>"
			   style="z-index:<?php echo (int) $z; ?>"
			   data-ih-cases-index="<?php echo (int) $i; ?>"
			   aria-current="<?php echo $state === 'is-front' ? 'true' : 'false'; ?>">

				<div class="case-art-frame">
					<?php if ( $image_id ) : ?>
						<?php echo wp_get_attachment_image( $image_id, 'large', false, [
							'class'   => 'case-art-photo',
							'alt'     => esc_attr( $s_title . ' case study' ),
							'loading' => 'lazy',
						] ); ?>
					<?php endif; ?>
				</div>

				<div class="case-body">

					<?php if ( $industry ) : ?>
						<div class="case-eyebrow"><?php echo esc_html( $industry ); ?></div>
					<?php endif; ?>

					<?php if ( $s_title ) : ?>
						<h3><?php echo esc_html( $s_title ); ?></h3>
					<?php endif; ?>

					<?php if ( $m1_val || $m2_val ) : ?>
						<div class="case-metrics">
							<?php if ( $m1_val ) : ?>
								<div>
									<div class="case-metric-v"><?php echo esc_html( $m1_val ); ?></div>
									<div class="case-metric-l"><?php echo esc_html( $m1_lbl ); ?></div>
								</div>
							<?php endif; ?>
							<?php if ( $m2_val ) : ?>
								<div>
									<div class="case-metric-v"><?php echo esc_html( $m2_val ); ?></div>
									<div class="case-metric-l"><?php echo esc_html( $m2_lbl ); ?></div>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ( $s_desc ) : ?>
						<p class="case-desc"><?php echo esc_html( $s_desc ); ?></p>
					<?php endif; ?>

					<?php if ( $team_size || $tech_stack ) : ?>
						<div class="case-meta">
							<?php if ( $team_size ) : ?>
								<div class="case-meta-row">
									<span class="k">Team Size</span>
									<span class="v"><?php echo esc_html( $team_size ); ?></span>
								</div>
							<?php endif; ?>
							<?php if ( $tech_stack ) : ?>
								<div class="case-meta-row">
									<span class="k">Built With</span>
									<span class="v"><?php echo esc_html( $tech_stack ); ?></span>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<div class="case-foot">
						<span class="case-link">
							<?php echo esc_html( $btn_text ); ?>
							<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
						</span>
					</div>

				</div>
			</a>
			<?php endforeach; ?>

		</div><!-- .case-deck -->

		<div class="case-deck-nav">
			<button type="button" class="case-btn" aria-label="Previous case study" data-ih-cases-prev>
				<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
			</button>
			<div class="case-deck-dots">
				<?php for ( $i = 0; $i < $total; $i++ ) : ?>
					<button type="button"
					        class="case-deck-dot<?php echo $i === 0 ? ' is-active' : ''; ?>"
					        aria-label="<?php echo esc_attr( sprintf( 'Show case study %d', $i + 1 ) ); ?>"
					        data-ih-cases-dot="<?php echo (int) $i; ?>"></button>
				<?php endfor; ?>
			</div>
			<button type="button" class="case-btn" aria-label="Next case study" data-ih-cases-next>
				<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg>
			</button>
		</div>

		

	</div><!-- .container -->
</section>
