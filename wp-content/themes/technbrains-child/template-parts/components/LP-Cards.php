<?php
/**
 * Landing Page — Card Groups ("LP cards").
 *
 * Layout : lp_cards (ACF Flexible Content)
 * Fields : lpc_heading, lpc_desc, lpc_cta, lpc_groups{ lpc_group_title,
 *          lpc_group_columns, lpc_group_class, lpc_group_cards{ lpc_card_icon,
 *          lpc_card_title, lpc_card_desc, lpc_card_tags } }, lpc_anchor
 * CSS    : assets/css/components.css (.lp-cards-*) — container width matches
 *          .lp-stats-inner (var(--container,1280px)), not the 80% used by the
 *          hero specifically.
 *
 * lpc_group_columns (radio: 3/4/5, default 3) sets the desktop grid's column
 * count per group via the --lpc-cols custom property; the existing
 * ≤900px/≤640px collapse rules in components.css apply on top of it
 * regardless of the authored count.
 *
 * @package technbrains-child
 */

defined( 'ABSPATH' ) || exit;

$lpc_heading = (string) get_sub_field( 'lpc_heading' );
$lpc_desc    = (string) get_sub_field( 'lpc_desc' );
$lpc_anchor  = sanitize_title( (string) get_sub_field( 'lpc_anchor' ) );

/**
 * Same "#tnb-popup" magic-value convention as LP-Hero.php / Construction-hero.php.
 *
 * @param mixed $link ACF link value.
 * @return array{label:string,url:string,target:string,is_popup:bool}
 */
$lpc_link = static function ( $link ): array {
	$url      = is_array( $link ) ? trim( (string) ( $link['url'] ?? '' ) ) : '';
	$is_popup = in_array( $url, array( '#tnb-popup', '#tnb-form' ), true );

	return array(
		'label'    => is_array( $link ) ? trim( (string) ( $link['title'] ?? '' ) ) : '',
		'url'      => $is_popup ? '' : $url,
		'target'   => is_array( $link ) ? (string) ( $link['target'] ?? '' ) : '',
		'is_popup' => $is_popup,
	);
};
$lpc_cta = $lpc_link( get_sub_field( 'lpc_cta' ) );

$lpc_groups = [];
if ( have_rows( 'lpc_groups' ) ) {
	while ( have_rows( 'lpc_groups' ) ) {
		the_row();

		$cards = [];
		if ( have_rows( 'lpc_group_cards' ) ) {
			while ( have_rows( 'lpc_group_cards' ) ) {
				the_row();
				$title = (string) get_sub_field( 'lpc_card_title' );
				if ( '' === $title ) {
					continue;
				}
				$tags_raw = (string) get_sub_field( 'lpc_card_tags' );
				$tags     = array_filter( array_map( 'trim', explode( ',', $tags_raw ) ) );

				$cards[] = [
					'icon'  => get_sub_field( 'lpc_card_icon' ),
					'title' => $title,
					'desc'  => (string) get_sub_field( 'lpc_card_desc' ),
					'tags'  => $tags,
				];
			}
		}

		$group_title = (string) get_sub_field( 'lpc_group_title' );
		if ( '' === $group_title && empty( $cards ) ) {
			continue;
		}

		$columns = (string) get_sub_field( 'lpc_group_columns' );
		if ( ! in_array( $columns, [ '3', '4', '5' ], true ) ) {
			$columns = '3';
		}

		$group_class = trim( (string) get_sub_field( 'lpc_group_class' ) );

		$lpc_groups[] = [
			'title'   => $group_title,
			'columns' => $columns,
			'class'   => $group_class,
			'cards'   => $cards,
		];
	}
}

if ( '' === $lpc_heading && empty( $lpc_groups ) ) {
	return;
}
?>
<section class="lp-cards"<?php echo '' !== $lpc_anchor ? ' id="' . esc_attr( $lpc_anchor ) . '"' : ''; ?>>
	<div class="lp-cards-inner">

		<div class="lp-cards-head">
			<div class="lp-cards-head-text">
				<?php if ( '' !== $lpc_heading ) : ?>
					<h2 class="lp-cards-h2"><?php echo esc_html( $lpc_heading ); ?></h2>
				<?php endif; ?>
				<?php if ( '' !== $lpc_desc ) : ?>
					<p class="lp-cards-sub"><?php echo esc_html( $lpc_desc ); ?></p>
				<?php endif; ?>
			</div>

			<?php if ( '' !== $lpc_cta['url'] || $lpc_cta['is_popup'] ) : ?>
				<?php if ( '' !== $lpc_cta['label'] ) : ?>
					<?php if ( $lpc_cta['is_popup'] ) : ?>
						<button type="button" class="dt-btn dt-btn-primary lp-cards-cta tnb-popup-trigger"><?php echo esc_html( $lpc_cta['label'] ); ?></button>
					<?php else : ?>
						<a class="dt-btn dt-btn-primary lp-cards-cta" href="<?php echo esc_url( $lpc_cta['url'] ); ?>"<?php
							echo '' !== $lpc_cta['target'] ? ' target="' . esc_attr( $lpc_cta['target'] ) . '" rel="noopener"' : '';
						?>><?php echo esc_html( $lpc_cta['label'] ); ?></a>
					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>

		<?php foreach ( $lpc_groups as $lpc_group ) :
			$lpc_group_cl = 'lp-cards-group' . ( '' !== $lpc_group['class'] ? ' ' . $lpc_group['class'] : '' );
			?>
			<div class="<?php echo esc_attr( $lpc_group_cl ); ?>">
				<?php if ( '' !== $lpc_group['title'] ) : ?>
					<h3 class="lp-cards-group-title"><?php echo esc_html( $lpc_group['title'] ); ?></h3>
				<?php endif; ?>

				<?php if ( ! empty( $lpc_group['cards'] ) ) : ?>
					<div class="lp-cards-grid" style="--lpc-cols: <?php echo esc_attr( $lpc_group['columns'] ); ?>;">
						<?php foreach ( $lpc_group['cards'] as $lpc_card ) : ?>
							<div class="lp-cards-card">
								<?php if ( ! empty( $lpc_card['icon']['ID'] ) ) : ?>
									<div class="lp-cards-card-icon">
										<?php echo wp_get_attachment_image( (int) $lpc_card['icon']['ID'], 'thumbnail', false, [ 'alt' => '', 'loading' => 'lazy' ] ); ?>
									</div>
								<?php endif; ?>

								<div class="lp-cards-card-title"><?php echo esc_html( $lpc_card['title'] ); ?></div>

								<?php if ( '' !== $lpc_card['desc'] ) : ?>
									<p class="lp-cards-card-desc"><?php echo esc_html( $lpc_card['desc'] ); ?></p>
								<?php endif; ?>

								<?php if ( ! empty( $lpc_card['tags'] ) ) : ?>
									<div class="lp-cards-card-tags">
										<?php foreach ( $lpc_card['tags'] as $lpc_tag ) : ?>
											<span class="lp-cards-tag"><?php echo esc_html( $lpc_tag ); ?></span>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>

	</div>
</section>
