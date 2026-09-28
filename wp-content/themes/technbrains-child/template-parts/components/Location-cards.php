<?php
/**
 * Template Part: Location Cards — 3D Carousel
 *
 * ACF sub_fields (inside flexible content layout 'loc_cards'):
 *   lc_section_title   — Section heading (supports basic HTML)
 *   lc_subtitle        — Eyebrow label above heading
 *   lc_description     — Paragraph below heading
 *   lc_cta_text        — CTA button label
 *   lc_cta_url         — CTA button URL (empty → popup trigger)
 *
 *   lc_cards (repeater):
 *     lc_card_image         — Image (array)
 *     lc_card_location_name — Location name
 *     lc_card_description   — Card body text
 *     lc_card_btn_text      — Card button label
 *     lc_card_btn_url       — Card button URL (empty → popup trigger)
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$lc_title       = get_sub_field( 'lc_section_title' );
$lc_subtitle    = get_sub_field( 'lc_subtitle' );
$lc_description = get_sub_field( 'lc_description' );
$lc_cta_text    = get_sub_field( 'lc_cta_text' );
$lc_cta_url     = get_sub_field( 'lc_cta_url' );
$lc_cards       = get_sub_field( 'lc_cards' );

if ( empty( $lc_cards ) ) {
	return;
}
?>

<section class="loc-section loc-markets">
	<div class="loc-markets-inner">

		<?php if ( $lc_title || $lc_subtitle || $lc_description ) : ?>
		<div class="loc-markets-head">
			<?php if ( $lc_subtitle ) : ?>
				<p class="loc-markets-subtitle"><?php echo esc_html( $lc_subtitle ); ?></p>
			<?php endif; ?>
			<?php if ( $lc_title ) : ?>
				<h2 class="loc-markets-h2"><?php echo wp_kses_post( $lc_title ); ?></h2>
			<?php endif; ?>
			<?php if ( $lc_description ) : ?>
				<p class="loc-markets-sub"><?php echo esc_html( $lc_description ); ?></p>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<div class="loc-carousel" data-loc-carousel>
			<?php foreach ( $lc_cards as $i => $card ) :
				$card_img   = ! empty( $card['lc_card_image'] )         ? $card['lc_card_image']         : '';
				$card_name  = ! empty( $card['lc_card_location_name'] ) ? $card['lc_card_location_name'] : '';
				$card_desc  = ! empty( $card['lc_card_description'] )   ? $card['lc_card_description']   : '';
				$card_btn   = ! empty( $card['lc_card_btn_text'] )      ? $card['lc_card_btn_text']      : '';
				$card_url   = ! empty( $card['lc_card_btn_url'] )       ? $card['lc_card_btn_url']       : '';

				$tag        = $card_url ? 'a' : 'button';
				$tag_attrs  = $card_url
					? ' href="' . esc_url( $card_url ) . '"'
					: ' type="button"';

				$card_classes = 'loc-card';
				if ( $i === 0 )     $card_classes .= ' is-active';
				if ( ! $card_url )  $card_classes .= ' tnb-popup-trigger';
			?>
			<<?php echo $tag . $tag_attrs; ?>
				class="<?php echo esc_attr( $card_classes ); ?>"
				data-index="<?php echo (int) $i; ?>"
				<?php echo $i === 0 ? 'aria-current="true"' : ''; ?>>

				<?php if ( ! empty( $card_img['ID'] ) ) : ?>
					<?php echo wp_get_attachment_image(
						$card_img['ID'],
						'full',
						false,
						[
							'class'   => 'loc-card-img',
							'alt'     => esc_attr( $card_name ),
							'loading' => 'lazy',
						]
					); ?>
				<?php endif; ?>

				<div class="loc-card-body">
					<?php if ( $card_name ) : ?>
					<h3 class="loc-card-city">
						<span class="loc-card-city-dot" aria-hidden="true"></span>
						<?php echo esc_html( $card_name ); ?>
					</h3>
					<?php endif; ?>
					<?php if ( $card_desc ) : ?>
					<p class="loc-card-desc"><?php echo esc_html( $card_desc ); ?></p>
					<?php endif; ?>
					<?php if ( $card_btn ) : ?>
					<span class="loc-card-link" aria-hidden="true">
						<?php echo esc_html( $card_btn ); ?>
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
					</span>
					<?php endif; ?>
				</div>

			</<?php echo $tag; ?>>
			<?php endforeach; ?>
		</div>

		<div class="loc-carousel-nav" data-loc-carousel-nav>
			<button class="loc-carousel-btn" data-loc-prev aria-label="<?php esc_attr_e( 'Previous location', 'technbrains-child' ); ?>">
				<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
			</button>
			<div class="loc-carousel-dots">
				<?php foreach ( $lc_cards as $i => $card ) :
					$dot_label = ! empty( $card['lc_card_location_name'] ) ? $card['lc_card_location_name'] : ( $i + 1 );
				?>
				<button
					class="loc-carousel-dot<?php echo $i === 0 ? ' is-active' : ''; ?>"
					data-loc-dot="<?php echo (int) $i; ?>"
					aria-label="<?php echo esc_attr( $dot_label ); ?>">
				</button>
				<?php endforeach; ?>
			</div>
			<button class="loc-carousel-btn" data-loc-next aria-label="<?php esc_attr_e( 'Next location', 'technbrains-child' ); ?>">
				<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
			</button>
		</div>

		<?php if ( $lc_cta_text ) : ?>
		<div class="loc-markets-cta">
			<?php if ( $lc_cta_url ) : ?>
				<a href="<?php echo esc_url( $lc_cta_url ); ?>" class="loc-btn-primary">
					<?php echo esc_html( $lc_cta_text ); ?>
				</a>
			<?php else : ?>
				<button type="button" class="loc-btn-primary tnb-popup-trigger">
					<?php echo esc_html( $lc_cta_text ); ?>
				</button>
			<?php endif; ?>
		</div>
		<?php endif; ?>

	</div>
</section>
