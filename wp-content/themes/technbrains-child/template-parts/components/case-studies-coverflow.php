<?php
/**
 * Case Studies Coverflow — ACF flexible content layout
 *
 * Cover-flow style deck: one enlarged, focused slide in the center with dimmed
 * neighbors either side. One of the 3 Case Studies Hub components — page-scoped
 * CSS/JS in assets/css/case-studies-hub.css and assets/js/case-studies-hub.js,
 * not the shared components.css/components.js bundle.
 *
 * Layout name : case_studies_coverflow
 * Dispatcher  : template-parts/flexible/dispatch.php
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$custom_class = get_sub_field( 'cscf_custom_class' );
$title        = get_sub_field( 'cscf_title' );
$description  = get_sub_field( 'cscf_description' );
$slides       = get_sub_field( 'cscf_slides' );

if ( empty( $slides ) ) {
	return;
}

$total = count( $slides );
?>
<section class="csh-section csh-feat<?php echo $custom_class ? ' ' . esc_attr( $custom_class ) : ''; ?>" data-csh-deck-wrap>
	<div class="csh-container">

		<?php if ( $title || $description ) : ?>
			<div class="csh-feat-head">
				<div class="csh-hcopy">
					<?php if ( $title ) : ?>
						<h2 class="csh-h2"><?php echo esc_html( $title ); ?></h2>
					<?php endif; ?>
					<?php if ( $description ) : ?>
						<p class="csh-sub"><?php echo esc_html( $description ); ?></p>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>

		<div class="csh-deck" data-csh-deck>

			<?php foreach ( $slides as $i => $slide ) :
				$bg_image_id = ! empty( $slide['cscf_slide_bg_image']['ID'] ) ? (int) $slide['cscf_slide_bg_image']['ID'] : 0;
				$logo_id     = ! empty( $slide['cscf_slide_logo']['ID'] )     ? (int) $slide['cscf_slide_logo']['ID']     : 0;
				$brand_name  = ! empty( $slide['cscf_slide_brand_name'] )     ? $slide['cscf_slide_brand_name']           : '';
				$tags_raw    = ! empty( $slide['cscf_slide_tags'] )           ? $slide['cscf_slide_tags']                 : '';
				$description = ! empty( $slide['cscf_slide_description'] )   ? $slide['cscf_slide_description']          : '';
				$shot_id     = ! empty( $slide['cscf_slide_shot_image']['ID'] )   ? (int) $slide['cscf_slide_shot_image']['ID']   : 0;
				$shot_class  = ! empty( $slide['cscf_slide_shot_class'] )        ? $slide['cscf_slide_shot_class']               : '';
				$btn_text    = ! empty( $slide['cscf_slide_btn_text'] ) ? $slide['cscf_slide_btn_text'] : 'View Case Study';
				$btn_url     = ! empty( $slide['cscf_slide_btn_url'] )  ? $slide['cscf_slide_btn_url']  : '#';

				$tags = array_filter( array_map( 'trim', explode( ',', $tags_raw ) ) );

				if ( $i === 0 )              { $state = 'is-front';  $z = 100; }
				elseif ( $i === 1 )          { $state = 'is-side-r'; $z = 10; }
				elseif ( $i === $total - 1 ) { $state = 'is-side-l'; $z = 10; }
				else                         { $state = 'is-far';    $z = 1; }

				$bg_style = $bg_image_id
					? 'background-image:url(\'' . esc_url( wp_get_attachment_url( $bg_image_id ) ) . '\');background-size:cover;background-position:center;'
					: '';
			?>
			<div class="csh-show <?php echo esc_attr( $state ); ?>"
			     style="z-index:<?php echo (int) $z; ?>;<?php echo esc_attr( $bg_style ); ?>"
			     data-csh-index="<?php echo (int) $i; ?>"
			     aria-hidden="<?php echo $state === 'is-front' ? 'false' : 'true'; ?>">

				<span class="csh-show-blob csh-show-blob-a" aria-hidden="true"></span>
				<span class="csh-show-blob csh-show-blob-b" aria-hidden="true"></span>

				<div class="csh-show-panel">

					<?php if ( $logo_id ) : ?>
						<div class="csh-show-brand">
							<?php echo wp_get_attachment_image( $logo_id, 'medium', false, [ 'class' => 'csh-show-logo', 'alt' => esc_attr( $brand_name ), 'loading' => 'lazy' ] ); ?>
						</div>
					<?php elseif ( $brand_name ) : ?>
						<div class="csh-show-brand">
							<span class="csh-show-brand-text"><?php echo esc_html( $brand_name ); ?></span>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $tags ) ) : ?>
						<div class="csh-disc">
							<?php foreach ( $tags as $tag ) : ?>
								<span class="csh-tag"><?php echo esc_html( $tag ); ?></span>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php if ( $description ) : ?>
						<p class="csh-show-desc"><?php echo esc_html( $description ); ?></p>
					<?php endif; ?>

					<a href="<?php echo esc_url( $btn_url ); ?>" class="csh-show-btn">
						<?php echo esc_html( $btn_text ); ?>
					</a>

				</div>

				<div class="csh-show-shot">
					<?php if ( $shot_id ) : ?>
						<div class="csh-show-shot-frame<?php echo $shot_class ? ' ' . esc_attr( $shot_class ) : ''; ?>">
							<?php echo wp_get_attachment_image( $shot_id, 'large', false, [ 'class' => 'csh-show-shot-img', 'alt' => '', 'loading' => 'lazy' ] ); ?>
						</div>
					<?php endif; ?>
				</div>

			</div>
			<?php endforeach; ?>

		</div><!-- .csh-deck -->

		<div class="csh-deck-nav">
			<button type="button" class="csh-nav-btn" aria-label="Previous slide" data-csh-prev>
				<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
			</button>
			<div class="csh-deck-dots">
				<?php for ( $i = 0; $i < $total; $i++ ) : ?>
					<button type="button"
					        class="csh-deck-dot<?php echo $i === 0 ? ' is-active' : ''; ?>"
					        aria-label="<?php echo esc_attr( sprintf( 'Show slide %d', $i + 1 ) ); ?>"
					        data-csh-dot="<?php echo (int) $i; ?>"></button>
				<?php endfor; ?>
			</div>
			<button type="button" class="csh-nav-btn" aria-label="Next slide" data-csh-next>
				<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg>
			</button>
		</div>

	</div><!-- .csh-container -->
</section>
