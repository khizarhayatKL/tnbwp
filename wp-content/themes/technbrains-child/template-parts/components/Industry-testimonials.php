<?php
/**
 * Industry Testimonials — ACF flexible content layout
 *
 * Matches the IHTestimonials component from the Claude Design exactly.
 * 3-card horizontal carousel (prev / center / next) with auto-rotation.
 *
 * Layout name : industry_testimonials
 * Dispatcher  : template-parts/flexible/dispatch.php
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$eyebrow = get_sub_field( 'iht_eyebrow' );
$title   = get_sub_field( 'iht_title' );
$desc    = get_sub_field( 'iht_description' );
$items   = get_sub_field( 'iht_items' );

if ( empty( $items ) ) {
	return;
}

$total = count( $items );
?>
<section class="ih-section ih-ts-section" data-ih-ts-wrap>

	<div class="ih-container ih-head-center">
		<?php if ( $eyebrow ) : ?>
			<div class="ih-eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
		<?php endif; ?>
		<?php if ( $title ) : ?>
			<h2 class="ih-h2"><?php echo wp_kses_post( $title ); ?></h2>
		<?php endif; ?>
		<?php if ( $desc ) : ?>
			<p class="ih-sub"><?php echo esc_html( $desc ); ?></p>
		<?php endif; ?>
	</div>

	<div class="ih-container">

		<div class="ih-ts-row" data-ih-ts-row>
			<div class="ih-ts-track" data-ih-ts-track>
			<?php foreach ( $items as $i => $item ) :
				$quote     = ! empty( $item['iht_quote'] )              ? $item['iht_quote']              : '';
				$name      = ! empty( $item['iht_name'] )               ? $item['iht_name']               : '';
				$role      = ! empty( $item['iht_role'] )               ? $item['iht_role']               : '';
				$industry  = ! empty( $item['iht_industry'] )           ? $item['iht_industry']           : '';
				$img_id    = ! empty( $item['iht_image']['ID'] )        ? (int) $item['iht_image']['ID']  : 0;
				$img_url   = ! empty( $item['iht_image']['url'] )       ? $item['iht_image']['url']       : '';
				$platform  = ! empty( $item['iht_platform'] )           ? $item['iht_platform']           : '';
				$link_text = ! empty( $item['iht_link_text'] )          ? $item['iht_link_text']          : 'View Testimonial';
				$link_url  = ! empty( $item['iht_link_url'] )           ? $item['iht_link_url']           : '';
			?>
			<article class="ih-ts-card2<?php echo $i === 0 ? ' is-c' : ''; ?>" data-ih-ts-card="<?php echo (int) $i; ?>">

				<svg class="ih-ts2-mark" width="32" height="32" viewBox="0 0 32 32" fill="none" aria-hidden="true">
					<path d="M5 22C3.9 19.867 4 17.4 5.5 14.6 7 11.8 9.4 9.467 12.7 7.6L14.5 9.8C12.033 11.267 10.4 12.7 9.6 14.1c-.267.467-.367.833-.3 1.1H13v7H5zm14 0c-1.1-2.133-1-4.6.5-7.4C21 11.8 23.4 9.467 26.7 7.6l1.8 2.2C26.033 11.267 24.4 12.7 23.6 14.1c-.267.467-.367.833-.3 1.1H27v7h-8z" fill="currentColor"/>
				</svg>

				<?php if ( $quote ) : ?>
					<blockquote class="ih-ts2-quote">"<?php echo esc_html( $quote ); ?>"</blockquote>
				<?php endif; ?>

				<div class="ih-ts2-divider"></div>

				<div class="ih-ts2-foot">
					<div class="ih-ts2-avatar"<?php if ( $img_url ) : ?> style="background-image:url('<?php echo esc_url( $img_url ); ?>')"<?php endif; ?>></div>
					<div class="ih-ts2-cite">
						<?php if ( $name ) : ?>
							<div class="ih-ts2-name"><?php echo esc_html( $name ); ?></div>
						<?php endif; ?>
						<div class="ih-ts2-role">
							<?php if ( $role ) : ?><?php echo esc_html( $role ); ?><?php endif; ?>
							<?php if ( $industry ) : ?>
								<span class="industry"><?php echo esc_html( $industry ); ?></span>
							<?php endif; ?>
						</div>
					</div>
					<?php if ( $platform ) : ?>
						<div class="ih-ts2-platform">
							<svg class="glyph" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
							<?php echo esc_html( $platform ); ?>
						</div>
					<?php endif; ?>
				</div>

				<?php if ( $link_url ) : ?>
				<a href="<?php echo esc_url( $link_url ); ?>" class="ih-ts2-link">
					<?php echo esc_html( $link_text ); ?>
					<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
				</a>
				<?php endif; ?>

			</article>
			<?php endforeach; ?>
			</div><!-- .ih-ts-track -->
		</div>

		<div class="ih-ts2-controls" data-ih-ts-controls>
			<button type="button" class="ih-ts2-arrow" aria-label="Previous testimonial" data-ih-ts-prev>
				<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
			</button>
			<div class="ih-ts2-dots">
				<?php for ( $i = 0; $i < $total; $i++ ) : ?>
					<button
						type="button"
						class="ih-ts2-dot<?php echo $i === 0 ? ' is-active' : ''; ?>"
						aria-label="<?php echo esc_attr( sprintf( 'Show review %d', $i + 1 ) ); ?>"
						data-ih-ts-dot="<?php echo (int) $i; ?>"></button>
				<?php endfor; ?>
			</div>
			<button type="button" class="ih-ts2-arrow" aria-label="Next testimonial" data-ih-ts-next>
				<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg>
			</button>
		</div>

	</div>

</section>
